<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Portal Berita')</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
</head>
<body>

    <nav class="navbar navbar-dark bg-dark mb-5">
    <div class="container">

        {{-- Logo dan Home --}}
        <a href="/home" class="navbar-brand d-flex align-items-center">
            <img src="{{ asset('gambar/logo_Esemkada.png') }}"
                 alt="Logo Portal Berita"
                 width="45"
                 height="45"
                 class="me-2"
                 style="object-fit: contain;">

            <span>Portal Berita</span>
        </a>

        @if(session()->has('key'))
            <div class="float-end">
                <a href="{{ route('berita.index') }}" class="btn btn-outline-secondary">
                    Kelola
                </a>

                <a href="/logout" class="btn btn-outline-secondary">
                    Logout
                </a>
            </div>
        @else
            <a href="/login" class="btn btn-outline-secondary">
                Login
            </a>
        @endif

    </div>
</nav>

<div class="container">
    @yield('content')
</div>

<footer class="text-body-secondary py-5">
    <div class="container">
        <p class="float-end mb-1">
            &copy; 2026 | Kiara Safa Azzahra
        </p>
    </div>
</footer>

</body>
</html>