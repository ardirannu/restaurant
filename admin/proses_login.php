<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['pass']))
{
	header('location: login.php');
}
?>

<?php
include 'koneksi.php';
    
    $username   = $_POST['username'];
    $password   = $_POST['pass'];
    
    if (empty($username)){
        echo "<script>alert('Username belum diisi')</script>";
        echo "<meta http-equiv='refresh' content='1 url=login.php'>";
        }else if (empty($password)){
        echo "<script>alert('Password belum diisi')</script>";
        echo "<meta http-equiv='refresh' content='1 url=login.php'>";
        }else{

    session_start();
								
    $user = mysqli_query($koneksi,"select * from admin where username='$username' and pass='$password'");
	$chek = mysqli_num_rows($user);
	if($chek>0)
	{
        $_SESSION['username'] = $username;
        $_SESSION['pass'] = $password;
	    header("location:dashboard.php");
	}else{
	    echo "<script>alert('Login Gagal !')</script>";
        echo "<meta http-equiv='refresh' content='1 url=login.php'>";
    }
}

?>
