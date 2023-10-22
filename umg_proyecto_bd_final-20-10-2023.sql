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


-- Volcando estructura de base de datos para umgproyectofinal
CREATE DATABASE IF NOT EXISTS `umgproyectofinal` /*!40100 DEFAULT CHARACTER SET utf32 COLLATE utf32_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `umgproyectofinal`;

-- Volcando estructura para tabla umgproyectofinal.bitacora
CREATE TABLE IF NOT EXISTS `bitacora` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyectofinal.bitacora: ~0 rows (aproximadamente)

-- Volcando estructura para tabla umgproyectofinal.descuentos
CREATE TABLE IF NOT EXISTS `descuentos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `sku_empresa` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla umgproyectofinal.descuentos: ~4 rows (aproximadamente)
INSERT INTO `descuentos` (`id`, `descripcion`, `sku_empresa`, `created_at`, `updated_at`) VALUES
	(1, 'IGSS (4.83%)', 'EMP00004', '2023-10-12 03:30:35', '2023-10-11'),
	(2, 'IRTRA(1%)', 'EMP00004', '2023-10-12 03:59:03', '2023-10-11'),
	(3, 'IGSS (4.83%)', 'EMP00002', '2023-10-12 04:00:31', '2023-10-11'),
	(4, 'IRTRA(1%)', 'EMP00002', '2023-10-12 04:01:39', '2023-10-11');

-- Volcando estructura para tabla umgproyectofinal.descuento_empleados
CREATE TABLE IF NOT EXISTS `descuento_empleados` (
  `id` int NOT NULL AUTO_INCREMENT,
  `empleados_id` int NOT NULL,
  `descuentos_id` int NOT NULL,
  `sku_empresa` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  `porcentaje` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Índice 2` (`descuentos_id`),
  KEY `Índice 3` (`empleados_id`),
  CONSTRAINT `FK_descuento_empleados_descuentos` FOREIGN KEY (`descuentos_id`) REFERENCES `descuentos` (`id`),
  CONSTRAINT `FK_descuento_empleados_empleados` FOREIGN KEY (`empleados_id`) REFERENCES `empleados` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla umgproyectofinal.descuento_empleados: ~6 rows (aproximadamente)
INSERT INTO `descuento_empleados` (`id`, `empleados_id`, `descuentos_id`, `sku_empresa`, `fecha_creacion`, `porcentaje`, `created_at`, `updated_at`) VALUES
	(1, 26, 1, 'EMP00004', '2023-10-19 07:35:17', 4.83, '2023-10-19 07:35:23', '2023-10-19 07:35:24'),
	(2, 26, 2, 'EMP00004', '2023-10-19 07:35:40', 1.00, '2023-10-19 07:35:44', '2023-10-19 07:35:45'),
	(3, 27, 1, 'EMP00004', '2023-10-19 20:57:05', 4.83, '2023-10-19 20:57:16', '2023-10-19 20:57:17'),
	(4, 27, 2, 'EMP00004', '2023-10-19 20:57:32', 1.00, '2023-10-19 20:57:40', '2023-10-20 04:14:38'),
	(5, 28, 1, 'EMP00004', '2023-10-20 04:13:40', 4.83, '2023-10-20 04:14:01', '2023-10-20 04:14:08'),
	(6, 28, 2, 'EMP00004', '2023-10-20 04:14:14', 1.00, '2023-10-20 04:14:35', '2023-10-20 04:14:36');

-- Volcando estructura para tabla umgproyectofinal.detalle_nominas
CREATE TABLE IF NOT EXISTS `detalle_nominas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `encabezado_nominas_id` int DEFAULT NULL,
  `empleado_id` int DEFAULT NULL,
  `sku_empresa` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `total_descuento` decimal(10,2) DEFAULT NULL,
  `dias_laborado` int DEFAULT NULL,
  `bonificacion_ley` decimal(10,2) DEFAULT NULL,
  `total_hrs_extras` decimal(10,2) DEFAULT NULL,
  `sueldo_liquido` decimal(10,2) DEFAULT NULL,
  `salario` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `estado` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT 'PENDIENTE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `encabezado_nominas_id` (`encabezado_nominas_id`),
  KEY `Índice 3` (`empleado_id`),
  CONSTRAINT `FK_detalle_nominas_empleados` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`),
  CONSTRAINT `FK_detalle_nominas_encabezado_nominas` FOREIGN KEY (`encabezado_nominas_id`) REFERENCES `encabezado_nominas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla umgproyectofinal.detalle_nominas: ~2 rows (aproximadamente)
INSERT INTO `detalle_nominas` (`id`, `encabezado_nominas_id`, `empleado_id`, `sku_empresa`, `total_descuento`, `dias_laborado`, `bonificacion_ley`, `total_hrs_extras`, `sueldo_liquido`, `salario`, `estado`, `created_at`, `updated_at`) VALUES
	(5, 3, 26, 'EMP00004', 204.05, 30, 250.00, 375.00, 3920.95, '3500.00', 'PENDIENTE', '2023-10-20 04:22:01', '2023-10-20 04:22:01'),
	(6, 3, 28, 'EMP00004', 466.40, 30, 250.00, 50.00, 7833.60, '8000.00', 'PENDIENTE', '2023-10-20 04:22:01', '2023-10-20 04:22:01');

-- Volcando estructura para tabla umgproyectofinal.empleados
CREATE TABLE IF NOT EXISTS `empleados` (
  `id` int NOT NULL AUTO_INCREMENT,
  `empleado_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `sku_empresa` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_empleado` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cui_dpi` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genero` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_cuenta` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_cuenta` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departamento` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `puesto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` int DEFAULT NULL,
  `fecha_inicio_laboral` date DEFAULT NULL,
  `tipo_contrato` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_pago` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salario` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`,`empleado_id`) USING BTREE,
  KEY `Índice 2` (`user_id`),
  CONSTRAINT `FK_empleados_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyectofinal.empleados: ~3 rows (aproximadamente)
INSERT INTO `empleados` (`id`, `empleado_id`, `user_id`, `sku_empresa`, `nombre_empleado`, `email`, `cui_dpi`, `genero`, `no_cuenta`, `tipo_cuenta`, `departamento`, `puesto`, `direccion`, `celular`, `fecha_inicio_laboral`, `tipo_contrato`, `tipo_pago`, `salario`, `created_at`, `updated_at`) VALUES
	(26, 'KH_00007', 1, 'EMP00004', 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', '2498713431002', 'Masculino', '3242002120', 'MONETARIA', 'TELECOMUNICACIONES', 'DESARROLLADOR WEB', '2da. calle 9-15 zona 2 Colonia el Paraíso Mazatenango, Such.', 47460952, '1981-01-13', 'Temporal', 'Quincenal', 3500.00, '2023-10-19 03:57:01', '2023-10-19 03:57:01'),
	(27, 'KH_00014', 3, 'EMP00005', 'Lucrecia Martinez Torres', 'paulat@gmail.com', '2578964351001', 'Masculino', '3242002121', 'AHORRO', 'FINANCIERO', 'DESARROLLADOR WEB', 'Officia velit offic', 55123614, '1985-07-26', 'Indefenido', 'Mensual', 3000.00, '2023-10-19 06:57:38', '2023-10-19 06:57:38'),
	(28, 'KH_00029', 14, 'EMP00004', 'Pablo González Arana', 'hevucucyxu@mailinator.com', '2497457891001', 'Masculino', '324578963', 'MONETARIA', 'FINANCIERO', 'Manager', 'Colonia Villa Linda, Mazatenango Suchitepéquez', 55693214, '2023-10-15', 'Indefenido', 'Mensual', 8000.00, '2023-10-20 04:09:48', '2023-10-20 04:09:48');

-- Volcando estructura para tabla umgproyectofinal.empresas
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

-- Volcando datos para la tabla umgproyectofinal.empresas: ~4 rows (aproximadamente)
INSERT INTO `empresas` (`id`, `sku_empresa`, `nombre`, `contacto_persona`, `email`, `direccion`, `telefono`, `movil`, `fecha_registro`, `logo`, `sitio_web`, `estado`, `created_at`, `updated_at`) VALUES
	(2, 'EMP00002', 'CLAROssskk', 'Kenneth Gonzalez Toledo', 'kennethandoni_9@hotmail.com', '2da. calle 1-15 colonia la independencia Mazatenango, Suchitepéquez.', 25678765, 55602435, NULL, '1079217460.jpg', 'https://www.facebook.com/', 'ACTIVO', '2023-09-28 04:56:54', '2023-10-20 03:39:19'),
	(4, 'EMP00004', 'GIGACOMAA', 'ANTONIO', 'info@gmail.com', 'Ciudad de Mazatenango', 24997541, 55345895, NULL, '1695893690.png', 'https://www.muniguate.com/', 'ACTIVO', '2023-09-28 09:34:50', '2023-10-20 03:36:29'),
	(7, 'EMP00007', 'Ea blanditiis et con', 'Minima quia sapiente', 'hupymonig@mailinator.com', 'Soluta ullamco volup', 2, 55, NULL, '1697715030.jpg', 'Dolor sapiente moles', 'ACTIVO', '2023-10-19 05:30:30', '2023-10-19 05:30:30'),
	(8, 'EMP00008', 'Aut ex ut culpa ad m', 'Maxime atque tempori', 'vometem@mailinator.com', 'Et quia numquam ipsa', 43, 79, NULL, '1697715252.jpg', 'Perferendis vero ut', 'ACTIVO', '2023-10-19 05:34:12', '2023-10-19 05:34:12');

-- Volcando estructura para tabla umgproyectofinal.encabezado_nominas
CREATE TABLE IF NOT EXISTS `encabezado_nominas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tipo_planilla_id` int DEFAULT NULL,
  `periodo_inicial` date DEFAULT NULL,
  `periodo_final` date DEFAULT NULL,
  `mes` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `ano` year DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `sku_empresa` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `estado` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT 'APROBADO',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Índice 2` (`tipo_planilla_id`),
  CONSTRAINT `FK_encabezado_nomina_tipo_planillas` FOREIGN KEY (`tipo_planilla_id`) REFERENCES `tipo_planillas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla umgproyectofinal.encabezado_nominas: ~1 rows (aproximadamente)
INSERT INTO `encabezado_nominas` (`id`, `tipo_planilla_id`, `periodo_inicial`, `periodo_final`, `mes`, `ano`, `fecha_creacion`, `sku_empresa`, `estado`, `created_at`, `updated_at`) VALUES
	(3, 2, '2023-10-01', '2023-10-31', 'OCTUBRE', '2023', '2023-10-20 04:22:01', 'EMP00004', 'APROBADO', '2023-10-20 04:22:01', '2023-10-20 04:22:01');

-- Volcando estructura para tabla umgproyectofinal.familia_informacion
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

-- Volcando datos para la tabla umgproyectofinal.familia_informacion: ~3 rows (aproximadamente)
INSERT INTO `familia_informacion` (`id`, `user_id`, `primer_nombre`, `segundo_nombre`, `otros_nombres`, `primer_apellido`, `segundo_apellido`, `apellido_casada`, `parentesco`, `fecha_nacimiento`, `movil`, `contacto_emergencia`, `created_at`, `updated_at`) VALUES
	(1, 'KH_00007', 'Grisel', 'Valentina', NULL, 'González', 'Guzmán', NULL, 'Hijo(a)', '2021-03-12', NULL, 'NO', '2023-10-17 22:28:37', '2023-10-17 22:28:36'),
	(2, 'KH_00007', 'Pablo', 'Alejandro', NULL, 'González', 'Arana', NULL, 'Hijo(a)', '2008-04-30', 55789632, 'SI', '2023-10-17 22:28:32', '2023-10-17 22:28:33'),
	(3, 'KH_00007', 'Sandy', 'Arelys', NULL, 'Guzmán', 'Rodas', NULL, 'Esposo(a)', '1989-12-22', 55123614, 'SI', '2023-10-17 22:42:54', '2023-10-17 22:42:55');

-- Volcando estructura para tabla umgproyectofinal.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyectofinal.migrations: ~38 rows (aproximadamente)
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

-- Volcando estructura para tabla umgproyectofinal.nomina_asistencias
CREATE TABLE IF NOT EXISTS `nomina_asistencias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `empleado_id` int DEFAULT NULL,
  `sku_empresa` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `total_dias` int NOT NULL,
  `h_extras` int NOT NULL,
  `mes` int NOT NULL DEFAULT '0',
  `ano` year NOT NULL,
  `estado` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL DEFAULT 'PENDIENTE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Índice 2` (`empleado_id`),
  CONSTRAINT `FK_nomina_asistencias_empleados` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla umgproyectofinal.nomina_asistencias: ~3 rows (aproximadamente)
INSERT INTO `nomina_asistencias` (`id`, `empleado_id`, `sku_empresa`, `fecha_inicio`, `fecha_final`, `fecha_creacion`, `total_dias`, `h_extras`, `mes`, `ano`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 26, 'EMP00004', '2023-10-01', '2023-10-31', '2023-10-19 07:12:52', 30, 15, 10, '2023', 'PENDIENTE', '2023-10-19 07:13:49', '2023-10-19 07:14:53'),
	(2, 27, 'EMP00004', '2023-10-01', '2023-10-31', '2023-10-19 20:59:57', 30, 10, 10, '2023', 'PENDIENTE', '2023-10-20 04:12:58', '2023-10-20 04:12:57'),
	(3, 28, 'EMP00004', '2023-10-01', '2023-10-31', '2023-10-20 04:12:18', 30, 2, 10, '2023', 'PENDIENTE', '2023-10-20 04:12:55', '2023-10-20 04:12:56');

-- Volcando estructura para tabla umgproyectofinal.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyectofinal.password_resets: ~0 rows (aproximadamente)

-- Volcando estructura para tabla umgproyectofinal.perfil_informacion
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyectofinal.perfil_informacion: ~4 rows (aproximadamente)
INSERT INTO `perfil_informacion` (`id`, `nombre_completo`, `user_id`, `email`, `fecha_nacimiento`, `genero`, `direccion`, `estado`, `ciudad`, `codigo_postal`, `telefono_movil`, `departamento`, `puesto_designado`, `jefe_inmediato`, `created_at`, `updated_at`) VALUES
	(9, 'Kenneth Andoni González Toledo', 'KH_00007', 'kennethandoni14@gmail.com', '1987-11-14', 'Masculino', '2da.calle 9-15 zona 2 Colonia El paraíso, Mazatenango', 'ACTIVO', 'MAZATENANGO', 100001, 47460952, 'TECNOLOGÍA DE LA INFORMACIÓN Y COMUNICACIÓN', 'WebDesigner', 'Roberto Arzu Gomez', '2023-10-16 04:16:02', '2023-10-20 03:49:14'),
	(11, 'Lucrecia Martinez Torres', 'KH_00014', 'paulat@gmail.com', '1982-09-10', 'Masculino', 'Ciudad Viejas Guatemala', 'ACTIVO', 'ANTIGUA GUATEMALA', 100001, 55123614, 'DIRECCIÓN GENERAL', 'Manager', 'Roberto Arzu Gomez', '2023-10-16 04:52:43', '2023-10-16 07:24:00'),
	(12, 'MAuricia Batzin', 'KH_00016', 'mauricia@gmail.com', '1989-12-22', 'Femenino', 'Ciudad de Guatemala Calle el barranco Ciudad de Guatemaa', 'ACTIVO', 'MAZATENANGO', 100001, 55123614, 'TELECOMUNICACIONES', 'DESARROLLADOR WEB', 'Kenneth Andoni González Toledo', '2023-10-17 12:38:17', '2023-10-17 12:38:17'),
	(13, 'Pablo González Arana', 'KH_00029', 'hevucucyxu@mailinator.com', '1995-06-01', 'Masculino', '2da calle 9-15 zona 2', 'ACTIVO', 'MAZATENANGO', 100001, 55693214, 'FINANCIERO', 'Manager', 'Kenneth Andoni González Toledo', '2023-10-20 04:00:44', '2023-10-20 04:01:45');

-- Volcando estructura para tabla umgproyectofinal.permiso_empleados
CREATE TABLE IF NOT EXISTS `permiso_empleados` (
  `id` int NOT NULL AUTO_INCREMENT,
  `empleado_id` int NOT NULL,
  `sku_empresa` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `fecha_permiso` date NOT NULL,
  `motivo` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `fecha_desde` date NOT NULL,
  `fecha_hasta` date NOT NULL,
  `tipo_permiso` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `estado` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL DEFAULT 'PENDIENTE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Índice 2` (`empleado_id`),
  CONSTRAINT `FK_permiso_empleados_empleados` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla umgproyectofinal.permiso_empleados: ~1 rows (aproximadamente)
INSERT INTO `permiso_empleados` (`id`, `empleado_id`, `sku_empresa`, `fecha_permiso`, `motivo`, `fecha_desde`, `fecha_hasta`, `tipo_permiso`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 26, 'EMP00004', '2023-10-19', 'Vacaciones Anuales', '2023-10-20', '2023-11-02', 'VACACIONES', 'APROBADO', '2023-10-19 07:28:51', '2023-10-19 07:28:52');

-- Volcando estructura para tabla umgproyectofinal.personal_departamentos
CREATE TABLE IF NOT EXISTS `personal_departamentos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku_empresa` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyectofinal.personal_departamentos: ~10 rows (aproximadamente)
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

-- Volcando estructura para tabla umgproyectofinal.personal_informacion
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyectofinal.personal_informacion: ~4 rows (aproximadamente)
INSERT INTO `personal_informacion` (`id`, `user_id`, `cui_dpi`, `fecha_vec_dpi`, `no_licencia`, `fecha_vec_licencia`, `nit`, `tipo_licencia`, `movil`, `nacionalidad`, `religion`, `estado_civil`, `total_hijos`, `banco`, `no_cuenta`, `tipo_cuenta`, `img_frontal_dpi`, `img_adverso_dpi`, `pdf_penales`, `pdf_policiacos`, `pdf_cv`, `created_at`, `updated_at`) VALUES
	(11, 'KH_00007', '2498713431002', '2023-10-16', '2498713431001', '2023-10-16', '64754413', 'C', 54789632, 'GUATEMALTECA', 'CATOLICA', 'SOLTERO', 2, 'El Crédito Hipotecario Nacional de Guatemala', '3242002120', 'MONETARIA', '1697723711.jpg', '1697530504.jpg', '1697566805.pdf', '1697532863.pdf', '1697535185.pdf', '2023-10-16 13:09:51', '2023-10-19 07:55:30'),
	(12, 'KH_00014', '2578964351001', '2035-10-26', NULL, NULL, '58427236', 'NO APLICA', 47896321, 'GUATEMALTECA', 'EVANGELICA', 'SOLTERO', 2, 'El Crédito Hipotecario Nacional de Guatemala', '3242002121', 'AHORRO', NULL, NULL, NULL, NULL, NULL, '2023-10-17 10:04:43', '2023-10-17 10:14:05'),
	(13, 'KH_00016', '1921494741001', '2027-12-22', NULL, NULL, '58427236', 'NO APLICA', 55123614, 'GUATEMALTECA', 'OTRAS', 'SOLTERO', 1, 'El Crédito Hipotecario Nacional de Guatemala', '5214700', 'AHORRO', NULL, NULL, NULL, NULL, NULL, '2023-10-17 12:39:26', '2023-10-17 12:39:26'),
	(14, 'KH_00029', '2497457891001', '2027-06-08', '2497457891001', '2023-10-25', '44587893', 'C', 54783047, 'GUATEMALTECA', 'CATOLICA', 'SOLTERO', 0, 'Banco Inmobiliario, S.A.', '324578963', 'MONETARIA', '1697796252.jpg', '1697796268.jpg', '1697796318.pdf', '1697796295.pdf', '1697796340.pdf', '2023-10-20 04:03:32', '2023-10-20 04:05:40');

-- Volcando estructura para tabla umgproyectofinal.puestos
CREATE TABLE IF NOT EXISTS `puestos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku_empresa` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyectofinal.puestos: ~9 rows (aproximadamente)
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

-- Volcando estructura para tabla umgproyectofinal.rol_usuarios
CREATE TABLE IF NOT EXISTS `rol_usuarios` (
  `id` bigint unsigned NOT NULL DEFAULT '0',
  `nombre_rol` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku_empresa` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyectofinal.rol_usuarios: ~6 rows (aproximadamente)
INSERT INTO `rol_usuarios` (`id`, `nombre_rol`, `sku_empresa`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'EMP00004', '2023-10-12 06:34:07', '2023-10-12 07:01:39'),
	(2, 'Super Admin', 'EMP00004', '2023-10-12 06:34:08', '2023-10-12 07:01:40'),
	(3, 'Usuario Normal', 'EMP00004', '2023-10-12 06:34:08', '2023-10-12 07:01:41'),
	(4, 'Cliente', 'EMP00002', '2023-10-12 06:34:09', '2023-10-12 07:01:41'),
	(5, 'Empleado', 'EMP00004', '2023-10-12 06:34:09', '2023-10-13 06:08:44'),
	(9, 'Empleado', 'EMP00002', '2023-10-12 07:32:00', '2023-10-12 07:33:37');

-- Volcando estructura para tabla umgproyectofinal.sequence_empresa
CREATE TABLE IF NOT EXISTS `sequence_empresa` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla umgproyectofinal.sequence_empresa: ~8 rows (aproximadamente)
INSERT INTO `sequence_empresa` (`id`) VALUES
	(1),
	(2),
	(3),
	(4),
	(5),
	(6),
	(7),
	(8);

-- Volcando estructura para tabla umgproyectofinal.sequence_estimates
CREATE TABLE IF NOT EXISTS `sequence_estimates` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyectofinal.sequence_estimates: ~2 rows (aproximadamente)
INSERT INTO `sequence_estimates` (`id`) VALUES
	(1),
	(2);

-- Volcando estructura para tabla umgproyectofinal.sequence_tbls
CREATE TABLE IF NOT EXISTS `sequence_tbls` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyectofinal.sequence_tbls: ~18 rows (aproximadamente)
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
	(27),
	(28),
	(29);

-- Volcando estructura para tabla umgproyectofinal.tipo_planillas
CREATE TABLE IF NOT EXISTS `tipo_planillas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `sku_empresa` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla umgproyectofinal.tipo_planillas: ~4 rows (aproximadamente)
INSERT INTO `tipo_planillas` (`id`, `nombre`, `sku_empresa`, `created_at`, `updated_at`) VALUES
	(1, 'QUINCENAL', 'EMP00004', '2023-10-15 17:54:41', '2023-10-15 22:22:50'),
	(2, 'MENSUAL', 'EMP00004', '2023-10-15 17:57:11', '2023-10-15 22:23:00'),
	(4, 'QUINCENAL', 'EMP00002', '2023-10-15 22:31:29', '2023-10-15 22:31:29'),
	(5, 'MENSUAL', 'EMP00002', '2023-10-15 22:31:42', '2023-10-15 22:31:42');

-- Volcando estructura para tabla umgproyectofinal.users
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyectofinal.users: ~4 rows (aproximadamente)
INSERT INTO `users` (`id`, `user_id`, `empresa_id`, `nombre`, `puesto`, `departamento`, `fecha_ingreso`, `email`, `email_verified_at`, `nombre_rol`, `avatar`, `password`, `estado`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'KH_00007', 4, 'Kenneth Andoni González Toledo', 'Web Designer', 'DIRECCIÓN GENERAL', 'Tue, Sep 26, 2023 10:48 PM', 'kennethandoni14@gmail.com', '2023-10-05 01:48:50', 'Super Admin', '1502222602.jpg', '$2y$10$NNer4F3HX3RcfsGmaVtn8O71j6UftAzYUBN/PHVx4/GxZUYdaaGCy', '1', 'qeqw', '2023-09-27 04:48:15', '2023-10-16 07:26:47'),
	(3, 'KH_00014', 4, 'Lucrecia Martinez Torres', 'CEO', 'MARKETING', 'Wed, Oct 4, 2023 5:58 PM', 'paulat@gmail.com', NULL, 'Admin', '488333515.jpg', '$2y$10$NNer4F3HX3RcfsGmaVtn8O71j6UftAzYUBN/PHVx4/GxZUYdaaGCy', '1', 'adsasd', '2023-10-04 23:58:58', '2023-10-16 07:24:55'),
	(13, 'KH_00028', 4, 'PABLO GONZALEZ', 'DESARROLLADOR WEB', 'CONTROL DE GESTIÓN', 'Fri, Oct 20, 2023 3:35 AM', 'puvyv@mailinator.com', NULL, 'Empleado', '679479617.jpg', '$2y$10$D0ovs4srWd6NsfvhWYo5SO/QoXmj8MIIAe1HdWZx43xA0rZB98yJq', '1', NULL, '2023-10-20 03:35:10', '2023-10-20 03:35:10'),
	(14, 'KH_00029', 4, 'Pablo González Arana', 'DESARROLLADOR ANDROID', 'TELECOMUNICACIONES', 'Fri, Oct 20, 2023 3:40 AM', 'hevucucyxu@mailinator.com', NULL, 'Empleado', '2025862711.jpg', '$2y$10$xnp3Xs.orVZLHA6hQP8jveRwZ0.jJE9QfF3uTymYhvNC2pqwxH4hi', '0', NULL, '2023-10-20 03:40:06', '2023-10-20 04:07:10');

-- Volcando estructura para tabla umgproyectofinal.user_activity_logs
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
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla umgproyectofinal.user_activity_logs: ~1 rows (aproximadamente)
INSERT INTO `user_activity_logs` (`id`, `user_name`, `email`, `phone_number`, `status`, `role_name`, `modify_user`, `date_time`, `created_at`, `updated_at`) VALUES
	(59, 'Kenneth Andoni González Toledo', 'kennethandoni14@gmail.com', NULL, 'Activo', 'Super Admin', 'Update', 'Fri, Oct 20, 2023 4:07 AM', NULL, NULL);

-- Volcando estructura para disparador umgproyectofinal.id_empresa
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `id_empresa` BEFORE INSERT ON `empresas` FOR EACH ROW BEGIN
                INSERT INTO sequence_empresa VALUES (NULL);
                SET NEW.sku_empresa = CONCAT("EMP", LPAD(LAST_INSERT_ID(), 5, "0"));
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador umgproyectofinal.id_store
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
