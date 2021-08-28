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
    $query = "INSERT INTO resto (nama_resto,alamat,kota,kualitas,jenis_menu,harga,jam_buka,contact,foto) values ('$nama_resto','$alamat','$kota','$kualitas','$jenis_menu','$harga','$jam_buka','$contact','$nama_file') ";
    $sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query  

    if($sql){ // Cek jika proses simpan ke database sukses atau tidak    // Jika Sukses, Lakukan :    
                                    echo "<script>alert('Tambah Data Berhasil !')</script>";
                                    echo "<meta http-equiv='refresh' content='1 url= tambah_data.php'>"; // Redirect ke halaman  tambah_data.php
                                }else{    // Jika Gagal, Lakukan :  
                                    echo "<script>alert('Maaf, Terjadi kesalahan !')</script>";
                                    echo "<meta http-equiv='refresh' content='1 url= tambah_data.php'>"; // Redirect ke halaman  tambah_data.php
                                }
                            }
                        }
                    } 
    ?>

