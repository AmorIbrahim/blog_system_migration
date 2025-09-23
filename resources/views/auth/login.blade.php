@extends('layouts.app')

@section('title', 'تسجيل الدخول')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg p-4" style="max-width: 450px; width: 100%; background: #1e1e1e; color: #fff; border-radius: 15px;">

        <!-- عنوان -->
        <h2 class="text-center text-warning fw-bold mb-4">🔑 تسجيل الدخول</h2>

        <!-- رسائل خطأ -->
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- فورم تسجيل الدخول -->
        <form action="{{ route('login') }}" method="POST">
            @csrf

            <!-- الإيميل -->
            <div class="mb-3">
                <label for="email" class="form-label">البريد الإلكتروني</label>
                <input type="email" name="email" class="form-control bg-dark text-light border-secondary" id="email" value="{{ old('email') }}" required>
            </div>

            <!-- الباسورد -->
            <div class="mb-3">
                <label for="password" class="form-label">كلمة المرور</label>
                <input type="password" name="password" class="form-control bg-dark text-light border-secondary" id="password" required>
            </div>

            <!-- تذكرني -->
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">تذكرني</label>
            </div>

            <!-- زرار الدخول -->
            <div class="d-grid">
                <button type="submit" class="btn btn-warning fw-bold">دخول</button>
            </div>
        </form>

        <!-- رابط التسجيل -->
        <div class="text-center mt-3">
            <p class="mb-0">لسه ماعندكش حساب؟
                <a href="{{ route('register.form') }}" class="text-warning fw-bold">سجل الآن</a>
            </p>
        </div>
    </div>
</div>
@endsection
