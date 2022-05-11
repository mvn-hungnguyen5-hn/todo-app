<?php

use App\Http\Controllers\TodosController;
use App\Http\Controllers\LoginController;
use Illuminate\Routing\RouteRegistrar;
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
    return view('welcome');
});
Route::get('login', [LoginController::class, 'showLoginForm']);
Route::post('login', [LoginController::class, 'processLogin'])->name('login');
Route::get('register', [LoginController::class, 'showRegisterForm'])->name('show.register');
Route::post('register',[LoginController::class, 'processRegister'])->name('register');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::resource('todos', TodosController::class);
