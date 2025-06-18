@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">تفاصيل العقد رقم #{{ $contract->id }}</div>
                <div class="card-body">
                    <div class="mb-4">
                        <h5>بيانات العميل</h5>
                        <table class="table table-bordered">
                            <tr><th>الاسم</th><td>{{ optional($contract->client)->name ?? '-' }}</td></tr>
                            <tr><th>رقم الجوال</th><td>{{ $contract->subscription->phone ?? '-' }}</td></tr>
                            <tr><th>العنوان</th><td>{{ $contract->subscription->address ?? '-' }}</td></tr>
                        </table>
                    </div>
                    <div class="mb-4">
                        <h5>تفاصيل الاشتراك</h5>
                        <table class="table table-bordered">
                            <tr><th>الخدمة</th><td>{{ $contract->subscription->service->name ?? '-' }}</td></tr>
                            <tr><th>الباقة</th><td>{{ $contract->subscription->plan_type_text ?? '-' }}</td></tr>
                            <tr><th>نوع الاشتراك</th><td>{{ $contract->subscription->subscription_type_text ?? '-' }}</td></tr>
                            <tr><th>تاريخ الطلب</th><td>{{ $contract->subscription->created_at->format('Y-m-d') }}</td></tr>
                        </table>
                    </div>
                    <div class="mb-4">
                        <h5>تفاصيل العقد</h5>
                        <table class="table table-bordered">
                            <tr><th>القالب</th><td>{{ $contract->template->title ?? '-' }}</td></tr>
                            <tr><th>السعر الأساسي</th><td>{{ number_format($contract->price, 2) }} ريال</td></tr>
                            <tr><th>الخصم</th><td>{{ number_format($contract->discount, 2) }} ريال</td></tr>
                            <tr><th>السعر بعد الخصم</th><td>{{ number_format($contract->final_price, 2) }} ريال</td></tr>
                            <tr><th>طريقة الدفع</th><td>{{ $contract->payment_method == 'cash' ? 'نقداً' : ($contract->payment_method == 'visa' ? 'فيزا' : 'تحويل بنكي') }}</td></tr>
                            <tr><th>ملاحظة الدفع</th><td>{{ $contract->payment_note ?? '-' }}</td></tr>
                            @if($contract->payment_attachment)
                                <tr><th>مرفق الدفع</th><td><a href="{{ asset('storage/' . $contract->payment_attachment) }}" target="_blank">عرض المستند</a></td></tr>
                            @endif
                            <tr><th>الحالة</th><td>{{ $contract->status == 'sent' ? 'تم الإرسال' : 'مسودة' }}</td></tr>
                        </table>
                    </div>
                    <div class="mb-4">
                        <h5>الشروط/المحتوى</h5>
                        <div class="border rounded p-3 bg-light">{!! $contract->terms !!}</div>
                    </div>
                    <div class="text-end">
                        <a href="{{ route('admin.contracts.options', $contract->id) }}" class="btn btn-secondary">العودة للخيارات</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 