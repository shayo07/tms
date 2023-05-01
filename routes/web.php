<?php

use App\Http\Controllers\LogbookController;
use App\Http\Controllers\SchemeController;
use App\Http\Controllers\SchoolLogbookController;
use App\Http\Controllers\SchoolSchemeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\UserController;
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

Route::resource('/darasa', DarasaController::class);

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index']);

Route::resource('/schoolscheme', SchoolSchemeController::class);

Route::resource('/schoollogbook', SchoolLogbookController::class);

Route::resource('/scheme', SchemeController::class);




