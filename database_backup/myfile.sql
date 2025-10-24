-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2025 at 01:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crmproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `code` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `admin_id`, `name`, `description`, `code`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 16, 'Human Resources', 'Human Resources Department', 'HR', 1, '2025-10-01 02:29:17', '2025-10-16 03:37:02'),
(2, 16, 'Information Technology', 'Information Technology Department', 'IT', 1, '2025-10-01 02:29:17', '2025-10-16 03:37:02'),
(3, 16, 'Finance', 'Finance and Accounting Department', 'FIN', 1, '2025-10-01 02:29:17', '2025-10-16 03:37:02'),
(4, 16, 'Marketing', 'Marketing and Sales Department', 'MKT', 1, '2025-10-01 02:29:17', '2025-10-16 03:37:02'),
(5, 16, 'Operations', 'Operations Department', 'OPS', 1, '2025-10-01 02:29:17', '2025-10-16 03:37:02'),
(6, 16, 'Support', 'Support Department', 'SUP', 1, '2025-10-01 02:29:17', '2025-10-16 03:37:02'),
(8, 36, 'operations department', 'everyday word,services,staff manageement', 'OD', 1, '2025-10-16 03:43:22', '2025-10-16 03:43:22'),
(9, 36, 'kitchen', 'kitchen work workers', 'KI', 1, '2025-10-16 04:00:44', '2025-10-16 04:00:44');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user',
  `supervisor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `module` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `user_type`, `supervisor_id`, `type`, `module`, `description`, `created_on`) VALUES
(1, 16, 'user', NULL, 'profile_update', 'Profile', 'Profile updated', '2025-10-23 04:40:43'),
(2, 63, 'user', NULL, 'profile_update', 'Profile', 'Profile updated', '2025-10-23 04:50:17'),
(3, 63, 'user', NULL, 'logout', 'Authentication', 'User logged out', '2025-10-23 04:50:35'),
(4, 16, 'user', NULL, 'logout', 'Authentication', 'User logged out', '2025-10-23 04:51:16'),
(6, NULL, 'supervisor', 7, 'profile_update', 'Profile', 'Profile updated', '2025-10-23 05:00:44'),
(7, NULL, 'supervisor', 7, 'profile_update', 'Profile', 'Profile updated', '2025-10-23 05:01:02'),
(8, 16, 'user', NULL, 'logout', 'Authentication', 'User logged out', '2025-10-23 05:02:20'),
(9, 16, 'user', NULL, 'logout', 'Authentication', 'User logged out', '2025-10-24 01:03:31'),
(10, 63, 'user', NULL, 'login', 'Authentication', 'User logged in', '2025-10-24 01:03:51'),
(11, 63, 'user', NULL, 'profile_update', 'Profile', 'Profile updated', '2025-10-24 01:13:45'),
(12, 63, 'user', NULL, 'logout', 'Authentication', 'User logged out', '2025-10-24 01:13:56'),
(13, 63, 'user', NULL, 'login', 'Authentication', 'User logged in', '2025-10-24 01:14:32'),
(14, 63, 'user', NULL, 'profile_update', 'Profile', 'Profile updated', '2025-10-24 01:21:14'),
(15, 63, 'user', NULL, 'logout', 'Authentication', 'User logged out', '2025-10-24 01:50:28'),
(16, 16, 'user', NULL, 'user_created', 'User Management', 'Created new User: jomu u', '2025-10-24 01:52:57'),
(17, 16, 'user', NULL, 'logout', 'Authentication', 'User logged out', '2025-10-24 01:53:38'),
(18, 64, 'user', NULL, 'login', 'Authentication', 'User logged in', '2025-10-24 01:53:52'),
(19, 64, 'user', NULL, 'logout', 'Authentication', 'User logged out', '2025-10-24 02:07:21'),
(20, 63, 'user', NULL, 'login', 'Authentication', 'User logged in', '2025-10-24 02:08:04'),
(21, 63, 'user', NULL, 'logout', 'Authentication', 'User logged out', '2025-10-24 02:08:23'),
(22, 16, 'user', NULL, 'logout', 'Authentication', 'User logged out', '2025-10-24 04:51:07'),
(23, 63, 'user', NULL, 'login', 'Authentication', 'User logged in', '2025-10-24 04:51:40'),
(24, 63, 'user', NULL, 'profile_update', 'Profile', 'Profile updated', '2025-10-24 04:52:03'),
(25, 63, 'user', NULL, 'logout', 'Authentication', 'User logged out', '2025-10-24 06:13:29'),
(26, 16, 'user', NULL, 'logout', 'Authentication', 'User logged out', '2025-10-24 06:13:52'),
(27, 63, 'user', NULL, 'login', 'Authentication', 'User logged in', '2025-10-24 06:14:11'),
(28, 63, 'user', NULL, 'profile_update', 'Profile', 'Profile updated', '2025-10-24 06:14:38'),
(29, 63, 'user', NULL, 'logout', 'Authentication', 'User logged out', '2025-10-24 06:14:45'),
(30, 63, 'user', NULL, 'login', 'Authentication', 'User logged in', '2025-10-24 06:15:10');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `icon` varchar(255) NOT NULL DEFAULT 'bx bx-grid-alt',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `description`, `icon`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'HRM', 'Human Resource Management', 'bx bx-group', 1, '2025-10-01 01:49:29', '2025-10-01 01:49:29'),
(2, 'FINANCE', 'Financial Management System', 'bx bx-money', 1, '2025-10-01 01:49:29', '2025-10-01 01:49:29'),
(3, 'SUPPORT', 'Customer Support Management', 'bx bx-support', 1, '2025-10-01 01:49:29', '2025-10-02 03:50:59'),
(4, 'Reports & Analytics', 'View reports and analytics dashboard', 'bx bx-bar-chart-alt-2', 1, '2025-10-01 01:49:29', '2025-10-01 01:49:29');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'Full system access', '2025-10-01 01:49:29', '2025-10-01 01:49:29'),
(2, 'Admin', 'User management and module assignment', '2025-10-01 01:49:29', '2025-10-01 01:49:29'),
(3, 'User', 'Access to assigned modules only', '2025-10-01 01:49:29', '2025-10-01 01:49:29'),
(4, 'Supervisor', 'Module supervisor with limited permissions', '2025-10-01 02:35:59', '2025-10-01 02:35:59');

-- --------------------------------------------------------

--
-- Table structure for table `salary_payments`
--

CREATE TABLE `salary_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` enum('pending','paid') NOT NULL DEFAULT 'pending',
  `paid_by` bigint(20) UNSIGNED DEFAULT NULL,
  `paid_at` timestamp NULL DEFAULT NULL,
  `next_payment_date` date DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salary_payments`
