@extends('admin.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">إدارة الباقات</h3>
                </div>
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if(session('warning'))
                        <div class="alert alert-warning">
                            {{ session('warning') }}
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(isset($services) && $services->isNotEmpty())
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>الخدمة</th>
                                        <th>رابط التفاصيل</th>
                                        <th>الباقات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($services as $service)
                                    <tr>
                                        <td>{{ $service->name }}</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="{{ $service->details_link }}" readonly>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="button" onclick="copyLink('{{ $service->details_link }}')">
                                                        <i class="fa fa-copy"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                @foreach($service->plans as $plan)
                                                <div class="col-md-4 mb-3">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h5 class="card-title">{{ $plan->name }}</h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="card-text">{{ $plan->description }}</p>
                                                            <p>السعر الشهري: {{ $plan->price_monthly }}</p>
                                                            <p>السعر السنوي: {{ $plan->price_yearly }}</p>
                                                            <div class="btn-group">
                                                                <a href="{{ route('admin.plans.edit', $plan->id) }}" class="btn btn-primary">تعديل</a>
                                                                <form action="{{ route('admin.plans.destroy', $plan->id) }}" method="POST" style="display: inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من حذف هذه الباقة؟')">حذف</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="card mt-4">
                            <div class="card-header bg-primary text-white">
                                <h4 class="mb-0">إضافة باقة جديدة</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.plans.store') }}">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label class="form-label">الخدمة</label>
                                            <select name="service_id" class="form-select" required>
                                                <option value="">اختر الخدمة</option>
                                                @foreach($services as $service)
                                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">اسم الباقة</label>
                                            <input type="text" name="name" class="form-control" placeholder="مثال: باقة لايت" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">لون الباقة</label>
                                            <select name="color" class="form-select" required>
                                                <option value="success">أخضر (لايت)</option>
                                                <option value="primary">أزرق (فضي)</option>
                                                <option value="warning">أصفر (ذهبي)</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">السعر الشهري ($)</label>
                                            <input type="number" name="price_monthly" class="form-control" min="0" step="0.01" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">السعر السنوي ($)</label>
                                            <input type="number" name="price_yearly" class="form-control" min="0" step="0.01" required>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">وصف الباقة</label>
                                            <textarea name="description" class="form-control" rows="3" placeholder="وصف مختصر للباقة" required></textarea>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">مميزات الباقة</label>
                                            <textarea name="features" class="form-control" rows="5" placeholder="اكتب كل ميزة في سطر جديد" required></textarea>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">رابط يوتيوب (اختياري)</label>
                                            <input type="url" name="youtube_link" class="form-control" placeholder="https://www.youtube.com/...">
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-plus"></i> إضافة الباقة
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-info">
                            لا توجد خدمات مضافة. يرجى <a href="{{ route('admin.services') }}" class="alert-link">إضافة خدمات</a> أولاً.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .card {
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        transform: none !important;
        transition: none !important;
    }
    .card-header {
        border-bottom: 1px solid rgba(0, 0, 0, 0.125);
    }
    .table th {
        background-color: #f8f9fa;
    }
    .badge {
        font-size: 0.875rem;
        padding: 0.5em 0.75em;
    }
    .form-label {
        font-weight: 500;
        margin-bottom: 0.5rem;
    }
    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
    }
    .sticky-top {
        position: sticky;
        top: 0;
        z-index: 1;
    }
    .table-responsive {
        max-height: 800px;
        overflow-y: auto;
        overflow-x: hidden;
    }
    .table {
        width: 100%;
        margin-bottom: 0;
        table-layout: fixed;
    }
    .table th, .table td {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .table-responsive::-webkit-scrollbar {
        width: 8px;
    }
    .table-responsive::-webkit-scrollbar-track {
        background: #f1f1f1;
    }
    .table-responsive::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 4px;
    }
    .table-responsive::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
    /* تثبيت عرض الأعمدة */
    .table th:nth-child(1),
    .table td:nth-child(1) {
        width: 15%;
        min-width: 150px;
    }
    .table th:nth-child(2),
    .table td:nth-child(2) {
        width: 15%;
        min-width: 150px;
    }
    .table th:nth-child(3),
    .table td:nth-child(3) {
        width: 70%;
        min-width: 500px;
    }
    /* منع تأثير hover على الجدول */
    .table-hover tbody tr:hover {
        background-color: inherit;
    }
    /* تثبيت عرض البطاقات */
    .card {
        width: 100%;
        margin-bottom: 1rem;
        transform: none !important;
        transition: none !important;
    }
    .row {
        margin: 0;
        width: 100%;
    }
    .col-md-4 {
        padding: 0.5rem;
    }
    /* منع تأثيرات hover على البطاقات */
    .card:hover {
        transform: none !important;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
    }
    /* تثبيت جميع العناصر */
    * {
        transform: none !important;
        transition: none !important;
    }
</style>
@endpush

@push('scripts')
<script>
function copyLink(link) {
    navigator.clipboard.writeText(link).then(function() {
        alert('تم نسخ الرابط بنجاح');
    }).catch(function(err) {
        console.error('فشل نسخ الرابط:', err);
    });
}
</script>
@endpush

@endsection
