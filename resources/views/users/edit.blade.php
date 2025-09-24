@extends('layouts.dashboard')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center text-warning">✏️ تعديل بيانات المستخدم</h1>

    <div class="card bg-dark text-white shadow-lg rounded-4">
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">الاسم</label>
                    <input type="text" name="name" id="name"
                           class="form-control bg-dark text-white border-info"
                           value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">البريد الإلكتروني</label>
                    <input type="email" name="email" id="email"
                           class="form-control bg-dark text-white border-info"
                           value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">كلمة المرور (اختياري)</label>
                    <input type="password" name="password" id="password"
                           class="form-control bg-dark text-white border-info">
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">تأكيد كلمة المرور</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                           class="form-control bg-dark text-white border-info">
                </div>

                <button type="submit" class="btn btn-warning">💾 حفظ التعديلات</button>
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">⬅️ رجوع</a>
            </form>
        </div>
    </div>
</div>
@endsection
