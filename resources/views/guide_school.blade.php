<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>تفاصيل نظام إدارة المدارس</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <style>
    body { background-color: #f8f9fa; font-family: 'Cairo', sans-serif; }
    .plan-card { border: 1px solid #ddd; border-radius: 12px; padding: 20px; background: #fff; transition: 0.3s ease; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
    .plan-card:hover { transform: scale(1.02); }
    .plan-title { font-size: 1.25rem; font-weight: bold; color: #333; }
    .price { font-size: 1.4rem; font-weight: bold; color: #0d6efd; }
    .btn-toggle { margin-bottom: 20px; }
    iframe { border-radius: 10px; width: 100%; height: 400px; }
  </style>
</head>
<body>

<div class="container py-5">
  <h2 class="text-center mb-4">تفاصيل نظام إدارة المدارس</h2>

  <p class="text-center lead">
    🎓 نظام متكامل لإدارة المدارس والمراكز التعليمية، يشمل تنظيم الطلاب، الرسوم، الجداول، النتائج، الحضور، التواصل مع أولياء الأمور، وأكثر.
  </p>

  <div class="text-center my-4">
    <a href="/subscribe?service=مدرسة" class="btn btn-success me-2">طلب اشتراك</a>
    <a href="https://wa.me/96894919627?text=مرحبًا، أود الاستفسار عن نظام إدارة المدارس من ويلو ويب." class="btn btn-outline-primary" target="_blank">تواصل معنا</a>
  </div>

  <div class="text-center btn-toggle">
    <button class="btn btn-outline-secondary" onclick="togglePrices('monthly')">شهري</button>
    <button class="btn btn-outline-secondary" onclick="togglePrices('yearly')">سنوي</button>
  </div>

  <div class="row g-4" id="plans"></div>

  <h4 class="mt-5 mb-3">📺 فيديو تعريفي:</h4>
  <div class="mb-5">
    <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="فيديو تعريفي لنظام إدارة المدارس" allowfullscreen></iframe>
  </div>
</div>

<script>
  const plans = [
    {
      name: "باقة لايت",
      monthly: 20,
      yearly: 200,
      features: [
        "إدارة بيانات الطلاب والمعلمين",
        "تسجيل الحضور والغياب",
        "إدارة الجداول الدراسية",
        "متابعة الرسوم والمدفوعات",
        "تقارير درجات بسيطة",
        "طباعة الشهادات",
        "دعم اللغة العربية"
      ]
    },
    {
      name: "الباقة الفضية",
      monthly: 30,
      yearly: 300,
      features: [
        "كل مميزات باقة لايت، بالإضافة إلى:",
        "تنبيهات واتساب لأولياء الأمور",
        "بوابة المعلمين لإدخال الدرجات والحضور",
        "سجل طبي للطلاب",
        "أرشفة الشهادات والملفات",
        "تقارير شاملة للرسوم والفصول"
      ]
    },
    {
      name: "الباقة الذهبية",
      monthly: 40,
      yearly: 400,
      features: [
        "كل مميزات الباقة الفضية، بالإضافة إلى:",
        "بوابة إلكترونية لأولياء الأمور",
        "بوابة إلكترونية للطلاب",
        "إدارة المكتبة والإعارات",
        "نظام أنشطة طلابية ومسابقات",
        "تحليل الأداء الأكاديمي",
        "دعم الفروع والربط بين الفصول إلكترونيًا"
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
        <div class="col-md-4">
          <div class="plan-card h-100">
            <div class="plan-title mb-2">${plan.name}</div>
            <div class="price mb-3">${price}</div>
            <ul>${features}</ul>
            <a href="/subscribe?service=مدرسة&plan=${encodeURIComponent(plan.name)}&price=${currentType === 'monthly' ? plan.monthly : plan.yearly}" class="btn btn-primary w-100 mt-3">طلب اشتراك</a>
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

</body>
</html>
