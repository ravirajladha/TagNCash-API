<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\BusinessProfile;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Edit the profile of a user.
     *
     * @param \Illuminate\Http\Request $request The request object containing the user ID and profile data.
     * @return \Illuminate\Http\Response A JSON response indicating the profile update status.
     */
    public function editProfile(Request $request) 
    {
        // Find the user with the provided user ID
        $user = User::find($request->user_id);
        
        // If user exists, update the profile
        if($user) {
            // Extract all data from the request
            $updateData = $request->all();
            
            // Check if profile image is uploaded
            if($request->hasFile('profile_image')) {
                // Handle profile image upload
                $image = $request->file('profile_image');
                $path = $image->store('profile_image', 'public');
                $updateData['profile_image'] = $path;
            }
            
            // Update the user's profile with the new data
            $user->update($updateData);
            
            // Return a JSON response indicating successful profile update
            return $this->rtrResponse(200, 'Profile updated', $user);
        }  
        
        // If user doesn't exist, return a JSON response indicating session invalid
        return $this->rtrResponse(400, 'Session not valid');
    }

    /**
     * Fetches all vendors.
     * 
     * @return \Illuminate\Http\Response
     */
    public function allVendors($user_id) 
    {
        $user = User::find($user_id);
        if($user) {
            // Fetch all vendors from the BusinessProfile model
            $vendors = User::with('businessProfile')->whereHas('businessProfile')->where('country', $user->country)->where('status', 1)->where('hide', 0)->get();
            // Return a JSON response with the list of vendors
            return $this->rtrResponse(200, 'All vendors', $vendors);
        }
        return $this->rtrResponse(400, 'Session not valid');
    }

    public function deleteUser( $user_id) {
        $user = User::find($user_id);
        try {
            $user->updateOrFail(['status' => 0, 'hide' => 1]);
            return $this->rtrResponse(200, 'User deleted.');
        } catch (\Exception $e) {
            return $this->rtrResponse(400, 'User couldnt be deleted.');
        }
    }

    /**
     * Fetches all notifications for a user.
     * 
     * @param int $user_id The ID of the user
     * @return \Illuminate\Http\Response
     */
    public function allNotifications($user_id) 
    {
        // Find the user by user ID
        $user = User::find($user_id);
        if($user) {
            // If user exists, fetch all unread notifications for the user
            $notifications = Notification::with('coupon')->where(['notifiable_id' => $user->id, 'read' => 0])->latest()->get();
            // Return a JSON response with the list of notifications
            return $this->rtrResponse(200, 'All notifications', $notifications);
        }
        // Return an error response if user is not found
        return $this->rtrResponse(400, 'User not found');
    }

    /**
     * Marks a notification as read.
     * 
     * @param int $notification_id The ID of the notification
     * @return \Illuminate\Http\Response
     */
    public function readNotifications($notification_id) 
    {
        // Find the notification by notification ID
        $notification = Notification::find($notification_id);
        if($notification) {
            // If notification exists, mark it as read
            $notification->update(['read' => 1]);
            // Fetch all unread notifications for the user to update the notifications list
            $notifications = Notification::with('coupon')->where(['notifiable_id' => $notification->notifiable_id, 'read' => 0])->get(); 
            // Return a JSON response with the updated list of notifications
            return $this->rtrResponse(200, 'All notifications', $notifications);    
        }
        // Return an error response if notification is not found
        return $this->rtrResponse(400, 'Notification not found');
    }

    /**
     * Validates the request data.
     * 
     * @param mixed $request The request data
     * @param array $validationInputs The validation rules
     * @param array $validationError The custom error messages
     * @return \Illuminate\Http\Response|null
     */
    public function validation($request, $validationInputs, $validationError=[]) 
    {
        // Validate the request data using Laravel Validator
        $validation = Validator::make($request->all(), $validationInputs, $validationError);
        // If validation fails, return a JSON response with validation errors
        if ($validation->fails()) {
            return $this->rtrResponse(400, 'Validation failed', $validation->errors());
        }
        // Return null if validation passes
        return null;
    }

    /**
     * Constructs a JSON response.
     * 
     * @param int|null $code The status code
     * @param string|null $message The message
     * @param mixed|null $data The data
     * @return \Illuminate\Http\JsonResponse
     */
    public function rtrResponse($code=null, $message=null, $data=null) 
    {
        // Construct a JSON response with status code, message, and data
        $response = [
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ];
        // Return the JSON response
        return response()->json($response, $code);
    }
}
