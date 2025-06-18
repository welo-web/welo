@extends('layouts.admin')

@section('title', 'تعديل الخدمة')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">تعديل الخدمة</h1>
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-right"></i> العودة للخدمات
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.services.update', $service->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">اسم الخدمة</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $service->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">الوصف</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description', $service->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="basic_price" class="form-label">السعر الأساسي</label>
                            <input type="number" step="0.01" class="form-control @error('basic_price') is-invalid @enderror" id="basic_price" name="basic_price" value="{{ old('basic_price', $service->basic_price) }}" required>
                            @error('basic_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="advanced_price" class="form-label">السعر المتقدم</label>
                            <input type="number" step="0.01" class="form-control @error('advanced_price') is-invalid @enderror" id="advanced_price" name="advanced_price" value="{{ old('advanced_price', $service->advanced_price) }}" required>
                            @error('advanced_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="professional_price" class="form-label">السعر الاحترافي</label>
                            <input type="number" step="0.01" class="form-control @error('professional_price') is-invalid @enderror" id="professional_price" name="professional_price" value="{{ old('professional_price', $service->professional_price) }}" required>
                            @error('professional_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="features" class="form-label">المميزات العامة</label>
                    <div id="features-container">
                        @foreach(json_decode($service->features) as $feature)
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
                    <label for="basic_features" class="form-label">مميزات الباقة الأساسية</label>
                    <div id="basic-features-container">
                        @foreach(json_decode($service->basic_features) as $feature)
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="basic_features[]" value="{{ $feature }}" placeholder="أدخل ميزة">
                            <button type="button" class="btn btn-danger remove-feature">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-secondary" id="add-basic-feature">
                        <i class="fas fa-plus"></i> إضافة ميزة
                    </button>
                </div>

                <div class="mb-3">
                    <label for="advanced_features" class="form-label">مميزات الباقة المتقدمة</label>
                    <div id="advanced-features-container">
                        @foreach(json_decode($service->advanced_features) as $feature)
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="advanced_features[]" value="{{ $feature }}" placeholder="أدخل ميزة">
                            <button type="button" class="btn btn-danger remove-feature">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-secondary" id="add-advanced-feature">
                        <i class="fas fa-plus"></i> إضافة ميزة
                    </button>
                </div>

                <div class="mb-3">
                    <label for="professional_features" class="form-label">مميزات الباقة الاحترافية</label>
                    <div id="professional-features-container">
                        @foreach(json_decode($service->professional_features) as $feature)
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="professional_features[]" value="{{ $feature }}" placeholder="أدخل ميزة">
                            <button type="button" class="btn btn-danger remove-feature">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-secondary" id="add-professional-feature">
                        <i class="fas fa-plus"></i> إضافة ميزة
                    </button>
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }}>
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