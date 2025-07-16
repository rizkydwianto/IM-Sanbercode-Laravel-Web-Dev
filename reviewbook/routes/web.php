<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\HomeController;
use App\Http\Controllers\FormController;

Route::get('/', [HomeController::class, 'home']);
Route::get('/register', [FormController::class, 'formregister']);
Route::post('/home', [FormController::class, 'welcome']);
