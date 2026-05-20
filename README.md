# 🍽️ School Cafeteria Management System

Sistem manajemen kantin sekolah berbasis web yang memungkinkan pengguna (siswa), penjual (pedagang kantin), dan pemilik sekolah untuk berinteraksi dalam satu platform terintegrasi.

## 📋 Daftar Isi

- [Fitur Utama](#fitur-utama)
- [Persyaratan Sistem](#persyaratan-sistem)
- [Instalasi](#instalasi)
- [Struktur Database](#struktur-database)
- [Peran & Izin](#peran--izin)
- [Fitur Berdasarkan Peran](#fitur-berdasarkan-peran)
- [API Endpoints](#api-endpoints)
- [Panduan Penggunaan](#panduan-penggunaan)
- [Teknologi yang Digunakan](#teknologi-yang-digunakan)
- [Fitur Terbaru](#fitur-terbaru)

---

## ✨ Fitur Utama

### 🛍️ Untuk Pelanggan (Users)
- ✅ Registrasi & Login
- ✅ Browse menu dari berbagai stand/warung
- ✅ Tambah item ke shopping tray (keranjang)
- ✅ Beri rating & review produk (1-5 bintang)
- ✅ Lihat rating dari customer lain
- ✅ Kelola profile pribadi

### 🏪 Untuk Penjual (Sellers)
- ✅ Registrasi dengan persetujuan owner
- ✅ **Buat 1 stand/warung (terbatas 1 per seller)**
- ✅ Kelola menu items di stand
- ✅ Upload foto produk
- ✅ Dashboard dengan statistik penjualan
- ✅ Lihat reviews & ratings dari pelanggan
- ✅ **Balas rating pelanggan untuk meningkatkan kepercayaan**
- ✅ Kelola profile seller

### 👨‍💼 Untuk Owner (Admin)
- ✅ Approve/reject pendaftaran seller
- ✅ Kelola status seller (active/pending/rejected)
- ✅ Kelola semua users & sellers
- ✅ Lihat dan hapus stands
- ✅ **Monitor ratings & seller replies di seluruh sistem**
- ✅ Statistik lengkap sistem
- ✅ Pengaturan profile & tema (dark/light mode)

---

## 🖥️ Persyaratan Sistem

- **Server**: Apache/Nginx dengan PHP 7.4+
- **Database**: MySQL 5.7+ atau MariaDB 10.2+
- **Browser**: Chrome, Firefox, Safari, Edge (modern)
- **Disk Space**: Minimal 500MB untuk uploads
- **RAM**: Minimal 512MB

---

## 📦 Instalasi

### 1. Setup Database

```sql
-- Create database
CREATE DATABASE kantinproject;
USE kantinproject;

-- Tabel akan otomatis dibuat saat aplikasi diakses pertama kali
```

### 2. Konfigurasi

Edit file `config.php`:

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');           // Sesuaikan password MySQL Anda
define('DB_NAME', 'kantinproject');
```

### 3. Inisialisasi

Akses aplikasi melalui browser:
- **User**: `http://localhost/project/index.php`
- **Seller**: `http://localhost/project/seller_login.php`
- **Owner**: `http://localhost/project/login.php`

Tabel database akan otomatis dibuat pada akses pertama.

---

## 🗄️ Struktur Database

### Tabel User

| Tabel | Deskripsi |
|-------|-----------|
| `users` | Pelanggan/Siswa dengan email, password |
| `sellers` | Pedagang kantin dengan status approval |
| `owners` | Administrator sistem |
| `sellers_profiles` | Data extended seller (tanggal lahir, bio, foto) |
| `owner_profiles` | Data extended owner (tanggal lahir, bio, foto) |

### Tabel Bisnis

| Tabel | Deskripsi |
|-------|-----------|
| `stands` | Warung/toko dengan kategori & rating |
| `menu_items` | Item menu dengan harga & foto |
| `tray_items` | Shopping cart items |

### Tabel Engagement

| Tabel | Deskripsi |
|-------|-----------|
| `reviews` | Review item dengan rating & komentar |
| `ratings_stand` | Rating untuk stand |
| `ratings_menu` | Rating untuk menu item |
| `rating_replies` | **⭐ Balasan seller ke rating (BARU!)** |

---

## 👥 Peran & Izin

### User (Pelanggan)
- Browse & filter menu
- Add to cart
- Rate & review
- Manage profile

### Seller (Pedagang)
- Create **1 stand** (terbatas)
- Manage menu items
- View dashboard & stats
- **Reply to ratings**
- Manage profile

### Owner (Admin)
- Approve/reject sellers
- Manage all users
- Monitor ratings & replies
- View system statistics
- Manage profile & theme

---

## 🔌 API Endpoints

### Ratings & Reviews
```
POST /api/rate.php                      - Submit rating
POST /api/rate.php?action=reply         - Seller reply to rating ⭐
GET  /api/rate.php?action=getReplies    - Get rating replies
POST /api/review.php                    - Submit review
```

### Menu & Items
```
POST /api/toko_crud.php                 - Add/Edit stand (limit 1!)
POST /api/item_crud.php                 - Add/Edit menu items
```

### Other
```
POST /api/tray.php                      - Cart management
POST /api/seller_profile.php            - Update seller profile
POST /api/owner_action.php              - Owner actions
```

---

## 🎯 Fitur Berdasarkan Peran

### 📊 Seller Dashboard (`dashboard.php`)
- Overview dengan stats
- My Stands (CREATE 1, UPDATE, DELETE)
- Menu Items management
- Reviews section
- **⭐ Ratings & Replies** - Balas rating pelanggan
- Settings & profile

### 👔 Owner Panel (`owner_panel.php`)
- Overview sistem
- Sellers (tab: pending/active/rejected)
- Users management
- Stands listing
- **💬 Ratings & Replies** - Monitor seller responses
- Settings & theme

### 🛒 User Interface
- Menu browsing dengan kategori filter
- Shopping cart dengan calculation
- Show seller info saat checkout
- Rate & review interface

---

## 📚 Panduan Penggunaan

### 🛍️ User Workflow
1. Register → Login → Browse menu → Add to cart → Rate & review

### 🏪 Seller Workflow
1. Register → Tunggu approval → Create 1 stand → Add menu items → Monitor ratings → Reply to ratings

### 👨‍💼 Owner Workflow
1. Login → Approve sellers → Monitor system → Check ratings & replies

---

## 🛠️ Teknologi

- **Backend**: PHP 7.4+ dengan MySQLi
- **Frontend**: HTML5, CSS3, Vanilla JavaScript
- **Database**: MySQL/MariaDB
- **Upload**: Max 2MB, format: JPG/PNG/WEBP/GIF
- **Security**: Password hashing, input validation, session management

---

## 📁 Struktur File Penting

```
project/
├── api/
│   ├── rate.php              # Rating & replies API ⭐
│   ├── toko_crud.php         # Stand CRUD (limit 1!)
│   ├── item_crud.php         # Menu CRUD
│   └── ...
├── dashboard.php             # Seller dashboard
├── owner_panel.php           # Owner/admin panel
├── myTray.php                # Shopping cart (show sellers)
├── page2.php                 # Menu listing
├── config.php                # Database config
└── README.md                 # Documentation
```

---

## ⭐ Fitur Terbaru (May 18, 2026)

### Rating Reply System
Sellers dapat memberikan respon personal kepada setiap rating dari pelanggan:
- **Database**: Tabel `rating_replies` untuk store responses
- **UI**: Tab "Ratings & Replies" di seller dashboard & owner panel
- **API**: `POST /api/rate.php?action=reply` untuk submit reply
- **Visual**: Green border = replied, Red border = pending

### Stand Limitation
- Sellers hanya bisa membuat **1 stand per akun**
- Validation di `api/toko_crud.php`
- Encourages focus & brand consistency

### MyTray Seller Display
- Modal popup saat klik tombol "Beli"
- Shows sellers & item count per seller
- Improves transparency sebelum checkout

---

**Status**: ✅ COMPLETED v2.1  
**Last Updated**: May 18, 2026
