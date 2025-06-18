@extends('layouts.admin')

@section('title', 'إضافة خدمة جديدة')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">إضافة خدمة جديدة</h1>
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-right"></i> العودة للخدمات
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.services.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">اسم الخدمة</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="order" class="form-label">الترتيب</label>
                            <input type="number" class="form-control @error('order') is-invalid @enderror" id="order" name="order" value="{{ old('order', 0) }}" min="0">
                            @error('order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">الوصف</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="basic_price" class="form-label">السعر الأساسي</label>
                            <input type="number" step="0.01" class="form-control @error('basic_price') is-invalid @enderror" id="basic_price" name="basic_price" value="{{ old('basic_price') }}" required>
                            @error('basic_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="advanced_price" class="form-label">السعر المتقدم</label>
                            <input type="number" step="0.01" class="form-control @error('advanced_price') is-invalid @enderror" id="advanced_price" name="advanced_price" value="{{ old('advanced_price') }}" required>
                            @error('advanced_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="professional_price" class="form-label">السعر الاحترافي</label>
                            <input type="number" step="0.01" class="form-control @error('professional_price') is-invalid @enderror" id="professional_price" name="professional_price" value="{{ old('professional_price') }}" required>
                            @error('professional_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="features" class="form-label">المميزات العامة</label>
                    <div id="features-container">
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="features[]" placeholder="أدخل ميزة">
                            <button type="button" class="btn btn-danger remove-feature">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" id="add-feature">
                        <i class="fas fa-plus"></i> إضافة ميزة
                    </button>
                </div>

                <div class="mb-3">
                    <label for="basic_features" class="form-label">مميزات الباقة الأساسية</label>
                    <div id="basic-features-container">
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="basic_features[]" placeholder="أدخل ميزة">
                            <button type="button" class="btn btn-danger remove-feature">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" id="add-basic-feature">
                        <i class="fas fa-plus"></i> إضافة ميزة
                    </button>
                </div>

                <div class="mb-3">
                    <label for="advanced_features" class="form-label">مميزات الباقة المتقدمة</label>
                    <div id="advanced-features-container">
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="advanced_features[]" placeholder="أدخل ميزة">
                            <button type="button" class="btn btn-danger remove-feature">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" id="add-advanced-feature">
                        <i class="fas fa-plus"></i> إضافة ميزة
                    </button>
                </div>

                <div class="mb-3">
                    <label for="professional_features" class="form-label">مميزات الباقة الاحترافية</label>
                    <div id="professional-features-container">
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="professional_features[]" placeholder="أدخل ميزة">
                            <button type="button" class="btn btn-danger remove-feature">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" id="add-professional-feature">
                        <i class="fas fa-plus"></i> إضافة ميزة
                    </button>
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ old('is_active') ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">نشط</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">حفظ الخدمة</button>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function addFeature(containerId, buttonId) {
        document.getElementById(buttonId).addEventListener('click', function() {
            const container = document.getElementById(containerId);
            const newFeature = document.createElement('div');
            newFeature.className = 'input-group mb-2';
            newFeature.innerHTML = `
                <input type="text" class="form-control" name="${containerId.replace('-container', '[]')}" placeholder="أدخل ميزة">
                <button type="button" class="btn btn-danger remove-feature">
                    <i class="fas fa-times"></i>
                </button>
            `;
            container.appendChild(newFeature);
        });
    }

    addFeature('features-container', 'add-feature');
    addFeature('basic-features-container', 'add-basic-feature');
    addFeature('advanced-features-container', 'add-advanced-feature');
    addFeature('professional-features-container', 'add-professional-feature');

    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-feature') || e.target.parentElement.classList.contains('remove-feature')) {
            const button = e.target.classList.contains('remove-feature') ? e.target : e.target.parentElement;
            button.closest('.input-group').remove();
        }
    });
</script>
@endpush
@endsection 