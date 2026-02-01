<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class AdminSettingsController extends Controller
{
    /**
     * Display the settings page.
     */
    public function index()
    {
        $general = Setting::getByGroup('general') ?: [];
        $email = Setting::getByGroup('email') ?: [];

        return view('admin.settings', compact('general', 'email'));
    }

    /**
     * Update general settings.
     */
    public function updateGeneral(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'nullable|string|max:255',
            'contact_email' => 'nullable|email',
            'phone_number' => 'nullable|string|max:50',
            'website_url' => 'nullable|url|max:255',
            'company_description' => 'nullable|string|max:500',
            'address' => 'nullable|string|max:500',
            'working_hours' => 'nullable|string|max:255',
        ]);

        Setting::setMany($validated, 'general');

        return redirect()->route('admin.settings')->with('success', 'General settings updated successfully.');
    }

    /**
     * Update email settings.
     */
    public function updateEmail(Request $request)
    {
        $validated = $request->validate([
            'smtp_host' => 'nullable|string|max:255',
            'smtp_port' => 'nullable|integer|min:1|max:65535',
            'smtp_username' => 'nullable|string|max:255',
            'smtp_password' => 'nullable|string|max:255',
        ]);

        // Don't overwrite password if left blank
        if (empty($validated['smtp_password'])) {
            unset($validated['smtp_password']);
        }

        Setting::setMany($validated, 'email');

        return redirect()->route('admin.settings')->with('success', 'Email settings updated successfully.');
    }
}
