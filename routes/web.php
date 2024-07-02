<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

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

Route::get('success', function () {
    return view('success');
})->name('success');

Route::get('error', function () {
    return view('error');
})->name('error');


Route::post('register', [RegisterController::class, 'register'])->name('register');

Route::get('verify-otp', function () {
    return view('verify');
})->name('verify.otp');

Route::post('verify-otp', [RegisterController::class, 'verifyOtp'])->name('verify.otp');