<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanySetting;

class CompanySettingController extends Controller
{
    public function edit()
    {
        $setting = CompanySetting::first();
        return view('admin.company_settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:50',
            'website' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'tax_number' => 'nullable|string|max:100',
            'commercial_registration' => 'nullable|string|max:100',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'letterhead' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'signature' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stamp' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $setting = CompanySetting::first() ?? new CompanySetting();
        $setting->fill($validated);

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('company', 'public');
            $setting->logo = $logoPath;
        }
        if ($request->hasFile('letterhead')) {
            $letterheadPath = $request->file('letterhead')->store('company', 'public');
            $setting->letterhead = $letterheadPath;
        }
        if ($request->hasFile('signature')) {
            $signaturePath = $request->file('signature')->store('company', 'public');
            $setting->signature = $signaturePath;
        }
        if ($request->hasFile('stamp')) {
            $stampPath = $request->file('stamp')->store('company', 'public');
            $setting->stamp = $stampPath;
        }
        $setting->save();

        return redirect()->route('admin.company-settings.edit')->with('success', 'تم تحديث بيانات الشركة بنجاح');
    }
} 