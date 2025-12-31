# 🗳️ Votely - Sistem Voting Digital Berbasis Web

Votely adalah aplikasi sistem voting digital berbasis web yang dibangun menggunakan **Laravel**.  
Aplikasi ini mendukung **autentikasi pengguna**, **manajemen polling**, **voting**, serta **laporan hasil voting** yang hanya dapat diakses oleh admin.

---

## 🚀 Fitur Utama:

### 👤 User
- Registrasi & Login
- Melihat polling yang sedang aktif
- Melakukan voting (1 user hanya dapat vote 1 kali per polling)
- Logout

### 🛠️ Admin
- Login Admin
- CRUD Polling
- Mengaktifkan / menonaktifkan polling
- Melihat hasil polling
- Generate laporan hasil polling (PDF)
- Manajemen user (CRUD user)

---

## 🔐 Hak Akses
| Role  | Akses |
|------|------|
| User | Voting |
| Admin | Manajemen polling, user, dan laporan |

---

## 🧱 Teknologi yang Digunakan
- **Laravel 12**
- **PHP 8.2**
- **MySQL**
- **Tailwind CSS**
- **Laravel Breeze (Authentication)**

---

## 📂 Struktur Fitur
/admin
├── polls (CRUD Polling)
├── users (Manajemen User)
└── reports (Laporan PDF)

/polls
└── voting user

---

## ⚙️ Cara Menjalankan Aplikasi
### 1️⃣ Clone Repository

```bash
git clone https://github.com/username/voting-app.git
cd voting-app
```
### 2️⃣ Install Dependency
```bash
composer install
npm install
npm run build
```

### 3️⃣ Konfigurasi Environment
```bash
cp .env.example .env
php artisan key:generate
```

#### Atur koneksi database di file .env:
DB_DATABASE=voting_db
DB_USERNAME=root
DB_PASSWORD=

### 4️⃣ Migrasi Database
```bash
php artisan migrate
```

### 5️⃣ Jalankan Server
```bash
php artisan serve
```

## Akses aplikasi di:
```bash
http://127.0.0.1:8000
```

# 👨‍💻 Developer

Ahmad Rizky Waluyo
Project Sistem Voting 
Tahun 2025
