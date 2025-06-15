@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">طلب اشتراك جديد</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

    <form method="POST" action="{{ route('subscribe.store') }}">
        @csrf

                        <div class="form-group row mb-3">
                            <label for="project" class="col-md-4 col-form-label text-md-right">نوع النشاط</label>
                            <div class="col-md-6">
                                <select id="project" class="form-control @error('project') is-invalid @enderror" name="project" required>
                <option value="">اختر نوع النشاط</option>
                                    @foreach($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                                    @endforeach
            </select>
                                @error('project')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
        </div>

                        <div class="form-group row mb-3">
                            <label for="plan" class="col-md-4 col-form-label text-md-right">الباقة</label>
                            <div class="col-md-6">
                                <select id="plan" class="form-control @error('plan') is-invalid @enderror" name="plan" required disabled>
                <option value="">اختر الباقة</option>
            </select>
                                @error('plan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
        </div>

                        <div class="form-group row mb-3">
                            <label for="billing" class="col-md-4 col-form-label text-md-right">نوع الاشتراك</label>
                            <div class="col-md-6">
                                <select id="billing" class="form-control @error('billing') is-invalid @enderror" name="billing" required disabled>
                <option value="">اختر نوع الاشتراك</option>
                                    <option value="monthly">شهري</option>
                                    <option value="yearly">سنوي</option>
            </select>
                                @error('billing')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="price" class="col-md-4 col-form-label text-md-right">السعر</label>
                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" readonly>
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
        </div>

                        <div class="form-group row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">الاسم</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
        </div>

                        <div class="form-group row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">رقم الجوال</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" required>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    إرسال الطلب
                                </button>
                            </div>
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
    const projectSelect = document.getElementById('project');
    const planSelect = document.getElementById('plan');
    const billingSelect = document.getElementById('billing');
    const priceInput = document.getElementById('price');
    const plans = @json($plans);

    projectSelect.addEventListener('change', function() {
        const selectedServiceId = this.value;
        
        // Clear and disable plan select
        planSelect.innerHTML = '<option value="">اختر الباقة</option>';
        planSelect.disabled = true;
        
        // Clear and disable billing select
        billingSelect.value = '';
        billingSelect.disabled = true;
        
        // Clear price
        priceInput.value = '';
        
        if (selectedServiceId) {
            // Filter plans for selected service
            const servicePlans = plans.filter(plan => plan.service_id == selectedServiceId);
            
            // Add plans to select
            servicePlans.forEach(plan => {
                const option = document.createElement('option');
                option.value = plan.id;
                option.textContent = plan.name;
                planSelect.appendChild(option);
            });
            
            // Enable plan select
            planSelect.disabled = false;
        }
    });

    planSelect.addEventListener('change', function() {
        const selectedPlanId = this.value;
        
        // Clear and disable billing select
        billingSelect.value = '';
        billingSelect.disabled = true;
        
        // Clear price
        priceInput.value = '';
        
        if (selectedPlanId) {
            // Enable billing select
            billingSelect.disabled = false;
        }
    });

    billingSelect.addEventListener('change', function() {
        const selectedPlanId = planSelect.value;
        const selectedBilling = this.value;
        
        if (selectedPlanId && selectedBilling) {
            const selectedPlan = plans.find(plan => plan.id == selectedPlanId);
            if (selectedPlan) {
                priceInput.value = selectedBilling === 'monthly' ? selectedPlan.monthly_price : selectedPlan.yearly_price;
            }
        }
    });
    });
</script>
@endpush
@endsection