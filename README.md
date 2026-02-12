# 📦 Inventory Management & E-Commerce Showcase

Sistem Manajemen Inventaris berbasis web yang dikembangkan menggunakan **Laravel 11**. Aplikasi ini dirancang untuk memenuhi kebutuhan administratif melalui **Admin Panel** yang kuat, sekaligus menyajikan katalog produk dinamis bergaya **E-Commerce** untuk pengguna umum.

---

## 🚀 Fitur Utama

Aplikasi ini mencakup seluruh kriteria fungsional yang dipersyaratkan:

* **Role-Based Access Control (RBAC)**: Pemisahan hak akses antara **Admin** (Manajemen data kategori & produk) dan **User** (Akses katalog & detail produk).
* **Katalog Produk Dinamis**: Dashboard bergaya e-commerce dengan fitur **Filter Kategori** menggunakan relasi database.
* **Manajemen CRUD Lengkap**: Pengelolaan data produk dan kategori dengan relasi **One-to-Many**.
* **Sistem Unggah Foto**: Integrasi *Laravel Storage* untuk manajemen foto produk yang responsif.
* **Pencarian Efisien**: Fitur pencarian produk berdasarkan nama pada halaman manajemen.
* **UI/UX Modern**: Antarmuka bersih dan responsif menggunakan **Tailwind CSS** dan **Laravel Breeze**.

---

## 📸 Pratinjau Antarmuka

### 1. Dashboard (Tampilan User)

Tampilan katalog produk dengan sistem filter kategori untuk memudahkan pencarian pengguna.
<img width="1410" height="701" alt="Screenshot 2026-02-12 at 07 29 34" src="https://github.com/user-attachments/assets/51659e7c-c6fe-4ed3-89d5-0fa474df6ea7" />

### 2. Manajemen Produk dan Kategori (Tampilan Admin)

Halaman kontrol administratif untuk mengelola stok, harga, dan kategori produk.
<img width="1410" height="701" alt="Screenshot 2026-02-12 at 07 27 17" src="https://github.com/user-attachments/assets/c3322f49-71b9-43d3-b7c4-eed7dd561946" />
<img width="1410" height="701" alt="Screenshot 2026-02-12 at 07 27 59" src="https://github.com/user-attachments/assets/37b3a9a0-702b-4978-9e63-4d0fb5904273" />

### 3. Detail Produk

Informasi mendalam mengenai spesifikasi produk beserta kategori terkait.
<img width="1410" height="701" alt="Screenshot 2026-02-12 at 07 28 34" src="https://github.com/user-attachments/assets/ee9b3af3-f2ec-42ad-a92f-57eeba352ea9" />

---

## 🛠️ Stack Teknologi

* **Framework:** Laravel 11
* **Frontend:** Tailwind CSS, Alpine.js (Laravel Breeze)
* **Database:** MySQL
* **Tools:** Composer, NPM, Postman (untuk API Testing)

---

## 📂 Arsitektur & Database

Aplikasi ini menerapkan pola **MVC (Model-View-Controller)** untuk memastikan kode yang bersih dan terorganisir.

### Relasi Database

Relasi **One-to-Many** diterapkan pada tabel `categories` dan `products`, di mana satu kategori dapat menaungi berbagai macam produk.
<img width="569" height="373" alt="Screenshot 2026-02-12 at 00 48 08" src="https://github.com/user-attachments/assets/d29462f3-5bbf-43ed-9ff8-ff66f8129954" />


---

## 🧪 Testing API (Postman)

Sesuai dengan kriteria pengujian, endpoint aplikasi telah diuji menggunakan **Postman** untuk memastikan data dikirimkan dalam format JSON yang valid.

* **Endpoint:** `GET /list-products` (Internal Request)
* **Status:** `200 OK`
* **Format:** JSON
<img width="862" height="701" alt="Screenshot 2026-02-12 at 07 46 49" src="https://github.com/user-attachments/assets/253f964a-f7a6-42ec-b1e5-9149270870a2" />

---

## ⚙️ Instalasi Proyek

Ikuti langkah berikut untuk menjalankan proyek di lingkungan lokal:

1. **Clone Repositori**
```bash
git clone https://github.com/username/inventory-system.git
cd inventory-system

```


2. **Instal Dependensi**
```bash
composer install
npm install && npm run build

```


3. **Konfigurasi .env**
Salin `.env.example`, buat database baru, dan sesuaikan pengaturannya.
```bash
cp .env.example .env
php artisan key:generate

```


4. **Migrasi & Storage Link**
```bash
php artisan migrate --seed
php artisan storage:link

```


5. **Jalankan Aplikasi**
```bash
php artisan serve

```



---

## 🛡️ Error Handling & Validasi

Keamanan dan integritas data adalah prioritas utama. Aplikasi ini dilengkapi dengan:

* **Server-side Validation**: Memastikan setiap input (termasuk ukuran file foto max 2MB) sesuai dengan standar sebelum masuk ke database.
* **Eloquent Protection**: Menggunakan properti `$fillable` pada Model untuk mencegah *Mass Assignment Vulnerability*.
* **User Feedback**: Pesan error yang informatif di sisi frontend untuk memandu pengguna saat terjadi kesalahan input.

---

## 👨‍💻 Profil Pengembang

**Shendy Tria Amelyana**
*Full Stack Developer*
