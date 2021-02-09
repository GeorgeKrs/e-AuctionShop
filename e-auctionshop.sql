-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2021 at 07:42 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e-auctionshop`
--
CREATE DATABASE IF NOT EXISTS `e-auctionshop` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `e-auctionshop`;

-- --------------------------------------------------------

--
-- Table structure for table `products_table`
--

CREATE TABLE IF NOT EXISTS `products_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `price` double NOT NULL,
  `category` varchar(255) CHARACTER SET utf8 NOT NULL,
  `sub_category` varchar(255) CHARACTER SET utf8 NOT NULL,
  `auction_type` varchar(255) CHARACTER SET utf8 NOT NULL,
  `sent_terms` varchar(255) CHARACTER SET utf8 NOT NULL,
  `payment_methods` varchar(255) CHARACTER SET utf8 NOT NULL,
  `auction_duration` varchar(255) CHARACTER SET utf8 NOT NULL,
  `sent_expenses` double NOT NULL,
  `prod_status` varchar(255) CHARACTER SET utf8 NOT NULL,
  `price_raise` double NOT NULL,
  `prod_description` varchar(750) CHARACTER SET utf8 NOT NULL,
  `sent_comments` varchar(500) CHARACTER SET utf8 NOT NULL,
  `image_url` varchar(255) CHARACTER SET utf8 NOT NULL,
  `auction_started` varchar(255) CHARACTER SET utf8 NOT NULL,
  `auction_ended` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `products_table`
--

