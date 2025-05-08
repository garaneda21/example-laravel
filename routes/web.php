<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/contact', 'contact');

Route::resource('jobs', JobController::class);

// Auth
Route::controller(JobController::class)->group(function () {
    Route::get('/jobs', [RegisteredUserController::class, 'index']);
    Route::get('/jobs/create', [RegisteredUserController::class, 'create']);
    Route::get('/jobs/{job}', [RegisteredUserController::class, 'store'])->middleware('auth');
    Route::delete('/jobs/{job}', [RegisteredUserController::class, 'show']);
    Route::post('/jobs', [RegisteredUserController::class, 'edit'])
        ->middleware('auth')
        ->can('edit', 'job');

    // TODO: añandir middleware a otras rutas
    Route::get('/jobs/{job}/edit', [RegisteredUserController::class, 'update']);
    Route::patch('/jobs/{job}', [RegisteredUserController::class, 'destroy']);
});
/* Route::get('register', [RegisteredUserController::class, 'create']); */
/* Route::post('register', [RegisteredUserController::class, 'store']); */

Route::get('login', [SessionController::class, 'create']);
Route::post('login', [SessionController::class, 'store']);
Route::post('logout', [SessionController::class, 'destroy']);

