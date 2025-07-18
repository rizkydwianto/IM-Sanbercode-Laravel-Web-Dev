<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\HomeController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\GenreController;

Route::get('/', [HomeController::class, 'home']);
Route::get('/register', [FormController::class, 'formregister']);
Route::post('/home', [FormController::class, 'welcome']);

// CRUD Genres
// C => Create Data
Route::get('/genre/create', [GenreController::class, 'create']);
route::post('/genre', [GenreController::class, 'store']);

// R => Read Data
Route::get('/genre', [GenreController::class, 'index']);
Route::get('/genre/{id}', [GenreController::class, 'show']);

// U => Update Data
Route::get('/genre/{id}/edit', [GenreController::class, 'edit']);
Route::put('/genre/{id}', [GenreController::class, 'update']);

// D => Delete Data
Route::delete('/genre/{id}', [GenreController::class, 'destroy']);