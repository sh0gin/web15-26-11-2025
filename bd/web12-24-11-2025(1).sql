-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Хост: MySQL-8.0
-- Время создания: Ноя 26 2025 г., 08:11
-- Версия сервера: 8.0.41
-- Версия PHP: 8.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `web12-24-11-2025`
--

-- --------------------------------------------------------

--
-- Структура таблицы `doc_type`
--

CREATE TABLE `doc_type` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `doc_type`
--

INSERT INTO `doc_type` (`id`, `title`) VALUES
(1, 'паспорт гражданина РФ'),
(2, 'заграничный\r\nпаспорт гражданина РФ'),
(3, 'паспорт гражданина Монголии'),
(4, 'другой документ');

-- --------------------------------------------------------

--
-- Структура таблицы `passport`
--

CREATE TABLE `passport` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `passport_type_id` int NOT NULL,
  `passport_expire` date NOT NULL,
  `passport_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `passport_another` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `passport`
--

INSERT INTO `passport` (`id`, `user_id`, `passport_type_id`, `passport_expire`, `passport_number`, `passport_another`) VALUES
(1, 1, 1, '2025-11-29', '111', NULL),
(2, 3, 1, '2025-11-26', '+99999999999', NULL),
(3, 4, 4, '2026-11-26', '4534534', 'вапвапва'),
(4, 5, 1, '2025-11-26', 'dsfsdfsdf', NULL),
(5, 6, 4, '4233-03-31', '234324213', 'sdafasdfasd');

-- --------------------------------------------------------

--
-- Структура таблицы `stop_point`
--

CREATE TABLE `stop_point` (
  `id` int NOT NULL,
  `name` int NOT NULL,
  `ru` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `surname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `patronymic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` tinyint NOT NULL DEFAULT '0',
  `auth_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `patronymic`, `email`, `phone`, `password`, `role`, `auth_key`) VALUES
(1, 'q', 'q', 'q', 'q@q.q', '+11111111111', '$2y$13$onFgWYBRPHfE6diR5MwVbOWjE.2OfWI7Zf9eD9DP2xMRTNlRBVNFi', 0, '1WaPAiiCymHeQOrZHpiKLaui3x7GAtIh'),
(3, 'v-', 'v-', 'v-', 'd@f.ruffff', '+99999999990', '$2y$13$hiB5wvsRqzhDd1cP9qZjQuZesz89qlqGAzgkGNa9EQSNtzM57ok46', 0, '0af7UjQex_Yd2sVwRYeBAxyLbL7cvbno'),
(4, 'v-', 'v-', 'v-', 'd@f.ruf', '+99999999999', '$2y$13$OXRBIEcGlqMkgDoQe55/.Om8pEQy5HwZmRmsGE0DRJ9eHFX8mieUC', 0, 'z6rcV2cndOxEbgpUWgtheim0Pjzqv8M_'),
(5, 'p-', 'p-', 'p-', 'sdf@r.ru', '+99999999999', '$2y$13$uUrvFb9N1PbvcyfyYtbhvOtKZKyy/sCNvn5qzq/D3Y9xJMRTmVi/S', 0, 'rdP1qp3jAxcMfaXLXEqo7UVMYJ3dRVHO'),
(6, 'uu-', 'uu-', 'uu-', 'uu-@df.ru', '+34342523452', '$2y$13$rheEvoThce5ulhLbyyKyNeYmVTbwUnfFWcpkEMB9kjxUhE4uosMx6', 0, 'bOwMarICn9w18GKDJDJfYcToxEO-Gp21'),
(7, 'admin', 'admin', 'admin', 'admin@bus.ru', '+11111111111', '$2y$13$xOFxCUGiymnCVHpF.t0qYeqbZGS.tkIRLTFVmZB1JtTE1WX7iOf0K', 1, NULL),
(8, 'admin', 'admin', 'admin', 'user@bus.ru', '+11111111112', '$2y$13$K0UTGSXsRWePLPc3.ePBqeBi/bICQjENUMaC21QMo.WyV.X5ifv1a', 0, 'cNvauItt2jMBm7ipmnaNeGzk_0d8JsND');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `doc_type`
--
ALTER TABLE `doc_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `passport`
--
ALTER TABLE `passport`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `stop_point`
--
ALTER TABLE `stop_point`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `doc_type`
--
ALTER TABLE `doc_type`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `passport`
--
ALTER TABLE `passport`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `stop_point`
--
ALTER TABLE `stop_point`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `passport`
--
ALTER TABLE `passport`
  ADD CONSTRAINT `passport_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
