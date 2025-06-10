@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">طلب الاشتراك</h3>

    <form method="POST" action="{{ route('subscribe.submit') }}">
        @csrf

        <div class="mb-3">
            <label for="project" class="form-label">نوع النشاط</label>
            <select id="project" name="project" class="form-select" required>
                <option value="">اختر نوع النشاط</option>
                <option value="مطاعم">مطاعم</option>
                <option value="مغسلة ملابس">مغسلة ملابس</option>
                <option value="صالون نسائي">صالون نسائي</option>
                <option value="مدارس">مدارس</option>
                <option value="مستشفيات">مستشفيات</option>
                <option value="محلات تجارية">محلات تجارية</option>
                <option value="مكتب جلب العمالة">مكتب جلب العمالة</option>
                <option value="بوتيك نسائي">بوتيك نسائي</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="plan" class="form-label">الباقة</label>
            <select id="plan" name="plan" class="form-select" required disabled>
                <option value="">اختر الباقة</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="billing" class="form-label">نوع الاشتراك</label>
            <select id="billing" name="billing" class="form-select" required disabled>
                <option value="">اختر نوع الاشتراك</option>
                <option value="شهري">شهري</option>
                <option value="سنوي">سنوي</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">السعر</label>
            <input type="text" id="price" name="price" class="form-control" readonly>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">الاسم</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">رقم الواتساب</label>
            <input type="text" name="phone" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">إرسال الاشتراك</button>
    </form>
</div>

<script>
    const prices = {
        "مطاعم": { "لايت": { "شهري": 5, "سنوي": 55 }, "فضية": { "شهري": 10, "سنوي": 95 }, "ذهبية": { "شهري": 15, "سنوي": 150 } },
        "مغسلة ملابس": { "لايت": { "شهري": 7, "سنوي": 75 }, "فضية": { "شهري": 10, "سنوي": 95 }, "ذهبية": { "شهري": 15, "سنوي": 150 } },
        "صالون نسائي": { "لايت": { "شهري": 10, "سنوي": 95 }, "فضية": { "شهري": 15, "سنوي": 150 }, "ذهبية": { "شهري": 20, "سنوي": 200 } },
        "مدارس": { "لايت": { "شهري": 20, "سنوي": 200 }, "فضية": { "شهري": 30, "سنوي": 300 }, "ذهبية": { "شهري": 40, "سنوي": 400 } },
        "مستشفيات": { "لايت": { "شهري": 25, "سنوي": 250 }, "فضية": { "شهري": 35, "سنوي": 350 }, "ذهبية": { "شهري": 50, "سنوي": 500 } },
        "محلات تجارية": { "لايت": { "شهري": 10, "سنوي": 95 }, "فضية": { "شهري": 15, "سنوي": 150 }, "ذهبية": { "شهري": 20, "سنوي": 200 } },
        "مكتب جلب العمالة": { "لايت": { "شهري": 10, "سنوي": 95 }, "فضية": { "شهري": 15, "سنوي": 150 }, "ذهبية": { "شهري": 20, "سنوي": 200 } },
        "بوتيك نسائي": { "لايت": { "شهري": 7, "سنوي": 75 }, "فضية": { "شهري": 10, "سنوي": 95 }, "ذهبية": { "شهري": 15, "سنوي": 150 } },
    };

    document.getElementById('project').addEventListener('change', function () {
        const selected = this.value;
        const planSelect = document.getElementById('plan');
        planSelect.innerHTML = '<option value="">اختر الباقة</option>';

        if (prices[selected]) {
            Object.keys(prices[selected]).forEach(plan => {
                planSelect.innerHTML += `<option value="${plan}">${plan}</option>`;
            });
            planSelect.disabled = false;
        } else {
            planSelect.disabled = true;
        }

        document.getElementById('billing').disabled = true;
        document.getElementById('price').value = '';
    });

    document.getElementById('plan').addEventListener('change', function () {
        document.getElementById('billing').disabled = false;
        document.getElementById('price').value = '';
    });

    document.getElementById('billing').addEventListener('change', function () {
        const project = document.getElementById('project').value;
        const plan = document.getElementById('plan').value;
        const billing = this.value;

        if (prices[project] && prices[project][plan] && prices[project][plan][billing]) {
            document.getElementById('price').value = prices[project][plan][billing] + ' ريال';
        } else {
            document.getElementById('price').value = '';
        }
    });
</script>
@endsection
</div>