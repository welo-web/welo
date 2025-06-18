<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Subscription;
use App\Models\Client;
use App\Models\ContractTemplate;
use App\Models\Company;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function create(Request $request)
    {
        $subscription = null;
        $template = null;
        $initialData = [];
        $documentType = $request->get('document_type', 'contract');

        if ($request->has('subscription_id') && $request->has('template_id')) {
            $subscription = Subscription::with(['client', 'service'])->find($request->subscription_id);
            $template = ContractTemplate::find($request->template_id);
            if ($subscription && $template) {
                $initialData = [
                    'client_id' => $subscription->client_id,
                    'subscription_id' => $subscription->id,
                    'template_id' => $template->id,
                    'price' => $subscription->price,
                    'discount' => 0,
                    'final_price' => $subscription->price,
                    'terms' => $template->terms,
                    'company_id' => $template->company_id,
                ];
            }
        }

        $clients = Client::all();
        $templates = ContractTemplate::all();
        $companies = class_exists('App\\Models\\Company') ? \App\Models\Company::all() : collect();

        return view('admin.contracts.create', compact('clients', 'templates', 'companies', 'initialData', 'subscription', 'template', 'documentType'));
    }

    public function store(Request $request, $subscriptionId)
    {
        $subscription = Subscription::with(['service', 'client'])->findOrFail($subscriptionId);
        $validated = $request->validate([
            'template_id' => 'required|exists:contract_templates,id',
            'discount' => 'nullable|numeric|min:0',
            'terms' => 'nullable|string',
        ]);
        $template = ContractTemplate::findOrFail($validated['template_id']);
        $price = $subscription->price;
        $discount = $validated['discount'] ?? 0;
        $final_price = $price - $discount;
        $contract = Contract::create([
            'subscription_id' => $subscription->id,
            'client_id' => $subscription->client_id,
            'template_id' => $template->id,
            'type' => $template->title,
            'price' => $price,
            'discount' => $discount,
            'final_price' => $final_price,
            'terms' => $validated['terms'] ?? $template->terms,
            'status' => 'draft',
        ]);
        return redirect()->route('admin.subscriptions.index')->with('success', 'تم إنشاء العقد بنجاح');
    }

    public function send($id)
    {
        $contract = \App\Models\Contract::with(['subscription', 'client', 'template.company'])->findOrFail($id);
        $client = $contract->client;
        try {
            // توليد PDF فقط إذا لم يكن موجودًا أو الملف غير صالح
            if (!$contract->pdf_path || !file_exists(storage_path('app/public/' . $contract->pdf_path))) {
                $pdfFileName = 'contracts/contract_' . $contract->id . '_' . time() . '.pdf';
                $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.contracts.pdf', [
                    'contract' => $contract,
                    'subscription' => $contract->subscription,
                    'client' => $client
                ])->setPaper('a4');
                $pdf->setOptions([
                    'isHtml5ParserEnabled' => true,
                    'isRemoteEnabled' => false,
                    'defaultFont' => 'DejaVu Sans',
                ]);
                $pdf->save(storage_path('app/public/' . $pdfFileName));
                $contract->pdf_path = $pdfFileName;
                $contract->save();
            }
            // إرسال ملف PDF عبر واتساب (رابط مباشر)
            $pdfUrl = asset('storage/' . $contract->pdf_path);
            $phone = $client->phone;
            $message = "مرحباً {$client->name}،\nمرفق عقدك. يمكنك تحميله من هنا: $pdfUrl";
            // إرسال عبر WhatsAppService إذا متوفر
            if (app()->bound('App\\Services\\WhatsAppService')) {
                $wa = app(\App\Services\WhatsAppService::class);
                $wa->sendTemplateMessage($phone, 'document', [
                    [
                        'type' => 'header',
                        'parameters' => [
                            [
                                'type' => 'document',
                                'document' => [
                                    'link' => $pdfUrl,
                                    'filename' => 'عقد_اشتراك_'.$contract->id.'.pdf'
                                ]
                            ]
                        ]
                    ],
                    [
                        'type' => 'body',
                        'parameters' => [
                            [ 'type' => 'text', 'text' => $message ]
                        ]
                    ]
                ]);
            }
            $contract->status = 'sent';
            $contract->save();
            return redirect()->route('admin.contracts.options', $contract->id)->with('success', 'تم إرسال العقد للعميل عبر واتساب بنجاح!');
        } catch (\Exception $e) {
            return redirect()->route('admin.contracts.options', $contract->id)->with('error', 'حدث خطأ أثناء توليد أو إرسال العقد: ' . $e->getMessage());
        }
    }

    public function options($id)
    {
        $contract = \App\Models\Contract::with(['subscription', 'client', 'template'])->findOrFail($id);
        return view('admin.contracts.options', compact('contract'));
    }

    public function show($id)
    {
        $contract = \App\Models\Contract::with(['subscription.service', 'client', 'template'])->findOrFail($id);
        return view('admin.contracts.show', compact('contract'));
    }

    public function edit(Contract $contract)
    {
        $contract->load(['subscription.service', 'client', 'template']);
        $templates = \App\Models\ContractTemplate::where('is_active', true)->get();
        return view('admin.contracts.edit', compact('contract', 'templates'));
    }

    public function update(Request $request, Contract $contract)
    {
        $validated = $request->validate([
            'template_id' => 'required|exists:contract_templates,id',
            'discount' => 'nullable|numeric|min:0',
            'payment_method' => 'required|in:cash,visa,bank',
            'payment_note' => 'nullable|string|max:255',
            'payment_attachment' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:4096',
        ]);
        $template = \App\Models\ContractTemplate::findOrFail($validated['template_id']);
        $price = $contract->subscription->price;
        $discount = $validated['discount'] ?? 0;
        $final_price = $price - $discount;
        // رفع مستند جديد إذا وجد
        $attachmentPath = $contract->payment_attachment;
        if ($request->hasFile('payment_attachment')) {
            $attachmentPath = $request->file('payment_attachment')->store('contracts/attachments', 'public');
        }
        $contract->update([
            'template_id' => $template->id,
            'type' => $template->title,
            'price' => $price,
            'discount' => $discount,
            'final_price' => $final_price,
            'terms' => $template->terms,
            'payment_method' => $validated['payment_method'],
            'payment_note' => $validated['payment_note'] ?? null,
            'payment_attachment' => $attachmentPath,
        ]);
        return redirect()->route('admin.contracts.options', $contract->id)->with('success', 'تم تحديث بيانات العقد بنجاح.');
    }

    public function index(Request $request)
    {
        $query = \App\Models\Contract::with(['client', 'subscription.service', 'template']);
        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('client', function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('phone', 'like', "%$search%")
                  ->orWhere('address', 'like', "%$search%") ;
            });
        }
        $contracts = $query->latest()->paginate(15);
        return view('admin.contracts.index', compact('contracts'));
    }
} 