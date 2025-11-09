# TP7DPBO2425C2
Saya Fauzia Rahma Nisa mengerjakan Tugas Praktikum 7 dalam mata kuliah Desain dan Pemrograman Berdasarkan Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

**1. Tema Website**

   Website ini dibuat untuk mengelola jadwal kerja pegawai pada perusahaan atau toko. Fitur utama:
   - Mengelola data pegawai (tambah, edit, hapus).
   - Mengelola data shift (tampil semua shift).
   - Mengelola jadwal shift pegawai (tambah, edit, hapus), dengan menghubungkan pegawai dan shift pada tanggal tertentu.
     
Tujuan: mempermudah penjadwalan pegawai, mencegah konflik jadwal, dan mempermudah monitoring shift kerja.

**2. Struktur Database**

a. Tabel pegawai (Menyimpan informasi pegawai)

- id_pegawai INT -> Primary Key, auto increment
- nama	VARCHAR(100) -> Nama pegawai
- jabatan	VARCHAR(50)	-> Posisi pegawai
- no_hp	VARCHAR(15)	-> Nomor HP pegawai

b. Tabel shift (Menyimpan unformasi shift kerja)

- id_shift INT -> Primary Key, auto increment
- nama_shift	VARCHAR(50)	-> Nama shift (Pagi, Siang, Malam)
- jam_mulai	TIME -> Jam mulai shift
- jam_selesai	TIME -> Jam selesai shift

c. Tabel jadwal_shift (Menyimpan jadwal shift pegawai)

- id_jadwal	INT	-> Primary Key, auto increment
- id_pegawai	INT	-> Foreign Key ke pegawai(id_pegawai)
- id_shift	INT	-> Foreign Key ke shift(id_shift)
- tanggal	DATE -> Tanggal shift

Relasi : 
- jadwal_shift.id_pegawai → pegawai.id_pegawai
- jadwal_shift.id_shift → shift.id_shift

Data awal contoh:

3 pegawai: Andi, Budi, Citra

3 shift: Pagi, Siang, Malam

3 jadwal shift sesuai data pegawai dan shift

**3. flow dari code**

Website ini menggunakan konsep Object-Oriented Programming (OOP). Pertama, koneksi ke database dibuat melalui file config/db.php menggunakan PDO, sehingga semua query ke database aman dan menggunakan prepared statement untuk mencegah SQL injection.

Setiap tabel memiliki class masing-masing di folder class/. Class Pegawai mengatur semua operasi CRUD untuk data pegawai, class Shift hanya menampilkan daftar shift, sedangkan class JadwalShift mengatur CRUD untuk jadwal shift pegawai. Dengan begitu, setiap operasi database terorganisir dan mudah dipanggil melalui method di masing-masing class.

File index.php menjadi titik masuk utama. Di sini, semua class dipanggil dan digunakan untuk menangani input dari user, baik itu add, update, maupun delete data. index.php juga mengatur routing sederhana: berdasarkan parameter $_GET['page'], website akan menampilkan halaman Pegawai, Shift, atau Jadwal Shift.

Di sisi tampilan, folder view/ berisi file PHP untuk setiap halaman. Form untuk menambah atau mengedit data ditampilkan menggunakan HTML, sedangkan tabel menampilkan semua data dari database. Untuk jadwal shift, data pegawai dan shift digabungkan menggunakan JOIN sehingga terlihat informasi lengkap pegawai, shift, dan waktunya.

CSS di file style.css memastikan tampilan website rapi dan mudah digunakan. Tombol aksi, form, dan tabel diberikan style agar user dapat dengan mudah menavigasi dan melakukan operasi CRUD tanpa kebingungan.

**4. Dokumentasi**
