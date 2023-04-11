<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\VerifyEmailController;

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

Route::get('', [IndexController::class, 'home'])->name('home');


Route::get('about', [IndexController::class, 'about'])->name('about');
Route::get('contact', [IndexController::class, 'contact'])->name('contact');
Route::get('faq', [IndexController::class, 'faq'])->name('faq');
Route::get('privacy-policy', [IndexController::class, 'privacyPolicy'])->name('privacy-policy');

Route::get('shop', [IndexController::class, 'shop'])->name('shop');
Route::get('product/{product}', [IndexController::class, 'product'])->name('product');
Route::get('category/{category}', [IndexController::class, 'category'])->name('category');
Route::get('cart', [IndexController::class, 'cart'])->name('cart');
Route::get('checkout', [IndexController::class, 'checkout'])->name('checkout')->middleware('auth');

Route::post('order', [OrderController::class, 'order'])->name('order')->middleware('auth');
Route::get('pay-order/{order}', [OrderController::class, 'createPaymentAndPay'])->name('pay-order')->middleware('auth');
Route::get('payment-callback/{uuid}', [OrderController::class, 'paymentCallback'])->name('payment-callback')->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('guest')->group(function () {
    Route::view('register', 'user.register')->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::view('login', 'user.login')->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    // Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    //
    // Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    //
    // Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    //
    // Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});


Route::middleware('auth')->group(function () {
        Route::redirect('user', 'user/dashboard');
        Route::view('user/dashboard', 'user.dashboard')->name('user.dashboard');


//     Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');
//
//     Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
//
//     Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');
//
//     Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
//
//     Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
//
//     Route::put('password', [PasswordController::class, 'update'])->name('password.update');
//
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

Route::controller(UserController::class)->middleware('auth')->prefix('user')->name('user.')->group(function () {
    Route::redirect('', 'user/dashboard');
    Route::get('dashboard', 'dashboard')->name('dashboard');
    Route::get('orders', 'orders')->name('orders');
    Route::get('payments', 'payments')->name('payments');
    Route::get('details', 'details')->name('details');
    Route::post('details', 'detailsForm');
    Route::get('settings', 'settings')->name('settings');
    Route::post('settings', 'settingsForm');
});