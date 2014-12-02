-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 02 Gru 2014, 21:02
-- Wersja serwera: 5.6.20
-- Wersja PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `celadyn`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cars`
--

CREATE TABLE IF NOT EXISTS `cars` (
`PID` int(10) NOT NULL,
  `Brand` varchar(20) NOT NULL,
  `Model` varchar(20) NOT NULL,
  `Engine` varchar(15) NOT NULL,
  `Power` varchar(15) NOT NULL,
  `Equipment` varchar(40) NOT NULL,
  `Year` int(4) NOT NULL,
  `Plate` varchar(7) NOT NULL,
  `Body` varchar(15) NOT NULL,
  `Color` varchar(20) NOT NULL,
  `Price` int(10) NOT NULL,
  `rent` int(1) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Zrzut danych tabeli `cars`
--

INSERT INTO `cars` (`PID`, `Brand`, `Model`, `Engine`, `Power`, `Equipment`, `Year`, `Plate`, `Body`, `Color`, `Price`, `rent`) VALUES
(1, 'Opel', 'Astra', '', '0', 'brak', 2000, 'DW00000', 'sedan', 'czarny', 0, 1),
(2, 'VW', 'Golf', 'Diesel', '105KM 270Nm', 'Klimatyzacja; ABS; ESP; Nawigacja', 2008, 'DW001ME', 'Kombi', 'Srebrny', 150, 0),
(3, 'Toyota', 'Auris', 'Benzyna', '68', 'ESP, ABS, klimatronik', 2009, 'SKL14AH', 'hatchback', 'czerwony', 110, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rent`
--

CREATE TABLE IF NOT EXISTS `rent` (
`ID` int(100) NOT NULL,
  `Client` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `Car` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Start` varchar(12) NOT NULL,
  `End` varchar(12) NOT NULL,
  `Price` varchar(20) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Zrzut danych tabeli `rent`
--

INSERT INTO `rent` (`ID`, `Client`, `Car`, `Start`, `End`, `Price`, `Status`) VALUES
(5, 'KvBaX', 'DW00000', '2014-12-01', '2014-12-13', '123', 'CLOSE'),
(6, 'KvBaX', 'dw1234', '', '', '', 'CLOSE'),
(8, 'KvBaX', 'Wroclaw', '2014-12-01', '2014-12-30', '', 'CLOSE'),
(9, 'kubax7', 'WrocÅ‚aw', '2014-11-30', '2014-12-15', '1234', 'OPEN'),
(10, 'KvBaX7', 'Chelmsko Slaskie', '2014-12-01', '2014-12-02', '2', 'OPEN'),
(11, 'KvBaX', '', '2014-12-01', '2014-12-03', '222', 'CLOSE'),
(18, 'smol@wp.pl', 'SKL14AH', '2014-12-02', '2014-12-04', '220', ''),
(13, 'KvBaX', '5', '2014-12-03', '2014-12-12', '', 'OPEN'),
(16, 'nn', 'DW001ME', '2014-12-34', '2014-12-37', '', 'OPEN'),
(17, 'pa@pa.pl', 'DW001ME', '2014-12-34', '2014-12-37', '', 'CLOSE');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`ID` int(11) unsigned NOT NULL,
  `Name` varchar(20) NOT NULL,
  `LastName` varchar(60) NOT NULL,
  `EMail` varchar(150) NOT NULL,
  `City` varchar(80) CHARACTER SET utf8mb4 NOT NULL,
  `PostCode` varchar(6) NOT NULL,
  `Password` varchar(150) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `nick` varchar(50) NOT NULL,
  `ranga` int(11) NOT NULL,
  `Street` varchar(30) NOT NULL,
  `data` datetime NOT NULL,
  `DLN` varchar(15) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`ID`, `Name`, `LastName`, `EMail`, `City`, `PostCode`, `Password`, `Phone`, `nick`, `ranga`, `Street`, `data`, `DLN`) VALUES
(1, 'Jakub', 'Celadyn', '123', 'Chelmsko Slaskie', '58-407', 'f431c15dd3dfdde6a7e67f32e7a45aa2', '605245742', 'KvBaX', 2, 'n/a', '2014-11-29 11:58:30', ''),
(5, 'Paulin', 'Smolin', 'pa@pa.pl', 'WrocÅ‚aw', '53-109', '202cb962ac59075b964b07152d234b70', '666777888', '', 1, 'Slotna', '2014-12-01 22:16:39', '123456'),
(4, 'Wojtek', 'Wilk', 'nn@wp.pl', 'nn', 'nn', 'eab71244afb687f16d8c4f5ee9d6ef0e', 'nn', 'nn', 1, '', '2014-12-01 20:10:17', ''),
(9, 'Kasia', 'Jadzia', 'smol@wp.pl', 'Gdansk', 'Gdynsk', '$2y$10$XevZGaldig8PboqWdU3jvubM.8xy1hjG1cWIcvNNCs3OPfUJ3QVCu', '123098543', '', 0, '43233', '0000-00-00 00:00:00', '123097');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
 ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
 ADD PRIMARY KEY (`ID`), ADD KEY `Client` (`Client`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `cars`
--
ALTER TABLE `cars`
MODIFY `PID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT dla tabeli `rent`
--
ALTER TABLE `rent`
MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
MODIFY `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
