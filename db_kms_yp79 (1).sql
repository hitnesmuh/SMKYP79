  -- phpMyAdmin SQL Dump
  -- version 4.9.2
  -- https://www.phpmyadmin.net/
  --
  -- Host: 127.0.0.1
  -- Generation Time: Nov 28, 2020 at 05:01 PM
  -- Server version: 10.4.11-MariaDB
  -- PHP Version: 7.4.1

  CREATE Database db_kms_yp79;
  use db_kms_yp79;

  SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
  SET AUTOCOMMIT = 0;
  START TRANSACTION;
  SET time_zone = "+00:00";


  /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
  /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
  /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
  /*!40101 SET NAMES utf8mb4 */;

  --
  -- Database: `db_kms_yp79`
  --

  -- --------------------------------------------------------

  --
  -- Table structure for table `tb_bobot`
  --

  CREATE TABLE `tb_bobot` (
    `id` int(11) NOT NULL,
    `tipe` varchar(15) NOT NULL,
    `term` varchar(50) NOT NULL,
    `id_desc` int(11) NOT NULL,
    `jumlah` int(11) NOT NULL,
    `bobot` float NOT NULL DEFAULT 0
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  --
  -- Dumping data for table `tb_bobot`
  --

  INSERT INTO `tb_bobot` (`id`, `tipe`, `term`, `id_desc`, `jumlah`, `bobot`) VALUES
  (1, 'materi', 'harus', 2, 1, 0.693147),
  (2, 'materi', 'bisa', 2, 1, 0.693147),
  (3, 'materi', 'mengingat', 2, 1, 0.693147),
  (4, 'materi', 'masa', 2, 1, 0.693147),
  (5, 'materi', 'lalu', 2, 1, 0.693147),
  (6, 'materi', 'dengan', 2, 1, 0.693147),
  (7, 'materi', 'baik', 2, 1, 0.693147),
  (8, 'materi', 'hahaha', 3, 1, 0.693147);

  -- --------------------------------------------------------

  --
  -- Table structure for table `tb_forum`
  --

  CREATE TABLE `tb_forum` (
    `id` int(11) NOT NULL,
    `id_kategori` int(11) NOT NULL,
    `id_user` int(11) NOT NULL,
    `isi` text NOT NULL,
    `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    `status` int(11) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  --
  -- Dumping data for table `tb_forum`
  --

  INSERT INTO `tb_forum` (`id`, `id_kategori`, `id_user`, `isi`, `waktu`, `status`) VALUES
  (2, 3, 6, 'assalammualaikum', '2020-11-20 09:36:08', 0),
  (4, 3, 6, 'waalaikumussalam', '2020-11-20 09:45:39', 2),
  (5, 3, 6, 'waalaikumussalam', '2020-11-20 09:46:58', 2),
  (6, 3, 5, 'hai', '2020-11-25 14:48:29', 2);

  -- --------------------------------------------------------

  --
  -- Table structure for table `tb_katadasar`
  --

  CREATE TABLE `tb_katadasar` (
    `id` int(11) NOT NULL,
    `term` varchar(50) NOT NULL,
    `stem` varchar(50) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  --
  -- Dumping data for table `tb_katadasar`
  --

  INSERT INTO `tb_katadasar` (`id`, `term`, `stem`) VALUES
  (1, 'memakan', 'makan\r\n');

  -- --------------------------------------------------------

  --
  -- Table structure for table `tb_kategori`
  --

  CREATE TABLE `tb_kategori` (
    `id` int(11) NOT NULL,
    `nama` varchar(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  --
  -- Dumping data for table `tb_kategori`
  --

  INSERT INTO `tb_kategori` (`id`, `nama`) VALUES
  (2, 'Alam'),
  (3, 'Teknologi');

  -- --------------------------------------------------------

  --
  -- Table structure for table `tb_list_forum`
  --

  CREATE TABLE `tb_list_forum` (
    `id` int(11) NOT NULL,
    `id_kategori` int(11) NOT NULL,
    `nama` varchar(255) NOT NULL,
    `id_pembuat` int(11) NOT NULL,
    `status` int(1) NOT NULL DEFAULT 0
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  --
  -- Dumping data for table `tb_list_forum`
  --

  INSERT INTO `tb_list_forum` (`id`, `id_kategori`, `nama`, `id_pembuat`, `status`) VALUES
  (1, 3, 'Cara Ganti HP', 6, 1),
  (2, 2, 'Pembuatan Manusia', 5, 0),
  (3, 3, 'Cara Membuat HP', 6, 0),
  (5, 2, 'Cara Mantap-mantap di Hutan', 5, 0);

  -- --------------------------------------------------------

  --
  -- Table structure for table `tb_mata_pelajaran`
  --

  CREATE TABLE `tb_mata_pelajaran` (
    `id` int(11) NOT NULL,
    `nama` varchar(255) CHARACTER SET latin1 NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  --
  -- Dumping data for table `tb_mata_pelajaran`
  --

  INSERT INTO `tb_mata_pelajaran` (`id`, `nama`) VALUES
  (2, 'Matematika');

  -- --------------------------------------------------------

  --
  -- Table structure for table `tb_materi`
  --

  CREATE TABLE `tb_materi` (
    `id` int(11) NOT NULL,
    `id_mapel` int(11) NOT NULL,
    `nama` varchar(255) NOT NULL,
    `uraian_singkat` text NOT NULL,
    `file` text NOT NULL,
    `id_pembuat` int(11) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  --
  -- Dumping data for table `tb_materi`
  --

  INSERT INTO `tb_materi` (`id`, `id_mapel`, `nama`, `uraian_singkat`, `file`, `id_pembuat`) VALUES
  (2, 2, 'Cara Menghitung Mantan', 'harus bisa mengingat masa lalu dengan baik', 'materiCaraMenghitungMantanntaps.docx', 5),
  (3, 2, 'Cara Menghitung Air', 'hahaha', 'materiCaraMenghitungAirntaps.docx', 5);

  -- --------------------------------------------------------

  --
  -- Table structure for table `tb_modul_pelatihan`
  --

  CREATE TABLE `tb_modul_pelatihan` (
    `id` int(11) NOT NULL,
    `id_kategori` int(11) NOT NULL,
    `judul` varchar(255) CHARACTER SET latin1 NOT NULL,
    `waktu` timestamp NOT NULL DEFAULT current_timestamp(),
    `deskripsi` text NOT NULL,
    `file` varchar(255) CHARACTER SET latin1 NOT NULL,
    `id_peminta` int(11) NOT NULL,
    `status` int(1) NOT NULL DEFAULT 0
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  --
  -- Dumping data for table `tb_modul_pelatihan`
  --

  INSERT INTO `tb_modul_pelatihan` (`id`, `id_kategori`, `judul`, `waktu`, `deskripsi`, `file`, `id_peminta`, `status`) VALUES
  (5, 2, 'Cara Ternak Lele', '2020-11-14 17:00:00', 'mudah sekali', 'pelatihanCaraTernakLeleKamu.doc', 6, 1),
  (6, 3, 'Cara Menghitung Pulsa', '2020-11-17 17:00:00', 'tinggal itung aja si', 'pelatihanCaraMenghitungPulsaKamu.doc', 6, 0),
  (7, 3, 'Cara Makan HP', '2020-11-10 17:00:00', 'jadi cara makan hp adalah dengan cara makan aja hp nya', 'pelatihanCaraMakanHPKamu.docx', 6, 1),
  (8, 2, 'Cara Makan Tanah', '2020-11-25 17:00:00', 'cara memakan tanah adalah makan', 'pelatihanCaraMakanTanahKamu.docx', 6, 1);

  -- --------------------------------------------------------

  --
  -- Table structure for table `tb_stopword`
  --

  CREATE TABLE `tb_stopword` (
    `id` int(11) NOT NULL,
    `kata` varchar(50) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  --
  -- Dumping data for table `tb_stopword`
  --

  INSERT INTO `tb_stopword` (`id`, `kata`) VALUES
  (2, 'yang');

  -- --------------------------------------------------------

  --
  -- Table structure for table `tb_user`
  --

  CREATE TABLE `tb_user` (
    `id` int(11) NOT NULL,
    `level` int(1) NOT NULL,
    `username` varchar(255) CHARACTER SET latin1 NOT NULL,
    `password` varchar(255) CHARACTER SET latin1 NOT NULL,
    `nama` varchar(255) NOT NULL,
    `foto` varchar(255) NOT NULL DEFAULT 'default.png'
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  --
  -- Dumping data for table `tb_user`
  --

  INSERT INTO `tb_user` (`id`, `level`, `username`, `password`, `nama`, `foto`) VALUES
  (5, 2, 'ntaps', 'mantap', 'Mantap Betul', 'default.png'),
  (6, 1, 'Kamu', 'kamujuga', 'Kamu Lagi', 'Kamu.png');

  --
  -- Indexes for dumped tables
  --

  --
  -- Indexes for table `tb_bobot`
  --
  ALTER TABLE `tb_bobot`
    ADD PRIMARY KEY (`id`);

  --
  -- Indexes for table `tb_forum`
  --
  ALTER TABLE `tb_forum`
    ADD PRIMARY KEY (`id`),
    ADD KEY `id_kategori` (`id_kategori`),
    ADD KEY `id_user` (`id_user`);

  --
  -- Indexes for table `tb_katadasar`
  --
  ALTER TABLE `tb_katadasar`
    ADD PRIMARY KEY (`id`);

  --
  -- Indexes for table `tb_kategori`
  --
  ALTER TABLE `tb_kategori`
    ADD PRIMARY KEY (`id`);

  --
  -- Indexes for table `tb_list_forum`
  --
  ALTER TABLE `tb_list_forum`
    ADD PRIMARY KEY (`id`),
    ADD KEY `id_kategori` (`id_kategori`),
    ADD KEY `id_pembuat` (`id_pembuat`);

  --
  -- Indexes for table `tb_mata_pelajaran`
  --
  ALTER TABLE `tb_mata_pelajaran`
    ADD PRIMARY KEY (`id`);

  --
  -- Indexes for table `tb_materi`
  --
  ALTER TABLE `tb_materi`
    ADD PRIMARY KEY (`id`),
    ADD KEY `id_mapel` (`id_mapel`),
    ADD KEY `id_pembuat` (`id_pembuat`);

  --
  -- Indexes for table `tb_modul_pelatihan`
  --
  ALTER TABLE `tb_modul_pelatihan`
    ADD PRIMARY KEY (`id`),
    ADD KEY `id_kategori` (`id_kategori`),
    ADD KEY `id_peminta` (`id_peminta`);

  --
  -- Indexes for table `tb_stopword`
  --
  ALTER TABLE `tb_stopword`
    ADD PRIMARY KEY (`id`);

  --
  -- Indexes for table `tb_user`
  --
  ALTER TABLE `tb_user`
    ADD PRIMARY KEY (`id`);

  --
  -- AUTO_INCREMENT for dumped tables
  --

  --
  -- AUTO_INCREMENT for table `tb_bobot`
  --
  ALTER TABLE `tb_bobot`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

  --
  -- AUTO_INCREMENT for table `tb_forum`
  --
  ALTER TABLE `tb_forum`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

  --
  -- AUTO_INCREMENT for table `tb_katadasar`
  --
  ALTER TABLE `tb_katadasar`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

  --
  -- AUTO_INCREMENT for table `tb_kategori`
  --
  ALTER TABLE `tb_kategori`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

  --
  -- AUTO_INCREMENT for table `tb_list_forum`
  --
  ALTER TABLE `tb_list_forum`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

  --
  -- AUTO_INCREMENT for table `tb_mata_pelajaran`
  --
  ALTER TABLE `tb_mata_pelajaran`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

  --
  -- AUTO_INCREMENT for table `tb_materi`
  --
  ALTER TABLE `tb_materi`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

  --
  -- AUTO_INCREMENT for table `tb_modul_pelatihan`
  --
  ALTER TABLE `tb_modul_pelatihan`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

  --
  -- AUTO_INCREMENT for table `tb_stopword`
  --
  ALTER TABLE `tb_stopword`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

  --
  -- AUTO_INCREMENT for table `tb_user`
  --
  ALTER TABLE `tb_user`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

  --
  -- Constraints for dumped tables
  --

  --
  -- Constraints for table `tb_forum`
  --
  ALTER TABLE `tb_forum`
    ADD CONSTRAINT `tb_forum_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `tb_forum_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

  --
  -- Constraints for table `tb_list_forum`
  --
  ALTER TABLE `tb_list_forum`
    ADD CONSTRAINT `tb_list_forum_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `tb_list_forum_ibfk_2` FOREIGN KEY (`id_pembuat`) REFERENCES `tb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

  --
  -- Constraints for table `tb_materi`
  --
  ALTER TABLE `tb_materi`
    ADD CONSTRAINT `tb_materi_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `tb_mata_pelajaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `tb_materi_ibfk_2` FOREIGN KEY (`id_pembuat`) REFERENCES `tb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

  --
  -- Constraints for table `tb_modul_pelatihan`
  --
  ALTER TABLE `tb_modul_pelatihan`
    ADD CONSTRAINT `tb_modul_pelatihan_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `tb_modul_pelatihan_ibfk_2` FOREIGN KEY (`id_peminta`) REFERENCES `tb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
  COMMIT;

  /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
  /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
  /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
