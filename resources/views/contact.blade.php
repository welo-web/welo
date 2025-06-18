<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>اتصل بنا - ويلو ويب</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="تواصل مع فريق ويلو ويب للحصول على الدعم الفني والاستفسارات">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body { 
      background-color: #f4f6f9; 
      font-family: 'Cairo', sans-serif;
      color: #333;
    }
    .contact-section { 
      background: #fff; 
      border-radius: 15px; 
      padding: 40px; 
      box-shadow: 0 8px 20px rgba(0,0,0,0.05);
      transition: all 0.3s ease;
    }
    .contact-section:hover {
      box-shadow: 0 12px 30px rgba(0,0,0,0.08);
    }
    h2 { 
      color: #0d6efd; 
      font-weight: 700;
      margin-bottom: 1.5rem;
    }
    .form-control { 
      border-radius: 10px;
      padding: 12px;
      border: 1px solid #e0e0e0;
      transition: all 0.3s ease;
    }
    .form-control:focus {
      border-color: #0d6efd;
      box-shadow: 0 0 0 0.2rem rgba(13,110,253,0.15);
    }
    .form-label {
      font-weight: 600;
      color: #444;
      margin-bottom: 0.5rem;
    }
    .btn-primary {
      padding: 12px 30px;
      border-radius: 10px;
      font-weight: 600;
      transition: all 0.3s ease;
    }
    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(13,110,253,0.2);
    }
    .navbar {
      background-color: rgba(255, 255, 255, 0.95);
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
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
    .navbar-brand {
      font-size: 1.5rem;
      font-weight: 700;
    }
    .navbar-spacer {
      height: 110px;
    }
    .contact-info {
      background: #f8f9fa;
      border-radius: 10px;
      padding: 20px;
      margin-top: 30px;
    }
    .contact-info h5 {
      color: #0d6efd;
      font-weight: 700;
      margin-bottom: 1rem;
    }
    .contact-info ul {
      list-style: none;
      padding: 0;
    }
    .contact-info li {
      margin-bottom: 1rem;
      display: flex;
      align-items: center;
    }
    .contact-info i {
      color: #0d6efd;
      margin-left: 10px;
      font-size: 1.2rem;
    }
    .contact-info a {
      color: #0d6efd;
      text-decoration: none;
      transition: color 0.3s ease;
    }
    .contact-info a:hover {
      color: #0b5ed7;
      text-decoration: underline;
    }
    .alert {
      border-radius: 10px;
      padding: 1rem;
      margin-bottom: 2rem;
      border: none;
    }
    .alert-success {
      background-color: #d1e7dd;
      color: #0f5132;
    }
    @media (max-width: 991.98px) {
      .navbar-spacer { height: 85px; }
      .contact-section { padding: 30px; }
    }
    @media (max-width: 575.98px) {
      .navbar-spacer { height: 70px; }
      .contact-section { padding: 20px; }
      .btn-primary { width: 100%; }
    }
  </style>
</head>
<body>
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
        <li class="nav-item"><a class="nav-link" href="/faq">الأسئلة الشائعة</a></li>
        <li class="nav-item"><a class="nav-link" href="/privacy">سياسة الخصوصية</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="navbar-spacer"></div>

<div class="container py-5">
    @if (session('success'))
    <div class="alert alert-success text-center">
      <i class="fas fa-check-circle me-2"></i>
      {{ session('success') }}
    </div>
    @endif

  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="contact-section">
        <h2 class="text-center">
          <i class="fas fa-headset me-2"></i>
          اتصل بنا
        </h2>
        <p class="text-center mb-4">يسعدنا تواصلك معنا لأي استفسار أو دعم فني. فقط املأ النموذج وسنقوم بالرد عليك في أقرب وقت.</p>

        <form action="/send-message" method="POST">
          @csrf
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="name" class="form-label">
                <i class="fas fa-user me-2"></i>
                الاسم الكامل
              </label>
              <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label for="email" class="form-label">
                <i class="fas fa-envelope me-2"></i>
                البريد الإلكتروني
              </label>
              <input type="email" id="email" name="email" class="form-control" required>
            </div>
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">
              <i class="fas fa-phone me-2"></i>
              رقم الجوال
            </label>
            <input type="text" id="phone" name="phone" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="message" class="form-label">
              <i class="fas fa-comment me-2"></i>
              رسالتك
            </label>
            <textarea id="message" name="message" rows="5" class="form-control" required></textarea>
          </div>
          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-lg">
              <i class="fas fa-paper-plane me-2"></i>
              إرسال
            </button>
          </div>
        </form>

        <div class="contact-info">
          <h5>
            <i class="fas fa-info-circle me-2"></i>
            معلومات التواصل
          </h5>
          <ul>
            <li>
              <i class="fas fa-phone"></i>
              <strong>رقم الجوال:</strong> 96894919627+
            </li>
            <li>
              <i class="fas fa-envelope"></i>
              <strong>البريد الإلكتروني:</strong> waleed@welo-web.com
            </li>
            <li>
              <i class="fab fa-whatsapp"></i>
              <strong>واتساب مباشر:</strong> 
              <a href="https://wa.me/96894919627" target="_blank">
                تواصل عبر WhatsApp
                <i class="fas fa-external-link-alt ms-1"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
