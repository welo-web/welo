@extends('layouts.admin')

@section('title', 'الإعدادات')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">الإعدادات</h1>
    </div>

    <div class="card">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.settings.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <h4 class="mb-3">إعدادات الموقع</h4>
                        
                        <div class="mb-3">
                            <label for="site_name" class="form-label">اسم الموقع</label>
                            <input type="text" class="form-control @error('site_name') is-invalid @enderror" id="site_name" name="site_name" value="{{ old('site_name', $settings->site_name ?? '') }}">
                            @error('site_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="site_description" class="form-label">وصف الموقع</label>
                            <textarea class="form-control @error('site_description') is-invalid @enderror" id="site_description" name="site_description" rows="3">{{ old('site_description', $settings->site_description ?? '') }}</textarea>
                            @error('site_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="contact_email" class="form-label">البريد الإلكتروني للتواصل</label>
                            <input type="email" class="form-control @error('contact_email') is-invalid @enderror" id="contact_email" name="contact_email" value="{{ old('contact_email', $settings->contact_email ?? '') }}">
                            @error('contact_email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="contact_phone" class="form-label">رقم الهاتف للتواصل</label>
                            <input type="text" class="form-control @error('contact_phone') is-invalid @enderror" id="contact_phone" name="contact_phone" value="{{ old('contact_phone', $settings->contact_phone ?? '') }}">
                            @error('contact_phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h4 class="mb-3">روابط التواصل الاجتماعي</h4>

                        <div class="mb-3">
                            <label for="facebook_url" class="form-label">رابط فيسبوك</label>
                            <input type="url" class="form-control @error('facebook_url') is-invalid @enderror" id="facebook_url" name="facebook_url" value="{{ old('facebook_url', $settings->facebook_url ?? '') }}">
                            @error('facebook_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="twitter_url" class="form-label">رابط تويتر</label>
                            <input type="url" class="form-control @error('twitter_url') is-invalid @enderror" id="twitter_url" name="twitter_url" value="{{ old('twitter_url', $settings->twitter_url ?? '') }}">
                            @error('twitter_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="instagram_url" class="form-label">رابط انستغرام</label>
                            <input type="url" class="form-control @error('instagram_url') is-invalid @enderror" id="instagram_url" name="instagram_url" value="{{ old('instagram_url', $settings->instagram_url ?? '') }}">
                            @error('instagram_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="linkedin_url" class="form-label">رابط لينكد إن</label>
                            <input type="url" class="form-control @error('linkedin_url') is-invalid @enderror" id="linkedin_url" name="linkedin_url" value="{{ old('linkedin_url', $settings->linkedin_url ?? '') }}">
                            @error('linkedin_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <h4 class="mb-3">إعدادات SEO</h4>

                        <div class="mb-3">
                            <label for="meta_title" class="form-label">عنوان Meta</label>
                            <input type="text" class="form-control @error('meta_title') is-invalid @enderror" id="meta_title" name="meta_title" value="{{ old('meta_title', $settings->meta_title ?? '') }}">
                            @error('meta_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="meta_description" class="form-label">وصف Meta</label>
                            <textarea class="form-control @error('meta_description') is-invalid @enderror" id="meta_description" name="meta_description" rows="3">{{ old('meta_description', $settings->meta_description ?? '') }}</textarea>
                            @error('meta_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="meta_keywords" class="form-label">الكلمات المفتاحية</label>
                            <input type="text" class="form-control @error('meta_keywords') is-invalid @enderror" id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords', $settings->meta_keywords ?? '') }}" placeholder="افصل بين الكلمات بفاصلة">
                            @error('meta_keywords')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h4 class="mb-3">إعدادات إضافية</h4>

                        <div class="mb-3">
                            <label for="google_analytics" class="form-label">كود Google Analytics</label>
                            <textarea class="form-control @error('google_analytics') is-invalid @enderror" id="google_analytics" name="google_analytics" rows="3">{{ old('google_analytics', $settings->google_analytics ?? '') }}</textarea>
                            @error('google_analytics')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="custom_css" class="form-label">CSS مخصص</label>
                            <textarea class="form-control @error('custom_css') is-invalid @enderror" id="custom_css" name="custom_css" rows="3">{{ old('custom_css', $settings->custom_css ?? '') }}</textarea>
                            @error('custom_css')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="custom_js" class="form-label">JavaScript مخصص</label>
                            <textarea class="form-control @error('custom_js') is-invalid @enderror" id="custom_js" name="custom_js" rows="3">{{ old('custom_js', $settings->custom_js ?? '') }}</textarea>
                            @error('custom_js')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">حفظ الإعدادات</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 