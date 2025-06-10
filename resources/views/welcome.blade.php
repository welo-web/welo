<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ويلو ويب - الحلول الرقمية</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">ويلو ويب</a>
        </div>
    </nav>

    @if(session('success'))
        <div class="container mt-4">
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <header class="bg-primary text-white text-center py-5">
        <h1>حلول رقمية متكاملة لإدارة مشاريعك</h1>
        <p>برامج محاسبة، نقاط بيع، وإدارة مخصصة لأنشطتك</p>
        <a href="https://wa.me/968XXXXXXXX?text=مرحبًا،%20أرغب%20في%20الاشتراك%20بخدمات%20ويلو%20ويب" class="btn btn-light mt-3">تواصل معنا عبر واتساب</a>
    </header>

    <section class="container py-5">
        <h2 class="text-center mb-4">خدماتنا</h2>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">خدمات برمجية وحلول رقمية</h5>
                        <ul class="list-unstyled">
                            <li>✔️ أنظمة المحاسبة</li>
                            <li>✔️ أنظمة نقاط البيع</li>
                            <li>✔️ أنظمة إدارة خدمات</li>
                            <li>✔️ أنظمة إدارة الموارد البشرية</li>
                            <li>✔️ تصميم موقع + متجر إلكتروني</li>
                            <li>✔️ برمجة أنظمة مخصصة</li>
                        </ul>
                        <div class="mt-3">
                            <a href="https://wa.me/968XXXXXXXX?text=مرحبًا،%20أرغب%20في%20الاشتراك%20بخدمة%20برمجية%20من%20ويلو%20ويب" class="btn btn-success me-2">تواصل معنا</a>
                            <a href="/subscribe?service=خدمة%20برمجية%20وحلول%20رقمية" class="btn btn-primary">اشترك الآن</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">منتجاتنا</h5>
                        <ul class="list-unstyled">
                            <li>✔️ أجهزة نقاط البيع</li>
                        </ul>
                        <div class="mt-3">
                            <a href="https://wa.me/968XXXXXXXX?text=مرحبًا،%20أرغب%20في%20الاستفسار%20عن%20أجهزة%20نقاط%20البيع" class="btn btn-success me-2">تواصل معنا</a>
                            <a href="/subscribe?service=أجهزة%20نقاط%20البيع" class="btn btn-primary">اشترك الآن</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container py-5">
        <h2 class="text-center mb-4">المشاريع التي نخدمها</h2>
        <div class="row g-3 text-center">
            <div class="col-md-3"><div class="p-3 border rounded">🏥 مستشفيات وعيادات خاصة</div></div>
            <div class="col-md-3"><div class="p-3 border rounded">🏫 مدارس</div></div>
            <div class="col-md-3"><div class="p-3 border rounded">🏢 مكتب جلب الأيدي العاملة</div></div>
            <div class="col-md-3"><div class="p-3 border rounded">💇‍♀️ صالون نسائي</div></div>
            <div class="col-md-3"><div class="p-3 border rounded">👗 بوتيك نسائي</div></div>
            <div class="col-md-3"><div class="p-3 border rounded">🧺 مغسلة ملابس</div></div>
            <div class="col-md-3"><div class="p-3 border rounded">🍽️ مطاعم</div></div>
            <div class="col-md-3"><div class="p-3 border rounded">🏪 محلات تجارية</div></div>
        </div>
    </section>

    <footer class="bg-dark text-white text-center py-3">
        <p class="mb-0">&copy; 2025 ويلو ويب - جميع الحقوق محفوظة</p>
    </footer>

</body>
</html>
