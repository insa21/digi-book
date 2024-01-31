-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Des 2022 pada 04.15
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `insafilm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `calender`
--
CREATE DATABASE insafilm

use insafilm

CREATE TABLE `calender` (
  `id_calender` varchar(11) NOT NULL,
  `name_calender` varchar(50) NOT NULL,
  `desc_calender` int(250) NOT NULL,
  `color_calender` int(30) NOT NULL,
  `tanggal_calender` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `film`
--

CREATE TABLE `film` (
  `id_film` varchar(110) NOT NULL,
  `photo_film` varchar(500) NOT NULL,
  `name_film` varchar(100) NOT NULL,
  `gendre_film` varchar(100) NOT NULL,
  `director_film` varchar(500) NOT NULL,
  `actors_film` varchar(500) NOT NULL,
  `country_film` varchar(100) NOT NULL,
  `duration_film` varchar(50) NOT NULL,
  `quality_film` varchar(50) NOT NULL,
  `release_film` varchar(202) NOT NULL,
  `imdb_film` varchar(50) NOT NULL,
  `resulation_film` varchar(50) NOT NULL,
  `production_film` varchar(100) NOT NULL,
  `synopsis_film` text NOT NULL,
  `link_film` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `film`
--

INSERT INTO `film` (`id_film`, `photo_film`, `name_film`, `gendre_film`, `director_film`, `actors_film`, `country_film`, `duration_film`, `quality_film`, `release_film`, `imdb_film`, `resulation_film`, `production_film`, `synopsis_film`, `link_film`) VALUES
('MVE0001', '2841e3fb40bcec4c6467b900af07f219-m2.jpg', 'Indra', 'animation, horor', 'indra saepudin', 'dssd', 'jepang', '03:33', 'HD-Rip', '06/01/2022', '99', '1080p', 'markus', 'sdsd', 'https://www.youtube.com/embed/Xiw8FOwwUow'),
('MVE0002', '1eacf41e00ac9b5588c3045a4d881549-r3.jpg', 'Indra', 'horor, romance', 'indra saepudin, kimesuni', 'asv', 'jepang', '03:03', 'Web-DL', '06/21/2022', '99', '1080p', 'Indra Saepudin', 'fhg', 'http://www.youtube.com/embed/aeI77nTNFfs'),
('MVE0003', 'bcb82abb0e9105beba4ebfe0b7f35667-r5.jpg', 'Plaguers', 'animation, horor', 'ssss', 'asdf', 'america', '04:04', 'Web-DL', '06/03/2022', '97', '4K', 'Indra Saepudin', 'dddd', 'http://www.youtube.com/embed/L18e2-IZTNU'),
('MVE0004', '8d19279e44b2bb935808e22563f3d414-r2.jpg', 'Naruto Shippuden', 'animation, adventure, action', 'Masashi Kishimoto', 'Katsuyuki Sumisawa,Junki Takegami', 'japan', '03:04', 'DVD-Rip', '06/07/2022', '96', '4K', 'Pierrot and Aniplex', 'wkwkwk', 'https://www.youtube.com/embed/2LqzF5WauAw'),
('MVE0005', 'eadd7862783c23c3901a973a021e3ee2-m1.jpg', 'UAS', 'horor, romance', 'indra saepudin', 'asas', 'america', '22:22', 'DVD-Rip', '06/01/2022', '95', '8K', 'Indra Saepudin21', 'sasaas', 'http://www.youtube.com/embed/6AC6XoDK6eo'),
('MVE0006', '0b4bc25c642a6309422a69bed0de737f-r1.jpg', 'Indra', 'horor, romance', 'ssss', 'ssdd', 'Indonesia', '02:02', 'DVD-Rip', '06/22/2022', '92', '4K', 'Indra Saepudin', 'dsdsdds', 'http://www.youtube.com/embed/6AC6XoDK6eo'),
('MVE0007', '205ec5579893111f542a2bf6b4784fe3-r4.jpg', 'link borutp', 'animation, horor', 'indra saepudin, kimesuni', 'wkwkwk', 'Indonesia', '11:11', 'HD-Rip', '06/09/2022', '83', '1440p', 'Indra Saepudin', 'hahaha\r\n', 'https://www.youtube.com/embed/2LqzF5WauAw'),
('MVE0008', '743ec6f7b8cb01dd377ccd8d6d907cbe-z1.jpg', 'Naruto Shippuden', 'animation, adventure, action', 'Masashi Kishimoto', 'indra ,saepudin', 'Indonesia', '01:02', 'DVD-Rip', '06/16/2022', '87', '1440p', 'Pierrot and Aniplex', 'Manga Naruto pertama kali diterbitkan di Jepang oleh Shueisha \r\npada tahun 1999\r\n dalam edisi ke-43 majalah Shonen Jump. \r\nDi Indonesia, manga ini diterbitkan oleh Elex Media Komputindo. Popularitas dan panjang seri Naruto sendiri (terutama di Jepang) menyaingi Dragon Ball karya Akira Toriyama, sedangkan serial anime Naruto, diproduksi oleh Studio Pierrot dan Aniplex, disiarkan secara perdana di Jepang oleh jaringan TV Tokyo dan juga oleh jaringan televisi satelit khusus anime, seperti Animax dan stasiun televisi lainnya, pada 3 Oktober 2002 sampai sekarang. Seri pertama terdiri atas 9 musim dan berlangsung 220 episode. Musim pertama dari seri kedua mulai ditayangkan pada tanggal 15 Februari 2007. Di Indonesia sendiri, anime Naruto pernah ditayangkan oleh stasiun televisi Trans TV, yang kemudian ditayangkan lebih lanjut oleh GTV dan sempat ditayangkan di Indosiar untuk musim keempat dan kelima sampai Naruto Shippuden musim kelima. Selain serial anime, Studio Pierrot telah mengembangkan delapan film untuk seri dan beberapa original video animation (OVA). Jenis barang dagangan termasuk novel ringan, permainan video dan koleksi kartu yang dikembangkan oleh beberapa perusahaan.', 'http://www.youtube.com/embed/_5dYUm4zEXw');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `calender`
--
ALTER TABLE `calender`
  ADD PRIMARY KEY (`id_calender`);

--
-- Indeks untuk tabel `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
