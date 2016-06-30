-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 30. Jun 2016 um 17:20
-- Server-Version: 10.1.9-MariaDB
-- PHP-Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `Kavalier`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Category1'),
(2, 'Category2'),
(3, 'Category3'),
(4, 'Category4'),
(5, 'Category5');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `sent` tinyint(4) NOT NULL DEFAULT '0',
  `date_ordered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `sent`, `date_ordered`) VALUES
(73, 1, 0, 1, '2016-05-08 20:08:41'),
(74, 1, 0, 1, '2016-05-08 21:17:33'),
(75, 1, 34.96, 1, '2016-05-08 21:23:47'),
(76, 1, 0, 1, '2016-05-08 21:24:25'),
(77, 1, 0, 1, '2016-05-08 21:24:47'),
(78, 1, 0, 1, '2016-05-08 21:25:12'),
(79, 1, 0, 1, '2016-05-08 21:33:23'),
(80, 1, 0, 1, '2016-05-09 22:24:55'),
(81, 1, 0, 1, '2016-05-10 12:13:45'),
(82, 1, 0, 1, '2016-05-10 14:29:46'),
(88, 4, 63.96, 1, '2016-05-10 15:03:57'),
(89, 4, 459.7, 1, '2016-05-10 15:06:35'),
(90, 4, 1399.68, 1, '2016-05-12 19:59:37'),
(91, 3, 151.89, 1, '2016-05-12 20:01:32'),
(92, 3, 39.96, 1, '2016-05-12 20:04:43'),
(93, 3, 34.96, 1, '2016-05-13 22:05:33'),
(94, 3, 261.88, 1, '2016-06-22 18:32:01'),
(95, 2, 63.96, 0, '2016-06-22 18:57:41'),
(96, 2, 517.76, 0, '2016-06-23 01:01:14'),
(97, 2, 131.91, 0, '2016-06-23 03:59:23'),
(98, 2, 347.79, 0, '2016-06-23 04:17:36'),
(99, 1, 79.95, 0, '2016-06-23 13:45:49');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `price` double NOT NULL,
  `category` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `description` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `sale` tinyint(1) NOT NULL,
  `stock` int(11) NOT NULL,
  `image_main` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `image_other` varchar(100) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `category`, `description`, `sale`, `stock`, `image_main`, `image_other`, `active`, `created_at`) VALUES
(1, 'Body & Hair Wash', 9.99, 'Category1', 'A fine sandalwood-scented product to keep gentlemen squeaky-clean and smelling fantastic. 400ml.', 0, 4, 'bodyandhairwash.jpeg', 'bodyandhairwash2.jpeg', 1, '2016-04-14 14:17:21'),
(3, 'Fire Starter', 15.99, 'Category1', 'Need to get things burning? Gentlemen''s Hardware makes things easier with their glorious firestarter gadget – a safe and simple tool that creates a spark to start your fire when camping or out in the wild.\r\n\r\nWith full instructions', 1, 10, 'firestarter.jpeg', 'firestarter2.jpeg, firestarter3.jpeg', 1, '2016-04-14 14:17:21'),
(4, 'Bamboo Toothbrushes', 7.99, 'Category2', 'Keep it clean on your dirty weekender with this pair of bamboo toothbrushes. Included is one brush with black detail and the words ‘Dark Horse’ and another with white detail and the words ‘Clean Cut’ to avoid confusion...', 0, 30, 'bambootoothbrush.jpeg', 'bambootoothbrush2.jpeg', 1, '2016-04-14 14:17:21'),
(5, 'Brass Hip Flask', 29.99, 'Category1', 'Take a cheeky-yet-stylish swig for Dutch courage. Carry your spirit of choice in this handsome stainless steel hip flask complete with secure lid and the embossed words Down the Hatch, My Friend.\r\n170ml', 1, 20, 'brasshippflask.jpeg', 'brasshippflask2.jpeg', 1, '2016-04-14 14:17:21'),
(6, 'Brick Soap', 9.99, 'Category2', 'Move over soap on a rope! This heavy-duty Brick Soap will keep even the toughest gents squeaky clean!\r\n\r\nMeasures 65 x 40 x 115 mm', 0, 20, 'bricksoap.jpeg', 'bricksoap2.jpeg, bricksoap3.jpeg', 1, '2016-04-14 14:17:21'),
(7, 'City Lights Globe', 99.99, 'Category2', 'Its a big world out there as this 12-inch globe light proves. Plug it in, give it a whirl and marvel at the worlds night time city lights.\r\nComes with a sturdy stainless steel base and is smartly packaged in a presentation box bearing the words A Brave New World.', 0, 20, 'citylightsglobe.jpeg', 'citylightsglobe2.jpeg, citylightsglobe3.jpeg', 1, '2016-04-14 14:17:21'),
(9, 'Lunch Tin Gold', 16.99, 'Category1', 'Whether youre climbing a mountain or day tripping, every man needs to stop for lunch.\r\nStore your manwiches in the Gentlemens Hardware snap-shut aluminium lunch tin.\r\n\r\nComes in a silver finish with the motto The Adventures Begins.', 0, 20, 'lunchtingold.jpeg', 'lunchtingold2.jpeg, lunchtingold3.jpeg', 1, '2016-05-04 03:03:37'),
(10, 'Navy Wallet ', 25.99, 'Category3', 'Fold up your readies and stash your credit cards safely in this slim canvas wallet with plenty of sections and a separate pocket for notes.\r\nExtra style comes courtesy of leather-effect detail and the embossed words Fortune Favours The Brave on the inside.', 0, 20, 'navywallet.jpeg', 'navywallet2.jpeg, navywallet3.jpeg', 1, '2016-05-04 03:06:18'),
(11, 'Notebook', 15.99, 'Category3', 'A smart spiral-bound 300-page Log Book complete with clever canvas pen holder and branded pencil. Includes pocket at the front of book.\r\nMeasures 5.5 x 8.25 x 1', 1, 20, 'notebook.jpeg', 'notebook2.jpeg, notebook3.jpeg', 1, '2016-05-04 03:09:31'),
(12, 'Camping Cutlery', 9.99, 'Category2', 'Part spoon, part fork, part knife, part bottle opener, no feast is too much for this clever gadget. Once you’re done, the parts fold away safely in time for the next meal. Comes boxed, ready to give as a gift.', 0, 20, 'campingcutlery.png', 'campingcutlery2.jpeg', 1, '2016-05-12 18:17:18');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `products_sold`
--

CREATE TABLE `products_sold` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `size_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `products_sold`
--

