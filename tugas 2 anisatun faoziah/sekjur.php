<?php
// Meng-include file 'database.php' agar kelas 'sekjur' bisa menggunakan koneksi database dari kelas 'database'.
include('database.php');

// Kelas 'sekjur' mewarisi kelas 'database'.
// Kelas ini digunakan untuk mengambil data dari tabel 'izin'.
class sekjur extends database {

    // Fungsi 'tampil_data' untuk mengambil semua data dari tabel 'izin'.
    function tampil_data()
    {
        // Inisialisasi variabel array kosong yang nantinya akan diisi dengan hasil query.
        $hasil = []; 

        // Query SQL untuk mengambil semua data dari tabel 'izin'.
        $data = mysqli_query($this->koneksi, "SELECT * FROM izin");

        // Loop untuk memproses setiap baris hasil query.
        while($row = mysqli_fetch_array($data)){
            // Setiap baris hasil ditambahkan ke dalam array '$hasil'.
            $hasil[] = $row;
        }

        // Mengembalikan array yang berisi data dari tabel 'izin'.
        return $hasil;
    }
}

// Membuat instance baru dari kelas 'sekjur'.
$sekjur1 = new sekjur();

// Kesalahan di sini: nama variabel salah pada pemanggilan fungsi.
// Baris ini akan menghasilkan kesalahan.
// Perbaiki dengan mengganti '$tampil$sekjur1->tampil_data();' menjadi:
$tampil = $sekjur1->tampil_data(); 

// Tambahan: jika Anda ingin menampilkan hasilnya, gunakan var_dump atau print_r:
print_r($tampil);
?>
