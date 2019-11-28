-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Lis 2019, 23:32
-- Wersja serwera: 10.4.8-MariaDB
-- Wersja PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `gruszka`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `szczegolyzamowienia`
--

CREATE TABLE `szczegolyzamowienia` (
  `id` int(11) NOT NULL,
  `idZamowienia` int(11) NOT NULL,
  `idTowaru` int(11) NOT NULL,
  `Ilosc` int(11) NOT NULL,
  `Wartosc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `towary`
--

CREATE TABLE `towary` (
  `id` int(11) NOT NULL,
  `Nazwa` varchar(200) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Ilość` int(11) NOT NULL,
  `Wartość` int(11) NOT NULL,
  `Kategoria` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `użytkownicy`
--

CREATE TABLE `użytkownicy` (
  `id` int(11) NOT NULL,
  `mail` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf32 COLLATE utf32_polish_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `surname` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `city` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `street` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `postal` varchar(10) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `użytkownicy`
--

INSERT INTO `użytkownicy` (`id`, `mail`, `password`, `name`, `surname`, `phone`, `city`, `street`, `postal`) VALUES
(1, 'admin@gruszka.pl', 'admin', 'admin', 'admin', 123456789, 'Jelenia Góra', 'Wolności', '58-360');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `id` int(11) NOT NULL,
  `idKlienta` int(11) NOT NULL,
  `idSzczegolyZamowienia` int(11) NOT NULL,
  `DataZamowienia` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Miasto` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Ulica` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `KodPocztowy` int(7) NOT NULL,
  `Telefon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `szczegolyzamowienia`
--
ALTER TABLE `szczegolyzamowienia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTowaru` (`idTowaru`),
  ADD KEY `idZamowienia` (`idZamowienia`);

--
-- Indeksy dla tabeli `towary`
--
ALTER TABLE `towary`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `użytkownicy`
--
ALTER TABLE `użytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idKlienta` (`idKlienta`),
  ADD KEY `idSzczegolyZamowienia` (`idSzczegolyZamowienia`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `użytkownicy`
--
ALTER TABLE `użytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `szczegolyzamowienia`
--
ALTER TABLE `szczegolyzamowienia`
  ADD CONSTRAINT `szczegolyzamowienia_ibfk_1` FOREIGN KEY (`idTowaru`) REFERENCES `towary` (`id`),
  ADD CONSTRAINT `szczegolyzamowienia_ibfk_2` FOREIGN KEY (`idZamowienia`) REFERENCES `zamowienia` (`id`);

--
-- Ograniczenia dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD CONSTRAINT `zamowienia_ibfk_2` FOREIGN KEY (`idSzczegolyZamowienia`) REFERENCES `szczegolyzamowienia` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
