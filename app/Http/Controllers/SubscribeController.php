<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\SubscribeController;
use App\Models\Subscribe;
use App\Models\Service;
use App\Models\Plan;

class SubscribeController extends Controller
{
    public function showForm(Request $request)
    {
        return view('subscribe_form');
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'phone'    => 'required|string',
            'business' => 'nullable|string',
            'service'  => 'required|string',
            'notes'    => 'nullable|string',
        ]);

        $clientName   = $request->name;
        $clientPhone  = $request->phone;
        $businessType = $request->business;
        $serviceName  = $request->service;
        $notes        = $request->notes;

        // إعدادات UltraMsg (ثابتة داخل الكود مباشرة)
        $instanceId = 'instance124148';
        $token      = 'f6x84ghzo356s3tc';
        $owner      = '96894919627';

        // تنسيق رقم الهاتف ليكون دولي
        $whatsappNumber = preg_replace('/[^0-9]/', '', $clientPhone);

        // رسالة للعميلة
           $messageToClient = sprintf(
            "مرحبًا %s، نشكرك على الاشتراك في خدمة: %s من ويلو ويب. سيتم التواصل معك قريبًا.",
            $clientName,
            $serviceName
        );

        // رسالة لك (صاحب الموقع)
        $messageToOwner = "🔔 اشتراك جديد:\n"
            . "الاسم: $clientName\n"
            . "رقم الواتساب: $whatsappNumber\n"
            . "الخدمة: $serviceName\n"
            . "النشاط: $businessType\n"
            . "الملاحظات: " . ($notes ?: '—');

        // إرسال للعميلة
        Http::post("https://api.ultramsg.com/$instanceId/messages/chat", [
            'token' => $token,
            'to'    => $whatsappNumber,
            'body'  => $messageToClient,
        ]);

        // إرسال لك
        Http::post("https://api.ultramsg.com/$instanceId/messages/chat", [
            'token' => $token,
            'to'    => $owner,
            'body'  => $messageToOwner,
        ]);

        return redirect('/')->with('success', 'تم إرسال الاشتراك بنجاح!');
    }

    public function showDynamicForm()
    {
        $services = Service::all();
        $plans = Plan::with('service')->get();
        return view('subscribe_form_dynamic_v2', compact('services', 'plans'));
    }

    public function submitDynamicForm(Request $request)
    {
        // معالجة الطلب - يمكنك تعديلها حسب الحاجة
        // return dd($request->all());

        return back()->with('success', 'تم إرسال طلب الاشتراك بنجاح!');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string',
            'phone'   => 'required|string',
            'project' => 'nullable|string',
            'plan'    => 'nullable|string',
            'billing' => 'nullable|string',
            'price'   => 'nullable|string',
        ]);

        Subscribe::create($data);

        return redirect()->back()->with('success', 'تم إرسال طلب الاشتراك بنجاح!');
    }
}
