<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\Home\HomeController;
use App\Http\Controllers\Site\Major\MajorController;
use App\Http\Controllers\Site\Doctor\DoctorController;
use App\Http\Controllers\Site\Contact\ContactController;
use App\Http\Controllers\Site\Auth\LoginController;
use App\Http\Controllers\Site\Auth\RegisterController;
// use App\Http\Controllers\Site\Mail\Mailcontroller;
use App\Http\Controllers\Site\User\UserController;
use App\Http\Controllers\Site\Reservation\ReservationController;
use App\Http\Controllers\Site\Auth\ForgotPasswordController;
use App\Http\Controllers\Site\Auth\ResetPasswordController;
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


Route::get('/', HomeController::class)->name('home.index');
Route::resource('majors', MajorController::class);
Route::resource('/doctors', DoctorController::class);
Route::resource('/contact', ContactController::class);
// Route::get('/SendEmail', Mailcontroller::class)->name('SendEmail');

Route::middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::resource('/user', UserController::class);
    Route::resource('/reservation', ReservationController::class);
    Route::patch('/user/{user}/change-password', [UserController::class, 'changePassword'])->name('user.change-password');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
});
