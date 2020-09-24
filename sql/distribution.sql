-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 24 2020 г., 15:56
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
-- Структура таблицы `group-subject`
--

CREATE TABLE `group-subject` (
  `id_group` varchar(6) NOT NULL,
  `id_subject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `group-subject`
--

INSERT INTO `group-subject` (`id_group`, `id_subject`) VALUES
('3007', 11),
('3018', 11),
('3019', 11),
('3020в', 11),
('3021в', 11),
('3039', 11),
('3007', 12),
('3018', 12),
('3019', 12),
('3020в', 12),
('3021в', 12),
('3039', 12),
('3007', 13),
('3018', 13),
('3019', 13),
('3020в', 13),
('3021в', 13),
('3039', 13),
('3007', 14),
('3018', 14),
('3019', 14),
('3020в', 14),
('3021в', 14),
('3039', 14),
('3007', 15),
('3018', 15),
('3019', 15),
('3020в', 15),
('3021в', 15),
('3039', 15),
('3007', 16),
('3018', 16),
('3019', 16),
('3020в', 16),
('3021в', 16),
('3039', 16),
('3007', 17),
('3018', 17),
('3019', 17),
('3020в', 17),
('3021в', 17),
('3039', 17),
('3007', 18),
('3018', 18),
('3019', 18),
('3020в', 18),
('3021в', 18),
('3039', 18),
('3007', 19),
('3018', 19),
('3019', 19),
('3020в', 19),
('3021в', 19),
('3039', 19),
('3007', 20),
('3020в', 20),
('3021в', 20),
('3007', 21),
('3020в', 21),
('3021в', 21),
('3007', 22),
('3020в', 22),
('3021в', 22),
('3018', 23),
('3018', 24),
('3019', 24),
('3039', 24),
('3019', 25),
('3039', 25),
('3039', 26),
('3039', 27),
('3918', 28),
('3921в', 28),
('3939', 28),
('3939', 29),
('3939', 30),
('3939', 31),
('3939', 32),
('3939', 33),
('3939', 34),
('3939', 35),
('3939', 36),
('3939', 37),
('3939', 38),
('3939', 39),
('3939', 40),
('3939', 41),
('3939', 42),
('3939', 43),
('3939', 44),
('3939', 45),
('3921в', 46),
('3921в', 47),
('3921в', 48),
('3921в', 49),
('3921в', 50),
('3921в', 51),
('3921в', 52),
('3921в', 53),
('3921в', 54),
('3921в', 55),
('3921в', 56),
('3918', 57),
('3920в', 57),
('3921в', 57),
('3921в', 58),
('3921в', 59),
('3921в', 60),
('3921в', 61),
('3920в', 62),
('3920в', 63),
('3920в', 64),
('3920в', 65),
('3920в', 66),
('3920в', 67),
('3920в', 68),
('3918', 69),
('3920в', 69),
('3920в', 70),
('3920в', 71),
('3920в', 72),
('3920в', 73),
('3920в', 74),
('3920в', 75),
('3920в', 76),
('3920в', 77);

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
('3807в', '08.01.71'),
('3907', '08.01.71'),
('3810', '09.01.03'),
('3039', '09.02.06'),
('3939', '09.02.06'),
('3019', '09.02.07'),
('3719', '09.02.07'),
('3819', '09.02.07'),
('3819в', '09.02.07'),
('3018', '21.02.05'),
('3818', '21.02.05'),
('3918', '21.02.05'),
('3020в', '38.02.01'),
('3021в', '38.02.01'),
('3721в', '38.02.01'),
('3820в', '38.02.01'),
('3821в', '38.02.01'),
('3920в', '38.02.01'),
('3921в', '38.02.01');

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
(2, 'Информационные технологии'),
(3, 'Естественные науки'),
(4, 'Математические дисциплины'),
(5, 'Общеобразовательные предметы'),
(6, 'Русский язык и литература'),
(7, 'Иностранный язык (Английский)'),
(8, 'История'),
(9, 'Физическая культура'),
(10, 'Безопасность жизнедеятельности'),
(11, 'Экономические дисциплины'),
(12, 'Психология'),
(13, 'Документация'),
(14, 'Бухгалтерия'),
(15, 'Имущественные отношения');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id_role`, `role_name`) VALUES
(1, 'Админ'),
(2, 'Учитель');

