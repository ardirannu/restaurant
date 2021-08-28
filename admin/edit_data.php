<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['pass']))
{
	header('location: login.php');
}
?>

<!doctype html>
<html lang="en">

<head>
	<title>Dashboard Admin | RestoKita</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-left">
						<li>
							<h3>Dashboard Admin</h3>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
                        <li><a href="dashboard.php" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li><a href="restoran.php" class="active"><i class="lnr lnr-map-marker"></i> <span>Restoran</span></a></li>
						<li><a href="admin.php" class="active"><i class="lnr lnr-user"></i> <span>Admin</span></a></li>
						<li><a href="logout.php" class="active"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
                    <div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title"> + Edit Data Restoran</h3>
						</div>
						    <div class="panel-body">

                        <!-- proses update data -->
                            <?php
                            include 'koneksi.php';
                            $edit       = $_GET['edit'];
                            $query      = "select * from resto where id_resto='$edit' ";
                            $execute    = mysqli_query($koneksi, $query);
                            $data       = mysqli_fetch_assoc($execute);

                            if($_POST){
                            // Ambil Data yang Dikirim dari Form
                            $nama_resto   = $_POST['nama_resto']; /* mengambil data dari method post lalu menyimpan di variabel  */ 
                            $alamat       = $_POST['alamat'];
                            $kota         = $_POST['kota'];
                            $kualitas     = $_POST['kualitas'];
                            $jenis_menu   = $_POST['jenis_menu'];
                            $harga        = $_POST['harga'];
                            $jam_buka     = $_POST['jam_buka'];
                            $contact      = $_POST['contact'];
                            $nama_file    = $_FILES['foto']['name'];
                            $tipe_file    = $_FILES['foto']['type'];
                            $tmp_file     = $_FILES['foto']['tmp_name'];

                            $path = "images/".$nama_file;

                            // Cek apakah gambar berhasil diupload atau tidak  // Proses simpan ke Database  
                            if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){
                            if(move_uploaded_file($tmp_file, $path)){

                            //proses simpan data ke database//  
                            $query  = "update resto set nama_resto='$nama_resto', alamat='$alamat', kota='$kota', kualitas='$kualitas', jenis_menu='$jenis_menu', harga='$harga', jam_buka='$jam_buka', contact='$contact', foto='$nama_file' where id_resto = '$edit' ";  
                            $sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query  

                            if($sql){ // Cek jika proses simpan ke database sukses atau tidak    // Jika Sukses, Lakukan :    
                                    echo "<script>alert('Berhasil Mengedit Data!')</script>";
                                    echo "<meta http-equiv='refresh' content='1 url= restoran.php'>"; // Redirect ke halaman  tambah_data.php
                                    }else{    // Jika Gagal, Lakukan :  
                                    echo "<script>alert('Maaf, Terjadi kesalahan !')</script>";
                                    echo "<meta http-equiv='refresh' content='1 url= edit_data.php'>"; // Redirect ke halaman  tambah_data.php
                                    }
                                }
                            }
                            }
                        ?>
                        <!-- proses update data -->

                            <form method="POST" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="namarestoran">Nama Restoran</label>
                                    <input type="text" name="nama_resto" class="form-control" id="namarestoran" aria-describedby="emailHelp" value="<?php echo $data['nama_resto'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat (API Google Maps )</label>
                                    <textarea name="alamat" class="form-control" id="alamat" rows="3"><?php echo $data['alamat'] ?></textarea>                                
                                </div>
                                <div class="form-group">
                                    <label for="kota">Kota</label>
                                    <select name="kota" class="form-control" id="kota">
                                        <option <?php echo(($data['kota'])=='Makassar')?'selected':''; ?> name="kota" value="Makassar" >Makassar</option>
                                        <option <?php echo(($data['kota'])=='Surabaya')?'selected':''; ?> name="kota" value="Surabaya">Surabaya</option>
                                        <option <?php echo(($data['kota'])=='Jakarta')?'selected':''; ?> name="kota" value="Jakarta">Jakarta</option>
                                        <option <?php echo(($data['kota'])=='Bandung')?'selected':''; ?> name="kota" value="Bandung">Bandung</option>
                                        <option <?php echo(($data['kota'])=='Jogyakarta')?'selected':''; ?> name="kota" value="Jogyakarta">Jogyakarta</option>
										<option <?php echo(($data['kota'])=='Palembang')?'selected':''; ?> name="kota" value="Palembang">Palembang</option>
                                        <option <?php echo(($data['kota'])=='Medan')?'selected':''; ?> name="kota" value="Medan">Medan</option>
                                        <option <?php echo(($data['kota'])=='Bali')?'selected':''; ?> name="kota" value="Bali">Bali</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kualitas">Kualitas</label>
                                    <select name="kualitas" class="form-control" id="kualitas">
                                    <!-- mengambil data dari database untuk form select -->
                                        <option <?php echo(($data['kualitas'])=='Sangat Baik')?'selected':''; ?> name="kualitas" value="Sangat Baik" >Sangat Baik</option>
                                        <option <?php echo(($data['kualitas'])=='Baik')?'selected':''; ?> name="kualitas" value="Baik">Baik</option>
                                        <option <?php echo(($data['kualitas'])=='Biasa')?'selected':''; ?> name="kualitas" value="Biasa">Biasa</option>
                                        <option <?php echo(($data['kualitas'])=='Kurang')?'selected':''; ?> name="kualitas" value="Kurang">Kurang</option>
                                        <option <?php echo(($data['kualitas'])=='Buruk')?'selected':''; ?> name="kualitas" value="Buruk">Buruk</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="menu">Jenis Menu</label>
                                    <select name="jenis_menu" class="form-control" id="menu">
                                    <!-- mengambil data dari database untuk form select -->
                                        <option <?php echo(($data['jenis_menu'])=='Indonesian Food')?'selected':''; ?> name="jenis_menu" value="Indonesian Food">Indonesian Food</option>
                                        <option <?php echo(($data['jenis_menu'])=='Sea Food')?'selected':''; ?> name="jenis_menu" value="Sea Food">Sea Food</option>
                                        <option <?php echo(($data['jenis_menu'])=='Chinese Food')?'selected':''; ?> name="jenis_menu" value="Chinese Food">Chinese Food</option>
                                        <option <?php echo(($data['jenis_menu'])=='Western Food')?'selected':''; ?> name="jenis_menu" value="Western Food">Western Food</option>
                                        <option <?php echo(($data['jenis_menu'])=='Fast Food')?'selected':''; ?> name="jenis_menu" value="Fast Food">Fast Food</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="harga">Kisaran Harga</label>
                                    <input type="text" name="harga" class="form-control" id="harga" aria-describedby="emailHelp" value="<?php echo $data['harga'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="jam">Jam Buka</label>
                                    <input type="text" name="jam_buka" class="form-control" id="jam" aria-describedby="emailHelp" value="<?php echo $data['jam_buka'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="contact">Contact</label>
                                    <input name="contact" type="text" class="form-control" id="contact" onkeypress="return Angkasaja(event)" value="<?php echo $data['contact'] ?>">                                
                                </div>
                                <div class="form-group">
                                    <label for="uploadfoto">Upload Foto Restoran</label>
                                    <input type="file" name="foto" class="form-control-file" id="uploadfoto">
                                </div>
                                <button type="submit"  class="btn btn-primary">Submit</button>
                            </form>
                            </div>
                    </div>
				</div>
            </div>
    	</div>
	</div>
			<!-- END MAIN CONTENT -->
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">RestoKita 2019 <i class="fa fa-love"></i>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
    
    <!-- SCRIPT JS UNTUK MEMBLOK INPUTAN SELAIN ANGKA -->
    <script type="text/javascript">
        function Angkasaja(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
        return true;
        }
    </script>

</body>

</html>
