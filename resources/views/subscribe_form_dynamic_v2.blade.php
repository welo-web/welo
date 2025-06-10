@extends('layout') <!-- ربط الصفحة بالتصميم العام -->

@section('content') <!-- بداية محتوى الصفحة -->
<div class="container">
  <div class="text-center my-4">
    <img src="/images/logo.png" alt="ويلو ويب" height="75">
  </div>
  
  <h3 class="text-center">نموذج طلب الاشتراك</h3>

  <div class="form-container">
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
        <select id="service" name="business" class="form-select" required onchange="updatePlans()">
          <option disabled selected>اختر النشاط</option>
          @foreach($projects as $project)
            <option value="{{ $project['name'] }}">{{ $project['name'] }}</option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">الباقة</label>
        <select id="plan" name="plan" class="form-select" required onchange="updateSubscriptionType()">
          <option disabled selected>اختر الباقة</option>
        </select>
      </div>

      <div class="mb-3" id="subscriptionTypeContainer" style="display: none;">
        <label class="form-label">نوع الاشتراك</label>
        <select id="subscriptionType" name="subscriptionType" class="form-select" required onchange="updatePrice()">
          <option disabled selected>اختر نوع الاشتراك</option>
          <option value="شهري">شهري</option>
          <option value="سنوي">سنوي</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">السعر</label>
        <input type="text" id="price" name="price" class="form-control" readonly>
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-success px-5">إرسال الطلب</button>
      </div>
    </form>
  </div>
</div>
@endsection <!-- نهاية محتوى الصفحة -->