<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['pass']))
{
	header('location: login.php');
}
?>

<?php     
    if($_POST){

    include "koneksi.php";

    // Ambil Data yang Dikirim dari Form
    $username   = $_POST['username']; /* mengambil data dari method post lalu menyimpan di variabel  */ 
    $email        = $_POST['email'];
    $password     = $_POST['pass'];
    $nama_file    = $_FILES['foto_admin']['name'];
    $tipe_file    = $_FILES['foto_admin']['type'];
    $tmp_file     = $_FILES['foto_admin']['tmp_name'];

    $path = "images/admin/".$nama_file;

    // Cek apakah gambar berhasil diupload atau tidak  // Proses simpan ke Database  
    if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){
            if(move_uploaded_file($tmp_file, $path)){

    //proses simpan data ke database//    
    $query = "INSERT INTO admin (username,email,pass,foto_admin) values ('$username','$email','$password','$nama_file') ";
    $sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query  

    if($sql){ // Cek jika proses simpan ke database sukses atau tidak    // Jika Sukses, Lakukan :    
                                    echo "<script>alert('Tambah Data Berhasil !')</script>";
                                    echo "<meta http-equiv='refresh' content='1 url= tambah_data_admin.php'>"; // Redirect ke halaman  tambah_data.php
                                }else{    // Jika Gagal, Lakukan :  
                                    echo "<script>alert('Maaf, Terjadi kesalahan !')</script>";
                                    echo "<meta http-equiv='refresh' content='1 url= tambah_data_admin.php'>"; // Redirect ke halaman  tambah_data.php
                                }
                            }
                        }
                    } 
    ?>

