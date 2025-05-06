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
use App\Http\Controllers\ChatController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\HostelController;

// 🌟 Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');

// 🌟 Static Pages
Route::view('/shop-travel', 'shop-travel')->name('shop-travel');
Route::view('/get-the-app', 'get-the-app')->name('get-the-app');

// 🌟 Property Routes
Route::get('/list-your-property', [PropertyController::class, 'showForm'])->name('list-your-property');
Route::get('/register-property', [PropertyController::class, 'showForm'])->name('register-property');
Route::post('/register-property', [PropertyController::class, 'store'])->name('register-property.store');
Route::post('/property-data-save', [PropertyController::class, 'store'])->name('property-data-save');

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

// 🌟 Email Login Specific Routes
Route::get('/login', [AuthController::class, 'showEmailLogin'])->name('login');
Route::post('/login', [AuthController::class, 'Login']);
Route::post('/email-login', [AuthController::class, 'emailLogin'])->name('email-login');

// 🌟 Account Creation Page
Route::get('/create-new-account', [PageController::class, 'createAccount'])->name('create-new-account');

// 🌟 Additional Routes
Route::view('/next-page', 'next-page')->name('next-page');
Route::get('/redirect-to-sign-in', [PageController::class, 'redirectToSignIn'])->name('redirect-to-sign-in');

// 🌟 User and Hostel Routes
Route::get('/users', [UserController::class, 'index']);
Route::get('/hostels', [HostelController::class, 'index']);

// 🌟 Chat Routes (Only for Authenticated Users)
Route::middleware(['auth'])->group(function () {
    Route::get('/chat', [ChatController::class, 'index'])->name('chat');
    Route::get('/messages', [ChatController::class, 'fetchMessages']);
    Route::post('/messages', [ChatController::class, 'sendMessage']);
});

// 🌟 Feed Route
Route::get('/feed', [FeedController::class, 'index'])->name('feed.index');

// 🌟 Welcome Page
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

// 🌟 Image Upload Route
Route::post('/upload-image', [ImageController::class, 'uploadImage'])->name('upload.image');



Route::delete('/delete-image', [ImageController::class, 'deleteImage'])->name('delete.image');





// Delete image route (important!)
Route::delete('/delete-image', [ImageController::class, 'deleteImage'])->name('delete.image');


Route::get('/upload-form', [ImageController::class, 'showUploadForm'])->name('upload.form');



Route::get('/image/{id}', [ImageController::class, 'show'])->name('image.detail');
