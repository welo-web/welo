<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>تفاصيل نظام إدارة المحلات التجارية بالتجزئة</title>
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
  <h2 class="text-center mb-4">تفاصيل نظام إدارة المحلات التجارية بالتجزئة</h2>

  <p class="text-center lead">
    🛍️ نظام ذكي لإدارة مبيعات المحلات التجارية بالتجزئة مثل السوبرماركت، محلات الأزياء، الإلكترونيات وغيرها، يشمل الكاشير، المخزون، الضرائب، التنبيهات، والتقارير المالية.
  </p>

  <div class="text-center my-4">
    <a href="/subscribe?service=محل تجاري" class="btn btn-success me-2">طلب اشتراك</a>
    <a href="https://wa.me/96894919627?text=مرحبًا، أود الاستفسار عن نظام المحلات التجارية من ويلو ويب." class="btn btn-outline-primary" target="_blank">تواصل معنا</a>
  </div>

  <div class="text-center btn-toggle">
    <button class="btn btn-outline-secondary" onclick="togglePrices('monthly')">شهري</button>
    <button class="btn btn-outline-secondary" onclick="togglePrices('yearly')">سنوي</button>
  </div>

  <div class="row g-4" id="plans"></div>

  <h4 class="mt-5 mb-3">📺 فيديو تعريفي:</h4>
  <div class="mb-5">
    <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="فيديو تعريفي لنظام المحلات التجارية" allowfullscreen></iframe>
  </div>
</div>

<script>
  const plans = [
    {
      name: "باقة لايت",
      monthly: 10,
      yearly: 95,
      features: [
        "نظام كاشير سهل وسريع",
        "إدارة المنتجات والمخزون",
        "تقارير مبيعات يومية وشهرية",
        "دعم ضرائب وقيمة مضافة",
        "إدارة المستخدمين والصلاحيات",
        "دعم اللغة العربية"
      ]
    },
    {
      name: "الباقة الفضية",
      monthly: 15,
      yearly: 150,
      features: [
        "كل مميزات باقة لايت، بالإضافة إلى:",
        "تنبيهات WhatsApp للمبيعات والمخزون",
        "تنبيه عند نفاد المنتج",
        "تتبع المبيعات حسب الموظف",
        "تقارير أرباح حسب المنتجات",
        "سجل العملاء وفواتيرهم",
        "دعم الباركود والطباعة"
      ]
    },
    {
      name: "الباقة الذهبية",
      monthly: 20,
      yearly: 200,
      features: [
        "كل مميزات الباقة الفضية، بالإضافة إلى:",
        "متجر إلكتروني متصل بالمخزون",
        "تطبيق للمالك",
        "دعم الطلبات من الإنترنت",
        "حملات تسويق عبر WhatsApp",
        "تحليلات وتقارير الربحية",
        "ربط مع طابعات فواتير وتوصيل"
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
            <a href="/subscribe?service=محل تجاري&plan=${encodeURIComponent(plan.name)}&price=${currentType === 'monthly' ? plan.monthly : plan.yearly}" class="btn btn-primary w-100 mt-3">طلب اشتراك</a>
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
