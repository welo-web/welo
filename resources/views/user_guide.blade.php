<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>الخدمات والأسعار - ويلو ويب</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="تعرف على خدمات ويلو ويب وأسعارها - حلول رقمية متكاملة للمشاريع">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      background: #f8f9fa;
      font-family: 'Cairo', sans-serif;
      color: #333;
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
      font-size: 1.1rem;
      font-weight: 600;
      color: #333;
      transition: color 0.3s ease;
      padding: 0.5rem 1rem;
    }
    .navbar-nav .nav-link:hover {
      color: #0d6efd;
    }
    .navbar-brand, .navbar span {
      font-size: 1.5rem !important;
    }
    .navbar {
      background-color: rgba(255, 255, 255, 0.95);
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .page-title {
      background: linear-gradient(90deg, #0d6efd 60%, #0dcaf0 100%);
      color: #fff;
      border-radius: 15px;
      padding: 1.5rem;
      margin-bottom: 2rem;
      box-shadow: 0 4px 15px rgba(13,110,253,0.1);
      text-align: center;
      font-weight: 700;
    }
    .service-card {
      background: #fff;
      border-radius: 15px;
      padding: 2rem;
      margin-bottom: 2rem;
      box-shadow: 0 4px 15px rgba(0,0,0,0.05);
      transition: all 0.3s ease;
      height: 100%;
    }
    .service-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }
    .service-icon {
      width: 80px;
      height: 80px;
      background: #e7f1ff;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 1.5rem;
      color: #0d6efd;
      font-size: 2rem;
    }
    .service-title {
      color: #0d6efd;
      font-weight: 700;
      margin-bottom: 1rem;
      text-align: center;
    }
    .service-description {
      color: #666;
      margin-bottom: 1.5rem;
      text-align: center;
      line-height: 1.6;
    }
    .price-tag {
      background: #e7f1ff;
      color: #0d6efd;
      padding: 0.5rem 1rem;
      border-radius: 10px;
      font-weight: 700;
      display: inline-block;
      margin-bottom: 1rem;
    }
    .features-list {
      list-style: none;
      padding: 0;
      margin: 0 0 1.5rem;
    }
    .features-list li {
      padding: 0.5rem 0;
      color: #666;
      display: flex;
      align-items: center;
    }
    .features-list li i {
      color: #0d6efd;
      margin-left: 0.5rem;
    }
    .btn-subscribe {
      background: #0d6efd;
      color: #fff;
      padding: 0.8rem 2rem;
      border-radius: 10px;
      font-weight: 600;
      transition: all 0.3s ease;
      display: inline-block;
      text-decoration: none;
      width: 100%;
      text-align: center;
    }
    .btn-subscribe:hover {
      background: #0b5ed7;
      color: #fff;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(13,110,253,0.2);
    }
    .contact-section {
      background: #fff;
      border-radius: 15px;
      padding: 2rem;
      margin-top: 3rem;
      box-shadow: 0 4px 15px rgba(0,0,0,0.05);
      text-align: center;
    }
    .contact-section h3 {
      color: #0d6efd;
      font-weight: 700;
      margin-bottom: 1rem;
    }
    .contact-section p {
      color: #666;
      margin-bottom: 1.5rem;
    }
  </style>
</head>
<body>
 <!-- شريط علوي جديد متجاوب -->
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="/">
        <img src="/images/logo.png" alt="WeloWeb" style="height: 50px; margin-left: 15px;">
        <span style="font-weight:bold; letter-spacing:0;">
          <span class="text-primary">WELO</span>WEB
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mainMenu">
        <ul class="navbar-nav ms-auto text-center">
          <li class="nav-item"><a class="nav-link" href="/user-guide">الخدمات والاسعار</a></li>
          <li class="nav-item"><a class="nav-link" href="/subscribe">الاشتراك</a></li>
          <li class="nav-item"><a class="nav-link" href="/blog">مدونة</a></li>
          <li class="nav-item"><a class="nav-link" href="/contact">تواصل معنا</a></li>
          <li class="nav-item"><a class="nav-link" href="/privacy">سياسة الخصوصية</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- نهاية الشريط العلوي الجديد -->

  <!-- إضافة مسافة بين الشريط العلوي والمحتوى -->
  <div class="navbar-spacer"></div>

<!-- عنوان الصفحة داخل صندوق أزرق صغير واحترافي -->
<div class="container py-5">
  <div class="page-title">
    <i class="fas fa-cubes me-2"></i>
    خدماتنا وأسعارنا
  </div>

  <div class="row">
    <!-- نظام المطاعم -->
    <div class="col-md-6 col-lg-4">
      <div class="service-card">
        <div class="service-icon">
          <i class="fas fa-utensils"></i>
        </div>
        <h3 class="service-title">نظام المطاعم</h3>
        <p class="service-description">
          نظام متكامل لإدارة المطاعم مع نظام نقاط البيع وإدارة المخزون
        </p>
        <div class="price-tag">يبدأ من 199 ريال/شهرياً</div>
        <ul class="features-list">
          <li><i class="fas fa-check"></i> إدارة الطلبات والمبيعات</li>
          <li><i class="fas fa-check"></i> نظام نقاط البيع</li>
          <li><i class="fas fa-check"></i> إدارة المخزون</li>
          <li><i class="fas fa-check"></i> تقارير المبيعات</li>
          <li><i class="fas fa-check"></i> تطبيق للهواتف</li>
        </ul>
        <a href="{{ route('guide.restaurant') }}" class="btn-subscribe">
          <i class="fas fa-arrow-left me-2"></i>
          تعرف على المزيد
        </a>
      </div>
    </div>

    <!-- نظام الصالونات -->
    <div class="col-md-6 col-lg-4">
      <div class="service-card">
        <div class="service-icon">
          <i class="fas fa-cut"></i>
        </div>
        <h3 class="service-title">نظام الصالونات</h3>
        <p class="service-description">نظام متخصص لإدارة صالونات التجميل مع حجز المواعيد وإدارة العملاء</p>
        <div class="price-tag">يبدأ من 199 ريال/شهرياً</div>
        <ul class="features-list">
          <li><i class="fas fa-check"></i> حجز المواعيد</li>
          <li><i class="fas fa-check"></i> إدارة العملاء</li>
          <li><i class="fas fa-check"></i> إدارة الموظفين</li>
          <li><i class="fas fa-check"></i> نظام الولاء</li>
          <li><i class="fas fa-check"></i> تقارير الأداء</li>
        </ul>
        <a href="/guide_salon" class="btn-subscribe">
          <i class="fas fa-arrow-left me-2"></i>
          تعرف على المزيد
        </a>
      </div>
    </div>

    <!-- نظام المدارس -->
    <div class="col-md-6 col-lg-4">
      <div class="service-card">
        <div class="service-icon">
          <i class="fas fa-school"></i>
        </div>
        <h3 class="service-title">نظام المدارس</h3>
        <p class="service-description">
          نظام متكامل لإدارة المدارس مع إدارة الطلاب والمعلمين والمناهج
        </p>
        <div class="price-tag">يبدأ من 299 ريال/شهرياً</div>
        <ul class="features-list">
          <li><i class="fas fa-check"></i> إدارة الطلاب</li>
          <li><i class="fas fa-check"></i> جدول الحصص</li>
          <li><i class="fas fa-check"></i> متابعة الحضور</li>
          <li><i class="fas fa-check"></i> التواصل مع أولياء الأمور</li>
          <li><i class="fas fa-check"></i> التقارير المدرسية</li>
        </ul>
        <a href="{{ route('guide.school') }}" class="btn-subscribe">
          <i class="fas fa-arrow-left me-2"></i>
          تعرف على المزيد
        </a>
      </div>
    </div>

    <!-- نظام العيادات -->
    <div class="col-md-6 col-lg-4">
      <div class="service-card">
        <div class="service-icon">
          <i class="fas fa-hospital"></i>
        </div>
        <h3 class="service-title">نظام العيادات</h3>
        <p class="service-description">
          نظام متكامل لإدارة العيادات مع حجز المواعيد وإدارة المرضى
        </p>
        <div class="price-tag">يبدأ من 299 ريال/شهرياً</div>
        <ul class="features-list">
          <li><i class="fas fa-check"></i> حجز المواعيد</li>
          <li><i class="fas fa-check"></i> سجل المرضى</li>
          <li><i class="fas fa-check"></i> إدارة الأطباء</li>
          <li><i class="fas fa-check"></i> الفواتير الطبية</li>
          <li><i class="fas fa-check"></i> التقارير الطبية</li>
        </ul>
        <a href="{{ route('guide.clinic') }}" class="btn-subscribe">
          <i class="fas fa-arrow-left me-2"></i>
          تعرف على المزيد
        </a>
      </div>
    </div>

    <!-- نظام المغاسل -->
    <div class="col-md-6 col-lg-4">
      <div class="service-card">
        <div class="service-icon">
          <i class="fas fa-tshirt"></i>
        </div>
        <h3 class="service-title">نظام المغاسل</h3>
        <p class="service-description">
          نظام متكامل لإدارة المغاسل مع تتبع الطلبات وإدارة المخزون
        </p>
        <div class="price-tag">يبدأ من 199 ريال/شهرياً</div>
        <ul class="features-list">
          <li><i class="fas fa-check"></i> إدارة الطلبات</li>
          <li><i class="fas fa-check"></i> تتبع الملابس</li>
          <li><i class="fas fa-check"></i> إدارة الأسعار</li>
          <li><i class="fas fa-check"></i> نظام الولاء</li>
          <li><i class="fas fa-check"></i> تقارير المبيعات</li>
        </ul>
        <a href="{{ route('guide.laundry') }}" class="btn-subscribe">
          <i class="fas fa-arrow-left me-2"></i>
          تعرف على المزيد
        </a>
      </div>
    </div>

    <!-- نظام المحلات -->
    <div class="col-md-6 col-lg-4">
      <div class="service-card">
        <div class="service-icon">
          <i class="fas fa-store"></i>
        </div>
        <h3 class="service-title">نظام المحلات</h3>
        <p class="service-description">نظام متكامل لإدارة المحلات التجارية والبيع بالتجزئة</p>
        <div class="price-tag">يبدأ من 199 ريال/شهرياً</div>
        <ul class="features-list">
          <li><i class="fas fa-check"></i> إدارة المخزون</li>
          <li><i class="fas fa-check"></i> نظام نقاط البيع</li>
          <li><i class="fas fa-check"></i> إدارة الموردين</li>
          <li><i class="fas fa-check"></i> نظام الولاء</li>
          <li><i class="fas fa-check"></i> تقارير المبيعات</li>
        </ul>
        <a href="/guide_retail" class="btn-subscribe">
          <i class="fas fa-arrow-left me-2"></i>
          تعرف على المزيد
        </a>
      </div>
    </div>
  </div>

  <div class="contact-section">
    <h3>
      <i class="fas fa-headset me-2"></i>
      تحتاج مساعدة في اختيار الخدمة المناسبة؟
    </h3>
    <p>فريقنا جاهز لمساعدتك في اختيار الحل الأمثل لمشروعك</p>
    <a href="/contact" class="btn btn-primary btn-contact">
      <i class="fas fa-paper-plane me-2"></i>
      تواصل معنا
    </a>
  </div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</html>
