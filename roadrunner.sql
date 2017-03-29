-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2017 at 07:01 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `roadrunner`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `v_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`v_id`, `ip_add`, `qty`) VALUES
(3, '::1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `korisnik_id` int(10) UNSIGNED NOT NULL,
  `korisnik_ime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `korisnik_prezime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `korisnik_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `korisnik_lozinka` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `korisnik_kontakt` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `korisnik_grad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `korisnik_adresa` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `datum_registracije` datetime NOT NULL,
  `tip_korisnika` varchar(1) COLLATE utf8_unicode_ci NOT NULL COMMENT '1 - admin 2 - korisnik',
  `aktivnost` varchar(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`korisnik_id`, `korisnik_ime`, `korisnik_prezime`, `korisnik_email`, `korisnik_lozinka`, `korisnik_kontakt`, `korisnik_grad`, `korisnik_adresa`, `datum_registracije`, `tip_korisnika`, `aktivnost`) VALUES
(1, 'test', 'test', 'admin@admin.com', '7cb3a1829ab69721d97ebfb0433a4676', '+381637625905', 'Beograd', 'Klaonicka 2', '2015-07-23 12:00:00', '2', '1'),
(6, 'Nikola123', 'Jakovljevic', 'nikola@live.com', '9365ea12b2d910e1aceaac190fbc97a5', '06582462185', 'Beograd', 'Klaonicka 2', '2017-01-14 18:39:17', '2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE `proizvodi` (
  `proizvod_id` int(100) NOT NULL,
  `proizvod_vrsta` int(100) NOT NULL,
  `proizvod_naziv` varchar(255) NOT NULL,
  `proizvod_cena` varchar(100) NOT NULL,
  `proizvod_opis` text NOT NULL,
  `proizvod_slika` text NOT NULL,
  `proizvod_kljucner` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`proizvod_id`, `proizvod_vrsta`, `proizvod_naziv`, `proizvod_cena`, `proizvod_opis`, `proizvod_slika`, `proizvod_kljucner`) VALUES
(1, 12, 'Pljeskavica', '250', '<p>&nbsp;jklefewncfljswekf lkweljkf lkjwe ljkfw</p>', 'Cu0orm4VYAAM7a9.jpg', 0x706c6a65736b6176696361),
(2, 12, 'Cevapi', '250', '<p>nfaojdbfabljfabfljaljbfjlabljfbjalbs jflbajlfbaf</p>', 'cev11.jpg', 0x636576617069),
(3, 13, 'Pizza Margarita', '750', '<p>csdvsdvsdvsdvsdvdsvsvsdv</p>', 's772520847332031168_p1_i1_w2560.jpeg', 0x6d6172676172697461),
(4, 13, 'Pizza Capricciosa', '700', '<p>sdafdasfasfasfasafs</p>\r\n<p>sadsadsadsadsadsafsafasfsafsafasfsafsasasadsafsafsafsa</p>\r\n<p>adsasafsafasfassafasfaf</p>', 'full_Capricciosa.jpg', 0x43617072696363696f7361),
(5, 14, 'Pasta Carbonara', '640', '<p>scasdsadasd sa sad s d saf s fsa sfa fsa sfas fafsa</p>\r\n<p>&nbsp;as fsa fsa sf s sa as</p>', 'Spaghetti-Alla-Carbonara_16084.jpg', 0x436172626f6e617261),
(6, 15, 'Palacinka Eurokrem Plazma', '300', '<p>scsdgsfdgtre getr gh treh treh terh et h ethge</p>\r\n<p>wrefgrwefrwe gf erw</p>', '498062_palacinke_f.jpg', 0x70616c6163696e6b61);

-- --------------------------------------------------------

--
-- Table structure for table `vrsta`
--

CREATE TABLE `vrsta` (
  `vrsta_id` int(100) NOT NULL,
  `vrsta_naziv` varchar(100) NOT NULL,
  `vrsta_slika` text NOT NULL,
  `vrsta_opis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vrsta`
--

INSERT INTO `vrsta` (`vrsta_id`, `vrsta_naziv`, `vrsta_slika`, `vrsta_opis`) VALUES
(12, 'Rostilj', '2100779840561b7e493464d747672240_orig.jpg', '<p>Pljeskavice, Ä‡evapi, kobasice, u&scaron;tipci ili leskovaÄki voz? Ako vam treba kuÄ‡na dostava ro&scaron;tilja na pravom ste mestu. NaruÄi odmah online!</p>'),
(13, 'Pizza', 'wafswectpmbr0zmug9ly.jpg', '<p>Kod nas su najbolje najuksnije pizze na svetu! Pitate se zasto?? Je mi koristimo tajne sastojke kod je se prenose sa kolena na koleno poslednji 200 godine!!!</p>'),
(14, 'Paste', 'Pasta-Please-15-New-Spins-on-Spaghetti-Meatballs-Photo5.jpg', '<p>Nasi kuvari koji spremaju paste su Italijani, uceni od malih nocu da ih spremaju, od njihovih rotidelja, po posedmin recepitima vrednosti 1000 godina! Mozeta samo da zamislite kakvog ukusa su onda!</p>'),
(15, 'Palacinke', 'bn-pancakes.jpg', '<p>Socne palcinke koje mame vase stomake da zelite jos! Saa posebnim filom i nas eurekremom, za koji garantujemo da do sada lepsu stvar niste probali, zaboravicete za NUTELU ili EUROKREM!</p>'),
(17, 'Ostalo', 'sas.jpg', '<p>Imam sve vrste gaziranih i ne gaziranih pica kao i neke vrste laholholnih. Spremamo pomfrit za 10 razlicitih nacina!</p>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`v_id`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`korisnik_id`);

--
-- Indexes for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`proizvod_id`);

--
-- Indexes for table `vrsta`
--
ALTER TABLE `vrsta`
  ADD PRIMARY KEY (`vrsta_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `korisnik_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `proizvodi`
--
ALTER TABLE `proizvodi`
  MODIFY `proizvod_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `vrsta`
--
ALTER TABLE `vrsta`
  MODIFY `vrsta_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
