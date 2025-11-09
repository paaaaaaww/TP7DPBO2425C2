# TP7DPBO2425C2
Saya Fauzia Rahma Nisa mengerjakan Tugas Praktikum 7 dalam mata kuliah Desain dan Pemrograman Berdasarkan Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

**1. Tema Website**
   Website ini dibuat untuk mengelola jadwal kerja pegawai pada perusahaan atau toko. Fitur utama:
   - Mengelola data pegawai (tambah, edit, hapus).
   - Mengelola data shift (tampil semua shift).
   - Mengelola jadwal shift pegawai (tambah, edit, hapus), dengan menghubungkan pegawai dan shift pada tanggal tertentu.
     
Tujuan: mempermudah penjadwalan pegawai, mencegah konflik jadwal, dan mempermudah monitoring shift kerja.

**2. Struktur Database**
a. Tabel pegawai 
Menyimpan informasi pegawai.
- id_pegawai INT -> Primary Key, auto increment
- nama	VARCHAR(100) -> Nama pegawai
- jabatan	VARCHAR(50)	-> Posisi pegawai
- no_hp	VARCHAR(15)	-> Nomor HP pegawai

b. Tabel shift
Menyimpan unformasi shift kerja
- id_shift INT -> Primary Key, auto increment
- nama_shift	VARCHAR(50)	-> Nama shift (Pagi, Siang, Malam)
- jam_mulai	TIME -> Jam mulai shift
- jam_selesai	TIME -> Jam selesai shift

c. Tabel jadwal_shift
Menyimpan jadwal shift pegawai.
- id_jadwal	INT	-> Primary Key, auto increment
- id_pegawai	INT	-> Foreign Key ke pegawai(id_pegawai)
- id_shift	INT	-> Foreign Key ke shift(id_shift)
- tanggal	DATE -> Tanggal shift
  
**3. flow dari code**
**4. Dokumentasi**
