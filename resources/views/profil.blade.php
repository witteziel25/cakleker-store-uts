@extends('layouts.app')
@section('title', 'Profil')
@section('content')
<div class="profil-hero">
    <div class="profil-card">
        <div class="profil-header"><h2>Profil Saya</h2></div>
        <div class="profil-detail">
            <div class="detail-item"><span class="detail-label">Nama Pengguna</span><span class="detail-value">{{ $nama_pengguna }}</span></div>
            <div class="detail-item"><span class="detail-label">Peran</span><span class="detail-value">Administrator</span></div>
            <div class="detail-item"><span class="detail-label">Waktu Masuk</span><span class="detail-value">{{ \Carbon\Carbon::parse($waktu_masuk)->translatedFormat('l, d F Y H:i:s') }}</span></div>
        </div>
        <div class="profil-footer">Forza Ferrari! 🏎️</div>
    </div>
</div>
@endsection
