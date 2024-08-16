<?php
session_start();

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: black;
        background-image: url('pictures/logo_2.png');
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed; 
      }
      .form-container {
        background-color: white;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;
      }
      .form-control, .btn {
        height: 45px;
        padding: 10px;
      }
    </style>
  </head>
  <body>
    <div class="container form-container">
      <form action = "session.php" method="post">
        <h2 class="text-center mb-4">Log In</h2>
        <div class="mb-4">
          <label for="user" class="form-label">Username</label>
          <input type="text" id="email" class="form-control" name="username" required>
        </div>
        <div class="mb-4">
          <label for="password" class="form-label">Password</label>
          <input type="password" id="password" class="form-control" name="password" required>
        </div>
        <div>
        <button class="btn btn-primary btn-block mb-4 w-100" type="submit" >Login</button>
        </div>
        <button type="button" class="btn btn-primary btn-block mb-4 w-100"onclick="window.location.href='daftar.php'">Sign in</button>
      </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
