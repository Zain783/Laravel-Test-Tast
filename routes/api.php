<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/books', [ApiController::class, 'getBooks']);
// Route::get('/books', [ApiController::class, 'getBooks']);
Route::get('/login', [ApiController::class, 'login']);


Route::get('/getusers', function () {
    return  "some string";
});
