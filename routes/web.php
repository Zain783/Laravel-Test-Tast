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
Route::post('/addratings/{id}', [UserController::class, 'addratings']);
Route::get('/CashOnDelivery', [UserController::class, 'CashOnDelivery']);


//routes for Admin controller
Route::get('/admindashboard', [AdminController::class, 'dashboard']);
Route::get('/addbook', [AdminController::class, 'addbook']);
Route::get('/users', [AdminController::class, 'users']);
Route::get('/showbooks', [AdminController::class, 'books']);
Route::post('/addBookinTable', [AdminController::class, 'addBookinTable']);
Route::get('/addauthor', [AdminController::class, 'addauthor']);
Route::post('/storeauthor', [AdminController::class, 'storeauthor']);
Route::get('/delete_book/{id}', [AdminController::class, 'delete_book']);
Route::get('/edit_book/{id}', [AdminController::class, 'edit_book']);
Route::get('/showlikes', [AdminController::class, 'likes']);
Route::get('/showreviews', [AdminController::class, 'reviews']);
Route::get('/OrdersView', [AdminController::class, 'Orders']);
Route::get('/changeDeliveryStatus/{id}', [AdminController::class, 'changeDeliveryStatus']);



//stripe payment
// routes/web.php
Route::get('/stripe-payment', [StripeController::class, 'handleGet']);
Route::post('/stripe-payment', [StripeController::class, 'handlePost'])->name('stripe.payment');
