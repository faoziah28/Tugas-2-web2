<?php
// Kelas 'izinKajur' mewarisi kelas 'database'.
// Kelas ini harus mengimplementasikan fungsi abstrak 'tampil_data' dari kelas 'database'.
class izinKajur extends database {

    // Fungsi 'tampil_data' mengimplementasikan metode abstrak dari kelas 'database'.
    // Fungsi ini digunakan untuk mengambil data dari tabel 'izin' dengan kondisi 'pangkat_jabatan' adalah 'kajur'.
    function tampil_data()
    {
        // Inisialisasi variabel array kosong yang nantinya akan diisi dengan hasil query.
        $hasil = []; 
        
        // Query SQL untuk mengambil semua data dari tabel 'izin' di mana 'pangkat_jabatan' adalah 'kajur'.
        // Menggunakan koneksi yang sudah disediakan oleh kelas 'database' melalui properti '$koneksi'.
        $data = mysqli_query($this->koneksi, "SELECT * FROM izin WHERE pangkat_jabatan='kajur'");
        
        // Loop untuk memproses setiap baris hasil query.
        // Setiap baris hasil disimpan sebagai array ke dalam variabel '$hasil'.
        while($row = mysqli_fetch_array($data)) {
            $hasil[] = $row; // Menambahkan baris hasil ke dalam array '$hasil'.
        }

        // Mengembalikan array berisi data yang telah diambil dari database.
        return $hasil;
    } 
}
?>