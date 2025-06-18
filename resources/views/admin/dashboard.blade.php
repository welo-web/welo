<!-- resources/views/admin/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>لوحة تحكم الإدارة</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
</head>
<body>
  <div class="container py-5">
    @extends('layouts.admin')

    @section('title', 'لوحة التحكم')

    @section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4">لوحة التحكم</h1>

        <!-- الإحصائيات -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h5 class="card-title">إجمالي الخدمات</h5>
                        <h2 class="card-text">{{ $stats['total_services'] }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title">الخدمات النشطة</h5>
                        <h2 class="card-text">{{ $stats['active_services'] }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <h5 class="card-title">إجمالي الاشتراكات</h5>
                        <h2 class="card-text">{{ $stats['total_subscriptions'] }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-warning text-white">
                    <div class="card-body">
                        <h5 class="card-title">الاشتراكات المعلقة</h5>
                        <h2 class="card-text">{{ $stats['pending_subscriptions'] }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- الاشتراكات الأخيرة -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">آخر الاشتراكات</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>العميل</th>
                                <th>الخدمة</th>
                                <th>نوع الباقة</th>
                                <th>السعر</th>
                                <th>الحالة</th>
                                <th>تاريخ الطلب</th>
                                <th>الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recent_subscriptions as $subscription)
                            <tr>
                                <td>{{ $subscription->id }}</td>
                                <td>{{ $subscription->customer_name }}</td>
                                <td>{{ $subscription->service->name }}</td>
                                <td>{{ $subscription->plan_type_text }}</td>
                                <td>{{ number_format($subscription->price, 2) }} ريال</td>
                                <td>
                                    <span class="badge bg-{{ $subscription->status === 'active' ? 'success' : ($subscription->status === 'pending' ? 'warning' : 'danger') }}">
                                        {{ $subscription->status_text }}
                                    </span>
                                </td>
                                <td>{{ $subscription->created_at->format('Y-m-d H:i') }}</td>
                                <td>
                                    <a href="{{ route('admin.subscriptions.show', $subscription) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
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
  </div>
</body>
</html>