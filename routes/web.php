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
Route::prefix('personal-files')->name('personal-file.')->group(function () {

    Route::get('/create', [PersonalFileController::class, 'create'])->name('create');
    Route::post('/create', [PersonalFileController::class, 'store'])->name('store');

    Route::prefix('manage')->name('manage.')->group(function () {

        Route::get('/search', [PersonalFileController::class, 'search'])->name('search');
        Route::get('/search/result', [PersonalFileController::class, 'find'])->name('find');

        Route::get('/view/file/{id}', [PersonalFileController::class, 'show'])->name('show');

        Route::get('/edit/file/{id}', [PersonalFileController::class, 'edit'])->name('edit');
        Route::post('/edit/file/{id}', [PersonalFileController::class, 'update'])->name('update');

        Route::get('/export/file/{id}', [PersonalFileController::class, 'exportPersonalFileToWord'])->name('export-file');
        Route::get('/export/application/file/{id}', [PersonalFileController::class, 'exportApplicationToWord'])->name('export-application');

        Route::delete('/delete/item/{id}', [PersonalFileController::class, 'destroy'])->name('destroy');
    });

});

/**
 * Работа со списками
 */
Route::prefix('students-lists')->name('students-lists.')->group(function () {

    Route::prefix('view-and-print')->name('view-and-print.')->group(function () {
        Route::get('/', [ListController::class, 'filter'])->name('filter');
        Route::get('/filtered-list', [ListController::class, 'filter'])->name('filter');
    });

    Route::prefix('enrollment-manage')->name('enrollment-manage.')->group(function () {
        Route::get('/', [ListController::class, 'enrollmentManageIndex'])->name('index');
        Route::get('/filtered-list', [ListController::class, 'filter'])->name('filtered-list');
        Route::get('/change-status', [ListController::class, 'changeStatus'])->name('change-status');
    });

});

/**
 * Административные функции
 */
Route::prefix('admin')->name('admin.')->group(function () {

    /**/

    Route::prefix('manage')->name('manage.')->group(function () {

        Route::get('categories', [CategoryController::class, 'index'])->name('categories');

        Route::prefix('category')->name('category.')->group(function () {
            Route::get('/{slug}', [CategoryController::class, 'show'])->name('show');
            Route::post('/create', [CategoryController::class, 'store'])->name('store');
            Route::delete('/delete/item/{id}', [CategoryController::class, 'destroy'])->name('destroy');
        });

        /*Route::prefix('users-manage')->name('users-manage.')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
        });*/
    });
});
