CREATE DATABASE IF NOT EXISTS portal_berita;
USE portal_berita;

CREATE TABLE IF NOT EXISTS `berita` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `judul` VARCHAR(255) NOT NULL,
  `gambar` VARCHAR(255) NULL,
  `isi` TEXT NOT NULL,
  `penulis` VARCHAR(100) NOT NULL,
  `tanggal` DATE NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `berita` (`id`, `judul`, `gambar`, `isi`, `penulis`, `tanggal`) VALUES
(1, 'Mahasiswa PNJ Raih Juara 1 Lomba Web Development Nasional', '', 'Mahasiswa program studi Teknik Informatika Politeknik Negeri Jakarta berhasil meraih juara pertama dalam kompetisi Web Development tingkat nasional tahun 2026.', 'Rahmat Maulana', '2026-09-20'),
(2, 'Peluncuran Fitur CRUD Berita Berbasis PHP dan MySQL', '', 'Sistem informasi portal berita modern kini telah dilengkapi dengan operasi Create, Read, Update, dan Delete untuk memudahkan manajemen konten berita secara dinamis.', 'Redaksi TI', '2026-09-24');
