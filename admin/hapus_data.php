<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['pass']))
{
	header('location: login.php');
}
?>

<?php

include 'koneksi.php';

	$hapus		= $_GET['hapus']; //dari url hapus=1
	$query		= "delete from resto where id_resto = ".$hapus;
	$hapusdata	= mysqli_query($koneksi, $query);

	if ($hapusdata) {
		echo '<script>
				alert("Berhasil Menghapus Data !");
				window.location = "restoran.php";
				</script>';

	} else echo  '<script>
				alert("Gagal Menghapus Data");
				window.history.back();
				</script>';
?>