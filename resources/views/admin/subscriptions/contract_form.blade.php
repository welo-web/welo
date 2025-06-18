@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">إنشاء عقد للاشتراك #{{ $subscription->id }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.subscriptions.contract-form.store', $subscription->id) }}" enctype="multipart/form-data">
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
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label class="form-label">السعر الأساسي (ريال)</label>
                                <input type="text" class="form-control" value="{{ $subscription->price }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">الخصم (ريال)</label>
                                <input type="number" name="discount" id="discount" class="form-control" value="0" min="0" oninput="updateFinalPrice()">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">السعر بعد الخصم (ريال)</label>
                            <input type="text" id="final_price" class="form-control" value="{{ $subscription->price }}" readonly>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label class="form-label">طريقة الدفع</label>
                                <select name="payment_method" class="form-control" required>
                                    <option value="">اختر...</option>
                                    <option value="cash">نقداً</option>
                                    <option value="visa">فيزا</option>
                                    <option value="bank">تحويل بنكي</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">ملاحظة الدفع</label>
                                <input type="text" name="payment_note" class="form-control" maxlength="255">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">إرفاق مستند (اختياري)</label>
                            <input type="file" name="payment_attachment" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">تفاصيل العقد</label>
                            <div class="border rounded p-3 bg-light">
                                <strong>العميل:</strong> {{ optional($subscription->client)->name ?? $subscription->customer_name }}<br>
                                <strong>رقم الجوال:</strong> {{ $subscription->phone }}<br>
                                <strong>العنوان:</strong> {{ $subscription->address }}<br>
                                <strong>الخدمة:</strong> {{ $subscription->service->name }}<br>
                                <strong>الباقة:</strong> {{ $subscription->plan_type_text }}<br>
                                <strong>نوع الاشتراك:</strong> {{ $subscription->subscription_type_text }}<br>
                                <strong>السعر الأساسي:</strong> {{ number_format($subscription->price, 2) }} ريال<br>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">حفظ العقد</button>
                            <a href="{{ route('admin.subscriptions.show', $subscription->id) }}" class="btn btn-secondary">إلغاء</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function updateFinalPrice() {
    var price = {{ $subscription->price }};
    var discount = parseFloat(document.getElementById('discount').value) || 0;
    var finalPrice = price - discount;
    document.getElementById('final_price').value = finalPrice > 0 ? finalPrice : 0;
}
</script>
@endsection 