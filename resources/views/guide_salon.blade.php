<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>تفاصيل نظام إدارة الصالون النسائي</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body { background-color: #f4f6f9; font-family: 'Cairo', sans-serif; }
    .plan-card { border: 1px solid #ddd; border-radius: 12px; padding: 20px; background: #fff; transition: 0.3s ease; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
    .plan-card:hover { transform: scale(1.02); }
    .plan-title { font-size: 1.25rem; font-weight: bold; color: #333; }
    .price { font-size: 1.4rem; font-weight: bold; color: #0d6efd; }
    .btn-toggle { margin-bottom: 20px; }
    .navbar, .navbar * { font-family: 'Cairo', Tahoma, Arial, sans-serif !important; }
    .navbar-nav .nav-link { font-size: 1.15rem !important; font-weight: 500; }
    .navbar-brand, .navbar span { font-size: 1.5rem !important; }
    .navbar-spacer { height: 110px; }
    .video-container {
      position: relative;
      width: 100%;
      padding-bottom: 56.25%;
      height: 0;
    }
    .video-container iframe {
      position: absolute;
      width: 100%;
      height: 100%;
    }
    @media (max-width: 991.98px) {
      .navbar-spacer { height: 85px; }
      .navbar .container { max-width: 100% !important; }
    }
    @media (max-width: 575.98px) {
      .navbar-spacer { height: 65px; }
      .navbar .container { max-width: 100% !important; }
    }
    @media (max-width: 767.98px) {
      .plan-card { padding: 12px; }
      .plan-title { font-size: 1rem; }
      .price { font-size: 1.1rem; }
      h2 { font-size: 1.1rem; }
      .lead { font-size: 1rem; }
      .btn-toggle button { font-size: 0.95rem; padding: 6px 14px; }
    }
    @media (max-width: 575.98px) {
      .plan-card { padding: 8px; }
      .plan-title { font-size: 0.95rem; }
      .price { font-size: 1rem; }
      h2 { font-size: 1rem; }
      .lead { font-size: 0.95rem; }
      .btn-toggle button { font-size: 0.9rem; padding: 5px 10px; }
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
  <h2 class="text-center mb-4">تفاصيل نظام إدارة الصالون النسائي</h2>

  <p class="text-center lead">
    💇‍♀️ نظام متكامل لإدارة صالونات التجميل، يشمل تنظيم المواعيد، متابعة المبيعات، إدارة الموظفات، وتحسين تجربة العميل بكل احترافية.
  </p>

  <div class="text-center my-4">
    <a href="/subscribe?service=صالون نسائي" class="btn btn-success me-2">طلب اشتراك</a>
    <a href="https://wa.me/96894919627?text=مرحبًا، أود الاستفسار عن نظام إدارة الصالون النسائي من ويلو ويب." class="btn btn-outline-primary" target="_blank">تواصل معنا</a>
  </div>

  <div class="text-center btn-toggle">
    <button class="btn btn-outline-secondary" onclick="togglePrices('monthly')">شهري</button>
    <button class="btn btn-outline-secondary" onclick="togglePrices('yearly')">سنوي</button>
  </div>

  <div class="row g-4" id="plans"></div>

  <h4 class="mt-5 mb-3">📺 فيديو تعريفي:</h4>
  <div class="mb-5 video-container">
    <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="فيديو تعريفي لنظام الصالون" allowfullscreen style="border-radius:10px;"></iframe>
  </div>
</div>

<script>
  const plans = [
    {
      name: "باقة لايت",
      monthly: 10,
      yearly: 95,
      features: [
        "إدارة الحجوزات اليدوية للعملاء.",
        "إضافة قائمة الخدمات والأسعار.",
        "تسجيل المبيعات اليومية نقدًا.",
        "متابعة أداء الموظفات.",
        "تقارير أساسية (يومية / شهرية).",
        "عدد مستخدمات غير محدود.",
        "دعم اللغة العربية."
      ]
    },
    {
      name: "الباقة الفضية",
      monthly: 15,
      yearly: 150,
      features: [
        "كل مميزات باقة لايت، بالإضافة إلى:",
        "نظام حجز إلكتروني مع إشعار للعميلة.",
        "ملف شخصي وسجل زيارات لكل عميلة.",
        "ربط تلقائي مع WhatsApp.",
        "إدارة مخزون المنتجات التجميلية.",
        "نظام نقاط ولاء.",
        "دعم اللغة الإنجليزية."
      ]
    },
    {
      name: "الباقة الذهبية",
      monthly: 20,
      yearly: 200,
      features: [
        "كل مميزات الباقة الفضية، بالإضافة إلى:",
        "تطبيق خاص للموظفات لتسجيل الخدمات.",
        "صلاحيات خاصة للمديرات والموظفات.",
        "تقارير مالية ورضا العملاء احترافية.",
        "دعم الفروع المتعددة.",
        "إشعارات وتنبيهات ذكية."
      ]
    }
  ];

  let currentType = 'monthly';

  function renderPlans() {
    const container = document.getElementById('plans');
    container.innerHTML = '';
    plans.forEach(plan => {
      const saved = Math.round(((plan.monthly * 12 - plan.yearly) / (plan.monthly * 12)) * 100);
      const price = currentType === 'monthly' ? `${plan.monthly} ريال / شهريًا` : `${plan.yearly} ريال / سنويًا <span class='text-success'>(وفر ${saved}%)</span>`;
      const features = plan.features.map(f => `<li>${f}</li>`).join('');
      container.innerHTML += `
        <div class="col-md-4 col-12">
          <div class="plan-card h-100">
            <div class="plan-title mb-2">${plan.name}</div>
            <div class="price mb-3">${price}</div>
            <ul>${features}</ul>
            <a href="/subscribe?service=صالون نسائي&plan=${encodeURIComponent(plan.name)}&price=${currentType === 'monthly' ? plan.monthly : plan.yearly}" class="btn btn-primary w-100 mt-3">طلب اشتراك</a>
          </div>
        </div>
      `;
    });
  }

  function togglePrices(type) {
    currentType = type;
    renderPlans();
  }

  renderPlans();
</script>

<!-- Bootstrap JS (مع Popper) ضروري لعمل القائمة المنسدلة في الجوال -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
