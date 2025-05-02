<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/contact', 'contact');

Route::resource('jobs', JobController::class);

// Auth
Route::get('register', [RegisteredUserController::class, 'create']);
Route::post('register', [RegisteredUserController::class, 'store']);

Route::get('login', [SessionController::class, 'create']);
Route::post('login', [SessionController::class, 'store']);
Route::post('logout', [SessionController::class, 'destroy']);

/* Route::controller(JobController::class)->group(function () { */
/*     Route::get('/jobs', 'index'); */
/*     Route::get('/jobs/create', 'create'); */
/*     Route::delete('/jobs/{job}', 'show'); */
/*     Route::get('/jobs/{job}', 'store'); */
/*     Route::post('/jobs', 'edit'); */
/*     Route::get('/jobs/{job}/edit', 'update'); */
/*     Route::patch('/jobs/{job}', 'destroy'); */
/* }); */
