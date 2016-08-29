-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 03 Apr 2014 pada 08.48
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `dibook`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `diary`
--

CREATE TABLE IF NOT EXISTS `diary` (
  `Id_Diary` int(11) NOT NULL AUTO_INCREMENT,
  `Id_User` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `Diary` text NOT NULL,
  `Emoticon` varchar(10) NOT NULL,
  PRIMARY KEY (`Id_Diary`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data untuk tabel `diary`
--

INSERT INTO `diary` (`Id_Diary`, `Id_User`, `Title`, `Date`, `Diary`, `Emoticon`) VALUES
(10, 17, 'Selasa Kelabu', '2014-04-01', 'Eh ternyata besok hari selasa , dan pemantapan , katanya sih biar mantap gitu kan ya mau UN , yatapi , yaudahlahya sip\r\nEh ternyata besok hari selasa , dan pemantapan , katanya sih biar mantap gitu kan ya mau UN , yatapi , yaudahlahya sip\r\nEh ternyata besok hari selasa , dan pemantapan , katanya sih biar mantap gitu kan ya mau UN , yatapi , yaudahlahya sip', 'sad'),
(9, 17, 'Senin Kelabu', '2014-04-01', 'Besok upacara dan itu gak enak sekian....', 'sad'),
(11, 17, 'Rabu Bahagia', '2014-04-01', 'Wah hari rabu ntar ada apa ya................', 'smile'),
(12, 17, 'Kamis Inggris', '2014-04-01', 'Hari kamis harus pake bahasa inggris!', 'confused'),
(13, 17, 'Dimarahin', '2014-04-01', 'Dimarahin khairul', 'sad'),
(14, 17, 'Kamis Bahagia', '2014-04-03', 'Bahagia banget........', 'grinning');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Id_User` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(100) NOT NULL,
  `Realname` varchar(100) NOT NULL,
  `Date_Of_Birth` date NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Profil_Picture` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_User`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`Id_User`, `Username`, `Realname`, `Date_Of_Birth`, `Email`, `Password`, `City`, `Profil_Picture`) VALUES
(1, 'Admin', 'Admin', '1996-07-12', 'admin@dibook.com', '5c0f508407455f8a2139845cfbf7a4f6', 'Bandung', 'admin.jpg'),
(17, 'firmannizammudin', 'Firman Nizammudin', '1996-07-12', 'firmannizammudin@gmail.com', 'd4ec93590cc1ccb5cf6618aff141e12c', 'Bandung', '17.jpeg'),
(18, 'werafahmi', 'Fahmi Aujar Shidiq', '0000-00-00', 'werafahmi@gmail.com', 'e91442bb87d2ecab6c21c5b56c146b0e', 'Bandung', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
