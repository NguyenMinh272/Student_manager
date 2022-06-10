<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RegisterSubjectController;
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
Route::resource('faculties', FacultyController::class);
Route::resource('students',StudentController::class);
Route::resource('subjects',SubjectController::class);

Route::get('/students/subjects/{id}',
    [StudentController::class, 'createSubjects'])->name('students.subjects.createSubjects');
Route::post('/students/subjects/{id}',
    [StudentController::class, 'storeSubject'])->name('students.subjects.storeSubject');

