<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index()
    {
        if (!session('nama_pengguna')) return redirect()->route('login');
        $semuaProduk = Produk::all();
        return view('pengelolaan', compact('semuaProduk'));
    }

    public function simpan(Request $request)
    {
        if (!session('nama_pengguna')) return redirect()->route('login');

        $request->validate([
            'kode'          => 'required|unique:produk,kode',
            'nama'          => 'required|string|max:100',
            'kategori'      => 'required|string',
            'stok'          => 'required|integer|min:0',
            'harga'         => 'required|integer|min:1',
            'tanggal_masuk' => 'required|date',
            'gambar'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->except('gambar');
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('produk', 'public');
        }

        Produk::create($data);
        return redirect()->route('pengelolaan')->with('sukses', 'Produk ditambahkan.');
    }

    public function edit($id)
    {
        if (!session('nama_pengguna')) return redirect()->route('login');
        $produk = Produk::findOrFail($id);
        $semuaProduk = Produk::all();
        return view('pengelolaan', compact('semuaProduk', 'produk'));
    }

    public function perbarui(Request $request, $id)
    {
        if (!session('nama_pengguna')) return redirect()->route('login');
        $produk = Produk::findOrFail($id);

        $request->validate([
            'kode'          => 'required|unique:produk,kode,' . $id,
            'nama'          => 'required|string|max:100',
            'kategori'      => 'required|string',
            'stok'          => 'required|integer|min:0',
            'harga'         => 'required|integer|min:1',
            'tanggal_masuk' => 'required|date',
            'gambar'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->except('gambar');
        if ($request->hasFile('gambar')) {
            if ($produk->gambar) Storage::disk('public')->delete($produk->gambar);
            $data['gambar'] = $request->file('gambar')->store('produk', 'public');
        }

        $produk->update($data);
        return redirect()->route('pengelolaan')->with('sukses', 'Produk diperbarui.');
    }

    public function hapus($id)
    {
        if (!session('nama_pengguna')) return redirect()->route('login');
        $produk = Produk::findOrFail($id);
        if ($produk->gambar) Storage::disk('public')->delete($produk->gambar);
        $produk->delete();
        return redirect()->route('pengelolaan')->with('sukses', 'Produk dihapus.');
    }
}
