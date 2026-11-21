@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Daftar Kategori</h3>

    <a href="{{ route('categories.create') }}"
       class="btn btn-success"
       style="background-color: #227b72; border-color: #227b72; color: #fff;">
        + Tambah Kategori
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <table class="table table-bordered table-striped">
            <thead style="background-color: #183d3b; color: #ffffff;">
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Deskripsi</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td>{{ $categories->firstItem() + $loop->index }}</td>
                        <td>{{ $category->nama_kategori }}</td>
                        <td>{{ $category->deskripsi ?? '-' }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}"
                               class="btn btn-warning btn-sm"
                               style="background-color: #227b72; border-color: #227b72; color: #fff;">
                                Edit
                            </a>

                            <form action="{{ route('categories.destroy', $category->id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm"
                                        style="background-color: #be5353; border-color: #be5353; color: #fff;">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">
                            Belum ada kategori.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $categories->links() }}

    </div>
</div>

@endsection