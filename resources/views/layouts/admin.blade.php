<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم - @yield('title', 'Weloweb')</title>
    
    <!-- Bootstrap RTL CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            min-height: 100vh;
            background-color: #343a40;
            color: white;
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,.85);
            font-size: 1.08rem;
            border-radius: 6px;
            margin-bottom: 2px;
            transition: background 0.2s, color 0.2s;
            padding-right: 1.2rem;
            position: relative;
        }
        .sidebar .nav-link i {
            margin-left: 8px;
            font-size: 1.1em;
        }
        .sidebar .nav-link.active {
            color: #fff;
            background: linear-gradient(90deg, #007bff 60%, #0056b3 100%);
            font-weight: bold;
            box-shadow: 0 2px 8px rgba(0,123,255,0.08);
        }
        .sidebar .nav-link:hover {
            color: #fff;
            background: #0056b3;
        }
        .sidebar .nav-section {
            font-size: 1.05rem;
            color: #ffc107;
            font-weight: bold;
            margin-top: 1.7rem;
            margin-bottom: 0.7rem;
            letter-spacing: 0.5px;
            border-bottom: 1px solid #495057;
            padding-bottom: 2px;
        }
        .sidebar .nav-sub {
            font-size: 0.97rem;
            color: #17a2b8;
            margin-right: 2.2rem;
            margin-bottom: 0.2rem;
            background: #23272b;
            border-radius: 4px;
        }
        .sidebar .nav-sub.active, .sidebar .nav-sub:hover {
            color: #fff;
            background: #17a2b8;
        }
        .sidebar .badge-count {
            background: #ffc107;
            color: #343a40;
            font-size: 0.85em;
            font-weight: bold;
            border-radius: 10px;
            padding: 2px 7px;
            position: absolute;
            left: 12px;
            top: 10px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-section">الإدارة</li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-home"></i> الرئيسية
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.subscriptions.*') ? 'active' : '' }}" href="{{ route('admin.subscriptions.index') }}">
                                <i class="fas fa-list"></i> الاشتراكات
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.contracts.index') ? 'active' : '' }}" href="{{ route('admin.contracts.index') }}">
                                <i class="fas fa-file-signature text-primary"></i> قائمة العقود
                                <span class="badge-count">{{ isset($stats['contracts_count']) ? $stats['contracts_count'] : 0 }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.contract-templates.*') ? 'active' : '' }}" href="{{ route('admin.contract-templates.index') }}">
                                <i class="fas fa-file-contract text-success"></i> قوالب العقود
                                <span class="badge-count">{{ isset($stats['templates_count']) ? $stats['templates_count'] : 0 }}</span>
                            </a>
                        </li>
                        <li class="nav-section">الإعدادات</li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.settings.index') ? 'active' : '' }}" href="{{ route('admin.settings.index') }}">
                                <i class="fas fa-cog"></i> إعدادات النظام
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-sub {{ request()->routeIs('admin.settings.whatsapp') ? 'active' : '' }}" href="{{ route('admin.settings.whatsapp') }}">
                                <i class="fab fa-whatsapp"></i> إعدادات واتساب
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-sub {{ request()->routeIs('admin.company-settings.*') ? 'active' : '' }}" href="{{ route('admin.company-settings.edit') }}">
                                <i class="fas fa-building"></i> إعدادات الشركة
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-sub {{ request()->routeIs('admin.clients.*') ? 'active' : '' }}" href="{{ route('admin.clients.index') }}">
                                <i class="fas fa-users"></i> العملاء
                            </a>
                        </li>
                        <li class="nav-item mt-3">
                            <a class="nav-link" href="/">
                                <i class="fas fa-home"></i> العودة للموقع
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Additional scripts -->
    @stack('scripts')
</body>
</html> 