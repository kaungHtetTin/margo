<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LocaleController extends Controller
{
    /**
     * Switch application locale.
     */
    public function switch($locale)
    {
        $supportedLocales = ['en', 'ja', 'my'];
        
        if (!in_array($locale, $supportedLocales)) {
            $locale = config('app.locale');
        }

        Session::put('locale', $locale);
        app()->setLocale($locale);

        // Get referrer URL
        $referrer = request()->headers->get('referer');
        
        if ($referrer) {
            $referrerUrl = parse_url($referrer);
            $referrerPath = $referrerUrl['path'] ?? '';
            
            // Skip admin routes
            if (strpos($referrerPath, '/admin/') !== false) {
                return Redirect::route('home', ['locale' => $locale]);
            }
            
            // Get the base URL path (e.g., /margo/public)
            $baseUrl = url('/');
            $baseUrlParsed = parse_url($baseUrl);
            $basePath = rtrim($baseUrlParsed['path'] ?? '', '/');
            
            // Remove base path from referrer path
            if ($basePath && strpos($referrerPath, $basePath) === 0) {
                $referrerPath = substr($referrerPath, strlen($basePath));
            }
            
            // Normalize the path
            $referrerPath = '/' . ltrim($referrerPath, '/');
            
            // Extract path parts
            $pathParts = array_filter(explode('/', trim($referrerPath, '/')));
            $pathParts = array_values($pathParts);
            
            // Remove locale if it's the first part
            if (!empty($pathParts) && in_array($pathParts[0], $supportedLocales)) {
                array_shift($pathParts);
            }
            
            // If no path parts left, go to home
            if (empty($pathParts)) {
                return Redirect::route('home', ['locale' => $locale]);
            }
            
            // Check if it's a known route pattern
            $knownRoutes = ['courses', 'blogs', 'register', 'contact', 'faq'];
            if (in_array($pathParts[0], $knownRoutes)) {
                try {
                    $routeName = $pathParts[0];
                    $params = ['locale' => $locale];
                    
                    // Handle course detail route
                    if ($routeName === 'courses' && isset($pathParts[1])) {
                        $params['id'] = $pathParts[1];
                        return Redirect::route('course.detail', $params);
                    }
                    
                    return Redirect::route($routeName, $params);
                } catch (\Exception $e) {
                    // Fallback to home
                    return Redirect::route('home', ['locale' => $locale]);
                }
            }
            
            // Unknown route - redirect to home
            return Redirect::route('home', ['locale' => $locale]);
        }
        
        // No referrer - redirect to home
        return Redirect::route('home', ['locale' => $locale]);
    }
}