-- --------------------------------------------------------

--
-- Структура таблицы `specializations`
--

CREATE TABLE `specializations` (
  `id_specialization` varchar(8) NOT NULL,
  `specialization_name` varchar(255) NOT NULL,
  `specialization_code` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `specializations`
--

INSERT INTO `specializations` (`id_specialization`, `specialization_name`, `specialization_code`) VALUES
('08.01.71', 'Операционная деятельность в логистике', '7'),
('09.01.03', 'Мастер по обработке цифровой информации', '10'),
('09.02.06', 'Сетевое и системное администрирование', '39'),
('09.02.07', 'Информационные системы и программирвоание', '19'),
('21.02.05', 'Земельно-имущественные отношени', '18'),
('38.02.01', 'Экономика и бухгалтерский учет (по отраслям)', '20в');

-- --------------------------------------------------------

--
-- Структура таблицы `subject-specialization`
--

CREATE TABLE `subject-specialization` (
  `id_subject` int(11) NOT NULL,
  `id_specialization` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(3, 3, 'Физика 72ч', NULL, 72),
(6, 1, 'МДК 09.03.01', 'Тестирование', 100),
(11, 6, 'Русский язык 78ч', '', 78),
(12, 6, 'Литература 73ч', '', 73),
(13, 7, 'Иностранный язык 117ч', 'Английский язык', 117),
(14, 4, 'Математика 234ч', '', 234),
(15, 8, 'История 117ч', '', 117),
(16, 9, 'Физическая культура 117ч', '', 117),
(17, 10, 'ОБЖ 70ч', 'Основы безопасности жизнедеятельности', 70),
(18, 3, 'Астрономия 36ч', '', 36),
(19, 6, 'Родная литература 44ч', '', 44),
(20, 11, 'Экономика 200ч', '', 200),
(21, 11, 'Право 162ч', '', 162),
(22, 2, 'Информатика/Введение в специальность 156ч', '', 156),
(23, 2, 'Информатика 162ч', '', 162),
(24, 3, 'Физика 200ч', '', 200),
(25, 2, 'Информатика 180ч', '', 180),
(26, 3, 'Химия 78ч', '', 78),
(27, 3, 'Биология 78ч', '', 78),
(28, 8, 'История 48ч', '', 48),
(29, 12, 'Психология общения 42ч', '', 42),
(30, 7, 'ИЯ в ПД 74ч', 'Иностранный язык в профессиональной деятельности', 74),
(31, 9, 'Физическая культура 74ч', '', 74),
(32, 6, 'Русский язык и культура речи 48ч', '', 48),
(33, 4, 'Элементы высшей математики 80ч', '', 80),
(34, 4, 'Дискретная математика 42ч', 'Дискретная математика с элементами математической логики', 42),
(35, 4, 'Теория вероятностей и математическая статистика 42ч', '', 42),
(36, 2, 'Операционные системы и среды 64ч', '', 64),
(37, 2, 'Архитектура аппаратных средств 46ч', '', 46),
(38, 2, 'Адаптивные информационные и коммуникационные технологии 48ч', '', 48),
(39, 1, 'Основы проектирования БД 64ч', '', 64),
(40, 2, 'Основы электротехники 46ч', '', 46),
(41, 1, 'Инженерная компьютерная графика 64ч', '', 64),
(42, 2, 'Основы теории информации 68ч', '', 68),
(43, 2, 'Технологии физического уровня передачи данных 64ч', '', 64),
(44, 1, 'Проектирование и дизайн информационных систем 226ч', '', 226),
(45, 1, 'Разработка кода информационных систем 192ч', '', 192),
(46, 8, 'Философия 40ч', '', 40),
(47, 7, 'ИЯ в ПД 72ч', 'Иностранный язык в профессиональной деятельности', 72),
(48, 9, 'Адаптивная физическая культура 72ч', '', 72),
(49, 12, 'Психология общения 40ч', '', 40),
(50, 6, 'Русский язык и культура речи 72ч', '', 72),
(51, 4, 'Элементы высшей математики 48ч', '', 48),
(52, 3, 'Экологические основы природопользования 40ч', '', 40),
(53, 11, 'Экономика организации 72ч', '', 72),
(54, 11, 'Организация бухгалтерского учёта в банках 40ч', '', 40),
(55, 11, 'Бухгалтерский учёт 48ч', '', 48),
(56, 13, 'Документационное обеспечение управления 40ч', '', 40),
(57, 10, 'БЖД 68ч', 'Безопасность жизнедеятельности', 68),
(58, 11, 'Организация безналичных расчётов 40ч', '', 40),
(59, 11, 'Кассовые операции банков 156ч', '', 156),
(60, 11, 'Международные расчёты по экспортно-импортным операциям 60ч', '', 60),
(61, 11, 'Выполнение работ по профессии \"Агент банка\" 228ч', '', 228),
(62, 8, 'Основы философии 34ч', '', 34),
(63, 8, 'История 51ч', '', 51),
(64, 7, 'ИЯ в ПД 68ч', 'Иностранный язык в профессиональной деятельности', 68),
(65, 9, 'Физическая культура 68ч', '', 68),
(66, 12, 'Психология общения 34ч', '', 34),
(67, 6, 'Русский язык и культура речи 68ч', '', 68),
(68, 4, 'Математика 51ч', '', 51),
(69, 3, 'Экологические основы природопользования 34ч', '', 34),
(70, 11, 'Экономика организации 85ч', '', 85),
(71, 14, 'Статистика 34ч', '', 34),
(72, 14, 'Основы бухгалтерского учёта 68ч', '', 68),
(73, 13, 'Документационное обеспечение управления 34ч', '', 34),
(74, 14, 'Практические основы бухгалтерского учета активов организации 161ч', '', 161),
(75, 14, 'Практические основы бухгалтерского учета источников формирования активов организации 177ч', '', 177),
(76, 14, 'Бухгалтерская технология проведения и оформления инвентаризации 103ч', '', 103),
(77, 14, 'Выполнение работ по профессии \"Кассир\" 86ч', '', 86),
(78, 8, 'Основы философии 48ч', '', 48),
(79, 7, 'Иностранный язык 70ч', '', 70),
(80, 9, 'Физическая культура 70ч', '', 70),
(81, 6, 'Русский язык и культура речи 54ч', '', 54),
(82, 4, 'Математика 48ч', '', 48),
(83, 11, 'Основы экономической теории 80ч', '', 80),
(84, 11, 'Экономика организации 76ч', '', 76),
(85, 14, 'Статистика 48ч', '', 48),
(86, 13, 'ДОУ 68ч', 'Документационное обеспечение управления', 68),
(87, 14, 'Бухгалтерский учёт и налогообложение 88ч', '', 88),
(88, 14, 'Финансы, денежное обращение и кредит 52ч', '', 52),
(89, 15, 'Управление территориями и недвижимым имуществом 216ч', '', 216),
(90, 15, 'Геодезия с основами картографии и картографического черчения 192ч', '', 192);

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
(19, 1),
(17, 4),
(12, 6),
(13, 7),
(14, 7),
(15, 8),
(16, 9),
(18, 11);

-- --------------------------------------------------------

--
-- Структура таблицы `teachers`
--

CREATE TABLE `teachers` (
  `id_teacher` int(11) NOT NULL,
  `fio` varchar(255) NOT NULL,
  `id_category` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `teachers`
--

INSERT INTO `teachers` (`id_teacher`, `fio`, `id_category`, `email`, `password`, `id_role`) VALUES
(12, 'Кабанова Людмила Геннадьевна', 2, 'kabanova@mail.ru', '$2y$10$oGqchqN5YiklPqM9PBamB.0h1Khtd217vCb7YLazbOKZG8GO9hZ9O', 2),
(13, 'Сидорова Светлана Витальевна', 2, 'sidorova@mail.ru', '$2y$10$d7/5f/H1odABsqw92L8gTul63NS/zpi61JsYwglRSkj1D1hs9jSNm', 2),
(14, 'Хусаинова Индира Султановна', 3, 'husainova@mail.ru', '$2y$10$RKFyKRW8SkbDkBPiay9vqeeeT0CPLi0lHa56zm2bNEntMq3HtLxC2', 2),
(15, 'Галлиулина Эльвира Сайфуловна', 3, 'galliulina@mail.ru', '$2y$10$9HmuJYmd2i/Eo1AU/F1aj.Ck0msD4tGY7/MDvwcG4LsrHhdHke3j6', 2),
(16, 'Мелешкин Илья Петрович', 2, 'meleshkin@mail.ru', '$2y$10$kEavoIMSt/AIwoZS9fMt6OpFDBauV1sg8SRd5jJf15BxADY6wk5fW', 2),
(17, 'Погудина Лада геннадьевна', 3, 'pogudina@mail.ru', '$2y$10$amdFZGQmmpsqzOXUkcm1M.4nC12E8yapuOHszD1HxeerwU8TEFkhu', 2),
(18, 'Соларёва Юлия Сергеевна', 3, 'solareva@mail.ru', '$2y$10$9vHbPMWgCfXNv1KHQjPII.3RMjwqyww0oiE7MCu6Q2v5qaCV1vIqa', 2),
(19, 'Овчинников Антон Викторович', 3, 'ovchinnikov@mail.ru', '$2y$10$p4Mbo14MU/0nYx0pJMenteaaVpdig/QEtjU8vQ7soXuT.3P/hvkYS', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Индексы таблицы `group-subject`
--
ALTER TABLE `group-subject`
  ADD PRIMARY KEY (`id_group`,`id_subject`),
  ADD KEY `id_group` (`id_group`),
  ADD KEY `id_subject` (`id_subject`);

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
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Индексы таблицы `specializations`
--
ALTER TABLE `specializations`
  ADD PRIMARY KEY (`id_specialization`);

--
-- Индексы таблицы `subject-specialization`
--
ALTER TABLE `subject-specialization`
  ADD PRIMARY KEY (`id_subject`,`id_specialization`),
  ADD KEY `subject-specialization_ibfk_2` (`id_subject`),
  ADD KEY `id_specialization` (`id_specialization`);

--
-- Индексы таблицы `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id_subject`),
  ADD KEY `id_profile` (`id_profile`);

--
-- Индексы таблицы `teacher-profile`
--
ALTER TABLE `teacher-profile`
  ADD PRIMARY KEY (`id_teacher`,`id_profile`),
  ADD KEY `id_profile` (`id_profile`),
  ADD KEY `teacher-profile_ibfk_2` (`id_teacher`);

--
-- Индексы таблицы `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id_teacher`),
  ADD KEY `Id_role` (`id_role`),
  ADD KEY `id_category` (`id_category`);

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
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id_subject` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT для таблицы `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id_teacher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `group-subject`
--
ALTER TABLE `group-subject`
  ADD CONSTRAINT `group-subject_ibfk_1` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id_subject`),
  ADD CONSTRAINT `group-subject_ibfk_2` FOREIGN KEY (`id_group`) REFERENCES `groups` (`id_group`);

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
-- Ограничения внешнего ключа таблицы `teacher-profile`
--
ALTER TABLE `teacher-profile`
  ADD CONSTRAINT `teacher-profile_ibfk_1` FOREIGN KEY (`id_profile`) REFERENCES `profiles` (`id_profile`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher-profile_ibfk_2` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id_teacher`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teachers_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
