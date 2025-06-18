@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center py-4">
                    <h3 class="mb-0">طلب اشتراك جديد</h3>
                </div>
                <div class="card-body p-4">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @php
                        $selectedService = $services->where('slug', request('service'))->first();
                    @endphp

                    <form action="{{ route('subscriptions.store', ['service' => request('service'), 'plan' => request('plan')]) }}" method="POST" id="subscriptionForm">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="service_id" class="form-label">الخدمة</label>
                            <input type="text" class="form-control" value="{{ request('service') }}" readonly>
                            <input type="hidden" id="service_slug" value="{{ request('service') }}">
                            @if($selectedService)
                                <input type="hidden" name="service_id" value="{{ $selectedService->id }}">
                            @else
                                <div class="alert alert-danger mt-2">الخدمة غير موجودة أو غير مفعلة.</div>
                            @endif
                        </div>

                        <div class="mb-4">
                            <label for="plan_type" class="form-label">الباقة</label>
                            <input type="text" class="form-control" value="{{ request('plan') }}" readonly>
                            <input type="hidden" id="plan_type" value="{{ request('plan') }}">
                            <input type="hidden" name="plan_type" value="{{ request('plan') }}">
                        </div>

                        <div class="mb-4">
                            <label for="subscription_type" class="form-label">نوع الاشتراك</label>
                            <select class="form-select @error('subscription_type') is-invalid @enderror" id="subscription_type" name="subscription_type" required>
                                <option value="monthly">شهري</option>
                                <option value="yearly">سنوي</option>
                            </select>
                            @error('subscription_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="price" class="form-label">السعر</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" readonly>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="customer_name" class="form-label">الاسم</label>
                            <input type="text" class="form-control @error('customer_name') is-invalid @enderror" id="customer_name" name="customer_name" required>
                            @error('customer_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="phone" class="form-label">رقم الهاتف</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" required>
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="address" class="form-label">العنوان</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3" required></textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg px-5">إرسال الطلب</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const selectedService = @json($selectedService);
    const planType = document.getElementById('plan_type').value;
    const subscriptionType = document.getElementById('subscription_type');
    const priceInput = document.getElementById('price');

    function updatePrice() {
        let price = '';
        if (selectedService) {
            if (planType === 'basic') {
                price = subscriptionType.value === 'monthly' ? selectedService.basic_price : selectedService.basic_price * 12;
            } else if (planType === 'advanced') {
                price = subscriptionType.value === 'monthly' ? selectedService.advanced_price : selectedService.advanced_price * 12;
            } else if (planType === 'professional') {
                price = subscriptionType.value === 'monthly' ? selectedService.professional_price : selectedService.professional_price * 12;
            }
        }
        priceInput.value = price;
    }
    subscriptionType.addEventListener('change', updatePrice);
    updatePrice();
});
</script>
@endpush
@endsection 