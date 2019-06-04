-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 04 Cze 2019, 20:10
-- Wersja serwera: 10.1.36-MariaDB
-- Wersja PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `bookshop`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `id_klienta` int(11) NOT NULL,
  `login` varchar(12) COLLATE utf8_polish_ci NOT NULL,
  `Imie` text COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `Adres` text COLLATE utf8_polish_ci NOT NULL,
  `Telefon` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `password` text COLLATE utf8_polish_ci NOT NULL,
  `typ_konta` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `klienci`
--

INSERT INTO `klienci` (`id_klienta`, `login`, `Imie`, `Nazwisko`, `Adres`, `Telefon`, `email`, `password`, `typ_konta`) VALUES
(1, 'kkaarrol', 'Adaś', 'Koniuszko', 'Cicha 2/601', '0700800321', 'asdf@gmail.com', 'dupa123', 1),
(2, 'joker', 'Stefan', 'Karaś', 'Zbytnia 8/12', '123456789', 'zxc@wp.pl', 'asdf123', 1),
(3, 'qba1', '', '', '', '', '', '$2y$10$QyZO.fxgMl06waFNfOPSt.ptTVfAK4z1iA.dqpRCUM9gojTByU8xW', 1),
(4, 'sada', '', '', '', '', '', '$2y$10$7w.EegjSX0i/HRm5hxIyOemI5.lxiHH2Q2wwbSIfJt8UzNd1kpLe.', 1),
(5, 'sdfgthjh', '', '', '', '', 'sefgg@we.pl', '$2y$10$IHMjxktQDi1oB.yact5LOeVxpFYqFAVSQZry5CoNh.fMogEsqeee2', 1),
(6, 'wwerewtre', 'Ada', 'Zswq', '', '', 'kikuj@ed.pl', '$2y$10$.mkoJkJlLt3Oiqq.sKB.0Ookff5mtBNTOydsw2fB5PCRqfl.tUuxS', 1),
(7, 'zvffdbv', 'Asdx', 'Wscc', '96592222', '5515184', 'asca@bp.pl', '$2y$10$ywek5YP/Dpg8LTeewmdgae5j4avoN6KCd/zxAQpn3LTWkVOuRLy4m', 1),
(8, 'Se8a', 'Sebastian', 'Skrobacha', 'Kolbuszowa', '5151020518', 'se8a@wp.pl', '$2y$10$a1wztnpWJfhxaf7bLDhVi.Rb9wTxmYJr9UFxB6EZXYLm8Il9I4KWq', 1),
(9, 'uvvg', '', '', '', '', '', '$2y$10$KgDUbfydj7/8w/3siLNxFeLitkbSNiKhHAHfvuD6.2kB5LKEoM8Jy', 1),
(10, 'rgdrrsad', 'Kasr', 'Asdww', 'owdalsd22', '789456123', 'asdcd@wp.pl', '$2y$10$rm5yBe.V.nv2Eoj3TsIyJu0subeaCKn0wyN0WW2NTipQodC.EBomi', 1),
(11, 'asdasdsa', 'Adamm', 'Asdek', 'adsxcs23', '5185848748', 'wefrfrg@wp.pl', '$2y$10$yWqC84UQyzeHnaXJ2Kjoy.hhY2SRamvrVs0F8QfHjmN6lwwu5GdWO', 1),
(12, 'asdsad', 'asdad', 'asdad', 'asd32', '968484', 'sadasd@wp.pl', '$2y$10$rpdxr.3.5ExnjcJhZSXFzOZPBzy2DZrOBK9Lcfi2i.eGWsiFNq5dG', 1),
(13, 'rgdrr123', 'asda', 'zczc', 'adq232', '848515252', 'weqe@pl.pl', '$2y$10$AaJ5w08XFWQsHjozvaPGuuLDJ5EqTAwVwT3.woP9Dq/hGdNoeDJqa', 1),
(14, 'rgdrr321', 'wdds', 'acdcww', 'eff21', '9494847', 'sqwdef@op.pl', '$2y$10$DifNMGelbrnDxFPmy6.MzuZq3u4leQWO2S3wJsOqaNiwRN0goyjOa', 1),
(15, 'rgdrr', '', '', '', '', 'wqdqdqwfd@wp.pl', '$2y$10$UwV92JmtQ6m/SaDX920y.u4MIIlqC7wFxm.z5KqbLvmuINancY1W.', 1),
(16, 'qsx123', 'sada', 'sdsd', 'sdf3', '323', 'qsx123@wp.pl', '$2y$10$shkWp7uKm4pLXJnNgYLgJO84abFLP2BWC97irhbW.BmfcZaquT.OG', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ksiazki`
--

CREATE TABLE `ksiazki` (
  `id_ksiazki` int(11) NOT NULL,
  `nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `autor` text COLLATE utf8_polish_ci NOT NULL,
  `strony` int(11) NOT NULL,
  `cena` double NOT NULL,
  `opis` text COLLATE utf8_polish_ci NOT NULL,
  `stan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `ksiazki`
--

INSERT INTO `ksiazki` (`id_ksiazki`, `nazwa`, `autor`, `strony`, `cena`, `opis`, `stan`) VALUES
(1, 'Symfonia C++', 'Jerzy Grębosz', 1126, 99.99, 'Must have początkującego programisty od Jerzego Grębosza!', 120),
(2, 'Sieci komputerowe. Biblia', 'Barrie Sosinsky', 904, 99, 'Wszystko, co chcesz wiedzieć o sieciach komputerowych!', 80);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `id_zamowienia` int(11) NOT NULL,
  `id_klienta` int(11) NOT NULL,
  `id_ksiazki` int(11) NOT NULL,
  `data_zamowienia` date NOT NULL,
  `data_dostarczenia` date NOT NULL,
  `stan` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id_klienta`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Indeksy dla tabeli `ksiazki`
--
ALTER TABLE `ksiazki`
  ADD PRIMARY KEY (`id_ksiazki`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`id_zamowienia`),
  ADD UNIQUE KEY `id_klienta` (`id_klienta`),
  ADD UNIQUE KEY `id_ksiazki` (`id_ksiazki`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `klienci`
--
ALTER TABLE `klienci`
  MODIFY `id_klienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT dla tabeli `ksiazki`
--
ALTER TABLE `ksiazki`
  MODIFY `id_ksiazki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `id_zamowienia` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD CONSTRAINT `zamowienia_ibfk_1` FOREIGN KEY (`id_klienta`) REFERENCES `klienci` (`id_klienta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `zamowienia_ibfk_2` FOREIGN KEY (`id_ksiazki`) REFERENCES `ksiazki` (`id_ksiazki`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
