<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

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
Route::get('/', [IndexController::class, 'index'])->middleware('auth')->name('index');

Route::group(['middleware' => 'guest'], function() {
    Route::group(['prefix' => 'login'], function () {
        Route::get('/', [LoginController::class, 'index'])->name('page.login');
        Route::post('/', [LoginController::class, 'login'])->name('login');
    });

    Route::group(['prefix' => 'register'], function () {
        Route::get('/', [RegisterController::class, 'index'])->name('page.register');
        Route::post('/', [RegisterController::class, 'register'])->name('register');
    });
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::group(['prefix' => 'projects'], function () {
        Route::get('/', [ProjectController::class, 'index'])->name('page.projects');
        Route::get('/{project_id}', [ProjectController::class, 'edit'])->name('page.projects.edit');
        Route::patch('{project_id}', [ProjectController::class, 'update'])->name('projects.update');
        Route::put('/store', [ProjectController::class, 'store'])->name('projects.store');
        Route::get('/{project_id}/tasks', [ProjectController::class, 'tasks'])->name('page.projects.tasks');
        Route::delete('{project_id}/destroy/', [ProjectController::class, 'destroy'])->name('projects.destroy');
    });

    Route::group(['prefix' => 'tasks'], function () {
        Route::get('{task_id}', [TaskController::class, 'edit'])->name('page.tasks.edit');
        Route::patch('{task_id}', [TaskController::class, 'update'])->name('tasks.update');
        Route::put('{project_id}/store/', [TaskController::class, 'store'])->name('tasks.store');
        Route::delete('{task_id}/destroy/', [TaskController::class, 'destroy'])->name('tasks.destroy');
        Route::patch('{task_id}/change-status/', [TaskController::class, 'changeStatus'])->name('tasks.changeStatus');
    });
});
