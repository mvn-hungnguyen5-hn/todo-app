<?php

use App\Http\Controllers\TodosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminUserController;
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

Route::get('/login-test', function () {
    return view('todos.login-test');
});
Route::get('login', [LoginController::class, 'showLoginForm'])->name('show.login')->middleware('check.route.login');
Route::post('login', [LoginController::class, 'processLogin'])->name('login');
Route::get('register', [LoginController::class, 'showRegisterForm'])->name('show.register');
Route::post('register',[LoginController::class, 'processRegister'])->name('register');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::resource('todos', TodosController::class)->middleware(['verify.login','can:view-list-task']);
Route::group(['prefix'=>'admin', 'middleware' => ['verify.login', 'check.role.admin']],function(){
    Route::get('list-user', [AdminUserController::class, 'index'])->name('admin.index');
    Route::get('create-user', [AdminUserController::class, 'showCreateUserForm'])->name('show.create-user');
    Route::post('create-user', [AdminUserController::class, 'processUserRegister'])->name('admin.register');
    Route::get('edit-user/{id}', [AdminUserController::class, 'showEditUserForm'])->name('show.edit-user');
    Route::put('edit-user/{id}', [AdminUserController::class, 'update'])->name('admin.update-user');
    Route::delete('destroy-user/{id}', [AdminUserController::class, 'destroy'])->name('admin.destoy-user');
    Route::get('show-user{id}', [AdminUserController::class, 'show'])->name('admin.show-user');
    Route::get('all-user-task', [AdminUserController::class, 'getAllTask'])->name('admin.all-task');
    Route::delete('delete-user-task/{id?}',[AdminUserController::class, 'processDestroyUserTask'])->name('admin.destoy-task');
});

Route::get('api/get-google-sign-in-url', [\App\Http\Controllers\Api\GoogleController::class, 'getGoogleSignInUrl'])->name('api.google.login');
Route::get('api/callback', [\App\Http\Controllers\Api\GoogleController::class, 'loginCallback']);