<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

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
