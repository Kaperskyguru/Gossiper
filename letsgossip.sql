-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2018 at 11:12 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_body` text NOT NULL,
  `comment_like` int(11) NOT NULL,
  `comment_dislike` int(11) NOT NULL,
  `comment_heart` int(11) NOT NULL,
  `comment_post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `post_id` int(11) NOT NULL,
  `comment_thread` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `image_url`, `post_id`) VALUES
(1, 'res/img/1.jpg', 1),
(2, 'res/img/1.jpg', 2),
(3, 'res/img/1.jpg', 3),
(4, 'res/img/1.jpg', 4),
(5, 'res/img/1.jpg', 5);

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
(3, 'Bayelsa'),
(4, 'Akwa Ibom'),
(5, 'Adamawa'),
(6, 'Bauchi'),
(7, 'Benue'),
(9, 'Borno'),
(10, 'Cross River'),
(11, 'Delta'),
(12, 'Ebonyi'),
(13, 'Enugu'),
(14, 'Edo'),
(15, 'Ekiti'),
(16, 'Gombe'),
(17, 'Jigawa'),
(18, 'Kaduna'),
(19, 'Kano'),
(20, 'Katsina'),
(21, 'Kebbi'),
(22, 'Kogi'),
(23, 'Kwara'),
(24, 'Lagos'),
(25, 'Nasarawa'),
(26, 'Niger'),
(27, 'Ogun'),
(28, 'Ondo'),
(29, 'Osun'),
(30, 'Oyo'),
(31, 'Plateau'),
(32, 'Rivers'),
(33, 'Sokoto'),
(34, 'Taraba'),
(35, 'Yobe'),
(36, 'Zamfara'),
(37, 'Abuja');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(200) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_content` longtext NOT NULL,
  `post_like` int(11) NOT NULL,
  `post_dislike` int(11) NOT NULL,
  `post_heart` int(11) NOT NULL DEFAULT '0',
  `post_tag` int(11) NOT NULL,
  `post_comments` int(11) NOT NULL,
  `post_pin` int(11) NOT NULL DEFAULT '0',
  `post_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `loc_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_content`, `post_like`, `post_dislike`, `post_heart`, `post_tag`, `post_comments`, `post_pin`, `post_date`, `loc_id`) VALUES
(1, 'This is Our First Gossip', 'This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip This is Our First Gossip ', 0, 0, 0, 0, 0, 1, '2018-02-14 22:08:30.407445', 2),
(2, 'This is the Second Gossip', 'This is the Second Gossip This is the Second Gossip This is the Second Gossip This is the Second Gossip This is the Second Gossip This is the Second Gossip This is the Second Gossip This is the Second Gossip This is the Second Gossip This is the Second Gossip This is the Second Gossip This is the Second Gossip This is the Second Gossip This is the Second Gossip This is the Second Gossip This is the Second Gossip This is the Second Gossip This is the Second Gossip This is the Second Gossip ', 0, 0, 0, 0, 0, 1, '2018-02-14 22:08:33.875774', 4),
(3, 'This is the Third Gossip ', 'This is the Third Gossip This is the Third Gossip This is the Third Gossip This is the Third Gossip This is the Third Gossip This is the Third Gossip This is the Third Gossip This is the Third Gossip This is the Third Gossip This is the Third Gossip This is the Third Gossip This is the Third Gossip This is the Third Gossip This is the Third Gossip This is the Third Gossip This is the Third Gossip This is the Third Gossip This is the Third Gossip This is the Third Gossip This is the Third Gossip This is the Third Gossip This is the Third Gossip This is the Third Gossip This is the Third Gossip This is the Third Gossip This is the Third Gossip This is the Third Gossip This is the Third Gossip This is the Third Gossip This is the Third Gossip This is the Third Gossip This is the Third Gossip This is the Third Gossip This is the Third Gossip This is the Third Gossip This is the Third Gossip This is the Third Gossip This is the Third Gossip This is the Third Gossip ', 0, 0, 0, 0, 0, 1, '2018-02-14 22:08:37.444077', 3),
(4, 'This is the Fourth Gossip ', 'This is the Fourth Gossip This is the Fourth Gossip This is the Fourth Gossip This is the Fourth Gossip This is the Fourth Gossip This is the Fourth Gossip This is the Fourth Gossip This is the Fourth Gossip This is the Fourth Gossip This is the Fourth Gossip This is the Fourth Gossip This is the Fourth Gossip This is the Fourth Gossip This is the Fourth Gossip This is the Fourth Gossip This is the Fourth Gossip This is the Fourth Gossip This is the Fourth Gossip This is the Fourth Gossip This is the Fourth Gossip This is the Fourth Gossip This is the Fourth Gossip This is the Fourth Gossip This is the Fourth Gossip This is the Fourth Gossip This is the Fourth Gossip This is the Fourth Gossip This is the Fourth Gossip ', 0, 0, 0, 0, 0, 0, '2018-02-14 22:07:42.787458', 5),
(5, 'This is the Fifth Gossip ', 'This is the Fifth Gossip This is the Fifth Gossip This is the Fifth Gossip This is the Fifth Gossip This is the Fifth Gossip This is the Fifth Gossip This is the Fifth Gossip This is the Fifth Gossip This is the Fifth Gossip This is the Fifth Gossip This is the Fifth Gossip This is the Fifth Gossip This is the Fifth Gossip This is the Fifth Gossip This is the Fifth Gossip This is the Fifth Gossip This is the Fifth Gossip This is the Fifth Gossip This is the Fifth Gossip This is the Fifth Gossip This is the Fifth Gossip This is the Fifth Gossip This is the Fifth Gossip This is the Fifth Gossip This is the Fifth Gossip This is the Fifth Gossip This is the Fifth Gossip This is the Fifth Gossip This is the Fifth Gossip This is the Fifth Gossip This is the Fifth Gossip This is the Fifth Gossip This is the Fifth Gossip This is the Fifth Gossip This is the Fifth Gossip This is the Fifth Gossip ', 0, 0, 0, 0, 0, 0, '2018-02-14 22:08:18.869622', 6);

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `reply_id` int(11) NOT NULL,
  `reply_body` text NOT NULL,
  `comment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comments_ibfk_1` (`post_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `post_id` (`post_id`);

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
  ADD KEY `loc_id` (`loc_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `comment_id` (`comment_id`);

--
-- Indexes for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_id` (`state_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `loc_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`loc_id`) REFERENCES `location` (`loc_id`);

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_ibfk_1` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`comment_id`);

--
-- Constraints for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD CONSTRAINT `suggestions_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `location` (`loc_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
