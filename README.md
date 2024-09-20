## Tugas 2 Study Kasus

Nama  : Anisatun Faoziah Afni Nurjanah
Kelas : TI 2D
NPM   : 230302075

1. Membuat Project OOP dengan View Based menggunakan 2 tabel Surat Tugas dan Surat Ijin yang ada pada database persuratan_dosen yang database nya
   saya beri nama dosen pada phpmyadmin
2.Membuat koneksi di dalam method __construct() didalam class Parent/Superclass
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
3. Menerapkan enkapsulasi

                private $host = "localhost";
                private $username = "root";
                private $password = "";
                private $database = "dosen";
   keamanan Data: Dengan mendefinisikan properti sebagai private, data tersebut hanya dapat diakses di dalam kelas itu sendiri.
   Hal ini meningkatkan keamanan, karena informasi sensitif seperti kredensial database tidak dapat diakses langsung dari luar kelas.

      Penyimpanan Informasi Koneksi Database: Properti-properti ini digunakan untuk menyimpan informasi penting yang dibutuhkan 
  untuk melakukan koneksi ke database MySQL. 
  Ketika kelas mencoba menghubungkan diri ke database (biasanya menggunakan fungsi seperti mysqli_connect), 
  properti ini akan dipanggil untuk menyuplai informasi koneksi yang tepat.

4. Membuat kelas turunan menggunakan konsep Inheritance (Pewarisan)
   berikut salah satu condoh kodingan yg menggunakan kelas turunan
   
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


5. Menerapkan konsep Polymorphisme dalam project, setidaknya untuk 2 peran
           <?php 
            // Meng-include file 'database.php' agar kelas 'Izin' bisa menggunakan kelas 'database'.
            include('database.php');
            // Meng-include file 'izin_kajur.php' agar kelas 'Izin' bisa menggunakan kelas 'database'.
            include('izin_kajur.php');

          //membuat intance dari database
            $db = new izinKajur();
          //mengambil data dari  tabel
          $data_baru = $db->tampil_data();
          ?>

          <!DOCTYPE html>
          <html>
          <head>
	         <title>Data Tabel Permohonan Izin</title>
	        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
   			integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
           <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
   		 integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
          </head>
          <body>
                <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
    
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav"
   			 aria-expanded="false" aria-	label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
        
                  <li class="nav-item">
                  <a class="nav-link" href="tampil.php">Tampil Izin Semuanya</a>
            </li>
            <li class="nav-item">
          <a class="nav-link" href="tampilizin_kajur.php">Tampil Izin Kajur</a>
        </li>
        <li class="nav-item">
              <a class="nav-link" href="tampilizin_sekjur.php">Tampil Izin Sekjur</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="tampil_transportasi.php">Tampil Transportasi Mobil</a>
        </li>
              <li class="nav-item">
              <a class="nav-link" href="tampil_tgs.php">Tampil Izin Sekjur</a>
        </li>
      
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

# konsep polymorphism juga diterapkan pada kodingan tampil izin kajur :
		<?php 
		// Meng-include file 'database.php' agar kelas 'Izin' bisa menggunakan kelas 'database'.
		include('database.php');
		// Meng-include file 'izin_kajur.php' agar kelas 'Izin' bisa menggunakan kelas 'database'.
		include('izin_kajur.php');

		//membuat intance dari database
		$db = new izinKajur();
		//mengambil data dari  tabel
		$data_baru = $db->tampil_data();
		?>

		<!DOCTYPE html>
		<html>
		<head>
			<title>Data Tabel Permohonan Izin</title>
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
   			integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    			integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
		</head>
		<body>
			<nav class="navbar navbar-expand-lg bg-body-tertiary">
			  <div class="container-fluid">
    
  		  	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" 
      			aria-label="Toggle navigation">
     			 <span class="navbar-toggler-icon"></span>
   				 </button>
    			<div class="collapse navbar-collapse" id="navbarNav">
    				  <ul class="navbar-nav">
        
      					  <li class="nav-item">
        				  <a class="nav-link" href="tampil.php">Tampil Izin Semuanya</a>
        			</li>
      			  <li class="nav-item">
          			<a class="nav-link" href="tampilizin_kajur.php">Tampil Izin Kajur</a>
       				 </li>
      				  <li class="nav-item">
       				   <a class="nav-link" href="tampilizin_sekjur.php">Tampil Izin Sekjur</a>
        				</li>
     				   <li class="nav-item">
      				    <a class="nav-link" href="tampil_transportasi.php">Tampil Transportasi Mobil</a>
     				   </li>
      				 	 <li class="nav-item">
         				 <a class="nav-link" href="tampil_tgs.php">Tampil Izin Sekjur</a>
        			</li>
      
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


  
   # Output
   # 1.Tampil Izin dengan kategori pangkat jabatan kajur
   <img width="955" alt="tampil kajur" src="https://github.com/user-attachments/assets/cdcd9eaa-2166-4883-86af-5568eeb44892">

# 2. Tampil izin dengan kategori pangkat jabatan sekjur
<img width="938" alt="tampil sekjur" src="https://github.com/user-attachments/assets/6a955d47-67c9-4999-87bd-8565a9e93e74">

# 3. Tampil Surat tugas dengan kategori transportasi Mobil
<img width="952" alt="tampil mobil" src="https://github.com/user-attachments/assets/4f3096df-fd80-49fd-ad85-e7317e7aaa7f">

# 4. Tampil Semua izin
<img width="921" alt="izin semua" src="https://github.com/user-attachments/assets/79292a09-5d55-439d-a583-328408680f65">

# 5.Tampil semua surat tugas

   
