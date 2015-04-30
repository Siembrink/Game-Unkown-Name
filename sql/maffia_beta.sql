-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 30 apr 2015 om 14:10
-- Serverversie: 5.6.21
-- PHP-versie: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `maffia_beta`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `armor_shop`
--

CREATE TABLE IF NOT EXISTS `armor_shop` (
`id` int(11) NOT NULL,
  `armor_name` varchar(30) NOT NULL,
  `cost` int(11) NOT NULL,
  `armor` int(11) NOT NULL,
  `images` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `armor_shop`
--

INSERT INTO `armor_shop` (`id`, `armor_name`, `cost`, `armor`, `images`) VALUES
(1, 'Shield', 200, 50, 'images/armor/maffia_avatar.jpg'),
(2, 'It''s over 9000!', 99999, 50, 'images/armor/maffia_avatar.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `factory`
--

CREATE TABLE IF NOT EXISTS `factory` (
`id` int(11) NOT NULL,
  `bullets` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `sold` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `factory`
--

INSERT INTO `factory` (`id`, `bullets`, `price`, `sold`) VALUES
(1, 9976, 200, 12);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `message`
--

CREATE TABLE IF NOT EXISTS `message` (
`id` int(4) NOT NULL,
  `from` varchar(30) NOT NULL,
  `to` varchar(30) NOT NULL,
  `date` varchar(30) NOT NULL,
  `read` int(1) NOT NULL DEFAULT '0',
  `message` text NOT NULL,
  `subject` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `message`
--

INSERT INTO `message` (`id`, `from`, `to`, `date`, `read`, `message`, `subject`) VALUES
(1, 'admin', 'Simon', '30/04/2015 01:50', 1, 'hoih ', 'hoih'),
(2, 'Simon', 'admin', '30/04/2015 01:51', 1, 'hiohsdf ', 'hioh'),
(3, 'Simon', 'admin', '30/04/2015 01:51', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vulputate ex vitae cursus commodo. Fusce non augue sem. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce molestie varius diam, ut pellentesque nibh feugiat hendrerit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed maximus vestibulum turpis, et commodo purus fermentum vitae. Proin facilisis nunc et tortor mattis commodo. Aenean rutrum sollicitudin sodales. Fusce feugiat massa diam, eu tristique ipsum tristique eu. Duis vestibulum nibh elementum odio efficitur semper. In ultricies auctor mi, a eleifend purus scelerisque sed. Nulla rhoncus risus tortor, fermentum luctus tortor pretium sit amet.Aliquam tempor tincidunt rutrum. Proin dictum tempor odio eu lobortis. Etiam porta est eu pulvinar dictum. Cras fringilla molestie lorem, sit amet imperdiet tortor Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vulputate ex vitae cursus commodo. Fusce non augue sem. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce molestie varius diam, ut pellentesque nibh feugiat hendrerit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed maximus vestibulum turpis, et commodo purus fermentum vitae. Proin facilisis nunc et tortor mattis commodo. Aenean r', 'hiohddd');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `player`
--

CREATE TABLE IF NOT EXISTS `player` (
`id` int(11) NOT NULL,
  `player_name` varchar(30) NOT NULL,
  `rank` varchar(30) NOT NULL DEFAULT 'Rookie',
  `progress` int(2) NOT NULL DEFAULT '0',
  `family` varchar(30) NOT NULL DEFAULT 'None',
  `money` int(12) NOT NULL DEFAULT '10000',
  `banned` int(1) NOT NULL DEFAULT '0',
  `online` int(1) NOT NULL DEFAULT '0',
  `avatar` varchar(100) NOT NULL DEFAULT 'images/avatar/maffia_avatar.jpg',
  `profile_text` longtext NOT NULL,
  `crime1` varchar(30) NOT NULL,
  `crime2` varchar(30) NOT NULL,
  `crime3` varchar(30) NOT NULL,
  `crime4` varchar(30) NOT NULL,
  `weapon` varchar(30) NOT NULL,
  `armor` varchar(30) NOT NULL,
  `bullets` int(11) NOT NULL,
  `jail` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `player`
--

INSERT INTO `player` (`id`, `player_name`, `rank`, `progress`, `family`, `money`, `banned`, `online`, `avatar`, `profile_text`, `crime1`, `crime2`, `crime3`, `crime4`, `weapon`, `armor`, `bullets`, `jail`) VALUES
(5, 'admin', 'Rookie', 0, 'Staff', 25724, 0, 1, 'images/avatar/maffia_avatar.jpg', 'hoi HJOHDf dsdf dfasdfdfa', '2015-04-29 10:55:27', '0', '0', '0', 'MP-7', 'Shield', 0, '2015-04-28 15:25:46'),
(6, 'Simon', 'Rookie', 0, 'None', 25724, 0, 1, 'images/avatar/maffia_avatar.jpg', '', '0', '0', '0', '0', '', '', 0, '2015-03-12 14:55:40');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `weapon_shop`
--

CREATE TABLE IF NOT EXISTS `weapon_shop` (
`id` int(11) NOT NULL,
  `weap_name` varchar(30) NOT NULL,
  `cost` int(11) NOT NULL,
  `damage` int(11) NOT NULL,
  `images` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `weapon_shop`
--

INSERT INTO `weapon_shop` (`id`, `weap_name`, `cost`, `damage`, `images`) VALUES
(1, 'Knife', 300, 10, 'images/weapon/maffia_avatar.jpg'),
(2, 'AK-47', 500, 30, 'images/weapon/maffia_avatar.jpg'),
(3, 'MP-7', 500, 30, 'images/weapon/maffia_avatar.jpg'),
(4, 'Bazooka', 500, 30, 'images/weapon/maffia_avatar.jpg'),
(5, 'Shotgun', 500, 30, 'images/weapon/maffia_avatar.jpg'),
(6, 'AWP', 50000, 300, 'images/weapon/maffia_avatar.jpg');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `armor_shop`
--
ALTER TABLE `armor_shop`
 ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `factory`
--
ALTER TABLE `factory`
 ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `message`
--
ALTER TABLE `message`
 ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `player`
--
ALTER TABLE `player`
 ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `weapon_shop`
--
ALTER TABLE `weapon_shop`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `armor_shop`
--
ALTER TABLE `armor_shop`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `factory`
--
ALTER TABLE `factory`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `message`
--
ALTER TABLE `message`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT voor een tabel `player`
--
ALTER TABLE `player`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT voor een tabel `weapon_shop`
--
ALTER TABLE `weapon_shop`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
