<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>مدونة ويلو ويب</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body { background: #f8f9fa; font-family: 'Cairo', sans-serif; }
    .navbar, .navbar * { font-family: 'Cairo', Tahoma, Arial, sans-serif !important; }
    .navbar-nav .nav-link { font-size: 1.15rem !important; font-weight: 500; }
    .navbar-brand, .navbar span { font-size: 1.5rem !important; }
    .navbar-spacer { height: 110px; }
    @media (max-width: 991.98px) { .navbar-spacer { height: 85px; } }
    @media (max-width: 575.98px) { .navbar-spacer { height: 70px; } }
  </style>
</head>
<body>
  <!-- شريط علوي جديد متجاوب -->
  <nav class="navbar navbar-expand-lg bg-light fixed-top" style="font-family: 'Cairo', Tahoma, Arial, sans-serif;">
    <div class="container-fluid justify-content-between">
      <div class="d-flex align-items-center">
        <img src="/images/logo.png" alt="WeloWeb" style="height: 50px; margin-left: 10px;">
        <span style="font-weight:bold; letter-spacing:0; font-size:1.5rem;">
          <span class="text-primary">WELO</span>WEB
        </span>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mainMenu">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="/user-guide">الخدمات والاسعار</a></li>
          <li class="nav-item"><a class="nav-link" href="/subscribe">الاشتراك</a></li>
          <li class="nav-item"><a class="nav-link" href="/contact">تواصل معنا</a></li>
          <li class="nav-item"><a class="nav-link" href="/blog">مدونة</a></li>
          <li class="nav-item"><a class="nav-link" href="/faq">الأسئلة الشائعة</a></li>
          <li class="nav-item"><a class="nav-link" href="/privacy">سياسة الخصوصية</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- نهاية الشريط العلوي الجديد -->

  <!-- إضافة مسافة ديناميكية بين الشريط العلوي والمحتوى -->
  <div class="navbar-spacer"></div>

  <div class="container py-5">
    <!-- عنوان الصفحة داخل صندوق أزرق صغير واحترافي -->
    <div class="mx-auto mb-4" style="max-width: 370px;">
      <div class="card shadow-sm" style="border-radius: 18px; background: #0d6efd;">
        <div class="card-body py-3 px-2 text-center">
          <h2 class="mb-0" style="font-weight:bold; color:#fff; letter-spacing:1px; font-size:1.35rem;">مدونة ويلو ويب</h2>
        </div>
      </div>
    </div>

    <!-- التصنيفات -->
    <div class="mb-4 text-center">
      <button class="btn btn-outline-primary mx-1 filter-btn" data-category="all">الكل</button>
      <button class="btn btn-outline-primary mx-1 filter-btn" data-category="نصائح تقنية">نصائح تقنية</button>
      <button class="btn btn-outline-primary mx-1 filter-btn" data-category="إدارة المشاريع">إدارة المشاريع</button>
      <button class="btn btn-outline-primary mx-1 filter-btn" data-category="تحسين الأداء">تحسين الأداء</button>
      <button class="btn btn-outline-primary mx-1 filter-btn" data-category="دليل المستخدم">دليل المستخدم</button>
      <button class="btn btn-outline-primary mx-1 filter-btn" data-category="تسويق رقمي">تسويق رقمي</button>
    </div>

    <!-- شبكة المقالات -->
    <div class="row" id="blog-posts">
      @foreach ($articles as $article)
      <div class="col-md-6 mb-4 blog-item" data-category="{{ $article['category'] }}">
        <div class="card h-100">
          <img src="{{ $article['image_url'] }}" class="card-img-top" alt="صورة المقال">
          <div class="card-body">
            <h5 class="card-title">{{ $article['title'] }}</h5>
            <p class="card-text">{{ $article['description'] }}</p>
            <button class="btn btn-primary open-modal" data-title="{{ $article['title'] }}" data-body="{{ $article['description'] }}">اقرأ المزيد</button>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  <!-- نافذة منبثقة -->
  <div class="modal fade" id="articleModal" tabindex="-1" aria-labelledby="articleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="articleModalLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="articleModalBody"></div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // فلترة المقالات
    document.querySelectorAll('.filter-btn').forEach(button => {
      button.addEventListener('click', () => {
        const category = button.dataset.category;
        document.querySelectorAll('.blog-item').forEach(item => {
          if (category === 'all' || item.dataset.category === category) {
            item.style.display = 'block';
          } else {
            item.style.display = 'none';
          }
        });
      });
    });

    // فتح المقال في النافذة المنبثقة
    document.querySelectorAll('.open-modal').forEach(button => {
      button.addEventListener('click', () => {
        document.getElementById('articleModalLabel').innerText = button.dataset.title;
        document.getElementById('articleModalBody').innerText = button.dataset.body;
        const modal = new bootstrap.Modal(document.getElementById('articleModal'));
        modal.show();
      });
    });
  </script>
</body>
</html>
