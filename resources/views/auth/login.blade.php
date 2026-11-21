@extends('layouts.auth')
@section('title', 'Login')

@section('content')
<span class="eyebrow">SELAMAT DATANG</span>
<h1>Masuk</h1>
<p class="auth-sub">Silakan login untuk melanjutkan.</p>

@if ($errors->any())
    <div class="alert error">
        <ul>
            @foreach ($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="{{ route('login.post') }}" class="form">
    @csrf

    <div class="field">
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
    </div>

    <div class="field">
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required>
    </div>

    <label class="check">
        <input type="checkbox" name="remember" value="1"> Ingat saya
    </label>

    <button class="btn primary full" type="submit">Masuk</button>
</form>

<p class="auth-switch">Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>
@endsection
