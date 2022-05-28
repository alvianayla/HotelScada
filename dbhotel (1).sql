-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Bulan Mei 2022 pada 05.22
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbhotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas_hotel`
--

CREATE TABLE `fasilitas_hotel` (
  `id_fasilitas_hotel` int(10) NOT NULL,
  `nama_fasilitas` varchar(50) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fasilitas_hotel`
--

INSERT INTO `fasilitas_hotel` (`id_fasilitas_hotel`, `nama_fasilitas`, `deskripsi`, `foto`) VALUES
(10, 'Ruang Meeting', 'Tersedia papan tulis dan spidol,Akses listrik harus memadai,Koneksi Wi-Fi yang memadai,Mesin fotocopy, ', 'ruang meeting.jpg'),
(14, 'Kolam', 'Tersedia untuk orang dewasa dan anak anak', 'kolam.png'),
(15, 'Sauna', 'Tersedia di lantai bawah', 'sauna.jpg'),
(16, 'Ruang Gym', 'Tersedia berbagai macam alat olahraga', 'gym.jpg'),
(18, 'Spa', 'Tersedia di lantai bawah', 'spa.jpg'),
(19, 'Parkir', 'ada di lantai 1', 'parkir.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` char(32) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `level` enum('admin','resepsionis') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`) VALUES
(1236, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'alvia', 'admin'),
(1234567, 'resepsionis', '827ccb0eea8a706c4c34a16891f84e7b', 'alvia', 'resepsionis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int(10) NOT NULL,
  `tipe_kamar` varchar(200) NOT NULL,
  `nik` varchar(25) NOT NULL,
  `nama_pemesan` varchar(30) NOT NULL,
  `email_pemesan` varchar(50) NOT NULL,
  `nama_tamu` varchar(50) NOT NULL,
  `no_telp` int(15) NOT NULL,
  `cek-in` date NOT NULL,
  `cek-out` date NOT NULL,
  `jumlah_kamar` int(10) NOT NULL,
  `harga_kamar` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `tipe_kamar`, `nik`, `nama_pemesan`, `email_pemesan`, `nama_tamu`, `no_telp`, `cek-in`, `cek-out`, `jumlah_kamar`, `harga_kamar`, `total`, `status`) VALUES
(38, 'Superior Room', '3208127011040005', 'vi', 'scda@gmail', 'alvia', 88888, '2022-05-22', '2022-05-23', 1, 5000000, 5000000, 'selesai'),
(39, 'Standar Room', '3208127011040005', 'alvia', 'alvianayla72@gmail.com', 'alvia', 88888, '2022-05-23', '2022-05-24', 1, 3000000, 3000000, ''),
(40, 'Presidential Suite', '3208127011040005', 'alvia', 'alvianayla72@gmail.com', 'alvia', 88888, '2022-05-23', '2022-05-24', 1, 2000000, 2000000, ''),
(41, 'Superior Room', '3208127011040005', 'alvia', 'alvianayla72@gmail.com', 'alvia', 88888, '2022-05-23', '2022-05-24', 1, 5000000, 5000000, '');

--
-- Trigger `reservasi`
--
DELIMITER $$
CREATE TRIGGER `triger_hotel` AFTER UPDATE ON `reservasi` FOR EACH ROW BEGIN
if new.status='cek-in' THEN UPDATE tbl_kamar set jumlahkamar=jumlahkamar-old.jumlah_kamar
WHERE no_kamar = old.id_reservasi;
END IF;
if new.status='cek-out' THEN UPDATE tbl_kamar set jumlahkamar=jumlahkamar-old.jumlah_kamar
WHERE no_kamar = old.id_reservasi;
END IF;
if new.status='selesai' THEN UPDATE tbl_kamar set jumlahkamar=jumlahkamar-old.jumlah_kamar
WHERE no_kamar = old.id_reservasi;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tamu`
--

CREATE TABLE `tamu` (
  `nik` int(32) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tamu`
--

INSERT INTO `tamu` (`nik`, `nama`, `email`, `password`, `alamat`, `no_tlp`) VALUES
(3209999, 'alvia', 'alvia@gmail.com', '', 'kuningan', 896),
(819218387, 'nayla', 'nayla@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'kuningan', 89767);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kamar`
--

CREATE TABLE `tbl_kamar` (
  `no_kamar` char(11) NOT NULL,
  `tipe_kamar` varchar(50) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `harga_kamar` int(100) NOT NULL,
  `jumlahkamar` int(10) NOT NULL,
  `fasilitas_kamar` varchar(50) NOT NULL,
  `status_kamar` enum('tersedia','dipesan','ditempat') NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kamar`
--

INSERT INTO `tbl_kamar` (`no_kamar`, `tipe_kamar`, `deskripsi`, `harga_kamar`, `jumlahkamar`, `fasilitas_kamar`, `status_kamar`, `foto`) VALUES
('101', 'Standar Room', 'terdapat satu single bed saja dengan fasilitas standar, seperti televisi, AC, telepon, toiletteries, kopi, dan teh. ', 3000000, 1, 'Wifi , air mineral, tv', 'tersedia', 'hotel_35.jpg'),
('102', 'Superior Room', 'Kamar dengan tempat tidur ukuran Twin yang besar, kamar mandi mewah dengan pilihan rain shower  atau handshower akan membuat pengalaman menginap Anda bersama Hotel Scada akan lebih terasa berkesan.', 5000000, 5, 'Wifi,air mineral, ac, televisi', 'tersedia', 'twin.jpg'),
('103', 'Deluxe Room	', 'Bermalam dalam kemewahan di kamar yang luas dengan tempat tidur ber ukuran King Size, kamar mandi dengan wastafel ganda serta fasilitas tambahan di dalam kamar yang akan membuat pengalaman menginap Anda akan sangat menyenangkan.	', 3000000, 2, 'Wifi,air mineral, ac, televisi, lemari', 'tersedia', 'kamar.jpg'),
('104', 'standar room', 'terdapat satu single bad', 150000, 2, 'wifi,televisi, lemari', 'tersedia', 'kamar_1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `fasilitas_hotel`
--
ALTER TABLE `fasilitas_hotel`
  ADD PRIMARY KEY (`id_fasilitas_hotel`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD KEY `id_kamar` (`tipe_kamar`);

--
-- Indeks untuk tabel `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `tbl_kamar`
--
ALTER TABLE `tbl_kamar`
  ADD PRIMARY KEY (`no_kamar`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `fasilitas_hotel`
--
ALTER TABLE `fasilitas_hotel`
  MODIFY `id_fasilitas_hotel` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1234568;

--
-- AUTO_INCREMENT untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
