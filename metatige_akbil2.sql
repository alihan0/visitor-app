-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 15 Kas 2022, 11:52:54
-- Sunucu sürümü: 10.6.9-MariaDB
-- PHP Sürümü: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `metatige_akbil2`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `status`, `created_at`) VALUES
(1, 'admin', '700c8b805a3e2a265b01c77614cd8b2163982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', 1, '2022-10-28 08:18:26'),
(3, 'test', '700c8b805a3e2a265b01c77614cd8b2163982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', 1, '2022-11-15 08:34:25');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cargos`
--

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `user` int(11) NOT NULL,
  `cargo_no` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `cargos`
--

INSERT INTO `cargos` (`id`, `company`, `sender`, `user`, `cargo_no`, `status`, `created_at`) VALUES
(1, 1, 'test', 3, 'sad', 0, '2022-11-14 05:49:14'),
(2, 1, 'test', 3, 'sad', 1, '2022-11-15 09:19:25');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cargo_company`
--

CREATE TABLE `cargo_company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `cargo_company`
--

INSERT INTO `cargo_company` (`id`, `company_name`, `status`) VALUES
(1, 'MNG Kargo', 1),
(2, 'Aras Kargo', 1),
(3, 'Sürat Kargo', 1),
(4, 'Yurtiçi Kargo', 1),
(5, 'PTT Kargo', 1),
(6, 'UPS Kargo', 1),
(7, 'Trendyol Express', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personels`
--

CREATE TABLE `personels` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_url` varchar(255) NOT NULL,
  `staff_number` varchar(255) NOT NULL,
  `sms` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`id`, `site_url`, `staff_number`, `sms`) VALUES
(1, 'https://akbil2.metatige.com/', '905464971229', 86);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `support`
--

INSERT INTO `support` (`id`, `icon`, `title`, `value`, `status`) VALUES
(1, 'fa-solid fa-phone', 'Telefon', '0546 497 1229', 1),
(2, 'fa-solid fa-envelope', 'E-posta', 'info@metatige.com', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `user_level` int(11) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `fname`, `lname`, `phone`, `status`, `user_level`, `token`, `created_at`) VALUES
(3, 'insterTest', ' 1234', NULL, 'Alihan', 'soyad', '', 1, NULL, NULL, NULL),
(4, 'insterTest', ' 1234', NULL, 'Ali', 'soyad', '', 1, NULL, NULL, NULL),
(6, 'insterTest', ' 1234', NULL, 'Veli', 'soyad', '', 1, NULL, NULL, NULL),
(7, 'insterTest', ' 1234', NULL, 'Ahmet', 'soyad', '', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `phone_masked` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `person` int(11) NOT NULL,
  `reason` mediumtext NOT NULL,
  `imza` text NOT NULL,
  `resim` text NOT NULL,
  `token` text NOT NULL,
  `enter_time` int(11) DEFAULT NULL,
  `exit_time` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `visitors`
--

INSERT INTO `visitors` (`id`, `full_name`, `email`, `phone`, `phone_masked`, `company`, `person`, `reason`, `imza`, `resim`, `token`, `enter_time`, `exit_time`, `status`, `created_at`) VALUES
(59, 'Alihan Öztürk', 'alihan@metatige.com', '(546) 497-1229', '905464971229', 'Metatige Dijital', 4, 'test', '<?xml version=\"1.0\"?>\n<!DOCTYPE svg PUBLIC \"-//W3C//DTD SVG 1.1//EN\" \"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd\">\n<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"15cm\" height=\"5cm\">\n	<g style=\"fill: #fff;\">\n		<rect x=\"0\" y=\"0\" width=\"50px\" height=\"50px\"/>\n		<g style=\"fill: none; stroke: #000; stroke-width: 2;\">\n			<polyline points=\"120.69,80.5 120.69,79.5 121.69,78.5 121.69,73.5 119.69,70.5 118.69,70.5 117.69,70.5 111.69,73.5 106.69,79.5 101.69,89.5 100.69,104.5 104.69,126.5 111.69,146.5 120.69,159.5 128.69,164.5 141.69,165.5 155.69,161.5 168.69,155.5 179.69,148.5 192.69,135.5 197.69,128.5 197.69,126.5 198.69,124.5 199.69,122.5 199.69,118.5 199.69,112.5 196.69,109.5 191.69,109.5\"/>\n		</g>\n	</g>\n</svg>\n', '1668162205.jpg', '70eeb38a53b9fe72353c886b979d2e8a', 1668531143, 1668531128, 2, '2022-11-11 05:23:33'),
(60, 'Alihan Öztürk', 'alihan@metatige.com', '(546) 497-1229', '905464971229', 'Metatige Dijital', 4, 'test', '<?xml version=\"1.0\"?>\n<!DOCTYPE svg PUBLIC \"-//W3C//DTD SVG 1.1//EN\" \"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd\">\n<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"15cm\" height=\"5cm\">\n	<g style=\"fill: #fff;\">\n		<rect x=\"0\" y=\"0\" width=\"50px\" height=\"50px\"/>\n		<g style=\"fill: none; stroke: #000; stroke-width: 2;\">\n			<polyline points=\"134.69,46.03 123.69,37.03 115.69,37.03 111.69,39.03 109.69,46.03 108.69,55.03 108.69,68.03 111.69,77.03 116.69,83.03 121.69,87.03 128.69,89.03 134.69,89.03 136.69,88.03 138.69,84.03 138.69,77.03 138.69,66.03 135.69,55.03 130.69,45.03 125.69,41.03 120.69,38.03 113.69,38.03 100.69,40.03 79.69,45.03 45.69,52.03\"/>\n		</g>\n	</g>\n</svg>\n', 'pic_20221114052958.jpg', '70eeb38a53b9fe72353c886b979d2e8a', NULL, NULL, 2, '2022-11-14 05:30:10'),
(61, 'Alihan Öztürk', 'alihan@metatige.com', '(546) 497-1229', '905464971229', 'Metatige Dijital', 3, 'tew', '<?xml version=\"1.0\"?>\n<!DOCTYPE svg PUBLIC \"-//W3C//DTD SVG 1.1//EN\" \"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd\">\n<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"15cm\" height=\"5cm\">\n	<g style=\"fill: #fff;\">\n		<rect x=\"0\" y=\"0\" width=\"50px\" height=\"50px\"/>\n		<g style=\"fill: none; stroke: #000; stroke-width: 2;\">\n			<polyline points=\"119.69,60.03 120.69,59.03 121.69,58.03 123.69,58.03 125.69,62.03 125.69,70.03 127.69,83.03 130.69,96.03 137.69,109.03 146.69,119.03 157.69,124.03 172.69,122.03 182.69,113.03 195.69,98.03 209.69,82.03 216.69,76.03\"/>\n		</g>\n	</g>\n</svg>\n', 'pic_20221115114334.jpg', '70eeb38a53b9fe72353c886b979d2e8a', NULL, NULL, 1, '2022-11-15 11:43:50');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `cargo_company`
--
ALTER TABLE `cargo_company`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `personels`
--
ALTER TABLE `personels`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `cargo_company`
--
ALTER TABLE `cargo_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `personels`
--
ALTER TABLE `personels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
