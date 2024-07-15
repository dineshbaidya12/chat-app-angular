<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\user\DefaultController as UserController;
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

Route::get('/', [LoginController::class, 'welcome'])->name('base');
Route::get('register', [LoginController::class, 'register'])->name('register');
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('userLogout');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');


Route::group(['middleware' => 'userLogin'], function () {
    Route::get('/chat', [UserController::class, 'index'])->name('chat-home');
    Route::post('/change-theme', [UserController::class, 'changeTheme']);
});

