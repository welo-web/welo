@extends('admin.layout')
@section('content')
<div class="container">
    <h3 class="mb-4">تعديل الباقة</h3>
    <form method="POST" action="{{ route('admin.plans.update', $plan->id) }}" class="mb-4">
        @csrf
        @method('PUT')
        <div class="row g-2">
            <div class="col-md-2">
                <select name="service_id" class="form-control" required>
                    <option value="">اختر الخدمة</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}" {{ $plan->service_id == $service->id ? 'selected' : '' }}>
                            {{ $service->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <input type="text" name="name" class="form-control" placeholder="اسم الباقة" value="{{ $plan->name }}" required>
            </div>
            <div class="col-md-2">
                <input type="number" name="price_monthly" class="form-control" placeholder="سعر شهري" value="{{ $plan->price_monthly }}">
            </div>
            <div class="col-md-2">
                <input type="number" name="price_yearly" class="form-control" placeholder="سعر سنوي" value="{{ $plan->price_yearly }}">
            </div>
            <div class="col-md-2">
                <input type="text" name="slug" class="form-control" placeholder="رابط فريد (slug)" value="{{ $plan->slug }}" required>
            </div>
            <div class="col-md-2">
                <input type="text" name="youtube_link" class="form-control" placeholder="رابط يوتيوب" value="{{ $plan->youtube_link }}">
            </div>
            <div class="col-md-12 mt-2">
                <textarea name="features" class="form-control" placeholder="مميزات الباقة (كل ميزة في سطر)">{{ $plan->features }}</textarea>
            </div>
            <div class="col-md-12 mt-2">
                <textarea name="description" class="form-control" placeholder="وصف الباقة">{{ $plan->description }}</textarea>
            </div>
            <div class="col-md-12 mt-2">
                <button type="submit" class="btn btn-primary w-100">حفظ التغييرات</button>
            </div>
        </div>
    </form>
</div>
@endsection 