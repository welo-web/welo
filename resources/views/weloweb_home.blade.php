<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ويلو ويب - الحلول الرقمية</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@700;900&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Cairo', Arial, sans-serif;
      margin: 0;
      background-color: #f9f9f9;
      color: #333;
    }
    .section-title-box {
      background: linear-gradient(90deg, #0d6efd 60%, #0dcaf0 100%);
      color: #fff !important;
      border-radius: 8px;
      padding: 8px 0 6px 0;
      margin-bottom: 28px;
      box-shadow: 0 2px 12px rgba(13,110,253,0.08);
      font-weight: bold;
      letter-spacing: 1px;
      font-size: 1.3rem;
      text-align: center;
      width: fit-content;
      min-width: 180px;
      max-width: 100%;
      margin-left: auto;
      margin-right: auto;
    }
    h2, h1 {
      font-family: inherit;
      font-weight: bold;
      color: #0d6efd;
    }
    .btn-primary {
      background-color: #0d6efd;
      border-color: #0d6efd;
      transition: background-color 0.3s ease-in-out;
    }
    .btn-primary:hover {
      background-color: #0b5ed7;
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
      padding: 300px 0 120px;
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
      font-size: 2.2rem;
      font-weight: bold;
    }
    .hero p {
      font-size: 1.1rem;
    }
    .btn-custom {
      min-width: 120px;
    }
    .services-section {
      margin-top: -40px;
      background: #fff;
      border-radius: 20px;
      padding: 40px 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }
    .service-card {
      text-align: center;
      padding: 18px;
      border: 1px solid #eee;
      border-radius: 10px;
      transition: 0.5s ease;
      background: #fff;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    .service-card i {
      font-size: 32px;
      color: #0d6efd;
      margin-bottom: 12px;
    }
    .business-types {
      background: #fff;
      padding: 25px 10px;
      border-radius: 20px;
      margin-top: 30px;
    }
    .business-types .item {
      border: 1px solid #eee;
      padding: 14px;
      border-radius: 10px;
      font-size: 1rem;
      transition: 0.3s;
      background-color: #fefefe;
    }
    .business-types .item:hover {
      background-color: #f1f1f1;
    }
    .client-img {
      width: 100%;
      max-width: 60px;
      height: 60px;
      object-fit: cover;
      border-radius: 16px;
      box-shadow: 0 2px 12px rgba(0,0,0,0.08);
      transition: transform 0.4s cubic-bezier(.4,2,.3,1), box-shadow 0.4s;
      display: block;
      margin-left: auto;
      margin-right: auto;
    }
    .client-float {
      animation: floatY 3s ease-in-out infinite alternate;
      will-change: transform;
    }
    @keyframes floatY {
      0%   { transform: translateY(0px) scale(1);}
      100% { transform: translateY(-12px) scale(1.04);}
    }
    /* Responsive tweaks */
    @media (max-width: 991.98px) {
      .services-section {
        padding: 25px 2px;
        margin-top: -20px;
      }
      .business-types {
        padding: 15px 2px;
      }
      .client-img {
        max-width: 44px;
        height: 44px;
      }
      .navbar-nav .nav-link {
        margin: 0 0.5rem;
        font-size: 0.95rem;
      }
    }
    @media (max-width: 768px) {
      .navbar-collapse {
        position: absolute !important;
        top: 100%;
        left: 0;
        width: 100%;
        background-color: white;
      }
    }
    @media (max-width: 575.98px) {
      .hero {
        padding: 50px 0 30px;
      }
      .hero h1 {
        font-size: 1.1rem;
      }
      .services-section {
        padding: 10px 1px;
        margin-top: -8px;
      }
      .business-types {
        padding: 5px 1px;
      }
      .section-title-box {
        font-size: 0.95rem;
        min-width: 90px;
        padding: 4px 0 2px 0;
      }
      .client-img {
        max-width: 32px;
        height: 32px;
      }
      .service-card {
        padding: 10px;
      }
      .service-card i {
        font-size: 22px;
      }
    }
    .spacer {
      height: 25px;
    }
  </style>
</head>
<body>
  <!-- شريط علوي جديد متجاوب -->
  <nav class="navbar navbar-expand-lg bg-light fixed-top">
    <div class="container-fluid">
      <img src="/images/logo.png" alt="WeloWeb" style="height: 50px; margin-left: 25px;">
      <span style="font-weight:bold; letter-spacing:0; font-size:1.3rem;">
        <span class="text-primary">WELO</span>WEB
      </span>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse position-absolute top-100 start-0 w-100 bg-white shadow-sm" id="mainMenu" style="z-index: 1050;">
        <ul class="navbar-nav text-center w-100">
          <li class="nav-item"><a class="nav-link" href="/user-guide">الخدمات والاسعار</a></li>
          <li class="nav-item"><a class="nav-link" href="/subscribe">الاشتراك</a></li>
          <li class="nav-item"><a class="nav-link" href="/contact">تواصل معنا</a></li>
          <li class="nav-item"><a class="nav-link" href="/blog">مدونة</a></li>
          <li class="nav-item"><a class="nav-link" href="/faq">الأسئلة الشائعة</a></li>
          <li class="nav-item"><a class="nav-link" href="/contact">تواصل معنا</a></li>
          <li class="nav-item"><a class="nav-link" href="/privacy">سياسة الخصوصية</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- نهاية الشريط العلوي الجديد -->

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

  <!-- مسافة بين الخلفية وقسم الخدمات -->
  <div class="spacer"></div>

  <!-- قسم الخدمات -->
  <section class="services-section container" id="services">
    <div class="section-title-box">خدماتنا</div>
    <div class="row g-4">
      <div class="col-md-4 col-12" data-aos="fade-up" data-aos-delay="100">
        <div class="service-card">
          <i class="fas fa-file-invoice-dollar"></i>
          <h5 class="my-3">أنظمة المحاسبة ونقاط البيع</h5>
          <p>أنظمة دقيقة لإدارة محاسبة منشأتك بكل سهولة واحترافية.</p>
          <a href="/subscribe?service=أنظمة%20المحاسبة" class="btn btn-sm btn-primary">اشترك الآن</a>
        </div>
      </div>
      <div class="col-md-4 col-12" data-aos="fade-up" data-aos-delay="200">
        <div class="service-card">
          <i class="fas fa-cash-register"></i>
          <h5 class="my-3">انشاء موقع ومتجر الكتروني</h5>
          <p>واجهة الكترونية تعكس هويتك البصرية وعمليات بيع احترافية</p>
          <a href="/subscribe?service=نقاط%20البيع" class="btn btn-sm btn-primary">اشترك الآن</a>
        </div>
      </div>
      <div class="col-md-4 col-12" data-aos="fade-up" data-aos-delay="300">
        <div class="service-card">
          <i class="fas fa-tools"></i>
          <h5 class="my-3">أنظمة إدارة خدمات</h5>
          <p>إدارة خدمات العملاء والمواعيد والصيانة بكفاءة ومرونة.</p>
          <a href="/subscribe?service=إدارة%20الخدمات" class="btn btn-sm btn-primary">اشترك الآن</a>
        </div>
      </div>
    </div>
  </section>

  <!-- قسم المشاريع التي نخدمها -->
  <section class="business-types container mt-4">
    <div class="section-title-box">المشاريع التي نخدمها</div>
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

  <!-- قسم العملاء -->
  <section class="container mt-4 text-center">
    <div class="section-title-box">عملاؤنا</div>
    <div class="row g-4 justify-content-center">
      @for($i = 1; $i <= 35; $i++)
        <div class="col-6 col-md-3 col-lg-2">
          <div class="client-float">
            <img src="/images/clients/client{{ $i }}.jpg" loading="lazy" class="img-fluid rounded shadow-sm client-img" alt="عميل {{ $i }}">
          </div>
        </div>
      @endfor
    </div>
  </section>

  <section class="text-center my-4">
    <div class="section-title-box" style="background: linear-gradient(90deg, #0dcaf0 60%, #0d6efd 100%);">🚀 أكثر من <span style="color: #fff; font-weight: bold;">50+</span> عميل يستخدم خدماتنا!</div>
  </section>

  <!-- قسم الرؤية الجديد -->
  <section class="container mt-4">
    <div class="card p-3 shadow">
      <div class="section-title-box" style="background: linear-gradient(90deg, #0dcaf0 60%, #0d6efd 100%);">رؤيتنا</div>
      <p class="lead" style="font-size:1rem;">
        نحن في <strong>Welo Web</strong> نطمح إلى إحداث تغيير حقيقي في عالم الأعمال الرقمية.<br>
        رؤيتنا تتمثل في تطوير <strong>أنظمة ذكية ومرنة</strong> تلبي احتياجات الشركات الناشئة والمؤسسات الكبيرة،<br>
        من خلال <strong>التقنيات الحديثة والابتكار المستمر</strong>.<br>
        نسعى لنكون <strong>الشريك التقني الأول</strong> لمختلف المجالات، مقدمين حلولاً تساهم في <strong>تحقيق النمو والنجاح</strong>.
      </p>
    </div>
  </section>

  <!-- قسم كلمة المؤسس الجديد -->
  <section class="container mt-4 text-center">
    <div class="card p-3 shadow">
      <div class="section-title-box" style="background: linear-gradient(90deg, #0dcaf0 60%, #0d6efd 100%);">كلمة المؤسس</div>
      <blockquote class="blockquote">
        <p class="lead" style="font-size:1rem;">
          "بدأت Welo Web بفكرة بسيطة: كيف يمكن للتكنولوجيا أن تسهل حياة روّاد الأعمال؟  
          من هنا انطلقت لتقديم أنظمة رقمية ذكية تساهم في <strong>تحقيق النجاح والنمو</strong>."
        </p>
        <footer class="blockquote-footer">المهندس وليد | مؤسس Welo Web</footer>
      </blockquote>
    </div>
  </section>

  <!-- التذييل -->
  <footer class="bg-dark text-white text-center py-4 mt-4" id="contact">
    <div class="container">
      <h5 class="mb-3" style="font-size:1rem;">العنوان: سلطنة عمان _ حلبان (مدينة سندان)</h5>
      <p class="mb-1" style="font-size:0.95rem;">&copy; 2025 Welo Web - جميع الحقوق محفوظة</p>
      <p class="mb-1" style="font-size:0.95rem;">
        للتواصل: 
        <a href="https://wa.me/96894919627" class="text-white text-decoration-underline">واتساب</a>
      </p>
      <div class="mb-2">
        <a href="https://www.instagram.com/welo.web14" target="_blank" class="text-white mx-2" title="انستجرام">
          <i class="fab fa-instagram fa-lg"></i>
        </a>
        <a href="https://www.facebook.com/profile.php?id=100083590111343" target="_blank" class="text-white mx-2" title="فيسبوك">
          <i class="fab fa-facebook fa-lg"></i>
        </a>
        <a href="https://www.youtube.com/@welo-web8053" target="_blank" class="text-white mx-2" title="يوتيوب">
          <i class="fab fa-youtube fa-lg"></i>
        </a>
      </div>
    </div>
  </footer>

  <!-- زر واتساب عائم -->
  <a href="https://wa.me/96894919627" target="_blank" 
     style="position: fixed; bottom: 25px; left: 25px; z-index: 9999; background: #25d366; color: #fff; border-radius: 50%; width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 8px rgba(0,0,0,0.2); font-size: 1.5rem;"
     title="تواصل واتساب">
    <i class="fab fa-whatsapp"></i>
  </a>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>
</html>
