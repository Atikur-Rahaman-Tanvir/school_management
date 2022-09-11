<?php

use App\Http\Controllers\classController;
use App\Http\Controllers\departmentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Auth::routes(['register' => false]);

Route::get('/', 'App\Http\Controllers\dashboardController@dashboard')->name('dashboard')->middleware('auth');

Route::group(['prefix' => 'class', 'as' => 'class.'], function(){
    Route::get('index', [classController::class, 'index'])->name('index');
    Route::post('store', [classController::class, 'store'])->name('store');
    Route::get('show', [classController::class, 'show'])->name('show');
    Route::post('update', [classController::class, 'update'])->name('update');
    Route::get('delete', [classController::class, 'delete'])->name('delete');
});
Route::group(['prefix' => 'department', 'as' => 'department.'], function(){
    Route::get('index', [departmentController::class, 'index'])->name('index');
    Route::post('store', [departmentController::class, 'store'])->name('store');
    Route::get('show', [departmentController::class, 'show'])->name('show');
    Route::post('update', [departmentController::class, 'update'])->name('update');
    Route::get('delete', [departmentController::class, 'delete'])->name('delete');
});







