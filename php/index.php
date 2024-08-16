<?php
  include "koneksi.php";
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
    <title>Table Inputan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="card-title mb-0">Data Pendaftaran</h5>
          <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped table-hover mb-0">
            <thead class="table-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Stambuk</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Kelas</th>
                <th scope="col">Alamat</th>
                <th scope="col">Foto 3X4</th>
                <th scope="col">Berkas CV</th>
                <th scope="col">Alasan Mendaftar</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 1;
              $rows = mysqli_query($con, "SELECT * FROM pendaftaran");
              foreach ($rows as $row) : ?>
                  <tr>
                      <th scope="row"><?=$i++;?></th>
                      <td><?=$row['nama']?></td>
                      <td><?=$row['stambuk']?></td>
                      <td><?=$row['jurusan']?></td>
                      <td><?=$row['jenis_kelamin']?></td>
                      <td><?=$row['kelas']?></td>
                      <td><?=$row['alamat']?></td>
                      <td><img src="photo/<?php echo $row['foto'];?>" width="100" alt=""></td>
                      <td><a href="cv/<?php echo $row['cv'];?>" class="btn btn-primary btn-sm" download>Download CV</a></td>
                      <td><?=$row['alasan']?></td>
                      <td class="d-flex">
                        <a href="Delete.php?id=<?php echo $row['stambuk'];?>" class="btn btn-danger btn-sm me-2" onclick="return confirm('Apakah Anda ingin benar-benar menghapus?')">Hapus</a>
                        <?php if($row['status_pen'] == "Pending"): ?>
                          <a href="acc.php?id=<?php echo $row['stambuk'];?>" class="btn btn-success btn-sm" onclick="return confirm('Apakah Anda ingin menerima orang ini?')">Terima</a>
                        <?php endif; ?>
                      </td>
                  </tr>
              <?php endforeach;?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
