@extends('layouts.auth')
@section('title', 'Register')

@section('content')
<span class="eyebrow">AKUN BARU</span>
<h1>Daftar</h1>
<p class="auth-sub">Buat akun untuk mengakses CafeKu.</p>

@if ($errors->any())
    <div class="alert error">
        <ul>
            @foreach ($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="{{ route('register.post') }}" class="form">
    @csrf

    <div class="field">
        <label for="name">Nama</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
    </div>

    <div class="field">
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required>
    </div>

    <div class="field">
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required>
    </div>

    <div class="field">
        <label for="password_confirmation">Konfirmasi Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>
    </div>

    <button class="btn primary full" type="submit">Daftar</button>
</form>

<p class="auth-switch">Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p>
@endsection
