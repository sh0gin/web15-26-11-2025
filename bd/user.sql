-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Хост: MySQL-8.0
-- Время создания: Ноя 26 2025 г., 22:54
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
-- База данных: `web15-26-11-2025`
--

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
(35, 'admin', 'admin', 'admin', 'admin@bus.ru', '0', '$2y$13$iOwm8O7qTKKaCBniEkpJReJB12XtyobOkP5iOIyO3dEIBOu8ORTDa', 1, 'LLwiNp1iLjHH5HCxg7KPPujc7R9fbmIN'),
(36, 'user', 'user', 'user', 'user@bus.ru', '0', '$2y$13$iOwm8O7qTKKaCBniEkpJReJB12XtyobOkP5iOIyO3dEIBOu8ORTDa', 0, '3gdfsgsdfgsdfgsdfgsdfgsdfg'),
(37, 'v-', 'v-', 'v-', 'egor@mail.ri', '+99789657857', '$2y$13$OE73gFAxOoA0CFvDqODtd.HiqKvHPF.uWrB/oYfUhmpLMcMeWPyIO', 0, 'qaxnd2XjBRJ8Fnpry85egqjyYLC5ANng'),
(38, 'egor-', 'egor-', 'egor-', 'egor-@mail.ru', '+33452345232', '$2y$13$maY/nnrh/hal0mqxuvZUKeW9WVuBOBmDqreujOsw1SDR/nV0jKpz2', 0, NULL);

--
-- Индексы сохранённых таблиц
--

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
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
