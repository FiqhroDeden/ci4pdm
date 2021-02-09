-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Feb 2021 pada 03.59
-- Versi server: 10.4.16-MariaDB
-- Versi PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'site administrator'),
(2, 'mahasiswa', 'user mahasiswa'),
(3, 'operator', 'site operator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(3, 1),
(3, 5),
(3, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 1),
(2, 14),
(2, 15),
(3, 2),
(3, 16),
(3, 17),
(3, 18);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'dedhensupatmo@gmail.com', 1, '2020-12-06 22:46:38', 1),
(2, '::1', 'dedhensupatmo@gmail.com', 1, '2020-12-06 22:49:27', 1),
(3, '::1', 'dedhensupatmo@gmail.com', 1, '2020-12-06 22:50:12', 1),
(4, '::1', 'gersonsinay@gmail.com', 2, '2020-12-06 23:01:54', 1),
(5, '::1', 'dedhensupatmo@gmail.com', 1, '2020-12-06 23:22:00', 1),
(6, '::1', 'gerson sinay', NULL, '2020-12-06 23:22:11', 0),
(7, '::1', 'gersonsinay@gmail.com', 2, '2020-12-06 23:22:17', 1),
(8, '::1', 'dedhensupatmo@gmail.com', 1, '2020-12-06 23:31:59', 1),
(9, '::1', 'gerson sinay', NULL, '2020-12-06 23:34:10', 0),
(10, '::1', 'gersonsinay@gmail.com', 2, '2020-12-06 23:34:16', 1),
(11, '::1', 'dedhensupatmo@gmail.com', 1, '2020-12-06 23:43:12', 1),
(12, '::1', 'dedhensupatmo@gmail.com', 1, '2020-12-07 19:32:05', 1),
(13, '::1', 'gersonsinay@gmail.com', 2, '2020-12-07 19:36:56', 1),
(14, '::1', 'dedhensupatmo@gmail.com', 1, '2020-12-07 19:45:16', 1),
(15, '::1', 'gersonsinay@gmail.com', 2, '2020-12-07 19:51:08', 1),
(16, '::1', 'dedhensupatmo@gmail.com', 1, '2020-12-07 19:54:49', 1),
(17, '::1', 'gerson sinay', NULL, '2020-12-07 19:56:48', 0),
(18, '::1', 'gersonsinay@gmail.com', 2, '2020-12-07 19:56:55', 1),
(19, '::1', 'dedhensupatmo@gmail.com', 1, '2020-12-07 20:59:17', 1),
(20, '::1', 'dedhensupatmo@gmail.com', 1, '2020-12-09 19:51:55', 1),
(21, '::1', 'dedhensupatmo@gmail.com', 1, '2020-12-10 00:30:17', 1),
(22, '::1', 'martin', NULL, '2020-12-10 00:35:35', 0),
(23, '::1', 'dedhensupatmo@gmail.com', 1, '2020-12-10 00:38:49', 1),
(24, '::1', 'gersonsinay@gmail.com', 2, '2020-12-10 00:43:29', 1),
(25, '::1', 'martin', NULL, '2020-12-10 00:43:43', 0),
(26, '::1', 'martin', NULL, '2020-12-10 00:44:28', 0),
(27, '::1', 'martin', NULL, '2020-12-10 00:44:57', 0),
(28, '::1', 'dedhensupatmo@gmail.com', 1, '2020-12-10 00:45:23', 1),
(29, '::1', 'dedhensupatmo@gmail.com', 1, '2020-12-10 00:46:53', 1),
(30, '::1', 'dedhensupatmo@gmail.com', 1, '2020-12-10 00:47:04', 1),
(31, '::1', 'martin', NULL, '2020-12-10 00:47:12', 0),
(32, '::1', 'martin', NULL, '2020-12-10 00:48:53', 0),
(33, '::1', 'martin', NULL, '2020-12-10 00:49:16', 0),
(34, '::1', 'martin', NULL, '2020-12-10 00:49:56', 0),
(35, '::1', 'dedhensupatmo@gmail.com', 1, '2020-12-10 00:50:02', 1),
(36, '::1', 'dedhensupatmo@gmail.com', 1, '2020-12-10 00:50:09', 1),
(37, '::1', 'dedhensupatmo@gmail.com', 1, '2020-12-10 00:58:59', 1),
(38, '::1', 'dedhensupatmo@gmail.com', 1, '2020-12-10 01:00:31', 1),
(39, '::1', 'martin@gmail.com', 4, '2020-12-10 01:07:57', 1),
(40, '::1', 'gerson sinay', NULL, '2020-12-10 01:24:14', 0),
(41, '::1', 'gersonsinay@gmail.com', 2, '2020-12-10 01:24:21', 1),
(42, '::1', 'dedhensupatmo@gmail.com', 1, '2020-12-10 01:31:30', 1),
(43, '::1', 'martin@gmail.com', 4, '2020-12-10 01:31:41', 1),
(44, '::1', 'dedhensupatmo@gmail.com', 1, '2020-12-10 01:37:56', 1),
(45, '::1', 'martin@gmail.com', 4, '2020-12-10 01:39:25', 1),
(46, '::1', 'martin@gmail.com', 4, '2020-12-10 19:25:47', 1),
(47, '::1', 'gersonsinay@gmail.com', 2, '2020-12-10 23:48:07', 1),
(48, '::1', 'dedhensupatmo@gmail.com', 1, '2020-12-10 23:49:52', 1),
(49, '::1', 'martin@gmail.com', 4, '2020-12-10 23:50:28', 1),
(50, '::1', 'dedhensupatmo@gmail.com', 1, '2020-12-10 23:51:46', 1),
(51, '::1', 'martin@gmail.com', 4, '2020-12-10 23:52:37', 1),
(52, '::1', 'dedhensupatmo@gmail.com', 1, '2020-12-10 23:53:37', 1),
(53, '::1', 'martin@gmail.com', 4, '2020-12-10 23:55:02', 1),
(54, '::1', 'gersonsinay@gmail.com', 2, '2020-12-10 23:56:19', 1),
(55, '::1', 'martin@gmail.com', 4, '2020-12-11 00:02:34', 1),
(56, '::1', 'gersonsinay@gmail.com', 2, '2020-12-11 00:54:29', 1),
(57, '::1', 'martin@gmail.com', 4, '2020-12-11 01:11:06', 1),
(58, '::1', 'gersonsinay@gmail.com', 2, '2020-12-11 01:58:48', 1),
(59, '::1', 'martin@gmail.com', 4, '2020-12-11 02:05:20', 1),
(60, '::1', 'gersonsinay@gmail.com', 2, '2020-12-11 02:08:41', 1),
(61, '::1', 'dedhensupatmo@gmail.com', 1, '2020-12-11 02:13:27', 1),
(62, '::1', 'dedhensupatmo@gmail.com', 1, '2020-12-13 06:15:17', 1),
(63, '::1', 'martin@gmail.com', 4, '2020-12-13 06:15:37', 1),
(64, '::1', 'martin@gmail.com', 4, '2020-12-13 19:37:13', 1),
(65, '::1', 'martin@gmail.com', 4, '2020-12-13 23:45:31', 1),
(66, '::1', 'martin@gmail.com', 4, '2020-12-14 04:56:18', 1),
(67, '::1', 'martin@gmail.com', 4, '2020-12-15 20:13:52', 1),
(68, '::1', 'martin@gmail.com', 4, '2020-12-16 20:56:36', 1),
(69, '::1', 'gersonsinay@gmail.com', 2, '2020-12-16 21:28:13', 1),
(70, '::1', 'gersonsinay@gmail.com', 2, '2020-12-17 20:54:02', 1),
(71, '::1', 'dedhensupatmo@gmail.com', 1, '2020-12-17 21:52:27', 1),
(72, '::1', 'gerson sinay', NULL, '2020-12-17 21:53:12', 0),
(73, '::1', 'gersonsinay@gmail.com', 2, '2020-12-17 21:53:19', 1),
(74, '::1', 'gerson sinay', NULL, '2020-12-18 00:08:38', 0),
(75, '::1', 'gerson sinay', NULL, '2020-12-18 00:08:45', 0),
(76, '::1', 'gersonsinay@gmail.com', 2, '2020-12-18 00:08:51', 1),
(77, '::1', 'gersonsinay@gmail.com', 2, '2020-12-18 00:42:01', 1),
(78, '::1', 'dedhensupatmo@gmail.com', 1, '2020-12-18 03:23:35', 1),
(79, '::1', 'gersonsinay@gmail.com', 2, '2020-12-19 05:13:43', 1),
(80, '::1', 'martin@gmail.com', 4, '2020-12-19 06:09:44', 1),
(81, '::1', 'dio@gmail.com', 5, '2020-12-19 06:29:38', 1),
(82, '::1', 'dedhensupatmo@gmail.com', 1, '2020-12-19 06:32:39', 1),
(83, '::1', 'dio@gmail.com', 6, '2020-12-19 07:33:45', 1),
(84, '::1', 'dedhensupatmo@gmail.com', 1, '2020-12-20 19:30:08', 1),
(85, '::1', 'martin@gmail.com', 4, '2020-12-20 19:32:02', 1),
(86, '::1', 'dio@gmail.com', 6, '2020-12-20 19:51:51', 1),
(87, '::1', 'gersonsinay@gmail.com', 2, '2020-12-20 20:09:38', 1),
(88, '::1', 'martin@gmail.com', 4, '2020-12-20 21:39:57', 1),
(89, '::1', 'nesya@gmail.com', 7, '2020-12-20 21:56:02', 1),
(90, '::1', 'dedhensupatmo@gmail.com', 1, '2020-12-20 22:07:36', 1),
(91, '::1', 'nesya@gmail.com', 7, '2020-12-20 22:10:56', 1),
(92, '::1', 'martin@gmail.com', 4, '2020-12-20 22:16:49', 1),
(93, '::1', 'martin@gmail.com', 4, '2020-12-20 22:21:55', 1),
(94, '::1', 'nesya@gmail.com', 7, '2020-12-20 22:43:33', 1),
(95, '::1', 'martin@gmail.com', 4, '2020-12-20 22:47:57', 1),
(96, '::1', 'nesya@gmail.com', 7, '2020-12-20 22:50:35', 1),
(97, '::1', 'martin@gmail.com', 4, '2020-12-20 22:53:59', 1),
(98, '::1', 'martin@gmail.com', 4, '2020-12-20 23:05:16', 1),
(99, '::1', 'dedhensupatmo@gmail.com', 1, '2020-12-20 23:16:01', 1),
(100, '::1', 'martin@gmail.com', 4, '2020-12-20 23:19:09', 1),
(101, '::1', 'dedhensupatmo@gmail.com', 1, '2020-12-20 23:19:22', 1),
(102, '::1', 'martin@gmail.com', 4, '2020-12-21 00:06:10', 1),
(103, '::1', '150101036', NULL, '2020-12-21 00:42:54', 0),
(104, '::1', '150101036', NULL, '2020-12-21 00:43:06', 0),
(105, '::1', '150101036', NULL, '2020-12-21 00:43:33', 0),
(106, '::1', 'dedhensupatm1@gmail.com', 8, '2020-12-21 00:44:07', 1),
(107, '::1', 'martin@gmail.com', 4, '2020-12-23 00:52:30', 1),
(108, '::1', 'dedhensupatm1@gmail.com', 8, '2020-12-23 00:53:37', 1),
(109, '::1', 'dedhensupatm1@gmail.com', 8, '2020-12-27 19:32:34', 1),
(110, '::1', 'martin@gmail.com', 4, '2020-12-27 19:39:14', 1),
(111, '::1', 'dedhensupatmo@gmail.com', 1, '2020-12-27 19:40:49', 1),
(112, '::1', 'dedhensupatm1@gmail.com', 8, '2020-12-27 19:41:02', 1),
(113, '::1', 'martin@gmail.com', 4, '2020-12-28 05:58:57', 1),
(114, '::1', 'dedhensupatmo@gmail.com', 1, '2020-12-28 07:00:28', 1),
(115, '::1', 'martin@gmail.com', 4, '2020-12-28 07:09:37', 1),
(116, '::1', 'martin@gmail.com', 4, '2020-12-28 18:45:47', 1),
(117, '::1', 'dedhensupatm1@gmail.com', 8, '2020-12-29 00:09:54', 1),
(118, '::1', 'martin1@gmail.com', 9, '2020-12-29 01:06:02', 1),
(119, '::1', 'dedhensupatm1@gmail.com', 8, '2020-12-29 01:07:42', 1),
(120, '::1', 'martin@gmail.com', 4, '2020-12-29 01:09:43', 1),
(121, '::1', 'dedhensupatm1@gmail.com', 8, '2020-12-29 01:10:57', 1),
(122, '::1', 'dedhensupatm1@gmail.com', 8, '2020-12-29 05:33:32', 1),
(123, '::1', 'dedhensupatmo@gmail.com', 14, '2020-12-29 06:09:54', 1),
(124, '::1', 'martin3@gmail.com', 15, '2020-12-29 06:12:02', 1),
(125, '::1', 'dedhensupatmo2@gmail.com', 1, '2020-12-29 06:17:29', 1),
(126, '::1', 'gerson', NULL, '2020-12-29 06:57:33', 0),
(127, '::1', 'gersonsinay@gmail.com', 2, '2020-12-29 06:57:44', 1),
(128, '::1', 'dedhensupatmo2@gmail.com', 1, '2020-12-29 07:03:27', 1),
(129, '::1', 'dedhensupatmo@gmail.com', 14, '2020-12-29 07:17:44', 1),
(130, '::1', 'gersonsinay@gmail.com', 2, '2020-12-29 07:20:26', 1),
(131, '::1', 'gersonsinay@gmail.com', 2, '2020-12-29 19:49:16', 1),
(132, '::1', 'Irwan@gmail.com', 16, '2020-12-30 00:33:13', 1),
(133, '::1', 'gersonsinay@gmail.com', 2, '2020-12-30 05:30:47', 1),
(134, '::1', 'Irwan@gmail.com', 16, '2020-12-30 06:28:14', 1),
(135, '::1', 'gersonsinay@gmail.com', 2, '2020-12-30 06:35:12', 1),
(136, '::1', 'dedhens2', NULL, '2020-12-30 06:36:19', 0),
(137, '::1', 'dedhensupatmo@gmail.com', 14, '2020-12-30 06:36:26', 1),
(138, '::1', 'dedhensupatmo@gmail.com', 14, '2021-01-03 05:11:37', 1),
(139, '::1', 'gersonsinay@gmail.com', 2, '2021-01-03 05:16:36', 1),
(140, '::1', 'dedhensupatmo2@gmail.com', 1, '2021-01-03 19:23:51', 1),
(141, '::1', 'gersonsinay@gmail.com', 2, '2021-01-03 19:25:20', 1),
(142, '::1', 'martin3@gmail.com', 15, '2021-01-03 19:47:31', 1),
(143, '::1', 'gersonsinay@gmail.com', 2, '2021-01-03 20:03:20', 1),
(144, '::1', 'gersonsinay@gmail.com', 2, '2021-01-05 02:00:40', 1),
(145, '::1', 'dedhensupatmo2@gmail.com', 1, '2021-01-05 02:02:47', 1),
(146, '::1', 'gerson sinay', NULL, '2021-01-05 02:03:02', 0),
(147, '::1', 'gersonsinay@gmail.com', 2, '2021-01-05 02:03:07', 1),
(148, '::1', 'gersonsinay@gmail.com', 2, '2021-01-07 23:36:23', 1),
(149, '::1', 'gersonsinay@gmail.com', 2, '2021-01-10 20:10:58', 1),
(150, '::1', 'dedhensupatmo@gmail.com', 14, '2021-01-10 20:20:45', 1),
(151, '::1', 'gersonsinay@gmail.com', 2, '2021-01-10 20:50:04', 1),
(152, '::1', 'dedhensupatmo2@gmail.com', 1, '2021-01-10 23:53:41', 1),
(153, '::1', 'gersonsinay@gmail.com', 2, '2021-01-10 23:56:21', 1),
(154, '::1', 'Irwan@gmail.com', 16, '2021-01-11 00:21:59', 1),
(155, '::1', 'gersonsinay@gmail.com', 2, '2021-01-11 00:39:27', 1),
(156, '::1', 'alfi@gmail.com', 17, '2021-01-11 00:41:52', 1),
(157, '::1', 'dedhensupatmo2@gmail.com', 1, '2021-01-11 01:09:57', 1),
(158, '::1', 'gersonsinay@gmail.com', 2, '2021-01-11 01:16:39', 1),
(159, '::1', 'Irwan@gmail.com', 16, '2021-01-11 01:55:05', 1),
(160, '::1', 'gersonsinay@gmail.com', 2, '2021-01-11 19:39:29', 1),
(161, '::1', 'Irwan@gmail.com', 16, '2021-01-11 19:55:27', 1),
(162, '::1', 'alfi@gmail.com', 17, '2021-01-11 19:55:43', 1),
(163, '::1', 'gersonsinay@gmail.com', 2, '2021-01-11 20:00:06', 1),
(164, '::1', 'alfi@gmail.com', 17, '2021-01-11 20:34:41', 1),
(165, '::1', 'gersonsinay@gmail.com', 2, '2021-01-11 20:34:55', 1),
(166, '::1', 'dedhensupatmo2@gmail.com', 1, '2021-01-11 22:16:30', 1),
(167, '::1', 'gersonsinay@gmail.com', 2, '2021-01-11 22:18:47', 1),
(168, '::1', 'Irwan@gmail.com', 16, '2021-01-11 22:21:14', 1),
(169, '::1', 'gersonsinay@gmail.com', 2, '2021-01-11 22:22:27', 1),
(170, '::1', 'alfi@gmail.com', 17, '2021-01-11 22:23:28', 1),
(171, '::1', 'Irwan@gmail.com', 16, '2021-01-11 22:23:49', 1),
(172, '::1', 'gersonsinay@gmail.com', 2, '2021-01-11 22:31:49', 1),
(173, '::1', 'Irwan@gmail.com', 16, '2021-01-11 22:43:23', 1),
(174, '::1', 'gersonsinay@gmail.com', 2, '2021-01-11 22:43:33', 1),
(175, '::1', 'dedhensupatmo2@gmail.com', 1, '2021-01-11 22:49:48', 1),
(176, '::1', 'dedhensupatmo2@gmail.com', 1, '2021-01-11 23:08:25', 1),
(177, '::1', 'dedhensupatmo2@gmail.com', 1, '2021-01-12 00:15:17', 1),
(178, '::1', 'dedhensupatmo2@gmail.com', 1, '2021-02-05 02:30:08', 1),
(179, '::1', 'gerry', NULL, '2021-02-05 02:30:22', 0),
(180, '::1', 'gersonsinay@gmail.com', 2, '2021-02-05 02:30:31', 1),
(181, '::1', 'alfi', NULL, '2021-02-05 02:33:03', 0),
(182, '::1', 'alfi', NULL, '2021-02-05 02:33:39', 0),
(183, '::1', 'alfi@gmail.com', 17, '2021-02-05 02:33:48', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'operator-teknik', 'operator teknik'),
(2, 'operator-fkip', 'operator fakultas keguruan dan ilmu pendidikan'),
(3, 'operator-fisip', 'operator fakultas ilmu sosial dan ilmu politik'),
(4, 'operator-fekon', 'operator-fakultas ekonomi dan bisnis'),
(5, 'operator-hukum', 'operator fakultas hukum'),
(6, 'operator-perikanan', 'operator perikanan'),
(7, 'operator-pertanian', 'operator pertanian'),
(8, 'operator-pascasarjana', 'operator pascasarjana'),
(9, 'operator-kedokteran', 'operator kedokteran'),
(10, 'operator-mipa', 'operator matematika dan ilmu pengetahuan alam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_users_permissions`
--

INSERT INTO `auth_users_permissions` (`user_id`, `permission_id`) VALUES
(2, 1),
(16, 9),
(17, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `datapdm`
--

CREATE TABLE `datapdm` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_pengirim` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `fakultas` varchar(255) NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `lokasi_data` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL,
  `akte` varchar(255) DEFAULT NULL,
  `ktm` varchar(255) DEFAULT NULL,
  `ijasah` varchar(255) DEFAULT NULL,
  `surat` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `datapdm`
--

INSERT INTO `datapdm` (`id`, `id_pengirim`, `nama_lengkap`, `nim`, `nomor`, `fakultas`, `prodi`, `lokasi_data`, `data`, `akte`, `ktm`, `ijasah`, `surat`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 'Marthin Salakory', '201921013', '082242182790', 'Teknik', 'S1 Teknik Mesin', 'SIAKAD', 'Nama Mahasiswa,Nama Ibu', '1608514434_61e52caf27e46ee5ca2b.pdf', '1608514434_727972d6e186dea50bec.pdf', '1608514434_922ee72473744fec185a.pdf', 'tidakada', 'Sedang Di Tinjau', '2020-12-20 19:33:54', '2020-12-20 19:33:54'),
(2, 6, 'Dio', '201721231', '082123122310', 'Teknik', 'S1 Teknik Industri', 'PDDIKTI', 'Tempat Lahir', '1608515580_19ff51a797e11df1fba2.pdf', '1608515580_7c5de5e6c62e77b1bfe7.pdf', '1608515580_cff98b58a8d5996d054d.pdf', 'tidakada', 'baru', '2020-12-20 19:53:00', '2020-12-30 06:35:27'),
(12, 2, 'Gerson Sinay', '201791201', '0822312829121', 'Kedokteran', 'S1 Kedokteran', 'SIAKAD', 'Nama Mahasiswa,Nama Ibu', 'tidakada', 'tidakada', 'tidakada', 'tidakada', 'Sedang Di Tinjau', '2020-12-20 20:27:43', '2020-12-20 20:27:43'),
(13, 2, 'asdas', '2312', '2313', 'Hukum', 'S1 Hukum', 'PDDIKTI', 'Nama Mahasiswa,Nama Ibu', 'tidakada', 'tidakada', 'tidakada', 'tidakada', 'Sedang Di Tinjau', '2020-12-29 19:57:57', '2020-12-29 19:57:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `fakultas_id` int(11) UNSIGNED NOT NULL,
  `nama_fakultas` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`fakultas_id`, `nama_fakultas`, `created_at`, `updated_at`) VALUES
(1, 'Hukum', '2020-12-13 20:48:40', '2020-12-13 20:48:40'),
(2, 'Kedokteran', '2020-12-13 20:48:40', '2020-12-13 20:48:40'),
(3, 'Pertanian', '2020-12-13 20:48:40', '2020-12-13 20:48:40'),
(4, 'Ekonomi dan Bisnis', '2020-12-13 20:48:40', '2020-12-13 20:48:40'),
(5, 'Matematika Dan Ilmu Pengetahuan Alam', '2020-12-13 20:48:40', '2020-12-13 20:48:40'),
(6, 'Ilmu Sosial Dan Ilmu Politik', '2020-12-13 20:48:40', '2020-12-13 20:48:40'),
(7, 'Keguruan Dan Ilmu Pendidikan', '2020-12-13 20:48:40', '2020-12-13 20:48:40'),
(8, 'Perikanan', '2020-12-13 20:48:40', '2020-12-13 20:48:40'),
(9, 'Teknik', '2020-12-13 20:48:40', '2020-12-13 20:48:40'),
(10, 'Pascasarjana', '2020-12-13 20:48:40', '2020-12-13 20:48:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hakpdm`
--

CREATE TABLE `hakpdm` (
  `idhak` int(11) NOT NULL,
  `id_fakultas` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hakpdm`
--

INSERT INTO `hakpdm` (`idhak`, `id_fakultas`, `user_id`) VALUES
(1, 1, 2),
(2, 2, 16),
(3, 9, 17),
(4, 9, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1607264365, 1),
(2, '2020-12-14-020631', 'App\\Database\\Migrations\\Fakultas', 'default', 'App', 1607912002, 2),
(3, '2020-12-14-025046', 'App\\Database\\Migrations\\Prodi', 'default', 'App', 1607914839, 3),
(4, '2020-12-14-084914', 'App\\Database\\Migrations\\Pdm', 'default', 'App', 1608087105, 4),
(5, '2020-12-21-061506', 'App\\Database\\Migrations\\Siakad', 'default', 'App', 1608531988, 5),
(6, '2020-12-21-063411', 'App\\Database\\Migrations\\Pddikti', 'default', 'App', 1608532492, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pddikti`
--

CREATE TABLE `pddikti` (
  `pddikti_id` int(11) UNSIGNED NOT NULL,
  `nim` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `periode_pendaftaran` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pddikti`
--

INSERT INTO `pddikti` (`pddikti_id`, `nim`, `nama_lengkap`, `nama_ibu`, `tempat_lahir`, `tanggal_lahir`, `periode_pendaftaran`, `jenis_kelamin`) VALUES
(1, '150101036', 'FIQHRO DEDHEN SUPATM', 'DJUSNAWATI', 'MASOHI', '1996-09-17', 'GANJIL 2015', 'LAKI-LAKI'),
(2, '201711223', 'MARTHIN SALAKORY', 'NAMAIBU', 'AMBON', '2000-12-09', 'GANJIL 2019', 'LAKI-LAKI'),
(3, '201621210', 'Dio', 'nama ibu', 'ambon', '2020-12-01', 'Ganjil 2016', 'LAKI-LAKI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `prodi_id` int(11) UNSIGNED NOT NULL,
  `nama_prodi` varchar(255) NOT NULL,
  `group_prodi_id` int(11) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`prodi_id`, `nama_prodi`, `group_prodi_id`, `created_at`, `updated_at`) VALUES
(1, 'S1 Ilmu Hukum ', 1, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(2, 'S1 Hukum (Kampus Kab. Kepulauan Aru)', 1, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(3, 'S1 Hukum (Kampus Kab Maluku Barat Daya)', 1, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(4, 'S1 Pendidikan Dokter', 2, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(5, 'Profesi Profesi Dokter', 2, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(6, 'S1 Agribisnis', 3, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(7, 'S1 Agroteknologi', 3, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(8, 'S1 Ilmu Tanah', 3, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(9, 'S1 Kehutanan', 3, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(10, 'S1 Pemuliaan Tanaman', 3, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(11, 'S1 Penyuluhan Pertanian', 3, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(12, 'S1 Peternakan', 3, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(13, 'S1 Teknologi Hasil Pertanian', 3, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(14, 'S1 Akuntansi', 4, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(15, 'S1 Akuntansi (Kampus Kab. Kepulauan Aru)', 4, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(16, 'S1 Akuntansi (Kampus Kab. Maluku Barat Daya)', 4, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(17, 'S1 Ekonomi Pembangunan', 4, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(18, 'S1 Manajemen', 4, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(19, 'S1 Biologi', 5, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(20, 'S1 Fisika', 5, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(21, 'S1 Kimia', 5, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(22, 'S1 Matematika', 5, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(23, 'S1 Statistika', 5, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(24, 'S1 Administrasi Pendidikan', 6, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(25, 'S1 Ilmu Administrasi Negara', 6, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(26, 'S1 Ilmu Komunikasi', 6, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(27, 'S1 Ilmu Pemerintahan', 6, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(28, 'S1 Sosiologi', 6, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(29, 'S1 Bimbingan Dan Konseling', 7, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(30, 'S1 Pendidikan Bahasa Dan Sastra Indonesia', 7, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(31, 'S1 Pendidikan Bahasa Inggris', 7, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(32, 'S1 Pendidikan Bahasa Inggris (Kampus Kab. Kepulauan Aru)', 7, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(33, 'S1 Pendidikan Bahasa Inggris (Kampus Kab. Maluku Barat Daya)', 7, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(34, 'S1 Pendidikan Bahasa Jerman', 7, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(35, 'S1 Pendidikan Biologi', 7, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(36, 'S1 Pendidikan Ekonomi', 7, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(37, 'S1 Pendidikan Fisika', 7, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(38, 'S1 Pendidikan Geografi', 7, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(39, 'S1 Pendidikan Guru Pendidikan Anak Usia Dini', 7, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(40, 'S1 Pendidikan Guru Sekolah Dasar', 7, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(41, 'S1 Pendidikan Guru Sekolah Dasar (kampus Kab Aru)', 7, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(42, 'S1 Pendidikan Guru Sekolah Dasar (kampus Kab Maluku Barat Daya)', 7, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(43, 'S1 Pendidikan Guru Sekolah Dasar (kampus Kab Maluku Barat Daya)', 7, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(44, 'S1 Pendidikan Jasmani, Kesehatan & Rekreasi', 7, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(45, 'S1 Pendidikan Kimia', 7, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(46, 'S1 Pendidikan Luar Sekolah', 7, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(47, 'S1 Pendidikan Matematika', 7, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(48, 'S1 Pendidikan Matematika (Kampus Kab Kepulauan Aru)', 7, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(49, 'S1 Pendidikan Matematika (Kampus Kab Maluku Barat Daya)', 7, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(50, 'S1 Pendidikan Matematika (Kampus Kab Maluku Barat Daya)', 7, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(51, 'S1 Pendidikan Pancasila Dan Kewarganegaraan', 7, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(52, 'S1 Pendidikan Sejarah', 7, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(53, 'S1 PJJ Pendidikan Guru Sekolah Dasar', 7, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(54, 'S1 PSKGJ Pendidikan Kimia', 7, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(55, 'S1 PSKGJ Pendidikan Sejarah', 7, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(56, 'Profesi Pendidikan Profesi Guru', 7, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(57, 'S1 Agrobisnis Perikanan', 8, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(58, 'S1 Budidaya Perairan', 8, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(59, 'S1 Ilmu Kelautan', 8, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(60, 'S1 Manajemen Sumber Daya Perairan', 8, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(61, 'S1 Pemanfaatan Sumber Daya Perikanan', 8, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(62, 'S1 Teknologi Hasil Perikanan', 8, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(63, 'S1 Perencanaan Wilayah dan Kota', 9, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(64, 'S1 Teknik Geofisika', 9, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(65, 'S1 Teknik Geologi', 9, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(66, 'S1 Teknik Industri', 9, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(67, 'S1 Teknik Mesin', 9, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(68, 'S1 Teknik Perkapalan', 9, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(69, 'S1 Teknik Perminyakan', 9, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(70, 'S1 Teknik Sipil', 9, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(71, 'S1 Teknik Sistem Perkapalan', 9, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(72, 'S2 Administrasi Publik', 10, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(73, 'S2 Agribisnis', 10, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(74, 'S2 Ilmu Ekonomi', 10, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(75, 'S2 Ilmu Hukum', 10, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(76, 'S2 Ilmu Kelautan', 10, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(77, 'S2 Ilmu Pertanian', 10, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(78, 'S2 Kimia', 10, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(79, 'S2 Manajemen', 10, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(80, 'S2 Manajemen Hutan', 10, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(81, 'S2 Manajemen Pendidikan', 10, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(82, 'S2 Manajemen Sumberdaya Kelautan dan Pulau-pulau Kecil', 10, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(83, 'S2 Pendidikan Bahasa Inggris', 10, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(84, 'S2 Pendidikan Bahasa Jerman', 10, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(85, 'S2 Pendidikan Biologi', 10, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(86, 'S2 Matematika', 10, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(87, 'S2 Pengelolaan Lahan', 10, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(88, 'S2 Sosiologi', 10, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(89, 'S3 Ilmu Hukum', 10, '2020-12-13 23:17:15', '2020-12-13 23:17:15'),
(90, 'S3 Ilmu Kelautan', 10, '2020-12-13 23:17:15', '2020-12-13 23:17:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siakad`
--

CREATE TABLE `siakad` (
  `siakad_id` int(11) UNSIGNED NOT NULL,
  `nim` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `periode_pendaftaran` varchar(255) NOT NULL,
  `angkatan` int(11) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `siakad`
--

INSERT INTO `siakad` (`siakad_id`, `nim`, `nama_lengkap`, `prodi`, `nama_ibu`, `tempat_lahir`, `tanggal_lahir`, `periode_pendaftaran`, `angkatan`, `jenis_kelamin`) VALUES
(1, '150101036', 'FIQHRO DEDHEN SUPATMO', 'S1 Teknik Industri', 'DJUSNAWATI', 'MASOHI', '1996-09-17', 'GANJIL 2015', 2015, 'L'),
(2, '201711223', 'MARTHIN SALAKORY', 'S1 Teknik Mesin', 'NAMAIBU', 'AMBON', '2000-12-09', 'GANJIL 2018', 2017, 'L'),
(3, '201621210', 'Dio', 'S1 Teknik Mesin', 'nama ibu', 'ambon', '2020-12-01', 'Ganjil 2016', 2016, 'L');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `nim` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'default.svg',
  `hakfakultas` varchar(155) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `fullname`, `nim`, `user_image`, `hakfakultas`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'dedhensupatmo2@gmail.com', 'Dedhens', 'Fiqhro Dedhen Supatmo', '', 'default.svg', NULL, '$2y$10$d9LAbeD7a4njfv6WJGz.de/k61fzHWqVdT3D0shRSc2goUs/U11iy', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2020-12-06 22:44:03', '2020-12-06 22:44:03', NULL),
(2, 'gersonsinay@gmail.com', 'Gerson Sinay', 'Gerson Sinay', '', 'default.svg', NULL, '$2y$10$XUKkRwz1aeVubLPkdlxqEu9H6cqVof.F1wWsmMqX/DSh9t3GBrmoC', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2020-12-06 23:01:35', '2020-12-06 23:01:35', NULL),
(14, 'dedhensupatmo@gmail.com', 'dedhens2', 'Fiqhro Dedhen Supatmo', '150101036', 'default.svg', NULL, '$2y$10$tOInxuFPcpSuGXG9a.8jVeBDIMpotvHER9/EL6NMqwWkNwHgthXRq', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2020-12-29 06:05:52', '2020-12-29 06:05:52', NULL),
(15, 'martin3@gmail.com', 'martin2', 'Martin Salakory', '201711223', 'default.svg', NULL, '$2y$10$hSNurtI3EmQaFGpBqmm24.T0eBk.A8XISShXWB7.5/.XaBcQpokN.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2020-12-29 06:08:40', '2020-12-29 06:08:40', NULL),
(16, 'Irwan@gmail.com', 'wawan', 'Wawan', 'pusdatin08', 'default.svg', NULL, '$2y$10$GM4viusqjhdI0OWClAleW.UBx5sZnW1bXc.viNDENw7nGI22ad1Ii', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2020-12-30 00:33:05', '2020-12-30 00:33:05', NULL),
(17, 'alfi@gmail.com', 'alfi', 'Alfi', '11111', 'default.svg', 'Teknik, Hukum', '$2y$10$5vK.Ujq5o9AzVmxWIdXEDe/.m2vFtZoKWrNavks2jSxrAWiI8KtTm', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-01-11 00:41:45', '2021-01-11 00:41:45', NULL),
(18, 'revan@gmail.com', 'revan', 'Revan', '123123', 'default.svg', NULL, '$2y$10$/z88f8BwGUwfIkBdt35JWObXdV9uI3fOnxzHPX8qT/oJ4/anhGD5K', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-01-14 01:11:12', '2021-01-14 01:11:12', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indeks untuk tabel `datapdm`
--
ALTER TABLE `datapdm`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`fakultas_id`);

--
-- Indeks untuk tabel `hakpdm`
--
ALTER TABLE `hakpdm`
  ADD PRIMARY KEY (`idhak`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pddikti`
--
ALTER TABLE `pddikti`
  ADD PRIMARY KEY (`pddikti_id`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`prodi_id`);

--
-- Indeks untuk tabel `siakad`
--
ALTER TABLE `siakad`
  ADD PRIMARY KEY (`siakad_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `datapdm`
--
ALTER TABLE `datapdm`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `fakultas_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `hakpdm`
--
ALTER TABLE `hakpdm`
  MODIFY `idhak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pddikti`
--
ALTER TABLE `pddikti`
  MODIFY `pddikti_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `prodi`
--
ALTER TABLE `prodi`
  MODIFY `prodi_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT untuk tabel `siakad`
--
ALTER TABLE `siakad`
  MODIFY `siakad_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
