<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


//route for Auth controller
Route::get('/login', [AuthController::class, 'login']);
Route::get('/registration', [AuthController::class, 'Register']);
route::post('/register', [AuthController::class, 'varifyregisterUser']);
route::post('/login-user', [AuthController::class, "loginUser"]);
route::get('/logout', [AuthController::class, "logout"]);


//routes for User controller
route::get('/dashboard', [UserController::class, "dashboard"]);
Route::get('/cart', [UserController::class, 'cart']);
Route::post('/addtocart/{id}', [UserController::class, 'addtocart']);
Route::get('/', [UserController::class, 'dashboard']);
Route::get('/removechartItem/{id}', [UserController::class, 'removechartItem']);
Route::get('/like_book/{id}', [UserController::class, 'like_book']);

//routes for Admin controller
Route::get('/admindashboard', [AdminController::class, 'dashboard']);
Route::get('/addbook', [AdminController::class, 'addbook']);
Route::get('/users', [AdminController::class, 'users']);
Route::get('/showbooks', [AdminController::class, 'books']);
Route::post('/addBookinTable', [AdminController::class, 'addBookinTable']);

Route::get('/delete_book/{id}', [AdminController::class, 'delete_book']);
Route::get('/edit_book/{id}', [AdminController::class, 'edit_book']);

//stripe payment
// routes/web.php
Route::get('/payment', [StripeController::class, 'showPaymentForm'])->name('payment.form');
Route::post('/payment', [StripeController::class, 'processPayment'])->name('payment.process');
Route::get('/payment/success', function() {
    return view('payment.success');
})->name('payment.success');
Route::get('/payment/failure', function() {
    return view('payment.failure');
})->name('payment.failure');
