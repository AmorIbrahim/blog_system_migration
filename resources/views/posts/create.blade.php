@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">إضافة مقال جديد</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="Title" class="form-label">عنوان المقال</label>
            <input type="text" name="Title" class="form-control" id="Title" required>
        </div>

        <div class="mb-3">
            <label for="Content" class="form-label">محتوى المقال</label>
            <textarea name="Content" class="form-control" id="Content" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">صورة المقال (اختياري)</label>
            <input type="file" name="image" class="form-control" id="image" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">إضافة المقال</button>
    </form>
</div>
@endsection
