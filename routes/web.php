<?php

use App\Http\Controllers\MobileController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('mobiles', MobileController::class);

Route::get('add-to-cart/{id}', [MobileController::class, 'addToCart']);
Route::get('cart', [MobileController::class, 'cart']);

Route::get('/login', [LoginController::class, 'show']);
Route::post('/login', [LoginController::class, 'perform'])->name('login.perform');


