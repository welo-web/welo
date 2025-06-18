@extends('layouts.admin')

@section('title', 'إدارة الخدمات')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">إدارة الخدمات</h1>
        <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> إضافة خدمة جديدة
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
                            <th style="width: 50px">#</th>
                            <th>الترتيب</th>
                            <th>اسم الخدمة</th>
                            <th>الوصف</th>
                            <th>السعر الأساسي</th>
                            <th>السعر المتقدم</th>
                            <th>السعر الاحترافي</th>
                            <th>الحالة</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody id="sortable">
                        @foreach($services as $service)
                        <tr data-id="{{ $service->id }}">
                            <td>
                                <i class="fas fa-grip-vertical handle" style="cursor: move"></i>
                            </td>
                            <td>{{ $service->order }}</td>
                            <td>{{ $service->name }}</td>
                            <td>{{ Str::limit($service->description, 50) }}</td>
                            <td>{{ number_format($service->basic_price, 2) }}</td>
                            <td>{{ number_format($service->advanced_price, 2) }}</td>
                            <td>{{ number_format($service->professional_price, 2) }}</td>
                            <td>
                                <form action="{{ route('admin.services.toggle-status', $service) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm {{ $service->is_active ? 'btn-success' : 'btn-danger' }}">
                                        {{ $service->is_active ? 'نشط' : 'غير نشط' }}
                                    </button>
                                </form>
                            </td>
                            <td>
                                <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من حذف هذه الخدمة؟')">
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

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>
<script>
    const sortable = new Sortable(document.getElementById('sortable'), {
        handle: '.handle',
        animation: 150,
        onEnd: function(evt) {
            const items = Array.from(evt.to.children).map((tr, index) => ({
                id: tr.dataset.id,
                order: index
            }));

            fetch('{{ route('admin.services.reorder') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ items })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            });
        }
    });
</script>
@endpush
@endsection 