<!DOCTYPE html>
<html>
<head>
    <title>Portal Berita - Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .navbar {
            background-color: #fff;
            padding: 15px 30px;
            border-bottom: 1px solid #ddd;
        }
        .navbar span {
            font-size: 18px;
            font-weight: bold;
            margin-right: 25px;
        }
        .navbar a {
            text-decoration: none;
            color: #555;
            margin-right: 15px;
            font-size: 14px;
        }
        .navbar a:hover {
            color: #000;
        }
        .container {
            width: 900px;
            margin: 20px auto;
            background: #fff;
            padding: 25px 30px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        h2 {
            margin-top: 0;
            font-size: 22px;
            color: #333;
        }
        .btn-tambah {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            padding: 6px 12px;
            font-size: 13px;
            border-radius: 4px;
            margin-bottom: 15px;
        }
        .btn-tambah:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th {
            background-color: #f2f2f2;
            padding: 8px;
            text-align: center;
        }
        td {
            padding: 8px;
            vertical-align: top;
        }
        .pesan {
            padding: 8px 12px;
            margin-bottom: 15px;
            border-radius: 4px;
            font-size: 14px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <span>Portal Berita</span>
        <a href="index.php" style="color: #000; font-weight: bold;">Home</a>
        <a href="tambah.php">Input Berita</a>
    </div>

    <div class="container">
        <h2>Data Berita</h2>

        <?php
        if (isset($_GET['pesan'])) {
            $pesan = $_GET['pesan'];
            if ($pesan == "tambah_berhasil") {
                echo '<div class="pesan">Berita berhasil ditambahkan!</div>';
            } else if ($pesan == "update_berhasil") {
                echo '<div class="pesan">Berita berhasil diperbarui!</div>';
            } else if ($pesan == "hapus_berhasil") {
                echo '<div class="pesan" style="background-color: #f8d7da; color: #721c24; border-color: #f5c6cb;">Berita berhasil dihapus!</div>';
            }
        }
        ?>

        <a href="tambah.php" class="btn-tambah">+ Tambah Berita</a>

        <table>
            <tr>
                <th width="35">NO</th>
                <th width="160">Judul Berita</th>
                <th width="90">Gambar</th>
                <th>Isi Berita</th>
                <th width="100">Penulis</th>
                <th width="85">Tanggal</th>
                <th width="100">OPSI</th>
            </tr>
            <?php
            include 'koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY id DESC");
            
            if (mysqli_num_rows($data) > 0) {
                while ($d = mysqli_fetch_array($data)) {
            ?>
                <tr>
                    <td align="center"><?php echo $no++; ?></td>
                    <td><b><?php echo htmlspecialchars($d['judul']); ?></b></td>
                    <td align="center">
                        <?php if (!empty($d['gambar']) && file_exists('uploads/' . $d['gambar'])) { ?>
                            <img src="uploads/<?php echo htmlspecialchars($d['gambar']); ?>" width="80">
                        <?php } else { ?>
                            <small>-</small>
                        <?php } ?>
                    </td>
                    <td><?php echo nl2br(htmlspecialchars($d['isi'])); ?></td>
                    <td><?php echo htmlspecialchars($d['penulis']); ?></td>
                    <td align="center"><?php echo date('d/m/Y', strtotime($d['tanggal'])); ?></td>
                    <td align="center">
                        <a href="edit.php?id=<?php echo $d['id']; ?>">EDIT</a> | 
                        <a href="hapus.php?id=<?php echo $d['id']; ?>" onclick="return confirm('Yakin ingin menghapus berita ini?')">HAPUS</a>
                    </td>
                </tr>
            <?php 
                }
            } else {
            ?>
                <tr>
                    <td colspan="7" align="center">Belum ada data berita.</td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>

</body>
</html>
