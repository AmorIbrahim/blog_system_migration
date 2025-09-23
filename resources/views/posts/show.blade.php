@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card bg-dark text-white shadow-lg border-0 rounded-4">

        @if($post->image)
            <img src="{{ asset('storage/' . $post->image) }}"
                 class="card-img-top rounded-top-4"
                 alt="صورة المقال"
                 style="max-height:400px; object-fit:cover;">
        @endif

        <div class="card-body">
            <h1 class="card-title mb-2 text-info">{{ $post->Title }}</h1>
            <p class="text-warning mb-3">✍️ بواسطة: {{ $post->user->name ?? 'كاتب مجهول' }}</p>
            <p class="text-secondary mb-3">🕒 {{ $post->created_at->diffForHumans() }}</p>
            <hr class="border-secondary">
            <p class="card-text fs-5 text-light">{{ $post->Content }}</p>
        </div>

        <div class="card-footer text-center bg-dark border-0">
            <a href="{{ route('home') }}" class="btn btn-outline-info rounded-pill">
                ⬅️ العودة لجميع المقالات
            </a>
        </div>
    </div>
</div>
@endsection
