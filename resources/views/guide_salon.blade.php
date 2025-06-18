<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>نظام الصالونات - ويلو ويب</title>
  <meta name="description" content="نظام إدارة الصالونات المتكامل من ويلو ويب - إدارة المواعيد، العملاء، الموظفين والتقارير">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Tajawal', sans-serif; background-color: #f8f9fa; }
    .navbar { background-color: #fff; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
    .navbar-brand { font-weight: 700; color: #0d6efd; }
    .nav-link { color: #333; font-weight: 500; }
    .nav-link:hover { color: #0d6efd; }
    .hero-section { background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%); color: white; padding: 4rem 0; margin-bottom: 3rem; }
    .hero-title { font-size: 2.5rem; font-weight: 700; margin-bottom: 1rem; }
    .hero-subtitle { font-size: 1.2rem; opacity: 0.9; }
    .feature-card { background: white; border-radius: 10px; padding: 2rem; margin-bottom: 2rem; box-shadow: 0 2px 4px rgba(0,0,0,0.05); transition: transform 0.3s ease; }
    .feature-card:hover { transform: translateY(-5px); }
    .feature-icon { font-size: 2.5rem; color: #0d6efd; margin-bottom: 1rem; }
    .feature-title { font-size: 1.5rem; font-weight: 600; margin-bottom: 1rem; }
    .feature-description { color: #6c757d; line-height: 1.6; }
    .pricing-toggle { text-align: center; margin-bottom: 2rem; }
    .pricing-toggle .btn-group { background: #f8f9fa; padding: 5px; border-radius: 30px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
    .pricing-toggle .btn { border: none; padding: 8px 20px; border-radius: 25px; font-weight: 500; }
    .pricing-toggle .btn.active { background: #0d6efd; color: white; }
    .pricing-toggle .savings-badge { background: #198754; color: white; padding: 5px 10px; border-radius: 15px; font-size: 0.9rem; margin-right: 10px; }
    .pricing-card { background: white; border-radius: 15px; padding: 2rem; margin-bottom: 2rem; box-shadow: 0 2px 4px rgba(0,0,0,0.05); transition: transform 0.3s ease; }
    .pricing-card:hover { transform: translateY(-5px); }
    .pricing-title { font-size: 1.5rem; font-weight: 600; margin-bottom: 1rem; color: #333; }
    .pricing-price { font-size: 2rem; font-weight: bold; margin: 1rem 0; color: #0d6efd; }
    .pricing-price .original { text-decoration: line-through; color: #6c757d; font-size: 1.2rem; margin-left: 10px; }
    .pricing-period { color: #6c757d; margin-bottom: 1.5rem; }
    .pricing-features { list-style: none; padding: 0; margin: 0 0 2rem 0; }
    .pricing-features li { padding: 0.5rem 0; color: #495057; }
    .pricing-features i { color: #198754; margin-left: 0.5rem; }
    .btn-subscribe { display: inline-block; padding: 0.8rem 2rem; background: #0d6efd; color: white; text-decoration: none; border-radius: 25px; font-weight: 500; transition: background-color 0.3s ease; width: 100%; text-align: center; }
    .btn-subscribe:hover { background: #0b5ed7; color: white; }
    .contact-section { background: white; padding: 4rem 0; margin-top: 3rem; border-radius: 15px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); }
    .contact-title { font-size: 2rem; font-weight: 700; margin-bottom: 1rem; color: #333; }
    .contact-description { color: #6c757d; margin-bottom: 2rem; }
    .contact-button { display: inline-block; padding: 1rem 2rem; background: #0d6efd; color: white; text-decoration: none; border-radius: 25px; font-weight: 500; transition: background-color 0.3s ease; }
    .contact-button:hover { background: #0b5ed7; color: white; }
    @media (max-width: 768px) { .hero-title { font-size: 2rem; } .hero-subtitle { font-size: 1rem; } .navbar .container { max-width: 100% !important; } }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="/">ويلو ويب</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
          <li class="nav-item"><a class="nav-link" href="/services">خدماتنا</a></li>
          <li class="nav-item"><a class="nav-link" href="/subscribe">الاشتراك</a></li>
          <li class="nav-item"><a class="nav-link" href="/blog">المدونة</a></li>
          <li class="nav-item"><a class="nav-link" href="/contact">اتصل بنا</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="hero-section">
    <div class="container">
      <h1 class="hero-title">نظام إدارة الصالونات</h1>
      <p class="hero-subtitle">حل متكامل لإدارة صالونك بكفاءة عالية</p>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="feature-card">
          <i class="fas fa-cut feature-icon"></i>
          <h3 class="feature-title">إدارة المواعيد</h3>
          <p class="feature-description">إدارة مواعيد العملاء والحجوزات بسهولة</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="feature-card">
          <i class="fas fa-users feature-icon"></i>
          <h3 class="feature-title">إدارة العملاء</h3>
          <p class="feature-description">إدارة بيانات العملاء وطلباتهم</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="feature-card">
          <i class="fas fa-user-tie feature-icon"></i>
          <h3 class="feature-title">إدارة الموظفين</h3>
          <p class="feature-description">إدارة شؤون الموظفين والرواتب</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="feature-card">
          <i class="fas fa-chart-line feature-icon"></i>
          <h3 class="feature-title">التقارير</h3>
          <p class="feature-description">تقارير تفصيلية عن الأداء والمبيعات</p>
        </div>
      </div>
    </div>

    <div class="pricing-toggle">
      <div class="btn-group">
        <button class="btn active" data-period="monthly">شهري</button>
        <button class="btn" data-period="yearly">
          سنوي
          <span class="savings-badge">وفر 20%</span>
        </button>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="pricing-card">
          <h3 class="pricing-title">الباقة الأساسية</h3>
          <div class="pricing-price">
            <span class="monthly-price">199 ريال</span>
            <span class="yearly-price" style="display: none">1,910 ريال</span>
            <span class="original yearly-price" style="display: none">2,388 ريال</span>
          </div>
          <div class="pricing-period">شهرياً</div>
          <ul class="pricing-features">
            <li><i class="fas fa-check"></i> إدارة المواعيد</li>
            <li><i class="fas fa-check"></i> إدارة الخدمات</li>
            <li><i class="fas fa-check"></i> التقارير الأساسية</li>
          </ul>
          <a href="{{ route('subscriptions.create', ['service' => 'salon', 'plan' => 'basic']) }}" class="btn-subscribe">اشترك الآن</a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="pricing-card">
          <h3 class="pricing-title">الباقة المتقدمة</h3>
          <div class="pricing-price">
            <span class="monthly-price">399 ريال</span>
            <span class="yearly-price" style="display: none">3,830 ريال</span>
            <span class="original yearly-price" style="display: none">4,788 ريال</span>
          </div>
          <div class="pricing-period">شهرياً</div>
          <ul class="pricing-features">
            <li><i class="fas fa-check"></i> كل مميزات الباقة الأساسية</li>
            <li><i class="fas fa-check"></i> إدارة الموظفين</li>
            <li><i class="fas fa-check"></i> نظام الولاء</li>
            <li><i class="fas fa-check"></i> التقارير المتقدمة</li>
          </ul>
          <a href="{{ route('subscriptions.create', ['service' => 'salon', 'plan' => 'advanced']) }}" class="btn-subscribe">اشترك الآن</a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="pricing-card">
          <h3 class="pricing-title">الباقة الاحترافية</h3>
          <div class="pricing-price">
            <span class="monthly-price">599 ريال</span>
            <span class="yearly-price" style="display: none">5,750 ريال</span>
            <span class="original yearly-price" style="display: none">7,188 ريال</span>
          </div>
          <div class="pricing-period">شهرياً</div>
          <ul class="pricing-features">
            <li><i class="fas fa-check"></i> كل مميزات الباقة المتقدمة</li>
            <li><i class="fas fa-check"></i> تطبيق الموبايل</li>
            <li><i class="fas fa-check"></i> نظام إدارة الفروع</li>
            <li><i class="fas fa-check"></i> دعم فني متميز</li>
          </ul>
          <a href="{{ route('subscriptions.create', ['service' => 'salon', 'plan' => 'professional']) }}" class="btn-subscribe">اشترك الآن</a>
        </div>
      </div>
    </div>

    <div class="contact-section text-center">
      <h2 class="contact-title">هل تحتاج إلى مساعدة في اختيار الباقة المناسبة؟</h2>
      <p class="contact-description">فريقنا جاهز لمساعدتك في اختيار الباقة التي تناسب احتياجاتك</p>
      <a href="/contact" class="contact-button">اتصل بنا</a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const toggleButtons = document.querySelectorAll('.pricing-toggle .btn');
      const monthlyPrices = document.querySelectorAll('.monthly-price');
      const yearlyPrices = document.querySelectorAll('.yearly-price');
      const pricingPeriods = document.querySelectorAll('.pricing-period');

      toggleButtons.forEach(button => {
        button.addEventListener('click', function() {
          // Remove active class from all buttons
          toggleButtons.forEach(btn => btn.classList.remove('active'));
          // Add active class to clicked button
          this.classList.add('active');

          const period = this.dataset.period;
          
          // Toggle prices
          monthlyPrices.forEach(price => {
            price.style.display = period === 'monthly' ? 'inline' : 'none';
          });
          yearlyPrices.forEach(price => {
            price.style.display = period === 'yearly' ? 'inline' : 'none';
          });

          // Update period text
          pricingPeriods.forEach(periodEl => {
            periodEl.textContent = period === 'monthly' ? 'شهرياً' : 'سنوياً';
          });
        });
      });
    });
  </script>
</body>
</html>
