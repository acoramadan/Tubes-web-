<?php
session_start();
session_destroy();
echo "<script>alert('Data berhasil diiinputkan silahkan menunggu pengumuman'";
header("Location: login.php");
exit();
?>
