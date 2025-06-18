<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function showPaymentLink($subscriptionId)
    {
        $subscription = Subscription::findOrFail($subscriptionId);
        $settings = Setting::first();

        // تحقق من وجود بيانات PayTabs
        if (!$settings->paytabs_profile_id || !$settings->paytabs_server_key) {
            return back()->with('error', 'يرجى ضبط إعدادات بوابة الدفع أولاً.');
        }

        // بيانات الدفع
        $data = [
            'profile_id' => $settings->paytabs_profile_id,
            'tran_type' => 'sale',
            'tran_class' => 'ecom',
            'cart_id' => 'sub-' . $subscription->id,
            'cart_currency' => $settings->paytabs_currency ?? 'SAR',
            'cart_amount' => $subscription->price,
            'cart_description' => 'Subscription Payment',
            'customer_details' => [
                'name' => $subscription->customer_name,
                'email' => $subscription->email ?? 'customer@example.com',
                'phone' => $subscription->phone,
                'street1' => $subscription->address ?? 'N/A',
                'city' => 'Riyadh',
                'country' => 'SA',
            ],
            'callback' => route('payment.callback'),
            'return' => route('payment.return'),
        ];

        // إرسال الطلب إلى PayTabs
        $response = Http::withHeaders([
            'authorization' => $settings->paytabs_server_key,
            'Content-Type' => 'application/json',
        ])->post('https://secure.paytabs.sa/payment/request', $data);

        $result = $response->json();

        if (isset($result['redirect_url'])) {
            // حفظ رابط الدفع وحالته في قاعدة البيانات
            $subscription->update([
                'payment_link' => $result['redirect_url'],
                'payment_status' => 'pending',
            ]);
            // عرض زر التحويل لبوابة الدفع
            return view('payment.link', [
                'redirect_url' => $result['redirect_url'],
                'subscription' => $subscription
            ]);
        } else {
            return back()->with('error', 'تعذر إنشاء رابط الدفع. تحقق من بيانات PayTabs.');
        }
    }

    // يمكنك إضافة دوال callback/return لاحقاً لمعالجة الدفع
} 