INSERT INTO `products_sold` (`id`, `order_id`, `product_id`, `quantity`, `price`, `size_id`) VALUES
(29, 21, 1, 1, 9.99, 0),
(30, 21, 4, 1, 7.99, 0),
(31, 22, 1, 1, 9.99, 0),
(32, 22, 4, 1, 7.99, 0),
(33, 25, 4, 11, 7.99, 0),
(34, 28, 3, 4, 15.99, 0),
(35, 29, 3, 4, 15.99, 0),
(36, 30, 3, 4, 15.99, 0),
(37, 31, 3, 4, 15.99, 0),
(38, 32, 3, 4, 15.99, 0),
(39, 33, 3, 4, 15.99, 0),
(40, 37, 7, 1, 99.99, 0),
(41, 39, 1, 10, 9.99, 0),
(42, 40, 5, 11, 29.99, 0),
(43, 40, 6, 8, 9.99, 0),
(44, 41, 3, 4, 15.99, 0),
(45, 42, 1, 3, 9.99, 0),
(46, 43, 3, 4, 15.99, 0),
(47, 44, 3, 4, 15.99, 0),
(48, 45, 3, 4, 15.99, 0),
(49, 46, 3, 4, 15.99, 0),
(50, 47, 3, 4, 15.99, 0),
(51, 50, 1, 3, 9.99, 0),
(52, 51, 1, 4, 9.99, 0),
(53, 53, 1, 4, 9.99, 0),
(54, 54, 1, 4, 9.99, 0),
(55, 55, 1, 4, 9.99, 0),
(56, 56, 1, 4, 9.99, 0),
(57, 57, 1, 4, 9.99, 0),
(58, 58, 1, 4, 9.99, 0),
(59, 59, 1, 4, 9.99, 0),
(60, 60, 1, 4, 9.99, 0),
(61, 61, 1, 4, 9.99, 0),
(62, 62, 1, 4, 9.99, 0),
(63, 63, 1, 4, 9.99, 0),
(64, 64, 1, 4, 9.99, 0),
(65, 65, 1, 4, 9.99, 0),
(66, 66, 1, 4, 9.99, 0),
(67, 67, 1, 4, 9.99, 0),
(68, 68, 1, 4, 9.99, 0),
(69, 69, 1, 4, 9.99, 0),
(70, 70, 1, 4, 9.99, 0),
(71, 71, 1, 4, 9.99, 0),
(72, 72, 1, 4, 9.99, 0),
(73, 73, 3, 4, 15.99, 0),
(74, 74, 1, 3, 9.99, 0),
(75, 75, 1, 3, 9.99, 0),
(76, 78, 1, 3, 9.99, 0),
(77, 79, 3, 7, 15.99, 0),
(78, 80, 1, 4, 9.99, 0),
(79, 80, 7, 8, 99.99, 0),
(80, 80, 6, 7, 9.99, 0),
(81, 80, 3, 6, 15.99, 0),
(82, 81, 1, 2, 9.99, 0),
(83, 81, 3, 4, 15.99, 0),
(84, 81, 4, 4, 7.99, 0),
(85, 82, 1, 2, 9.99, 0),
(86, 83, 1, 3, 9.99, 0),
(87, 83, 3, 6, 15.99, 0),
(88, 84, 5, 6, 29.99, 0),
(89, 85, 1, 2, 9.99, 0),
(90, 85, 4, 4, 7.99, 0),
(91, 85, 11, 9, 15.99, 0),
(92, 86, 5, 6, 29.99, 0),
(93, 86, 10, 5, 25.99, 0),
(94, 87, 1, 4, 9.99, 0),
(95, 88, 3, 4, 15.99, 0),
(96, 89, 6, 6, 9.99, 0),
(97, 89, 9, 16, 16.99, 0),
(98, 89, 11, 8, 15.99, 0),
(99, 90, 6, 18, 9.99, 0),
(100, 90, 7, 12, 99.99, 0),
(101, 90, 1, 2, 9.99, 0),
(102, 91, 1, 4, 9.99, 0),
(103, 91, 11, 7, 15.99, 0),
(104, 92, 1, 4, 9.99, 0),
(105, 93, 1, 3, 9.99, 0),
(106, 94, 10, 7, 25.99, 0),
(107, 94, 11, 5, 15.99, 0),
(108, 95, 3, 4, 15.99, 0),
(109, 96, 3, 7, 15.99, 0),
(110, 96, 5, 7, 29.99, 0),
(111, 96, 10, 6, 25.99, 0),
(112, 96, 12, 4, 9.99, 0),
(113, 97, 9, 6, 16.99, 0),
(114, 97, 12, 3, 9.99, 0),
(115, 98, 1, 4, 9.99, 0),
(116, 98, 10, 6, 25.99, 0),
(117, 98, 9, 6, 16.99, 0),
(118, 98, 12, 5, 9.99, 0),
(119, 99, 3, 5, 15.99, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `size` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `size`
--

INSERT INTO `size` (`id`, `size`) VALUES
(1, 'small'),
(2, 'medium'),
(3, 'large'),
(4, 'x-large');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(70) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(200) NOT NULL,
  `street_and_number` varchar(100) NOT NULL,
  `alt_street_and_number` varchar(100) NOT NULL,
  `zip_and_location` varchar(100) NOT NULL,
  `alt_zip_and_location` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL,
  `alt_country` varchar(50) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `payment` varchar(50) NOT NULL,
  `passwordcode` varchar(255) DEFAULT NULL,
  `passwordcode_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password_hash`, `street_and_number`, `alt_street_and_number`, `zip_and_location`, `alt_zip_and_location`, `country`, `alt_country`, `is_admin`, `payment`, `passwordcode`, `passwordcode_time`) VALUES
