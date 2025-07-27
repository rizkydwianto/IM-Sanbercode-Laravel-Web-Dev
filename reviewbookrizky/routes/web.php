<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\HomeController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PostController;
use App\http\Controllers\AuthController;
use App\http\Controllers\CommentController;
use App\Http\Middleware\IsAdmin;

Route::get('/', [HomeController::class, 'home']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/contact', [HomeController::class, 'contact']);

Route::post("/welcome", [HomeController::class, "kirim"]);

Route::get('/master', function() {
  return view('layouts.master');
});

Route::middleware(['Auth', Isadmin::class])->group(function () {
    // CRUD Genres
    // C => Create Data
    Route::get('/genre/create', [GenreController::class, 'create']);
    Route::post('/genre', [GenreController::class, 'store']);

    // U => Update Data
    Route::get('/genre/{id}/edit', [GenreController::class, 'edit']);
    Route::put('/genre/{id}', [GenreController::class, 'update']);

    // D => Delete Data
    Route::delete('/genre/{id}', [GenreController::class, 'destroy']);
   
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/profile', [AuthController::class, 'getprofile'])->middleware('auth');
Route::post('/profile', [AuthController::class, 'createProfile'])->middleware('auth');
Route::post('/profile/{id}', [AuthController::class, 'updateProfile'])->middleware('auth');

Route::post('/comments/{post_id}', [CommentController::class, 'store'])->middleware('auth');

// R => Read Data
Route::get('/genre', [GenreController::class, 'index']);
Route::get('/genre/{id}', [GenreController::class, 'show']);

// CRUD Post
Route::resource('post', PostController::class);

// Auth
// Register
Route::get('/register', [AuthController::class, 'showregister']);
Route::post('/register', [AuthController::class, 'registeruser']);

// LOgin
Route::get('/login', [AuthController::class, 'showlogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

