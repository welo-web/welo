@extends('admin.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">العملاء</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>الاسم</th>
                                    <th>رقم الجوال</th>
                                    <th>البريد الإلكتروني</th>
                                    <th>العنوان</th>
                                    <th>عدد الاشتراكات</th>
                                    <th>تفاصيل</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                    <tr>
                                        <td>{{ $client->name }}</td>
                                        <td>{{ $client->phone }}</td>
                                        <td>{{ $client->email }}</td>
                                        <td>{{ $client->address }}</td>
                                        <td>{{ $client->subscriptions_count }}</td>
                                        <td>
                                            <a href="{{ route('admin.clients.show', $client->id) }}" class="btn btn-sm btn-info">عرض الاشتراكات</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 