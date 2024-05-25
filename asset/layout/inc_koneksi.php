<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "pw2024_tubes_233040127";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("Gagal terkoneksi");
}