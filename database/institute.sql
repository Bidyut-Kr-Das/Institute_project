-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2023 at 09:05 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `institute`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `emailId` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `emailId`) VALUES
(1, 'Admin', 'e3afed0047b08059d0fada10f400c1e5', 'admin@email'),
(2, 'admin2', 'e3afed0047b08059d0fada10f400c1e5', 'idk');

-- --------------------------------------------------------

--
-- Table structure for table `classmaster`
--

CREATE TABLE `classmaster` (
  `classId` int(11) NOT NULL,
  `className` varchar(255) NOT NULL,
  `baseFee` int(11) NOT NULL,
  `active` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classmaster`
--

INSERT INTO `classmaster` (`classId`, `className`, `baseFee`, `active`) VALUES
(1, 'Class VIII', 800, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `group-subj`
--

CREATE TABLE `group-subj` (
  `Id` int(11) NOT NULL,
  `groupId` int(11) NOT NULL COMMENT 'foreign key from groupMaster',
  `subjectId` int(11) NOT NULL COMMENT 'foreign key from subejctMaster'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groupmaster`
--

CREATE TABLE `groupmaster` (
  `groupId` int(11) NOT NULL,
  `groupName` varchar(255) NOT NULL,
  `estimatedFee` int(11) NOT NULL,
  `active` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `groupmaster`
--

INSERT INTO `groupmaster` (`groupId`, `groupName`, `estimatedFee`, `active`) VALUES
(34, 'Arts', 0, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `stud-cls-grp`
--

CREATE TABLE `stud-cls-grp` (
  `Id` int(11) NOT NULL,
  `studId` int(11) NOT NULL,
  `classId` int(11) NOT NULL,
  `groupId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `studentmaster`
--

CREATE TABLE `studentmaster` (
  `id` int(11) NOT NULL,
  `studentName` varchar(256) NOT NULL,
  `studPhNo` varchar(20) NOT NULL,
  `parentName` varchar(256) NOT NULL,
  `prntPhNo` varchar(20) NOT NULL,
  `class` varchar(20) NOT NULL,
  `eduBoard` varchar(256) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` char(1) NOT NULL,
  `age` int(11) NOT NULL,
  `estmFee` int(11) NOT NULL,
  `active` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentmaster`
--

INSERT INTO `studentmaster` (`id`, `studentName`, `studPhNo`, `parentName`, `prntPhNo`, `class`, `eduBoard`, `email`, `gender`, `age`, `estmFee`, `active`) VALUES
(1, 'Kingshuk Sil', '6969696969', 'jani na', '0101010101', '10', 'CBSE', 'kingshukvoda@voda.com', 'F', 70, 0, 'Y'),
(2, 'Kingshuk Sil', '7834738472', 'jani na', '5656566', '898', 'WBBSE', 'kingshukvoda@voda.com', 'M', 56, 0, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `subject_master`
--

CREATE TABLE `subject_master` (
  `sub_Id` int(11) NOT NULL,
  `sub_Name` varchar(255) NOT NULL,
  `baseFee` int(11) NOT NULL,
  `active` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subject_master`
--

INSERT INTO `subject_master` (`sub_Id`, `sub_Name`, `baseFee`, `active`) VALUES
(30, 'Bengali', 200, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `teach-cls-grp`
--

CREATE TABLE `teach-cls-grp` (
  `Id` int(11) NOT NULL,
  `teacherId` int(11) NOT NULL COMMENT 'foreign key from teacherMaster',
  `subjectId` int(11) NOT NULL COMMENT 'foreign key from subjectMaster',
  `classId` int(11) NOT NULL COMMENT 'foreign key from classMaster'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachermaster`
--

CREATE TABLE `teachermaster` (
  `teacher_Id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `highest_Dg` varchar(255) NOT NULL,
  `phone_Number` varchar(255) NOT NULL,
  `group_Id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` char(1) NOT NULL DEFAULT 'Y',
  `gender` char(1) NOT NULL,
  `age` int(11) NOT NULL,
  `estmSalary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `teachermaster`
--

INSERT INTO `teachermaster` (`teacher_Id`, `name`, `highest_Dg`, `phone_Number`, `group_Id`, `email`, `active`, `gender`, `age`, `estmSalary`) VALUES
(1, 'Teacher Test idk', '10', '4543', 0, 'mail', 'Y', 'M', 56, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classmaster`
--
ALTER TABLE `classmaster`
  ADD PRIMARY KEY (`classId`);

--
-- Indexes for table `group-subj`
--
ALTER TABLE `group-subj`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `groupmaster`
--
ALTER TABLE `groupmaster`
  ADD PRIMARY KEY (`groupId`);

--
-- Indexes for table `stud-cls-grp`
--
ALTER TABLE `stud-cls-grp`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `studentmaster`
--
ALTER TABLE `studentmaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_master`
--
ALTER TABLE `subject_master`
  ADD PRIMARY KEY (`sub_Id`);

--
-- Indexes for table `teach-cls-grp`
--
ALTER TABLE `teach-cls-grp`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `teachermaster`
--
ALTER TABLE `teachermaster`
  ADD PRIMARY KEY (`teacher_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `classmaster`
--
ALTER TABLE `classmaster`
  MODIFY `classId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `group-subj`
--
ALTER TABLE `group-subj`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `groupmaster`
--
ALTER TABLE `groupmaster`
  MODIFY `groupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `stud-cls-grp`
--
ALTER TABLE `stud-cls-grp`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `studentmaster`
--
ALTER TABLE `studentmaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subject_master`
--
ALTER TABLE `subject_master`
  MODIFY `sub_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `teach-cls-grp`
--
ALTER TABLE `teach-cls-grp`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teachermaster`
--
ALTER TABLE `teachermaster`
  MODIFY `teacher_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
