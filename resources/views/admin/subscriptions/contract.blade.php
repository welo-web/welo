<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>عقد اشتراك رقم #{{ $subscription->id }}</title>
    <style>
        body { font-family: Arial, sans-serif; direction: rtl; }
        .header { text-align: center; margin-bottom: 30px; }
        .section { margin-bottom: 20px; }
        .table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .table th, .table td { border: 1px solid #333; padding: 8px; }
        .footer { margin-top: 40px; text-align: left; font-size: 12px; color: #888; }
        .content { margin: 20px 0; line-height: 1.6; }
    </style>
</head>
<body>
    <div class="header">
        <h2>عقد اشتراك خدمة رقم #{{ $subscription->id }}</h2>
        <p>تاريخ العقد: {{ $subscription->created_at->format('Y-m-d') }}</p>
    </div>

    @if(!$subscription->service)
        <div style="color:red">لا توجد بيانات خدمة لهذا الاشتراك!</div>
    @endif
    @if(!$subscription->customer_name)
        <div style="color:red">لا توجد بيانات اسم العميل!</div>
    @endif

    <div class="section">
        <strong>بيانات العميل:</strong>
        <table class="table">
            <tr><th>الاسم</th><td>{{ $subscription->customer_name }}</td></tr>
            <tr><th>رقم الجوال</th><td>{{ $subscription->phone }}</td></tr>
            <tr><th>العنوان</th><td>{{ $subscription->address }}</td></tr>
        </table>
    </div>

    <div class="section">
        <strong>تفاصيل الخدمة:</strong>
        <table class="table">
            <tr><th>الخدمة</th><td>{{ $subscription->service->name }}</td></tr>
            <tr><th>نوع الباقة</th><td>{{ $subscription->plan_type_text }}</td></tr>
            <tr><th>نوع الاشتراك</th><td>{{ $subscription->subscription_type_text }}</td></tr>
            <tr><th>السعر</th><td>{{ number_format($subscription->price, 2) }} ريال</td></tr>
        </table>
    </div>

    <div class="content">
        {!! $content !!}
    </div>

    <div class="footer">
        <p>تم إصدار هذا العقد إلكترونيًا ولا يحتاج إلى توقيع.</p>
    </div>
</body>
</html> 