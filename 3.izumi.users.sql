-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 2021 年 1 月 23 日 03:04
-- サーバのバージョン： 5.7.30
-- PHP のバージョン: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- データベース: `gs_chat_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_users_table`
--

CREATE TABLE `gs_users_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin_flag` int(1) NOT NULL DEFAULT '0',
  `register_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `gs_users_table`
--

INSERT INTO `gs_users_table` (`id`, `name`, `email`, `password`, `admin_flag`, `register_datetime`) VALUES
(1, 'koji', 'test@test.com', '$2y$10$3CWtTCekn/THsEJormj8Q.aNOtm/EiJbbfGu2LG6O5.Xq5VVF7MRK', 1, '2020-12-31 16:08:55'),
(3, 'イズミコウジ', 'aaaa@test.com', '$2y$10$CtzvqP8jHAjlrbc1q1z.SeQxFFwFX4oso2H1VaIb.tg8QSclsZUyO', 0, '2020-12-31 16:10:18'),
(4, 'イズミコウジ', 'cicji@test.com', '$2y$10$V0rbHLBRkA9MLsFIRcDT4eZNb4Tl3hVI4zui7yXiNzgLduWTZKHLy', 0, '2020-12-31 16:14:16'),
(5, 'あいうえお', 'abcd@test.com', '$2y$10$fUy34Y0IkhtemaBkmM.lqevfsqn5Kc74KRritL6dFZJ74L6GXzt6i', 0, '2021-01-20 23:08:34');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_users_table`
--
ALTER TABLE `gs_users_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `gs_users_table`
--
ALTER TABLE `gs_users_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
