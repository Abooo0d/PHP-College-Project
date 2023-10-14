-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2023 at 09:01 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `fname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email-address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `courses` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `courses-count` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `plan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `active` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `profile-image` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `twitter` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`fname`, `lname`, `username`, `email-address`, `password`, `courses`, `courses-count`, `plan`, `active`, `profile-image`, `twitter`, `facebook`, `linkedin`) VALUES
('7alosh', 'Saad', '7alosh', '7alosh@gamil.com', '0951745564', '', '1', 'free', 'false', '7alosh.jfif', 'Abood', 'Abood', 'Abood'),
('88899', '999', '888', '888@gmaoil.com', '999', '', '1', 'premium', 'false', '888.jpg', 'Abood', 'Abood', 'Abood'),
('abd', 'ahsd', 'Abd', 'ajhdb@gmail.com', '121212', '', '0', 'free', 'false', '', '', '', ''),
('Abood', 'Saad', 'Abood', 'abdsaadalden2001@gmail.com', '0951745564', 'Mastring C#,FUll Template', '1', 'preimum', 'false', 'Abood.jfif', 'Abood2001', 'Abood111', 'Abood207'),
('Ahmad', 'Saad', 'Ahmad', 'ahmad@gmail.com', '0951745564', '', '1', 'free', 'false', 'Ahmad.jfif', 'Abood', 'Abood', 'Abood'),
('Alaa', 'Saad', 'Alaa', 'Alaa@gmail.com', '0951745564', '', '1', 'free', 'false', 'Alaa.jfif', 'Abood', 'Abood', 'Abood'),
('asd', 'asd', 'asd', 'asdasd@gmail.com', 'asd', '', '0', 'free', 'true', '', '', '', ''),
('Hamza', 'orfaly', 'Hamza', 'hamza@gmail.com', '0951745564', '', '1', 'free', 'false', 'Hamza.jfif', 'Abood', 'Abood', 'Abood'),
('Karam', 'Saad', 'Karam', 'Abood@gmail.com', '0951745564', '', '1', 'free', 'false', 'Karam.jfif', 'Abood', 'Abood', 'Abood'),
('mohamad', 'saad', 'mohamad', 'Mohamd@gmail.com', '0951745564', '', '1', 'free', 'false', 'mohamad.jfif', 'Abood', 'Abood', 'Abood'),
('Olaa', 'saad', 'Olaa', 'olaa@gmail.com', '0951745564', '', '1', 'free', 'false', 'Olaa.jfif', 'Abood', 'Abood', 'Abood');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `ID` int(11) NOT NULL,
  `course-name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `course-teacher` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lessons-count` int(11) NOT NULL,
  `programing-lang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `course-image` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `teacher-profile-image` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`ID`, `course-name`, `course-teacher`, `lessons-count`, `programing-lang`, `course-image`, `price`, `teacher-profile-image`) VALUES
(0, 'Mastring C#', 'Abood', 20, 'C#', 'C.png', '20', 'Abood.jfif'),
(1, 'Proplem Solving With C#', 'Abood', 10, 'C#', 'C.png', '20', 'Abood.jfif'),
(2, 'Python Basics', 'Elzero', 18, 'Python', 'webdesign.jpg', '20', 'Elzero.jfif'),
(3, 'FUll Template', 'Elzero', 24, 'HTML , CSS , JS', 'Template.jpg', '20', 'Elzero.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `ID` int(11) NOT NULL,
  `post-ouner` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `post-title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `post` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `post-likes` int(11) NOT NULL,
  `profile-image` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`ID`, `post-ouner`, `post-title`, `post`, `post-likes`, `profile-image`) VALUES
(0, 'Olaa', 'nothing To Do', 'All I Can Do Is  Searching For Bugs And Trying To Fix It To Pass Time  ANd i Hope To Get Some Skills', 1, 'Olaa.jfif'),
(1, 'Olaa', 'No Thing To Do 2', 'And I Am Still Trying To Add Featsure To My Project And i Hope To Finishe It Soon', 1, 'Olaa.jfif'),
(2, 'Olaa', 'Still On Going', 'I Am Just making Sure That The Counter Thet I Made Runung Curectly', 1, 'Olaa.jfif'),
(3, 'Karam', 'Hello Theer ', 'Now I Have learned A New Skill To Refresh The Page When I Update The Css File ', 1, 'Karam.jfif'),
(4, 'mohamad', 'Hello THere', 'akshdnaksd', 1, 'mohamad.jfif'),
(5, 'Abood', 'asyugdhasn', 'hagshdnkjas', 1, 'Abood.jfif'),
(6, 'Abood', '', '', 1, 'Abood.jfif'),
(7, 'Abood', 'ANy THing ', 'ajhdankjdsaihsdn asihdjnasd', 1, 'Abood.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `student-courses`
--

CREATE TABLE `student-courses` (
  `ID` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `course-name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `course-image` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lessons-count` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `course-teacher` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student-courses`
--

INSERT INTO `student-courses` (`ID`, `username`, `course-name`, `course-image`, `lessons-count`, `course-teacher`) VALUES
(0, 'Abood', 'Mastring C#', 'C.png', '20', 'Abood'),
(1, 'Abood', 'FUll Template', 'Template.jpg', '24', 'Elzero'),
(2, 'Abood', 'Python Basics', 'webdesign.jpg', '18', 'Elzero'),
(3, 'Abood', 'Python Basics', 'webdesign.jpg', '18', 'Elzero'),
(4, 'Abood', 'Proplem Solving With C#', 'C.png', '10', 'Abood');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher-name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pro-lang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `courses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher-name`, `pro-lang`, `courses`) VALUES
('Abood', 'Javascript', 3),
('Elzero', 'php', 2),
('Hasuna', 'C#', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`ID`,`post-ouner`);

--
-- Indexes for table `student-courses`
--
ALTER TABLE `student-courses`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher-name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
