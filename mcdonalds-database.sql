-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2020 at 10:14 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcdonalds`
--

-- --------------------------------------------------------

--
-- Table structure for table `career2`
--

CREATE TABLE `career2` (
  `ApplicantID` int(11) NOT NULL,
  `appliedfor` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `Conno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `career2`
--

INSERT INTO `career2` (`ApplicantID`, `appliedfor`, `firstname`, `lastname`, `qualification`, `age`, `City`, `email`, `Conno`) VALUES
(1, 'Trainee Manager', 'Haris', 'Bin Talat', 'BSSE', 20, 'Rawalpindi', 'umsi@umich.edu', 11223344),
(2, 'Cook', 'Haris', 'Bin Talat', 'MSSE', 22, 'Rawalpindi', 'haris@gmail.com', 1223344);

-- --------------------------------------------------------

--
-- Table structure for table `discription`
--

CREATE TABLE `discription` (
  `d_id` int(11) NOT NULL,
  `discriptions` varchar(255) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discription`
--

INSERT INTO `discription` (`d_id`, `discriptions`, `job_id`) VALUES
(1, 'Responsible to learn & perform Restaurant Operations.', 6),
(2, 'Assist guests & creating feel-good moments for them.', 6),
(3, 'Proactively approach the customers and restaurant team to offer assistance.', 6),
(4, 'Proactively assist the restaurant management team regarding inventory, scheduling people, and customers.', 6),
(5, 'Having good interpersonal skills to manage people and customer.', 6),
(6, 'Computer literacy is a must and should be agile and enthusiastic for learning restaurant operations.', 6),
(7, 'Responsible to learn & perform Restaurant Operations.', 7),
(8, 'Assist guests & creating feel-good moments for them.', 7),
(9, 'Proactively approach the customers and restaurant team to offer assistance.', 7),
(10, 'Cleans food preparation areas as determined by law and company policy. ', 7),
(11, 'Prepares foods to the specifications of the client. ', 7),
(12, 'Makes adjustments to food items to accommodate guests with allergies or specific diet concerns.', 7),
(13, 'Responsible to learn & perform Restaurant Operations.', 8),
(14, 'Using scripting or authoring languages, management tools, content creation tools, applications and digital media.', 8),
(15, 'Editing, writing, or designing Website content, and directing team members who produce content.', 8),
(16, 'Identifying problems uncovered by customer feedback and testing, and correcting or referring problems to appropriate personnel for correction.', 8),
(17, 'Evaluating code to ensure it meets industry standards, is valid, is properly structured, and is compatible with browsers, devices, or operating systems.', 8),
(18, 'Determining user needs by analyzing technical requirements.', 8);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `areacode` int(4) DEFAULT NULL,
  `tel_num` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `branch` varchar(100) DEFAULT NULL,
  `message` varchar(400) DEFAULT NULL,
  `feedback_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `firstname`, `lastname`, `areacode`, `tel_num`, `email`, `branch`, `message`, `feedback_date`) VALUES
(1, 'Haris', 'Bin Talat', 92, 553331, 'haris@gmail.com', 'DHA 1.', 'Excellent food quality and taste.', '2020-12-16 12:04:18'),
(2, 'Alishba', 'Abrar', 92, 553331, 'umsi@umich.edu', 'Bahria Town.', 'asjkcbkascascnascnasklcknvk kacnan', '2020-12-16 12:05:52'),
(3, 'Haris', 'Bin Talat', 92, 553331, 'rajaharisbintalat@yahoo.com', 'F-9 Park.', 'sdkacka kscnk', '2020-12-16 12:06:48');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_no` int(11) NOT NULL,
  `itemname` varchar(225) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_no`, `itemname`, `user_id`) VALUES
(4, 'lunch deal for 2,2pcs spice chicken,9pcs SCBM,', 59),
(5, 'sharebox chikval,happy meal b,Cappuccino,', 59),
(6, 'lunch deal for 2,Hot Fudge Sundae,', 59),
(7, '2pcs spice chicken,Hot Fudge Sundae,Cappuccino,', 59),
(8, '2pcs spice chicken,sharebox-Chiken Value,Cappuccino,', 59),
(9, 'lunch deal for 2,Hot Fudge Sundae,', 59),
(10, 'lunch deal for 2,', 59),
(11, 'sharebox-Chiken Value,', 59),
(12, 'Hot Fudge Sundae,', 59),
(13, 'sharebox-Chiken Value,', 59),
(14, 'Cappuccino,', 59);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `job_title` varchar(250) DEFAULT NULL,
  `location` varchar(250) DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_title`, `location`, `post_date`) VALUES
(6, 'Manager', 'Lahore', '2020-12-18 20:34:13'),
(7, 'Cook', 'Islamabad', '2020-12-18 20:34:13'),
(8, 'Web developer', 'Islamabad', '2020-12-19 10:58:49');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `name`, `email`, `reg_date`) VALUES
(2, 'Haris Bin Talat Shoaib', 'bin.talat900@gmail.com', '2020-12-15 20:05:24'),
(3, 'Haris Bin Talat Shoaib', 'umsi@umich.edu', '2020-12-15 20:06:56'),
(15, 'Ahmed', 'umsi@umich.edu', '2020-12-16 12:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `opendoor`
--

CREATE TABLE `opendoor` (
  `PersonID` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `areacode` int(11) DEFAULT NULL,
  `telnum` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `branch` varchar(50) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opendoor`
