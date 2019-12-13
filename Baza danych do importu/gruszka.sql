-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 13 Gru 2019, 14:48
-- Wersja serwera: 10.4.8-MariaDB
-- Wersja PHP: 7.3.11

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
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `id_kategorii` int(100) NOT NULL,
  `nazwa_kategorii` text CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`id_kategorii`, `nazwa_kategorii`) VALUES
(1, 'Komputery'),
(2, 'Telewizory'),
(3, 'Smartfony'),
(4, 'Drukarki'),
(5, 'Akcesoria');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `marki`
--

CREATE TABLE `marki` (
  `Id_marki` int(100) NOT NULL,
  `nazwa_marki` text CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `marki`
--

INSERT INTO `marki` (`Id_marki`, `nazwa_marki`) VALUES
(1, 'HP'),
(2, 'Samsung'),
(3, 'Apple'),
(4, 'Sony'),
(5, 'LG'),
(6, 'Lenovo'),
(7, 'MSI'),
(8, 'Palit'),
(9, 'Dell'),
(10, 'Razer'),
(11, 'Xiaomi'),
(12, 'Huawei'),
(13, 'Nokia'),
(14, 'Sony');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id_produktu` int(100) NOT NULL,
  `kategoria_produktu` int(100) NOT NULL,
  `marka_produktu` int(100) NOT NULL,
  `tytuł produktu` varchar(255) COLLATE utf8mb4_polish_ci NOT NULL,
  `cena_produktu` int(100) NOT NULL,
  `opis_produktu` text COLLATE utf8mb4_polish_ci NOT NULL,
  `zdjęcie_produktu` text COLLATE utf8mb4_polish_ci NOT NULL,
  `słowo_kluczowe` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`id_produktu`, `kategoria_produktu`, `marka_produktu`, `tytuł produktu`, `cena_produktu`, `opis_produktu`, `zdjęcie_produktu`, `słowo_kluczowe`) VALUES
(1, 1, 1, 'HP Pavilion 15 i5-8265U/16GB/256', 2899, 'HP Pavilion 15 i5-8265U/16GB/256/Win10', '', 'HP Pavilion laptop'),
(2, 1, 3, 'Apple MacBook Air i5/8GB/128GB/HD 6000/Mac OS', 3599, 'Apple MacBook Air i5/8GB/128GB/HD 6000/Mac OS', '', 'Apple Macbook Laptop'),
(3, 1, 6, 'Lenovo Legion Y540-17 i7-9750H/8GB/256 GTX1660Ti', 4499, 'Lenovo Legion Y540-17 i7-9750H/8GB/256 GTX1660Ti', '', 'Lenovo Legion Laptop'),
(4, 3, 3, 'Apple iPhone Xr 64GB Black', 2899, 'Apple iPhone Xr 64GB Black', '', 'Iphone Apple Smartfon Telefon'),
(5, 3, 2, 'Samsung Galaxy S10 G973F Prism Black', 2999, 'Samsung Galaxy S10 G973F Prism Black', '', 'Samsung Galaxy Smartfon Telefon'),
(6, 3, 11, 'Xiaomi Mi 9 6/128GB Czarny', 1699, 'Xiaomi Mi 9 6/128GB Czarny', '', 'Xiaomi Mi Smartfon Telefon'),
(7, 3, 12, 'HUAWEI P30 Lite 4/128GB Niebieski', 1369, 'HUAWEI P30 Lite 4/128GB Niebieski', '', 'Huawei P30 Smartfon Telefon'),
(8, 2, 2, 'Telewizor Samsung UE55MU6102', 2249, 'Telewizor Samsung UE55MU6102', '', 'Telewizor Samsung'),
(9, 2, 4, 'Telewizor Sony KD-55XF8505', 3579, 'Telewizor Sony KD-55XF8505', '', 'Telewizor Sony'),
(10, 4, 1, 'Drukarka HP LaserJet Pro M15w', 279, 'Drukarka HP LaserJet Pro M15w', '', 'Drukarka HP'),
(11, 1, 9, 'Dell XPS 13 7390 i5-10210U/8GB/256/Win10', 6999, 'Dell XPS 13 7390 i5-10210U/8GB/256/Win10', '', 'Laptop Dell XPS'),
(12, 1, 5, 'LG Gram 17Z990 i7-8565U/8GB/512/Win10', 5199, 'LG Gram 17Z990 i7-8565U/8GB/512/Win10', '', 'Laptop LG Gram'),
(13, 5, 10, 'Razer BlackWidow Chroma V2 Orange Switch', 449, 'Razer BlackWidow Chroma V2 Orange Switch', '', 'Klawiatura Razer BlackWidow'),
(14, 5, 7, 'MSI GeForce RTX 2080 GAMING X TRIO 8GB GDDR', 3299, 'MSI GeForce RTX 2080 GAMING X TRIO 8GB GDDR', '', 'Karta Graficzna MSI GeForce RTX'),
(15, 5, 8, 'Palit GeForce RTX 2070 SUPER JetStream 8GB GDDR6', 2399, 'Palit GeForce RTX 2070 SUPER JetStream 8GB GDDR6', '', 'Karta Graficzna Geforce Palit RTX'),
(16, 3, 3, 'Apple iPhone 11 64GB White', 3599, 'Apple iPhone 11 64GB White', '', 'Apple Iphone Smartfon Telefon');

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
(1, 'admin@gruszka.net', 'admin', 'admin', 'admin', 123456789, 'Jelenia Góra', 'Wolności', '58-360');

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
-- Indeksy dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id_kategorii`);

--
-- Indeksy dla tabeli `marki`
--
ALTER TABLE `marki`
  ADD PRIMARY KEY (`Id_marki`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id_produktu`);

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
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id_kategorii` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `marki`
--
ALTER TABLE `marki`
  MODIFY `Id_marki` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id_produktu` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

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
