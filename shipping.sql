-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2024 at 01:41 PM
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
-- Database: `shipping`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `arrives`
--

CREATE TABLE `arrives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `captain_id` bigint(20) UNSIGNED NOT NULL,
  `from_at` decimal(8,2) NOT NULL,
  `from_long` decimal(8,2) NOT NULL,
  `to_lat` decimal(8,2) NOT NULL,
  `to_long` decimal(8,2) NOT NULL,
  `note` text DEFAULT NULL,
  `cost` decimal(8,2) DEFAULT NULL,
  `status` enum('upcoming','completed','cancelled') NOT NULL,
  `vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `address_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `captains`
--

CREATE TABLE `captains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `vehicle_number` varchar(255) NOT NULL,
  `license_image` varchar(255) NOT NULL,
  `vehicle_catalog_image` varchar(255) NOT NULL,
  `birth_certificate_image` varchar(255) NOT NULL,
  `status` enum('active','inactive','in_hold') DEFAULT 'inactive',
  `lat` decimal(8,2) DEFAULT NULL,
  `long` decimal(8,2) DEFAULT NULL,
  `vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `otp` varchar(255) DEFAULT NULL,
  `isVerified` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('male','female','other') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `captains`
--

INSERT INTO `captains` (`id`, `name`, `email`, `address`, `vehicle_number`, `license_image`, `vehicle_catalog_image`, `birth_certificate_image`, `status`, `lat`, `long`, `vehicle_id`, `image`, `phone`, `otp`, `isVerified`, `created_at`, `updated_at`, `password`, `gender`) VALUES
(6, 'dddddd', 'dddd@dddddd.com', 'address', '123456', 'license_image', 'vehicle_catalog_image', 'birth_certificate_image', 'inactive', 1.00, 1.00, 1, NULL, 'phoneedd', '0', 0, '2024-02-25 09:54:18', '2024-02-25 09:56:36', '$2y$12$Auz3Q9NoZkFP4Ci3TVfJhO/yH1XEv7WyzyEirumLHwR6nUWyEJbD6', 'male'),
(7, 'ahmed', 'ahmed@ahmed.com', 'address', '1234567', 'license_image', 'vehicle_catalog_image', 'birth_certificate_image', 'inactive', 1.00, 1.00, 1, NULL, 'phoneeddd', '44917', 1, '2024-02-25 10:02:32', '2024-02-25 10:02:32', '$2y$12$P2l8A1Xp3Tacot3faeVbUOuFL.fwfi6VuNejujPbvIyoEMfKByBC6', 'male'),
(8, 'ahmed', 'ahmed@ahmedd.com', 'address', '12345678', 'license_image', 'vehicle_catalog_image', 'birth_certificate_image', 'inactive', 1.00, 1.00, 1, NULL, 'phoneedddd', '20697', 0, '2024-02-25 10:34:35', '2024-02-25 10:34:35', '$2y$12$iH0gwiG11JukPpAI30SGM.3wo62jZtGXYhoTRVkYX9O1EGrclbGqW', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Allan Purdy', '2024-02-22 11:16:05', '2024-02-22 11:16:05'),
(2, 'Karlee Schroeder', '2024-02-22 11:16:05', '2024-02-22 11:16:05'),
(3, 'Dr. Zackery Reichert', '2024-02-22 11:16:05', '2024-02-22 11:16:05'),
(4, 'Aurore Waters PhD', '2024-02-22 11:16:05', '2024-02-22 11:16:05'),
(5, 'Maurice Champlin', '2024-02-22 11:16:05', '2024-02-22 11:16:05'),
(6, 'Frieda Schmidt', '2024-02-22 11:16:07', '2024-02-22 11:16:07'),
(7, 'Miss Cleta Stokes MD', '2024-02-22 11:16:07', '2024-02-22 11:16:07'),
(8, 'Schuyler Senger', '2024-02-22 11:16:08', '2024-02-22 11:16:08'),
(9, 'Reece Ziemann', '2024-02-22 11:16:08', '2024-02-22 11:16:08'),
(10, 'Deondre Kemmer', '2024-02-22 11:16:09', '2024-02-22 11:16:09');

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
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `vehicle` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `captain_id` varchar(255) NOT NULL,
  `from_lat` varchar(255) NOT NULL,
  `from_long` varchar(255) NOT NULL,
  `to_lat` varchar(255) NOT NULL,
  `to_long` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `histories`
--

INSERT INTO `histories` (`id`, `date`, `vehicle`, `user_id`, `captain_id`, `from_lat`, `from_long`, `to_lat`, `to_long`, `status`, `created_at`, `updated_at`) VALUES
(1, '1989-04-21', 'Atque et corrupti ducimus iure ea. Dolores ratione beatae earum totam. Velit minima quia corporis eos veniam facere dolorem.', 'Magni aperiam enim nemo et. Atque ut sit aliquid similique. Non recusandae quo voluptates eum iste ipsum.', 'Occaecati consequatur tenetur voluptatem veritatis nihil qui. Similique dolor similique vel praesentium maiores. Velit et dolorem asperiores architecto molestiae voluptates. Maiores omnis numquam fugit voluptas earum.', 'Possimus perspiciatis quia repudiandae vel deserunt optio. Nihil ea voluptatem tempore. Modi fugiat iure error esse ratione ratione at. Ut unde ut iure veritatis consequatur sapiente recusandae.', 'Quia esse quos et accusamus neque. Suscipit aut eum asperiores odio velit. Sunt blanditiis excepturi totam vel autem necessitatibus hic tenetur. Cumque quia a aperiam expedita.', 'Quo doloremque temporibus voluptatem nulla. Rerum quia voluptatum vel nisi quis doloribus tenetur. Nam itaque et excepturi repellendus sint voluptas. Dolores accusantium nulla aut eos sint excepturi.', 'Quo totam ut qui nihil exercitationem iusto. Voluptas tenetur quia consequuntur perferendis illo. Cumque odio tempore voluptate sint aut. Quia qui et debitis nemo impedit fugit.', 'excepturi', '2024-02-22 11:16:05', '2024-02-22 11:16:05'),
(2, '1974-03-22', 'Qui ab impedit aut dignissimos cum omnis. Inventore suscipit enim ab minima eum. Ducimus sunt unde in quia est. Ut soluta inventore recusandae unde cumque et.', 'Ad animi quis nihil autem. Dolorem consequatur cumque enim. Cumque ducimus asperiores occaecati accusantium alias. Id voluptas quaerat ut ratione velit sit fuga. Ut voluptates illo asperiores cum omnis.', 'Omnis dolor aliquid dignissimos modi quisquam. Iure ea a quaerat inventore. Impedit perspiciatis voluptatem temporibus esse accusantium aspernatur iure.', 'Rem praesentium tempore non autem. Tempora doloremque tempore laudantium aut et est excepturi consequuntur. Veniam deleniti doloremque aspernatur nam omnis sed commodi.', 'Aut eaque quia corrupti temporibus et modi cum. Quo sed libero corrupti ut dolorem eius vitae.', 'Iste voluptas fugiat consequatur eos. Placeat ex et commodi nemo voluptas hic. Ea quos sint vel quaerat. Et reiciendis quia provident. Repellendus fuga ratione illo. Aut quae omnis iusto. Consectetur quia facere minus est voluptatem quia fugiat.', 'Iusto qui tempore expedita quia suscipit ipsam officia. Quisquam et velit enim quae. Voluptatem est iste minus qui cum ipsam.', 'quasi', '2024-02-22 11:16:05', '2024-02-22 11:16:05'),
(3, '1978-07-26', 'Voluptate minus eos consequatur qui et et eius. Impedit nobis et aut quia voluptatem eaque et et. Rem quia veniam dolores.', 'Velit tempore quidem nam ratione voluptate. Praesentium aut vitae architecto non in voluptates autem qui. Maxime quos fuga quidem. Vel sequi aspernatur non et voluptatem quia tempore praesentium. Ea porro earum repellendus qui fuga rerum.', 'Praesentium ut blanditiis sit occaecati illum porro. Impedit omnis maxime omnis minima optio voluptates nihil. Hic est repudiandae assumenda dolor ratione recusandae.', 'Sint recusandae dolorum adipisci et. Nulla ipsa sint est unde labore rerum. Voluptatem ad nostrum qui sunt labore. Occaecati doloribus ut facere laudantium est enim recusandae.', 'Deleniti quisquam mollitia pariatur vero distinctio reiciendis voluptatem. Qui nihil delectus quibusdam ab sit. Dolore ut aut porro corporis. Qui eum voluptatem rem neque doloremque quis sed. Consequatur error sit amet perspiciatis.', 'Rem amet aut dolor eveniet. Aperiam esse vero tempore nemo vero fugiat facilis minima. Possimus suscipit iure officiis molestias commodi.', 'Corporis alias amet ad error ut vero quam. Quidem id dolorum voluptatibus consequatur nesciunt sunt iure. Commodi debitis soluta iure sed dicta molestiae.', 'pariatur', '2024-02-22 11:16:05', '2024-02-22 11:16:05'),
(4, '2022-05-07', 'Nobis quia doloremque quia dolorem. Enim officiis ad quidem consequuntur. Praesentium reiciendis dolores et voluptatum sint ut. Voluptas veritatis voluptates non ex.', 'Sunt sed aut et sed delectus qui ratione. Maxime ab voluptate ex quaerat molestiae autem. Qui dolorum quia et molestiae pariatur deleniti. Illo est a temporibus laborum fugit exercitationem.', 'Sed natus rem praesentium aut ut modi omnis. Eum dolores vitae molestias modi quis. Fugit ut et totam soluta aut cum repellat non. Praesentium molestiae mollitia qui tempore.', 'Inventore quasi cupiditate et assumenda quo molestiae. Vitae aut nostrum et non. Rerum inventore quaerat velit error. In alias ullam eum et qui qui. Maxime pariatur rerum odio dicta. Occaecati officia esse qui ipsa. Itaque ducimus illum dolor id sit.', 'Est quo repellat iusto omnis similique repudiandae et. Sit cumque dolorem excepturi adipisci. Harum qui qui dolores excepturi repellat quod in. Temporibus praesentium eos veniam voluptatem veritatis dicta.', 'Consequatur praesentium et quasi a et. Voluptates repudiandae libero voluptate doloribus facere distinctio doloribus. Aut tempore doloremque est. Et esse fuga vel laborum tenetur. Quo alias molestiae libero qui.', 'Sit saepe nulla iure ut cumque fuga. Laudantium et porro libero ut ut harum necessitatibus. Laboriosam possimus necessitatibus autem quisquam aperiam sunt sit.', 'est', '2024-02-22 11:16:05', '2024-02-22 11:16:05'),
(5, '1994-11-25', 'Laboriosam eos quis cupiditate. Et unde et minima. Itaque debitis corporis facere aut. Est reiciendis ut aspernatur neque tempora id maiores.', 'Eos accusantium ut earum provident laborum esse. Dolorum doloremque dolor et dolor. Molestias aliquid id nihil non.', 'Rerum ipsa fugiat quaerat molestias officia consectetur. Voluptas dolorem itaque nesciunt quod doloribus quibusdam. Quia quos provident culpa voluptatem beatae. Quia dolor ut qui qui similique soluta nesciunt.', 'Voluptate rerum iste eos eaque. Vel maxime rerum perferendis dolorem eaque. Voluptas quae sit ut.', 'Sit ut ut beatae voluptatem. Autem repudiandae esse molestias eius minima vitae. Nisi ut porro tenetur libero voluptatem ut. Ea accusamus qui animi labore. Vel debitis ut et tempore error unde. Doloremque et sed animi natus. Sequi quo aut autem.', 'Est quis architecto ipsum officia asperiores. Optio hic consequatur nesciunt numquam. Quidem ut dolores et. Iste nobis praesentium velit sapiente fugiat facilis voluptatem.', 'Ex maiores dolorum magnam exercitationem. Est repellat doloribus ipsam enim. Alias laudantium et ipsa voluptatem consequuntur amet fugiat. In eveniet commodi quis modi et rerum dolorem.', 'magnam', '2024-02-22 11:16:05', '2024-02-22 11:16:05');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Ari Hamill DDS', 870.53, '2024-02-22 11:16:04', '2024-02-22 11:16:04'),
(2, 'Verona Grant', 8913.59, '2024-02-22 11:16:04', '2024-02-22 11:16:04'),
(3, 'Dr. Jacinto Krajcik', 9758.38, '2024-02-22 11:16:04', '2024-02-22 11:16:04'),
(4, 'Maximus McCullough', 9812.78, '2024-02-22 11:16:05', '2024-02-22 11:16:05'),
(5, 'Carleton Denesik', 8704.62, '2024-02-22 11:16:05', '2024-02-22 11:16:05'),
(6, 'Adonis Reynolds', 5562.67, '2024-02-22 11:16:05', '2024-02-22 11:16:05'),
(7, 'Mr. Merl Ritchie', 472.70, '2024-02-22 11:16:05', '2024-02-22 11:16:05'),
(8, 'Marlen Conn', 879.41, '2024-02-22 11:16:05', '2024-02-22 11:16:05'),
(9, 'Alphonso Marvin', 2310.93, '2024-02-22 11:16:05', '2024-02-22 11:16:05'),
(10, 'Gracie Langworth', 7877.75, '2024-02-22 11:16:05', '2024-02-22 11:16:05'),
(11, 'Prof. Alvah Cronin DDS', 28.17, '2024-02-22 11:16:07', '2024-02-22 11:16:07'),
(12, 'Mr. Darrell Langworth Sr.', 3458.23, '2024-02-22 11:16:08', '2024-02-22 11:16:08'),
(13, 'Mateo Runte', 1371.40, '2024-02-22 11:16:08', '2024-02-22 11:16:08'),
(14, 'Eloy Quitzon', 3358.52, '2024-02-22 11:16:08', '2024-02-22 11:16:08'),
(15, 'Elva Larson', 4651.23, '2024-02-22 11:16:09', '2024-02-22 11:16:09');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Maya Brakus', 'hettie.bradtke@wisoky.com', '+1.909.297.1158', 'Debitis saepe enim suscipit qui id et sit nisi consectetur dolore vel voluptate et tempora qui et similique voluptatibus at sit quaerat asperiores delectus.', '2024-02-22 11:16:05', '2024-02-22 11:16:05'),
(2, 'Hubert Mayer', 'elsie.brekke@gmail.com', '380-723-6316', 'Cum suscipit illo at ut et mollitia omnis aut eos asperiores esse quis reprehenderit deserunt eum dolores magnam.', '2024-02-22 11:16:05', '2024-02-22 11:16:05'),
(3, 'Prof. Wendell Goyette', 'sgrady@yahoo.com', '740.467.6369', 'Ex harum ut eos minima aut est corrupti repellendus eligendi molestias at qui exercitationem.', '2024-02-22 11:16:05', '2024-02-22 11:16:05'),
(4, 'Prof. Clare Fadel', 'christiansen.lorna@stanton.com', '+1 (508) 706-9506', 'Sit sit voluptatem ipsam cumque sit architecto sequi nisi natus enim ratione ex perferendis ut eos quia est.', '2024-02-22 11:16:05', '2024-02-22 11:16:05'),
(5, 'Alessia Waters', 'rmurazik@yahoo.com', '(283) 900-9403', 'Et et vero sed harum quia hic sed voluptas sunt quidem autem et molestiae ut dolores vero aspernatur earum rem laudantium harum odit nostrum quis.', '2024-02-22 11:16:05', '2024-02-22 11:16:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_02_12_000001_create_addresses_table', 1),
(7, '2024_02_12_000002_create_arrives_table', 1),
(9, '2024_02_12_000003_create_categories_table', 1),
(10, '2024_02_12_000004_create_histories_table', 1),
(11, '2024_02_12_000005_create_locations_table', 1),
(12, '2024_02_12_000005_create_messages_table', 1),
(13, '2024_02_12_000006_create_our_data_table', 1),
(14, '2024_02_12_000007_create_profiles_table', 1),
(15, '2024_02_12_000008_create_receiver_data_table', 1),
(16, '2024_02_12_000009_create_sender_data_table', 1),
(17, '2024_02_12_000010_create_shipments_table', 1),
(18, '2024_02_12_000012_create_vehicles_table', 1),
(19, '2024_02_12_009001_add_foreigns_to_addresses_table', 1),
(20, '2024_02_12_009002_add_foreigns_to_arrives_table', 1),
(21, '2024_02_12_009002_add_foreigns_to_captains_table', 1),
(22, '2024_02_12_009002_add_foreigns_to_profiles_table', 1),
(23, '2024_02_12_009005_add_foreigns_to_shipments_table', 1),
(24, '2024_02_22_131501_create_permission_tables', 1),
(25, '2024_02_23_155800_add_user_id_to_sender_data_table', 2),
(26, '2024_02_23_155825_add_user_id_to_receiver_data_table', 2),
(27, '2024_02_25_095901_add_captains_column_type_in_captains_table', 3),
(29, '2024_02_12_000002_create_captains_table', 4),
(30, '2024_02_25_114545_add_password_column_to_captains_table', 5),
(31, '2024_02_25_123229_add_gender_column_to_captains_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `our_data`
--

CREATE TABLE `our_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about_us` text NOT NULL,
  `privacy_policy` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `help_and_support` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `our_data`
--

INSERT INTO `our_data` (`id`, `about_us`, `privacy_policy`, `address`, `phone`, `email`, `help_and_support`, `created_at`, `updated_at`) VALUES
(1, 'Ut dignissimos iusto non. Et odio exercitationem est culpa sequi.', 'Sed perferendis et quidem totam culpa. Est vitae doloremque aspernatur harum maxime. Qui ut enim repellat et. Ut consectetur ut consequuntur velit. Qui quis nulla adipisci eum.', '267 Esperanza Extension Suite 640\nEmmyhaven, PA 13441-4126', '+1 (820) 691-9180', 'emmerich.amie@hotmail.com', 'Illum voluptatum iure quis cum dolores. Iure nesciunt optio culpa enim tempora praesentium quam veniam. Deleniti qui magni molestias animi. Porro voluptas temporibus soluta optio ullam fuga.', '2024-02-22 11:16:05', '2024-02-22 11:16:05'),
(2, 'Tempore laborum repellat et laboriosam id non. Nobis quia qui at ut ad est. Voluptas quod exercitationem esse vero dolor.', 'Adipisci ad omnis eum tenetur sit ut. Neque quisquam vel adipisci. Et eos maiores delectus esse.', '557 Welch Via\nPort Viviantown, MD 05201-3093', '+1-251-282-6566', 'yhintz@hotmail.com', 'Quia voluptatibus distinctio alias non. Rerum itaque porro sit ut. Sed quos veritatis voluptatem et et voluptate.', '2024-02-22 11:16:05', '2024-02-22 11:16:05'),
(3, 'Iure vero ex optio et occaecati velit beatae. Sit commodi voluptas facere quod molestiae. Asperiores fuga iste nesciunt vero cum magni.', 'Distinctio impedit accusamus sed tenetur qui amet. Cupiditate laudantium illum saepe non est. Quos illum molestias harum harum.', '2303 Kunde Greens\nAlysonhaven, WY 93080-6121', '+1-408-703-0167', 'cruz55@murazik.info', 'Culpa magni neque et esse. Praesentium ut consectetur sint numquam quo commodi sint. Quasi dicta ab ut adipisci error.', '2024-02-22 11:16:05', '2024-02-22 11:16:05'),
(4, 'Aliquid officia ut ex qui est deleniti corporis. Odio consequatur deleniti velit fugit soluta.', 'Quia aut fugit animi tempore quas in consequatur aliquid. Ut error asperiores voluptas corrupti voluptas rerum quia. Sed enim beatae ab pariatur dolores itaque velit.', '3934 Hermann Flat Apt. 145\nEast Elsieborough, VA 70769', '+18102278197', 'wilton.nikolaus@jakubowski.com', 'Cupiditate voluptas eligendi delectus eum autem. Consequuntur numquam recusandae ut quidem consequuntur sit commodi.', '2024-02-22 11:16:05', '2024-02-22 11:16:05'),
(5, 'Quasi inventore deleniti libero error. Impedit soluta doloremque cumque excepturi facilis. Libero occaecati quae laborum rem quas minus qui. Quia dolores qui et voluptates aut occaecati et nobis.', 'Molestiae deleniti ut saepe. Molestiae accusamus voluptate beatae atque. Officia neque id quo eum aspernatur unde.', '8970 Strosin Manors\nWest Rex, AK 57671-3912', '1-680-902-9714', 'tristin31@yost.com', 'Tempora assumenda voluptatem dicta eos eos natus. Vel unde ullam dignissimos natus. Quam cupiditate quia nam neque nisi nam animi. Eum perferendis architecto eum voluptate ut.', '2024-02-22 11:16:05', '2024-02-22 11:16:05');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'list addresses', 'web', '2024-02-22 11:16:00', '2024-02-22 11:16:00'),
(2, 'view addresses', 'web', '2024-02-22 11:16:00', '2024-02-22 11:16:00'),
(3, 'create addresses', 'web', '2024-02-22 11:16:00', '2024-02-22 11:16:00'),
(4, 'update addresses', 'web', '2024-02-22 11:16:00', '2024-02-22 11:16:00'),
(5, 'delete addresses', 'web', '2024-02-22 11:16:00', '2024-02-22 11:16:00'),
(6, 'list arrives', 'web', '2024-02-22 11:16:00', '2024-02-22 11:16:00'),
(7, 'view arrives', 'web', '2024-02-22 11:16:00', '2024-02-22 11:16:00'),
(8, 'create arrives', 'web', '2024-02-22 11:16:00', '2024-02-22 11:16:00'),
(9, 'update arrives', 'web', '2024-02-22 11:16:00', '2024-02-22 11:16:00'),
(10, 'delete arrives', 'web', '2024-02-22 11:16:00', '2024-02-22 11:16:00'),
(11, 'list captains', 'web', '2024-02-22 11:16:00', '2024-02-22 11:16:00'),
(12, 'view captains', 'web', '2024-02-22 11:16:00', '2024-02-22 11:16:00'),
(13, 'create captains', 'web', '2024-02-22 11:16:00', '2024-02-22 11:16:00'),
(14, 'update captains', 'web', '2024-02-22 11:16:00', '2024-02-22 11:16:00'),
(15, 'delete captains', 'web', '2024-02-22 11:16:00', '2024-02-22 11:16:00'),
(16, 'list categories', 'web', '2024-02-22 11:16:00', '2024-02-22 11:16:00'),
(17, 'view categories', 'web', '2024-02-22 11:16:00', '2024-02-22 11:16:00'),
(18, 'create categories', 'web', '2024-02-22 11:16:00', '2024-02-22 11:16:00'),
(19, 'update categories', 'web', '2024-02-22 11:16:00', '2024-02-22 11:16:00'),
(20, 'delete categories', 'web', '2024-02-22 11:16:00', '2024-02-22 11:16:00'),
(21, 'list histories', 'web', '2024-02-22 11:16:00', '2024-02-22 11:16:00'),
(22, 'view histories', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(23, 'create histories', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(24, 'update histories', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(25, 'delete histories', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(26, 'list locations', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(27, 'view locations', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(28, 'create locations', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(29, 'update locations', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(30, 'delete locations', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(31, 'list messages', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(32, 'view messages', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(33, 'create messages', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(34, 'update messages', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(35, 'delete messages', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(36, 'list allourdata', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(37, 'view allourdata', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(38, 'create allourdata', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(39, 'update allourdata', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(40, 'delete allourdata', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(41, 'list profiles', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(42, 'view profiles', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(43, 'create profiles', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(44, 'update profiles', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(45, 'delete profiles', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(46, 'list allreceiverdata', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(47, 'view allreceiverdata', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(48, 'create allreceiverdata', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(49, 'update allreceiverdata', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(50, 'delete allreceiverdata', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(51, 'list allsenderdata', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(52, 'view allsenderdata', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(53, 'create allsenderdata', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(54, 'update allsenderdata', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(55, 'delete allsenderdata', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(56, 'list shipments', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(57, 'view shipments', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(58, 'create shipments', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(59, 'update shipments', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(60, 'delete shipments', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(61, 'list vehicles', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(62, 'view vehicles', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(63, 'create vehicles', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(64, 'update vehicles', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(65, 'delete vehicles', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(66, 'list roles', 'web', '2024-02-22 11:16:02', '2024-02-22 11:16:02'),
(67, 'view roles', 'web', '2024-02-22 11:16:02', '2024-02-22 11:16:02'),
(68, 'create roles', 'web', '2024-02-22 11:16:02', '2024-02-22 11:16:02'),
(69, 'update roles', 'web', '2024-02-22 11:16:02', '2024-02-22 11:16:02'),
(70, 'delete roles', 'web', '2024-02-22 11:16:02', '2024-02-22 11:16:02'),
(71, 'list permissions', 'web', '2024-02-22 11:16:02', '2024-02-22 11:16:02'),
(72, 'view permissions', 'web', '2024-02-22 11:16:02', '2024-02-22 11:16:02'),
(73, 'create permissions', 'web', '2024-02-22 11:16:02', '2024-02-22 11:16:02'),
(74, 'update permissions', 'web', '2024-02-22 11:16:02', '2024-02-22 11:16:02'),
(75, 'delete permissions', 'web', '2024-02-22 11:16:02', '2024-02-22 11:16:02'),
(76, 'list users', 'web', '2024-02-22 11:16:02', '2024-02-22 11:16:02'),
(77, 'view users', 'web', '2024-02-22 11:16:02', '2024-02-22 11:16:02'),
(78, 'create users', 'web', '2024-02-22 11:16:02', '2024-02-22 11:16:02'),
(79, 'update users', 'web', '2024-02-22 11:16:02', '2024-02-22 11:16:02'),
(80, 'delete users', 'web', '2024-02-22 11:16:02', '2024-02-22 11:16:02');

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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'auth-token', '13f007170078cc0225c1bd06119ab0ae51c3cb94f2a0178cb79676477dfed36c', '[\"*\"]', NULL, NULL, '2024-02-22 11:30:18', '2024-02-22 11:30:18'),
(2, 'App\\Models\\User', 1, 'auth-token', 'eb80799445f4c457ed38203ec08a59a21beedb6b0164a4c08e1079640fed4235', '[\"*\"]', NULL, NULL, '2024-02-22 11:41:13', '2024-02-22 11:41:13'),
(3, 'App\\Models\\User', 1, 'auth-token', '53804399c1885f65c71fa78e46d1bb0fec54057d89bc2a94ac99d0b4f164b978', '[\"*\"]', NULL, NULL, '2024-02-22 11:41:15', '2024-02-22 11:41:15'),
(4, 'App\\Models\\User', 1, 'auth-token', '69e5e5136207dca24387d11feb219fccbebc2e4b815b90d2ca59395633d80689', '[\"*\"]', NULL, NULL, '2024-02-22 11:42:59', '2024-02-22 11:42:59'),
(5, 'App\\Models\\User', 1, 'auth-token', '2fc8615ab1bd0b70f28b7476d2bfa0dc6c27ab71897d473a93eaa863d64d153d', '[\"*\"]', NULL, NULL, '2024-02-22 11:44:00', '2024-02-22 11:44:00'),
(6, 'App\\Models\\User', 1, 'auth-token', '5662a4733f8e41226104790a2814c3dba9eac45fe0d966ec34f061b3ae9d35af', '[\"*\"]', NULL, NULL, '2024-02-22 11:44:02', '2024-02-22 11:44:02'),
(7, 'App\\Models\\User', 1, 'auth-token', '93165d3edd1f34f582bd9a335b676299f91175455fbfe5f1bf5eea4c7fb8b040', '[\"*\"]', NULL, NULL, '2024-02-22 11:46:31', '2024-02-22 11:46:31'),
(8, 'App\\Models\\User', 1, 'auth-token', '4bf36a78f36b318721d04fbe533fdb1024433beb069625d99a3792910d330c7f', '[\"*\"]', NULL, NULL, '2024-02-22 11:57:39', '2024-02-22 11:57:39'),
(9, 'App\\Models\\User', 1, 'auth-token', '61ebf9c064003fc3911f6ab21b755001ffd9399682ef1561e24e45f4a3ebfe4c', '[\"*\"]', NULL, NULL, '2024-02-22 11:58:13', '2024-02-22 11:58:13'),
(10, 'App\\Models\\User', 1, 'auth-token', '5903ea506194c7c7e9e6f4b3c900c4a8c4241716e185bc298013077a001b9c8d', '[\"*\"]', NULL, NULL, '2024-02-22 12:02:02', '2024-02-22 12:02:02'),
(11, 'App\\Models\\User', 1, 'auth-token', 'e43f414d68d40e050c0b35d02cb95f4b444fe541445d5d74b560644511a38129', '[\"*\"]', NULL, NULL, '2024-02-22 12:02:13', '2024-02-22 12:02:13'),
(12, 'App\\Models\\User', 1, 'auth-token', '69c8f18c2e915aca50b060b071c06b7c55c08ed327eb126d80d7888727265fd0', '[\"*\"]', NULL, NULL, '2024-02-22 12:04:05', '2024-02-22 12:04:05'),
(13, 'App\\Models\\User', 1, 'auth-token', 'f0084dbfcc13170fc08ff26dc4ef4a3ae0a1eeb8641f22c9e33367344dc5ff28', '[\"*\"]', NULL, NULL, '2024-02-22 12:04:08', '2024-02-22 12:04:08'),
(14, 'App\\Models\\User', 1, 'auth-token', 'cfce509ed4863ba7aa9ff78d0d59b6b178cdd661d846679ae67cec6f4424764c', '[\"*\"]', NULL, NULL, '2024-02-22 12:05:13', '2024-02-22 12:05:13'),
(15, 'App\\Models\\User', 1, 'auth-token', '786599aeb30fa46b23c27c91f136e48493d00ba8dac52b98216abc16e9fee40e', '[\"*\"]', NULL, NULL, '2024-02-22 12:05:19', '2024-02-22 12:05:19'),
(16, 'App\\Models\\User', 1, 'auth-token', '2e6022b4f51c6c5a1f0d86ede195543265c65c57d5fdf5b18f05c0926a8c1b3d', '[\"*\"]', NULL, NULL, '2024-02-22 12:05:58', '2024-02-22 12:05:58'),
(17, 'App\\Models\\User', 1, 'auth-token', '19eb248cd0bcf1c1e268754668cbe1cee488c9887f71ef00998dc93e0cd854a5', '[\"*\"]', NULL, NULL, '2024-02-22 12:08:30', '2024-02-22 12:08:30'),
(18, 'App\\Models\\User', 1, 'auth-token', '2c9048e8e763295ff96a160540af205c89ecc204d6f162de340a553b5a49e3d7', '[\"*\"]', NULL, NULL, '2024-02-22 12:08:34', '2024-02-22 12:08:34'),
(19, 'App\\Models\\User', 1, 'auth-token', '50ddfc7497c34a94321fc3be8dc53ea55318f1f0d3da72c3af0a7988d7ca106f', '[\"*\"]', NULL, NULL, '2024-02-22 12:09:16', '2024-02-22 12:09:16'),
(20, 'App\\Models\\User', 1, 'auth-token', '2d9da82290c929296b1f7dd6f9e4e592f7ac8452a2db62eb6c2a36e8d190cb10', '[\"*\"]', NULL, NULL, '2024-02-22 12:14:30', '2024-02-22 12:14:30'),
(21, 'App\\Models\\User', 1, 'auth-token', '7117d772686b8f84ff2c13eba46cbc1f3f7132861e8f350adff02ff93d991f5b', '[\"*\"]', NULL, NULL, '2024-02-22 12:27:26', '2024-02-22 12:27:26'),
(22, 'App\\Models\\User', 1, 'auth-token', '4541d350435c47ca07d88c527c8922a6afff1e2790424e71de4705743bc3a92d', '[\"*\"]', NULL, NULL, '2024-02-22 12:31:28', '2024-02-22 12:31:28'),
(23, 'App\\Models\\User', 1, 'auth-token', '4c71e8fcd7d1fe5f7c2415ac29facbb5eb0e4daf3421018bd01d430b17ecbbd6', '[\"*\"]', NULL, NULL, '2024-02-22 12:32:28', '2024-02-22 12:32:28'),
(24, 'App\\Models\\User', 1, 'auth-token', '8990cb408e4259d37297160de438563ba32202fca0080ef5323dee6d1ede92d4', '[\"*\"]', NULL, NULL, '2024-02-22 12:32:42', '2024-02-22 12:32:42'),
(25, 'App\\Models\\User', 1, 'auth-token', '11ec3836d5a9df12d0e4620a4f42b02432c20f4bb7f5e8c3f04eefc3b1049832', '[\"*\"]', NULL, NULL, '2024-02-22 12:50:29', '2024-02-22 12:50:29'),
(26, 'App\\Models\\User', 1, 'auth-token', '55df6a2a6762e865394f9b2acf599876d69727a3c8aa5551784b38c5774e8c09', '[\"*\"]', '2024-02-25 10:34:35', NULL, '2024-02-25 09:21:06', '2024-02-25 10:34:35'),
(27, 'App\\Models\\User', 1, 'auth-token', '6aa4553bdf56dd094b5a6aeaa56cbef43b5f496a435333199c7dd8e172966a0a', '[\"*\"]', NULL, NULL, '2024-02-25 10:16:32', '2024-02-25 10:16:32'),
(28, 'App\\Models\\Captain', 7, 'auth-token', 'fac9cea4997bfaea8e22a891ae5ca204f7d67135a36157647c9c230ace1d6b2d', '[\"*\"]', NULL, NULL, '2024-02-25 10:26:04', '2024-02-25 10:26:04'),
(29, 'App\\Models\\User', 1, 'auth-token', '3d69239411bde5223aab0c1d11484e73ee2c9e89820a188bbb4df1bf8eb8ad93', '[\"*\"]', NULL, NULL, '2024-02-25 10:28:25', '2024-02-25 10:28:25'),
(30, 'App\\Models\\User', 1, 'auth-token', '42462d30e92815a0e54760d7e76e3c5bc8fe09919ea8dfa2c44044de0a6802d6', '[\"*\"]', NULL, NULL, '2024-02-25 10:28:30', '2024-02-25 10:28:30'),
(31, 'App\\Models\\Captain', 7, 'auth-token', 'b9630a014682472d06b1799b1f0d08d214f552b8b66950aa5402dc627641334e', '[\"*\"]', NULL, NULL, '2024-02-25 10:28:34', '2024-02-25 10:28:34');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `captain_id` bigint(20) UNSIGNED DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receiver_data`
--

