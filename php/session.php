<?php
session_start();
include("koneksi.php");

if (isset($_POST["username"]) && isset($_POST["password"])) {
    if (!$con) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM user WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        if ($username == $row["username"] && $password == $row['password']) {
            $_SESSION["Roles"] = $row["Roles"];
            $_SESSION["username"] = $row["username"];
            if ($_SESSION["Roles"] == "user") {
                echo "<script>alert('Selamat datang " . $_SESSION['username'] . "'); window.location.href='home.php';</script>";
            } else {
                echo "<script>window.location.href='index.php';</script>";
            }
        } else {
            echo "<script>alert('Username atau password salah'); window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('Username atau password salah'); window.location.href='login.php';</script>";
    }
} else {
    echo "<script>alert('Login terlebih dahulu!'); window.location.href='login.php';</script>";
}
?>
