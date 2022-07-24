<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'indexLogin'])->name('login');
Route::post('/proses-login', [AuthController::class, 'prosesLogin'])->name('prosesLogin');
Route::get('/register', [AuthController::class, 'indexRegister'])->name('register');
Route::post('/proses-register', [AuthController::class, 'prosesRegister'])->name('prosesRegister');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::view('/home', 'pages.home')->name('home');
Route::get('/create-job', [JobController::class, 'create'])->name('create-job');

Route::get('/list-jobs', [JobController::class, 'index'])->name('listJob');
Route::get('search-from-db', [JobController::class, 'searchDB']);