@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">خيارات العقد رقم #{{ $contract->id }}</div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="mb-4">
                        <h5>ملخص العقد</h5>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>العميل:</strong> {{ optional($contract->client)->name ?? '-' }}</li>
                            <li class="list-group-item"><strong>الخدمة:</strong> {{ $contract->subscription->service->name ?? '-' }}</li>
                            <li class="list-group-item"><strong>الباقة:</strong> {{ $contract->subscription->plan_type_text ?? '-' }}</li>
                            <li class="list-group-item"><strong>نوع الاشتراك:</strong> {{ $contract->subscription->subscription_type_text ?? '-' }}</li>
                            <li class="list-group-item"><strong>السعر الأساسي:</strong> {{ number_format($contract->price, 2) }} ريال</li>
                            <li class="list-group-item"><strong>الخصم:</strong> {{ number_format($contract->discount, 2) }} ريال</li>
                            <li class="list-group-item"><strong>السعر بعد الخصم:</strong> {{ number_format($contract->final_price, 2) }} ريال</li>
                            <li class="list-group-item"><strong>طريقة الدفع:</strong> {{ $contract->payment_method == 'cash' ? 'نقداً' : ($contract->payment_method == 'visa' ? 'فيزا' : 'تحويل بنكي') }}</li>
                            <li class="list-group-item"><strong>ملاحظة الدفع:</strong> {{ $contract->payment_note ?? '-' }}</li>
                            @if($contract->payment_attachment)
                                <li class="list-group-item"><strong>مرفق الدفع:</strong> <a href="{{ asset('storage/' . $contract->payment_attachment) }}" target="_blank">عرض المستند</a></li>
                            @endif
                        </ul>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.contracts.show', $contract->id) }}" class="btn btn-outline-dark"><i class="fas fa-file-pdf"></i> معاينة العقد</a>
                        <a href="https://wa.me/{{ $contract->client->phone }}?text={{ urlencode('مرحباً ' . $contract->client->name . ',\nمرفق عقدك. يمكنك تحميله من هنا: ' . asset('storage/' . $contract->pdf_path)) }}" target="_blank" class="btn btn-success"><i class="fab fa-whatsapp"></i> إرسال العقد عبر واتساب</a>
                        @if(config('services.whatsapp.api_url') && config('services.whatsapp.api_token') && config('services.whatsapp.phone_number_id'))
                            <form method="POST" action="{{ route('admin.contracts.send', $contract->id) }}" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-info"><i class="fas fa-paper-plane"></i> إرسال تلقائي (API)</button>
                            </form>
                        @endif
                        {{-- زر تعديل العقد يوجه مباشرة لصفحة التعديل الصحيحة --}}
                        <a href="{{ route('admin.contracts.edit', $contract->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i> تعديل العقد</a>
                        <a href="{{ route('admin.subscriptions.show', $contract->subscription_id) }}" class="btn btn-secondary">العودة للاشتراك</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 