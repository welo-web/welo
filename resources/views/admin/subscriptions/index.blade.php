@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">طلبات الاشتراك</h3>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createDocumentModal">
                        إنشاء مستند
                    </button>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>العميل</th>
                                    <th>الخدمة</th>
                                    <th>الباقة</th>
                                    <th>نوع الاشتراك</th>
                                    <th>السعر</th>
                                    <th>الحالة</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($subscriptions as $subscription)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ optional($subscription->client)->name ?? '-' }}</td>
                                    <td>{{ $subscription->service->name }}</td>
                                    <td>{{ $subscription->plan_type_text }}</td>
                                    <td>{{ $subscription->subscription_type_text }}</td>
                                    <td>{{ number_format($subscription->price, 2) }} ريال</td>
                                    <td>
                                        @if($subscription->status == 'pending')
                                            <span class="badge bg-warning text-dark">قيد المراجعة</span>
                                        @elseif($subscription->status == 'approved')
                                            <span class="badge bg-success">مقبول</span>
                                        @elseif($subscription->status == 'rejected')
                                            <span class="badge bg-danger">مرفوض</span>
                                        @else
                                            <span class="badge bg-secondary">غير معروف</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary" onclick="openDocumentModal({{ $subscription->id }})">
                                            إنشاء مستند
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="11" class="text-center">لا توجد طلبات اشتراك حالياً.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if(method_exists($subscriptions, 'links'))
                        <div class="mt-3">
                            {{ $subscriptions->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Creating Document -->
<div class="modal fade" id="createDocumentModal" tabindex="-1" role="dialog" aria-labelledby="createDocumentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDocumentModalLabel">إنشاء مستند جديد</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="documentForm">
                    <input type="hidden" id="modal_subscription_id" name="subscription_id">
                    <div class="form-group">
                        <label for="modal_document_type">نوع المستند</label>
                        <select class="form-control" id="modal_document_type" name="document_type" required>
                            <option value="contract">عقد اشتراك</option>
                            <option value="quote">عرض سعر</option>
                            <option value="proforma">بروفرما</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="modal_template_id">القالب</label>
                        <select class="form-control" id="modal_template_id" name="template_id" required>
                            <option value="">اختر القالب...</option>
                            @foreach($templates as $template)
                                <option value="{{ $template->id }}">{{ $template->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-primary" onclick="submitDocumentForm()">متابعة</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
let selectedSubscriptionId = null;
function openDocumentModal(subscriptionId) {
    selectedSubscriptionId = subscriptionId;
    $('#modal_subscription_id').val(subscriptionId);
    $('#createDocumentModal').modal('show');
}
function submitDocumentForm() {
    const subscriptionId = $('#modal_subscription_id').val();
    const templateId = $('#modal_template_id').val();
    const documentType = $('#modal_document_type').val();
    if (!templateId) {
        alert('الرجاء اختيار القالب');
        return;
    }
    // الانتقال إلى صفحة إنشاء المستند مع تمرير القيم
    window.location.href = `/admin/contracts/create?subscription_id=${subscriptionId}&template_id=${templateId}&document_type=${documentType}`;
}
</script>
@endpush 