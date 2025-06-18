<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>عقد اشتراك رقم #{{ $contract->id }}</title>
    <style>
        body { font-family: 'DejaVu Sans', Arial, sans-serif; direction: rtl; margin: 0; padding: 0; }
        .header { text-align: center; border-bottom: 2px solid #333; padding: 20px 0 10px 0; margin-bottom: 20px; }
        .header img { max-width: 150px; margin-bottom: 10px; }
        .company-info { margin-bottom: 10px; font-size: 14px; }
        .section { margin-bottom: 20px; }
        .section-title { font-weight: bold; font-size: 16px; margin-bottom: 8px; }
        .table { width: 100%; border-collapse: collapse; margin-bottom: 20px; font-size: 14px; }
        .table th, .table td { border: 1px solid #333; padding: 8px; }
        .footer { margin-top: 40px; text-align: left; font-size: 12px; color: #888; }
        .terms { background: #f7f7f7; border: 1px solid #ccc; padding: 10px; margin-top: 10px; font-size: 13px; }
    </style>
</head>
<body>
    <div class="header">
        @if($contract->template && $contract->template->company && $contract->template->company->logo)
            <img src="{{ asset('storage/' . $contract->template->company->logo) }}" alt="شعار الشركة">
        @endif
        <div class="company-info">
            <div><strong>{{ $contract->template->company->company_name ?? '' }}</strong></div>
            <div>العنوان: {{ $contract->template->company->address ?? '' }}</div>
            <div>رقم الجوال: {{ $contract->template->company->phone ?? '' }}</div>
            <div>الموقع الإلكتروني: {{ $contract->template->company->website ?? '' }}</div>
            <div>الرقم الضريبي: {{ $contract->template->company->tax_number ?? '' }}</div>
            <div>السجل التجاري: {{ $contract->template->company->commercial_registration ?? '' }}</div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">بيانات العميل</div>
        <table class="table">
            <tr><th>الاسم</th><td>{{ $client->name }}</td></tr>
            <tr><th>رقم الجوال</th><td>{{ $client->phone }}</td></tr>
            <tr><th>العنوان</th><td>{{ $client->address }}</td></tr>
        </table>
    </div>

    <div class="section">
        <div class="section-title">تفاصيل الاشتراك</div>
        <table class="table">
            <tr><th>الخدمة</th><td>{{ $subscription->service->name ?? '-' }}</td></tr>
            <tr><th>الباقة</th><td>{{ $subscription->plan_type_text ?? '-' }}</td></tr>
            <tr><th>نوع الاشتراك</th><td>{{ $subscription->subscription_type_text ?? '-' }}</td></tr>
            <tr><th>السعر الأساسي</th><td>{{ number_format($contract->price, 2) }} ريال</td></tr>
            <tr><th>الخصم</th><td>{{ number_format($contract->discount, 2) }} ريال</td></tr>
            <tr><th>السعر النهائي</th><td><strong>{{ number_format($contract->final_price, 2) }} ريال</strong></td></tr>
        </table>
    </div>

    <div class="section">
        <div class="section-title">الشروط والأحكام</div>
        <div class="terms">
            {!! nl2br(e($contract->terms)) !!}
        </div>
    </div>

    <div class="footer">
        <div style="display: flex; align-items: flex-end; justify-content: flex-start; gap: 40px; min-height: 100px;">
            @if($contract->template && $contract->template->company && $contract->template->company->signature)
                <div style="text-align:center;">
                    <div style="font-size:13px;">توقيع الشركة</div>
                    <img src="{{ asset('storage/' . $contract->template->company->signature) }}" alt="التوقيع" style="max-width:120px; max-height:60px; margin-top:5px;">
                </div>
            @endif
            @if($contract->template && $contract->template->company && $contract->template->company->stamp)
                <div style="text-align:center;">
                    <div style="font-size:13px;">الختم الإلكتروني</div>
                    <img src="{{ asset('storage/' . $contract->template->company->stamp) }}" alt="الختم" style="max-width:80px; max-height:80px; margin-top:5px;">
                </div>
            @endif
        </div>
        <p style="margin-top:20px;">تم إصدار هذا العقد إلكترونيًا ولا يحتاج إلى توقيع.</p>
    </div>
</body>
</html> 