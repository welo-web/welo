<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>الاشتراك - ويلو ويب</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Cairo', sans-serif;
      background: #f0f2f5;
    }
    .subscribe-wrapper {
      max-width: 600px;
      margin: 40px auto;
      background: white;
      border-radius: 15px;
      padding: 30px;
      box-shadow: 0 0 12px rgba(0, 0, 0, 0.08);
    }
    .form-title {
      text-align: center;
      margin-bottom: 30px;
    }
    .form-title img {
      width: 80px;
    }
    .alert {
      font-size: 0.95rem;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="subscribe-wrapper mt-5">
      <div class="form-title">
        <img src="/images/logo.png" alt="WeloWeb Logo">
        <h3 class="mt-3">نموذج الاشتراك بالخدمة</h3>
        <p class="text-muted">يرجى تعبئة البيانات بشكل دقيق وسيتم التواصل معك عبر واتساب</p>
      </div>

      @if(session('success'))
        <div class="alert alert-success text-center">
          {{ session('success') }}
        </div>
      @endif

      <form method="POST" action="/subscribe">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">الاسم الكامل</label>
          <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
          <label for="phone" class="form-label">رقم الواتساب</label>
          <input type="text" class="form-control" id="phone" name="phone" required>
        </div>

        <div class="mb-3">
          <label for="business" class="form-label">نوع النشاط</label>
          <select class="form-select" name="business" id="business">
            <option value="صالون نسائي">صالون نسائي</option>
            <option value="بوتيك نسائي">بوتيك نسائي</option>
            <option value="مطعم">مطعم</option>
            <option value="مغسلة ملابس">مغسلة ملابس</option>
            <option value="محل تجاري">محل تجاري</option>
            <option value="مكتب جلب الأيدي العاملة">مكتب جلب الأيدي العاملة</option>
            <option value="مدرسة">مدرسة</option>
            <option value="مستشفى / عيادة">مستشفى / عيادة</option>
            <option value="أخرى">أخرى</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="service" class="form-label">الخدمة المطلوبة</label>
          <select class="form-select" name="service" id="service" required>
            <option value="">اختر الخدمة المطلوبة</option>
            <option value="أنظمة المحاسبة" {{ request('service') == 'أنظمة المحاسبة' ? 'selected' : '' }}>أنظمة المحاسبة</option>
            <option value="نقاط البيع" {{ request('service') == 'نقاط البيع' ? 'selected' : '' }}>أنظمة نقاط البيع</option>
            <option value="إدارة خدمات" {{ request('service') == 'إدارة خدمات' ? 'selected' : '' }}>أنظمة إدارة خدمات</option>
            <option value="إدارة الموارد البشرية">أنظمة إدارة الموارد البشرية</option>
            <option value="تصميم موقع / متجر">تصميم موقع / متجر</option>
            <option value="برمجة أنظمة مخصصة">برمجة أنظمة مخصصة</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="notes" class="form-label">ملاحظات إضافية (اختياري)</label>
          <textarea class="form-control" id="notes" name="notes" rows="3" placeholder="أدخل أي تفاصيل أو طلبات إضافية..."></textarea>
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-primary px-5">إرسال الاشتراك</button>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
