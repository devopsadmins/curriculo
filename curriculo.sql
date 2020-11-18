-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.13-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para curriculo
CREATE DATABASE IF NOT EXISTS `curriculo` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `curriculo`;

-- Copiando estrutura para tabela curriculo.areainteresse
CREATE TABLE IF NOT EXISTS `areainteresse` (
  `idareainteresse` int(11) NOT NULL AUTO_INCREMENT,
  `areainteressenome` varchar(255) DEFAULT NULL,
  `ativo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idareainteresse`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela curriculo.areainteresse: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `areainteresse` DISABLE KEYS */;
INSERT INTO `areainteresse` (`idareainteresse`, `areainteressenome`, `ativo`) VALUES
	(1, 'Adm - Gerenalista', 1),
	(2, 'Adm - Financeiro', 1),
	(3, 'Adm - Contábil', 1),
	(4, 'Adm - Auxiliar Administrativo', 1),
	(5, 'Compras', 1),
	(7, 'Produção', 1),
	(8, 'Limpeza', 1),
	(9, 'Controle de Acesso', 1),
	(10, 'Outra', 1);
/*!40000 ALTER TABLE `areainteresse` ENABLE KEYS */;

-- Copiando estrutura para tabela curriculo.cidade
CREATE TABLE IF NOT EXISTS `cidade` (
  `idcidade` int(11) NOT NULL AUTO_INCREMENT,
  `cidadenome` varchar(255) DEFAULT NULL,
  `ativo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcidade`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela curriculo.cidade: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `cidade` DISABLE KEYS */;
INSERT INTO `cidade` (`idcidade`, `cidadenome`, `ativo`) VALUES
	(1, 'Poços de Caldas', 1),
	(2, 'Andradas', 1),
	(3, 'Caldas', 1),
	(4, 'São João da Boa Vista', 1),
	(5, 'Outro', 1);
/*!40000 ALTER TABLE `cidade` ENABLE KEYS */;

-- Copiando estrutura para tabela curriculo.curriculos
CREATE TABLE IF NOT EXISTS `curriculos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `cidade_id` int(11) DEFAULT NULL,
  `cidade_nome` varchar(255) DEFAULT NULL,
  `idade` varchar(45) DEFAULT NULL,
  `areainteresse_id` int(11) DEFAULT NULL,
  `areinteresse_nome` varchar(255) DEFAULT NULL,
  `experiencia` varchar(255) DEFAULT NULL,
  `escolaridade_id` int(11) DEFAULT NULL,
  `idioma_id` int(11) DEFAULT NULL,
  `idioma_nome` varchar(255) DEFAULT NULL,
  `nivel_id` int(11) DEFAULT NULL,
  `curriculo` varchar(255) DEFAULT NULL,
  `users` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users` (`users`),
  CONSTRAINT `users` FOREIGN KEY (`users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela curriculo.curriculos: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `curriculos` DISABLE KEYS */;
INSERT INTO `curriculos` (`id`, `nome`, `email`, `telefone`, `image`, `cidade_id`, `cidade_nome`, `idade`, `areainteresse_id`, `areinteresse_nome`, `experiencia`, `escolaridade_id`, `idioma_id`, `idioma_nome`, `nivel_id`, `curriculo`, `users`) VALUES
	(14, 'Lima', 'eolimabr@yahoo.com.br', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12);
/*!40000 ALTER TABLE `curriculos` ENABLE KEYS */;

-- Copiando estrutura para tabela curriculo.escolaridade
CREATE TABLE IF NOT EXISTS `escolaridade` (
  `idescolaridade` int(11) NOT NULL AUTO_INCREMENT,
  `escolaridadenome` varchar(255) DEFAULT NULL,
  `ativo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idescolaridade`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COMMENT='		';

-- Copiando dados para a tabela curriculo.escolaridade: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `escolaridade` DISABLE KEYS */;
INSERT INTO `escolaridade` (`idescolaridade`, `escolaridadenome`, `ativo`) VALUES
	(1, 'Fundamental Incompleto', 1),
	(2, 'Fundamental Completo', 1),
	(3, 'Médio Incompleto', 1),
	(4, 'Médio Completo', 1),
	(5, 'Superior Incompleto', 1),
	(6, 'Superior Completo', 1),
	(7, 'Pós-graduação', 1),
	(8, 'Mestrado', 1),
	(9, 'Doutorado', 1),
	(10, 'Pós-Doc', 1);
/*!40000 ALTER TABLE `escolaridade` ENABLE KEYS */;

-- Copiando estrutura para tabela curriculo.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela curriculo.failed_jobs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Copiando estrutura para tabela curriculo.idioma
CREATE TABLE IF NOT EXISTS `idioma` (
  `ididioma` int(11) NOT NULL AUTO_INCREMENT,
  `idiomanome` varchar(255) DEFAULT NULL,
  `ativo` int(11) DEFAULT NULL,
  PRIMARY KEY (`ididioma`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela curriculo.idioma: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `idioma` DISABLE KEYS */;
INSERT INTO `idioma` (`ididioma`, `idiomanome`, `ativo`) VALUES
	(1, 'Português', 1),
	(2, 'Inglês', 1),
	(3, 'Espanhol', 1),
	(4, 'Mandarin', 1),
	(5, 'Outro', 0);
/*!40000 ALTER TABLE `idioma` ENABLE KEYS */;

-- Copiando estrutura para tabela curriculo.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela curriculo.migrations: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
	(4, '2019_08_19_000000_create_failed_jobs_table', 1),
	(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(6, '2020_05_21_100000_create_teams_table', 1),
	(7, '2020_05_21_200000_create_team_user_table', 1),
	(8, '2020_10_16_012914_create_sessions_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Copiando estrutura para tabela curriculo.nivelidioma
CREATE TABLE IF NOT EXISTS `nivelidioma` (
  `idnivelidioma` int(11) NOT NULL AUTO_INCREMENT,
  `nivelidioma` varchar(45) DEFAULT NULL,
  `ativo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idnivelidioma`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela curriculo.nivelidioma: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `nivelidioma` DISABLE KEYS */;
INSERT INTO `nivelidioma` (`idnivelidioma`, `nivelidioma`, `ativo`) VALUES
	(1, 'Básico', 1),
	(2, 'Intermidiário', 1),
	(3, 'Avançado', 1),
	(4, 'Fluente', 1),
	(5, 'Proficiente', 1);
/*!40000 ALTER TABLE `nivelidioma` ENABLE KEYS */;

-- Copiando estrutura para tabela curriculo.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela curriculo.password_resets: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
	('eolimabr@gmail.com', '$2y$10$AuyvH9HrgebmAIF5IUPT6eoY5PZJsrtUkenV8vyLA4PhUIabJQp7G', '2020-11-16 23:04:12');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Copiando estrutura para tabela curriculo.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela curriculo.personal_access_tokens: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Copiando estrutura para tabela curriculo.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela curriculo.sessions: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('iaoO6cwH46XvkK7p9TsVdMSvErSzUJhARBqKw3sm', 12, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36 Edg/86.0.622.69', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiOWtFYUlvdE5ZUDZLUHJGcXlVSmJDWFk5bmpNWnhvb24wRUF1SEN4QiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEyO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkVGhBcWc3TlhEWG9qUmd5cy5nRGNiLmhBbU9qTkRBQUFxbG45dU8zYVlQaWVDaHJlL3hUOUciO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJFRoQXFnN05YRFhvalJneXMuZ0RjYi5oQW1Pak5EQUFBcWxuOXVPM2FZUGllQ2hyZS94VDlHIjt9', 1605652068);
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('UA7cr3izegiUZZQZt7HEVCz02Mh0PC49qmDola1b', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36 Edg/86.0.622.69', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiVHJlSkFobUo0RnByRzVzN29vcWxrR0Y3MXFOZmgyVWZ1aUk4T3g3OSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jdXJyaWN1bG8iO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo3O3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkZC5sS3VTQW8ycmhOcnBSaVZPVW9zdS8yZ3VKMWdjMUdBcUxUTklreWoyRVV6WkR1dy4wcGUiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJGQubEt1U0FvMnJoTnJwUmlWT1Vvc3UvMmd1SjFnYzFHQXFMVE5Ja3lqMkVVelpEdXcuMHBlIjt9', 1605648730);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;

-- Copiando estrutura para tabela curriculo.teams
CREATE TABLE IF NOT EXISTS `teams` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teams_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela curriculo.teams: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` (`id`, `user_id`, `name`, `personal_team`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Everton\'s Team', 1, '2020-10-16 01:33:52', '2020-10-16 01:33:52'),
	(2, 2, 'Lelis\'s Team', 1, '2020-10-17 00:30:46', '2020-10-17 00:30:46'),
	(3, 3, 'Lelis\'s Team', 1, '2020-10-21 23:51:29', '2020-10-21 23:51:29'),
	(4, 4, 'Everton\'s Team', 1, '2020-10-22 01:27:42', '2020-10-22 01:27:42'),
	(5, 5, 'teste-05\'s Team', 1, '2020-10-25 18:00:08', '2020-10-25 18:00:08'),
	(6, 6, 'Everton\'s Team', 1, '2020-10-27 13:57:20', '2020-10-27 13:57:20'),
	(7, 7, 'Everton\'s Team', 1, '2020-11-09 23:39:01', '2020-11-09 23:39:01');
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;

-- Copiando estrutura para tabela curriculo.team_user
CREATE TABLE IF NOT EXISTS `team_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `team_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela curriculo.team_user: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `team_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `team_user` ENABLE KEYS */;

-- Copiando estrutura para tabela curriculo.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) unsigned DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela curriculo.users: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
	(12, 'Lima', 'eolimabr@yahoo.com.br', NULL, '$2y$10$ThAqg7NXDXojRgys.gDcb.hAmOjNDAAAqln9uO3aYPieChre/xT9G', NULL, NULL, NULL, NULL, 'profile-photos/vaDUMQmNL3yuJUBw4x1MjK7BH1xeg7OaQU9RuxR3.png', '2020-11-17 19:10:14', '2020-11-17 19:22:57');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
