@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-warning text-dark">تعديل بيانات العقد رقم #{{ $contract->id }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.contracts.update', $contract->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">القالب</label>
                            <select name="template_id" class="form-control" required>
                                <option value="">اختر القالب...</option>
                                @foreach($templates as $template)
                                    <option value="{{ $template->id }}" {{ $contract->template_id == $template->id ? 'selected' : '' }}>{{ $template->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label class="form-label">السعر الأساسي (ريال)</label>
                                <input type="text" class="form-control" value="{{ $contract->price }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">الخصم (ريال)</label>
                                <input type="number" name="discount" id="discount" class="form-control" value="{{ $contract->discount }}" min="0" oninput="updateFinalPrice()">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">السعر بعد الخصم (ريال)</label>
                            <input type="text" id="final_price" class="form-control" value="{{ $contract->final_price }}" readonly>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label class="form-label">طريقة الدفع</label>
                                <select name="payment_method" class="form-control" required>
                                    <option value="">اختر...</option>
                                    <option value="cash" {{ $contract->payment_method == 'cash' ? 'selected' : '' }}>نقداً</option>
                                    <option value="visa" {{ $contract->payment_method == 'visa' ? 'selected' : '' }}>فيزا</option>
                                    <option value="bank" {{ $contract->payment_method == 'bank' ? 'selected' : '' }}>تحويل بنكي</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">ملاحظة الدفع</label>
                                <input type="text" name="payment_note" class="form-control" maxlength="255" value="{{ $contract->payment_note }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">إرفاق مستند (اختياري)</label>
                            <input type="file" name="payment_attachment" class="form-control">
                            @if($contract->payment_attachment)
                                <div class="mt-2"><a href="{{ asset('storage/' . $contract->payment_attachment) }}" target="_blank">عرض المستند الحالي</a></div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">تفاصيل العقد</label>
                            <div class="border rounded p-3 bg-light">
                                <strong>العميل:</strong> {{ optional($contract->client)->name ?? $contract->subscription->customer_name }}<br>
                                <strong>رقم الجوال:</strong> {{ $contract->subscription->phone }}<br>
                                <strong>العنوان:</strong> {{ $contract->subscription->address }}<br>
                                <strong>الخدمة:</strong> {{ $contract->subscription->service->name }}<br>
                                <strong>الباقة:</strong> {{ $contract->subscription->plan_type_text }}<br>
                                <strong>نوع الاشتراك:</strong> {{ $contract->subscription->subscription_type_text }}<br>
                                <strong>السعر الأساسي:</strong> {{ number_format($contract->price, 2) }} ريال<br>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-warning">حفظ التعديلات</button>
                            <a href="{{ route('admin.contracts.options', $contract->id) }}" class="btn btn-secondary">إلغاء</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function updateFinalPrice() {
    var price = {{ $contract->price }};
    var discount = parseFloat(document.getElementById('discount').value) || 0;
    var finalPrice = price - discount;
    document.getElementById('final_price').value = finalPrice > 0 ? finalPrice : 0;
}
</script>
@endsection 