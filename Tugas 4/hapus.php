<?php
include 'koneksi.php';

$id = (int)$_GET['id'];

$cek = mysqli_query($koneksi, "SELECT gambar FROM berita WHERE id='$id'");
if ($row = mysqli_fetch_array($cek)) {
    if (!empty($row['gambar']) && file_exists('uploads/' . $row['gambar'])) {
        unlink('uploads/' . $row['gambar']);
    }
}

mysqli_query($koneksi, "DELETE FROM berita WHERE id='$id'");

header("location:index.php?pesan=hapus_berhasil");
exit();
?>
