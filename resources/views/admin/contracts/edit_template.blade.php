@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>تعديل قالب العقد</h2>
                <a href="{{ route('admin.contract-templates.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-right"></i> العودة للقائمة
                </a>
            </div>
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.contract-templates.update', $template->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="title">عنوان القالب</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $template->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="company_id">الشركة</label>
                            <select name="company_id" class="form-control @error('company_id') is-invalid @enderror">
                                <option value="">اختر الشركة...</option>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}" {{ old('company_id', $template->company_id) == $company->id ? 'selected' : '' }}>
                                        {{ $company->company_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('company_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="content">محتوى القالب</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="10">{{ old('content', $template->content) }}</textarea>
                            <small class="form-text text-muted">
                                يمكنك استخدام المتغيرات التالية في المحتوى:
                                <ul>
                                    <li>{client_name} - اسم العميل</li>
                                    <li>{phone} - رقم الهاتف</li>
                                    <li>{address} - العنوان</li>
                                    <li>{service_name} - اسم الخدمة</li>
                                    <li>{plan_type} - نوع الباقة</li>
                                    <li>{subscription_type} - نوع الاشتراك</li>
                                    <li>{price} - السعر</li>
                                    <li>{discount} - الخصم</li>
                                    <li>{final_price} - السعر النهائي</li>
                                    <li>{date} - تاريخ العقد</li>
                                    <li>{terms} - الشروط والأحكام</li>
                                </ul>
                            </small>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="terms">الشروط والأحكام الافتراضية</label>
                            <textarea class="form-control @error('terms') is-invalid @enderror" id="terms" name="terms" rows="5">{{ old('terms', $template->terms) }}</textarea>
                            <small class="form-text text-muted">يمكنك كتابة الشروط الافتراضية التي ستظهر في العقد. يمكنك استخدام متغير {terms} في محتوى القالب.</small>
                            @error('terms')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" {{ old('is_active', $template->is_active) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="is_active">تفعيل القالب</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
                            <a href="{{ route('admin.contract-templates.index') }}" class="btn btn-secondary">إلغاء</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#content'))
        .catch(error => {
            console.error(error);
        });
</script>
@endpush
@endsection 