-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 28 Sty 2018, 20:39
-- Wersja serwera: 10.1.28-MariaDB
-- Wersja PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `nauka`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `usertb`
--

CREATE TABLE `usertb` (
  `idUser` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) CHARACTER SET utf16 COLLATE utf16_polish_ci NOT NULL,
  `userpass` varchar(255) CHARACTER SET utf16 COLLATE utf16_polish_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf16 COLLATE utf16_polish_ci NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf16 COLLATE utf16_polish_ci NOT NULL,
  `email` varchar(30) NOT NULL,
  `flaga` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `usertb`
--

INSERT INTO `usertb` (`idUser`, `username`, `userpass`, `name`, `lastname`, `email`, `flaga`, `created_at`, `updated_at`) VALUES
(1, 'olo', 'plo', 'Olek', 'Wojas', 'olekwojas@gmail.com', 1, '2017-12-14 18:02:13', '2018-01-27 15:48:56');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `usertb`
--
ALTER TABLE `usertb`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `usertb`
--
ALTER TABLE `usertb`
  MODIFY `idUser` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