--

INSERT INTO `opendoor` (`PersonID`, `firstname`, `lastname`, `areacode`, `telnum`, `email`, `branch`, `time`, `gender`) VALUES
(12, 'Haris', 'Haris', 92, 5800787, 'haris@gmail.com', 'Jinnah Park.', 'Sunday(4pm-6pm)', 'MALE'),
(13, 'Haris', 'Bin Talat', 92, 5800787, 'haris@gmail.com', 'Jinnah Park.', 'Sunday(4pm-6pm)', 'MALE'),
(14, 'Haris', 'Bin Talat', 92, 5800787, 'rajaharisbintalat@yahoo.com', 'Jinnah Park.', 'Wednesday(4pm-6pm)', 'MALE'),
(15, 'Haris', 'Bin Talat', 92, 553331, 'dasa@gmail.com', 'Bahria Town.', 'Sunday(4pm-6pm)', 'MALE'),
(16, 'Haris', 'Bin Talat', 92, 553331, 'rajaharisbintalat@yahoo.com', 'Bahria Town.', 'Sunday(4pm-6pm)', 'MALE');

-- --------------------------------------------------------

--
-- Table structure for table `specification`
--

CREATE TABLE `specification` (
  `dis_id` int(11) NOT NULL,
  `specifications` varchar(255) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specification`
--

INSERT INTO `specification` (`dis_id`, `specifications`, `job_id`) VALUES
(1, 'Bachelor degree in Web development or related field, or relevant experience.', 8),
(2, 'Solid knowledge and experience in programming applications.', 8),
(3, 'Proficient in JavaScript, HTML, CSS, BOOTSTRAP 4.', 8),
(4, 'Proficient in php and MySQL.', 8),
(5, 'Solid ability in both written and verbal communication.', 8),
(6, 'Proven experience as cook.', 7),
(7, 'Experience in using cutting tools, cookware and bakeware.', 7),
(8, 'Ability to follow all sanitation procedures.', 7),
(9, 'Ability to work in a team.', 7),
(10, 'Ability to work in a team.', 6),
(11, 'Excellent communication, interpersonal, leadership, coaching, and conflict resolution skills.', 6),
(12, 'Time and project management skills..', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(250) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact` int(11) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `contact`, `password`, `address`) VALUES
(56, 'Haris Bin Talat', 'haris@gmail.com', 111244622, '6057f13c496ecf7fd777ceb9e79ae285', 'abc street'),
(58, 'alishba', 'umsi@umich.edu', 553331, '99e8f2b08381892b8d1142d00e3ad51b', 'abc\r\n'),
(59, 'fred', 'fred@yahoo.com', 900, '3b712de48137572f3849aabd5666a4e3', 'abc House Rawalpindi Punjab');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `career2`
--
ALTER TABLE `career2`
  ADD PRIMARY KEY (`ApplicantID`);

--
-- Indexes for table `discription`
--
ALTER TABLE `discription`
  ADD PRIMARY KEY (`d_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_no`),
  ADD KEY `items_ibfk_1` (`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opendoor`
--
ALTER TABLE `opendoor`
  ADD PRIMARY KEY (`PersonID`);

--
-- Indexes for table `specification`
--
ALTER TABLE `specification`
  ADD PRIMARY KEY (`dis_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `career2`
--
ALTER TABLE `career2`
  MODIFY `ApplicantID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `discription`
--
ALTER TABLE `discription`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `opendoor`
--
ALTER TABLE `opendoor`
  MODIFY `PersonID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `specification`
--
ALTER TABLE `specification`
  MODIFY `dis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `discription`
--
ALTER TABLE `discription`
  ADD CONSTRAINT `discription_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `specification`
--
ALTER TABLE `specification`
  ADD CONSTRAINT `specification_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
