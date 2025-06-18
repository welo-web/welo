<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key')->all();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'site_name' => 'nullable|string|max:255',
            'site_description' => 'nullable|string',
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:20',
            'facebook_url' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',
            'linkedin_url' => 'nullable|url|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string|max:255',
            'google_analytics' => 'nullable|string',
            'custom_css' => 'nullable|string',
            'custom_js' => 'nullable|string',
        ]);

        foreach ($validated as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        // Clear settings cache
        Cache::forget('settings');

        return redirect()->route('admin.settings.index')
            ->with('success', 'تم تحديث الإعدادات بنجاح');
    }

    public function whatsapp()
    {
        $settings = [
            'api_url' => config('services.whatsapp.api_url'),
            'api_token' => config('services.whatsapp.api_token'),
            'phone_number_id' => config('services.whatsapp.phone_number_id'),
        ];
        return view('admin.settings.whatsapp', compact('settings'));
    }

    public function updateWhatsapp(Request $request)
    {
        $request->validate([
            'api_url' => 'required|string',
            'api_token' => 'required|string',
            'phone_number_id' => 'required|string',
        ]);
        // حفظ الإعدادات في .env
        $this->setEnv([
            'WHATSAPP_API_URL' => $request->api_url,
            'WHATSAPP_API_TOKEN' => $request->api_token,
            'WHATSAPP_PHONE_NUMBER_ID' => $request->phone_number_id,
        ]);
        return back()->with('success', 'تم تحديث إعدادات واتساب بنجاح');
    }

    private function setEnv(array $data)
    {
        $envPath = base_path('.env');
        $env = file_get_contents($envPath);
        foreach ($data as $key => $value) {
            $pattern = "/^{$key}=.*$/m";
            $replace = "{$key}={$value}";
            if (preg_match($pattern, $env)) {
                $env = preg_replace($pattern, $replace, $env);
            } else {
                $env .= "\n{$replace}";
            }
        }
        file_put_contents($envPath, $env);
    }
} 