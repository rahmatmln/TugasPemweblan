<?php
include 'koneksi.php';

$judul   = mysqli_real_escape_string($koneksi, $_POST['judul']);
$isi     = mysqli_real_escape_string($koneksi, $_POST['isi']);
$penulis = mysqli_real_escape_string($koneksi, $_POST['penulis']);
$tanggal = mysqli_real_escape_string($koneksi, $_POST['tanggal']);

$nama_gambar = "";
if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 0) {
    $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg', 'gif', 'webp');
    $nama_file = $_FILES['gambar']['name'];
    $x = explode('.', $nama_file);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];

    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        $nama_gambar = time() . '_' . preg_replace("/[^a-zA-Z0-9._-]/", "", $nama_file);
        $tujuan = 'uploads/' . $nama_gambar;
        move_uploaded_file($file_tmp, $tujuan);
    }
}

$query = "INSERT INTO berita (judul, gambar, isi, penulis, tanggal) VALUES ('$judul', '$nama_gambar', '$isi', '$penulis', '$tanggal')";
mysqli_query($koneksi, $query);

header("location:index.php?pesan=tambah_berhasil");
exit();
?>
