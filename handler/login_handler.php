<?php
session_start();
include('../config/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            header("Location: ../admin/index.php");
            exit();
        } else {
            $_SESSION['error'] = 'Password salah.';
            header("Location: ../index.php");
            exit();
        }
    } else {
        $_SESSION['error'] = 'Email tidak terdaftar.';
        header("Location: ../index.php");
        exit();
    }
}
