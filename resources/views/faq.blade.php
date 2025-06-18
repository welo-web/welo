<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>الأسئلة الشائعة - ويلو ويب</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="إجابات على الأسئلة الشائعة حول خدمات ويلو ويب وحلولها الرقمية">
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
    .page-title {
      background: linear-gradient(90deg, #0d6efd 60%, #0dcaf0 100%);
      color: #fff;
      border-radius: 15px;
      padding: 1rem;
      margin-bottom: 2rem;
      box-shadow: 0 4px 15px rgba(13,110,253,0.1);
      text-align: center;
      font-weight: 700;
    }
    .accordion {
      --bs-accordion-border-color: #e9ecef;
      --bs-accordion-border-width: 1px;
      --bs-accordion-border-radius: 15px;
      --bs-accordion-inner-border-radius: 15px;
      --bs-accordion-btn-padding-x: 1.5rem;
      --bs-accordion-btn-padding-y: 1.25rem;
      --bs-accordion-btn-color: #0d6efd;
      --bs-accordion-btn-bg: #fff;
      --bs-accordion-btn-icon: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%230d6efd'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
      --bs-accordion-btn-icon-width: 1.25rem;
      --bs-accordion-btn-icon-transform: rotate(-180deg);
      --bs-accordion-btn-icon-transition: transform 0.2s ease-in-out;
      --bs-accordion-btn-active-icon: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%230d6efd'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
      --bs-accordion-btn-focus-border-color: #86b7fe;
      --bs-accordion-btn-focus-box-shadow: 0 0 0 0.25rem rgba(13,110,253,0.25);
      --bs-accordion-body-padding-x: 1.5rem;
      --bs-accordion-body-padding-y: 1.25rem;
      --bs-accordion-active-color: #0d6efd;
      --bs-accordion-active-bg: #e7f1ff;
    }
    .accordion-item {
      margin-bottom: 1rem;
      border: none;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      transition: all 0.3s ease;
    }
    .accordion-item:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    .accordion-button {
      font-weight: 600;
      font-size: 1.1rem;
    }
    .accordion-button:not(.collapsed) {
      background-color: #e7f1ff;
      color: #0d6efd;
    }
    .accordion-button:focus {
      box-shadow: none;
      border-color: #e9ecef;
    }
    .accordion-body {
      color: #666;
      line-height: 1.6;
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
    .btn-contact {
      padding: 0.8rem 2rem;
      border-radius: 10px;
      font-weight: 600;
      transition: all 0.3s ease;
    }
    .btn-contact:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(13,110,253,0.2);
    }
    @media (max-width: 991.98px) {
      .navbar-spacer { height: 85px; }
    }
    @media (max-width: 575.98px) {
      .navbar-spacer { height: 70px; }
      .page-title {
        font-size: 1.5rem;
        padding: 0.8rem;
      }
      .accordion-button {
        font-size: 1rem;
        padding: 1rem;
      }
      .accordion-body {
        padding: 1rem;
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
  <div class="page-title">
    <i class="fas fa-question-circle me-2"></i>
    الأسئلة الشائعة
  </div>

  <div class="accordion" id="faqAccordion">
    <div class="accordion-item">
      <h2 class="accordion-header" id="q1">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#a1" aria-expanded="true">
          <i class="fas fa-shopping-cart me-2"></i>
          كيف يمكنني الاشتراك في إحدى الخدمات؟
        </button>
      </h2>
      <div id="a1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
          يمكنك الانتقال إلى صفحة <strong>الخدمات والأسعار</strong> واختيار الخدمة المناسبة، ثم الضغط على "اشترك الآن" وتعبئة النموذج. سيقوم فريقنا بالتواصل معك لتأكيد الاشتراك وتفعيل الخدمة.
        </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="q2">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a2">
          <i class="fas fa-exchange-alt me-2"></i>
          هل يمكن تعديل خطة الاشتراك لاحقًا؟
        </button>
      </h2>
      <div id="a2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
          نعم، يمكنك تغيير الخطة أو الترقية إلى باقة أعلى في أي وقت بالتواصل مع فريق الدعم. كما يمكنك إضافة خدمات إضافية أو تعديل الميزات حسب احتياجاتك.
        </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="q3">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a3">
          <i class="fas fa-cloud me-2"></i>
          هل جميع الخدمات تعمل عبر الإنترنت؟
        </button>
      </h2>
      <div id="a3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
          نعم، معظم الأنظمة المتوفرة سحابية وتعمل عبر الإنترنت، مما يتيح لك الوصول إلى خدماتك من أي مكان وفي أي وقت. كما يمكن توفير نسخ محلية لبعض المشاريع عند الطلب.
        </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="q4">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a4">
          <i class="fas fa-shield-alt me-2"></i>
          كيف يتم حماية بياناتي؟
        </button>
      </h2>
      <div id="a4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
          نستخدم أحدث تقنيات التشفير وحماية البيانات. جميع البيانات محمية ومشفرة، ونلتزم بمعايير الأمان العالمية. كما نقوم بعمل نسخ احتياطية دورية لضمان سلامة بياناتك.
        </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="q5">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a5">
          <i class="fas fa-headset me-2"></i>
          هل يوجد دعم فني متوفر؟
        </button>
      </h2>
      <div id="a5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
          نعم، نوفر دعم فني على مدار الساعة طوال أيام الأسبوع. يمكنك التواصل معنا عبر الهاتف، البريد الإلكتروني، أو واتساب. كما نوفر دليلاً شاملاً للمستخدم وندوات تدريبية دورية.
        </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="q6">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a6">
          <i class="fas fa-credit-card me-2"></i>
          ما هي طرق الدفع المتاحة؟
        </button>
      </h2>
      <div id="a6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
          نوفر عدة طرق للدفع تشمل: التحويل البنكي، البطاقات الائتمانية، المحافظ الإلكترونية، وخدمات الدفع الإلكتروني. كما يمكنك اختيار الدفع الشهري أو السنوي حسب ما يناسبك.
        </div>
      </div>
    </div>
  </div>

  <div class="contact-section">
    <h3>
      <i class="fas fa-envelope me-2"></i>
      لم تجد إجابتك؟
    </h3>
    <p>يمكنك التواصل معنا مباشرة للحصول على إجابة على أي استفسار آخر</p>
    <a href="/contact" class="btn btn-primary btn-contact">
      <i class="fas fa-paper-plane me-2"></i>
      تواصل معنا
    </a>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
