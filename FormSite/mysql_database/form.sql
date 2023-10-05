-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 05 Eki 2023, 14:05:30
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `form`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'a', 'a'),
(2, 'admin', '123');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comment`
--

CREATE TABLE `comment` (
  `id` int(1) NOT NULL,
  `user_id` int(1) NOT NULL,
  `comment` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `topics_id` int(1) NOT NULL,
  `receiver_id` varchar(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_read` varchar(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `comment`, `topics_id`, `receiver_id`, `date`, `is_read`) VALUES
(208, 24, 'Tabii ki de Fenerbahçe', 70, '23', '2023-10-02 18:47:15', '1'),
(209, 20, 'Galatasarayyy', 70, '23', '2023-10-02 18:47:15', '1'),
(239, 21, 'Koskoca evrende yanlız olamayız.', 180, '20', '2023-10-04 18:32:23', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `friendship`
--

CREATE TABLE `friendship` (
  `id` int(1) NOT NULL,
  `sender_id` varchar(250) NOT NULL,
  `receiver_id` varchar(250) NOT NULL,
  `status` int(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `friendship`
--

INSERT INTO `friendship` (`id`, `sender_id`, `receiver_id`, `status`, `date`) VALUES
(116, '21', '22', 1, '2023-09-29 13:16:05'),
(117, '20', '22', 2, '2023-09-30 20:03:15'),
(119, '22', '23', 1, '2023-10-02 14:39:59'),
(120, '22', '24', 2, '2023-10-02 14:43:57'),
(121, '21', '23', 2, '2023-10-02 14:51:41'),
(127, '23', '24', 1, '2023-10-02 15:22:52');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `messages`
--

CREATE TABLE `messages` (
  `id` int(1) NOT NULL,
  `sender_id` int(1) NOT NULL,
  `receiver_id` int(1) NOT NULL,
  `sender_message` varchar(250) NOT NULL,
  `message_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `message_id` varchar(250) DEFAULT NULL,
  `is_read` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `sender_message`, `message_time`, `message_id`, `is_read`) VALUES
(1324, 24, 23, 'Merhaba Hande.Nasılsın?', '2023-10-02 15:18:30', NULL, 1),
(1325, 23, 24, 'İyiyim canım.Sen nasılsın?', '2023-10-02 15:29:50', NULL, 1),
(1326, 24, 23, 'İyilik ne olsun', '2023-10-02 15:30:11', NULL, 1),
(1327, 24, 23, 'Yarın toplanıyor muyuz?', '2023-10-02 15:30:25', NULL, 1),
(1328, 23, 24, 'Olur.Nerede buluşalım?', '2023-10-02 15:30:42', NULL, 1),
(1329, 24, 23, 'Parkın önünde yeni kafe açılmış.Yarın haberleşelim...', '2023-10-02 15:31:51', NULL, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `notification`
--

CREATE TABLE `notification` (
  `id` int(1) NOT NULL,
  `new_message` varchar(250) NOT NULL,
  `new_comment` varchar(250) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `comment_id` int(1) NOT NULL,
  `topic_id` int(1) NOT NULL,
  `user_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `user_id` int(1) NOT NULL,
  `title` varchar(200) NOT NULL,
  `subtitle` varchar(200) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `topics`
--

INSERT INTO `topics` (`id`, `user_id`, `title`, `subtitle`, `date`) VALUES
(175, 26, 'AAa', 'AAs', '2023-10-03 22:22:01'),
(176, 26, 'bbb', 'bbb', '2023-10-03 22:22:05'),
(177, 26, 'ccc', 'ccc', '2023-10-03 22:22:08'),
(178, 26, 'ddd', 'ddd', '2023-10-03 22:22:11'),
(179, 20, 'sssssssss', 'sssss', '2023-10-03 22:34:16'),
(180, 20, 'Uzayda bizden başka canlılar sizce var mı?', '\r\n', '2023-10-03 22:34:19');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `Register_date` datetime DEFAULT current_timestamp(),
  `img` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `Register_date`, `img`) VALUES
(20, 'MERT YAMANOĞLU', 'MERT', '2023-09-15 20:53:39', '8051b5e0f13a4846a4a137af9bc0a023.jpg'),
(21, 'NURULLAH YAŞIN', 'NURULLAH', '2023-09-15 22:02:46', 'images.jpeg'),
(22, 'SENEM ÖZTÜRK', 'SENEM', '2023-09-15 22:31:17', '22-scaled.jpg'),
(23, 'HANDE CANDAN', 'HANDE', '2023-10-02 16:10:56', 'hande.jpeg'),
(24, 'ECE KORKMAZ', 'KORKMAZ', '2023-10-02 16:15:18', 'indir.jpeg'),
(26, 'A', 'A', '2023-10-02 19:53:23', ''),
(27, 'SERHAT', 'ŞAHIN', '2023-10-05 14:38:40', '');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `friendship`
--
ALTER TABLE `friendship`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- Tablo için AUTO_INCREMENT değeri `friendship`
--
ALTER TABLE `friendship`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- Tablo için AUTO_INCREMENT değeri `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1330;

--
-- Tablo için AUTO_INCREMENT değeri `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
