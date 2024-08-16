<?php
session_start();
include "koneksi.php";
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Silahkan login terlebih dahulu!'); window.location.href='login.php';</script>";
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['form_data'])) {
        $data = $_SESSION['form_data'];
        $stambuk = $data['stambuk'];
        $stambuk2 = $_POST['stambuk'];
        $nama = $_POST['nama'];
        $gender = $_POST['gender'];
        $kelas = $_POST['kelas'];
        $alamat = $_POST['alamat'];
        $alasan = $_POST['alasan'];
        $jurusan = $_POST['jurusan'];
        if ($_FILES['foto']['error'] === 4) {
            $fotoUpdate = "";
        } else {
            $fotoName = $_FILES['foto']['name'];
            $fotoTmpName = $_FILES['foto']['tmp_name'];
            $fotoSize = $_FILES['foto']['size'];
            $fotoError = $_FILES['foto']['error'];
            $fotoType = $_FILES['foto']['type'];

            $fotoExt = explode('.', $fotoName);
            $fotoActualExt = strtolower(end($fotoExt));

            $allowed = array('jpg', 'jpeg', 'png');

            if (in_array($fotoActualExt, $allowed)) {
                if ($fotoError === 0) {
                    if ($fotoSize < 10000000) {
                        $fotoNewName = uniqid('', true) . "." . $fotoActualExt;
                        $fotoDestination = 'photo/' . $fotoNewName;
                        move_uploaded_file($fotoTmpName, $fotoDestination);
                        $fotoUpdate = ", foto='$fotoNewName'";
                    } else {
                        echo "<script>alert('file terlalu besar!');</script>";
                        exit();
                    }
                } else {
                    echo "<script>alert('error saat mengupload file!');</script>";
                    exit();
                }
            } else {
                echo "<script>alert('mohon isi sesuai format!!');</script>";
                exit();
            }
        }

        if ($_FILES['cv']['error'] === 4) {
            $cvUpdate = "";
        } else {
            $cvName = $_FILES['cv']['name'];
            $cvTmpName = $_FILES['cv']['tmp_name'];
            $cvSize = $_FILES['cv']['size'];
            $cvError = $_FILES['cv']['error'];
            $cvType = $_FILES['cv']['type'];

            $cvExt = explode('.', $cvName);
            $cvActualExt = strtolower(end($cvExt));

            $allowed = array('pdf');

            if (in_array($cvActualExt, $allowed)) {
                if ($cvError === 0) {
                    if ($cvSize < 10000000) {
                        $cvNewName = uniqid('', true) . "." . $cvActualExt;
                        $cvDestination = 'cv/' . $cvNewName;
                        move_uploaded_file($cvTmpName, $cvDestination);
                        $cvUpdate = ", cv='$cvNewName'";
                    } else {
                        echo "<script>alert('Your file is too big!');</script>";
                        exit();
                    }
                } else {
                    echo "<script>alert('Terdapat error dalam mengupload file!');</script>";
                    exit();
                }
            } else {
                echo "<script>alert('tidak bisa mengupdate data!!');</script>";
                exit();
            }
        }

        $sql = "UPDATE pendaftaran SET 
                nama='$nama',
                stambuk='$stambuk2',
                jurusan ='$jurusan', 
                jenis_kelamin='$gender', 
                kelas='$kelas', 
                alamat='$alamat', 
                alasan='$alasan' 
                $fotoUpdate
                $cvUpdate
                WHERE stambuk='$stambuk'";

        if (mysqli_query($con, $sql)) {
            echo "<script>
            alert('Berhasil mengupdate data');
                    document.location.href ='home.php';
                  </script>";
        } else {
            echo "<script>alert('Database query Gagal!');</script>";
        }
    } else {
        echo "<script>alert('Tidak ada data dalam  session.');</script>";
    }
}
?>
