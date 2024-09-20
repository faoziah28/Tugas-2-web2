<?php
// Meng-include file 'database.php' agar kelas 'Izin' bisa menggunakan kelas 'database'.
include('izin.php');
//membuat intance dari database
$db = new Izin();
//mengambil data dari  tabel
$data_baru = $db->tampil_data();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Tabel Permohonan Izin</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        
        <li class="nav-item">
          <a class="nav-link" href="tampil.php">Tampil Izin Semua</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tampilizin_kajur.php">Tampil Izin Kajur</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tampilizin_sekjur.php">Tampil Izin Sekjur</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tampil_tgs.php">Tampil semua Transportasi</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
	<div class="row">
	<table class="table">
  <thead>
    <tr>
			<th>No</th>
			<th>Izin</th>
			<th>Nama Dosen</th>
			<th>NIP</th>
			<th>Pangakat Jabatan</th>
			<th>Jabatan</th>
			<th>Unit Kerja</th>
			<th>Dosen Id</th>
    </tr>
  </thead>
  		<?php 
		$no = 1;
		foreach($data_baru as $row){
			?>
  <tbody>
    <tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $row['izin_id']; ?></td>
				<td><?php echo $row['nama_dsn']; ?></td>
				<td><?php echo $row['nip']; ?></td>
				<td><?php echo $row['pangkat_jabatan']; ?></td>
				<td><?php echo $row['jabatan']; ?></td>
				<td><?php echo $row['unit_kerja']; ?></td>
				<td><?php echo $row['dosen_id']; ?></td>
    </tr>
	<?php 
		}
		?>
  </tbody>
</table>
	</div>
</body>
</html>