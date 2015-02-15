SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `assisi-svts` DEFAULT CHARACTER SET utf8 ;
USE `assisi-svts` ;

-- -----------------------------------------------------
-- Table `assisi-svts`.`academicyear`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `assisi-svts`.`academicyear` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `StartYear` YEAR NOT NULL,
  `EndYear` YEAR NOT NULL,
  PRIMARY KEY (`Id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `assisi-svts`.`academicterm`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `assisi-svts`.`academicterm` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `TermName` VARCHAR(8) NOT NULL,
  PRIMARY KEY (`Id`))
ENGINE = InnoDB;

INSERT INTO `academicterm`(`Id`,`TermName`) VALUES 
(1,'1st Sem'),
(2,'2st Sem'),
(3,'Summer');
-- -----------------------------------------------------
-- Table `assisi-svts`.`timeline`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `assisi-svts`.`timeline` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `academicyear_id` INT NOT NULL,
  `academicterm_id` INT NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_timeline_academicyear1_idx` (`academicyear_id` ASC),
  INDEX `fk_timeline_academicterm1_idx` (`academicterm_id` ASC),
  CONSTRAINT `fk_timeline_academicyear1`
    FOREIGN KEY (`academicyear_id`)
    REFERENCES `assisi-svts`.`academicyear` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_timeline_academicterm1`
    FOREIGN KEY (`academicterm_id`)
    REFERENCES `assisi-svts`.`academicterm` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `assisi-svts`.`profile`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `assisi-svts`.`profile` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Lastname` VARCHAR(30) NOT NULL,
  `Firstname` VARCHAR(30) NOT NULL,
  `Middlename` VARCHAR(30) NULL DEFAULT NULL,
  `Religion` VARCHAR(30) NULL DEFAULT NULL,
  `Sex` TINYINT(1) NOT NULL,
  `DateOfBirth` DATE NULL DEFAULT NULL,
  `PlaceOfBirth` VARCHAR(45) NULL DEFAULT NULL,
  `Address` VARCHAR(200) NULL DEFAULT NULL,
  `ContactNumber` VARCHAR(15) NOT NULL,
  `Email` VARCHAR(100) NOT NULL,
  `DateCreated` DATE NOT NULL,
  `DateUpdate` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `CivilStatus` VARCHAR(20) NULL,
  `Occupation` VARCHAR(45) NULL,
  `CompanyName` VARCHAR(45) NULL,
  `FuturePlan` LONGTEXT NULL,
  PRIMARY KEY (`Id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2;

INSERT INTO `profile` (`Id`, `Lastname`, `Firstname`, `Middlename`, `Religion`, `Sex`, `CivilStatus`, `DateOfBirth`, `PlaceOfBirth`, `Address`, `ContactNumber`, `Email`, `Occupation`, `FuturePlan`, `DateCreated`, `DateUpdate`) VALUES
(1, 'Delos Reyes', 'John Edward', '', 'Christian', 0, '', '1993-11-05', '', 'Manila', '09221234567', 'jddelosreyes@apc.edu.ph', NULL, 'None so far', '2014-02-13', '2014-02-14 04:42:43');


-- -----------------------------------------------------
-- Table `assisi-svts`.`role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `assisi-svts`.`role` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;

INSERT INTO `role` (`Id`, `Name`) VALUES
(1, 'Admin'),
(2, 'Coordinator'),
(3, 'Student'),
(4, 'Alumni');
-- -----------------------------------------------------
-- Table `assisi-svts`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `assisi-svts`.`user` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Username` VARCHAR(45) NOT NULL,
  `Password` VARCHAR(200) NOT NULL DEFAULT '2381c66086fbd785292e0f474aa2cd364fc29def',
  `Profile_Id` INT(11) NOT NULL,
  `Role_Id` INT(11) NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_User_Profile1_idx` (`Profile_Id` ASC),
  INDEX `fk_User_Role1_idx` (`Role_Id` ASC),
  CONSTRAINT `fk_User_Profile1`
    FOREIGN KEY (`Profile_Id`)
    REFERENCES `assisi-svts`.`profile` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_User_Role1`
    FOREIGN KEY (`Role_Id`)
    REFERENCES `assisi-svts`.`role` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2;

INSERT INTO `user` (`Id`, `Username`, `Password`, `Profile_Id`, `Role_Id`) VALUES
(1, 'admin', '$29RahM63VUkc', 1, 1);
-- -----------------------------------------------------
-- Table `assisi-svts`.`application`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `assisi-svts`.`application` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `TypeOfApplication` VARCHAR(45) NOT NULL,
  `Course` VARCHAR(100) NOT NULL,
  `Duration` VARCHAR(8) NOT NULL,
  `SponsoredYears` INT(11) NOT NULL,
  `User_Id` INT(11) NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Application_User1_idx` (`User_Id` ASC),
  CONSTRAINT `fk_Application_User1`
    FOREIGN KEY (`User_Id`)
    REFERENCES `assisi-svts`.`user` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `assisi-svts`.`sponsor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `assisi-svts`.`sponsor` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NOT NULL,
  `Address` VARCHAR(100) NOT NULL,
  `ContactNo` VARCHAR(15) NOT NULL,
  `SponsorCoordinator` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`Id`))
ENGINE = InnoDB;

INSERT INTO `sponsor` (`Id`, `Name`, `Address`, `SponsorCoordinator`, `ContactNo`) VALUES
(1, 'Gado & Jessie Jalandoni Scholarships', 'No.4 Liberty Building, A. Arnaiz Street, Makati City', 'Mrs. Asuncion Jalandoni', '+638904539');
-- -----------------------------------------------------
-- Table `assisi-svts`.`allocation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `assisi-svts`.`allocation` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `TuitionFee` DECIMAL(8,2) NULL DEFAULT NULL,
  `Miscellaneous` DECIMAL(8,2) NULL DEFAULT NULL,
  `Others` DECIMAL(8,2) NULL DEFAULT NULL,
  `Timeline_Id` INT(11) NOT NULL,
  `Application_Id` INT(11) NOT NULL,
  `Sponsor_Id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Allocation_Timeline1_idx` (`Timeline_Id` ASC),
  INDEX `fk_Allocation_Application1_idx` (`Application_Id` ASC),
  INDEX `fk_Allocation_Sponsor1_idx` (`Sponsor_Id` ASC),
  CONSTRAINT `fk_Allocation_Timeline1`
    FOREIGN KEY (`Timeline_Id`)
    REFERENCES `assisi-svts`.`timeline` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Allocation_Application1`
    FOREIGN KEY (`Application_Id`)
    REFERENCES `assisi-svts`.`application` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Allocation_Sponsor1`
    FOREIGN KEY (`Sponsor_Id`)
    REFERENCES `assisi-svts`.`sponsor` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `assisi-svts`.`AuthItem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `assisi-svts`.`AuthItem` (
  `name` VARCHAR(64) NOT NULL,
  `type` INT(11) NOT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `bizrule` TEXT NULL DEFAULT NULL,
  `data` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`name`))
ENGINE = InnoDB;

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
-- -----------------------------------------------------
-- Table `assisi-svts`.`AuthAssignment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `assisi-svts`.`AuthAssignment` (
  `itemname` VARCHAR(64) NOT NULL,
  `userid` VARCHAR(64) NOT NULL,
  `bizrule` TEXT NULL DEFAULT NULL,
  `data` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`itemname`, `userid`),
  CONSTRAINT `authassignment_ibfk_1`
    FOREIGN KEY (`itemname`)
    REFERENCES `assisi-svts`.`AuthItem` (`name`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

INSERT INTO `AuthAssignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('admin', '1', NULL, 'N;'),
('Coordinator', '3', NULL, 'N;'),
('Student', '2', NULL, 'N;');
-- -----------------------------------------------------
-- Table `assisi-svts`.`AuthItemChild`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `assisi-svts`.`AuthItemChild` (
  `parent` VARCHAR(64) NOT NULL,
  `child` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`parent`, `child`),
  INDEX `child` (`child` ASC),
  CONSTRAINT `authitemchild_ibfk_1`
    FOREIGN KEY (`parent`)
    REFERENCES `assisi-svts`.`AuthItem` (`name`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `authitemchild_ibfk_2`
    FOREIGN KEY (`child`)
    REFERENCES `assisi-svts`.`AuthItem` (`name`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

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
-- -----------------------------------------------------
-- Table `assisi-svts`.`grades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `assisi-svts`.`grades` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `GPA` DECIMAL(3,2) NOT NULL,
  `Timeline_Id` INT(11) NOT NULL,
  `Application_Id` INT(11) NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_Grades_Timeline_idx` (`Timeline_Id` ASC),
  INDEX `fk_Grades_Application1_idx` (`Application_Id` ASC),
  CONSTRAINT `fk_Grades_Timeline`
    FOREIGN KEY (`Timeline_Id`)
    REFERENCES `assisi-svts`.`timeline` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Grades_Application1`
    FOREIGN KEY (`Application_Id`)
    REFERENCES `assisi-svts`.`application` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `assisi-svts`.`school`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `assisi-svts`.`school` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(100) NOT NULL,
  `Address` VARCHAR(100) NOT NULL,
  `ContactNo` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`Id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

INSERT INTO `school` (`Id`, `Name`, `Address`, `ContactNo`) VALUES
(1, 'La Consolacion College Bacolod', 'Galo St, Bacolod', '(034) 434 9661'),
(2, 'La Consolacion College Manila', 'San Miguel, Manila', '(02) 736 0235'),
(3, 'University of Saint La Salle', 'La Salle Avenue, Bacolod 6100,Negros Occidental', '(034) 434 6100'),
(4, 'Welcome Home Foundation Inc', 'Bacolod City, Negros Occidental', '(034) 441 2031'),
(5, 'University of Negros Occidental De Recoletos', '54 Lizares St, Bacolod', '(034) 433 2449'),
(6, 'West Visayas State College', 'Luna Street, Lapaz, Iloilo City', '(033) 320 0870'),
(7, 'West Visayas State College of Science & Technology', 'Burgos St. La Paz, Iloilo City', '(033) 320 9769'),
(8, 'Western Institute of Technology', 'Dalan Luna, Iloilo', '(033) 320 0902'),
(9, 'University of Iloilo - Phinma', 'Dalan Rizal, Iloilo', '(033) 338 1071'),
(10, 'Carlos Hilado Memorial College', 'Fortune Town, Bacolod', '(034) 495 2360'),
(11, 'University of Perpetual Help Las Pinas', 'Alabang - Zapote Rd, Las Piñas', '(02) 872 7041'),
(12, 'University of Perpetual Help Laguna', 'City of Biñan, Laguna', '511-9562'),
(13, 'Saint Pedro Poveda College', 'P. Poveda Road, Mandaluyong', '631 8756'),
(14, 'Don Bosco Technological College - TVET', 'Makati City', '(02) 531 8081'),
(15, 'Don Bosco Technological College', '736 Gen. Kalentong, Mandaluyong', '(02) 531 8081'),
(16, 'Riverside College Bacolod', 'Bacolod', '(034) 432 7624'),
(17, 'Collegio De San Agustin Bacolod', 'BS Aquino Dr, Bacolod', '(034) 434 2471'),
(18, 'University of Santo Tomas', 'España Blvd, Maynila', '(02) 406 1611'),
(19, 'La Concordia College', 'Manila City, Manila', '(02)564-2001'),
(20, 'University Of The Philippines Diliman', 'Diliman, Quezon City', '(02) 981 8500'),
(21, 'New Lucena Polytechnic College', 'Don Epifanio Sonza Sr. Avenue New Lucena Iloilo', '(033) 526 2015'),
(22, 'Assumption College', 'San Lorenzo Dr, Makati', '(02) 817 0757'),
(23, 'Ateneo de Manila University', 'Katipunan Ave, Lungsod Quezon', '(02) 426 6001'),
(24, 'University of the Philippines Los Baños', 'Jose R Velasco Ave, Los Baños 4031,Laguna', '(049) 536 2928');
-- -----------------------------------------------------
-- Table `assisi-svts`.`partnerschool`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `assisi-svts`.`partnerschool` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `School_Id` INT(11) NOT NULL,
  `User_Id` INT(11) NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_School_has_User_User1_idx` (`User_Id` ASC),
  INDEX `fk_School_has_User_School1_idx` (`School_Id` ASC),
  CONSTRAINT `fk_School_has_User_School1`
    FOREIGN KEY (`School_Id`)
    REFERENCES `assisi-svts`.`school` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_School_has_User_User1`
    FOREIGN KEY (`User_Id`)
    REFERENCES `assisi-svts`.`user` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `assisi-svts`.`Rights`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `assisi-svts`.`Rights` (
  `itemname` VARCHAR(64) NOT NULL,
  `type` INT(11) NOT NULL,
  `weight` INT(11) NOT NULL,
  PRIMARY KEY (`itemname`),
  CONSTRAINT `rights_ibfk_1`
    FOREIGN KEY (`itemname`)
    REFERENCES `assisi-svts`.`AuthItem` (`name`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `assisi-svts`.`sys_table`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `assisi-svts`.`sys_table` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `FieldName` VARCHAR(100) NOT NULL,
  `Role_Id` INT(11) NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_sys_Table_Role1_idx` (`Role_Id` ASC),
  CONSTRAINT `fk_sys_Table_Role1`
    FOREIGN KEY (`Role_Id`)
    REFERENCES `assisi-svts`.`role` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

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
SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
