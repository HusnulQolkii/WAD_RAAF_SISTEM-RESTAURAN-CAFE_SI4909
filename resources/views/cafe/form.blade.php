@extends('layouts.app')

@section('content')
@php $edit = $item !== null; @endphp

<div class="heading">
    <div>
        <span class="eyebrow">{{ $edit ? 'FORM PERUBAHAN' : 'FORM INPUT' }}</span>
        <h1>{{ $edit ? 'Edit' : 'Tambah' }} {{ $cfg['judul'] }}</h1>
        <p>{{ $edit ? 'Perbarui informasi data yang dipilih.' : 'Masukkan informasi sesuai kolom yang tersedia.' }}</p>
    </div>

    <a href="{{ route('cafe.index', $modul) }}" class="btn plain">Kembali</a>
</div>

<div class="panel form-panel">
    <h2>{{ $edit ? 'Edit Data #' . $item->id : 'Data Baru' }}</h2>

    @unless ($edit)
        <p>Lengkapi formulir berikut untuk menambahkan data {{ strtolower($cfg['judul']) }}.</p>
    @endunless

    @if ($errors->any())
        <div class="alert error">
            <strong>Periksa kembali data:</strong>
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" class="form" autocomplete="off"
          action="{{ $edit ? route('cafe.update', [$modul, $item->id]) : route('cafe.store', $modul) }}">
        @csrf
        @if ($edit)
            @method('PUT')
        @endif

        @foreach ($cfg['fields'] as $field => $info)
            @php
                $value = old($field, $edit ? $item->$field : '');
                $req   = !empty($info['required']);
            @endphp

            <div class="field">
                <label for="{{ $field }}">
                    {{ $info['label'] }}
                    @if ($req)
                        <span class="required">*</span>
                    @endif
                </label>

                @if ($info['type'] === 'textarea')
                    <textarea id="{{ $field }}" name="{{ $field }}" rows="3" {{ $req ? 'required' : '' }}>{{ $value }}</textarea>

                @elseif ($info['type'] === 'select')
                    <select id="{{ $field }}" name="{{ $field }}" {{ $req ? 'required' : '' }}>
                        <option value="">-- Pilih --</option>
                        @foreach ($info['options'] as $option)
                            <option value="{{ $option }}" {{ (string) $value === (string) $option ? 'selected' : '' }}>
                                {{ $option }}
                            </option>
                        @endforeach
                    </select>

                @else
                    <input id="{{ $field }}" name="{{ $field }}" type="{{ $info['type'] }}"
                           value="{{ $value }}"
                           @if (isset($info['min'])) min="{{ (int) $info['min'] }}" @endif
                           {{ $req ? 'required' : '' }}>
                @endif
            </div>
        @endforeach

        <div class="actions">
            <button class="btn primary" type="submit">Simpan Data</button>
            <a class="btn plain" href="{{ route('cafe.index', $modul) }}">Batal</a>
        </div>
    </form>
</div>
@endsection
