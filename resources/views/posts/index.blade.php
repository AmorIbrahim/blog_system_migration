@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-5 fw-bold display-5 text-info">📰 جميع المقالات</h1>
    <div class="row g-4">
        @foreach($posts as $post)
        <div class="col-md-4">
            <div class="card bg-dark text-light h-100 shadow-lg border-0 rounded-4 transform-hover overflow-hidden">

                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}"
                        class="card-img-top"
                        alt="صورة المقال"
                        style="height: 220px; object-fit: cover;">
                @else
                    <div class="d-flex align-items-center justify-content-center bg-secondary"
                         style="height: 220px;">
                        <span class="text-muted"><i class="fa-solid fa-image fa-2x"></i></span>
                    </div>
                @endif

                <div class="card-body d-flex flex-column p-4">
                    <h5 class="card-title text-info fw-bold mb-2">{{ $post->Title }}</h5>
                    <p class="card-text text-secondary small mb-3">
                        {{ Str::limit($post->Content, 120) }}
                    </p>

                    <div class="d-flex justify-content-between align-items-center mt-auto">
    <a href="{{ route('posts.show', $post->id) }}"
       class="btn btn-info text-white fw-semibold rounded-pill px-3">
        قراءة المزيد <i class="fa-solid fa-arrow-right ms-1"></i>
    </a>

    @if(Auth::check() && (Auth::id() === $post->user_id || Auth::user()->type ==='admin'))
        <div class="d-flex align-items-center gap-2">
            {{-- زرار التعديل --}}
            <a href="{{ route('posts.edit', $post->id) }}"
               class="btn btn-sm btn-outline-warning rounded-circle d-flex align-items-center justify-content-center"
               style="width: 38px; height: 38px;">
                <i class="fa-solid fa-pen"></i>
            </a>

            {{-- زرار الحذف --}}
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                  onsubmit="return confirm('هل أنت متأكد أنك تريد حذف هذا المقال؟')">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="btn btn-sm btn-outline-danger rounded-circle d-flex align-items-center justify-content-center"
                        style="width: 38px; height: 38px;">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </form>
        </div>
    @endif
</div>

                </div>

                {{-- الفوتر --}}
                {{-- <div class="card-footer bg-dark text-muted border-0 small px-4 d-flex justify-content-between">
                    <span>👤 {{ $post->user->name ?? 'مجهول' }}</span>
                    <span>⏰ {{ $post->created_at->diffForHumans() }}</span>
                </div> --}}
                <div class="card-footer bg-dark border-0 small px-4 d-flex justify-content-between">
                    <span class="text-info">
                        <i class="fa-solid fa-user me-1"></i> {{ $post->user->name ?? 'مجهول' }}
                    </span>
                    <span class="text-secondary">
                        <i class="fa-regular fa-clock me-1"></i> {{ $post->created_at->diffForHumans() }}
                    </span>
                </div>

            </div>
        </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    {{-- <div class="d-flex justify-content-center mt-5">
        {{ $posts->links() }}
    </div> --}}
</div>
@endsection

@push('styles')
<style>
    .transform-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .transform-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(13, 202, 240, 0.35);
    }
</style>
@endpush
