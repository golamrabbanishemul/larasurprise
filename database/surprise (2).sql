-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 11, 2018 at 08:52 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surprise`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `parent_category` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` tinyint(4) DEFAULT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `parent_category`, `image`, `position`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'ABOUT', NULL, 0, '1522696624.jpeg', NULL, 1, '2018-04-01 13:31:09', '2018-04-03 12:19:34'),
(2, 'SERVICES', NULL, 0, NULL, NULL, 1, '2018-04-01 13:48:45', '2018-04-01 13:48:45'),
(3, 'TELECOMMUNICATION', NULL, 2, '1522612272.jpg', NULL, 1, '2018-04-01 13:51:13', '2018-04-01 13:51:13'),
(4, 'HARDWARE & SOFTWARE', '<p>Computer&nbsp;<strong>hardware</strong>&nbsp;is any physical device used in or with your machine, whereas&nbsp;<strong>software</strong>&nbsp;is a collection of code installed onto your computer\'s hard drive. For example, the computer monitor you are using to read this text and the mouse you are using to navigate this web page is computer&nbsp;<strong>hardware</strong></p>', 2, '1522612582.jpg', 4, 1, '2018-04-01 13:56:22', '2018-04-06 04:31:10'),
(5, 'UNDERGROUND FIBER LAYING SERVICE', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto assumenda blanditiis corporis delectus dolor, enim incidunt laborum nostrum officiis qui reiciendis sint tempora. Aliquam error explicabo illo minima placeat?</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto assumenda blanditiis corporis delectus dolor, enim incidunt laborum nostrum officiis qui reiciendis sint tempora. Aliquam error explicabo illo minima placeat?</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto assumenda blanditiis corporis delectus dolor, enim incidunt laborum nostrum officiis qui reiciendis sint tempora. Aliquam error explicabo illo minima placeat?</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto assumenda blanditiis corporis delectus dolor, enim incidunt laborum nostrum officiis qui reiciendis sint tempora. Aliquam error explicabo illo minima placeat?</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto assumenda blanditiis corporis delectus dolor, enim incidunt laborum nostrum officiis qui reiciendis sint tempora. Aliquam error explicabo illo minima placeat?</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto assumenda blanditiis corporis delectus dolor, enim incidunt laborum nostrum officiis qui reiciendis sint tempora. Aliquam error explicabo illo minima placeat?</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto assumenda blanditiis corporis delectus dolor, enim incidunt laborum nostrum officiis qui reiciendis sint tempora. Aliquam error explicabo illo minima placeat?</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto assumenda blanditiis corporis delectus dolor, enim incidunt laborum nostrum officiis qui reiciendis sint tempora. Aliquam error explicabo illo minima placeat?</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto assumenda blanditiis corporis delectus dolor, enim incidunt laborum nostrum officiis qui reiciendis sint tempora. Aliquam error explicabo illo minima placeat?</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto assumenda blanditiis corporis delectus dolor, enim incidunt laborum nostrum officiis qui reiciendis sint tempora. Aliquam error explicabo illo minima placeat?</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto assumenda blanditiis corporis delectus dolor, enim incidunt laborum nostrum officiis qui reiciendis sint tempora. Aliquam error explicabo illo minima placeat?</p>', 3, '1522951899.jpg', 1, 1, '2018-04-02 09:53:34', '2018-04-06 07:18:16'),
(6, 'UNDERGROUND OPTICAL FIBER CABLE', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aspernatur commodi dignissimos earum eligendi ipsam, iusto minus necessitatibus nesciunt obcaecati, odio quo repellendus repudiandae rerum sed sit velit voluptate. Incidunt.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aspernatur commodi dignissimos earum eligendi ipsam, iusto minus necessitatibus nesciunt obcaecati, odio quo repellendus repudiandae rerum sed sit velit voluptate. Incidunt.</p>', 3, '1522955286.jpg', 2, 1, '2018-04-02 10:08:00', '2018-04-06 04:17:13'),
(7, 'FIBER ACCESSORIES', '<p>my name is rabbanimy name is rabbanimy name is rabbanimy name is rabbanimy name is rabbanimy name is rabbanimy name is rabbanimy name is rabbanimy name is rabbanimy name is rabbanimy name is rabbanimy name is rabbanimy name is rabbanimy name is rabbanimy name is rabbanimy name is rabbanimy name is rabbanimy name is rabbanimy name is rabbanimy name is rabbanimy name is rabbanimy name is rabbanimy name is rabbani</p>', 2, '1522955712.png', 3, 1, '2018-04-02 10:08:40', '2018-04-06 04:08:22'),
(8, 'CONTACT US', NULL, 0, NULL, NULL, 1, '2018-04-02 13:41:47', '2018-04-03 12:19:23'),
(9, 'SURVEILLANCE SYSTEM', '<p><em>Surveillance</em>&nbsp;cameras are video cameras used for the purpose of observing an area. They are often connected to a recording device or IP network, and may be watched by a security guard or law enforcement officer.</p>', 2, '1523010417.jpg', 5, 1, '2018-04-03 12:18:58', '2018-04-06 04:26:57'),
(10, 'CONSTRUCTION', '<p><em>Construction</em>&nbsp;is the process of constructing a building or infrastructure.&nbsp;<em>Construction</em>&nbsp;differs from manufacturing in that manufacturing typically involves mass production of similar items without a designated purchaser, while&nbsp;<em>construction</em>typically takes place on location for a known client.</p>', 2, '1523010458.jpg', 6, 1, '2018-04-03 12:20:32', '2018-04-06 04:30:21'),
(11, 'MEDIA', NULL, 0, NULL, NULL, 1, '2018-04-03 12:21:42', '2018-04-03 12:21:42'),
(12, 'CLIENTS', NULL, 0, NULL, NULL, 1, '2018-04-03 12:22:05', '2018-04-03 12:22:05');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'Data Center', 1, '2018-04-11 09:36:50', '2018-04-11 10:49:48'),
(2, 'Open Cut', 1, '2018-04-11 09:37:05', '2018-04-11 09:37:05'),
(3, 'Ducting', 1, '2018-04-11 09:37:13', '2018-04-11 09:39:25');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_posts`
--

CREATE TABLE `gallery_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gallery_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_posts`
--

INSERT INTO `gallery_posts` (`id`, `title`, `image`, `gallery_id`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, NULL, '1523463624.png', '1', 1, '2018-04-11 10:20:24', '2018-04-11 12:37:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_03_29_172718_create_categories_table', 1),
(4, '2018_03_29_174752_create_posts_table', 1),
(5, '2018_04_04_170942_create_galleries_table', 2),
(6, '2018_04_11_154051_create_gallery_posts_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home` tinyint(4) DEFAULT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `category_id`, `image`, `home`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'Metro Transmission', '<p>solution by providing dark fibers to each customers. As a result, there is a discreet need of more dark fibers among all operators for providing backbone and end-to-end transmission solution, which can be mitigated through NTTN operators. SCL will provide minimum 100 Km dark fibers for next 3 years to these operators for facilitating their backbone solution and these dark fibers will be provided exclusively for their backbone solution and will restrict them to sublease these fibers to other operators.</p>', 5, '1523118026.jpg', NULL, 1, '2018-04-07 10:20:26', '2018-04-07 10:20:26'),
(2, 'Long Haul Transmission', '<p>Summit Communications Limited (SCL) has already established a state of the art active network of its own deploying the finest equipment for its transmission network system. We have utilized our own passive network and have successfully been able to provide services to numerous Active Network Service (ANS) Providers and Internet Service Providers (ISPs).</p>', 5, '1523126911.jpg', NULL, 1, '2018-04-07 12:48:31', '2018-04-07 12:48:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Golam Rabbain', 'shemul1990@yahoo.com', '$2y$10$lM.SloYegxoT0oo9HNCLWuJS8ZSHbqtKLWhaXlMwIYSl5opirk9NS', 'LIepcN4KASIfMatqvypNZHFQmKejVi45asPlDh74Z77WjrEMywV4trvrPSL7', '2018-04-01 09:06:47', '2018-04-01 09:06:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_posts`
--
ALTER TABLE `gallery_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery_posts`
--
ALTER TABLE `gallery_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
