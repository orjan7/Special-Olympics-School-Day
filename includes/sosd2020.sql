SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `athletes` (
  `id` int(11) NOT NULL,
  `schoolNumber` int(11) NOT NULL,
  `stage` text COLLATE utf8_swedish_ci NOT NULL,
  `firstName` text COLLATE utf8_swedish_ci NOT NULL,
  `lastName` text COLLATE utf8_swedish_ci NOT NULL,
  `startNumber` int(11) NOT NULL,
  `disabilities` text COLLATE utf8_swedish_ci NOT NULL,
  `photo` text COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

INSERT INTO `athletes` (`id`, `schoolNumber`, `stage`, `firstName`, `lastName`, `startNumber`, `disabilities`, `photo`) VALUES
(25, 2, 'G', 'Förnamn 2', 'Efternamn 2', 2, 'R', 'Ej fotas'),
(29, 4, 'L', 'Förnamn 4', 'Efternamn 4', 4, 'R', 'Ej fotas'),
(30, 5, 'G', 'Förnamn 5', 'Efternamn 5', 5, 'R', 'Ej fotas'),
(31, 3, 'L', 'Förnamn 6', 'Efternamn 6', 6, 'S', 'Ej fotas'),
(34, 7, 'M', 'Förnamn 1', 'Efternamn 1', 1, 'R', 'Ej fotas'),
(35, 7, 'M', 'Förnamn 3', 'Efternamn 3', 3, 'S', 'Ej fotas'),
(36, 6, 'L', 'Förnamn 7', 'Efternamn 7', 7, 'R', 'Ej fotas'),
(37, 6, 'L', 'Förnamn 8', 'Efternamn 8', 8, 'U', '');

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `startNumberA` int(11) NOT NULL,
  `Kula` tinyint(1) DEFAULT NULL,
  `Höjdhopp` tinyint(1) DEFAULT NULL,
  `Längdhopp` tinyint(1) DEFAULT NULL,
  `60 meter` tinyint(1) DEFAULT NULL,
  `100 meter` tinyint(1) DEFAULT NULL,
  `Stafett` tinyint(1) DEFAULT NULL,
  `Race Runner` tinyint(1) DEFAULT NULL,
  `Slalom` tinyint(1) DEFAULT NULL,
  `Boccia` tinyint(1) DEFAULT NULL,
  `Unified` tinyint(1) DEFAULT NULL,
  `Innebandy` tinyint(1) DEFAULT NULL,
  `Prova på` tinyint(1) DEFAULT NULL,
  `Test` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

INSERT INTO `branch` (`id`, `startNumberA`, `Kula`, `Höjdhopp`, `Längdhopp`, `60 meter`, `100 meter`, `Stafett`, `Race Runner`, `Slalom`, `Boccia`, `Unified`, `Innebandy`, `Prova på`, `Test`) VALUES
(185, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(230, 6, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(233, 4, 1, NULL, NULL, 1, 1, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL),
(253, 5, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(269, 2, 1, 1, NULL, 1, NULL, 1, NULL, NULL, 1, 1, 1, NULL, 1),
(273, 3, 1, NULL, NULL, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(276, 1, NULL, 1, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(278, 8, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

CREATE TABLE `branchHeader` (
  `id` int(11) NOT NULL,
  `sortNr` int(11) NOT NULL,
  `branch` text COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

INSERT INTO `branchHeader` (`id`, `sortNr`, `branch`) VALUES
(1, 1, 'Kula'),
(2, 2, 'Höjdhopp'),
(3, 3, 'Längdhopp'),
(4, 4, '60 meter'),
(5, 5, '100 meter'),
(6, 6, 'Stafett'),
(7, 7, 'Race Runner'),
(8, 8, 'Slalom'),
(9, 9, 'Boccia'),
(10, 10, 'Unified'),
(11, 11, 'Innebandy'),
(12, 13, 'Prova på'),
(14, 13, 'Test');

CREATE TABLE `Result` (
  `id` int(11) NOT NULL,
  `startNumberR` int(11) NOT NULL,
  `r60_meterOne` text COLLATE utf8_swedish_ci,
  `r60_meterTwo` text COLLATE utf8_swedish_ci,
  `r100_meterOne` text COLLATE utf8_swedish_ci,
  `r100_meterTwo` text COLLATE utf8_swedish_ci,
  `rKulaOne` text COLLATE utf8_swedish_ci,
  `rKulaTwo` text COLLATE utf8_swedish_ci,
  `rBocciaOne` text COLLATE utf8_swedish_ci,
  `rBocciaTwo` text COLLATE utf8_swedish_ci,
  `rLängdhoppOne` text COLLATE utf8_swedish_ci,
  `rLängdhoppTwo` text COLLATE utf8_swedish_ci,
  `rHöjdhoppOne` text COLLATE utf8_swedish_ci,
  `rHöjdhoppTwo` text COLLATE utf8_swedish_ci,
  `rRace_RunnerOne` text COLLATE utf8_swedish_ci,
  `rRace_RunnerTwo` text COLLATE utf8_swedish_ci,
  `rSlalomOne` text COLLATE utf8_swedish_ci,
  `rSlalomTwo` text COLLATE utf8_swedish_ci,
  `rTestOne` text COLLATE utf8_swedish_ci,
  `rTestTwo` text COLLATE utf8_swedish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

INSERT INTO `Result` (`id`, `startNumberR`, `r60_meterOne`, `r60_meterTwo`, `r100_meterOne`, `r100_meterTwo`, `rKulaOne`, `rKulaTwo`, `rBocciaOne`, `rBocciaTwo`, `rLängdhoppOne`, `rLängdhoppTwo`, `rHöjdhoppOne`, `rHöjdhoppTwo`, `rRace_RunnerOne`, `rRace_RunnerTwo`, `rSlalomOne`, `rSlalomTwo`, `rTestOne`, `rTestTwo`) VALUES
(1, 1, '5.8', '5.7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2.26', '1.35', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, '1.2', '2.8', NULL, NULL, '\05\0.\04', '5.6', '5', '4', NULL, NULL, '1', '4', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2.6', '3.1', NULL, NULL, NULL, NULL),
(9, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.10', '0.24', NULL, NULL, NULL, NULL),
(12, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

CREATE TABLE `R_Innebandy` (
  `id` int(11) NOT NULL,
  `idSchoolR` int(11) NOT NULL,
  `result` text COLLATE utf8_swedish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

INSERT INTO `R_Innebandy` (`id`, `idSchoolR`, `result`) VALUES
(1, 2, NULL);

CREATE TABLE `R_Stafett` (
  `id` int(11) NOT NULL,
  `idSchoolR` int(11) NOT NULL,
  `result` text COLLATE utf8_swedish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

INSERT INTO `R_Stafett` (`id`, `idSchoolR`, `result`) VALUES
(6, 7, '6'),
(7, 5, NULL),
(8, 2, NULL);

CREATE TABLE `R_Unified` (
  `id` int(11) NOT NULL,
  `idSchoolR` int(11) NOT NULL,
  `result` text COLLATE utf8_swedish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

INSERT INTO `R_Unified` (`id`, `idSchoolR`, `result`) VALUES
(3, 2, NULL);

CREATE TABLE `school` (
  `idSchool` int(11) NOT NULL,
  `city` text COLLATE utf8_swedish_ci NOT NULL,
  `school` text COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

INSERT INTO `school` (`idSchool`, `city`, `school`) VALUES
(1, 'Umeå', 'Dragonskolan'),
(2, 'Lycksele', 'Tannbergsskolan'),
(3, 'Umeå', 'Hagaskolan'),
(4, 'Obbola', 'Obbola Skola'),
(5, 'Umeå', 'Västangårdsskola'),
(6, 'Holmsund', 'Storsjöskolan'),
(7, 'Umeå', 'Ålidhemsskolan'),
(8, 'Umeå', 'Carlshöjdsskolan');

CREATE TABLE `startNumber` (
  `id` int(11) NOT NULL,
  `startNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

INSERT INTO `startNumber` (`id`, `startNumber`) VALUES
(1, 1),
(3, 2),
(5, 3),
(6, 4),
(7, 5),
(8, 6),
(9, 7),
(10, 8),
(11, 9),
(12, 10),
(13, 11),
(14, 12),
(15, 13),
(16, 14),
(17, 15),
(18, 16),
(19, 17),
(20, 18),
(21, 19),
(22, 20),
(23, 21),
(24, 22),
(26, 24),
(27, 25),
(28, 26),
(29, 27),
(30, 28),
(31, 29),
(32, 30),
(33, 31),
(34, 41),
(35, 44),
(36, 45),
(37, 46),
(38, 47),
(39, 48),
(40, 49),
(41, 51),
(43, 54),
(44, 55),
(45, 56),
(46, 57),
(47, 58),
(48, 59),
(49, 60),
(50, 61),
(51, 62),
(52, 63),
(53, 64),
(54, 65),
(55, 66),
(56, 67),
(57, 68),
(58, 69),
(59, 70),
(60, 71),
(61, 72),
(62, 73),
(63, 77),
(64, 78),
(65, 79),
(66, 80),
(67, 81),
(68, 82),
(69, 83),
(70, 84),
(71, 85),
(72, 86),
(73, 87),
(74, 88),
(75, 89),
(76, 90),
(77, 91),
(78, 92),
(79, 93),
(80, 94),
(81, 95),
(82, 96),
(83, 97),
(84, 98),
(85, 99),
(86, 133),
(87, 134),
(88, 135),
(89, 136),
(90, 137),
(91, 138),
(92, 139),
(93, 140),
(94, 141),
(95, 142),
(96, 143),
(97, 144),
(98, 145),
(99, 146),
(100, 147),
(101, 148),
(102, 149),
(103, 150),
(104, 151),
(105, 152),
(106, 153),
(107, 154),
(108, 155),
(109, 156),
(110, 157),
(111, 158),
(112, 159),
(113, 160),
(114, 161),
(115, 162),
(116, 163),
(117, 164),
(118, 165),
(119, 166),
(120, 167),
(121, 168),
(122, 169),
(123, 170),
(124, 171),
(125, 172),
(126, 173),
(127, 174),
(128, 175),
(129, 176),
(130, 177),
(131, 178),
(132, 179),
(133, 180),
(134, 181),
(135, 182),
(136, 183),
(137, 184),
(138, 185),
(139, 186),
(140, 187),
(141, 188),
(142, 189),
(143, 190),
(144, 196),
(145, 197),
(146, 198),
(147, 199),
(148, 202),
(149, 203),
(150, 206),
(151, 207),
(152, 208),
(153, 285),
(154, 432),
(155, 433),
(156, 444),
(157, 445),
(158, 446),
(159, 449),
(160, 450),
(161, 454),
(162, 455),
(163, 456),
(164, 457),
(165, 458),
(166, 459),
(167, 460),
(168, 461),
(169, 462),
(170, 463),
(171, 464),
(172, 465),
(173, 466),
(174, 467),
(175, 468),
(176, 469),
(177, 500),
(178, 501),
(179, 502),
(180, 503),
(181, 504),
(182, 505),
(183, 506),
(184, 507),
(185, 508);


ALTER TABLE `athletes`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `branchHeader`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `Result`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `R_Innebandy`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `R_Stafett`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `R_Unified`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `school`
  ADD PRIMARY KEY (`idSchool`);

ALTER TABLE `startNumber`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `athletes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;

ALTER TABLE `branchHeader`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

ALTER TABLE `Result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

ALTER TABLE `R_Innebandy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `R_Stafett`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `R_Unified`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `school`
  MODIFY `idSchool` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `startNumber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
