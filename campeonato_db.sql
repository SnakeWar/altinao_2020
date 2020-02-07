-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Fev-2020 às 13:28
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `campeonato_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `games`
--

CREATE TABLE `games` (
  `id` int(10) UNSIGNED NOT NULL,
  `data` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `placar_casa` int(11) NOT NULL,
  `placar_visitante` int(11) NOT NULL,
  `teams_casa` int(10) UNSIGNED NOT NULL,
  `teams_visitante` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `games`
--

INSERT INTO `games` (`id`, `data`, `placar_casa`, `placar_visitante`, `teams_casa`, `teams_visitante`, `created_at`, `updated_at`) VALUES
(1, '15/02/2020', 3, 1, 1, 2, '2020-02-07 14:21:25', '2020-02-07 14:21:25'),
(2, '19/02/2020', 1, 0, 2, 3, '2020-02-07 14:21:54', '2020-02-07 14:21:54'),
(3, '22/02/2020', 0, 2, 3, 1, '2020-02-07 14:22:21', '2020-02-07 14:22:21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `infogoals`
--

CREATE TABLE `infogoals` (
  `id` int(10) UNSIGNED NOT NULL,
  `players_id` int(10) UNSIGNED NOT NULL,
  `games_id` int(10) UNSIGNED NOT NULL,
  `quantidade` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `infogoals`
--

INSERT INTO `infogoals` (`id`, `players_id`, `games_id`, `quantidade`, `created_at`, `updated_at`) VALUES
(1, 11, 1, 1, '2020-02-07 14:22:41', '2020-02-07 14:22:41'),
(2, 11, 1, 1, '2020-02-07 14:35:11', '2020-02-07 14:35:11'),
(3, 11, 1, 1, '2020-02-07 14:42:36', '2020-02-07 14:42:36'),
(4, 16, 1, 1, '2020-02-07 14:43:42', '2020-02-07 14:43:42'),
(5, 29, 2, 1, '2020-02-07 14:43:56', '2020-02-07 14:43:56'),
(6, 10, 3, 1, '2020-02-07 14:44:11', '2020-02-07 14:44:11'),
(7, 10, 3, 1, '2020-02-07 14:44:26', '2020-02-07 14:44:26'),
(8, 20, 2, 1, '2020-02-07 14:48:12', '2020-02-07 14:48:12'),
(9, 20, 2, 1, '2020-02-07 14:49:29', '2020-02-07 14:49:29'),
(10, 20, 2, 1, '2020-02-07 14:52:07', '2020-02-07 14:52:07'),
(11, 20, 2, 1, '2020-02-07 14:52:20', '2020-02-07 14:52:20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2018_05_31_004400_create_time_table', 1),
(9, '2018_05_31_004425_create_jogador_table', 1),
(10, '2018_05_31_004440_create_jogo_table', 1),
(11, '2018_05_31_004455_create_infogol_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `players`
--

CREATE TABLE `players` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cartao` int(1) DEFAULT 0,
  `teams_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `players`
--

INSERT INTO `players` (`id`, `nome`, `cartao`, `teams_id`, `created_at`, `updated_at`) VALUES
(1, 'Diego Alves', NULL, 1, '2020-02-07 14:07:24', '2020-02-07 14:07:24'),
(2, 'Rafinha', NULL, 1, '2020-02-07 14:07:38', '2020-02-07 14:07:38'),
(3, 'Rodrigo Caio', NULL, 1, '2020-02-07 14:07:51', '2020-02-07 14:07:51'),
(4, 'Léo Pereira', NULL, 1, '2020-02-07 14:08:03', '2020-02-07 14:08:03'),
(5, 'Filipe Luís', NULL, 1, '2020-02-07 14:08:14', '2020-02-07 14:08:14'),
(6, 'Willian Arão', NULL, 1, '2020-02-07 14:08:32', '2020-02-07 14:08:32'),
(7, 'Gerson', NULL, 1, '2020-02-07 14:08:40', '2020-02-07 14:08:40'),
(8, 'Everton Ribeiro', NULL, 1, '2020-02-07 14:08:57', '2020-02-07 14:08:57'),
(9, 'Arrascaeta', NULL, 1, '2020-02-07 14:09:34', '2020-02-07 14:09:34'),
(10, 'Bruno Henrique', NULL, 1, '2020-02-07 14:09:55', '2020-02-07 14:09:55'),
(11, 'Gabriel Barbosa', NULL, 1, '2020-02-07 14:10:07', '2020-02-07 14:10:07'),
(12, 'Fernando Miguel', NULL, 2, '2020-02-07 14:14:18', '2020-02-07 14:14:18'),
(13, 'Ramón', NULL, 2, '2020-02-07 14:14:40', '2020-02-07 14:14:40'),
(14, 'Leandro Castan', NULL, 2, '2020-02-07 14:14:59', '2020-02-07 14:14:59'),
(15, 'Rodrigo Coutinho', NULL, 2, '2020-02-07 14:15:21', '2020-02-07 14:15:21'),
(16, 'Pikachu', NULL, 2, '2020-02-07 14:15:38', '2020-02-07 14:15:38'),
(17, 'Robinho', NULL, 2, '2020-02-07 14:15:54', '2020-02-07 14:15:54'),
(18, 'Raúl', NULL, 2, '2020-02-07 14:16:11', '2020-02-07 14:16:11'),
(19, 'Bruno Gomes', NULL, 2, '2020-02-07 14:16:39', '2020-02-07 14:16:39'),
(20, 'Ribamar', NULL, 2, '2020-02-07 14:16:54', '2020-02-07 14:16:54'),
(21, 'Marrony da Silva', NULL, 2, '2020-02-07 14:17:07', '2020-02-07 14:17:07'),
(22, 'Talles Magno', NULL, 2, '2020-02-07 14:17:21', '2020-02-07 14:17:21'),
(23, 'Gatito Fernandez', NULL, 3, '2020-02-07 14:17:52', '2020-02-07 14:17:52'),
(24, 'Joel Carli', NULL, 3, '2020-02-07 14:18:06', '2020-02-07 14:18:06'),
(25, 'Ruan', NULL, 3, '2020-02-07 14:18:21', '2020-02-07 14:18:21'),
(26, 'Guilherme Santos', NULL, 3, '2020-02-07 14:18:32', '2020-02-07 14:18:32'),
(27, 'Danilo', NULL, 3, '2020-02-07 14:18:46', '2020-02-07 14:18:46'),
(28, 'Cícero', NULL, 3, '2020-02-07 14:19:01', '2020-02-07 14:19:01'),
(29, 'Honda', NULL, 3, '2020-02-07 14:19:10', '2020-02-07 14:19:10'),
(30, 'Alex Santana', NULL, 3, '2020-02-07 14:19:26', '2020-02-07 14:19:26'),
(31, 'Marcos Vinícius', NULL, 3, '2020-02-07 14:19:45', '2020-02-07 14:19:45'),
(32, 'Tiaguinho', NULL, 3, '2020-02-07 14:20:14', '2020-02-07 14:20:14'),
(33, 'Lucas Campos', NULL, 3, '2020-02-07 14:20:31', '2020-02-07 14:20:31');

-- --------------------------------------------------------

--
-- Estrutura da tabela `teams`
--

CREATE TABLE `teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vitorias` int(11) NOT NULL DEFAULT 0,
  `gols_pro` int(11) NOT NULL DEFAULT 0,
  `gols_con` int(11) NOT NULL DEFAULT 0,
  `saldo` int(11) NOT NULL DEFAULT 0,
  `pontos` int(11) NOT NULL DEFAULT 0,
  `logo` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `sigla` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `teams`
--

INSERT INTO `teams` (`id`, `nome`, `vitorias`, `gols_pro`, `gols_con`, `saldo`, `pontos`, `logo`, `sigla`, `created_at`, `updated_at`) VALUES
(1, 'Flamengo', 2, 5, 1, 4, 6, '172.17.192.161:8000/images/flamengologo.png', 'CRF', '2020-02-07 13:49:43', '2020-02-07 15:19:04'),
(2, 'Vasco', 1, 2, 3, -1, 3, '172.17.192.161:8000/images/vascologo.png', 'VAS', '2020-02-07 13:56:48', '2020-02-07 15:19:10'),
(3, 'Botofogo', 0, 0, 3, -3, 0, '172.17.192.161:8000/images/botafogologo.png', 'BOT', '2020-02-07 13:57:23', '2020-02-07 15:19:17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'MAYRCON MARLON RODRIGUES CAMPOS', 'mayrcon_marlon@hotmail.com', '$2y$10$/rOzUD1xJ7juE88irt1yrehfuG6tffBUC22xN4ZMtSaR5IIVr8s6K', NULL, '2020-02-06 20:31:00', '2020-02-06 20:31:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `games_teams_casa_foreign` (`teams_casa`),
  ADD KEY `games_teams_visitante_foreign` (`teams_visitante`);

--
-- Índices para tabela `infogoals`
--
ALTER TABLE `infogoals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `infogoals_players_id_foreign` (`players_id`),
  ADD KEY `infogoals_games_id_foreign` (`games_id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Índices para tabela `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Índices para tabela `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Índices para tabela `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `players_teams_id_foreign` (`teams_id`);

--
-- Índices para tabela `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `games`
--
ALTER TABLE `games`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `infogoals`
--
ALTER TABLE `infogoals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `players`
--
ALTER TABLE `players`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_teams_casa_foreign` FOREIGN KEY (`teams_casa`) REFERENCES `teams` (`id`),
  ADD CONSTRAINT `games_teams_visitante_foreign` FOREIGN KEY (`teams_visitante`) REFERENCES `teams` (`id`);

--
-- Limitadores para a tabela `infogoals`
--
ALTER TABLE `infogoals`
  ADD CONSTRAINT `infogoals_games_id_foreign` FOREIGN KEY (`games_id`) REFERENCES `games` (`id`),
  ADD CONSTRAINT `infogoals_players_id_foreign` FOREIGN KEY (`players_id`) REFERENCES `players` (`id`);

--
-- Limitadores para a tabela `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_teams_id_foreign` FOREIGN KEY (`teams_id`) REFERENCES `teams` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
