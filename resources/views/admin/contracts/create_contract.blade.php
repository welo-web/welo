@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">إنشاء عقد جديد للاشتراك رقم #{{ $subscription->id }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.contracts.store', $subscription->id) }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label>اختر القالب</label>
                            <select name="template_id" class="form-control @error('template_id') is-invalid @enderror" required>
                                <option value="">-- اختر --</option>
                                @foreach($templates as $template)
                                    <option value="{{ $template->id }}">{{ $template->title }}</option>
                                @endforeach
                            </select>
                            @error('template_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>قيمة الخصم (ريال)</label>
                            <input type="number" name="discount" class="form-control @error('discount') is-invalid @enderror" min="0" step="0.01" value="{{ old('discount', 0) }}">
                            @error('discount')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>الشروط</label>
                            <textarea name="terms" class="form-control @error('terms') is-invalid @enderror" rows="5">{{ old('terms') }}</textarea>
                            <small class="form-text text-muted">يمكنك تعديل الشروط أو تركها فارغة لاستخدام الشروط الافتراضية من القالب.</small>
                            @error('terms')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">حفظ العقد</button>
                            <a href="{{ route('admin.subscriptions.index') }}" class="btn btn-secondary">إلغاء</a>
                        </div>
                    </form>
                    <div class="mt-4">
                        <h5>تفاصيل الاشتراك:</h5>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>العميل:</strong> {{ $subscription->customer_name }}</li>
                            <li class="list-group-item"><strong>الخدمة:</strong> {{ $subscription->service->name ?? '-' }}</li>
                            <li class="list-group-item"><strong>الباقة:</strong> {{ $subscription->plan_type_text }}</li>
                            <li class="list-group-item"><strong>نوع الاشتراك:</strong> {{ $subscription->subscription_type_text }}</li>
                            <li class="list-group-item"><strong>السعر:</strong> {{ $subscription->price }} ريال</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 