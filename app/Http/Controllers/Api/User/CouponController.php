<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Notification;
use App\Models\RedeemedCoupon;
use App\Models\SharedCoupon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller
{
    /**
     * Retrieves shared coupons for a given user.
     *
     * @param int $user_id The ID of the user whose coupons are to be fetched.
     * @return \Illuminate\Http\JsonResponse A JSON response containing shared coupons or an error message.
     */
    public function myCoupons($user_id) 
    {
        // Find the user by user ID
        $user = User::find($user_id);
        
        // Check if the user exists
        if($user) {
            // Fetch shared coupons for the user where not redeemed and not shared to another user
            $sharedCoupons = SharedCoupon::with(['coupon', 'fromUser' => function($query) {
                $query->select(['id', 'name', 'email']);
            }])->where(['to_user_id' => $user->id, 'redeemed' => 0])->whereNull('shared_to')->get();
            
            // Return a JSON response with the shared coupons
            return $this->rtrResponse(200, 'Shared Coupons', $sharedCoupons);    
        }
        
        // Return an error response if user is not found
        return $this->rtrResponse(400, 'Session not found');
    }

    /**
     * Shows all available coupons for a user based on their country.
     * 
     * @param int $user_id The ID of the user
     * @return \Illuminate\Http\Response
     */
    public function allCoupons($user_id)
    {
        // Find the user by user ID
        $user = User::find($user_id);
        // Check if the user exists
        if($user) {
            // Fetch all available coupons for the user's country
            $coupons = Coupon::where(['status' => 1, 'coupon_country' => $user->country])->get();
            // Return a JSON response with the available coupons
            return $this->rtrResponse(200, 'Available Coupons', $coupons);
        }
        // Return an error response if user is not found
        return $this->rtrResponse(400, 'User not found');
    }
    
    /**
     * Shows all coupons shared with the user.
     * 
     * @param int $user_id The ID of the user
     * @return \Illuminate\Http\Response
     */
    public function sharedCoupons($user_id) 
    {
        // Find the user by user ID
        $user = User::find($user_id);
        // Check if the user exists
        if($user) {
            // Fetch shared coupons where the current user is the recipient
            $sharedCoupons = SharedCoupon::with(['coupon', 'toUser' => function($query) {
                $query->select(['id', 'name', 'email']);
            }])->where('from_user_id', $user->id)->get();
            // Return a JSON response with the shared coupons
            return $this->rtrResponse(200, 'Shared Coupons', $sharedCoupons);    
        }
        // Return an error response if user is not found
        return $this->rtrResponse(400, 'Session not found');
    }
    
    /**
     * Shows all coupons redeemed by the user along with redemption counts.
     * 
     * @param int $user_id The ID of the user
     * @return \Illuminate\Http\Response
     */
    public function redeemedCoupons($user_id) {
        // Find the user by user ID
        $user = User::find($user_id);
        // Check if the user exists
        if($user) {
            // Fetch redeemed coupons for the user
            $redeemedCoupons = RedeemedCoupon::with('coupon')->whereJsonContains('redeemed_by', $user->id)->get();
            // Calculate the count of redemptions by the user for each coupon
            $redeemedCouponsWithCount = $redeemedCoupons->transform(function ($redeemedCoupon) use ($user){
                $count = 0;
                foreach($redeemedCoupon->redeemed_by as $redeemedBy)  {
                    if($redeemedBy == $user->id) {
                        $count++; 
                    }
                }
                $redeemedCoupon->count = $count;
                return $redeemedCoupon;
            } );
            // Return a JSON response with the redeemed coupons and their redemption counts
            return $this->rtrResponse(200, 'Coupons', $redeemedCouponsWithCount);
        }
        // Return an error response if user is not found
        return $this->rtrResponse(400, 'Session not valid');
    }

    /**
     * Shows details of a specific coupon.
     * 
     * @param string $id The ID of the coupon
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        // Find the coupon by coupon ID
        $coupon = Coupon::find($id);
        if($coupon) {
            // Return a JSON response with the coupon details
            return $this->rtrResponse(200, 'Coupon found', $coupon);
        }
        // Return an error response if coupon is not found
        return $this->rtrResponse(400, 'No coupon found');
    }

    /**
     * Displays shared coupons for a user.
     * 
     * @param int $user_id The ID of the user
     * @return \Illuminate\Http\Response
     */
    public function sharedCouponsView($user_id)
    {
        // Find the user by user ID
        $user = User::find($user_id);
        if($user) {
            // Fetch shared coupons for the user
            $sharedCoupons = SharedCoupon::where('to_user_id', $user_id)->latest()->get(); 
            // Return a JSON response with shared coupons
            return $this->rtrResponse(200, 'Shared Coupons', $sharedCoupons);
        }
        // Return an error response if user is not found
        return $this->rtrResponse(400, 'Session not valid.');
    }

    /**
     * Generates OTP for redeeming a coupon.
     * 
     * @param int $user_id The ID of the user
     * @param string $coupon_id The ID of the coupon
     * @return \Illuminate\Http\Response
     */
    public function redeemCouponOtp($user_id, $coupon_id) 
    {
        // Generate a random OTP
        $otp = random_int(1000, 9999);
        // Find the user by user ID
        $user = User::find($user_id);
        if(!$user) {
            // Return an error response if user is not found
            return $this->rtrResponse(400, 'Session not valid');
        }
        // Find the coupon by coupon ID
        $coupon = Coupon::find($coupon_id);
        if($coupon) {
            if($coupon->status == 1) {
                // Find or create redeemed coupon and update OTP
                $redeemedCoupon = RedeemedCoupon::where('coupon_id', $coupon->id)->first();
                if($redeemedCoupon) {
                    $redeemedOtp = $redeemedCoupon->redeem_otp ?? [];
                    $redeemedOtp[$user->id] = $otp;
                    $redeemedCoupon->update(["redeem_otp" => $redeemedOtp]);
                } else {
                    $redeemOtp = [];
                    $redeemOtp[$user->id] = $otp;
                    $redeemedCoupon = RedeemedCoupon::create([
                        "coupon_id" => $coupon->id,  
                        "redeem_otp" => $redeemOtp, 
                    ]);
                }
                // Create notification for coupon redemption request
                $notification = Notification::create([
                    "notifiable_id" => $coupon->coupon_created_by,
                    "title" => "Coupon Redemption",
                    "message" => 'User ' . $user->name . ' wants to redeem ' . $coupon->title_of_offer . ' coupon',
                    "notification_by" => $user->id,
                    "coupon_id" => $coupon->id
                ]);
                // Return a JSON response with generated OTP
                return $this->rtrResponse(200, 'Otp Generated', $otp);
            }
            return $this->rtrResponse(400, 'This coupon is no longer valid');
        }
        // Return an error response if coupon is not found
        return $this->rtrResponse(400, 'This coupon doesnt exist');
    }

    /**
     * Shares a coupon with another user.
     * 
     * @param \Illuminate\Http\Request $request The HTTP request
     * @return \Illuminate\Http\Response
     */
    public function shareCoupon(Request $request) 
    {   
        // Define validation rules for the request
        $validationInputs = [
            "coupon_id" => 'required',
            "to_user_email" => 'required|email',
            "from_user_id" => 'required',
        ];
        // Define custom error messages for validation
        $validationErrors = [
            "to_user_email.required" => "Email is required",
            "to_user_email.email" => "Please enter an email address",
        ];
        // Validate the request data
        $validation = $this->validation($request, $validationInputs, $validationErrors);
        if($validation) {
            return $validation;
        }
        // Find the sender user by user ID
        $fromUser = User::find($request->from_user_id);
        if(!$fromUser) {
            // Return an error response if sender user is not found
            return $this->rtrResponse(400, 'The current session is not valid');
        }
        $toUserQuery = User::where(['type' => 'user', 'email' => $request->to_user_email])->first();
        $vendor = User::where('email', $request->to_user_email)->first();
        // Find the recipient user by email
        $toUser = User::where(['type' => 'user', 'email' => $request->to_user_email, "country" => $fromUser->country])->first();
        if($fromUser->id === optional($toUser)->id) {
            // Return an error response if sender tries to share with themselves
            return $this->rtrResponse(400, 'You have entered your own Email ID please click on self redeem');
        }
        if($toUserQuery) {
            if(optional($vendor)->email) {
                if($toUser) {
                    // Find the coupon by ID and verify its validity
                    $coupon = Coupon::where(["id" => $request->coupon_id, "coupon_country" => $fromUser->country, "status" => 1])->first();
                    if($coupon) {
                        // Update shared coupon information and create notifications
                        $shared = SharedCoupon::where(["coupon_id" => $coupon->id, "to_user_id" => $fromUser->id])->latest()->first();
                        if($shared) {
                            $shared->update(["shared_to" => $toUser->id]);
                        }
                        $shareCoupon = SharedCoupon::create([
                            "coupon_id" => $coupon->id,
                            "from_user_id" => $fromUser->id,
                            "to_user_id" => $toUser->id,
                        ]);
                        $notification1 = Notification::create([
                            "title" => "Coupon Shared",
                            "notifiable_id" => $fromUser->id,  
                            "message" => "You have shared the coupon to " . $toUser->name,
                            "notification_by" => 1,
                            "coupon_id" => $coupon->id,                             
                        ]);
                        $notification2 = Notification::create([
                            "title" => "Coupon Received",
                            "notifiable_id" => $toUser->id,  
                            "message" => "You have received a coupon from " . $fromUser->name,
                            "notification_by" => 1,
                            "coupon_id" => $coupon->id,                             
                        ]);
                        $notification2 = Notification::create([
                            "title" => "Coupon Shared by User",
                            "notifiable_id" => $coupon->coupon_created_by,  
                            "message" => "Your coupon of ID : " . $coupon->id . " " . $coupon->title_of_offer . " was shared to " . $toUser->name,
                            "notification_by" => 1,
                            "coupon_id" => $coupon->id,                             
                        ]);
                        // Return a success response with the shared coupon details
                        return $this->rtrResponse(200, 'Coupon Shared', $shareCoupon);
                    }
                    // Return an error response if the coupon doesn't exist
                    return $this->rtrResponse(400, 'Coupon does not exist');
                }
                return $this->rtrResponse(400, 'Coupon cannot be shared to a different country user');
            }
            return $this->rtrResponse(400, "Email ID doesn't exist");
        }
        // Return an error response if recipient email is invalid or from a different country
        return $this->rtrResponse(400, "Email ID doesn't exist");
    }

    /**
     * Search for coupons based on the provided search term and user ID.
     *
     * @param \Illuminate\Http\Request $request The request object containing the search term and user ID.
     * @return \Illuminate\Http\Response A JSON response containing the search results.
     */
    public function couponSearch(Request $request) 
    {
        // Extract the search term from the request
        $searchTerm = $request->search;
        
        // Find the user with the provided user ID
        $user = User::find($request->user_id);
        
        // If user exists, search for coupons
        if($user) {
            // Query coupons based on search term, user's country, and status
            $coupons = Coupon::where(function($query) use ($searchTerm){
                $query->where('title_of_offer', 'like', '%' . $searchTerm . '%')
                    ->orWhere('coupon_code', 'like', '%' . $searchTerm . '%');
            })->where(['coupon_country' => $user->country, 'status' => 1])->get();
            
            // Return a JSON response with the search results
            return $this->rtrResponse(200, 'Coupons', $coupons);
        }
        
        // If user doesn't exist, return a session invalid error response
        return $this->rtrResponse(400, 'Session invalid');
    }

    /**
     * Perform validation on request data.
     * 
     * @param \Illuminate\Http\Request $request The HTTP request
     * @param array $validationInputs The validation rules
     * @param array $validationError Custom error messages for validation
     * @return \Illuminate\Http\Response|null
     */
    public function validation($request, $validationInputs, $validationError=[]) 
    {
        // Validate the request data
        $validation = Validator::make($request->all(), $validationInputs, $validationError);
        if ($validation->fails()) {
            // Return an error response if validation fails
            return $this->rtrResponse(400, 'Validation failed', $validation->errors());
        }
        // Return null if validation passes
        return null;
    }
    
    /**
     * Return a JSON response.
     * 
     * @param int|null $code The response code
     * @param string|null $message The response message
     * @param mixed|null $data The data to be returned
     * @return \Illuminate\Http\Response
     */
    public function rtrResponse($code=null, $message=null, $data=null) 
    {
        // Create response structure
        $response = [
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ];
        // Return JSON response
        return response()->json($response, $code);
    }
}