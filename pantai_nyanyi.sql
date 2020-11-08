-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2020 at 04:28 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pantai_nyanyi`
--

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(512) NOT NULL,
  `jenis_fasilitas_id` int(11) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `date_created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `user_id`, `nama`, `jenis_fasilitas_id`, `latitude`, `longitude`, `date_created`) VALUES
(1, 2, 'Villa Tantangan Bali', 1, -8.630728, 115.095503, '2020-10-17 16:54:56'),
(2, 2, 'Bali Hai Dream Villa', 1, -8.626755, 115.093488, '2020-10-17 16:56:34'),
(3, 2, 'Oma', 2, -8.628511, 115.104376, '2020-10-18 09:36:35'),
(5, 2, 'Villa Nirwana', 1, -8.626058, 115.092626, '2020-10-18 09:43:02');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `user_id`, `nama`, `deskripsi`, `image`, `date_created`) VALUES
(1, 1, 'Burung Kokokan type 1', '<p>loremLorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium iure inventore blanditiis nulla asperiores delectus consequuntur quam aspernatur corporis ipsa doloremque officiis, assumenda exercitationem maxime quisquam recusandae ipsum velit laborum?</p>', 'carlos-alberto-gomez-iniguez-253158-unsplash.jpg', '2020-10-15 22:26:26'),
(4, 0, 'hedwig', '<p>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit,&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Minima&nbsp;molestias&nbsp;perspiciatis&nbsp;saepe&nbsp;atque,&nbsp;deleniti&nbsp;facilis&nbsp;at&nbsp;dolores&nbsp;error&nbsp;possimus&nbsp;delectus&nbsp;eaque&nbsp;obcaecati&nbsp;voluptatibus&nbsp;quaerat&nbsp;veniam&nbsp;totam&nbsp;minus&nbsp;qui&nbsp;reiciendis&nbsp;distinctio.</p>', 'amy-humphries-1665067-unsplash.jpg', '2020-10-15 23:18:39'),
(5, 0, 'Burung Kokokan type 3', '<p>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit,&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Minima&nbsp;molestias&nbsp;perspiciatis&nbsp;saepe&nbsp;atque,&nbsp;deleniti&nbsp;facilis&nbsp;at&nbsp;dolores&nbsp;error&nbsp;possimus&nbsp;delectus&nbsp;eaque&nbsp;obcaecati&nbsp;voluptatibus&nbsp;quaerat&nbsp;veniam&nbsp;totam&nbsp;minus&nbsp;qui&nbsp;reiciendis&nbsp;distinctio.</p>', 'clay-banks-170882-unsplash.jpg', '2020-10-16 15:06:57'),
(6, 0, 'Burung Kokokan type 4', '<p>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit,&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Minima&nbsp;molestias&nbsp;perspiciatis&nbsp;saepe&nbsp;atque,&nbsp;deleniti&nbsp;facilis&nbsp;at&nbsp;dolores&nbsp;error&nbsp;possimus&nbsp;delectus&nbsp;eaque&nbsp;obcaecati&nbsp;voluptatibus&nbsp;quaerat&nbsp;veniam&nbsp;totam&nbsp;minus&nbsp;qui&nbsp;reiciendis&nbsp;distinctio.</p>', 'frank-mckenna-231181-unsplash.jpg', '2020-10-16 15:07:16'),
(7, 0, 'Burung Kokokan type 5', '<p>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit,&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Minima&nbsp;molestias&nbsp;perspiciatis&nbsp;saepe&nbsp;atque,&nbsp;deleniti&nbsp;facilis&nbsp;at&nbsp;dolores&nbsp;error&nbsp;possimus&nbsp;delectus&nbsp;eaque&nbsp;obcaecati&nbsp;voluptatibus&nbsp;quaerat&nbsp;veniam&nbsp;totam&nbsp;minus&nbsp;qui&nbsp;reiciendis&nbsp;distinctio.</p>', 'nick-baker-98364-unsplash.jpg', '2020-10-16 15:07:37'),
(8, 0, 'Burung Kokokan type 6', '<p>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit,&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Minima&nbsp;molestias&nbsp;perspiciatis&nbsp;saepe&nbsp;atque,&nbsp;deleniti&nbsp;facilis&nbsp;at&nbsp;dolores&nbsp;error&nbsp;possimus&nbsp;delectus&nbsp;eaque&nbsp;obcaecati&nbsp;voluptatibus&nbsp;quaerat&nbsp;veniam&nbsp;totam&nbsp;minus&nbsp;qui&nbsp;reiciendis&nbsp;distinctio.</p>', 'carlos-alberto-gomez-iniguez-253158-unsplash1.jpg', '2020-10-16 15:09:24'),
(9, 0, 'Burung Kokokan type 7', '<p>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit,&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Minima&nbsp;molestias&nbsp;perspiciatis&nbsp;saepe&nbsp;atque,&nbsp;deleniti&nbsp;facilis&nbsp;at&nbsp;dolores&nbsp;error&nbsp;possimus&nbsp;delectus&nbsp;eaque&nbsp;obcaecati&nbsp;voluptatibus&nbsp;quaerat&nbsp;veniam&nbsp;totam&nbsp;minus&nbsp;qui&nbsp;reiciendis&nbsp;distinctio.</p>', 'anthony-delanoix-hzgs56Ze49s-unsplash.jpg', '2020-10-16 15:09:39'),
(10, 0, 'Burung Kokokan type 8', '<p>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit,&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Minima&nbsp;molestias&nbsp;perspiciatis&nbsp;saepe&nbsp;atque,&nbsp;deleniti&nbsp;facilis&nbsp;at&nbsp;dolores&nbsp;error&nbsp;possimus&nbsp;delectus&nbsp;eaque&nbsp;obcaecati&nbsp;voluptatibus&nbsp;quaerat&nbsp;veniam&nbsp;totam&nbsp;minus&nbsp;qui&nbsp;reiciendis&nbsp;distinctio.</p>', 'kace-rodriguez-80992-unsplash.jpg', '2020-10-16 15:10:00'),
(11, 0, 'Burung Kokokan type 9', '<p>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit,&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Minima&nbsp;molestias&nbsp;perspiciatis&nbsp;saepe&nbsp;atque,&nbsp;deleniti&nbsp;facilis&nbsp;at&nbsp;dolores&nbsp;error&nbsp;possimus&nbsp;delectus&nbsp;eaque&nbsp;obcaecati&nbsp;voluptatibus&nbsp;quaerat&nbsp;veniam&nbsp;totam&nbsp;minus&nbsp;qui&nbsp;reiciendis&nbsp;distinctio.</p>', 'nick-baker-98364-unsplash1.jpg', '2020-10-16 15:10:22'),
(12, 0, 'Burung Kokokan type 10', '<p>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit,&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Minima&nbsp;molestias&nbsp;perspiciatis&nbsp;saepe&nbsp;atque,&nbsp;deleniti&nbsp;facilis&nbsp;at&nbsp;dolores&nbsp;error&nbsp;possimus&nbsp;delectus&nbsp;eaque&nbsp;obcaecati&nbsp;voluptatibus&nbsp;quaerat&nbsp;veniam&nbsp;totam&nbsp;minus&nbsp;qui&nbsp;reiciendis&nbsp;distinctio.</p>', 'amy-humphries-1665067-unsplash1.jpg', '2020-10-16 15:11:01');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_fasilitas`
--

CREATE TABLE `jenis_fasilitas` (
  `id` int(11) NOT NULL,
  `nama_fasilitas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_fasilitas`
--

INSERT INTO `jenis_fasilitas` (`id`, `nama_fasilitas`) VALUES
(1, 'Villa'),
(2, 'Parkir'),
(3, 'Penyewaan Kuda'),
(4, 'Penyewaan ATV');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kabupaten` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `desa` varchar(255) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `user_id`, `provinsi`, `kabupaten`, `kecamatan`, `desa`, `latitude`, `longitude`, `date`) VALUES
(1, 1, 'Bali', 'Tabanan', 'Kediri', 'Nyanyi', -8.633388, 115.097817, '2020-10-15 11:19:03');

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id` int(11) NOT NULL,
  `provinsi_id` int(11) NOT NULL,
  `nama_provinsi` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`id`, `provinsi_id`, `nama_provinsi`, `jumlah`, `tanggal`, `bulan`, `tahun`) VALUES
(1, 75, 'Gorontalo', 911, '2019-12-10', 'December', 2019),
(2, 51, 'Bali', 105, '2019-12-18', 'December', 2019),
(4, 11, 'Aceh', 45, '2020-09-16', 'September', 2020),
(5, 51, 'Bali', 999, '2020-09-22', 'September', 2020),
(6, 33, 'Jawa Tengah', 123, '2020-10-15', 'October', 2020),
(7, 16, 'Sumatera Selatan', 233, '2020-10-14', 'October', 2020),
(8, 11, 'Aceh', 233, '2020-10-16', 'October', 2020),
(10, 11, 'Aceh', 45, '2020-10-19', 'October', 2020),
(12, 11, 'Aceh', 45, '2020-11-18', 'November', 2020),
(13, 92, 'Papua', 1500, '2020-11-18', 'November', 2020),
(14, 91, 'Papua Barat', 1233, '2020-11-17', 'November', 2020),
(16, 11, 'Aceh', 444, '2020-12-16', 'December', 2020),
(17, 31, 'DKI Jakarta', 99, '2020-10-24', 'October', 2020),
(18, 32, 'Jawa Barat', 123, '2020-10-26', 'October', 2020),
(19, 13, 'Sumatera Barat', 9, '2020-10-22', 'October', 2020),
(20, 11, 'Aceh', 500, '2019-11-16', 'November', 2019),
(22, 12, 'Sumatera Utara', 100, '2020-10-29', 'October', 2020),
(23, 52, 'Nusa Tenggara Barat', 88, '2020-10-17', 'October', 2020);

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id` char(2) NOT NULL,
  `nama_provinsi` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id`, `nama_provinsi`) VALUES
('11', 'Aceh'),
('12', 'Sumatera Utara'),
('13', 'Sumatera Barat'),
('14', 'Riau'),
('15', 'Jambi'),
('16', 'Sumatera Selatan'),
('17', 'Bengkulu'),
('18', 'Lampung'),
('19', 'Kepulauan Bangka Belitung'),
('21', 'Kepulauan Riau'),
('31', 'DKI Jakarta'),
('32', 'Jawa Barat'),
('33', 'Jawa Tengah'),
('34', 'DI Yogyakarta'),
('35', 'Jawa Timur'),
('36', 'Banten'),
('51', 'Bali'),
('52', 'Nusa Tenggara Barat'),
('53', 'Nusa Tenggara Timur'),
('61', 'Kalimantan Barat'),
('62', 'Kalimantan Tengah'),
('63', 'Kalimantan Selatan'),
('64', 'Kalimantan Timur'),
('65', 'Kalimantan Utara'),
('71', 'Sulawesi Utara'),
('72', 'Sulawesi Tengah'),
('73', 'Sulawesi Selatan'),
('74', 'Sulawesi Tenggara'),
('75', 'Gorontalo'),
('76', 'Sulawesi Barat'),
('81', 'Maluku'),
('82', 'Maluku Utara'),
('91', 'Papua Barat'),
('92', 'Papua');

-- --------------------------------------------------------

--
-- Table structure for table `sejarah`
--

CREATE TABLE `sejarah` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sejarah`
--

