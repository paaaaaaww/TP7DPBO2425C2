
CREATE DATABASE IF NOT EXISTS db_pegawai;
USE db_pegawai;

-- tabel pegawai

CREATE TABLE pegawai (
    id_pegawai INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    jabatan VARCHAR(50) NOT NULL,
    no_hp VARCHAR(15)
);

-- tabel shift

CREATE TABLE shift (
    id_shift INT AUTO_INCREMENT PRIMARY KEY,
    nama_shift VARCHAR(50) NOT NULL,
    jam_mulai TIME NOT NULL,
    jam_selesai TIME NOT NULL
);

-- tabel jadwal shift

CREATE TABLE jadwal_shift (
    id_jadwal INT AUTO_INCREMENT PRIMARY KEY,
    id_pegawai INT NOT NULL,
    id_shift INT NOT NULL,
    tanggal DATE NOT NULL,
    FOREIGN KEY (id_pegawai) REFERENCES pegawai(id_pegawai)
        ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_shift) REFERENCES shift(id_shift)
        ON DELETE CASCADE ON UPDATE CASCADE
);

-- data awal

INSERT INTO pegawai (nama, jabatan, no_hp) VALUES
('Andi Saputra', 'Kasir', '081234567890'),
('Budi Santoso', 'Barista', '082233445566'),
('Citra Ayu', 'Cleaner', '083344556677');

INSERT INTO shift (nama_shift, jam_mulai, jam_selesai) VALUES
('Pagi', '07:00:00', '15:00:00'),
('Siang', '15:00:00', '23:00:00'),
('Malam', '23:00:00', '07:00:00');

INSERT INTO jadwal_shift (id_pegawai, id_shift, tanggal) VALUES
(1, 1, '2025-11-08'),
(2, 2, '2025-11-08'),
(3, 3, '2025-11-08');
