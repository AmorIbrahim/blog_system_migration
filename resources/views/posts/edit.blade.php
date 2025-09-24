@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center text-warning">✏️ تعديل المقال</h1>

    <div class="card bg-dark text-white shadow-lg rounded-4">
        <div class="card-body">
            <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="Title" class="form-label">عنوان المقال</label>
                    <input type="text" name="Title" id="Title"
                           class="form-control bg-dark text-white border-info"
                           value="{{ old('Title', $post->Title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="Content" class="form-label">محتوى المقال</label>
                    <textarea name="Content" id="Content" rows="5"
                              class="form-control bg-dark text-white border-info"
                              required>{{ old('Content', $post->Content) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">صورة المقال (اختياري)</label>
                    <input type="file" name="image" id="image" class="form-control bg-dark text-white border-info">

                    @if($post->image)
                        <div class="mt-2">
                            <p class="text-muted">الصورة الحالية:</p>
                            <img src="{{ asset('storage/' . $post->image) }}"
                                 alt="صورة المقال" class="img-fluid rounded shadow" style="max-height: 200px;">
                        </div>
                    @endif
                </div>

                <button type="submit" class="btn btn-warning">💾 حفظ التعديلات</button>
                <a href="{{ route('home') }}" class="btn btn-secondary">⬅️ رجوع</a>
            </form>
        </div>
    </div>
</div>
@endsection
