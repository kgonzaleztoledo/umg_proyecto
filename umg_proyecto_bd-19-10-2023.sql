-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.34-0ubuntu0.20.04.1 - (Ubuntu)
-- SO del servidor:              Linux
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para umgproyecto
CREATE DATABASE IF NOT EXISTS `umgproyecto` /*!40100 DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `umgproyecto`;

-- Volcando estructura para tabla umgproyecto.add_jobs
CREATE TABLE IF NOT EXISTS `add_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `job_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_vacancies` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_from` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_to` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expired_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `count` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyecto.add_jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla umgproyecto.answers
CREATE TABLE IF NOT EXISTS `answers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `answer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyecto.answers: ~5 rows (aproximadamente)
INSERT INTO `answers` (`id`, `answer`, `created_at`, `updated_at`) VALUES
	(1, 'A', NULL, NULL),
	(2, 'B', NULL, NULL),
	(3, 'C', NULL, NULL),
	(4, 'D', NULL, NULL),
	(5, 'E', NULL, NULL);

-- Volcando estructura para tabla umgproyecto.apply_for_jobs
CREATE TABLE IF NOT EXISTS `apply_for_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `job_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv_upload` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyecto.apply_for_jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla umgproyecto.bitacora
CREATE TABLE IF NOT EXISTS `bitacora` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=163 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyecto.bitacora: ~136 rows (aproximadamente)
INSERT INTO `bitacora` (`id`, `name`, `email`, `description`, `date_time`, `created_at`, `updated_at`) VALUES
	(22, 'Kenneth Andoni González', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Fri, Sep 15, 2023 12:36 AM', NULL, NULL),
	(23, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Fri, Sep 15, 2023 6:29 PM', NULL, NULL),
	(24, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Fri, Sep 15, 2023 8:07 PM', NULL, NULL),
	(25, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Fri, Sep 15, 2023 8:07 PM', NULL, NULL),
	(26, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Fri, Sep 15, 2023 8:07 PM', NULL, NULL),
	(27, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Fri, Sep 15, 2023 8:08 PM', NULL, NULL),
	(28, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Fri, Sep 15, 2023 8:10 PM', NULL, NULL),
	(29, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Fri, Sep 15, 2023 8:10 PM', NULL, NULL),
	(30, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Fri, Sep 15, 2023 8:37 PM', NULL, NULL),
	(31, 'Sandy Guzman', 'zandyta3g@gmail.com', 'Ha iniciado sesión', 'Sat, Sep 16, 2023 12:20 PM', NULL, NULL),
	(32, 'Sandy Guzman', 'zandyta3g@gmail.com', 'Ha cerrado sesión', 'Sat, Sep 16, 2023 12:27 PM', NULL, NULL),
	(33, 'Grisel Toledo', 'g@gmail.com', 'Ha iniciado sesión', 'Sat, Sep 16, 2023 12:28 PM', NULL, NULL),
	(34, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Sun, Sep 24, 2023 3:32 PM', NULL, NULL),
	(35, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Tue, Sep 26, 2023 9:04 PM', NULL, NULL),
	(36, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Tue, Sep 26, 2023 9:04 PM', NULL, NULL),
	(37, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Tue, Sep 26, 2023 9:30 PM', NULL, NULL),
	(38, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Tue, Sep 26, 2023 9:34 PM', NULL, NULL),
	(39, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Tue, Sep 26, 2023 9:34 PM', NULL, NULL),
	(40, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Tue, Sep 26, 2023 9:48 PM', NULL, NULL),
	(41, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Tue, Sep 26, 2023 9:48 PM', NULL, NULL),
	(42, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Tue, Sep 26, 2023 10:14 PM', NULL, NULL),
	(43, 'Pablo González Arana', 'pablo@gmail.com', 'Ha iniciado sesión', 'Tue, Sep 26, 2023 10:14 PM', NULL, NULL),
	(44, 'Pablo González Arana', 'pablo@gmail.com', 'Ha cerrado sesión', 'Tue, Sep 26, 2023 10:15 PM', NULL, NULL),
	(45, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Tue, Sep 26, 2023 10:15 PM', NULL, NULL),
	(46, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Tue, Sep 26, 2023 10:20 PM', NULL, NULL),
	(47, 'Pablo González Arana', 'pablo@gmail.com', 'Ha iniciado sesión', 'Tue, Sep 26, 2023 10:20 PM', NULL, NULL),
	(48, 'Pablo González Arana', 'pablo@gmail.com', 'Ha cerrado sesión', 'Tue, Sep 26, 2023 10:43 PM', NULL, NULL),
	(49, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Tue, Sep 26, 2023 10:43 PM', NULL, NULL),
	(50, 'Pablo González Arana', 'pablo@gmail.com', 'Ha iniciado sesión', 'Tue, Sep 26, 2023 10:44 PM', NULL, NULL),
	(51, 'Pablo González Arana', 'pablo@gmail.com', 'Ha cerrado sesión', 'Tue, Sep 26, 2023 11:06 PM', NULL, NULL),
	(52, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Tue, Sep 26, 2023 11:06 PM', NULL, NULL),
	(53, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Tue, Sep 26, 2023 11:06 PM', NULL, NULL),
	(54, 'Pablo González Arana', 'pablo@gmail.com', 'Ha iniciado sesión', 'Tue, Sep 26, 2023 11:06 PM', NULL, NULL),
	(55, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Tue, Sep 26, 2023 11:47 PM', NULL, NULL),
	(56, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Wed, Sep 27, 2023 5:27 PM', NULL, NULL),
	(57, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Wed, Sep 27, 2023 8:58 PM', NULL, NULL),
	(58, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Wed, Sep 27, 2023 10:39 PM', NULL, NULL),
	(59, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Wed, Sep 27, 2023 10:40 PM', NULL, NULL),
	(64, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Sat, Sep 30, 2023 2:22 AM', NULL, NULL),
	(65, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Sat, Sep 30, 2023 2:23 AM', NULL, NULL),
	(66, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Sat, Sep 30, 2023 2:25 AM', NULL, NULL),
	(67, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Mon, Oct 2, 2023 11:59 AM', NULL, NULL),
	(68, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Mon, Oct 2, 2023 2:47 PM', NULL, NULL),
	(69, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Mon, Oct 2, 2023 2:54 PM', NULL, NULL),
	(70, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Mon, Oct 2, 2023 2:54 PM', NULL, NULL),
	(71, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Mon, Oct 2, 2023 2:55 PM', NULL, NULL),
	(72, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Mon, Oct 2, 2023 2:55 PM', NULL, NULL),
	(73, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Mon, Oct 2, 2023 2:56 PM', NULL, NULL),
	(74, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Mon, Oct 2, 2023 2:57 PM', NULL, NULL),
	(75, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Wed, Oct 4, 2023 5:31 PM', NULL, NULL),
	(76, 'Kenneth Gonzalez Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Wed, Oct 4, 2023 11:11 PM', NULL, NULL),
	(77, 'Kenneth Gonzalez Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Wed, Oct 4, 2023 11:12 PM', NULL, NULL),
	(78, 'Kenneth Gonzalez Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Wed, Oct 4, 2023 11:13 PM', NULL, NULL),
	(79, 'Kenneth Gonzalez Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Thu, Oct 5, 2023 11:29 PM', NULL, NULL),
	(80, 'Kenneth Gonzalez Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Fri, Oct 6, 2023 12:18 AM', NULL, NULL),
	(81, 'Mauricia Batzin', 'mauricia@gmail.com', 'Ha iniciado sesión', 'Fri, Oct 6, 2023 12:18 AM', NULL, NULL),
	(82, 'Mauricia Batzin', 'mauricia@gmail.com', 'Ha cerrado sesión', 'Fri, Oct 6, 2023 12:49 AM', NULL, NULL),
	(83, 'Kenneth Gonzalez Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Fri, Oct 6, 2023 12:49 AM', NULL, NULL),
	(84, 'Kenneth Gonzalez Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Fri, Oct 6, 2023 1:07 AM', NULL, NULL),
	(85, 'Kenneth Gonzalez Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Fri, Oct 6, 2023 1:07 AM', NULL, NULL),
	(86, 'Kenneth Gonzalez Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Fri, Oct 6, 2023 2:04 AM', NULL, NULL),
	(87, 'Kenneth Gonzalez Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Fri, Oct 6, 2023 2:04 AM', NULL, NULL),
	(88, 'Kenneth Gonzalez Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Fri, Oct 6, 2023 4:12 PM', NULL, NULL),
	(89, 'Kenneth Gonzalez Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Fri, Oct 6, 2023 4:20 PM', NULL, NULL),
	(90, 'Mauricia Batzin', 'mauricia@gmail.com', 'Ha iniciado sesión', 'Fri, Oct 6, 2023 4:21 PM', NULL, NULL),
	(91, 'Kenneth Gonzalez Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Fri, Oct 6, 2023 8:59 PM', NULL, NULL),
	(92, 'Kenneth Gonzalez Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Sat, Oct 7, 2023 7:10 PM', NULL, NULL),
	(93, 'Kenneth Gonzalez Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Sat, Oct 7, 2023 10:17 PM', NULL, NULL),
	(94, 'Kenneth Gonzalez Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Sun, Oct 8, 2023 7:08 AM', NULL, NULL),
	(95, 'Kenneth Gonzalez Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Sun, Oct 8, 2023 7:09 AM', NULL, NULL),
	(96, 'Kenneth Gonzalez Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Wed, Oct 11, 2023 3:58 PM', NULL, NULL),
	(97, 'Kenneth Gonzalez Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Wed, Oct 11, 2023 10:06 PM', NULL, NULL),
	(98, 'Kenneth Gonzalez Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Wed, Oct 11, 2023 10:08 PM', NULL, NULL),
	(99, 'Kenneth Gonzalez Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Wed, Oct 11, 2023 10:08 PM', NULL, NULL),
	(100, 'Lucrecia Martinez Torres', 'paulat@gmail.com', 'Ha iniciado sesión', 'Wed, Oct 11, 2023 10:09 PM', NULL, NULL),
	(101, 'Lucrecia Martinez Torres', 'paulat@gmail.com', 'Ha cerrado sesión', 'Wed, Oct 11, 2023 10:31 PM', NULL, NULL),
	(102, 'Kenneth Gonzalez Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Wed, Oct 11, 2023 10:31 PM', NULL, NULL),
	(103, 'Kenneth Gonzalez Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Wed, Oct 11, 2023 10:34 PM', NULL, NULL),
	(104, 'Lucrecia Martinez Torres', 'paulat@gmail.com', 'Ha iniciado sesión', 'Wed, Oct 11, 2023 10:35 PM', NULL, NULL),
	(105, 'Lucrecia Martinez Torres', 'paulat@gmail.com', 'Ha cerrado sesión', 'Wed, Oct 11, 2023 10:44 PM', NULL, NULL),
	(106, 'Kenneth Gonzalez Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Wed, Oct 11, 2023 10:44 PM', NULL, NULL),
	(107, 'Kenneth Gonzalez Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Thu, Oct 12, 2023 1:33 AM', NULL, NULL),
	(108, 'Lucrecia Martinez Torres', 'paulat@gmail.com', 'Ha iniciado sesión', 'Thu, Oct 12, 2023 1:33 AM', NULL, NULL),
	(109, 'Kenneth Gonzalez Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Thu, Oct 12, 2023 10:48 PM', NULL, NULL),
	(110, 'Kenneth Gonzalez Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Sun, Oct 15, 2023 11:29 AM', NULL, NULL),
	(111, 'Kenneth Gonzalez Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Sun, Oct 15, 2023 4:21 PM', NULL, NULL),
	(112, 'Kenneth Gonzalez Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Sun, Oct 15, 2023 4:30 PM', NULL, NULL),
	(113, 'Lucrecia Martinez Torres', 'paulat@gmail.com', 'Ha iniciado sesión', 'Sun, Oct 15, 2023 4:31 PM', NULL, NULL),
	(114, 'Kenneth Gonzalez Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Sun, Oct 15, 2023 7:05 PM', NULL, NULL),
	(115, 'Kenneth Gonzalez Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Mon, Oct 16, 2023 12:08 AM', NULL, NULL),
	(116, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Mon, Oct 16, 2023 12:08 AM', NULL, NULL),
	(117, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Mon, Oct 16, 2023 12:19 AM', NULL, NULL),
	(118, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Mon, Oct 16, 2023 12:19 AM', NULL, NULL),
	(119, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Mon, Oct 16, 2023 12:20 AM', NULL, NULL),
	(120, 'Lucrecia Maria Martinez Torres', 'paulat@gmail.com', 'Ha iniciado sesión', 'Mon, Oct 16, 2023 12:20 AM', NULL, NULL),
	(121, 'Lucrecia Maria Martinez Torres', 'paulat@gmail.com', 'Ha cerrado sesión', 'Mon, Oct 16, 2023 12:20 AM', NULL, NULL),
	(122, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Mon, Oct 16, 2023 12:20 AM', NULL, NULL),
	(123, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Mon, Oct 16, 2023 12:35 AM', NULL, NULL),
	(124, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Mon, Oct 16, 2023 12:35 AM', NULL, NULL),
	(125, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Mon, Oct 16, 2023 12:43 AM', NULL, NULL),
	(126, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Mon, Oct 16, 2023 12:43 AM', NULL, NULL),
	(127, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Mon, Oct 16, 2023 1:23 AM', NULL, NULL),
	(128, 'Kenneth Andoni González Toledoaa', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Mon, Oct 16, 2023 1:23 AM', NULL, NULL),
	(129, 'Kenneth Andoni González Toledoaa', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Mon, Oct 16, 2023 1:25 AM', NULL, NULL),
	(130, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Mon, Oct 16, 2023 1:25 AM', NULL, NULL),
	(131, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Tue, Oct 17, 2023 12:02 AM', NULL, NULL),
	(132, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Tue, Oct 17, 2023 12:07 AM', NULL, NULL),
	(133, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Tue, Oct 17, 2023 12:08 AM', NULL, NULL),
	(134, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Tue, Oct 17, 2023 1:34 AM', NULL, NULL),
	(135, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Tue, Oct 17, 2023 1:34 AM', NULL, NULL),
	(136, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Tue, Oct 17, 2023 7:00 AM', NULL, NULL),
	(137, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Tue, Oct 17, 2023 7:02 AM', NULL, NULL),
	(138, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Tue, Oct 17, 2023 7:02 AM', NULL, NULL),
	(139, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Tue, Oct 17, 2023 7:46 AM', NULL, NULL),
	(140, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Tue, Oct 17, 2023 12:09 PM', NULL, NULL),
	(141, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Tue, Oct 17, 2023 12:18 PM', NULL, NULL),
	(142, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Tue, Oct 17, 2023 2:07 PM', NULL, NULL),
	(143, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Tue, Oct 17, 2023 2:07 PM', NULL, NULL),
	(144, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Tue, Oct 17, 2023 2:11 PM', NULL, NULL),
	(145, 'Lucrecia Martinez Torres', 'paulat@gmail.com', 'Ha iniciado sesión', 'Tue, Oct 17, 2023 2:11 PM', NULL, NULL),
	(146, 'Lucrecia Martinez Torres', 'paulat@gmail.com', 'Ha cerrado sesión', 'Tue, Oct 17, 2023 2:14 PM', NULL, NULL),
	(147, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Tue, Oct 17, 2023 2:14 PM', NULL, NULL),
	(148, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Tue, Oct 17, 2023 2:15 PM', NULL, NULL),
	(149, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Tue, Oct 17, 2023 2:15 PM', NULL, NULL),
	(150, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Tue, Oct 17, 2023 2:16 PM', NULL, NULL),
	(151, 'Lucrecia Martinez Torres', 'paulat@gmail.com', 'Ha iniciado sesión', 'Tue, Oct 17, 2023 2:16 PM', NULL, NULL),
	(152, 'Lucrecia Martinez Torres', 'paulat@gmail.com', 'Ha cerrado sesión', 'Tue, Oct 17, 2023 2:20 PM', NULL, NULL),
	(153, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Tue, Oct 17, 2023 2:20 PM', NULL, NULL),
	(154, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Tue, Oct 17, 2023 3:13 PM', NULL, NULL),
	(155, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Tue, Oct 17, 2023 3:13 PM', NULL, NULL),
	(156, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Tue, Oct 17, 2023 4:19 PM', NULL, NULL),
	(157, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha cerrado sesión', 'Tue, Oct 17, 2023 4:50 PM', NULL, NULL),
	(158, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Tue, Oct 17, 2023 9:51 PM', NULL, NULL),
	(159, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Wed, Oct 18, 2023 3:20 AM', NULL, NULL),
	(160, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Wed, Oct 18, 2023 11:12 AM', NULL, NULL),
	(161, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Wed, Oct 18, 2023 11:50 AM', NULL, NULL),
	(162, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', 'Ha iniciado sesión', 'Wed, Oct 18, 2023 6:40 PM', NULL, NULL);

-- Volcando estructura para tabla umgproyecto.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyecto.categories: ~0 rows (aproximadamente)

-- Volcando estructura para tabla umgproyecto.descuentos
CREATE TABLE IF NOT EXISTS `descuentos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `sku_empresa` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla umgproyecto.descuentos: ~4 rows (aproximadamente)
INSERT INTO `descuentos` (`id`, `descripcion`, `sku_empresa`, `created_at`, `updated_at`) VALUES
	(1, 'IGSS (4.83%)', 'EMP00004', '2023-10-12 03:30:35', '2023-10-11'),
	(2, 'IRTRA(1%)', 'EMP00004', '2023-10-12 03:59:03', '2023-10-11'),
	(3, 'IGSS (4.83%)', 'EMP00002', '2023-10-12 04:00:31', '2023-10-11'),
	(4, 'IRTRA(1%)', 'EMP00002', '2023-10-12 04:01:39', '2023-10-11');

-- Volcando estructura para tabla umgproyecto.descuento_empleados
CREATE TABLE IF NOT EXISTS `descuento_empleados` (
  `id` int NOT NULL AUTO_INCREMENT,
  `empleados_id` int NOT NULL,
  `descuentos_id` int NOT NULL,
  `sku_empresa` varchar(20) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  `porcentaje` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Índice 2` (`descuentos_id`),
  KEY `Índice 3` (`empleados_id`),
  CONSTRAINT `FK_descuento_empleados_descuentos` FOREIGN KEY (`descuentos_id`) REFERENCES `descuentos` (`id`),
  CONSTRAINT `FK_descuento_empleados_empleados` FOREIGN KEY (`empleados_id`) REFERENCES `empleados` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla umgproyecto.descuento_empleados: ~2 rows (aproximadamente)
INSERT INTO `descuento_empleados` (`id`, `empleados_id`, `descuentos_id`, `sku_empresa`, `fecha_creacion`, `porcentaje`, `created_at`, `updated_at`) VALUES
	(1, 26, 1, 'EMP00004', '2023-10-19 07:35:17', 4.83, '2023-10-19 07:35:23', '2023-10-19 07:35:24'),
	(2, 26, 2, 'EMP00004', '2023-10-19 07:35:40', 1.00, '2023-10-19 07:35:44', '2023-10-19 07:35:45');

-- Volcando estructura para tabla umgproyecto.detalle_nominas
CREATE TABLE IF NOT EXISTS `detalle_nominas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `encabezado_nominas_id` int DEFAULT NULL,
  `empleado_id` int DEFAULT NULL,
  `sku_empresa` varchar(15) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `total_descuento` decimal(10,2) DEFAULT NULL,
  `dias_laborado` int DEFAULT NULL,
  `bonificacion_ley` decimal(10,2) DEFAULT NULL,
  `total_hrs_extras` decimal(10,2) DEFAULT NULL,
  `sueldo_liquido` decimal(10,2) DEFAULT NULL,
  `salario` decimal(10,2) DEFAULT NULL,
  `estado` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT 'PENDIENTE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `encabezado_nominas_id` (`encabezado_nominas_id`),
  KEY `Índice 3` (`empleado_id`),
  CONSTRAINT `FK_detalle_nominas_empleados` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`),
  CONSTRAINT `FK_detalle_nominas_encabezado_nominas` FOREIGN KEY (`encabezado_nominas_id`) REFERENCES `encabezado_nominas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla umgproyecto.detalle_nominas: ~0 rows (aproximadamente)
INSERT INTO `detalle_nominas` (`id`, `encabezado_nominas_id`, `empleado_id`, `sku_empresa`, `total_descuento`, `dias_laborado`, `bonificacion_ley`, `total_hrs_extras`, `sueldo_liquido`, `salario`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 1, 26, 'EMP00004', 190.00, 30, 250.00, 375.00, 4235.00, 3800.00, 'PENDIENTE', '2023-10-19 06:40:15', '2023-10-19 06:39:28');

-- Volcando estructura para tabla umgproyecto.empleados
CREATE TABLE IF NOT EXISTS `empleados` (
  `id` int NOT NULL AUTO_INCREMENT,
  `empleado_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `sku_empresa` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_empleado` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cui_dpi` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genero` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_cuenta` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_cuenta` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departamento` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `puesto` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` int DEFAULT NULL,
  `fecha_inicio_laboral` date DEFAULT NULL,
  `tipo_contrato` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_pago` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salario` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`,`empleado_id`) USING BTREE,
  KEY `Índice 2` (`user_id`),
  CONSTRAINT `FK_empleados_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyecto.empleados: ~0 rows (aproximadamente)
INSERT INTO `empleados` (`id`, `empleado_id`, `user_id`, `sku_empresa`, `nombre_empleado`, `email`, `cui_dpi`, `genero`, `no_cuenta`, `tipo_cuenta`, `departamento`, `puesto`, `direccion`, `celular`, `fecha_inicio_laboral`, `tipo_contrato`, `tipo_pago`, `salario`, `created_at`, `updated_at`) VALUES
	(26, 'KH_00007', 1, 'EMP00004', 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', '2498713431002', 'Masculino', '3242002120', 'MONETARIA', 'TELECOMUNICACIONES', 'DESARROLLADOR WEB', 'Eligendi aut dolore', 47460952, '1981-01-13', 'Temporal', 'Quincenal', 35.00, '2023-10-19 03:57:01', '2023-10-19 03:57:01'),
	(27, 'KH_00014', 3, 'EMP00004', 'Lucrecia Martinez Torres', 'paulat@gmail.com', '2578964351001', 'Masculino', '3242002121', 'AHORRO', 'FINANCIERO', 'DESARROLLADOR WEB', 'Officia velit offic', 55123614, '1985-07-26', 'Indefenido', 'Mensual', 24.00, '2023-10-19 06:57:38', '2023-10-19 06:57:38');

-- Volcando estructura para tabla umgproyecto.empresas
CREATE TABLE IF NOT EXISTS `empresas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sku_empresa` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `nombre` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `contacto_persona` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `email` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `direccion` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `telefono` int DEFAULT NULL,
  `movil` int DEFAULT NULL,
  `fecha_registro` int DEFAULT NULL,
  `logo` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `sitio_web` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `estado` enum('ACTIVO','INACTIVO') CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT 'ACTIVO',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla umgproyecto.empresas: ~2 rows (aproximadamente)
INSERT INTO `empresas` (`id`, `sku_empresa`, `nombre`, `contacto_persona`, `email`, `direccion`, `telefono`, `movil`, `fecha_registro`, `logo`, `sitio_web`, `estado`, `created_at`, `updated_at`) VALUES
	(2, 'EMP00002', 'CLAROsss', 'Kenneth Gonzalez Toledo', 'kennethandoni_9@hotmail.com', '2da. calle 1-15 colonia la independencia Mazatenango, Suchitepéquez.', 25678765, 55602435, NULL, '1079217460.jpg', 'https://www.facebook.com/', 'ACTIVO', '2023-09-28 04:56:54', '2023-10-19 05:34:31'),
	(4, 'EMP00004', 'GIGACOM', 'ANTONIO', 'info@gmail.com', 'Ciudad de Mazatenango', 24997541, 55345895, NULL, '1695893690.png', 'https://www.muniguate.com/', 'ACTIVO', '2023-09-28 09:34:50', '2023-09-28 09:34:50'),
	(7, 'EMP00007', 'Ea blanditiis et con', 'Minima quia sapiente', 'hupymonig@mailinator.com', 'Soluta ullamco volup', 2, 55, NULL, '1697715030.jpg', 'Dolor sapiente moles', 'ACTIVO', '2023-10-19 05:30:30', '2023-10-19 05:30:30'),
	(8, 'EMP00008', 'Aut ex ut culpa ad m', 'Maxime atque tempori', 'vometem@mailinator.com', 'Et quia numquam ipsa', 43, 79, NULL, '1697715252.jpg', 'Perferendis vero ut', 'ACTIVO', '2023-10-19 05:34:12', '2023-10-19 05:34:12');

-- Volcando estructura para tabla umgproyecto.encabezado_nominas
CREATE TABLE IF NOT EXISTS `encabezado_nominas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tipo_planilla_id` int DEFAULT NULL,
  `periodo_inicial` date NOT NULL,
  `periodo_final` date NOT NULL,
  `mes` varchar(50) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `ano` year DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `sku_empresa` varchar(50) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Índice 2` (`tipo_planilla_id`),
  CONSTRAINT `FK_encabezado_nomina_tipo_planillas` FOREIGN KEY (`tipo_planilla_id`) REFERENCES `tipo_planillas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla umgproyecto.encabezado_nominas: ~1 rows (aproximadamente)
INSERT INTO `encabezado_nominas` (`id`, `tipo_planilla_id`, `periodo_inicial`, `periodo_final`, `mes`, `ano`, `fecha_creacion`, `sku_empresa`, `created_at`, `updated_at`) VALUES
	(1, 2, '2023-09-01', '2023-09-30', 'SEPTIEMBRE', '2023', '2023-10-19 06:21:11', 'EMP00004', '2023-10-19 06:23:05', '2023-10-19 06:23:06');

-- Volcando estructura para tabla umgproyecto.estimates
CREATE TABLE IF NOT EXISTS `estimates` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `estimate_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `client` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimate_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiry_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grand_total` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_information` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyecto.estimates: ~2 rows (aproximadamente)
INSERT INTO `estimates` (`id`, `estimate_number`, `client`, `project`, `email`, `tax`, `client_address`, `billing_address`, `estimate_date`, `expiry_date`, `total`, `tax_1`, `discount`, `grand_total`, `other_information`, `created_at`, `updated_at`) VALUES
	(1, 'EST_000001', 'Barry Cuda', 'Office Management', NULL, 'VAT', NULL, NULL, '26-09-2023', '26-09-2023', '0', '0', '10', '$ 0.00', 'sadasdasdasd', '2023-09-24 21:34:42', '2023-09-27 04:29:56'),
	(2, 'EST_00002', 'Barry Cuda', 'Office Management', 'nohelia@gmail.com', 'GST', 'HOLA', 'GHOLA', '11-10-2023', '26-10-2023', 'NaN', 'NaN', '10', 'NaN', NULL, '2023-10-13 07:41:39', '2023-10-13 07:41:39');

-- Volcando estructura para tabla umgproyecto.estimates_adds
CREATE TABLE IF NOT EXISTS `estimates_adds` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `estimate_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `item` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_cost` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyecto.estimates_adds: ~6 rows (aproximadamente)
INSERT INTO `estimates_adds` (`id`, `estimate_number`, `item`, `description`, `unit_cost`, `qty`, `amount`, `created_at`, `updated_at`) VALUES
	(21, 'EST_000001', NULL, NULL, NULL, NULL, '0', '2023-09-27 04:29:56', '2023-09-27 04:29:56'),
	(22, 'EST_000001', NULL, NULL, NULL, NULL, '0', '2023-09-27 04:29:56', '2023-09-27 04:29:56'),
	(23, 'EST_000001', NULL, NULL, NULL, NULL, '0', '2023-09-27 04:29:56', '2023-09-27 04:29:56'),
	(24, 'EST_000001', NULL, NULL, NULL, NULL, '0', '2023-09-27 04:29:56', '2023-09-27 04:29:56'),
	(25, 'EST_000001', NULL, NULL, NULL, NULL, '0', '2023-09-27 04:29:56', '2023-09-27 04:29:56'),
	(26, 'EST_00002', 'AFDS', 'FDSFSF', '100', '2', 'NaN', '2023-10-13 07:41:39', '2023-10-13 07:41:39');

-- Volcando estructura para tabla umgproyecto.expenses
CREATE TABLE IF NOT EXISTS `expenses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_from` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchased_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachments` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyecto.expenses: ~0 rows (aproximadamente)

-- Volcando estructura para tabla umgproyecto.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyecto.failed_jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla umgproyecto.familia_informacion
CREATE TABLE IF NOT EXISTS `familia_informacion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `primer_nombre` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `segundo_nombre` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `otros_nombres` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `primer_apellido` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `segundo_apellido` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `apellido_casada` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `parentesco` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `movil` int DEFAULT NULL,
  `contacto_emergencia` varchar(5) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla umgproyecto.familia_informacion: ~3 rows (aproximadamente)
INSERT INTO `familia_informacion` (`id`, `user_id`, `primer_nombre`, `segundo_nombre`, `otros_nombres`, `primer_apellido`, `segundo_apellido`, `apellido_casada`, `parentesco`, `fecha_nacimiento`, `movil`, `contacto_emergencia`, `created_at`, `updated_at`) VALUES
	(1, 'KH_00007', 'Grisel', 'Valentina', NULL, 'González', 'Guzmán', NULL, 'Hijo(a)', '2021-03-12', NULL, 'NO', '2023-10-17 22:28:37', '2023-10-17 22:28:36'),
	(2, 'KH_00007', 'Pablo', 'Alejandro', NULL, 'González', 'Arana', NULL, 'Hijo(a)', '2008-04-30', 55789632, 'SI', '2023-10-17 22:28:32', '2023-10-17 22:28:33'),
	(3, 'KH_00007', 'Sandy', 'Arelys', NULL, 'Guzmán', 'Rodas', NULL, 'Esposo(a)', '1989-12-22', 55123614, 'SI', '2023-10-17 22:42:54', '2023-10-17 22:42:55');

-- Volcando estructura para tabla umgproyecto.holidays
CREATE TABLE IF NOT EXISTS `holidays` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_holiday` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_holiday` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyecto.holidays: ~2 rows (aproximadamente)
INSERT INTO `holidays` (`id`, `name_holiday`, `date_holiday`, `created_at`, `updated_at`) VALUES
	(1, 'QUINCENA', '05-10-2023', '2023-10-05 07:46:29', '2023-10-05 07:46:29'),
	(2, 'QUINCENA', '18-10-2023', '2023-10-13 07:30:36', '2023-10-13 07:30:36');

-- Volcando estructura para tabla umgproyecto.leaves_admins
CREATE TABLE IF NOT EXISTS `leaves_admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leave_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leave_reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyecto.leaves_admins: ~0 rows (aproximadamente)
INSERT INTO `leaves_admins` (`id`, `user_id`, `leave_type`, `from_date`, `to_date`, `day`, `leave_reason`, `created_at`, `updated_at`) VALUES
	(1, 'KH_000007', 'Medical Leave', '29-08-2023', '13-09-2023', '15', 'wae', '2023-09-28 10:37:20', '2023-09-28 10:37:20');

-- Volcando estructura para tabla umgproyecto.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyecto.migrations: ~38 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2021_04_25_224042_create_user_activity_logs_table', 1),
	(6, '2021_04_30_224320_create_activity_logs_table', 1),
	(7, '2021_05_03_061844_create_user_types_table', 1),
	(8, '2021_05_03_061918_create_role_type_users_table', 1),
	(9, '2021_06_04_053627_create_sequence_tbls_table', 1),
	(10, '2021_06_04_053741_create_generate_id_tbls_table', 1),
	(11, '2021_07_03_161410_create_position_types_table', 1),
	(12, '2021_07_03_171244_create_departments_table', 1),
	(13, '2021_07_14_054840_create_employees_table', 1),
	(14, '2021_07_16_143215_create_module_permissions_table', 1),
	(15, '2021_07_27_053429_create_holidays_table', 1),
	(16, '2021_08_01_052433_create_permission_lists_table', 1),
	(17, '2021_08_08_054847_create_roles_permissions_table', 1),
	(18, '2021_08_13_054414_create_profile_information_table', 1),
	(19, '2021_08_23_053914_create_leaves_admins_table', 1),
	(20, '2021_09_21_054658_create_staff_salaries_table', 1),
	(21, '2021_11_06_201850_create_performance_indicator_lists_table', 1),
	(22, '2021_11_09_070649_create_performance_indicators_table', 1),
	(23, '2021_11_18_055032_create_performance_appraisals_table', 1),
	(24, '2021_12_04_055348_create_trainings_table', 1),
	(25, '2022_01_07_060821_create_trainers_table', 1),
	(26, '2022_02_02_060242_create_training_types_table', 1),
	(27, '2022_04_23_223952_create_estimates_table', 1),
	(28, '2022_04_24_222616_create_estimate_numbers_table', 1),
	(29, '2022_04_25_222644_create_estimates_adds_table', 1),
	(30, '2022_05_07_224549_create_sequence_estimates_table', 1),
	(31, '2022_06_22_051203_create_expenses_table', 1),
	(32, '2022_09_04_182928_create_personal_information_table', 1),
	(33, '2022_09_16_190428_create_type_jobs_table', 1),
	(34, '2022_09_21_053939_create_add_jobs_table', 1),
	(35, '2022_10_08_052414_create_apply_for_jobs_table', 1),
	(36, '2022_12_18_175400_create_categories_table', 1),
	(37, '2022_12_24_180155_create_answers_table', 1),
	(38, '2022_12_24_182824_create_questions_table', 1);

-- Volcando estructura para tabla umgproyecto.module_permissions
CREATE TABLE IF NOT EXISTS `module_permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `module_permission` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_count` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `read` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `write` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `import` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `export` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyecto.module_permissions: ~16 rows (aproximadamente)
INSERT INTO `module_permissions` (`id`, `employee_id`, `module_permission`, `id_count`, `read`, `write`, `create`, `delete`, `import`, `export`, `created_at`, `updated_at`) VALUES
	(17, 'KH_000007', 'Holidays', '1', 'Y', 'Y', 'Y', 'Y', 'Y', 'N', NULL, '2023-09-27 05:08:18'),
	(18, 'KH_000007', 'Leaves', '2', 'Y', 'Y', 'Y', 'N', 'N', 'N', NULL, '2023-09-27 05:08:18'),
	(19, 'KH_000007', 'Clients', '3', 'Y', 'Y', 'Y', 'N', 'N', 'N', NULL, '2023-09-27 05:08:18'),
	(20, 'KH_000007', 'Projects', '4', 'Y', 'N', 'Y', 'N', 'N', 'N', NULL, '2023-09-27 05:08:18'),
	(21, 'KH_000007', 'Tasks', '5', 'Y', 'Y', 'Y', 'Y', 'N', 'N', NULL, '2023-09-27 05:08:18'),
	(22, 'KH_000007', 'Chats', '6', 'Y', 'Y', 'Y', 'Y', 'N', 'N', NULL, '2023-09-27 05:08:18'),
	(23, 'KH_000007', 'Assets', '7', 'Y', 'Y', 'Y', 'Y', 'N', 'N', NULL, '2023-09-27 05:08:18'),
	(24, 'KH_000007', 'Timing Sheets', '8', 'Y', 'Y', 'Y', 'Y', 'N', 'N', NULL, '2023-09-27 05:08:18');

-- Volcando estructura para tabla umgproyecto.nomina_asistencias
CREATE TABLE IF NOT EXISTS `nomina_asistencias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `empleado_id` int DEFAULT NULL,
  `sku_empresa` varchar(20) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `total_dias` int NOT NULL,
  `h_extras` int NOT NULL,
  `mes` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `ano` year NOT NULL,
  `estado` varchar(50) COLLATE utf8mb3_spanish_ci NOT NULL DEFAULT 'PENDIENTE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Índice 2` (`empleado_id`),
  CONSTRAINT `FK_nomina_asistencias_empleados` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla umgproyecto.nomina_asistencias: ~0 rows (aproximadamente)
INSERT INTO `nomina_asistencias` (`id`, `empleado_id`, `sku_empresa`, `fecha_inicio`, `fecha_final`, `fecha_creacion`, `total_dias`, `h_extras`, `mes`, `ano`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 26, 'EMP00004', '2023-09-01', '2023-09-30', '2023-10-19 07:12:52', 30, 15, 'SEPTIEMBRE', '2023', 'PENDIENTE', '2023-10-19 07:13:49', '2023-10-19 07:14:53');

-- Volcando estructura para tabla umgproyecto.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyecto.password_resets: ~0 rows (aproximadamente)

-- Volcando estructura para tabla umgproyecto.perfil_informacion
CREATE TABLE IF NOT EXISTS `perfil_informacion` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre_completo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `genero` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_postal` int DEFAULT NULL,
  `telefono_movil` int DEFAULT NULL,
  `departamento` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `puesto_designado` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jefe_inmediato` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyecto.perfil_informacion: ~3 rows (aproximadamente)
INSERT INTO `perfil_informacion` (`id`, `nombre_completo`, `user_id`, `email`, `fecha_nacimiento`, `genero`, `direccion`, `estado`, `ciudad`, `codigo_postal`, `telefono_movil`, `departamento`, `puesto_designado`, `jefe_inmediato`, `created_at`, `updated_at`) VALUES
	(9, 'Kenneth Andoni González Toledo', 'KH_00007', 'kennethandoni14@gmail.com', '1987-11-14', 'Masculino', '2da.calle 9-15 zona 2 Colonia El paraíso, Mazatenango', 'ACTIVO', 'MAZATENANGO', 100001, 47460952, 'TECNOLOGÍA DE LA INFORMACIÓN Y COMUNICACIÓN', 'WebDesigner', 'Roberto Arzu Gomez', '2023-10-16 04:16:02', '2023-10-18 13:50:18'),
	(11, 'Lucrecia Martinez Torres', 'KH_00014', 'paulat@gmail.com', '1982-09-10', 'Masculino', 'Ciudad Viejas Guatemala', 'ACTIVO', 'ANTIGUA GUATEMALA', 100001, 55123614, 'DIRECCIÓN GENERAL', 'Manager', 'Roberto Arzu Gomez', '2023-10-16 04:52:43', '2023-10-16 07:24:00'),
	(12, 'MAuricia Batzin', 'KH_00016', 'mauricia@gmail.com', '1989-12-22', 'Femenino', 'Ciudad de Guatemala Calle el barranco Ciudad de Guatemaa', 'ACTIVO', 'MAZATENANGO', 100001, 55123614, 'TELECOMUNICACIONES', 'DESARROLLADOR WEB', 'Kenneth Andoni González Toledo', '2023-10-17 12:38:17', '2023-10-17 12:38:17');

-- Volcando estructura para tabla umgproyecto.performance_appraisals
CREATE TABLE IF NOT EXISTS `performance_appraisals` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_experience` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marketing` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `management` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `administration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `presentation_skill` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quality_of_Work` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `efficiency` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `integrity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `professionalism` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_work` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `critical_thinking` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conflict_management` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attendance` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ability_to_meet_deadline` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyecto.performance_appraisals: ~0 rows (aproximadamente)

-- Volcando estructura para tabla umgproyecto.performance_indicators
CREATE TABLE IF NOT EXISTS `performance_indicators` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_eperience` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marketing` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `management` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `administration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `presentation_skill` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quality_of_Work` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `efficiency` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `integrity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `professionalism` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_work` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `critical_thinking` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conflict_management` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attendance` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ability_to_meet_deadline` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyecto.performance_indicators: ~0 rows (aproximadamente)

-- Volcando estructura para tabla umgproyecto.performance_indicator_lists
CREATE TABLE IF NOT EXISTS `performance_indicator_lists` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `per_name_list` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyecto.performance_indicator_lists: ~5 rows (aproximadamente)
INSERT INTO `performance_indicator_lists` (`id`, `per_name_list`, `created_at`, `updated_at`) VALUES
	(1, 'None', NULL, NULL),
	(2, 'Beginner', NULL, NULL),
	(3, 'Intermediate', NULL, NULL),
	(4, 'Advanced', NULL, NULL),
	(5, 'Expert / Leader', NULL, NULL);

-- Volcando estructura para tabla umgproyecto.permiso_empleados
CREATE TABLE IF NOT EXISTS `permiso_empleados` (
  `id` int NOT NULL AUTO_INCREMENT,
  `empleado_id` int NOT NULL,
  `sku_empresa` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `fecha_permiso` date NOT NULL,
  `motivo` varchar(150) COLLATE utf8mb3_spanish_ci NOT NULL,
  `fecha_desde` date NOT NULL,
  `fecha_hasta` date NOT NULL,
  `tipo_permiso` varchar(50) COLLATE utf8mb3_spanish_ci NOT NULL,
  `estado` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL DEFAULT 'PENDIENTE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Índice 2` (`empleado_id`),
  CONSTRAINT `FK_permiso_empleados_empleados` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla umgproyecto.permiso_empleados: ~0 rows (aproximadamente)
INSERT INTO `permiso_empleados` (`id`, `empleado_id`, `sku_empresa`, `fecha_permiso`, `motivo`, `fecha_desde`, `fecha_hasta`, `tipo_permiso`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 26, 'EMP00004', '2023-10-19', 'Vacaciones Anuales', '2023-10-20', '2023-11-02', 'VACACIONES', 'APROBADO', '2023-10-19 07:28:51', '2023-10-19 07:28:52');

-- Volcando estructura para tabla umgproyecto.permission_lists
CREATE TABLE IF NOT EXISTS `permission_lists` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `permission_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `read` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `write` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `import` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `export` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyecto.permission_lists: ~8 rows (aproximadamente)
INSERT INTO `permission_lists` (`id`, `permission_name`, `read`, `write`, `create`, `delete`, `import`, `export`) VALUES
	(1, 'Holidays', 'Y', 'Y', 'Y', 'Y', 'Y', 'N'),
	(2, 'Leaves', 'Y', 'Y', 'Y', 'N', 'N', 'N'),
	(3, 'Clients', 'Y', 'Y', 'Y', 'N', 'N', 'N'),
	(4, 'Projects', 'Y', 'N', 'Y', 'N', 'N', 'N'),
	(5, 'Tasks', 'Y', 'Y', 'Y', 'Y', 'N', 'N'),
	(6, 'Chats', 'Y', 'Y', 'Y', 'Y', 'N', 'N'),
	(7, 'Assets', 'Y', 'Y', 'Y', 'Y', 'N', 'N'),
	(8, 'Timing Sheets', 'Y', 'Y', 'Y', 'Y', 'N', 'N');

-- Volcando estructura para tabla umgproyecto.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyecto.personal_access_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla umgproyecto.personal_departamentos
CREATE TABLE IF NOT EXISTS `personal_departamentos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku_empresa` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyecto.personal_departamentos: ~10 rows (aproximadamente)
INSERT INTO `personal_departamentos` (`id`, `nombre`, `descripcion`, `sku_empresa`, `created_at`, `updated_at`) VALUES
	(2, 'TECNOLOGÍA DE LA INFORMACIÓN Y COMUNICACIÓN', 'Entre sus tareas se encuentra el diseño, desarrollo, administración e implementación de sistemas de información. También se encarga de brindar soporte técnico a los usuarios e innovar el área conforme a las nuevas tecnologías', 'EMP00004', NULL, NULL),
	(4, 'MARKETING', ' ES EL ÁREA DE UNA EMPRESA QUE SE ENCARGA DEL DESARROLLO DE ESTRATEGIAS DE VENTAS QUE AYUDAN A SUS ORGANIZACIONES A POSICIONARSE EN UN LUGAR RENTABLE EN EL MERCADO.', 'EMP00002', '2023-09-27 06:47:21', '2023-10-12 10:27:48'),
	(5, 'FINANCIERO', ' ES RESPONSABLE DE LA MOVILIZACIÓN Y ADMINISTRACIÓN DE LOS RECURSOS FINANCIEROS DEL BANCO, CORRESPONDIENTES TANTO AL ACTIVO COMO EL PASIVO DE LA ORGANIZACIÓN, INCLUYENDO FONDOS PROVENIENTES DEL ENDEUDAMIENTO Y DE OTRA ÍNDOLE.', 'EMP00002', '2023-09-27 07:44:15', '2023-10-12 10:27:23'),
	(6, 'COMERCIAL', 'HOSDFSFSDFSDFSDFSD', 'EMP00004', NULL, '2023-10-13 04:49:42'),
	(7, 'COMPRAS', 'HOSDFSFSDFSDFSDFSD', 'EMP00004', NULL, NULL),
	(8, 'LOGÍSTICA Y OPERACIONES', 'HOSDFSFSDFSDFSDFSD', 'EMP00004', NULL, NULL),
	(9, 'TELECOMUNICACIONES', 'HOS', 'EMP00004', NULL, '2023-10-13 05:56:02'),
	(10, 'CONTROL DE GESTIÓN', 'HOSDFSFSDFSDFSDFSD', 'EMP00004', NULL, NULL),
	(11, 'DIRECCIÓN GENERAL', 'HOSDFSFSDFSDFSDFSD', 'EMP00004', NULL, NULL),
	(12, 'TIC', 'ENTRE SUS TAREAS SE ENCUENTRA EL DISEÑO, DESARROLLO, ADMINISTRACIÓN E IMPLEMENTACIÓN DE SISTEMAS DE INFORMACIÓN. TAMBIÉN SE ENCARGA DE BRINDAR SOPORTE TÉCNICO A LOS USUARIOS E INNOVAR EL ÁREA CONFORME A LAS NUEVAS TECNOLOGÍAS', 'EMP00002', '2023-10-12 10:05:34', '2023-10-12 10:05:34');

-- Volcando estructura para tabla umgproyecto.personal_informacion
CREATE TABLE IF NOT EXISTS `personal_informacion` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cui_dpi` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `fecha_vec_dpi` date NOT NULL,
  `no_licencia` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_vec_licencia` date DEFAULT NULL,
  `nit` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_licencia` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `movil` int DEFAULT NULL,
  `nacionalidad` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado_civil` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_hijos` int DEFAULT NULL,
  `banco` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_cuenta` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_cuenta` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_frontal_dpi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_adverso_dpi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf_penales` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf_policiacos` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf_cv` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyecto.personal_informacion: ~3 rows (aproximadamente)
INSERT INTO `personal_informacion` (`id`, `user_id`, `cui_dpi`, `fecha_vec_dpi`, `no_licencia`, `fecha_vec_licencia`, `nit`, `tipo_licencia`, `movil`, `nacionalidad`, `religion`, `estado_civil`, `total_hijos`, `banco`, `no_cuenta`, `tipo_cuenta`, `img_frontal_dpi`, `img_adverso_dpi`, `pdf_penales`, `pdf_policiacos`, `pdf_cv`, `created_at`, `updated_at`) VALUES
	(11, 'KH_00007', '2498713431002', '2023-10-16', '2498713431001', '2023-10-16', '64754413', 'B', 54789632, 'GUATEMALTECA', 'CATOLICA', 'SOLTERO', 2, 'El Crédito Hipotecario Nacional de Guatemala', '3242002120', 'MONETARIA', '1697576523.jpg', '1697530504.jpg', '1697566805.pdf', '1697532863.pdf', '1697535185.pdf', '2023-10-16 13:09:51', '2023-10-17 15:02:03'),
	(12, 'KH_00014', '2578964351001', '2035-10-26', NULL, NULL, '58427236', 'NO APLICA', 47896321, 'GUATEMALTECA', 'EVANGELICA', 'SOLTERO', 2, 'El Crédito Hipotecario Nacional de Guatemala', '3242002121', 'AHORRO', NULL, NULL, NULL, NULL, NULL, '2023-10-17 10:04:43', '2023-10-17 10:14:05'),
	(13, 'KH_00016', '1921494741001', '2027-12-22', NULL, NULL, '58427236', 'NO APLICA', 55123614, 'GUATEMALTECA', 'OTRAS', 'SOLTERO', 1, 'El Crédito Hipotecario Nacional de Guatemala', '5214700', 'AHORRO', NULL, NULL, NULL, NULL, NULL, '2023-10-17 12:39:26', '2023-10-17 12:39:26');

-- Volcando estructura para tabla umgproyecto.puestos
CREATE TABLE IF NOT EXISTS `puestos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku_empresa` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyecto.puestos: ~9 rows (aproximadamente)
INSERT INTO `puestos` (`id`, `nombre`, `descripcion`, `sku_empresa`, `created_at`, `updated_at`) VALUES
	(1, 'CEO', NULL, 'EMP00004', '2023-10-13 04:56:43', '2023-10-13 04:56:51'),
	(2, 'CFO', NULL, 'EMP00004', '2023-10-13 04:56:44', '2023-10-13 04:56:53'),
	(3, 'Manager', NULL, 'EMP00004', '2023-10-13 04:56:45', '2023-10-13 04:56:51'),
	(4, 'Web Designer', NULL, 'EMP00004', '2023-10-13 04:56:45', '2023-10-13 04:56:50'),
	(5, 'DESARROLLADOR WEB', 'PROGRAMADOR ESPECIALIZADO, O DEDICADO DE FORMA ESPECÍFICA, EN DESARROLLAR APLICACIONES DE LA WORLD WIDE WEB WWWO APLICACIONES DISTRIBUIDAS EN RED QUE SE EJECUTAN MEDIANTE UN SERVIDOR WEB.', 'EMP00004', '2023-10-13 04:56:47', '2023-10-13 05:49:35'),
	(6, 'DESARROLLADOR ANDROID', '11111111111111', 'EMP00004', '2023-10-13 04:56:46', '2023-10-13 06:04:24'),
	(7, 'IOS Developer', NULL, 'EMP00002', '2023-10-13 04:56:46', '2023-10-13 04:56:48'),
	(8, 'JEFE DE EQUIPO (Team Leader)', 'SE TRATA DE AQUELLA FIGURA QUE PROVEE UNA DIRECCIÓN Y UNA GUÍA A TODOS LOS MIEMBROS DEL EQUIPO DE TRABAJO, LOGRANDO ASÍ QUE TODOS TRABAJEN JUNTOS Y HACIA UN MISMO OBJETIVO 🚀😀 😃 😄 😁 😆 😅 😂 🤣 🥲 🥹 😊 😇 🙂', 'EMP00004', '2023-10-13 04:56:47', '2023-10-13 05:50:49'),
	(9, 'JEFE DE TRANSPORTE', 'DEBERÁ TENER UN PROFUNDO CONOCIMIENTO DE LA GESTIÓN DE LA CADENA DE SUMINISTRO,  COMO EL ALMACENAJE DE PRODUCTOS, EL DESPACHO DE PEDIDOS Y EL SEGUIMIENTO DE LOS VEHÍCULOS', 'EMP00004', '2023-10-13 05:39:41', '2023-10-13 05:44:33');

-- Volcando estructura para tabla umgproyecto.questions
CREATE TABLE IF NOT EXISTS `questions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `questions` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_a` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_b` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_c` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_d` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_snippets` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer_explanation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_to_question` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyecto.questions: ~0 rows (aproximadamente)

-- Volcando estructura para tabla umgproyecto.roles_permissions
CREATE TABLE IF NOT EXISTS `roles_permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `permissions_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyecto.roles_permissions: ~10 rows (aproximadamente)
INSERT INTO `roles_permissions` (`id`, `permissions_name`, `created_at`, `updated_at`) VALUES
	(1, 'Administrator', NULL, NULL),
	(2, 'CEO', NULL, NULL),
	(3, 'Manager', NULL, NULL),
	(4, 'Team Leader', NULL, NULL),
	(5, 'Accountant', NULL, NULL),
	(6, 'Web Developer', NULL, NULL),
	(7, 'Web Designer', NULL, NULL),
	(8, 'HR', NULL, NULL),
	(9, 'UI/UX Developer', NULL, NULL),
	(10, 'SEO Analyst', NULL, NULL);

-- Volcando estructura para tabla umgproyecto.rol_usuarios
CREATE TABLE IF NOT EXISTS `rol_usuarios` (
  `id` bigint unsigned NOT NULL DEFAULT '0',
  `nombre_rol` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku_empresa` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyecto.rol_usuarios: ~6 rows (aproximadamente)
INSERT INTO `rol_usuarios` (`id`, `nombre_rol`, `sku_empresa`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'EMP00004', '2023-10-12 06:34:07', '2023-10-12 07:01:39'),
	(2, 'Super Admin', 'EMP00004', '2023-10-12 06:34:08', '2023-10-12 07:01:40'),
	(3, 'Usuario Normal', 'EMP00004', '2023-10-12 06:34:08', '2023-10-12 07:01:41'),
	(4, 'Cliente', 'EMP00002', '2023-10-12 06:34:09', '2023-10-12 07:01:41'),
	(5, 'Empleado', 'EMP00004', '2023-10-12 06:34:09', '2023-10-13 06:08:44'),
	(9, 'Empleado', 'EMP00002', '2023-10-12 07:32:00', '2023-10-12 07:33:37');

-- Volcando estructura para tabla umgproyecto.sequence_empresa
CREATE TABLE IF NOT EXISTS `sequence_empresa` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla umgproyecto.sequence_empresa: ~6 rows (aproximadamente)
INSERT INTO `sequence_empresa` (`id`) VALUES
	(1),
	(2),
	(3),
	(4),
	(5),
	(6),
	(7),
	(8);

-- Volcando estructura para tabla umgproyecto.sequence_estimates
CREATE TABLE IF NOT EXISTS `sequence_estimates` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyecto.sequence_estimates: ~2 rows (aproximadamente)
INSERT INTO `sequence_estimates` (`id`) VALUES
	(1),
	(2);

-- Volcando estructura para tabla umgproyecto.sequence_tbls
CREATE TABLE IF NOT EXISTS `sequence_tbls` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyecto.sequence_tbls: ~5 rows (aproximadamente)
INSERT INTO `sequence_tbls` (`id`) VALUES
	(1),
	(13),
	(14),
	(15),
	(16),
	(17),
	(18),
	(19),
	(20),
	(21),
	(22),
	(23),
	(24),
	(25),
	(26),
	(27);

-- Volcando estructura para tabla umgproyecto.staff_salaries
CREATE TABLE IF NOT EXISTS `staff_salaries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `basic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `da` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hra` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conveyance` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allowance` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_allowance` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tds` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `esi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pf` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leave` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prof_tax` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `labour_welfare` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyecto.staff_salaries: ~0 rows (aproximadamente)
INSERT INTO `staff_salaries` (`id`, `name`, `user_id`, `salary`, `basic`, `da`, `hra`, `conveyance`, `allowance`, `medical_allowance`, `tds`, `esi`, `pf`, `leave`, `prof_tax`, `labour_welfare`, `created_at`, `updated_at`) VALUES
	(3, 'Kenneth Andoni Gonzalez Toledo', 'KH_000007', '1000', '120', '40', '3', '4', '4', '4', '10', '4', '4', '2', '3', '3', '2023-10-13 07:48:03', '2023-10-13 07:55:22');

-- Volcando estructura para tabla umgproyecto.tipo_planillas
CREATE TABLE IF NOT EXISTS `tipo_planillas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `sku_empresa` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla umgproyecto.tipo_planillas: ~5 rows (aproximadamente)
INSERT INTO `tipo_planillas` (`id`, `nombre`, `sku_empresa`, `created_at`, `updated_at`) VALUES
	(1, 'QUINCENAL', 'EMP00004', '2023-10-15 17:54:41', '2023-10-15 22:22:50'),
	(2, 'MENSUAL', 'EMP00004', '2023-10-15 17:57:11', '2023-10-15 22:23:00'),
	(3, 'PRUEBA', 'EMP00004', '2023-10-15 22:30:13', '2023-10-15 22:30:13'),
	(4, 'QUINCENAL', 'EMP00002', '2023-10-15 22:31:29', '2023-10-15 22:31:29'),
	(5, 'MENSUAL', 'EMP00002', '2023-10-15 22:31:42', '2023-10-15 22:31:42');

-- Volcando estructura para tabla umgproyecto.trainers
CREATE TABLE IF NOT EXISTS `trainers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trainer_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyecto.trainers: ~0 rows (aproximadamente)

-- Volcando estructura para tabla umgproyecto.trainings
CREATE TABLE IF NOT EXISTS `trainings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `trainer_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employees_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `training_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trainer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employees` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `training_cost` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyecto.trainings: ~0 rows (aproximadamente)

-- Volcando estructura para tabla umgproyecto.training_types
CREATE TABLE IF NOT EXISTS `training_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyecto.training_types: ~0 rows (aproximadamente)

-- Volcando estructura para tabla umgproyecto.type_jobs
CREATE TABLE IF NOT EXISTS `type_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_type_job` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyecto.type_jobs: ~6 rows (aproximadamente)
INSERT INTO `type_jobs` (`id`, `name_type_job`, `created_at`, `updated_at`) VALUES
	(1, 'Full Time', NULL, NULL),
	(2, 'Part Time', NULL, NULL),
	(3, 'Internship', NULL, NULL),
	(4, 'Temporary', NULL, NULL),
	(5, 'Remote', NULL, NULL),
	(6, 'Others', NULL, NULL);

-- Volcando estructura para tabla umgproyecto.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `empresa_id` int NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `puesto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departamento` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_ingreso` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `nombre_rol` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`,`user_id`) USING BTREE,
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_join_date_unique` (`fecha_ingreso`) USING BTREE,
  KEY `fk_users_empresa1_idx` (`empresa_id`),
  CONSTRAINT `FK_users_empresas` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyecto.users: ~4 rows (aproximadamente)
INSERT INTO `users` (`id`, `user_id`, `empresa_id`, `nombre`, `puesto`, `departamento`, `fecha_ingreso`, `email`, `email_verified_at`, `nombre_rol`, `avatar`, `password`, `estado`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'KH_00007', 4, 'Kenneth Andoni González Toledo', 'Web Designer', 'DIRECCIÓN GENERAL', 'Tue, Sep 26, 2023 10:48 PM', 'kennethandoni14@gmail.com', '2023-10-05 01:48:50', 'Super Admin', '1502222602.jpg', '$2y$10$NNer4F3HX3RcfsGmaVtn8O71j6UftAzYUBN/PHVx4/GxZUYdaaGCy', '1', 'qeqw', '2023-09-27 04:48:15', '2023-10-16 07:26:47'),
	(3, 'KH_00014', 4, 'Lucrecia Martinez Torres', 'CEO', 'MARKETING', 'Wed, Oct 4, 2023 5:58 PM', 'paulat@gmail.com', NULL, 'Admin', '488333515.jpg', '$2y$10$NNer4F3HX3RcfsGmaVtn8O71j6UftAzYUBN/PHVx4/GxZUYdaaGCy', '1', 'adsasd', '2023-10-04 23:58:58', '2023-10-16 07:24:55'),
	(12, 'KH_00027', 4, 'Paula Lucrecia Martinez Torres', 'CEO', 'DIRECCIÓN GENERAL', 'Thu, Oct 19, 2023 5:41 AM', 'paulatores@gmail.com', NULL, 'Admin', '1851016440.jpg', '$2y$10$uFOvYASexdAvPNPt7AZhGOB3q3DfNiVBixPBbZWxgBaUPdtl9h4gm', '1', NULL, '2023-10-19 05:41:15', '2023-10-19 05:41:15');

-- Volcando estructura para tabla umgproyecto.user_activity_logs
CREATE TABLE IF NOT EXISTS `user_activity_logs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modify_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyecto.user_activity_logs: ~23 rows (aproximadamente)
INSERT INTO `user_activity_logs` (`id`, `user_name`, `email`, `phone_number`, `status`, `role_name`, `modify_user`, `date_time`, `created_at`, `updated_at`) VALUES
	(7, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', '47460952', 'Active', 'Admin', 'Delete', 'Tue, Sep 26, 2023 10:43 PM', NULL, NULL),
	(8, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', '55123614', 'Active', 'Admin', 'Update', 'Wed, Sep 27, 2023 3:02 AM', NULL, NULL),
	(9, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', '55123614', 'Active', 'Admin', 'Update', 'Thu, Sep 28, 2023 2:08 AM', NULL, NULL),
	(10, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', NULL, 'Active', 'Admin', 'Update', 'Thu, Sep 28, 2023 2:44 AM', NULL, NULL),
	(11, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', '55123614', 'Active', 'Admin', 'Update', 'Thu, Sep 28, 2023 3:07 AM', NULL, NULL),
	(13, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', '55123614', 'Active', 'Admin', 'Delete', 'Thu, Sep 28, 2023 3:32 AM', NULL, NULL),
	(14, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', '55123614', 'Active', 'Admin', 'Delete', 'Thu, Sep 28, 2023 3:35 AM', NULL, NULL),
	(17, 'aaa', 'nohelia@gmail.com', NULL, '1', 'Employee', 'Update', 'Thu, Oct 5, 2023 12:09 AM', NULL, NULL),
	(18, 'Nohelia Isabel González Toledo', 'nohelia@gmail.com', NULL, 'Activo', 'Employee', 'Update', 'Thu, Oct 5, 2023 12:15 AM', NULL, NULL),
	(19, 'Kenneth Gonzalez Toledo', 'kennethandoni14@gmail.com', NULL, 'Activo', 'Admin', 'Update', 'Thu, Oct 5, 2023 12:18 AM', NULL, NULL),
	(20, 'Kenneth Gonzalez Toledo', 'kennethandoni14@gmail.com', NULL, 'Activo', 'Admin', 'Update', 'Thu, Oct 5, 2023 12:20 AM', NULL, NULL),
	(22, 'Kenneth Gonzalez Toledo', 'kennethandoni14@gmail.com', NULL, 'Activo', 'Admin', 'Update', 'Thu, Oct 5, 2023 12:33 AM', NULL, NULL),
	(23, 'Kenneth Gonzalez Toledo', 'kennethandoni14@gmail.com', NULL, 'Activo', 'Admin', 'Update', 'Thu, Oct 5, 2023 12:38 AM', NULL, NULL),
	(24, NULL, 'kennethandoni14@gmail.com', NULL, NULL, NULL, 'Update', 'Thu, Oct 5, 2023 1:05 AM', NULL, NULL),
	(25, NULL, 'kennethandoni14@gmail.com', NULL, NULL, NULL, 'Update', 'Wed, Oct 11, 2023 8:07 PM', NULL, NULL),
	(27, 'Kenneth Gonzalez Toledo', 'kennethandoni14@gmail.com', NULL, 'Activo', 'Super Admin', 'Update', 'Sun, Oct 15, 2023 7:15 PM', NULL, NULL),
	(28, 'Kenneth Gonzalez Toledo', 'kennethandoni14@gmail.com', NULL, 'Activo', 'Super Admin', 'Update', 'Sun, Oct 15, 2023 7:16 PM', NULL, NULL),
	(29, 'Kenneth Gonzalez Toledo', 'kennethandoni14@gmail.com', NULL, 'Activo', 'Super Admin', 'Update', 'Sun, Oct 15, 2023 7:16 PM', NULL, NULL),
	(30, 'Kenneth Andoni González Toledoaa', 'kennethandoni14@gmail.com', NULL, 'Activo', 'Super Admin', 'Update', 'Mon, Oct 16, 2023 1:24 AM', NULL, NULL),
	(31, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', NULL, 'Activo', 'Super Admin', 'Update', 'Mon, Oct 16, 2023 1:24 AM', NULL, NULL),
	(33, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', NULL, 'Activo', 'Super Admin', 'Update', 'Tue, Oct 17, 2023 3:00 PM', NULL, NULL),
	(34, 'Kenneth Andoni González Toledoa', 'kennethandoni14@gmail.com', NULL, 'Activo', 'Super Admin', 'Update', 'Tue, Oct 17, 2023 3:01 PM', NULL, NULL),
	(35, NULL, 'kennethandoni14@gmail.com', NULL, NULL, NULL, 'Delete', 'Tue, Oct 17, 2023 11:55 PM', NULL, NULL),
	(38, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', NULL, 'Activo', 'Super Admin', 'Update', 'Thu, Oct 19, 2023 4:52 AM', NULL, NULL),
	(41, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', '55123614', 'Activo', 'Super Admin', 'Delete', 'Thu, Oct 19, 2023 5:01 AM', NULL, NULL),
	(42, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', '55123614', 'Activo', 'Super Admin', 'Delete', 'Thu, Oct 19, 2023 5:03 AM', NULL, NULL),
	(44, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', '55123614', 'Activo', 'Super Admin', 'Delete', 'Thu, Oct 19, 2023 5:05 AM', NULL, NULL),
	(45, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', '55123614', 'Activo', 'Super Admin', 'Delete', 'Thu, Oct 19, 2023 5:05 AM', NULL, NULL),
	(46, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', '55123614', 'Activo', 'Super Admin', 'Delete', 'Thu, Oct 19, 2023 5:05 AM', NULL, NULL),
	(47, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', '55123614', 'Activo', 'Super Admin', 'Delete', 'Thu, Oct 19, 2023 5:06 AM', NULL, NULL),
	(48, NULL, 'kennethandoni14@gmail.com', NULL, NULL, NULL, 'Update', 'Thu, Oct 19, 2023 5:34 AM', NULL, NULL),
	(49, NULL, 'kennethandoni14@gmail.com', NULL, NULL, NULL, 'Update', 'Thu, Oct 19, 2023 5:34 AM', NULL, NULL),
	(50, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', '55123614', 'Activo', 'Super Admin', 'Delete', 'Thu, Oct 19, 2023 5:35 AM', NULL, NULL),
	(51, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', '55123614', 'Activo', 'Super Admin', 'Delete', 'Thu, Oct 19, 2023 5:39 AM', NULL, NULL),
	(52, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', '55123614', 'Activo', 'Super Admin', 'Delete', 'Thu, Oct 19, 2023 5:39 AM', NULL, NULL);

-- Volcando estructura para tabla umgproyecto.user_types
CREATE TABLE IF NOT EXISTS `user_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyecto.user_types: ~3 rows (aproximadamente)
INSERT INTO `user_types` (`id`, `type_name`, `created_at`, `updated_at`) VALUES
	(1, 'Active', NULL, NULL),
	(2, 'Inactive', NULL, NULL),
	(3, 'Disable', NULL, NULL);

-- Volcando estructura para disparador umgproyecto.id_empresa
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `id_empresa` BEFORE INSERT ON `empresas` FOR EACH ROW BEGIN
                INSERT INTO sequence_empresa VALUES (NULL);
                SET NEW.sku_empresa = CONCAT("EMP", LPAD(LAST_INSERT_ID(), 5, "0"));
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador umgproyecto.id_estimate
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `id_estimate` BEFORE INSERT ON `estimates` FOR EACH ROW BEGIN
                INSERT INTO sequence_estimates VALUES (NULL);
                SET NEW.estimate_number = CONCAT("EST_", LPAD(LAST_INSERT_ID(), 5, "0"));
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador umgproyecto.id_store
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `id_store` BEFORE INSERT ON `users` FOR EACH ROW BEGIN
                INSERT INTO sequence_tbls VALUES (NULL);
                SET NEW.user_id = CONCAT("KH_", LPAD(LAST_INSERT_ID(), 5, "0"));
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
