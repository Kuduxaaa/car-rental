<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
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

Route::get('/', [PagesController::class, 'home']);
Route::get('/contact', [PagesController::class, 'contact']);
Route::get('/about-us', [PagesController::class, 'about']);
Route::get('/cars', [PagesController::class, 'cars']);
Route::get('/rental-terms', [PagesController::class, 'terms']);

Route::get('/auth/login', [AuthController::class, 'show'])->name('login');
Route::post('/auth/login', [AuthController::class, 'process'])->name('login')->middleware('throttle:20');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index'); 
    Route::get('/signout', [AuthController::class, 'logout'])->name('admin.logout');
});
    