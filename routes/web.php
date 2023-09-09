<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::middleware(['guest'])
    ->group(function () {
        Route::get('/', [LoginController::class, 'index'])
            ->name('page.login');

        Route::post('/login', [LoginController::class, 'store'])
            ->name('login');

        Route::get('/register', [RegisterController::class, 'index'])
            ->name('page.register');

        Route::post('/register', [RegisterController::class, 'store'])
            ->name('register');
    });

Route::middleware(['auth'])
    ->group(function () {
        Route::delete('/login', [LoginController::class, 'destroy'])
            ->name('logout');

        Route::prefix('tasks')
            ->group(function () {
                Route::get('/', [TaskController::class, 'index'])
                    ->name('page.tasks');

                Route::post('/', [TaskController::class, 'store'])
                    ->name('tasks.store');

                Route::prefix('{id}')
                    ->group(function () {
                        // Route::patch('/', [TaskController::class, 'update'])
                        //     ->name('tasks.update');

                        Route::delete('/', [TaskController::class, 'delete'])
                            ->name('tasks.delete');

                        Route::post('/restore', [TaskController::class, 'restore'])
                            ->name('tasks.restore');

                        Route::post('/complete', [TaskController::class, 'toggleComplete'])
                            ->name('tasks.complete');

                        Route::post('/favorite', [TaskController::class, 'toggleFavorite'])
                            ->name('tasks.favorite');
                    });
            });
    });
