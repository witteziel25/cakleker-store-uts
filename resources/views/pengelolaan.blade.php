@extends('layouts.app')
@section('title', 'Pengelolaan Produk')
@section('content')
<div class="section-data">
    <div class="section-inner">
        <p class="section-label">Sistem Manajemen</p>
        <h2 class="section-title">Inventaris Barang</h2>
        <div class="stats-container">
            <div class="stat-card"><div class="stat-card-value">{{ $semuaProduk->count() }}</div><div class="stat-card-label">Total Item</div></div>
            <div class="stat-card"><div class="stat-card-value">Rp {{ number_format($semuaProduk->sum(fn($p)=>$p->stok*$p->harga),0,',','.') }}</div><div class="stat-card-label">Total Nilai</div></div>
            <div class="stat-card"><div class="stat-card-value">{{ $semuaProduk->where('stok','<',5)->count() }}</div><div class="stat-card-label">Stok Menipis</div></div>
        </div>

        <div class="form-card">
            <h3 class="form-title">{{ isset($produk) ? 'Edit Barang' : 'Tambah Barang Baru' }}</h3>
            <form method="POST" action="{{ isset($produk) ? route('produk.perbarui', $produk->id) : route('produk.simpan') }}" enctype="multipart/form-data">
                @csrf
                @isset($produk) @method('PUT') @endisset
                <div class="form-grid">
                    <div class="form-group"><label>Kode Barang</label><input type="text" name="kode" value="{{ old('kode', $produk->kode ?? '') }}" required></div>
                    <div class="form-group"><label>Nama Produk</label><input type="text" name="nama" value="{{ old('nama', $produk->nama ?? '') }}" required></div>
                    <div class="form-group"><label>Kategori</label>
                        <select name="kategori" required>
                            <option value="">Pilih Kategori</option>
                            @foreach(['Race Wear','Daily Wear','Diecast & Model','Aksesoris','Limited Edition'] as $kat)
                                <option value="{{ $kat }}" {{ (old('kategori', $produk->kategori ?? '') == $kat) ? 'selected' : '' }}>{{ $kat }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group"><label>Stok</label><input type="number" name="stok" value="{{ old('stok', $produk->stok ?? 0) }}" min="0" required></div>
                    <div class="form-group"><label>Harga (Rp)</label><input type="number" name="harga" value="{{ old('harga', $produk->harga ?? 0) }}" min="1" required></div>
                    <div class="form-group"><label>Tanggal Masuk</label><input type="date" name="tanggal_masuk" value="{{ old('tanggal_masuk', $produk->tanggal_masuk ?? date('Y-m-d')) }}" required></div>
                    <div class="form-group"><label>Foto Produk</label><input type="file" name="gambar">@isset($produk->gambar)<img src="{{ asset('storage/'.$produk->gambar) }}" width="50" style="margin-top:5px;">@endisset</div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">{{ isset($produk) ? 'Update' : 'Simpan' }}</button>
                    <a href="{{ route('pengelolaan') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>

        <div class="tabel-wrapper">
            <table class="tabel-produk">
                <thead>
                    <tr><th>Foto</th><th>Kode</th><th>Nama</th><th>Kategori</th><th>Stok</th><th>Harga</th><th>Tanggal Masuk</th><th>Aksi</th></tr>
                </thead>
                <tbody>
                    @foreach($semuaProduk as $item)
                    <tr>
                        <td>@if($item->gambar)<img src="{{ asset('storage/'.$item->gambar) }}" width="40">@else<img src="https://placehold.co/40x40?text=No+Img" width="40">@endif</td>
                        <td>{{ $item->kode }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->kategori }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>Rp {{ number_format($item->harga,0,',','.') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_masuk)->format('d/m/Y') }}</td>
                        <td><a href="{{ route('produk.edit', $item->id) }}" class="btn-edit">Edit</a>
                            <form action="{{ route('produk.hapus', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin?')">@csrf @method('DELETE')<button type="submit" class="btn-delete">Hapus</button></form>
                         </td>
                     </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
