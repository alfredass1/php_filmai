-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2020 m. Sau 23 d. 08:26
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movies_data`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `filmai`
--

CREATE TABLE `filmai` (
  `id` int(11) NOT NULL,
  `pavadinimas` varchar(45) DEFAULT NULL,
  `aprasymas` varchar(200) DEFAULT NULL,
  `metai` varchar(45) DEFAULT NULL,
  `rezisierius` varchar(45) DEFAULT NULL,
  `imdb` varchar(45) DEFAULT NULL,
  `zanrai_id` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `filmai`
--

INSERT INTO `filmai` (`id`, `pavadinimas`, `aprasymas`, `metai`, `rezisierius`, `imdb`, `zanrai_id`) VALUES
(1, 'Titanikas', 'RMS Titanic was a British passenger liner that sank in the North Atlantic Ocean in the early morning hours of April 15, 1912, after striking an iceberg during her maiden voyage from Southampton.', '1997', 'Cameron', '7,0', '2'),
(2, 'Gran Torino', 'When Walt Kowalski\'s neighbour, Thao, tries to steal his 1972 Gran Torino, he decides to help him reform. However, Walt gets involved in a feud with a local gang leader when he saves Thao from them.', '2008', 'Clint Eastwood', '9,0', '1');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `zanrai`
--

CREATE TABLE `zanrai` (
  `id` int(11) NOT NULL,
  `pavadinimas` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `zanrai`
--

INSERT INTO `zanrai` (`id`, `pavadinimas`) VALUES
(1, 'Trileris'),
(2, 'Katastrofa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `filmai`
--
ALTER TABLE `filmai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zanrai`
--
ALTER TABLE `zanrai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `filmai`
--
ALTER TABLE `filmai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `zanrai`
--
ALTER TABLE `zanrai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
