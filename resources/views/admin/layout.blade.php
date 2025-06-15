<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'لوحة التحكم')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
  <style>
    body { font-family: 'Cairo', sans-serif; background-color: #f9f9f9; }
    .sidebar { min-height: 100vh; background: #343a40; color: white; padding: 20px; }
    .sidebar a { color: #ddd; display: block; margin: 10px 0; text-decoration: none; }
    .sidebar a:hover { color: #fff; }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row">
    <!-- الشريط الجانبي -->
    <div class="col-md-2 sidebar">
      <h5>الإدارة</h5>
      <a href="/admin/dashboard">لوحة التحكم</a>
      <a href="/admin/settings">الإعدادات</a>
      <a href="/admin/services">الخدمات</a>
      <a href="/admin/plans">الباقات</a>
      <a href="/admin/blog">المدونة</a>
      <a href="/admin/faq">الأسئلة الشائعة</a>
      <a href="/admin/subscribers">طلبات الاشتراك</a>
      <a href="/">العودة للموقع</a>
    </div>

    <!-- المحتوى الرئيسي -->
    <div class="col-md-10 p-4">
      @yield('content')
    </div>
  </div>
</div>

</body>
</html>