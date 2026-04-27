# 🏎️ Cakleker Store

**Cakleker Store** adalah aplikasi web manajemen toko merchandise resmi Scuderia Ferrari berbasis Laravel. Aplikasi ini dibangun dengan arsitektur MVC murni, menggunakan Blade Engine untuk tampilan, dan MySQL sebagai database. Proyek ini merupakan tugas implementasi konsep request-response, simulasi login, serta rendering data dinamis pada halaman pengelolaan produk.

---

## ✨ Fitur Utama

- 🔐 **Autentikasi Admin** (username & password: `admin`)
- 📊 **Dashboard** dengan statistik toko dan daftar produk (card scroll vertikal)
- 📦 **Manajemen Produk (CRUD)** – tambah, ubah, hapus produk dengan upload gambar
- 🖼️ **Profile Admin** – menampilkan username, role, dan waktu login
- 📱 **Responsif** – mendukung berbagai ukuran layar (desktop, tablet, mobile)
- 🎬 **Video Background** – tampilan hero dengan video khas Ferrari
- 💾 **Upload & Tampilan Gambar** – file gambar tersimpan di storage/public

---

## 🛠️ Teknologi yang Digunakan

- **Framework:** Laravel 11.x (atau versi terbaru)
- **Database:** MySQL / MariaDB
- **Frontend:** Blade, CSS3 (native), HTML5
- **PHP:** ^8.2
- **Composer** untuk manajemen dependensi
- **Laragon** (environment development)

---

## 📁 Struktur Proyek (Relevan)
cakleker-store/
├── app/
│ ├── Http/
│ │ ├── Controllers/
│ │ │ ├── AuthController.php
│ │ │ └── ProdukController.php
│ │ └── Kernel.php
│ └── Models/
│ └── Produk.php
├── database/
│ ├── migrations/
│ │ └── ..._create_produk_table.php
│ └── seeders/
│ └── ProdukSeeder.php
├── public/
│ ├── css/
│ │ └── style.css
│ ├── Images/
│ ├── Videos/
│ └── storage/ (symlink)
├── resources/
│ └── views/
│ ├── layouts/
│ │ └── app.blade.php
│ ├── components/
│ │ ├── navbar.blade.php
│ │ └── footer.blade.php
│ ├── login.blade.php
│ ├── dashboard.blade.php
│ ├── profil.blade.php
│ └── pengelolaan.blade.php
├── routes/
│ └── web.php
├── .env
├── composer.json
└── README.md
