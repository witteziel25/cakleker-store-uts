<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        Produk::create(['kode'=>'F001','nama'=>'Red Race Suit','kategori'=>'Race Wear','stok'=>5,'harga'=>3000000,'tanggal_masuk'=>'2025-01-10','gambar'=>null]);
        Produk::create(['kode'=>'F002','nama'=>"Leclerc's Helmet",'kategori'=>'Race Wear','stok'=>2,'harga'=>10000000,'tanggal_masuk'=>'2025-01-15','gambar'=>null]);
        Produk::create(['kode'=>'F003','nama'=>'Red Jacket','kategori'=>'Daily Wear','stok'=>0,'harga'=>700000,'tanggal_masuk'=>'2025-02-01','gambar'=>null]);
        Produk::create(['kode'=>'F004','nama'=>'Shanghai Edition','kategori'=>'Daily Wear','stok'=>8,'harga'=>900000,'tanggal_masuk'=>'2025-02-10','gambar'=>null]);
        Produk::create(['kode'=>'F005','nama'=>'SF-24 Diecast 1:18','kategori'=>'Diecast & Model','stok'=>3,'harga'=>1250000,'tanggal_masuk'=>'2025-03-01','gambar'=>null]);
    }
}
