-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2019 at 10:26 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sims`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(2) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(64) DEFAULT NULL,
  `salt` varchar(32) NOT NULL,
  `group` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `salt`, `group`) VALUES
(0, 'admin', '0f2eb34e0eadbaa50c349b977ea42cc53800ac96643541b161f0b18b448fd50f', '†\nÍ”¶T0´i~rÁ›ø¡9nÌõs¹²2ºæ†W', 2);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `permissions` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`) VALUES
(1, 'Standard user', ''),
(2, 'Administrator', '{\r\n\"admin\": 1,\r\n\"moderator\": 1\r\n}');

-- --------------------------------------------------------

--
-- Table structure for table `labs`
--

CREATE TABLE `labs` (
  `id` int(11) NOT NULL,
  `lab_id` varchar(20) NOT NULL,
  `lab_type` varchar(20) NOT NULL,
  `capacity` int(7) NOT NULL,
  `location` varchar(15) NOT NULL,
  `lab_pics` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labs`
--

INSERT INTO `labs` (`id`, `lab_id`, `lab_type`, `capacity`, `location`, `lab_pics`) VALUES
(2, 'Lab 5', 'Software', 100, 'ICT BUILDING', 'labs/g1.jpg'),
(4, 'Lab 12', 'Hardware', 500, 'ICT BUILDING', 'labs/s1.jpg'),
(8, 'lab 3', 'Hardware', 29, 'ICT BUILDING', 'labs/what-is-a-website-prototype.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lectroom`
--

CREATE TABLE `lectroom` (
  `id` int(2) NOT NULL,
  `roomname` text NOT NULL,
  `capacity` varchar(20) NOT NULL,
  `location` text NOT NULL,
  `room` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lectroom`
--

INSERT INTO `lectroom` (`id`, `roomname`, `capacity`, `location`, `room`) VALUES
(5, 'ICT ROOM 7', '300', 'Science Building', 'ROOMS/images.jpeg'),
(8, 'ICT ROOM 16', '329', 'Science Building', 'ROOMS/img_lights.jpg'),
(10, 'ICT ROOM 13', '4000', 'ICT Building', 'ROOMS/laptop_0.jpg'),
(12, 'ACCT', '18', 'ICT Building', 'ROOMS/FB_IMG_1528537734074.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `id` int(5) NOT NULL,
  `ofc_id` varchar(50) NOT NULL,
  `ofc_capacity` varchar(35) NOT NULL,
  `occ_name` varchar(70) NOT NULL,
  `occ_nameii` varchar(40) NOT NULL,
  `occ_nameiii` varchar(30) NOT NULL,
  `occ_nameiv` varchar(30) NOT NULL,
  `occ_namev` varchar(30) NOT NULL,
  `ofc_pic` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id`, `ofc_id`, `ofc_capacity`, `occ_name`, `occ_nameii`, `occ_nameiii`, `occ_nameiv`, `occ_namev`, `ofc_pic`) VALUES
(1, 'Lecturer office 224', 'c', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `t20152016`
--

CREATE TABLE `t20152016` (
  `id` int(4) NOT NULL,
  `surname` varchar(19) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `othernames` varchar(50) NOT NULL,
  `matric_no` varchar(18) NOT NULL,
  `programme` varchar(10) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t20152016`
--

INSERT INTO `t20152016` (`id`, `surname`, `firstname`, `othernames`, `matric_no`, `programme`, `level`) VALUES
(1, 'Adesanya', 'Folorunso', ' Opeyemi', '16/69/0001', 'FT', 'ND'),
(2, 'Seshie ', 'Victoria', 'Senami', '16/69/0002', 'FT', 'ND'),
(3, 'Otubela', 'Sodiq', 'Babatunde', '16/69/0003', 'FT', 'ND'),
(4, 'Badejo ', 'Sunday ', 'Micheal', '16/69/0004', 'FT', 'ND'),
(5, 'Okeyode ', 'Damilare ', 'Olamilekan', '16/69/0005', 'FT', 'ND'),
(6, 'Adegoke', 'Opeyemi', 'Kemisola', '16/69/0006', 'FT', 'ND'),
(7, 'Soliu ', 'Azeez', 'Olamilekan', '16/69/0007', 'FT', 'ND'),
(8, 'Adebajo', 'Kehinde ', 'Alice', '16/69/0008', 'FT', 'ND'),
(9, 'Adebajo', 'Ololade', 'Zarnny', '16/69/0009', 'FT', 'ND'),
(10, 'Modupe', 'Qadiri', 'Kiamor', '16/69/0010', 'FT', 'ND'),
(11, 'Alicia ', 'Kehinde ', 'lolade', '16/69/0011', 'FT', 'ND'),
(12, 'Faleti', 'docars', 'popoola', '16/69/0012', 'FT', 'ND'),
(13, 'Popoola', 'Ileri', 'promise', '16/69/0013', 'FT', 'ND'),
(14, 'Qadiri', 'Alice', 'Zarnny', '16/69/0014', 'FT', 'ND'),
(15, 'Rita', 'Dorcas', 'Azeez', '16/69/0015', 'FT', 'ND'),
(16, 'Adesanya', 'lolade', 'Kemisola', '16/69/0016', 'FT', 'ND'),
(17, 'ogunsanya', 'kilani', 'Olamilekan', '16/69/0017', 'FT', 'ND'),
(18, 'Popoola', 'niniola', 'Alice', '16/69/0018', 'FT', 'ND'),
(19, 'Niniola', 'Dorcas', 'Rita', '16/69/0019', 'FT', 'ND'),
(20, 'Dada ', 'niniola', 'promise', '16/69/0020', 'FT', 'ND'),
(21, 'Adebowale', 'Babatunde', 'Ismail', '16/69/0021', 'FT', 'ND'),
(22, 'Adewunmi', 'raphael', 'olatunji', '16/69/0022', 'FT', 'ND'),
(23, 'Soliu ', 'kamul', 'Ismail', '16/69/0023', 'FT', 'ND'),
(24, 'Babatunde', 'Seun', 'lolade', '16/69/0024', 'FT', 'ND'),
(25, 'Kolade ', 'Bukola', 'Toyosi', '16/69/0025', 'FT', 'ND'),
(26, 'Amosun', 'Tosin', 'Olamilekan', '16/69/0026', 'FT', 'ND'),
(27, 'Johnson', 'Ileri', 'Olagbemide', '16/69/0027', 'FT', 'ND'),
(28, 'Arowolo', 'Shukurat', 'Opeyemi', '16/69/0028', 'FT', 'ND'),
(29, 'Odumosu', 'Abdulwahab', 'Damilare', '16/69/0029', 'FT', 'ND'),
(30, 'Shodeinde', 'Ahmed', 'Abisayo', '16/69/0030', 'FT', 'ND'),
(31, 'Modupe', 'Johnson', 'Alice', '16/69/0031', 'FT', 'ND'),
(32, 'Dorcas', 'Zarnny', 'promise', '16/69/0032', 'FT', 'ND'),
(33, 'Zarnny', 'Abdulwahab', 'Amosun', '16/69/0033', 'FT', 'ND'),
(34, 'Olamilekan', 'Arowolo', 'Ileri', '16/69/0034', 'FT', 'ND'),
(35, 'Abass', 'Ibrahim', 'Olamilekan', '16/69/0035', 'FT', 'ND'),
(36, 'Olamilekan', 'Ileri', 'Niniola', '16/69/0036', 'FT', 'ND'),
(37, 'Adebowale', 'kilani', 'Alicia ', '16/69/0037', 'FT', 'ND'),
(38, 'Senami', 'Azeez', 'Johnson', '16/69/0038', 'FT', 'ND'),
(39, 'Ileri', 'Seshie ', 'Shukurat', '16/69/0039', 'FT', 'ND'),
(40, 'Adesanya', 'Adebowale', 'Ishola', '16/69/0040', 'FT', 'ND'),
(41, 'Sanusi', 'Ahmed', 'Solarin', '16/69/0041', 'FT', 'ND'),
(42, 'Olamilekan', 'Marvelous', 'Oluwanike', '16/69/0042', 'FT', 'ND');

-- --------------------------------------------------------

--
-- Table structure for table `tblofficials`
--

CREATE TABLE `tblofficials` (
  `staff_id` int(5) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `othernames` varchar(30) NOT NULL,
  `position` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL,
  `membership` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbltimetable`
--

CREATE TABLE `tbltimetable` (
  `id` int(10) NOT NULL,
  `session` varchar(20) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `programme` varchar(20) NOT NULL,
  `timetable` text NOT NULL,
  `level` varchar(20) NOT NULL,
  `released` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltimetable`
--

INSERT INTO `tbltimetable` (`id`, `session`, `semester`, `programme`, `timetable`, `level`, `released`) VALUES
(1, 'S20182019', '1st SEMESTER', 'FT', 'timetables/EED ON LIQUID SOAP 2017.docx', 'ND', '23 June 2019 , 07:11 PM');

-- --------------------------------------------------------

--
-- Table structure for table `users_session`
--

CREATE TABLE `users_session` (
  `id` int(11) NOT NULL,
  `user_id` int(3) NOT NULL,
  `hash` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_session`
--

INSERT INTO `users_session` (`id`, `user_id`, `hash`) VALUES
(1, 0, 'cb99c13f923ba353b17de81d77c3bf3e4397fd0c5556e7835837374e4a120c16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labs`
--
ALTER TABLE `labs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lectroom`
--
ALTER TABLE `lectroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t20152016`
--
ALTER TABLE `t20152016`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblofficials`
--
ALTER TABLE `tblofficials`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `tbltimetable`
--
ALTER TABLE `tbltimetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_session`
--
ALTER TABLE `users_session`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `labs`
--
ALTER TABLE `labs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lectroom`
--
ALTER TABLE `lectroom`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t20152016`
--
ALTER TABLE `t20152016`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tblofficials`
--
ALTER TABLE `tblofficials`
  MODIFY `staff_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbltimetable`
--
ALTER TABLE `tbltimetable`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_session`
--
ALTER TABLE `users_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