INSERT INTO `products_table` (`id`, `uuid`, `title`, `price`, `category`, `sub_category`, `auction_type`, `sent_terms`, `payment_methods`, `auction_duration`, `sent_expenses`, `prod_status`, `price_raise`, `prod_description`, `sent_comments`, `image_url`, `auction_started`, `auction_ended`) VALUES
(1, 2, 'AMD Ryzen 9 3900X Box', 420, 'Υπολογιστές', 'Επεξεργαστές', 'Δημοπρασία', 'Επιβαρύνουν τον αγοραστή', 'Αντικαταβολή με Courier | Συνάντηση/Μετρητά | Κατάθεση στη τράπεζα | Paypal | Παραλαβή από το κατάστημα | Ελτά', '10 Ημέρες', 3, 'Καινούριο', 10, 'Ο Ryzen 9 3900x στα 7nm με 12 πυρήνες αρχιτεκτονικής Ζen 2, είναι χρονισμένος στα 3,8GHz με μέγιστη συχνότητα αυτή των 4.6GHz και διαθέτει 70ΜΒ μνήμης cache. Eίναι συμβατός με το X570 chipset, υποστηρίζει το πρότυπο PCIe 4.0  καθώς και τεχνολογίες όπως Pr', 'Τα έξοδα αποστολής επιβαρύνουν τον αγοραστή.', 'IMG-602005b2069780.48967970.jpeg', '07-02-2021 | 17:22:26', '17-02-2021 | 17:22:26'),
(2, 2, 'CyberPunk 2077', 40, 'Ηλεκτρονικά Παιχνίδια', 'PC', 'Πώληση', 'Επιβαρύνουν τον πωλητή', 'Αντικαταβολή με Courier | Συνάντηση/Μετρητά | Κατάθεση στη τράπεζα | Paypal | Παραλαβή από το κατάστημα | Ελτά', '29 Ημέρες', 3, 'Καινούριο', 0, 'Το Cyberpunk 2077 είναι μια ιστορία δράσης και περιπέτειας ανοιχτού κόσμου που διαδραματίζεται στο Night City, μια μεγαλούπολη που έχει εμμονή με τη δύναμη, τη γοητεία και την τροποποίηση του σώματος. Πάρτε τον ρόλο του V, ενός παρανόμου μισθοφόρου που αν', 'Σχόλια για την αποστολή του δέματος', 'IMG-602007c45bcab2.11489782.jpeg', '07-02-2021 | 17:31:16', '08-03-2021 | 17:31:16'),
(3, 1, 'GodFall', 52, 'Ηλεκτρονικά Παιχνίδια', 'PS5', 'Πώληση', 'Επιβαρύνουν τον πωλητή', 'Αντικαταβολή με Courier | Συνάντηση/Μετρητά | Κατάθεση στη τράπεζα | Ελτά', '21 Ημέρες', 0, 'Καινούριο', 0, 'Το Godfall είναι ένα ολοκαίνουριο looter-slasher νέας γενιάς, που διαδραματίζεται σε έναν κόσμο επικής φαντασίας γεμάτο από ηρωικούς ιππότες και αρχαία μαγεία.', 'Σχόλια σχετικά με την αποστολή', 'IMG-6020085d09f719.31600849.jpg', '07-02-2021 | 17:33:49', '28-02-2021 | 17:33:49'),
(4, 1, 'Samsung C27RG50 Curved Gaming Monitor 27 FHD 240Hz', 280, 'Υπολογιστές', 'Οθόνες', 'Δημοπρασία', 'Επιβαρύνουν τον αγοραστή', 'Αντικαταβολή με Courier | Συνάντηση/Μετρητά | Κατάθεση στη τράπεζα | Paypal | Παραλαβή από το κατάστημα | Ελτά', '30 Ημέρες', 5, 'Καινούριο', 5, 'Samsung C27RG50 Curved Gaming Monitor 27 FHD 240Hz.', 'Σχόλια αποστολής', 'IMG-602008cee54324.70914895.jpeg', '07-02-2021 | 17:35:42', '09-03-2021 | 17:35:42'),
(5, 1, 'Razer Opus Midnight Blue', 80, 'Υπολογιστές', 'Περιφερειακά', 'Πώληση', 'Επιβαρύνουν τον αγοραστή', 'Αντικαταβολή με Courier | Συνάντηση/Μετρητά | Κατάθεση στη τράπεζα | Paypal | Παραλαβή από το κατάστημα | Ελτά', '11 Ημέρες', 3, 'Καινούριο', 0, 'Καλώδιο ή Βύσμα 3.5mm / Bluetooth, Μικρόφωνο, Κατασκευαστής: Razer.', 'Σχόλια Αποστολής', 'IMG-602009457c7193.80157802.jpeg', '07-02-2021 | 17:37:41', '18-02-2021 | 17:37:41'),
(6, 1, 'Angel of Death', 800, 'Μουσικά Όργανα', 'Ηλεκτρικές Κιθάρες', 'Δημοπρασία', 'Επιβαρύνουν τον αγοραστή', 'Αντικαταβολή με Courier | Συνάντηση/Μετρητά | Κατάθεση στη τράπεζα | Paypal | Παραλαβή από το κατάστημα | Ελτά', '20 Ημέρες', 20, 'Καινούριο', 50, 'Dave Mustaine signature model\nBody: Mahogany\nSet-in mahogany neck\nNeck profile: "Mustaine" D-Shape\nFretboard: Ebony\n24 Frets\nFretboard inlays: Abalone Custom Mustaine\nScale: 648 mm\nNut width: 43 mm\nMini Grover machine heads\nPickups: 2x Dave Mustaine Dunca', 'Σχόλια αποστολής.', 'IMG-60200a3279a2b5.00454406.png', '07-02-2021 | 17:41:38', '27-02-2021 | 17:41:38'),
(7, 1, 'Harley Benton PB-20 SBK Standard Series', 500, 'Μουσικά Όργανα', 'Μπάσο', 'Δημοπρασία', 'Επιβαρύνουν τον αγοραστή', 'Συνάντηση/Μετρητά | Κατάθεση στη τράπεζα | Paypal | Παραλαβή από το κατάστημα', '19 Ημέρες', 20, 'Καινούριο', 25, 'Body: Basswood\nBolt-on neck: Maple\nFretboard: Amaranth\nFretboard inlays: Dots\nNeck profile: Modern C\nScale: 864 mm\nNut width: 42 mm\n20 Frets\nDouble-Action truss rod\nPickup: 1 PB style split coil\n1 Volume control and 1 tone control\nClassic PB-Style machine', 'Σχόλια αποστολής', 'IMG-60200ac1748ba2.58401046.jpeg', '07-02-2021 | 17:44:01', '26-02-2021 | 17:44:01'),
(8, 1, 'Harley Benton CG200CE-BK', 100, 'Μουσικά Όργανα', 'Κλασσικές Κιθάρες', 'Πώληση', 'Επιβαρύνουν τον αγοραστή', 'Αντικαταβολή με Courier | Συνάντηση/Μετρητά | Κατάθεση στη τράπεζα | Paypal | Παραλαβή από το κατάστημα | Ελτά', '19 Ημέρες', 3, 'Καινούριο', 0, 'Size: 4/4\nCutaway\nBody: Basswood\nNeck: Nato\nFretboard: Maple\nNut width: 52 mm\nScale: 650 mm\n19 Frets\nCream-coloured body binding\nPickup system with integrated 4-band EQ\nNylon strings\nTotal length: 99.06 cm\nColour: Black high gloss', 'Σχόλια αποστολής.', 'IMG-60200b1ea399e6.79073672.jpg', '07-02-2021 | 17:45:34', '26-02-2021 | 17:45:34'),
(9, 1, 'Fender', 300, 'Μουσικά Όργανα', 'Ηλεκτρικές Κιθάρες', 'Πώληση', 'Επιβαρύνουν τον αγοραστή', 'Αντικαταβολή με Courier | Συνάντηση/Μετρητά | Κατάθεση στη τράπεζα | Ελτά', '20 Ημέρες', 5, 'Καινούριο', 0, 'Περιγραφή προϊόντος', 'Σχόλια αποστολής', 'IMG-6022cd16b06272.33654967.jpg', '09-02-2021 | 19:57:42', '01-03-2021 | 19:57:42');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `uuid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pw` varchar(255) CHARACTER SET utf8 NOT NULL,
  `full_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `address_numb` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 NOT NULL,
  `city` varchar(255) CHARACTER SET utf8 NOT NULL,
  `district` varchar(255) CHARACTER SET utf8 NOT NULL,
  `TK` varchar(255) CHARACTER SET utf8 NOT NULL,
  `registration_date` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`uuid`),
  UNIQUE KEY `uuid` (`uuid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`uuid`, `username`, `email`, `pw`, `full_name`, `address_numb`, `phone`, `city`, `district`, `TK`, `registration_date`) VALUES
(1, 'StrangeWings', 'gk1996@gmail.com', 'a0d2124f14c9fe06', 'Βεντούρης Γιώργος', 'Καραισκάκη 88', '6932680851', 'Μενίδι, Αχαρναί', 'Αττικής', '13672', '12/01/2021'),
(2, 'Joanna', 'ele23@gmail.com', 'abc123', 'Κωσταντίνα Λαμπρου', 'Αμαλιάδος 35', '6932680866', 'Μενίδι, Αχαρναί', 'Αττικής', '13672', '12/01/2021');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
