<?php

namespace App\Http\Controllers\Api\Vendor;

use App\Http\Controllers\Controller;
use App\Models\BusinessProfile;
use App\Models\Notification;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VendorController extends Controller
{
    /**
     * Store or update a business profile.
     *
     * @param \Illuminate\Http\Request $request The HTTP request containing profile data.
     * @return \Illuminate\Http\Response A JSON response indicating success or failure of profile creation/update.
     */
    public function store(Request $request)
    {
        // Check if there is an existing agreement for the user
        $existingAgreement = BusinessProfile::where('user_id', $request->user_id)
                                            ->whereNotNull('agreement')
                                            ->exists();
        
        // Define validation rules
        $validationInputs = [
            "user_id" => "required",
            "service_type" => "required", 
            "business_name" => "required",
            "business_email" => "required|email",
            "business_phone" => "required",
            "address" => "required",
            "city" => "required",
            "state" => "required",
            "country" => "required",
            "pincode" => "required",
            "tax_id" => "required",
            "registration_id" => "required",
            "agreement" => $existingAgreement ? "nullable" : "required",
        ];
        
        // Validate request data
        $validation = $this->validation($request, $validationInputs);
        if($validation){
            return $validation;
        }
        
        // Process profile data
        $profile = BusinessProfile::where('user_id', $request->user_id)->first();
        $profileData = $request->except('profile_image', 'agreement');
        
        // Handle profile image upload
        if($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $path = $image->store('profile_image', 'public');
            $vendor = User::find($request->user_id);
            if($vendor) {
                $vendor->update(['profile_image' => $path]);
            }
        }
        
        // Handle agreement file upload
        if($request->hasFile('agreement')) {
            $file = $request->file('agreement');
            $path = $file->store('agreement', 'public');
            $profileData['agreement'] = $path;
        }
        
        // Update or create profile
        $vendor = User::find($request->user_id);
        $profileData['country'] = $vendor->country;
        if($profile) {
            $profile->update($profileData);
            return $this->rtrResponse(200, 'Business profile updated', [$profile, $vendor]);
        } else {
            $profile = BusinessProfile::create($profileData);
            if($profile) {
                return $this->rtrResponse(200, 'Business profile created', [$profile, $vendor]);
            } else {
                return $this->rtrResponse(400, 'Business profile not created');
            }
        }
    }

    /**
     * Displays the business profile for a given vendor.
     *
     * @param int $vendor_id The ID of the vendor whose profile is to be viewed.
     * @return \Illuminate\Http\JsonResponse A JSON response containing the business profile or an error message.
     */
    public function businessProfileView($vendor_id) 
    {
        // Find the user (vendor) by vendor ID
        $vendor = User::find($vendor_id);
        
        // Check if the vendor exists
        if($vendor) {
            // Retrieve the business profile associated with the vendor
            $profile = BusinessProfile::where("user_id", $vendor->id)->first(); 
            
            // Check if a business profile exists for the vendor
            if($profile) {
                // Return a JSON response with the business profile
                return $this->rtrResponse(200, 'Business profile', $profile);
            }
            // Return an error response if the business profile is not found
            return $this->rtrResponse(400, 'Business profile not present');
        }
        // Return an error response if the vendor (user) is not found
        return $this->rtrResponse(400, 'Session not valid');
    }

    /**
     * View the wallet balance for a specific vendor.
     *
     * @param int $vendor_id The ID of the vendor whose wallet balance is to be viewed.
     * @return \Illuminate\Http\Response A JSON response containing the wallet balance.
     */
    public function walletView($vendor_id) {
        $vendor = User::find($vendor_id);
        if($vendor) {
            // Find the wallet associated with the provided vendor ID
            $wallet = Wallet::where('user_id', $vendor->id)->first();
            $transactions = Transaction::with(['fromUser' => function ($query) {
                $query->select('id', 'email', 'name');
            }, 'toUser' => function ($query) {
                $query->select('id', 'email', 'name');
            }])->where("vendor_id", $vendor->id)->latest()->get();
            
            // If wallet exists, return a JSON response with the wallet balance
            if($wallet) {
                return $this->rtrResponse(200, 'Wallet', [$wallet, $transactions]);
            }

            // If wallet doesn't exist, return a JSON response indicating no wallet found
            return $this->rtrResponse(200, 'Wallet not found');
        }
        return $this->rtrResponse(400, 'Session invalid');
    }

    public function deleteVendor( $vendor_id) {
        $vendor = User::find($vendor_id);
        try {
            $vendor->updateOrFail(['status' => 0, 'hide' => 1]);
            return $this->rtrResponse(200, 'Vendor deleted.');
        } catch (\Exception $e) {
            return $this->rtrResponse(400, 'Vendor couldnt be deleted.');
        }
    }

    /**
     * View unread notifications for a vendor.
     *
     * @param int $vendor_id The ID of the vendor.
     * @return \Illuminate\Http\Response A JSON response containing unread notifications.
     */
    public function notificationsView($vendor_id) 
    {
        // Get unread notifications for the vendor
        $notifications = Notification::where(['notifiable_id' => $vendor_id, 'read' => 0])->latest()->get();
        return $this->rtrResponse(200, 'All Notifications', $notifications);
    }

    /**
     * Mark a notification as read.
     *
     * @param int $notification_id The ID of the notification to mark as read.
     * @return \Illuminate\Http\Response A JSON response indicating success or failure of marking the notification as read.
     */
    public function notificationsRead($notification_id) 
    {
        // Find notification and mark it as read
        $notification = Notification::find($notification_id);
        if($notification) {
            $notification->update(["read" => 1]);
            $notifications = Notification::where("notifiable_id", $notification->notifiable_id)->where('read', 0)->get();
            return $this->rtrResponse(200, 'Notification updated', $notifications);
        }
        return $this->rtrResponse(400, 'Notification not found');
    }

    /**
     * Perform validation on request data.
     *
     * @param mixed $request The HTTP request object containing data to validate.
     * @param array $validationInputs The validation rules to apply.
     * @param array $validationError Additional error messages for validation rules (optional).
     * @return \Illuminate\Http\Response|null A JSON response containing validation errors if validation fails, otherwise null.
     */
    public function validation($request, $validationInputs, $validationError=[]) 
    {
        // Validate request data
        $validation = Validator::make($request->all(), $validationInputs, $validationError);
        if ($validation->fails()) {
            return $this->rtrResponse(400, 'Validation failed', $validation->errors());
        }
        return null;
    }

    /**
     * Generate a JSON response.
     *
     * @param int|null $code The HTTP status code for the response.
     * @param string|null $message A message to be included in the response.
     * @param mixed|null $data Additional data to be included in the response.
     * @return \Illuminate\Http\Response A JSON response with the provided code, message, and data.
     */
    public function rtrResponse($code=null, $message=null, $data=null) 
    {
        // Construct and return a JSON response
        $response = [
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ];
        return response()->json($response, $code);
    }
}
