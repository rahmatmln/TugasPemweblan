<!DOCTYPE html>
<html>
<head>
    <title>Portal Berita - Input Berita</title>
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
    </style>
</head>
<body>

    <div class="navbar">
        <span>Portal Berita</span>
        <a href="index.php">Home</a>
        <a href="tambah.php" style="color: #000; font-weight: bold;">Input Berita</a>
    </div>

    <div class="container">
        <h2>Input Berita</h2>
        <form method="post" action="tambah_aksi.php" enctype="multipart/form-data">
            <div class="form-group">
                <label>Judul Berita:</label>
                <input type="text" name="judul" required>
            </div>

            <div class="form-group">
                <label>Gambar:</label>
                <input type="file" name="gambar">
            </div>

            <div class="form-group">
                <label>Isi Berita:</label>
                <textarea name="isi" rows="8" required></textarea>
            </div>

            <div class="form-group">
                <label>Penulis:</label>
                <input type="text" name="penulis" required>
            </div>

            <div class="form-group">
                <label>Tanggal:</label>
                <input type="date" name="tanggal" value="<?php echo date('Y-m-d'); ?>" required>
            </div>

            <button type="submit" class="btn-submit" name="submit">Submit</button>
        </form>
    </div>

</body>
</html>
