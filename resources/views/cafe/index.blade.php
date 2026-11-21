@extends('layouts.app')

@section('content')
<div class="heading">
    <div>
        <span class="eyebrow">PENGELOLAAN DATA</span>
        <h1>{{ $cfg['judul'] }}</h1>
        <p>Kelola dan perbarui data {{ strtolower($cfg['judul']) }} restoran.</p>
    </div>

    <a href="{{ route('cafe.create', $modul) }}" class="btn primary">+ Tambah Data</a>
</div>

@if (session('pesan'))
    <div class="alert success">{{ session('pesan') }}</div>
@endif

<div class="panel">
    <div class="panel-head">
        <div>
            <h2>Daftar {{ $cfg['judul'] }}</h2>
            <p>{{ $data->count() }} data ditemukan</p>
        </div>

        <form method="get" action="{{ route('cafe.index', $modul) }}" class="search">
            <input type="text" name="cari" value="{{ $cari }}" placeholder="Cari data...">
            <button class="btn plain" type="submit">Cari</button>

            @if ($cari !== '')
                <a class="btn plain" href="{{ route('cafe.index', $modul) }}">Reset</a>
            @endif
        </form>
    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    @foreach ($cfg['fields'] as $field => $info)
                        <th>{{ $info['label'] }}</th>
                    @endforeach
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($data as $row)
                    <tr>
                        <td class="muted">{{ $loop->iteration }}</td>

                        @foreach ($cfg['fields'] as $field => $info)
                            <td>
                                @if ($field === 'harga')
                                    Rp {{ number_format((float) $row->$field, 0, ',', '.') }}
                                @elseif ($field === 'status')
                                    <span class="pill">{{ $row->$field }}</span>
                                @else
                                    {{ $row->$field }}
                                @endif
                            </td>
                        @endforeach

                        <td>
                            <div class="row-actions">
                                <a class="edit" href="{{ route('cafe.edit', [$modul, $row->id]) }}">Edit</a>

                                <form method="post"
                                      action="{{ route('cafe.destroy', [$modul, $row->id]) }}"
                                      onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ count($cfg['fields']) + 2 }}" class="empty">
                            @if ($cari !== '')
                                Tidak ada data yang cocok dengan pencarian.
                            @else
                                Belum ada data. Klik "Tambah Data" untuk mulai mengisi.
                            @endif
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
