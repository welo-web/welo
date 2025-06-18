@extends('layouts.admin')

@section('title', 'إدارة الباقات')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">إدارة الباقات</h1>
        <a href="{{ route('admin.plans.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> إضافة باقة جديدة
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الخدمة</th>
                            <th>اسم الباقة</th>
                            <th>الوصف</th>
                            <th>السعر</th>
                            <th>الحالة</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($plans as $plan)
                        <tr>
                            <td>{{ $plan->id }}</td>
                            <td>{{ $plan->service->name }}</td>
                            <td>{{ $plan->name }}</td>
                            <td>{{ Str::limit($plan->description, 50) }}</td>
                            <td>{{ number_format($plan->price, 2) }} ريال</td>
                            <td>
                                <span class="badge bg-{{ $plan->is_active ? 'success' : 'danger' }}">
                                    {{ $plan->is_active ? 'نشط' : 'غير نشط' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.plans.edit', $plan) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.plans.destroy', $plan) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من حذف هذه الباقة؟')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 