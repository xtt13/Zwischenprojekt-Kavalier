-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 05. Mai 2016 um 14:38
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
  `date_ordered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `image_other` varchar(40) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `category`, `description`, `sale`, `stock`, `image_main`, `image_other`, `active`, `created_at`) VALUES
(1, 'Body & Hair Wash', 9.99, '', 'A fine sandalwood-scented product to keep gentlemen squeaky-clean and smelling fantastic. 400ml.', 0, 20, 'bodyandhairwash.jpeg', 'bodyandhairwash2.jpeg', 1, '2016-04-14 14:17:21'),
(3, 'Fire Starter', 15.99, '', 'Need to get things burning? Gentlemen''s Hardware makes things easier with their glorious firestarter gadget – a safe and simple tool that creates a spark to start your fire when camping or out in the wild.\r\n\r\nWith full instructions', 0, 10, 'firestarter.jpeg', 'firestarter2.jpeg', 1, '2016-04-14 14:17:21'),
(4, 'Bamboo Toothbrushes', 7.99, '', 'Keep it clean on your dirty weekender with this pair of bamboo toothbrushes. Included is one brush with black detail and the words ‘Dark Horse’ and another with white detail and the words ‘Clean Cut’ to avoid confusion...', 0, 30, 'bambootoothbrush.jpeg', 'bambootoothbrush2.jpeg', 1, '2016-04-14 14:17:21'),
(5, 'Brass Hip Flask', 29.99, '', 'Take a cheeky-yet-stylish swig for Dutch courage. Carry your spirit of choice in this handsome stainless steel hip flask complete with secure lid and the embossed words Down the Hatch, My Friend.\r\n170ml', 0, 0, 'brasshippflask.jpeg', 'brasshippflask2.jpeg', 1, '2016-04-14 14:17:21'),
(6, 'Brick Soap', 9.99, '', 'Move over soap on a rope! This heavy-duty Brick Soap will keep even the toughest gents squeaky clean!\r\n\r\nMeasures 65 x 40 x 115 mm', 0, 0, 'bricksoap.jpeg', 'bricksoap2.jpeg', 1, '2016-04-14 14:17:21'),
(7, 'City Lights Globe', 99.99, '', 'Its a big world out there as this 12-inch globe light proves. Plug it in, give it a whirl and marvel at the worlds night time city lights.\r\nComes with a sturdy stainless steel base and is smartly packaged in a presentation box bearing the words A Brave New World.', 0, 0, 'citylightsglobe.jpeg', 'citylightsglobe2.jpeg', 1, '2016-04-14 14:17:21'),
(9, 'Lunch Tin Gold', 16.99, '', 'Whether youre climbing a mountain or day tripping, every man needs to stop for lunch.\r\nStore your manwiches in the Gentlemens Hardware snap-shut aluminium lunch tin.\r\n\r\nComes in a silver finish with the motto The Adventures Begins.', 0, 0, 'lunchtingold.jpeg', 'lunchtingold2.jpeg', 1, '2016-05-04 03:03:37'),
(10, 'Navy Wallet ', 25.99, '', 'Fold up your readies and stash your credit cards safely in this slim canvas wallet with plenty of sections and a separate pocket for notes.\r\nExtra style comes courtesy of leather-effect detail and the embossed words Fortune Favours The Brave on the inside.', 0, 0, 'navywallet.jpeg', 'navywallet2.jpeg', 1, '2016-05-04 03:06:18'),
(11, 'Notebook', 15.99, '', 'A smart spiral-bound 300-page Log Book complete with clever canvas pen holder and branded pencil. Includes pocket at the front of book.\r\nMeasures 5.5 x 8.25 x 1', 0, 0, 'notebook.jpeg', 'notebook2.jpeg', 1, '2016-05-04 03:09:31');

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
  `payment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indizes der exportierten Tabellen
--

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
-- AUTO_INCREMENT für Tabelle `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT für Tabelle `products_sold`
--
ALTER TABLE `products_sold`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
