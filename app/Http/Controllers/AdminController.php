<?php

namespace App\Http\Controllers;
// use DateTime;
// use Illuminate\Support\Facades\Session;
// use RealRashid\SweetAlert\Facades\Alert;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Hash;
// use App\Models\Users;
// use App\Models\Service_category;
// use App\Models\Discount;
// use App\Models\Auth;
// use App\Models\Wallet;
// use App\Models\Coupon;
// use App\Models\Profile;
// use App\Models\Vendors;
// use App\Models\Transaction;

use App\Models\BusinessProfile;
use App\Models\Coupon;
use App\Models\RedeemedCoupon;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    function login(Request $req)
    {
        $user = "";

        if (is_numeric($req->username)) {
            $email_verify_phone = User::where('phone', $req->username)->first();
        } else {
            $check_email = User::where('email', $req->username)->first();
        }
        if (empty($check_email) && empty($email_verify_phone)) {
            session()->put('failed', 'Invalid Username');
            return redirect('admin/login/686587');
        } else {
            if (!empty($check_email)) {
                $user_results  = $check_email;
                $password_res = $check_email->password;
            } else if (!empty($email_verify_phone)) {
                $user_results  = $email_verify_phone;
                $password_res = $email_verify_phone->password;
            }
            if (Hash::check($req->password, $password_res)) {
                $user = $user_results;
            } else {
                $user = "";
            }
            if (empty($user)) {
                session()->put('failed', 'Invalid Credentials');
                return redirect('admin/login/686587');
            } else {
                if ($user->type == "admin") {
                    Session::put('rexkod_admin_id', $user->id);
                    Session::put('rexkod_admin_name', $user->name);
                    Session::put('rexkod_admin_email', $user->email);
                    Session::put('rexkod_admin_phone', $user->phone);
                    Session::put('rexkod_login_type', $user->type);
                    return redirect('admin/index');
                } else {
                    session()->put('failed', 'You do not have access');
                    return redirect('admin/login/686587');
                }
            }
        }
    }

    // User Details, Vendor Details, Coupon Details and Transaction Details
    // For Admin Dashboard
    function details()
    {
        $user_count = User::where(['type' => 'user', 'status' => 1, 'hide' => 0])->count();
        $vendor_count = User::where(['type' => 'vendor', 'status' => 1, 'hide' => 0])->count();
        $coupon_count = Coupon::where("status", 1)->count();
        $redeemed_coupons = RedeemedCoupon::all();
        $redeemed_coupons_count = 0;
        // Iterate through each redeemed coupon
        foreach ($redeemed_coupons as $coupon) {
            // Increment the total count by the number of user IDs in the 'redeemed_by' array
            $redeemed_coupons_count += count($coupon->redeemed_by ?? []);
        }
        $wallet = Wallet::find(1);
        $transaction_count = Transaction::count();

        $data = [
            'usercount' => $user_count,
            'vendor_count' => $vendor_count,
            'coupon_count' => $coupon_count,
            'redeemed_coupons_count' => $redeemed_coupons_count,
            'total_reward_gained' => $wallet->balance,
            'transaction_count' => $transaction_count,
            // 'total_reward_gained' => $totalReward,
        ];
        return view('/admin/index', ['data' => $data]);
    }

    // Functionality For Displaying all the Vendors and their details
    function all_vendors()
    {
        $vendors = User::where(['type' => 'vendor', 'hide' => 0])->orderBy('id', 'desc')->get();
        $hideVendors = User::where(['type' => 'vendor', 'hide' => 1])->orderBy('id', 'desc')->get();

        $data = [
            'vendors' => $vendors,
            'hideVendors' => $hideVendors
        ];

        return view('admin/all_vendors', ['data' => $data]);
    }

    // Functionality For Displaying all the Users and their details
    function all_users()
    {
        $users = User::where(['type' => 'user', 'hide' => 0])->orderBy('id', 'desc')->get();
        $hideUsers = User::where(['type' => 'user', 'hide' => 1])->orderBy('id', 'desc')->get();

        $data = [
            'users' => $users,
            'hideUsers' => $hideUsers
        ];

        return view('admin/all_users', ['data' => $data]);
    }

    // Functionality For Deleting a Particular User
    function delete_user($id)
    {
        $result =  User::find($id);
        $result->hide = 1;
        $result->save();

        session()->put('failed', 'User Deleted');

        return redirect('admin/all_users');
    }

    function restore_user($id)
    {
        $user = User::find($id);
        $user->hide = 0;
        $user->save();

        // session()->put('success','User Restored');

        return redirect('admin/all_users')->with('success', 'User Restored');
    }

    // Functionality viewing a Particular Vendor Profile
    function view_profile($id)
    {
        $vendors = BusinessProfile::where('id', $id)->first();

        $data = [
            'vendors' => $vendors,
        ];

        return view('admin/view_profile', ['data' => $data]);
    }

    // Functionality For Deleting a Particular Vendor
    function delete_vendor($id)
    {
        DB::beginTransaction();
        try {
            $result =  User::find($id);
            $result->updateOrFail(["hide" => 1,]);
            $profile = $result->businessProfile;
            if ($profile) {
                $profile->updateOrFail(["hide" => 1]);
            }
            $coupons = Coupon::where("coupon_created_by", $result->id);
            $coupons->update(["status" => 0]);
            DB::commit();
            Notification::create([
                "notifiable_id" => $result->id,
                "title" => "Account Disabled",
                "message" => "Your account has been disabled by Admin",
                "read" => 0,
                "notification_by" => 1,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        session()->put('failed', 'Vendor Deleted');

        return redirect('admin/all_vendors');
    }

    function restore_vendor($id){
        DB::beginTransaction();
        try {
            $result =  User::find($id);
            $result->updateOrFail(["hide" => 0,]);
            $profile = $result->businessProfile;
            if ($profile) {
                $profile->updateOrFail(["hide" => 0]);
            }
            $coupons = Coupon::where("coupon_created_by", $result->id);
            $coupons->update(["status" => 1]);
            DB::commit();
            Notification::create([
                "notifiable_id" => $result->id,
                "title" => "Account Activated",
                "message" => "Your account has been activated by Admin",
                "read" => 0,
                "notification_by" => 1,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return redirect('admin/all_vendors')->with('success', 'Vendor Restored');
    }

    // Functionality For Updating a Particular Vendor's Status
    function update_vendor_approval($id, Request $req)
    {
        $status = $req->status;
        $vendor = User::find($id);
        $discounts = Coupon::where('coupon_created_by', $id)->get();
        if (!$vendor->businessProfile) {
            return redirect('/admin/all_vendors')->with('failed', 'This vendor has not created business profile');
        }

        $vendor->status = $status;
        $vendor->save();

        if ($status == 1) {
            session()->flash('success', 'Vendor Approved');
            $vendor->businessProfile->update(["status" => 1]);
            foreach ($discounts as $discount) {
                $discount->status = 1;
                $discount->save();
            }
            Notification::create([
                "notifiable_id" => $vendor->id,
                "title" => "Account Approved",
                "message" => "Your account has been approved by Admin",
                "read" => 0,
                "notification_by" => 1,
            ]);
        } elseif ($status == 0) {
            session()->flash('success', 'Vendor Disapproved');
            $vendor->businessProfile->update(["status" => 0]);
            foreach ($discounts as $discount) {
                $discount->status = 0;
                $discount->save();
            }
            Notification::create([
                "notifiable_id" => $vendor->id,
                "title" => "Account Disapproved",
                "message" => "Your account has been disapproved by Admin",
                "read" => 0,
                "notification_by" => 1,
            ]);
        } else {
            session()->flash('failed', 'Error Occurred');
        }
        return redirect('/admin/all_vendors');
    }

    // Functionality for Displaying all the Transaction Details
    function transactions()
    {
        $get_all_discounts = Coupon::orderBy('id', 'desc')->get();
        $data = [
            'get_all_discounts' => $get_all_discounts
        ];
        return view('admin/transactions', ['data' => $data]);
    }

    // Functionality for Displaying a Particular Transaction Detail
    function transaction($id)
    {
        $get_all_transactions = Transaction::where('coupon_id', $id)->get();
        $data = [
            'get_all_transactions' => $get_all_transactions
        ];
        return view('admin/transaction', ['data' => $data]);
    }

    function couponStatus(Coupon $coupon, $status)
    {
        if ($coupon) {
            $coupon->update(['status' => $status]);
            return response()->json([$coupon], 200);
        }
        return response()->json(['message' => 'Coupon not found'], 404);
    }
}
