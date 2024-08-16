<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Silahkan login terlebih dahulu!'); window.location.href='login.php';</script>";
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Pendaftaran CA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(135deg, white, black);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 121vh;
            background-color: #f8f9fa;
            background-image: url('pictures/logo_2.png');
            background-size: contain; 
            background-position: center; 
            background-repeat: no-repeat; 
            background-attachment: fixed; 
            background-blend-mode: color;
        }
        .form-container {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }        
    </style>
</head>
<body>
<div class="container form-container">
    <form action="proses.php" method="post" enctype="multipart/form-data">
        <h2 class="text-center mb-4">Form Pendaftaran CA</h2>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
        </div>
        
        <div class="mb-3">
            <label for="stambuk" class="form-label">Stambuk</label>
            <input type="number" class="form-control" id="stambuk" name="stambuk" placeholder="Stambuk" required>
        </div>
        <div>
            <label>Jurusan</label>
            <select class="form-select" aria-label="Default select example" name = "jurusan" required>
                <option value="Teknik_informatika">Teknik informatika</option>
                <option value="Sistem_informasi">Sistem informasi</option>
            </select>
        </div>
        <div class="mb-3">
            <div>
            <label class="form-label">Jenis Kelamin</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="perempuan" required onclick="updateKelasOptions()">
                <label class="form-check-label" for="inlineRadio1">Perempuan</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="laki-laki" required onclick="updateKelasOptions()">
                <label class="form-check-label" for="inlineRadio2">Laki-Laki</label>
            </div>
        </div>
        <div class="mb-3 form-floating">
            <select class="form-select" id="floatingSelect" name="kelas" required>
               
            </select>
            <label for="floatingSelect">Pilih kelas anda</label>
        </div> 
        
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
        </div>
        
        <div class="mb-3">
            <label for="foto" class="form-label">Masukkan foto 3x4</label>
            <input class="form-control" type="file" id="foto" name="foto" required>
        </div>
        
        <div class="mb-3">
            <label for="cv" class="form-label">CV</label>
            <input class="form-control" type="file" id="cv" name="cv" required>
        </div>
        
        <div class="mb-3 form-floating">
            <textarea class="form-control" placeholder="Alasan mendaftar" id="floatingTextarea2" name="alasan" style="height: 150px" required></textarea>
            <label for="floatingTextarea2">Alasan mendaftar</label>
        </div>
        
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary" name ="submit" value ="daftar">Submit</button>
            <button type="reset" class="btn btn-secondary" name ="reset" value ="batal">Reset</button>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    function updateKelasOptions() {
        const gender = document.querySelector('input[name="gender"]:checked').value;
        const kelasSelect = document.getElementById('floatingSelect');

        kelasSelect.innerHTML = '';

        if (gender === 'perempuan') {
            const kelasOptions = ['B1', 'B2', 'B3', 'B4', 'B5'];
            kelasOptions.forEach(kelas => {
                const option = document.createElement('option');
                option.value = kelas;
                option.text = kelas;
                kelasSelect.appendChild(option);
            });
        } else if (gender === 'laki-laki') {
            const kelasOptions = ['A1', 'A2', 'A3', 'A4', 'A5', 'A6'];
            kelasOptions.forEach(kelas => {
                const option = document.createElement('option');
                option.value = kelas;
                option.text = kelas;
                kelasSelect.appendChild(option);
            });
        }
    }
</script>
</body>
</html>
