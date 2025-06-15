<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscribeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Models\Service;
use App\Http\Controllers\PlanController;


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

Route::get('/subscribe', [SubscribeController::class, 'showDynamicForm'])->name('subscribe.form');
Route::post('/subscribe', [SubscribeController::class, 'store'])->name('subscribe.store');

Route::get('/user-guide', function () {
    $services = Service::all();
    return view('user_guide', compact('services'));
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


Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::post('/settings', [AdminController::class, 'updateSettings'])->name('admin.settings.update');
    Route::get('/services', [AdminController::class, 'services'])->name('admin.services');
    Route::post('/services', [AdminController::class, 'storeService'])->name('admin.services.store');
    Route::put('/services/{id}', [AdminController::class, 'updateService'])->name('admin.services.update');
    Route::delete('/services/{id}', [AdminController::class, 'deleteService'])->name('admin.services.delete');
    Route::post('/admin/services/{service}/update-link', [AdminController::class, 'updateServiceLink'])->name('admin.services.update-link');
    
    // Plan Management Routes
    Route::get('/plans', [AdminController::class, 'plans'])->name('admin.plans');
    Route::post('/plans', [AdminController::class, 'storePlan'])->name('admin.plans.store');
    Route::get('/plans/{id}/edit', [AdminController::class, 'editPlan'])->name('admin.plans.edit');
    Route::put('/plans/{id}', [AdminController::class, 'updatePlan'])->name('admin.plans.update');
    Route::delete('/plans/{id}', [AdminController::class, 'deletePlan'])->name('admin.plans.delete');
    Route::post('/admin/plans/{plan}/update-link', [AdminController::class, 'updatePlanLink'])->name('admin.plans.update-link');
    
    Route::get('/blog', [AdminController::class, 'blog']);
    Route::get('/faq', [AdminController::class, 'faq']);
    Route::get('/subscribers', [AdminController::class, 'manageSubscribers'])->name('admin.subscribers');
    Route::delete('/subscribers/{id}', [AdminController::class, 'deleteSubscriber'])->name('admin.subscribers.delete');
    Route::post('/admin/subscribers/{id}/importance', [AdminController::class, 'updateImportance'])->name('admin.subscribers.updateImportance');
    Route::post('/admin/subscribers/{id}/status', [AdminController::class, 'updateStatus'])->name('admin.subscribers.updateStatus');
    Route::post('/admin/subscribers/{id}/pay-link', [AdminController::class, 'sendPayLink'])->name('admin.subscribers.sendPayLink');
    Route::post('/admin/subscribers/{id}/notify', [AdminController::class, 'notify'])->name('admin.subscribers.notify');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');


Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::get('/plans/{slug}', [PlanController::class, 'show'])->name('plans.show');