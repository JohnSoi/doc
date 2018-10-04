-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 04 2018 г., 12:54
-- Версия сервера: 10.1.31-MariaDB
-- Версия PHP: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_doc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_bin NOT NULL,
  `cost` text COLLATE utf8_bin NOT NULL,
  `dist` text COLLATE utf8_bin NOT NULL,
  `bonus` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id`, `name`, `cost`, `dist`, `bonus`) VALUES
(1, 'wtwert', '21312', '213213', '0'),
(2, 'Укол', '1500', 'Укол - анастезия', '0'),
(3, 'Осмотр', '2000', 'Осмотр пациента', '10');

-- --------------------------------------------------------

--
-- Структура таблицы `mest`
--

CREATE TABLE `mest` (
  `id` int(11) NOT NULL,
  `status` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `mest`
--

INSERT INTO `mest` (`id`, `status`, `value`) VALUES
(1, 'busy', 0),
(2, 'busy', 0),
(3, 'busy', 0),
(4, 'busy', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `operation`
--

CREATE TABLE `operation` (
  `id` int(11) NOT NULL,
  `date` text COLLATE utf8_bin NOT NULL,
  `client` text COLLATE utf8_bin NOT NULL,
  `sum` float NOT NULL,
  `type` text COLLATE utf8_bin NOT NULL,
  `typeSum` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `operation`
--

INSERT INTO `operation` (`id`, `date`, `client`, `sum`, `type`, `typeSum`) VALUES
(13, '26/09/2018 19:51', 'fewfgwef', 5000, 'Амбулатория', 'beznal'),
(14, '26/09/2018 19:51', 'fewfgwef', 5000, 'Амбулатория', 'beznal'),
(15, '26/09/2018 19:51', 'fewfgwef', 5000, 'Амбулатория', 'beznal'),
(16, '26/09/2018 19:51', 'fewfgwef', 5000, 'Амбулатория', 'beznal'),
(17, '26/09/2018 19:51', 'fewfgwef', 5000, 'Амбулатория', 'beznal'),
(18, '26/09/2018 19:51', 'fewfgwef', 5000, 'Амбулатория', 'beznal'),
(19, '26/09/2018 19:53', 'fewfgwef', 5000, 'Амбулатория', 'beznal'),
(20, '26/09/2018 19:54', 'fewfgwef', 5000, 'Амбулатория', 'beznal'),
(21, '28/09/2018 20:09', 'Иванов Иван', 500, 'Стационар', 'beznal'),
(22, '29/09/2018 9:06', 'Павлов П.П.', 50000, 'Амбулатория', 'beznal'),
(23, '03/10/2018 10:28', 'Павлов П.П.', 1000, 'Стационар', 'nal'),
(24, '03/10/2018 12:57', 'Павлов П.П.', -1000, 'Стационар', 'nal'),
(25, '03/10/2018 13:22', 'Павлов П.П.', -1000, 'Стационар', 'nal'),
(26, '03/10/2018 13:24', 'Павлов П.П.', -1000, 'Стационар', 'nal'),
(27, '03/10/2018 13:26', 'Павлов П.П.', -1000, 'Стационар', 'nal'),
(28, '03/10/2018 13:26', 'Павлов П.П.', -1000, 'Стационар', 'nal'),
(29, '03/10/2018 13:26', 'Павлов П.П.', -1000, 'Стационар', 'nal'),
(30, '03/10/2018 13:30', 'Павлов П.П.', -1000, 'Стационар', 'nal'),
(31, '03/10/2018 13:31', 'Павлов П.П.', -1000, 'Стационар', 'nal'),
(32, '03/10/2018 13:31', 'Павлов П.П.', -1000, 'Стационар', 'nal'),
(33, '03/10/2018 13:32', 'Павлов П.П.', -1000, 'Стационар', 'nal'),
(34, '03/10/2018 13:32', 'Павлов П.П.', -1000, 'Стационар', 'nal'),
(35, '03/10/2018 13:32', 'Павлов П.П.', -1000, 'Стационар', 'nal'),
(36, '03/10/2018 13:33', 'Павлов П.П.', -1000, 'Стационар', 'nal'),
(37, '03/10/2018 13:34', 'Павлов П.П.', -1, 'Стационар', 'nal'),
(38, '03/10/2018 19:29', 'Павлов П.П.', 1000, 'Стационар', 'nal'),
(39, '03/10/2018 19:31', 'Павлов П.П.', 1000, 'Стационар', 'nal'),
(40, '03/10/2018 19:32', 'Павлов П.П.', -1000, 'Стационар', 'nal'),
(41, '03/10/2018 19:41', 'Павлов П.П.', 4000, 'Стационар', 'nal'),
(42, '03/10/2018 19:41', 'Павлов П.П.', 1000, 'Стационар', 'beznal'),
(43, '04/10/2018 9:11', 'Павлов П.П.', -1000, 'Стационар', 'nal'),
(44, '04/10/2018 9:11', 'Павлов П.П.', -1000, 'Амбулатория', 'nal'),
(45, '04/10/2018 9:12', 'Павлов П.П.', 5000, 'Амбулатория', 'nal'),
(46, '04/10/2018 9:12', 'Павлов П.П.', -1000, 'Стационар', 'nal'),
(47, '04/10/2018 9:13', 'Павлов П.П.', 1000, 'Амбулатория', 'nal'),
(48, '04/10/2018 9:14', 'Павлов П.П.', 5000, 'Амбулатория', 'nal'),
(49, '04/10/2018 9:41', 'Горбатов Г.Г', 5000, 'Амбулатория', 'nal'),
(50, '04/10/2018 9:43', 'Иванов Иван Иванович', 5000, 'Амбулатория', 'beznal');

-- --------------------------------------------------------

--
-- Структура таблицы `param`
--

CREATE TABLE `param` (
  `id` int(11) NOT NULL,
  `name` varchar(90) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `param`
--

INSERT INTO `param` (`id`, `name`, `value`) VALUES
(1, 'Прием', '3000'),
(5, 'Последнее изменение', '04/10/2018'),
(7, 'Последняя копия', '04/10/2018 15:33'),
(8, 'Стоимость койко - места', '1000');

-- --------------------------------------------------------

--
-- Структура таблицы `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `fio` varchar(80) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `datebirthday` text NOT NULL,
  `tel` text NOT NULL,
  `sp_uslug` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `all_sum` int(11) NOT NULL,
  `doctor` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `sum` int(11) NOT NULL,
  `type` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `dist` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `dateIn` text NOT NULL,
  `mest` text NOT NULL,
  `status` int(11) NOT NULL,
  `sumNow` int(11) NOT NULL,
  `dateOut` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `patient`
