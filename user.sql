-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 03 Lis 2022, 18:19
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `bestbarber`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `ID` int(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`ID`, `login`, `password`, `email`) VALUES
(1, 'mateusz', '202cb962ac59075b964b07152d234b70', 'mateusz@email.com'),
(2, 'grzegorz', '202cb962ac59075b964b07152d234b70', 'grzegorz@email.com'),
(3, 'bartosz', '202cb962ac59075b964b07152d234b70', 'bartosz@email.com'),
(7, '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(8, '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(9, '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(10, '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(11, '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(12, '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(13, '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(14, '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(15, '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(16, '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(17, '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(18, '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(19, '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(20, '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(21, 'aaa', '47bce5c74f589f4867dbd57e9ca9f808', 'aaa@email.com'),
(22, 'a1', '8a8bb7cd343aa2ad99b7d762030857a2', 'a1@gmail.com');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
