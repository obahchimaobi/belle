<?php

use App\Models\User;
use App\Mail\RegisterMail;
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
Route::get('/email/verify/', function () {
    $token = request()->query('token');
    $user = User::where('token', $token)->firstOrFail();

    return view('auth.email.verify-template', compact('token'));
})->name('email.verify');

Route::get('/resend-code', function () {
    $token = request()->query('token');
    $user = User::where('token', $token)->firstOrFail();

    $email = $user->email;
    $code = $user->verification_code;

    Mail::to($email)->send(new RegisterMail($user, $token, $email, $code));

    return redirect()->route('email.verify', ['token' => $token])->with('success', 'A new code has been sent to your email');
})->name('code.resend');

Route::get('/reset/password', function () {
    $token = request()->query('token');
    $user = User::where('token', $token)->firstOrFail();

    return view('auth.reset-password', compact('token'));
})->name('password.reset')->middleware('signed');

Route::get('/logout', function () {
    Auth::logout();

    return redirect()->route('home');
})->name('logout');
