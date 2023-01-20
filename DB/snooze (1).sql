-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 19. Jan 2022 um 19:37
-- Server-Version: 10.4.22-MariaDB
-- PHP-Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `snooze`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `datum` date NOT NULL DEFAULT current_timestamp(),
  `inhalt` text NOT NULL,
  `bild` varchar(50) NOT NULL,
  `thumbnail` varchar(50) DEFAULT NULL,
  `benutzername` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `news`
--

INSERT INTO `news` (`id`, `datum`, `inhalt`, `bild`, `thumbnail`, `benutzername`) VALUES
(9, '2022-01-19', 'Guten Tag, Wilkommen auf unserer Hotelseite. Bei uns werden Sie sich mit den modernesten Räumen und den besten Service verwöhnt. Falls Sie fragen zu einem Angebot haben müssen Sie sich nur registrieren und können uns dann direkt kontaktieren. Nutzen Sie hierfür einfach das Kontaktformular', 'einzel.jpg', 'inBearbeitung', 'admin2'),
(10, '2022-01-18', 'Unsere Mitarbeiter betreuen SIe gerne rund um die Uhr. Die modernen, klimatisierten Zimmer verfügen über einen Flachbild-TV und ein eigenes Bad.\r\nPaare schätzen die Lage besonders – sie haben diese mit 9,8 für einen Aufenthalt zu zweit bewertet.\r\n\r\n', 'indoor.jpg', 'inBearbeitung', 'admin2'),
(11, '2022-01-19', 'Jede Wohneinheit verfügt über eine Veranda, eine komplett ausgestattete Küche mit einem Geschirrspüler, einen Kamin, einen Sitzbereich, einen Flachbild-TV, eine Waschmaschine sowie ein eigenes Bad mit einer Dusche und einem Haartrockner. Eine Mikrowelle, ein Kühlschrank, ein Backofen, ein Wasserkocher und eine Kaffeemaschine sind ebenfalls vorhanden.', 'doppel.jpg', 'inBearbeitung', 'admin2');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `datum` date NOT NULL DEFAULT current_timestamp(),
  `titel` varchar(50) NOT NULL,
  `inhalt` text NOT NULL,
  `benutzername_ersteller` varchar(15) NOT NULL,
  `bearbeitung` varchar(20) NOT NULL,
  `bild` varchar(50) NOT NULL,
  `antwort` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `tickets`
--

INSERT INTO `tickets` (`id`, `datum`, `titel`, `inhalt`, `benutzername_ersteller`, `bearbeitung`, `bild`, `antwort`) VALUES
(13, '2022-01-19', 'Bewertung', 'Alles war ganz wunderbar und unkompliziert.\r\n', 'maxi', 'offen', 'pexels-max-vakhtbovych-6782578.jpg', NULL),
(14, '2022-01-19', 'Anfrage', 'Ist das Rauchen auf dem Balkon gestattet ?', 'maxi', 'erfolgreich geschlos', 'pexels-max-vakhtbovych-6782578.jpg', 'Nein, gehen Sie hierfür bitte in den Raucherraum.'),
(15, '2022-01-19', 'Apartment', 'Wie groß ist das apartment?', 'nefise', 'offen', 'fragen.jpg', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `benutzername` varchar(15) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `anrede` varchar(7) NOT NULL,
  `vorname` varchar(30) NOT NULL,
  `nachname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `active` varchar(15) NOT NULL,
  `rolle` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`benutzername`, `pwd`, `anrede`, `vorname`, `nachname`, `email`, `active`, `rolle`) VALUES
('admin2', '$2y$10$lfI50CJOO3kOHjakF0tT.OLQS.LfyBw2F81yu6W.aZHvwnyUV6hoy', 'herr', 'adminzwei', 'adminzwei', 'admin2@snooze.com', 'active', 'admin'),
('maxi', '$2y$10$naWA6.KfvR1o1P1hrBRuxOy482kkVcJnsM3Lk0ZScZHtt08PQJ48i', 'herr', 'max', 'muster', 'maxi@gmail.com', 'active', 'guest'),
('nefise', '$2y$10$aAUBUGBaptzXo4VQ/wMuTOVyLV24YhECYSwnl98JZNFULe52sK/ua', 'frau', 'nefise', 'top', 'nefise@gmail.com', 'active', 'guest'),
('salma', '$2y$10$SAGiIWeFwFmMVpsTMZ29OOzkagsry05F99IIx5qgmWwaIzx4voN62', 'herr', 'salma', 'salma', 'salmarashwan70@gmail.com', 'active', 'guest'),
('techniker', '$2y$10$02Y/Nn23Tqu6NITpZ0qky.E1YgOMNlOabBdOemNFlqkOti.OQiO7S', 'herr', 'techniker', 'techniker', 'techniker@mail.com', 'active', 'techniker');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_foreign_key_benutzername` (`benutzername`);

--
-- Indizes für die Tabelle `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_foreign_key_benutzername_ersteller` (`benutzername_ersteller`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`benutzername`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT für Tabelle `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_foreign_key_benutzername` FOREIGN KEY (`benutzername`) REFERENCES `user` (`benutzername`);

--
-- Constraints der Tabelle `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `fk_foreign_key_benutzername_ersteller` FOREIGN KEY (`benutzername_ersteller`) REFERENCES `user` (`benutzername`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
