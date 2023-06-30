<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\PersonalFileController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ListController;

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
    return view('index');
});*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * Работа с личными делами
 */
Route::prefix('personal-file')->name('personal-file.')->group(function () {

    Route::get('/create', [PersonalFileController::class, 'create'])->name('create');
    Route::post('/create', [PersonalFileController::class, 'store'])->name('store');

    Route::get('/edit/file/{id}', [PersonalFileController::class, 'edit'])->name('edit-file');
    Route::post('/edit/file/{id}', [PersonalFileController::class, 'update'])->name('update-file');

    Route::get('/edit/search', [PersonalFileController::class, 'search'])->name('edit-search');
    Route::post('/edit/search/result', [PersonalFileController::class, 'find'])->name('edit-find');

});

/**
 * Работа со списками
 */
Route::prefix('students-lists')->name('students-lists.')->group(function () {

    Route::get('/search', [ListController::class, 'search'])->name('search');
    Route::post('/search/result', [ListController::class, 'find'])->name('find');

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

/**
 * Тестовый роут
 */
Route::match(['get', 'post'], '/test', [TestController::class, 'index'])->name('test-index');
