-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 07 2018 г., 17:12
-- Версия сервера: 5.6.37
-- Версия PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `DocStud`
--

-- --------------------------------------------------------

--
-- Структура таблицы `answers`
--

CREATE TABLE `answers` (
  `id` int(33) NOT NULL,
  `order_answer` int(33) NOT NULL,
  `content` varchar(60) NOT NULL,
  `questions_id` int(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `answers`
--

INSERT INTO `answers` (`id`, `order_answer`, `content`, `questions_id`) VALUES
(1, 0, 'когнитивной психологии', 1),
(2, 1, 'гештальтпсихологии', 1),
(3, 2, 'бихевиоризме', 1),
(4, 3, 'отечественной психологии', 1),
(5, 0, 'коррекция социальных норм поведения', 2),
(6, 1, 'изучение законов психической деятельности ', 2),
(7, 2, 'разработка проблем истории психологии', 2),
(8, 3, 'совершенствование методов исследования', 2),
(9, 0, 'темперамент', 3),
(10, 1, 'характер', 3),
(11, 2, 'ощущение ', 3),
(12, 3, 'способности', 3),
(13, 0, 'информация', 4),
(14, 1, 'объект', 4),
(15, 2, 'предмет', 4),
(16, 3, 'информатика', 4),
(17, 0, 'понятной', 5),
(18, 1, 'полной', 5),
(19, 2, 'полезной', 5),
(20, 3, 'актуальной', 5),
(21, 0, 'органов слуха', 6),
(22, 1, 'органов зрения', 6),
(23, 2, 'органов обоняния', 6),
(24, 3, 'органов осязания', 6),
(25, 0, '1 байт', 7),
(26, 1, '1 Кб', 7),
(27, 2, '2 байта', 7),
(28, 3, '1 бит', 7),
(29, 0, 'процесс хранения', 8),
(30, 1, 'процесс передачи', 8),
(31, 2, 'процесс получения', 8),
(32, 3, 'процесс защиты', 8),
(33, 0, '1024 Кбайт', 9),
(34, 1, '4 бит', 9),
(35, 2, '8 бит', 9),
(36, 3, '10 Мбайт', 9),
(37, 0, 'нулей и единиц', 10),
(38, 1, 'из точек и тире', 10),
(39, 2, 'из 10 различных знаков', 10),
(40, 3, 'из одного знака', 10),
(41, 0, '92 бита', 11),
(42, 1, '220 бит', 11),
(43, 2, '456 бит', 11),
(44, 3, '512 бит', 11),
(45, 0, '384 бита', 12),
(46, 1, '192 бита', 12),
(47, 2, '256 бит', 12),
(48, 3, '48 бит', 12),
(49, 0, '80 бит', 13),
(50, 1, '70 байт', 13),
(51, 2, '80 байт', 13),
(52, 3, '560 байт', 13);

-- --------------------------------------------------------

--
-- Структура таблицы `building`
--

CREATE TABLE `building` (
  `id` int(33) NOT NULL,
  `name` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблица зданий';

--
-- Дамп данных таблицы `building`
--

INSERT INTO `building` (`id`, `name`) VALUES
(1, '1 здание'),
(2, '2 здание'),
(3, '3 здание'),
(4, '4 здание'),
(5, '5 здание'),
(6, '6 здание'),
(7, '7 здание');

-- --------------------------------------------------------

--
-- Структура таблицы `correct_answer`
--

CREATE TABLE `correct_answer` (
  `id` int(11) NOT NULL COMMENT 'id вопроса',
  `number` int(33) NOT NULL,
  `test_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблица воросов';

--
-- Дамп данных таблицы `correct_answer`
--

INSERT INTO `correct_answer` (`id`, `number`, `test_id`) VALUES
(1, 4, 1),
(2, 2, 1),
(3, 3, 1),
(4, 1, 2),
(5, 1, 2),
(6, 2, 2),
(7, 1, 2),
(8, 3, 2),
(9, 3, 2),
(10, 2, 2),
(11, 3, 2),
(12, 1, 2),
(13, 2, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `day`
--

CREATE TABLE `day` (
  `id` int(33) NOT NULL,
  `name` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблица дней';

--
-- Дамп данных таблицы `day`
--

INSERT INTO `day` (`id`, `name`) VALUES
(1, 'Пн'),
(2, 'Вт'),
(3, 'Ср'),
(4, 'Чт'),
(5, 'Пт'),
(6, 'Сб');

-- --------------------------------------------------------

--
-- Структура таблицы `institute`
--

CREATE TABLE `institute` (
  `id` int(11) NOT NULL COMMENT 'id института',
  `name` varchar(30) NOT NULL COMMENT 'название института'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='таблица институтов';

--
-- Дамп данных таблицы `institute`
--

INSERT INTO `institute` (`id`, `name`) VALUES
(1, 'KAI');

-- --------------------------------------------------------

--
-- Структура таблицы `lecture`
--

CREATE TABLE `lecture` (
  `id` int(11) NOT NULL COMMENT 'id лекции',
  `name` varchar(30) NOT NULL,
  `content` text NOT NULL COMMENT 'текст лекции',
  `stud_group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='таблица лекции';

-- --------------------------------------------------------

--
-- Структура таблицы `lesson`
--

CREATE TABLE `lesson` (
  `id` int(33) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблица пар';

--
-- Дамп данных таблицы `lesson`
--

INSERT INTO `lesson` (`id`, `name`) VALUES
(1, 'Метрология'),
(2, 'Электротехника'),
(3, 'Теория автоматического управления'),
(4, 'Технические измерения энергообеспечения'),
(5, 'Физра'),
(6, 'Энергообеспечение предприятия'),
(7, 'Основы проектирования АСУ'),
(8, 'Программирование');

-- --------------------------------------------------------

--
-- Структура таблицы `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL COMMENT 'id сообщения',
  `content` text NOT NULL COMMENT 'текст сообщения',
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'время',
  `user_id` int(11) NOT NULL COMMENT 'id пользователя',
  `stud_group_id` int(11) NOT NULL,
  `teacher_id` int(30) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='таблица сообщений';

--
-- Дамп данных таблицы `message`
--

INSERT INTO `message` (`id`, `content`, `time`, `user_id`, `stud_group_id`, `teacher_id`) VALUES
(1, '6754', '2018-01-11 20:44:14', 0, 2, 2),
(5, '23241', '2018-01-11 20:49:44', 2, 0, 2),
(51, 'dzfg', '2018-01-26 14:28:51', 0, 1, 2),
(52, 'drg', '2018-01-26 14:28:56', 0, 2, 2),
(53, 'dfhd', '2018-01-26 14:29:01', 1, 0, 2),
(54, 'dfhg', '2018-01-26 14:29:04', 2, 0, 2),
(55, 'fghf', '2018-01-26 14:29:09', 4, 0, 2),
(56, 'fghf', '2018-01-26 14:37:24', 4, 0, 2),
(57, 'fdgd', '2018-01-26 14:37:34', 10, 0, 2),
(70, 'juygy', '2018-02-02 22:32:24', 7, 0, 2),
(74, 'khjbvhjbk', '2018-02-03 23:17:43', 2, 1, 0),
(75, 'gcvnvv', '2018-02-04 11:29:18', 2, 1, 0),
(76, 'dssvsdvsd', '2018-02-06 19:20:29', 2, 1, 0),
(77, '123', '2018-02-06 19:20:36', 2, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL COMMENT 'id вопроса',
  `content` text NOT NULL COMMENT 'текст вопроса',
  `test_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблица воросов';

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `content`, `test_id`) VALUES
(1, 'Факты, закономерности и механизмы психики являются предметом изучения в:', 1),
(2, 'Основной задачей психологии является:', 1),
(3, 'К психическим процессам относится:', 1),
(4, 'Сведения об объектах окружающего нас мира это:', 2),
(5, 'Информацию, изложенную на доступном для получателя языке называют:', 2),
(6, 'Наибольший объем информации человек получает при помощи:', 2),
(7, 'Двоичный код каждого символа при кодировании текстовой информации (в кодах ASCII) занимает в памяти персонального компьютера:', 2),
(8, 'Измерение температуры представляет собой', 2),
(9, 'Что такое 1 байт?', 2),
(10, 'Алфавит азбуки Морзе состоит:', 2),
(11, 'Считая, что каждый символ кодируется одним байтом, определите, чему равен информационный объем следующего высказывания Жан-Жака Руссо: Тысячи путей ведут к заблуждению, к истине – только один.', 2),
(12, 'В кодировке Unicode на каждый символ отводится два байта. Определите информационный объем слова из двадцати четырех символов в этой кодировке.', 2),
(13, 'Метеорологическая станция ведет наблюдение за влажностью воздуха. Результатом одного измерения является целое число от 0 до 100 процентов, которое записывается при помощи минимально возможного количества бит. Станция сделала 80 измерений. Определите информационный объем результатов наблюдений.', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `stud_group`
--

CREATE TABLE `stud_group` (
  `id` int(11) NOT NULL COMMENT 'id группы',
  `name` varchar(20) NOT NULL COMMENT 'название группы',
  `year` year(4) NOT NULL COMMENT 'год',
  `institute_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='таблица группы';

--
-- Дамп данных таблицы `stud_group`
--

INSERT INTO `stud_group` (`id`, `name`, `year`, `institute_id`) VALUES
(1, '3339', 2017, 1),
(2, '3338', 2017, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `stud_table`
--

CREATE TABLE `stud_table` (
  `id` int(11) NOT NULL COMMENT 'id таблицы',
  `table_order` int(33) NOT NULL,
  `tr` int(20) DEFAULT NULL COMMENT 'количество ячеек по вертикали',
  `day_id` int(33) NOT NULL,
  `time_lesson` varchar(33) NOT NULL,
  `week_id` int(33) NOT NULL,
  `lesson_id` int(33) NOT NULL,
  `type_id` int(33) NOT NULL,
  `room_lesson` varchar(33) NOT NULL,
  `building_id` int(33) NOT NULL,
  `teacher_id` int(33) NOT NULL,
  `stud_group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='таблица таблиц';

--
-- Дамп данных таблицы `stud_table`
--

INSERT INTO `stud_table` (`id`, `table_order`, `tr`, `day_id`, `time_lesson`, `week_id`, `lesson_id`, `type_id`, `room_lesson`, `building_id`, `teacher_id`, `stud_group_id`) VALUES
(1, 1, 8, 1, '9:30', 1, 2, 1, '234', 2, 2, 1),
(2, 2, 8, 2, '10:40', 2, 3, 2, '345', 3, 3, 1),
(3, 3, 8, 3, '11:30', 2, 4, 2, '456', 4, 4, 1),
(4, 4, 8, 4, '12:50', 1, 5, 3, '567', 5, 5, 1),
(5, 5, 8, 5, '13:30', 1, 4, 2, '555', 6, 3, 1),
(6, 6, 8, 5, '14:30', 1, 3, 3, '666', 5, 1, 1),
(7, 7, 8, 6, '15:30', 2, 6, 1, '777', 5, 5, 1),
(8, 1, 7, 1, '8:00', 3, 1, 1, '654', 6, 1, 2),
(10, 3, 7, 1, '11:30', 2, 7, 3, '456', 6, 5, 2),
(11, 4, 7, 2, '8:00', 3, 6, 2, '546', 5, 8, 2),
(12, 5, 7, 5, '8:00', 3, 4, 1, '346', 5, 6, 2),
(13, 6, 7, 5, '14:00', 2, 3, 4, '546', 1, 2, 2),
(14, 7, 7, 6, '9:40', 2, 2, 2, '634', 2, 3, 2),
(15, 8, 8, 6, '16:40', 1, 7, 2, '888', 4, 4, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL COMMENT 'id теста',
  `max` int(22) NOT NULL COMMENT 'количество вопросов',
  `name` text NOT NULL COMMENT 'название теста',
  `teacher_id` int(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='таблица тестов';

--
-- Дамп данных таблицы `test`
--

INSERT INTO `test` (`id`, `max`, `name`, `teacher_id`) VALUES
(1, 3, 'Тест по педагогике. Часть 1.', 2),
(2, 10, 'Тест по информатике', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `test2group`
--

CREATE TABLE `test2group` (
  `id` int(33) NOT NULL,
  `test_id` int(33) NOT NULL,
  `group_id` int(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `test2group`
--

INSERT INTO `test2group` (`id`, `test_id`, `group_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `type`
--

CREATE TABLE `type` (
  `id` int(33) NOT NULL,
  `name` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблица типов пар';

--
-- Дамп данных таблицы `type`
--

INSERT INTO `type` (`id`, `name`) VALUES
(1, 'Лекция'),
(2, 'Практ.'),
(3, 'Лаб.'),
(4, 'Конс.');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL COMMENT 'id пользователя',
  `name` varchar(30) NOT NULL COMMENT 'имя пользователя',
  `surname` varchar(30) NOT NULL COMMENT 'фамилия пользователя',
  `email` varchar(30) NOT NULL COMMENT 'емейл пользователя',
  `password` varchar(20) NOT NULL COMMENT 'пароль пользователя',
  `group_id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='таблица пользователя';

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `email`, `password`, `group_id`, `user_type_id`) VALUES
(1, 'Владислав', 'Кочев', 'student11@mail.ru', 'student11', 1, 2),
(2, 'Кирилл', 'Кириллов', 'starosta1@mail.ru', 'starosta1', 1, 1),
(3, 'Роман', 'Федотов', 'student12@mail.ru', 'student12', 1, 2),
(4, 'Азат', 'Ярулин', 'starosta2@mail.ru', 'starosta2', 2, 1),
(7, 'Ильназ', 'Мухаметшин', 'student21@mail.ru', 'student21', 2, 2),
(9, 'Георгий', 'Беруашвили', 'student22@mail.ru', 'student22', 2, 2),
(10, 'Леша', 'Ковриков', 'student13@mail.ru', 'student13', 1, 2),
(12, 'Виктор', 'Дроботов', 'student14@mail.ru', 'student14', 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `user_answer`
--

CREATE TABLE `user_answer` (
  `id` int(11) NOT NULL COMMENT 'id вопроса',
  `number` int(33) NOT NULL,
  `user_id` int(33) NOT NULL,
  `test_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблица воросов';

--
-- Дамп данных таблицы `user_answer`
--

INSERT INTO `user_answer` (`id`, `number`, `user_id`, `test_id`) VALUES
(1, 1, 2, 1),
(2, 2, 2, 1),
(3, 4, 2, 1),
(4, 2, 1, 1),
(5, 3, 1, 1),
(6, 1, 1, 1),
(7, 4, 3, 1),
(8, 2, 3, 1),
(9, 3, 3, 1),
(10, 3, 4, 2),
(11, 2, 4, 2),
(12, 1, 4, 2),
(13, 2, 4, 2),
(14, 3, 4, 2),
(15, 1, 4, 2),
(16, 2, 4, 2),
(17, 1, 4, 2),
(18, 3, 4, 2),
(19, 4, 4, 2),
(20, 1, 2, 2),
(21, 1, 2, 2),
(22, 2, 2, 2),
(23, 1, 2, 2),
(24, 2, 2, 2),
(25, 2, 2, 2),
(26, 2, 2, 2),
(27, 3, 2, 2),
(28, 1, 2, 2),
(29, 2, 2, 2),
(30, 2, 9, 2),
(31, 1, 9, 2),
(32, 3, 9, 2),
(33, 2, 9, 2),
(34, 3, 9, 2),
(35, 1, 9, 2),
(36, 2, 9, 2),
(37, 3, 9, 2),
(38, 4, 9, 2),
(39, 3, 9, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `user_teacher`
--

CREATE TABLE `user_teacher` (
  `id` int(11) NOT NULL COMMENT 'id учителя',
  `name` varchar(30) NOT NULL COMMENT 'имя учителя',
  `surname` varchar(30) NOT NULL COMMENT 'фамилия учителя',
  `institute_id` int(30) NOT NULL,
  `email` varchar(30) NOT NULL COMMENT 'емейл учителя',
  `password` varchar(30) NOT NULL COMMENT 'пароль учителя',
  `user_type_id` int(30) NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='таблица учителей';

--
-- Дамп данных таблицы `user_teacher`
--

INSERT INTO `user_teacher` (`id`, `name`, `surname`, `institute_id`, `email`, `password`, `user_type_id`) VALUES
(1, 'Михаил', 'Щеглов', 1, 'teacher1@mail.ru', 'teacher1', 3),
(2, 'Арнольд', 'Балоев', 1, 'teacher2@mail.ru', 'teacher2', 3),
(3, 'Рустам', 'Марданов', 1, 'teacher3@mail.ru', 'teacher3', 3),
(4, 'Владимир', 'Бородин', 1, 'teacher4@mail.ru', 'teacher4', 3),
(5, 'Борис', 'Староостин', 1, 'teacher5@mail.ru', 'teacher5', 3),
(6, 'Александр', 'Маликов', 1, 'teacher6@mail.ru', 'teacher6', 3),
(7, 'Анатолий', 'Аузяк', 1, 'teacher7@mail.ru', 'teacher7', 3),
(8, 'Александр', 'Теперин', 1, 'teacher4@mail.ru', 'teacher4', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `user_test`
--

CREATE TABLE `user_test` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_test`
--

INSERT INTO `user_test` (`id`, `user_id`, `test_id`) VALUES
(1, 2, 1),
(2, 1, 1),
(3, 3, 1),
(4, 4, 2),
(5, 2, 2),
(6, 9, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL COMMENT 'id типа',
  `name` varchar(30) NOT NULL COMMENT 'название типа'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='таблица типов';

--
-- Дамп данных таблицы `user_type`
--

INSERT INTO `user_type` (`id`, `name`) VALUES
(1, 'Староста'),
(2, 'Студент'),
(3, 'Преподователь');

-- --------------------------------------------------------

--
-- Структура таблицы `week`
--

CREATE TABLE `week` (
  `id` int(33) NOT NULL,
  `name` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблица неделей';

--
-- Дамп данных таблицы `week`
--

INSERT INTO `week` (`id`, `name`) VALUES
(1, 'Чет.'),
(2, 'Нечет.'),
(3, '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `correct_answer`
--
ALTER TABLE `correct_answer`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `day`
--
ALTER TABLE `day`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `institute`
--
ALTER TABLE `institute`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lecture`
--
ALTER TABLE `lecture`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `stud_group`
--
ALTER TABLE `stud_group`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `stud_table`
--
ALTER TABLE `stud_table`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `test2group`
--
ALTER TABLE `test2group`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_answer`
--
ALTER TABLE `user_answer`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_teacher`
--
ALTER TABLE `user_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_test`
--
ALTER TABLE `user_test`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `week`
--
ALTER TABLE `week`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(33) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT для таблицы `building`
--
ALTER TABLE `building`
  MODIFY `id` int(33) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `correct_answer`
--
ALTER TABLE `correct_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id вопроса', AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `day`
--
ALTER TABLE `day`
  MODIFY `id` int(33) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `institute`
--
ALTER TABLE `institute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id института', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `lecture`
--
ALTER TABLE `lecture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id лекции';
--
-- AUTO_INCREMENT для таблицы `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id` int(33) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id сообщения', AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id вопроса', AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `stud_group`
--
ALTER TABLE `stud_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id группы', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `stud_table`
--
ALTER TABLE `stud_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id таблицы', AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id теста', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `test2group`
--
ALTER TABLE `test2group`
  MODIFY `id` int(33) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `type`
--
ALTER TABLE `type`
  MODIFY `id` int(33) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id пользователя', AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `user_answer`
--
ALTER TABLE `user_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id вопроса', AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT для таблицы `user_teacher`
--
ALTER TABLE `user_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id учителя', AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `user_test`
--
ALTER TABLE `user_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id типа', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `week`
--
ALTER TABLE `week`
  MODIFY `id` int(33) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
