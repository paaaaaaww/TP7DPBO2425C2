<?php
// mengimpor file class yang dibutuhkan
require_once 'class/Pegawai.php';
require_once 'class/Shift.php';
require_once 'class/JadwalShift.php';

// membuat objek dari masing" class agar bisa digunakan
$pegawai = new Pegawai();
$shift = new Shift();
$jadwal = new JadwalShift();

// CRUD pegawai
// tambah data
if (isset($_POST['tambah_pegawai'])) {
    $pegawai->addPegawai($_POST['nama'], $_POST['jabatan'], $_POST['no_hp']);
}
// edit data
if (isset($_POST['edit_pegawai'])) {
    $pegawai->updatePegawai($_POST['id_pegawai'], $_POST['nama'], $_POST['jabatan'], $_POST['no_hp']);
}
// hapus data
if (isset($_GET['hapus_pegawai'])) {
    $pegawai->deletePegawai($_GET['hapus_pegawai']);
    header("Location: ?page=pegawai");
    exit;
}

// CRUD Jadwal Shift
// tambah data
if (isset($_POST['tambah_jadwal'])) {
    $jadwal->addJadwal($_POST['id_pegawai'], $_POST['id_shift'], $_POST['tanggal']);
}
// edit data
if (isset($_POST['edit_jadwal'])) {
    $jadwal->updateJadwal($_POST['id_jadwal'], $_POST['id_pegawai'], $_POST['id_shift'], $_POST['tanggal']);
}
// hapus data
if (isset($_GET['hapus_jadwal'])) {
    $jadwal->deleteJadwal($_GET['hapus_jadwal']);
    header("Location: ?page=jadwal");
    exit;
}

// CRUD Shift
// Shift (hanya edit)
if (isset($_POST['edit_shift'])) {
    $shift->updateShift($_POST['id_shift'], $_POST['nama_shift'], $_POST['jam_mulai'], $_POST['jam_selesai']);
}

// tampilan (view)
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Manajemen Shift Pegawai</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'view/header.php'; ?>
    <main>
        <h2>🕒 Sistem Manajemen Shift Pegawai</h2>

        <nav>
            <a href="?page=pegawai">Pegawai</a> |
            <a href="?page=shift">Shift</a> |
            <a href="?page=jadwal">Jadwal Shift</a>
        </nav>
        <hr>

        <?php

        // routing halaman untuk menentukan hal manan yang akan ditampilkan berdasarkan parameter "page" di URL
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            if ($page == 'pegawai') {
                include 'view/pegawai.php';
            } elseif ($page == 'shift') {
                include 'view/shift.php'; // cuma tampil daftar shift
            } elseif ($page == 'jadwal') {
                include 'view/jadwal.php';
            } else {
                echo "<p>Halaman tidak ditemukan.</p>";
            }
        } else {
            // halaman default saat pertama kali dibuka
            echo "<p>Selamat datang! Pilih menu di atas untuk mengelola data.</p>";
        }
        ?>
    </main>
    <?php include 'view/footer.php'; ?>
</body>
</html>

