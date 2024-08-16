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
    <title>Pengumuman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div>
        <h1 style = "text-align: center;">PENGUMUMAN KELULUSAN</h1>
    </div>
  <table class="table">
  <thead>
    <div>
      <a href="home.php" class = "btn btn-primary  ">Home</a>
    </div>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">stambuk</th>
      <th scope ="col">jurusan</th>
      <th scope="col">Jenis_kelamin</th>
      <th scope="col">Kelas</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <?php
    $i = 1;
    $rows = mysqli_query($con, "SELECT pendaftaran.nama,pendaftaran.stambuk,pendaftaran.kelas,pendaftaran.jurusan,pendaftaran.jenis_kelamin,pendaftaran.status_pen FROM pendaftaran where status_pen = 'Diterima'");
    foreach ($rows as $row) : ?>
        <tr>
            <th scope="row"><?=$i++;?></th>
            <td><?=$row['nama']?></td>
            <td><?=$row['stambuk']?></td>
            <td><?=$row['jurusan']?></td>
            <td><?=$row['jenis_kelamin']?></td>
            <td><?=$row['kelas']?></td>
            </td>
            <?php $_SERVER?>
        </tr>
    <?php endforeach;?>
</tbody>
</table>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>