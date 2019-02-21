-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2019 年 2 朁E02 日 20:53
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gs_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE IF NOT EXISTS `gs_user_table` (
`id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lpw` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kanri_flg` int(1) DEFAULT '1',
  `life_flg` int(1) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`, `date`) VALUES
(20, 'bbbさん', 'bbb', '$2y$10$CYzM5RDRsV0s.IZc23oZJuXh/TSEFrQXdrLusOXvlXCyHy0Nk4WuK', 0, 0, '2019-02-01 21:57:35'),
(21, '111z', '2223z', '333', 1, 0, '2019-02-01 22:17:19'),
(22, '999x', 'qqq', 'www', 1, 0, '2019-02-02 18:30:34'),
(23, 'テスト１管理者', 'test1', 'test1', 1, 0, '0000-00-00 00:00:00'),
(24, 'テスト2一般', 'test2', 'test2', 0, 0, '0000-00-00 00:00:00'),
(25, 'テスト３', 'test3', 'test3', 0, 0, '0000-00-00 00:00:00'),
(26, 'aaa', 'aaa', '$2y$10$4O3d7RXRGySDDEmwxxRQM.C7uP3x0tHk3lRdJjAyvwB80jxwMaz5C', 1, 0, '2019-02-02 16:23:07'),
(27, 'guest', 'guest', 'guest', 0, 0, '0000-00-00 00:00:00'),
(28, 'nobe', 'nobe', '$2y$10$/A3Lbxd.URS0vcSAsGxnvOv29d3NX01IuK4XNWIlwpv/lNPfsNAVi', 1, 0, '2019-02-02 18:38:42'),
(29, 'guest', 'guest', '$2y$10$z.bXv1WBphTw/LHK9aixNe0UHF06Jj6Hs9SimdQ7NGngABIB2786K', 1, 0, '2019-02-02 19:08:43'),
(30, 'ccc', 'ccc', '$2y$10$K8thBaJLgVyTDWneGJaBcet8gvNjZPO23zfZrfeROHkM250X4/hh2', 1, 0, '2019-02-02 20:33:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
