<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\Mail\RegistrationEmail;
use App\Models\EmailVerification;
use App\Mail\RegisteredIntimationMail;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UtilityController extends Controller
{
    /**
     * Send OTP to the provided email address.
     *
     * @param \Illuminate\Http\Request $request The request object containing the email address.
     * @return \Illuminate\Http\Response A JSON response indicating the OTP generation status.
     */
    public function emailOtp(Request $request)
    {
        // Extract the email address from the request
        $email = $request->email;

        $existPhone = User::where("phone", $request->phone)->first();
        $existEmail = User::where("email", $request->email)->first();
        if ($existPhone) {
            if (($existPhone->type == "user" && $existPhone->status == 0) || ($existPhone->type == "vendor" && $existPhone->status == 0 && $existPhone->hide == 1)) {
                return response(["message" => "Your account was recently deleted. Please contact admin"], 400);
            }
            return response(["message" => "Phone number is already present"], 400);
        }
        if ($existEmail) {
            if (($existEmail->type == "user" && $existEmail->status == 0) || ($existEmail->type == "vendor" && $existEmail->status == 0 && $existEmail->hide == 1)) {
                return response(["message" => "Your account was recently deleted. Please contact admin"], 400);
            }
            return response(["message" => "Email ID is already present"], 400);
        }

        // Generate a random OTP (One Time Password)
        $otp = random_int(1000, 9999);

        // Send the OTP to the provided email address
        $mail = Mail::to($email)->send(new RegistrationEmail($otp));

        // Check if the email exists in the EmailVerification table
        $userEmail = EmailVerification::where("email", $email)->first();

        // Update the existing OTP if the email exists, otherwise create a new entry
        if ($userEmail) {
            $userEmail->update(["otp" => $otp]);
        } else {
            EmailVerification::create(["email" => $email, "otp" => $otp]);
        }

        // Return a JSON response indicating successful OTP generation
        return $this->rtrResponse(200, 'OTP generated successfully');
    }

    /**
     * Verify the OTP sent to the provided email address.
     *
     * @param \Illuminate\Http\Request $request The request object containing the email address and OTP.
     * @return \Illuminate\Http\Response A JSON response indicating the OTP verification status.
     */
    public function emailVerify(Request $request)
    {
        // Extract the OTP from the request
        $otp1 = $request->otp;

        // Find the EmailVerification record associated with the provided email address
        $email = EmailVerification::where("email", $request->email)->first();

        // If the EmailVerification record exists, compare the OTPs
        if ($email) {
            $otp2 = $email->otp;
            if ($otp1 === $otp2) {
                return $this->rtrResponse(200, 'OTP matched');
            } else {
                return $this->rtrResponse(400, 'OTP not matched');
            }
        }

        // If the EmailVerification record doesn't exist, return an error response
        return $this->rtrResponse(404, 'Email not found');
    }

    /**
     * Register a new user.
     *
     * @param \Illuminate\Http\Request $request The request object containing the user details.
     * @return \Illuminate\Http\Response A JSON response indicating the registration status.
     */
    public function register(Request $request)
    {
        // Validate the incoming request data
        $validation = Validator::make($request->all(), [
            "type" => 'required|in:user,vendor',
            "name" => 'required',
            "email" => 'required|email',
            "phone" => 'required',
            "country" => 'required',
            "password" => 'required',
        ], [
            // Custom error messages for validation rules
        ]);

        // If validation fails, return a validation error response
        if ($validation->fails()) {
            return $this->rtrResponse(400, 'Validation failed', $validation->errors());
        }

        // Check if a user with the provided email phone already exists
        $phone = User::where("phone", $request->phone)->first();
        $email = User::where("email", $request->email)->first();

        if ($phone) {
            if (($phone->status == 0 && $phone->type == "user") || ($phone->type == "vendor" && $phone->hide == 1 && $phone->status == 0)) {
                return $this->rtrResponse(400, 'This phone account was deleted. Please use other phone number', $email);
            }
            return $this->rtrResponse(400, 'This phone number is already registered', $phone);
        }

        if ($email) {
            if (($email->type == "user" && $email->status == 0) || ($email->type == "vendor" && $email->hide == 1 && $email->status == 0)) {
                return $this->rtrResponse(400, 'This email account was deleted. Please use other email.', $email);
            }
            return $this->rtrResponse(400, 'This email is already registered', $email);
        }

        // If user doesn't exist, create a new user with provided details
        $userDetails = $request->only('type', 'name', 'phone', 'email', 'country');
        $userDetails['password'] = Hash::make($request->password);
        $userDetails['status'] = $request->type == 'user' ? 1 : 0;

        // Create the new user record
        $user = User::create($userDetails);

        // Create a welcome notification for the new user
        $notification = Notification::create([
            "title" => "Welcome to TagNCash",
            "notifiable_id" => $user->id,
            "message" => "Checkout our app. Exciting offers are waiting for you!!",
            "notification_by" => 1,
        ]);

        try {
            $mail = new RegisteredIntimationMail($user->name, $user->type);
            Mail::to($user->email)->send($mail);
        } catch (\Exception $e) {
            throw $e;
        }

        // Return a JSON response indicating successful user registration
        return $this->rtrResponse(200, 'User registered successfully', $user);
    }

    /**
     * Verify email address for password reset and send OTP.
     *
     * @param \Illuminate\Http\Request $request The request object containing the email address.
     * @return \Illuminate\Http\Response A JSON response indicating the email verification status.
     */
    public function forgotPasswordEmailVerify(Request $request)
    {
        // Define validation rules for the request
        $validationInputs = [
            'email' => 'required|email',
        ];

        // Validate the request
        $validation = $this->validation($request, $validationInputs);

        // If validation fails, return the validation response
        if ($validation) {
            return $validation;
        }

        // Find the user with the provided email address
        $user = User::where('email', $request->email)->first();

        // If user exists, generate and send OTP, update OTP if exists
        if ($user) {
            $otp = random_int(1000, 9999);
            Mail::to($user->email)->send(new ForgotPassword($otp, $user->name));
            $email = EmailVerification::where("email", $user->email)->first();
            if ($email) {
                $email->update(['otp' => $otp]);
            }
            return $this->rtrResponse(200, 'The email found', $user->email);
        }

        // If user doesn't exist, return error response
        return $this->rtrResponse(404, 'The email couldn\'t be found');
    }

    /**
     * Verify OTP for email address for password reset.
     *
     * @param \Illuminate\Http\Request $request The request object containing the email address and OTP.
     * @return \Illuminate\Http\Response A JSON response indicating the OTP verification status.
     */
    public function forgotPasswordEmailVerifyOtp(Request $request)
    {
        // Define validation rules for the request
        $validationInputs = [
            'email' => 'required|email',
            'otp' => 'required',
        ];

        // Validate the request
        $validation = $this->validation($request, $validationInputs);

        // If validation fails, return the validation response
        if ($validation) {
            return $validation;
        }

        // Find the EmailVerification record associated with the provided email address
        $email = EmailVerification::where("email", $request->email)->first();

        // If EmailVerification record exists, compare the provided OTP with the stored OTP
        if ($email) {
            if ($request->otp === $email->otp) {
                return $this->rtrResponse(200, 'OTP match', $request->email);
            }
            return $this->rtrResponse(400, 'OTP invalid');
        }

        // If EmailVerification record doesn't exist, return error response
        return $this->rtrResponse(400, 'Email does not exist');
    }

    /**
     * Reset the password for the user.
     *
     * @param \Illuminate\Http\Request $request The request object containing the email address and new password.
     * @return \Illuminate\Http\Response A JSON response indicating the password reset status.
     */
    public function forgotPasswordReset(Request $request)
    {
        // Define validation rules for the request
        $validationInputs = [
            'email' => 'required|email',
            'password' => 'required',
            'confirmpassword' => 'required',
        ];

        // Validate the request
        $validation = $this->validation($request, $validationInputs);

        // If validation fails, return the validation response
        if ($validation) {
            return $validation;
        }

        // Check if passwords match
        if ($request->password !== $request->confirmpassword) {
            return $this->rtrResponse(404, 'Passwords do not match');
        }

        // Find the user with the provided email address
        $user = User::where('email', $request->email)->first();

        // If user exists, update the password
        if ($user) {
            $password = Hash::make($request->password);
            $user->update(['password' => $password]);
            return $this->rtrResponse(200, 'Password updated successfully', $user->email);
        }

        // If user doesn't exist, return error response
        return $this->rtrResponse(404, 'The email couldn\'t be found');
    }

    /**
     * Log in a user with the provided email and password.
     *
     * @param \Illuminate\Http\Request $request The request object containing the user's email and password.
     * @return \Illuminate\Http\Response A JSON response indicating the login status.
     */
    public function login(Request $request)
    {
        // Define validation rules for the request
        $validationInputs = [
            'email' => 'required|email',
            'password' => 'required'
        ];

        // Validate the request
        $validation = $this->validation($request, $validationInputs);

        // If validation fails, return the validation response
        if ($validation) {
            return $validation;
        }

        // Find the user with the provided email address
        $user = User::where('email', $request->email)->first();

        // If user exists, check password
        if ($user) {
            if ($user->hide === 1) {
                return $this->rtrResponse(400, 'Your account was deleted, for future information contact admin');
            }
            // Check if the provided password matches the hashed password
            $passCheck = Hash::check($request->password, $user->password);


            // If password matches, return success response
            if ($passCheck) {
                if ($user->status == 1 || ($user->type == "vendor" && $user->hide !== 1)) {
                    return $this->rtrResponse(200, 'Logged in successfully', $user);
                }
                if ($user->status == 0 && $user->type == "user" || $user->status == 0 && $user->type == "vendor") {
                    return $this->rtrResponse(400, 'Your account was deleted, please use other mail to register');
                }
                return $this->rtrResponse(400, 'Your account is not activate');
            }

            // If password doesn't match, return error response
            return $this->rtrResponse(400, 'Password is incorrect');
        }

        // If user doesn't exist, return error response
        return $this->rtrResponse(400, 'User email not found');
    }

    /**
     * Validate the request data against given validation rules.
     *
     * @param mixed $request The request object containing the data to be validated.
     * @param array $validationInputs The validation rules to be applied.
     * @param array $validationError Additional error messages for validation rules (optional).
     * @return \Illuminate\Http\Response|null A JSON response containing validation errors if validation fails, otherwise null.
     */
    public function validation($request, $validationInputs, $validationError = [])
    {
        // Validate the request data against the given validation rules
        $validation = Validator::make($request->all(), $validationInputs, $validationError);

        // If validation fails, return the validation response
        if ($validation->fails()) {
            return $this->rtrResponse(400, 'Validation failed', $validation->errors());
        }

        return null;
    }

    /**
     * Return a JSON response.
     *
     * @param int|null $code The HTTP status code (optional).
     * @param string|null $message The message to include in the response (optional).
     * @param mixed|null $data The data to include in the response (optional).
     * @return \Illuminate\Http\Response A JSON response with the provided code, message, and data.
     */
    public function rtrResponse($code = null, $message = null, $data = null)
    {
        // Construct the response array
        $response = [
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ];

        // Return the JSON response
        return response()->json($response, $code);
    }
}
