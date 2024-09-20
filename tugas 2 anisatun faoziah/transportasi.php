<?php
	// Kelas 'transportasi' mewarisi semua fungsi dan properti dari kelas 'database'.
    class transportasi extends database {
        function tampil_data()
	{
		$hasil = []; 
		$data = mysqli_query($this->koneksi, "select * from surat_tgs where transportasi ='mobil'");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
	} 
    }

?>