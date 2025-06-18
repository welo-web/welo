@extends('layouts.app')

@section('content')
<div class="container text-center py-5">
    <h2>دفع الاشتراك رقم #{{ $subscription->id }}</h2>
    <p>المبلغ المطلوب: <strong>{{ number_format($subscription->price, 2) }} ريال</strong></p>
    <a href="{{ $redirect_url }}" class="btn btn-success btn-lg" target="_blank">
        ادفع الآن عبر PayTabs
    </a>
</div>
@endsection 