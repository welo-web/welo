<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>نموذج الاشتراك - ويلو ويب</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <style>
    body { background: #f4f6f9; font-family: 'Cairo', sans-serif; }
    .form-container {
      max-width: 600px;
      margin: 50px auto;
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h3 {
      text-align: center;
      margin-bottom: 25px;
      color: #333;
    }
  </style>
</head>
<body>

<div class="form-container">
  <h3>طلب الاشتراك</h3>
  <form method="POST" action="/subscribe">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="mb-3">
      <label class="form-label">الاسم الكامل</label>
      <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">رقم الواتساب</label>
      <input type="text" name="phone" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">نوع النشاط / المشروع</label>
      <input type="text" name="business" class="form-control" value="{{ request('service') }}">
    </div>

    <div class="mb-3">
      <label class="form-label">الباقة المختارة</label>
      <input type="text" name="plan" class="form-control" value="{{ request('plan') }}">
    </div>

    <div class="mb-3">
      <label class="form-label">السعر</label>
      <input type="text" name="price" class="form-control" value="{{ request('price') }}">
    </div>

    <div class="mb-3">
      <label class="form-label">ملاحظات إضافية</label>
      <textarea name="notes" class="form-control" rows="3"></textarea>
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-success px-5">إرسال الطلب</button>
    </div>
  </form>
</div>

</body>
</html>
