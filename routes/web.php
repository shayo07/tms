<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\JournalReportController;
use App\Http\Controllers\LessonDevController;
use App\Http\Controllers\LessonDevelopmentController;
use App\Http\Controllers\LessonEvaluationController;
use App\Http\Controllers\LessonPlanController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\SchemeController;
use App\Http\Controllers\SchoolAttendanceController;
use App\Http\Controllers\SchoolJournalController;
use App\Http\Controllers\SchoolLogbookController;
use App\Http\Controllers\SchoolSchemeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\UserController;
use App\Models\Lesson_evaluation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DarasaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();


Route::resource('/students', StudentController::class);

Route::resource('/term', TermController::class);

Route::resource('/system-users',UserController::class);

Route::resource('/logbook', LogbookController::class);

Route::get('/mylogbooks/{schoollogbook}', [SchoolLogbookController::class, 'viewlogs']);

Route::get('/myschemes/{schoolscheme}', [SchoolSchemeController::class, 'viewschemes']);

Route::resource('/darasa', DarasaController::class);

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index']);

Route::resource('/schoolscheme', SchoolSchemeController::class);

Route::resource('/schoollogbook', SchoolLogbookController::class);

Route::resource('/scheme', SchemeController::class);

Route::resource('/lesson_development', LessonDevelopmentController::class);

Route::resource('/lesson_plan', LessonPlanController::class);

Route::resource('/lesson_dev', LessonDevController::class);

Route::resource('/lesson_evaluation', LessonEvaluationController::class);

Route::resource('/school_journal', SchoolJournalController::class);

Route::resource('/journal', JournalController::class);

Route::resource('/journal_report', JournalReportController::class);

Route::resource('/classroom', ClassesController::class);

Route::resource('/school_attendance', SchoolAttendanceController::class);

Route::resource('/attendance', AttendanceController::class);

Route::resource('/subject', SubjectController::class);



