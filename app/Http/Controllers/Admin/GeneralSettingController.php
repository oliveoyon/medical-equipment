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
            if ($setting->logo && Storage::exists($setting->logo)) {
                Storage::delete($setting->logo);
            }
            $setting->logo = $request->file('logo')->store('uploads/settings');
        }

        // Handle favicon upload
        if ($request->hasFile('favicon')) {
            if ($setting->favicon && Storage::exists($setting->favicon)) {
                Storage::delete($setting->favicon);
            }
            $setting->favicon = $request->file('favicon')->store('uploads/settings');
        }

        // Update other fields
        $setting->update($request->only([
            'company_name', 'address', 'phone', 'email',
            'facebook', 'linkedin', 'twitter', 'instagram'
        ]));

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}
