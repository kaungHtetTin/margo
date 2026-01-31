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

Route::prefix('admin')->middleware('admin')->group(function () {
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

    // FAQ Management Routes
    Route::resource('faqs', \App\Http\Controllers\Admin\AdminFaqController::class)->names([
        'index' => 'admin.faqs.index',
        'create' => 'admin.faqs.create',
        'store' => 'admin.faqs.store',
        'show' => 'admin.faqs.show',
        'edit' => 'admin.faqs.edit',
        'update' => 'admin.faqs.update',
        'destroy' => 'admin.faqs.destroy',
    ]);

    // Blog Management Routes
    // Remove body image route (must be before resource route)
    Route::post('/blogs/{id}/remove-image', [\App\Http\Controllers\Admin\AdminBlogController::class, 'removeBodyImage'])->name('admin.blogs.remove-image');
    
    Route::resource('blogs', \App\Http\Controllers\Admin\AdminBlogController::class)->names([
        'index' => 'admin.blogs.index',
        'create' => 'admin.blogs.create',
        'store' => 'admin.blogs.store',
        'show' => 'admin.blogs.show',
        'edit' => 'admin.blogs.edit',
        'update' => 'admin.blogs.update',
        'destroy' => 'admin.blogs.destroy',
    ]);

    // Job Forms Management Routes
    Route::resource('job-forms', \App\Http\Controllers\Admin\AdminJobFormController::class)->names([
        'index' => 'admin.job-forms.index',
        'create' => 'admin.job-forms.create',
        'store' => 'admin.job-forms.store',
        'show' => 'admin.job-forms.show',
        'edit' => 'admin.job-forms.edit',
        'update' => 'admin.job-forms.update',
        'destroy' => 'admin.job-forms.destroy',
    ]);

    // Job Form Data Management Routes
    Route::resource('job-form-data', \App\Http\Controllers\Admin\AdminJobFormDataController::class)->names([
        'index' => 'admin.job-form-data.index',
        'create' => 'admin.job-form-data.create',
        'store' => 'admin.job-form-data.store',
        'show' => 'admin.job-form-data.show',
        'edit' => 'admin.job-form-data.edit',
        'update' => 'admin.job-form-data.update',
        'destroy' => 'admin.job-form-data.destroy',
    ]);
});