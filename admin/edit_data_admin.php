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
							<h3 class="panel-title"> + Edit Data Admin</h3>
						</div>
						    <div class="panel-body">

                        <!-- ambil data realtime dari database untuk diupdate -->
                            <?php
                            include 'koneksi.php';
                            $edit       = $_GET['edit'];
                            $query      = "select * from admin where id_admin='$edit' ";
                            $execute    = mysqli_query($koneksi, $query);
                            $data       = mysqli_fetch_assoc($execute);

                            if($_POST){
                            // Ambil Data yang Dikirim dari Form
                            $username     = $_POST['username']; /* mengambil data dari method post lalu menyimpan di variabel  */ 
                            $email        = $_POST['email'];
                            $nama_file    = $_FILES['foto_admin']['name'];
                            $tipe_file    = $_FILES['foto_admin']['type'];
                            $tmp_file     = $_FILES['foto_admin']['tmp_name'];

                            $path = "images/admin/".$nama_file;

                            // Cek apakah gambar berhasil diupload atau tidak  // Proses simpan ke Database  
                            if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){
                            if(move_uploaded_file($tmp_file, $path)){

                            //proses simpan data ke database//  
                            $query  = "update admin set username='$username', email='$email', foto_admin='$nama_file' where id_admin = '$edit' ";  
                            $sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query  

                            if($sql){ // Cek jika proses simpan ke database sukses atau tidak    // Jika Sukses, Lakukan :    
                                    echo "<script>alert('Berhasil Mengedit Data!')</script>";
                                    echo "<meta http-equiv='refresh' content='1 url= admin.php'>"; // Redirect ke halaman  tambah_data.php
                                    }else{    // Jika Gagal, Lakukan :  
                                    echo "<script>alert('Maaf, Terjadi kesalahan !')</script>";
                                    echo "<meta http-equiv='refresh' content='1 url= edit_data_admin.php'>"; // Redirect ke halaman  tambah_data.php
                                    }
                                }
                            }
                            }
                        ?>
                        <!-- proses update data -->

                        <form method="POST" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="namaadmin">Nama Admin</label>
                                    <input type="text" name="username" class="form-control" id="namaadmin" aria-describedby="emailHelp" value="<?php echo $data['username'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="<?php echo $data['email'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="uploadfoto">Upload Foto Admin</label>
                                    <input type="file" name="foto_admin" class="form-control-file" id="uploadfoto">
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
