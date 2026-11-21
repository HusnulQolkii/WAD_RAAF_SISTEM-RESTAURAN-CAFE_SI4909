<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') - Restoran Cafe</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Background halaman: #f5f7f8 */
        body.bg-light {
            background-color: #f5f7f8 !important;
        }

        /* Navbar: sidebar admin #183d3b */
        .navbar.bg-danger {
            background-color: #183d3b !important;
        }

        /* Logo C: #f3b56e */
        .navbar-brand .logo-c {
            color: #f3b56e;
            font-weight: 700;
        }

        /* Alert sukses: #eaf6ee */
        .alert.alert-success {
            background-color: #eaf6ee;
            border-color: #c9e8d4;
            color: #1e5c3a;
        }

        /* Alert error: tombol hapus #be5353 */
        .alert.alert-danger {
            background-color: #fbe9e9;
            border-color: #f0c2c2;
            color: #8a2d2d;
        }
    </style>
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-danger">
        <div class="container">
            <a class="navbar-brand" href="{{ route('categories.index') }}">
                Restoran <span class="logo-c">C</span>afe
            </a>
        </div>
    </nav>

    <main class="container py-4">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')

    </main>

</body>
</html>