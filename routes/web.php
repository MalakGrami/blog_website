<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

// views
Route::get('/', function () {return view('index');})->name('home');
Route::get('/register', function () {return view('auth/register');})->middleware('guest')->name('register');
Route::get('/login', function () {return view('auth/login');})->middleware('guest')->name('login');

// register
Route::post('/register', [AuthController::class,'postResgister'])->name('register')->middleware('guest');
// register
Route::post('/login', [AuthController::class,'postLogin'])->name('login')->middleware('guest');
// logout

Route::post('/logout', [AuthController::class,'logout'])->name('logout')->middleware('auth');

Route::get('/adminPanel', function () {return view('adminPanel/dashboard');})->middleware('authAdmin')->name('adminPanel');
