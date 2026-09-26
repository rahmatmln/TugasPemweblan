<?php
include 'koneksi.php';

$id          = (int)$_POST['id'];
$judul       = mysqli_real_escape_string($koneksi, $_POST['judul']);
$isi         = mysqli_real_escape_string($koneksi, $_POST['isi']);
$penulis     = mysqli_real_escape_string($koneksi, $_POST['penulis']);
$tanggal     = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
$gambar_lama = $_POST['gambar_lama'];

$gambar_final = $gambar_lama;

if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 0) {
    $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg', 'gif', 'webp');
    $nama_file = $_FILES['gambar']['name'];
    $x = explode('.', $nama_file);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];

    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        $nama_gambar_baru = time() . '_' . preg_replace("/[^a-zA-Z0-9._-]/", "", $nama_file);
        $tujuan = 'uploads/' . $nama_gambar_baru;

        if (move_uploaded_file($file_tmp, $tujuan)) {
            if (!empty($gambar_lama) && file_exists('uploads/' . $gambar_lama)) {
                unlink('uploads/' . $gambar_lama);
            }
            $gambar_final = $nama_gambar_baru;
        }
    }
}

$query = "UPDATE berita SET judul='$judul', gambar='$gambar_final', isi='$isi', penulis='$penulis', tanggal='$tanggal' WHERE id='$id'";
mysqli_query($koneksi, $query);

header("location:index.php?pesan=update_berhasil");
exit();
?>
