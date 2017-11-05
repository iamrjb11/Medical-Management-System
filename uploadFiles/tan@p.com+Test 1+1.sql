-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2017 at 03:33 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `based`
--

-- --------------------------------------------------------

--
-- Table structure for table `med_given_tests`
--

CREATE TABLE `med_given_tests` (
  `prescription_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `med_medicines_stock`
--

CREATE TABLE `med_medicines_stock` (
  `medicine_id` int(11) NOT NULL,
  `medicine_name` varchar(100) NOT NULL,
  `medicine_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `med_medicines_stock`
--

INSERT INTO `med_medicines_stock` (`medicine_id`, `medicine_name`, `medicine_stock`) VALUES
(1, 'Napa', 65),
(2, 'Maxpro 20mg', 90),
(3, 'Napa Extra 2', 20),
(4, 'Maxpro 40mg', 50);

-- --------------------------------------------------------

--
-- Table structure for table `med_medicine_counter`
--

CREATE TABLE `med_medicine_counter` (
  `counter_staff_id` int(11) NOT NULL,
  `prescription_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `med_prescribed_medicines`
--

CREATE TABLE `med_prescribed_medicines` (
  `srl_no` int(11) NOT NULL,
  `prescription_id` int(11) NOT NULL,
  `medicine_name` varchar(100) NOT NULL,
  `before_eat_morning` float DEFAULT NULL,
  `after_eat_morning` float DEFAULT NULL,
  `before_eat_noon` float DEFAULT NULL,
  `after_eat_noon` float DEFAULT NULL,
  `before_eat_night` float DEFAULT NULL,
  `after_eat_night` float DEFAULT NULL,
  `quantity` int(20) NOT NULL,
  `given_quantity` int(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `med_prescribed_medicines`
--

INSERT INTO `med_prescribed_medicines` (`srl_no`, `prescription_id`, `medicine_name`, `before_eat_morning`, `after_eat_morning`, `before_eat_noon`, `after_eat_noon`, `before_eat_night`, `after_eat_night`, `quantity`, `given_quantity`) VALUES
(1, 1, 'Napa', 0, 1, 0, 0, 0, 1, 10, 5),
(2, 1, 'Maxpro 20mg', 1, 0, 0, 0, 1, 0, 30, 10),
(3, 2, 'Deslor', 0, 1, 0, 1, 0, 0, 10, 1),
(4, 2, 'Maxpro 40mg', 1, 0, 0, 0, 1, 0, 20, 2),
(5, 3, 'Maxpro 20mg', 1, 0, 0, 0, 1, 0, 30, 15),
(6, 3, 'Zimax 500mg', 0, 1, 0, 0, 0, 1, 20, 0),
(7, 4, 'NapaExtraa', 1, 0, 0, 1, 0, 1, 10, NULL),
(8, 4, 'Maxpro 20mg', 0, 0, 0, 0, 1, 0, 2, NULL),
(9, 4, 'Deslor', 1, 0, 0, 1, 0, 2, 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `med_prescription`
--

CREATE TABLE `med_prescription` (
  `prescription_id` int(11) NOT NULL,
  `doctor_id` varchar(45) NOT NULL,
  `patient_id` varchar(45) NOT NULL,
  `prescribed_date` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `med_prescription`
--

INSERT INTO `med_prescription` (`prescription_id`, `doctor_id`, `patient_id`, `prescribed_date`) VALUES
(1, 'hasib@d.com', 'tan@p.com', '09/28/2017'),
(2, 'hasib@d.com', 'imran@p.com', '09/28/2017'),
(3, 'faria@d.com', 'tan@p.com', '09/14/2017'),
(4, 'hasib@d.com', 'imran@p.com', '10/28/2017');

-- --------------------------------------------------------

--
-- Table structure for table `med_serial`
--

CREATE TABLE `med_serial` (
  `serial_id` int(11) NOT NULL,
  `doctor_id` varchar(45) NOT NULL,
  `patient_id` varchar(45) NOT NULL,
  `day_shedule` varchar(45) NOT NULL,
  `date` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `med_serial`
--

INSERT INTO `med_serial` (`serial_id`, `doctor_id`, `patient_id`, `day_shedule`, `date`) VALUES
(1, 'hasib@d.com', 'tan@p.com', 'Sun', '10/28/2017'),
(2, 'faria@d.com', 'tan@p.com', 'Fri', '02/14/2017'),
(3, 'hasib@d.com', 'imran@p.com', 'Sun', '10/28/2017'),
(4, 'hasib@d.com', 'tan@p.com', 'Fri', '09/20/2017'),
(6, 'nahid@d.com', 'tan@p.com', 'Fri', '09/29/2017'),
(7, 'faria@d.com', 'tan@p.com', 'Mon', '09/25/2017'),
(8, 'aysha@d.com', 'tan@p.com', 'Sat', '09/16/2017'),
(9, 'aysha@d.com', 'tan@p.com', 'Sat', '09/16/2017'),
(10, 'r@d.com', 'tan@p.com', 'Mon', '10/02/2017'),
(11, 'r@d.com', 'tan@p.com', 'Thu', '10/05/2017'),
(12, 'faria@d.com', 'tan@p.com', 'Fri', '10/06/2017'),
(13, 'nahid@d.com', 'tan@p.com', 'Fri', '10/13/2017');

-- --------------------------------------------------------

--
-- Table structure for table `med_tests`
--

CREATE TABLE `med_tests` (
  `srl_no` int(11) NOT NULL,
  `prescription_id` int(11) NOT NULL,
  `test_name` varchar(45) NOT NULL,
  `nurse_id` varchar(45) DEFAULT NULL,
  `report_link` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `med_tests`
--

INSERT INTO `med_tests` (`srl_no`, `prescription_id`, `test_name`, `nurse_id`, `report_link`) VALUES
(1, 1, 'Test 1', 'shumi@n.com', ''),
(2, 3, 'T2', 'shumi@n.com', ''),
(3, 3, 'T4', 'shumi@n.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_discipline`
--

CREATE TABLE `tbl_discipline` (
  `ID` varchar(40) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `ShortCode` varchar(20) DEFAULT NULL,
  `SchoolID` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_discipline`
--

INSERT INTO `tbl_discipline` (`ID`, `Name`, `ShortCode`, `SchoolID`) VALUES
('{0CF37516-06FE-41CD-93AD-D2D1652509D6}', 'Mathematics', 'MATH', '{39DDC0C2-CFC2-4246-8748-8812B1751A5C}'),
('{560A0FC0-6221-497D-8D41-E584EE4BBEE3}', 'Architecture', 'ARCH', '{39DDC0C2-CFC2-4246-8748-8812B1751A5C}'),
('{63F3C00B-6168-4FBD-AB01-7A1FE413BDDE}', 'Forestry and Wood Technology', 'FWT', '{4D46079B-AFA3-40F1-B8D1-6CC9E9F56812}'),
('{AF41CC9F-3BCD-4952-9D02-17184CC40C79}', 'Urban and Rural Planning', 'URP', '{4D46079B-AFA3-40F1-B8D1-6CC9E9F56812}'),
('{E065BBA7-D0C5-4DFA-9768-81B6F056EB4A}', 'Foresty and Marine Resource Technology', 'FMRT', '{4D46079B-AFA3-40F1-B8D1-6CC9E9F56812}'),
('{E7280448-E379-424E-A11D-357F4334AC8D}', 'Physics', 'PHY', '{39DDC0C2-CFC2-4246-8748-8812B1751A5C}'),
('{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', 'Computer Science and Engineering', 'CSE', '{39DDC0C2-CFC2-4246-8748-8812B1751A5C}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_discussion`
--

CREATE TABLE `tbl_discussion` (
  `ID` varchar(40) NOT NULL,
  `Title` varchar(150) NOT NULL,
  `CategoryID` varchar(40) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `Tag` varchar(200) NOT NULL,
  `CreationDate` datetime NOT NULL,
  `CreatorID` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_discussion`
--

INSERT INTO `tbl_discussion` (`ID`, `Title`, `CategoryID`, `Description`, `Tag`, `CreationDate`, `CreatorID`) VALUES
('{C9FB74F8-8341-4706-BE40-93BFDC3444D0}', 'what is oop', '{3D212234-2F34-4AB0-83EF-1A772068403B}', 'describe oop', 'oop', '2017-04-29 00:00:00', 'mkazi078@uottawa.ca'),
('{DA408BD0-9C9E-46F6-8CF2-00A631B06A26}', 'what is c#', '{44CAEE8D-A9D7-48C8-A2EA-A7463E00FCD6}', 'this is c#', 'oop', '2017-04-29 00:00:00', 'mkazi078@uottawa.ca');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_discussion_category`
--

CREATE TABLE `tbl_discussion_category` (
  `ID` varchar(40) NOT NULL,
  `Name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_discussion_category`
--

INSERT INTO `tbl_discussion_category` (`ID`, `Name`) VALUES
('{3D212234-2F34-4AB0-83EF-1A772068403B}', 'java'),
('{44CAEE8D-A9D7-48C8-A2EA-A7463E00FCD6}', 'c#'),
('{974DE90C-BCAC-4FA3-8B9B-518A3CE6834A}', 'programming contest');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_discussion_comment`
--

CREATE TABLE `tbl_discussion_comment` (
  `CommentID` varchar(50) NOT NULL,
  `DiscussionID` varchar(40) NOT NULL,
  `Comment` varchar(300) NOT NULL,
  `CreatorID` varchar(40) NOT NULL,
  `CommentTime` datetime NOT NULL,
  `CommentIDTop` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_discussion_comment`
--

INSERT INTO `tbl_discussion_comment` (`CommentID`, `DiscussionID`, `Comment`, `CreatorID`, `CommentTime`, `CommentIDTop`) VALUES
('{00AADED4-6799-4F2C-BECB-ED50F7B03DDE}', '{C9FB74F8-8341-4706-BE40-93BFDC3444D0}', 'new comment', 'mkazi078@uottawa.ca', '2017-06-26 19:18:08', NULL),
('{1634B01B-5F82-43EF-96F8-E6149F488424}', '{C9FB74F8-8341-4706-BE40-93BFDC3444D0}', 'it is PIE', 'mkazi078@uottawa.ca', '0000-00-00 00:00:00', NULL),
('{550A15FC-06B8-43DF-83EE-097E35920170}', '{C9FB74F8-8341-4706-BE40-93BFDC3444D0}', 'little difficult', 'mohidul@gmail.com', '0000-00-00 00:00:00', NULL),
('{A15517C2-883F-4E5E-B0AC-9A1DB556741F}', '{C9FB74F8-8341-4706-BE40-93BFDC3444D0}', 'Polymorphism, inheritence, encapsulation', 'mkazi078@uottawa.ca', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permission`
--

CREATE TABLE `tbl_permission` (
  `ID` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_permission`
--

INSERT INTO `tbl_permission` (`ID`, `Name`, `Category`) VALUES
('DISCIPLINE_C', 'DISCIPLINE_C', 'DISCIPLINE'),
('DISCIPLINE_D', 'DISCIPLINE_D', 'DISCIPLINE'),
('DISCIPLINE_R', 'DISCIPLINE_R', 'DISCIPLINE'),
('DISCIPLINE_U', 'DISCIPLINE_U', 'DISCIPLINE'),
('DISCUSSION_C', 'DISCUSSION_C', 'DISCUSSION'),
('DISCUSSION_CAT_C', 'DISCUSSION_CAT_C', 'DISCUSSION CATEGORY'),
('DISCUSSION_CAT_D', 'DISCUSSION_CAT_D', 'DISCUSSION CATEGORY'),
('DISCUSSION_CAT_R', 'DISCUSSION_CAT_R', 'DISCUSSION CATEGORY'),
('DISCUSSION_CAT_U', 'DISCUSSION_CAT_U', 'DISCUSSION CATEGORY'),
('DISCUSSION_COMMENT_C', 'DISCUSSION_COMMENT_C', 'DISCUSSION COMMENT'),
('DISCUSSION_COMMENT_D', 'DISCUSSION_COMMENT_D', 'DISCUSSION COMMENT'),
('DISCUSSION_COMMENT_R', 'DISCUSSION_COMMENT_R', 'DISCUSSION COMMENT'),
('DISCUSSION_COMMENT_U', 'DISCUSSION_COMMENT_U', 'DISCUSSION COMMENT'),
('DISCUSSION_D', 'DISCUSSION_D', 'DISCUSSION'),
('DISCUSSION_R', 'DISCUSSION_R', 'DISCUSSION'),
('DISCUSSION_U', 'DISCUSSION_U', 'DISCUSSION'),
('MEDICAL_DOCTOR_C', 'MEDICAL_DOCTOR_C', 'MEDICAL DOCTOR'),
('MEDICAL_DOCTOR_D', 'MEDICAL_DOCTOR_D', 'MEDICAL DOCTOR'),
('MEDICAL_DOCTOR_R', 'MEDICAL_DOCTOR_R', 'MEDICAL DOCTOR'),
('MEDICAL_DOCTOR_U', 'MEDICAL_DOCTOR_U', 'MEDICAL DOCTOR'),
('MEDICAL_NURSE_C', 'MEDICAL_NURSE_C', 'MEDICAL NURSE'),
('MEDICAL_NURSE_D', 'MEDICAL_NURSE_D', 'MEDICAL NURSE'),
('MEDICAL_NURSE_R', 'MEDICAL_NURSE_R', 'MEDICAL NURSE'),
('MEDICAL_NURSE_U', 'MEDICAL_NURSE_U', 'MEDICAL NURSE'),
('MEDICAL_PATIENT_C', 'MEDICAL_PATIENT_C', 'MEDICAL PATIENT'),
('MEDICAL_PATIENT_D', 'MEDICAL_PATIENT_D', 'MEDICAL PATIENT'),
('MEDICAL_PATIENT_R', 'MEDICAL_PATIENT_R', 'MEDICAL PATIENT'),
('MEDICAL_PATIENT_U', 'MEDICAL_PATIENT_U', 'MEDICAL PATIENT'),
('MEDICAL_STAFF_C', 'MEDICAL_STAFF_C', 'MEDICAL STAFF'),
('MEDICAL_STAFF_D', 'MEDICAL_STAFF_D', 'MEDICAL STAFF'),
('MEDICAL_STAFF_R', 'MEDICAL_STAFF_R', 'MEDICAL STAFF'),
('MEDICAL_STAFF_U', 'MEDICAL_STAFF_U', 'MEDICAL STAFF'),
('PERMISSION_C', 'PERMISSION_C', 'PERMISSION'),
('PERMISSION_D', 'PERMISSION_D', 'PERMISSION'),
('PERMISSION_R', 'PERMISSION_R', 'PERMISSION'),
('PERMISSION_U', 'PERMISSION_U', 'PERMISSION'),
('POSITION_C', 'POSITION_C', 'POSITION'),
('POSITION_D', 'POSITION_D', 'POSITION'),
('POSITION_R', 'POSITION_R', 'POSITION'),
('POSITION_U', 'POSITION_U', 'POSITION'),
('ROLE_C', 'ROLE_C', 'ROLE'),
('ROLE_D', 'ROLE_D', 'ROLE'),
('ROLE_R', 'ROLE_R', 'ROLE'),
('ROLE_U', 'ROLE_U', 'ROLE'),
('SCHOOL_C', 'SCHOOL_C', 'SCHOOL'),
('SCHOOL_D', 'SCHOOL_D', 'SCHOOL'),
('SCHOOL_R', 'SCHOOL_R', 'SCHOOL'),
('SCHOOL_U', 'SCHOOL_U', 'SCHOOL'),
('TERM_C', 'TERM_C', 'TERM'),
('TERM_D', 'TERM_D', 'TERM'),
('TERM_R', 'TERM_R', 'TERM'),
('TERM_U', 'TERM_U', 'TERM'),
('USER_C', 'USER_C', 'USER'),
('USER_D', 'USER_D', 'USER'),
('USER_R', 'USER_R', 'USER'),
('USER_U', 'USER_U', 'USER'),
('YEAR_C', 'YEAR_C', 'YEAR'),
('YEAR_D', 'YEAR_D', 'YEAR'),
('YEAR_R', 'YEAR_R', 'YEAR'),
('YEAR_U', 'YEAR_U', 'YEAR');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_position`
--

CREATE TABLE `tbl_position` (
  `ID` varchar(40) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_position`
--

INSERT INTO `tbl_position` (`ID`, `Name`) VALUES
('{1BFE76DB-C2AA-4FAA-A23B-F43E6150A2F6}', 'Section Officer'),
('{2E024DF5-BD45-4EF2-A5E3-43BCA3E9777F}', 'Pro-vice Chancellor'),
('{64D25DDA-16B6-47B8-BBFC-4E2AAF5680C7}', 'Assistant Professor'),
('{7CDA1F32-A2F8-4469-B5A8-C2038FCE1F9A}', 'Lecturer'),
('{818DE12F-60CC-42E4-BAEC-48EAAED65179}', 'Dean of School'),
('{928EE9FF-E02D-470F-9A6A-AD0EB38B848F}', 'Vice Chancellor'),
('{92FDDA3F-1E91-4AA3-918F-EB595F85790C}', 'Daywise Worker'),
('{932CB0EE-76C2-448E-A40E-2D167EECC479}', 'Registrar'),
('{ADA027D3-21C1-47AF-A21D-759CAFCFE58D}', 'Assistant Registrar'),
('{B76EB035-EA26-4CEB-B029-1C6129574D98}', 'Librarian'),
('{B78C7A7B-4D38-4025-8170-7B8C9F291946}', 'Head of Discipline'),
('{C27B6BCF-FB83-4F3D-85CA-B7870D8B12D0}', 'Associate Professor'),
('{EB4880E2-01B3-4C6E-A2C9-89B6E5427C0A}', 'Professor');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `ID` varchar(40) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`ID`, `Name`) VALUES
('administrator', 'Administrator'),
('doctor', 'Doctor'),
('nurse', 'Nurse'),
('patient', 'Patient'),
('registration coordinator', 'Registration Coordinator'),
('staff', 'Staff'),
('student', 'Student'),
('stuff', 'Stuff'),
('tabulator', 'Tabulator'),
('teacher', 'Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role_permission`
--

CREATE TABLE `tbl_role_permission` (
  `Row` int(11) NOT NULL,
  `RoleID` varchar(40) NOT NULL,
  `PermissionID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_role_permission`
--

INSERT INTO `tbl_role_permission` (`Row`, `RoleID`, `PermissionID`) VALUES
(1646, '', 'MEDICAL_C'),
(1647, '', 'MEDICAL_D'),
(1648, '', 'MEDICAL_R'),
(1649, '', 'MEDICAL_U'),
(1750, 'administrator', 'DISCIPLINE_C'),
(1751, 'administrator', 'DISCIPLINE_D'),
(1752, 'administrator', 'DISCIPLINE_R'),
(1753, 'administrator', 'DISCIPLINE_U'),
(1754, 'administrator', 'DISCUSSION_C'),
(1755, 'administrator', 'DISCUSSION_R'),
(1756, 'administrator', 'DISCUSSION_D'),
(1757, 'administrator', 'DISCUSSION_U'),
(1758, 'administrator', 'DISCUSSION_CAT_C'),
(1759, 'administrator', 'DISCUSSION_CAT_D'),
(1760, 'administrator', 'DISCUSSION_CAT_U'),
(1761, 'administrator', 'DISCUSSION_CAT_R'),
(1762, 'administrator', 'DISCUSSION_COMMENT_C'),
(1763, 'administrator', 'DISCUSSION_COMMENT_D'),
(1764, 'administrator', 'DISCUSSION_COMMENT_R'),
(1765, 'administrator', 'DISCUSSION_COMMENT_U'),
(1766, 'administrator', 'MEDICAL_DOCTOR_C'),
(1767, 'administrator', 'MEDICAL_DOCTOR_D'),
(1768, 'administrator', 'MEDICAL_DOCTOR_R'),
(1769, 'administrator', 'MEDICAL_DOCTOR_U'),
(1770, 'administrator', 'MEDICAL_NURSE_C'),
(1771, 'administrator', 'MEDICAL_NURSE_D'),
(1772, 'administrator', 'MEDICAL_NURSE_R'),
(1773, 'administrator', 'MEDICAL_NURSE_U'),
(1774, 'administrator', 'MEDICAL_PATIENT_C'),
(1775, 'administrator', 'MEDICAL_PATIENT_D'),
(1776, 'administrator', 'MEDICAL_PATIENT_R'),
(1777, 'administrator', 'MEDICAL_PATIENT_U'),
(1778, 'administrator', 'MEDICAL_STAFF_C'),
(1779, 'administrator', 'MEDICAL_STAFF_D'),
(1780, 'administrator', 'MEDICAL_STAFF_R'),
(1781, 'administrator', 'MEDICAL_STAFF_U'),
(1782, 'administrator', 'PERMISSION_C'),
(1783, 'administrator', 'PERMISSION_D'),
(1784, 'administrator', 'PERMISSION_R'),
(1785, 'administrator', 'PERMISSION_U'),
(1786, 'administrator', 'POSITION_C'),
(1787, 'administrator', 'POSITION_D'),
(1788, 'administrator', 'POSITION_R'),
(1789, 'administrator', 'POSITION_U'),
(1790, 'administrator', 'ROLE_C'),
(1791, 'administrator', 'ROLE_D'),
(1792, 'administrator', 'ROLE_R'),
(1793, 'administrator', 'ROLE_U'),
(1794, 'administrator', 'SCHOOL_C'),
(1795, 'administrator', 'SCHOOL_D'),
(1796, 'administrator', 'SCHOOL_R'),
(1797, 'administrator', 'SCHOOL_U'),
(1798, 'administrator', 'TERM_C'),
(1799, 'administrator', 'TERM_D'),
(1800, 'administrator', 'TERM_R'),
(1801, 'administrator', 'TERM_U'),
(1802, 'administrator', 'USER_C'),
(1803, 'administrator', 'USER_D'),
(1804, 'administrator', 'USER_R'),
(1805, 'administrator', 'USER_U'),
(1806, 'administrator', 'YEAR_C'),
(1807, 'administrator', 'YEAR_D'),
(1808, 'administrator', 'YEAR_R'),
(1809, 'administrator', 'YEAR_U'),
(1814, 'doctor', 'MEDICAL_DOCTOR_C'),
(1815, 'doctor', 'MEDICAL_DOCTOR_D'),
(1816, 'doctor', 'MEDICAL_DOCTOR_R'),
(1817, 'doctor', 'MEDICAL_DOCTOR_U'),
(1818, 'nurse', 'MEDICAL_NURSE_C'),
(1819, 'nurse', 'MEDICAL_NURSE_D'),
(1820, 'nurse', 'MEDICAL_NURSE_R'),
(1821, 'nurse', 'MEDICAL_NURSE_U'),
(1822, 'patient', 'MEDICAL_PATIENT_C'),
(1823, 'patient', 'MEDICAL_PATIENT_D'),
(1824, 'patient', 'MEDICAL_PATIENT_R'),
(1825, 'patient', 'MEDICAL_PATIENT_U'),
(1826, 'staff', 'MEDICAL_STAFF_C'),
(1827, 'staff', 'MEDICAL_STAFF_D'),
(1828, 'staff', 'MEDICAL_STAFF_R'),
(1829, 'staff', 'MEDICAL_STAFF_U');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_school`
--

CREATE TABLE `tbl_school` (
  `ID` varchar(40) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `DeanID` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_school`
--

INSERT INTO `tbl_school` (`ID`, `Name`, `DeanID`) VALUES
('{39DDC0C2-CFC2-4246-8748-8812B1751A5C}', 'Science Engineering and Technology', ''),
('{4D46079B-AFA3-40F1-B8D1-6CC9E9F56812}', 'Life Science', ''),
('{86E0F021-B30D-48D2-B177-247180633C5E}', 'Social Science', ''),
('{879375F7-0A15-4705-AC90-C6786D279EF1}', 'Law and Humanities', ''),
('{CE09AA38-205B-4F50-A0E0-14DB8686C912}', 'Fine Arts', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_term`
--

CREATE TABLE `tbl_term` (
  `ID` varchar(40) NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_term`
--

INSERT INTO `tbl_term` (`ID`, `Name`) VALUES
('{6DE3CF58-3A1A-4D6A-88CF-83F22C27E0BA}', 'Special'),
('{AF8B217E-4E76-41B8-A02A-7115BD4A6BE6}', '2nd'),
('{F9121C67-1E89-4F0B-80AA-89FD3B6BD665}', '1st');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `ID` varchar(40) NOT NULL,
  `UniversityID` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Age` int(11) NOT NULL,
  `Sex` varchar(45) NOT NULL,
  `Degrees` varchar(100) NOT NULL,
  `Specialist` varchar(100) NOT NULL,
  `WorkingAddress` varchar(100) NOT NULL,
  `DayShedule` varchar(100) NOT NULL,
  `TimeShedule` varchar(100) NOT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `IsLogged` smallint(1) DEFAULT NULL,
  `IsArchived` smallint(1) DEFAULT NULL,
  `IsDeleted` smallint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`ID`, `UniversityID`, `Email`, `Password`, `FirstName`, `LastName`, `Age`, `Sex`, `Degrees`, `Specialist`, `WorkingAddress`, `DayShedule`, `TimeShedule`, `Status`, `IsLogged`, `IsArchived`, `IsDeleted`) VALUES
('abdulahalmahmud@gmail.com', '150205', 'abdulahalmahmud@gmail.com', 'mahmud', 'Abdullah', 'Al Mahmud ', 0, '', '', '', '', '', '', 'approved', NULL, 0, 0),
('aysha@d.com', '021478', 'aysha@d.com', 'aaysha', 'Dr. Aysha', 'Khatun', 42, 'Female', 'MBBS', 'Heart Specialist', 'Khulna University', 'Sun Web Thu', '5pm-8pm', 'approved', NULL, NULL, NULL),
('faria@d.com', '032454', 'faria@d.com', '123', 'Dr.Faria', 'Jahan', 46, 'Female', 'MBBS', 'Eye Specialist', 'Khulna University', 'Sat Sun Fri', '8pm-11pm', 'approved', NULL, NULL, NULL),
('hasib@d.com', '0210', 'hasib@d.com', '124', 'Dr. Hasib', 'Uddin', 54, 'Male', 'MBBS', 'Heart Specialist', 'Khulna University', 'Sat Tue Fri', '8pm-10pm', 'approved', NULL, NULL, NULL),
('imran@p.com', '1502347', 'imran@p.com', '123', 'Imran', 'Hossain', 24, 'Male', '', '', '', '', '', 'approved', NULL, NULL, NULL),
('jony@s.com', '2145', 'jony@s.com', '123', 'Jony', 'Jon', 32, 'Male', '', '', '', '', '', 'approved', NULL, NULL, NULL),
('nahid@d.com', '02156', 'nahid@d.com', '121', 'Dr.Nahid', 'Islam', 35, 'Male', 'MBBS', 'Medicine Specialist', 'Khulna University', 'Sat Sun Fri', '2pm-5pm', 'approved', NULL, NULL, NULL),
('r@d.com', '02168', 'r@d.com', 'rrk', 'Dr. Hasan', 'Islam', 34, 'Male', 'MBBS', 'Skin Specialist', 'Khulna University', 'Sun Mon Thu', '9am-11am', 'approved', NULL, NULL, NULL),
('rrk@gmail.com', '150211', 'rrk@gmail.com', '123', 'Rajib', 'Khan ', 0, 'Male', '', '', '', '', '', 'approved', NULL, 0, 0),
('sobus@p.com', '150298', 'sobus@p.com', '789', 'Sobus', 'Kazi', 23, 'Male', '', '', '', '', '', 'approved', NULL, NULL, NULL),
('tan@p.com', '150234', 'tan@p.com', '123', 'Tanvir', 'Hasan', 22, 'Male', '', '', '', '', '', 'approved', NULL, 0, 0),
('test@test.com', '020201', 'test@test.com', '123', 'I AM', 'ADMIN', 0, '', '', '', '', '', '', 'approved', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_details`
--

CREATE TABLE `tbl_user_details` (
  `ID` varchar(40) NOT NULL,
  `FatherName` varchar(100) DEFAULT NULL,
  `MotherName` varchar(100) DEFAULT NULL,
  `PermanentAddress` varchar(200) DEFAULT NULL,
  `HomePhone` varchar(20) DEFAULT NULL,
  `CurrentAddress` varchar(200) DEFAULT NULL,
  `MobilePhone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_details`
--

INSERT INTO `tbl_user_details` (`ID`, `FatherName`, `MotherName`, `PermanentAddress`, `HomePhone`, `CurrentAddress`, `MobilePhone`) VALUES
('abdulahalmahmud@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL),
('aysha@d.com', NULL, NULL, NULL, NULL, NULL, NULL),
('faria@d.com', NULL, NULL, NULL, NULL, NULL, NULL),
('hasib@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL),
('imran@p.com', NULL, NULL, NULL, NULL, NULL, NULL),
('jony@s.com', NULL, NULL, NULL, NULL, NULL, NULL),
('khan@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL),
('l@ll.com', NULL, NULL, NULL, NULL, NULL, NULL),
('nahid@d.com', NULL, NULL, NULL, NULL, NULL, NULL),
('r@r.com', NULL, NULL, NULL, NULL, NULL, NULL),
('rfg', NULL, NULL, NULL, NULL, NULL, NULL),
('rrk@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL),
('sobus@p.com', NULL, NULL, NULL, NULL, NULL, NULL),
('tan@patient.com', NULL, NULL, NULL, NULL, NULL, NULL),
('tes1t@test.com', NULL, NULL, NULL, NULL, NULL, NULL),
('test@test.com', 'My father', 'My mother', 'My address', '04100000', 'Same', '0171100000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_discipline`
--

CREATE TABLE `tbl_user_discipline` (
  `UserID` varchar(40) NOT NULL,
  `DisciplineID` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_position`
--

CREATE TABLE `tbl_user_position` (
  `ID` int(11) NOT NULL,
  `UserID` varchar(40) NOT NULL,
  `PositionID` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_position`
--

INSERT INTO `tbl_user_position` (`ID`, `UserID`, `PositionID`) VALUES
(4, '{693F944F-328D-433A-9F94-459D92841645}', '{EB4880E2-01B3-4C6E-A2C9-89B6E5427C0A}'),
(14, '{E0F0AE1A-AECF-46C1-A148-4485036F3CCF}', '{EB4880E2-01B3-4C6E-A2C9-89B6E5427C0A}'),
(16, '{A4F96981-F014-46F6-BB93-87500C3CBB03}', '{7CDA1F32-A2F8-4469-B5A8-C2038FCE1F9A}'),
(17, '{0B2F4F89-2048-4504-AB17-0412CC624A05}', '{64D25DDA-16B6-47B8-BBFC-4E2AAF5680C7}'),
(19, '{8104FB4F-8E63-489D-8D90-DB45A9A2327B}', '{64D25DDA-16B6-47B8-BBFC-4E2AAF5680C7}'),
(21, '{8B24B76D-9969-4F71-ABC4-6EE59355C686}', '{64D25DDA-16B6-47B8-BBFC-4E2AAF5680C7}'),
(24, '{9E2E6363-A0FF-4C0F-B58F-D162725FB702}', '{C27B6BCF-FB83-4F3D-85CA-B7870D8B12D0}'),
(30, 'mohidul@gmail.com', '{64D25DDA-16B6-47B8-BBFC-4E2AAF5680C7}'),
(37, 'mkazi078@uottawa.ca', '{64D25DDA-16B6-47B8-BBFC-4E2AAF5680C7}'),
(38, 'rrk@gmail.com', '{64D25DDA-16B6-47B8-BBFC-4E2AAF5680C7}'),
(39, 'rrk@gmail.com', '{ADA027D3-21C1-47AF-A21D-759CAFCFE58D}'),
(40, 'rrk@gmail.com', '{C27B6BCF-FB83-4F3D-85CA-B7870D8B12D0}'),
(41, 'rrk@gmail.com', '{92FDDA3F-1E91-4AA3-918F-EB595F85790C}'),
(42, 'rrk@gmail.com', '{818DE12F-60CC-42E4-BAEC-48EAAED65179}'),
(43, 'rrk@gmail.com', '{B78C7A7B-4D38-4025-8170-7B8C9F291946}'),
(44, 'rrk@gmail.com', '{7CDA1F32-A2F8-4469-B5A8-C2038FCE1F9A}'),
(45, 'rrk@gmail.com', '{B76EB035-EA26-4CEB-B029-1C6129574D98}'),
(46, 'rrk@gmail.com', '{2E024DF5-BD45-4EF2-A5E3-43BCA3E9777F}'),
(47, 'rrk@gmail.com', '{EB4880E2-01B3-4C6E-A2C9-89B6E5427C0A}'),
(48, 'rrk@gmail.com', '{932CB0EE-76C2-448E-A40E-2D167EECC479}'),
(49, 'rrk@gmail.com', '{1BFE76DB-C2AA-4FAA-A23B-F43E6150A2F6}'),
(50, 'rrk@gmail.com', '{928EE9FF-E02D-470F-9A6A-AD0EB38B848F}'),
(51, 'abdulahalmahmud@gmail.com', '{64D25DDA-16B6-47B8-BBFC-4E2AAF5680C7}'),
(52, 'abdulahalmahmud@gmail.com', '{ADA027D3-21C1-47AF-A21D-759CAFCFE58D}'),
(53, 'abdulahalmahmud@gmail.com', '{C27B6BCF-FB83-4F3D-85CA-B7870D8B12D0}'),
(54, 'abdulahalmahmud@gmail.com', '{92FDDA3F-1E91-4AA3-918F-EB595F85790C}'),
(55, 'abdulahalmahmud@gmail.com', '{818DE12F-60CC-42E4-BAEC-48EAAED65179}'),
(56, 'abdulahalmahmud@gmail.com', '{B78C7A7B-4D38-4025-8170-7B8C9F291946}'),
(57, 'abdulahalmahmud@gmail.com', '{7CDA1F32-A2F8-4469-B5A8-C2038FCE1F9A}'),
(58, 'abdulahalmahmud@gmail.com', '{B76EB035-EA26-4CEB-B029-1C6129574D98}'),
(59, 'abdulahalmahmud@gmail.com', '{2E024DF5-BD45-4EF2-A5E3-43BCA3E9777F}'),
(60, 'abdulahalmahmud@gmail.com', '{EB4880E2-01B3-4C6E-A2C9-89B6E5427C0A}'),
(61, 'abdulahalmahmud@gmail.com', '{932CB0EE-76C2-448E-A40E-2D167EECC479}'),
(62, 'abdulahalmahmud@gmail.com', '{1BFE76DB-C2AA-4FAA-A23B-F43E6150A2F6}'),
(63, 'abdulahalmahmud@gmail.com', '{928EE9FF-E02D-470F-9A6A-AD0EB38B848F}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_role`
--

CREATE TABLE `tbl_user_role` (
  `ID` int(11) NOT NULL,
  `UserID` varchar(40) NOT NULL,
  `RoleID` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_role`
--

INSERT INTO `tbl_user_role` (`ID`, `UserID`, `RoleID`) VALUES
(98, 'test@test.com', 'administrator'),
(105, 'rrk@gmail.com', 'administrator'),
(115, 'abdulahalmahmud@gmail.com', 'administrator'),
(116, 'tan@p.com', 'Patient'),
(118, 'r@d.com', 'Doctor'),
(122, 'hasib@d.com', 'Doctor'),
(123, 'aysha@d.com', 'Doctor'),
(124, 'nahid@d.com', 'Doctor'),
(125, 'faria@d.com', 'Doctor'),
(126, 'sobus@p.com', 'Patient'),
(127, 'imran@p.com', 'Patient'),
(128, 'jony@s.com', 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_year`
--

CREATE TABLE `tbl_year` (
  `ID` varchar(40) NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_year`
--

INSERT INTO `tbl_year` (`ID`, `Name`) VALUES
('{1FAC0F1A-9D60-43F6-AB07-C933D5A4AA30}', 'Phd 1st'),
('{326B168F-58CC-42F3-B71A-DFE8DBBC05E8}', 'MSc 1st'),
('{6780C884-E112-4F58-9503-E2110B615547}', '4th'),
('{9F3A6CBC-0115-4EC2-ABB3-8CCA431F6C2B}', '1st'),
('{A21965E4-4FE4-43AC-A77F-DABAC9B356F2}', '3rd'),
('{ADBEDD3E-D8EA-47AA-A068-C4C703DB4AE6}', 'MSc 2nd'),
('{B9D6CC05-7AD4-4666-80AB-80797A872743}', 'Phd 2nd'),
('{CBE08035-94CD-4610-B4E2-A0E844184056}', 'Phd 4th'),
('{E3823AA6-6BE5-4A07-93EA-FA59DE4F616F}', 'Phd 3rd'),
('{EA335D18-A1A8-4D15-9C7B-4A4700AD4543}', '2nd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `med_given_tests`
--
ALTER TABLE `med_given_tests`
  ADD KEY `gtest_id` (`prescription_id`),
  ADD KEY `test_id` (`test_id`);

--
-- Indexes for table `med_medicines_stock`
--
ALTER TABLE `med_medicines_stock`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `med_medicine_counter`
--
ALTER TABLE `med_medicine_counter`
  ADD KEY `prescription_id` (`prescription_id`),
  ADD KEY `counter_staff_id` (`counter_staff_id`);

--
-- Indexes for table `med_prescribed_medicines`
--
ALTER TABLE `med_prescribed_medicines`
  ADD PRIMARY KEY (`srl_no`),
  ADD KEY `prescription_id` (`prescription_id`),
  ADD KEY `medicine_id` (`medicine_name`);

--
-- Indexes for table `med_prescription`
--
ALTER TABLE `med_prescription`
  ADD PRIMARY KEY (`prescription_id`);

--
-- Indexes for table `med_serial`
--
ALTER TABLE `med_serial`
  ADD PRIMARY KEY (`serial_id`);

--
-- Indexes for table `med_tests`
--
ALTER TABLE `med_tests`
  ADD PRIMARY KEY (`srl_no`);

--
-- Indexes for table `tbl_discipline`
--
ALTER TABLE `tbl_discipline`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_discussion`
--
ALTER TABLE `tbl_discussion`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_discussion_category`
--
ALTER TABLE `tbl_discussion_category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_discussion_comment`
--
ALTER TABLE `tbl_discussion_comment`
  ADD PRIMARY KEY (`CommentID`);

--
-- Indexes for table `tbl_permission`
--
ALTER TABLE `tbl_permission`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_position`
--
ALTER TABLE `tbl_position`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_role_permission`
--
ALTER TABLE `tbl_role_permission`
  ADD PRIMARY KEY (`Row`);

--
-- Indexes for table `tbl_term`
--
ALTER TABLE `tbl_term`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `UniversityID` (`UniversityID`);

--
-- Indexes for table `tbl_user_details`
--
ALTER TABLE `tbl_user_details`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_user_position`
--
ALTER TABLE `tbl_user_position`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_year`
--
ALTER TABLE `tbl_year`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `med_medicines_stock`
--
ALTER TABLE `med_medicines_stock`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `med_prescribed_medicines`
--
ALTER TABLE `med_prescribed_medicines`
  MODIFY `srl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `med_serial`
--
ALTER TABLE `med_serial`
  MODIFY `serial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `med_tests`
--
ALTER TABLE `med_tests`
  MODIFY `srl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_role_permission`
--
ALTER TABLE `tbl_role_permission`
  MODIFY `Row` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1830;
--
-- AUTO_INCREMENT for table `tbl_user_position`
--
ALTER TABLE `tbl_user_position`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
