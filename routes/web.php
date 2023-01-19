<?php

use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web route  s for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/students', [StudentController::class, 'index'])->middleware('auth');
Route::get('/student/{id}', [StudentController::class, 'show'])->middleware('auth');
Route::get('/student-add', [StudentController::class, 'create'])->middleware('auth');
Route::post('/student', [StudentController::class, 'store'])->middleware('auth');
Route::get('/student-edit/{id}', [StudentController::class, 'edit'])->middleware('auth');
Route::put('/student/{id}', [StudentController::class, 'update'])->middleware('auth');

Route::delete('/student-delete/{id}', [StudentController::class, 'destroy'])->middleware(['auth', 'must-admin']);

Route::get('/student-deleted', [StudentController::class, 'deletedStudent'])->middleware('auth');
Route::get('/student/{id}/restore', [StudentController::class, 'restoreStudent'])->middleware('auth');
Route::get('/student/{id}/forcedelete', [StudentController::class, 'forceDeleteStudent'])->middleware('auth');

Route::get('/classes', [ClassRoomController::class, 'index'])->middleware('auth');
Route::get('/class/{id}', [ClassRoomController::class, 'show'])->middleware('auth');
Route::get('/class', [ClassRoomController::class, 'create'])->middleware('auth');
Route::post('/class', [ClassRoomController::class, 'store'])->middleware('auth');

Route::get('/extracurriculars', [ExtracurricularController::class, 'index'])->middleware('auth');
Route::get('/extracurricular/{id}', [ExtracurricularController::class, 'show'])->middleware('auth');
Route::get('/extracurricular', [ExtracurricularController::class, 'create'])->middleware('auth');
Route::post('/extracurricular', [ExtracurricularController::class, 'store'])->middleware('auth');


Route::get('/teachers', [TeacherController::class, 'index'])->middleware('auth');
Route::get('/teacher/{id}', [TeacherController::class, 'show'])->middleware('auth');
Route::get('/teacher', [TeacherController::class, 'create'])->middleware('auth');
Route::post('/teacher', [TeacherController::class, 'store'])->middleware('auth');
