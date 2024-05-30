<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
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

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/post-login', [LoginController::class, 'postLogin'])->name('login.post');
Route::get('/registration', [LoginController::class, 'inscription'])->name('register');
Route::post('/post-registration', [LoginController::class, 'postRegistration'])->name('register.post');
Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');;
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');



Route::get('/home', function () {
    return view('layouts.dashbord');
});

