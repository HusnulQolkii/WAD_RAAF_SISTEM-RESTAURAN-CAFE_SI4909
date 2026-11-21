
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Meja - CafeKu</title>

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

        .sidebar-footer {
            margin-top: auto;
            border-top: 1px solid rgba(255,255,255,0.15);
            padding: 24px 12px 8px;
            color: #a9c1bd;
            font-size: 11px;
        }

        /* MAIN CONTENT */
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

        /* PAGE HEADING */
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

        /* FORM CARD */
        .form-card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 30px;
            margin-top: 30px;
            max-width: 850px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.025);
        }

        .form-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .form-description {
            color: var(--muted);
            font-size: 13px;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 21px;
        }

        label {
            display: block;
            margin-bottom: 9px;
            font-size: 13px;
            font-weight: bold;
            color: var(--text);
        }

        .required {
            color: var(--danger);
        }

        input, select {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: var(--white);
            color: var(--text);
            font-size: 13px;
            outline: none;
            transition: 0.2s;
        }

        input:focus, select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(34,123,114,0.10);
        }

        input::placeholder {
            color: #adb5b9;
        }

        .error {
            color: var(--danger);
            font-size: 12px;
            margin-top: 7px;
        }

        .input-error {
            border-color: var(--danger);
        }

        /* FORM ACTIONS */
        .form-actions {
            display: flex;
            gap: 10px;
            margin-top: 30px;
            padding-top: 23px;
            border-top: 1px solid var(--border);
        }

        .btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 7px;
            padding: 12px 19px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 13px;
            font-weight: bold;
            transition: 0.2s;
        }

        .btn-save {
            background: var(--primary);
            color: var(--white);
        }

        .btn-save:hover {
            background: var(--teal);
        }

        .btn-back {
            background: #eef1f2;
            color: #56636a;
        }

        .btn-back:hover {
            background: #e1e7e8;
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

            h1 {
                font-size: 24px;
            }

            .form-card {
                padding: 21px;
            }

            .form-actions {
                flex-direction: column;
            }

            .form-actions .btn {
                width: 100%;
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
            <span>▦</span>
            Master Meja & Area
        </a>

        <div class="sidebar-footer">
            Restoran & Cafe
        </div>

    </aside>

    <!-- MAIN CONTENT -->
    <main class="main">

        <header class="topbar">

            <div class="breadcrumb">
                ADMINISTRASI / Master Meja & Area / Tambah Meja
            </div>

            <div class="admin-label">
                ● ADMINISTRASI
            </div>

        </header>

        <div class="content">

            <!-- PAGE HEADING -->
            <div>
                <div class="section-label">
                    PENGELOLAAN DATA
                </div>

                <h1>Tambah Meja</h1>

                <p class="subtitle">
                    Tambahkan informasi meja baru ke dalam sistem restoran.
                </p>
            </div>

            <!-- FORM CARD -->
            <div class="form-card">

                <div class="form-title">
                    Formulir Data Meja
                </div>

                <p class="form-description">
                    Lengkapi informasi berikut untuk menambahkan meja baru.
                </p>

                <form action="{{ route('meja.store') }}" method="POST">
                    @csrf

                    <!-- NOMOR MEJA -->
                    <div class="form-group">

                        <label for="nomor_meja">
                            Nomor Meja <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            id="nomor_meja"
                            name="nomor_meja"
                            value="{{ old('nomor_meja') }}"
                            placeholder="Contoh: M01"
                            maxlength="20"
                            class="@error('nomor_meja') input-error @enderror"
                            required
                        >

                        @error('nomor_meja')
                            <div class="error">{{ $message }}</div>
                        @enderror

                    </div>

                    <!-- KAPASITAS -->
                    <div class="form-group">

                        <label for="kapasitas">
                            Kapasitas <span class="required">*</span>
                        </label>

                        <select
                            id="kapasitas"
                            name="kapasitas"
                            class="@error('kapasitas') input-error @enderror"
                            required
                        >
                            <option value="">Pilih kapasitas</option>

                            <option value="2" {{ old('kapasitas') == '2' ? 'selected' : '' }}>
                                2 Orang
                            </option>

                            <option value="4" {{ old('kapasitas') == '4' ? 'selected' : '' }}>
                                4 Orang
                            </option>

                            <option value="8" {{ old('kapasitas') == '8' ? 'selected' : '' }}>
                                8 Orang
                            </option>

                        </select>

                        @error('kapasitas')
                            <div class="error">{{ $message }}</div>
                        @enderror

                    </div>

                    <!-- AREA -->
                    <div class="form-group">

                        <label for="area">
                            Area <span class="required">*</span>
                        </label>

                        <select
                            id="area"
                            name="area"
                            class="@error('area') input-error @enderror"
                            required
                        >
                            <option value="">Pilih area</option>

                            <option value="Indoor" {{ old('area') == 'Indoor' ? 'selected' : '' }}>
                                Indoor
                            </option>

                            <option value="VIP" {{ old('area') == 'VIP' ? 'selected' : '' }}>
                                VIP
                            </option>

                        </select>

                        @error('area')
                            <div class="error">{{ $message }}</div>
                        @enderror

                    </div>

                    <!-- STATUS -->
                    <div class="form-group">

                        <label for="status">
                            Status <span class="required">*</span>
                        </label>

                        <select
                            id="status"
                            name="status"
                            class="@error('status') input-error @enderror"
                            required
                        >
                            <option value="">Pilih status</option>

                            <option value="Tersedia" {{ old('status') == 'Tersedia' ? 'selected' : '' }}>
                                Tersedia
                            </option>

                            <option value="Digunakan" {{ old('status') == 'Digunakan' ? 'selected' : '' }}>
                                Digunakan
                            </option>

                            <option value="Reserved" {{ old('status') == 'Reserved' ? 'selected' : '' }}>
                                Reserved
                            </option>

                        </select>

                        @error('status')
                            <div class="error">{{ $message }}</div>
                        @enderror

                    </div>

                    <!-- BUTTONS -->
                    <div class="form-actions">

                        <button type="submit" class="btn btn-save">
                            Simpan Meja
                        </button>

                        <a href="{{ route('meja.index') }}" class="btn btn-back">
                            Kembali
                        </a>

                    </div>

                </form>

            </div>

            <footer class="footer">
                CafeKu Restoran & Cafe
            </footer>

        </div>

    </main>

</div>

</body>
</html>
