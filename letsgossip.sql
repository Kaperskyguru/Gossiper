-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2018 at 11:27 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `letsgossip`
--

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `loc_id` int(200) NOT NULL,
  `state` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`loc_id`, `state`) VALUES
(1, 'All Posts'),
(2, 'Abia State'),
(3, 'Adamawa'),
(4, 'Akwa-Ibom');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(200) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_content` longtext NOT NULL,
  `post_date` datetime(6) NOT NULL,
  `post_image` int(200) NOT NULL,
  `loc_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_content`, `post_date`, `post_image`, `loc_id`) VALUES
(1, 'our first post', 'this is our first post\r\nmy name is iyke\r\n\r\nmy name is iyke.my name is iyke.my name is iyke.my name is iyke. my name is iyke. my name is iyke. my name is iyke. my name is iyke. my name is iyke. v v v my name is iyke. v my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke', '2018-01-23 00:00:00.000000', 0, 1),
(2, 'new posting', 'beewww\r\nmy name is iyke.my name is iyke.my name is iyke.my name is iyke. my name is iyke. my name is iyke. my name is iyke. my name is iyke. my name is iyke. v v v my name is iyke. v my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke', '2018-01-04 00:00:00.000000', 111, 2),
(3, 'another one sha', 'hkhaljljslajdljsl\r\nmy name is iyke.my name is iyke.my name is iyke.my name is iyke. my name is iyke. my name is iyke. my name is iyke. my name is iyke. my name is iyke. v v v my name is iyke. v my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke', '2018-01-10 00:00:00.000000', 66602, 3),
(4, 'new posting', 'beewww\r\n\r\nmy name is iyke.my name is iyke.my name is iyke.my name is iyke. my name is iyke. my name is iyke. my name is iyke. my name is iyke. my name is iyke. v v v my name is iyke. v my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke', '2018-01-04 00:00:00.000000', 111, 2),
(5, 'another one sha', 'hkhaljljslajdljsl\r\nmy name is iyke.my name is iyke.my name is iyke.my name is iyke. my name is iyke. my name is iyke. my name is iyke. my name is iyke. my name is iyke. v v v my name is iyke. v my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke', '2018-01-10 00:00:00.000000', 66602, 3),
(6, 'hwoo my people', 'yrhhkfjlnmn\r\nmy name is iyke.my name is iyke.my name is iyke.my name is iyke. my name is iyke. my name is iyke. my name is iyke. my name is iyke. my name is iyke. v v v my name is iyke. v my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke.my name is iyke', '2018-01-01 00:00:00.000000', 777, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`loc_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `loc_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
