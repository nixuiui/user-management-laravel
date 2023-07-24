<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RepositoryController;
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
        Route::get('/',             [UserController::class, 'index'])->middleware('permission:user_read')->name('user');
        Route::get('/deleted',      [UserController::class, 'getDeletedUsers'])->middleware('permission:user_view_deleted')->name('user.deleted');
        Route::get('/form/{id?}',   [UserController::class, 'form'])->middleware('permission:user_create')->name('user.form');
        Route::post('/save/{id?}',  [UserController::class, 'save'])->middleware('permission:user_create')->name('user.save');
        Route::get('/delete/{id}',  [UserController::class, 'delete'])->middleware('permission:user_delete')->name('user.delete');
    });
    
    Route::group(['prefix' => 'role'], function () {
        Route::get('/',             [UserRoleController::class, 'index'])->middleware('permission:role_read')->name('role');
        Route::get('/form/{id?}',   [UserRoleController::class, 'form'])->middleware('permission:role_create')->name('role.form');
        Route::post('/save/{id?}',  [UserRoleController::class, 'save'])->middleware('permission:role_create')->name('role.save');
        Route::get('/delete/{id}',  [UserRoleController::class, 'delete'])->middleware('permission:role_delete')->name('role.delete');
    });
    
    Route::get('/repositories',       [RepositoryController::class, 'index'])->middleware('permission:repository_read')->name('repositories');
});