--

INSERT INTO `salary_payments` (`id`, `user_id`, `amount`, `status`, `paid_by`, `paid_at`, `next_payment_date`, `notes`, `created_at`, `updated_at`) VALUES
(26, 40, 4220.00, 'paid', 36, '2025-10-08 02:54:47', '2025-11-08', 'Salary payment marked as paid by Admin: me me', '2025-10-08 02:54:47', '2025-10-08 02:54:47'),
(27, 61, 50000.00, 'paid', 61, '2025-10-16 04:15:59', '2025-11-16', 'Salary payment marked as paid by User: bobo vo', '2025-10-16 04:15:59', '2025-10-16 04:15:59');

-- --------------------------------------------------------

--
-- Table structure for table `salary_payment_history`
--

CREATE TABLE `salary_payment_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_month` varchar(255) NOT NULL,
  `payment_year` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `paid_by` bigint(20) UNSIGNED NOT NULL,
  `paid_by_type` varchar(255) NOT NULL,
  `paid_by_name` varchar(255) NOT NULL,
  `paid_at` timestamp NULL DEFAULT NULL,
  `due_date` timestamp NULL DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salary_payment_history`
--

INSERT INTO `salary_payment_history` (`id`, `user_id`, `amount`, `payment_month`, `payment_year`, `status`, `paid_by`, `paid_by_type`, `paid_by_name`, `paid_at`, `due_date`, `notes`, `created_at`, `updated_at`) VALUES
(3, 40, 4220.00, '2025-10', '2025', 'paid', 36, 'admin', 'me me', '2025-10-08 02:54:47', '2025-10-08 02:54:47', 'Salary payment marked as paid by Admin: me me', '2025-10-08 02:54:47', '2025-10-08 02:54:47'),
(13, 61, 50000.00, '2025-10', '2025', 'paid', 61, 'user', 'bobo vo', '2025-10-16 04:15:59', '2025-10-16 04:15:59', 'Salary payment marked as paid by User: bobo vo', '2025-10-16 04:15:59', '2025-10-16 04:15:59');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supervisors`
--

