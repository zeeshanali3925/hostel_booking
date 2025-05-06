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
use App\Http\Controllers\TravelController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\CarBookingController;
use App\Http\Controllers\TravelStaysController;
use App\Http\Controllers\CruiseController;
use App\Models\Hostel;

// 🏠 Home Page
Route::get('/', [HostelController::class, 'index'])->name('home');

// 📄 Static Pages
Route::view('/shop-travel', 'shop-travel')->name('shop-travel');
Route::view('/get-the-app', 'get-the-app')->name('get-the-app');

// 🏢 Property Routes
Route::get('/list-your-property', [PropertyController::class, 'showForm'])->name('list-your-property');
Route::get('/register-property', [PropertyController::class, 'showForm'])->name('register-property');
Route::post('/register-property', [PropertyController::class, 'store'])->name('register-property.store');
Route::post('/property-data-save', [PropertyController::class, 'store'])->name('property-data-save');

// 🆘 Support Page
Route::get('/support', [SupportController::class, 'index'])->name('support');

// 🧳 Trip & Search
Route::get('/trips', [TripController::class, 'index'])->name('trips');
Route::get('/search', [SearchController::class, 'index'])->name('search');

// 🔐 Auth Routes
Route::get('/sign-in', [AuthController::class, 'showSignInForm'])->name('sign-in');
Route::post('/sign-in', [AuthController::class, 'login'])->name('log-in');
Route::get('/sign-up', [AuthController::class, 'showSignUpForm'])->name('sign-up');
Route::post('/sign-up', [AuthController::class, 'signUp'])->name('sign-up.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 📧 Email Login
Route::get('/login', [AuthController::class, 'showEmailLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/email-login', [AuthController::class, 'emailLogin'])->name('email-login');

// 👤 Create Account
Route::get('/create-new-account', [PageController::class, 'createAccount'])->name('create-new-account');

// 🔁 Redirect Page
Route::view('/next-page', 'next-page')->name('next-page');
Route::get('/redirect-to-sign-in', [PageController::class, 'redirectToSignIn'])->name('redirect-to-sign-in');

// 👥 User & Hostel Routes
Route::get('/users', [UserController::class, 'index']);
Route::get('/hostels', [HostelController::class, 'index']);

// 💬 Chat Routes (authenticated users only)
Route::middleware(['auth'])->group(function () {
    Route::get('/chat', [ChatController::class, 'index'])->name('chat');
    Route::get('/messages', [ChatController::class, 'fetchMessages']);
    Route::post('/messages', [ChatController::class, 'sendMessage']);
});

// 📰 Feed Page
Route::get('/feed', [FeedController::class, 'index'])->name('feed.index');

// 👋 Welcome Page
Route::get('/welcome', [ImageController::class, 'connect'])->name('welcome');

// 🖼️ Image Upload & Delete
Route::get('/upload-form', [ImageController::class, 'showUploadForm'])->name('upload.form');
Route::post('/upload-image', [ImageController::class, 'upload'])->name('upload.image');
Route::delete('/delete-image', [ImageController::class, 'destroy'])->name('delete.image');

// 🔍 Single Image View + Load More
Route::get('/image/{id}', [ImageController::class, 'show'])->name('image.show');
Route::get('/load-more-images/{lastId}', [ImageController::class, 'loadMoreImages']);

// 🚗 Car Booking System
Route::get('/car-booking', [CarController::class, 'index'])->name('car-booking');
Route::get('/car-booking/{car}', [CarController::class, 'show'])->name('car.show');
Route::post('/car-booking/{car}/book', [CarController::class, 'book'])->name('car.book');
Route::post('/book-car/{name}', [CarBookingController::class, 'book'])->name('car.book');

// ✈️ Flight Booking System
Route::get('/book-flight/{id}', [FlightController::class, 'index'])->name('flight.book');
Route::post('/flight/book/{name}', [FlightController::class, 'store'])->name('flight.book');

// 🧳 Travel Tabs (Flights, Stays, Car Booking, Things to do, Cruisis)
Route::get('/flights', [TravelController::class, 'flights'])->name('flights');
Route::get('/stays', [travelstaysController::class, 'stays'])->name('stays');
Route::get('/car_booking', [TravelController::class, 'car_booking'])->name('car_booking');
Route::get('/things', [TravelController::class, 'things'])->name('things');

// 🎉 Booking Success Page
Route::get('/booking-success', function () {
    return view('travel.success');
})->name('travel.success');

// 📦 Travel Packages
Route::get('/pakages', [PackageController::class, 'index'])->name('packages.index');



// Route::get('/packages', [PackageController::class, 'index'])->name('packages.index');
// Route::get('/packages/create', [PackageController::class, 'create'])->name('packages.create');
// Route::post('/packages', [PackageController::class, 'store'])->name('packages.store');
// Route::get('/packages/{id}', [PackageController::class, 'show'])->name('packages.show');
// Route::get('/packages/{id}/book', [PackageController::class, 'book'])->name('packages.book');
// Route::post('/packages/{id}/book', [PackageController::class, 'storeBooking'])->name('packages.book.store');





// 🎯 Test Route
Route::get('/pakistan', function () {
    return 'name';
})->name('simple-name');




Route::get('/pakages/{id}', [PackageController::class, 'show'])->name('packages.show');




// routes/web.php

Route::get('/travel', function () {
    return view('travel.index'); // ya jis bhi file ka naam hy travel ke andar
});



Route::get('/book/{id}', [travelstaysController::class, 'book'])->name('stay.book');

Route::get('/stay/confirm/{id}', [travelstaysController::class, 'confirm'])->name('stay.confirm');


Route::get('/stays', [travelstaysController::class, 'stays'])->name('stays.index');

Route::get('/stay/{id}', [travelstaysController::class, 'show'])->name('stay.show');



// 🧳 Travel Tabs (Cruisis)
Route::get('/cruisis', [CruiseController::class, 'cruisis'])->name('cruisis');



Route::post('/hostels/store', [HostelController::class, 'store'])->name('hostel.store');
