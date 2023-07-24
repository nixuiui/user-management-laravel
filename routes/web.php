<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoleController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',         [AuthController::class, 'loginForm'])->name('login');
Route::post('/login',   [AuthController::class, 'login'])->name('login.post');
Route::get('/logout',   [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'user'], function () {
        Route::get('/',             [UserController::class, 'index'])->name('user');
        Route::get('/deleted',      [UserController::class, 'getDeletedUsers'])->name('user.deleted');
        Route::get('/form/{id?}',   [UserController::class, 'form'])->name('user.form');
        Route::post('/save/{id?}',  [UserController::class, 'save'])->name('user.save');
        Route::get('/delete/{id}',  [UserController::class, 'delete'])->name('user.delete');
    });
    
    Route::group(['prefix' => 'role'], function () {
        Route::get('/',             [UserRoleController::class, 'index'])->name('role');
        Route::get('/form/{id?}',   [UserRoleController::class, 'form'])->name('role.form');
        Route::post('/save/{id?}',  [UserRoleController::class, 'save'])->name('role.save');
        Route::get('/delete/{id}',  [UserRoleController::class, 'delete'])->name('role.delete');
    });
});

