<?php
    // Kelas 'izinsekjur' mewarisi kelas 'database'.
    // Kelas ini bertanggung jawab untuk mengambil data dari tabel 'izin' di mana 'pangkat_jabatan' adalah 'sekjur'.
    class izinsekjur extends database {

        // Fungsi 'tampil_data' mengimplementasikan metode abstrak dari kelas 'database'.
        // Fungsi ini digunakan untuk mengambil data berdasarkan kondisi tertentu dari tabel 'izin'.
        function tampil_data()
        {
            // Inisialisasi variabel array kosong yang nantinya akan diisi dengan hasil query.
            $hasil = [];

            // Query SQL untuk mengambil semua data dari tabel 'izin' di mana 'pangkat_jabatan' adalah 'sekjur'.
            // Fungsi mysqli_query digunakan untuk menjalankan query SQL.
            // Properti '$koneksi' yang digunakan berasal dari kelas induk 'database'.
            $data = mysqli_query($this->koneksi, "SELECT * FROM izin WHERE pangkat_jabatan='sekjur'");

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
