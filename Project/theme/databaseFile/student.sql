-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2018 at 08:02 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_ID` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `Password`) VALUES
('admin', 'admin'),
('anik', 'anik'),
('musfiqus', 'musfiqus'),
('rafat', 'rafat'),
('test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE `attendence` (
  `aDate` date NOT NULL,
  `attendance` varchar(255) NOT NULL,
  `s_id` int(11) NOT NULL,
  `c_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendence`
--

INSERT INTO `attendence` (`aDate`, `attendance`, `s_id`, `c_id`) VALUES
('2018-04-04', 'present', 123459, 'CSE122'),
('2018-04-04', 'present', 123461, 'CSE134'),
('2018-04-04', 'present', 123461, 'CSE135'),
('2018-04-04', 'present', 123460, 'CSE132'),
('2018-04-04', 'present', 123460, 'CSE133'),
('2018-04-04', 'present', 123614, 'MAT121'),
('2018-04-04', 'present', 123461, 'PHY123'),
('2018-04-04', 'present', 123458, 'MAT111'),
('2018-04-04', 'present', 123458, 'PHY123'),
('2018-04-04', 'present', 123617, 'CSE112'),
('2018-04-04', 'present', 123461, 'MAT131'),
('2018-04-04', 'present', 123516, 'ENG123'),
('2018-04-04', 'present', 123613, 'MAT111'),
('2018-04-04', 'present', 123459, 'CSE112'),
('2018-04-04', 'present', 123461, 'CSE133'),
('2018-04-04', 'present', 123512, 'ENG123'),
('2018-04-04', 'present', 123519, 'ENG113'),
('2018-04-04', 'present', 123615, 'PHY123'),
('0000-00-00', 'present', 123617, 'CSE112'),
('0000-00-00', 'present', 123459, 'CSE112'),
('2018-04-05', 'present', 123617, 'CSE112'),
('2018-04-05', 'present', 123459, 'CSE112'),
('2018-04-05', 'absent', 123519, 'ENG113'),
('2018-04-05', 'present', 123461, 'MAT131'),
('2018-04-05', '', 123615, 'CSE112'),
('2018-04-05', '', 123461, 'MAT131'),
('2018-04-05', '', 123461, 'CSE112'),
('2018-04-05', 'present', 123458, 'CSE122'),
('2018-04-05', 'present', 123461, 'CSE135');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `cName` varchar(255) NOT NULL,
  `c_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`cName`, `c_id`) VALUES
