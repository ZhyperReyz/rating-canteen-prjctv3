# 🚀 Quick Start Guide - School Cafeteria System

Panduan cepat untuk memulai menggunakan School Cafeteria Management System.

## 📋 Daftar Isi
1. [Instalasi](#instalasi)
2. [Login Pertama Kali](#login-pertama-kali)
3. [Panduan untuk Setiap Peran](#panduan-untuk-setiap-peran)
4. [Fitur-Fitur Utama](#fitur-fitur-utama)
5. [Troubleshooting](#troubleshooting)

---

## 📦 Instalasi

### Step 1: Setup Database
```sql
-- Buka phpMyAdmin di http://localhost/phpmyadmin
-- Create database baru dengan nama: kantinproject

CREATE DATABASE kantinproject;
```

### Step 2: Configure Database
Edit file `config.php`:
```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');                    // Password MySQL Anda
define('DB_NAME', 'kantinproject');
```

### Step 3: Create Admin Account
```sql
-- Masuk ke database kantinproject
USE kantinproject;

-- Insert default owner/admin
INSERT INTO owners (id, nama, email, password) VALUES
(1, 'Admin Kantin', 'admin@kantin.com', '$2y$10$...hashed_password...');

-- Atau run di database langsung untuk generate hash:
-- Password: admin123
INSERT INTO owners (nama, email, password) VALUES
('Admin Kantin', 'admin@kantin.com', '$2y$10$wqnp41l9W9j1l0YDQrQvJuFZy8u8q.8y8q.8q.8q.8');
```

### Step 4: Access Application
- **Main Site**: `http://localhost/project/`
- **Owner/Admin**: `http://localhost/project/owner_panel.php`
- **Admin Dashboard**: `http://localhost/project/admin/dashboard.php`
- **Seller Login**: `http://localhost/project/seller_login.php`

---

## 🔑 Login Pertama Kali

### Admin Login
1. Buka `http://localhost/project/login.php`
2. Username: `admin@kantin.com` (atau email yang diatur)
3. Password: `admin123` (atau password yang diatur)
4. Klik "Login"

### Create Test Data
Setelah login sebagai admin, Anda dapat:
1. Approve seller registrations (jika ada)
2. Create test users & sellers
3. Monitor system

---

## 👥 Panduan untuk Setiap Peran

### 🛍️ Sebagai User (Pelanggan/Siswa)

**Registrasi:**
1. Buka `http://localhost/project/index.php`
2. Klik "Register" atau "Daftar"
3. Isi: Nama, Email, Password
4. Klik "Register"
5. Langsung bisa login

**Cara Membeli:**
1. Login dengan akun Anda
2. Buka halaman "Menu" atau `page2.php`
3. Lihat semua menu dari berbagai stand
4. Pilih kategori (makanan berat, ringan, minuman, dessert)
5. Klik item → Add to Cart
6. Go to "My Tray" → Adjust quantity
7. Klik "Beli" → Modal muncul dengan list sellers
8. Klik "Lanjut Checkout"

**Cara Memberi Rating:**
1. Setelah membeli, buka halaman menu
2. Hover/klik item yang sudah dibeli
3. Berikan rating 1-5 bintang
4. Tambah komentar (optional)
5. Klik "Submit Review"

---

### 🏪 Sebagai Seller (Pedagang Kantin)

**Registrasi:**
1. Buka `http://localhost/project/seller_register.php`
2. Isi: Nama Seller, Email, Password, Nama Stand, Kategori
3. Upload foto stand (optional)
4. Klik "Register"
5. **Tunggu approval dari owner** (status: pending)

**Setelah Approval:**
1. Buka `http://localhost/project/seller_login.php`
2. Login dengan email & password Anda
3. Dashboard seller muncul → `dashboard.php`

**Setup Stand Pertama (Wajib):**
1. Go to "My Stands"
2. Klik "+ Tambah Stand" (hanya 1 stand per seller!)
3. Isi nama stand, pilih kategori
4. Upload foto stand
5. Klik "Simpan"

**Tambah Menu Items:**
1. Go to "Menu Items"
2. Klik "+ Tambah Item"
3. Pilih stand (hanya ada 1)
4. Isi: Nama, Harga, Foto
5. Klik "Simpan"
6. Ulangi untuk item lainnya

**Monitor Rating & Balas:**
1. Go to "Ratings & Replies"
2. Lihat semua ratings dari pelanggan
3. Untuk setiap rating, klik "💬 Balas"
4. Ketik balasan Anda (personal response)
5. Klik "Kirim Balasan"
6. Balasan akan muncul di dashboard & terlihat oleh pelanggan

**Edit Profile:**
1. Go to "Setting"
2. Edit nama, tanggal lahir, bio
3. Upload foto profil (opsional)
4. Klik "Simpan Biodata"

---

### 👨‍💼 Sebagai Owner/Admin

**Login:**
1. Buka `http://localhost/project/login.php`
2. Gunakan akun owner yang sudah dibuat di database
3. Masuk ke "Owner Panel" (`owner_panel.php`)

**Approve Sellers:**
1. Go to "Penjualan" tab
2. Lihat "Pending" sub-tab
3. Review seller requests
4. Klik "✓ Approve" atau "✗ Reject"
5. Status berubah otomatis

**Monitor Sistem:**
1. **Overview**: Lihat statistik keseluruhan sistem
2. **Penjualan**: Kelola sellers (active/pending/rejected)
3. **Pengguna**: Lihat & hapus users jika perlu
4. **Stands**: Lihat semua stands, delete jika perlu
5. **Ratings & Replies**: Monitor rating dari pelanggan & response dari sellers

**Monitor Ratings:**
1. Go to "Ratings & Replies"
2. Lihat semua ratings di sistem
3. Check reply status:
   - 🟢 Green border = Seller sudah balas
   - 🔴 Red border = Seller belum balas
4. Pastikan sellers responsif terhadap customer

**Manage Profiles:**
1. Go to "Pengaturan" (Settings)
2. Edit biodata owner
3. Upload foto profil
4. Pilih light/dark mode
5. Klik "Simpan Biodata"

---

## ⭐ Fitur-Fitur Utama

### 1️⃣ Rating & Reply System
**Problem:** Pelanggan memberi rating, tapi seller tidak bisa respond.
**Solution:** Rating Reply System!

**Cara Kerja:**
- Pelanggan beri rating (1-5 bintang) ke stand atau menu
- Seller melihat rating di "Ratings & Replies"
- Seller klik "Balas" dan tulis respon personal
- Respon muncul di dashboard seller & terlihat oleh semua
- Owner bisa monitor di "Ratings & Replies" panel

**Contoh Skenario:**
```
Pelanggan: "Pedasnya pas, tapi kurang garem ⭐⭐⭐⭐"
Seller: "Terima kasih atas saran Anda! Kami akan mengurangi garam di batch berikutnya. Ditunggu order Anda lagi! 😊"
```

### 2️⃣ Stand Limitation (1 per Seller)
**Problem:** Sellers create multiple stands untuk spam.
**Solution:** Limit 1 stand per seller!

**How It Works:**
- Saat seller create stand pertama → OK
- Saat seller try create stand kedua → ERROR
- Seller harus edit stand existing, tidak bisa buat baru
- Encourages focus pada 1 brand/stand

### 3️⃣ MyTray Seller Display
**Problem:** Pelanggan checkout tapi tidak tahu pembayaran ke siapa.
**Solution:** Show sellers at checkout!

**How It Works:**
- Pelanggan add items dari berbagai stand ke cart
- Klik "Beli" → Modal popup muncul
- Modal menampilkan: Seller name, item count per seller
- Pelanggan tahu exactly siapa yang dipesan

### 4️⃣ Admin Dashboard
**Features:**
- 📊 System statistics (users, sellers, ratings, etc)
- 🏆 Top sellers & menu items
- ⏳ Pending approvals
- ⭐ Rating & reply monitoring
- 💭 Recent reviews

**Access:**
- `http://localhost/project/admin/dashboard.php`
- `http://localhost/project/admin/login.php`

---

## 📚 Fitur Advanced

### Upload Gambar
- Semua gambar harus JPG, PNG, WEBP, GIF
- Max size: 2MB per file
- Direktori: `/uploads/`

### Dark Mode / Light Mode
- Owner dapat mengatur theme di Settings
- Preference tersimpan di localStorage
- Berlaku hanya untuk owner panel

### Session & Security
- Password menggunakan `password_hash()`
- Session timeout: sesuai PHP config
- CSRF protection: POST validation

---

## 🐛 Troubleshooting

### Error: "Koneksi database gagal"
**Solusi:**
```
1. Check config.php - pastikan DB credentials benar
2. Pastikan MySQL/MariaDB running
3. Database "kantinproject" sudah create?
4. Coba restart Apache & MySQL
```

### Error: "Cannot upload image"
**Solusi:**
```
1. Folder /uploads/ harus writable (chmod 755)
2. File size < 2MB?
3. Format: JPG, PNG, WEBP, GIF?
4. Nama file tidak ada special characters?
```

### Error: "Seller hanya boleh punya 1 stand"
**Solusi:**
```
1. Ini adalah FITUR, bukan error!
2. Untuk edit stand lama: Go to "My Stands" → klik Edit
3. Untuk ganti stand: Delete stand lama dulu, baru create baru
4. Contact admin jika ada special case
```

### Session hilang / Logout otomatis
**Solusi:**
```
1. Clear browser cookies
2. Check PHP session.timeout di php.ini
3. Session file permissions di /tmp/
4. Login ulang
```

### Gambar tidak tampil
**Solusi:**
```
1. Path benar? (uploads/ folder exists?)
2. File permissions? (readable)
3. Gunakan relative path: uploads/filename.jpg
4. Cache browser? (clear Ctrl+Shift+Delete)
```

---

## 📞 Support & Help

### Dokumentasi Lengkap
- **README.md** - Overview & features
- **API_DOCS.md** - API endpoint reference

### Tips
- Baca README.md untuk overview lengkap
- Baca API_DOCS.md untuk API endpoints
- Check database schema di struktur database README

### Testing Checklist
- [ ] Database connection OK
- [ ] Admin account login OK
- [ ] User registration OK
- [ ] Seller registration OK
- [ ] Admin approve seller OK
- [ ] Seller create stand OK
- [ ] Seller add menu OK
- [ ] User browse menu OK
- [ ] User add to cart OK
- [ ] User rate & review OK
- [ ] Seller reply to rating OK
- [ ] Admin monitor ratings OK

---

## 🎉 Selamat!

Anda sudah siap menggunakan School Cafeteria Management System!

**Enjoy! 🍽️**

---

**Last Updated**: May 18, 2026  
**Version**: 2.1
