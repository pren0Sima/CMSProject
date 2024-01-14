-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Време на генериране: 14 яну 2024 в 09:18
-- Версия на сървъра: 10.4.32-MariaDB
-- Версия на PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данни: `cms`
--

-- --------------------------------------------------------

--
-- Структура на таблица `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT 'Untitled',
  `ingredients` text DEFAULT 'No ingredients',
  `instructions` mediumtext DEFAULT 'No instructions',
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Схема на данните от таблица `recipes`
--

INSERT INTO `recipes` (`id`, `title`, `ingredients`, `instructions`, `date`) VALUES
(11, 'Гъбена суп', 'Гъби, Лук, Чесън, Масло, Брашно, Сметана, Вино, Бульон', 'Слагаме на котлона в дълбока тенджера масло и нарязан лук. Пържим докато лукът не придобие жълтеникав отенък. Тогава добавяме гъбите. Пържим още 10 минути със затворен похлупак. След това добавяме настърган чесън. Пържим още 3 минути. Добавяме брашно и разбъркваме. После добавяме малко вино и пак разбъркваме. След като покъкри около 2 минути, добавяме течен бульон и подправки. След като покипи супата 15 минути, спираме котлона. Взимаме 2 черпака от супата, пасираме ги заедно със сметаната и изсипваме тази смес в тенджерата със супата. Разбъркваме и супата е готова.', '2024-01-14 09:05:01'),
(12, 'Спагети болонезе', 'Спагети, Лук, Моркови, Кайма, Доматен сос, Олио, Пармезан, Босилек', 'Първата стъпка е приготвянето на соса Болонезе, защото той винаги отнема повече време от сваряването на спагетите. Започваме като сложим каймата в загрян тиган с олио. Пържим я докато не стане сивкава. След като сме сигурни, че не е сурова, добавяме ситно нарязани моркови и лук. Когато поомекнат, добавяме доматения сос. Добавяме и подправки и оставяме да къкри докато не се изпари водата от доматите. През това време започваме да готвим спагетите. Слагаме ги в подсолена вряща вода и ги варим около 12 минути. След като и спагетите, и сосът са готови, ги смесваме и разбъркваме в подходящ съд. Като завършек можем да поръсим с пармезан и да сложим босилек за украса.', '2024-01-14 08:16:41'),
(14, 'recepta', '1, 2, 3 (non gluten free)', 'instructions', '2024-01-14 10:06:31');

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(7, 'admin', 'admin'),
(8, 'simona', '123'),
(9, 'NewUser123', 'NewUser123'),
(10, 'plsWork', 'workd?maybe'),
(11, 'newUser', '123'),
(12, 'amanda', 'amanda123'),
(13, 'novUser', '123');

--
-- Indexes for dumped tables
--

--
-- Индекси за таблица `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Индекси за таблица `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
