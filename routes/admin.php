<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ResetPasswordController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\MenuController;
// ---------------------------
// 🟢 Public Routes (Login/Logout)
// ---------------------------
 
Route::post('logout', [UserController::class, 'logout'])->name('admin.logout');

// ---------------------------
// 🔒 Protected Routes (Requires Auth)
// ---------------------------
Route::middleware('auth')->group(function () {
    
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Settings page
    Route::view('setting', 'admins.settings.index')->name('setting.index');

    // User management (resource routes)
  Route::resource('user', UserController::class)->except(['show', 'destroy']);

   // Delete user by UUID
Route::delete('user/delete/{uuid}', [UserController::class, 'destroy'])->name('user.delete');
//company
Route::get('company', "Admin\CompanyController@index")->name('company.index');
Route::get('company/edit', "Admin\CompanyController@edit")->name('company.edit');
Route::get('company/update/{id}', "Admin\CompanyController@update")->name('company.update');
//social
Route::resource('social',"Admin\SocialController")->except('show','destroy');
Route::get('social/delete/{id}',"Admin\SocialController@delete")->name('social.delete');
//menu
Route::resource('menu','Admin\MenuController')->except('show','destroy');
Route::get('/menu/detail/{id}','Admin\MenuController@detail')->name('menu.detail');
Route::get('/menu/delete/{id}','Admin\MenuController@delete')->name('menu.delete');



});


