@extends('layouts.app')

@section('title', 'الصفحة الرئيسية')

@section('content')
<section class="hero d-flex flex-column justify-content-center align-items-center text-center" style="height:100vh;">
    <h1 class="fw-bold display-4">
        <span id="typing-text" class="text-warning"></span>
        <span class="cursor">|</span>
    </h1>
    <p class="lead mt-3">منصة رائعة لقراءة وكتابة المقالات الملهمة 🚀</p>
    <div class="mt-4">
        <a href="{{ route('register.form') }}" class="btn btn-warning btn-lg me-2 rounded-pill">ابدأ الآن</a>
        <a href="{{ route('login.form') }}" class="btn btn-outline-light btn-lg rounded-pill">تسجيل الدخول</a>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const text = "أهلاً بك في مدونتي";
        const typingElement = document.getElementById("typing-text");
        const cursor = document.querySelector(".cursor");

        let index = 0;
        function type() {
            if (index < text.length) {
                typingElement.textContent += text.charAt(index);
                index++;
                setTimeout(type, 150);
            } else {
                cursor.style.display = "none"; 
            }
        }
        type();
    });
</script>

<style>
    .cursor {
        display: inline-block;
        margin-left: 2px;
        animation: blink 0.8s infinite;
        color: #ffc107;
        font-weight: bold;
    }

    @keyframes blink {
        0%, 50% { opacity: 1; }
        50.1%, 100% { opacity: 0; }
    }
</style>
@endsection
