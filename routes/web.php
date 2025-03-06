<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SaveDataController;
use App\Http\Controllers\UserController;

// 🌟 Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');

// 🌟 Static Pages
Route::view('/shop-travel', 'shop-travel')->name('shop-travel');
Route::view('/get-the-app', 'get-the-app')->name('get-the-app');

// 🌟 Property Routes
Route::get('/list-your-property', [PropertyController::class, 'showForm'])->name('list-your-property');
Route::get('/register-property', [PropertyController::class, 'showForm'])->name('register-property');
Route::post('/register-property', [PropertyController::class, 'store'])->name('register-property.store');

// 🌟 Support Routes
Route::get('/support', [SupportController::class, 'index'])->name('support');

// 🌟 Trips & Search Routes
Route::get('/trips', [TripController::class, 'index'])->name('trips');
Route::get('/search', [SearchController::class, 'index'])->name('search');

// 🌟 Authentication Routes
Route::get('/sign-in', [AuthController::class, 'showSignInForm'])->name('sign-in');
Route::post('/sign-in', [AuthController::class, 'login'])->name('log-in');
Route::get('/sign-up', [AuthController::class, 'showSignUpForm'])->name('sign-up');
Route::post('/sign-up', [AuthController::class, 'signUp'])->name('sign-up.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 🌟 Account Creation Page
Route::get('/create-new-account', [PageController::class, 'createAccount'])->name('create-new-account');

// 🌟 Additional Routes
Route::view('/next-page', 'next-page')->name('next-page');
Route::get('/redirect-to-sign-in', [PageController::class, 'redirectToSignIn'])->name('redirect-to-sign-in');

Route::post('/property-data-save', [PropertyController::class, 'store'])->name('property-data-save');




Route::get('/list-your-property', function () { return view('list-your-property');})->name('list-your-property');




Route::get('/login', function () {
    return view('auth.login'); 
})->name('login');



Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');


Route::get('/login', [AuthController::class, 'showEmailLogin'])->name('login');
Route::post('/login', [AuthController::class, 'Login']);


Route::post('/email-login', [AuthController::class, 'emailLogin'])->name('email-login');




Route::get('/users', [UserController::class, 'index']);


use App\Http\Controllers\HostelController;

Route::get('/hostels', [HostelController::class, 'index']);
