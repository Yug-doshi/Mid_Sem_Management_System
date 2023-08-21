-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2023 at 11:08 AM
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
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`username`, `password`) VALUES
('yug', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE `classroom` (
  `Class_Name` varchar(50) NOT NULL,
  `Class_Code` varchar(50) NOT NULL,
  `Teacher` varchar(50) NOT NULL,
  `Class_Coverimage` varchar(300) NOT NULL,
  `Admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classroom_for_teacher`
--

CREATE TABLE `classroom_for_teacher` (
  `Teacher_Id` int(10) NOT NULL,
  `Class_Name` varchar(50) NOT NULL,
  `Class_code` varchar(50) NOT NULL,
  `Teacher_Name` varchar(50) NOT NULL,
  `Class_Cover_Image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classroom_for_teacher`
--

INSERT INTO `classroom_for_teacher` (`Teacher_Id`, `Class_Name`, `Class_code`, `Teacher_Name`, `Class_Cover_Image`) VALUES
(1, 'React', '649dc9f74d', 'Narendra Limbad', 'cover-649dca15a2e397.75675162.png'),
(1, 'Node JS', '649dca15a4', 'Narendra Limbad', 'cover-649dca37601f65.53600631.png'),
(2, 'Web Development', '649dd3683d', 'Pratik Parmar', 'cover-649dd36fa116b0.77675760.png'),
(4, 'C++', '64e2391769', 'Yug', 'cover-64e23924d12906.98570911.png');

-- --------------------------------------------------------

--
-- Table structure for table `classroom_students`
--

CREATE TABLE `classroom_students` (
  `Class_Code` varchar(50) NOT NULL,
  `Student_Name` varchar(50) NOT NULL,
  `Enrollment` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classroom_students`
--

INSERT INTO `classroom_students` (`Class_Code`, `Student_Name`, `Enrollment`) VALUES
('649dc9f74d', 'Krish', 216090307031),
('649dca15a4', 'Krish', 216090307031),
('649dc9f74d', 'Yug', 216090307028),
('649dd3683d', 'Krish', 216090307031);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `Student_Name` varchar(50) NOT NULL,
  `Enrollment` bigint(12) NOT NULL,
  `Class_code` varchar(50) NOT NULL,
  `File` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `Class_code` varchar(50) NOT NULL,
  `Teacher_Name` varchar(50) NOT NULL,
  `Teacher_Id` int(10) NOT NULL,
  `Result` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`Class_code`, `Teacher_Name`, `Teacher_Id`, `Result`) VALUES
('649dc9f74d', 'Narendra Limbad', 1, 'OSI.pdf'),
('649dc9f74d', 'Narendra Limbad', 1, 'CN Certificate.pdf'),
('64e2391769', 'Yug', 4, 'DI-SEM3REGULARWINTEREXAMINATION-2022_216090307028.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Enrollment` bigint(12) NOT NULL,
  `Semester` int(1) NOT NULL,
  `Mobile` bigint(10) NOT NULL,
  `Photo` varchar(300) NOT NULL,
  `Admin` varchar(50) NOT NULL,
  `Branch` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`First_Name`, `Last_Name`, `Enrollment`, `Semester`, `Mobile`, `Photo`, `Admin`, `Branch`) VALUES
('Yug', 'Doshi', 216090307028, 4, 1234567890, '216090307028.png', 'krish', 'Computer'),
('Krish', 'Narshindani', 216090307031, 4, 8200004396, '216090307031.png', 'krish', 'Computer');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_info`
--

CREATE TABLE `teacher_info` (
  `Teacher_Id` int(10) NOT NULL,
  `Teacher_Name` varchar(50) NOT NULL,
  `Teacher_Mob` bigint(10) NOT NULL,
  `Teacher_Salary` bigint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_info`
--

INSERT INTO `teacher_info` (`Teacher_Id`, `Teacher_Name`, `Teacher_Mob`, `Teacher_Salary`) VALUES
(1, 'Narendra Limbad', 1234567890, 80000),
(2, 'Pratik Parmar', 1111111111, 80000),
(4, 'Yug', 9327888735, 1243);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`Class_Code`);

--
-- Indexes for table `classroom_for_teacher`
--
ALTER TABLE `classroom_for_teacher`
  ADD PRIMARY KEY (`Class_code`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`Enrollment`),
  ADD UNIQUE KEY `Mobile` (`Mobile`);

--
-- Indexes for table `teacher_info`
--
ALTER TABLE `teacher_info`
  ADD PRIMARY KEY (`Teacher_Id`),
  ADD UNIQUE KEY `Teacher_Mob` (`Teacher_Mob`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teacher_info`
--
ALTER TABLE `teacher_info`
  MODIFY `Teacher_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
