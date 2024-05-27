-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 27 May 2024, 12:48:12
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `alver`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `giris`
--

CREATE TABLE `giris` (
  `id` int(11) NOT NULL,
  `kadi` varchar(50) DEFAULT NULL,
  `sifre` varchar(16) DEFAULT NULL,
  `ad` varchar(50) NOT NULL,
  `soyad` varchar(50) NOT NULL,
  `kayTarihi` date NOT NULL,
  `mail` varchar(50) NOT NULL,
  `sonErTar` date NOT NULL,
  `adminmi` tinyint(1) NOT NULL DEFAULT 1,
  `silindimi` tinyint(1) NOT NULL DEFAULT 0,
  `aktifmi` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `giris`
--

INSERT INTO `giris` (`id`, `kadi`, `sifre`, `ad`, `soyad`, `kayTarihi`, `mail`, `sonErTar`, `adminmi`, `silindimi`, `aktifmi`) VALUES
(1, 'Admin', '1', 'Muhammet', 'Özpınar', '2023-03-16', 'ozpinar.muhammetali3@gmail.com', '2024-05-27', 1, 0, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `urunId` int(11) NOT NULL,
  `urunAdi` varchar(100) NOT NULL,
  `urunTuru` varchar(30) NOT NULL,
  `urunMark` varchar(25) NOT NULL,
  `urunFiyati` int(11) NOT NULL,
  `urunAdeti` int(11) NOT NULL,
  `urunAcikla` text NOT NULL,
  `resim_adi` varchar(300) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `resim_turu` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `resim_size` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `resim_tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`urunId`, `urunAdi`, `urunTuru`, `urunMark`, `urunFiyati`, `urunAdeti`, `urunAcikla`, `resim_adi`, `resim_turu`, `resim_size`, `resim_tarih`) VALUES
(2, 'limon çiçeği', 'Çiçek', 'Fuly Çiçek', 160, 12, 'Limonun ilk açan çiçeği. Kokulu', 'dosya/87973.jpg', 'image/jpeg', '14711', '2024-05-26 14:21:38'),
(4, 'Bilgisayar Klavyesi', 'Klavye', 'A4 Tech', 450, 2, '102 tuşlu klavye', 'dosya/97389.jpg', 'image/jpeg', '14711', '2024-05-26 14:21:38'),
(5, 'Lcd Monitör', 'Monitör', 'BenQ', 3000, 7, 'Lcd monitör. siyah Renk', 'dosya/61732.jpg', 'image/jpeg', '14711', '2024-05-26 14:21:38'),
(6, 'Bilgisayar Kasası', 'Desktop Kasa', 'Power Bosts', 1250, 15, 'Renkli Fanlı', 'dosya/88285.jpg', 'image/jpeg', '14711', '2024-05-26 14:21:38'),
(7, 'Masa üstü mikrofon', 'Mikrofon', 'Snoppy', 659, 17, 'Turuncu Siyah renkli profösyönel mikrofon', 'dosya/59389.jpg', 'image/jpeg', '14711', '2024-05-26 14:21:38'),
(11, 'telefon', 'telefon', 'iphone', 1000, 7, 'çok sağlam bir telefon', 'dosya/78620.jpg', 'image/jpeg', '14711', '2024-05-26 14:21:38'),
(14, 'afasdfsf', 'sdfsf', 'asdfasd', 156, 45, 'asa', 'dosya/8896.jpg', 'image/jpeg', '14711', '2024-05-26 14:42:38'),
(15, 'as', 'a', 'a', 78, 78, 'a', 'dosya/6116.jpg', 'image/jpeg', '14711', '2024-05-26 14:42:59'),
(16, '', '', '', 0, 0, '', 'dosya/67207.jpg', 'image/jpeg', '14711', '2024-05-26 14:44:26');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `giris`
--
ALTER TABLE `giris`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`urunId`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `giris`
--
ALTER TABLE `giris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `urunId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
