-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 10 Lis 2022, 00:43
-- Wersja serwera: 10.4.25-MariaDB
-- Wersja PHP: 8.1.10

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
-- Struktura tabeli dla tabeli `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) NOT NULL,
  `date` text NOT NULL,
  `hour` text NOT NULL,
  `service` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `bookings`
--

INSERT INTO `bookings` (`id`, `date`, `hour`, `service`) VALUES
(29, '2022-11-09', '13:00', 'Strzyżenie włosów + golenie karku brzytwą'),
(30, '2022-11-24', '10:00', 'Strzyżenie włosów + golenie karku brzytwą'),
(32, '2022-11-24', '18:00', 'Strzyżenie włosów + golenie karku brzytwą'),
(33, '2022-11-24', '13:00', 'Strzyżenie włosów + golenie karku brzytwą'),
(38, '2022-11-26', '11:00', 'Golenie pełne głowy brzytwą');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
