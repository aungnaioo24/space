-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 07, 2020 at 07:55 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spacebykm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `pass`) VALUES
(1, 'astronautsinspace', '$2y$10$TfAIjlJ39u7ugf6EtiJzeui.A6Dy61fVshMCJ2NYvNw57Di9rZD8C');

-- --------------------------------------------------------

--
-- Table structure for table `picproject`
--

CREATE TABLE `picproject` (
  `pic_id` int(11) NOT NULL,
  `pic_projs_id` int(11) NOT NULL,
  `pic_title` varchar(255) NOT NULL,
  `pic_text` text NOT NULL,
  `pic_photo` varchar(255) NOT NULL,
  `pic_datetime` datetime NOT NULL,
  `pic_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `picproject`
--

INSERT INTO `picproject` (`pic_id`, `pic_projs_id`, `pic_title`, `pic_text`, `pic_photo`, `pic_datetime`, `pic_status`) VALUES
(1, 2, 'Intime1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam cursus quam vel mi egestas consectetur. Vivamus ornare justo ac orci lacinia, et tempor magna pulvinar. Nullam finibus vel leo eu congue. Etiam sit amet luctus libero. Quisque porta ultricies venenatis. Maecenas eget suscipit nisl.', 'intime1.png', '2020-01-14 03:09:37', 0),
(2, 2, 'Intime2', 'Morbi ultrices elit mi, nec dapibus felis auctor a. Integer velit sapien, lobortis ac malesuada vel, consectetur ut tellus. Praesent gravida vel urna in commodo. Proin id urna nec neque lobortis dapibus non sed enim. ', 'intime2.png', '2020-01-14 09:11:26', 0),
(3, 2, 'Intime3', 'Nulla facilisi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque pharetra finibus nibh, eget iaculis erat luctus nec. Integer vehicula massa justo, at cursus turpis pharetra at.', 'intime3.png', '2020-01-22 04:28:17', 0),
(4, 10, 'Star 11', 'Stars are beautiful at night. blah blah blah in the skyy', '1580679910-ph.jpg', '2020-02-02 20:47:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `projs_id` int(11) NOT NULL,
  `projs_name` varchar(255) NOT NULL,
  `projs_photo` varchar(255) NOT NULL,
  `projs_datetime` datetime NOT NULL,
  `projs_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`projs_id`, `projs_name`, `projs_photo`, `projs_datetime`, `projs_status`) VALUES
(1, 'PARTYHOLICS', 'partyholic.png', '2020-01-01 03:17:06', 0),
(2, 'INTIME', 'intime.png', '2020-01-02 03:28:20', 0),
(3, 'Curvy', 'curvy.png', '2020-01-03 08:21:32', 0),
(4, 'Space X COR', 'spaceXcor.png', '2020-01-06 05:02:56', 0),
(5, 'Starry Night', 'starrynight.jpg', '2020-01-25 21:57:51', 0),
(6, 'Blocks', 'bl.jpg', '2020-01-25 22:07:56', 0),
(7, 'testss', 'Screenshot from 2019-12-28 10-01-05.png', '2020-01-25 22:18:52', 1),
(8, 'Blocks2', '1579987144-bl.jpg', '2020-01-25 22:19:04', 0),
(9, 'lhglhgk', 'Screenshot from 2020-01-12 18-14-48.png', '2020-01-27 06:54:48', 1),
(10, 'wha', '1580104648-starrynight.jpg', '2020-01-27 06:56:17', 0),
(11, 'aarondog', '1580105064-ph.jpg', '2020-01-27 07:04:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vidproject`
--

CREATE TABLE `vidproject` (
  `vid_id` int(11) NOT NULL,
  `vid_proj_id` int(11) NOT NULL,
  `vid_title` varchar(255) NOT NULL,
  `vid_text` text NOT NULL,
  `vid_link` varchar(255) NOT NULL,
  `vid_datetime` datetime NOT NULL,
  `vid_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vidproject`
--

INSERT INTO `vidproject` (`vid_id`, `vid_proj_id`, `vid_title`, `vid_text`, `vid_link`, `vid_datetime`, `vid_status`) VALUES
(1, 10, 'AOTT', 'Call your name - girl Version', 'https://www.youtube.com/embed/hBdWb34RKwc', '2020-02-06 16:28:57', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `picproject`
--
ALTER TABLE `picproject`
  ADD PRIMARY KEY (`pic_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`projs_id`),
  ADD UNIQUE KEY `projs_name` (`projs_name`);

--
-- Indexes for table `vidproject`
--
ALTER TABLE `vidproject`
  ADD PRIMARY KEY (`vid_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `picproject`
--
ALTER TABLE `picproject`
  MODIFY `pic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `projs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vidproject`
--
ALTER TABLE `vidproject`
  MODIFY `vid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