--

INSERT INTO `patient` (`id`, `fio`, `datebirthday`, `tel`, `sp_uslug`, `all_sum`, `doctor`, `sum`, `type`, `dist`, `dateIn`, `mest`, `status`, `sumNow`, `dateOut`) VALUES
(9, 'Иванов Иван Иванович', '29/09/2005', '89656580306', '1-5-1,3-2-1', 0, 'Евгений Старков', 5000, 'Амбулатория', 'Был принят доктором:No Data', '29/09/2018 9:26', 'NULL', 1, 42624, ''),
(11, 'Павлов П.П.', '03/10/1998', '+7965658963', '', 0, 'jdvhdbh', 14000, 'Стационар', 'Был принят доктором:No Data', '03/10/2018 10:28', '4', 1, 5000, ''),
(12, 'Сергеев С.С', '04/10/2004', '89656580306', '', 0, 'jdvhdbh', 0, 'Стационар', 'Был принят доктором:No Data', '04/10/2018 9:29', '', 1, 0, ''),
(15, 'Иванов Иван Иванович', '04/07/2018', '89656580306', '1-0-0,2-0-0', 0, 'jdvhdbh', 5000, 'Стационар', 'Был принят доктором:No Data', '04/10/2018 9:33', 'no', 1, 0, ''),
(17, 'Горбатов Г.Г', '04/10/2018', '42134123', '1-5-1,2-5-1,1-0-0,2-0-0,1-5-1,2-0-0,1-0-0,2-0-0', 91248, 'jdvhdbh', 5000, 'Амбулатория', 'Был принят доктором:No Data', '04/10/2018 9:41', 'NULL', 1, 65436, '');

-- --------------------------------------------------------

--
-- Структура таблицы `usertbl`
--

CREATE TABLE `usertbl` (
  `id` int(11) NOT NULL,
  `fio` varchar(90) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `dol` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `value` int(11) NOT NULL,
  `money_prevMonth` int(11) NOT NULL,
  `money` int(11) NOT NULL,
  `uslugi_prevMonth` int(11) NOT NULL,
  `uslugi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `usertbl`
--

INSERT INTO `usertbl` (`id`, `fio`, `dol`, `username`, `password`, `value`, `money_prevMonth`, `money`, `uslugi_prevMonth`, `uslugi`) VALUES
(1, 'No Data', 'doc', 'Administrator', 'Creator01', 0, 0, 21000, 0, 0),
(4, 'Евгений Старков', 'su', '1234', '1234', 12, 0, 0, 0, 0),
(5, 'jdvhdbh', 'doc', '12', '12', 12, 0, 20636, 0, 9),
(6, 'Павлов А.А.', 'view', '1', '1', 12, 0, 0, 0, 0),
(7, 'Малой Админ', 'admin', '111', '111', 11, 0, 0, 0, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `mest`
--
ALTER TABLE `mest`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `operation`
--
ALTER TABLE `operation`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `param`
--
ALTER TABLE `param`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `usertbl`
--
ALTER TABLE `usertbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `mest`
--
ALTER TABLE `mest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `operation`
--
ALTER TABLE `operation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT для таблицы `param`
--
ALTER TABLE `param`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `usertbl`
--
ALTER TABLE `usertbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
