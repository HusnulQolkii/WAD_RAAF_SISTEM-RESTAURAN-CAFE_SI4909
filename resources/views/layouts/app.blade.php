<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $cfg['judul'] }} - CafeKu</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>

<div class="app">
    <aside class="sidebar">
        <div class="brand">
            <div class="brand-icon">C</div>
            <div>
                <strong>CafeKu</strong>
                <small>Manajemen Restoran</small>
            </div>
        </div>

        <div class="nav-label">MENU UTAMA</div>

        @foreach (config('cafeku.modul') as $key => $item)
            <a class="nav {{ $modul === $key ? 'selected' : '' }}"
               href="{{ route('cafe.index', $key) }}">
                {{ $item['ikon'] }}
                &nbsp;
                {{ $item['judul'] }}
            </a>
        @endforeach

        <div class="side-footer">
             Restoran & Cafe
            <br>
        </div>
    </aside>

    <main class="main">
        <div class="topbar">
            <span>ADMINISTRASI / {{ $cfg['judul'] }}</span>
            <span class="user-box">
                <span class="env">● {{ auth()->user()->name }}</span>
                <form method="post" action="{{ route('logout') }}" class="logout-form">
                    @csrf
                    <button type="submit" class="logout">Keluar</button>
                </form>
            </span>
        </div>

        <section class="content">
            @yield('content')
        </section>

        <footer class="footer">CafeKu Restoran & Cafe</footer>
    </main>
</div>

</body>
</html>
