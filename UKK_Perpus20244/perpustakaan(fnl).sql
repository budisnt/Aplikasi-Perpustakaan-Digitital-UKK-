-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2024 at 08:37 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `foto` varchar(255) NOT NULL,
  `penulis` varchar(255) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `tahun_terbit` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `id_kategori`, `judul`, `foto`, `penulis`, `penerbit`, `tahun_terbit`, `deskripsi`, `stok`) VALUES
(18, 12, 'Dune', 'Dune.jpg', 'Pramoedya Ananta Toer', 'Chilton', '1965', 'Dune adalah epic fiksi ilmiah yang menggabungkan elemen politik,agama,dan petualangan di planet gurun yang misterius', 9),
(19, 13, 'The pillar of the Earth', 'The pillar of the Earth.jpg', 'Ken Follett', 'William Morrow', '1989', 'Novel ini mengisahkan pembangunan katedral fiktif di abad ke-12 dan melibatkan intrik politik, cinta, dan pertarungan kekuasaan.', 10),
(20, 14, 'The Girl with the Dragon Tattoo', 'The Girl with the Dragon Tattoo.jpg', 'Stieg Larsson', 'Norstedts Förlag', '2005', 'Sebuah misteri seru yang melibatkan seorang jurnalis dan seorang hacker dalam penyelidikan kasus hilangnya anggota keluarga kaya.', 9),
(21, 15, 'Milk and Honey', 'Milk and Honey.jpg', 'Rupi Kaur', 'Andrews McMeel Publishing', '2004', 'Koleksi puisi yang menggugah perasaan, mengeksplorasi tema kehidupan, cinta, dan keberanian.', 10),
(22, 16, 'The 7 Habits of Highly Effective People', 'The 7 Habits of Highly Effective People.jpg', 'Stephen R. Covey', 'Free Press', '1989', 'Buku ini menawarkan prinsip-prinsip untuk mencapai kesuksesan dan efektivitas dalam kehidupan pribadi dan profesional.', 10),
(23, 17, 'The Fellowship of the Ring', 'The Fellowship of the Ring.jpg', 'J.R.R. Tolkien', 'Allen & Unwin', 'Allen & Unwin', 'Bagian pertama dari trilogi \"The Lord of the Rings,\" membawa pembaca ke dunia Middle-earth yang penuh dengan makhluk fantastis dan petualangan epik.', 10),
(24, 18, 'Sapiens: A Brief History of Humankind', 'Sapiens A Brief History of Humankind.jpeg', 'Yuval Noah Harari', 'Harper', '2014', 'Sebuah eksplorasi menyeluruh tentang sejarah manusia, menggabungkan antropologi, sejarah, dan sains.', 10),
(25, 19, 'The Joy of Cooking', 'The Joy of Cooking.jpg', 'Irma S. Rombauer', 'Bobbs-Merrill', '1931', 'Sebuah panduan kuliner klasik yang mencakup berbagai resep dan tips memasak.', 10),
(26, 20, 'Pride and Prejudice', 'Pride and Prejudice.jpg', 'Jane Austen', 'T. Egerton', '1813', 'Novel klasik yang menggambarkan kehidupan perempuan di Inggris pada awal abad ke-19, dengan fokus pada tema cinta dan kelas sosial.', 10),
(27, 21, 'Harry Potter', 'Harry Potter.jpg', 'J.K. Rowling', 'Bloomsbury', '1997', 'Novel pertama dalam seri \"Harry Potter,\" mengikuti petualangan seorang anak penyihir yang baru menemukan warisannya di dunia sihir.', 10);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(12, 'Fiksi Ilmiah'),
(13, 'Novel Sejarah'),
(14, 'Misteri'),
(15, 'Puisi '),
(16, 'Pengembangan Diri'),
(17, 'Fantasi'),
(18, 'Ilmiah Populer'),
(19, 'Kuliner'),
(20, 'Sastra Klasik'),
(21, 'Anak-anak');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `tanggal_peminjaman` varchar(255) DEFAULT NULL,
  `tanggal_pengembalian` varchar(255) DEFAULT NULL,
  `status_peminjaman` enum('dipinjam','dikembalikan') DEFAULT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_user`, `id_buku`, `tanggal_peminjaman`, `tanggal_pengembalian`, `status_peminjaman`, `jumlah`) VALUES
(25, 7, 20, '24-02-22', '24-02-29', 'dipinjam', 1),
(26, 7, 18, '24-02-22', '24-02-29', 'dipinjam', 1);

--
-- Triggers `peminjaman`
--
DELIMITER $$
CREATE TRIGGER `peminjaman` AFTER INSERT ON `peminjaman` FOR EACH ROW BEGIN
    UPDATE buku SET stok = stok - NEW.jumlah WHERE id_buku = NEW.id_buku;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `pengembalian` AFTER UPDATE ON `peminjaman` FOR EACH ROW BEGIN 
UPDATE buku SET stok=stok+old.jumlah
WHERE id_buku=old.id_buku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id_ulasan` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `ulasan` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`id_ulasan`, `id_user`, `id_buku`, `ulasan`, `rating`) VALUES
(16, 7, 18, 'Wow sangat Menarik sekali ', 1),
(17, 7, 18, 'Wow sangat Menarik sekali ', 1),
(18, 7, 20, 'B aja', 3),
(19, 7, 21, 'wow', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `level` enum('admin','petugas','peminjam') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `email`, `alamat`, `level`) VALUES
(7, 'Budi Santoso', 'budi', '00dfc53ee86af02e742515cdcf075ed3', 'budi4@gmail.com', 'Cibingbin', 'peminjam'),
(8, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', '-------', 'admin'),
(10, 'mumut', 'mumut', '202cb962ac59075b964b07152d234b70', 'muti@gmail.com', 'korea', 'petugas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `fk_id_kategori_buku` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `fk_id_user_peminjaman` (`id_user`),
  ADD KEY `fk_id_buku_peminjaman` (`id_buku`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `fk_id_user_ulasan` (`id_user`),
  ADD KEY `fk_id_buku_ulasan` (`id_buku`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
