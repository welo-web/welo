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
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\Admin\SubscriptionController as AdminSubscriptionController;
use App\Http\Controllers\PaymentController;


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

// مسارات الخدمات
Route::get('/guide_restaurant', function () {
    return view('guide_restaurant');
})->name('guide.restaurant');

Route::get('/guide_school', function () {
    return view('guide_school');
})->name('guide.school');

Route::get('/guide_clinic', function () {
    return view('guide_clinic');
})->name('guide.clinic');

Route::get('/guide_laundry', function () {
    return view('guide_laundry');
})->name('guide.laundry');

Route::get('/guide_salon', function () {
    return view('guide_salon');
})->name('guide.salon');

Route::get('/guide_retail', function () {
    return view('guide_retail');
})->name('guide.retail');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    
    // Settings
    Route::get('/settings', [App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('settings.index');
    Route::put('/settings', [App\Http\Controllers\Admin\SettingsController::class, 'update'])->name('settings.update');
    Route::get('/settings/whatsapp', [App\Http\Controllers\Admin\SettingsController::class, 'whatsapp'])->name('settings.whatsapp');
    Route::post('/settings/whatsapp', [App\Http\Controllers\Admin\SettingsController::class, 'updateWhatsapp'])->name('settings.whatsapp.update');
    
    // Services
    Route::get('/services', [App\Http\Controllers\Admin\ServiceController::class, 'index'])->name('services.index');
    Route::get('/services/create', [App\Http\Controllers\Admin\ServiceController::class, 'create'])->name('services.create');
    Route::post('/services', [App\Http\Controllers\Admin\ServiceController::class, 'store'])->name('services.store');
    Route::get('/services/{service}/edit', [App\Http\Controllers\Admin\ServiceController::class, 'edit'])->name('services.edit');
    Route::put('/services/{service}', [App\Http\Controllers\Admin\ServiceController::class, 'update'])->name('services.update');
    Route::delete('/services/{service}', [App\Http\Controllers\Admin\ServiceController::class, 'destroy'])->name('services.destroy');
    Route::patch('/services/{service}/toggle-status', [App\Http\Controllers\Admin\ServiceController::class, 'toggleStatus'])->name('services.toggle-status');
    Route::post('/services/reorder', [App\Http\Controllers\Admin\ServiceController::class, 'reorder'])->name('services.reorder');
    
    // Subscriptions
    Route::get('/subscriptions', [App\Http\Controllers\Admin\SubscriptionController::class, 'index'])->name('subscriptions.index');
    Route::get('/subscriptions/{subscription}', [App\Http\Controllers\Admin\SubscriptionController::class, 'show'])->name('subscriptions.show');
    Route::patch('/subscriptions/{subscription}/status', [App\Http\Controllers\Admin\SubscriptionController::class, 'updateStatus'])->name('subscriptions.update-status');
    Route::delete('/subscriptions/{subscription}', [App\Http\Controllers\Admin\SubscriptionController::class, 'destroy'])->name('subscriptions.destroy');
    
    // Plans
    Route::get('/plans', [App\Http\Controllers\Admin\PlanController::class, 'index'])->name('plans.index');
    Route::get('/plans/create', [App\Http\Controllers\Admin\PlanController::class, 'create'])->name('plans.create');
    Route::post('/plans', [App\Http\Controllers\Admin\PlanController::class, 'store'])->name('plans.store');
    Route::get('/plans/{plan}/edit', [App\Http\Controllers\Admin\PlanController::class, 'edit'])->name('plans.edit');
    Route::put('/plans/{plan}', [App\Http\Controllers\Admin\PlanController::class, 'update'])->name('plans.update');
    Route::delete('/plans/{plan}', [App\Http\Controllers\Admin\PlanController::class, 'destroy'])->name('plans.destroy');

    // Subscription routes
    Route::patch('subscriptions/{subscription}/importance', [App\Http\Controllers\Admin\SubscriptionController::class, 'updateImportance'])->name('subscriptions.update-importance');
    Route::post('subscriptions/{subscription}/send-payment-link', [App\Http\Controllers\Admin\SubscriptionController::class, 'sendPaymentLink'])->name('subscriptions.send-payment-link');
    Route::post('subscriptions/{subscription}/send-payment-receipt', [App\Http\Controllers\Admin\SubscriptionController::class, 'sendPaymentReceipt'])->name('subscriptions.send-payment-receipt');
    Route::post('subscriptions/{subscription}/send-price-quote', [App\Http\Controllers\Admin\SubscriptionController::class, 'sendPriceQuote'])->name('subscriptions.send-price-quote');
    Route::post('subscriptions/{subscription}/send-contract', [App\Http\Controllers\Admin\SubscriptionController::class, 'sendSubscriptionContract'])->name('subscriptions.send-contract');
    Route::get('/subscriptions/{subscription}/contract', [App\Http\Controllers\Admin\SubscriptionController::class, 'generateContractPdf'])->name('subscriptions.contract');
    Route::get('/subscriptions/{subscription}/receipt', [App\Http\Controllers\Admin\SubscriptionController::class, 'generateReceiptPdf'])->name('subscriptions.receipt');
    Route::get('/subscriptions/{subscription}/contract-form', [App\Http\Controllers\Admin\SubscriptionController::class, 'contractForm'])->name('subscriptions.contract-form');
    Route::post('/subscriptions/{subscription}/contract-form', [App\Http\Controllers\Admin\SubscriptionController::class, 'storeContract'])->name('subscriptions.contract-form.store');
    Route::get('/subscriptions/{subscription}/quote-form', [App\Http\Controllers\Admin\SubscriptionController::class, 'quoteForm'])->name('subscriptions.quote-form');
    Route::post('/subscriptions/{subscription}/quote-form', [App\Http\Controllers\Admin\SubscriptionController::class, 'storeQuote'])->name('subscriptions.quote-form.store');
    Route::get('/subscriptions/{subscription}/receipt-form', [App\Http\Controllers\Admin\SubscriptionController::class, 'receiptForm'])->name('subscriptions.receipt-form');
    Route::post('/subscriptions/{subscription}/receipt-form', [App\Http\Controllers\Admin\SubscriptionController::class, 'storeReceipt'])->name('subscriptions.receipt-form.store');

    // Contract Templates
    Route::get('/contract-templates', [App\Http\Controllers\Admin\ContractTemplateController::class, 'index'])->name('contract-templates.index');
    Route::get('/contract-templates/create', [App\Http\Controllers\Admin\ContractTemplateController::class, 'create'])->name('contract-templates.create');
    Route::post('/contract-templates', [App\Http\Controllers\Admin\ContractTemplateController::class, 'store'])->name('contract-templates.store');
    Route::get('/contract-templates/{template}/edit', [App\Http\Controllers\Admin\ContractTemplateController::class, 'edit'])->name('contract-templates.edit');
    Route::put('/contract-templates/{template}', [App\Http\Controllers\Admin\ContractTemplateController::class, 'update'])->name('contract-templates.update');
    Route::delete('/contract-templates/{template}', [App\Http\Controllers\Admin\ContractTemplateController::class, 'destroy'])->name('contract-templates.destroy');
    Route::patch('/contract-templates/{template}/toggle-status', [App\Http\Controllers\Admin\ContractTemplateController::class, 'toggleStatus'])->name('contract-templates.toggle-status');

    // Company Settings
    Route::get('/company-settings', [App\Http\Controllers\Admin\CompanySettingController::class, 'edit'])->name('company-settings.edit');
    Route::put('/company-settings', [App\Http\Controllers\Admin\CompanySettingController::class, 'update'])->name('company-settings.update');

    // Clients
    Route::get('/clients', [App\Http\Controllers\Admin\ClientController::class, 'index'])->name('clients.index');
    Route::get('/clients/{id}', [App\Http\Controllers\Admin\ClientController::class, 'show'])->name('clients.show');

    // New routes
    Route::get('/contracts/{id}/send', [App\Http\Controllers\Admin\ContractController::class, 'send'])->name('contracts.send');
    Route::get('/contracts/{id}', [App\Http\Controllers\Admin\ContractController::class, 'show'])->name('contracts.show');
    Route::get('/contracts/{contract}/options', [App\Http\Controllers\Admin\ContractController::class, 'options'])->name('contracts.options');
    Route::get('/contracts/{contract}/edit', [App\Http\Controllers\Admin\ContractController::class, 'edit'])->name('contracts.edit');
    Route::post('/contracts/{contract}/update', [App\Http\Controllers\Admin\ContractController::class, 'update'])->name('contracts.update');
    Route::get('/contracts', [App\Http\Controllers\Admin\ContractController::class, 'index'])->name('contracts.index');
});

