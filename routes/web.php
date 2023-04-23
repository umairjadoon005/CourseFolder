<?php

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


Route::group(['middleware' => 'web'], function () {
Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('course-descriptions', App\Http\Controllers\CourseController::class);
Route::resource('course-outlines', App\Http\Controllers\CourseOutlineController::class);
Route::get('/samples/download/{id}', [App\Http\Controllers\SamplesController::class,'Download'])->name('samples.download');
Route::get('/samples/print/{id}', [App\Http\Controllers\SamplesController::class,'Print'])->name('samples.print');
Route::resource('samples', App\Http\Controllers\SamplesController::class);
Route::get('/lecture-notes/download/{id}', [App\Http\Controllers\LectureNotesController::class,'Download'])->name('lecture-notes.download');
Route::get('/lecture-notes/print/{id}', [App\Http\Controllers\LectureNotesController::class,'Print'])->name('lecture-notes.print');
Route::resource('lecture-notes', App\Http\Controllers\LectureNotesController::class);
Route::get('/question-papers/download/{id}', [App\Http\Controllers\QuestionPapersController::class,'Download'])->name('question-papers.download');
Route::get('/question-papers/print/{id}', [App\Http\Controllers\QuestionPapersController::class,'Print'])->name('question-papers.print');
Route::resource('question-papers', App\Http\Controllers\QuestionPapersController::class);
Route::get('/attendance/download/{id}', [App\Http\Controllers\AttendanceController::class,'Download'])->name('attendance.download');
Route::get('/attendance/print/{id}', [App\Http\Controllers\AttendanceController::class,'Print'])->name('attendance.print');
Route::resource('attendance', App\Http\Controllers\AttendanceController::class);
Route::get('/results/download/{id}', [App\Http\Controllers\ResultController::class,'Download'])->name('results.download');
Route::get('/results/print/{id}', [App\Http\Controllers\ResultController::class,'Print'])->name('results.print');
Route::resource('results', App\Http\Controllers\ResultController::class);

Route::resource('logs', App\Http\Controllers\CourseLogController::class);

Route::get('/model-solutions/download/{id}', [App\Http\Controllers\ModelSolutionsController::class,'Download'])->name('paper-solutions.download');
Route::get('/model-solutions/print/{id}', [App\Http\Controllers\ModelSolutionsController::class,'Print'])->name('paper-solutions.print');
Route::get('/profile', [App\Http\Controllers\HomeController::class,'settings'])->name('profile.index');
Route::post('/profile', [App\Http\Controllers\HomeController::class,'store'])->name('profile.store');
Route::resource('model-solutions', App\Http\Controllers\ModelSolutionsController::class);
});
