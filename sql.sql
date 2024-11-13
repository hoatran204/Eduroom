-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.3.0 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for eduroom
CREATE DATABASE IF NOT EXISTS `eduroom` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `eduroom`;

-- Dumping structure for table eduroom.class
CREATE TABLE IF NOT EXISTS `class` (
  `IdClass` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `LinkOnline` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`IdClass`),
  CONSTRAINT `class_chk_1` CHECK (((not((`IdClass` like _utf8mb4'% %'))) and (not((`IdClass` like _utf8mb4'%[^a-zA-Z0-9]%')))))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table eduroom.classusers
CREATE TABLE IF NOT EXISTS `classusers` (
  `IdClass` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `IdUser` int DEFAULT NULL,
  `Position` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table eduroom.document
CREATE TABLE IF NOT EXISTS `document` (
  `IdDocument` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `IdClass` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_general_ci,
  `FILE` text COLLATE utf8mb4_general_ci,
  `TEXT` text COLLATE utf8mb4_general_ci,
  `Image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `DateSubmitted` datetime DEFAULT CURRENT_TIMESTAMP,
  `IdTeacher` int DEFAULT NULL,
  `style` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table eduroom.exercise
CREATE TABLE IF NOT EXISTS `exercise` (
  `IdExercise` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `IdClass` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `IdTeacher` int DEFAULT NULL,
  `Image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `AssignmentDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `Deadline` datetime DEFAULT NULL,
  `TEXT` text COLLATE utf8mb4_general_ci,
  `style` text COLLATE utf8mb4_general_ci,
  `title` text COLLATE utf8mb4_general_ci,
  `content` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`IdExercise`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table eduroom.exercisefile
CREATE TABLE IF NOT EXISTS `exercisefile` (
  `Idex` varchar(50) DEFAULT NULL,
  `FILE` longtext,
  `tittle` text,
  `DATE` datetime DEFAULT CURRENT_TIMESTAMP,
  `Deadline` datetime DEFAULT NULL,
  `content` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table eduroom.exstudent
CREATE TABLE IF NOT EXISTS `exstudent` (
  `Idex` varchar(50) DEFAULT NULL,
  `IdStudent` int DEFAULT NULL,
  `Submitted` varchar(20) DEFAULT NULL,
  `Grade` int DEFAULT NULL,
  `CmtStudent` text,
  `CmtTeacher` text,
  `Name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Img` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table eduroom.filestudent
CREATE TABLE IF NOT EXISTS `filestudent` (
  `IdEx` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `IdStudent` int DEFAULT NULL,
  `FILE` text COLLATE utf8mb4_general_ci,
  `NAME` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Image` longtext COLLATE utf8mb4_general_ci,
  `time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table eduroom.noti
CREATE TABLE IF NOT EXISTS `noti` (
  `Idnoti` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `IdClass` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `IdUser` int DEFAULT NULL,
  `Image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `text` text COLLATE utf8mb4_general_ci,
  `DateSubmitted` datetime DEFAULT CURRENT_TIMESTAMP,
  `style` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`Idnoti`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table eduroom.notification
CREATE TABLE IF NOT EXISTS `notification` (
  `IdNotification` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `IdClass` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `IdUser` int DEFAULT NULL,
  `Image` longtext COLLATE utf8mb4_general_ci,
  `noti` text COLLATE utf8mb4_general_ci,
  `DateSubmitted` datetime DEFAULT CURRENT_TIMESTAMP,
  `style` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- Dumping structure for table eduroom.users
CREATE TABLE IF NOT EXISTS `users` (
  `IdUser` int NOT NULL AUTO_INCREMENT,
  `Email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `Pass` text COLLATE utf8mb4_general_ci,
  `Image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`IdUser`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table eduroom.verificationcodes
CREATE TABLE IF NOT EXISTS `verificationcodes` (
  `email` varchar(255) DEFAULT NULL,
  `vercode` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for trigger eduroom.before_insert_noti
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `before_insert_noti` BEFORE INSERT ON `noti` FOR EACH ROW BEGIN
    DECLARE next_id INT;
    SET next_id = COALESCE((SELECT MAX(SUBSTRING(Idnoti, 5) + 1) FROM noti), 1);
    SET NEW.Idnoti = CONCAT('noti', next_id);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger eduroom.insertnoti
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `insertnoti` AFTER INSERT ON `noti` FOR EACH ROW BEGIN
    INSERT INTO notification (IdNotification, IdClass, IdUser, Image, noti, DateSubmitted, style) 
    VALUES (NEW.Idnoti, NEW.IdClass, NEW.IdUser, NEW.Image, NEW.text, NEW.DateSubmitted, NEW.style);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger eduroom.insertnotidocs
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `insertnotidocs` AFTER INSERT ON `document` FOR EACH ROW BEGIN
    
    -- Chèn dữ liệu vào bảng notification
    INSERT INTO notification (IdNotification, IdClass, IdUser, Image, noti, DateSubmitted, style) 
    VALUES (NEW.IdDocument, NEW.IdClass, NEW.IdTeacher, NEW.Image, NEW.text, NEW.DateSubmitted, NEW.style);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger eduroom.insertnotiex
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `insertnotiex` AFTER INSERT ON `exercise` FOR EACH ROW BEGIN
    
    -- Chèn dữ liệu vào bảng notification
    INSERT INTO notification (IdNotification, IdClass, IdUser, Image, noti, DateSubmitted, style) 
    VALUES (NEW.IdExercise, NEW.IdClass, NEW.IdTeacher, NEW.Image, NEW.text, NEW.AssignmentDate, NEW.style);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
