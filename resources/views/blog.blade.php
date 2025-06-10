<!-- resources/views/blog.blade.php -->
@extends('layouts.app')

@section('title', 'مدونة ويلو ويب')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4">مدونة ويلو ويب</h2>

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
@endsection
