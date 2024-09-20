<?php
// Kelas 'tugas' mewarisi semua fungsi dan properti dari kelas 'database'.
class tugas extends database{

    function tampil_data()
	{
		$hasil = []; 
		$data = mysqli_query($this->koneksi, "select * from surat_tgs");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
	}
}


?>