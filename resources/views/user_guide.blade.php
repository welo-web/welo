<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>دليل المستخدم - ويلو ويب</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <style>
    body {
      background: #f8f9fa;
      font-family: 'Cairo', sans-serif;
    }
    .project-card {
      border-radius: 15px;
      box-shadow: 0 0 15px rgba(0,0,0,0.08);
      transition: transform 0.3s ease;
    }
    .project-card:hover {
      transform: translateY(-5px);
    }
    .card-title {
      font-weight: bold;
      font-size: 1.2rem;
    }
    .card-buttons .btn {
      margin: 0 5px;
    }
  </style>
</head>
<body>

<div class="container py-5">
  <h2 class="text-center mb-4">المشاريع التي نخدمها</h2>
  <div class="row g-4">

    <!-- مغسلة ملابس -->
    <div class="col-md-6 col-lg-4">
      <div class="card project-card p-3">
        <div class="card-body text-center">
          <i class="fa-solid fa-shirt fa-2x mb-3 text-primary"></i>
          <h5 class="card-title">مغسلة ملابس</h5>
          <div class="card-buttons d-flex justify-content-center mt-3">
            <a href="https://demo.example.com/laundry" target="_blank" class="btn btn-outline-primary btn-sm">
              <i class="fa fa-link"></i> رابط الديمو
            </a>
            <a href="/guide/laundry" class="btn btn-primary btn-sm">
              <i class="fa fa-book"></i> التفاصيل والاسعار
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- مطاعم -->
    <div class="col-md-6 col-lg-4">
      <div class="card project-card p-3">
        <div class="card-body text-center">
          <i class="fa-solid fa-utensils fa-2x mb-3 text-danger"></i>
          <h5 class="card-title">مطاعم</h5>
          <div class="card-buttons d-flex justify-content-center mt-3">
            <a href="https://demo.example.com/restaurant" target="_blank" class="btn btn-outline-primary btn-sm">
              <i class="fa fa-link"></i> رابط الديمو
            </a>
            <a href="/guide/restaurant" class="btn btn-primary btn-sm">
              <i class="fa fa-book"></i> التفاصيل والاسعار
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- صالون نسائي -->
    <div class="col-md-6 col-lg-4">
      <div class="card project-card p-3">
        <div class="card-body text-center">
          <i class="fa-solid fa-scissors fa-2x mb-3 text-pink"></i>
          <h5 class="card-title">صالون نسائي</h5>
          <div class="card-buttons d-flex justify-content-center mt-3">
            <a href="https://demo.example.com/salon" target="_blank" class="btn btn-outline-primary btn-sm">
              <i class="fa fa-link"></i> رابط الديمو
            </a>
            <a href="/guide/salon" class="btn btn-primary btn-sm">
              <i class="fa fa-book"></i> التفاصيل والاسعار
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- بوتيك نسائي -->
    <div class="col-md-6 col-lg-4">
      <div class="card project-card p-3">
        <div class="card-body text-center">
          <i class="fa-solid fa-bag-shopping fa-2x mb-3 text-info"></i>
          <h5 class="card-title">بوتيك نسائي</h5>
          <div class="card-buttons d-flex justify-content-center mt-3">
            <a href="https://demo.example.com/boutique" target="_blank" class="btn btn-outline-primary btn-sm">
              <i class="fa fa-link"></i> رابط الديمو
            </a>
            <a href="/guide/boutique" class="btn btn-primary btn-sm">
              <i class="fa fa-book"></i> التفاصيل والاسعار
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- محلات تجارية -->
    <div class="col-md-6 col-lg-4">
      <div class="card project-card p-3">
        <div class="card-body text-center">
          <i class="fa-solid fa-store fa-2x mb-3 text-success"></i>
          <h5 class="card-title">محلات تجارية</h5>
          <div class="card-buttons d-flex justify-content-center mt-3">
            <a href="https://demo.example.com/retail" target="_blank" class="btn btn-outline-primary btn-sm">
              <i class="fa fa-link"></i> رابط الديمو
            </a>
            <a href="/guide/retail" class="btn btn-primary btn-sm">
              <i class="fa fa-book"></i> التفاصيل والاسعار
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- مكاتب الأيدي العاملة -->
    <div class="col-md-6 col-lg-4">
      <div class="card project-card p-3">
        <div class="card-body text-center">
          <i class="fa-solid fa-briefcase fa-2x mb-3 text-secondary"></i>
          <h5 class="card-title">مكاتب جلب الأيدي العاملة</h5>
          <div class="card-buttons d-flex justify-content-center mt-3">
            <a href="https://demo.example.com/labor" target="_blank" class="btn btn-outline-primary btn-sm">
              <i class="fa fa-link"></i> رابط الديمو
            </a>
            <a href="/guide/labor" class="btn btn-primary btn-sm">
              <i class="fa fa-book"></i> التفاصيل والاسعار
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- مدارس -->
    <div class="col-md-6 col-lg-4">
      <div class="card project-card p-3">
        <div class="card-body text-center">
          <i class="fa-solid fa-school fa-2x mb-3 text-warning"></i>
          <h5 class="card-title">مدارس</h5>
          <div class="card-buttons d-flex justify-content-center mt-3">
            <a href="https://demo.example.com/school" target="_blank" class="btn btn-outline-primary btn-sm">
              <i class="fa fa-link"></i> رابط الديمو
            </a>
            <a href="/guide/school" class="btn btn-primary btn-sm">
              <i class="fa fa-book"></i> التفاصيل والاسعار
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- مستشفيات -->
    <div class="col-md-6 col-lg-4">
      <div class="card project-card p-3">
        <div class="card-body text-center">
          <i class="fa-solid fa-hospital fa-2x mb-3 text-danger"></i>
          <h5 class="card-title">مستشفيات وعيادات</h5>
          <div class="card-buttons d-flex justify-content-center mt-3">
            <a href="https://demo.example.com/hospital" target="_blank" class="btn btn-outline-primary btn-sm">
              <i class="fa fa-link"></i> رابط الديمو
            </a>
            <a href="/guide/clinic" class="btn btn-primary btn-sm">
              <i class="fa fa-book"></i> التفاصيل والاسعار
            </a>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

</body>
</html>
