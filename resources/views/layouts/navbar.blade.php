<!-- resources/views/layouts/navbar.blade.php -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="/">
      <img src="/images/logo-small.png" alt="WeloWeb" style="height: 30px; margin-left: 10px;">
      WELO<span class="text-primary">WEB</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNavbar">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">الرئيسية</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('blog') ? 'active' : '' }}" href="{{ route('blog.index') }}">المدونة</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('user-guide') ? 'active' : '' }}" href="/user-guide">الخدمات</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('subscribe') ? 'active' : '' }}" href="/subscribe">الاشتراك</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="/contact">تواصل معنا</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('faq') ? 'active' : '' }}" href="/faq">الأسئلة الشائعة</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('privacy') ? 'active' : '' }}" href="/privacy">سياسة الخصوصية</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
