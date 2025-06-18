@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>
                    @if(isset($contracts))
                        العقود الموقعة مع العملاء
                    @else
                        قوالب العقود
                    @endif
                </h2>
                @if(isset($templates))
                <a href="{{ route('admin.contract-templates.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> إضافة قالب جديد
                </a>
                @endif
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>العنوان</th>
                                    <th>الشركة</th>
                                    <th>الحالة</th>
                                    <th>تاريخ الإنشاء</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($contracts))
                                    @forelse($contracts as $contract)
                                    <tr>
                                        <td>{{ $contract->id }}</td>
                                        <td>{{ $contract->type }}</td>
                                        <td>{{ optional($contract->template->company)->company_name ?? '-' }}</td>
                                        <td>
                                            @if($contract->status == 'sent')
                                                <span class="badge bg-success">تم الإرسال</span>
                                            @else
                                                <span class="badge bg-secondary">مسودة</span>
                                            @endif
                                        </td>
                                        <td>{{ $contract->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            <a href="{{ route('admin.contracts.show', $contract->id) }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i> عرض
                                            </a>
                                            <a href="{{ route('admin.contracts.edit', $contract->id) }}" class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i> تعديل
                                            </a>
                                            <a href="{{ route('admin.contracts.options', $contract->id) }}" class="btn btn-sm btn-secondary">
                                                <i class="fas fa-cogs"></i> خيارات
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">لا توجد عقود.</td>
                                    </tr>
                                    @endforelse
                                @elseif(isset($templates))
                                    @forelse($templates as $template)
                                    <tr>
                                        <td>{{ $template->id }}</td>
                                        <td>{{ $template->title }}</td>
                                        <td>{{ optional($template->company)->company_name ?? '-' }}</td>
                                        <td>
                                            @if($template->is_active)
                                                <span class="badge bg-success">نشط</span>
                                            @else
                                                <span class="badge bg-secondary">غير نشط</span>
                                            @endif
                                        </td>
                                        <td>{{ $template->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            <a href="{{ route('admin.contract-templates.edit', $template->id) }}" class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i> تعديل
                                            </a>
                                            <form action="{{ route('admin.contract-templates.destroy', $template->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من حذف هذا القالب؟')">
                                                    <i class="fas fa-trash"></i> حذف
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">لا توجد قوالب عقود.</td>
                                    </tr>
                                    @endforelse
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center">لا توجد بيانات لعرضها.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        @if(isset($contracts))
                            {{ $contracts->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 