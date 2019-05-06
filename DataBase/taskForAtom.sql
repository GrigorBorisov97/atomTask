-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time:  6 май 2019 в 17:50
-- Версия на сървъра: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taskForAtom`
--

-- --------------------------------------------------------

--
-- Структура на таблица `books`
--

CREATE TABLE `books` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ISBN` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Description` varchar(2048) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `books`
--

INSERT INTO `books` (`ID`, `Name`, `ISBN`, `Year`, `Description`, `image`) VALUES
(16, 'PHP', '978-3-16-148410-0', '2015', 'PHP е скриптов език върху сървърната страна език с отворен код, който е проектиран за уеб програмиране и е широко използван за създаване на сървърни приложения и динамично уеб-съдържание. Автор на езика е канадецът от датски произход Размус Лердорф. PHP е рекурсивен акроним от PHP: Hypertext Preprocessor.', 'PHP7_ed2.jpg'),
(17, 'Java', '156-1-65-156165-1', '2018', 'Java или Джава е обектно-ориентиран език за програмиране. Кодът, написан на Java, не се компилира до машинен код за определен процесор, а до специфичен за езика код, наречен байт код. Поради това за изпълнението на програма, написана на Java, е необходима', 'Java10.jpg'),
(18, 'Python Book', '864-6-84-681615-1', '2014', 'Python is a perfect language for beginners as it is easy to learn and understand. We bring to you a list of 10 best Python books for beginners ...', 'Python_____________.jpg'),
(21, 'Wordpresss', '648-6-48-648646-8', '2014', 'WordPress е вид свободен софтуер с отворен код за създаване на блогове и/или сайтове, използващ система за управление на съдържанието и е базиран на PHP и MySQL.', 'Wordpress______________.jpg');

-- --------------------------------------------------------

--
-- Структура на таблица `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `firstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imagePath` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `login`
--

INSERT INTO `login` (`ID`, `firstName`, `lastName`, `userName`, `password`, `email`, `imagePath`) VALUES
(1, 'Григор', 'Борисов', 'grigorBorisov97', 'e10adc3949ba59abbe56e057f20f883e', 'gri6obb@abv.bg', '54268226_2817419801633287_4741189603208200192_n (1).jpg'),
(7, 'Niki', 'Georgiev', 'niki99', '8a88fd0c91cd4f1c6d15fe68f60d11d7', 'niki99@abv.bg', ''),
(9, 'Nadya', 'Kirilova', 'Viki', '7d8d665fbb17bdaa1ccb0bbe1687f738', 'grishocska@gmail.com', ''),
(10, 'Johny', 'Johnson', 'johny99', 'e10adc3949ba59abbe56e057f20f883e', 'johnyJohnson@gmail.com', ''),
(11, 'Nadka', 'Nadya', 'nadka99', 'c8837b23ff8aaa8a2dde915473ce0991', 'nadya@abc.bg', ''),
(12, 'Nadya', 'Kirilova', 'nadya', 'e10adc3949ba59abbe56e057f20f883e', 'nadya@abv.bg', 'DSC_0629.JPG'),
(13, 'Malina', 'Borisova', 'malina76', 'e10adc3949ba59abbe56e057f20f883e', 'malina@abv.bg', 'DSC_0614.JPG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
