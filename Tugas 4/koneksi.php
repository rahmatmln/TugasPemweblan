<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "portal_berita";

$koneksi = @mysqli_connect("localhost:3307", $user, $pass, $db);
if (!$koneksi) {
    $koneksi = @mysqli_connect("localhost", $user, $pass, $db);
}

if (!$koneksi) {
    $conn_init = @mysqli_connect("localhost:3307", $user, $pass);
    if (!$conn_init) {
        $conn_init = @mysqli_connect("localhost", $user, $pass);
    }
    
    if ($conn_init) {
        mysqli_query($conn_init, "CREATE DATABASE IF NOT EXISTS $db");
        mysqli_select_db($conn_init, $db);
        $koneksi = $conn_init;
    }
}

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
    exit();
}

$query_create_table = "CREATE TABLE IF NOT EXISTS `berita` (
    `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `judul` VARCHAR(255) NOT NULL,
    `gambar` VARCHAR(255) NULL,
    `isi` TEXT NOT NULL,
    `penulis` VARCHAR(100) NOT NULL,
    `tanggal` DATE NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
mysqli_query($koneksi, $query_create_table);
?>
