@extends('admin.layout')

@section('title', 'إعدادات الموقع')

@section('content')
  <h3 class="mb-4">تحديث إعدادات المحتوى</h3>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <form method="POST" action="{{ route('admin.settings.update') }}">
    @csrf

    <div class="mb-3">
      <label class="form-label">الهيدر</label>
      <textarea name="header" class="form-control" rows="4">{{ old('header', $header ?? '') }}</textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">الرؤية</label>
      <textarea name="vision" class="form-control" rows="4">{{ old('vision', $vision ?? '') }}</textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">الفوتر</label>
      <textarea name="footer" class="form-control" rows="4">{{ old('footer', $footer ?? '') }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
  </form>
@endsection