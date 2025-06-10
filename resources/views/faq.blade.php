
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>الأسئلة الشائعة - ويلو ويب</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <style>
    body { background-color: #fdfdfd; font-family: 'Cairo', sans-serif; padding: 40px; }
    h1 { color: #0d6efd; }
    .accordion-button { font-weight: bold; }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="text-center mb-5">الأسئلة الشائعة</h1>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
