<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>الأسئلة الشائعة - ويلو ويب</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <!-- خط تقني احترافي -->
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
  <style>
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
    .navbar-spacer {
      height: 110px;
    }
    @media (max-width: 991.98px) {
      .navbar-spacer { height: 85px; }
    }
    @media (max-width: 575.98px) {
      .navbar-spacer { height: 70px; }
    }
    h1, h2 { color: #0d6efd; }
    .accordion-button { font-weight: bold; }
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
        <li class="nav-item"><a class="nav-link" href="/user-guide">الخدمات والاسعار</a></li>
        <li class="nav-item"><a class="nav-link" href="/subscribe">الاشتراك</a></li>
        <li class="nav-item"><a class="nav-link" href="/contact">تواصل معنا</a></li>
        <li class="nav-item"><a class="nav-link" href="/blog">مدونة</a></li>
        <li class="nav-item"><a class="nav-link" href="/faq">الأسئلة الشائعة</a></li>
        <li class="nav-item"><a class="nav-link" href="/privacy">سياسة الخصوصية</a></li>
      </ul>
    </div>
  </div>
</nav>
<!-- نهاية الشريط العلوي الجديد -->

<!-- إضافة مسافة ديناميكية بين الشريط العلوي والعنوان -->
<div class="navbar-spacer"></div>

<!-- عنوان الصفحة داخل صندوق أزرق صغير واحترافي -->
<div class="container mb-4">
  <div class="mx-auto" style="max-width: 370px;">
    <div class="card shadow-sm mb-4" style="border-radius: 18px; background: #0d6efd;">
      <div class="card-body py-3 px-2 text-center">
        <h2 class="mb-0" style="font-weight:bold; color:#fff; letter-spacing:1px; font-size:1.35rem;">الأسئلة الشائعة</h2>
      </div>
    </div>
  </div>
</div>

<div class="container py-5">
  <div class="accordion" id="faqAccordion">
    <div class="accordion-item">
      <h2 class="accordion-header" id="q1">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#a1" aria-expanded="true">
          كيف يمكنني الاشتراك في إحدى الخدمات؟
        </button>
      </h2>
      <div id="a1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
          يمكنك الانتقال إلى صفحة <strong>المشاريع التي نخدمها</strong> واختيار الخدمة المناسبة، ثم الضغط على "اشترك الآن" وتعبئة النموذج.
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="q2">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a2">
          هل يمكن تعديل خطة الاشتراك لاحقًا؟
        </button>
      </h2>
      <div id="a2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
          نعم، يمكن تغيير الخطة أو الترقية إلى باقة أعلى في أي وقت بالتواصل مع فريق الدعم.
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="q3">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a3">
          هل جميع الخدمات تعمل عبر الإنترنت؟
        </button>
      </h2>
      <div id="a3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
          معظم الأنظمة المتوفرة سحابية وتعمل عبر الإنترنت، لكن يمكن توفير نسخ محلية لبعض المشاريع عند الطلب.
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS (مع Popper) ضروري لعمل القائمة المنسدلة في الجوال -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
