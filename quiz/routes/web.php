<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\HomeController;

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
Route::get('register/login', [App\Http\Controllers\RegisterController::class, 'login'])->name('register.login');
Route::post('register/store', [App\Http\Controllers\RegisterController::class, 'store'])->name('register.store');

Auth::routes();
Route::group(['middleware' => ['role:admin', 'auth']], function () {
    Route::get('home', [HomeController::class, 'index']);
    Route::resource('quiz', QuizController::class);
    Route::resource('question', QuestionController::class);

});
Route::group(['middleware' => ['role:student', 'auth']], function () {
    Route::get('student/getData', [StudentController::class, 'getData']);
    Route::get('student', [StudentController::class, 'index']);
    Route::get('student/quiz/{id}', [StudentController::class, 'quiz']);

});