CREATE TABLE `supervisors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `superadmin_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supervisors`
--

INSERT INTO `supervisors` (`id`, `first_name`, `last_name`, `email`, `password`, `remember_token`, `status`, `admin_id`, `superadmin_id`, `created_at`, `updated_at`) VALUES
(5, 'mubeen', 'saeed', 'she@gmail.com', '$2y$10$rN2PZz84z8/sgbi10IwJVeMlVTHQcLWjSpx08BCkmle0UePLMIO/G', NULL, 'active', 36, 1, '2025-10-08 03:37:51', '2025-10-16 06:09:47'),
(7, 'omni', 'jani', 'omniassign6@gmail.com', '$2y$10$IIbqUEfwwes.YioXLK2nSeeOD9MnQcEVgyZAzuQb9jk5y4oVtMAS.', NULL, 'active', 16, 1, '2025-10-22 06:17:41', '2025-10-23 05:01:02');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor_permissions`
--

CREATE TABLE `supervisor_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supervisor_id` bigint(20) UNSIGNED NOT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `can_create_users` tinyint(1) NOT NULL DEFAULT 0,
  `can_edit_users` tinyint(1) NOT NULL DEFAULT 0,
  `can_delete_users` tinyint(1) NOT NULL DEFAULT 0,
  `can_reset_passwords` tinyint(1) NOT NULL DEFAULT 0,
  `can_assign_modules` tinyint(1) NOT NULL DEFAULT 0,
  `can_view_reports` tinyint(1) NOT NULL DEFAULT 0,
  `can_mark_salary_paid` tinyint(1) NOT NULL DEFAULT 0,
  `can_mark_salary_pending` tinyint(1) NOT NULL DEFAULT 0,
  `can_view_salary_data` tinyint(1) NOT NULL DEFAULT 0,
  `can_manage_salary_payments` tinyint(1) NOT NULL DEFAULT 0,
  `can_access_user_support` tinyint(1) NOT NULL DEFAULT 0,
  `can_access_dealer_support` tinyint(1) NOT NULL DEFAULT 0,
  `user_support_can_view` tinyint(1) NOT NULL DEFAULT 0,
  `user_support_can_update` tinyint(1) NOT NULL DEFAULT 0,
  `user_support_can_expiry_update` tinyint(1) NOT NULL DEFAULT 0,
  `user_support_can_package_change` tinyint(1) NOT NULL DEFAULT 0,
  `user_support_can_add_days` tinyint(1) NOT NULL DEFAULT 0,
  `dealer_support_can_view` tinyint(1) NOT NULL DEFAULT 0,
  `dealer_support_can_update` tinyint(1) NOT NULL DEFAULT 0,
  `dealer_support_can_expiry_update` tinyint(1) NOT NULL DEFAULT 0,
  `dealer_support_can_package_change` tinyint(1) NOT NULL DEFAULT 0,
  `dealer_support_can_add_days` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supervisor_permissions`
--

INSERT INTO `supervisor_permissions` (`id`, `supervisor_id`, `module_id`, `can_create_users`, `can_edit_users`, `can_delete_users`, `can_reset_passwords`, `can_assign_modules`, `can_view_reports`, `can_mark_salary_paid`, `can_mark_salary_pending`, `can_view_salary_data`, `can_manage_salary_payments`, `can_access_user_support`, `can_access_dealer_support`, `user_support_can_view`, `user_support_can_update`, `user_support_can_expiry_update`, `user_support_can_package_change`, `user_support_can_add_days`, `dealer_support_can_view`, `dealer_support_can_update`, `dealer_support_can_expiry_update`, `dealer_support_can_package_change`, `dealer_support_can_add_days`, `created_at`, `updated_at`) VALUES
(21, 5, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2025-10-08 03:37:51', '2025-10-08 03:37:51'),
(22, 5, 2, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2025-10-08 03:37:51', '2025-10-08 03:37:51'),
(23, 5, 3, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2025-10-08 03:37:51', '2025-10-08 03:37:51'),
(26, 7, 1, 1, 1, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2025-10-22 06:17:41', '2025-10-22 06:17:41'),
(27, 7, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2025-10-22 06:17:41', '2025-10-22 06:17:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `admin_id` bigint(20) DEFAULT NULL,
  `role_id` bigint(20) NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `superadmin_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_location` varchar(255) DEFAULT NULL,
  `company_ntn_number` varchar(255) DEFAULT NULL,
  `company_logo` varchar(255) DEFAULT NULL,
  `company_print_logo` varchar(255) DEFAULT NULL,
  `company_bio` text DEFAULT NULL,
  `company_country` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `admin_id`, `role_id`, `is_approved`, `superadmin_id`, `created_at`, `updated_at`, `company_name`, `company_location`, `company_ntn_number`, `company_logo`, `company_print_logo`, `company_bio`, `company_country`) VALUES
(1, 'Saeed', 'Mubeen', 'saeedmubeen20@gmail.com', NULL, '$2y$10$l361YEIyd2CcAexEjmksQeGpowEPFMBc1SDfAUYCGbeKwlhvMocF2', NULL, NULL, 1, 1, NULL, '2025-10-01 01:49:29', '2025-10-01 01:49:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'golden', 'miharuu', 'goldenmiharu@gmail.com', NULL, '$2y$10$NoQVbaIgWMiIDxG0rhKHluGdv3pPWxwRzcvZ69f0yHq.KewTfJ7M.', NULL, NULL, 2, 1, 1, '2025-10-07 02:40:27', '2025-10-23 04:38:39', 'dooodh shop', 'islamabad', '112211222', 'company_logos/company_logo_16_1761208672.JPG', 'company_print_logos/company_print_logo_16_1761208672.JPG', 'gyusgcuygfuwegyfuewgfyuw', 'Pakistan'),
(36, 'me', 'me', 'lilfoxy7777@gmail.com', NULL, '$2y$10$kHizkKT0h8M2t3s.x29vceqHh3LtSNexYFnlA/styqF8mELeb.2Ba', NULL, NULL, 2, 1, 1, '2025-10-08 02:29:53', '2025-10-08 02:30:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'mmm', 'mmm', 'mani@gmail.com', NULL, '$2y$10$QDoqmdvJJwMCDKycImkCTeC6yvKv0qLc.PDjhhFijBGTME0nJLbDG', NULL, 36, 3, 1, 1, '2025-10-08 02:54:26', '2025-10-08 02:54:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'bobo', 'vo', 'moji@gmail.com', NULL, '$2y$10$Nh9bILf6780OoXK1UOxUHOXxco1AqhiP1MLTySbeRi0qe6E8aKA3W', NULL, 36, 3, 1, 1, '2025-10-16 04:11:46', '2025-10-16 04:11:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'n', 'p', 'lilhexxi7@gmail.com', NULL, '$2y$10$WaG32/iNh1DGRBoisly7kuYaHFYiDGr.PO0aXUIYhwO5YV91ieDSi', NULL, 16, 3, 1, 1, '2025-10-22 06:22:20', '2025-10-22 06:22:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 'nnnn', 'ddd', 'miki@gmail.com', NULL, '$2y$10$NAOfvaDYz41NpGOXMl8P7.gfBONYuJyVyHPAnPuzEg3w/uJpmlzCO', NULL, 16, 3, 1, 1, '2025-10-23 04:14:21', '2025-10-24 06:14:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 'jomu', 'u', 'jomu@gmail.com', NULL, '$2y$10$lUnVKVXa0JLw4Pyvo.eLze1lM0zH1T6mkxkjf0Mz7Mg.m7mxiaX5u', NULL, 16, 3, 1, 1, '2025-10-24 01:52:56', '2025-10-24 01:52:56', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_identification`
--

