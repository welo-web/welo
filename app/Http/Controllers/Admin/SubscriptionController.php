<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Services\WhatsAppService;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class SubscriptionController extends Controller
{
    protected $whatsappService;

    public function __construct(WhatsAppService $whatsappService)
    {
        $this->whatsappService = $whatsappService;
    }

    public function index()
    {
        $subscriptions = Subscription::with('service')
            ->latest()
            ->paginate(10);
        $templates = \App\Models\ContractTemplate::all();
        return view('admin.subscriptions.index', compact('subscriptions', 'templates'));
    }

    public function show(Subscription $subscription)
    {
        return view('admin.subscriptions.show', compact('subscription'));
    }

    public function updateStatus(Request $request, Subscription $subscription)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,active,cancelled'
        ]);

        $subscription->update($validated);

        return redirect()->back()->with('success', 'تم تحديث حالة الاشتراك بنجاح');
    }

    public function destroy(Subscription $subscription)
    {
        $subscription->delete();

        return redirect()->route('admin.subscriptions.index')
            ->with('success', 'تم حذف الاشتراك بنجاح');
    }

    public function updateImportance(Request $request, Subscription $subscription)
    {
        $request->validate([
            'importance' => 'required|in:high,medium,low'
        ]);

        $subscription->update([
            'importance' => $request->importance
        ]);

        return back()->with('success', 'تم تحديث مستوى الأهمية بنجاح');
    }

    public function sendPaymentLink(Subscription $subscription)
    {
        try {
            $this->whatsappService->sendPaymentLink($subscription);
            return back()->with('success', 'تم إرسال رابط الدفع بنجاح');
        } catch (\Exception $e) {
            return back()->with('error', 'حدث خطأ أثناء إرسال رابط الدفع');
        }
    }

    public function sendPaymentReceipt(Subscription $subscription)
    {
        try {
            $this->whatsappService->sendInvoice($subscription);
            return back()->with('success', 'تم إرسال إيصال الدفع بنجاح');
        } catch (\Exception $e) {
            return back()->with('error', 'حدث خطأ أثناء إرسال إيصال الدفع');
        }
    }

    public function sendPriceQuote(Subscription $subscription)
    {
        try {
            // You can create a specific template for price quotes
            $this->whatsappService->sendTemplateMessage(
                $subscription->phone,
                'price_quote',
                [
                    [
                        "type" => "body",
                        "parameters" => [
                            [
                                "type" => "text",
                                "text" => $subscription->customer_name
                            ],
                            [
                                "type" => "text",
                                "text" => $subscription->service->name
                            ],
                            [
                                "type" => "text",
                                "text" => number_format($subscription->price, 2)
                            ]
                        ]
                    ]
                ]
            );
            return back()->with('success', 'تم إرسال عرض الأسعار بنجاح');
        } catch (\Exception $e) {
            return back()->with('error', 'حدث خطأ أثناء إرسال عرض الأسعار');
        }
    }

    public function sendSubscriptionContract(Subscription $subscription)
    {
        try {
            $this->whatsappService->sendSubscriptionConfirmation($subscription);
            return back()->with('success', 'تم إرسال عقد الاشتراك بنجاح');
        } catch (\Exception $e) {
            return back()->with('error', 'حدث خطأ أثناء إرسال عقد الاشتراك');
        }
    }

    public function generateContractPdf($id)
    {
        \Log::info('بدء توليد عقد الاشتراك PDF', ['subscription_id' => $id]);
        $subscription = Subscription::with(['service'])->findOrFail($id);
        $template = \App\Models\ContractTemplate::where('is_active', true)->first();
        if (!$template) {
            return 'لا يوجد قالب عقد نشط.';
        }
        // بيانات الشركة
        $company = \App\Models\CompanySetting::first();
        $companyVars = [
            '{company_name}' => $company->company_name ?? '',
            '{company_phone}' => $company->phone ?? '',
            '{company_website}' => $company->website ?? '',
            '{company_address}' => $company->address ?? '',
            '{company_tax_number}' => $company->tax_number ?? '',
            '{company_commercial_registration}' => $company->commercial_registration ?? '',
            '{company_logo}' => $company && $company->logo ? '<img src="'.asset('storage/'.$company->logo).'" style="max-width:120px;">' : '',
            '{company_letterhead}' => $company && $company->letterhead ? '<img src="'.asset('storage/'.$company->letterhead).'" style="max-width:100%;">' : '',
        ];
        // بيانات الاشتراك
        $vars = [
            '{customer_name}' => $subscription->customer_name,
            '{phone}' => $subscription->phone,
            '{address}' => $subscription->address,
            '{service_name}' => $subscription->service->name ?? '',
            '{plan_type}' => $subscription->plan_type_text,
            '{subscription_type}' => $subscription->subscription_type_text,
            '{price}' => number_format($subscription->price, 2),
            '{date}' => $subscription->created_at->format('Y-m-d'),
        ];
        $content = strtr($template->content, array_merge($vars, $companyVars));
        if (request()->has('debug')) {
            return view('admin.subscriptions.contract', [
                'subscription' => $subscription,
                'content' => $content
            ]);
        }
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.subscriptions.contract', [
            'subscription' => $subscription,
            'content' => $content
        ])->setPaper('a4');
        return $pdf->stream('contract_'.$subscription->id.'.pdf');
    }

    public function generateReceiptPdf(Subscription $subscription)
    {
        try {
            \Log::info('Starting receipt PDF generation for subscription #' . $subscription->id);
            
            \Log::info('Loading receipt view');
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.subscriptions.receipt', compact('subscription'));
            $fileName = 'إيصال-دفع-اشتراك-'.$subscription->id.'.pdf';
            
            // Set PDF options
            \Log::info('Setting PDF options');
            $pdf->setPaper('a4');
            $pdf->setOption('isHtml5ParserEnabled', true);
            $pdf->setOption('isRemoteEnabled', true);
            
            \Log::info('Generating PDF download');
            return $pdf->stream($fileName);
        } catch (\Exception $e) {
            \Log::error('Receipt PDF Generation Error: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            return back()->with('error', 'حدث خطأ أثناء توليد الإيصال: ' . $e->getMessage());
        }
    }

    public function contractForm(Subscription $subscription)
    {
        $templates = \App\Models\ContractTemplate::where('is_active', true)->get();
        return view('admin.subscriptions.contract_form', compact('subscription', 'templates'));
    }

    public function storeContract(Request $request, Subscription $subscription)
    {
        $validated = $request->validate([
            'template_id' => 'required|exists:contract_templates,id',
            'discount' => 'nullable|numeric|min:0',
            'payment_method' => 'required|in:cash,visa,bank',
            'payment_note' => 'nullable|string|max:255',
            'payment_attachment' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:4096',
        ]);
        $template = \App\Models\ContractTemplate::findOrFail($validated['template_id']);
        $price = $subscription->price;
        $discount = $validated['discount'] ?? 0;
        $final_price = $price - $discount;
        // إصلاح client_id إذا كان غير موجود
        $client_id = $subscription->client_id;
        if (!$client_id) {
            $client = \App\Models\Client::firstOrCreate(
                ['phone' => $subscription->phone],
                [
                    'name' => $subscription->customer_name,
                    'address' => $subscription->address
                ]
            );
            $client_id = $client->id;
            $subscription->update(['client_id' => $client_id]);
        }
        // رفع المستند إذا وجد
        $attachmentPath = null;
        if ($request->hasFile('payment_attachment')) {
            $attachmentPath = $request->file('payment_attachment')->store('contracts/attachments', 'public');
        }
        $contract = \App\Models\Contract::create([
            'subscription_id' => $subscription->id,
            'client_id' => $client_id,
            'template_id' => $template->id,
            'type' => $template->title,
            'price' => $price,
            'discount' => $discount,
            'final_price' => $final_price,
            'terms' => $template->terms,
            'status' => 'draft',
            'payment_method' => $validated['payment_method'],
            'payment_note' => $validated['payment_note'] ?? null,
            'payment_attachment' => $attachmentPath,
        ]);
        return redirect()->route('admin.contracts.options', $contract->id)->with('success', 'تم حفظ العقد بنجاح. يمكنك الآن معاينة أو إرسال أو تعديل العقد.');
    }

    public function quoteForm(Subscription $subscription)
    {
        $templates = \App\Models\ContractTemplate::where('is_active', true)->get();
        return view('admin.subscriptions.quote_form', compact('subscription', 'templates'));
    }

    public function storeQuote(Request $request, Subscription $subscription)
    {
        $validated = $request->validate([
            'template_id' => 'required|exists:contract_templates,id',
            'discount' => 'nullable|numeric|min:0',
        ]);
        $template = \App\Models\ContractTemplate::findOrFail($validated['template_id']);
        $price = $subscription->price;
        $discount = $validated['discount'] ?? 0;
        $final_price = $price - $discount;
        $contract = \App\Models\Contract::create([
            'subscription_id' => $subscription->id,
            'client_id' => $subscription->client_id,
            'template_id' => $template->id,
            'type' => 'quote',
            'price' => $price,
            'discount' => $discount,
            'final_price' => $final_price,
            'terms' => $template->terms,
            'status' => 'draft',
        ]);
        return redirect()->route('admin.subscriptions.show', $subscription->id)->with('success', 'تم حفظ عرض السعر وهو جاهز للإرسال');
    }

    public function receiptForm(Subscription $subscription)
    {
        return view('admin.subscriptions.receipt_form', compact('subscription'));
    }

    public function storeReceipt(Request $request, Subscription $subscription)
    {
        $validated = $request->validate([
            'price' => 'required|numeric|min:0',
        ]);
        $subscription->update(['price' => $validated['price']]);
        // يمكنك هنا إنشاء سجل إيصال منفصل إذا كان لديك موديل Receipt
        return redirect()->route('admin.subscriptions.show', $subscription->id)->with('success', 'تم حفظ إيصال الدفع وهو جاهز للإرسال');
    }
} 