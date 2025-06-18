@extends('layouts.admin')

@section('title', 'تعديل الباقة')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">تعديل الباقة</h1>
        <a href="{{ route('admin.plans.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-right"></i> العودة للباقات
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.plans.update', $plan) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="service_id" class="form-label">الخدمة</label>
                    <select name="service_id" id="service_id" class="form-select @error('service_id') is-invalid @enderror" required>
                        <option value="">اختر الخدمة</option>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}" {{ (old('service_id', $plan->service_id) == $service->id) ? 'selected' : '' }}>
                                {{ $service->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('service_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">اسم الباقة</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $plan->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">الوصف</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description', $plan->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">السعر</label>
                    <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $plan->price) }}" required>
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="features" class="form-label">المميزات</label>
                    <div id="features-container">
                        @foreach($plan->features ?? [] as $feature)
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="features[]" value="{{ $feature }}" placeholder="أدخل ميزة">
                            <button type="button" class="btn btn-danger remove-feature">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-secondary" id="add-feature">
                        <i class="fas fa-plus"></i> إضافة ميزة
                    </button>
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ old('is_active', $plan->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">نشط</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('add-feature').addEventListener('click', function() {
        const container = document.getElementById('features-container');
        const newFeature = document.createElement('div');
        newFeature.className = 'input-group mb-2';
        newFeature.innerHTML = `
            <input type="text" class="form-control" name="features[]" placeholder="أدخل ميزة">
            <button type="button" class="btn btn-danger remove-feature">
                <i class="fas fa-times"></i>
            </button>
        `;
        container.appendChild(newFeature);
    });

    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-feature') || e.target.parentElement.classList.contains('remove-feature')) {
            const button = e.target.classList.contains('remove-feature') ? e.target : e.target.parentElement;
            button.closest('.input-group').remove();
        }
    });
</script>
@endpush
@endsection 