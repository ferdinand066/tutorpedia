<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\TutorClassController;
use App\Http\Controllers\TutorController;
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

Route::get('/', function () {
    if(Auth::user()){
        return redirect()->route('home');
    } else {
        return view('welcome');
    }
});
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::post('course/data', [CourseController::class, 'data'])->name('course.data');
    Route::resource('course', CourseController::class);
    Route::resource('class', TutorClassController::class);
    Route::resource('teach', TutorController::class)->only(['index']);
});