-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 29. Jun 2020 um 16:02
-- Server-Version: 10.4.11-MariaDB
-- PHP-Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `med`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `appoint`
--

CREATE TABLE `appoint` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `measure` varchar(30) NOT NULL,
  `notes` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `appoint`
--

INSERT INTO `appoint` (`id`, `uid`, `did`, `measure`, `notes`, `date`) VALUES
(1, 2, 3, 'Tooth repair', '-24 new tooths\r\nEverything else\r\n\r\nPatien didn\'t pay last time within 2 weeks!\r\n', '0000-00-00'),
(2, 2, 3, 'Tooth Cleaning', 'Test123', '0000-00-00'),
(3, 2, 3, 'Examination', 'Test 112323', '2020-07-02'),
(4, 2, 3, 'other', 'Test32423434', '2020-06-11');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `ip_addr` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `doctors`
--

INSERT INTO `doctors` (`id`, `first_name`, `last_name`, `user_name`, `password`, `ip_addr`, `email`) VALUES
(1, 'Peter', 'Fuchs', 'pfuchs', 'fdd39291e70a6782c53272bb3eb31692', '123.32.54.22', 'pfuchs@web.de'),
(3, 'Thomas', 'Schwaab', 'tschwaab', '1811d2606ceb8a3511844d2dd6fe045e', '192.168.123.1', 'thomas@schwaab.bayern'),
(4, 'Peter', 'Michael', 'mey', '1811d2606ceb8a3511844d2dd6fe045e', '::1', 'pmichal@rofl.de');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `fiscal_code` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `patients`
--

INSERT INTO `patients` (`id`, `first_name`, `last_name`, `fiscal_code`, `email`) VALUES
(2, 'Meier', 'Bach', '96969', ''),
(4, 'Karl', 'Blala', '22312323', 'wewewee'),
(5, 'Karl', 'Blala', '22312323', 'wewewee');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `appoint`
--
ALTER TABLE `appoint`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `appoint`
--
ALTER TABLE `appoint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
