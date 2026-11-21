
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Meja & Area - CafeKu</title>

    <style>
        :root {
            --dark-teal: #183d3b;
            --teal: #2c5b56;
            --primary: #227b72;
            --orange: #f3b56e;
            --background: #f5f7f8;
            --danger: #be5353;
            --success-bg: #eaf6ee;
            --white: #ffffff;
            --text: #263238;
            --muted: #89949a;
            --border: #e5e9eb;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: var(--background);
            color: var(--text);
            min-height: 100vh;
        }

        /* LAYOUT UTAMA */
        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: 260px;
            background: var(--dark-teal);
            color: var(--white);
            display: flex;
            flex-direction: column;
            padding: 28px 18px;
            flex-shrink: 0;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 10px;
            margin-bottom: 48px;
        }

        .brand-logo {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: var(--orange);
            color: var(--dark-teal);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 25px;
            font-weight: bold;
        }

        .brand-name {
            font-size: 21px;
            font-weight: bold;
        }

        .brand-subtitle {
            font-size: 11px;
            color: #b7ceca;
            margin-top: 3px;
        }

        .menu-label {
            color: #9ebbb5;
            font-size: 10px;
            font-weight: bold;
            letter-spacing: 2px;
            margin: 0 14px 17px;
        }

        .menu-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 15px 14px;
            border-radius: 10px;
            color: #e0eeeb;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
            background: var(--teal);
        }

        .menu-icon {
            font-size: 17px;
        }

        .sidebar-footer {
            margin-top: auto;
            border-top: 1px solid rgba(255,255,255,0.15);
            padding: 24px 12px 8px;
            color: #a9c1bd;
            font-size: 11px;
        }

        /* AREA KONTEN */
        .main {
            flex: 1;
            min-width: 0;
        }

        .topbar {
            height: 75px;
            background: var(--white);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 45px;
        }

        .breadcrumb {
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 1.3px;
            color: var(--muted);
        }

        .admin-label {
            background: var(--success-bg);
            color: var(--teal);
            padding: 10px 15px;
            border-radius: 25px;
            font-size: 11px;
            font-weight: bold;
        }

        .content {
            padding: 48px 45px 30px;
            min-height: calc(100vh - 75px);
            display: flex;
            flex-direction: column;
        }

        /* JUDUL HALAMAN */
        .page-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 35px;
        }

        .section-label {
            color: var(--teal);
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 2px;
            margin-bottom: 13px;
        }

        h1 {
            font-size: 30px;
            margin-bottom: 10px;
            color: var(--text);
        }

        .subtitle {
            font-size: 14px;
            color: var(--muted);
            line-height: 1.5;
        }

        /* TOMBOL */
        .btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 6px;
            padding: 12px 17px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 13px;
            font-weight: bold;
            transition: 0.2s;
        }

        .btn-add {
            background: var(--primary);
            color: var(--white);
            white-space: nowrap;
        }

        .btn-add:hover {
            background: var(--teal);
        }

        .btn-edit {
            color: var(--primary);
            background: transparent;
            padding: 7px 9px;
        }

        .btn-edit:hover {
            background: var(--success-bg);
        }

        .btn-delete {
            color: var(--danger);
            background: transparent;
            padding: 7px 9px;
        }

        .btn-delete:hover {
            background: #fbeeee;
        }

        /* NOTIFIKASI */
        .alert {
            padding: 14px 17px;
            margin-bottom: 20px;
            border-radius: 8px;
            background: var(--success-bg);
            color: var(--teal);
            font-size: 13px;
        }

        /* CARD TABEL */
        .table-card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.025);
        }

        .table-card-header {
            padding: 25px 27px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .table-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 7px;
        }

        .table-count {
            font-size: 13px;
            color: var(--muted);
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 700px;
        }

        th {
            background: #f8faf9;
            color: var(--muted);
            font-size: 10px;
            font-weight: bold;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 17px 20px;
            text-align: left;
            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
        }

        td {
            padding: 19px 20px;
            font-size: 13px;
            border-bottom: 1px solid var(--border);
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr:hover {
            background: #fafcfc;
        }

        .number-cell {
            color: var(--muted);
        }

        .table-number {
            font-weight: bold;
            color: var(--text);
        }

        /* BADGE STATUS */
        .badge {
            display: inline-block;
            padding: 7px 11px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
        }

        .tersedia {
            background: var(--success-bg);
            color: var(--teal);
        }

        .digunakan {
            background: #fbeeee;
            color: var(--danger);
        }

        .reserved {
            background: #fff3e3;
            color: #a76c20;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .actions form {
            margin: 0;
        }

        .empty {
            text-align: center;
            padding: 35px;
            color: var(--muted);
        }

        /* FOOTER */
        .footer {
            margin-top: auto;
            padding-top: 35px;
            color: var(--muted);
            font-size: 11px;
        }

        /* RESPONSIVE */
        @media (max-width: 900px) {
            .sidebar {
                width: 220px;
            }

            .topbar {
                padding: 0 25px;
            }

            .content {
                padding: 35px 25px 25px;
            }
        }

        @media (max-width: 650px) {
            .layout {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                padding: 18px;
            }

            .brand {
                margin-bottom: 20px;
            }

            .menu-label {
                margin-bottom: 10px;
            }

            .sidebar-footer {
                display: none;
            }

            .topbar {
                height: 60px;
                padding: 0 18px;
            }

            .content {
                padding: 28px 16px;
            }

            .page-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            h1 {
                font-size: 24px;
            }

            .table-card-header {
                align-items: flex-start;
                flex-direction: column;
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<div class="layout">

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="brand">
            <div class="brand-logo">C</div>

            <div>
                <div class="brand-name">CafeKu</div>
                <div class="brand-subtitle">Manajemen Restoran</div>
            </div>
        </div>

        <div class="menu-label">MENU UTAMA</div>

        <a href="{{ route('meja.index') }}" class="menu-link">
            <span class="menu-icon">▦</span>
            Master Meja & Area
        </a>

        <div class="sidebar-footer">
            Restoran & Cafe
        </div>

    </aside>

    <!-- KONTEN UTAMA -->
    <main class="main">

        <!-- TOPBAR -->
        <header class="topbar">

            <div class="breadcrumb">
                ADMINISTRASI / Master Meja & Area
            </div>

            <div class="admin-label">
                ● ADMINISTRASI
            </div>

        </header>

        <div class="content">

            <!-- JUDUL HALAMAN -->
            <div class="page-heading">

                <div>
                    <div class="section-label">
                        PENGELOLAAN DATA
                    </div>

                    <h1>Master Meja & Area</h1>

                    <p class="subtitle">
                        Kelola dan perbarui data meja dan area restoran.
                    </p>
                </div>

                <a href="{{ route('meja.create') }}" class="btn btn-add">
                    + Tambah Data
                </a>

            </div>

            <!-- NOTIFIKASI SUKSES -->
            @if(session('success'))
                <div class="alert">
                    {{ session('success') }}
                </div>
            @endif

            <!-- TABEL DATA -->
            <div class="table-card">

                <div class="table-card-header">

                    <div>
                        <div class="table-title">
                            Daftar Meja
                        </div>

                        <div class="table-count">
                            {{ $mejas->count() }} data ditemukan
                        </div>
                    </div>

                </div>

                <div class="table-wrapper">

                    <table>
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nomor Meja</th>
                                <th>Kapasitas</th>
                                <th>Area</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($mejas as $meja)

                                <tr>

                                    <td class="number-cell">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="table-number">
                                        {{ $meja->nomor_meja }}
                                    </td>

                                    <td>
                                        {{ $meja->kapasitas }} Orang
                                    </td>

                                    <td>
                                        {{ $meja->area }}
                                    </td>

                                    <td>
                                        <span class="badge {{ strtolower($meja->status) }}">
                                            {{ $meja->status }}
                                        </span>
                                    </td>

                                    <td>
                                        <div class="actions">

                                            <a href="{{ route('meja.edit', $meja->id) }}"
                                               class="btn btn-edit">
                                                Edit
                                            </a>

                                            <form action="{{ route('meja.destroy', $meja->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Yakin ingin menghapus meja ini?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-delete">
                                                    Hapus
                                                </button>

                                            </form>

                                        </div>
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="6" class="empty">
                                        Belum ada data meja.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>
                    </table>

                </div>
            </div>

            <!-- FOOTER -->
            <footer class="footer">
                CafeKu Restoran & Cafe
            </footer>

        </div>

    </main>

</div>

</body>
</html>
