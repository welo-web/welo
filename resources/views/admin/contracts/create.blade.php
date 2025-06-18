@extends('layouts.admin')

@section('content')
@php
    $documentType = $documentType ?? 'contract';
@endphp
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">إنشاء {{ $documentType == 'quote' ? 'عرض سعر' : 'عقد اشتراك' }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.contracts.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="document_type" value="{{ $documentType }}">
                        <div class="form-group">
                            <label>العميل</label>
                            <select name="client_id" class="form-control @error('client_id') is-invalid @enderror" required>
                                <option value="">اختر العميل...</option>
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}" {{ old('client_id', $initialData['client_id'] ?? '') == $client->id ? 'selected' : '' }}>
                                        {{ $client->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('client_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label>الاشتراك</label>
                            <select name="subscription_id" class="form-control @error('subscription_id') is-invalid @enderror" required>
                                <option value="">اختر الاشتراك...</option>
                                @if(isset($initialData['subscription_id']) && $subscription)
                                    <option value="{{ $initialData['subscription_id'] }}" selected>
                                        {{ $subscription->service->name }} - {{ $subscription->plan_type_text }}
                                    </option>
                                @endif
                            </select>
                            @error('subscription_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label>القالب</label>
                            <select name="template_id" class="form-control @error('template_id') is-invalid @enderror" required>
                                <option value="">اختر القالب...</option>
                                @foreach($templates as $templateItem)
                                    <option value="{{ $templateItem->id }}" {{ old('template_id', $initialData['template_id'] ?? '') == $templateItem->id ? 'selected' : '' }}>
                                        {{ $templateItem->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('template_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label>الشركة</label>
                            <select name="company_id" class="form-control @error('company_id') is-invalid @enderror" required>
                                <option value="">اختر الشركة...</option>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}" {{ old('company_id', $initialData['company_id'] ?? '') == $company->id ? 'selected' : '' }}>
                                        {{ $company->company_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('company_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label>السعر الأساسي</label>
                            <input type="number" step="0.01" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $initialData['price'] ?? '') }}" required>
                            @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label>الخصم</label>
                            <input type="number" step="0.01" name="discount" class="form-control @error('discount') is-invalid @enderror" value="{{ old('discount', $initialData['discount'] ?? '0') }}">
                            @error('discount')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label>السعر النهائي</label>
                            <input type="number" step="0.01" name="final_price" class="form-control @error('final_price') is-invalid @enderror" value="{{ old('final_price', $initialData['final_price'] ?? '') }}" required>
                            @error('final_price')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label>الحالة</label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                                <option value="draft" {{ old('status', $initialData['status'] ?? '') == 'draft' ? 'selected' : '' }}>مسودة</option>
                                <option value="quote" {{ old('status', $initialData['status'] ?? '') == 'quote' ? 'selected' : '' }}>عرض سعر</option>
                                <option value="proforma" {{ old('status', $initialData['status'] ?? '') == 'proforma' ? 'selected' : '' }}>بروفرما</option>
                                <option value="final" {{ old('status', $initialData['status'] ?? '') == 'final' ? 'selected' : '' }}>نهائي</option>
                            </select>
                            @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label>الشروط والأحكام</label>
                            <textarea name="terms" class="form-control @error('terms') is-invalid @enderror" rows="6" required>{{ old('terms', $initialData['terms'] ?? '') }}</textarea>
                            @error('terms')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label>معاينة التصميم</label>
                            <div id="design-preview" style="border:1px solid #ccc; padding:20px; background:#f9f9f9; min-height:200px; margin-bottom:20px;"></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">حفظ</button>
                            <a href="{{ route('admin.subscriptions.index') }}" class="btn btn-secondary">إلغاء</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function renderPreview() {
    let design = @json($template->content ?? ($templateItem->content ?? ''));
    // اجلب القيم من الحقول
    const clientName = document.querySelector('[name="client_id"]') ? document.querySelector('[name="client_id"]').selectedOptions[0].text : '';
    const price = document.querySelector('[name="price"]') ? document.querySelector('[name="price"]').value : '';
    const discount = document.querySelector('[name="discount"]') ? document.querySelector('[name="discount"]').value : '';
    const finalPrice = document.querySelector('[name="final_price"]') ? document.querySelector('[name="final_price"]').value : '';
    const terms = document.querySelector('[name="terms"]') ? document.querySelector('[name="terms"]').value : '';
    // استبدال المتغيرات
    design = design.replaceAll('{client_name}', clientName)
                   .replaceAll('{price}', price)
                   .replaceAll('{discount}', discount)
                   .replaceAll('{final_price}', finalPrice)
                   .replaceAll('{terms}', terms.replace(/\n/g, '<br>'));
    document.getElementById('design-preview').innerHTML = design;
}
document.addEventListener('DOMContentLoaded', function() {
    renderPreview();
    document.querySelectorAll('input, select, textarea').forEach(function(el) {
        el.addEventListener('input', renderPreview);
        el.addEventListener('change', renderPreview);
    });
});
</script>
@endpush 