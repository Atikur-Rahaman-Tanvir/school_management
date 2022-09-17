<?php

use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\attendanceController;
use App\Http\Controllers\classController;
use App\Http\Controllers\departmentController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\subjectController;
use App\Http\Controllers\tutionFeesh;
use App\Models\Admission;
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

Route::group(['prefix' => 'class', 'as' => 'class.'], function () {
    Route::get('index', [classController::class, 'index'])->name('index');
    Route::post('store', [classController::class, 'store'])->name('store');
    Route::get('show', [classController::class, 'show'])->name('show');
    Route::post('update', [classController::class, 'update'])->name('update');
    Route::get('delete', [classController::class, 'delete'])->name('delete');
});
Route::group(['prefix' => 'department', 'as' => 'department.'], function () {
    Route::get('index', [departmentController::class, 'index'])->name('index');
    Route::post('store', [departmentController::class, 'store'])->name('store');
    Route::get('show', [departmentController::class, 'show'])->name('show');
    Route::post('update', [departmentController::class, 'update'])->name('update');
    Route::get('delete', [departmentController::class, 'delete'])->name('delete');
});

Route::group(['prefix' => 'tutionfees', 'as' => 'tutionfees.'], function () {
    Route::get('index', [tutionFeesh::class, 'index'])->name('index');
    Route::post('store', [tutionFeesh::class, 'store'])->name('store');
    Route::get('remove', [tutionFeesh::class, 'remove'])->name('remove');
});

Route::group(['prefix' => 'exam', 'as' => 'exam.'], function () {
    Route::get('index', [ExamController::class, 'index'])->name('index');
    Route::post('store', [ExamController::class, 'store'])->name('store');
    Route::get('show', [ExamController::class, 'show'])->name('show');
    Route::post('update', [ExamController::class, 'update'])->name('update');
    Route::get('delete', [ExamController::class, 'delete'])->name('delete');
});

Route::group(['prefix' => 'exam', 'as' => 'exam.'], function () {
    Route::get('index', [ExamController::class, 'index'])->name('index');
    Route::post('store', [ExamController::class, 'store'])->name('store');
    Route::get('show', [ExamController::class, 'show'])->name('show');
    Route::post('update', [ExamController::class, 'update'])->name('update');
    Route::get('delete', [ExamController::class, 'delete'])->name('delete');
});

Route::group(['prefix' => 'subject', 'as' => 'subject.'], function () {
    Route::get('index', [subjectController::class, 'index'])->name('index');
    Route::post('store', [subjectController::class, 'store'])->name('store');
    Route::get('show', [subjectController::class, 'show'])->name('show');
    Route::post('update', [subjectController::class, 'update'])->name('update');
    Route::get('delete', [subjectController::class, 'delete'])->name('delete');
    Route::get('search', [subjectController::class, 'search'])->name('search');
});

Route::group(['prefix' => 'admission', 'as' => 'admission.'], function () {
    Route::get('index', [AdmissionController::class, 'index'])->name('index');
    Route::post('store', [AdmissionController::class, 'store'])->name('store');
    Route::get('show', [AdmissionController::class, 'show'])->name('show');
    Route::post('update', [AdmissionController::class, 'update'])->name('update');
    Route::get('delete', [AdmissionController::class, 'delete'])->name('delete');
    Route::get('search', [AdmissionController::class, 'search'])->name('search');
    Route::get('show/department', [AdmissionController::class, 'show_department'])->name('show_department');
});

Route::group(['prefix' => 'attendance', 'as' => 'attendance.'], function () {
    Route::get('index', [attendanceController::class, 'index'])->name('index');
    Route::post('store', [attendanceController::class, 'store'])->name('store');
    Route::get('show', [attendanceController::class, 'show'])->name('show');
    Route::post('update', [attendanceController::class, 'update'])->name('update');
    Route::get('delete', [attendanceController::class, 'delete'])->name('delete');
    Route::get('search', [attendanceController::class, 'search'])->name('search');
    Route::get('show/department', [attendanceController::class, 'show_department'])->name('show_department');


    Route::post('take', [attendanceController::class, 'take_attendance'])->name('take');


    Route::get('show', [attendanceController::class, 'show_attendance'])->name('show');




});
