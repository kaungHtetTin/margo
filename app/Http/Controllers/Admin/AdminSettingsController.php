<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminSettingsController extends Controller
{
    /**
     * Display the settings page.
     */
    public function index()
    {
        $general = Setting::getByGroup('general') ?: [];

        return view('admin.settings', compact('general'));
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
     * Update the authenticated admin user's password.
     */
    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ], [
            'current_password.current_password' => 'The current password is incorrect.',
        ]);

        $user = $request->user();
        $user->password = Hash::make($validated['password']);
        $user->save();

        return redirect()->route('admin.settings')->with('success', 'Password updated successfully.');
    }
}
