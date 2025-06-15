<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>اتصل بنا - ويلو ويب</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <!-- خط تقني احترافي -->
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body { background-color: #f4f6f9; font-family: 'Cairo', sans-serif; }
    .contact-section { background: #fff; border-radius: 12px; padding: 30px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); }
    h2 { color: #0d6efd; }
    .form-control, .btn { border-radius: 8px; }
    /* الشريط العلوي */
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
    /* مسافة ديناميكية أسفل الشريط العلوي */
    .navbar-spacer {
      height: 110px;
    }
    @media (max-width: 991.98px) {
      .navbar-spacer { height: 85px; }
    }
    @media (max-width: 575.98px) {
      .navbar-spacer { height: 70px; }
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

<!-- إضافة مسافة ديناميكية بين الشريط العلوي والمحتوى -->
<div class="navbar-spacer"></div>

<div class="container py-5">
    @if (session('success'))
  <div class="alert alert-success text-center">
    {{ session('success') }}
  </div>
@endif

  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="contact-section">
        <h2 class="text-center mb-4">📞 اتصل بنا</h2>
        <p class="text-center mb-4">يسعدنا تواصلك معنا لأي استفسار أو دعم فني. فقط املأ النموذج وسنقوم بالرد عليك في أقرب وقت.</p>

        <form action="/send-message" method="POST">
    @csrf
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="name" class="form-label">الاسم الكامل</label>
              <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label for="email" class="form-label">البريد الإلكتروني</label>
              <input type="email" id="email" name="email" class="form-control" required>
            </div>
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">رقم الجوال</label>
            <input type="text" id="phone" name="phone" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="message" class="form-label">رسالتك</label>
            <textarea id="message" name="message" rows="5" class="form-control" required></textarea>
          </div>
          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-lg">إرسال</button>
          </div>
        </form>

        <hr class="my-5">

        <h5>📬 معلومات التواصل:</h5>
        <ul>
          <li><strong>رقم الجوال:</strong> 96894919627+</li>
          <li><strong>البريد الإلكتروني:</strong> waleed@welo-web.com</li>
          <li><strong>واتساب مباشر:</strong> <a href="https://wa.me/96894919627" target="_blank">تواصل عبر WhatsApp</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS (مع Popper) ضروري لعمل القائمة المنسدلة في الجوال -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
