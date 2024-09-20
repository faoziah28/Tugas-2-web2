<?php
// Membuat kelas abstrak 'database', sehingga tidak bisa diinstansiasi langsung.
// Kelas ini mengandung properti dan metode dasar untuk koneksi ke database.
abstract class database {
 
    // Deklarasi properti private yang berisi detail koneksi ke database.
    // 'host', 'username', 'password', dan 'database' digunakan untuk koneksi MySQL.
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "dosen";

    // Properti protected yang dapat diakses oleh kelas turunan untuk menyimpan objek koneksi MySQLi.
    protected $koneksi = "";

    // Konstruktor otomatis dipanggil saat objek kelas dibuat.
    // Ini mencoba untuk menghubungkan ke database menggunakan `mysqli_connect`.
    function __construct() {
        // Melakukan koneksi ke MySQL menggunakan parameter yang telah ditentukan.
        // Objek koneksi disimpan dalam properti $koneksi.
        $this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);

        // Jika koneksi gagal, tampilkan pesan kesalahan menggunakan `mysqli_connect_error()`.
        if (mysqli_connect_errno()) {
            echo "Koneksi database gagal : " . mysqli_connect_error();
        }
    }

    // Deklarasi fungsi abstrak yang harus diimplementasikan oleh kelas turunan.
    // Fungsi ini dibiarkan kosong di sini karena harus di-override di kelas anak.
    abstract function tampil_data();
}

?>