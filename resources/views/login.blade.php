@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="hero-login">
    <div class="login-card">
        <h2>Login Admin</h2>
        @if(session('gagal'))
            <div class="alert-error">{{ session('gagal') }}</div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label>NAMA PENGGUNA</label>
                <input type="text" name="nama_pengguna" placeholder="admin" required>
            </div>
            <div class="form-group">
                <label>KATA SANDI</label>
                <input type="password" name="kata_sandi" placeholder="••••••" required>
            </div>
            <button type="submit" class="btn-login">Login</button>
        </form>
        <div class="copyright">© 2026 Cakleker Store. All Rights Reserved.</div>
    </div>
</div>
@endsection
