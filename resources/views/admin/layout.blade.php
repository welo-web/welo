<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'لوحة التحكم')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
  <style>
    body { font-family: 'Cairo', sans-serif; background-color: #f9f9f9; }
    .sidebar { min-height: 100vh; background: #343a40; color: white; padding: 20px; }
    .sidebar a { color: #ddd; display: block; margin: 10px 0; text-decoration: none; }
    .sidebar a:hover { color: #fff; }
    .sidebar a i { margin-left: 10px; }
    .sidebar a.active { color: #fff; background: rgba(255,255,255,0.1); padding: 8px; border-radius: 4px; }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row">
    <!-- الشريط الجانبي -->
    <div class="col-md-2 sidebar">
      <h5 class="mb-4">لوحة التحكم</h5>
      <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="fas fa-tachometer-alt"></i> لوحة التحكم
      </a>
      <a href="{{ route('admin.settings.index') }}" class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
        <i class="fas fa-cog"></i> الإعدادات
      </a>
      <a href="{{ route('admin.services.index') }}" class="{{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
        <i class="fas fa-cogs"></i> الخدمات
      </a>
      <a href="{{ route('admin.plans.index') }}" class="{{ request()->routeIs('admin.plans.*') ? 'active' : '' }}">
        <i class="fas fa-box"></i> الباقات
      </a>
      <a href="{{ route('admin.subscriptions.index') }}" class="{{ request()->routeIs('admin.subscriptions.*') ? 'active' : '' }}">
        <i class="fas fa-users"></i> طلبات الاشتراك
      </a>
      <a href="{{ route('admin.contracts.index') }}" class="{{ request()->routeIs('admin.contracts.*') ? 'active' : '' }}">
        <i class="fas fa-file-contract"></i> قوالب العقود
      </a>
@php $user = auth()->user(); @endphp
@if($user && $user->is_admin)
      <a href="{{ route('admin.company-settings.edit') }}" class="{{ request()->routeIs('admin.company-settings.*') ? 'active' : '' }}">
        <i class="fas fa-building"></i> إعدادات الشركة
      </a>
      <a href="{{ route('admin.clients.index') }}" class="{{ request()->routeIs('admin.clients.*') ? 'active' : '' }}">
        <i class="fas fa-users"></i> العملاء
      </a>
@endif
      <a href="/">
        <i class="fas fa-home"></i> العودة للموقع
      </a>
    </div>

    <!-- المحتوى الرئيسي -->
    <div class="col-md-10 p-4">
      @yield('content')
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>