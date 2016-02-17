-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2015 at 05:32 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE IF NOT EXISTS `assignment` (
  `usn` varchar(10) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `submission` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`usn`, `subject`, `submission`) VALUES
('1RV12IS001', 'BDM', 0),
('1RV12IS001', 'Cloud computing', 0),
('1RV12IS001', 'Enterprise and intellectual property rights', 0),
('1RV12IS001', 'Object oriented modeling design', 0),
('1RV12IS001', 'Software practice and testing', 0),
('1RV12IS001', 'Web programming', 0),
('1RV12IS002', 'Advanced algorithm', 0),
('1RV12IS002', 'C#', 0),
('1RV12IS002', 'Enterprise and intellectual property rights', 0),
('1RV12IS002', 'Object oriented modeling design', 0),
('1RV12IS002', 'Software practice and testing', 0),
('1RV12IS002', 'Web programming', 0),
('1RV12IS003', 'Advanced algorithm', 0),
('1RV12IS003', 'Cloud computing', 0),
('1RV12IS003', 'Enterprise and intellectual property rights', 0),
('1RV12IS003', 'Object oriented modeling design', 0),
('1RV12IS003', 'Software practice and testing', 0),
('1RV12IS003', 'Web programming', 0),
('1RV12IS004', 'Advanced algorithm', 0),
('1RV12IS004', 'Cloud computing', 0),
('1RV12IS004', 'Enterprise and intellectual property rights', 0),
('1RV12IS004', 'Object oriented modeling design', 0),
('1RV12IS004', 'Software practice and testing', 0),
('1RV12IS004', 'Web programming', 0),
('1RV12IS005', 'Advanced algorithm', 0),
('1RV12IS005', 'C#', 0),
('1RV12IS005', 'Enterprise and intellectual property rights', 0),
('1RV12IS005', 'Object oriented modeling design', 0),
('1RV12IS005', 'Software practice and testing', 0),
('1RV12IS005', 'Web programming', 0),
('1RV12IS006', 'Advanced algorithm', 0),
('1RV12IS006', 'C#', 0),
('1RV12IS006', 'Enterprise and intellectual property rights', 0),
('1RV12IS006', 'Object oriented modeling design', 0),
('1RV12IS006', 'Software practice and testing', 0),
('1RV12IS006', 'Web programming', 0),
('1RV12IS007', 'Advanced algorithm', 0),
('1RV12IS007', 'C#', 0),
('1RV12IS007', 'Enterprise and intellectual property rights', 0),
('1RV12IS007', 'Object oriented modeling design', 0),
('1RV12IS007', 'Software practice and testing', 0),
('1RV12IS007', 'Web programming', 0),
('1RV12IS008', 'Advanced algorithm', 0),
('1RV12IS008', 'Cloud computing', 0),
('1RV12IS008', 'Enterprise and intellectual property rights', 0),
('1RV12IS008', 'Object oriented modeling design', 0),
('1RV12IS008', 'Software practice and testing', 0),
('1RV12IS008', 'Web programming', 0),
('1RV12IS009', 'Advanced algorithm', 0),
('1RV12IS009', 'Cloud computing', 0),
('1RV12IS009', 'Enterprise and intellectual property rights', 0),
('1RV12IS009', 'Object oriented modeling design', 0),
('1RV12IS009', 'Software practice and testing', 0),
('1RV12IS009', 'Web programming', 0),
('1RV12IS010', 'Advanced algorithm', 0),
('1RV12IS010', 'Cloud computing', 0),
('1RV12IS010', 'Enterprise and intellectual property rights', 0),
('1RV12IS010', 'Object oriented modeling design', 0),
('1RV12IS010', 'Software practice and testing', 0),
('1RV12IS010', 'Web programming', 0);

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE IF NOT EXISTS `attendence` (
  `usn` varchar(10) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `att` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendence`
--

INSERT INTO `attendence` (`usn`, `subject`, `att`) VALUES
('1RV12IS001', 'BDM', '0'),
('1RV12IS001', 'Cloud computing', '0'),
('1RV12IS001', 'Enterprise and intellectual property rights', '0'),
('1RV12IS001', 'Object oriented modeling design', '0'),
('1RV12IS001', 'Software practice and testing', '0'),
('1RV12IS001', 'Web programming', '67'),
('1RV12IS002', 'Advanced algorithm', '0'),
('1RV12IS002', 'C#', '0'),
('1RV12IS002', 'Enterprise and intellectual property rights', '0'),
('1RV12IS002', 'Object oriented modeling design', '0'),
('1RV12IS002', 'Software practice and testing', '0'),
('1RV12IS002', 'Web programming', '78'),
('1RV12IS003', 'Advanced algorithm', '0'),
('1RV12IS003', 'Cloud computing', '0'),
('1RV12IS003', 'Enterprise and intellectual property rights', '0'),
('1RV12IS003', 'Object oriented modeling design', '0'),
('1RV12IS003', 'Software practice and testing', '0'),
('1RV12IS003', 'Web programming', '89'),
('1RV12IS004', 'Advanced algorithm', '0'),
('1RV12IS004', 'Cloud computing', '0'),
('1RV12IS004', 'Enterprise and intellectual property rights', '0'),
('1RV12IS004', 'Object oriented modeling design', '0'),
('1RV12IS004', 'Software practice and testing', '0'),
('1RV12IS004', 'Web programming', '90'),
('1RV12IS005', 'Advanced algorithm', '0'),
('1RV12IS005', 'C#', '0'),
('1RV12IS005', 'Enterprise and intellectual property rights', '0'),
('1RV12IS005', 'Object oriented modeling design', '0'),
('1RV12IS005', 'Software practice and testing', '0'),
('1RV12IS005', 'Web programming', '87'),
('1RV12IS006', 'Advanced algorithm', '0'),
('1RV12IS006', 'C#', '0'),
('1RV12IS006', 'Enterprise and intellectual property rights', '0'),
('1RV12IS006', 'Object oriented modeling design', '0'),
('1RV12IS006', 'Software practice and testing', '0'),
('1RV12IS006', 'Web programming', '0'),
('1RV12IS007', 'Advanced algorithm', '0'),
('1RV12IS007', 'C#', '0'),
('1RV12IS007', 'Enterprise and intellectual property rights', '0'),
('1RV12IS007', 'Object oriented modeling design', '0'),
('1RV12IS007', 'Software practice and testing', '0'),
('1RV12IS007', 'Web programming', '0'),
('1RV12IS008', 'Advanced algorithm', '0'),
('1RV12IS008', 'Cloud computing', '0'),
('1RV12IS008', 'Enterprise and intellectual property rights', '0'),
('1RV12IS008', 'Object oriented modeling design', '0'),
('1RV12IS008', 'Software practice and testing', '0'),
('1RV12IS008', 'Web programming', '0'),
('1RV12IS009', 'Advanced algorithm', '0'),
('1RV12IS009', 'Cloud computing', '0'),
('1RV12IS009', 'Enterprise and intellectual property rights', '0'),
('1RV12IS009', 'Object oriented modeling design', '0'),
('1RV12IS009', 'Software practice and testing', '0'),
('1RV12IS009', 'Web programming', '0'),
('1RV12IS010', 'Advanced algorithm', '0'),
('1RV12IS010', 'Cloud computing', '0'),
('1RV12IS010', 'Enterprise and intellectual property rights', '0'),
('1RV12IS010', 'Object oriented modeling design', '0'),
('1RV12IS010', 'Software practice and testing', '0'),
('1RV12IS010', 'Web programming', '0');

-- --------------------------------------------------------

--
-- Table structure for table `count1`
--

CREATE TABLE IF NOT EXISTS `count1` (
  `sem` int(11) NOT NULL,
  `sub1` int(11) DEFAULT NULL,
  `sub2` int(11) DEFAULT NULL,
  `sub3` int(11) DEFAULT NULL,
  `sub4` int(11) DEFAULT NULL,
  `sub5` int(11) DEFAULT NULL,
  `sub6` int(11) DEFAULT NULL,
  `sub7` int(11) DEFAULT NULL,
  `sub8` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `count1`
--

INSERT INTO `count1` (`sem`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `sub6`, `sub7`, `sub8`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 10, 10, 10, 10, 9, 10, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `count2`
--

CREATE TABLE IF NOT EXISTS `count2` (
  `sem` int(11) NOT NULL,
  `sub1` int(11) NOT NULL,
  `sub2` int(11) NOT NULL,
  `sub3` int(11) NOT NULL,
  `sub4` int(11) NOT NULL,
  `sub5` int(11) NOT NULL,
  `sub6` int(11) NOT NULL,
  `sub7` int(11) NOT NULL,
  `sub8` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `count2`
--

INSERT INTO `count2` (`sem`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `sub6`, `sub7`, `sub8`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 1, 1, 1, 1, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `count3`
--

CREATE TABLE IF NOT EXISTS `count3` (
  `sem` int(11) NOT NULL,
  `sub1` int(11) NOT NULL,
  `sub2` int(11) NOT NULL,
  `sub3` int(11) NOT NULL,
  `sub4` int(11) NOT NULL,
  `sub5` int(11) NOT NULL,
  `sub6` int(11) NOT NULL,
  `sub7` int(11) NOT NULL,
  `sub8` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `count3`
--

INSERT INTO `count3` (`sem`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `sub6`, `sub7`, `sub8`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `sem` int(11) NOT NULL,
  `subject1` varchar(50) DEFAULT NULL,
  `subject2` varchar(50) DEFAULT NULL,
  `subject3` varchar(50) DEFAULT NULL,
  `subject4` varchar(50) DEFAULT NULL,
  `subject5` varchar(50) DEFAULT NULL,
  `subject6` varchar(50) DEFAULT NULL,
  `subject7` varchar(50) DEFAULT NULL,
  `subject8` varchar(50) DEFAULT NULL,
  `subject9` varchar(50) DEFAULT NULL,
  `subject10` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`sem`, `subject1`, `subject2`, `subject3`, `subject4`, `subject5`, `subject6`, `subject7`, `subject8`, `subject9`, `subject10`) VALUES
(1, 'MATH1', 'PHYSICS', 'CIVIL', 'CAED', 'ELECTRICAL', NULL, NULL, NULL, NULL, NULL),
(3, 'MATH3', 'Engineering materials', 'Data structures with C', 'Logic design', 'Object oriented programming with C++', 'Discreet mathematics', NULL, NULL, NULL, NULL),
(5, 'Intellectual property rights and enterprise', 'Software system', 'Micro processors', 'Computer networks', 'Analysis and design of algorithms', 'MIS', 'Compiler design', 'Graph theory', 'JAVA', 'NLP'),
(7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'BDM', 'Cloud computing', 'C#', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_code`
--

CREATE TABLE IF NOT EXISTS `course_code` (
  `subname` varchar(50) NOT NULL,
  `subcode` varchar(10) NOT NULL,
  `acdyear` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_code`
--

INSERT INTO `course_code` (`subname`, `subcode`, `acdyear`) VALUES
('Enterprise and intellectual property rights', '10HSS71', '2015-2016'),
('Object oriented modeling design', '10IS72', '2015-2016'),
('Web programming', '10IS73', '2015-2016'),
('Software practice and testing', '10IS74', '2015-2016'),
('Cloud computing', '10ISF757', '2015-2016'),
('C#', '10ISF759', '2015-2016'),
('BDM', '10ISG761', '2015-2016'),
('Adavanced algorithm', '10ISG767', '2015-2016'),
('Engineering materials', '12HSS31', '2015-2016'),
('Intellectual property rights and enterprise', '12HSS51', '2015-2016'),
('MATH3', '12IS32', '2015-2016'),
('Data structures with C', '12IS33', '2015-2016'),
('Logic design', '12IS34', '2015-2016'),
('Object oriented programming with C++', '12IS35', '2015-2016'),
('Discreet mathematics', '12IS36', '2015-2016'),
('Software system', '12IS52', '2015-2016'),
('Micro processors', '12IS53', '2015-2016'),
('Computer networks', '12IS54', '2015-2016'),
('Analysis and design of algorithms', '12ISD551', '2015-2016'),
('MIS', '12ISD552', '2015-2016'),
('Compiler design', '12ISD553', '2015-2016'),
('JAVA', '12ISE561', '2015-2016'),
('Graph theory', '12ISE562', '2015-2016'),
('NLP', '12ISE563', '2015-2016');

-- --------------------------------------------------------

--
-- Table structure for table `deadline`
--

CREATE TABLE IF NOT EXISTS `deadline` (
  `sem` int(11) NOT NULL,
  `internal` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deadline`
--

INSERT INTO `deadline` (`sem`, `internal`, `date`) VALUES
(7, 1, '2015-11-19'),
(7, 2, '2015-12-10');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `fid` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `branch` varchar(3) NOT NULL,
  `sub1` varchar(50) DEFAULT NULL,
  `sub2` varchar(50) DEFAULT NULL,
  `sub3` varchar(50) DEFAULT NULL,
  `sub4` varchar(50) DEFAULT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `acdyear` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fid`, `password`, `name`, `branch`, `sub1`, `sub2`, `sub3`, `sub4`, `phone`, `email`, `acdyear`) VALUES
('is_001', 'hello', 'Priya D', 'ISE', 'Programming with C', '', '', '', '1234567891', 'xyz@gmail.com', '2015-2016'),
('is_002', 'hello', 'Sagar B.M', 'ISE', 'Programming with C', '', '', '', '1234567891', 'xyz@gmail.com', '2015-2016'),
('is_003', 'hello', 'Nagaraj G. C', 'ISE', 'Programming with C', '', '', '', '1234567891', 'xyz@gmail.com', '2015-2016'),
('is_004', 'hello', 'Shwetha', 'ISE', 'MATH3', '', '', '', '1234567891', 'xyz@gmail.com', '2015-2016'),
('is_005', 'hello', 'Padmashree', 'ISE', 'Engineering materials', '', '', '', '1234567891', 'xyz@gmail.com', '2015-2016'),
('is_006', 'hello', 'Rekha', 'ISE', 'Data structure with C', 'Analysis and design of algorithm', '', '', '1234567891', 'xyz@gmail.com', '2015-2016'),
('is_007', 'hello', 'Rashmi', 'ISE', 'Logic design', '', '', '', '1234567891', 'xyz@gmail.com', '2015-2016'),
('is_008', 'hello', 'Naveen', 'ISE', 'Object oriented programming with C++', '', '', '', '1234567891', 'xyz@gmail.com', '2015-2016'),
('is_009', 'hello', 'Hema kulkarni', 'ISE', 'Discreet mathematics', '', '', '', '1234567891', 'xyz@gmail.com', '2015-2016'),
('is_010', 'hello', 'Himanshu', 'ISE', 'Intellectual property rights and enterprise', '', '', '', '1234567891', 'xyz@gmail.com', '2015-2016'),
('is_011', 'hello', 'Chithra ', 'ISE', 'System software', '', '', '', '1234567891', 'xyz@gmail.com', '2015-2016'),
('is_012', 'hello', 'Vasuprada', 'ISE', 'Micro processors', '', '', '', '1234567891', 'xyz@gmail.com', '2015-2016'),
('is_013', 'hello', 'Monika', 'ISE', 'Computer networks', '', '', '', '1234567891', 'xyz@gmail.com', '2015-2016'),
('is_014', 'hello', 'Manisha', 'ISE', 'Compiler design', '', '', '', '1234567891', 'xyz@gmail.com', '2015-2016'),
('is_015', 'hello', 'Monalika', 'ISE', 'MIS', '', '', '', '1234567891', 'xyz@gmail.com', '2015-2016'),
('is_016', 'hello', 'Manjushree', 'ISE', 'Graph theory', '', '', '', '1234567891', 'xyz@gmail.com', '2015-2016'),
('is_017', 'hello', 'HAMSAPRIYE', 'ISE', 'JAVA', 'CC', '', '', '9898989898', 'xyz@gmail.com', '2015-2016'),
('is_018', 'hello', 'RATNA', 'ISE', 'NLP', 'Advanced algorithms', '', '', '9898989898', 'xyz@gmail.com', '2015-2016'),
('is_019', 'hello', 'REKHA BS', 'ISE', 'Enterprise intellectual property rights', '', '', '', '9898989898', 'xyz@gmail.com', '2015-2016'),
('is_020', 'hello', 'PRAKASH', 'ISE', 'Object oriented modeling design', '', '', '', '9898989898', 'xyz@gmail.com', '2015-2016'),
('is_021', 'hello', 'SHANTARAM NAYAK', 'ISE', 'Software practice and testing', '', '', '', '9898989898', 'xyz@gmail.com', '2015-2016'),
('is_022', 'hello', 'PADMASHREE T', 'ISE', 'Web programming', '', '', '', '9898989898', 'xyz@gmail.com', '2015-2016'),
('is_023', 'hello', 'VANISHREE K', 'ISE', 'BDM', '', '', '', '9898989898', 'xyz@gmail.com', '2015-2016'),
('is_024', 'hello', 'Smitha G R', 'ISE', 'C#', '', '', '', '9898989898', 'xyz@gmail.com', '2015-2016');

-- --------------------------------------------------------

--
-- Table structure for table `finalmarks`
--

CREATE TABLE IF NOT EXISTS `finalmarks` (
  `usn` varchar(10) NOT NULL,
  `sub1` int(11) DEFAULT NULL,
  `sub2` int(11) DEFAULT NULL,
  `sub3` int(11) DEFAULT NULL,
  `sub4` int(11) DEFAULT NULL,
  `sub5` int(11) DEFAULT NULL,
  `sub6` int(11) DEFAULT NULL,
  `sub7` int(11) DEFAULT NULL,
  `sub8` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finalmarks`
--

INSERT INTO `finalmarks` (`usn`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `sub6`, `sub7`, `sub8`) VALUES
('1RV12IS001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1RV12IS002', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1RV12IS003', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1RV12IS004', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1RV12IS005', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1RV12IS006', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1RV12IS007', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1RV12IS008', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1RV12IS009', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1RV12IS010', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hod`
--

CREATE TABLE IF NOT EXISTS `hod` (
  `fid` varchar(7) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `department` varchar(3) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hod`
--

INSERT INTO `hod` (`fid`, `password`, `name`, `department`, `email`, `phone`) VALUES
('admin', 'hello', 'ADMIN', 'ISE', 'admin@gmail.com', '7829286556');

-- --------------------------------------------------------

--
-- Table structure for table `internal1`
--

CREATE TABLE IF NOT EXISTS `internal1` (
  `usn` varchar(10) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `marks` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internal1`
--

INSERT INTO `internal1` (`usn`, `subject`, `marks`) VALUES
('1RV12IS001', 'Web programming', 34),
('1RV12IS002', 'Web programming', 33),
('1RV12IS003', 'Web programming', 23),
('1RV12IS004', 'Web programming', 44),
('1RV12IS005', 'Web programming', 37);

-- --------------------------------------------------------

--
-- Table structure for table `internal2`
--

CREATE TABLE IF NOT EXISTS `internal2` (
  `usn` varchar(10) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `marks` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `internal3`
--

CREATE TABLE IF NOT EXISTS `internal3` (
  `usn` varchar(10) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `marks` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `internal` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `usn` varchar(10) NOT NULL,
  `roomno` int(11) DEFAULT NULL,
  `seatno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`internal`, `subject`, `usn`, `roomno`, `seatno`) VALUES
(1, 'BDM', '1RV12IS001', 1, 1),
(1, 'Cloud computing', '1RV12IS001', 1, 1),
(1, 'Enterprise and intellectual property rights', '1RV12IS001', 1, 1),
(1, 'Object oriented modeling design', '1RV12IS001', 1, 1),
(1, 'Software practice and testing', '1RV12IS001', 1, 1),
(1, 'Web programming', '1RV12IS001', 1, 1),
(2, 'BDM', '1RV12IS001', 1, 1),
(2, 'Cloud computing', '1RV12IS001', 1, 1),
(2, 'Enterprise and intellectual property rights', '1RV12IS001', 1, 1),
(2, 'Object oriented modeling design', '1RV12IS001', 1, 1),
(2, 'Software practice and testing', '1RV12IS001', 1, 1),
(2, 'Web programming', '1RV12IS001', 1, 1),
(1, 'C#', '1RV12IS002', 1, 2),
(1, 'Enterprise and intellectual property rights', '1RV12IS002', 1, 2),
(1, 'Object oriented modeling design', '1RV12IS002', 1, 2),
(1, 'Software practice and testing', '1RV12IS002', 1, 2),
(1, 'Web programming', '1RV12IS002', 1, 2),
(1, 'Advanced algorithm', '1RV12IS003', 1, 3),
(1, 'Cloud computing', '1RV12IS003', 1, 4),
(1, 'Enterprise and intellectual property rights', '1RV12IS003', 1, 4),
(1, 'Object oriented modeling design', '1RV12IS003', 1, 4),
(1, 'Software practice and testing', '1RV12IS003', 1, 4),
(1, 'Web programming', '1RV12IS003', 1, 4),
(1, 'Advanced algorithm', '1RV12IS004', 1, 2),
(1, 'Cloud computing', '1RV12IS004', 1, 3),
(1, 'Enterprise and intellectual property rights', '1RV12IS004', 1, 3),
(1, 'Object oriented modeling design', '1RV12IS004', 1, 3),
(1, 'Software practice and testing', '1RV12IS004', 1, 3),
(1, 'Web programming', '1RV12IS004', 1, 3),
(1, 'Advanced algorithm', '1RV12IS005', 1, 4),
(1, 'C#', '1RV12IS005', 1, 5),
(1, 'Enterprise and intellectual property rights', '1RV12IS005', 1, 5),
(1, 'Object oriented modeling design', '1RV12IS005', 1, 5),
(1, 'Software practice and testing', '1RV12IS005', 1, 5),
(1, 'Web programming', '1RV12IS005', 1, 5),
(1, 'Advanced algorithm', '1RV12IS006', 1, 5),
(1, 'C#', '1RV12IS006', 1, 6),
(1, 'Enterprise and intellectual property rights', '1RV12IS006', 1, 6),
(1, 'Object oriented modeling design', '1RV12IS006', 1, 6),
(1, 'Software practice and testing', '1RV12IS006', 1, 6),
(1, 'Web programming', '1RV12IS006', 1, 6),
(1, 'Advanced algorithm', '1RV12IS007', 1, 6),
(1, 'C#', '1RV12IS007', 1, 7),
(1, 'Enterprise and intellectual property rights', '1RV12IS007', 1, 7),
(1, 'Object oriented modeling design', '1RV12IS007', 1, 7),
(1, 'Software practice and testing', '1RV12IS007', 1, 7),
(1, 'Web programming', '1RV12IS007', 1, 7),
(1, 'Advanced algorithm', '1RV12IS008', 1, 7),
(1, 'Cloud computing', '1RV12IS008', 1, 8),
(1, 'Enterprise and intellectual property rights', '1RV12IS008', 1, 8),
(1, 'Object oriented modeling design', '1RV12IS008', 1, 8),
(1, 'Software practice and testing', '1RV12IS008', 1, 8),
(1, 'Web programming', '1RV12IS008', 1, 8),
(1, 'Advanced algorithm', '1RV12IS009', 1, 8),
(1, 'Cloud computing', '1RV12IS009', 1, 9),
(1, 'Enterprise and intellectual property rights', '1RV12IS009', 1, 9),
(1, 'Object oriented modeling design', '1RV12IS009', 1, 9),
(1, 'Software practice and testing', '1RV12IS009', 1, 9),
(1, 'Web programming', '1RV12IS009', 1, 9),
(1, 'Advanced algorithm', '1RV12IS010', 1, 9),
(1, 'Cloud computing', '1RV12IS010', 1, 10),
(1, 'Enterprise and intellectual property rights', '1RV12IS010', 1, 10),
(1, 'Object oriented modeling design', '1RV12IS010', 1, 10),
(1, 'Software practice and testing', '1RV12IS010', 1, 10),
(1, 'Web programming', '1RV12IS010', 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `roomno` int(11) NOT NULL,
  `roomrow` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomno`, `roomrow`) VALUES
(1, 4),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `sem` int(11) NOT NULL,
  `internal` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `slot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`sem`, `internal`, `subject`, `date`, `slot`) VALUES
(7, 1, 'Advanced algorithm', '2015-11-20', 1),
(7, 1, 'BDM', '2015-11-20', 1),
(7, 1, 'C#', '2015-11-20', 3),
(7, 1, 'Cloud computing', '2015-11-20', 3),
(7, 1, 'Enterprise and intellectual property rights', '2015-11-19', 3),
(7, 1, 'Object oriented modeling design', '2015-11-18', 3),
(7, 1, 'Software practice and testing', '2015-11-19', 1),
(7, 1, 'Web programming', '2015-11-18', 1),
(7, 2, 'Advanced algorithm', '2015-12-14', 1),
(7, 2, 'BDM', '2015-12-14', 1),
(7, 2, 'C#', '2015-12-14', 3),
(7, 2, 'Cloud computing', '2015-12-14', 3),
(7, 2, 'Enterprise and intellectual property rights', '2015-12-13', 3),
(7, 2, 'Object oriented modeling design', '2015-12-12', 3),
(7, 2, 'Software practice and testing', '2015-12-13', 1),
(7, 2, 'Web programming', '2015-12-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `acdyear` varchar(9) NOT NULL,
  `usn` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `branch` varchar(3) NOT NULL,
  `sem` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(70) NOT NULL,
  `fathersname` varchar(30) NOT NULL,
  `fathersemail` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`acdyear`, `usn`, `password`, `name`, `branch`, `sem`, `email`, `phone`, `address`, `fathersname`, `fathersemail`) VALUES
('2015-2016', '1RV12IS001', 'hello', 'Shreya', 'ISE', 7, 'example23@gmail.com', '9898989898', 'RT Nagar', 'ARJUN', 'f_email@gmail.com'),
('2015-2016', '1RV12IS002', 'hello', 'Sampada', 'ISE', 7, 'example23@gmail.com', '7829286556', 'RR Nagar', 'ARJUN', 'f_email@gmail.com'),
('2015-2016', '1RV12IS003', 'hello', 'Kushal', 'ISE', 7, 'example23@gmail.com', '7829286556', 'RR Nagar', 'ARJUN', 'f_email@gmail.com'),
('2015-2016', '1RV12IS004', 'hello', 'Karan', 'ISE', 7, 'example23@gmail.com', '7829286556', 'RR Nagar', 'ARJUN', 'f_email@gmail.com'),
('2015-2016', '1RV12IS005', 'hello', 'Suprateek', 'ISE', 7, 'example23@gmail.com', '7829286556', 'RR Nagar', 'ARJUN', 'f_email@gmail.com'),
('2015-2016', '1RV12IS006', 'hello', 'Utkarsh', 'ISE', 7, 'example23@gmail.com', '7829286556', 'RR Nagar', 'ARJUN', 'f_email@gmail.com'),
('2015-2016', '1RV12IS007', 'hello', 'Sanjana', 'ISE', 7, 'example23@gmail.com', '7829286556', 'Indiranagar', 'ARJUN', 'f_email@gmail.com'),
('2015-2016', '1RV12IS008', 'hello', 'Rachitha', 'ISE', 7, 'example23@gmail.com', '7829286556', 'Bangalore University', 'ARJUN', 'f_email@gmail.com'),
('2015-2016', '1RV12IS009', 'hello', 'Rashi', 'ISE', 7, 'example23@gmail.com', '7829286556', 'RR Nagar', 'ARJUN', 'f_email@gmail.com'),
('2015-2016', '1RV12IS010', 'hello', 'Garima', 'ISE', 7, 'example23@gmail.com', '7829286556', 'RR Nagar', 'ARJUN', 'f_email@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `usn` varchar(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `subject1` varchar(50) DEFAULT NULL,
  `subject2` varchar(50) DEFAULT NULL,
  `subject3` varchar(50) DEFAULT NULL,
  `subject4` varchar(50) DEFAULT NULL,
  `subject5` varchar(50) DEFAULT NULL,
  `subject6` varchar(50) DEFAULT NULL,
  `subject7` varchar(50) DEFAULT NULL,
  `subject8` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`usn`, `sem`, `subject1`, `subject2`, `subject3`, `subject4`, `subject5`, `subject6`, `subject7`, `subject8`) VALUES
('1RV10IS002', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'Cloud computing', NULL, NULL),
('1RV12IS001', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'BDM', 'Cloud computing', NULL, NULL),
('1RV12IS002', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'C#', NULL, NULL),
('1RV12IS003', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'Cloud computing', NULL, NULL),
('1RV12IS004', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'Cloud computing', NULL, NULL),
('1RV12IS005', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'C#', NULL, NULL),
('1RV12IS006', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'C#', NULL, NULL),
('1RV12IS007', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'C#', NULL, NULL),
('1RV12IS008', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'Cloud computing', NULL, NULL),
('1RV12IS009', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'Cloud computing', NULL, NULL),
('1RV12IS010', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'Cloud computing', NULL, NULL),
('1RV12IS011', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'Cloud computing', NULL, NULL),
('1RV12IS012', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'Cloud computing', NULL, NULL),
('1RV12IS013', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'Cloud computing', NULL, NULL),
('1RV12IS014', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'C#', NULL, NULL),
('1RV12IS015', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'Cloud computing', NULL, NULL),
('1RV12IS016', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'C#', NULL, NULL),
('1RV12IS017', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'BDM', 'Cloud computing', NULL, NULL),
('1RV12IS018', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'Cloud computing', NULL, NULL),
('1RV12IS019', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'C#', NULL, NULL),
('1RV12IS020', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'BDM', 'Cloud computing', NULL, NULL),
('1RV12IS021', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'BDM', 'Cloud computing', NULL, NULL),
('1RV12IS022', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'Cloud computing', NULL, NULL),
('1RV12IS023', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'Cloud computing', NULL, NULL),
('1RV12IS024', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'Cloud computing', NULL, NULL),
('1RV12IS025', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'Cloud computing', NULL, NULL),
('1RV12IS026', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'BDM', 'Cloud computing', NULL, NULL),
('1RV12IS027', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'Cloud computing', NULL, NULL),
('1RV12IS028', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'Cloud computing', NULL, NULL),
('1RV12IS029', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'C#', NULL, NULL),
('1RV12IS030', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'Cloud computing', NULL, NULL),
('1RV12IS031', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'BDM', 'Cloud computing', NULL, NULL),
('1RV12IS032', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'BDM', 'Cloud computing', NULL, NULL),
('1RV12IS033', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'C#', NULL, NULL),
('1RV12IS034', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'Cloud computing', NULL, NULL),
('1RV12IS035', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'BDM', 'Cloud computing', NULL, NULL),
('1RV12IS037', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'Cloud computing', NULL, NULL),
('1RV12IS038', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'BDM', 'Cloud computing', NULL, NULL),
('1RV12IS039', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'BDM', 'Cloud computing', NULL, NULL),
('1RV12IS040', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'C#', NULL, NULL),
('1RV12IS042', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'Cloud computing', NULL, NULL),
('1RV12IS043', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'C#', NULL, NULL),
('1RV12IS044', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'Cloud computing', NULL, NULL),
('1RV12IS045', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'Cloud computing', NULL, NULL),
('1RV12IS046', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'Cloud computing', NULL, NULL),
('1RV12IS047', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'Cloud computing', NULL, NULL),
('1RV12IS048', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'Cloud computing', NULL, NULL),
('1RV12IS050', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'C#', NULL, NULL),
('1RV12IS051', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'Cloud computing', NULL, NULL),
('1RV12IS052', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'BDM', 'Cloud computing', NULL, NULL),
('1RV12IS053', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'Cloud computing', NULL, NULL),
('1RV12IS054', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'Cloud computing', NULL, NULL),
('1RV12IS055', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'C#', NULL, NULL),
('1RV12IS056', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'Cloud computing', NULL, NULL),
('1RV12IS058', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'Cloud computing', NULL, NULL),
('1RV12IS059', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'Cloud computing', NULL, NULL),
('1RV12IS060', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'C#', NULL, NULL),
('1RV12IS061', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'C#', NULL, NULL),
('1RV12IS062', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'BDM', 'Cloud computing', NULL, NULL),
('1RV12IS063', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'C#', NULL, NULL),
('1RV12IS064', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'Cloud computing', NULL, NULL),
('1RV12IS065', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'Cloud computing', NULL, NULL),
('1RV12IS400', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'Advanced algorithm', 'C#', NULL, NULL),
('1RV12IS401', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'BDM', 'Cloud computing', NULL, NULL),
('1RV12IS402', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'BDM', 'Cloud computing', NULL, NULL),
('1RV12IS403', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'BDM', 'Cloud computing', NULL, NULL),
('1RV12IS404', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'BDM', 'Cloud computing', NULL, NULL),
('1RV12IS405', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'BDM', 'Cloud computing', NULL, NULL),
('1RV12IS406', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'BDM', 'Cloud computing', NULL, NULL),
('1RV12IS407', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'BDM', 'Cloud computing', NULL, NULL),
('1RV12IS408', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'BDM', 'Cloud computing', NULL, NULL),
('1RV12IS410', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'BDM', 'Cloud computing', NULL, NULL),
('1RV12IS411', 7, 'Web programming', 'Object oriented modeling design', 'Software practice and testing', 'Enterprise and intellectual property rights', 'BDM', 'Cloud computing', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
 ADD PRIMARY KEY (`usn`,`subject`), ADD KEY `usn` (`usn`);

--
-- Indexes for table `attendence`
--
ALTER TABLE `attendence`
 ADD PRIMARY KEY (`usn`,`subject`);

--
-- Indexes for table `count1`
--
ALTER TABLE `count1`
 ADD PRIMARY KEY (`sem`);

--
-- Indexes for table `count2`
--
ALTER TABLE `count2`
 ADD PRIMARY KEY (`sem`);

--
-- Indexes for table `count3`
--
ALTER TABLE `count3`
 ADD PRIMARY KEY (`sem`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
 ADD PRIMARY KEY (`sem`);

--
-- Indexes for table `course_code`
--
ALTER TABLE `course_code`
 ADD PRIMARY KEY (`subcode`,`acdyear`);

--
-- Indexes for table `deadline`
--
ALTER TABLE `deadline`
 ADD PRIMARY KEY (`sem`,`internal`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
 ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `finalmarks`
--
ALTER TABLE `finalmarks`
 ADD PRIMARY KEY (`usn`);

--
-- Indexes for table `hod`
--
ALTER TABLE `hod`
 ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `internal1`
--
ALTER TABLE `internal1`
 ADD PRIMARY KEY (`usn`,`subject`);

--
-- Indexes for table `internal2`
--
ALTER TABLE `internal2`
 ADD PRIMARY KEY (`usn`,`subject`);

--
-- Indexes for table `internal3`
--
ALTER TABLE `internal3`
 ADD PRIMARY KEY (`usn`,`subject`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
 ADD PRIMARY KEY (`usn`,`internal`,`subject`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
 ADD PRIMARY KEY (`roomno`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
 ADD PRIMARY KEY (`internal`,`subject`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`usn`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
 ADD PRIMARY KEY (`usn`,`sem`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
ADD CONSTRAINT `assignment_ibfk_1` FOREIGN KEY (`usn`) REFERENCES `student` (`usn`);

--
-- Constraints for table `attendence`
--
ALTER TABLE `attendence`
ADD CONSTRAINT `attendence_ibfk_1` FOREIGN KEY (`usn`) REFERENCES `student` (`usn`),
ADD CONSTRAINT `attendence_ibfk_2` FOREIGN KEY (`usn`) REFERENCES `student` (`usn`);

--
-- Constraints for table `internal1`
--
ALTER TABLE `internal1`
ADD CONSTRAINT `internal1_ibfk_1` FOREIGN KEY (`usn`) REFERENCES `student` (`usn`);

--
-- Constraints for table `internal2`
--
ALTER TABLE `internal2`
ADD CONSTRAINT `internal2_ibfk_1` FOREIGN KEY (`usn`) REFERENCES `student` (`usn`);

--
-- Constraints for table `internal3`
--
ALTER TABLE `internal3`
ADD CONSTRAINT `internal3_ibfk_1` FOREIGN KEY (`usn`) REFERENCES `student` (`usn`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
