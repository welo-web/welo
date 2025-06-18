@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>تفاصيل قالب العقد</h2>
                <div>
                    <a href="{{ route('admin.contract-templates.edit', $template->id) }}" class="btn btn-primary">
                        <i class="fas fa-edit"></i> تعديل القالب
                    </a>
                    <a href="{{ route('admin.contract-templates.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-right"></i> العودة للقائمة
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title">معلومات القالب</h5>
                            <table class="table">
                                <tr>
                                    <th>العنوان</th>
                                    <td>{{ $template->title }}</td>
                                </tr>
                                <tr>
                                    <th>الشركة</th>
                                    <td>{{ $template->company->company_name }}</td>
                                </tr>
                                <tr>
                                    <th>الحالة</th>
                                    <td>
                                        @if($template->is_active)
                                            <span class="badge bg-success">مفعل</span>
                                        @else
                                            <span class="badge bg-danger">غير مفعل</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>تاريخ الإنشاء</th>
                                    <td>{{ $template->created_at->format('Y-m-d H:i') }}</td>
                                </tr>
                                <tr>
                                    <th>آخر تحديث</th>
                                    <td>{{ $template->updated_at->format('Y-m-d H:i') }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h5 class="card-title">الشروط والأحكام الافتراضية</h5>
                            <div class="p-3 bg-light rounded">
                                {!! nl2br(e($template->terms)) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <h5 class="card-title">محتوى القالب</h5>
                            <div class="p-3 bg-light rounded">
                                {!! $template->content !!}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <h5 class="card-title">المتغيرات المتاحة</h5>
                            <div class="alert alert-info">
                                <ul class="mb-0">
                                    <li>{client_name} - اسم العميل</li>
                                    <li>{phone} - رقم الهاتف</li>
                                    <li>{address} - العنوان</li>
                                    <li>{service_name} - اسم الخدمة</li>
                                    <li>{plan_type} - نوع الباقة</li>
                                    <li>{subscription_type} - نوع الاشتراك</li>
                                    <li>{price} - السعر</li>
                                    <li>{discount} - الخصم</li>
                                    <li>{final_price} - السعر النهائي</li>
                                    <li>{date} - تاريخ العقد</li>
                                    <li>{terms} - الشروط والأحكام</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 