<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>دليل المستخدم - ويلو ويب</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      background: #f8f9fa;
      font-family: 'Cairo', sans-serif;
    }
    .project-card {
      border-radius: 15px;
      box-shadow: 0 0 15px rgba(0,0,0,0.08);
      transition: transform 0.3s ease;
    }
    .project-card:hover {
      transform: translateY(-5px);
    }
    .card-title {
      font-weight: bold;
      font-size: 1.2rem;
    }
    .card-buttons .btn {
      margin: 0 5px;
    }
    /* إضافة تنسيق لمساحة الشريط العلوي */
    .navbar-spacer {
      height: 110px; /* نفس ارتفاع الشريط العلوي */
    }
    @media (max-width: 991.98px) {
      .navbar-spacer {
        height: 85px;
      }
    }
    @media (max-width: 575.98px) {
      .navbar-spacer {
        height: 70px;
      }
    }
    .navbar, .navbar * {
      font-family: 'Cairo', Tahoma, Arial, sans-serif !important;
    }
    .navbar-nav .nav-link {
      font-size: 1.15rem !important;
      font-weight: 500;
    }
    .navbar-brand, .navbar span {
      font-size: 1.5rem !important;
    }
  </style>
</head>
<body>
 <!-- شريط علوي جديد متجاوب -->
  <nav class="navbar navbar-expand-lg bg-light fixed-top" style="font-family: 'Cairo', Tahoma, Arial, sans-serif;">
    <div class="container-fluid justify-content-between">
      <div class="d-flex align-items-center">
        <img src="/images/logo.png" alt="WeloWeb" style="height: 50px; margin-left: 10px;">
        <span style="font-weight:bold; letter-spacing:0; font-size:1.5rem;">
          <span class="text-primary">WELO</span>WEB
        </span>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mainMenu">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-center w-100 justify-content-center">
          <li class="nav-item"><a class="nav-link" href="/user-guide" style="font-size:1.15rem;">الخدمات والاسعار</a></li>
          <li class="nav-item"><a class="nav-link" href="/subscribe" style="font-size:1.15rem;">الاشتراك</a></li>
          <li class="nav-item"><a class="nav-link" href="/contact" style="font-size:1.15rem;">تواصل معنا</a></li>
          <li class="nav-item"><a class="nav-link" href="/blog" style="font-size:1.15rem;">مدونة</a></li>
          <li class="nav-item"><a class="nav-link" href="/faq" style="font-size:1.15rem;">الأسئلة الشائعة</a></li>
          <li class="nav-item"><a class="nav-link" href="/privacy" style="font-size:1.15rem;">سياسة الخصوصية</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- نهاية الشريط العلوي الجديد -->

  <!-- إضافة مسافة بين الشريط العلوي والمحتوى -->
  <div class="navbar-spacer"></div>

<!-- عنوان الصفحة داخل صندوق أزرق صغير واحترافي -->
<div class="container mb-4">
  <div class="mx-auto" style="max-width: 370px;">
    <div class="card shadow-sm mb-4" style="border-radius: 18px; background: #0d6efd;">
      <div class="card-body py-3 px-2 text-center">
        <h2 class="mb-0" style="font-weight:bold; color:#fff; letter-spacing:1px; font-size:1.35rem;">المشاريع التي نخدمها</h2>
      </div>
    </div>
  </div>
</div>

<div class="container py-2">
  <div class="row g-4">
    @foreach($services as $service)
    <div class="col-md-6 col-lg-4">
      <div class="card project-card p-3">
        <div class="card-body text-center">
          {{-- أيقونة الخدمة (يمكنك لاحقًا إضافة حقل icon في قاعدة البيانات) --}}
          <i class="fa-solid fa-cube fa-2x mb-3 text-primary"></i>
          <h5 class="card-title">{{ $service->name }}</h5>
          <div class="card-buttons d-flex justify-content-center mt-3">
            @if($service->demo_link)
            <a href="{{ $service->demo_link }}" target="_blank" class="btn btn-outline-primary btn-sm">
              <i class="fa fa-link"></i> رابط الديمو
            </a>
            @endif
            @if($service->details_link)
            <a href="{{ $service->details_link }}" class="btn btn-primary btn-sm">
              <i class="fa fa-book"></i> التفاصيل والاسعار
            </a>
            @endif
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</html>
