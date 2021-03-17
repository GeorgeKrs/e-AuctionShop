-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2021 at 05:47 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `bids_table`
--

CREATE TABLE IF NOT EXISTS `bids_table` (
  `id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `uuid` int(11) DEFAULT NULL,
  `bid_price` double DEFAULT NULL,
  `bid_timestamp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `primary_image_url` varchar(255) CHARACTER SET utf8 NOT NULL,
  `auction_started` varchar(255) CHARACTER SET utf8 NOT NULL,
  `auction_ended` varchar(255) CHARACTER SET utf8 NOT NULL,
  `prod_number` int(11) NOT NULL,
  `auction_status` varchar(255) CHARACTER SET utf8 NOT NULL,
  `winner_bid_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `products_table`
--

INSERT INTO `products_table` (`id`, `uuid`, `title`, `price`, `category`, `sub_category`, `auction_type`, `sent_terms`, `payment_methods`, `auction_duration`, `sent_expenses`, `prod_status`, `price_raise`, `prod_description`, `sent_comments`, `primary_image_url`, `auction_started`, `auction_ended`, `prod_number`, `auction_status`, `winner_bid_id`) VALUES
(1, 2, 'AMD Ryzen 9 3900X Box', 420, 'Υπολογιστές', 'Επεξεργαστές', 'Δημοπρασία', 'Επιβαρύνουν τον αγοραστή', 'Αντικαταβολή με Courier | Συνάντηση/Μετρητά | Κατάθεση στη τράπεζα | Paypal | Παραλαβή από το κατάστημα | Ελτά', '10 Ημέρες', 3, 'Καινούργιο', 10, 'Ο Ryzen 9 3900x στα 7nm με 12 πυρήνες αρχιτεκτονικής Ζen 2, είναι χρονισμένος στα 3,8GHz με μέγιστη συχνότητα αυτή των 4.6GHz και διαθέτει 70ΜΒ μνήμης cache. Eίναι συμβατός με το X570 chipset, υποστηρίζει το πρότυπο PCIe 4.0  καθώς και τεχνολογίες όπως Pr', 'Τα έξοδα αποστολής επιβαρύνουν τον αγοραστή.', 'IMG-602005b2069780.48967970.jpeg', '07-03-2021 | 17:22:26', '30-03-2021 | 17:22:26', 5234527, 'active', NULL),
(2, 2, 'CyberPunk 2077', 40, 'Ηλεκτρονικά Παιχνίδια', 'PC', 'Πώληση', 'Επιβαρύνουν τον πωλητή', 'Αντικαταβολή με Courier | Συνάντηση/Μετρητά | Κατάθεση στη τράπεζα | Paypal | Παραλαβή από το κατάστημα | Ελτά', '29 Ημέρες', 3, 'Καινούργιο', 0, 'Το Cyberpunk 2077 είναι μια ιστορία δράσης και περιπέτειας ανοιχτού κόσμου που διαδραματίζεται στο Night City, μια μεγαλούπολη που έχει εμμονή με τη δύναμη, τη γοητεία και την τροποποίηση του σώματος. Πάρτε τον ρόλο του V, ενός παρανόμου μισθοφόρου που αν', 'Σχόλια για την αποστολή του δέματος', 'IMG-602007c45bcab2.11489782.jpeg', '07-02-2021 | 17:31:16', '29-03-2021 | 17:31:16', 7983164, 'active', NULL),
(3, 1, 'GodFall', 52, 'Ηλεκτρονικά Παιχνίδια', 'PS5', 'Πώληση', 'Επιβαρύνουν τον πωλητή', 'Αντικαταβολή με Courier | Συνάντηση/Μετρητά | Κατάθεση στη τράπεζα | Ελτά', '21 Ημέρες', 0, 'Καινούργιο', 0, 'Το Godfall είναι ένα ολοκαίνουριο looter-slasher νέας γενιάς, που διαδραματίζεται σε έναν κόσμο επικής φαντασίας γεμάτο από ηρωικούς ιππότες και αρχαία μαγεία.', 'Σχόλια σχετικά με την αποστολή', 'IMG-6020085d09f719.31600849.jpg', '07-02-2021 | 17:33:49', '28-03-2021 | 17:33:49', 6437915, 'active', NULL),
(4, 1, 'Samsung C27RG50 Curved Gaming Monitor 27 FHD 240Hz', 280, 'Υπολογιστές', 'Οθόνες', 'Δημοπρασία', 'Επιβαρύνουν τον αγοραστή', 'Αντικαταβολή με Courier | Συνάντηση/Μετρητά | Κατάθεση στη τράπεζα | Paypal | Παραλαβή από το κατάστημα | Ελτά', '30 Ημέρες', 5, 'Καινούργιο', 5, 'Samsung C27RG50 Curved Gaming Monitor 27 FHD 240Hz.', 'Σχόλια αποστολής', 'IMG-602008cee54324.70914895.jpeg', '07-02-2021 | 17:35:42', '30-03-2021 | 17:35:42', 4236791, 'active', NULL),
(5, 1, 'Razer Opus Midnight Blue', 80, 'Υπολογιστές', 'Περιφερειακά', 'Πώληση', 'Επιβαρύνουν τον αγοραστή', 'Αντικαταβολή με Courier | Συνάντηση/Μετρητά | Κατάθεση στη τράπεζα | Paypal | Παραλαβή από το κατάστημα | Ελτά', '11 Ημέρες', 3, 'Καινούργιο', 0, 'Καλώδιο ή Βύσμα 3.5mm / Bluetooth, Μικρόφωνο, Κατασκευαστής: Razer.', 'Σχόλια Αποστολής', 'IMG-602009457c7193.80157802.jpeg', '07-02-2021 | 17:37:41', '18-03-2021 | 17:37:41', 2377546, 'active', NULL),
(6, 1, 'Angel of Death', 800, 'Μουσικά Όργανα', 'Ηλεκτρικές Kιθάρες', 'Δημοπρασία', 'Επιβαρύνουν τον αγοραστή', 'Αντικαταβολή με Courier | Συνάντηση/Μετρητά | Κατάθεση στη τράπεζα | Paypal | Παραλαβή από το κατάστημα | Ελτά', '20 Ημέρες', 20, 'Καινούργιο', 50, 'Dave Mustaine signature model\nBody: Mahogany\nSet-in mahogany neck\nNeck profile: "Mustaine" D-Shape\nFretboard: Ebony\n24 Frets\nFretboard inlays: Abalone Custom Mustaine\nScale: 648 mm\nNut width: 43 mm\nMini Grover machine heads\nPickups: 2x Dave Mustaine Dunca', 'Σχόλια αποστολής.', 'IMG-60200a3279a2b5.00454406.png', '07-02-2021 | 17:41:38', '27-03-2021 | 17:41:38', 1199376, 'active', NULL),
(7, 1, 'Harley Benton PB-20 SBK Standard Series', 500, 'Μουσικά Όργανα', 'Μπάσο', 'Δημοπρασία', 'Επιβαρύνουν τον αγοραστή', 'Συνάντηση/Μετρητά | Κατάθεση στη τράπεζα | Paypal | Παραλαβή από το κατάστημα', '19 Ημέρες', 20, 'Καινούργιο', 25, 'Body: Basswood\nBolt-on neck: Maple\nFretboard: Amaranth\nFretboard inlays: Dots\nNeck profile: Modern C\nScale: 864 mm\nNut width: 42 mm\n20 Frets\nDouble-Action truss rod\nPickup: 1 PB style split coil\n1 Volume control and 1 tone control\nClassic PB-Style machine', 'Σχόλια αποστολής', 'IMG-60200ac1748ba2.58401046.jpeg', '07-02-2021 | 17:44:01', '26-03-2021 | 17:44:01', 1203467, 'active', NULL),
(8, 1, 'Harley Benton CG200CE-BK', 100, 'Μουσικά Όργανα', 'Κλασσικές Kιθάρες', 'Πώληση', 'Επιβαρύνουν τον αγοραστή', 'Αντικαταβολή με Courier | Συνάντηση/Μετρητά | Κατάθεση στη τράπεζα | Paypal | Παραλαβή από το κατάστημα | Ελτά', '19 Ημέρες', 3, 'Καινούργιο', 0, 'Size: 4/4\nCutaway\nBody: Basswood\nNeck: Nato\nFretboard: Maple\nNut width: 52 mm\nScale: 650 mm\n19 Frets\nCream-coloured body binding\nPickup system with integrated 4-band EQ\nNylon strings\nTotal length: 99.06 cm\nColour: Black high gloss', 'Σχόλια αποστολής.', 'IMG-60200b1ea399e6.79073672.jpg', '07-02-2021 | 17:45:34', '26-03-2021 | 17:45:34', 4203778, 'active', NULL),
(9, 1, 'Fender', 300, 'Μουσικά Όργανα', 'Ηλεκτρικές Kιθάρες', 'Πώληση', 'Επιβαρύνουν τον αγοραστή', 'Αντικαταβολή με Courier | Συνάντηση/Μετρητά | Κατάθεση στη τράπεζα | Ελτά', '20 Ημέρες', 5, 'Καινούργιο', 0, 'Περιγραφή προϊόντος', 'Σχόλια αποστολής', 'IMG-6022cd16b06272.33654967.jpg', '09-02-2021 | 19:57:42', '18-03-2021 | 19:57:42', 4632071, 'active', NULL),
(10, 1, 'Red Dead Redemption II', 50, 'Ηλεκτρονικά Παιχνίδια', 'XBOX', 'Πώληση', 'Επιβαρύνουν τον αγοραστή', 'Συνάντηση/Μετρητά | Κατάθεση στη τράπεζα | Paypal | Παραλαβή από το κατάστημα', '9 Ημέρες', 3, 'Καινούργιο', 0, 'Red Dead Redemption 2 is a 2018 action-adventure game developed and published by Rockstar Games. The game is the third entry in the Red Dead series and is a prequel to the 2010 game Red Dead Redemption.', 'Σχόλια αποστολής', 'IMG-6026a54e6045f5.80850333.jpeg', '12-02-2021 | 17:57:02', '28-03-2021 | 22:41:12', 6918609, 'active', NULL),
(11, 1, 'Logitech MX keys', 100, 'Υπολογιστές', 'Περιφερειακά', 'Δημοπρασία', 'Επιβαρύνουν τον αγοραστή', 'Αντικαταβολή με Courier | Συνάντηση/Μετρητά | Κατάθεση στη τράπεζα | Ελτά', '17 Ημέρες', 3, 'Καινούργιο', 5, 'Περιγραφή Προίόντος', 'Σχόλια αποστολής', 'IMG-6026a6c5373e07.09522633.jpeg', '07-03-2021 | 17:22:26', '28-03-2021 | 18:03:17', 7129547, 'active', NULL),
(12, 1, 'Calice', 20, 'Κοσμήματα', 'Δαχτυλίδια', 'Δημοπρασία', 'Επιβαρύνουν τον αγοραστή', 'Αντικαταβολή με Courier | Συνάντηση/Μετρητά | Κατάθεση στη τράπεζα | Paypal | Ελτά', '30 Ημέρες', 3, 'Καινούργιο', 5, 'Περιγραφή', 'Sxolia', 'IMG-604e255ac3a827.10484931.jpg', '14-03-2021 | 17:01:46', '14-04-2021 | 17:25:40', 6602752, 'active', NULL);

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
(1, 'StrangeWings', 'gkjeff1996@gmail.com', '1234', 'Κουρσούμης Γιώργος', 'Καραισκάκη 1023', '6979620981', 'Μενίδι, Αχαρναί', 'Αττικής', '13674', '12/01/2021'),
(2, 'Joanna', 'joannanatsi@gmail.com', '123', 'Ιωάννα Νάτση', 'Αμαλιάδος 5523', '6332560866', 'Μενίδι, Αχαρναί', 'Αττικής', '13672', '12/01/2021');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
