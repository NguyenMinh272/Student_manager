<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\StudentController;
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

Route::prefix('/faculty')->group(function(){
    Route::get('/list',[FacultyController::class,'index'])->name('faculties.index');

    Route::get('/create',[FacultyController::class, 'create'])->name('faculties.create');
    Route::post('/store',[FacultyController::class,'store'])->name('faculties.store');

    Route::get('/edit/{id}',[FacultyController::class, 'edit'])->name('faculties.edit');
    Route::put('/update/{id}', [FacultyController::class,'update'])->name('faculties.update');

    Route::get('/delete/{id}', [FacultyController::class,'delete'])->name('faculties.delete');
});

Route::prefix('/subject')->group(function(){
    Route::get('/list',[SubjectController::class, 'index'])->name('subjects.index');

    Route::get('/create',[SubjectController::class, 'create'])->name('subjects.create');
    Route::post('/store',[SubjectController::class, 'store'])->name('subjects.store');

    Route::get('/edit/{id}', [SubjectController::class, 'edit'])->name('subjects.edit');
    Route::put('/update/{id}',[SubjectController::class, 'update'])->name('subjects.update');

    Route::get('/delete/{id}',[SubjectController::class, 'delete'])->name('subjects.delete');
});

Route::prefix('/student')->group(function(){
    Route::get('/list',[StudentController::class, 'index'])->name('students.index');

    Route::get('/create',[StudentController::class, 'create'])->name('students.create');
    Route::post('/store',[StudentController::class, 'store'])->name('students.store');

    Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/update/{id}',[StudentController::class, 'update'])->name('students.update');

    Route::get('/delete/{id}',[StudentController::class, 'delete'])->name('students.delete');
});