CREATE TABLE `user_identification` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) DEFAULT NULL,
  `superadmin_id` bigint(20) DEFAULT NULL,
  `user_role` varchar(255) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `assigned_at` timestamp NULL DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_identification`
--

INSERT INTO `user_identification` (`id`, `user_id`, `admin_id`, `superadmin_id`, `user_role`, `status`, `approved_at`, `assigned_at`, `notes`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, 'superadmin', 'active', '2025-10-01 02:33:53', '2025-10-01 02:33:53', 'Auto-populated from existing user data', '2025-10-01 02:33:53', '2025-10-01 02:33:53');

-- --------------------------------------------------------

--
-- Table structure for table `user_infos`
--

CREATE TABLE `user_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `gmail` varchar(255) DEFAULT NULL,
  `cnic` varchar(255) DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `bank_account_title` varchar(255) DEFAULT NULL,
  `bank_account_number` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `twitter_url` varchar(255) DEFAULT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `emergency_contact_name` varchar(255) DEFAULT NULL,
  `emergency_contact_phone` varchar(255) DEFAULT NULL,
  `emergency_contact_relationship` varchar(255) DEFAULT NULL,
  `timezone` varchar(255) NOT NULL DEFAULT 'UTC',
  `language` varchar(255) NOT NULL DEFAULT 'en',
  `email_notifications` tinyint(1) NOT NULL DEFAULT 1,
  `sms_notifications` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `superadmin_id` bigint(20) DEFAULT NULL,
  `user_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_id` bigint(20) DEFAULT NULL,
  `created_by_type` varchar(255) DEFAULT NULL,
  `created_by_id` bigint(20) DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_infos`
--

INSERT INTO `user_infos` (`id`, `user_id`, `first_name`, `last_name`, `phone`, `gmail`, `cnic`, `gender`, `avatar`, `address`, `city`, `postal_code`, `job_title`, `department`, `company`, `department_id`, `joining_date`, `bank_account_title`, `bank_account_number`, `bio`, `linkedin_url`, `twitter_url`, `website_url`, `emergency_contact_name`, `emergency_contact_phone`, `emergency_contact_relationship`, `timezone`, `language`, `email_notifications`, `sms_notifications`, `created_at`, `updated_at`, `superadmin_id`, `user_type_id`, `admin_id`, `created_by_type`, `created_by_id`, `salary`) VALUES
(2, 1, 'Saeed', 'Mubeen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'UTC', 'en', 1, 0, '2025-10-01 02:32:46', '2025-10-06 03:37:07', 1, NULL, NULL, 'system', 1, NULL),
(10, 16, NULL, NULL, NULL, NULL, NULL, NULL, 'avatars/admin_16_1761209369.JPG', 'bfhsbfacachhuhwhfwgf', 'karachi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.youtube.com/', NULL, NULL, NULL, 'UTC', 'en', 0, 0, '2025-10-07 02:40:27', '2025-10-23 04:40:43', 1, NULL, NULL, NULL, NULL, NULL),
(30, 36, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'UTC', 'en', 1, 0, '2025-10-08 02:29:53', '2025-10-08 02:29:53', 1, NULL, NULL, NULL, NULL, NULL),
(33, 40, 'mmm', 'mmm', NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'UTC', 'en', 1, 0, '2025-10-08 02:54:26', '2025-10-08 02:54:26', 1, NULL, 36, 'admin', 36, 4220.00),
(43, 61, 'bobo', 'vo', NULL, 'moji@gmail.com', NULL, 'female', NULL, 'hjgfyf', NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'UTC', 'en', 1, 0, '2025-10-16 04:11:46', '2025-10-16 04:14:25', 1, NULL, 36, 'admin', 36, 50000.00),
(44, 62, 'n', 'p', '03327319593', NULL, NULL, 'female', 'avatars/user_62_1761132248.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 6, '2025-10-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'UTC', 'en', 0, 0, '2025-10-22 06:22:20', '2025-10-22 06:24:09', 1, NULL, 16, 'admin', 16, 5200.00),
(45, 63, 'nnnn', 'ddd', '745412154', NULL, NULL, NULL, 'avatars/user_63_1761299523.JPG', NULL, NULL, NULL, NULL, NULL, 'dooodh shop', 5, '2025-10-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'UTC', 'en', 0, 0, '2025-10-23 04:14:21', '2025-10-24 04:52:03', 1, NULL, 16, 'admin', 16, 15454.00),
(46, 64, 'jomu', 'u', '5554644646464664', NULL, NULL, 'female', NULL, NULL, NULL, NULL, NULL, NULL, 'dooodh shop', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'UTC', 'en', 1, 0, '2025-10-24 01:52:56', '2025-10-24 01:52:56', 1, NULL, 16, 'admin', 16, 46454.00);

-- --------------------------------------------------------

--
-- Table structure for table `user_modules`
--

CREATE TABLE `user_modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `can_view_reports` tinyint(1) NOT NULL DEFAULT 0,
  `can_create_users` tinyint(1) NOT NULL DEFAULT 0,
  `can_edit_users` tinyint(1) NOT NULL DEFAULT 0,
  `can_delete_users` tinyint(1) NOT NULL DEFAULT 0,
  `can_reset_passwords` tinyint(1) NOT NULL DEFAULT 0,
  `can_assign_modules` tinyint(1) NOT NULL DEFAULT 0,
  `can_mark_salary_paid` tinyint(1) NOT NULL DEFAULT 0,
  `can_mark_salary_pending` tinyint(1) NOT NULL DEFAULT 0,
  `can_view_salary_data` tinyint(1) NOT NULL DEFAULT 0,
  `can_manage_salary_payments` tinyint(1) NOT NULL DEFAULT 0,
  `can_access_user_support` tinyint(1) NOT NULL DEFAULT 0,
  `can_access_dealer_support` tinyint(1) NOT NULL DEFAULT 0,
  `user_support_can_view` tinyint(1) NOT NULL DEFAULT 0,
  `user_support_can_update` tinyint(1) NOT NULL DEFAULT 0,
  `user_support_can_expiry_update` tinyint(1) NOT NULL DEFAULT 0,
  `user_support_can_package_change` tinyint(1) NOT NULL DEFAULT 0,
  `user_support_can_add_days` tinyint(1) NOT NULL DEFAULT 0,
  `dealer_support_can_view` tinyint(1) NOT NULL DEFAULT 0,
  `dealer_support_can_update` tinyint(1) NOT NULL DEFAULT 0,
  `dealer_support_can_expiry_update` tinyint(1) NOT NULL DEFAULT 0,
  `dealer_support_can_package_change` tinyint(1) NOT NULL DEFAULT 0,
  `dealer_support_can_add_days` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_modules`
--

INSERT INTO `user_modules` (`id`, `user_id`, `module_id`, `can_view_reports`, `can_create_users`, `can_edit_users`, `can_delete_users`, `can_reset_passwords`, `can_assign_modules`, `can_mark_salary_paid`, `can_mark_salary_pending`, `can_view_salary_data`, `can_manage_salary_payments`, `can_access_user_support`, `can_access_dealer_support`, `user_support_can_view`, `user_support_can_update`, `user_support_can_expiry_update`, `user_support_can_package_change`, `user_support_can_add_days`, `dealer_support_can_view`, `dealer_support_can_update`, `dealer_support_can_expiry_update`, `dealer_support_can_package_change`, `dealer_support_can_add_days`, `created_at`, `updated_at`) VALUES
(46, 40, 2, 1, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2025-10-08 02:54:26', '2025-10-08 02:54:26'),
(47, 40, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2025-10-08 02:54:26', '2025-10-08 02:54:26'),
(67, 61, 1, 1, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(68, 61, 2, 1, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(69, 62, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2025-10-22 06:22:20', '2025-10-22 06:22:20'),
(70, 63, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, '2025-10-23 04:14:21', '2025-10-23 04:14:21'),
(71, 64, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, '2025-10-24 01:52:56', '2025-10-24 01:52:56');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `name`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'System Administrator', 1, '2025-10-01 02:32:38', '2025-10-01 02:32:38'),
(2, 'Admin', 'Administrator', 1, '2025-10-01 02:32:38', '2025-10-01 02:32:38'),
(3, 'Supervisor', 'Supervisor', 1, '2025-10-01 02:32:38', '2025-10-01 02:32:38'),
(4, 'User', 'Regular User', 1, '2025-10-01 02:32:38', '2025-10-01 02:32:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departments_name_unique` (`name`),
  ADD UNIQUE KEY `departments_code_unique` (`code`),
  ADD KEY `departments_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logs_user_id_created_on_index` (`user_id`,`created_on`),
  ADD KEY `logs_type_created_on_index` (`type`,`created_on`),
  ADD KEY `logs_module_created_on_index` (`module`,`created_on`),
  ADD KEY `logs_supervisor_id_foreign` (`supervisor_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_payments`
--
ALTER TABLE `salary_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salary_payments_user_id_foreign` (`user_id`),
  ADD KEY `salary_payments_paid_by_foreign` (`paid_by`);

--
-- Indexes for table `salary_payment_history`
--
ALTER TABLE `salary_payment_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salary_payment_history_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `supervisors_email_unique` (`email`),
  ADD KEY `supervisors_admin_id_foreign` (`admin_id`),
  ADD KEY `supervisors_superadmin_id_foreign` (`superadmin_id`);

--
-- Indexes for table `supervisor_permissions`
--
ALTER TABLE `supervisor_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `supervisor_permissions_supervisor_id_module_id_unique` (`supervisor_id`,`module_id`),
  ADD KEY `supervisor_permissions_module_id_foreign` (`module_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_new_email_unique` (`email`);

--
-- Indexes for table `user_identification`
--
ALTER TABLE `user_identification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_identification_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_infos`
--
ALTER TABLE `user_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_infos_user_id_foreign` (`user_id`),
  ADD KEY `user_infos_department_id_foreign` (`department_id`);

--
-- Indexes for table `user_modules`
--
ALTER TABLE `user_modules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_modules_user_id_module_id_unique` (`user_id`,`module_id`),
  ADD KEY `user_modules_module_id_foreign` (`module_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `salary_payments`
--
ALTER TABLE `salary_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `salary_payment_history`
--
ALTER TABLE `salary_payment_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `supervisors`
--
ALTER TABLE `supervisors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `supervisor_permissions`
--
ALTER TABLE `supervisor_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `user_identification`
--
ALTER TABLE `user_identification`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_infos`
--
ALTER TABLE `user_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `user_modules`
--
ALTER TABLE `user_modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_supervisor_id_foreign` FOREIGN KEY (`supervisor_id`) REFERENCES `supervisors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `salary_payments`
--
ALTER TABLE `salary_payments`
  ADD CONSTRAINT `salary_payments_paid_by_foreign` FOREIGN KEY (`paid_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `salary_payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `salary_payment_history`
--
ALTER TABLE `salary_payment_history`
  ADD CONSTRAINT `salary_payment_history_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD CONSTRAINT `supervisors_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `supervisors_superadmin_id_foreign` FOREIGN KEY (`superadmin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `supervisor_permissions`
--
ALTER TABLE `supervisor_permissions`
  ADD CONSTRAINT `supervisor_permissions_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `supervisor_permissions_supervisor_id_foreign` FOREIGN KEY (`supervisor_id`) REFERENCES `supervisors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_identification`
--
ALTER TABLE `user_identification`
  ADD CONSTRAINT `user_identification_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_infos`
--
ALTER TABLE `user_infos`
  ADD CONSTRAINT `user_infos_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `user_infos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_modules`
--
ALTER TABLE `user_modules`
  ADD CONSTRAINT `user_modules_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_modules_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
