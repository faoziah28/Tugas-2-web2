<?php 
// Meng-include file 'database.php' agar kelas 'Izin' bisa menggunakan kelas 'database'.
include('database.php');
// Meng-include file 'tugas.php' agar kelas 'Izin' bisa menggunakan kelas 'tugas'.
include('tugas.php');

//membuat intance dari database
$db = new tugas();
//mengambil data dari  tabel
$data_baru = $db->tampil_data();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Data Persuratan Dosen</title>
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
		<li class="nav-item">
          <a class="nav-link" href="tampil.php">Tampil Izin Semuanya</a>
        </li>
          <a class="nav-link" href="tampilizin_kajur.php">Tampil Izin Kajur</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tampilizin_sekjur.php">Tampil Izin Sekjur</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tampil_transportasi.php">Transportasi mobil</a>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tampil_tgs.php">Semua transportasi</a>
        </li>
        <!--<li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>-->
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
			<th>Surat Tugas</th></th>
			<th>Nomor</th>
			<th>Nama Dosen</th>
			<th>Tanggal Surat Tugas</th>
			<th>Tujuan</th>
			<th>Transportasi</th>
			<th>Keperluan</th>
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
				<td><?php echo $row['surat_tugas']; ?></td>
				<td><?php echo $row['nomor']; ?></td>
				<td><?php echo $row['nama_dsn']; ?></td>
				<td><?php echo $row['tgl_surat_tugas']; ?></td>
				<td><?php echo $row['tujuan']; ?></td>
				<td><?php echo $row['transportasi']; ?></td>
				<td><?php echo $row['keperluan']; ?></td>
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