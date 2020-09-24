-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 04 Eyl 2020, 12:16:30
-- Sunucu sürümü: 5.6.17
-- PHP Sürümü: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `staj_takip`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_ad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `admin_soyad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `admin_kadi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `admin_sifre` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `admin_yetki` tinyint(4) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=6 ;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_ad`, `admin_soyad`, `admin_kadi`, `admin_sifre`, `admin_yetki`) VALUES
(3, '1', '1', '1', '1', 1),
(4, '2', '2', '2', '2', 0),
(5, 'a', 'a', 'a', 'a', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `degerlendirme`
--

CREATE TABLE IF NOT EXISTS `degerlendirme` (
  `deg_id` int(11) NOT NULL AUTO_INCREMENT,
  `ogr_id` int(11) NOT NULL,
  `devam_gun` int(11) NOT NULL,
  `sirket_not` int(11) NOT NULL,
  `yapilan_gun` int(11) NOT NULL,
  `kabul_gun` int(11) NOT NULL,
  `okul_not` int(11) NOT NULL,
  PRIMARY KEY (`deg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `form2`
--

CREATE TABLE IF NOT EXISTS `form2` (
  `form2_id` int(11) NOT NULL AUTO_INCREMENT,
  `ogrenci_id` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  `staj_yili` year(4) NOT NULL,
  `isyeri_ad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `isyeri_web_adres` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `isyeri_adres` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `isyeri_tel` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `isyeri_email` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `staj_1_2` int(11) NOT NULL,
  `cumartesi_dahil` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `isyeri_yetkili_ad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `isyeri_yetkili_soyad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `staj_bas_tar` date NOT NULL,
  `staj_bit_tar` date NOT NULL,
  `staj_sure` int(11) NOT NULL,
  `staj_konu` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `durum` tinyint(4) NOT NULL,
  PRIMARY KEY (`form2_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=13 ;

--
-- Tablo döküm verisi `form2`
--

INSERT INTO `form2` (`form2_id`, `ogrenci_id`, `staj_yili`, `isyeri_ad`, `isyeri_web_adres`, `isyeri_adres`, `isyeri_tel`, `isyeri_email`, `staj_1_2`, `cumartesi_dahil`, `isyeri_yetkili_ad`, `isyeri_yetkili_soyad`, `staj_bas_tar`, `staj_bit_tar`, `staj_sure`, `staj_konu`, `durum`) VALUES
(5, '1', 2001, 'ab', 'a@ab', 'abc', '12', 'a@ab', 1, 'a', 'a', 'a', '2020-07-27', '2020-09-04', 2, 'a', 1),
(12, '18', 2020, '1', 'Kavak Mahallesi , Park Civarı Sokak , No:4', 'Kavak Mahallesi , Park Civarı Sokak , No:4', '05060582273', 'gzfbzfdcgn@zdzdf', 2, 'ghxtyyt', 'Yasemin', 'TÜRK', '0202-02-20', '0005-05-05', 1, 'dghdhgj', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesaj`
--

CREATE TABLE IF NOT EXISTS `mesaj` (
  `mesaj_id` int(11) NOT NULL AUTO_INCREMENT,
  `ogrenci_id` int(11) NOT NULL,
  `gonderen_id` int(11) NOT NULL,
  `icerik` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `saat` time NOT NULL,
  `tarih` date NOT NULL,
  PRIMARY KEY (`mesaj_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrenci`
--

CREATE TABLE IF NOT EXISTS `ogrenci` (
  `ogrenci_id` int(11) NOT NULL AUTO_INCREMENT,
  `ogrenci_tc_no` int(11) NOT NULL,
  `ogrenci_ad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `ogrenci_soyad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `ogrenci_kadi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `ogrenci_sifre` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `toplam_gun` int(11) NOT NULL,
  `ogrenci_baba_ad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ogrenci_anne_ad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ogrenci_dogum_yeri` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `ogrenci_dogum_tarihi` date NOT NULL,
  `ogrenci_adres` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `ogrenci_tel` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `ogrenci_email` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `ogrenci_no` int(11) NOT NULL,
  `ogrenci_sinif` int(11) NOT NULL,
  `ogrenci_no_io` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`ogrenci_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=21 ;

--
-- Tablo döküm verisi `ogrenci`
--

INSERT INTO `ogrenci` (`ogrenci_id`, `ogrenci_tc_no`, `ogrenci_ad`, `ogrenci_soyad`, `ogrenci_kadi`, `ogrenci_sifre`, `toplam_gun`, `ogrenci_baba_ad`, `ogrenci_anne_ad`, `ogrenci_dogum_yeri`, `ogrenci_dogum_tarihi`, `ogrenci_adres`, `ogrenci_tel`, `ogrenci_email`, `ogrenci_no`, `ogrenci_sinif`, `ogrenci_no_io`) VALUES
(1, 1, 'Yasemin', 'Türk', 'ysmn', '12345', 60, 'qazwsxszvbc', 'edcrfv', 'tgbyhns', '0000-00-00', 'ujmıkö', '1', 'sfg@sdg', 2, 1, 'nö'),
(18, 7, '7', '7', '7', '7', 60, '7', '7', '7', '0000-00-00', '7', '7', '7@7', 7, 7, '7'),
(20, 5, '5', '5', '5', '5', 60, '5', '5', '5', '0000-00-00', '5', '5', '5@5', 5, 5, '5');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
