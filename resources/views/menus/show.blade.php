
@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">Detail Menu</h2>
            <p class="text-muted">Informasi lengkap menu restoran dan cafe.</p>
        </div>

        <a href="{{ route('menus.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="row g-0">

            <div class="col-md-5">
                @if($menu->foto)
                    <img src="{{ asset('storage/' . $menu->foto) }}"
                         class="img-fluid rounded-start w-100"
                         style="height: 100%; min-height: 300px; object-fit: cover;"
                         alt="{{ $menu->nama_menu }}">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center h-100"
                         style="min-height: 300px;">
                        <span class="text-muted">Tidak ada foto menu</span>
                    </div>
                @endif
            </div>

            <div class="col-md-7">
                <div class="card-body p-4">

                    <h3 class="fw-bold">{{ $menu->nama_menu }}</h3>

                    <p class="text-muted mb-3">
                        Kategori: {{ $menu->category->nama_kategori ?? '-' }}
                    </p>

                    <h4 class="text-danger fw-bold mb-4">
                        Rp {{ number_format($menu->harga, 0, ',', '.') }}
                    </h4>

                    <hr>

                    <h6 class="fw-bold">Deskripsi Menu</h6>
                    <p>{{ $menu->deskripsi ?: 'Belum ada deskripsi.' }}</p>

                    <h6 class="fw-bold mt-3">Status Halal</h6>
                    @if($menu->status_halal)
                        <span class="badge bg-success">Halal</span>
                    @else
                        <span class="badge bg-secondary">Belum diketahui</span>
                    @endif

                    <h6 class="fw-bold mt-3">Informasi Alergen</h6>
                    <p>{{ $menu->informasi_alergen ?: 'Tidak ada informasi alergen.' }}</p>

                    <div class="mt-4">
                        <a href="{{ route('menus.edit', $menu->id) }}"
                           class="btn btn-warning">
                            Edit Menu
                        </a>

                        <a href="{{ route('menus.index') }}"
                           class="btn btn-secondary">
                            Kembali ke Daftar
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection
