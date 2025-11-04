<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PasswordResetController;

// Login routes
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'authenticate'])->name('login.submit');

// GET form


Route::view('reset', 'admins.users.reset')->name('password.reset');
Route::post('password/reset', [PasswordResetController::class, 'reset'])->name('do.reset');


