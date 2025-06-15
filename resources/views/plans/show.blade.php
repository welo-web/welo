@extends('layout')
@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4">{{ $plan->service->name }} - {{ $plan->name }}</h2>
    <p class="text-center">{{ $plan->description }}</p>
    <div class="row g-4 justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="plan-card">
                <h5 class="text-center">{{ $plan->name }}</h5>
                <p class="text-center">
                    {{ $plan->price_monthly }} ريال / شهر<br>
                    {{ $plan->price_yearly }} ريال / سنة
                </p>
                <ul>
                    @foreach(explode("\n", $plan->features) as $feature)
                        @if(trim($feature) != '')
                        <li>{{ $feature }}</li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @if($plan->youtube_link)
    <hr class="my-5">
    <h4 class="mb-3">🎥 فيديو توضيحي:</h4>
    <div class="ratio ratio-16x9">
        <iframe src="{{ $plan->youtube_link }}" title="فيديو شرح الباقة" allowfullscreen></iframe>
    </div>
    @endif
</div>
@endsection