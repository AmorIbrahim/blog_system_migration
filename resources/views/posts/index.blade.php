@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4 display-5 text-info">📰 جميع المقالات</h1>
    <div class="row g-4">
        @foreach($posts as $post)
        <div class="col-md-4">
            <div class="card text-white bg-dark h-100 shadow-sm border-0 rounded-4 transform-hover">

                 @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}"
                        class="card-img-top rounded-top-4"
                        alt="صورة المقال"
                        style="max-height:400px; object-fit:cover;">
                @endif

                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-info">{{ $post->Title }}</h5>
                    <p class="card-text text-secondary">{{ Str::limit($post->Content, 100) }}</p>

                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-info mt-auto">
                        قراءة المزيد
                    </a>
                </div>

                <div class="card-footer bg-dark text-secondary border-0">
                    {{ $post->created_at->diffForHumans() }}
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Pagination لو محتاج --}}
    {{-- <div class="d-flex justify-content-center mt-4">
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
        box-shadow: 0 12px 25px rgba(13, 202, 240, 0.4); 
    }
</style>
@endpush
