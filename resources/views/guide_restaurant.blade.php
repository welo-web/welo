<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>دليل نظام المطاعم - ويلو ويب</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      background: #f8f9fa;
      font-family: 'Cairo', sans-serif;
    }
    h2, h4 {
      color: #343a40;
    }
    ul li {
      margin-bottom: 8px;
    }
    .navbar, .navbar * { font-family: 'Cairo', Tahoma, Arial, sans-serif !important; }
    .navbar-nav .nav-link { font-size: 1.15rem !important; font-weight: 500; }
    .navbar-brand, .navbar span { font-size: 1.5rem !important; }
    .navbar-spacer { height: 110px; }
    @media (max-width: 991.98px) {
      .navbar-spacer { height: 85px; }
      .navbar .container { max-width: 100% !important; }
    }
    @media (max-width: 575.98px) {
      .navbar-spacer { height: 65px; }
      .navbar .container { max-width: 100% !important; }
    }
  </style>
</head>
<body>
<!-- شريط علوي جديد متجاوب -->
<nav class="navbar navbar-expand-lg bg-light fixed-top" style="font-family: 'Cairo', Tahoma, Arial, sans-serif;">
  <div class="container justify-content-between" style="max-width: 900px;">
    <div class="d-flex align-items-center">
      <img src="/images/logo.png" alt="WeloWeb" style="height: 50px; margin-left: 10px;">
      <span style="font-weight:bold; letter-spacing:0; font-size:1.5rem;">
        <span class="text-primary">WELO</span>WEB
      </span>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainMenu">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
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

<div class="container py-5">
  <h2 class="mb-4 text-center">📘 دليل استخدام نظام إدارة المطاعم</h2>

  <p>يقدم نظام المطاعم المقدم من ويلو ويب حلاً متكاملاً ومرنًا لإدارة جميع عمليات التشغيل اليومية بدقة وسهولة:</p>

  <ul>
    <li>📦 إدارة دقيقة للمخزون والمخزون التالف</li>
    <li>📑 إدارة الموردين والمشتريات، مع تتبع المبالغ المدفوعة والمتبقية</li>
    <li>💰 تسجيل المبيعات اليومية عن طريق نقاط البيع POS</li>
    <li>🧑‍💻 دعم نظام الجلسات لكل مستخدم مع تقارير مخصصة</li>
    <li>☁️ البرنامج يعمل سحابيًا أو محليًا دون الحاجة للإنترنت</li>
    <li>👥 عدد غير محدود من المستخدمين</li>
    <li>🌍 يدعم اللغة العربية والإنجليزية</li>
    <li>📊 إمكانية إضافة الضرائب، القيمة المضافة، والخصومات</li>
    <li>🎁 نظام نقاط الولاء وتحديد صلاحية العروض بالوقت</li>
    <li>🧾 إدارة كاملة لبيانات العملاء، فواتيرهم ومدفوعاتهم</li>
    <li>🧑‍🍳 إدارة الموظفين، مناوباتهم، وتقارير مبيعاتهم</li>
    <li>💵 دعم إدارة الرواتب والمصروفات (قريبًا)</li>
    <li>🏬 دعم تعدد المستودعات والفروع</li>
    <li>🔔 إشعارات مخصصة للإدارة (قريبًا)</li>
    <li>🍽️ تطبيق خاص للنادل عبر التابلت</li>
    <li>📈 تقارير تفصيلية للمبيعات، العملاء، المنتجات، والربح والخسارة</li>
    <li>🗓️ تقارير يومية وشهرية شاملة</li>
    <li>💵 إمكانية تعديل الأسعار مباشرة من شاشة الكاشير</li>
  </ul>

  <hr class="my-5">

  <h4 class="mb-3">🎥 فيديو توضيحي:</h4>
  <div class="ratio ratio-16x9">
    <iframe src="https://www.youtube.com/embed/ijuGBsYQkSw" title="فيديو شرح نظام المطاعم" allowfullscreen></iframe>
  </div>
</div>

<!-- Bootstrap JS (مع Popper) ضروري لعمل القائمة المنسدلة في الجوال -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
