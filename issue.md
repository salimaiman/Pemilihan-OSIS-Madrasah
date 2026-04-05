# Planning Melanjutkan Project: Pemilihan OSIS Madrasah

Berikut adalah rencana (planning) langkah-langkah untuk melanjutkan pengembangan dan penyelesaian proyek ini:

## 1. Persiapan Lingkungan Pengembangan (Development Setup)
- [ ] **Konfigurasi Database:**
  - Buat database baru di MySQL lokal (misal: `pilketos_madrasah`).
  - Import struktur tabel dan data awal dari file `pilketos_madrasah.sql`.
  - Sesuaikan konfigurasi database pada file `application/config/database.php` (hostname, username, password, dan nama database).
- [ ] **Konfigurasi Base URL:**
  - Sesuaikan `base_url` pada file `application/config/config.php` dengan URL lokal (contoh: `http://localhost/pemilihan-ketua-osis/` atau `http://localhost:8000/`).

## 2. Pengecekan Fitur Saat Ini (Code Audit)
- [ ] **Modul Autentikasi (`Auth.php`):**
  - Pastikan proses login Admin dan Pemilih (Siswa) berjalan lancar.
  - Cek keamanan session dan validasi form.
- [ ] **Modul Admin (`Admin.php`):**
  - **Dashboard:** Periksa apakah grafik dan data statistik berfungsi serta dinamis dari database.
  - **Kandidat:** Tes proses Tambah (Upload foto kandidat), Edit (jika ada), dan Hapus Kandidat.
  - **Data Pemilih:** Coba fungsionalitas Import file Excel (menggunakan `PhpSpreadsheet`) untuk memastikan data siswa bisa masuk ke database.
  - **Laporan:** Cek tampilan hasil pemungutan suara apakah akurat perhitungannya.
- [ ] **Modul Pemilih (User Area):**
  - Periksa UI/UX saat siswa login untuk memilih kandidat, pastikan 1 siswa hanya bisa memilih 1 kali (menghindari *double voting*).

## 3. Pengembangan & Perbaikan (Development Phase)
- [ ] **Perbaikan UI/UX:** 
  - Pastikan desain responsif untuk digunakan pada perangkat mobile (HP), mengingat pemilih mungkin menggunakan smartphone mereka.
  - Sesuaikan kesesuaian antara aplikasi dengan desain figma yang tertera di `README.md`.
- [ ] **Penambahan Fitur (Opsional/Tergantung Kebutuhan):**
  - Export hasil laporan pemungutan suara menjadi format PDF atau Excel.
  - Halaman hitung cepat (Quick Count) secara *real-time* atau publik tanpa perlu login.
  - Manajemen akun Admin tambahan.

## 4. Pengujian & Deployment (Testing)
- [ ] Lakukan *User Acceptance Testing* menggunakan data dummy untuk memastikan tidak ada error pada proses *voting* serentak.
- [ ] Ubah environment di `index.php` dari `development` menjadi `production` sebelum proyek dirilis atau dideploy.
- [ ] Konfigurasi file `.htaccess` atau setting server (Apache/Nginx) di hosting apabila aplikasi akan di-online-kan.
