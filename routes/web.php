<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\BlogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Locale switcher route (outside locale group)
Route::get('/locale/{locale}', [LocaleController::class, 'switch'])->name('locale.switch');

// Root redirect to default locale
Route::get('/', function () {
    $locale = session('locale', config('app.locale'));
    if (!in_array($locale, ['en', 'ja', 'my'])) {
        $locale = config('app.locale');
    }
    return redirect()->route('home', ['locale' => $locale]);
});

// Client routes with locale support
Route::group(['prefix' => '{locale}', 'middleware' => ['locale'], 'where' => ['locale' => 'en|ja|my']], function () {
    Route::get('/', function () {
        $latestBlogs = \App\Models\Blog::published()
            ->with('author')
            ->latest('published_at')
            ->take(3)
            ->get();
        $latestCourses = \App\Models\Course::where('status', 'active')
            ->where(function ($q) {
                $q->where('is_open', true)->orWhereNull('is_open');
            })
            ->with('teacher')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        return view('home', compact('latestBlogs', 'latestCourses'));
    })->name('home');

    // Blog Routes
    Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
    Route::get('/blogs/{slug}', [BlogController::class, 'show'])->name('blog.detail');

    Route::get('/register', function () {
        return view('register');
    })->name('register');

    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');

    Route::get('/faq', function () {
        $faqs = \App\Models\Faq::active()->ordered()->get();
        return view('faq', compact('faqs'));
    })->name('faq');

    // Courses Routes
    Route::get('/courses', [CourseController::class, 'index'])->name('courses');
    Route::get('/courses/{id}', [CourseController::class, 'show'])->name('course.detail');

    // Job Application Routes
    Route::get('/job-forms', [\App\Http\Controllers\JobApplicationController::class, 'index'])->name('job-forms');
    Route::get('/job-forms/search', [\App\Http\Controllers\JobApplicationController::class, 'search'])->name('job-forms.search');
    Route::get('/job-forms/search/results', [\App\Http\Controllers\JobApplicationController::class, 'searchResults'])->name('job-forms.search.results');
    Route::get('/job-forms/{id}/apply', [\App\Http\Controllers\JobApplicationController::class, 'show'])->name('job-forms.apply');
    Route::post('/job-forms/{id}/apply', [\App\Http\Controllers\JobApplicationController::class, 'store'])->name('job-forms.apply.store');
    Route::get('/job-forms/{id}/success', [\App\Http\Controllers\JobApplicationController::class, 'success'])->name('job-forms.apply.success');
});

// Admin Login Routes
Route::get('/admin/login', function () {
    if (auth()->check() && auth()->user()->is_admin) {
        return redirect()->route('admin.dashboard');
    }
    return view('auth.login');
})->name('admin.login');

Route::post('/admin/login', function (\Illuminate\Http\Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (\Illuminate\Support\Facades\Auth::attempt($credentials, $request->boolean('remember'))) {
        $request->session()->regenerate();
        
        $user = auth()->user();
        if ($user->is_admin) {
            return redirect()->intended(route('admin.dashboard'));
        } else {
            \Illuminate\Support\Facades\Auth::logout();
            return back()->withErrors([
                'email' => 'You do not have admin privileges.',
            ])->onlyInput('email');
        }
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
})->name('admin.login.post');

Route::post('/admin/logout', function (\Illuminate\Http\Request $request) {
    \Illuminate\Support\Facades\Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('admin.login')->with('success', 'You have been logged out successfully.');
})->name('admin.logout');
