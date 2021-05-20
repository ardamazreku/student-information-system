-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 01, 2020 at 08:02 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uni`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `Delete_studentinfo`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Delete_studentinfo` (IN `sid` INT)  BEGIN
 DELETE FROM studenti
 WHERE id=sid;
 END$$

DROP PROCEDURE IF EXISTS `insertoStudent`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertoStudent` (IN `ids` INT, IN `dataregjistrimits` CHAR(100), IN `departamentis` INT, IN `semestris` INT, OUT `ok` CHAR(50))  r: BEGIN DECLARE cnt INT;
 
SELECT COUNT(*) INTO cnt FROM studenti WHERE id  = ids; 
 
IF cnt != 0 THEN SET ok = 'ky student ekziston!';
LEAVE r; 
ELSE INSERT INTO studenti(id, dataregjistrimit, departamenti, semestri)  
VALUES(ids, dataregjistrimits, departamentis, semestris); SET ok = 'insertimi u realizua me sukses!';   
END IF; 
END$$

DROP PROCEDURE IF EXISTS `Updatesemestri`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Updatesemestri` (IN `sid` INT, IN `semestri` INT)  BEGIN
    UPDATE studenti
    SET
   semestri = semestri WHERE id = sid;
    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `departamenti`
--

DROP TABLE IF EXISTS `departamenti`;
CREATE TABLE IF NOT EXISTS `departamenti` (
  `id` int(11) NOT NULL,
  `emri` char(100) DEFAULT NULL,
  `fakulteti` int(11) DEFAULT NULL,
  `numriStudenteveRegjistruar` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fakulteti` (`fakulteti`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departamenti`
--

INSERT INTO `departamenti` (`id`, `emri`, `fakulteti`, `numriStudenteveRegjistruar`) VALUES
(1, 'Dizajn Softueri', 1, 24),
(2, 'TIT', 1, 21),
(3, 'TIT - (Gj.Boshnjake)', 1, 0),
(4, 'TIT - (Gj.Turke)', 1, 4),
(5, 'Administrim Biznesi', 3, 1),
(6, 'Menaxhim Nderkombetar', 3, 0),
(7, 'Juridik', 2, 0),
(8, 'Gjuhe shqipe', 4, 0),
(9, 'Gjuhe angleze', 4, 0),
(10, 'Gjuhe gjermane', 4, 0),
(11, 'Programi fillor', 5, 0),
(12, 'Programi parafillor', 5, 0),
(13, 'Agrobiznes', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `fakulteti`
--

DROP TABLE IF EXISTS `fakulteti`;
CREATE TABLE IF NOT EXISTS `fakulteti` (
  `id` int(11) NOT NULL,
  `emri` char(100) DEFAULT NULL,
  `nr_viteve` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakulteti`
--

INSERT INTO `fakulteti` (`id`, `emri`, `nr_viteve`) VALUES
(1, 'Fakulteti i Shkencave Kompjuterike', 3),
(2, 'Fakulteti Juridik', 4),
(3, 'Fakulteti Ekonomik', 3),
(4, 'Fakulteti Filologjik', 4),
(5, 'Fakulteti i Edukimit', 4),
(6, 'Fakulteti i Shkencave te Jetes dhe Mjedisit', 3),
(7, 'Fakulteti i Artit', 3),
(8, 'Fakulteti Muzikes', 3),
(9, 'Fakulteti Psikologjise', 3),
(10, 'Fakulteti Edukimit Fizik', 3);

-- --------------------------------------------------------

--
-- Table structure for table `grupet`
--

DROP TABLE IF EXISTS `grupet`;
CREATE TABLE IF NOT EXISTS `grupet` (
  `id` int(11) NOT NULL,
  `pershkrimi` char(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grupet`
--

INSERT INTO `grupet` (`id`, `pershkrimi`) VALUES
(1, 'Grupi pare'),
(2, 'Grupi dyte');

-- --------------------------------------------------------

--
-- Table structure for table `lenda`
--

DROP TABLE IF EXISTS `lenda`;
CREATE TABLE IF NOT EXISTS `lenda` (
  `kodi` char(12) NOT NULL,
  `emri` char(100) DEFAULT NULL,
  `kredite` int(11) DEFAULT NULL,
  `statusi` char(15) DEFAULT NULL,
  `semestri_id` int(11) DEFAULT NULL,
  `nr_studenteve` int(11) DEFAULT NULL,
  `nrgrup` int(11) DEFAULT NULL,
  `id_prof` int(11) DEFAULT NULL,
  PRIMARY KEY (`kodi`),
  KEY `semestri_id` (`semestri_id`),
  KEY `tedhenat_studenti` (`kodi`,`emri`,`semestri_id`),
  KEY `id_prof` (`id_prof`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lenda`
--

INSERT INTO `lenda` (`kodi`, `emri`, `kredite`, `statusi`, `semestri_id`, `nr_studenteve`, `nrgrup`, `id_prof`) VALUES
('123', 'Hyrje ne Programim', 6, 'Obligative', 1, 30, 2, 3),
('124', 'Hyrje ne Informatike', 6, 'Obligative', 1, 30, 2, 2),
('125', 'Matematika 1', 6, 'Obligative', 1, 30, 2, 6),
('126', 'Media e re dhe multimedia', 6, 'Obligative', 1, 30, 2, 4),
('127', 'Hyrje ne Rrjeta', 6, 'Obligative', 1, 30, 2, 8),
('128', 'Hyrje ne Web gjuhe dhe teknologjite', 6, 'Obligative', 2, 30, 2, 7),
('129', 'Matematika Diskrete', 6, 'Obligative', 2, 30, 2, 6),
('130', 'Sistemet operative dhe menaxhimi sistemeve', 6, 'Obligative', 2, 30, 2, 5),
('131', 'Protokolet e internetit', 6, 'Zgjedhore', 2, 30, 2, 8),
('132', 'Algoritmet dhe struktura e te dhenave', 6, 'Obligative', 2, 30, 2, 3),
('133', 'Inxhenieringu softuerik dhe menaxhimi projekteve', 6, 'Obligative', 3, 30, 2, 9),
('134', 'Sistemi i databazave', 6, 'Obligative', 3, 30, 2, 7),
('135', 'Zhvillimi avancuar i webit', 6, 'obligative', 3, 30, 2, 7),
('136', 'Anglisht per shkenca kompjuterike', 6, 'Zgjedhore', 3, 30, 2, 10),
('137', 'OOP', 6, 'Obligative', 3, 30, 2, 3),
('138', 'Zhvillimi i avancuar i webit', 6, 'Obligative', 4, 30, 2, 7),
('139', 'Databaza e avancuar', 6, 'Obligative', 4, 30, 2, 7),
('140', 'Metodat Kerkimore', 6, 'Obligative', 4, 30, 2, 2),
('141', 'E-Biznesi', 6, 'Zgjedhore', 4, 30, 2, 8),
('142', 'GKPI', 6, 'Obligative', 4, 30, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ligjerimet`
--

DROP TABLE IF EXISTS `ligjerimet`;
CREATE TABLE IF NOT EXISTS `ligjerimet` (
  `lenda` char(12) NOT NULL DEFAULT '',
  `profesori` int(11) NOT NULL DEFAULT 0,
  `semestri` int(11) NOT NULL DEFAULT 0,
  `departamenti` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`lenda`,`profesori`,`semestri`,`departamenti`),
  KEY `profesori` (`profesori`),
  KEY `semestri` (`semestri`),
  KEY `departamenti` (`departamenti`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ligjerimet`
--

INSERT INTO `ligjerimet` (`lenda`, `profesori`, `semestri`, `departamenti`) VALUES
('123', 3, 1, 1),
('124', 2, 1, 1),
('125', 6, 1, 1),
('126', 4, 1, 1),
('127', 5, 1, 1),
('128', 7, 2, 1),
('129', 6, 2, 1),
('130', 5, 2, 1),
('131', 8, 2, 1),
('132', 3, 2, 1),
('133', 9, 3, 1),
('134', 7, 3, 1),
('135', 7, 3, 1),
('136', 10, 3, 1),
('137', 3, 3, 1),
('138', 7, 4, 1),
('139', 7, 4, 1),
('140', 2, 4, 1),
('141', 8, 4, 1),
('142', 3, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orari`
--

DROP TABLE IF EXISTS `orari`;
CREATE TABLE IF NOT EXISTS `orari` (
  `id` int(11) NOT NULL,
  `ligjeratat` char(20) DEFAULT NULL,
  `ushtrimet` char(20) DEFAULT NULL,
  `klasa` char(10) DEFAULT NULL,
  `dita` char(10) DEFAULT NULL,
  `grupet` int(11) DEFAULT NULL,
  `terminet_e_lira` char(30) DEFAULT NULL,
  `lenda` char(12) CHARACTER SET latin1 DEFAULT NULL,
  `studenti` int(11) DEFAULT NULL,
  `dita_lire` varchar(20) DEFAULT NULL,
  `klasa_lire` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `grupet` (`grupet`),
  KEY `lenda` (`lenda`),
  KEY `studenti` (`studenti`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orari`
--

INSERT INTO `orari` (`id`, `ligjeratat`, `ushtrimet`, `klasa`, `dita`, `grupet`, `terminet_e_lira`, `lenda`, `studenti`, `dita_lire`, `klasa_lire`) VALUES
(1, '08:00-09:30', '09:30-11:00', '420', 'Hene', 1, '08:00-09:30', '123', 123456789, 'Shtune', '421'),
(2, '09:30-11:00', '09:30-11:00', '419', 'Shtune', 1, '09:30-11:00', '124', 123456789, 'Shtune', '419'),
(3, '08:00-09:30', '09:30-11:00', '422', 'Merkure', 1, '11:00-12:30', '125', 123456789, 'Shtune', '420'),
(4, '08:00-09:30', '09:30-11:00', '432', 'Enjte', 1, '12:30-14:00', '126', 123456789, 'Shtune', '401'),
(5, '08:00-09:30', '09:30-11:00', '421', 'Premte', 1, '14:00-15:30', '127', 123456789, 'Shtune', '402'),
(6, '14:00-15:30', '12:30-14:00', '403', 'Shtune', 2, '14:00-15:30', '123', 123456788, 'Shtune', '403'),
(7, '08:00-09:30', '14:00-15:30', '404', 'Shtune', 2, '08:00-09:30', '124', 123456788, 'Shtune', '404'),
(8, '12:30-14:00', '14:00-15:30', '432', 'Merkure', 2, '09:30-11:00', '125', 123456788, 'Shtune', '405'),
(9, '12:30-14:00', '14:00-15:30', '420', 'Enjte', 2, '08:00-09:30', '126', 123456788, 'Shtune', '406'),
(10, '12:30-14:00', '14:00-15:30', '422', 'Premte', 2, '09:30-11:00', '127', 123456788, 'Shtune', '407'),
(11, '09:30-11:00', '08:00-09:30', '422', 'Hene', 2, '12:30-14:00', '128', 123456798, 'Premte', '408'),
(12, '13:00-14:30', '14:30-15:00', '420', 'Marte', 2, '08:00-09:00', '129', 123456798, 'Shtune', '409'),
(13, '12:00-13:30', '13:30-15:00', '430', 'Merkure', 2, 'Nuk ka termine te lira', '130', 123456798, NULL, NULL),
(14, '12:00-13:30', '13:30-15:00', '418', 'Enjte', 2, 'Nuk ka termine te lira', '131', 123456798, NULL, NULL),
(15, '12:00-13:30', '13:30-15:00', '433', 'Premte', 2, 'Nuk ka termine te lira', '132', 123456798, NULL, NULL),
(16, '08:00-09:30', '09:30-11:00', '430', 'Hene', NULL, 'Nuk ka termine te lira', '133', 123456879, NULL, NULL),
(17, '12:30-14:00', '09:30-11:00', '432', 'Marte', NULL, '09:30-11:00', '134', 123456879, 'Shtune', '410'),
(18, '11:00-12:30', '09:30-11:00', '430', 'Premte', NULL, '11:00-12:30', '135', 123456879, 'Shtune', 'amfiteater'),
(19, '08:00-09:30', '09:30-11:00', '422', 'Enjte', NULL, 'nuk ka termine te lira', '136', 123456879, NULL, NULL),
(20, '16:00-17:30', '09:30-11:00', '418', 'Hene', NULL, '08:00-09:30', '137', 123456879, 'Shtune', '410'),
(21, '08:00-09:30', '09:30-11:00', '419', 'Hene', NULL, '08:00-09:30', '138', 123456987, 'Shtune', '411'),
(22, '12:30-14:00', '09:30-11:00', '410', 'Enjte', NULL, '12:30-14:00', '139', 123456987, 'Shtune', '412'),
(25, '13:00-14:30', '14:30-16:00', '407', 'Premte', NULL, '09:00-10:30', '140', 123456987, 'Shtune', '413'),
(26, '12:00-13:30', '13:30-15:00', '418', 'Premte', NULL, 'nuk ka termine te lira', '141', 123456987, NULL, NULL),
(27, '08:00-09:30', '09:30-11:00', '425', 'Marte', NULL, 'nuk ka termine te lira', '142', 123456987, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `perdoruesi`
--

DROP TABLE IF EXISTS `perdoruesi`;
CREATE TABLE IF NOT EXISTS `perdoruesi` (
  `id` int(11) NOT NULL,
  `emri` char(15) DEFAULT NULL,
  `mbiemri` char(15) DEFAULT NULL,
  `email` char(30) DEFAULT NULL,
  `fjalekalimi` char(32) DEFAULT NULL,
  `roli` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `roli` (`roli`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perdoruesi`
--

INSERT INTO `perdoruesi` (`id`, `emri`, `mbiemri`, `email`, `fjalekalimi`, `roli`) VALUES
(1, 'Xhevat', 'Kallaba', 'xhevat.kallaba@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(2, 'Samedin', 'Krrabaj', 'samedin.krrabaj@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2),
(3, 'Ercan', 'Canhasi', 'ercan.canhasi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2),
(4, 'Astrit', 'Hulaj', 'astrit.hulaj@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2),
(5, 'Arsim', 'Susuri', 'arsim.susuri@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2),
(6, 'Avdullah', 'Zejnullahu', 'avdullah.zejnullahu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2),
(7, 'Zirije', 'Hasani', 'zirije.hasani@uni-prizren.com', 'e10adc3949ba59abbe56e057f20f883e', 2),
(8, 'Naim', 'Baftiu', 'naim.baftiu@uni-prizren.com', 'e10adc3949ba59abbe56e057f20f883e', 2),
(9, 'Malush', 'Mjaku', 'fegeg', 'e10adc3949ba59abbe56e057f20f883e', 2),
(10, 'Kadri', 'Krasniqi', 'kadri.krasniqi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2),
(123456666, 'Arda', 'Sopaj', 'ardamazrekuupwork@gmail.com', '3b16bdc1ca73ccb8b541cead66b8e2a0', 3),
(123456777, 'Fjolla', 'Mazreku', 'besianapz@hotmail.com', '4a82510aded7dd0e2aba1d13dccbb97f', 3),
(123456778, 'Festa', 'Mazreku', 'festamazreku@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 3),
(123456788, 'Arda', 'Mazreku', 'ardamazreku99@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 3),
(123456789, 'Genc', 'Shala', 'genc.shala@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 3),
(123456798, 'Test', 'Testi', 'test.testi@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 3),
(123456879, 'Filan', 'Fisteku', 'filan.fisteku@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 3),
(123456987, 'Filan', 'Fisteku', 'filani.fisteku@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 3),
(123459876, 'Gent', 'Berisha', 'gent.berisha@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 3),
(123546789, 'Alea', 'Morina', 'a.morina@gmail.com', '8a3009ebd8c2812c099c9edcfc2ec9e9', 3);

-- --------------------------------------------------------

--
-- Table structure for table `profesori`
--

DROP TABLE IF EXISTS `profesori`;
CREATE TABLE IF NOT EXISTS `profesori` (
  `id` int(11) NOT NULL,
  `titulli` char(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profesori`
--

INSERT INTO `profesori` (`id`, `titulli`) VALUES
(2, 'Profesor i Asocuar'),
(3, 'Profesor i Asocuar'),
(4, 'Profesor Asistent'),
(5, 'Profesor Asistent'),
(6, 'Profesor Doktor'),
(7, 'Profesor Doktor'),
(8, 'Profesor i Asociuar'),
(9, 'Profesor Doktor'),
(10, 'Profesor Doktor');

-- --------------------------------------------------------

--
-- Table structure for table `rezultatet`
--

DROP TABLE IF EXISTS `rezultatet`;
CREATE TABLE IF NOT EXISTS `rezultatet` (
  `studenti` int(11) NOT NULL DEFAULT 0,
  `lenda` char(12) NOT NULL DEFAULT '',
  `profesori` int(11) NOT NULL DEFAULT 0,
  `semestri` int(11) NOT NULL DEFAULT 0,
  `departamenti` int(11) NOT NULL DEFAULT 0,
  `nota` varchar(20) DEFAULT NULL,
  `heraParaqitjes` int(11) DEFAULT NULL,
  `notuar` int(11) DEFAULT NULL,
  `paraqitur` int(11) DEFAULT NULL,
  `refuzuar` int(11) DEFAULT NULL,
  `pranuar` int(11) DEFAULT NULL,
  `grupet` int(11) DEFAULT NULL,
  PRIMARY KEY (`studenti`,`lenda`,`profesori`,`semestri`,`departamenti`),
  KEY `lenda` (`lenda`),
  KEY `profesori` (`profesori`),
  KEY `semestri` (`semestri`),
  KEY `departamenti` (`departamenti`),
  KEY `notat` (`studenti`,`lenda`,`notuar`),
  KEY `grupet` (`grupet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rezultatet`
--

INSERT INTO `rezultatet` (`studenti`, `lenda`, `profesori`, `semestri`, `departamenti`, `nota`, `heraParaqitjes`, `notuar`, `paraqitur`, `refuzuar`, `pranuar`, `grupet`) VALUES
(123456788, '123', 3, 1, 1, 'Ende pa notuar', 1, 0, 1, 0, 0, 2),
(123456788, '124', 2, 1, 1, '8', 1, 1, 1, 0, 0, 2),
(123456788, '125', 6, 1, 1, 'Ende pa notuar', 1, 0, 1, 0, 0, 2),
(123456788, '126', 4, 1, 1, 'Ende pa notuar', 1, 0, 1, 0, 0, 2),
(123456788, '127', 5, 1, 1, 'Ende pa notuar', 1, 0, 1, 0, 0, 2),
(123456789, '123', 3, 1, 1, '5', 1, 1, 1, 1, 0, 1),
(123456789, '124', 2, 1, 1, '10', 1, 1, 1, 0, 1, 1),
(123456789, '125', 6, 1, 1, '8', 2, 1, 1, 1, 1, 1),
(123456789, '126', 4, 1, 1, 'Ende pa notuar', 0, 0, 0, 0, 0, 1),
(123456789, '127', 5, 1, 1, '8', 1, 1, 1, 0, 1, 1),
(123456798, '128', 7, 2, 1, 'Ende pa notuar', 0, 0, 0, 0, 0, 2),
(123456798, '129', 6, 2, 1, '9', 1, 1, 1, 0, 1, 2),
(123456798, '130', 5, 2, 1, '10', 1, 1, 1, 0, 1, 2),
(123456798, '131', 8, 2, 1, '9', 1, 1, 1, 0, 1, 2),
(123456798, '132', 3, 2, 1, '9', 1, 1, 1, 0, 1, 2),
(123456879, '133', 9, 3, 1, '10', 2, 1, 1, 1, 1, NULL),
(123456879, '134', 7, 3, 1, '10', 2, 1, 1, 1, 1, NULL),
(123456879, '135', 7, 3, 1, '9', 1, 1, 1, 0, 1, NULL),
(123456879, '136', 10, 3, 1, '8', 2, 1, 1, 1, 1, NULL),
(123456879, '137', 3, 3, 1, '8', 1, 1, 1, 0, 1, NULL),
(123456987, '138', 7, 4, 1, '6', 2, 1, 1, 1, 1, NULL),
(123456987, '139', 7, 4, 1, '7', 2, 1, 1, 1, 1, NULL),
(123456987, '140', 2, 4, 1, '9', 1, 1, 1, 0, 1, NULL),
(123456987, '141', 8, 4, 1, '10', 2, 1, 1, 1, 1, NULL),
(123456987, '142', 3, 4, 1, '10', 1, 1, 1, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roli`
--

DROP TABLE IF EXISTS `roli`;
CREATE TABLE IF NOT EXISTS `roli` (
  `id` int(11) NOT NULL,
  `pershkrimi` char(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roli`
--

INSERT INTO `roli` (`id`, `pershkrimi`) VALUES
(1, 'Administrator'),
(2, 'Profesor'),
(3, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `semestri`
--

DROP TABLE IF EXISTS `semestri`;
CREATE TABLE IF NOT EXISTS `semestri` (
  `id` int(11) NOT NULL,
  `pershkrimi` char(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semestri`
--

INSERT INTO `semestri` (`id`, `pershkrimi`) VALUES
(1, 'Semestri i pare'),
(2, 'Semestri i dyte'),
(3, 'Semestri i trete'),
(4, 'Semestri i katert'),
(5, 'Semestri i peste'),
(6, 'Semestri i gjashte'),
(7, 'Semestri i shtate'),
(8, 'Semestri i tete');

-- --------------------------------------------------------

--
-- Table structure for table `studenti`
--

DROP TABLE IF EXISTS `studenti`;
CREATE TABLE IF NOT EXISTS `studenti` (
  `id` int(11) NOT NULL,
  `dataregjistrimit` date DEFAULT NULL,
  `departamenti` int(11) DEFAULT NULL,
  `semestri` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `departamenti` (`departamenti`),
  KEY `semestri` (`semestri`),
  KEY `tedhenat_per_studentin` (`id`,`departamenti`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studenti`
--

INSERT INTO `studenti` (`id`, `dataregjistrimit`, `departamenti`, `semestri`) VALUES
(123456666, '2020-08-29', 1, 1),
(123456777, '2020-08-29', 1, 1),
(123456778, '2020-05-21', 2, 1),
(123456788, '2020-05-20', 1, 1),
(123456789, '2020-03-31', 1, 1),
(123456798, '2020-03-31', 1, 2),
(123456879, '2020-03-31', 1, 3),
(123456987, '2020-04-01', 1, 4),
(123456999, '2020-08-29', 1, 1),
(123459876, '2020-04-01', 1, 1),
(123546789, '2020-04-01', 1, 1),
(132456789, '2020-03-31', 2, 1),
(143256798, '2020-03-31', 2, 2);

--
-- Triggers `studenti`
--
DROP TRIGGER IF EXISTS `shto_nr_studenteve`;
DELIMITER $$
CREATE TRIGGER `shto_nr_studenteve` AFTER INSERT ON `studenti` FOR EACH ROW BEGIN UPDATE departamenti
SET numriStudenteveRegjistruar = numriStudenteveRegjistruar + 1  
WHERE id = NEW.departamenti; 
END
$$
DELIMITER ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `departamenti`
--
ALTER TABLE `departamenti`
  ADD CONSTRAINT `departamenti_ibfk_1` FOREIGN KEY (`fakulteti`) REFERENCES `fakulteti` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lenda`
--
ALTER TABLE `lenda`
  ADD CONSTRAINT `lenda_ibfk_1` FOREIGN KEY (`id_prof`) REFERENCES `profesori` (`id`);

--
-- Constraints for table `orari`
--
ALTER TABLE `orari`
  ADD CONSTRAINT `orari_ibfk_1` FOREIGN KEY (`grupet`) REFERENCES `grupet` (`id`),
  ADD CONSTRAINT `orari_ibfk_2` FOREIGN KEY (`lenda`) REFERENCES `lenda` (`kodi`),
  ADD CONSTRAINT `orari_ibfk_3` FOREIGN KEY (`studenti`) REFERENCES `studenti` (`id`);

--
-- Constraints for table `perdoruesi`
--
ALTER TABLE `perdoruesi`
  ADD CONSTRAINT `perdoruesi_ibfk_1` FOREIGN KEY (`roli`) REFERENCES `roli` (`id`);

--
-- Constraints for table `rezultatet`
--
ALTER TABLE `rezultatet`
  ADD CONSTRAINT `rezultatet_ibfk_1` FOREIGN KEY (`grupet`) REFERENCES `grupet` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
