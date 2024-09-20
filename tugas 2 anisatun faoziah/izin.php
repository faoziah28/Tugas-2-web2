<?php
// Meng-include file 'database.php' agar kelas 'Izin' bisa menggunakan kelas 'database'.
include('database.php');

// Kelas 'Izin' mewarisi kelas 'database'.
// Kelas ini digunakan untuk mengambil data dari tabel 'izin' di database.
class Izin extends database {

    // Fungsi 'tampil_data' mengimplementasikan metode abstrak dari kelas 'database'.
    // Fungsi ini digunakan untuk mengambil semua data dari tabel 'izin'.
    function tampil_data()
    {
        // Inisialisasi variabel array kosong yang nantinya akan diisi dengan hasil query.
        $hasil = [];

        // Query SQL untuk mengambil semua data dari tabel 'izin'.
        // Fungsi mysqli_query digunakan untuk menjalankan query, menggunakan properti '$koneksi' dari kelas induk.
        $data = mysqli_query($this->koneksi, "SELECT * FROM izin");

        // Loop untuk memproses setiap baris hasil query.
        // Setiap baris hasil disimpan sebagai array ke dalam variabel '$hasil'.
        while($row = mysqli_fetch_array($data)) {
            // Menambahkan setiap baris hasil ke dalam array '$hasil'.
            $hasil[] = $row;
        }

        // Mengembalikan array berisi data yang telah diambil dari database.
        return $hasil;
    }
}
?>
