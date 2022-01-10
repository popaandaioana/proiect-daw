-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: localhost
-- Timp de generare: ian. 02, 2022 la 06:20 PM
-- Versiune server: 8.0.27
-- Versiune PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `epiz_30308701_librarie`
--
CREATE DATABASE IF NOT EXISTS `epiz_30308701_librarie` DEFAULT CHARACTER SET utf8mb4;
USE `epiz_30308701_librarie`;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `admini`
--

CREATE TABLE IF NOT EXISTS `admini` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `nume_admin` varchar(50) NOT NULL,
  `prenume_admin` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `admini`
--

INSERT INTO `admini` (`id_admin`, `nume_admin`, `prenume_admin`, `username`, `password`, `email`) VALUES
(1, 'Popa', 'Anda', 'andaadmin', 'tema2admin', 'mail2021php@gmail.com');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `autori`
--

CREATE TABLE IF NOT EXISTS `autori` (
  `id_autor` int NOT NULL AUTO_INCREMENT,
  `nume_autor` varchar(50) NOT NULL,
  PRIMARY KEY (`id_autor`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `autori`
--

INSERT INTO `autori` (`id_autor`, `nume_autor`) VALUES
(1, 'Lucia Ovezea'),
(2, 'Victor Papilian'),
(3, 'Rachel Cusk'),
(4, 'Kate Quinn'),
(5, 'Francisc Grigorescu Sido'),
(6, 'Mariana Mihai'),
(7, 'Nela-Zenovia Olaru'),
(8, 'Violeta Claudia Bojinca'),
(9, 'Constantin Necula'),
(10, 'Mihai Morar'),
(11, 'Gheorghe Onisoru'),
(12, 'Mihai Eminescu'),
(15, 'Liviu Rebreanu');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `carti`
--

CREATE TABLE IF NOT EXISTS `carti` (
  `id_carte` int NOT NULL AUTO_INCREMENT,
  `titlu_carte` varchar(50) NOT NULL,
  `descriere` text CHARACTER SET utf8mb4 NOT NULL,
  `pret` float UNSIGNED NOT NULL,
  `nr_buc` int UNSIGNED NOT NULL,
  `data_aparitie_lib` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `promotie` int NOT NULL,
  `id_editura` int NOT NULL,
  `id_domeniu` int NOT NULL,
  PRIMARY KEY (`id_carte`),
  KEY `id_domeniu` (`id_domeniu`),
  KEY `id_editura` (`id_editura`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `carti`
--

INSERT INTO `carti` (`id_carte`, `titlu_carte`, `descriere`, `pret`, `nr_buc`, `data_aparitie_lib`, `promotie`, `id_editura`, `id_domeniu`) VALUES
(1, 'Pachet Anatomia Omului, Vol. 1+2', 'Familiaritatea cu care studenţii vorbesc despre această carte - pe care o numesc simplu „Papilian” - se datorează explicaţiilor simple şi clare, precum şi bogatei iconografii ce însoţeşte textul.', 155, 5, '2019-11-07 22:00:00', 2, 2, 2),
(2, 'Osteoporoza din perspectiva multidisciplinara', 'Implicatii in patogenia osteoporozei. Osteoporoza in bolile inflamatorii reumatologice sistemice. Osteoporoza in bolile gastrointestinale', 55.3, 21, '2018-07-23 21:00:00', 0, 1, 2),
(3, 'Despre sensul vietii', 'Un dialog sincer și necesar despre puterea cuvintelor.', 44, 9, '2020-12-15 22:00:00', 7, 4, 1),
(4, 'Stalin si poporul rus', 'După încheierea celui de-al Doilea Război Mondial, au urmat doi ani și jumătate de frământări politice, în care partide vechi și noi concurau pentru a intra în grațiile populației, pronunțându-se pentru reforme îndrăznețe.', 70, 2, '2015-09-21 21:00:00', 15, 3, 3),
(12, 'Performanta in sport', 'Super!', 30, 0, '2022-01-02 11:10:07', 5, 1, 9);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `comenzi`
--

CREATE TABLE IF NOT EXISTS `comenzi` (
  `id_comanda` int NOT NULL AUTO_INCREMENT,
  `data_comanda` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int DEFAULT NULL,
  `id_guest` int DEFAULT NULL,
  `comanda_onorata` tinyint UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_comanda`),
  KEY `id_user` (`id_user`),
  KEY `id_guest` (`id_guest`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `comenzi`
--

INSERT INTO `comenzi` (`id_comanda`, `data_comanda`, `id_user`, `id_guest`, `comanda_onorata`) VALUES
(15, '2021-12-23 23:13:34', NULL, 23, 1),
(16, '2021-12-31 00:07:28', NULL, 24, 1),
(32, '2021-12-31 15:46:17', NULL, 33, 1),
(35, '2021-12-31 16:29:39', 2, NULL, 1),
(42, '2022-01-02 11:58:14', 1, NULL, 0),
(43, '2022-01-02 12:00:10', NULL, 38, 0);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `comenzi_carti`
--

CREATE TABLE IF NOT EXISTS `comenzi_carti` (
  `id_comanda` int NOT NULL,
  `id_carte` int NOT NULL,
  `nr_buc` int NOT NULL,
  PRIMARY KEY (`id_comanda`,`id_carte`),
  KEY `id_carte` (`id_carte`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `comenzi_carti`
--

INSERT INTO `comenzi_carti` (`id_comanda`, `id_carte`, `nr_buc`) VALUES
(15, 3, 5),
(15, 4, 1),
(16, 1, 1),
(16, 2, 1),
(16, 4, 1),
(32, 1, 1),
(35, 1, 1),
(42, 3, 1),
(43, 1, 2);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `domenii`
--

CREATE TABLE IF NOT EXISTS `domenii` (
  `id_domeniu` int NOT NULL AUTO_INCREMENT,
  `nume_domeniu` varchar(50) NOT NULL,
  PRIMARY KEY (`id_domeniu`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `domenii`
--

INSERT INTO `domenii` (`id_domeniu`, `nume_domeniu`) VALUES
(1, 'Beletristica'),
(2, 'Medicina'),
(3, 'Istorie'),
(4, 'Psihologie'),
(9, 'Sport');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `edituri`
--

CREATE TABLE IF NOT EXISTS `edituri` (
  `id_editura` int NOT NULL AUTO_INCREMENT,
  `nume_editura` varchar(50) NOT NULL,
  `adresa` text NOT NULL,
  PRIMARY KEY (`id_editura`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `edituri`
--

INSERT INTO `edituri` (`id_editura`, `nume_editura`, `adresa`) VALUES
(1, 'Alcris', 'Str. Panait Istrati, nr.62, sector 1, Bucuresti'),
(2, 'All', 'București, sector 6, Bd. Constructorilor 20A'),
(3, 'Corint', 'Str. Calea Plevnei nr. 145, sector 6\r\nBucurești, România'),
(4, 'Minerva', 'București, sector 4, B-dul Metalurgiei nr. 32-44'),
(5, 'Paralela 45', 'Pitești, Bulevardul Republicii nr. 148, clădirea C1, etaj 4'),
(6, 'Nemira', 'Craiova');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `guest`
--

CREATE TABLE IF NOT EXISTS `guest` (
  `id_guest` int NOT NULL AUTO_INCREMENT,
  `nume_guest` varchar(50) NOT NULL,
  `prenume_guest` varchar(50) NOT NULL,
  `email_guest` varchar(50) NOT NULL,
  `adresa_guest` text NOT NULL,
  PRIMARY KEY (`id_guest`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `guest`
--

INSERT INTO `guest` (`id_guest`, `nume_guest`, `prenume_guest`, `email_guest`, `adresa_guest`) VALUES
(23, 'Popescu', 'Ion', 'blihloih@yahoo.com', 'Craiova'),
(24, 'Ionescu', 'Alina', 'foresthit0101@yahoo.com', 'Bucuresti'),
(25, 'Ionescu', 'Maria', 'im@yahoo.com', 'Timisoara'),
(26, 'Florescu', 'Adina', 'fa@yahoo.com', 'Cluj'),
(27, 'Nicolae', 'Gabriel', 'ng@yahoo.com', 'Iasi'),
(28, 'Stanescu', 'Ana', 'sa@yahoo.com', 'Iasi'),
(29, 'Popa', 'Ioana', 'pi@yahoo.com', 'Craiova'),
(30, 'x', 'y', 'xy@yahoo.com', 'Craiova'),
(31, 'Popescu', 'Vasile', 'pv@yahoo.com', 'Craiova'),
(32, 'Popescu', 'Ion', 'foresthit0101@yahoo.com', 'Craiova'),
(33, 'Popescu', 'ef', 'blihloih@yahoo.com', 'Craiova'),
(34, 'Popescu', 'ef', 'blihloih@yahoo.com', 'Craiova'),
(35, 'Popescu', 'cfae', 'blihloih@yahoo.com', 'Craiova'),
(36, 'Popescu', 'ef', 'blihloih@yahoo.com', 'Iasi'),
(37, 'Popescu', 'cfae', 'foresthit0101@yahoo.com', 'Craiova'),
(38, 'Popa', 'Ana', 'pa@yahoo.com', 'Craiova');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `recenzii`
--

CREATE TABLE IF NOT EXISTS `recenzii` (
  `id_recenzie` int NOT NULL AUTO_INCREMENT,
  `id_carte` int NOT NULL,
  `id_user` int NOT NULL,
  `recenzie` text NOT NULL,
  PRIMARY KEY (`id_recenzie`),
  KEY `id_carte` (`id_carte`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `recenzii`
--

INSERT INTO `recenzii` (`id_recenzie`, `id_carte`, `id_user`, `recenzie`) VALUES
(2, 1, 1, 'O carte foarte buna!'),
(3, 2, 1, 'Superb!');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `sunt_scrise`
--

CREATE TABLE IF NOT EXISTS `sunt_scrise` (
  `id_autor` int NOT NULL,
  `id_carte` int NOT NULL,
  PRIMARY KEY (`id_autor`,`id_carte`),
  KEY `id_carte` (`id_carte`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `sunt_scrise`
--

INSERT INTO `sunt_scrise` (`id_autor`, `id_carte`) VALUES
(1, 1),
(1, 2),
(7, 2),
(9, 2),
(1, 3),
(11, 4),
(9, 12);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `useri`
--

CREATE TABLE IF NOT EXISTS `useri` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nume_user` varchar(50) NOT NULL,
  `prenume_user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `adresa` text NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `useri`
--

INSERT INTO `useri` (`id_user`, `nume_user`, `prenume_user`, `username`, `password`, `email`, `adresa`) VALUES
(1, 'Popa', 'Anda', 'anda', 'tema2', 'mail2021php@gmail.com', 'Craiova, Romania'),
(2, 'Popa', 'Gabriela', 'gabi', 'tema2', 'mail2022php@gmail.com', 'Craiova'),
(3, 'Popescu', 'Ion', 'ion', 'tema2', 'blihloih@yahoo.com', 'Craiova');

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `carti`
--
ALTER TABLE `carti`
  ADD CONSTRAINT `carti_ibfk_1` FOREIGN KEY (`id_domeniu`) REFERENCES `domenii` (`id_domeniu`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `carti_ibfk_2` FOREIGN KEY (`id_editura`) REFERENCES `edituri` (`id_editura`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constrângeri pentru tabele `comenzi`
--
ALTER TABLE `comenzi`
  ADD CONSTRAINT `comenzi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `useri` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `comenzi_ibfk_2` FOREIGN KEY (`id_guest`) REFERENCES `guest` (`id_guest`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constrângeri pentru tabele `comenzi_carti`
--
ALTER TABLE `comenzi_carti`
  ADD CONSTRAINT `comenzi_carti_ibfk_2` FOREIGN KEY (`id_carte`) REFERENCES `carti` (`id_carte`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `comenzi_carti_ibfk_3` FOREIGN KEY (`id_comanda`) REFERENCES `comenzi` (`id_comanda`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constrângeri pentru tabele `recenzii`
--
ALTER TABLE `recenzii`
  ADD CONSTRAINT `recenzii_ibfk_1` FOREIGN KEY (`id_carte`) REFERENCES `carti` (`id_carte`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `recenzii_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `useri` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constrângeri pentru tabele `sunt_scrise`
--
ALTER TABLE `sunt_scrise`
  ADD CONSTRAINT `sunt_scrise_ibfk_1` FOREIGN KEY (`id_autor`) REFERENCES `autori` (`id_autor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sunt_scrise_ibfk_2` FOREIGN KEY (`id_carte`) REFERENCES `carti` (`id_carte`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
