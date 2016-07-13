-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 13. Jul 2016 um 20:43
-- Server-Version: 10.1.9-MariaDB
-- PHP-Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `Kavalier`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(70) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(200) NOT NULL,
  `street_and_number` varchar(100) NOT NULL,
  `alt_street_and_number` varchar(100) NOT NULL,
  `zip` varchar(100) NOT NULL,
  `alt_zip` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `alt_location` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL,
  `alt_country` varchar(50) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `payment` varchar(50) NOT NULL,
  `passwordcode` varchar(255) DEFAULT NULL,
  `passwordcode_time` timestamp NULL DEFAULT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password_hash`, `street_and_number`, `alt_street_and_number`, `zip`, `alt_zip`, `location`, `alt_location`, `country`, `alt_country`, `is_admin`, `payment`, `passwordcode`, `passwordcode_time`, `age`) VALUES
(1, 'Michael Dorn', 'michael.dorn2@gmail.com', '$2a$06$QeyyEkO5SQAc9ma.lVCr4OLrXh2ATY88AQ6DjUK2e65TcLv8CPR4q', 'Embelgasse 3', 'Schulstraße 5a', '1050', '83454', 'Wien', 'Anger', 'Austria', 'Germany', 1, 'lastname', '256538798361c5006b3d942321c7bb1b', '2016-06-28 23:03:29', 0),
(2, 'Max Mustermann', 'max@mustermann.at', '$2a$06$2VJzRxjPR1orTLE8WRVSfuthkbeSfd.S5P8m8zFIOk5rkxX1fTIpy', 'Musterstraße 1', 'Musterstraße 2', '1050 Wien', '', '', '', 'Austria', '', 0, '', '4caefe28759424241615ff868bb9318d', '2016-06-28 17:55:46', 0);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
