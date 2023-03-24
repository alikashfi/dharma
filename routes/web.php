<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\IndexController;
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

Route::view('/', 'home')->name('home');

Route::get('shop', [IndexController::class, 'shop'])->name('shop');
Route::get('product/{product}', [IndexController::class, 'product'])->name('product');
Route::get('category/{category}', [IndexController::class, 'category'])->name('category');

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
