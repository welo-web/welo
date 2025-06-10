<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ويلو ويب - الحلول الرقمية</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Cairo', sans-serif;
      margin: 0;
      background-color: #f9f9f9;
    }
    .navbar {
      background-color: transparent;
      position: absolute;
      width: 100%;
      z-index: 1000;
    }
    .navbar-nav .nav-link {
      margin: 0 1rem;
      font-weight: 500;
      font-size: 1rem;
    }
    .hero {
      background: url('/images/hero-bg.jpg') center center / cover no-repeat;
      color: white;
      padding: 130px 0 110px;
      text-align: center;
      position: relative;
    }
    .hero::before {
      content: '';
      position: absolute;
      inset: 0;
      background: rgba(0, 0, 0, 0.6);
      z-index: 1;
    }
    .hero .container {
      position: relative;
      z-index: 2;
    }
    .hero h1 {
      font-size: 2.8rem;
      font-weight: bold;
    }
    .hero p {
      font-size: 1.1rem;
    }
    .btn-custom {
      min-width: 150px;
    }
    .services-section {
      margin-top: -60px;
      background: #fff;
      border-radius: 20px;
      padding: 60px 20px;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }
    .service-card {
      text-align: center;
      padding: 25px;
      border: 1px solid #eee;
      border-radius: 10px;
      transition: 0.5s ease;
      background: #fff;
    }
    .service-card:hover {
      box-shadow: 0 8px 24px rgba(0,0,0,0.1);
      transform: translateY(-8px);
    }
    .service-card i {
      font-size: 40px;
      color: #0d6efd;
      margin-bottom: 15px;
    }
    .business-types {
      background: #fff;
      padding: 40px 20px;
    }
    .business-types .item {
      border: 1px solid #eee;
      padding: 20px;
      border-radius: 10px;
      font-size: 1.1rem;
      transition: 0.3s;
      background-color: #fefefe;
    }
    .business-types .item:hover {
      background-color: #f1f1f1;
    }
  </style>
</head>
<body>
  <!-- شريط علوي -->
  <nav class="navbar navbar-expand-lg">
    <div class="container d-flex justify-content-between align-items-center">
      <a class="navbar-brand d-flex align-items-center text-white fw-bold" href="/">
        <img src="/images/logo.png" alt="Logo" height="75" class="me-2">
        <div class="d-flex flex-column lh-sm">
          <span style="font-size: 18px">WELO<span style="color:#0dcaf0">WEB</span></span>
          <small style="font-size: 12px; color: #ccc">FOR DIGITAL SOLUTIONS</small>
        </div>
      </a>
      <ul class="navbar-nav flex-row">
        <li class="nav-item"><a class="nav-link text-white" href="/user-guide">الخدمات</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="/subscribe">الاشتراك</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="/contact">تواصل معنا</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="/privacy">سياسة الخصوصية</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="/faq">الأسئلة الشائعة</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="/blog">المدونة</a></li>
      </ul>
    </div>
  </nav>

  <!-- قسم المقدمة -->
  <section class="hero">
    <div class="container">
      <h1 class="mt-4">حلول برمجية ورقمية متكاملة</h1>
      <p class="mb-4">نقدم خدمات برمجية وحلول مبتكرة ومخصصة تناسب أنواع الأعمال المختلفة</p>
      <div class="d-flex justify-content-center gap-3 flex-wrap">
        <a href="/user-guide" class="btn btn-primary btn-custom">خدماتنا </a>
        <a href="https://wa.me/96894919627" class="btn btn-outline-light btn-custom">تواصل معنا</a>
      </div>
    </div>
  </section>

  <!-- قسم الخدمات -->
  <section class="services-section container" id="services">
    <h2 class="text-center mb-5">خدماتنا</h2>
    <div class="row g-4">
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
        <div class="service-card">
          <i class="fas fa-file-invoice-dollar"></i>
          <h5 class="my-3">أنظمة المحاسبة</h5>
          <p>أنظمة دقيقة لإدارة محاسبة منشأتك بكل سهولة واحترافية.</p>
          <a href="/subscribe?service=أنظمة%20المحاسبة" class="btn btn-sm btn-primary">اشترك الآن</a>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
        <div class="service-card">
          <i class="fas fa-cash-register"></i>
          <h5 class="my-3">أنظمة نقاط البيع</h5>
          <p>حلول نقاط بيع سهلة وسريعة لمختلف المتاجر والمطاعم.</p>
          <a href="/subscribe?service=نقاط%20البيع" class="btn btn-sm btn-primary">اشترك الآن</a>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
        <div class="service-card">
          <i class="fas fa-tools"></i>
          <h5 class="my-3">أنظمة إدارة خدمات</h5>
          <p>إدارة خدمات العملاء والمواعيد والصيانة بكفاءة ومرونة.</p>
          <a href="/subscribe?service=إدارة%20الخدمات" class="btn btn-sm btn-primary">اشترك الآن</a>
        </div>
      </div>
    </div>
  </section>

  <!-- قسم المشاريع -->
  <section class="business-types container mt-5">
    <h2 class="text-center mb-4">المشاريع التي نخدمها</h2>
    <div class="row g-3 text-center">
      <div class="col-6 col-md-3" data-aos="zoom-in"><div class="item">💇‍♀️ صالون نسائي</div></div>
      <div class="col-6 col-md-3" data-aos="zoom-in"><div class="item">👗 بوتيك نسائي</div></div>
      <div class="col-6 col-md-3" data-aos="zoom-in"><div class="item">🧺 مغسلة ملابس</div></div>
      <div class="col-6 col-md-3" data-aos="zoom-in"><div class="item">🍽️ مطاعم</div></div>
      <div class="col-6 col-md-3" data-aos="zoom-in"><div class="item">🏪 محلات تجارية</div></div>
      <div class="col-6 col-md-3" data-aos="zoom-in"><div class="item">🏥 مستشفيات</div></div>
      <div class="col-6 col-md-3" data-aos="zoom-in"><div class="item">🏫 مدارس</div></div>
      <div class="col-6 col-md-3" data-aos="zoom-in"><div class="item">🏢 مكاتب الأيدي العاملة</div></div>
    </div>
  </section>

  <!-- تذييل -->
  <footer class="bg-dark text-white text-center py-4 mt-5" id="contact">
    <p class="mb-1">&copy; 2025 Welo Web - جميع الحقوق محفوظة</p>
    <p class="mb-0">للتواصل: <a href="https://wa.me/96894919627" class="text-white text-decoration-underline">واتساب</a></p>
  </footer>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <script>
    AOS.init({ duration: 800 });
  </script>
</body>
</html>
