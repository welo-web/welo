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
    @extends('admin.layout')

    @section('title', 'لوحة التحكم')

    @section('content')
      <h2 class="mb-4">الإحصائيات العامة</h2>

      <div class="row">
        <div class="col-md-3">
          <div class="card text-center shadow">
            <div class="card-body">
              <h5 class="card-title">عدد المستخدمين</h5>
              <h2>{{ $usersCount }}</h2>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card text-center shadow">
            <div class="card-body">
              <h5 class="card-title">عدد الخدمات</h5>
              <h2>{{ $servicesCount }}</h2>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card text-center shadow">
            <div class="card-body">
              <h5 class="card-title">عدد المقالات</h5>
              <h2>{{ $blogCount }}</h2>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card text-center shadow">
            <div class="card-body">
              <h5 class="card-title">آخر تحديث</h5>
              <h2>{{ $latestUpdate }}</h2>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card text-center shadow">
            <div class="card-body">
              <h5 class="card-title">طلبات الاشتراك</h5>
              <h2>{{ $subscribeCount }}</h2>
            </div>
          </div>
        </div>
      </div>

      <h3 class="mt-5 mb-3">إضافة طلب اشتراك جديد</h3>
      <form method="POST" action="{{ route('subscribe.store') }}">
          @csrf
          <div class="mb-3">
              <label for="name" class="form-label">الاسم</label>
              <input type="text" class="form-control" id="name" name="name" required>
          </div>

          <div class="mb-3">
              <label for="buisness" class="form-label">الشركة</label>
              <input type="text" class="form-control" id="buisness" name="buisness">
          </div>

          <div class="mb-3">
              <label for="phone" class="form-label">رقم الهاتف</label>
              <input type="text" class="form-control" id="phone" name="phone">
          </div>

          <div class="mb-3">
              <label for="service" class="form-label">الخدمة</label>
              <input type="text" class="form-control" id="service" name="service">
          </div>

          <button type="submit" class="btn btn-primary">إضافة البيانات</button>
      </form>
    @endsection
  </div>
</body>
</html>