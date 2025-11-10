<?php
require_once 'config/db.php'; // mengimpor file koneksi database

class Pegawai {
    private $db;

     // konstruktor
    public function __construct() {
        $this->db = (new Database())->conn;
    }
    // mengambil semua data pegawai dri tabel pegawai
    public function getAllPegawai() {
        $stmt = $this->db->query("SELECT * FROM pegawai");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // menambahkan data pegawai baruu ke db
    public function addPegawai($nama, $jabatan, $no_hp) {
        $stmt = $this->db->prepare("INSERT INTO pegawai (nama, jabatan, no_hp) VALUES (?, ?, ?)");
        return $stmt->execute([$nama, $jabatan, $no_hp]);
    }
     // mengubah data pegawai berdasarkan ID pegawai
    public function updatePegawai($id, $nama, $jabatan, $no_hp) {
        $stmt = $this->db->prepare("UPDATE pegawai SET nama = ?, jabatan = ?, no_hp = ? WHERE id_pegawai = ?");
        return $stmt->execute([$nama, $jabatan, $no_hp, $id]);
    }
    // menghapus data pegawai berdasarkan ID pegawai
    public function deletePegawai($id) {
        $stmt = $this->db->prepare("DELETE FROM pegawai WHERE id_pegawai = ?");
        return $stmt->execute([$id]);
    }
}
?>
