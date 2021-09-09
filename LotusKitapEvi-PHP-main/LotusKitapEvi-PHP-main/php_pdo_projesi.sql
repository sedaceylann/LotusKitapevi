-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 28 May 2020, 19:52:43
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `php_pdo_projesi`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE `kategoriler` (
  `id` int(11) NOT NULL,
  `kategoriadi` varchar(128) NOT NULL,
  `aciklama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`id`, `kategoriadi`, `aciklama`) VALUES
(4, 'Polisiye', ''),
(7, 'Psikoloji', ''),
(8, 'Biyografi ve Anı', ''),
(9, 'Şiir Kitapları', ''),
(10, 'Türk Edebiyatı', ''),
(11, 'Tarih', ''),
(12, 'Dergi', ''),
(13, 'Korku-Gerilim', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `id` int(11) NOT NULL,
  `adsoyad` varchar(30) NOT NULL,
  `kadi` varchar(20) NOT NULL,
  `sifre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `adsoyad`, `kadi`, `sifre`) VALUES
(1, 'Berfin Cinar', 'berfinCinar', '0658.Hadise'),
(4, 'Recep KURT', 'RCP.KURT', '123'),
(5, 'Seda ceylan', 'Sece', 'sece2911');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `id` int(11) NOT NULL,
  `urunadi` varchar(128) NOT NULL,
  `aciklama` text NOT NULL,
  `fiyat` double NOT NULL,
  `giris_tarihi` datetime NOT NULL,
  `dzltm_tarihi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `resim` varchar(128) DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`id`, `urunadi`, `aciklama`, `fiyat`, `giris_tarihi`, `dzltm_tarihi`, `resim`, `kategori_id`) VALUES
(0, 'Halide Edib - Biyografisine Sığmayan Kadın', 'Yazar: İpek Çalışlar\r\nYayınevi :Everest Yayınları ', 25, '2020-05-27 12:54:11', '2020-05-27 20:01:25', 'halide.jpg', 8),
(31, 'Kan ve Gül', 'Yazar: Alper Canıgüz\r\n\r\nYayınevi :April Yayıncılık', 18, '2020-05-27 12:32:38', '2020-05-27 20:02:58', 'kanvegul.jpg', 4),
(32, 'Kırlangıç Çığlığı', 'Yazar: Ahmet Ümit\r\n\r\nYayınevi :Yapı Kredi Yayınları', 27, '2020-05-27 12:33:43', '2020-05-27 20:02:58', 'kırlangıccıglıgı.jpg', 4),
(33, 'Beyoğlu\'nun En Güzel Abisi', 'Yazar: Ahmet Ümit\r\n\r\nYayınevi :Yapı Kredi Yayınları', 28, '2020-05-27 12:34:28', '2020-05-27 20:02:58', 'beyoglununenguzelabisi.jpg', 4),
(34, 'Doğu Ekspresi\'nde Cinayet', 'Yazar: Agatha Christie\r\n\r\nÇevirmen: Gönül Suveren\r\n\r\nYayınevi :Altın Kitaplar ', 24, '2020-05-27 12:35:22', '2020-05-27 20:02:58', 'cinayet.jpg', 4),
(35, 'Fırtınada Yanacaksın', 'Yazar: John Verdon\r\n\r\nÇevirmen: Ender Nail\r\n\r\nYayınevi :Koridor Yayıncılık', 29, '2020-05-27 12:36:00', '2020-05-27 20:02:58', 'firtina.jpg', 4),
(36, 'Cinayet Alfabesi', 'Yazar: Agatha Christie\r\n\r\nÇevirmen: Çiğdem Öztekin\r\n\r\nYayınevi :Altın Kitaplar', 20, '2020-05-27 12:37:17', '2020-05-27 20:02:58', 'cinayetalfabesi.jpg', 4),
(37, 'Ölüler Diyarı', 'Yazar: Jean-Christophe Grange\r\n\r\nÇevirmen: Tankut Gökçe\r\n\r\nYayınevi :Doğan Kitap', 40, '2020-05-27 12:37:50', '2020-05-27 20:02:58', 'olulerdiyarı.jpg', 4),
(38, 'Bir Bedenin Gerçeği', 'Yazar: Alexandria Marzano Lesnevich\r\n\r\nYayınevi :İthaki Yayınları', 15, '2020-05-27 12:38:25', '2020-05-27 20:02:58', 'birbedeningercegi.jpg', 4),
(39, 'Abum Rabum', 'Yazar: İskender Pala\r\n\r\nYayınevi :Kapı Yayınları', 30, '2020-05-27 12:38:59', '2020-05-27 20:02:58', 'abumrabum.jpg', 4),
(40, 'Kızıl Nehirler', 'Yazar: Jean-Christophe Grange\r\n\r\nYayınevi :Doğan Kitap', 37, '2020-05-27 12:39:50', '2020-05-27 20:02:58', 'kizilnehirler.jpg', 4),
(41, 'Beni Sensiz de Sevebilir misin?', 'Yazar: Kemal Sayar\r\nYayınevi :Kapı Yayınları', 23, '2020-05-27 12:42:13', '2020-05-27 13:31:46', 'beisessiz.jpg', 7),
(42, 'İyi Toplum Yoktur', 'Yazar: Nihan Kaya\r\nYayınevi :İthaki Yayınları', 18, '2020-05-27 12:42:48', '2020-05-27 13:31:46', 'iyitoplumyoktur.jpg', 7),
(43, 'Günlük Yaşamın Psikopatolojisi', 'Yazar: Freud\r\nÇevirmen: Elif Yıldırım\r\nYayınevi :Oda Yayınları', 20, '2020-05-27 12:43:19', '2020-05-27 13:31:46', 'gunlukyasam.jpg', 7),
(44, 'Herkes Kendi Hayatının Kahramanı', 'Yazar: Gülcan Özer\r\nYayınevi :Doğan Kitap', 27, '2020-05-27 12:43:56', '2020-05-27 13:31:46', 'herkeskendi.jpg', 7),
(45, 'Bırak ve Rahatla-Kendi Kendine Terapi', 'Yazar: Adem Güneş\r\nYayınevi :Timaş Yayınları', 25, '2020-05-27 12:45:12', '2020-05-27 13:31:46', 'birakverahatla.jpg', 7),
(46, 'İyi Hissetmek', 'Yazar: David Burns\r\nÇevirmen: Gönül Acar, İrem Erdem Atak, Özlem Mestçioğlu, Esra Tuncer\r\nYayınevi :Psikonet', 40, '2020-05-27 12:45:56', '2020-05-27 13:31:46', 'iyihisetmek.jpg', 7),
(47, 'Senin Suçun Değil', 'Yazar: Beyhan Budak\r\nYayınevi :İnkılap Kitabevi', 20, '2020-05-27 12:47:02', '2020-05-27 13:32:30', 'seninsucun.jpg', 7),
(49, 'Düştüğünde Kalkarsan Hayat Güzeldir', 'Yazar: Esra Ezmeci\r\nYayınevi :Destek Yayınları', 20, '2020-05-27 12:48:13', '2020-05-27 13:31:46', 'dustugunde.jpg', 7),
(50, 'Ruhun Derin Yaraları', 'Yazar: Kemal Sayar\r\nYayınevi :Kapı Yayınları', 25, '2020-05-27 12:48:43', '2020-05-27 13:31:46', 'ruhun.jpg', 7),
(51, 'Ruh', 'Yazar: Carl Gustav Jung\r\nYayınevi :Pinhan Yayıncılık', 25, '2020-05-27 12:49:22', '2020-05-27 13:31:46', 'ruh.jpg', 7),
(52, 'Steve Jobs', 'Yazar: Walter Isaacson \r\nÇevirmen: Dost Körpe \r\nYayınevi :Domingo Yayınevi', 45, '2020-05-27 12:52:18', '2020-05-27 13:30:06', 'steave.jpg', 8),
(53, 'Geleceği İnşa Eden Adam', 'Yazar: Elon Musk\r\nÇevirmen: Öykü Toros Irvana\r\nYayınevi :Zeplin Kitap', 20, '2020-05-27 12:52:48', '2020-05-27 13:30:06', 'elon.jpg', 8),
(54, 'Tesla', 'Yazar: Nikola Tesla\r\nÇevirmen: Mehmet Ata Arslan\r\nYayınevi :Alfa Yayıncılık', 15, '2020-05-27 12:53:28', '2020-05-27 13:30:06', 'tesla.jpg', 8),
(56, 'Einstein - Yaşamı ve Evreni', 'Yazar: Walter Isaacson\r\nÇevirmen: Tufan Göbekçin\r\nYayınevi :DeliDolu', 60, '2020-05-27 12:54:49', '2020-05-27 13:30:06', 'einstein.jpg', 8),
(57, 'Yavuz Sultan Selim', 'Yazar: Feridun M. Emecen\r\nYayınevi :Kapı Yayınları - Edebiyat Dizisi', 40, '2020-05-27 12:55:30', '2020-05-27 13:11:32', 'yavuz.jpg', 8),
(58, 'Macellan - Bir İnsan Bir Yaşam', 'Yazar: Stefan Zweig\r\nÇevirmen: Zehra Aksu Yılmazer\r\nYayınevi :Can Yayınları - Biyografi Dizisi', 20, '2020-05-27 12:56:44', '2020-05-27 13:12:22', 'macellan.jpg', 8),
(59, 'Nuri Demirağ - Türkiye\'nin Havacılık Efsanesi', 'Yazar: Fatih M. Dervişoğlu\r\nYayınevi :Ötüken Neşriyat - Biyografi-Otobiyografi', 20, '2020-05-27 12:57:24', '2020-05-27 13:12:33', 'nuri.jpg', 8),
(60, 'Ahmed Arif-Terk Etmedi Sevdan Beni', 'Yazar: Birol Öztürk\r\nYayınevi :Dokuz Yayınları', 15, '2020-05-27 12:57:58', '2020-05-27 13:16:09', 'ahmed.jpg', 8),
(61, 'Nietzsche-Yaralı Ruhların Şifacısı', 'Yazar: Stefan Zweig\r\nYayınevi :Zeplin Kitap', 15, '2020-05-27 12:58:29', '2020-05-27 13:16:19', 'nietzsche.jpg', 8),
(62, 'Nutuk', 'Yazar: Mustafa Kemal Atatürk\r\nYayınevi :Agapi', 25, '2020-05-27 13:02:48', '2020-05-27 13:25:01', 'nutuk.jpg', 11),
(63, 'Osmanlı Tarihinde Efsaneler ve Gerçekler', 'Yazar: Halil İnalcık\r\nYayınevi :Kronik Kitap', 25, '2020-05-27 13:05:29', '2020-05-27 13:25:14', 'osmanli.jpg', 11),
(64, 'Türklerin Altın Çağı', 'Yazar: İlber Ortaylı\r\nYayınevi :Kronik Kitap - Tarih Dizisi', 25, '2020-05-27 13:06:02', '2020-05-27 13:25:23', 'turkler.jpg', 11),
(65, 'Modernleşen Türkiye\'nin Tarihi', 'Yazar: Erik Jan Zürcher\r\nYayınevi :İletişim Yayıncılık - Tarih Dizisi', 50, '2020-05-27 13:06:30', '2020-05-27 13:25:33', 'modernlesenturkiye.jpg', 11),
(66, 'Hayvanlardan Tanrılara - Sapiens', 'Yazar: Yuval Noah Harari\r\nÇevirmen: Ertuğrul Genç\r\nYayınevi :Kolektif Kitap', 35, '2020-05-27 13:06:59', '2020-05-27 13:25:42', 'sapiens.jpg', 11),
(67, 'Devlet-i Aliyye - Osmanlı İmparatorluğu Üzerine Araştırmalar 1', 'Yazar: Halil İnalcık\r\nYayınevi :İş Bankası Kültür Yayınları - Tarih Dizisi', 25, '2020-05-27 13:08:30', '2020-05-27 13:25:51', 'devletialliye.jpg', 11),
(68, 'Eski Mısır', 'Yazar: Toby Wilkinson\r\nÇevirmen: Ümit Hüsrev Yolsal\r\nYayınevi :Say Yayınları', 50, '2020-05-27 13:09:02', '2020-05-27 13:26:00', 'eskimisir.jpg', 11),
(69, 'Roma İmparatorları 1.Cilt', 'Yazar: Historia Augusta\r\nÇevirmen: Samet Özgüler\r\nYayınevi :Kronik Kitap', 20, '2020-05-27 13:09:32', '2020-05-27 13:26:09', 'roma.jpg', 11),
(70, 'Bir Devlet Operasyonu: 19 Mayıs', 'Yazar: Murat Bardakçı\r\nYayınevi :Turkuvaz Kitap', 35, '2020-05-27 13:09:57', '2020-05-27 13:26:18', 'birdevlet.jpg', 11),
(71, 'Hesaplaşma', 'Yazar: Atakan Büyükdağ\r\nYayınevi :Destek Yayınları', 20, '2020-05-27 13:10:42', '2020-05-27 13:26:37', 'hesaplasma.jpg', 11),
(72, 'Saatleri Ayarlama Enstitüsü', 'Yazar: Ahmet Hamdi Tanpınar\r\nYayınevi :Dergah Yayınları', 20, '2020-05-27 13:12:43', '2020-05-27 13:26:27', 'Saatler.jpg', 10),
(73, 'Zehra', 'Yazar: Nabizade Nazım\r\nYayınevi :Mavi Çatı Yayınları', 10, '2020-05-27 13:14:25', '2020-05-27 13:26:55', 'zehra.jpg', 10),
(74, 'Değirmen-Türk Edebiyat Klasikleri 34', 'Yazar: Sabahattin Ali\r\nYayınevi :İş Bankası Kültür Yayınları', 7, '2020-05-27 13:14:58', '2020-05-27 13:26:45', 'degirmen.jpg', 10),
(76, 'Ateşten Gömlek', 'Yazar: Halide Edib Adıvar\r\nYayınevi :Can Yayınları - Türk Edebiyatı Dizisi', 20, '2020-05-27 13:28:51', '2020-05-27 13:27:06', 'atestengomlek.jpg', 10),
(77, 'Dokuzuncu Hariciye Koğuşu', 'Yazar: Peyami Safa\r\nYayınevi :Ötüken Neşriyat - Edebiyat Dizisi', 8, '2020-05-27 13:29:25', '2020-05-27 13:27:19', 'dokuzuncuharciye.jpg', 10),
(78, 'Vatan Yahut Silistre-Türk Edebiyatı Klasikleri 6', 'Yazar: Namık Kemal\r\nYayınevi :İş Bankası Kültür Yayınları', 6, '2020-05-27 13:29:53', '2020-05-27 13:27:38', 'vatanyahut.jpg', 10),
(79, 'Mai ve Siyah', 'Yazar: Namık Kemal\r\nYayınevi :İş Bankası Kültür Yayınları', 12, '2020-05-27 13:30:20', '2020-05-27 13:27:48', 'mai.jpg', 10),
(80, 'İntibah', 'Yazar: Namık Kemal\r\nYayınevi :İş Bankası Kültür Yayınları', 8, '2020-05-27 13:30:47', '2020-05-27 13:27:58', 'intibah.jpg', 10),
(81, 'Aşk-ı Memnu', 'Yazar: Halid Ziya Uşaklıgil\r\nYayınevi :Özgür Yayınları', 25, '2020-05-27 13:31:28', '2020-05-27 13:27:29', 'askimemnu.jpg', 10),
(82, 'Deli', '\r\nYazar: Refik Halid Karay\r\nYayınevi :İnkılap Kitabevi ', 18, '2020-05-27 13:31:56', '2020-05-27 13:11:11', 'deli.jpg', 10),
(83, 'Lavinia- Aşk Şiirleri', 'Yazar: Özdemir Asaf\r\nYayınevi :Yapı Kredi Yayınları', 10, '2020-05-27 13:39:22', '2020-05-27 13:05:37', 'lavinia.jpg', 9),
(84, 'Ben Sana Mecburum', 'Yazar: Attila İlhan\r\nYayınevi :İş Bankası Kültür Yayınları ', 12, '2020-05-27 13:39:52', '2020-05-27 13:05:49', 'bensanamecburum.jpg', 9),
(85, 'Gelmiş Bulundum - Seçme Şiirler', 'Yazar: Edip Cansever\r\nYayınevi :Yapı Kredi Yayınları', 8.25, '2020-05-27 13:40:25', '2020-05-27 13:07:23', 'gelmisbulundum.jpg', 9),
(86, 'Sevgi Duvarı', 'Yazar: Can Yücel\r\nYayınevi :İş Bankası Kültür Yayınları -', 10, '2020-05-27 13:45:01', '2020-05-27 13:07:33', 'sevgiduvari.jpg', 9),
(87, 'Aşka Dair Nesirler', 'Yazar: Ümit Yaşar Oğuzcan\r\nYayınevi :Everest Yayınları ', 23, '2020-05-27 13:45:38', '2020-05-28 17:06:34', '0000000278463-1.jpg', 9),
(88, 'Duvar', 'Yazar: Attila İlhan\r\nYayınevi :İş Bankası Kültür Yayınları', 15, '2020-05-27 13:46:33', '2020-05-28 17:05:20', '0000000134013-1.jpg', 9),
(89, 'Göğe Bakma Durağı', 'Yazar: Turgut Uyar\r\nYayınevi :Yapı Kredi Yayınları', 7, '2020-05-27 13:47:03', '2020-05-28 17:06:05', 'goge-bakma-duragi-3774842-29-O.jpg', 9),
(90, 'Hasretinden Prangalar Eskittim', 'Yazar: Ahmed Arif\r\nYayınevi :Metis Yayıncılık -', 20, '2020-05-27 13:47:39', '2020-05-27 13:08:09', 'hasretinden.jpg', 9),
(91, 'Henüz Vakit Varken Gülüm', 'Yazar: Nazım Hikmet\r\nYayınevi :Yapı Kredi Yayınları', 6, '2020-05-27 13:48:11', '2020-05-27 13:08:19', 'henuzvakitvarken.jpg', 9),
(92, 'Dokuza Kadar On', 'Yazar: Özdemir Asaf\r\nYayınevi :Yapı Kredi Yayınları', 10, '2020-05-27 13:48:35', '2020-05-27 13:09:13', 'dokuzakadaron.jpg', 9),
(96, 'Kafa Dergisi - Nisan 2020', 'Yayınevi :Kafa Grup Reklam', 10, '2020-05-27 21:44:35', '2020-05-27 19:44:35', '5ecec3237514f-kafa.jpg', 12),
(97, 'KafkaOkur Dergisi - Mayıs 2020', 'Yayınevi :Kafka Okur Yayın', 10, '2020-05-27 21:45:16', '2020-05-27 19:45:16', '5ecec34ce7ff0-kafka.jpg', 12),
(98, 'Ot Dergisi - Nisan 2020', 'Yayınevi :Medu Yayıncılık', 10, '2020-05-27 21:45:55', '2020-05-27 19:45:55', '5ecec373466c2-ot.jpg', 12),
(99, 'Bilim ve Teknik - Nisan 2020', 'Yayınevi :Tübitak Yayınları', 7, '2020-05-27 21:46:29', '2020-05-27 19:46:29', '5ecec395b4d6c-bilim.jpg', 12),
(100, 'Maxi Bulmaca Sudoku - Mayıs/Haziran/Temmuz 2020', 'Yayınevi :Maxı Yayıncılık', 9, '2020-05-27 21:47:13', '2020-05-27 19:47:13', '5ecec3c10e0e7-sudoku.jpg', 12),
(101, 'Hadise- Instyle Türkiye - Kasım 2014', 'Yayınevi :Group Medya', 17, '2020-05-27 21:48:00', '2020-05-28 17:14:57', 'hadise-instyle-roportaji-2426-10032015192348.jpg', 12),
(102, 'Masa - Mayıs 2020', 'Yayınevi :Gamze İyem', 12, '2020-05-27 21:48:41', '2020-05-27 19:48:41', '5ecec419681a8-masa.jpg', 12),
(103, 'Kafka Okur Özel - 2020', 'Yayınevi :Kafka Okur Yayın', 16, '2020-05-27 21:49:20', '2020-05-27 19:49:20', '5ecec440b650f-kafka1.jpg', 12),
(104, 'Uykusuz - Mayıs 2020', 'Yayınevi :Mürekkep Basım Yayın', 5, '2020-05-27 21:50:00', '2020-05-27 19:51:28', '5ecec46894cca-uykusuz.jpg', 12),
(105, 'SCARLETT JOHANSSON in GQ Magazine, France March 2017', 'Yayınevi :GQ Magazine', 15, '2020-05-27 21:50:36', '2020-05-28 17:13:54', 'scarlett-johansson-in-gq-magazine-france-march-2017_1.jpg', 12),
(106, 'Psikeart - Mayıs/Haziran 2020', 'Yayınevi :ART PSIKIYATRI', 25, '2020-05-27 21:51:16', '2020-05-27 19:51:16', '5ecec4b42d067-psikeart.jpg', 12),
(107, 'Carol Gömülmeden', 'Yazar: Josh Malerman\r\nYayınevi :İthaki Yayınları', 10, '2020-05-27 21:55:27', '2020-05-27 19:55:27', '5ecec5afea0b9-carol.jpg', 13),
(108, 'Siliniş', 'Yazar: Tess Gerritsen\r\nÇevirmen: Selim Yeniçeri\r\nYayınevi :Martı Yayınları', 20, '2020-05-27 21:55:48', '2020-05-27 19:55:48', '5ecec5c4cb621-silinis.jpg', 13),
(109, 'Sadist', 'Yazar: Stephen King\r\nÇevirmen: Gönül Suveren\r\nYayınevi :Altın Kitaplar ', 25, '2020-05-27 21:56:32', '2020-05-27 19:56:32', '5ecec5f09b54e-sadist.jpg', 13),
(110, 'Yeşil Yol', 'Yazar: Stephen King\r\nÇevirmen: Gülden Şen\r\nYayınevi :Altın Kitaplar', 27, '2020-05-27 21:56:54', '2020-05-27 19:56:54', '5ecec6064ce71-yesilyol.jpg', 13),
(111, 'Teftiş', 'Yazar: Josh Malerman\r\nYayınevi :İthaki Yayınları', 27, '2020-05-27 21:57:19', '2020-05-27 19:57:19', '5ecec61fca271-teftis.jpg', 13),
(112, '5.Kurban', 'Yazar: Jane Casey\r\nÇevirmen: Selin Yurdakul\r\nYayınevi :Olimpos Yayınları', 23, '2020-05-27 21:57:53', '2020-05-27 19:57:53', '5ecec64130c72-5.kurban.jpg', 13),
(113, 'Gölge ve Kan', 'Yazar: Kerri Maniscalco\r\nYayınevi :Ephesus Yayınları', 21, '2020-05-27 21:58:30', '2020-05-27 19:58:30', '5ecec666c66ac-golgevekan.jpg', 13),
(114, 'Körler Ülkesi ve Diğer Karanlık Öyküler-Karanlık Kitaplık', 'Yazar: Herbert George Wells\r\nÇevirmen: Doğa Özışık\r\nYayınevi :İthaki Yayınları', 18, '2020-05-27 21:58:57', '2020-05-27 19:58:57', '5ecec6818f2ff-korlerulkesi.jpg', 13),
(115, 'Uyanmadan Önce Ölürsem-Katilini Nasıl Bulursun?', 'Yazar: Emily Koch\r\nÇevirmen: Begüm Kovulmaz\r\nYayınevi :Beyaz Baykuş', 21, '2020-05-27 21:59:23', '2020-05-27 19:59:23', '5ecec69bbb30e-uyanmadanonce.jpg', 13),
(116, 'Halüsinasyon', 'Yazar: Alein Kentigerna\r\n\r\nYayınevi :Panama Yayıncılık', 18, '2020-05-27 22:00:19', '2020-05-27 20:00:53', '5ecec6d38226b-halusinasyon.jpg', 13);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `urunler`
--
ALTER TABLE `urunler`
  ADD CONSTRAINT `fk_kategori_id` FOREIGN KEY (`kategori_id`) REFERENCES `kategoriler` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
