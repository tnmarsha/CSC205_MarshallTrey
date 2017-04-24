-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2017 at 05:03 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category`) VALUES
(1, 'uncategorized'),
(2, 'Site News'),
(3, 'hellooooo'),
(4, 'hellooooo'),
(5, 'SUPER HERO'),
(6, 'trey'),
(7, 'trey');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `email_add` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `email_add`, `name`, `comment`) VALUES
(1, 0, 't@email.com', 'tr', 'my first comment'),
(2, 31, 't@email.com', 'tr', 'my first comment'),
(3, 30, 't@email.com', 'r', 'my second post');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image`, `text`) VALUES
(1, '', ''),
(2, '', ''),
(3, '', 'gsgfdsgfdsgg'),
(4, '', 'gsgfdsgfdsgg'),
(5, '', 'gsgfdsgfdsgg'),
(6, '', 'gsgfdsgfdsgg'),
(7, '', 'gsgfdsgfdsgg'),
(8, '', 'gsgfdsgfdsgg'),
(9, '', 'hi'),
(10, '', 'hi'),
(11, '', 'hi'),
(12, '', 'hi'),
(13, '', 'root beer '),
(14, '', 'root beer '),
(15, '', 'root beer ');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `posted` datetime NOT NULL,
  `startdate` datetime NOT NULL,
  `enddate` datetime NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post`, `user_id`, `title`, `body`, `category_id`, `posted`, `startdate`, `enddate`, `image`) VALUES
(61, 1, 'help', 'sdsedd', 1, '2017-04-21 03:15:39', '2017-02-05 00:00:00', '2017-03-05 00:00:00', 'Mug_Root_Beer_Logo.jpg'),
(62, 1, 'help', 'sdsedd', 1, '2017-04-21 03:17:03', '2017-02-05 00:00:00', '2017-03-05 00:00:00', 'Mug_Root_Beer_Logo.jpg'),
(63, 1, 'help', 'sdsedd', 1, '2017-04-21 03:23:47', '2017-02-05 00:00:00', '2017-03-05 00:00:00', 'Mug_Root_Beer_Logo.jpg'),
(64, 1, 'help', 'sdsedd', 1, '2017-04-21 03:28:52', '2017-02-05 00:00:00', '2017-03-05 00:00:00', 'Mug_Root_Beer_Logo.jpg'),
(66, 1, 'treys life ', 'my life is great ', 1, '2017-04-21 04:16:59', '2017-02-05 00:00:00', '2017-02-06 00:00:00', 'C:\\Users\\trewon\\Desktop\\lebron.png'),
(67, 1, 'batman', 'frrff', 1, '2017-04-21 04:19:05', '2017-02-05 00:00:00', '2017-02-06 00:00:00', 'IMG_0005.JPG'),
(68, 1, 'batman', 'frrff', 1, '2017-04-21 04:19:08', '2017-02-05 00:00:00', '2017-02-06 00:00:00', 'IMG_0005.JPG'),
(69, 1, 'Analysis paper', 'ssd', 1, '2017-04-21 04:20:23', '2017-02-05 00:00:00', '2017-02-06 00:00:00', 'IMG_0005.JPG'),
(70, 1, 'Analysis paper', 'ffr', 1, '2017-04-21 04:39:45', '2017-02-05 00:00:00', '2017-02-06 00:00:00', 'lebron.png'),
(71, 1, 'Analysis paper revised ', 'fgfdgdf', 1, '2017-04-21 04:40:45', '2017-02-05 00:00:00', '2017-02-06 00:00:00', 'IMG_0005.JPG'),
(72, 1, 'im on A BOAT', 'YKJYJF', 1, '2017-04-21 04:58:03', '2017-02-05 00:00:00', '2017-02-06 00:00:00', 'c23d12f4c19f66daf5dfbbf62fc43e78.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'trey', 'treytrey');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
