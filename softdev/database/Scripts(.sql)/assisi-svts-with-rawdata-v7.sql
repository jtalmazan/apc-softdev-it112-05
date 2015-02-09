-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2014 at 08:56 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sd-asissi-svts`
--

-- --------------------------------------------------------

--
-- Table structure for table `allocation`
--

CREATE TABLE IF NOT EXISTS `allocation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `TuitionFee` decimal(8,2) DEFAULT NULL,
  `Miscellaneous` decimal(8,2) DEFAULT NULL,
  `Others` decimal(8,2) DEFAULT NULL,
  `Timeline_Id` int(11) NOT NULL,
  `Application_Id` int(11) NOT NULL,
  `Sponsor_Id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Allocation_Timeline1_idx` (`Timeline_Id`),
  KEY `fk_Allocation_Application1_idx` (`Application_Id`),
  KEY `fk_Allocation_Sponsor1_idx` (`Sponsor_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;



--
-- Dumping data for table `allocation`
--

INSERT INTO `allocation` (`id`, `TuitionFee`, `Miscellaneous`, `Others`, `Timeline_Id`, `Application_Id`, `Sponsor_Id`) VALUES
(1, '20000.00', '10000.00', '1110.00', 1, 1, 1),
(5, '0.00', '0.00', '0.00', 1, 5, 1),
(6, '4000.00', '50000.00', '9000.00', 1, 6, 1),
(7, '25000.00', '6000.00', '2000.00', 1, 7, 1),
(8, '23000.00', '10000.00', '5000.00', 1, 8, 1),
(9, '0.00', '0.00', '0.00', 2, 9, 1),
(10, '0.00', '0.00', '0.00', 1, 10, 1);


-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE IF NOT EXISTS `application` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `TypeOfApplication` varchar(45) NOT NULL,
  `Course` varchar(100) NOT NULL,
  `Duration` varchar(8) NOT NULL,
  `SponsoredYears` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_Application_User1_idx` (`User_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;



--
-- Dumping data for table `application`
--

INSERT INTO `application` (`Id`, `TypeOfApplication`, `Course`, `Duration`, `SponsoredYears`, `User_Id`) VALUES
(1, 'College', 'BS BookKeeper', '4', 1, 2),
(5, 'College', 'Ninja', '5', 1, 11),
(6, 'College', 'BS-Psychotic', '4', 1, 15),
(7, 'College', 'BS in Computer Science', '4', 1, 16),
(8, 'College', 'BS in Computer Science', '4', 1, 18),
(9, 'College', 'BS in Computer Science', '4', 1, 19),
(10, 'College', 'BS in Computer Science', '4', 1, 20);


-- --------------------------------------------------------

--
-- Table structure for table `authassignment`
--

CREATE TABLE IF NOT EXISTS `AuthAssignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authassignment`
--

INSERT INTO `AuthAssignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('admin', '1', NULL, 'N;'),
('Coordinator', '3', NULL, 'N;'),
('Student', '2', NULL, 'N;');


-- --------------------------------------------------------

--
-- Table structure for table `AuthItem`
--


CREATE TABLE IF NOT EXISTS `AuthItem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `AuthItem`
--


INSERT INTO `AuthItem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('admin', 2, NULL, NULL, 'N;'),
('Allocation.*', 1, NULL, NULL, 'N;'),
('Allocation.Admin', 0, NULL, NULL, 'N;'),
('Allocation.Create', 0, NULL, NULL, 'N;'),
('Allocation.Delete', 0, NULL, NULL, 'N;'),
('Allocation.Index', 0, NULL, NULL, 'N;'),
('Allocation.Update', 0, NULL, NULL, 'N;'),
('Allocation.View', 0, NULL, NULL, 'N;'),
('Alumni', 2, 'Alumni', NULL, 'N;'),
('Application.*', 1, NULL, NULL, 'N;'),
('Application.Admin', 0, NULL, NULL, 'N;'),
('Application.Create', 0, NULL, NULL, 'N;'),
('Application.Delete', 0, NULL, NULL, 'N;'),
('Application.Index', 0, NULL, NULL, 'N;'),
('Application.Update', 0, NULL, NULL, 'N;'),
('Application.View', 0, NULL, NULL, 'N;'),
('Coordinator', 2, 'School coordinator', NULL, 'N;'),
('Grades.*', 1, NULL, NULL, 'N;'),
('Grades.Admin', 0, NULL, NULL, 'N;'),
('Grades.Create', 0, NULL, NULL, 'N;'),
('Grades.Delete', 0, NULL, NULL, 'N;'),
('Grades.Index', 0, NULL, NULL, 'N;'),
('Grades.Update', 0, NULL, NULL, 'N;'),
('Grades.View', 0, NULL, NULL, 'N;'),
('Partnerschool.*', 1, NULL, NULL, 'N;'),
('Partnerschool.Admin', 0, NULL, NULL, 'N;'),
('Partnerschool.Create', 0, NULL, NULL, 'N;'),
('Partnerschool.Delete', 0, NULL, NULL, 'N;'),
('Partnerschool.Index', 0, NULL, NULL, 'N;'),
('Partnerschool.Update', 0, NULL, NULL, 'N;'),
('Partnerschool.View', 0, NULL, NULL, 'N;'),
('Profile.*', 1, NULL, NULL, 'N;'),
('Profile.Admin', 0, NULL, NULL, 'N;'),
('Profile.Create', 0, NULL, NULL, 'N;'),
('Profile.Delete', 0, NULL, NULL, 'N;'),
('Profile.Index', 0, NULL, NULL, 'N;'),
('Profile.PersonalView', 0, 'personalView', NULL, 'N;'),
('Profile.Update', 0, NULL, NULL, 'N;'),
('Profile.View', 0, NULL, NULL, 'N;'),
('Role.*', 1, NULL, NULL, 'N;'),
('Role.Admin', 0, NULL, NULL, 'N;'),
('Role.Create', 0, NULL, NULL, 'N;'),
('Role.Delete', 0, NULL, NULL, 'N;'),
('Role.Index', 0, NULL, NULL, 'N;'),
('Role.Update', 0, NULL, NULL, 'N;'),
('Role.View', 0, NULL, NULL, 'N;'),
('School.*', 1, NULL, NULL, 'N;'),
('School.Admin', 0, NULL, NULL, 'N;'),
('School.Create', 0, NULL, NULL, 'N;'),
('School.Delete', 0, NULL, NULL, 'N;'),
('School.Index', 0, NULL, NULL, 'N;'),
('School.Update', 0, NULL, NULL, 'N;'),
('School.View', 0, NULL, NULL, 'N;'),
('Site.*', 1, NULL, NULL, 'N;'),
('Site.Contact', 0, NULL, NULL, 'N;'),
('Site.Error', 0, NULL, NULL, 'N;'),
('Site.Index', 0, NULL, NULL, 'N;'),
('Site.Login', 0, NULL, NULL, 'N;'),
('Site.Logout', 0, NULL, NULL, 'N;'),
('Sponsor.*', 1, NULL, NULL, 'N;'),
('Sponsor.Admin', 0, NULL, NULL, 'N;'),
('Sponsor.Create', 0, NULL, NULL, 'N;'),
('Sponsor.Delete', 0, NULL, NULL, 'N;'),
('Sponsor.Index', 0, NULL, NULL, 'N;'),
('Sponsor.Update', 0, NULL, NULL, 'N;'),
('Sponsor.View', 0, NULL, NULL, 'N;'),
('Student', 2, 'Scholar', NULL, 'N;'),
('Timeline.*', 1, NULL, NULL, 'N;'),
('Timeline.Admin', 0, NULL, NULL, 'N;'),
('Timeline.Create', 0, NULL, NULL, 'N;'),
('Timeline.Delete', 0, NULL, NULL, 'N;'),
('Timeline.Index', 0, NULL, NULL, 'N;'),
('Timeline.Update', 0, NULL, NULL, 'N;'),
('Timeline.View', 0, NULL, NULL, 'N;'),
('User.*', 1, NULL, NULL, 'N;'),
('User.Admin', 0, NULL, NULL, 'N;'),
('User.Create', 0, NULL, NULL, 'N;'),
('User.Delete', 0, NULL, NULL, 'N;'),
('User.Index', 0, NULL, NULL, 'N;'),
('User.Update', 0, NULL, NULL, 'N;'),
('User.View', 0, NULL, NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `AuthItemChild`
--

CREATE TABLE IF NOT EXISTS `AuthItemChild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `AuthItemChild`
--

INSERT INTO `AuthItemChild` (`parent`, `child`) VALUES
('Coordinator', 'Grades.Admin'),
('Coordinator', 'Grades.Create'),
('Coordinator', 'Grades.Delete'),
('Coordinator', 'Grades.Index'),
('Coordinator', 'Grades.Update'),
('Coordinator', 'Grades.View'),
('Alumni', 'Profile.PersonalView'),
('Coordinator', 'Profile.PersonalView'),
('Student', 'Profile.PersonalView'),
('Alumni', 'Profile.Update'),
('Coordinator', 'Profile.Update'),
('Student', 'Profile.Update'),
('Alumni', 'User.Update'),
('Coordinator', 'User.Update'),
('Student', 'User.Update'),
('Alumni', 'User.View'),
('Coordinator', 'User.View'),
('Student', 'User.View');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE IF NOT EXISTS `grades` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `GPA` decimal(3,2) NOT NULL,
  `Timeline_Id` int(11) NOT NULL,
  `Application_Id` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_Grades_Timeline_idx` (`Timeline_Id`),
  KEY `fk_Grades_Application1_idx` (`Application_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;


--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`Id`, `GPA`, `Timeline_Id`, `Application_Id`) VALUES
(1, '2.00', 1, 1),
(2, '3.00', 2, 1),
(3, '3.00', 3, 1),
(4, '0.00', 1, 5),
(5, '2.00', 1, 6);


-- --------------------------------------------------------

--
-- Table structure for table `partnerschool`
--

CREATE TABLE IF NOT EXISTS `partnerschool` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `School_Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_School_has_User_User1_idx` (`User_Id`),
  KEY `fk_School_has_User_School1_idx` (`School_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;


--
-- Dumping data for table `partnerschool`
--

INSERT INTO `partnerschool` (`Id`, `School_Id`, `User_Id`) VALUES
(17, 13, 11),
(18, 40, 12),
(19, 18, 13),
(20, 42, 14),
(23, 43, 18),
(24, 2, 19),
(25, 18, 20),
(26, 1, 2),
(27, 15, 15),
(28, 16, 16);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Lastname` varchar(30) NOT NULL,
  `Firstname` varchar(30) NOT NULL,
  `Middlename` varchar(30) DEFAULT NULL,
  `Religion` varchar(30) DEFAULT NULL,
  `Sex` tinyint(1) NOT NULL,
  `CivilStatus` varchar(20) NOT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `PlaceOfBirth` varchar(45) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `ContactNumber` varchar(15) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Occupation` varchar(30) DEFAULT NULL,
  `FuturePlan` longtext,
  `DateCreated` date NOT NULL,
  `DateUpdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;


--
-- Dumping data for table `profile`
--
INSERT INTO `profile` (`Id`, `Lastname`, `Firstname`, `Middlename`, `Religion`, `Sex`, `CivilStatus`, `DateOfBirth`, `PlaceOfBirth`, `Address`, `ContactNumber`, `Email`, `Occupation`, `FuturePlan`, `DateCreated`, `DateUpdate`) VALUES
(1, 'Delos Reyes', 'John Edward', '', 'Christian', 0, '', '1993-11-05', '', 'Manila', '09221234567', 'jddelosreyes@apc.edu.ph', NULL, 'None so far', '2014-02-13', '2014-02-14 04:42:43'),
(2, 'Cheng', 'Neil ', 'Forca', '', 0, 'Single', '1991-03-05', 'Pasay City', '', '1234567', 'qwerty@gmail.com', NULL, '', '1970-01-01', '2014-02-17 05:19:38'),
(3, 'Lubrio', 'Clark', '', '', 0, '', '1990-08-31', '', '', '1234567', 'calubrio@apc.edu.ph', NULL, '', '1970-01-01', '2014-02-18 00:02:08'),
(11, 'Qwerty', 'Qwerty', 'Qwerty', 'Qwerty', 0, '', '2014-02-14', 'Qwerty', 'Qwerty', '12345567', 'Qwerty@gmail.com', NULL, '', '1970-01-01', '2014-02-26 00:22:30'),
(12, 'test', 'test', '', '', 0, '', '1970-01-01', '', '', '123241235234', 'nfcheng232\\@gmail.com', NULL, '', '1970-01-01', '2014-03-05 01:43:14'),
(13, 'Qwerty', 'Qwerty', '', '', 0, '', '1970-01-01', '', '', '1123234213', 'nfcheng23@gmail.com', NULL, '', '1970-01-01', '2014-03-05 01:44:12'),
(14, 'Delta', 'Delta', '', '', 0, '', '1970-01-01', '', '', '123235345345', 'nfcheng23@gmail.com', NULL, '', '1970-01-01', '2014-03-07 02:51:17'),
(15, 'Tomas', 'Crisjoy', 'Tomi', '', 0, '', '1970-01-01', '', 'sample', '421421412', 'crisjaytomas@gmail.com', NULL, '', '1970-01-01', '2014-03-07 02:56:19'),
(30, 'qw', 'km', NULL, 'mk', 0, '', NULL, NULL, NULL, '', '', NULL, NULL, '0000-00-00', '2014-03-10 05:11:36'),
(31, 'Bacalangco', 'John Patrick', 'Baydo', 'Christian', 0, '', '1970-01-01', '', 'Paranaque', '09191234567', 'lubrio.clarkjessan@gmail.com', NULL, '', '1970-01-01', '2014-03-12 00:01:50'),
(32, 'Ventura', 'Jessie', '', '', 0, '', '1970-01-01', '', '', '09191234567', 'lubrio.clarkjessan@gmail.com', NULL, '', '1970-01-01', '2014-03-12 02:20:49'),
(33, 'Requinto', 'Joel', 'Maligro', 'Catholic', 0, '', '1970-01-01', 'Taguig', 'Taguig', '09191234567', 'jmrequinto@apc.edu.ph', NULL, '', '1970-01-01', '2014-03-19 01:28:23'),
(34, 'Asdf', 'Asdf', '', '', 0, '0', '1970-01-01', '', 'Pasay City', '123123', 'nfcheng@gmail.com', NULL, '', '1970-01-01', '2014-03-19 02:24:51'),
(35, 'Zxcv', 'Zxcv', '', '', 0, 'Married', '1970-01-01', '', 'Paranaque', '09191234567', 'jmrequinto@apc.edu.ph', NULL, '', '1970-01-01', '2014-03-19 02:34:46');


-- --------------------------------------------------------

--
-- Table structure for table `rights`
--

CREATE TABLE IF NOT EXISTS `rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`Id`, `Name`) VALUES
(1, 'Admin'),
(2, 'Coordinator'),
(3, 'Student'),
(4, 'Alumni');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE IF NOT EXISTS `school` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `ContactNo` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;


--
-- Dumping data for table `school`
--

INSERT INTO `school` (`Id`, `Name`, `Address`, `ContactNo`) VALUES
(1, 'La Consolacion College Bacolod', NULL, NULL),
(2, 'La Consolacion College Manila', NULL, NULL),
(3, 'University of Saint La Salle', NULL, NULL),
(4, 'Welcome Home Foundation Inc', NULL, NULL),
(5, 'University of Negros Occidental De Recoletos', NULL, NULL),
(6, 'West Visayas State College', NULL, NULL),
(7, 'West Visayas State College of Science & Techn', NULL, NULL),
(8, 'Western Institute of Technology', NULL, NULL),
(9, 'University of Iloilo - Phinma', NULL, NULL),
(10, 'Carlos Hilado Memorial College', NULL, NULL),
(11, 'University of Perpetual Help Las Pinas', NULL, NULL),
(12, 'University of Perpetual Help Laguna', NULL, NULL),
(13, 'Saint Pedro Poveda College', NULL, NULL),
(14, 'Don Bosco Technological College - TVET', NULL, NULL),
(15, 'Don Bosco Technological College', NULL, NULL),
(16, 'Riverside College Bacolod', NULL, NULL),
(17, 'Collegio De San Agustin Bacolod', NULL, NULL),
(18, 'University of Santo Tomas', NULL, NULL),
(19, 'La Concordia College', NULL, NULL),
(20, 'University Of The Philippines Diliman', NULL, NULL),
(21, 'New Lucena Polytechnic College', NULL, NULL),
(22, 'University of Saint La Salle', NULL, NULL),
(23, 'Welcome Home Foundation Inc', NULL, NULL),
(24, 'University of Negros Occidental De Recoletos', NULL, NULL),
(25, 'West Visayas State College', NULL, NULL),
(26, 'West Visayas State College of Science & Tech', '', ''),
(27, 'Western Institute of Technology', NULL, NULL),
(28, 'University of Iloilo - Phinma', NULL, NULL),
(29, 'Carlos Hilado Memorial College', NULL, NULL),
(30, 'University of Perpetual Help Las Pinas', NULL, NULL),
(31, 'University of Perpetual Help Laguna', NULL, NULL),
(32, 'Saint Pedro Poveda College', NULL, NULL),
(33, 'Don Bosco Technological College - TVET', NULL, NULL),
(34, 'Don Bosco Technological College', NULL, NULL),
(35, 'Riverside College Bacolod', NULL, NULL),
(36, 'Collegio De San Agustin Bacolod', NULL, NULL),
(37, 'University of Santo Tomas', NULL, NULL),
(38, 'La Concordia College', NULL, NULL),
(40, 'New Lucena Polytechnic College', NULL, NULL),
(41, 'Assumption College', NULL, NULL),
(42, 'Ateneo de Manila University', NULL, NULL),
(43, 'University of the Philippines Los Baños', NULL, NULL);


-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

CREATE TABLE IF NOT EXISTS `sponsor` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `ContactPerson` varchar(45) NOT NULL,
  `ContactNo` varchar(15) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sponsor`
--


INSERT INTO `sponsor` (`Id`, `Name`, `Address`, `ContactPerson`, `ContactNo`) VALUES
(1, 'Gado & Jessie Jalandoni Scholarships', '', '', '');


-- --------------------------------------------------------

--
-- Table structure for table `sys_table`
--

CREATE TABLE IF NOT EXISTS `sys_table` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `FieldName` varchar(100) NOT NULL,
  `Role_Id` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_sys_Table_Role1_idx` (`Role_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;


--
-- Dumping data for table `sys_table`
--

INSERT INTO `sys_table` (`Id`, `FieldName`, `Role_Id`) VALUES
(1, 'Lastname', 2),
(2, 'Firstname', 2),
(3, 'Middlename', 2),
(4, 'Sex', 2),
(5, 'ContactNumber', 2),
(6, 'Email', 2),
(7, 'DateCreated', 2),
(9, 'Lastname', 3),
(10, 'Firstname', 3),
(11, 'Middlename', 3),
(12, 'Religion', 3),
(13, 'Sex', 3),
(14, 'DateOfBirth', 3),
(15, 'PlaceOfBirth', 3),
(16, 'Address', 3),
(17, 'ContactNumber', 3),
(18, 'Email', 3),
(19, 'DateUpdate', 3),
(20, 'Lastname', 4),
(21, 'Firstname', 4),
(22, 'Middlename', 4),
(23, 'Religion', 4),
(24, 'Sex', 4),
(25, 'DateOfBirth', 4),
(26, 'PlaceOfBirth', 4),
(27, 'Address', 4),
(28, 'ContactNumber', 4),
(29, 'Email', 4),
(30, 'FuturePlan', 4),
(31, 'CivilStatus', 2),
(32, 'CivilStatus', 3);

-- --------------------------------------------------------

--
-- Table structure for table `timeline`
--

CREATE TABLE IF NOT EXISTS `timeline` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Term` varchar(8) NOT NULL,
  `StartYear` year(4) NOT NULL,
  `EndYear` year(4) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `timeline`
--

INSERT INTO `timeline` (`Id`, `Term`, `StartYear`, `EndYear`) VALUES
(1, '1st Sem', 2013, 2014),
(2, '2nd Sem', 2013, 2014),
(3, 'Summer', 2013, 2014);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(45) NOT NULL,
  `Password` varchar(200) NOT NULL DEFAULT '2381c66086fbd785292e0f474aa2cd364fc29def',
  `Profile_Id` int(11) NOT NULL,
  `Role_Id` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_User_Profile1_idx` (`Profile_Id`),
  KEY `fk_User_Role1_idx` (`Role_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Username`, `Password`, `Profile_Id`, `Role_Id`) VALUES
(1, 'admin', '$29RahM63VUkc', 1, 1),
(2, 'ncheng', '$29RahM63VUkc', 2, 3),
(3, 'clubrio', '$29RahM63VUkc', 3, 2),
(11, 'qqwerty', '$29RahM63VUkc', 11, 3),
(12, 'ttest', '$2sQQ6TeGUhHw', 12, 2),
(13, 'ertqwerty', '$2tnRsODEHUr2', 13, 2),
(14, 'ddelta', '$21FDcV6M4tt2', 14, 2),
(15, 'ctomas', '1234', 15, 3),
(16, 'jbacalangco', '$2gEAfG7hWX8M', 31, 3),
(17, 'jventura', '$2lY2zjV7pzx6', 32, 2),
(18, 'jrequinto', '$2f1WeQ1if346', 33, 3),
(19, 'aasdf', '$2UVoFm4Ts7Wk', 34, 3),
(20, 'zzxcv', '$2GnhLgeWSXfk', 35, 3);


--
-- Constraints for dumped tables
--

--
-- Constraints for table `allocation`
--
ALTER TABLE `allocation`
  ADD CONSTRAINT `fk_Allocation_Application1` FOREIGN KEY (`Application_Id`) REFERENCES `application` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Allocation_Sponsor1` FOREIGN KEY (`Sponsor_Id`) REFERENCES `sponsor` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Allocation_Timeline1` FOREIGN KEY (`Timeline_Id`) REFERENCES `timeline` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `fk_Application_User1` FOREIGN KEY (`User_Id`) REFERENCES `user` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `authassignment`
--
ALTER TABLE `AuthAssignment`
  ADD CONSTRAINT `AuthAssignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;


--
-- Constraints for table `authitemchild`
--
ALTER TABLE `AuthItemChild`
  ADD CONSTRAINT `AuthItemChild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `AuthItemChild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;


--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `fk_Grades_Application1` FOREIGN KEY (`Application_Id`) REFERENCES `application` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Grades_Timeline` FOREIGN KEY (`Timeline_Id`) REFERENCES `timeline` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `partnerschool`
--
ALTER TABLE `partnerschool`
  ADD CONSTRAINT `fk_School_has_User_School1` FOREIGN KEY (`School_Id`) REFERENCES `school` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_School_has_User_User1` FOREIGN KEY (`User_Id`) REFERENCES `user` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rights`
--
ALTER TABLE `Rights`
  ADD CONSTRAINT `Rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;


--
-- Constraints for table `sys_table`
--
ALTER TABLE `sys_table`
  ADD CONSTRAINT `fk_sys_Table_Role1` FOREIGN KEY (`Role_Id`) REFERENCES `role` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_User_Profile1` FOREIGN KEY (`Profile_Id`) REFERENCES `profile` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_User_Role1` FOREIGN KEY (`Role_Id`) REFERENCES `role` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
