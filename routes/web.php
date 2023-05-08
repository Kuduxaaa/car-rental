<?php

use App\Http\Controllers\MessagesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SearchController;
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

Route::post('/contact/send', [MessagesController::class, 'send'])->name('message.send');

Route::get('/auth/login', [AuthController::class, 'show'])->name('login');
Route::post('/auth/login', [AuthController::class, 'process'])->name('login')->middleware('throttle:20');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index'); 
    Route::get('/signout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::group(['namespace' => '\App\Http\Controllers\Admin'], function () {
        Route::get('/users', 'UsersController@index')->name('users');
        Route::get('/users/delete/{id}', 'UsersController@delete')->name('users.delete');
        Route::post('/users/add', 'UsersController@create')->name('add_user');

        Route::get('/categories', 'CategoriesController@index')->name('categories');
        Route::get('/categories/delete/{id}', 'CategoriesController@delete')->name('categories.delete');        
        Route::post('/categories/add', 'CategoriesController@create')->name('categories.add');
        
        Route::get('/filters', 'FiltersController@index')->name('filters');
        Route::get('/filters/delete/{id}', 'FiltersController@delete')->name('filters.delete');
        Route::post('/filters/add', 'FiltersController@create')->name('filters.create');

        Route::get('/messages', 'MessagesController@index')->name('messages');
        Route::get('/messages/delete/{id}', 'MessagesController@delete')->name('messages.delete');

        Route::get('/cars', 'CarsController@index')->name('cars');
    });
});

Route::get('/test', [SearchController::class, 'index'])->name('test');
Route::get('/test/search', [SearchController::class, 'search'])->name('test.search');


// TODO:
//  - Category (add/list/remove)              (-)
//  - Cars (Add/list/remove/edit)             ()
//  - Orders (accept/list/remove) + mailto    ()
//  - Messages (list/remove)                  (-)
//  - Add/remove custom filters               (-)
//  - Users (add/list/delete)                 (-)