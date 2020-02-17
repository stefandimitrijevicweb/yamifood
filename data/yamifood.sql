-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2020 at 05:54 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yamifood`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorija` (
  `id_kategorija` int(10) NOT NULL,
  `naziv_kategorije` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`id_kategorija`, `naziv_kategorije`) VALUES
(1, 'Drinks'),
(2, 'Lunch'),
(3, 'Dinner');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id_korisnik` int(10) NOT NULL,
  `ime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `datum_registracije` int(10) NOT NULL,
  `id_uloga` int(10) NOT NULL,
  `ulogovan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id_korisnik`, `ime`, `prezime`, `password`, `email`, `datum_registracije`, `id_uloga`, `ulogovan`) VALUES
(1, 'Stefan', 'Dimitrijevic', 'e42337a246c9864183d92125eb51d86c', 'stefangmbg@gmail.com', 1581457827, 1, 0),
(6, 'Marko', 'Markovic', '26c7c9089e23c14396410bbc6675dbdf', 'marko@gmail.com', 1581954712, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik_proizvod`
--

CREATE TABLE `korisnik_proizvod` (
  `id_korisnik_proizvod` int(10) NOT NULL,
  `id_korisnik` int(10) NOT NULL,
  `id_proizvod` int(10) NOT NULL,
  `ocena` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik_proizvod`
--

INSERT INTO `korisnik_proizvod` (`id_korisnik_proizvod`, `id_korisnik`, `id_proizvod`, `ocena`) VALUES
(4, 1, 12, 5),
(5, 1, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `meni`
--

CREATE TABLE `meni` (
  `id_meni` int(10) NOT NULL,
  `putanja` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `naziv` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `redosled` int(10) NOT NULL,
  `id_pozicija_meni` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meni`
--

INSERT INTO `meni` (`id_meni`, `putanja`, `naziv`, `redosled`, `id_pozicija_meni`) VALUES
(1, 'index.php?page=home', 'Home', 0, 1),
(2, 'index.php?page=menu', 'Menu', 1, 1),
(3, 'index.php?page=register', 'Register', 2, 1),
(4, 'index.php?page=login', 'Login', 3, 1),
(5, 'models/login/logout.php', 'Logout', 4, 1),
(6, 'admin.php', 'Admin panel', 5, 1),
(7, '#', 'Documentation', 6, 2),
(8, 'index.php?page=aboutme', 'About me', 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `meni_uloga`
--

CREATE TABLE `meni_uloga` (
  `id_meni_uloga` int(10) NOT NULL,
  `id_meni` int(10) NOT NULL,
  `id_uloga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meni_uloga`
--

INSERT INTO `meni_uloga` (`id_meni_uloga`, `id_meni`, `id_uloga`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 1),
(5, 2, 2),
(6, 2, 3),
(7, 3, 3),
(8, 4, 3),
(9, 5, 1),
(10, 5, 2),
(11, 6, 1),
(12, 7, 1),
(13, 7, 2),
(14, 7, 3),
(15, 8, 1),
(16, 8, 2),
(17, 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pozicija_meni`
--

CREATE TABLE `pozicija_meni` (
  `id_pozicija_meni` int(10) NOT NULL,
  `pozicija` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pozicija_meni`
--

INSERT INTO `pozicija_meni` (`id_pozicija_meni`, `pozicija`) VALUES
(1, 'header'),
(2, 'footer');

-- --------------------------------------------------------

--
-- Table structure for table `proizvod`
--

CREATE TABLE `proizvod` (
  `id_proizvod` int(10) NOT NULL,
  `naziv_proizvoda` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `opis` text COLLATE utf8_unicode_ci NOT NULL,
  `cena` decimal(10,2) NOT NULL,
  `slika` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mala_slika` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_kategorija` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proizvod`
--

INSERT INTO `proizvod` (`id_proizvod`, `naziv_proizvoda`, `opis`, `cena`, `slika`, `mala_slika`, `id_kategorija`) VALUES
(12, 'Whiskey Coctail', 'Sed id magna vitae eros sagittis euismod.', '7.79', '1581943788img-01.jpg', 'mala_1581943788img-01.jpg', 1),
(13, 'Mojito', 'Sed id magna vitae eros sagittis euismod.', '9.79', '1581943959img-02.jpg', 'mala_1581943959img-02.jpg', 1),
(14, 'Beer', 'Sed id magna vitae eros sagittis euismod.', '10.79', '1581944078img-03.jpg', 'mala_1581944078img-03.jpg', 1),
(15, 'Cheeseburger', 'Sed id magna vitae eros sagittis euismod.', '15.79', '1581944245img-04.jpg', 'mala_1581944245img-04.jpg', 2),
(16, 'Diet meal', 'Sed id magna vitae eros sagittis euismod.', '18.79', '1581944441img-05.jpg', 'mala_1581944441img-05.jpg', 2),
(17, 'Chicken with rice', 'Sed id magna vitae eros sagittis euismod.', '20.79', '1581944631img-06.jpg', 'mala_1581944631img-06.jpg', 2),
(18, 'Chocolate biscuit', 'Sed id magna vitae eros sagittis euismod.', '6.79', '1581944792img-07.jpg', 'mala_1581944791img-07.jpg', 3),
(19, 'Korean Dinner', 'Sed id magna vitae eros sagittis euismod.', '12.99', '1581944868img-08.jpg', 'mala_1581944868img-08.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `slajder_pocetna`
--

CREATE TABLE `slajder_pocetna` (
  `id_slajder_pocetna` int(10) NOT NULL,
  `putanja` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slajder_pocetna`
--

INSERT INTO `slajder_pocetna` (`id_slajder_pocetna`, `putanja`, `alt`) VALUES
(1, 'slider-01.jpg', 'Slika 1'),
(2, 'slider-02.jpg', 'Slika 2'),
(3, 'slider-03.jpg', 'Slika 3');

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE `uloga` (
  `id_uloga` int(10) NOT NULL,
  `naziv` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`id_uloga`, `naziv`) VALUES
(1, 'Administrator'),
(2, 'Autorizovan'),
(3, 'Neautorizovan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`id_kategorija`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id_korisnik`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_uloga` (`id_uloga`);

--
-- Indexes for table `korisnik_proizvod`
--
ALTER TABLE `korisnik_proizvod`
  ADD PRIMARY KEY (`id_korisnik_proizvod`),
  ADD KEY `id_korisnik` (`id_korisnik`),
  ADD KEY `id_proizvod` (`id_proizvod`);

--
-- Indexes for table `meni`
--
ALTER TABLE `meni`
  ADD PRIMARY KEY (`id_meni`),
  ADD KEY `id_pozicija_meni` (`id_pozicija_meni`);

--
-- Indexes for table `meni_uloga`
--
ALTER TABLE `meni_uloga`
  ADD PRIMARY KEY (`id_meni_uloga`),
  ADD KEY `id_meni` (`id_meni`),
  ADD KEY `id_uloga` (`id_uloga`);

--
-- Indexes for table `pozicija_meni`
--
ALTER TABLE `pozicija_meni`
  ADD PRIMARY KEY (`id_pozicija_meni`);

--
-- Indexes for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD PRIMARY KEY (`id_proizvod`),
  ADD KEY `id_kategorija` (`id_kategorija`);

--
-- Indexes for table `slajder_pocetna`
--
ALTER TABLE `slajder_pocetna`
  ADD PRIMARY KEY (`id_slajder_pocetna`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
  ADD PRIMARY KEY (`id_uloga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `id_kategorija` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id_korisnik` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `korisnik_proizvod`
--
ALTER TABLE `korisnik_proizvod`
  MODIFY `id_korisnik_proizvod` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `meni`
--
ALTER TABLE `meni`
  MODIFY `id_meni` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `meni_uloga`
--
ALTER TABLE `meni_uloga`
  MODIFY `id_meni_uloga` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pozicija_meni`
--
ALTER TABLE `pozicija_meni`
  MODIFY `id_pozicija_meni` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `proizvod`
--
ALTER TABLE `proizvod`
  MODIFY `id_proizvod` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `slajder_pocetna`
--
ALTER TABLE `slajder_pocetna`
  MODIFY `id_slajder_pocetna` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
  MODIFY `id_uloga` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`id_uloga`) REFERENCES `uloga` (`id_uloga`);

--
-- Constraints for table `korisnik_proizvod`
--
ALTER TABLE `korisnik_proizvod`
  ADD CONSTRAINT `korisnik_proizvod_ibfk_1` FOREIGN KEY (`id_korisnik`) REFERENCES `korisnik` (`id_korisnik`) ON DELETE CASCADE,
  ADD CONSTRAINT `korisnik_proizvod_ibfk_2` FOREIGN KEY (`id_proizvod`) REFERENCES `proizvod` (`id_proizvod`) ON DELETE CASCADE;

--
-- Constraints for table `meni`
--
ALTER TABLE `meni`
  ADD CONSTRAINT `meni_ibfk_1` FOREIGN KEY (`id_pozicija_meni`) REFERENCES `pozicija_meni` (`id_pozicija_meni`);

--
-- Constraints for table `meni_uloga`
--
ALTER TABLE `meni_uloga`
  ADD CONSTRAINT `meni_uloga_ibfk_1` FOREIGN KEY (`id_meni`) REFERENCES `meni` (`id_meni`),
  ADD CONSTRAINT `meni_uloga_ibfk_2` FOREIGN KEY (`id_uloga`) REFERENCES `uloga` (`id_uloga`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