// Subscription Routes
Route::get('/subscriptions/create/{service}/{plan}', [SubscriptionController::class, 'create'])->name('subscriptions.create');
Route::post('/subscriptions/store/{service}/{plan}', [SubscriptionController::class, 'store'])->name('subscriptions.store');

Route::get('/payment/{subscription}', [PaymentController::class, 'showPaymentLink'])->name('payment.link');
Route::any('/payment/callback', function (\Illuminate\Http\Request $request) {
    $cartId = $request->input('cart_id');
    $paymentResult = $request->input('payment_result');
    $status = 'failed';
    if ($paymentResult && isset($paymentResult['response_status']) && $paymentResult['response_status'] == 'A') {
        $status = 'paid';
    }
    if ($cartId && str_starts_with($cartId, 'sub-')) {
        $subscriptionId = intval(str_replace('sub-', '', $cartId));
        $subscription = \App\Models\Subscription::find($subscriptionId);
        if ($subscription) {
            $subscription->update(['payment_status' => $status]);
        }
    }
    return response('تم تحديث حالة الدفع', 200);
})->name('payment.callback');

Route::any('/payment/return', function (\Illuminate\Http\Request $request) {
    $cartId = $request->input('cart_id');
    $paymentResult = $request->input('payment_result');
    $status = 'failed';
    if ($paymentResult && isset($paymentResult['response_status']) && $paymentResult['response_status'] == 'A') {
        $status = 'paid';
    }
    if ($cartId && str_starts_with($cartId, 'sub-')) {
        $subscriptionId = intval(str_replace('sub-', '', $cartId));
        $subscription = \App\Models\Subscription::find($subscriptionId);
        if ($subscription) {
            $subscription->update(['payment_status' => $status]);
        }
    }
    return view('payment.return', ['status' => $status]);
})->name('payment.return');