
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 700px;
            background-color: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin-top: 3rem;
        }
        .text-center {
            margin-bottom: 1.5rem;
        }
        .form-container {
            margin: 2rem auto;
        }
        .btn-group {
            display: flex;
            justify-content: space-between;
            margin-top: 1.5rem;
        }
    </style>
</head>
<body>
<div class="container form-container">
    <h2 class="text-center">Konfirmasi Data</h2>
    <form action="update.php" method="post" enctype="multipart/form-data">
        <?php
        session_start();
        if (!isset($_SESSION['username'])) {
            echo "<script>alert('Silahkan login terlebih dahulu!'); window.location.href='login.php';</script>";
            exit;
        }
        if(isset($_SESSION['form_data'])){
            $data = $_SESSION['form_data'];
            echo '<input type="hidden" name="nama" value="'.$data['nama'].'">';
            echo '<input type="hidden" name="stambuk" value="'.$data['stambuk'].'">';
            echo '<input type="hidden" name="jurusan" value="'.$data['jurusan'].'">';
            echo '<input type="hidden" name="gender" value="'.$data['gender'].'">';
            echo '<input type="hidden" name="kelas" value="'.$data['kelas'].'">';
            echo '<input type="hidden" name="alamat" value="'.$data['alamat'].'">';
            echo '<input type="hidden" name="alasan" value="'.$data['alasan'].'">';
            echo '<input type="hidden" name="foto_path" value="'.$data['foto'].'">';
            echo '<input type="hidden" name="cv_path" value="'.$data['cv'].'">';
            echo '<p><strong>Nama:</strong> '.$data['nama'].'</p>';
            echo '<p><strong>Stambuk:</strong> '.$data['stambuk'].'</p>';
            echo '<p><strong>Jurusan:</strong> '.$data['jurusan'].'</p>';
            echo '<p><strong>Jenis Kelamin:</strong> '.$data['gender'].'</p>';
            echo '<p><strong>Kelas:</strong> '.$data['kelas'].'</p>';
            echo '<p><strong>Alamat:</strong> '.$data['alamat'].'</p>';
            echo '<p><strong>Alasan:</strong> '.$data['alasan'].'</p>';
            echo '<p><strong>Foto:</strong><br> <img src="'.$data['foto'].'" width="200" alt="Foto 3x4"></p>';
            echo '<p><strong>CV:</strong> <a href="'.$data['cv'].'" target="_blank">Lihat CV</a></p>';
        } else {
            echo '<p>Data tidak tersedia. Silahkan kembali dan isi form.</p>';
        }
        ?>
        <div class="btn-group">
            <a href="update.php" class="btn btn-secondary">Edit</a>
            <a href="home.php" class="btn btn-primary">Confirm</a>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
