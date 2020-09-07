-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 07 2020 г., 15:43
-- Версия сервера: 5.7.19
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `distribution`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id_category`, `category_name`) VALUES
(1, 'Без категории'),
(2, 'Первая категория'),
(3, 'Высшая категория');

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `id_group` varchar(6) NOT NULL,
  `id_specialization` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id_group`, `id_specialization`) VALUES
('3007', '08.01.71'),
('3807', '08.01.71'),
('3019', '09.02.07'),
('3719', '09.02.07'),
('3819', '09.02.07');

-- --------------------------------------------------------

--
-- Структура таблицы `profiles`
--

CREATE TABLE `profiles` (
  `id_profile` int(11) NOT NULL,
  `profile_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `profiles`
--

INSERT INTO `profiles` (`id_profile`, `profile_name`) VALUES
(1, 'Программирование'),
(2, 'Информатика'),
(3, 'Естественные науки'),
(4, 'Математические дисциплины'),
(5, 'Общеобразовательные предметы');

-- --------------------------------------------------------

--
-- Структура таблицы `specializations`
--

CREATE TABLE `specializations` (
  `id_specialization` varchar(8) NOT NULL,
  `specialization_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `specializations`
--

INSERT INTO `specializations` (`id_specialization`, `specialization_name`) VALUES
('08.01.71', 'операционная деятельность в логистике'),
('09.02.07', 'Информационные системы и программирвоание');

-- --------------------------------------------------------

--
-- Структура таблицы `subject-specialization`
--

CREATE TABLE `subject-specialization` (
  `id_subject` int(11) NOT NULL,
  `id_specialization` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `subject-specialization`
--

INSERT INTO `subject-specialization` (`id_subject`, `id_specialization`) VALUES
(1, '09.02.07'),
(2, '09.02.07'),
(2, '08.01.71'),
(3, '09.02.07'),
(3, '08.01.71'),
(4, '09.02.07'),
(4, '08.01.71'),
(5, '09.02.07'),
(5, '08.01.71'),
(6, '09.02.07'),
(7, '09.02.07'),
(8, '09.02.07'),
(9, '08.01.71'),
(9, '09.02.07'),
(10, '08.01.71'),
(10, '09.02.07');

-- --------------------------------------------------------

--
-- Структура таблицы `subjects`
--

CREATE TABLE `subjects` (
  `id_subject` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `subject_desc` varchar(255) DEFAULT NULL,
  `subject_hours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `subjects`
--

INSERT INTO `subjects` (`id_subject`, `id_profile`, `subject_name`, `subject_desc`, `subject_hours`) VALUES
(1, 1, 'МДК 09.03.02', 'Проектирование интерфейсов пользователей', 120),
(2, 2, 'Информатика', NULL, 80),
(3, 3, 'Физика', NULL, 72),
(4, 3, 'Химия', NULL, 72),
(5, 3, 'Биология', NULL, 72),
(6, 1, 'МДК 09.03.01', 'Тестирование', 100),
(7, 4, 'Элементы высшей математики', NULL, 100),
(8, 4, 'Дискретная математика', NULL, 80),
(9, 5, 'БЖД', NULL, 60),
(10, 5, 'ОБЖ', NULL, 72);

-- --------------------------------------------------------

--
-- Структура таблицы `teacher-category`
--

CREATE TABLE `teacher-category` (
  `id_teacher` int(11) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `teacher-category`
--

INSERT INTO `teacher-category` (`id_teacher`, `id_category`) VALUES
(1, 3),
(2, 2),
(3, 1),
(4, 2),
(5, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `teacher-profile`
--

CREATE TABLE `teacher-profile` (
  `id_teacher` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `teacher-profile`
--

INSERT INTO `teacher-profile` (`id_teacher`, `id_profile`) VALUES
(1, 1),
(1, 2),
(2, 4),
(3, 2),
(4, 3),
(5, 3),
(5, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `teachers`
--

CREATE TABLE `teachers` (
  `id_teacher` int(11) NOT NULL,
  `fio` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `teachers`
--

INSERT INTO `teachers` (`id_teacher`, `fio`, `email`, `password`) VALUES
(1, 'Овчинников Антон Викторович', 'strelokk.45@mail.ru', 'test1'),
(2, 'Погудина Лада \r\nГеннадьевна', 'pogudina.l@mail.ru', 'test2'),
(3, 'Солодова Дарья Сергеевна', 'solodovads@mail.ru', 'test3'),
(4, 'Овсепян Вардуи Робертовна', 'varduiiiii@gmail.com', 'test4'),
(5, 'Светлана Нифантьевна', 'sveeeeeeeeeta123@mail.ru', 'test4');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id_group`),
  ADD KEY `id_specialization` (`id_specialization`);

--
-- Индексы таблицы `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id_profile`);

--
-- Индексы таблицы `specializations`
--
ALTER TABLE `specializations`
  ADD PRIMARY KEY (`id_specialization`);

--
-- Индексы таблицы `subject-specialization`
--
ALTER TABLE `subject-specialization`
  ADD KEY `subject-specialization_ibfk_2` (`id_subject`),
  ADD KEY `id_specialization` (`id_specialization`);

--
-- Индексы таблицы `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id_subject`),
  ADD KEY `id_profile` (`id_profile`);

--
-- Индексы таблицы `teacher-category`
--
ALTER TABLE `teacher-category`
  ADD KEY `id_category` (`id_category`),
  ADD KEY `teacher-category_ibfk_2` (`id_teacher`);

--
-- Индексы таблицы `teacher-profile`
--
ALTER TABLE `teacher-profile`
  ADD KEY `id_profile` (`id_profile`),
  ADD KEY `teacher-profile_ibfk_2` (`id_teacher`);

--
-- Индексы таблицы `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id_teacher`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id_subject` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id_teacher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`id_specialization`) REFERENCES `specializations` (`id_specialization`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `subject-specialization`
--
ALTER TABLE `subject-specialization`
  ADD CONSTRAINT `subject-specialization_ibfk_1` FOREIGN KEY (`id_specialization`) REFERENCES `specializations` (`id_specialization`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject-specialization_ibfk_2` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id_subject`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`id_profile`) REFERENCES `profiles` (`id_profile`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `teacher-category`
--
ALTER TABLE `teacher-category`
  ADD CONSTRAINT `teacher-category_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher-category_ibfk_2` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id_teacher`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `teacher-profile`
--
ALTER TABLE `teacher-profile`
  ADD CONSTRAINT `teacher-profile_ibfk_1` FOREIGN KEY (`id_profile`) REFERENCES `profiles` (`id_profile`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher-profile_ibfk_2` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id_teacher`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
