<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscribeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\BlogController;


Route::post('/send-message', function (Request $request) {
    $data = $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'phone' => 'required|string',
        'message' => 'required|string',
    ]);

    // إرسال البريد لك أنت (مالك الموقع)
    Mail::raw("📩 رسالة جديدة من: {$data['name']}\n📞 رقم الجوال: {$data['phone']}\n📧 البريد الإلكتروني: {$data['email']}\n\n📝 الرسالة:\n{$data['message']}", function ($message) {
        $message->to('support@weloweb.com') // ضع هنا بريدك الحقيقي
                ->subject('رسالة جديدة من نموذج اتصل بنا - ويلو ويب');
    });

    return redirect('/contact')->with('success', 'تم إرسال رسالتك بنجاح، سنرد عليك قريبًا!');
});

Route::get('/', function () {
    return view('weloweb_home');
});

Route::get('/subscribe', [SubscribeController::class, 'showForm']);
Route::post('/subscribe', [SubscribeController::class, 'submitForm']);

Route::get('/user-guide', function () {
    return view('user_guide');
});
Route::get('/guide/restaurant', function () {
    return view('guide_restaurant');
});

Route::get('/guide/restaurant', function () {
    return view('guide_restaurant_plans');
});

Route::get('/guide/restaurant', function () {
    return view('restaurant_pos_details');
});

Route::get('/subscribe', function () {
    return view('subscribe_form_dynamic');
});

Route::get('/subscribe', function () {
    return view('subscribe_form_dynamic_v2');
});

Route::get('/guide/salon', function () {
    return view('guide_salon');
});

Route::get('/guide/laundry', function () {
    return view('guide_laundry');
});

Route::get('/guide/boutique', function () {
    return view('guide_boutique');
});

Route::get('/guide/school', function () {
    return view('guide_school');
});

Route::get('/guide/clinic', function () {
    return view('guide_clinic');
});

Route::get('/guide/labor', function () {
    return view('guide_labor');
});

Route::get('/guide/retail', function () {
    return view('guide_retail');
});

Route::view('/contact', 'contact');


Route::post('/send-message', function (Request $request) {
    $data = $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'phone' => 'required|string',
        'message' => 'required|string',
    ]);

    // إرسال البريد لك أنت (مالك الموقع)
    Mail::raw("📩 رسالة جديدة من: {$data['name']}\n📞 رقم الجوال: {$data['phone']}\n📧 البريد الإلكتروني: {$data['email']}\n\n📝 الرسالة:\n{$data['message']}", function ($message) {
        $message->to('waleed@weloweb.com') // ضع هنا بريدك الحقيقي
                ->subject('رسالة جديدة من نموذج اتصل بنا - ويلو ويب');
    });

    return redirect('/contact')->with('success', 'تم إرسال رسالتك بنجاح، سنرد عليك قريبًا!');
});

// صفحة سياسة الخصوصية
Route::view('/privacy', 'privacy')->name('privacy');

// صفحة الأسئلة الشائعة
Route::view('/faq', 'faq')->name('faq');

Route::get('/blog', function () {
    $articles = [/* محتوى المقالات كما عرضناه سابقًا */];
    return view('blog', compact('articles'));
});


Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');


Route::get('/subscribe', [SubscribeController::class, 'showDynamicForm'])->name('subscribe.form');
Route::post('/subscribe', [SubscribeController::class, 'submitDynamicForm'])->name('subscribe.submit');
