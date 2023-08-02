<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ListController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PersonalFileController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

/**
 * Работа с личными делами
 */
Route::prefix('personal-file')->name('personal-file.')->group(function () {

    Route::get('/create', [PersonalFileController::class, 'create'])->name('create');
    Route::post('/create', [PersonalFileController::class, 'store'])->name('store');

    Route::prefix('manage')->name('manage.')->group(function () {

        Route::get('/search', [PersonalFileController::class, 'search'])->name('search');
        Route::get('/search/result', [PersonalFileController::class, 'find'])->name('find');

        Route::get('/view/file/{id}', [PersonalFileController::class, 'show'])->name('show');

        Route::get('/edit/file/{id}', [PersonalFileController::class, 'edit'])->name('edit');
        Route::post('/edit/file/{id}', [PersonalFileController::class, 'update'])->name('update');

        Route::get('/print/file/{id}', [PersonalFileController::class, 'print'])->name('print');

        Route::get('/delete/file/{id}', [PersonalFileController::class, 'destroy'])->name('destroy');
    });

});

/**
 * Работа со списками
 */
Route::prefix('students-lists')->name('students-lists.')->group(function () {

    Route::get('/search', [ListController::class, 'index'])->name('index');
    Route::get('/search/result', [ListController::class, 'show'])->name('show');

});

/**
 * Административные функции
 */
Route::prefix('admin')->name('admin.')->group(function () {

    Route::prefix('users-manage')->name('users-manage.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
    });

    Route::prefix('categories-manage')->name('categories-manage.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
    });

});
