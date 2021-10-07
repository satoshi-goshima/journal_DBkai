-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-10-07 18:47:41
-- サーバのバージョン： 10.4.21-MariaDB
-- PHP のバージョン: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsacs_d03_04`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `journal`
--

CREATE TABLE `journal` (
  `id` int(12) NOT NULL,
  `slip_date` date NOT NULL,
  `l_sub` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_money` int(12) NOT NULL,
  `r_sub` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_money` int(12) NOT NULL,
  `descri` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `journal`
--

INSERT INTO `journal` (`id`, `slip_date`, `l_sub`, `l_money`, `r_sub`, `r_money`, `descri`, `created_at`, `updated_at`, `uid`) VALUES
(1, '2021-09-03', '会議費', 33000, '普通預金', 33000, 'どら焼き代かも', '2021-09-21 19:25:37', '2021-09-29 02:06:12', 0),
(2, '2021-09-23', '新聞図書費', 3300, '普通預金', 3300, 'いちご新聞', '2021-09-23 17:32:46', '2021-09-23 17:32:46', 0),
(3, '2021-09-01', '消耗品費', 29700, '普通預金', 29700, 'SONY WF-1000XM4X4', '2021-09-23 17:59:29', '2021-09-30 10:57:28', 0),
(4, '2021-09-08', '研究開発費', 55000, '普通預金', 55000, '食べてもなくならないどら焼きの開発（材料）', '2021-09-23 18:00:17', '2021-09-23 18:00:17', 0),
(5, '2021-10-10', '旅費交通費', 109000, '普通預金', 109000, '藤子・Ｆ・不二雄ミュージアム視察', '2021-09-23 18:05:49', '2021-09-23 18:05:49', 0),
(6, '2021-09-24', '消耗品費', 44000, '普通預金', 44000, '撮影機材一式', '2021-09-28 20:36:52', '2021-09-28 20:36:52', 0),
(8, '2021-09-04', '消耗品費', 5, '普通預金', 5, 'ipad neo', '2021-09-28 23:58:35', '2021-09-28 23:58:35', 0),
(9, '2021-09-04', '消耗品費', 1, '普通預金', 1, 'ipad final', '2021-09-29 00:00:32', '2021-09-29 00:00:32', 0),
(10, '2021-09-01', '消耗品費', 33000, '普通預金', 33000, 'ipad evolution', '2021-09-29 00:22:03', '2021-09-29 00:22:03', 0),
(12, '2021-10-05', '新聞図書費', 3, '普通預金', 3, 'いちご新聞neo', '2021-10-06 17:00:50', '2021-10-06 17:00:50', 0),
(13, '2021-10-07', '新聞図書費', 30, '普通預金', 30, 'いちご新聞hyper', '2021-10-06 17:04:07', '2021-10-06 17:04:07', 0),
(14, '2021-10-11', '新聞図書費', 10, '普通預金', 10, 'いちご新聞 evolution', '2021-10-06 17:33:37', '2021-10-06 17:33:37', 0),
(15, '2021-10-08', '新聞図書費', 20000, '普通預金', 20000, 'ドワンゴ', '2021-10-06 17:37:32', '2021-10-06 17:38:05', 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `todo_table`
--

CREATE TABLE `todo_table` (
  `id` int(12) NOT NULL,
  `todo` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_deleted` int(1) NOT NULL,
  `is_admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `todo_table`
--

INSERT INTO `todo_table` (`id`, `todo`, `deadline`, `created_at`, `updated_at`, `is_deleted`, `is_admin`) VALUES
(1, 'SQL練習うぇい', '2021-09-15', '2021-09-19 16:13:04', '2021-09-27 19:59:46', 0, 0),
(2, '面接', '2021-09-11', '2021-09-19 17:46:09', '2021-09-19 17:46:09', 0, 0),
(3, '会計士対応', '2021-09-12', '2021-09-19 17:46:09', '2021-09-19 17:46:09', 0, 0),
(4, 'TOS改修', '2021-09-13', '2021-09-19 17:46:09', '2021-09-19 17:46:09', 0, 0),
(5, '補助金申請', '2021-09-14', '2021-09-19 17:46:09', '2021-09-19 17:46:09', 0, 0),
(6, '月次締め', '2021-09-15', '2021-09-19 17:46:09', '2021-09-19 17:46:09', 0, 0),
(7, 'シネマ飲食会議', '2021-09-16', '2021-09-19 17:46:09', '2021-09-19 17:46:09', 0, 0),
(8, '役員会', '2021-09-17', '2021-09-19 17:46:09', '2021-09-19 17:46:09', 0, 0),
(9, '景品選定', '2021-09-18', '2021-09-19 17:46:09', '2021-09-19 17:46:09', 0, 0),
(11, '年休', '2021-09-20', '2021-09-19 17:46:09', '2021-09-19 17:46:09', 0, 0),
(12, 'ドラえもーん', '2021-09-30', '2021-09-20 15:29:03', '2021-09-20 15:29:03', 0, 0),
(14, 'エラー解決', '2021-09-25', '2021-09-27 18:06:53', '2021-09-27 18:06:53', 0, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `users_table`
--

CREATE TABLE `users_table` (
  `id` int(12) NOT NULL,
  `username` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` int(1) NOT NULL,
  `is_deleted` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users_table`
--

INSERT INTO `users_table` (`id`, `username`, `password`, `is_admin`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'dora', '1293', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'ドラさん', '0304', 0, 0, '2021-10-07 18:49:52', '2021-10-07 18:49:52'),
(3, 'ドラえフォン', '030405', 0, 0, '2021-10-07 18:50:57', '2021-10-07 18:50:57');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `todo_table`
--
ALTER TABLE `todo_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `journal`
--
ALTER TABLE `journal`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- テーブルの AUTO_INCREMENT `todo_table`
--
ALTER TABLE `todo_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- テーブルの AUTO_INCREMENT `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
