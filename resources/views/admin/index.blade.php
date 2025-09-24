@extends('layouts.dashboard')

@section('content')
<div class="tab-content">

    {{-- المستخدمين --}}
    <div class="tab-pane fade show active" id="users">
        <div class="card bg-dark text-white shadow-lg rounded-4 mb-4">
            <div class="card-header text-dark fw-bold d-flex justify-content-between align-items-center"
                style="background-color:#2c5364;">
                👥 قائمة المستخدمين
                <span class="badge bg-dark text-white px-3 py-2">عدد المستخدمين: {{ $users->total() }}</span>
            </div>

            <div class="card-body p-0">
                <table class="table table-dark table-striped table-hover mb-0 text-center align-middle">
                    <thead style="background-color:#a7cbd9; color:#2c5364;">
                        <tr>
                            <th>#</th>
                            {{-- <th>ID</th> --}}
                            <th>الاسم</th>
                            <th>البريد الإلكتروني</th>
                            <th>إجراءات</th>
                        </tr>
                    </thead>
                    <tbody id="users-table">
                        @include('partials.users', ['users' => $users])
                    </tbody>
                </table>

                @if($users->hasMorePages())
                <div class="text-center my-3">
                    <button id="loadMoreUsers" class="btn btn-info" data-page="2" data-type="users">تحميل المزيد</button>
                </div>
                @endif
            </div>
        </div>
    </div>

    {{-- المقالات --}}
    <div class="tab-pane fade" id="articles">
        <div class="card bg-dark text-white shadow-lg rounded-4 mb-4">
            <div class="card-header text-dark fw-bold d-flex justify-content-between align-items-center"
                style="background-color:#2c5364;">
                📰 قائمة المقالات
            </div>
            <div class="card-body p-0">
                <table class="table table-dark table-striped table-hover mb-0 text-center align-middle">
                    <thead class=" text-dark">
                        <tr>
                            <th>#</th>
                            {{-- <th>ID</th> --}}
                            <th>العنوان</th>
                            <th>الكاتب</th>
                            <th>تاريخ النشر</th>
                            <th>إجراءات</th>
                        </tr>
                    </thead>
                    <tbody id="posts-table">
                        @include('partials.posts', ['posts' => $posts])
                    </tbody>
                </table>

                @if($posts->hasMorePages())
                <div class="text-center my-3">
                    <button id="loadMorePosts" class="btn btn-info" data-page="2" data-type="posts">تحميل المزيد</button>
                </div>
                @endif
            </div>
        </div>
    </div>

</div>
@endsection
