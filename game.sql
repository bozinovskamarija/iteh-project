-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2019 at 02:48 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'PHP'),
(2, 'HTML'),
(3, 'CSS'),
(4, 'JavaScript');

-- --------------------------------------------------------

--
-- Table structure for table `highscore`
--

CREATE TABLE `highscore` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `highscore`
--

INSERT INTO `highscore` (`id`, `user_id`, `score`, `category_id`) VALUES
(164, 6, 70, 4),
(166, 6, 100, 3),
(167, 7, -20, 2),
(168, 2, 10, 4),
(169, 4, -15, 3),
(171, 2, 100, 2),
(172, 2, -25, 1),
(174, 6, -25, 2),
(175, 2, 100, 2),
(177, 2, 75, 4),
(178, 6, 100, 4),
(179, 6, 75, 3),
(180, 6, 100, 1),
(181, 6, 100, 2),
(182, 6, 70, 3),
(183, 6, 40, 3),
(185, 6, 100, 4),
(186, 4, -20, 1),
(188, 3, -50, 3),
(189, 3, 100, 1),
(190, 3, 100, 1),
(191, 1, 70, 1),
(192, 1, 70, 1),
(193, 1, 70, 1),
(194, 1, 40, 3);

-- --------------------------------------------------------

--
-- Table structure for table `knjige`
--