(1, 'Michael Dorn', 'michael.dorn2@gmail.com', '$2a$06$QeyyEkO5SQAc9ma.lVCr4OLrXh2ATY88AQ6DjUK2e65TcLv8CPR4q', 'Musterstraße 1', 'Wiengasse 62', '1050 Wien', '1050 Wien', 'Austria', 'Österreich', 0, 'prepayment', '256538798361c5006b3d942321c7bb1b', '2016-06-28 23:03:29'),
(2, 'Max Mustermann', 'max@mustermann.at', '$2a$06$2VJzRxjPR1orTLE8WRVSfuthkbeSfd.S5P8m8zFIOk5rkxX1fTIpy', 'Musterstraße 1', 'Musterstraße 2', '1050 Wien', '', 'Austria', '', 0, '', '4caefe28759424241615ff868bb9318d', '2016-06-28 17:55:46'),
(4, 'Victoria Reischl', 'victoria.reischl@t-online.de', '$2y$10$2D6UvifUOz6ve5.ycZxKROt2oNbnJ8cMnRbVl/VfWliYwvQxVGExK', 'Gaisbergstraße 22', '', '83416 Surheim', '', 'Germany', '', 0, '', NULL, NULL),
(5, 'Elke Dorn', '2dorn@gmx.de', '$2y$10$avsplfHTiX4U8Kz7b4py9uOktGBT3T4hAGricJLb.1UmLtisCGMRm', 'Schulstraße 5a', '', '83454 Anger', '', 'Germany', '', 0, '', NULL, NULL),
(6, 'Peter Haudum', 'peter.haudum@gmail.com', '$2y$10$Rhn.m6mvlOkf/2vUgnS.mOO2wKsBJZ53J3kTrX2BajOCC2xHfJYw.', 'Siebenbrunnengasse 62', '', '1050 Wien', '', 'Austria', '', 0, '', NULL, NULL),
(7, 'Asldkfjlkj', 'alskdf@aslkdfj.de', '$2y$10$auhFlvAeXVEHxZ0lNZIT.u2VT/vV8g1HVY7g.7waxOPu1vHWMaiWa', 'Laskdjf 12', '', '1050 Wien', '', 'Austria', '', 0, '', NULL, NULL),
(8, 'Dagmar Kruas', 'test@test.at', '$2y$10$si9bb9bQOObwu/drGoBUzOU4h9z8qS9gjulTUSB14z9yxOz/m7V7S', 'Jslkdfj 12', '', '089 München', '', 'Germany', '', 0, '', NULL, NULL),
(9, 'Ruder Alis', 'zeug@michaeldorn.at', '$2y$10$JAqzs/vcSrJS0HbNGHWUEeLLkSK29oGkFXYlZQJ2sRnkr72nlGbva', '', '', '', '', '', '', 0, '', NULL, NULL),
(10, 'Hodor', 'hodor@hodor.at', '$2y$10$F//1BKZV3uTjKfw4eATQPOt8Tg5qqAQcVGcGI0LLCmWpQYHSuo8sC', 'Hodorstreet 1', '', '1050 Wien', '', 'Austria', '', 0, '', NULL, NULL);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`user_id`) USING BTREE;

--
-- Indizes für die Tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `products_sold`
--
ALTER TABLE `products_sold`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT für Tabelle `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT für Tabelle `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT für Tabelle `products_sold`
--
ALTER TABLE `products_sold`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT für Tabelle `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
