<?php

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\SendEmail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\ExtracurricularController;

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

// Route::get('/testlogviewer', function () {
//     return Robot::all();
// });

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
// login limiter = 3
Route::post('/login', [AuthController::class, 'authenticate'])->middleware('guest')->middleware('throttle:login');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/students', [StudentController::class, 'index'])->middleware('auth');
Route::get('/student/{slug}', [StudentController::class, 'show'])->middleware('auth');
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


Route::get('/teachers', [TeacherController::class, 'index'])->middleware('auth', 'must-admin');
Route::get('/teacher/{id}', [TeacherController::class, 'show'])->middleware('auth');
Route::get('/teacher', [TeacherController::class, 'create'])->middleware('auth');
Route::post('/teacher', [TeacherController::class, 'store'])->middleware('auth');

Route::get('/test', [TestController::class, 'index']);
Route::get('/test/{id}', [TestController::class, 'show']);

// Route::get('/student-mass-update', [StudentController::class, 'massupdate']);


// route model binding

// Route::get('/students-test', function () {
//     $student = Student::all();
//     dd($student);
// });

// Route::get('/student-test/{id}', function (Request $request, $id) {
//     $student = Student::findOrFail($request->id)->toArray();
//     dd($student);
// });


// Route::get('/student-test/{student}', function (Student $student) {
//     dd($student->toArray());
// });

// send email

Route::get('/send-email', [SendEmail::class, 'index']);
