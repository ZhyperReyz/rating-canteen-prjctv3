# 🔌 API Documentation - School Cafeteria System

Complete reference for all API endpoints used in the School Cafeteria Management System.

## Base URL

```
http://localhost/project/api/
```

## Authentication

All protected endpoints require session authentication:
- **User**: `$_SESSION['user_id']`, `$_SESSION['user_nama']`
- **Seller**: `$_SESSION['seller_id']`, `$_SESSION['seller_nama']`
- **Owner**: `$_SESSION['owner_id']`, `$_SESSION['owner_nama']`

---

## 🏪 Stand Management

### Create Stand
**POST** `/toko_crud.php`

**Parameters:**
- `action`: `add`
- `nama`: string (required)
- `kategori`: `berat|ringan|minuman|dessert` (required)
- `foto`: file (optional)

**Response:**
```json
{
    "success": true,
    "message": "Stand berhasil ditambahkan!"
}
```

**Error:**
```json
{
    "error": "Seller hanya boleh punya 1 stand. Silakan edit stand yang sudah ada."
}
```

---

### Update Stand
**POST** `/toko_crud.php`

**Parameters:**
- `action`: `edit`
- `id`: int (stand_id)
- `nama`: string (required)
- `kategori`: string (required)
- `foto`: file (optional)

**Response:**
```json
{
    "success": true,
    "message": "Stand berhasil diupdate!"
}
```

---

### Delete Stand
**POST** `/toko_crud.php`

**Parameters:**
- `action`: `delete`
- `id`: int (stand_id)

**Response:**
```json
{
    "success": true
}
```

---

## 🍽️ Menu Items

### Add Menu Item
**POST** `/item_crud.php`

**Parameters:**
- `action`: `add`
- `stand_id`: int (required)
- `nama`: string (required)
- `harga`: int (required)
- `foto`: file (optional)

**Response:**
```json
{
    "success": true,
    "message": "Item berhasil ditambahkan!"
}
```

---

### Update Menu Item
**POST** `/item_crud.php`

**Parameters:**
- `action`: `edit`
- `id`: int (menu_id)
- `stand_id`: int
- `nama`: string
- `harga`: int
- `foto`: file (optional)

---

### Delete Menu Item
**POST** `/item_crud.php`

**Parameters:**
- `action`: `delete`
- `id`: int (menu_id)

---

### Get Menu Items
**GET** `/menu.php?stand_id=1`

**Query Parameters:**
- `stand_id`: int (required)
- `with_ratings`: bool (optional) - include rating data

**Response:**
```json
{
    "items": [
        {
            "id": 1,
            "nama": "Nasi Rames",
            "harga": 15000,
            "foto": "uploads/item_123.jpg",
            "rating": 4.5,
            "total_votes": 12
        }
    ]
}
```

---

### Get Item Details
**GET** `/get_item.php?id=1`

**Query Parameters:**
- `id`: int (menu_id)

**Response:**
```json
{
    "item": {
        "id": 1,
        "nama": "Nasi Rames",
        "harga": 15000,
        "foto": "uploads/item_123.jpg",
        "stand_id": 1,
        "stand_nama": "Warung Sejahtera"
    },
    "reviews": [
        {
            "rating": 5,
            "komentar": "Enak!",
            "user_nama": "Budi",
            "created_at": "2026-05-18T10:30:00Z"
        }
    ]
}
```

---

## ⭐ Ratings & Reviews

### Submit Rating
**POST** `/rate.php`

**Parameters:**
- `action`: `submit` (default)
- `type`: `stand|menu` (required)
- `id`: int (stand_id or menu_id, required)
- `rating`: int 1-5 (required)

**Response:**
```json
{
    "success": true,
    "new_rating": 4.5,
    "total_votes": 15,
    "your_rating": 5
}
```

---

### Seller Reply to Rating
**POST** `/rate.php?action=reply`

**Parameters:**
- `action`: `reply`
- `rating_id`: int (rating ID, required)
- `rating_type`: `stand|menu` (required)
- `reply_text`: string max 500 chars (required)

**Response:**
```json
{
    "success": true,
    "message": "Balasan berhasil disimpan!"
}
```

**Validation:**
- Seller can only reply to ratings for their own stands/items
- Reply text max 500 characters
- Can edit existing reply (ON DUPLICATE KEY UPDATE)

---

### Get Rating Replies
**GET** `/rate.php?action=getReplies&type=stand`

**Query Parameters:**
- `action`: `getReplies`
- `type`: `stand|menu` (required)

