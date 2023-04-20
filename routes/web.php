<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
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

Route::get('/', function () {
    return view('index');
});

/**
 * Работа с личными делами
 */
Route::prefix('personal-file')->name('personal-file.')->group(function () {

    Route::get('/create', [PersonalFileController::class, 'create'])->name('create');

    Route::get('/edit/search', [PersonalFileController::class, 'search'])->name('edit-search');
    Route::get('/edit/file/{id}', [PersonalFileController::class, 'edit'])->name('edit-file');

    Route::get('/view/search', [PersonalFileController::class, 'search'])->name('view-search');
    Route::get('/view/file/{id}', [PersonalFileController::class, 'view'])->name('view-file');

});

/**
 * Административные функции
 */
Route::prefix('admin')->name('admin.')->group(function () {

    Route::prefix('users-management')->name('users-management.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/user/{id}', [UserController::class, 'edit'])->name('user');
    });

    Route::prefix('categories-editor')->name('categories-editor.')->group(function () {

        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/category/faculties', [CategoryController::class, 'edit'])->name('faculties');
        Route::get('/category/languages', [CategoryController::class, 'edit'])->name('languages');
        Route::get('/category/nationality', [CategoryController::class, 'edit'])->name('nationality');
        Route::get('/category/decrees', [CategoryController::class, 'edit'])->name('decrees');

    });

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
