
@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="mb-4">
        <h2 class="fw-bold">Edit Menu</h2>
        <p class="text-muted">Perbarui informasi menu restoran dan cafe.</p>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('menus.update', $menu->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Menu</label>
                    <input type="text"
                           name="nama_menu"
                           class="form-control"
                           value="{{ old('nama_menu', $menu->nama_menu) }}">

                    @error('nama_menu')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="category_id" class="form-select">
                        <option value="">-- Pilih Kategori --</option>

                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $menu->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->nama_kategori }}
                            </option>
                        @endforeach
                    </select>

                    @error('category_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi Menu</label>
                    <textarea name="deskripsi"
                              class="form-control"
                              rows="3">{{ old('deskripsi', $menu->deskripsi) }}</textarea>

                    @error('deskripsi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga (Rp)</label>
                    <input type="number"
                           name="harga"
                           class="form-control"
                           min="0"
                           value="{{ old('harga', $menu->harga) }}">

                    @error('harga')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Status Halal</label>
                    <select name="status_halal" class="form-select">
                        <option value="1"
                            {{ (string) old('status_halal', (int) $menu->status_halal) === '1' ? 'selected' : '' }}>
                            Halal
                        </option>

                        <option value="0"
                            {{ (string) old('status_halal', (int) $menu->status_halal) === '0' ? 'selected' : '' }}>
                            Belum diketahui
                        </option>
                    </select>

                    @error('status_halal')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Informasi Alergen</label>
                    <textarea name="informasi_alergen"
                              class="form-control"
                              rows="2">{{ old('informasi_alergen', $menu->informasi_alergen) }}</textarea>

                    @error('informasi_alergen')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto Menu Saat Ini</label>
                    <div>
                        @if($menu->foto)
                            <img src="{{ asset('storage/' . $menu->foto) }}"
                                 width="150"
                                 class="rounded mb-2"
                                 alt="Foto {{ $menu->nama_menu }}">
                        @else
                            <p class="text-muted">Belum ada foto menu.</p>
                        @endif
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Ganti Foto Menu (Opsional)</label>
                    <input type="file"
                           name="foto"
                           class="form-control"
                           accept=".jpg,.jpeg,.png,.webp">

                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti foto. Maksimal 2 MB.
                    </small>

                    @error('foto')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-danger">
                        Simpan Perubahan
                    </button>

                    <a href="{{ route('menus.index') }}"
                       class="btn btn-secondary">
                        Kembali
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
