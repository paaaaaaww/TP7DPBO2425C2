<?php
require_once 'config/db.php'; // mengimpor file koneksi database

class Shift {
    private $db;

    // konstruktor
    public function __construct() {
        $this->db = (new Database())->conn;
    }
    // mengambil semua data shift
    public function getAllShift() {
        $stmt = $this->db->query("SELECT * FROM shift");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>


