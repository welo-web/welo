@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">إعدادات الشركة</h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form action="{{ route('admin.company-settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label>اسم الشركة</label>
                            <input type="text" name="company_name" class="form-control @error('company_name') is-invalid @enderror" value="{{ old('company_name', $setting->company_name ?? '') }}" required>
                            @error('company_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>رقم الهاتف</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $setting->phone ?? '') }}">
                            @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>رابط الموقع الإلكتروني</label>
                            <input type="text" name="website" class="form-control @error('website') is-invalid @enderror" value="{{ old('website', $setting->website ?? '') }}">
                            @error('website')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>العنوان</label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address', $setting->address ?? '') }}">
                            @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>الرقم الضريبي</label>
                            <input type="text" name="tax_number" class="form-control @error('tax_number') is-invalid @enderror" value="{{ old('tax_number', $setting->tax_number ?? '') }}">
                            @error('tax_number')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>رقم السجل التجاري</label>
                            <input type="text" name="commercial_registration" class="form-control @error('commercial_registration') is-invalid @enderror" value="{{ old('commercial_registration', $setting->commercial_registration ?? '') }}">
                            @error('commercial_registration')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>شعار الشركة</label>
                            <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror">
                            @if(!empty($setting->logo))
                                <img src="{{ asset('storage/' . $setting->logo) }}" alt="الشعار" style="max-width:120px; margin-top:10px;">
                            @endif
                            @error('logo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>ليترهيد (ورقة رسمية)</label>
                            <input type="file" name="letterhead" class="form-control @error('letterhead') is-invalid @enderror">
                            @if(!empty($setting->letterhead))
                                <img src="{{ asset('storage/' . $setting->letterhead) }}" alt="ليترهيد" style="max-width:120px; margin-top:10px;">
                            @endif
                            @error('letterhead')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>صورة التوقيع الإلكتروني</label>
                            <input type="file" name="signature" class="form-control @error('signature') is-invalid @enderror">
                            @if(!empty($setting->signature))
                                <img src="{{ asset('storage/' . $setting->signature) }}" alt="التوقيع" style="max-width:120px; margin-top:10px;">
                            @endif
                            @error('signature')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>صورة الختم الإلكتروني</label>
                            <input type="file" name="stamp" class="form-control @error('stamp') is-invalid @enderror">
                            @if(!empty($setting->stamp))
                                <img src="{{ asset('storage/' . $setting->stamp) }}" alt="الختم" style="max-width:120px; margin-top:10px;">
                            @endif
                            @error('stamp')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 