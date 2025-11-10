<?php
require_once 'config/db.php'; // mengimpor file koneksi database

class JadwalShift {
    private $db;

    // konstruktor
    public function __construct() {
        $this->db = (new Database())->conn;
    }
    // mengambil semua data jadwal shift dari database dengan join ke tabel pegawai dan shift
    public function getAllJadwal() {
        $stmt = $this->db->query("
            SELECT j.id_jadwal, p.nama AS nama_pegawai, s.nama_shift, s.jam_mulai, s.jam_selesai, j.tanggal
            FROM jadwal_shift j
            JOIN pegawai p ON j.id_pegawai = p.id_pegawai
            JOIN shift s ON j.id_shift = s.id_shift
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // menambahkan data jadwal baru ke tabel jadwal_shift
    public function addJadwal($idPegawai, $idShift, $tanggal) {
        $stmt = $this->db->prepare("INSERT INTO jadwal_shift (id_pegawai, id_shift, tanggal) VALUES (?, ?, ?)");
        return $stmt->execute([$idPegawai, $idShift, $tanggal]);
    }

    // mengbah data jadwal berdasarkan id_jadwal
    public function updateJadwal($idJadwal, $idPegawai, $idShift, $tanggal) {
        $stmt = $this->db->prepare("UPDATE jadwal_shift SET id_pegawai = ?, id_shift = ?, tanggal = ? WHERE id_jadwal = ?");
        return $stmt->execute([$idPegawai, $idShift, $tanggal, $idJadwal]);
    }

     // menghapus jadwal shift berdasar id_jadwal
    public function deleteJadwal($id) {
        $stmt = $this->db->prepare("DELETE FROM jadwal_shift WHERE id_jadwal = ?");
        return $stmt->execute([$id]);
    }

    // mengambil satu data jadwal berdasarkan id_jadwal
    public function getJadwalById($id) {
        $stmt = $this->db->prepare("SELECT * FROM jadwal_shift WHERE id_jadwal = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
