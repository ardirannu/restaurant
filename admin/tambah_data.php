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
							<h3 class="panel-title"> + Tambah Data Restoran</h3>
						</div>
						    <div class="panel-body">
                            <form method="POST" action="proses_tambah_data.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="namarestoran">Nama Restoran</label>
                                    <input type="text" name="nama_resto" class="form-control" id="namarestoran" aria-describedby="emailHelp" placeholder="Masukkan Nama Restoran !">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat (API Google Maps )</label>
                                    <textarea name="alamat" class="form-control" id="alamat" rows="3"></textarea>                                
                                </div>
								<div class="form-group">
                                    <label for="kota">Kota</label>
                                    <select name="kota" class="form-control" id="kota">
                                        <option name="kota" value="Makassar" >Makassar</option>
                                        <option name="kota" value="Surabaya">Surabaya</option>
                                        <option name="kota" value="Jakarta">Jakarta</option>
                                        <option name="kota" value="Bandung">Bandung</option>
                                        <option name="kota" value="Jogyakarta">Jogyakarta</option>
										<option name="kota" value="Palembang">Palembang</option>
                                        <option name="kota" value="Medan">Medan</option>
                                        <option name="kota" value="Bali">Bali</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kualitas">Kualitas</label>
                                    <select name="kualitas" class="form-control" id="kualitas">
                                        <option name="kualitas" value="Sangat Baik" >Sangat Baik</option>
                                        <option name="kualitas" value="Baik">Baik</option>
                                        <option name="kualitas" value="Biasa">Biasa</option>
                                        <option name="kualitas" value="Kurang">Kurang</option>
                                        <option name="kualitas" value="Buruk">Buruk</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="menu">Jenis Menu</label>
                                    <select name="jenis_menu" class="form-control" id="menu">
                                        <option name="jenis_menu" value="Indonesian Food">Indonesian Food</option>
                                        <option name="jenis_menu" value="Sea Food">Sea Food</option>
                                        <option name="jenis_menu" value="Chinese Food">Chinese Food</option>
                                        <option name="jenis_menu" value="Western Food">Western Food</option>
                                        <option name="jenis_menu" value="Fast Food">Fast Food</option>
                                    </select>
                                </div>
								<div class="form-group">
                                    <label for="harga">Kisaran Harga</label>
                                    <input type="text" name="harga" class="form-control" id="harga" aria-describedby="emailHelp" placeholder="Masukkan Kisaran Harga !">
                                </div>
								<div class="form-group">
                                    <label for="jam">Jam Buka</label>
                                    <input type="text" name="jam_buka" class="form-control" id="jam" aria-describedby="emailHelp" placeholder="Masukkan Jam Buka !">
                                </div>
                                <div class="form-group">
                                    <label for="contact">Contact</label>
                                    <input name="contact" type="text" class="form-control" id="contact" onkeypress="return Angkasaja(event)" placeholder="Input only number">                                
                                </div>
                                <div class="form-group">
                                    <label for="uploadfoto">Upload Foto Restoran</label>
                                    <input type="file" name="foto" class="form-control-file" id="uploadfoto">
                                </div>
                                <button type="submit" value="submit"  class="btn btn-primary">Submit</button>
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
