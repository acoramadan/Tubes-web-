<?php
include("Koneksi.php");
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Silahkan login terlebih dahulu!'); window.location.href='login.php';</script>";
    exit;
}
    $id = $_GET['id'];
    $sql = "DELETE FROM pendaftaran where stambuk = $id";
    if(mysqli_query($con,$sql)){
        ?>
        <script>
            document.location.href = "index.php"
        </script>
        <?php
    }else{
        echo "Data gagal dihapus ".$sql. " ". mysqli_error($con);
    }
?>