CREATE TABLE `receiver_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receiver_data`
--

INSERT INTO `receiver_data` (`id`, `name`, `phone`, `remarks`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Elmer Zemlak', '+1 (978) 482-6931', 'Necessitatibus eos aspernatur aut quis. Fugiat sunt maiores autem molestias molestiae. Voluptas esse voluptas officia ab. Cupiditate quis dignissimos voluptatem et. Perferendis commodi dolor voluptas in.', '2024-02-22 11:16:07', '2024-02-22 11:16:07', 0),
(2, 'Christa Schaden V', '1-878-640-6612', 'Dolores magnam excepturi ex corporis porro. Explicabo et quia quam nihil possimus facilis cupiditate sunt. Et harum eveniet laboriosam ullam explicabo et.', '2024-02-22 11:16:07', '2024-02-22 11:16:07', 0),
(3, 'Mrs. Tiana Hyatt', '+1-425-770-3856', 'In ab fugiat porro provident. Quia voluptas voluptatem qui nobis laudantium eveniet dolor sed. Perferendis velit officia enim hic sint. Quisquam vitae suscipit ipsa consectetur necessitatibus dolorum vel nemo.', '2024-02-22 11:16:07', '2024-02-22 11:16:07', 0),
(4, 'Enid Purdy', '+1.475.651.2799', 'Numquam quas accusamus ipsa. Velit blanditiis neque sunt ex. Eveniet aliquid quo quis et aut dolorem ea.', '2024-02-22 11:16:07', '2024-02-22 11:16:07', 0),
(5, 'Prof. Oral Jerde', '+1-727-846-5091', 'Voluptates et necessitatibus omnis eveniet culpa. Magnam sapiente et ullam quibusdam. Nulla et ut quis illum voluptatem tempora. Atque facere blanditiis ab. Quo esse eos voluptatem tenetur. Voluptatem dicta perferendis voluptas enim iusto.', '2024-02-22 11:16:07', '2024-02-22 11:16:07', 0),
(6, 'Ken Senger', '310-505-4793', 'Eaque et eligendi qui. Quasi quo eaque consequuntur voluptas iure quidem debitis. Pariatur voluptatibus quae iusto accusamus quis ut.', '2024-02-22 11:16:07', '2024-02-22 11:16:07', 0),
(7, 'Chesley Klocko', '+1-302-358-6399', 'Velit totam laboriosam ipsum numquam. Ad sed eum sit similique in. Necessitatibus facilis dolorem eligendi quis hic ut. Recusandae magni voluptatum rerum laboriosam laboriosam doloremque. Et enim assumenda alias. Qui aut aperiam quo qui.', '2024-02-22 11:16:08', '2024-02-22 11:16:08', 0),
(8, 'Katlyn Bergnaum', '615.872.2176', 'Qui aperiam quos sed sit autem. Enim sint corrupti at ipsam ut. Aperiam inventore velit impedit alias enim qui hic ipsa. Quidem illum iusto suscipit sint dolore.', '2024-02-22 11:16:08', '2024-02-22 11:16:08', 0),
(9, 'Mr. Braxton O\'Kon MD', '+1.913.850.6092', 'Deleniti adipisci et minus qui. Consectetur error et ea consequatur. Et cumque commodi cum ex. Impedit reprehenderit quis beatae quod. Possimus molestiae sit dolore et ea numquam cupiditate repellendus.', '2024-02-22 11:16:08', '2024-02-22 11:16:08', 0),
(10, 'Letitia Hintz', '847-643-5788', 'Aspernatur perspiciatis repudiandae praesentium enim corrupti laboriosam et. Tenetur temporibus fugit vel et ea. Deserunt sed delectus vel hic enim in.', '2024-02-22 11:16:09', '2024-02-22 11:16:09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user', 'web', '2024-02-22 11:16:01', '2024-02-22 11:16:01'),
(2, 'super-admin', 'web', '2024-02-22 11:16:02', '2024-02-22 11:16:02');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(22, 1),
(22, 2),
(23, 1),
(23, 2),
(24, 1),
(24, 2),
(25, 1),
(25, 2),
(26, 1),
(26, 2),
(27, 1),
(27, 2),
(28, 1),
(28, 2),
(29, 1),
(29, 2),
(30, 1),
(30, 2),
(31, 1),
(31, 2),
(32, 1),
(32, 2),
(33, 1),
(33, 2),
(34, 1),
(34, 2),
(35, 1),
(35, 2),
(36, 1),
(36, 2),
(37, 1),
(37, 2),
(38, 1),
(38, 2),
(39, 1),
(39, 2),
(40, 1),
(40, 2),
(41, 1),
(41, 2),
(42, 1),
(42, 2),
(43, 1),
(43, 2),
(44, 1),
(44, 2),
(45, 1),
(45, 2),
(46, 1),
(46, 2),
(47, 1),
(47, 2),
(48, 1),
(48, 2),
(49, 1),
(49, 2),
(50, 1),
(50, 2),
(51, 1),
(51, 2),
(52, 1),
(52, 2),
(53, 1),
(53, 2),
(54, 1),
(54, 2),
(55, 1),
(55, 2),
(56, 1),
(56, 2),
(57, 1),
(57, 2),
(58, 1),
(58, 2),
(59, 1),
(59, 2),
(60, 1),
(60, 2),
(61, 1),
(61, 2),
(62, 1),
(62, 2),
(63, 1),
(63, 2),
(64, 1),
(64, 2),
(65, 1),
(65, 2),
(66, 2),
(67, 2),
(68, 2),
(69, 2),
(70, 2),
(71, 2),
(72, 2),
(73, 2),
(74, 2),
(75, 2),
(76, 2),
(77, 2),
(78, 2),
(79, 2),
(80, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sender_data`
--

CREATE TABLE `sender_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `remarks` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sender_data`
--

INSERT INTO `sender_data` (`id`, `name`, `phone`, `remarks`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Mr. Cory Wilkinson', '317-319-3019', 'Ut omnis repellendus eaque corrupti et modi facere temporibus. Qui id et expedita rem minus voluptas. Odit earum perferendis deserunt. Sed veritatis quia officia nesciunt.', '2024-02-22 11:16:07', '2024-02-22 11:16:07', 0),
(2, 'Mrs. Audrey Mayert III', '1-405-426-0309', 'Eveniet eum doloremque sit. Dicta non rerum architecto aut dolorum.', '2024-02-22 11:16:07', '2024-02-22 11:16:07', 0),
(3, 'Laurel Lind III', '+15804545959', 'Sed quae sed et explicabo. Commodi recusandae nobis saepe nemo explicabo ad odit. At et dolor quis voluptas iusto temporibus. Et occaecati qui quidem eaque.', '2024-02-22 11:16:07', '2024-02-22 11:16:07', 0),
(4, 'Prof. Hailey Monahan Sr.', '1-731-213-6807', 'Aperiam sed in saepe. Sed et natus voluptatum deleniti et. Earum voluptatem quidem ratione qui omnis asperiores aut.', '2024-02-22 11:16:07', '2024-02-22 11:16:07', 0),
(5, 'Shaniya Zemlak', '724-558-2416', 'Maxime minus est provident aliquid sunt. Occaecati alias repudiandae blanditiis in. Esse distinctio ipsum non repellendus.', '2024-02-22 11:16:07', '2024-02-22 11:16:07', 0),
(6, 'Ottis Hirthe', '+13306142053', 'Vero qui pariatur eos voluptatem voluptas harum. Ullam laudantium et ab. In eaque quos nisi ipsa doloremque aut dolor. Molestiae est temporibus non et et dicta fugiat.', '2024-02-22 11:16:07', '2024-02-22 11:16:07', 0),
(7, 'Prof. Therese Wiegand', '+1-814-302-7205', 'Ad sed rerum iure aut. Est officia quo ratione et ab cumque voluptate. Sed vel minus voluptatem est odit cupiditate dolores. Saepe rerum ducimus vitae est.', '2024-02-22 11:16:08', '2024-02-22 11:16:08', 0),
(8, 'Aryanna Orn', '(725) 669-1563', 'Debitis laboriosam provident voluptatum harum dolore ut ipsa. Sint maxime est reprehenderit. Ad nemo at nemo et. Nemo aspernatur fugiat molestiae similique. Sit iusto nihil illo quisquam earum.', '2024-02-22 11:16:08', '2024-02-22 11:16:08', 0),
(9, 'Carmen Labadie', '+1-703-232-0384', 'Ut qui quis expedita sint possimus. Aut rerum ut laboriosam occaecati a et corrupti.', '2024-02-22 11:16:08', '2024-02-22 11:16:08', 0),
(10, 'Aric Okuneva', '540-828-9664', 'Neque dolorem sit sed non at sapiente deleniti. Eaque voluptatem eaque sint esse et occaecati. Pariatur nisi in aliquam ipsam.', '2024-02-22 11:16:09', '2024-02-22 11:16:09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

CREATE TABLE `shipments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `captain_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `from_lat` decimal(8,2) NOT NULL,
  `from_long` decimal(8,2) NOT NULL,
  `to_lat` decimal(8,2) NOT NULL,
  `to_long` decimal(8,2) NOT NULL,
  `description` text NOT NULL,
  `cost` decimal(8,2) DEFAULT NULL,
  `status` enum('upcoming','completed','cancelled','receive') DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `address_id` bigint(20) UNSIGNED DEFAULT NULL,
  `receiver_data_id` bigint(20) UNSIGNED NOT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `sender_data_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `otp` varchar(255) NOT NULL,
  `isVerified` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `phone`, `gender`, `image`, `otp`, `isVerified`, `created_at`, `updated_at`) VALUES
(1, 'Lessie Gottlieb', 'admin@admin.com', '2024-02-22 11:16:00', '$2y$12$CKdGLD2IsLj/qFFAD7H8huh44hrFLsyHBSnGm0klM.UP1CxsnvYCe', 'hY7AdBDX8MLV6rxLP1PHEaGgQl8bnmjK2KhyjAqVanBIZVamm72SieohAm7M', '01147533533', 'male', NULL, '', 1, '2024-02-22 11:16:00', '2024-02-22 11:16:00'),
(43, 'ss', 'ss@ss.com', NULL, '$2y$12$RseBk1km4w.1CBKeaIFTreK./uK8ZuewHSZFAr/63ZbSA5bS2x43.', NULL, '01010', 'male', NULL, '98946', 0, '2024-02-25 10:31:26', '2024-02-25 10:31:26'),
(44, 'ss', 'ss@ss.coms', NULL, '$2y$12$y59QnLUYDMd5ujnVqFeUve.PbysrG1JlV4ZTh1JR9A7vJcGaw2xHm', NULL, '010101', 'male', NULL, '96572', 0, '2024-02-25 10:34:57', '2024-02-25 10:34:57');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `name`, `image`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Dante Lehner', NULL, 2165.61, '2024-02-22 11:16:03', '2024-02-22 11:16:03'),
(2, 'Prof. Adam Little', NULL, 8801.31, '2024-02-22 11:16:03', '2024-02-22 11:16:03'),
(3, 'Hugh Littel', NULL, 4471.90, '2024-02-22 11:16:04', '2024-02-22 11:16:04'),
(4, 'Ryan Brekke', NULL, 4979.10, '2024-02-22 11:16:04', '2024-02-22 11:16:04'),
(5, 'Coralie Gerhold', NULL, 5138.03, '2024-02-22 11:16:04', '2024-02-22 11:16:04'),
(6, 'Lucas Tromp', NULL, 5706.15, '2024-02-22 11:16:04', '2024-02-22 11:16:04'),
(7, 'Ari Moen', NULL, 3790.32, '2024-02-22 11:16:05', '2024-02-22 11:16:05'),
(8, 'Prof. Aurore Zemlak', NULL, 7465.77, '2024-02-22 11:16:05', '2024-02-22 11:16:05'),
(9, 'Boris Cassin', NULL, 4061.83, '2024-02-22 11:16:05', '2024-02-22 11:16:05'),
(10, 'Mike McDermott', NULL, 4335.37, '2024-02-22 11:16:05', '2024-02-22 11:16:05'),
(11, 'Kenyatta Welch', NULL, 9081.81, '2024-02-22 11:16:05', '2024-02-22 11:16:05'),
(12, 'Kenya Walker I', NULL, 6778.46, '2024-02-22 11:16:05', '2024-02-22 11:16:05'),
(13, 'Pinkie Schneider', NULL, 9041.81, '2024-02-22 11:16:05', '2024-02-22 11:16:05'),
(14, 'Keon Witting', NULL, 993.85, '2024-02-22 11:16:05', '2024-02-22 11:16:05'),
(15, 'Blaze Jones', NULL, 9079.96, '2024-02-22 11:16:05', '2024-02-22 11:16:05'),
(16, 'Juliet Brakus', NULL, 1258.67, '2024-02-22 11:16:06', '2024-02-22 11:16:06'),
(17, 'Dr. Carmela Ledner', NULL, 8834.87, '2024-02-22 11:16:06', '2024-02-22 11:16:06'),
(18, 'Elsa Wuckert', NULL, 1591.75, '2024-02-22 11:16:06', '2024-02-22 11:16:06'),
(19, 'Susana Gusikowski', NULL, 9097.47, '2024-02-22 11:16:06', '2024-02-22 11:16:06'),
(20, 'Jimmie Homenick', NULL, 446.45, '2024-02-22 11:16:07', '2024-02-22 11:16:07'),
(21, 'Gilbert Farrell', NULL, 1976.14, '2024-02-22 11:16:07', '2024-02-22 11:16:07'),
(22, 'Shawna Kautzer', NULL, 3112.66, '2024-02-22 11:16:07', '2024-02-22 11:16:07'),
(23, 'Mr. Jordy Marquardt', NULL, 8560.28, '2024-02-22 11:16:07', '2024-02-22 11:16:07'),
(24, 'Mortimer Gorczany MD', NULL, 5726.25, '2024-02-22 11:16:07', '2024-02-22 11:16:07'),
(25, 'Mekhi Corwin', NULL, 9050.37, '2024-02-22 11:16:08', '2024-02-22 11:16:08'),
(26, 'Elian Kreiger', NULL, 9785.94, '2024-02-22 11:16:08', '2024-02-22 11:16:08'),
(27, 'Prof. Ismael Bruen', NULL, 189.80, '2024-02-22 11:16:08', '2024-02-22 11:16:08'),
(28, 'Gerald Kemmer', NULL, 3204.11, '2024-02-22 11:16:08', '2024-02-22 11:16:08'),
(29, 'Ms. Nella Pagac Sr.', NULL, 7747.24, '2024-02-22 11:16:08', '2024-02-22 11:16:08'),
(30, 'Antoinette Witting DVM', NULL, 5275.30, '2024-02-22 11:16:09', '2024-02-22 11:16:09'),
(31, 'Lillian Terry', NULL, 2337.79, '2024-02-22 11:16:10', '2024-02-22 11:16:10'),
(32, 'Fabian Pollich', NULL, 5740.70, '2024-02-22 11:16:10', '2024-02-22 11:16:10'),
(33, 'Dr. Tatyana Hettinger', NULL, 3075.77, '2024-02-22 11:16:10', '2024-02-22 11:16:10'),
(34, 'Elsie Kulas', NULL, 1093.56, '2024-02-22 11:16:10', '2024-02-22 11:16:10'),
(35, 'Constantin Jacobs', NULL, 9220.57, '2024-02-22 11:16:10', '2024-02-22 11:16:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `arrives`
--
ALTER TABLE `arrives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `arrives_user_id_foreign` (`user_id`),
  ADD KEY `arrives_captain_id_foreign` (`captain_id`),
  ADD KEY `arrives_vehicle_id_foreign` (`vehicle_id`),
  ADD KEY `arrives_location_id_foreign` (`location_id`),
  ADD KEY `arrives_address_id_foreign` (`address_id`);

--
-- Indexes for table `captains`
--
ALTER TABLE `captains`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `captains_email_unique` (`email`),
  ADD UNIQUE KEY `captains_vehicle_number_unique` (`vehicle_number`),
  ADD UNIQUE KEY `captains_phone_unique` (`phone`),
  ADD UNIQUE KEY `captains_otp_unique` (`otp`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `our_data`
--
ALTER TABLE `our_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`),
  ADD KEY `profiles_captain_id_foreign` (`captain_id`);

--
-- Indexes for table `receiver_data`
--
ALTER TABLE `receiver_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sender_data`
--
ALTER TABLE `sender_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipments_captain_id_foreign` (`captain_id`),
  ADD KEY `shipments_user_id_foreign` (`user_id`),
  ADD KEY `shipments_category_id_foreign` (`category_id`),
  ADD KEY `shipments_vehicle_id_foreign` (`vehicle_id`),
  ADD KEY `shipments_address_id_foreign` (`address_id`),
  ADD KEY `shipments_receiver_data_id_foreign` (`receiver_data_id`),
  ADD KEY `shipments_location_id_foreign` (`location_id`),
  ADD KEY `shipments_sender_data_id_foreign` (`sender_data_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_otp_unique` (`otp`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `arrives`
--
ALTER TABLE `arrives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `captains`
--
ALTER TABLE `captains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `our_data`
--
ALTER TABLE `our_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `receiver_data`
--
ALTER TABLE `receiver_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sender_data`
--
ALTER TABLE `sender_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `arrives`
--
ALTER TABLE `arrives`
  ADD CONSTRAINT `arrives_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `arrives_captain_id_foreign` FOREIGN KEY (`captain_id`) REFERENCES `captains` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `arrives_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `arrives_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `arrives_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_captain_id_foreign` FOREIGN KEY (`captain_id`) REFERENCES `captains` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shipments`
--
ALTER TABLE `shipments`
  ADD CONSTRAINT `shipments_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shipments_captain_id_foreign` FOREIGN KEY (`captain_id`) REFERENCES `captains` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shipments_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shipments_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shipments_receiver_data_id_foreign` FOREIGN KEY (`receiver_data_id`) REFERENCES `receiver_data` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shipments_sender_data_id_foreign` FOREIGN KEY (`sender_data_id`) REFERENCES `sender_data` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shipments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shipments_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
