<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function tampilkanLogin()
    {
        if (session('nama_pengguna')) {
            return redirect()->route('dashboard');
        }
        return view('login');
    }

    public function prosesLogin(Request $request)
    {
        $request->validate([
            'nama_pengguna' => 'required|string|min:3',
            'kata_sandi'    => 'required|string|min:3',
        ]);

        if ($request->nama_pengguna === 'admin' && $request->kata_sandi === 'admin') {
            session(['nama_pengguna' => $request->nama_pengguna]);
            session(['waktu_masuk' => now()]);
            return redirect()->route('dashboard');
        }

        return back()->with('gagal', 'Nama pengguna atau kata sandi salah.');
    }

    public function logout()
    {
        session()->forget(['nama_pengguna', 'waktu_masuk']);
        return redirect()->route('login');
    }

    public function dashboard()
    {
        if (!session('nama_pengguna')) return redirect()->route('login');
        $produk = Produk::all();
        return view('dashboard', [
            'nama_pengguna' => session('nama_pengguna'),
            'daftar_produk' => $produk
        ]);
    }

    public function profil()
    {
        if (!session('nama_pengguna')) return redirect()->route('login');
        return view('profil', [
            'nama_pengguna' => session('nama_pengguna'),
            'waktu_masuk'   => session('waktu_masuk')
        ]);
    }
}
