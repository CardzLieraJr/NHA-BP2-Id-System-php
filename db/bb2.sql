-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
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


-- Dumping database structure for bb2
CREATE DATABASE IF NOT EXISTS `bb2` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bb2`;

-- Dumping structure for table bb2.members_status
CREATE TABLE IF NOT EXISTS `members_status` (
  `bb2_id` int NOT NULL AUTO_INCREMENT,
  `bb2_membersphoto` varchar(255) NOT NULL DEFAULT '',
  `bb2_batch` varchar(100) NOT NULL DEFAULT '',
  `bb2_app_id` varchar(100) NOT NULL DEFAULT '',
  `bb2_ln` varchar(150) NOT NULL DEFAULT '',
  `bb2_fn` varchar(150) NOT NULL DEFAULT '',
  `bb2_mn` varchar(150) DEFAULT NULL,
  `bb2_sfx` varchar(50) DEFAULT NULL,
  `bb2_cn` varchar(150) NOT NULL DEFAULT '',
  `bb2_desprov` varchar(150) NOT NULL DEFAULT '',
  `bb2_desmunic` varchar(150) NOT NULL DEFAULT '',
  `bb2_datebirthm` varchar(10) NOT NULL DEFAULT '1',
  `bb2_datebirthd` tinyint NOT NULL DEFAULT '1',
  `bb2_datebirthy` year NOT NULL DEFAULT '2000',
  `bb2_blood` varchar(5) NOT NULL DEFAULT '',
  `bb2_civil` varchar(50) NOT NULL DEFAULT '',
  `bb2_cper` varchar(150) NOT NULL DEFAULT '',
  `bb2_cpernum` varchar(50) NOT NULL DEFAULT '',
  `bb2_registered_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`bb2_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table bb2.members_status: ~0 rows (approximately)

-- Dumping structure for table bb2.nha_users
CREATE TABLE IF NOT EXISTS `nha_users` (
  `nha_bp2_user_id` int NOT NULL AUTO_INCREMENT,
  `nha_bp2_fn` varchar(150) NOT NULL DEFAULT '',
  `nha_bp2_ln` varchar(150) NOT NULL DEFAULT '',
  `nha_bp2_mn` varchar(150) DEFAULT NULL,
  `nha_bp2_sfx` varchar(50) DEFAULT NULL,
  `nha_bp2_cn` varchar(150) NOT NULL DEFAULT '',
  `nha_bp2_email` varchar(255) NOT NULL DEFAULT '',
  `nha_bp2_password` varchar(255) NOT NULL DEFAULT '',
  `nha_bp2_cpassword` varchar(255) NOT NULL DEFAULT '',
  `nha_bp2_ln_acc_type` tinyint NOT NULL DEFAULT '1',
  `bb2_registered_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`nha_bp2_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table bb2.nha_users: ~2 rows (approximately)
REPLACE INTO `nha_users` (`nha_bp2_user_id`, `nha_bp2_fn`, `nha_bp2_ln`, `nha_bp2_mn`, `nha_bp2_sfx`, `nha_bp2_cn`, `nha_bp2_email`, `nha_bp2_password`, `nha_bp2_cpassword`, `nha_bp2_ln_acc_type`, `bb2_registered_date`) VALUES
	(4, 'Pedro', 'Penduko', 'A.', 'Jr', '0987654321', 'user@mail.com', 'user123', 'user123', 2, '2026-05-21 08:39:06'),
	(5, 'Juan', 'De la Cruz', 'A.', 'Jr', '0987654321', 'admin@mail.com', 'admin123', 'admin123', 1, '2026-05-21 09:15:49');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
