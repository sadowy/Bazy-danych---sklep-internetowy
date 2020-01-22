-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 22 Sty 2020, 17:11
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
-- Struktura tabeli dla tabeli `brands`
--

CREATE TABLE `brands` (
  `ID` int(100) NOT NULL,
  `Name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `brands`
--

INSERT INTO `brands` (`ID`, `Name`) VALUES
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
-- Struktura tabeli dla tabeli `cart`
--

CREATE TABLE `cart` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `cart`
--

INSERT INTO `cart` (`ID`, `UserID`) VALUES
(16, 15);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cartitem`
--

CREATE TABLE `cartitem` (
  `ID` int(11) NOT NULL,
  `CartID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `cartitem`
--

INSERT INTO `cartitem` (`ID`, `CartID`, `ProductID`, `Quantity`) VALUES
(41, 16, 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `ID` int(100) NOT NULL,
  `Name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`ID`, `Name`) VALUES
(1, 'Komputery'),
(2, 'Telewizory'),
(3, 'Smartfony'),
(4, 'Drukarki'),
(5, 'Akcesoria');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `order`
--

CREATE TABLE `order` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `TimeStamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `City` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Street` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Postal` int(7) NOT NULL,
  `Phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orderitem`
--

CREATE TABLE `orderitem` (
  `ID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `ID` int(100) NOT NULL,
  `CategoryID` int(100) NOT NULL,
  `BrandID` int(100) NOT NULL,
  `Title` varchar(255) COLLATE utf8mb4_polish_ci NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` int(100) NOT NULL,
  `Description` text COLLATE utf8mb4_polish_ci NOT NULL,
  `Photos` text COLLATE utf8mb4_polish_ci NOT NULL,
  `Tags` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `products`
--

INSERT INTO `products` (`ID`, `CategoryID`, `BrandID`, `Title`, `Quantity`, `Price`, `Description`, `Photos`, `Tags`) VALUES
(1, 1, 1, 'HP Pavilion 15 i5-8265U/16GB/256', 5, 2899, 'HP Pavilion 15 i5-8265U/16GB/256/Win10', 'HPPavilion15.jpg', 'HP Pavilion laptop'),
(2, 1, 3, 'Apple MacBook Air i5/8GB/128GB/HD 6000/Mac OS', 5, 3599, 'Apple MacBook Air i5/8GB/128GB/HD 6000/Mac OS', 'MacBookAirI5.jpg', 'Apple Macbook Laptop'),
(3, 1, 6, 'Lenovo Legion Y540-17 i7-9750H/8GB/256 GTX1660Ti', 5, 4499, 'Lenovo Legion Y540-17 i7-9750H/8GB/256 GTX1660Ti', 'LenovoY540.jpg', 'Lenovo Legion Laptop'),
(4, 3, 3, 'Apple iPhone Xr 64GB Black', 5, 2899, 'Apple iPhone Xr 64GB Black', 'IphoneXr64.jpg', 'Iphone Apple Smartfon Telefon'),
(5, 3, 2, 'Samsung Galaxy S10 G973F Prism Black', 5, 2999, 'Samsung Galaxy S10 G973F Prism Black', 'GalaxyS10.jpg', 'Samsung Galaxy Smartfon Telefon'),
(6, 3, 11, 'Xiaomi Mi 9 6/128GB Czarny', 5, 1699, 'Xiaomi Mi 9 6/128GB Czarny', 'XiaomiMi9.jpg', 'Xiaomi Mi Smartfon Telefon'),
(7, 3, 12, 'HUAWEI P30 Lite 4/128GB Niebieski', 5, 1369, 'HUAWEI P30 Lite 4/128GB Niebieski', 'P30Lite.jpg', 'Huawei P30 Smartfon Telefon'),
(8, 2, 2, 'Telewizor Samsung UE55MU6102', 5, 2249, 'Telewizor Samsung UE55MU6102', 'SamsungUE55MU6102.jpg', 'Telewizor Samsung'),
(9, 2, 4, 'Telewizor Sony KD-55XF8505', 5, 3579, 'Telewizor Sony KD-55XF8505', 'SonyBraviaKD-55XF8505.jpg', 'Telewizor Sony'),
(10, 4, 1, 'Drukarka HP LaserJet Pro M15w', 5, 279, 'Drukarka HP LaserJet Pro M15w', 'HPLaserJet ProM15w.jpg', 'Drukarka HP'),
(11, 1, 9, 'Dell XPS 13 7390 i5-10210U/8GB/256/Win10', 5, 6999, 'Dell XPS 13 7390 i5-10210U/8GB/256/Win10', 'DellXPS13.jpg', 'Laptop Dell XPS'),
(12, 1, 5, 'LG Gram 17Z990 i7-8565U/8GB/512/Win10', 5, 5199, 'LG Gram 17Z990 i7-8565U/8GB/512/Win10', 'LGGram.jpg', 'Laptop LG Gram'),
(13, 5, 10, 'Razer BlackWidow Chroma V2 Orange Switch', 5, 449, 'Razer BlackWidow Chroma V2 Orange Switch', 'RazerBlackwidowV2.jpg', 'Klawiatura Razer BlackWidow'),
(14, 5, 7, 'MSI GeForce RTX 2080 GAMING X TRIO 8GB GDDR', 5, 3299, 'MSI GeForce RTX 2080 GAMING X TRIO 8GB GDDR', 'RTX2080MSI.jpg', 'Karta Graficzna MSI GeForce RTX'),
(15, 5, 8, 'Palit GeForce RTX 2070 SUPER JetStream 8GB GDDR6', 5, 2399, 'Palit GeForce RTX 2070 SUPER JetStream 8GB GDDR6', 'RTX2070PalitSuper.jpg', 'Karta Graficzna Geforce Palit RTX'),
(16, 3, 3, 'Apple iPhone 11 64GB White', 5, 3599, 'Apple iPhone 11 64GB White', 'Iphone11White.jpg', 'Apple Iphone Smartfon Telefon');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `reviews`
--

CREATE TABLE `reviews` (
  `ID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `Content` text COLLATE utf8mb4_polish_ci NOT NULL,
  `TimeStamp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `reviews`
--

INSERT INTO `reviews` (`ID`, `ProductID`, `CustomerID`, `Content`, `TimeStamp`) VALUES
(1, 16, 5, 'Telefon to rakieta, serdecznie polecam.', '2019-12-17'),
(2, 12, 5, 'Komputer świetnie się sprawuje.', '2019-12-18'),
(3, 12, 5, 'Komputer niestety uległ awarii, będę musiał zareklamować.', '2019-12-19'),
(4, 11, 5, 'No, wkońcu porządny laptop od Della. Nie polecam.', '2019-12-18'),
(12, 4, 5, 'Daję radę.', '2019-12-18'),
(13, 1, 5, 'rfs', '2019-12-18'),
(14, 2, 5, 'test1234', '2020-01-17'),
(15, 1, 5, 'gówno', '2020-01-19'),
(16, 1, 5, 'a', '2020-01-19');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Mail` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Password` varchar(100) CHARACTER SET utf32 COLLATE utf32_polish_ci NOT NULL,
  `Name` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Surname` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Phone` int(11) NOT NULL,
  `City` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Street` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Postal` varchar(10) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`ID`, `Mail`, `Password`, `Name`, `Surname`, `Phone`, `City`, `Street`, `Postal`) VALUES
(1, 'admin@gruszka.net', 'admin', 'admin', 'admin', 123456789, 'Jelenia Góra', 'Wolności', '58-360'),
(5, 'janusz@wp.pl', '123', 'Janusz', 'Nowak', 111222333, 'Jelenia Góra', 'Wolności 245', '58-360'),
(15, 'wojtek@wp.pl', '1234', 'Wojtek', 'Pisklewicz', 111222333, 'Wałbrzych', 'Wolności', '58-350'),
(16, 'adam@wp.pl', '1234', 'Adam', 'Wojtyła', 123456789, 'Jelenia Góra', 'Wolności 245', '58-360');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ClientID` (`UserID`);

--
-- Indeksy dla tabeli `cartitem`
--
ALTER TABLE `cartitem`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `CartID` (`CartID`);

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `orderitem`
--
ALTER TABLE `orderitem`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `idTowaru` (`ProductID`),
  ADD KEY `idZamowienia` (`OrderID`);

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `reviews_ibfk_2` (`ProductID`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `brands`
--
ALTER TABLE `brands`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT dla tabeli `cartitem`
--
ALTER TABLE `cartitem`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `orderitem`
--
ALTER TABLE `orderitem`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT dla tabeli `reviews`
--
ALTER TABLE `reviews`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`);

--
-- Ograniczenia dla tabeli `cartitem`
--
ALTER TABLE `cartitem`
  ADD CONSTRAINT `cartitem_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ID`),
  ADD CONSTRAINT `cartitem_ibfk_3` FOREIGN KEY (`CartID`) REFERENCES `cart` (`ID`);

--
-- Ograniczenia dla tabeli `orderitem`
--
ALTER TABLE `orderitem`
  ADD CONSTRAINT `orderitem_ibfk_2` FOREIGN KEY (`OrderID`) REFERENCES `order` (`ID`);

--
-- Ograniczenia dla tabeli `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
