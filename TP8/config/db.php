<?php
// kelas database 
class Database {
// properti koneksi database
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "db_pegawai";
    public $conn;

    // konstruktor
    public function __construct() {
        try {
        // membuat koneksi ke db menggunakan PDO
            $this->conn = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
        // menampilkan pesan error jika koneksi gagal
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
?>
