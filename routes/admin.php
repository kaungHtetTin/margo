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

    // Jobs (Job Postings) Management Routes
    Route::resource('jobs', \App\Http\Controllers\Admin\AdminJobController::class)->names([
        'index' => 'admin.jobs.index',
        'create' => 'admin.jobs.create',
        'store' => 'admin.jobs.store',
        'show' => 'admin.jobs.show',
        'edit' => 'admin.jobs.edit',
        'update' => 'admin.jobs.update',
        'destroy' => 'admin.jobs.destroy',
    ]);

    Route::get('/applications', function () {
        return view('admin.applications');
    })->name('admin.applications');

    Route::get('/settings', [\App\Http\Controllers\Admin\AdminSettingsController::class, 'index'])->name('admin.settings');
    Route::post('/settings/general', [\App\Http\Controllers\Admin\AdminSettingsController::class, 'updateGeneral'])->name('admin.settings.general');
    Route::post('/settings/email', [\App\Http\Controllers\Admin\AdminSettingsController::class, 'updateEmail'])->name('admin.settings.email');

    // Teacher Management Routes
    Route::resource('teachers', \App\Http\Controllers\Admin\AdminTeacherController::class)->names([
        'index' => 'admin.teachers.index',
        'create' => 'admin.teachers.create',
        'store' => 'admin.teachers.store',
        'show' => 'admin.teachers.show',
        'edit' => 'admin.teachers.edit',
        'update' => 'admin.teachers.update',
        'destroy' => 'admin.teachers.destroy',
    ]);

    // Course Management Routes
    Route::resource('courses', \App\Http\Controllers\Admin\AdminCourseController::class)->names([
        'index' => 'admin.courses.index',
        'create' => 'admin.courses.create',
        'store' => 'admin.courses.store',
        'show' => 'admin.courses.show',
        'edit' => 'admin.courses.edit',
        'update' => 'admin.courses.update',
        'destroy' => 'admin.courses.destroy',
    ]);

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