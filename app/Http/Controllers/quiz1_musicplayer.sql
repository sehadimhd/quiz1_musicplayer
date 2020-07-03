-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jul 2020 pada 17.29
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz1_musicplayer`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_album`
--

CREATE TABLE `tb_album` (
  `album_id` smallint(4) NOT NULL,
  `artist_id` smallint(5) NOT NULL,
  `album_name` char(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_album`
--

INSERT INTO `tb_album` (`album_id`, `artist_id`, `album_name`) VALUES
(9, 12, 'PuraLupa'),
(11, 13, 'Menunggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_artist`
--

CREATE TABLE `tb_artist` (
  `artist_id` smallint(5) NOT NULL,
  `artist_name` char(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_artist`
--

INSERT INTO `tb_artist` (`artist_id`, `artist_name`) VALUES
(12, 'Petrus Mahendra'),
(13, 'Peterpan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_played`
--

CREATE TABLE `tb_played` (
  `played_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `track_id` smallint(3) NOT NULL,
  `played_count` int(10) DEFAULT NULL,
  `first_played` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_played` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_track`
--

CREATE TABLE `tb_track` (
  `track_id` smallint(3) NOT NULL,
  `album_id` smallint(4) NOT NULL,
  `track_name` char(128) NOT NULL,
  `time` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_track`
--

INSERT INTO `tb_track` (`track_id`, `album_id`, `track_name`, `time`) VALUES
(17, 11, 'Mungkin Nanti', NULL),
(18, 9, 'Pura-Pura Lupa', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `user_username` char(128) NOT NULL,
  `user_password` char(128) NOT NULL,
  `user_nickname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_username`, `user_password`, `user_nickname`) VALUES
(1, 'adminhadi', 'adminhadi', 'Admin Hadi'),
(2, 'senoadjie', '123', 'HADIMHDs'),
(4, 'nisachairun', 'nisa123456', 'Chairunnisa Dwi Melani');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_album`
--
ALTER TABLE `tb_album`
  ADD PRIMARY KEY (`album_id`),
  ADD KEY `artist_id` (`artist_id`);

--
-- Indeks untuk tabel `tb_artist`
--
ALTER TABLE `tb_artist`
  ADD PRIMARY KEY (`artist_id`);

--
-- Indeks untuk tabel `tb_played`
--
ALTER TABLE `tb_played`
  ADD PRIMARY KEY (`played_id`),
  ADD KEY `track_id` (`track_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `tb_track`
--
ALTER TABLE `tb_track`
  ADD PRIMARY KEY (`track_id`),
  ADD KEY `album_id` (`album_id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_username` (`user_username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_album`
--
ALTER TABLE `tb_album`
  MODIFY `album_id` smallint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_artist`
--
ALTER TABLE `tb_artist`
  MODIFY `artist_id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_played`
--
ALTER TABLE `tb_played`
  MODIFY `played_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_track`
--
ALTER TABLE `tb_track`
  MODIFY `track_id` smallint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_album`
--
ALTER TABLE `tb_album`
  ADD CONSTRAINT `tb_album_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `tb_artist` (`artist_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_played`
--
ALTER TABLE `tb_played`
  ADD CONSTRAINT `tb_played_ibfk_2` FOREIGN KEY (`track_id`) REFERENCES `tb_track` (`track_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_played_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_track`
--
ALTER TABLE `tb_track`
  ADD CONSTRAINT `tb_track_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `tb_album` (`album_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
