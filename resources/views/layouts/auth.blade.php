<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - CafeKu</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body class="auth-body">
    <div class="auth-card">
        <div class="auth-brand">
            <div class="brand-icon">C</div>
            <div>
                <strong>CafeKu</strong>
                <small>Manajemen Restoran</small>
            </div>
        </div>

        @yield('content')
    </div>
</body>
</html>
