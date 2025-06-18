@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success text-white">إعدادات واتساب API</div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form method="POST" action="{{ route('admin.settings.whatsapp.update') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">API URL</label>
                            <input type="text" name="api_url" class="form-control" value="{{ old('api_url', $settings['api_url']) }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">API Token</label>
                            <input type="text" name="api_token" class="form-control" value="{{ old('api_token', $settings['api_token']) }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone Number ID</label>
                            <input type="text" name="phone_number_id" class="form-control" value="{{ old('phone_number_id', $settings['phone_number_id']) }}" required>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-success">حفظ الإعدادات</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 