
@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="mb-4">
        <h2 class="fw-bold">Tambah Menu Baru</h2>
        <p class="text-muted">Masukkan informasi menu restoran dan cafe.</p>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('menus.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Menu</label>
                    <input type="text"
                           name="nama_menu"
                           class="form-control"
                           value="{{ old('nama_menu') }}"
                           placeholder="Contoh: Nasi Goreng Spesial">

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
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                              rows="3"
                              placeholder="Jelaskan menu yang ditawarkan">{{ old('deskripsi') }}</textarea>

                    @error('deskripsi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga (Rp)</label>
                    <input type="number"
                           name="harga"
                           class="form-control"
                           value="{{ old('harga') }}"
                           min="0"
                           placeholder="Contoh: 25000">

                    @error('harga')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Status Halal</label>
                    <select name="status_halal" class="form-select">
                        <option value="">-- Pilih Status --</option>
                        <option value="1" {{ old('status_halal') === '1' ? 'selected' : '' }}>
                            Halal
                        </option>
                        <option value="0" {{ old('status_halal') === '0' ? 'selected' : '' }}>
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
                              rows="2"
                              placeholder="Contoh: Mengandung susu dan kacang">{{ old('informasi_alergen') }}</textarea>

                    @error('informasi_alergen')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label">Foto Menu</label>
                    <input type="file"
                           name="foto"
                           class="form-control"
                           accept=".jpg,.jpeg,.png,.webp">

                    <small class="text-muted">
                        Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                    </small>

                    @error('foto')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-danger">
                        Simpan Menu
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
