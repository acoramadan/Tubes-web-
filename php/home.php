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
  <title>Home - Pendaftaran CA</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    body {
      background: linear-gradient(135deg, white, black);
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      margin-bottom: 60px;
      color: white;
      font-family: 'Roboto', sans-serif;
      height: 100vh;
    }
    nav.navbar {
      background: rgba(0, 0, 0, 0.8);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    nav.navbar .navbar-brand img {
      transition: transform 0.3s;
    }

    nav.navbar .navbar-brand img:hover {
      transform: scale(1.1);
    }

    nav.navbar .nav-link {
      color: white !important;
      transition: color 0.3s;
    }

    nav.navbar .nav-link:hover {
      color: #ffc107 !important;
    }

    .hero-text {
      text-align: center;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    .hero-text h1 {
      font-size: 4rem;
      margin-bottom: 20px;
      animation: fadeInDown 1s ease-in-out;
    }

    .hero-text h5 {
      font-size: 1.5rem;
      animation: fadeInUp 1s ease-in-out;
    }
    footer {
      background: rgba(0, 0, 0, 0.8);
      color: white;
      padding: 1rem 0;
      text-align: center;
      position: fixed;
      width: 100%;
      bottom: 0;
      transition: transform 0.5s ease;
      transform: translateY(100%);
      box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.2);
    }

    footer a {
      color: #ffc107;
      text-decoration: none;
      transition: color 0.3s;
    }

    footer a:hover {
      color: #ffffff;
      text-decoration: underline;
    }

    .show-footer {
      transform: translateY(0);
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="pictures/Screenshot 2024-06-01 180503.png" alt="logo" width="250" height="75">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="input.php">Daftar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Pengumuman.php">Pengumuman</a>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">Log Out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="hero-text container-fluid">
    <div>
      <h1>Pendaftaran CA</h1>
    </div>
    <div>
      <h5>Join with us</h5>
    </div>
  </div>
  <footer id="footer">
    <div class="container">
      <p>&copy; 2024 Ahmad Mufli Ramadhan. <a href="#">Privacy Policy</a></p>
    </div>
  </footer>

  <script>
    var lastScrollTop = 0;
    window.addEventListener("scroll", function () {
      var currentScroll = window.pageYOffset || document.documentElement.scrollTop;
      if (currentScroll > lastScrollTop) {
        document.getElementById('footer').classList.remove('show-footer');
      } else {
        document.getElementById('footer').classList.add('show-footer');
      }
      lastScrollTop = currentScroll;
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
