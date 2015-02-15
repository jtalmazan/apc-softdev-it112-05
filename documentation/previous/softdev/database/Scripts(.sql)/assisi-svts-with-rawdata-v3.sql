-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2014 at 05:21 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `assisi-svts`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `allocation`
--

INSERT INTO `allocation` (`id`, `TuitionFee`, `Miscellaneous`, `Others`, `Timeline_Id`, `Application_Id`, `Sponsor_Id`) VALUES
(1, '20000.00', '10000.00', '1110.00', 1, 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`Id`, `TypeOfApplication`, `Course`, `Duration`, `SponsoredYears`, `User_Id`) VALUES
(1, 'College', 'BS BookKeeper', '4', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `authassignment`
--

CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('admin', '1', NULL, 'N;'),
('Coordinator', '3', NULL, 'N;'),
('Student', '2', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
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
-- Table structure for table `authitemchild`
--

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authitemchild`
--

INSERT INTO `authitemchild` (`parent`, `child`) VALUES
('Coordinator', 'Grades.Admin'),
('Coordinator', 'Grades.Create'),
('Coordinator', 'Grades.Delete'),
('Coordinator', 'Grades.Index'),
('Coordinator', 'Grades.Update'),
('Coordinator', 'Grades.View'),
('Alumni', 'Profile.PersonalView'),
('Coordinator', 'Profile.PersonalView'),
('Student', 'Profile.PersonalView'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`Id`, `GPA`, `Timeline_Id`, `Application_Id`) VALUES
(1, '2.00', 1, 1),
(2, '3.00', 2, 1),
(3, '3.00', 3, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `partnerschool`
--

INSERT INTO `partnerschool` (`Id`, `School_Id`, `User_Id`) VALUES
(1, 1, 2),
(2, 9, 4),
(3, 1, 3);

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
  `DateOfBirth` date DEFAULT NULL,
  `PlaceOfBirth` varchar(45) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `ContactNumber` varchar(15) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `FuturePlan` longtext,
  `DateCreated` date NOT NULL,
  `DateUpdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`Id`, `Lastname`, `Firstname`, `Middlename`, `Religion`, `Sex`, `DateOfBirth`, `PlaceOfBirth`, `Address`, `ContactNumber`, `Email`, `FuturePlan`, `DateCreated`, `DateUpdate`) VALUES
(1, 'Delos Reyes', 'John Edward', '', '', 1, '1993-11-05', '', 'qweqweqwe', '1234567', 'jddelosreyes@apc.edu.ph', '', '2014-02-13', '2014-02-14 04:42:43'),
(2, 'Cheng', 'Neil ', 'Forca', '', 1, '1991-03-05', 'Pasay City', '', '1234567', 'qwerty@gmail.com', '', '1970-01-01', '2014-02-17 05:19:38'),
(3, 'Lubrio', 'Clark', '', '', 1, '0000-00-00', '', '', '1234567', 'calubrio@apc.edu.ph', '', '1970-01-01', '2014-02-18 00:02:08'),
(4, 'asdasd', 'qweqwe', '', '', 0, '0000-00-00', '', '', '1234567', 'qwerty@gmail.com', '', '1970-01-01', '2014-02-19 05:29:27');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`Id`, `Name`, `Address`, `ContactNo`) VALUES
(1, 'Adamson University', NULL, NULL),
(2, 'Adamson University', '', ''),
(3, 'Assumption College', '', ''),
(4, 'Ateneo De Manila University', '', ''),
(5, 'University of the Philippines', '', ''),
(6, 'Don Bosco Technical College', '', ''),
(7, 'Don Bosco Technical College TVET', '', ''),
(8, 'University of Pertual Help', '', ''),
(9, 'La Consolacion College', '', ''),
(10, 'USLS', '', ''),
(11, 'WHFI', '', ''),
(12, 'UNO-R', '', ''),
(13, 'WVSC', '', ''),
(14, 'WVSCT', '', ''),
(15, 'WIT', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

CREATE TABLE IF NOT EXISTS `sponsor` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `ContactNo` varchar(15) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sponsor`
--

INSERT INTO `sponsor` (`Id`, `Name`, `Address`, `ContactNo`) VALUES
(1, 'Gado & Jessie Jalandoni Scholarships', '', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

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
(30, 'FuturePlan', 4);

-- --------------------------------------------------------

--
-- Table structure for table `timeline`
--

CREATE TABLE IF NOT EXISTS `timeline` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Term` varchar(8) NOT NULL,
  `DateStart` date NOT NULL,
  `DateEnd` date NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `timeline`
--

INSERT INTO `timeline` (`Id`, `Term`, `DateStart`, `DateEnd`) VALUES
(1, '1st', '2014-01-10', '2014-04-22'),
(2, '2nd', '2014-06-09', '2014-09-19'),
(3, '3rd', '2014-11-14', '2015-02-16');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Username`, `Password`, `Profile_Id`, `Role_Id`) VALUES
(1, 'admin', '2381c66086fbd785292e0f474aa2cd364fc29def', 1, 1),
(2, 'ncheng', '2381c66086fbd785292e0f474aa2cd364fc29def', 2, 3),
(3, 'clubrio', '2381c66086fbd785292e0f474aa2cd364fc29def', 3, 2),
(4, 'qasdasd', '2381c66086fbd785292e0f474aa2cd364fc29def', 4, 2);

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
ALTER TABLE `authassignment`
  ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

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
ALTER TABLE `rights`
  ADD CONSTRAINT `rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

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
