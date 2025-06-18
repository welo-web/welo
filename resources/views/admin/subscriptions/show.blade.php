@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">تفاصيل الاشتراك #{{ $subscription->id }}</h1>
        <a href="{{ route('admin.subscriptions.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-right"></i> العودة للقائمة
        </a>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5 class="card-title">معلومات الاشتراك</h5>
                            <table class="table">
                                <tr>
                                    <th>الخدمة:</th>
                                    <td>{{ $subscription->service->name }}</td>
                                </tr>
                                <tr>
                                    <th>نوع الباقة:</th>
                                    <td>{{ $subscription->plan_type_text }}</td>
                                </tr>
                                <tr>
                                    <th>نوع الاشتراك:</th>
                                    <td>{{ $subscription->subscription_type_text }}</td>
                                </tr>
                                <tr>
                                    <th>السعر:</th>
                                    <td>{{ number_format($subscription->price, 2) }} ريال</td>
                                </tr>
                                <tr>
                                    <th>الحالة:</th>
                                    <td>
                                        <form action="{{ route('admin.subscriptions.update-status', $subscription) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <select name="status" class="form-select" onchange="this.form.submit()">
                                                <option value="pending" {{ $subscription->status === 'pending' ? 'selected' : '' }}>قيد الانتظار</option>
                                                <option value="active" {{ $subscription->status === 'active' ? 'selected' : '' }}>نشط</option>
                                                <option value="cancelled" {{ $subscription->status === 'cancelled' ? 'selected' : '' }}>ملغي</option>
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <th>الأهمية:</th>
                                    <td>
                                        <form action="{{ route('admin.subscriptions.update-importance', $subscription) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <select name="importance" class="form-select" onchange="this.form.submit()">
                                                <option value="high" {{ $subscription->importance === 'high' ? 'selected' : '' }}>مهم</option>
                                                <option value="medium" {{ $subscription->importance === 'medium' ? 'selected' : '' }}>متوسط الأهمية</option>
                                                <option value="low" {{ $subscription->importance === 'low' ? 'selected' : '' }}>غير مهم</option>
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <th>تاريخ الطلب:</th>
                                    <td>{{ $subscription->created_at->format('Y-m-d H:i') }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h5 class="card-title">معلومات العميل</h5>
                            <table class="table">
                                <tr>
                                    <th>اسم العميل:</th>
                                    <td>{{ $subscription->customer_name }}</td>
                                </tr>
                                <tr>
                                    <th>رقم الهاتف:</th>
                                    <td>
                                        <a href="https://wa.me/{{ $subscription->phone }}" target="_blank" class="btn btn-success btn-sm">
                                            <i class="fab fa-whatsapp"></i> {{ $subscription->phone }}
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>العنوان:</th>
                                    <td>{{ $subscription->address }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="text-end mb-4">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary" onclick="sendPaymentLink()">
                                <i class="fas fa-link"></i> إرسال رابط الدفع
                            </button>
                            <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-paper-plane"></i> إرسال متعدد الخيارات
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" onclick="sendPaymentReceipt()">إيصال الدفع</a></li>
                                <li><a class="dropdown-item" href="#" onclick="sendPriceQuote()">عرض الأسعار</a></li>
                                <li><a class="dropdown-item" href="#" onclick="sendSubscriptionContract()">عقد الاشتراك</a></li>
                            </ul>
                        </div>
                        <a href="{{ route('admin.subscriptions.contract', $subscription) }}" class="btn btn-outline-dark ms-2" target="_blank">
                            <i class="fas fa-file-pdf"></i> عرض العقد
                        </a>
                        <a href="{{ route('admin.subscriptions.receipt', $subscription) }}" class="btn btn-outline-success ms-2" target="_blank">
                            <i class="fas fa-file-invoice"></i> إيصال الدفع
                        </a>
                        <a href="{{ route('admin.subscriptions.contract-form', $subscription->id) }}" class="btn btn-primary ms-2"><i class="fas fa-file-signature"></i> إنشاء عقد</a>
                        <a href="{{ route('admin.subscriptions.quote-form', $subscription->id) }}" class="btn btn-info ms-2"><i class="fas fa-file-invoice-dollar"></i> إنشاء عرض سعر</a>
                        <a href="{{ route('admin.subscriptions.receipt-form', $subscription->id) }}" class="btn btn-success ms-2"><i class="fas fa-receipt"></i> إصدار إيصال دفع</a>
                    </div>

                    @php $contract = $subscription->contract ?? null; @endphp
                    @if($contract)
                        <div class="mb-3">
                            <span class="badge bg-{{ $contract->status == 'sent' ? 'success' : 'info' }}">{{ $contract->status == 'sent' ? 'تم الإرسال' : 'العقد جاهز' }}</span>
                            <a href="{{ route('admin.contracts.show', $contract->id) }}" class="btn btn-dark btn-sm" target="_blank"><i class="fas fa-file-pdf"></i> معاينة العقد</a>
                            @if($contract->status != 'sent')
                                <a href="{{ route('admin.contracts.send', $contract->id) }}" class="btn btn-success btn-sm"><i class="fas fa-paper-plane"></i> إرسال العقد</a>
                            @endif
                        </div>
                    @endif

                    @if($subscription->payment_link)
                        <div class="alert alert-info mt-3">
                            <strong>رابط الدفع الحالي:</strong>
                            <div class="d-flex align-items-center">
                                <input type="text" class="form-control me-2" id="paymentLinkInput" value="{{ $subscription->payment_link }}" readonly style="direction:ltr">
                                <button class="btn btn-outline-secondary btn-sm me-2" onclick="copyPaymentLink()"><i class="fas fa-copy"></i> نسخ</button>
                                <a href="https://wa.me/{{ $subscription->phone }}?text={{ urlencode('يرجى الدفع عبر الرابط التالي: ' . $subscription->payment_link) }}" target="_blank" class="btn btn-success btn-sm"><i class="fab fa-whatsapp"></i> إرسال عبر واتساب</a>
                            </div>
                            <div class="mt-2">
                                <strong>حالة الدفع:</strong> 
                                @if($subscription->payment_status == 'pending')
                                    <span class="badge bg-warning text-dark">بانتظار الدفع</span>
                                @elseif($subscription->payment_status == 'paid')
                                    <span class="badge bg-success">تم الدفع</span>
                                @elseif($subscription->payment_status == 'failed')
                                    <span class="badge bg-danger">فشل الدفع</span>
                                @else
                                    <span class="badge bg-secondary">غير معروف</span>
                                @endif
                            </div>
                        </div>
                    @endif

                    <div class="text-end">
                        <form action="{{ route('admin.subscriptions.destroy', $subscription) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من حذف هذا الاشتراك؟')">
                                <i class="fas fa-trash"></i> حذف الاشتراك
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function sendPaymentLink() {
    // Send payment link via WhatsApp
    const phone = '{{ $subscription->phone }}';
    const message = encodeURIComponent('مرحباً، يرجى الضغط على الرابط التالي لإتمام عملية الدفع: {{ route("payment.link", $subscription->id) }}');
    window.open(`https://wa.me/${phone}?text=${message}`, '_blank');
}

function sendPaymentReceipt() {
    // Send payment receipt via WhatsApp
    const phone = '{{ $subscription->phone }}';
    const message = encodeURIComponent('مرحباً، مرفق إيصال الدفع الخاص بك. شكراً لتعاملكم معنا.');
    window.open(`https://wa.me/${phone}?text=${message}`, '_blank');
}

function sendPriceQuote() {
    // Send price quote via WhatsApp
    const phone = '{{ $subscription->phone }}';
    const message = encodeURIComponent(`مرحباً، عرض الأسعار الخاص بك:\nالخدمة: {{ $subscription->service->name }}\nالباقة: {{ $subscription->plan_type_text }}\nالسعر: {{ number_format($subscription->price, 2) }} ريال`);
    window.open(`https://wa.me/${phone}?text=${message}`, '_blank');
}

function sendSubscriptionContract() {
    // Send subscription contract via WhatsApp
    const phone = '{{ $subscription->phone }}';
    const message = encodeURIComponent(`مرحباً، مرفق عقد الاشتراك الخاص بك.\nمدة الاشتراك: {{ $subscription->subscription_type_text }}\nتاريخ البدء: {{ $subscription->created_at->format('Y-m-d') }}`);
    window.open(`https://wa.me/${phone}?text=${message}`, '_blank');
}

function copyPaymentLink() {
    var copyText = document.getElementById('paymentLinkInput');
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    document.execCommand('copy');
    alert('تم نسخ رابط الدفع!');
}
</script>
@endpush

@endsection 