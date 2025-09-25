@extends('layouts.app')

@section('title', 'تسجيل حساب جديد')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg p-4" style="max-width: 500px; width: 100%; background: #1e1e1e; color: #fff; border-radius: 15px;">

        <h2 class="text-center text-warning fw-bold mb-4">✍️ إنشاء حساب جديد</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">الاسم الكامل</label>
                <input type="text" name="name" class="form-control bg-dark text-light border-secondary" id="name" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">رقم الهاتف</label>
                <input type="text" name="phone" class="form-control bg-dark text-light border-secondary" id="phone" value="{{ old('phone') }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">البريد الإلكتروني</label>
                <input type="email" name="email" class="form-control bg-dark text-light border-secondary" id="email" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">كلمة المرور</label>
                <input type="password" name="password" class="form-control bg-dark text-light border-secondary" id="password" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">تأكيد كلمة المرور</label>
                <input type="password" name="password_confirmation" class="form-control bg-dark text-light border-secondary" id="password_confirmation" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-warning fw-bold">إنشاء حساب</button>
            </div>
        </form>

        <div class="text-center mt-3">
            <p class="mb-0">عندك حساب بالفعل؟
                <a href="{{ route('login.form') }}" class="text-warning fw-bold">تسجيل الدخول</a>
            </p>
        </div>
    </div>
</div>
@endsection
