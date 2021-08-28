<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['pass']))
{
	header('location: login.php');
}
?>

<?php
include "koneksi.php";
$sql = "select * from resto where kota='Makassar'";
$query = mysqli_query($koneksi, $sql);
$count_makassar = mysqli_num_rows($query);
?>
<?php
include "koneksi.php";
$sql = "select * from resto where kota='Surabaya'";
$query = mysqli_query($koneksi, $sql);
$count_surabaya = mysqli_num_rows($query);
?>
<?php
include "koneksi.php";
$sql = "select * from resto where kota='Jakarta'";
$query = mysqli_query($koneksi, $sql);
$count_jakarta = mysqli_num_rows($query);
?>
<?php
include "koneksi.php";
$sql = "select * from resto where kota='Bandung'";
$query = mysqli_query($koneksi, $sql);
$count_bandung = mysqli_num_rows($query);
?>
<?php
include "koneksi.php";
$sql = "select * from resto where kota='Jogyakarta'";
$query = mysqli_query($koneksi, $sql);
$count_jogyakarta = mysqli_num_rows($query);
?>
<?php
include "koneksi.php";
$sql = "select * from resto where kota='Palembang'";
$query = mysqli_query($koneksi, $sql);
$count_palembang = mysqli_num_rows($query);
?>
<?php
include "koneksi.php";
$sql = "select * from resto where kota='Medan'";
$query = mysqli_query($koneksi, $sql);
$count_medan = mysqli_num_rows($query);
?>
<?php
include "koneksi.php";
$sql = "select * from resto where kota='Bali'";
$query = mysqli_query($koneksi, $sql);
$count_bali = mysqli_num_rows($query);
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
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
						<?php
							$username = $_SESSION['username'];
							$query      = "select * from admin where username='$username'";
							$execute    = mysqli_query($koneksi, $query);

							$data = mysqli_fetch_assoc($execute);
						?>
							<a class="dropdown-toggle" ><img src="images/admin/<?php echo $data['foto_admin']?>" class="img-circle" alt="Avatar"> <span> Hy, <?php echo $_SESSION['username']?></span> </a>
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
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Geografis Restoran</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-3">
									<div class="metric btn-primary" >
										<span class="icon"><i class="fa fa-map-marker"></i></span>
										<p>
											<span class="title">Jumlah Restoran</span>
											<span class="title">Kota Makassar :</span>
											<span class="number"><?php echo $count_makassar; ?>  </span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric btn-success">
										<span class="icon"><i class="fa fa-map-marker"></i></span>
										<p>
											<span class="title">Jumlah Restoran</span>
											<span class="title">Kota Surabaya :</span>
											<span class="number"><?php echo $count_surabaya; ?> </span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric btn-danger">
										<span class="icon"><i class="fa fa-map-marker"></i></span>
										<p>
											<span class="title">Jumlah Restoran</span>
											<span class="title">Kota Jakarta :</span>
											<span class="number"><?php echo $count_jakarta; ?> </span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric btn-warning">
										<span class="icon"><i class="fa fa-map-marker"></i></span>
										<p>
											<span class="title">Jumlah Restoran</span>
											<span class="title">Kota Bandung :</span>
											<span class="number"><?php echo $count_bandung; ?> </span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric btn-warning">
										<span class="icon"><i class="fa fa-map-marker"></i></span>
										<p>
											<span class="title">Jumlah Restoran</span>
											<span class="title">Kota Jogyakarta :</span>
											<span class="number"><?php echo $count_jogyakarta; ?> </span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric btn-danger">
										<span class="icon"><i class="fa fa-map-marker"></i></span>
										<p>
											<span class="title">Jumlah Restoran</span>
											<span class="title">Kota Palembang :</span>
											<span class="number"><?php echo $count_palembang; ?> </span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric btn-success">
										<span class="icon"><i class="fa fa-map-marker"></i></span>
										<p>
											<span class="title">Jumlah Restoran</span>
											<span class="title">Kota Medan :</span>
											<span class="number"><?php echo $count_medan; ?> </span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric btn-primary">
										<span class="icon"><i class="fa fa-map-marker"></i></span>
										<p>
											<span class="title">Jumlah Restoran</span>
											<span class="title">Kota Bali :</span>
											<span class="number"><?php echo $count_bali; ?> </span>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END OVERVIEW -->
					
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
	
</body>

</html>
