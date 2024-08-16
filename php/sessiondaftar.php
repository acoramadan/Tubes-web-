<?php
include "koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO user VALUES ('$username','$password','user')";
if(mysqli_query($con, $sql)){
    echo "<script>alert('Berhasil daftar silahkan login');
    window.location.href = 'login.php';</script>";
}else{
    echo "<script>alert('username atas nama ".$username." Tidak tersedia');
    window.location.href = 'daftar.php';</script>";
}
?>