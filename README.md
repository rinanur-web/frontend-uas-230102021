# Sistem Informasi Kehadiran Mahasiswa

Project ini merupakan sistem frontend Laravel dan backend CodeIgniter 4 yang digunakan untuk mengelola data mahasiswa, dosen, matkul, kelas, user, serta mencatat kehadiran.

---

## 🔧 Cara Menjalankan Project

### ✅ Backend (CodeIgniter 4)

1. **Clone repo backend**
   ```bash
   git clone https://github.com/NalindraDT/Simon-kehadiran.git
   cd Simon-kehadiran
Jalankan server

    php spark serve
    
Backend akan berjalan di http://localhost:8080.

Note: Pastikan sudah konfigurasi .env dan database MySQL tersedia.

✅ Frontend (Laravel)
Clone repo frontend

    git clone https://github.com/namamu/frontend-nama-project.git
    cd frontend-nama-project

Install dependency

    composer install

Jalankan Laravel

    php artisan serve

Frontend akan berjalan di http://localhost:8000 atau http://127.0.0.1:8000.

📌 Endpoint Backend API (CodeIgniter 4)
A. Mahasiswa

    GET : http://localhost:8080/mahasiswa
    POST : http://localhost:8080/mahasiswa
    PUT : http://localhost:8080/mahasiswa/{npm}
    DELETE : http://localhost:8080/mahasiswa/{npm}

B. Dosen

    GET : http://localhost:8080/dosen
    POST : http://localhost:8080/dosen
    PUT : http://localhost:8080/dosen/{nidn}
    DELETE : http://localhost:8080/dosen/{nidn}

C. Kelas

    GET : http://localhost:8080/kelas
    POST : http://localhost:8080/kelas
    PUT : http://localhost:8080/kelas/{id_kelas}
    DELETE : http://localhost:8080/kelas/{id_kelas}

D. Matkul

    GET : http://localhost:8080/matkul
    POST : http://localhost:8080/matkul
    PUT : http://localhost:8080/matkul/{kode_matkul}
    DELETE : http://localhost:8080/matkul/{kode_matkul}

E. User

    GET : http://localhost:8080/user
    POST : http://localhost:8080/user
    PUT : http://localhost:8080/user/{id_user}
    DELETE : http://localhost:8080/user/{id_user}

F. Kehadiran

    GET : http://localhost:8080/kehadiran1
    POST : http://localhost:8080/kehadiran1
    PUT : http://localhost:8080/kehadiran1/{id_kehadiran}
    DELETE : http://localhost:8080/kehadiran1/{id_kehadiran}

G. Cetak

    GET : http://localhost:8080/kehadiran1/cetak

Endpoint ini hanya dapat digunakan di browser.

✍️ Author
Nama: Rina Nur
NIM: 230102021
Kelas: TI 2A
