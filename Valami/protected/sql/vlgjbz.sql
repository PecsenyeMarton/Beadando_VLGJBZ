-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1:3308
-- Létrehozás ideje: 2020. Ápr 29. 14:01
-- Kiszolgáló verziója: 8.0.18
-- PHP verzió: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `vlgjbz`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE IF NOT EXISTS `forum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(64) NOT NULL,
  `theme` varchar(64) NOT NULL,
  `comment` varchar(2500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `forum`
--

INSERT INTO `forum` (`id`, `nickname`, `theme`, `comment`) VALUES
(1, 'PecsiMarc', 'Miért ugrálnak az emberek?', ' Az űrbéli esemény jelentősségét az adja, hogy ha a Juno csak kicsit is eltért volna valami a manőver során, az egység menthetetlenül elszállt volna az óriásbolygó mellett, és nem tudta volna teljesíteni egymilliárd dolláros (284 milliárd forintos) misszióját, hogy felmérje a Jupiter mágneses mezejét. Éppen ezért örültek meg a fontos tudományos eseménynek a Google-nél, és egy animációra cserélték le a kereső főoldalán látható logót. aaa'),
(2, 'PecsiMarc', 'Why are you running?', 'Hasonló fordítások a(z) \"are you running\" szóra magyarul to be ige Hungarian van létezik.');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `permission` int(1) UNSIGNED NOT NULL DEFAULT '0',
  `nickname` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `permission`, `nickname`) VALUES
(1, 'Norbert', 'Szucs', 'mail.norbert.szucs@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 1, 'SzucsNorb'),
(4, 'Márton', 'Pecsenye', 'pecsenye.marci@gmail.com', '2891baceeef1652ee698294da0e71ba78a2a4064', 1, 'PecsiMarc'),
(5, 'Mozes', 'asd', 'noename@gmail.com', 'b2b7258d833cda1f75ff068edcbfa93faf899273', 0, 'mozesadd'),
(6, 'Szia', 'Mia', 'Sziamia@gmail.com', '2891baceeef1652ee698294da0e71ba78a2a4064', 0, 'Sziamia'),
(7, 'Sándor', 'Alma', 'csovike@sad.com', '2891baceeef1652ee698294da0e71ba78a2a4064', 0, 'Csovike'),
(8, 'Mária', 'Orosz', 'marie@orosz.com', '2891baceeef1652ee698294da0e71ba78a2a4064', 0, 'Marie');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `workers`
--

DROP TABLE IF EXISTS `workers`;
CREATE TABLE IF NOT EXISTS `workers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `email` varchar(250) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `tipus` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nationality` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `workers`
--

INSERT INTO `workers` (`id`, `first_name`, `last_name`, `email`, `gender`, `tipus`, `nationality`) VALUES
(1, 'Asd', 'asd', 'asd@asd.com', 2, 'Moderátor', 'Magyar'),
(3, 'Márton', 'Pecsenye', 'pecsenye.marci@gmail.com', 1, 'Tulajdonos/Főadminisztártor', 'Magyar'),
(4, 'Máté', 'asd', 'almamate@gmail.com', 1, 'Support', 'Magyar'),
(5, 'Szabó', 'Szabó', 'szabo@szabo.com', 1, 'Lomtáras', 'Magyar'),
(7, 'Noémi', 'ASD', 'asdnoemi@asd.com', 0, 'Almoderátor', 'Magyar'),
(8, 'Körte', 'Alam', 'kortealam@gmail.com', 2, 'Support(Újonc)', 'Magyar');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
