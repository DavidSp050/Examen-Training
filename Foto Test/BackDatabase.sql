-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 10 jul 2020 om 10:33
-- Serverversie: 10.1.44-MariaDB-0ubuntu0.18.04.1
-- PHP-versie: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BackDatabase`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `back12_bands`
--

CREATE TABLE `back12_bands` (
  `ID_band` int(11) NOT NULL,
  `Naam` varchar(40) NOT NULL,
  `Land` varchar(30) NOT NULL,
  `AantalLeden` int(11) NOT NULL,
  `Muzieksoort` varchar(20) NOT NULL,
  `Info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `back12_bands`
--

INSERT INTO `back12_bands` (`ID_band`, `Naam`, `Land`, `AantalLeden`, `Muzieksoort`, `Info`) VALUES
(1, 'ACDC', 'America', 5, 'Rock', 'cool'),
(2, 'Jostiband', 'Nederland', 130, 'Klasiek', 'Hallo.'),
(3, 'Greenday', 'America', 7, 'Rock', 'WoW'),
(4, 'Imagine Dragons', 'America', 4, 'PopRock', 'Hallo.,.'),
(5, 'Big Time Rush', 'America', 4, 'Pop', 'AhAhAHAHAHHA');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `back12_users`
--

CREATE TABLE `back12_users` (
  `ID` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Gebruikersnaam` varchar(50) NOT NULL,
  `Wachtwoord` varchar(50) NOT NULL,
  `Level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `back12_users`
--

INSERT INTO `back12_users` (`ID`, `Email`, `Gebruikersnaam`, `Wachtwoord`, `Level`) VALUES
(1, 'hellothere@ict-lab.nl', 'kenobi', '0d47c01a35f4dfc7dfc6c31b6c19c385b6a86dcf', 1),
(14, 'Something@gmail.nl', 'Someguy', '9c4218e5d95c7b3dafe8d0053b0a4e8671eb9b62', 0),
(20, 'hallo@test.com', 'Hallo', 'ee029d858eaba0a9b544d09703689dca62bf2854', 0),
(43, 'TestUser@gmail.com', 'TestUser', '7288edd0fc3ffcbe93a0cf06e3568e28521687bc', 0),
(49, 'admin@glr.nl', 'Admin', '067acde581193ba318f9ea063b2604ae1bb5539a', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `back13_albums`
--

CREATE TABLE `back13_albums` (
  `ID_album` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Band` int(11) NOT NULL,
  `Jaar` year(4) NOT NULL,
  `Info` text NOT NULL,
  `Afbeelding` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `back13_albums`
--

INSERT INTO `back13_albums` (`ID_album`, `Title`, `Band`, `Jaar`, `Info`, `Afbeelding`) VALUES
(1, 'Big Time Rush', 5, 2010, 'BTR', 'BigTimeRush.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `back13_artiesten`
--

CREATE TABLE `back13_artiesten` (
  `ID_artiest` int(11) NOT NULL,
  `Naam` varchar(40) NOT NULL,
  `Instrument` varchar(40) NOT NULL,
  `Geboortedatum` date NOT NULL,
  `Geslacht` varchar(1) NOT NULL,
  `Info` text NOT NULL,
  `Band` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `back13_artiesten`
--

INSERT INTO `back13_artiesten` (`ID_artiest`, `Naam`, `Instrument`, `Geboortedatum`, `Geslacht`, `Info`, `Band`) VALUES
(3, 'Angus Young', 'Gitaar', '1955-03-31', 'M', 'Lengte: 1,57 m', 1),
(4, 'Bon Scott', 'Zang', '1946-07-09', 'M', 'Is dood', 1),
(5, 'Brian Johnson', 'Zang', '1947-10-05', 'M', 'Lengte: 1,65 m', 1),
(6, 'Dan Reynolds', 'Gitaar', '1987-07-14', 'M', 'Lengte: 1,93', 4),
(7, 'Ben Mckee', 'Basgitaar', '1985-04-07', 'M', 'Echte naam is Benjamin', 4),
(9, 'Wayne Sermon', 'Cello', '1984-06-15', 'M', 'Hij is de leadgitarist in de band', 4),
(10, 'Billie Joe Armstrong', 'Zang', '1972-02-17', 'M', 'Lengte: 1,7 m', 3),
(11, 'Kendall Schmidt', 'Zang', '1990-11-02', 'M', 'Lengte: 1,8 m', 5),
(12, 'Logan Henderson', 'Zang', '1989-09-14', 'M', 'Lengte: 1,75 m', 5),
(13, 'Tré Cool', 'Drumstel', '1972-12-09', 'M', 'Lengte: 1,68 m', 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `beroeps`
--

CREATE TABLE `beroeps` (
  `ID` int(100) NOT NULL,
  `Gebruiker` varchar(40) NOT NULL,
  `Bod` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `beroeps`
--

INSERT INTO `beroeps` (`ID`, `Gebruiker`, `Bod`) VALUES
(1, 'Ass', 512),
(3, 'Bob', 400),
(5, 'John', 632),
(7, 'Hallo', 5000),
(8, 'Bran', 2000),
(10, 'hahahaha', 41254),
(11, 'ETesty ', 10),
(12, 'Heyo', 14),
(13, 'Nummer', 57),
(14, 'Testy', 910),
(15, 'dfa', 142),
(16, 'Testing', 51),
(17, 'Freddy', 4),
(18, 'Bob', 6000),
(19, 'jasper', 400000);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `beroeps_gerechten`
--

CREATE TABLE `beroeps_gerechten` (
  `ID_gerecht` int(11) NOT NULL,
  `Naam` varchar(255) NOT NULL,
  `Info` text NOT NULL,
  `Afbeelding` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `beroeps_gerechten`
--

INSERT INTO `beroeps_gerechten` (`ID_gerecht`, `Naam`, `Info`, `Afbeelding`) VALUES
(1, '', 'Een heel erg mooi nieuw recept met extra lekkere nieuw', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `beroeps_griek`
--

CREATE TABLE `beroeps_griek` (
  `ID` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Gebruikersnaam` varchar(50) NOT NULL,
  `Wachtwoord` varchar(50) NOT NULL,
  `Level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `beroeps_griek`
--

INSERT INTO `beroeps_griek` (`ID`, `Email`, `Gebruikersnaam`, `Wachtwoord`, `Level`) VALUES
(1, 'test@gmail.com', 'TestUser', '7288edd0fc3ffcbe93a0cf06e3568e28521687bc', 0),
(2, 'admin@gmail.com', 'Admin', '067acde581193ba318f9ea063b2604ae1bb5539a', 2),
(3, 'bob@gmail.com', 'Bob', '0a42b6b9dcd569f990dcde40f4ff73c5a24eb904', 0),
(7, 'kaasman@gmail.com', 'DeKaasMan', 'd6a5200fc1b40deb31eba76219053f727779ba62', 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `back12_bands`
--
ALTER TABLE `back12_bands`
  ADD PRIMARY KEY (`ID_band`);

--
-- Indexen voor tabel `back12_users`
--
ALTER TABLE `back12_users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `back13_albums`
--
ALTER TABLE `back13_albums`
  ADD PRIMARY KEY (`ID_album`);

--
-- Indexen voor tabel `back13_artiesten`
--
ALTER TABLE `back13_artiesten`
  ADD PRIMARY KEY (`ID_artiest`);

--
-- Indexen voor tabel `beroeps`
--
ALTER TABLE `beroeps`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `beroeps_gerechten`
--
ALTER TABLE `beroeps_gerechten`
  ADD PRIMARY KEY (`ID_gerecht`);

--
-- Indexen voor tabel `beroeps_griek`
--
ALTER TABLE `beroeps_griek`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `back12_bands`
--
ALTER TABLE `back12_bands`
  MODIFY `ID_band` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT voor een tabel `back12_users`
--
ALTER TABLE `back12_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT voor een tabel `back13_albums`
--
ALTER TABLE `back13_albums`
  MODIFY `ID_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `back13_artiesten`
--
ALTER TABLE `back13_artiesten`
  MODIFY `ID_artiest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `beroeps`
--
ALTER TABLE `beroeps`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT voor een tabel `beroeps_gerechten`
--
ALTER TABLE `beroeps_gerechten`
  MODIFY `ID_gerecht` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `beroeps_griek`
--
ALTER TABLE `beroeps_griek`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