CREATE TABLE `knjige` (
  `id` int(11) NOT NULL,
  `ime` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `slika` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cena` double(10,2) NOT NULL,
  `demo` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `opis` varchar(200) COLLATE utf8_croatian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `knjige`
--

INSERT INTO `knjige` (`id`, `ime`, `slika`, `cena`, `demo`, `opis`) VALUES
(1, 'PHP', 'php.jpg', 10.00, 'Beginner PHP Tutorial - 1 - Introduction to PHP.mp4', ''),
(2, 'HTML', 'html.jpg', 12.00, 'HTML Tutorial for Beginners - 00 - Introduction to HTML.mp4', ''),
(3, 'JavaScript', 'javascript.jpg', 11.00, 'JavaScript Tutorial For Beginners 01 - Introduction.mp4', ''),
(4, 'CSS', 'css.jpg', 8.00, 'CSS Tutorial for Beginners - 01 - Introduction to CSS.mp4', '');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question_name` text NOT NULL,
  `answer1` varchar(250) NOT NULL,
  `answer2` varchar(250) NOT NULL,
  `answer3` varchar(250) NOT NULL,
  `answer4` varchar(250) NOT NULL,
  `answer` varchar(250) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_name`, `answer1`, `answer2`, `answer3`, `answer4`, `answer`, `category_id`) VALUES
(1, 'Od cega je skracenica PHP?', 'PHP: Hypertext Preprocessor', 'Protected Hypertext Preprocessor', 'Personal Hypertext Processor ', 'Private Home Page ', '1', 1),
(2, 'Sve promenljive u PHP-u pocinju simbolom?', 'a', 'p', '$', '&', '3', 1),
(3, 'Koja funkcija pretvara prosledjeni string u mala slova?\r\n\r\n\r\n', 'strminimize()', 'strminor()', 'strlower()', 'strupper()', '3', 1),
(4, 'Koja funkcija sluzi za izbacivanje elementa na kraju niza?\r\n\r\n\r\n', 'array_push()', 'array_pop()', 'array_eject()', 'array_delete()', '2', 1),
(5, 'Kako biste napisali “Zdravo Marija” u PHP-u? \r\n\r\n\r\n\r\n\r\n', 'Console.Writeline(“Zdravo Marija”);', 'Document.Write(“Zdravo Marija”);', 'System.out.println(“Zdravo Marija”);', 'echo “Zdravo Marija”;', '4', 1),
(6, 'Od cega je skracenica HTML?\r\n\r\n	\r\n	\r\n	', 'Home Tool Markup Language', 'Hyper Text Markup Language', 'Hyperlinks and Text Markup Language', 'Hyperlink Text Markup Language', '2', 2),
(7, 'Kako se pravi numerisana lista u HTML tag-u?\r\n	\r\n	\r\n	\r\n	\r\n', 'ol', 'ul', 'list', 'dl', '1', 2),
(8, 'Sta treba napisati u HTML5 tag-u za definisanje sekcije u dokumentu?\r\n\r\n	\r\n	\r\n	\r\n	', 'article', 'header', 'footer', 'section', '4', 2),
(9, 'Sta treba napisati u HTML tag-u da bi text bio iskosen?\r\n\r\n\r\n\r\n\r\n', 'i', 'italic', 'text:italic', 'italic:text', '1', 2),
(10, 'Sta treba napisati u HTML tag-u da bismo ubacili pozadinsku sliku?\r\n\r\n\r\n\r\n', 'background=”1.jpg\"', 'backgroundbody=”1.jpg\"', 'bodybackground=”1.jpg\"', 'body background=”1.jpg”', '4', 2),
(11, 'U okviru kog elementa u HTML tag-u stavljamo JavaScript?\r\n	\r\n	\r\n	\r\n	', 'javascript', 'scripted', 'script', 'js', '3', 4),
(12, 'Gde je ispravno ubaciti JavaScript?\r\n	\r\n	\r\n	\r\n	', 'Nijedno od ponudjenih', 'U head sekciju', 'U bodi sekciju', 'I u bodi i u head sekciju', '4', 4),
(13, 'Kako ispravno napisati JavaScript niz?	', 'colors = (red, green, blue);', 'var colors = (red, green, blue);', 'var colors = [\"red\", \"green\", \"blue\"];', 'colors = (\'red\', \'green\', \'blue\');', '3', 4),
(14, 'Da li je JavaScript osetljiv na mala i velika slova (case-sensitive)?\r\n\r\n	\r\n	\r\n	\r\n	', 'Zavisi od projekta do projekta', 'Nijedno od ponudjenih', 'Da', 'Ne', '3', 4),
(15, 'Da li su Java i JavaScript slicni programski jezici?\r\n\r\n	\r\n	\r\n	', 'Da', 'Ne', 'Zavisi od projekta do projekta', 'Nijedno od ponudjenih', '2', 4),
(16, 'Koja je ispravna CSS sintaksa?\r\n	\r\n	\r\n	', 'body color: blue;', '{body:color: blue;}', 'body {color: blue;}', '{body color: blue;}', '3', 3),
(17, 'Od cega je skracenica CSS?\r\n	\r\n	\r\n	', 'Computer Style Sheets', 'Colorful Style Sheets', 'Cascading Style Sheets ', 'Creative Style Sheets', '3', 3),
(18, 'Gde u HTML dokumentu treba smestiti spoljasnji CSS?\r\n	\r\n	', 'U body sekciji', 'Na pocetku dokumenta', 'U head sekciji', 'U sredini dokumenta', '3', 3),
(19, 'Kako u CSS-u definisemo velicinu teksta?\r\n\r\n\r\n	\r\n	\r\n	', 'font-size', 'text-style', 'text-size', 'font-style', '1', 3),
(20, 'Koje svojstvo u CSS-u koristimo da promenimo boju pozadine?\r\n	\r\n	\r\n	\r\n	', 'bgcolor;', 'background-color;', 'color;', 'color-background;', '2', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(15) COLLATE utf8_croatian_ci NOT NULL,
  `password` varchar(15) COLLATE utf8_croatian_ci NOT NULL,
  `name` varchar(20) COLLATE utf8_croatian_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf8_croatian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_croatian_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `name`, `lastname`, `email`, `gender`) VALUES
(1, 'pera', 'pera', 'Pera', 'Perovic', 'pera@gmail.com', 'male'),
(2, 'mika', 'mika', 'Mika', 'Mikic', 'mika@gmail.com', 'male'),
(3, 'milica', 'milica', 'Milica', 'Milic', 'mica@gmail.com', 'female'),
(4, 'aleks', 'aleks', 'Aleksandra', 'Aleksic', 'aleks@yahoo.com', 'female'),
(5, 'mac', 'mac', 'mac', 'mac', 'mac@gmail.com', 'female'),
(6, 'jovana', 'jovana', 'Jovana', 'Joksimovic', 'jovana@gmail.com', 'female'),
(7, 'deki', 'deki', 'Dejan', 'Dejanovic', 'deki@yahoo.com', 'male'),
(9, 'admin', 'admin', 'Alek', 'Bogi', 'aleks@gmail.com', 'femail');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `highscore`
--
ALTER TABLE `highscore`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryfk` (`category_id`),
  ADD KEY `userfk` (`user_id`);

--
-- Indexes for table `knjige`
--
ALTER TABLE `knjige`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `highscore`
--
ALTER TABLE `highscore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `knjige`
--
ALTER TABLE `knjige`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `highscore`
--
ALTER TABLE `highscore`
  ADD CONSTRAINT `categoryfk` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `userfk` FOREIGN KEY (`user_id`) REFERENCES `users` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
