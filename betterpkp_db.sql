-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 09 Maj 2022, 21:46
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `betterpkp_db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sch_buk`
--

CREATE TABLE `sch_buk` (
  `train_id` varchar(8) NOT NULL,
  `from_where` varchar(255) NOT NULL,
  `to_where` varchar(255) NOT NULL,
  `dep_time` time DEFAULT NULL,
  `arv_time` time DEFAULT NULL,
  `conn_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `sch_buk`
--

INSERT INTO `sch_buk` (`train_id`, `from_where`, `to_where`, `dep_time`, `arv_time`, `conn_id`) VALUES
('KW77327', 'Poznan_Glowny', 'Buk', NULL, '09:06:00', 1),
('KW77330', 'Buk', 'Poznan_Glowny', '08:00:00', NULL, 2),
('KW77344', 'Buk', 'Poznan_Glowny', '09:19:00', NULL, 3),
('PR65221', 'poznan_glowny', 'buk', NULL, '17:33:00', 6);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sch_dopiewo`
--

CREATE TABLE `sch_dopiewo` (
  `train_id` varchar(8) NOT NULL,
  `from_where` varchar(255) NOT NULL,
  `to_where` varchar(255) NOT NULL,
  `dep_time` time DEFAULT NULL,
  `arv_time` time DEFAULT NULL,
  `conn_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `sch_dopiewo`
--

INSERT INTO `sch_dopiewo` (`train_id`, `from_where`, `to_where`, `dep_time`, `arv_time`, `conn_id`) VALUES
('KW77327', 'Poznan_Glowny', 'Buk', '08:57:00', '08:56:00', 1),
('KW77330', 'Buk', 'Poznan_Glowny', '08:09:00', '08:08:00', 2),
('KW77344', 'Buk', 'Poznan_Glowny', '09:28:00', '09:27:00', 3),
('PR65221', 'poznan_glowny', 'buk', '17:24:00', '17:23:00', 6);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sch_otusz`
--

CREATE TABLE `sch_otusz` (
  `train_id` varchar(8) NOT NULL,
  `from_where` varchar(255) NOT NULL,
  `to_where` varchar(255) NOT NULL,
  `dep_time` time DEFAULT NULL,
  `arv_time` time DEFAULT NULL,
  `conn_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `sch_otusz`
--

INSERT INTO `sch_otusz` (`train_id`, `from_where`, `to_where`, `dep_time`, `arv_time`, `conn_id`) VALUES
('KW77327', 'Poznan_Glowny', 'Buk', '09:02:00', '09:01:00', 1),
('KW77330', 'Buk', 'Poznan_Glowny', '08:04:00', '08:03:00', 2),
('KW77344', 'Buk', 'Poznan_Glowny', '09:23:00', '09:22:00', 3),
('PR65221', 'poznan_glowny', 'buk', '17:29:00', '17:28:00', 6);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sch_paledzie`
--

CREATE TABLE `sch_paledzie` (
  `train_id` varchar(8) NOT NULL,
  `from_where` varchar(255) NOT NULL,
  `to_where` varchar(255) NOT NULL,
  `dep_time` time DEFAULT NULL,
  `arv_time` time DEFAULT NULL,
  `conn_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `sch_paledzie`
--

INSERT INTO `sch_paledzie` (`train_id`, `from_where`, `to_where`, `dep_time`, `arv_time`, `conn_id`) VALUES
('KW77327', 'Poznan_Glowny', 'Buk', '08:53:00', '08:52:00', 1),
('KW77330', 'Buk', 'Poznan_Glowny', '08:13:00', '08:12:00', 2),
('KW77344', 'Buk', 'Poznan_Glowny', '09:32:00', '09:31:00', 3),
('PR65221', 'poznan_glowny', 'buk', '17:20:00', '17:19:00', 6);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sch_poznan_glowny`
--

CREATE TABLE `sch_poznan_glowny` (
  `train_id` varchar(8) NOT NULL,
  `from_where` varchar(255) NOT NULL,
  `to_where` varchar(255) NOT NULL,
  `dep_time` time DEFAULT NULL,
  `arv_time` time DEFAULT NULL,
  `conn_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `sch_poznan_glowny`
--

INSERT INTO `sch_poznan_glowny` (`train_id`, `from_where`, `to_where`, `dep_time`, `arv_time`, `conn_id`) VALUES
('KW77327', 'Poznan_Glowny', 'Buk', '08:41:00', NULL, 1),
('KW77330', 'Buk', 'Poznan_Glowny', NULL, '08:25:00', 2),
('KW77344', 'Buk', 'Poznan_Glowny', NULL, '09:44:00', 3),
('PR65221', 'poznan_glowny', 'buk', '17:08:00', NULL, 6);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sch_poznan_gorczyn`
--

CREATE TABLE `sch_poznan_gorczyn` (
  `train_id` varchar(8) NOT NULL,
  `from_where` varchar(255) NOT NULL,
  `to_where` varchar(255) NOT NULL,
  `dep_time` time DEFAULT NULL,
  `arv_time` time DEFAULT NULL,
  `conn_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `sch_poznan_gorczyn`
--

INSERT INTO `sch_poznan_gorczyn` (`train_id`, `from_where`, `to_where`, `dep_time`, `arv_time`, `conn_id`) VALUES
('KW77327', 'Poznan_Glowny', 'Buk', '08:45:00', '08:44:00', 1),
('KW77330', 'Buk', 'Poznan_Glowny', '08:22:00', '08:21:00', 2),
('KW77344', 'Buk', 'Poznan_Glowny', '09:41:00', '09:40:00', 3),
('PR65221', 'poznan_glowny', 'buk', '17:12:00', '17:11:00', 6);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sch_poznan_junikowo`
--

CREATE TABLE `sch_poznan_junikowo` (
  `train_id` varchar(8) NOT NULL,
  `from_where` varchar(255) NOT NULL,
  `to_where` varchar(255) NOT NULL,
  `dep_time` time DEFAULT NULL,
  `arv_time` time DEFAULT NULL,
  `conn_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `sch_poznan_junikowo`
--

INSERT INTO `sch_poznan_junikowo` (`train_id`, `from_where`, `to_where`, `dep_time`, `arv_time`, `conn_id`) VALUES
('KW77327', 'Poznan_Glowny', 'Buk', '08:48:00', '08:47:00', 1),
('KW77330', 'Buk', 'Poznan_Glowny', '08:18:00', '08:17:00', 2),
('KW77344', 'Buk', 'Poznan_Glowny', '09:37:00', '09:36:00', 3),
('PR65221', 'poznan_glowny', 'buk', '17:15:00', '17:14:00', 6);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `trains`
--

CREATE TABLE `trains` (
  `train_id` varchar(8) NOT NULL,
  `seats_count` int(11) DEFAULT NULL,
  `max_speed` int(11) DEFAULT NULL,
  `carriages_count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `trains`
--

INSERT INTO `trains` (`train_id`, `seats_count`, `max_speed`, `carriages_count`) VALUES
('KW77327', 250, 150, 5),
('KW77330', 280, 120, 7),
('KW77344', 160, 120, 4),
('PR65221', 270, 105, 10);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `userdata`
--

CREATE TABLE `userdata` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pswd` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ulga` varchar(255) NOT NULL,
  `permission` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `userdata`
--

INSERT INTO `userdata` (`user_id`, `email`, `pswd`, `name`, `ulga`, `permission`) VALUES
(1, 'jan.kowalski@gmail.com', '$2y$10$slT0T8i0QuKmHpcDTHnnc.1KZx1VyODlXbh5ybqQelX5q0RPK6l/C', 'Jan Kowalski', 'normalny', 'user'),
(2, 'michal.jar@gmail.com', '$2y$10$jMJGWkj.YSWdNqGgjJHgEeeuOmb0wxrhjlYDUOYZJS8MltHJbIJUC', 'Michał Jarosiński', 'uczen', 'employee'),
(3, 'arkanow@onet.pl', '$2y$10$udfbMWPfT2n8zBZnChqLl.uDZEgfTI4KgzKcT8K7QUalGwWxDTvvq', 'Arkadiusz Nowak', 'doktorant', 'employee');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `sch_buk`
--
ALTER TABLE `sch_buk`
  ADD PRIMARY KEY (`conn_id`),
  ADD KEY `train_id` (`train_id`);

--
-- Indeksy dla tabeli `sch_dopiewo`
--
ALTER TABLE `sch_dopiewo`
  ADD PRIMARY KEY (`conn_id`),
  ADD KEY `train_id` (`train_id`);

--
-- Indeksy dla tabeli `sch_otusz`
--
ALTER TABLE `sch_otusz`
  ADD PRIMARY KEY (`conn_id`),
  ADD KEY `train_id` (`train_id`);

--
-- Indeksy dla tabeli `sch_paledzie`
--
ALTER TABLE `sch_paledzie`
  ADD PRIMARY KEY (`conn_id`),
  ADD KEY `train_id` (`train_id`);

--
-- Indeksy dla tabeli `sch_poznan_glowny`
--
ALTER TABLE `sch_poznan_glowny`
  ADD PRIMARY KEY (`conn_id`),
  ADD KEY `train_id` (`train_id`);

--
-- Indeksy dla tabeli `sch_poznan_gorczyn`
--
ALTER TABLE `sch_poznan_gorczyn`
  ADD PRIMARY KEY (`conn_id`),
  ADD KEY `train_id` (`train_id`);

--
-- Indeksy dla tabeli `sch_poznan_junikowo`
--
ALTER TABLE `sch_poznan_junikowo`
  ADD PRIMARY KEY (`conn_id`),
  ADD KEY `train_id` (`train_id`);

--
-- Indeksy dla tabeli `trains`
--
ALTER TABLE `trains`
  ADD PRIMARY KEY (`train_id`);

--
-- Indeksy dla tabeli `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `sch_buk`
--
ALTER TABLE `sch_buk`
  MODIFY `conn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `sch_dopiewo`
--
ALTER TABLE `sch_dopiewo`
  MODIFY `conn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `sch_otusz`
--
ALTER TABLE `sch_otusz`
  MODIFY `conn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `sch_paledzie`
--
ALTER TABLE `sch_paledzie`
  MODIFY `conn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `sch_poznan_glowny`
--
ALTER TABLE `sch_poznan_glowny`
  MODIFY `conn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `sch_poznan_gorczyn`
--
ALTER TABLE `sch_poznan_gorczyn`
  MODIFY `conn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `sch_poznan_junikowo`
--
ALTER TABLE `sch_poznan_junikowo`
  MODIFY `conn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `userdata`
--
ALTER TABLE `userdata`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `sch_buk`
--
ALTER TABLE `sch_buk`
  ADD CONSTRAINT `sch_buk_ibfk_1` FOREIGN KEY (`train_id`) REFERENCES `trains` (`train_id`);

--
-- Ograniczenia dla tabeli `sch_dopiewo`
--
ALTER TABLE `sch_dopiewo`
  ADD CONSTRAINT `sch_dopiewo_ibfk_1` FOREIGN KEY (`train_id`) REFERENCES `trains` (`train_id`);

--
-- Ograniczenia dla tabeli `sch_otusz`
--
ALTER TABLE `sch_otusz`
  ADD CONSTRAINT `sch_otusz_ibfk_1` FOREIGN KEY (`train_id`) REFERENCES `trains` (`train_id`);

--
-- Ograniczenia dla tabeli `sch_paledzie`
--
ALTER TABLE `sch_paledzie`
  ADD CONSTRAINT `sch_paledzie_ibfk_1` FOREIGN KEY (`train_id`) REFERENCES `trains` (`train_id`);

--
-- Ograniczenia dla tabeli `sch_poznan_glowny`
--
ALTER TABLE `sch_poznan_glowny`
  ADD CONSTRAINT `sch_poznan_glowny_ibfk_1` FOREIGN KEY (`train_id`) REFERENCES `trains` (`train_id`);

--
-- Ograniczenia dla tabeli `sch_poznan_gorczyn`
--
ALTER TABLE `sch_poznan_gorczyn`
  ADD CONSTRAINT `sch_poznan_gorczyn_ibfk_1` FOREIGN KEY (`train_id`) REFERENCES `trains` (`train_id`);

--
-- Ograniczenia dla tabeli `sch_poznan_junikowo`
--
ALTER TABLE `sch_poznan_junikowo`
  ADD CONSTRAINT `sch_poznan_junikowo_ibfk_1` FOREIGN KEY (`train_id`) REFERENCES `trains` (`train_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
