<?php
require_once 'config/db.php'; // koneksi ke database

class Shift {
    private $db;

    // konstruktor
    public function __construct() {
        $this->db = (new Database())->conn;
    }

    // ambil semua shift
    public function getAllShift() {
        $stmt = $this->db->query("SELECT * FROM shift");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // tambah shift baru
    public function addShift($nama, $jam_mulai, $jam_selesai) {
        $stmt = $this->db->prepare("INSERT INTO shift (nama_shift, jam_mulai, jam_selesai) VALUES (?, ?, ?)");
        return $stmt->execute([$nama, $jam_mulai, $jam_selesai]);
    }

    // update data shift
    public function updateShift($id, $nama, $jam_mulai, $jam_selesai) {
        $stmt = $this->db->prepare("UPDATE shift SET nama_shift = ?, jam_mulai = ?, jam_selesai = ? WHERE id_shift = ?");
        return $stmt->execute([$nama, $jam_mulai, $jam_selesai, $id]);
    }

    // hapus shift
    public function deleteShift($id) {
        $stmt = $this->db->prepare("DELETE FROM shift WHERE id_shift = ?");
        return $stmt->execute([$id]);
    }
}
?>