INSERT INTO `sejarah` (`id`, `user_id`, `judul`, `deskripsi`, `image`, `date`) VALUES
(1, 1, 'Sejarah Desa Petulu', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>&nbsp;Ada berbagai cerita rakyat yang menyatakan bahwa petulu gunung merupakan gunung dari wilayah kekuasaan Raja Sukawati. Nama ini diberikan oleh Cokorda Gunung, anak raja sukawat,i kira-kira abad ke-15. Raja Sukawati menempatkan soroh (warga) bendesa untuk bermukim dan membangun Desa petulu gunung. Karena wilayah sangat lebar atau bet, maka wilayah itu dibesebut bet dulu, kemudian menjadi petulu. Wilayah yang paling utara diberi nama Petulu Gunung. Disebut Gunung karena letaknya di ujung dan datarannya paling tinggi.</strong></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<em>Wilayah petulu gunung sangat terisolir, jalannya buntu dan sulit dijangkau. Kehidupan masyarakatnya sangat miskin karena kurangnya pekerjaan serta sempitnya lahan sawah yang digarap masyarakat. Sehingga dalam usaha untuk melangsukan kehidupan, masyarakat petulu gunung banyak merantau keluar wilayah untuk mendapat pekerjaan maupun sumber pangan seperti, beras, kopi, dan ketela. Mereka banyak pergi kewilayah Singaraja untuk ngorek kopi dan ke wilayah Tabanan untuk munuh padi serta wilayah Bangli untuk munuh ketela. Tiga wilayah ini selalu mereka datangi setelah musim panen tiba. Mereka akan kembali setelah mendapatkan hasil atau pada waktu piodalan maupun hari raya Galungan dan kuningan.</em></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Melihat fenomena ini masyarakat petulu gunung berfikir bahwa apa yang dialami merupakan suatu kejadian yang disebabkan oleh kurangnya yadnya yang dihaturkan pada Hyang Maha Kuasa. Untuk menanggulangi keadaan tersebut, masyarakat berencana untuk melaksanakan upacara besar di Pura Desa yaitu : mependem, mepedagingan, mebalik sumpah, dan ngenteg linggih. Mereka sangat percaya dengan melaksanakan upacara besar ini masyarakat petulu gunung akan hidup damai dan sejahtera.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Dengan dukungan yang sangat besar dari Puri Ubud, maka ditetapkannya upacara tersebut pada hari sabtu kliwon landep. Masyarakat mulai ngayah untuk mempersiapkan segala sesuatu yang berkaitan dengan keperluan upacara seperti : rerampe (janur, bambu), pedagingan (beras, telur), dan wewalungan (binatang kurban). Ketika masyarakat ngayah, beberapa orang diantara mereka melihat empat ekor burung kokokan di atas pohon di depan rumah mangku desa. Mereka tidak mempunyai firasat apa-apa bahwa burung itu akan menjadi penghuni desanya.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Tanggal 25 Oktober 1965 merupakan puncak acara ngenteg linggih di pura desa yang tentunya diawali terlebih dahulu dengan upacara besar seperti : melasti, mepedanan, mepedagingan, mepada. Upacara dapat terlaksana dengan khusuk, khidmat, damai, dan lancar walaupun pada masa persiapan diliputi dengan suasana yang sangat tegang karena suhu politik yang sedang memanas yaitu G30S/PKI yang sering disebut dengan GESTAPU/GESTOK. Tapi berkat kuasa Hyang Widhi mereka dapat melaksanakan yadnya yang besar itu dengan lancar.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Tepat tanggal 7 November 1965, upacara berakhir dan Ida Bhatara mesineb. Bersamaan dengan itu datanglah segerombolan burung kokokan bertengger dan bersarang di atas pepohonan yang tumbuh di ambal-ambal rumah penduduk. Melihat banyaknya burung kokokan yang datang, masyarakat mempercayai bahwa burung tersebut merupakan pica Ida Bhatara Desa. Burung kokokan ini merupakan salah satu peliharaan dari Pura Desa yang patut dipelihara dan disucikan. Akhirnya burung kokokan tersebut dijemput (dipendak) oleh seluruh masyarakat dengan upacara khusus di Pura Desa. Dari keyakinan&nbsp;&nbsp;tersebut masyarakat petulu gunung memelihara burung kokokan tersebut dengan taat dan tidak ada yang berani mengganggunya. Mereka percaya apabila mereka mengganggu burung kokokan akan berakibat fatal bagi kehidupan dirinya maupun kehidupan tanamannya yang ada di sawah. Kejadian ini sudah sering dibuktikan dengan adanya tanaman padi yang dirusak burung kokokan, orang jatuh pingsan karena menembak burung kokokan, orang yang minta maaf (neduh) karena mengambil anak kokokan tanpa permisi. Maka untuk menjaga keamanan dan kelestarian burung kokokan masyarakat petulu gunung membuat hukum (awig-awig) khusus yang berkaitan dengan keberadaan burung kokokan yang harus ditaati oleh seluruh masyarakat.&nbsp;</p>\r\n', 'frank-mckenna-231181-unsplash1.jpg', '2020-10-15 09:21:47');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `image`, `role`, `date_created`) VALUES
(1, 'Administrator', 'admin@gmail.com', '$2y$10$DN4z6M.chg9E5iOG.490AOOGezV.2AVKBJFOqVBekjEeIF0dI66ya', 'default.png', 'Admin', 1602683248),
(2, 'Pegawai', 'pegawai@gmail.com', '$2y$10$3g.VZtVDdBYxx9e00AKHD.xQgJOlxiF9Iaf3WFQxt/di5oD7yJGD.', 'default.png', 'Admin', 1602683963),
(3, 'asdf', 'asdf@gmail.com', '$2y$10$Lox9WuQjn/miMFMDixp7ueIeHBJwrFE0gJ1ULxwU9XecMraWe5Iw2', 'default.png', 'Admin', 1602910388);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `video` varchar(512) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `user_id`, `nama`, `deskripsi`, `video`, `date_created`) VALUES
(1, 1, 'nama', 'lorem', 'https://youtu.be/dBFW8OvciIU\r\n', '2020-10-17 16:02:51'),
(3, 1, 'radiohead', '<p>fake plastic trees</p>', 'https://youtu.be/n5h0qHwNrHk', '2020-10-17 16:24:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_fasilitas`
--
ALTER TABLE `jenis_fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sejarah`
--
ALTER TABLE `sejarah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jenis_fasilitas`
--
ALTER TABLE `jenis_fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sejarah`
--
ALTER TABLE `sejarah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