('Computer Fundamentals', 'CSE112'),
('Programming and Problem Solving', 'CSE122'),
('Problem Solving Lab', 'CSE123'),
('Discrete Mathematics', 'CSE131'),
('Electrical Circuits', 'CSE132'),
('Electrical Circuits Lab', 'CSE133'),
('Data Structure', 'CSE134'),
('Data Structure Lab', 'CSE135'),
('Basic Functional English and English Spoken', 'ENG113'),
('Writing and Comprehension', 'ENG123'),
('Mathematics I: Differential and Integral Calculus', 'MAT111'),
('Mathematics - II: Linear Algebra and Coordinate Geometry', 'MAT121'),
('Ordinary and Partial Differential Equations', 'MAT131'),
('Physics I: Mechanics, Heat and Thermodynamics, Waves and Oscillations and Optics', 'PHY113'),
('Physics II: Electricity, Magnetism and Modern Physics', 'PHY123'),
('Physics-II Lab', 'PHY124');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Date` date NOT NULL,
  `SlipNo` int(11) NOT NULL,
  `Student_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sName` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `s_id` int(11) NOT NULL,
  `contact` text NOT NULL,
  `batch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sName`, `gender`, `s_id`, `contact`, `batch`) VALUES
('Kuddus', 'Male', 123456, '01521431920', 'CSE 43'),
('Boyati', 'Male', 123457, '1742042043', 'CSE 44'),
('Lal Shahriar Anika', 'Female', 123458, '1742042044', 'CSE 49'),
('Fazli Rabby Panic', 'Male', 123459, '1742042045', 'CSE 39'),
('Sourav Koyla Das', 'Male', 123460, '1742042046', 'CSE 47'),
('Mosfeqos Shalihin', 'Male', 123461, '1742042047', 'CSE 43'),
('Siffat Jahan Keshi', 'Female', 123462, '1742042069', 'CSE 41'),
('Jamana Jamia Jam', 'Female', 123463, '1742042055', 'CSE 41'),
('Rahima Iqbal', 'Female', 123512, '1742042691', 'CSE 43'),
('Hafejor Rehman', 'Male', 123513, '1742042692', 'CSE 44'),
('Parvaj Pinto', 'Female', 123514, '1742042044', 'CSE 49'),
('Susanto Roy', 'Male', 123515, '1742042693', 'CSE 39'),
('Souravi Khatun Doyel', 'Male', 123516, '1742042694', 'CSE 47'),
('Khisrut Jahan Mania', 'Female', 123518, '1742042695', 'CSE 41'),
('Rashida Islam', 'Female', 123519, '1742042696', 'CSE 41'),
('Rahmana Jaman', 'Female', 123612, '1742042781', 'CSE 43'),
('Hridoy Rehman', 'Male', 123613, '1742042782', 'CSE 44'),
('Pinky Das', 'Female', 123614, '1742042783', 'CSE 49'),
('Sukanto Roy', 'Male', 123615, '1742042784', 'CSE 39'),
('Moshiur Rahman', 'Male', 123617, '1742042694', 'CSE 43'),
('Ritu Islam', 'Female', 123619, '1742042785', 'CSE 41');

-- --------------------------------------------------------

--
-- Table structure for table `studentxcourse`
--

CREATE TABLE `studentxcourse` (
  `c_id` varchar(255) NOT NULL,
  `s_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentxcourse`
--

INSERT INTO `studentxcourse` (`c_id`, `s_id`) VALUES
('CSE122', 123459),
('CSE122', 123459),
('CSE134', 123461),
('CSE135', 123461),
('CSE132', 123460),
('CSE133', 123460),
('MAT121', 123614),
('PHY123', 123461),
('MAT111', 123458),
('PHY123', 123458),
('CSE112', 123617),
('MAT131', 123461),
('ENG123', 123516),
('MAT111', 123613),
('CSE112', 123459),
('CSE133', 123461),
('ENG123', 123512),
('ENG113', 123519),
('PHY123', 123615),
('PHY123', 123617),
('CSE112', 123456),
('CSE122', 123456);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `Tname` varchar(255) NOT NULL,
  `Contact` text NOT NULL,
  `initial` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`Tname`, `Contact`, `initial`) VALUES
('Abdullah-Al-Noman Sarker', '01571526671', 'AAN'),
('Aniruddha Rakshit', '01571526670', 'AAR'),
('Jannatul Ferdouse', '01571526670', 'JF'),
('Jebun Naher Sikta', '01571526670', 'JNS'),
('Mustakim Al Helal', '01571526670', 'MAH'),
('Md. Mohiuddin', '01571526670', 'MDN'),
('Mohammad Salek Parvez', '01571526670', 'MSP'),
('Md. Rasel Hossen', '01571526670', 'RHS'),
('Dr. Sheak Rashed Haider', '01571526670', 'RSH'),
('Sayedul Arefin', '01571526670', 'SAA'),
('Saba Fatema', '01571526670', 'SF'),
('Seraj Al Mahmud Mostafa', '01571526670', 'SMM'),
('Sadia Zafrin Lia', '01571526670', 'SZL'),
('Md. Tarek Habib', '01571526670', 'THB'),
('Md Zakaria Khan', '01571526670', 'ZK');

-- --------------------------------------------------------

--
-- Table structure for table `teacherxcourses`
--

CREATE TABLE `teacherxcourses` (
  `c_id` varchar(255) NOT NULL,
  `initial` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacherxcourses`
--

INSERT INTO `teacherxcourses` (`c_id`, `initial`) VALUES
('ENG113', 'AAN'),
('CSE112', 'THB'),
('CSE134', 'RSH'),
('CSE135', 'SMM'),
('CSE131', 'AAR'),
('CSE132', 'SAA'),
('CSE133', 'AAN'),
('MAT121', 'MSP'),
('MAT111', 'MDN'),
('MAT131', 'SF'),
('PHY124', 'ZK'),
('PHY113', 'RHS'),
('PHY123', 'JNS'),
('CSE123', 'MAH'),
('CSE122', 'MAH'),
('ENG123', 'SZL'),
('PHY124', 'AAN'),
('PHY113', 'AAN'),
('ENG113', 'JF');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `attendence`
--
ALTER TABLE `attendence`
  ADD KEY `s_id` (`s_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`SlipNo`),
  ADD KEY `Student_ID` (`Student_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `studentxcourse`
--
ALTER TABLE `studentxcourse`
  ADD KEY `c_id` (`c_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`initial`);

--
-- Indexes for table `teacherxcourses`
--
ALTER TABLE `teacherxcourses`
  ADD KEY `c_id` (`c_id`),
  ADD KEY `initial` (`initial`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendence`
--
ALTER TABLE `attendence`
  ADD CONSTRAINT `attendence_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`),
  ADD CONSTRAINT `attendence_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `course` (`c_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`Student_ID`) REFERENCES `student` (`s_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
