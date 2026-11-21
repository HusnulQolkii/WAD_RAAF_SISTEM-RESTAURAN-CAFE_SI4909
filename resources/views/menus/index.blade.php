
@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">Data Buku Menu</h2>
            <p class="text-muted">Kelola daftar menu restoran dan cafe.</p>
        </div>

        <a href="{{ route('menus.create') }}" class="btn btn-danger">
            + Tambah Menu
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-danger">
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama Menu</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Status Halal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($menus as $menu)
                            <tr>
                                <td>{{ $loop->iteration + ($menus->currentPage() - 1) * $menus->perPage() }}</td>

                                <td>
                                    @if($menu->foto)
                                        <img src="{{ asset('storage/' . $menu->foto) }}"
                                             width="70"
                                             height="60"
                                             style="object-fit: cover;">
                                    @else
                                        <span class="text-muted">Tidak ada foto</span>
                                    @endif
                                </td>

                                <td>{{ $menu->nama_menu }}</td>

                                <td>{{ $menu->category->nama_kategori ?? '-' }}</td>

                                <td>Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>

                                <td>
                                    @if($menu->status_halal)
                                        <span class="badge bg-success">Halal</span>
                                    @else
                                        <span class="badge bg-secondary">Belum diketahui</span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('menus.show', $menu->id) }}"
                                       class="btn btn-info btn-sm">
                                        Detail
                                    </a>

                                    <a href="{{ route('menus.edit', $menu->id) }}"
                                       class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <form action="{{ route('menus.destroy', $menu->id) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus menu ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    Belum ada data menu.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            {{ $menus->links() }}

        </div>
    </div>

</div>
@endsection
