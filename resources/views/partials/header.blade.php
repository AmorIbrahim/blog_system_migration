    <nav class="navbar navbar-expand-lg navbar-dark sticky-top glass-navbar">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">مدونتي 📝</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">


                    @auth
                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                تسجيل الخروج
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                        </li>
                        @if(auth()->user()->type === 'admin')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active fw-bold text-warning' : '' }}"
                                    href="{{ route('dashboard') }}">
                                    ⚡ لوحة التحكم
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('posts.create') ? 'active fw-bold text-info' : '' }}"
                                href="{{ route('posts.create') }}">
                                📝 إضافة مقال
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home') ? 'active fw-bold text-info' : '' }}"
                            href="{{ route('home') }}">
                                🏠 الرئيسية
                            </a>
                        </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('login.form') ? 'active fw-bold text-info' : '' }}"
                            href="{{ route('login.form') }}">
                            🔑 تسجيل الدخول
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('register.form') ? 'active fw-bold text-info' : '' }}"
                            href="{{ route('register.form') }}">
                            🆕 تسجيل جديد
                        </a>
                    </li>
                    @endauth

                </ul>
            </div>
        </div>
    </nav>

    <!-- CSS -->
    <style>
    .glass-navbar {
        background: rgba(0, 0, 0, 0.4);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        transition: background 0.3s ease-in-out;
    }

    .glass-navbar:hover {
        background: rgba(0, 0, 0, 0.6);
    }

    .nav-link.active {
        color: #0dcaf0 !important;
    }
    </style>
