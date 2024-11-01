<?php

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'web';


$db = mysqli_connect($host, $user, $password, $database);

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
