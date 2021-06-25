-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Июн 25 2021 г., 18:20
-- Версия сервера: 8.0.19
-- Версия PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int NOT NULL,
  `session_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_id` int NOT NULL,
  `products_id` int NOT NULL,
  `count` int NOT NULL DEFAULT '1',
  `price` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `session_id`, `user_id`, `products_id`, `count`, `price`) VALUES
(19, 'ohkpf18j7e66c04icmuva2jovhuvcblm', 1, 1, 2, 320),
(20, '111', 1, 2, 1, 50),
(26, 'h6m1sihmi2mnnhfmu1p77qnms6uq3kl4', 3, 1, 1, 320),
(27, 'h6m1sihmi2mnnhfmu1p77qnms6uq3kl4', 3, 3, 1, 25),
(129, 'ftplpmrssg2vglk9jlr5hp3h5ot1vgu3', 0, 3, 1, 25),
(130, 't3bja3dn4d238qo7i0qpfgsjpabv5o6k', 0, 2, 1, 50),
(132, 't3bja3dn4d238qo7i0qpfgsjpabv5o6k', 0, 3, 1, 25),
(133, 'q5o0nevrcvoisdphistot7mqo5vd88g9', 0, 2, 1, 50);

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int NOT NULL,
  `name` varchar(33) NOT NULL,
  `feedback` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_products` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `feedback`, `id_products`) VALUES
(22, 'Петруччо', 'Мне всё понравилось.', 0),
(23, 'Alex', 'норм...', 1),
(25, 'Luka', 'В целом не плохо, ага', 0),
(27, 'Лёха ', 'пицца ок ', 1),
(39, 'Vika', 'good tea', 2),
(55, 'Lex', 'Good Apple )))', 3),
(56, 'Serg', 'Потянет...', 0),
(58, 'Лёшка', 'еле тёплый чай...', 2),
(59, 'Василий', 'Да норм магазин', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `session_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `session_id`) VALUES
(6, 'Serg', '1234567', 't3bja3dn4d238qo7i0qpfgsjpabv5o6k'),
(7, 'user', '123', 'q5o0nevrcvoisdphistot7mqo5vd88g9'),
(8, 'Djon', '123', '5fpsuk7aqfv8ukmkls2k5bmr21bnp74g');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `filename` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int NOT NULL DEFAULT '0',
  `likes` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `filename`, `name`, `description`, `price`, `likes`) VALUES
(2, 'tea.png', 'Чай', 'Чёрный чай с лимоном и сахаром', 50, 0),
(3, 'apple.jpg', 'Яблоко', 'Красное яблоко местного производства', 25, 0),
(23, 'pizza.jpeg', 'Пицца', 'Пепперони', 350, 0),
(24, 'coffee.jpg', 'Кофе', 'Капучино', 75, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  `hash` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `hash`) VALUES
(1, 'admin', '123', '173774655560c24814a54ff6.74778545'),
(3, 'alex', '123456', '86754692060c0eaad2ded39.19163372');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
