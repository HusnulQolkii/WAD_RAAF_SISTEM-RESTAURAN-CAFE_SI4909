@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')

<h3 class="mb-3">Tambah Kategori</h3>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Kategori</label>

                <input type="text"
                       name="nama_kategori"
                       class="form-control"
                       value="{{ old('nama_kategori') }}"
                       required>

                @error('nama_kategori')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>

                <textarea name="deskripsi"
                          class="form-control"
                          rows="3">{{ old('deskripsi') }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">
                Simpan
            </button>

            <a href="{{ route('categories.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>
        </form>

    </div>
</div>

@endsection