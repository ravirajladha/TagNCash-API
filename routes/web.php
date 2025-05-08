<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'home/index');
Route::view('/home/referrer_signup', 'home/referrer_signup');
Route::view('/home/vendor_signup', 'home/vendor_signup');
Route::view('/terms&condition', 'home/privacy');
Route::view('/privacy', 'home/privacy');

Route::get('/admin', function () {
    return view('admin/login');
});

// -------------------------- AdminController routes ------------------------
/** Logout admin and redirect to the admin login page. */
Route::get('/admin/logout', function () {
    // Session::forget('key');
    Session::flush();
    return redirect('/admin/686587');
});

/** Display the admin login page. */
Route::view('/admin/686587', 'admin/login')->name('login');

/** Display the admin login page (alternative URL). */
Route::view('/admin/login/686587', 'admin/login')->name('login');

/** Display admin dashboard. */
Route::get('admin/index', [AdminController::class, "details"]);

/** Handle admin login. */
Route::post("/admin/login", [AdminController::class, "login"]);

/** Display all users for admin. */
Route::get("/admin/all_users", [AdminController::class, "all_users"]);

/** Display all vendors for admin. */
Route::get("/admin/all_vendors", [AdminController::class, "all_vendors"]);

/** Delete a user by admin. */
Route::get("/admin/delete_user/{id}", [AdminController::class, "delete_user"]);

// Restore a user by admin
Route::get('/admin/restore_user/{id}', [AdminController::class, 'restore_user']);

/** Delete a vendor by admin. */
Route::get("/admin/delete_vendor/{id}", [AdminController::class, "delete_vendor"]);

// Restore a vendor by admin
Route::get('/admin/restore_vendor/{id}', [AdminController::class, 'restore_vendor']);

/** View user or vendor profile by admin. */
Route::get("/admin/view_profile/{id}", [AdminController::class, "view_profile"]);

/** Update vendor approval status by admin. */
Route::post("/admin/update_vendor_approval/{id}", [AdminController::class, "update_vendor_approval"]);

/** Display all transactions for admin. */
Route::get("/admin/transactions", [AdminController::class, "transactions"]);

/** Display details of a specific transaction for admin. */
Route::get("/admin/transaction/{id}", [AdminController::class, "transaction"]);

/** Coupon activate and deactivate ajax request */
Route::get('/admin/coupon/{coupon}/{status}', [AdminController::class, 'couponStatus'])->name('couponstatuschange');
// -------------------------- AdminController routes ------------------------


#to create a storage link in the server
// Route::get('/link', function () {
//     $target = '/home4/kodstecu/tagncash2.kods.app/tagncash/storage/app/public';
//     $shortcut = '/home4/kodstecu/tagncash2.kods.app/storage';
//     symlink($target, $shortcut);
//  });
