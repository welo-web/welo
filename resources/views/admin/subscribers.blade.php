@extends('admin.layout')

@section('title', 'إدارة طلبات الاشتراك')

@section('content')
<h3 class="mb-4">طلبات الاشتراك</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>الاسم</th>
            <th>رقم الهاتف</th>
            <th>نوع النشاط</th>
            <th>الباقة</th>
            <th>نوع الاشتراك</th>
            <th>السعر</th>
            <th>مستوى الأهمية</th>
            <th>الحالة</th>
            <th>رابط الدفع</th>
            <th>إجراءات</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($subscribers as $subscriber)
        <tr>
            <td>{{ $subscriber->name }}</td>
            <td>{{ $subscriber->phone }}</td>
            <td>{{ $subscriber->project }}</td>
            <td>{{ $subscriber->plan }}</td>
            <td>{{ $subscriber->billing }}</td>
            <td>{{ $subscriber->price }}</td>
            <td>
                <form method="POST" action="{{ route('admin.subscribers.updateImportance', $subscriber->id) }}">
                    @csrf
                    <select name="importance" onchange="this.form.submit()" class="form-select form-select-sm">
                        <option value="متابعة التواصل" {{ $subscriber->importance == 'متابعة التواصل' ? 'selected' : '' }}>متابعة التواصل</option>
                        <option value="ليس مهم" {{ $subscriber->importance == 'ليس مهم' ? 'selected' : '' }}>ليس مهم</option>
                    </select>
                </form>
            </td>
            <td>
                <form method="POST" action="{{ route('admin.subscribers.updateStatus', $subscriber->id) }}">
                    @csrf
                    <select name="status" onchange="this.form.submit()" class="form-select form-select-sm">
                        <option value="مشترك" {{ $subscriber->status == 'مشترك' ? 'selected' : '' }}>مشترك</option>
                        <option value="ملغي" {{ $subscriber->status == 'ملغي' ? 'selected' : '' }}>ملغي</option>
                        <option value="في الانتظار الدفع" {{ $subscriber->status == 'في الانتظار الدفع' ? 'selected' : '' }}>في الانتظار الدفع</option>
                    </select>
                </form>
            </td>
            <td>
                @if($subscriber->pay_link)
                    <a href="{{ $subscriber->pay_link }}" target="_blank" class="btn btn-success btn-sm">رابط الدفع</a>
                @else
                    <form method="POST" action="{{ route('admin.subscribers.sendPayLink', $subscriber->id) }}">
                        @csrf
                        <input type="text" name="pay_link" placeholder="رابط PayTabs" class="form-control form-control-sm mb-1" required>
                        <button type="submit" class="btn btn-primary btn-sm">إرسال رابط الدفع</button>
                    </form>
                @endif
            </td>
            <td>
                <form method="POST" action="{{ route('admin.subscribers.delete', $subscriber->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                </form>
                <form method="POST" action="{{ route('admin.subscribers.notify', $subscriber->id) }}">
                    @csrf
                    <button type="submit" class="btn btn-warning btn-sm mt-1">إرسال إشعار</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection