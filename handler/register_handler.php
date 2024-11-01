<?php
session_start();
include('../config/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
    if (mysqli_query($db, $query)) {
        $_SESSION['success'] = 'Registrasi berhasil! Silakan login.';
        header("Location: ../register.php");
        exit();
    } else {
        $_SESSION['error'] = 'Terjadi kesalahan, coba lagi.';
        header("Location: ../register.php");
        exit();
    }
}
