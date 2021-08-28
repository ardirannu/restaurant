<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['pass']))
{
	header('location: login.php');
}
?>

<?php
include "koneksi.php";
$no = 1;
?>

<!doctype html>
<html lang="en">

<head>
	<title>Dashboard Admin | RestoKita</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

	<!-- DATATABLES -->
	<link rel="stylesheet" href="DataTables-1.10.20/media/css/jquery.dataTables.min.css" />
    <script src="DataTables-1.10.20/media/js/jquery.js"></script>
    <script src="DataTables-1.10.20/media/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
        $('#datatables').dataTable();
        });
    </script>


	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
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
                    <div class="panel panel-headline">
						<div class="panel-heading">
							<h4 class="panel-title">Data Admin</h4>
						</div>
						<div class="container-fluid">
							<a href="tambah_data_admin.php"><button class="btn btn-primary"><div class="fa fa-plus-square"></div> Tambah Data Admin</button></a>
						</div>
						    <div class="panel-body">
                            <table id="datatables" class="display" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Admin</th>
                                        <th>Email</th>
                                        <th>Foto</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query      = "select * from admin";
                                        $execute    = mysqli_query($koneksi, $query);

                                        while($data = mysqli_fetch_assoc($execute)) {
                                    ?>

                                    <tr>
                                        <td> <?php echo $no++;?> </td>
                                        <td> <?php echo $data['username'];?> </td>
                                        <td> <?php echo $data['email'];?> </td>
                                        <td><img src='images/admin/<?php echo $data['foto_admin'];?>' width='35' height='35'> </td> 
                                        <td>
                                        <a href="edit_data_admin.php?<?php echo 'edit=' .$data['id_admin'] ?>"> <button class="btn btn-warning"> Edit</button> </a>
                                        <a href="hapus_data_admin.php?<?php echo 'hapus=' .$data['id_admin'] ?>"> <button class="btn btn-danger"> Hapus</button> </a>
                                        </td>
                                    </tr>

                                    <?php } ?>

                                </tbody>
                            </table>
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
