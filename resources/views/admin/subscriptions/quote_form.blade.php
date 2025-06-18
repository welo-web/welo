@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">إنشاء عرض سعر للاشتراك #{{ $subscription->id }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.subscriptions.quote-form.store', $subscription->id) }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">القالب</label>
                            <select name="template_id" class="form-control" required>
                                <option value="">اختر القالب...</option>
                                @foreach($templates as $template)
                                    <option value="{{ $template->id }}">{{ $template->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">الخصم (ريال)</label>
                            <input type="number" name="discount" class="form-control" value="0" min="0">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">تفاصيل الاشتراك</label>
                            <ul class="list-group">
                                <li class="list-group-item">اسم العميل: {{ $subscription->customer_name }}</li>
                                <li class="list-group-item">الخدمة: {{ $subscription->service->name }}</li>
                                <li class="list-group-item">الباقة: {{ $subscription->plan_type_text }}</li>
                                <li class="list-group-item">نوع الاشتراك: {{ $subscription->subscription_type_text }}</li>
                                <li class="list-group-item">السعر: {{ number_format($subscription->price, 2) }} ريال</li>
                                <li class="list-group-item">رقم الجوال: {{ $subscription->phone }}</li>
                                <li class="list-group-item">العنوان: {{ $subscription->address }}</li>
                            </ul>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-info">حفظ عرض السعر</button>
                            <a href="{{ route('admin.subscriptions.show', $subscription->id) }}" class="btn btn-secondary">إلغاء</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 