-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 05 mrt 2018 om 23:52
-- Serverversie: 10.1.30-MariaDB
-- PHP-versie: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentacar`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `auto`
--

CREATE TABLE `auto` (
  `kenteken` varchar(8) NOT NULL,
  `merk` varchar(25) NOT NULL,
  `type` varchar(25) NOT NULL,
  `dagprijs` decimal(3,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestelling`
--

CREATE TABLE `bestelling` (
  `factuurnummer` int(5) NOT NULL,
  `factuurdatum` date NOT NULL,
  `klantcode` int(5) NOT NULL,
  `medewerkerscode` int(5) NOT NULL,
  `kenteken` varchar(8) NOT NULL,
  `begindatum` date NOT NULL,
  `einddatum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruiker`
--

CREATE TABLE `gebruiker` (
  `id` int(5) NOT NULL,
  `voornaam` varchar(25) NOT NULL,
  `tussenvoegsel` varchar(10) NOT NULL,
  `achternaam` varchar(25) NOT NULL,
  `adres` varchar(50) NOT NULL,
  `postcode` varchar(6) NOT NULL,
  `woonplaats` varchar(25) NOT NULL,
  `gebruikersnaam` varchar(25) NOT NULL,
  `wachtwoord` varchar(300) NOT NULL,
  `medewerker` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gebruiker`
--

INSERT INTO `gebruiker` (`id`, `voornaam`, `tussenvoegsel`, `achternaam`, `adres`, `postcode`, `woonplaats`, `gebruikersnaam`, `wachtwoord`, `medewerker`) VALUES
(1, 'Jeffrey', 'van', 'Leeuwen', 'Dorpsstraat 1', '3205AA', 'Spijkenisse', 'Jeffrey', 'Jeffrey1', 1),
(2, 'Darrell', 'van den', 'Bos', 'Dorpsstraat 2', '3205AA', 'Spijkenisse', 'Darrell', 'Darrell1', 0),
(3, 'Dino', '', 'Cosic', 'Abadanstraat 9', '2020AB', 'Hoogvliet', 'Dino', 'Dino1', 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bestelling`
--
ALTER TABLE `bestelling`
  ADD PRIMARY KEY (`factuurnummer`);

--
-- Indexen voor tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bestelling`
--
ALTER TABLE `bestelling`
  MODIFY `factuurnummer` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
