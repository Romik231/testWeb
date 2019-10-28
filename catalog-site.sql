-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 28 2019 г., 14:20
-- Версия сервера: 5.7.25
-- Версия PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `catalog-site`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(25) NOT NULL,
  `short_description` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `active_category` int(11) NOT NULL,
  `good_id` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `title`, `short_description`, `description`, `active_category`, `good_id`) VALUES
(1, 'Процессоры', 'Процессоры_Short', 'Процессоры_Full_description', 1, 0),
(2, 'Материнские платы', 'Материнские платы_short', 'Материнские платы_Full_Description', 1, 0),
(3, 'Видеокарты', 'Видеокарты_short', 'Видеокарты_Full_Description', 1, 0),
(4, 'Оперативная память', 'Оперативная память_short', 'Оперативная память_Full_Description', 1, 0),
(5, 'Жесткие диски', 'Жесткие диски_short', 'Жесткие диски_Full_Description', 1, 0),
(6, 'Корпуса', 'Корпуса_short', 'Корпуса_Full_Description', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `title` varchar(25) NOT NULL,
  `short_description` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `count_stock` int(10) NOT NULL DEFAULT '0',
  `active_good` int(11) NOT NULL,
  `possibility_of_order` int(11) NOT NULL DEFAULT '1',
  `category_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `title`, `short_description`, `description`, `count_stock`, `active_good`, `possibility_of_order`, `category_id`) VALUES
(1, 'AMD Athlon X4 840 OEM', 'Процессор AMD Athlon X4 840 OEM_short', 'Процессор AMD Athlon X4 840 OEM_Full_Description', 3, 1, 1, 1),
(2, ' Intel Celeron G3900 BOX', 'Процессор Intel Celeron G3900 BOX_short', 'Процессор Intel Celeron G3900 BOX_Full_Description', 5, 1, 1, 1),
(3, 'GIGABYTE GA-E2500N', 'Материнская плата GIGABYTE GA-E2500N_short', 'Материнская плата GIGABYTE GA-E2500N_Full_Description', 2, 1, 1, 2),
(4, 'MSI H110M PRO-D', 'Материнская плата MSI H110M PRO-D_short', 'Материнская плата MSI H110M PRO-D_Full_Descripption', 6, 1, 1, 2),
(5, 'GeForce GT 710 LP', 'Видеокарта GeForce GT 710 LP [GV-N710D5-1GL]', 'Видеокарта GIGABYTE GeForce GT 710 LP [GV-N710D5-1GL]_Full_Description', 1, 1, 1, 3),
(6, 'GeForce GTX 1660', 'Видеокарта Palit GeForce GTX 1060', 'Видеокарта Palit GeForce GTX 1060 JETSTREAM [NE51060015F9-1060J]', 4, 1, 1, 3),
(7, 'AMD Radeon R5', 'Оперативная память AMD Radeon R5', 'Оперативная память AMD Radeon R5 Entertainment Series [R532G1601U1SL-U] 2 ГБ', 8, 1, 1, 4),
(8, 'Corsair Value Select', 'Оперативная память Corsair Value Select', 'Оперативная память Corsair Value Select [CMV4GX4M1A2666C18] 4 ГБ', 0, 0, 1, 4),
(9, 'Жесткий диск Toshiba', '500 ГБ Жесткий диск Toshiba', '500 ГБ Жесткий диск Toshiba L200 Slim [HDWK105UZSVA]', 0, 0, 0, 5),
(10, 'Жесткий диск Seagate', '500 ГБ Жесткий диск Seagate', '500 ГБ Жесткий диск Seagate BarraCuda Pro [ST500LM034]', 2, 1, 1, 5),
(11, 'Корпус DEXP', 'Корпус DEXP DC-101B черный', 'Корпус DEXP DC-101B черный_Full_Description', 0, 0, 1, 6),
(12, 'Корпус GiNZZU', 'Корпус GiNZZU C200 черный', 'Корпус GiNZZU C200 черный_Full_Description', 0, 0, 0, 6);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
