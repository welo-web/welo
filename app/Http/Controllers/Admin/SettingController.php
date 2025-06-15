<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function edit()
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        return view('admin.settings', compact('settings'));
    }

    public function update(Request $request)
    {
        foreach (['site_title', 'header_content', 'footer_content', 'home_content'] as $key) {
            Setting::updateOrCreate(['key' => $key], ['value' => $request->$key]);
        }
        return redirect()->back()->with('success', 'تم تحديث الإعدادات بنجاح');
    }
}
