@extends('admin.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">تفاصيل العميل: {{ $client->name }}</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group mb-4">
                        <li class="list-group-item"><strong>رقم الجوال:</strong> {{ $client->phone }}</li>
                        <li class="list-group-item"><strong>البريد الإلكتروني:</strong> {{ $client->email }}</li>
                        <li class="list-group-item"><strong>العنوان:</strong> {{ $client->address }}</li>
                    </ul>
                    <h5>الاشتراكات:</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>الخدمة</th>
                                    <th>الباقة</th>
                                    <th>نوع الاشتراك</th>
                                    <th>السعر</th>
                                    <th>تاريخ الطلب</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($client->subscriptions as $subscription)
                                    <tr>
                                        <td>{{ $subscription->service->name ?? '-' }}</td>
                                        <td>{{ $subscription->plan_type_text ?? '-' }}</td>
                                        <td>{{ $subscription->subscription_type_text ?? '-' }}</td>
                                        <td>{{ $subscription->price }}</td>
                                        <td>{{ $subscription->created_at->format('Y-m-d') }}</td>
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