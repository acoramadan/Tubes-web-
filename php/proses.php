<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Silahkan login terlebih dahulu!'); window.location.href='login.php';</script>";
    exit;
}
if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $stambuk = $_POST['stambuk'];
    $jk = $_POST['gender'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $alasan = $_POST['alasan'];
    $jurusan = $_POST['jurusan'];
    $fileName = $_FILES['foto']['name'];
    $fileSize = $_FILES['foto']['size'];
    $tmpname = $_FILES['foto']['tmp_name'];
    $validImageExtension = ['jpg','jpeg','png'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));

    if(!in_array($imageExtension, $validImageExtension)){
        echo "<script> alert('wkwkw'); </script>";
    }
    else if($fileSize > 1000000){
        echo "<script> alert('Gambar melebih batas inputan!'); </script>";
    }else{
        $newImageName = uniqid();
        $newImageName .= '.' . $imageExtension;
        move_uploaded_file($tmpname, 'photo/' . $newImageName);

        $fileName = $_FILES['cv']['name'];
        $fileSize = $_FILES['cv']['size'];
        $tmpname = $_FILES['cv']['tmp_name'];
        $validfileExtension = ['pdf'];
        $fileExtension = explode('.', $fileName);
        $fileExtension = strtolower(end($fileExtension));

        if(!in_array($fileExtension, $validfileExtension)){
            echo "<script> alert('Invalid input!'); </script>";
        }
        else if($fileSize > 1000000){
            echo "<script> alert('pdf melebih batas inputan!'); </script>";
        }else{
            $newPdfName = uniqid();
            $newPdfName .= '.' . $fileExtension;
            move_uploaded_file($tmpname, 'cv/' . $newPdfName);
            $sql = "INSERT INTO pendaftaran VALUES ('$nama','$stambuk','$jurusan','$jk','$kelas','$alamat','$newImageName','$newPdfName','$alasan','Pending')";
            if(mysqli_query($con,$sql)){
                $_SESSION['form_data'] = [
                    'nama' => $nama,
                    'stambuk' => $stambuk,
                    'jurusan' => $jurusan,
                    'gender' => $jk,
                    'kelas' => $kelas,
                    'alamat' => $alamat,
                    'alasan' => $alasan,
                    'foto' => 'photo/' . $newImageName,
                    'cv' => 'cv/' . $newPdfName 
                ];
                header("Location: konfirmasi.php");
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }
        }
    }
}
?>
