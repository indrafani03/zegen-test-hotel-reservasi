<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HotelController;
use App\Http\Middleware\AuthAdminCheck;

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [HomeController::class, 'Index'])->name('home');
Route::get('/show-result-search', [HomeController::class, 'Search']);
Route::post('/book-now', [HomeController::class, 'BookNow']);

Route::get('/login', [AuthController::class, 'Login']);
Route::get('/register', [AuthController::class, 'Register']);
Route::post('/do-register', [AuthController::class, 'DoRegister']);
Route::post('/do-login', [AuthController::class, 'DoLogin']);
Route::get('/logout', [AuthController::class, 'Logout']);

Route::get('/my-booking', [HotelController::class, 'MyBooking']);
Route::get('/load-ajax-my-booking', [HotelController::class, 'MyBookingAjax']);
Route::post('/my-booking-update', [HotelController::class, 'MyBookingUpdate']);


Route::middleware([AuthAdminCheck::class])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/load-ajax-user', [UserController::class, 'LoadAjaxUser']);
    Route::post('/simpan-user', [UserController::class, 'SimpanUser']);
    Route::post('/hapus-user', [UserController::class, 'HapusUser']);


    Route::get('/hotels', [HotelController::class, 'index']);
    Route::post('/simpan-hotel', [HotelController::class, 'SimpanHotel']);
    Route::get('/load-ajax-hotels', [HotelController::class, 'LoadAjaxHotels']);
    Route::post('/hapus-hotel', [HotelController::class, 'HapusHotel']);

    Route::get('/report-reservasi', [HotelController::class, 'ReportReservasi']);
    Route::get('/load-ajax-hotel-reservasi-report', [HotelController::class, 'LoadAjaxHotelReservasiReport']);
    Route::post('/report-update-status-booking', [HotelController::class, 'ReportUpdateStatusBooking']);
    Route::post('/report-hapus-booking-hotel', [HotelController::class, 'ReportHapusBookingHotel']);
    
});





