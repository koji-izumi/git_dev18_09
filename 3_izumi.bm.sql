-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 2021 年 1 月 23 日 03:03
-- サーバのバージョン： 5.7.30
-- PHP のバージョン: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- データベース: `gs_chat_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE `gs_bm_table` (
  `id` int(11) NOT NULL,
  `user_id` int(12) NOT NULL,
  `ISBN` varchar(255) NOT NULL,
  `memo` varchar(255) NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `user_id`, `ISBN`, `memo`, `indate`) VALUES
(1, 1, '9784344427303', '', '2021-01-03 16:35:02'),
(2, 1, '9784087034738', '', '2021-01-03 17:51:24'),
(3, 5, '9784798020822', '勉強になりました。', '2021-01-03 19:02:09'),
(6, 1, '4798163473', '', '2021-01-06 00:17:28'),
(7, 1, '9784798020822', '', '2021-01-06 00:23:20'),
(8, 1, '9784167110062', 'めっちゃ面白い！', '2021-01-10 12:52:38');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
