-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1:3308
-- Létrehozás ideje: 2020. Ápr 19. 13:45
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
-- Tábla szerkezet ehhez a táblához `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `link` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `menu`
--

INSERT INTO `menu` (`id`, `name`, `link`) VALUES
(1, 'GOOGLE', 'https://www.google.com/'),
(2, 'GoogleHU', 'http://google.hu');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `test_data`
--

DROP TABLE IF EXISTS `test_data`;
CREATE TABLE IF NOT EXISTS `test_data` (
  `data1` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `data2` varchar(250) NOT NULL,
  `data3` varchar(250) NOT NULL,
  PRIMARY KEY (`data1`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `permission`) VALUES
(1, 'Norbert', 'Szucs', 'mail.norbert.szucs@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 1),
(2, 'Elek', 'Teszt', 'Teszt@elek.com', '4b4b04529d87b5c318702bc1d7689f70b15ef4fc', 0),
(4, 'Márton', 'Pecsenye', 'pecsenye.marci@gmail.com', '2891baceeef1652ee698294da0e71ba78a2a4064', 1);

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
  `nationality` varchar(250) NOT NULL DEFAULT 'Undefined',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `workers`
--

INSERT INTO `workers` (`id`, `first_name`, `last_name`, `email`, `gender`, `nationality`) VALUES
(1, 'Asd', 'asd', 'asd@asd.com', 2, 'Magyar'),
(2, 'Sándor', 'Alma', 'almasandor@gmail.com', 1, 'Magyar'),
(3, 'Márton', 'Pecsenye', 'pecsenye.marci@gmail.com', 1, 'Magyar'),
(4, 'Máté', 'asd', 'almamate@gmail.com', 1, 'Magyar');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
