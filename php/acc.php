<?php
include "koneksi.php";
session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>alert('Silahkan login terlebih dahulu!'); window.location.href='login.php';</script>";
    exit;
}

$id = $_GET['id'];

$sql = "UPDATE pendaftaran SET status_pen = ? WHERE stambuk = ?";
$stmt = mysqli_prepare($con, $sql);
$status = 'Diterima';

mysqli_stmt_bind_param($stmt, "si", $status, $id);

if (mysqli_stmt_execute($stmt)) {
    echo "<script>
            alert('Mahasiswa dengan stambuk ".$id." berhasil diterima!');
          </script>";
    header("Location: index.php");
    exit;
} else {
    echo "<script>
            alert('Mahasiswa dengan stambuk ".$id." tidak berhasil diterima!');
          </script>";
}

mysqli_stmt_close($stmt);
mysqli_close($con);
?>
