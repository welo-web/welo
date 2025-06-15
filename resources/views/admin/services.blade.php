@extends('admin.layout')
@section('content')
<div class="container">
    <h3 class="mb-4">إدارة الخدمات</h3>
    <form method="POST" action="{{ route('admin.services.store') }}" class="mb-4">
        @csrf
        <div class="row g-2">
            <div class="col-md-4">
                <input type="text" name="name" class="form-control" placeholder="اسم الخدمة" required>
            </div>
            <div class="col-md-4">
                <input type="text" name="demo_link" class="form-control" placeholder="رابط الديمو">
            </div>
            <div class="col-md-4">
                <input type="text" name="details_link" class="form-control" placeholder="رابط التفاصيل/الأسعار">
            </div>
            <div class="col-md-12 mt-2">
                <button type="submit" class="btn btn-primary w-100">إضافة</button>
            </div>
        </div>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>اسم الخدمة</th>
                <th>رابط الديمو</th>
                <th>رابط التفاصيل/الأسعار</th>
                <th>إجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
            <tr>
                <td>
                    <span class="service-name">{{ $service->name }}</span>
                    <input type="text" name="name" value="{{ $service->name }}" class="form-control d-none" required>
                </td>
                <td>
                    <span class="service-demo">{{ $service->demo_link }}</span>
                    <input type="text" name="demo_link" value="{{ $service->demo_link }}" class="form-control d-none">
                </td>
                <td>
                    <span class="service-details">{{ $service->details_link }}</span>
                    <input type="text" name="details_link" value="{{ $service->details_link }}" class="form-control d-none">
                </td>
                <td>
                    <button class="btn btn-warning btn-sm edit-btn" type="button">تعديل</button>
                    <form method="POST" action="{{ route('admin.services.update', $service->id) }}" class="d-inline update-form">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="name" value="{{ $service->name }}">
                        <input type="hidden" name="demo_link" value="{{ $service->demo_link }}">
                        <input type="hidden" name="details_link" value="{{ $service->details_link }}">
                        <button class="btn btn-success btn-sm d-none save-btn" type="submit">حفظ</button>
                    </form>
                    <form method="POST" action="{{ route('admin.services.delete', $service->id) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
document.querySelectorAll('.edit-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
        var tr = btn.closest('tr');
        tr.querySelectorAll('span').forEach(e => e.classList.add('d-none'));
        tr.querySelectorAll('input.form-control').forEach(e => e.classList.remove('d-none'));
        tr.querySelector('.save-btn').classList.remove('d-none');
        btn.classList.add('d-none');
        tr.querySelectorAll('input.form-control').forEach(function(input) {
            input.addEventListener('input', function() {
                tr.querySelector('form.update-form input[name="'+input.name+'"]').value = input.value;
            });
        });
    });
});
</script>
@endsection