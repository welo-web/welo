<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>تفاصيل نظام نقاط البيع للمطاعم - ويلو ويب</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <style>
    body { background: #f9f9f9; font-family: 'Cairo', sans-serif; }
    .plan-card {
      border: 1px solid #dee2e6;
      border-radius: 12px;
      background: #fff;
      box-shadow: 0 0 12px rgba(0,0,0,0.05);
      padding: 20px;
      transition: transform 0.3s ease;
      text-align: center;
    }
    .plan-card:hover { transform: scale(1.02); }
    .price {
      font-size: 24px;
      font-weight: bold;
      margin: 10px 0;
    }
    .discount {
      font-size: 14px;
      color: #28a745;
    }
    .toggle-btn {
      margin-bottom: 30px;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .toggle-btn input {
      margin: 0 10px;
    }
  </style>
</head>
<body>

<div class="container py-5">

  <h2 class="text-center mb-4">تفاصيل نظام نقاط البيع للمطاعم</h2>

  <div class="text-center mb-4">
    <div class="toggle-btn">
      <label>💳 عرض الأسعار:</label>
      <input type="radio" name="billing" value="monthly" checked onclick="updatePrices()"> شهري
      <input type="radio" name="billing" value="yearly" onclick="updatePrices()"> سنوي
    </div>
  </div>

  <div class="row g-4">
    <div class="col-md-4">
      <div class="plan-card">
        <h5 class="text-success">باقة لايت</h5>
        <div class="price" id="lite-price">5 ريال / شهر</div>
        <div class="discount" id="lite-discount" style="display: none;">وفر 17%</div>
        <ul class="text-end">
          <li>إدارة المخزون والمشتريات</li>
          <li>نقطة بيع وتقارير جلسات</li>
          <li>برنامج سحابي وعدد مستخدمين غير محدود</li>
        </ul>
        <a href="/subscribe?service=مطاعم&plan=لايت" class="btn btn-outline-success">طلب اشتراك</a>
      </div>
    </div>

    <div class="col-md-4">
      <div class="plan-card">
        <h5 class="text-primary">الباقة الفضية</h5>
        <div class="price" id="silver-price">10 ريال / شهر</div>
        <div class="discount" id="silver-discount" style="display: none;">وفر 20%</div>
        <ul class="text-end">
          <li>كل مميزات لايت</li>
          <li>تعدد المستودعات والفروع</li>
          <li>تطبيق نادل + إشعارات للإدارة</li>
        </ul>
        <a href="/subscribe?service=مطاعم&plan=فضية" class="btn btn-outline-primary">طلب اشتراك</a>
      </div>
    </div>

    <div class="col-md-4">
      <div class="plan-card">
        <h5 class="text-warning">الباقة الذهبية</h5>
        <div class="price" id="gold-price">15 ريال / شهر</div>
        <div class="discount" id="gold-discount" style="display: none;">وفر 17%</div>
        <ul class="text-end">
          <li>كل مميزات الفضية</li>
          <li>متجر إلكتروني + الطلب من المنزل</li>
          <li>حجز الطاولات عن بعد</li>
        </ul>
        <a href="/subscribe?service=مطاعم&plan=ذهبية" class="btn btn-outline-warning">طلب اشتراك</a>
      </div>
    </div>
  </div>

  <div class="text-center my-5">
    <a onclick="confirmInquiry()" class="btn btn-success">💬 تواصل للاستفسار عبر واتساب</a>
  </div>
</div>

<script>
  function updatePrices() {
    const billing = document.querySelector('input[name="billing"]:checked').value;

    if (billing === "monthly") {
      document.getElementById("lite-price").innerText = "5 ريال / شهر";
      document.getElementById("silver-price").innerText = "10 ريال / شهر";
      document.getElementById("gold-price").innerText = "15 ريال / شهر";
      document.getElementById("lite-discount").style.display = "none";
      document.getElementById("silver-discount").style.display = "none";
      document.getElementById("gold-discount").style.display = "none";
    } else {
      document.getElementById("lite-price").innerText = "55 ريال / سنة";
      document.getElementById("silver-price").innerText = "95 ريال / سنة";
      document.getElementById("gold-price").innerText = "150 ريال / سنة";
      document.getElementById("lite-discount").style.display = "block";
      document.getElementById("silver-discount").style.display = "block";
      document.getElementById("gold-discount").style.display = "block";
    }
  }

  function confirmInquiry() {
    const go = confirm("هل تريد فتح واتساب وإرسال استفسار حول نظام نقاط البيع للمطاعم؟");
    if (go) {
      const url = "https://wa.me/96894919627?text=مرحبًا، لدي استفسار بخصوص نظام نقاط البيع للمطاعم من ويلو ويب";
      window.open(url, "_blank");
    }
  }
</script>

</body>
</html>
