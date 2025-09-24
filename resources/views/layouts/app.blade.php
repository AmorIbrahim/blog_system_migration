<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'مدونتي')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
            font-family: 'Cairo', sans-serif;
            color: #fff;
            overflow-x: hidden;
        }

        .background {
            position: fixed;
            width: 100%;
            height: 100%;
            background: linear-gradient(-45deg, #0f2027, #203a43, #2c5364, #1c1c1c);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            z-index: -1;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        main {
            flex: 1;
        }

        footer {
            background: rgba(0,0,0,0.6);
            padding: 15px;
            text-align: center;
        }
    </style>
</head>


<body>

    <div class="background"></div>

    @include('partials.header')

    <main class="container-fluid p-0">
        @yield('content')
    </main>

    @include('partials.footer')

    @if(session('success') || session('error'))
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999">
        <div id="toastMessage" class="toast align-items-center text-white
            {{ session('success') ? 'bg-success' : 'bg-danger' }} border-0" role="alert">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('success') ?? session('error') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>
    @endif
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var toastEl = document.getElementById('toastMessage');
            if (toastEl) {
                var toast = new bootstrap.Toast(toastEl, { delay: 3000 });
                toast.show();
            }
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
