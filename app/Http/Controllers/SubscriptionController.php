<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SubscriptionController extends Controller
{
    public function create(Request $request)
    {
        $service = $request->service;
        $plan = $request->plan;
        $services = Service::where('is_active', true)->get();
        
        return view('subscription_form', compact('services', 'service', 'plan'));
    }

    public function store(Request $request)
    {
        $service = Service::where('slug', $request->service)->where('is_active', true)->first();
        if (!$service) {
            return redirect()->back()->with('error', 'الخدمة غير موجودة أو غير مفعلة.');
        }

        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'plan_type' => 'required|in:basic,advanced,professional',
            'subscription_type' => 'required|in:monthly,yearly',
            'price' => 'required|numeric|min:0',
            'customer_name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:20'
        ]);

        // ربط أو إنشاء عميل
        $client = \App\Models\Client::firstOrCreate(
            ['phone' => $validated['phone']],
            [
                'name' => $validated['customer_name'],
                'address' => $validated['address']
            ]
        );
        $validated['client_id'] = $client->id;

        $subscription = Subscription::create($validated);

        // Send WhatsApp message to customer
        $this->sendWhatsAppMessage($subscription);

        return redirect()->back()->with('success', 'تم استلام طلب الاشتراك بنجاح. سنتواصل معك قريباً.');
    }

    private function sendWhatsAppMessage($subscription)
    {
        $service = $subscription->service;
        $message = "مرحباً {$subscription->customer_name},\n\n";
        $message .= "شكراً لاشتراكك في خدمة {$service->name}.\n";
        $message .= "تفاصيل الاشتراك:\n";
        $message .= "- نوع الباقة: {$subscription->plan_type_text}\n";
        $message .= "- نوع الاشتراك: {$subscription->subscription_type_text}\n";
        $message .= "- السعر: {$subscription->price} ريال\n\n";
        $message .= "سنقوم بالتواصل معك قريباً لتأكيد الاشتراك.";

        // Send to customer
        $this->sendWhatsApp($subscription->phone, $message);

        // Send to admin
        $adminMessage = "طلب اشتراك جديد:\n\n";
        $adminMessage .= "العميل: {$subscription->customer_name}\n";
        $adminMessage .= "الخدمة: {$service->name}\n";
        $adminMessage .= "نوع الباقة: {$subscription->plan_type_text}\n";
        $adminMessage .= "نوع الاشتراك: {$subscription->subscription_type_text}\n";
        $adminMessage .= "السعر: {$subscription->price} ريال\n";
        $adminMessage .= "رقم الهاتف: {$subscription->phone}\n";
        $adminMessage .= "العنوان: {$subscription->address}";

        $this->sendWhatsApp(config('app.admin_phone'), $adminMessage);
    }

    private function sendWhatsApp($phone, $message)
    {
        // Replace with your WhatsApp API implementation
        // Example using a hypothetical WhatsApp API:
        try {
            Http::post('https://api.whatsapp.com/send', [
                'phone' => $phone,
                'message' => $message
            ]);
        } catch (\Exception $e) {
            \Log::error('WhatsApp message failed to send: ' . $e->getMessage());
        }
    }
} 