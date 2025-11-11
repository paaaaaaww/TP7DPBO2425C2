<?php
// kelas database 
class Database {
// properti koneksi database
    private $host = "localhost";  // Alamat server database
    private $username = "root";   // Username MySQL
    private $password = "";  // Password MySQL
    private $dbname = "db_pegawai"; // Nama database yang ingin dihubungkan
    public $conn; // Properti untuk menyimpan objek koneksi PDO

    // konstruktor
    public function __construct() {
        try {
        // membuat koneksi ke db menggunakan PDO
            $this->conn = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname",
                $this->username,
                $this->password
            );
            // Mengatur mode error
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
        // menampilkan pesan error jika koneksi gagal
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
?>

