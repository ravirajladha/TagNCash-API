<?php

namespace App\Http\Controllers\Api\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Notification;
use App\Models\RedeemedCoupon;
use App\Models\SharedCoupon;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller
{
    /**
     * Store a new coupon.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Extract request data
        $inst_dicount = $request->instant_discount;
        $perc_discount = $request->percentage_discount;

        // Define validation rules
        $validationInputs = [
            "coupon_image" => "required",
            "title_of_offer" => "required",
            "coupon_code" => "required",
            "campaign_code" => "required",
            "offer_validity" => "required|date",
            "instant_discount" => $perc_discount ? "nullable" : "required",
            "percentage_discount" => $inst_dicount ? "nullable" : "required",
            "cashback_value" => "required",
            "coupon_created_by" => "required",
        ];

        // Validate request data
        $validation = $this->validation($request, $validationInputs);
        if($validation) {
            return $validation;
        }

        // Find user
        $user = User::where('id', $request->coupon_created_by)->first();
        if($user) {
            if($user->status == 1) {
                // Check if coupon with same title exists
                $couponExist = Coupon::where('title_of_offer', $request->title_of_offer)->first();
                if(!$couponExist) {
                    // Create coupon and handle coupon image upload
                    $couponData = $request->except('coupon_image');
                    if ($request->hasFile('coupon_image')) {
                        $path = $request->file('coupon_image')->store('coupon_images', 'public');
                        $couponData['coupon_image'] = $path;
                    }
                    $couponData['coupon_country'] = $user->country;
                    $coupon = Coupon::create($couponData);
                    if($coupon) {
                        return $this->rtrResponse(200, 'Coupon created', $coupon);
                    }
                    return $this->rtrResponse(400, 'Coupon could not be created');
                }
                return $this->rtrResponse(400, 'Coupon with same title already exists');
            }
            return $this->rtrResponse(400, 'Your account is deactivated');
        }
        return $this->rtrResponse(400, 'Vendor not found');
    }

    /**
     * Show all coupons for a specific vendor.
     *
     * @param int $vendor_id
     * @return \Illuminate\Http\Response
     */
    public function show($vendor_id)
    {
        // Get all coupons for a vendor
        $coupon = Coupon::where(["coupon_created_by" => $vendor_id, 'status' =>1])->get();
        if($coupon) {
            return $this->rtrResponse(200, 'All Vendor Coupons', $coupon);
        }
        return $this->rtrResponse(400, 'No coupon found');
    }

    /**
     * Show all coupons for a specific vendor.
     *
     * @param int $vendor_id
     * @return \Illuminate\Http\Response
     */
    public function allVendorCoupons($vendor_id)
    {
        // Get all coupons for a vendor
        $coupon = Coupon::where(["coupon_created_by" => $vendor_id])->get();
        if($coupon) {
            return $this->rtrResponse(200, 'All Vendor Coupons', $coupon);
        }
        return $this->rtrResponse(400, 'No coupon found');
    }

    /**
     * Show all deactivated coupons for a specific vendor.
     *
     * @param int $vendor_id
     * @return \Illuminate\Http\Response
     */
    public function deactiveVendorCoupons($vendor_id)
    {
        $vendor = User::find($vendor_id);
        if($vendor) {
            if($vendor->status == 1) {
                // Get all deactivated coupons for a vendor
                $coupon = Coupon::where(["coupon_created_by" => $vendor_id, 'status' => 0])->get();
                if($coupon) {
                    return $this->rtrResponse(200, 'All Vendor Coupons', $coupon);
                }
                return $this->rtrResponse(400, 'No coupon found');
            }
            return $this->rtrResponse(400, 'Your account is deactivated');
        }
        return $this->rtrResponse(400, 'Session invalid');
    }

    /**
     * Update an existing coupon.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        // Find coupon
        $coupon = Coupon::find($id);
        if($coupon) {
            if($coupon->vendor->status == 1) {
                if($coupon->status == 0 && $request->status == 1) {
                    if(($coupon->coupon_country == 'India' && $request->offer_validity > Carbon::now('Asia/Kolkata')) || ($coupon->coupon_country == 'USA' && $request->offer_validity > Carbon::now('America/New_York'))) {
                        // Update coupon and handle coupon image upload
                        $couponData = $request->except('coupon_image');
                        if($request->hasFile('coupon_image')) {
                            $image = $request->file('coupon_image');
                            $path = $image->store('coupon_images', 'public');
                            $couponData['coupon_image'] = $path;
                        }
                        $coupon->update($couponData);
                        Notification::create([
                            "notifiable_id" => $coupon->vendor->id,
                            "title" => "Coupon Activated",
                            "message" => "Your coupon " . $coupon->title_of_offer . " is activated",
                            "read" => 0,
                            "notification_by" => 1,
                            "coupon_id" => $coupon->id,
                        ]);
                        return $this->rtrResponse(200, 'Coupon activated');
                    }
                    return $this->rtrResponse(400, 'Please change coupon validity');
                }
                // Update coupon and handle coupon image upload
                $couponData = $request->except('coupon_image');
                if($request->hasFile('coupon_image')) {
                    $image = $request->file('coupon_image');
                    $path = $image->store('coupon_images', 'public');
                    $couponData['coupon_image'] = $path;
                }
                if($coupon->status == 1 && $couponData["status"] == 0) {
                    Notification::create([
                        "notifiable_id" => $coupon->vendor->id,
                        "title" => "Coupon Deactivated",
                        "message" => "Your coupon " . $coupon->title_of_offer . " is deactivated",
                        "read" => 0,
                        "notification_by" => 1,
                        "coupon_id" => $coupon->id,
                    ]);
                }
                if($coupon->status == 0 && $couponData["status"] == 1) {
                    Notification::create([
                        "notifiable_id" => $coupon->vendor->id,
                        "title" => "Coupon Activated",
                        "message" => "Your coupon " . $coupon->title_of_offer . " is activated",
                        "read" => 0,
                        "notification_by" => 1,
                        "coupon_id" => $coupon->id,
                    ]);
                }
                $coupon->update($couponData);
                return $this->rtrResponse(200, 'Coupon updated');
            }
            return $this->rtrResponse(400, 'Your account is deactivated');
        }
        return $this->rtrResponse(400, 'No coupon found');
    }

    /**
     * Delete an existing coupon.
     *
     * @param string $coupon_id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $coupon_id)
    {
        // Find and delete coupon
        $coupon = Coupon::find($coupon_id);
        if($coupon) {
            if($coupon->vendor->status){
                $coupon->status=2;
                $coupon->save();
                return $this->rtrResponse(200, 'Coupon deleted successfully');
            }
            return $this->rtrResponse(200, 'Your account is deactivated');
        }
        return $this->rtrResponse(400, 'No coupon found');
    }

    /**
     * Retrieve users in the redemption queue for a specific vendor.
     *
     * @param int $vendor_id The ID of the vendor whose redemption queue is being retrieved.
     * @return \Illuminate\Http\Response A JSON response containing the users in the redemption queue.
     */
    public function redeemUsersQueue($vendor_id)
    {
        // Retrieve coupons created by the vendor with the specified ID and with status 1 (active)
        $coupons = Coupon::where(['coupon_created_by' => $vendor_id, 'status' => 1])->pluck('id')->toArray();

        // Retrieve redeemed coupons associated with the coupons found above
        $redeemCoupons = RedeemedCoupon::with('coupon')->whereIn('coupon_id', $coupons)->get();

        $data = [];

        // Iterate through each redeemed coupon
        foreach($redeemCoupons as $redeemCoupon) {
            // Iterate through each user in the redemption OTP
            foreach($redeemCoupon->redeem_otp as $userId => $otp) {
                // Retrieve the redeemed coupon with associated coupon information
                $redeem = RedeemedCoupon::with('coupon')->where('coupon_id', $redeemCoupon->coupon_id)->first();

                // Retrieve the user details based on the user ID
                $user = User::find($userId);

                // Remove the 'password' attribute from the user object before adding to data array
                $redeem->user = $user->makeHidden('password');

                // Add the redeemed coupon data to the response data array
                $data[] = $redeem;
            }
        }

        // Return a JSON response with the redeemable coupons and associated user details
        return $this->rtrResponse(200, 'Redeemable Coupons', $data);
    }

    /**
     * Redeem a coupon for a user.
     *
     * @param int $user_id
     * @param int $coupon_id
     * @param string $otp
     * @param float $bill_value
     * @return \Illuminate\Http\Response
     */
    public function redeemCoupon($user_id, $coupon_id, $otp, $bill_value)
    {
        // Find user
        $user = User::find($user_id);
        if($user) {
            if($user->status == 1) {
                // Find coupon and check if it's valid for redemption
                $coupon = Coupon::where(["id" => $coupon_id, "coupon_country" => $user->country, "status" => 1])->first();
                if($coupon) {
                    // Check if redemption record exists for the coupon
                    $redeem = RedeemedCoupon::where("coupon_id", $coupon->id)->first();
                    if(!$redeem) {
                        return $this->rtrResponse(400, "OTP doesn't exist");
                    }
                    // Compare OTPs
                    $otp2 = $redeem->redeem_otp[$user_id];
                    if($otp2 == $otp) {
                        // Perform coupon redemption
                        DB::beginTransaction();
                        try {
                            // Update redemption records and coupon details
                            $redeem->redeemed_by = array_merge($redeem->redeemed_by ?? [], [$user->id]);
                            // Remove the specified user's OTP
                            $redeemOtp = $redeem->redeem_otp;
                            unset($redeemOtp[$user_id]);
                            $redeem->redeem_otp = $redeemOtp;
                            $redeem->save();
                            $coupon->increment('redeem_count');
                            // Update shared coupon status and create transaction
                            $sharedCoupon = SharedCoupon::where(["coupon_id" => $coupon->id, "to_user_id" => $user->id, "redeemed" => 0])->whereNull("shared_to")->first();
                            if($sharedCoupon) {
                                $sharedCoupon->redeemed = 1;
                                $sharedCoupon->redeemed_at = now();
                                $sharedCoupon->save();

                                $transaction = Transaction::create([
                                    "vendor_id" => $coupon->coupon_created_by,
                                    "coupon_id" => $coupon->id,
                                    "from_user_id" => $sharedCoupon->from_user_id,
                                    "to_user_id" => $user->id,
                                    "reward" => $coupon->cashback_value ?? 0,
                                    "bill_value" => $bill_value,
                                    "discount" => $coupon->instant_discount ?? (($coupon->percentage_discount * $bill_value) / 100),
                                    "date" => now(),
                                ]);

                                // Update wallet balance for the user who shared the coupon
                                $walletUser = Wallet::where('user_id', $sharedCoupon->from_user_id)->first();
                                if($walletUser) {
                                    $balance = $walletUser->balance + $coupon->cashback_value;
                                    $walletUser->update(["balance" => $balance]);
                                } else {
                                    $walletUser = Wallet::create([
                                        'user_id' => $sharedCoupon->from_user_id,
                                        'balance' => $coupon->cashback_value ?? 0,
                                    ]);
                                }
                            } else {
                                $transaction = Transaction::create([
                                    "vendor_id" => $coupon->coupon_created_by,
                                    "coupon_id" => $coupon->id,
                                    "from_user_id" => $user->id,
                                    "reward" => 0,
                                    "bill_value" => $bill_value,
                                    "discount" => $coupon->instant_discount ?? (($coupon->percentage_discount * $bill_value) / 100),
                                    "date" => now(),
                                ]);
                                // Update wallet balance for the admin
                                $walletVendor = Wallet::where('user_id', 1)->first();
                                if($walletVendor) {
                                    $balance = $walletVendor->balance + $coupon->cashback_value;
                                    $walletVendor->update(["balance" => $balance]);
                                } else {
                                    $walletVendor = Wallet::create([
                                        'user_id' => 1,
                                        'balance' => $coupon->cashback_value ?? 0,
                                    ]);
                                }
                            }

                            // Update wallet balance for the vendor
                            $walletVendor = Wallet::where('user_id', $coupon->coupon_created_by)->first();
                            if($walletVendor) {
                                $balance = $walletVendor->balance + $coupon->cashback_value;
                                $walletVendor->update(["balance" => $balance]);
                            } else {
                                $walletVendor = Wallet::create([
                                    'user_id' => $coupon->coupon_created_by,
                                    'balance' => $coupon->cashback_value ?? 0,
                                ]);
                            }

                            // Create notification for the user
                            Notification::create([
                                "notifiable_id" => $user->id,
                                "title" => "Coupon Redeemed",
                                "message" => "You have successfully redeemed the " . $coupon->title_of_offer . " coupon",
                                "notification_by" => 1,
                                "coupon_id" => $coupon->id,
                            ]);

                            // Commit transaction
                            DB::commit();

                            return $this->rtrResponse(200, 'Coupon redeemed');
                        } catch (\Exception $e) {
                            // Roll back transaction on error
                            DB::rollBack();
                            throw $e;
                            return $this->rtrResponse(400, 'Coupon was not redeemed');
                        }
                    }
                    return $this->rtrResponse(400, 'OTP entered is incorrect');
                }
                return $this->rtrResponse(400, 'Coupon not found');
            }
        }
        return $this->rtrResponse(400, 'User not found');
    }

    /**
     * Search for coupons based on the provided search term and vendor ID.
     *
     * @param \Illuminate\Http\Request $request The request object containing the search term and vendor ID.
     * @return \Illuminate\Http\Response A JSON response containing the search results.
     */
    public function couponSearch(Request $request)
    {
        // Extract the search term from the request
        $searchTerm = $request->search;

        // Find the user with the provided vendor ID
        $user = User::find($request->vendor_id);

        // Check if the user exists
        if($user) {

            // Query the coupons based on the search term and vendor ID
            $coupons = Coupon::where(function($query) use ($searchTerm){
                $query->where('title_of_offer', 'like', '%' . $searchTerm . '%')
                    ->orWhere('coupon_code', 'like', '%' . $searchTerm . '%');
            })->where('coupon_created_by', $user->id)->get();

            // Return a JSON response with the search results
            return $this->rtrResponse(200, 'Coupons', $coupons);
        }

        // If the user doesn't exist, return a session invalid response
        return $this->rtrResponse(400, 'Session invalid');
    }

    /**
     * Perform validation on request data.
     *
     * @param mixed $request The request object containing the data to be validated.
     * @param array $validationInputs The validation rules to be applied.
     * @param array $validationError Additional error messages for validation rules (optional).
     * @return \Illuminate\Http\Response|null A JSON response containing validation errors if validation fails, otherwise null.
     */
    public function validation($request, $validationInputs, $validationError=[])
    {
        // Perform validation using Laravel Validator
        $validation = Validator::make($request->all(), $validationInputs, $validationError);

        // Check if validation fails
        if ($validation->fails()) {
            // Return a JSON response with validation errors
            return $this->rtrResponse(400, 'Validation failed', $validation->errors());
        }

        // Return null if validation passes
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