**Response:**
```json
{
    "success": true,
    "replies": [
        {
            "id": 1,
            "rating_id": 5,
            "reply_text": "Terima kasih atas review Anda!",
            "updated_at": "2026-05-18T12:00:00Z"
        }
    ]
}
```

---

### Submit Review
**POST** `/review.php`

**Parameters:**
- `action`: `add` (default)
- `menu_id`: int (required)
- `rating`: int 1-5 (required)
- `komentar`: string (optional)

**Response:**
```json
{
    "success": true,
    "message": "Review berhasil ditambahkan!"
}
```

---

## 🛒 Shopping Cart

### Get Cart Items
**GET** `/tray.php`

**Response:**
```json
{
    "items": [
        {
            "menu_id": 1,
            "qty": 2,
            "nama": "Nasi Rames",
            "harga": 15000,
            "stand_nama": "Warung Sejahtera"
        }
    ],
    "summary": {
        "subtotal": 30000,
        "tax": 3000,
        "total": 33000
    }
}
```

---

### Add to Cart
**POST** `/tray.php`

**Parameters:**
- `action`: `add`
- `menu_id`: int (required)
- `qty`: int (default: 1)

**Response:**
```json
{
    "success": true,
    "message": "Item ditambahkan ke tray!"
}
```

---

### Update Quantity
**POST** `/tray.php`

**Parameters:**
- `action`: `set_qty`
- `menu_id`: int (required)
- `qty`: int (required)

**Response:**
```json
{
    "items": [...],
    "summary": {...}
}
```

---

### Remove from Cart
**POST** `/tray.php`

**Parameters:**
- `action`: `remove`
- `menu_id`: int (required)

**Response:**
```json
{
    "success": true,
    "summary": {...}
}
```

---

## 👤 User Management

### Update Seller Profile
**POST** `/seller_profile.php`

**Parameters:**
- `nama`: string
- `tanggal_lahir`: date (YYYY-MM-DD)
- `deskripsi`: string
- `foto_profile`: file (JPG/PNG/WEBP, max 2MB)

**Response:**
```json
{
    "success": true,
    "message": "Profil berhasil diperbarui!",
    "photo_url": "uploads/seller_profile_123.jpg"
}
```

---

### Update Owner Profile
**POST** `/owner_action.php`

**Parameters:**
- `action`: `update_owner_profile`
- `nama`: string
- `tanggal_lahir`: date
- `deskripsi`: string
- `foto_profile`: file

---

## 👨‍💼 Owner Actions

### Approve/Reject Seller
**POST** `/owner_action.php`

**Parameters:**
- `action`: `update_seller`
- `id`: int (seller_id)
- `status`: `active|rejected`

**Response:**
```json
{
    "success": true,
    "message": "Status seller berhasil diupdate!"
}
```

---

### Delete Seller
**POST** `/owner_action.php`

**Parameters:**
- `action`: `delete_seller`
- `id`: int (seller_id)

---

### Delete User
**POST** `/owner_action.php`

**Parameters:**
- `action`: `delete_user`
- `id`: int (user_id)

---

### Delete Stand
**POST** `/owner_action.php`

**Parameters:**
- `action`: `delete_stand`
- `id`: int (stand_id)

---

## 🚪 Logout

### User Logout
**GET** `/logout.php`

---

### Seller Logout
**GET** `/seller_logout.php`

---

### Owner Logout
**GET** `/owner_logout.php`

---

## Error Handling

All endpoints return JSON with error messages:

```json
{
    "error": "Deskripsi error"
}
```

Common errors:
- `"Login dulu ya!"` - Not authenticated
- `"Data tidak valid"` - Invalid parameters
- `"Gagal upload gambar"` - File upload error
- `"Hanya seller yang bisa..."` - Permission denied

---

## Rate Limiting

No built-in rate limiting. Implement at application level if needed.

---

## File Upload

**Allowed Types:**
- Images: JPG, PNG, WEBP, GIF

**Limits:**
- Max size: 2MB
- Max filename: 255 characters
- Location: `/uploads/`

---

## CORS

Not configured. For cross-origin requests, configure CORS headers in `.htaccess` or PHP.

---

## Changelog

### v2.1 (May 18, 2026)
- Added rating reply endpoints
- Added stand limit validation (1 per seller)
- Enhanced rating system with seller responses

### v2.0
- Initial API release
- CRUD endpoints for stands, items, menu
- Rating & review system

---

**Last Updated**: May 18, 2026
