@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="dashboard-hero">
    <div class="dashboard-layout">
        <div class="dashboard-left">
            <a href="{{ route('pengelolaan') }}" class="btn btn-primary">Halo Admin, ayo atur toko!</a>
            <p class="hero-desc">Cakleker Store adalah toko merchandise Scuderia Ferrari terpercaya di Indonesia. Temukan koleksi eksklusif kaos, topi, diecast, dan aksesoris untuk para Tifosi sejati.</p>
            <div class="hero-stats">
                <div><div class="stat-number">5+</div><div class="stat-label">Tahun Berdiri</div></div>
                <div><div class="stat-number">200</div><div class="stat-label">Tifosi Puas</div></div>
            </div>
            <div class="hero-promo"> Gratis ongkir untuk pembelian di atas Rp3.000.000</div>
        </div>
        <div class="dashboard-right">
            <div class="produk-vertical-container">
                <h3 class="produk-vertical-title">Koleksi Unggulan</h3>
                <div class="produk-vertical-scroll">
                    @forelse($daftar_produk as $produk)
                    <div class="produk-card-vertical">
                        <div class="produk-img-vertical">
                            @if($produk->gambar)
                                <img src="{{ asset('storage/'.$produk->gambar) }}" alt="{{ $produk->nama }}">
                            @else
                                <img src="https://placehold.co/200x200?text=No+Image" alt="No image">
                            @endif
                        </div>
                        <div class="produk-info-vertical">
                            <p class="produk-kategori-vertical">{{ $produk->kategori }}</p>
                            <h4 class="produk-nama-vertical">{{ $produk->nama }}</h4>
                            <div class="produk-footer-vertical">
                                <span class="produk-harga-vertical">Rp {{ number_format($produk->harga,0,',','.') }}</span>
                                <span class="produk-stok-vertical {{ $produk->stok <= 0 ? 'habis' : '' }}">Stok: {{ $produk->stok }}</span>
                            </div>
                        </div>
                    </div>
                    @empty <p>Belum ada produk.</p> @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
