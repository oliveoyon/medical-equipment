<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Storage;

class GeneralSettingController extends Controller
{
    public function edit()
    {
        // Get the first row, create if not exists
        $setting = GeneralSetting::first();
        if (!$setting) {
            $setting = GeneralSetting::create([]);
        }

        return view('admin.general_settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = GeneralSetting::first();
        if (!$setting) {
            $setting = GeneralSetting::create([]);
        }

        // Validation
        $request->validate([
            'company_name' => 'nullable|string|max:255',
            'address'      => 'nullable|string|max:500',
            'phone'        => 'nullable|string|max:50',
            'email'        => 'nullable|email|max:255',
            'facebook'     => 'nullable|url|max:255',
            'linkedin'     => 'nullable|url|max:255',
            'twitter'      => 'nullable|url|max:255',
            'instagram'    => 'nullable|url|max:255',
            'logo'         => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'favicon'      => 'nullable|image|mimes:jpg,jpeg,png,svg,ico|max:1024',
        ]);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($setting->logo && Storage::disk('public')->exists($setting->logo)) {
                Storage::disk('public')->delete($setting->logo);
            }
            // Store new logo in public disk
            $setting->logo = $request->file('logo')->store('uploads/settings', 'public');
        }

        // Handle favicon upload
        if ($request->hasFile('favicon')) {
            // Delete old favicon if exists
            if ($setting->favicon && Storage::disk('public')->exists($setting->favicon)) {
                Storage::disk('public')->delete($setting->favicon);
            }
            // Store new favicon in public disk
            $setting->favicon = $request->file('favicon')->store('uploads/settings', 'public');
        }

        // Update other fields
        $setting->update($request->only([
            'company_name', 'address', 'phone', 'email',
            'facebook', 'linkedin', 'twitter', 'instagram'
        ]));

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}
