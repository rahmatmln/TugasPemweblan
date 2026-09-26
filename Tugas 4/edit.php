<!DOCTYPE html>
<html>
<head>
    <title>Portal Berita - Edit Berita</title>
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
            width: 750px;
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
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            color: #333;
        }
        .form-group input[type="text"],
        .form-group input[type="date"],
        .form-group textarea {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
            font-family: Arial, sans-serif;
        }
        .form-group input[type="file"] {
            font-size: 14px;
        }
        .btn-submit {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 8px 16px;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-submit:hover {
            background-color: #0056b3;
        }
        .btn-batal {
            color: #555;
            text-decoration: none;
            margin-left: 10px;
            font-size: 14px;
        }
        .btn-batal:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <span>Portal Berita</span>
        <a href="index.php">Home</a>
        <a href="tambah.php">Input Berita</a>
    </div>

    <div class="container">
        <h2>Edit Berita</h2>

        <?php
        include 'koneksi.php';
        $id = (int)$_GET['id'];
        $data = mysqli_query($koneksi, "SELECT * FROM berita WHERE id='$id'");
        
        if (mysqli_num_rows($data) > 0) {
            while ($d = mysqli_fetch_array($data)) {
        ?>
            <form method="post" action="update.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                <input type="hidden" name="gambar_lama" value="<?php echo htmlspecialchars($d['gambar']); ?>">

                <div class="form-group">
                    <label>Judul Berita:</label>
                    <input type="text" name="judul" value="<?php echo htmlspecialchars($d['judul']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Gambar:</label>
                    <input type="file" name="gambar">
                    <?php if (!empty($d['gambar']) && file_exists('uploads/' . $d['gambar'])) { ?>
                        <div style="margin-top: 5px;">
                            <img src="uploads/<?php echo htmlspecialchars($d['gambar']); ?>" width="100">
                        </div>
                    <?php } ?>
                </div>

                <div class="form-group">
                    <label>Isi Berita:</label>
                    <textarea name="isi" rows="8" required><?php echo htmlspecialchars($d['isi']); ?></textarea>
                </div>

                <div class="form-group">
                    <label>Penulis:</label>
                    <input type="text" name="penulis" value="<?php echo htmlspecialchars($d['penulis']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Tanggal:</label>
                    <input type="date" name="tanggal" value="<?php echo $d['tanggal']; ?>" required>
                </div>

                <button type="submit" class="btn-submit" name="update">Update</button>
                <a href="index.php" class="btn-batal">Batal</a>
            </form>
        <?php 
            }
        } else {
            echo '<p>Data berita tidak ditemukan. <a href="index.php">Kembali</a></p>';
        }
        ?>
    </div>

</body>
</html>
