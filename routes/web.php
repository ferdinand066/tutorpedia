<?php

use App\Http\Controllers\Admin\DepositController as AdminDepositController;
use App\Http\Controllers\Admin\WithdrawController as AdminWithdrawController;
use App\Http\Controllers\Admin\TutorClassController as AdminTutorClassController;
use App\Http\Controllers\ClassRejectReasonController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\LearnController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\TutorClassController;
use App\Http\Controllers\TutorClassDetailController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WithdrawController;
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
    Route::prefix('class')->as('class.')->group(function(){
        Route::resource('detail', TutorClassDetailController::class)->only(['store']);
    });

    Route::prefix('teach')->as('teach.')->group(function(){
        Route::get('pending', [TutorController::class, 'pending'])->name('pending');
    });

    Route::prefix('admin')->as('admin.')->middleware('can:manage-data')->group(function(){
        Route::get('class/pending', [AdminTutorClassController::class, 'pending'])->name('class.pending');
        Route::get('deposit/pending', [AdminDepositController::class, 'pending'])->name('deposit.pending');
        Route::get('withdraw/pending', [AdminWithdrawController::class, 'pending'])->name('withdraw.pending');
        Route::resource('class', AdminTutorClassController::class)->only(['index', 'update']);
        Route::resource('reject', ClassRejectReasonController::class)->only(['store']);
        Route::resource('deposit', AdminDepositController::class);
        Route::resource('withdraw', AdminWithdrawController::class);
    });



    Route::resource('course', CourseController::class);
    Route::resource('class', TutorClassController::class);
    Route::resource('teach', TutorController::class)->only(['index']);
    Route::resource('learn', LearnController::class)->only(['index']);
    Route::resource('deposit', DepositController::class)->only(['index', 'store']);
    Route::resource('withdraw', WithdrawController::class)->only(['index', 'store']);
    Route::resource('profile', UserController::class);
    Route::resource('subscribe', SubscribeController::class)->only(['index', 'store', 'destroy']);
});