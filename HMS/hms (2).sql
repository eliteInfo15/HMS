-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 07, 2019 at 01:05 PM
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
  `blood_group` varchar(10) NOT NULL,
  PRIMARY KEY (`person_id`),
  KEY `army_no` (`army_no`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `army_person_relation`
--

INSERT INTO `army_person_relation` (`person_id`, `army_no`, `relation`, `relation_fname`, `relation_lname`, `relation_date_of_birth`, `relation_gender`, `blood_group`) VALUES
(35, '1122', 'son', 'roshan', 'sharma', '1996-01-09', 'male', 'A+'),
(36, '1122', 'wife', 'divya', 'sharma', '1996-01-01', 'female', 'O+'),
(37, '4512', 'daughter', 'roshni', 'kumari', '1998-02-02', 'female', 'O+'),
(38, '4512', 'wife', 'anjali', 'kumari', '1998-03-03', 'female', 'A+'),
(39, '1122', 'self', 'sohan', 'sharma', '1970-02-01', 'male', 'A+'),
(40, '4512', 'self', 'mohan', 'kumari', '1972-01-30', 'male', 'B+');

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
  `blood_group` varchar(10) NOT NULL,
  PRIMARY KEY (`army_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `army_serving_person`
--

INSERT INTO `army_serving_person` (`army_no`, `fname`, `lname`, `rank`, `unit`, `email`, `gender`, `mobile`, `date_of_birth`, `date_of_joining`, `blood_group`) VALUES
('1122', 'sohan', 'sharma', 'SUB', '116', 'sdgsgm', 'male', '121212', '1970-02-01', '2017-02-02', 'A+'),
('4512', 'mohan', 'kumar', 'hav', '120', 'hdhddh', 'male', '81818', '1972-01-30', '2018-05-09', 'B+');

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

DROP TABLE IF EXISTS `attributes`;
CREATE TABLE IF NOT EXISTS `attributes` (
  `attribute_id` int(11) NOT NULL AUTO_INCREMENT,
  `attribute_name` varchar(255) NOT NULL,
  PRIMARY KEY (`attribute_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`attribute_id`, `attribute_name`) VALUES
(8, 'sugar fasting'),
(9, 'sugar pp'),
(10, 'sugar random'),
(11, 'urea'),
(12, 'creatinine'),
(13, 'cholestrol'),
(14, 'uric acid'),
(15, 'total cholestrol'),
(16, 'triglycerides'),
(17, 'hdl cholestrol'),
(18, 'ldl cholestrol'),
(19, 'a1'),
(20, 'a2'),
(21, 'a3'),
(22, 'ra factor'),
(23, 'a.s.o'),
(24, 'c.b.p'),
(25, 'a1'),
(26, 'a2'),
(27, 'a3'),
(28, 'g'),
(29, 'h');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`did`, `dname`, `establishment_year`) VALUES
(1, 'ent', 2006),
(2, 'eye', 2008),
(3, 'heart', 2000),
(5, 'gynaelogy', 2010);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `army_no` varchar(100) NOT NULL,
  `dfname` varchar(255) NOT NULL,
  `dlname` varchar(255) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `drank` varchar(50) NOT NULL,
  `joining_date` date NOT NULL,
  `date_of_birth` date NOT NULL,
  PRIMARY KEY (`army_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`army_no`, `dfname`, `dlname`, `mobile_no`, `gender`, `email`, `drank`, `joining_date`, `date_of_birth`) VALUES
('12345', 'rakesh', 'tomar', '1919191', 'male', 'rakesh@gmail', 'major', '1111-11-11', '1111-11-11'),
('9090', 'rudra', 'singh', '8181818181', 'male', 'aaa@hha.co', 'col', '1111-11-11', '1111-11-11'),
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
('9191', 1),
('9090', 2);

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
('818181', '$2y$10$WJGGbn1jeve9shFK2jNUOujLZgOvZsWizKpAUvhl/4yaenYBJQ3bq', 'receptionist'),
('1290', '$2y$10$f.LCcr3IplkDuY4mMHvr6uKPChgdGK5BpJ2IFb164OVdmGxtLRPZa', 'pathologist'),
('1111', '$2y$10$HpxE16qm5vxk1fzbKopdgOmgv2MeugjbsN6MfcolG2X1R251ovwg.', 'pathologist'),
('1212', '$2y$10$D3QwTJJUoLKAaLbaFa7u/.dsdM3ZRc92aQYklzk0RjdxFfbiYY6ua', 'pathologist'),
('3434', '$2y$10$k18srsOpk8ZY8i1g2LAlF.pZaGx0Cr6pTR20nHBHsEFJnKisKm5rO', 'pathologist'),
('9090', '$2y$10$meGqMbLusn3H9j6AEa6ZveZWQbrO69AEBnfbevlsn8xcj/HyWppD2', 'doctor');

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
  `category` varchar(255) NOT NULL,
  `medicine` varchar(255) DEFAULT NULL,
  `test_completed` int(11) DEFAULT NULL,
  `approval` int(11) DEFAULT NULL,
  KEY `patient_id` (`patient_id`),
  KEY `doctor_army_no` (`doctor_army_no`),
  KEY `test_id` (`test_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opd`
--

INSERT INTO `opd` (`patient_id`, `doctor_army_no`, `test_id`, `comments`, `category`, `medicine`, `test_completed`, `approval`) VALUES
(27, '9191', 5, 'nhfnh', 'nhnh', 'hhh', 1, NULL),
(28, '9191', 4, 'bnh', 'n', 'bcnb', 0, NULL);

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
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`army_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pathologist`
--

INSERT INTO `pathologist` (`army_no`, `fname`, `lname`, `mobile_no`, `gender`, `email`, `rank`, `date_of_joining`, `date_of_birth`, `role`) VALUES
('1212', 'suresh', 'kumar', '9182746362', 'male', 's@jj.com', 'hav', '1111-11-11', '1111-11-11', 'other'),
('3434', 'mukesh', 'singh', '7171717171', 'male', 'ss@jj.com', 'sub', '1111-11-11', '1111-11-11', 'oic');

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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `token`, `date`, `person_id`, `receptionist_army_no`, `did`) VALUES
(27, 1, '2019-04-07', 38, '818181', 1),
(28, 2, '2019-04-07', 35, '818181', 1);

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

--
-- Dumping data for table `patient_test_result`
--

INSERT INTO `patient_test_result` (`patient_id`, `test_id`, `attribute_id`, `value`, `date`, `pathologist_army_no`) VALUES
(27, 5, 11, '34', '2019-04-07', '3434'),
(27, 5, 12, '78', '2019-04-07', '3434'),
(27, 5, 13, '12', '2019-04-07', '3434'),
(27, 5, 14, '67', '2019-04-07', '3434');

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
-- Table structure for table `temp_patient_test_result`
--

DROP TABLE IF EXISTS `temp_patient_test_result`;
CREATE TABLE IF NOT EXISTS `temp_patient_test_result` (
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
-- Table structure for table `tests`
--

DROP TABLE IF EXISTS `tests`;
CREATE TABLE IF NOT EXISTS `tests` (
  `test_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_name` varchar(255) NOT NULL,
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`test_id`, `test_name`) VALUES
(4, 'sugar'),
(5, 'RFT'),
(6, 'lipid profile'),
(8, 'serum');

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
(6, 18),
(8, 22),
(8, 23),
(8, 24);

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
-- Constraints for table `temp_patient_test_result`
--
ALTER TABLE `temp_patient_test_result`
  ADD CONSTRAINT `temp_patient_test_result_ibfk_1` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`attribute_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `temp_patient_test_result_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `temp_patient_test_result_ibfk_3` FOREIGN KEY (`test_id`) REFERENCES `tests` (`test_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
