<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\AuthController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about_us'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/shop', [PageController::class, 'shop'])->name('shop');
Route::get('/wishlist', [PageController::class, 'wishlist'])->name('wishlist');

// Authentication Routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/forgot-password', [AuthController::class, 'forgot_password'])->name('forgot.password');

// EMAIL VERIFICATIONN ROUTE
Route::get('/email/verify/{token}', function ($token) {
    $user = User::where('token', $token)->firstOrFail();

    // if (! hash_equals(sha1($user->otp), $hash)) {
    //     abort(403, 'Invalid verification link.');
    // }

    if ($user->email_verified_at) {
        return Redirect::route('login')->with('error', 'Your email is already verified.');
    }

    // $user->update(['email_verified_at' => now()]);
    $user->email_verified_at = now();
    $user->save();

    return Redirect::route('login')->with('success', 'Your email has been successfully verified.');
})->middleware('signed')->name('email.verify');
