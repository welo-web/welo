<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>نموذج الاشتراك - ويلو ويب</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Cairo', sans-serif;
      background-color: #f8f9fa;
      color: #333;
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
    .subscription-form {
      background: #fff;
      border-radius: 15px;
      padding: 2rem;
      box-shadow: 0 4px 15px rgba(0,0,0,0.05);
      margin-top: 2rem;
    }
    .form-title {
      color: #0d6efd;
      font-weight: 700;
      margin-bottom: 1.5rem;
      text-align: center;
    }
    .form-label {
      font-weight: 600;
      color: #333;
      margin-bottom: 0.5rem;
    }
    .form-control {
      border-radius: 10px;
      padding: 0.8rem 1rem;
      border: 1px solid #ddd;
      transition: all 0.3s ease;
    }
    .form-control:focus {
      border-color: #0d6efd;
      box-shadow: 0 0 0 0.2rem rgba(13,110,253,0.25);
    }
    .btn-submit {
      background: #0d6efd;
      color: #fff;
      padding: 0.8rem 2rem;
      border-radius: 10px;
      font-weight: 600;
      transition: all 0.3s ease;
      width: 100%;
      margin-top: 1rem;
    }
    .btn-submit:hover {
      background: #0b5ed7;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(13,110,253,0.2);
    }
    .price-toggle {
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 1rem 0;
      gap: 1rem;
    }
    .price-toggle .btn {
      padding: 0.5rem 1.5rem;
      border-radius: 20px;
      font-weight: 600;
    }
    .price-toggle .btn.active {
      background: #0d6efd;
      color: #fff;
    }
    .savings-badge {
      background: #198754;
      color: #fff;
      padding: 0.25rem 0.5rem;
      border-radius: 5px;
      font-size: 0.875rem;
      margin-right: 0.5rem;
    }
    .selected-plan {
      background: #e7f1ff;
      border-radius: 10px;
      padding: 1rem;
      margin: 1rem 0;
    }
    .selected-plan-title {
      color: #0d6efd;
      font-weight: 700;
      margin-bottom: 0.5rem;
    }
    .selected-plan-price {
      font-size: 1.25rem;
      font-weight: 600;
      color: #333;
    }
    @media (max-width: 991.98px) {
      .navbar-spacer { height: 85px; }
    }
    @media (max-width: 575.98px) {
      .navbar-spacer { height: 70px; }
      .subscription-form {
        padding: 1.5rem;
      }
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
        <li class="nav-item"><a class="nav-link" href="/contact">تواصل معنا</a></li>
        <li class="nav-item"><a class="nav-link" href="/privacy">سياسة الخصوصية</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="navbar-spacer"></div>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="subscription-form">
        <h2 class="form-title">
          <i class="fas fa-user-plus me-2"></i>
          نموذج الاشتراك
        </h2>

        <form id="subscriptionForm" action="{{ route('subscribe.submit') }}" method="POST">
          @csrf
          <input type="hidden" name="service" id="selectedService" value="{{ request('service', '') }}">
          <input type="hidden" name="plan" id="selectedPlan" value="{{ request('plan', '') }}">
          <input type="hidden" name="price_type" id="priceType" value="monthly">

          <div class="mb-4">
            <label class="form-label">اختر الخدمة</label>
            <select class="form-select" id="serviceSelect" required>
              <option value="">اختر الخدمة</option>
              <option value="restaurant" data-prices='{"basic":199,"advanced":299,"professional":399}'>نظام المطاعم</option>
              <option value="school" data-prices='{"basic":299,"advanced":399,"professional":499}'>نظام المدارس</option>
              <option value="clinic" data-prices='{"basic":299,"advanced":399,"professional":499}'>نظام العيادات</option>
              <option value="laundry" data-prices='{"basic":199,"advanced":299,"professional":399}'>نظام المغاسل</option>
              <option value="salon" data-prices='{"basic":199,"advanced":299,"professional":399}'>نظام الصالونات</option>
              <option value="retail" data-prices='{"basic":199,"advanced":299,"professional":399}'>نظام المحلات</option>
            </select>
          </div>

          <div class="mb-4">
            <label class="form-label">اختر الباقة</label>
            <select class="form-select" id="planSelect" required>
              <option value="">اختر الباقة</option>
              <option value="basic">الباقة الأساسية</option>
              <option value="advanced">الباقة المتقدمة</option>
              <option value="professional">الباقة الاحترافية</option>
            </select>
          </div>

          <div class="price-toggle">
            <button type="button" class="btn btn-outline-primary active" data-type="monthly">شهري</button>
            <button type="button" class="btn btn-outline-primary" data-type="yearly">سنوي <span class="savings-badge">وفر 20%</span></button>
          </div>

          <div class="selected-plan">
            <div class="selected-plan-title">الباقة المختارة</div>
            <div class="selected-plan-price" id="selectedPrice">0 ريال</div>
          </div>

          <div class="mb-4">
            <label class="form-label">الاسم الكامل</label>
            <input type="text" class="form-control" name="name" required>
          </div>

          <div class="mb-4">
            <label class="form-label">البريد الإلكتروني</label>
            <input type="email" class="form-control" name="email" required>
          </div>

          <div class="mb-4">
            <label class="form-label">رقم الجوال</label>
            <input type="tel" class="form-control" name="phone" required>
          </div>

          <div class="mb-4">
            <label class="form-label">اسم المؤسسة</label>
            <input type="text" class="form-control" name="company" required>
          </div>

          <button type="submit" class="btn btn-submit">
            <i class="fas fa-paper-plane me-2"></i>
            إرسال طلب الاشتراك
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  const serviceSelect = document.getElementById('serviceSelect');
  const planSelect = document.getElementById('planSelect');
  const priceType = document.getElementById('priceType');
  const selectedPrice = document.getElementById('selectedPrice');
  const selectedService = document.getElementById('selectedService');
  const selectedPlan = document.getElementById('selectedPlan');
  const priceToggle = document.querySelectorAll('.price-toggle .btn');

  // تعيين القيم الأولية من URL إذا وجدت
  const urlParams = new URLSearchParams(window.location.search);
  if (urlParams.has('service')) {
    serviceSelect.value = urlParams.get('service');
    selectedService.value = urlParams.get('service');
  }
  if (urlParams.has('plan')) {
    planSelect.value = urlParams.get('plan');
    selectedPlan.value = urlParams.get('plan');
  }

  function updatePrice() {
    const service = serviceSelect.value;
    const plan = planSelect.value;
    const type = priceType.value;

    if (service && plan) {
      const prices = JSON.parse(serviceSelect.options[serviceSelect.selectedIndex].dataset.prices);
      let price = prices[plan];
      
      if (type === 'yearly') {
        price = price * 12 * 0.8; // خصم 20% للاشتراك السنوي
      }

      selectedPrice.textContent = `${price} ريال ${type === 'yearly' ? 'سنوياً' : 'شهرياً'}`;
      selectedService.value = service;
      selectedPlan.value = plan;
    }
  }

  serviceSelect.addEventListener('change', updatePrice);
  planSelect.addEventListener('change', updatePrice);

  priceToggle.forEach(btn => {
    btn.addEventListener('click', function() {
      priceToggle.forEach(b => b.classList.remove('active'));
      this.classList.add('active');
      priceType.value = this.dataset.type;
      updatePrice();
    });
  });

  // تحديث السعر عند تحميل الصفحة
  updatePrice();
});
</script>
</body>
</html>
