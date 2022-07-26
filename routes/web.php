<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\JobLevelController;

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

Route::get('/list-jobs', [JobController::class, 'index'])->name('listJob');
Route::get('/create-job', [JobController::class, 'create'])->name('create-job');
Route::post('/store-job', [JobController::class, 'store'])->name('store-job');
Route::get('/edit-job/{id}/edit', [JobController::class, 'edit'])->name('edit-job');
Route::patch('/update-job/{id}/update', [JobController::class, 'update'])->name('update-job');
Route::get('/view-job/{id}', [JobController::class, 'view'])->name('view-job');
Route::post('/delete-job/{id}', [JobController::class, 'destroy'])->name('destroy-job');
Route::patch('/publish-job/{id}/publish', [JobController::class, 'publish'])->name('publish-job');

Route::get('/list-job-types', [TypeController::class, 'index'])->name('listType');
Route::post('/delete-job-type/{id}', [TypeController::class, 'destroy'])->name('destroy-type');
Route::post('/store-job-type', [TypeController::class, 'store'])->name('store-type');
Route::patch('/update-job-type/{id}', [TypeController::class, 'update'])->name('update-type');

Route::get('/list-job-levels', [JobLevelController::class, 'index'])->name('listLevel');
Route::post('/delete-job-level/{id}', [JobLevelController::class, 'destroy'])->name('destroy-level');
Route::post('/store-job-level', [JobLevelController::class, 'store'])->name('store-level');
Route::patch('/update-job-level/{id}', [JobLevelController::class, 'update'])->name('update-level');

Route::get('search-from-db', [JobController::class, 'searchDB']);