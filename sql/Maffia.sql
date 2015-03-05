-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 05 mrt 2015 om 08:05
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
CREATE DATABASE IF NOT EXISTS `maffia_beta` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `maffia_beta`;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `message`
--

INSERT INTO `message` (`id`, `from`, `to`, `date`, `read`, `message`, `subject`) VALUES
(1, 'Simon', 'Admin', '12/6/15', 1, 'HEllO', ''),
(2, 'Simon', 'Admin', '12/6/15', 1, 'HEllO', ''),
(3, 'Simon', 'Admin', '12/6/15', 1, 'HEllO', ''),
(6, 'Simon', 'admin', '08/02/2015 10:44', 1, 'hoi ', 'Hoi');

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
  `crime1` int(11) NOT NULL,
  `crime2` int(11) NOT NULL,
  `crime3` int(11) NOT NULL,
  `crime4` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `player`
--

INSERT INTO `player` (`id`, `player_name`, `rank`, `progress`, `family`, `money`, `banned`, `online`, `avatar`, `profile_text`, `crime1`, `crime2`, `crime3`, `crime4`) VALUES
(5, 'admin', 'Rookie', 0, 'Staff', 10, 0, 1, 'images/avatar/maffia_avatar.jpg', 'hoi HJOHDf dsdf', 0, 0, 0, 0),
(6, 'Simon', 'Rookie', 0, 'None', 10000, 0, 0, 'images/avatar/maffia_avatar.jpg', '', 0, 0, 0, 0);

--
-- Indexen voor geëxporteerde tabellen
--

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
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `message`
--
ALTER TABLE `message`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT voor een tabel `player`
--
ALTER TABLE `player`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;--
-- Databank: `maffia_main`
--
CREATE DATABASE IF NOT EXISTS `maffia_main` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `maffia_main`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`id` int(11) NOT NULL,
  `title` varchar(15) NOT NULL,
  `message` varchar(254) NOT NULL,
  `creator` varchar(15) NOT NULL,
  `upload_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `news`
--

INSERT INTO `news` (`id`, `title`, `message`, `creator`, `upload_date`) VALUES
(1, 'First News!', 'Here ya go, your very own first news message', 'Admin', '0000-00-00 00:00:00'),
(2, 'Second message!', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci', 'Admin', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(4) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `webrank` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `webrank`) VALUES
(1, 'Simon', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
(2, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `world`
--

CREATE TABLE IF NOT EXISTS `world` (
`world_id` int(2) NOT NULL,
  `world_name` varchar(30) NOT NULL,
  `world_start` datetime NOT NULL,
  `world_end` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `world`
--

INSERT INTO `world` (`world_id`, `world_name`, `world_start`, `world_end`) VALUES
(1, 'Beta', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- Indexen voor tabel `world`
--
ALTER TABLE `world`
 ADD PRIMARY KEY (`world_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `news`
--
ALTER TABLE `news`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `world`
--
ALTER TABLE `world`
MODIFY `world_id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
