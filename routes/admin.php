<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group.
|
*/

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/users', function () {
        return view('admin.users');
    })->name('admin.users');

    Route::get('/jobs', function () {
        return view('admin.jobs');
    })->name('admin.jobs');

    Route::get('/applications', function () {
        return view('admin.applications');
    })->name('admin.applications');

    Route::get('/settings', function () {
        return view('admin.settings');
    })->name('admin.settings');
});