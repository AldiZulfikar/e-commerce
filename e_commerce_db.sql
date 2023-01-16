-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2023 at 08:17 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `detail_transaksi_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `no_invoice` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`detail_transaksi_id`, `owner_id`, `produk_id`, `model_id`, `no_invoice`) VALUES
(19, 2, 8, 9, 'TF20231501042333'),
(20, 2, 8, 10, 'TF20231501042333'),
(21, 2, 8, 9, 'TF20231501042519'),
(22, 2, 8, 9, 'TF20231501052244'),
(23, 2, 8, 10, 'TF20231501052244');

-- --------------------------------------------------------

--
-- Table structure for table `gambar_produk`
--

CREATE TABLE `gambar_produk` (
  `gambar_produk_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `gambar_utama` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gambar_produk`
--

INSERT INTO `gambar_produk` (`gambar_produk_id`, `produk_id`, `gambar_utama`, `gambar`, `created_at`) VALUES
(45, 8, 0, 'Gambar_20231401192307.jpg', '2023-01-14'),
(46, 8, 0, 'Gambar_20231501034913.png', '2023-01-15'),
(48, 8, 1, 'Gambar_20231501035253.jpg', '2023-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `keranjang_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_produk`
--

CREATE TABLE `model_produk` (
  `model_produk_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `berat` float NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `model_produk`
--

INSERT INTO `model_produk` (`model_produk_id`, `produk_id`, `model`, `harga`, `jumlah`, `berat`, `created_at`) VALUES
(9, 8, '4x1', '25000', 21, 2, '2023-01-15'),
(10, 8, '2x3', '35000', 21, 22, '2023-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `produk_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`produk_id`, `user_id`, `nama_produk`, `deskripsi`, `created_at`) VALUES
(8, 2, 'Meja Cuan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam unde autem repellendus assumenda. Id similique vitae, porro ullam voluptas magnam cumque officia voluptate, officiis voluptatibus labore culp2 possimus, obcaecati illo.Lorem ipsum doiLorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam unde autem repellendus assumenda. Id similique vitae, porro ullam voluptas magnam cumque officia voluptate, officiis voluptatibus labore culp2 possimus, obcaecati illo.Lorem ipsum ds Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam unde autem repellendus assumenda. Id similique vitae, porro ullam voluptas magnam cumque officia voluptate, officiis voluptatibus labore culp2 possimus, obcaecati illo.Lorem ipsum doiLorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam unde autem repellendus assumenda. Id similique vitae, porro ullam voluptas magnam cumque officia voluptate, officiis voluptatibus labore culp2 possimus, obcaecati illo.Lorem ipsum d', '2023-01-14');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `no_invoice` varchar(255) NOT NULL,
  `nama_penerima` varchar(255) NOT NULL,
  `email_penerima` varchar(255) NOT NULL,
  `total` float NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `notel` int(11) NOT NULL,
  `bukti_tf` varchar(255) NOT NULL,
  `status_pembayaran` int(11) NOT NULL,
  `status_pengiriman` int(11) NOT NULL,
  `no_resi` bigint(20) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `owner_id`, `no_invoice`, `nama_penerima`, `email_penerima`, `total`, `alamat`, `notel`, `bukti_tf`, `status_pembayaran`, `status_pengiriman`, `no_resi`, `created_at`) VALUES
(13, 2, 'TF20231501042333', 'Aldi Zulfikar', 'aldizulfikar04@gmail.com', 300000, 'Jl Inpres IX No 52', 2147483647, 'Bukti_tf_20231501042333.jpg', 1, 1, 1231121211, '2023-01-15'),
(14, 2, 'TF20231501042519', 'Aldi Zulfikar', 'aldizulfikar04@gmail.com', 45000, 'Jl Inpres IX No 52', 121312, 'Bukti_tf_20231501042519.png', 1, 2, 21212123123122413, '2023-01-15'),
(15, 2, 'TF20231501052244', 'Dijul', 'admin@admin.com', 300000, 'Jl Inpres IX No 52', 212, 'Bukti_tf_20231501052244.png', 0, 0, 0, '2023-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` int(11) NOT NULL,
  `notel` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `jenis_kelamin`, `notel`, `email`, `level`, `created_at`) VALUES
(2, 'AdminAdmin', '$2y$10$dJ0C5Y84uQ833z8tgFonTulYiZVrANkb8C3tCIx7Ky/gXa/4Wl1hG', 'Admin', 0, 898989898, '', 'admin', '2023-01-08'),
(6, 'AldiZulfikar', '$2y$10$XNNSpKDXREGYHl7kLxYyy.jwSXstNKEOcVz/e37mSyFR4rT5GsHJO', 'Aldi Zulfikar', 0, 0, 'aldizulfikar04@gmail.com', 'user', '2023-01-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`detail_transaksi_id`),
  ADD KEY `produk_id` (`produk_id`),
  ADD KEY `user_id` (`owner_id`);

--
-- Indexes for table `gambar_produk`
--
ALTER TABLE `gambar_produk`
  ADD PRIMARY KEY (`gambar_produk_id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`keranjang_id`),
  ADD KEY `model_id` (`model_id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indexes for table `model_produk`
--
ALTER TABLE `model_produk`
  ADD PRIMARY KEY (`model_produk_id`),
  ADD KEY `model_produk_ibfk_1` (`produk_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `detail_transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `gambar_produk`
--
ALTER TABLE `gambar_produk`
  MODIFY `gambar_produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `keranjang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `model_produk`
--
ALTER TABLE `model_produk`
  MODIFY `model_produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`produk_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gambar_produk`
--
ALTER TABLE `gambar_produk`
  ADD CONSTRAINT `gambar_produk_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`produk_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`model_id`) REFERENCES `model_produk` (`model_produk_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`produk_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_produk`
--
ALTER TABLE `model_produk`
  ADD CONSTRAINT `model_produk_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`produk_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
