-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2023 at 04:02 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `music_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(30) NOT NULL,
  `genre` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `cover_photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `genre`, `description`, `cover_photo`) VALUES
(1, 'Pop', 'Popular music', '1605745560_play.jpg'),
(2, 'Rock', ' Its loud and strong beats make it popular among the youths.', 'default_cover.jpg'),
(3, 'Country Music', 'Country Music', 'default_cover.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `cover_image` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`id`, `user_id`, `title`, `description`, `cover_image`, `date_created`) VALUES
(1, 1, 'Playlist 1', 'Nunc pellentesque at erat eu vulputate. Integer ornare nec mauris ac sodales. Maecenas venenatis rutrum urna at faucibus. Aenean feugiat, purus ac venenatis mollis, lectus nunc dapibus mauris, sed imperdiet erat augue eu mauris. In eu diam eleifend, accumsan massa vitae, tempor velit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis imperdiet tortor lectus, et scelerisque massa efficitur a. In hendrerit felis nec gravida cursus. Suspendisse aliquet est vel lacus venenatis interdum. Vestibulum quis risus dolor. Aliquam feugiat sagittis nibh, id dignissim ipsum mollis et. Nunc nec sapien ligula. Donec laoreet leo eget velit tristique, vitae pulvinar velit hendrerit.', '1605833520_m2.jpg', '2020-11-20 08:52:36'),
(2, 2, 'Playlist 2', 'Nulla sollicitudin laoreet elit quis interdum. Nam dictum convallis suscipit. Etiam in sapien mauris. Nunc varius metus tortor, at porta tortor aliquet vel. Praesent a augue laoreet, mattis justo a, posuere nulla. Donec dictum tortor vel metus interdum dignissim. Vestibulum commodo aliquam gravida. Nulla facilisi.', 'play.jpg', '2020-11-20 08:58:35'),
(3, 2, 'My Playlist', 'Sample', '1605833940_h1.jpg', '2020-11-20 08:59:23');

-- --------------------------------------------------------

--
-- Table structure for table `playlist_items`
--

CREATE TABLE `playlist_items` (
  `id` int(30) NOT NULL,
  `playlist_id` int(30) NOT NULL,
  `music_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playlist_items`
--

INSERT INTO `playlist_items` (`id`, `playlist_id`, `music_id`, `date_created`) VALUES
(1, 6, 1, '2020-11-20 08:52:51'),
(2, 2, 2, '2020-11-20 08:58:44'),
(3, 3, 2, '2020-11-20 08:59:46'),
(4, 3, 1, '2020-11-20 08:59:46');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(30) NOT NULL,
  `genre_id` int(30) NOT NULL,
  `title` text NOT NULL,
  `artist` text NOT NULL,
  `description` text NOT NULL,
  `upath` text NOT NULL,
  `cover_image` text NOT NULL,
  `date_created` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `genre_id`, `title`, `artist`, `description`, `upath`, `cover_image`, `date_created`) VALUES
(1, 2, 'Song 101', 'BenSound', '&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed egestas est massa, non ullamcorper augue sodales non. Morbi mollis venenatis augue sit amet lacinia. Cras tempor tempor urna, nec consectetur tellus ullamcorper quis. Mauris vitae blandit tellus. Sed feugiat tincidunt malesuada. Cras egestas consequat molestie. Ut non ex nec tellus vestibulum tincidunt. Suspendisse facilisis lorem id sapien euismod, id gravida felis blandit. Nam quis diam tempor, luctus nisl at, auctor velit. Nunc rhoncus, turpis et ornare sagittis, metus diam dignissim dolor, non faucibus quam leo ut lectus. Etiam accumsan tellus eu hendrerit posuere. Aliquam erat volutpat. Donec fermentum purus odio, vel sodales sapien lobortis eu. Sed neque tellus, sagittis id scelerisque at, luctus ac felis.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', '1605833220_bensound-creativeminds.mp3', '1605833220_m1.jpg', 2147483647),
(2, 1, 'Song 102', 'BenSound', '&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify;&quot;&gt;Ut facilisis, mi eget semper euismod, urna mauris tristique ipsum, a auctor tortor leo a arcu. Duis nec felis eget diam scelerisque porttitor. Etiam ullamcorper leo auctor, imperdiet diam nec, scelerisque lacus. Sed at ornare tortor. Praesent volutpat, lacus eu molestie elementum, purus nulla pellentesque eros, sit amet viverra ex nisl quis risus. Etiam elementum posuere odio vitae lacinia. Nunc magna nunc, placerat ut neque vitae, dignissim eleifend sapien. Phasellus arcu felis, maximus vel ultrices quis, aliquam ac sapien. Sed aliquet interdum sollicitudin. Maecenas blandit tellus eget risus finibus, non gravida nunc pulvinar. Lorem ipsum dolor sit amet, consectetur adipiscing elit.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', '1605833760_bensound-energy.mp3', '1605833760_m3.jpg', 2147483647),
(3, 2, 'like', 'atif', 'dertferejrakjr', 'KGF Chapter 2 Trailer_Hindi_Yash_Sanjay Dutt_Raveena Tandon_Srinidhi_Prashanth Neel_Vijay Kiragandur.mp4', 'content_page-0001.jpg', 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `password`) VALUES
('zulfiqar', 'zulfiqarali6328@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlist_items`
--
ALTER TABLE `playlist_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `playlist_items`
--
ALTER TABLE `playlist_items`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
