-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 04, 2019 at 01:35 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `army_no` varchar(100) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `rank` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `date_of_joining` date NOT NULL,
  PRIMARY KEY (`army_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `army_person_relation`
--

DROP TABLE IF EXISTS `army_person_relation`;
CREATE TABLE IF NOT EXISTS `army_person_relation` (
  `person_id` int(11) NOT NULL AUTO_INCREMENT,
  `army_no` varchar(255) NOT NULL,
  `relation` varchar(255) NOT NULL,
  `relation_fname` varchar(255) NOT NULL,
  `relation_lname` varchar(255) NOT NULL,
  `relation_date_of_birth` date NOT NULL,
  `relation_gender` varchar(255) NOT NULL,
  PRIMARY KEY (`person_id`),
  KEY `army_no` (`army_no`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `army_person_relation`
--

INSERT INTO `army_person_relation` (`person_id`, `army_no`, `relation`, `relation_fname`, `relation_lname`, `relation_date_of_birth`, `relation_gender`) VALUES
(21, '1122', 'son', 'roshan', 'sharma', '1996-01-09', 'male'),
(22, '1122', 'wife', 'divya', 'sharma', '1996-01-01', 'female'),
(23, '4512', 'daughter', 'roshni', 'kumari', '1998-02-02', 'female'),
(24, '4512', 'wife', 'anjali', 'kumari', '1998-03-03', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `army_serving_person`
--

DROP TABLE IF EXISTS `army_serving_person`;
CREATE TABLE IF NOT EXISTS `army_serving_person` (
  `army_no` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `rank` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `date_of_joining` date NOT NULL,
  PRIMARY KEY (`army_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `army_serving_person`
--

INSERT INTO `army_serving_person` (`army_no`, `fname`, `lname`, `rank`, `unit`, `email`, `gender`, `mobile`, `date_of_birth`, `date_of_joining`) VALUES
('1122', 'sohan', 'sharma', 'SUB', '116', 'sdgsgm', 'male', '121212', '1996-02-01', '2017-02-02'),
('4512', 'mohan', 'kumar', 'hav', '120', 'hdhddh', 'male', '81818', '1993-01-30', '2018-05-09');

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

DROP TABLE IF EXISTS `attributes`;
CREATE TABLE IF NOT EXISTS `attributes` (
  `attribute_id` int(11) NOT NULL AUTO_INCREMENT,
  `attribute_name` varchar(255) NOT NULL,
  PRIMARY KEY (`attribute_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`attribute_id`, `attribute_name`) VALUES
(8, 'sugar fasting'),
(9, 'sugar pp'),
(10, 'sugra random'),
(11, 'urea'),
(12, 'creatinine'),
(13, 'cholestrol'),
(14, 'uric acid'),
(15, 'total cholestrol'),
(16, 'triglycerides'),
(17, 'hdl cholestrol'),
(18, 'ldl cholestrol');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `did` int(100) NOT NULL AUTO_INCREMENT,
  `dname` varchar(255) NOT NULL,
  `establishment_year` int(11) NOT NULL,
  PRIMARY KEY (`did`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`did`, `dname`, `establishment_year`) VALUES
(1, 'ent', 2006),
(2, 'eye', 2008),
(3, 'heart', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `army_no` varchar(100) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rank` varchar(50) NOT NULL,
  `joining_date` date NOT NULL,
  `date_of_birth` date NOT NULL,
  PRIMARY KEY (`army_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`army_no`, `fname`, `lname`, `mobile_no`, `gender`, `email`, `rank`, `joining_date`, `date_of_birth`) VALUES
('12345', 'rakesh', 'tomar', '1919191', 'male', 'rakesh@gmail', 'major', '1111-11-11', '1111-11-11'),
('9191', 'mahesh', 'sen', '1918181', 'male', 'mahesh@mail', 'col', '1111-11-11', '1111-11-11'),
('9999', 'sanjay', 'kumar', '12345', 'male', 'sanjay@kk', 'capt', '2019-04-01', '2019-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_speciality`
--

DROP TABLE IF EXISTS `doctor_speciality`;
CREATE TABLE IF NOT EXISTS `doctor_speciality` (
  `army_no` varchar(255) NOT NULL,
  `did` int(11) NOT NULL,
  KEY `did` (`did`),
  KEY `army_no` (`army_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_speciality`
--

INSERT INTO `doctor_speciality` (`army_no`, `did`) VALUES
('12345', 1),
('9999', 1),
('9999', 2),
('9191', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `army_no` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  KEY `army_no` (`army_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`army_no`, `password`, `role`) VALUES
('1', '$2y$10$1i7U/5Ufz5mRVUA438TMbeiksdu6vA/LlKJS5k/GleRNIrLogar6K', 'admin'),
('12345', '$2y$10$jDOKHs4VpM390p.ylPd97.u.0XU49vd3z7tfuRJFaC5KwyY6vfGZ2', 'doctor'),
('1234', '$2y$10$zplsIlRP16ARKAARp.9qReC5P4Ozok2oxWRvzOiLjxHEJRmEl3CCi', 'receptionist'),
('9876', '$2y$10$h.EAVs7/huxayk4IugGlQO1CKElvWGaq3KqIrU5S8qxVkmp4Ubv.6', 'receptionist'),
('72091', '$2y$10$JPvJayHbDtDdVOTR.ar4o.gmmK4ZD/Ard3r4kHo8aNctYtgo5JdUG', 'pathologist'),
('9999', '$2y$10$bSCom4v1ohGXxwr63ZDqs.aG6FIidfm32Cc5K61QD2HtrQq/RH8oC', 'doctor'),
('9191', '$2y$10$wMNMZ9BqkYL8BShLgrMQD.xM6/OKxbIjlqpWVnZyE2lzxgFMKsJeq', 'doctor'),
('818181', '$2y$10$WJGGbn1jeve9shFK2jNUOujLZgOvZsWizKpAUvhl/4yaenYBJQ3bq', 'receptionist');

-- --------------------------------------------------------

--
-- Table structure for table `opd`
--

DROP TABLE IF EXISTS `opd`;
CREATE TABLE IF NOT EXISTS `opd` (
  `patient_id` int(11) NOT NULL,
  `doctor_army_no` varchar(255) NOT NULL,
  `test_id` int(11) DEFAULT NULL,
  `comments` varchar(512) NOT NULL,
  KEY `patient_id` (`patient_id`),
  KEY `doctor_army_no` (`doctor_army_no`),
  KEY `test_id` (`test_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pathologist`
--

DROP TABLE IF EXISTS `pathologist`;
CREATE TABLE IF NOT EXISTS `pathologist` (
  `army_no` varchar(100) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rank` varchar(50) NOT NULL,
  `date_of_joining` date NOT NULL,
  `date_of_birth` date NOT NULL,
  PRIMARY KEY (`army_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `token` int(11) NOT NULL,
  `date` date NOT NULL,
  `person_id` int(11) NOT NULL,
  `receptionist_army_no` varchar(255) NOT NULL,
  `did` int(11) NOT NULL,
  PRIMARY KEY (`patient_id`),
  KEY `person_id` (`person_id`),
  KEY `receptionist_army_no` (`receptionist_army_no`),
  KEY `did` (`did`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `token`, `date`, `person_id`, `receptionist_army_no`, `did`) VALUES
(9, 1, '2019-04-04', 21, '1234', 1),
(10, 1, '2019-04-04', 22, '1234', 3),
(11, 2, '2019-04-04', 23, '1234', 1),
(12, 1, '2019-04-04', 23, '1234', 2),
(13, 2, '2019-04-04', 24, '1234', 2),
(14, 3, '2019-04-04', 24, '818181', 2);

-- --------------------------------------------------------

--
-- Table structure for table `patient_test_result`
--

DROP TABLE IF EXISTS `patient_test_result`;
CREATE TABLE IF NOT EXISTS `patient_test_result` (
  `patient_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `pathologist_army_no` varchar(255) NOT NULL,
  KEY `patient_id` (`patient_id`),
  KEY `test_id` (`test_id`),
  KEY `attribute_id` (`attribute_id`),
  KEY `pathologist_army_no` (`pathologist_army_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

DROP TABLE IF EXISTS `receptionist`;
CREATE TABLE IF NOT EXISTS `receptionist` (
  `army_no` varchar(30) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rank` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `date_of_joining` date NOT NULL,
  PRIMARY KEY (`army_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`army_no`, `fname`, `lname`, `mobile_no`, `email`, `rank`, `gender`, `dob`, `date_of_joining`) VALUES
('1234', 'ram', 'singh', '1111111', 'ram@gmail', 'hav', 'male', '1111-11-11', '1111-11-11'),
('818181', 'sonu', 'kumar', '919191919', 'sonu@jj', 'hav', 'male', '1111-11-11', '1111-11-11'),
('9876', 'suraj', 'rathore', '1010108', 'sss@gmail', 'lsnk', 'male', '1111-11-11', '1111-11-11');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

DROP TABLE IF EXISTS `tests`;
CREATE TABLE IF NOT EXISTS `tests` (
  `test_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_name` varchar(255) NOT NULL,
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`test_id`, `test_name`) VALUES
(4, 'sugar'),
(5, 'RFT'),
(6, 'lipid profile');

-- --------------------------------------------------------

--
-- Table structure for table `test_attributes`
--

DROP TABLE IF EXISTS `test_attributes`;
CREATE TABLE IF NOT EXISTS `test_attributes` (
  `test_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  KEY `test_id` (`test_id`),
  KEY `attribute_id` (`attribute_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_attributes`
--

INSERT INTO `test_attributes` (`test_id`, `attribute_id`) VALUES
(4, 8),
(4, 9),
(4, 10),
(5, 11),
(5, 12),
(5, 13),
(5, 14),
(6, 15),
(6, 16),
(6, 17),
(6, 18);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `army_person_relation`
--
ALTER TABLE `army_person_relation`
  ADD CONSTRAINT `army_person_relation_ibfk_1` FOREIGN KEY (`army_no`) REFERENCES `army_serving_person` (`army_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor_speciality`
--
ALTER TABLE `doctor_speciality`
  ADD CONSTRAINT `doctor_speciality_ibfk_1` FOREIGN KEY (`army_no`) REFERENCES `doctor` (`army_no`) ON DELETE CASCADE,
  ADD CONSTRAINT `doctor_speciality_ibfk_2` FOREIGN KEY (`did`) REFERENCES `department` (`did`) ON DELETE CASCADE;

--
-- Constraints for table `opd`
--
ALTER TABLE `opd`
  ADD CONSTRAINT `opd_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `opd_ibfk_2` FOREIGN KEY (`test_id`) REFERENCES `tests` (`test_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `opd_ibfk_3` FOREIGN KEY (`doctor_army_no`) REFERENCES `doctor` (`army_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `army_person_relation` (`person_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patient_ibfk_2` FOREIGN KEY (`receptionist_army_no`) REFERENCES `receptionist` (`army_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patient_ibfk_3` FOREIGN KEY (`did`) REFERENCES `department` (`did`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient_test_result`
--
ALTER TABLE `patient_test_result`
  ADD CONSTRAINT `patient_test_result_ibfk_1` FOREIGN KEY (`pathologist_army_no`) REFERENCES `pathologist` (`army_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patient_test_result_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patient_test_result_ibfk_3` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`attribute_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `test_attributes`
--
ALTER TABLE `test_attributes`
  ADD CONSTRAINT `test_attributes_ibfk_1` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`attribute_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_attributes_ibfk_2` FOREIGN KEY (`test_id`) REFERENCES `tests` (`test_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
