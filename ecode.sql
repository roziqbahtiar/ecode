-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07 Jun 2016 pada 16.15
-- Versi Server: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecode`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth`
--

CREATE TABLE IF NOT EXISTS `auth` (
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `level` int(2) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `auth`
--

INSERT INTO `auth` (`username`, `password`, `level`) VALUES
('aris', '$2y$10$qIy5YaWUoJJlnCV1DFyxcefnmqv4De03UZDA.oafHuSNZClmPXTsC', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `child_menu`
--

CREATE TABLE IF NOT EXISTS `child_menu` (
  `id_child` int(2) NOT NULL AUTO_INCREMENT,
  `id_parent` int(2) NOT NULL,
  `name` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `icon` varchar(20) NOT NULL,
  `order` int(2) NOT NULL,
  PRIMARY KEY (`id_child`),
  KEY `id_parent` (`id_parent`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `child_menu`
--

INSERT INTO `child_menu` (`id_child`, `id_parent`, `name`, `url`, `icon`, `order`) VALUES
(1, 2, 'Semua Materi', 'dashboard/materi', 'file-text', 1),
(2, 2, 'Buat Baru', 'dashboard/materi/baru', 'plus', 2),
(3, 3, 'Semua Latihan', 'dashboard/latihan', 'edit', 1),
(4, 3, 'Buat Baru', 'dashboard/latihan/baru', 'plus', 2),
(5, 4, 'Semua Kategori', 'dashboard/kategori', 'tags', 1),
(6, 4, 'Buat Baru', 'dashboard/kategori/baru', 'plus', 2),
(7, 6, 'Ubah Profil', 'dashboard/profil/edit-profil', 'user', 1),
(8, 6, 'Ubah Password', 'dashboard/profil/edit-password', 'key', 2),
(9, 6, 'Log Out', 'logout', 'sign-out', 3),
(10, 7, 'PHP', 'dashboard/pelajaran/php', 'tag', 0),
(11, 7, 'HTML', 'dashboard/pelajaran/html', 'tag', 0),
(12, 7, 'CSS', 'dashboard/pelajaran/css', 'tag', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban`
--

CREATE TABLE IF NOT EXISTS `jawaban` (
  `id_jawaban` int(5) NOT NULL AUTO_INCREMENT,
  `id_soal` int(5) NOT NULL,
  `id_materi` int(2) NOT NULL,
  `jawaban` text NOT NULL,
  PRIMARY KEY (`id_jawaban`),
  KEY `id_soal` (`id_soal`),
  KEY `id_materi` (`id_materi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(2) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(20) NOT NULL,
  `url_kategori` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kategori`),
  KEY `url_kategori` (`url_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `url_kategori`) VALUES
(1, 'HTML', 'html'),
(2, 'CSS', 'css'),
(3, 'PHP', 'php');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE IF NOT EXISTS `materi` (
  `id_materi` int(3) NOT NULL AUTO_INCREMENT,
  `author_materi` varchar(50) NOT NULL,
  `title_materi` varchar(250) NOT NULL,
  `content_materi` text NOT NULL,
  `datetime_materi` datetime NOT NULL,
  `id_kategori` int(3) NOT NULL,
  `status_materi` varchar(10) NOT NULL,
  `url_materi` varchar(250) NOT NULL,
  PRIMARY KEY (`id_materi`),
  UNIQUE KEY `url_materi` (`url_materi`),
  KEY `id_kategori` (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Struktur dari tabel `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(2) NOT NULL AUTO_INCREMENT,
  `level` varchar(50) NOT NULL,
  `have_child` int(1) NOT NULL,
  `name` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `icon` varchar(20) NOT NULL,
  `order` int(2) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `level`, `have_child`, `name`, `url`, `icon`, `order`) VALUES
(1, '1,2,3,4', 0, 'Beranda', 'dashboard', 'home', 1),
(2, '1,2,3', 1, 'Materi', '#', 'file-text', 2),
(3, '1,2,3', 1, 'Latihan', '#', 'home', 3),
(4, '1,2,3', 1, 'Kategori', '#', 'tags', 4),
(5, '1,2', 0, 'User', 'dashboard/member', 'users', 5),
(6, '1,2,3,4', 1, 'Pengaturan', '#', 'gears', 7),
(7, '1,2,3,4', 1, 'Pelajaran', '#', 'book', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
  `id_score` int(4) NOT NULL AUTO_INCREMENT,
  `id_materi` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `score` varchar(4) NOT NULL,
  PRIMARY KEY (`id_score`),
  KEY `id_materi` (`id_materi`,`username`),
  KEY `id_materi_2` (`id_materi`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Struktur dari tabel `soal`
--

CREATE TABLE IF NOT EXISTS `soal` (
  `id_soal` int(5) NOT NULL AUTO_INCREMENT,
  `id_materi` int(5) NOT NULL,
  `soal` text NOT NULL,
  `id_jawaban` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_soal`),
  KEY `id_materi` (`id_materi`),
  KEY `id_jawaban` (`id_jawaban`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `nick` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `pict` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `regdate` date NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `fname`, `lname`, `nick`, `email`, `phone`, `pict`, `dob`, `regdate`) VALUES
('aris', 'Natsume', 'Kiyoshi', 'Kaito', 'ariskyun@gmail.com', '089647793930', 'aris.png', '1995-09-05', '2016-05-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_lv`
--

CREATE TABLE IF NOT EXISTS `user_lv` (
  `level` int(2) NOT NULL,
  `lv_nama` varchar(50) NOT NULL,
  PRIMARY KEY (`level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_lv`
--

INSERT INTO `user_lv` (`level`, `lv_nama`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Pemateri'),
(4, 'Member');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
