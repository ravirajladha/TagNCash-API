<?php

use App\Http\Controllers\Api\User\CouponController as UserCoupon;
use App\Http\Controllers\Api\User\UserController;
use App\Http\Controllers\Api\User\WalletController;
use App\Http\Controllers\Api\UtilityController;
use App\Http\Controllers\Api\Vendor\CouponController as VendorCoupon;
use App\Http\Controllers\Api\Vendor\VendorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(UtilityController::class)->group(function () {
    // Routes related to utility functions
    Route::post('emailotp', 'emailOtp')->name('emailOtp'); // Route for sending email OTP
    Route::post('emailverify', 'emailVerify')->name('emailVerify'); // Route for verifying email
    Route::post('registers', 'register')->name('register'); // Route for user registration
    Route::post('forgotpasswordemailverify', 'forgotPasswordEmailVerify')->name('forgotPasswordEmailVerify'); // Route for verifying email for forgot password
    Route::post('forgotpasswordemailotp', 'forgotPasswordEmailVerifyOtp')->name('forgotPasswordEmailVerifyOtp'); // Route for sending OTP for forgot password
    Route::post('forgotpassword', 'forgotPasswordReset')->name('forgotPasswordReset'); // Route for resetting forgotten password
    Route::post('login', 'login')->name('login'); // Route for user login
});

Route::as('user')->prefix('user')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::post('profile/edit', 'editProfile')->name('editProfile');
        Route::get('allvendors/{user_id}', 'allVendors')->name('allVendors');
        Route::post('delete/{user_id}', 'deleteUser')->name('deleteUser');
        // Routes related to user management
        Route::as('notifications')->prefix('notifications')->group(function () {
            Route::get('{user_id}', 'allNotifications')->name('all'); // View all notifications for a user
            Route::get('read/{notification_id}', 'readNotifications')->name('read'); // Mark notification as read
        });
    });
    // Routes related to coupons for a user
    Route::as('coupons')->prefix('coupons')->controller(UserCoupon::class)->group(function () {
        Route::get('mycoupon/{user_id}', 'myCoupons')->name('myCoupons'); // View all coupons for a user
        Route::get('{user_id}', 'allCoupons')->name('showAll'); // View all coupons for a user
        Route::get('shared/{user_id}', 'sharedCoupons')->name('sharedCoupons'); // View shared coupons by this user
        Route::get('redeemed/{user_id}', 'redeemedCoupons')->name('redeemedCoupons'); // View redeemed coupons for this user
        Route::get('redeem/otp/{user_id}/{coupon_id}', 'redeemCouponOtp')->name('redeemCouponOtp'); // Generate OTP for redeeming a coupon
        Route::post('share', 'shareCoupon')->name('share'); // Share a coupon with another user
        Route::post('search', 'couponSearch')->name('CouponSearch'); // Route for searching coupons for user
    });
    Route::as('wallet')->prefix('wallet')->controller(WalletController::class)->group(function () {
        Route::get('transactions/{user_id}', 'walletTransactions')->name('walletTransactions'); // View wallet transactions
    });
});



Route::as('vendor')->prefix('vendor')->group(function () {
    // Define routes for managing business profiles
    Route::resource('businessprofile', VendorController::class)->only('store');
    Route::get('profileview/{vendorId}', [VendorController::class, 'businessProfileView'])->name('businessProfileView');
    Route::get('wallet/{vendor_id}', [VendorController::class, 'walletView'])->name('walletView');
    Route::post('delete/{vendor_id}', [VendorController::class, 'deleteVendor'])->name('deleteVendor');
    // Define routes for managing notifications
    Route::as('notifications')->prefix('notifications')->controller(VendorController::class)->group(function () {
        Route::get('{vendor_id}', 'notificationsView')->name('view'); // View unread notifications
        Route::get('read/{notification_id}', 'notificationsRead')->name('read'); // Mark notification as read
    });
    // Define routes for managing coupons
    Route::resource('coupon', VendorCoupon::class)->except('edit', 'create', 'index', 'update');
    // Define routes for specific coupon actions
    Route::as('coupon')->prefix('coupon')->controller(VendorCoupon::class)->group(function () {
        Route::post('{coupon_id}', 'update')->name('update');
        Route::get('all/{vendor_id}', 'allVendorCoupons')->name('all'); // View all coupons for a vendor
        Route::get('deactive/{vendor_id}', 'deactiveVendorCoupons')->name('deactive'); // View deactivated coupons for a vendor
        Route::get('redeemqueue/{vendor_id}', 'redeemUsersQueue')->name('redeemQueue');
        Route::get('redeem/{user_id}/{coupon_id}/{otp}/{bill_value}', 'redeemCoupon')->name('redeem');
        Route::post('search/cou', 'couponSearch')->name('CouponSearch'); // Route for searching coupons for vendor
    });
});
