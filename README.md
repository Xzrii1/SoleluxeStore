# 👟 SOLELUXE — Premium Shoe Store

Website e-commerce sepatu premium berbasis PHP dengan tampilan dark & gold luxury, dilengkapi sistem manajemen produk, transaksi, dan autentikasi pengguna.

---

## 📋 Deskripsi

SOLELUXE adalah platform toko sepatu online yang menampilkan koleksi brand ternama dunia seperti Nike, Adidas, Puma, Vans, dan lainnya. Dibangun dengan PHP native + MySQL, menggunakan Tailwind CSS untuk tampilan modern bertema gelap dengan aksen emas.

---

## 🗂️ Struktur Proyek

```
soleluxe/
├── index.php               # Halaman utama (hero, featured products, why us, brands)
├── header.php              # Template header global (navbar, session, koneksi DB)
├── footer.php              # Template footer global
├── stok_barang.php         # Halaman katalog semua produk
├── beli.php                # Halaman pembelian produk (requires login)
├── login.php               # Halaman login pengguna
├── register.php            # Halaman registrasi pengguna baru
│
├── assets/
│   ├── css/                # Custom CSS / Tailwind config
│   └── js/                 # Script animasi & interaktivitas
│
├── admin/                  # Panel admin (opsional)
│   ├── dashboard.php
│   ├── kelola_barang.php
│   └── kelola_transaksi.php
│
└── db/
    └── koneksi.php         # Konfigurasi koneksi database ($conn)
```

---

## 🗄️ Struktur Database

### Tabel `tmbbrg` — Data Produk
| Kolom        | Tipe         | Keterangan              |
|--------------|--------------|-------------------------|
| `id`         | INT (PK, AI) | ID produk               |
| `nama_barang`| VARCHAR      | Nama sepatu             |
| `merek`      | VARCHAR      | Brand (Nike, Adidas, dll)|
| `harga`      | INT/DECIMAL  | Harga produk            |
| `stok`       | INT          | Jumlah stok tersedia    |
| `ukuran`     | VARCHAR      | Ukuran sepatu           |
| `gambar`     | VARCHAR      | URL/path gambar produk  |

### Tabel `transaksi` — Data Transaksi
| Kolom        | Tipe         | Keterangan              |
|--------------|--------------|-------------------------|
| `id`         | INT (PK, AI) | ID transaksi            |
| `id_barang`  | INT (FK)     | Referensi ke `tmbbrg`   |
| `id_user`    | INT (FK)     | Referensi ke tabel user |
| `tanggal`    | DATETIME     | Waktu transaksi         |
| *(dll)*      |              |                         |

---

## ⚙️ Cara Instalasi

### Prasyarat
- PHP >= 7.4
- MySQL / MariaDB
- Web server: Apache (XAMPP/LAMP) atau Nginx
- Browser modern

### Langkah Instalasi

1. **Clone / copy** folder proyek ke direktori web server:
   ```
   htdocs/soleluxe/   (untuk XAMPP)
   ```

2. **Import database** — buat database baru dan import SQL:
   ```sql
   CREATE DATABASE soleluxe;
   -- lalu import file SQL proyek
   ```

3. **Konfigurasi koneksi** di `db/koneksi.php` (atau file yang di-`require` di `header.php`):
   ```php
   $conn = new mysqli('localhost', 'root', '', 'soleluxe');
   ```

4. **Akses** di browser:
   ```
   http://localhost/soleluxe/
   ```

---

## 🔐 Role & Akses

| Role    | Hak Akses                                      |
|---------|------------------------------------------------|
| Guest   | Lihat produk, daftar akun, tombol "Login untuk Beli" |
| `user`  | Semua fitur guest + beli produk                |
| `admin` | Kelola produk, kelola transaksi (panel admin)  |

Role disimpan di `$_SESSION['role']` setelah login.

---

## 🧩 Fitur Utama

- **Hero Section** — Banner utama dengan animasi floating, statistik produk & transaksi live dari DB
- **Featured Products** — 4 produk terbaru otomatis dari database
- **Badge Stok** — Indikator stok: hijau (>10), kuning (1–10), merah (habis)
- **Why Choose Us** — Highlight keunggulan toko (original, pengiriman, garansi, support)
- **Brand Partners** — Daftar brand yang tersedia
- **Reveal Animation** — Elemen muncul saat scroll (class `.reveal`)
- **Responsive** — Mobile-first dengan Tailwind CSS

---

## 🎨 Stack Teknologi

| Layer      | Teknologi                        |
|------------|----------------------------------|
| Backend    | PHP (native, no framework)       |
| Database   | MySQL / MySQLi                   |
| Frontend   | Tailwind CSS, Font Awesome Icons |
| Font       | Google Fonts (font-display)      |
| Gambar     | Unsplash (hero), URL dari DB     |

---

## 📌 Catatan Pengembangan

- `formatRupiah()` — helper function untuk format harga (Rp), didefinisikan di `header.php`
- `$conn` — variabel koneksi MySQLi global, tersedia di semua halaman via `require_once 'header.php'`
- Animasi CSS: `.float-anim`, `.pulse-gold`, `.gold-shimmer`, `.btn-press`, `.card-hover` didefinisikan di stylesheet utama
- Class `.reveal` digunakan bersama IntersectionObserver di JS untuk efek scroll reveal

---

## 📞 Brand yang Tersedia

Nike · Adidas · Reebok · Puma · New Balance · Vans · Asics

---

> © SOLELUXE — Step Into Luxury
