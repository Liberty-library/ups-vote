-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 08, 2025 at 08:26 PM
-- Server version: 8.0.41-0ubuntu0.24.04.1
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `AVideo`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_views`
--

CREATE TABLE `all_views` (
  `guest_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `post_id` int NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `article_id` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `source` varchar(255) DEFAULT NULL,
  `published_at` datetime DEFAULT NULL,
  `summary` text,
  `content` text,
  `status` enum('pending','posted','imported') DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `image_url` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comm_id` int NOT NULL,
  `post_id` int NOT NULL,
  `user_id` int NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('NORMAL','DELETED') NOT NULL DEFAULT 'NORMAL',
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comm_control_log`
--

CREATE TABLE `comm_control_log` (
  `log_id` int NOT NULL,
  `comm_id` int NOT NULL,
  `mod_id` int NOT NULL,
  `action` enum('DELETE','UNDELETE') NOT NULL,
  `comment` varchar(300) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comm_reports`
--

CREATE TABLE `comm_reports` (
  `report_id` int NOT NULL,
  `comm_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comm_votes`
--

CREATE TABLE `comm_votes` (
  `comm_id` int NOT NULL,
  `user_id` int NOT NULL,
  `vote` enum('UP','DOWN') NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `guest_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id` int NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_log`
--

CREATE TABLE `login_log` (
  `user_id` int NOT NULL,
  `ip` char(45) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `result` enum('SUCCESS','FAILURE') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plugins`
--

CREATE TABLE `plugins` (
  `id` int NOT NULL,
  `uuid` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_general_ci NOT NULL,
  `object_data` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pms`
--

CREATE TABLE `pms` (
  `pm_id` int NOT NULL,
  `sender` int NOT NULL,
  `receiver` int NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `subject` varchar(300) DEFAULT NULL,
  `msg` text NOT NULL,
  `read_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int NOT NULL,
  `soc_id` int NOT NULL,
  `user_id` int NOT NULL,
  `status` enum('NORMAL','DELETED','LOCKED','STICKIED','SUPER') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'NORMAL',
  `title` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image_location` varchar(264) CHARACTER SET utf16 COLLATE utf16_unicode_520_ci DEFAULT NULL,
  `thumbnail_location` varchar(255) CHARACTER SET utf16 COLLATE utf16_unicode_520_ci DEFAULT NULL,
  `url` text CHARACTER SET utf16 COLLATE utf16_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post_control_log`
--

CREATE TABLE `post_control_log` (
  `log_id` int NOT NULL,
  `post_id` int NOT NULL,
  `mod_id` int NOT NULL,
  `action` enum('DELETE','UNDELETE','STICKY','UNSTICKY') NOT NULL,
  `comment` varchar(300) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post_reports`
--

CREATE TABLE `post_reports` (
  `report_id` int NOT NULL,
  `post_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post_subs`
--

CREATE TABLE `post_subs` (
  `post_id` int NOT NULL,
  `user_id` int NOT NULL,
  `time` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post_views`
--

CREATE TABLE `post_views` (
  `post_id` int NOT NULL,
  `user_id` int NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post_votes`
--

CREATE TABLE `post_votes` (
  `post_id` int NOT NULL,
  `user_id` int NOT NULL,
  `vote` enum('UP','DOWN') NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int NOT NULL,
  `user_id` int NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `societies`
--

CREATE TABLE `societies` (
  `soc_id` int NOT NULL,
  `soc_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_by` int NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('NORMAL','DELETED','LOCKED') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'NORMAL',
  `rev_id` int DEFAULT NULL,
  `image_location2` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `soc_bans`
--

CREATE TABLE `soc_bans` (
  `soc_id` int NOT NULL,
  `user_id` int NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `soc_control_admin_log`
--

CREATE TABLE `soc_control_admin_log` (
  `log_id` int NOT NULL,
  `admin_id` int NOT NULL,
  `soc_id` int NOT NULL,
  `action` enum('DELETE','UNDELETE','LOCK','UNLOCK') NOT NULL,
  `comment` varchar(300) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `soc_cover`
--

CREATE TABLE `soc_cover` (
  `soc_cover_location` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `soc_id` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `soc_css`
--

CREATE TABLE `soc_css` (
  `soc_id` int NOT NULL,
  `css_text` varchar(3000) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `soc_details`
--

CREATE TABLE `soc_details` (
  `rev_id` int NOT NULL,
  `soc_id` int NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `revised_by` int NOT NULL,
  `info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `soc_mods`
--

CREATE TABLE `soc_mods` (
  `soc_id` int NOT NULL,
  `user_id` int NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `soc_reports`
--

CREATE TABLE `soc_reports` (
  `report_id` int NOT NULL,
  `soc_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `soc_subs`
--

CREATE TABLE `soc_subs` (
  `soc_id` int NOT NULL,
  `user_id` int NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `guest_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `soc_views`
--

CREATE TABLE `soc_views` (
  `soc_id` int NOT NULL,
  `user_id` int NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('ADMIN','NORMAL','BANNED') NOT NULL DEFAULT 'NORMAL',
  `failed_logins` int UNSIGNED NOT NULL DEFAULT '0',
  `join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image` varchar(1054) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_activity`
--

CREATE TABLE `user_activity` (
  `user_id` int NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_control_admin_log`
--

CREATE TABLE `user_control_admin_log` (
  `log_id` int NOT NULL,
  `admin_id` int NOT NULL,
  `user_id` int NOT NULL,
  `action` enum('DELETE','UNDELETE','BAN','UNBAN','ADMIN','DEADMIN') NOT NULL,
  `comment` varchar(300) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_control_mod_log`
--

CREATE TABLE `user_control_mod_log` (
  `log_id` int NOT NULL,
  `mod_id` int NOT NULL,
  `user_id` int NOT NULL,
  `soc_id` int NOT NULL,
  `action` enum('BAN','UNBAN','MOD','DEMOD') NOT NULL,
  `comment` varchar(300) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_reports`
--

CREATE TABLE `user_reports` (
  `report_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text,
  `page_visited` varchar(255) DEFAULT NULL,
  `visit_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_views`
--
ALTER TABLE `all_views`
  ADD KEY `guestid` (`guest_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`),
  ADD UNIQUE KEY `unique_url` (`url`(255));

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comm_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `comm_control_log`
--
ALTER TABLE `comm_control_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `comm_id` (`comm_id`),
  ADD KEY `mod_id` (`mod_id`);
ALTER TABLE `comm_control_log` ADD FULLTEXT KEY `comment` (`comment`);

--
-- Indexes for table `comm_reports`
--
ALTER TABLE `comm_reports`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `comm_id` (`comm_id`);

--
-- Indexes for table `comm_votes`
--
ALTER TABLE `comm_votes`
  ADD PRIMARY KEY (`comm_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_log`
--
ALTER TABLE `login_log`
  ADD PRIMARY KEY (`user_id`,`time`);

--
-- Indexes for table `plugins`
--
ALTER TABLE `plugins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pms`
--
ALTER TABLE `pms`
  ADD PRIMARY KEY (`pm_id`),
  ADD KEY `sender` (`sender`),
  ADD KEY `receiver` (`receiver`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `soc_id` (`soc_id`),
  ADD KEY `user_id` (`user_id`);
ALTER TABLE `posts` ADD FULLTEXT KEY `title` (`title`);

--
-- Indexes for table `post_control_log`
--
ALTER TABLE `post_control_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `mod_id` (`mod_id`),
  ADD KEY `post_id` (`post_id`);
ALTER TABLE `post_control_log` ADD FULLTEXT KEY `comment` (`comment`);

--
-- Indexes for table `post_reports`
--
ALTER TABLE `post_reports`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `post_subs`
--
ALTER TABLE `post_subs`
  ADD PRIMARY KEY (`post_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `post_views`
--
ALTER TABLE `post_views`
  ADD PRIMARY KEY (`post_id`,`user_id`,`time`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `post_votes`
--
ALTER TABLE `post_votes`
  ADD PRIMARY KEY (`post_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);
ALTER TABLE `reports` ADD FULLTEXT KEY `reason` (`reason`);

--
-- Indexes for table `societies`
--
ALTER TABLE `societies`
  ADD PRIMARY KEY (`soc_id`),
  ADD UNIQUE KEY `soc_name` (`soc_name`),
  ADD UNIQUE KEY `det_revision` (`rev_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `soc_bans`
--
ALTER TABLE `soc_bans`
  ADD PRIMARY KEY (`soc_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `soc_control_admin_log`
--
ALTER TABLE `soc_control_admin_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `soc_id` (`soc_id`);
ALTER TABLE `soc_control_admin_log` ADD FULLTEXT KEY `comment` (`comment`);

--
-- Indexes for table `soc_cover`
--
ALTER TABLE `soc_cover`
  ADD PRIMARY KEY (`soc_cover_location`),
  ADD UNIQUE KEY `soc_cover_location` (`soc_cover_location`),
  ADD KEY `soc_id` (`soc_id`);

--
-- Indexes for table `soc_css`
--
ALTER TABLE `soc_css`
  ADD PRIMARY KEY (`soc_id`);

--
-- Indexes for table `soc_details`
--
ALTER TABLE `soc_details`
  ADD PRIMARY KEY (`rev_id`),
  ADD KEY `soc_id` (`soc_id`),
  ADD KEY `revised_by` (`revised_by`);

--
-- Indexes for table `soc_mods`
--
ALTER TABLE `soc_mods`
  ADD PRIMARY KEY (`soc_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `soc_reports`
--
ALTER TABLE `soc_reports`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `soc_id` (`soc_id`);

--
-- Indexes for table `soc_subs`
--
ALTER TABLE `soc_subs`
  ADD PRIMARY KEY (`soc_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `soc_views`
--
ALTER TABLE `soc_views`
  ADD KEY `soc_id` (`soc_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_control_admin_log`
--
ALTER TABLE `user_control_admin_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `user_id` (`user_id`);
ALTER TABLE `user_control_admin_log` ADD FULLTEXT KEY `comment` (`comment`);

--
-- Indexes for table `user_control_mod_log`
--
ALTER TABLE `user_control_mod_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `mod_id` (`mod_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `soc_id` (`soc_id`);
ALTER TABLE `user_control_mod_log` ADD FULLTEXT KEY `comment` (`comment`);

--
-- Indexes for table `user_reports`
--
ALTER TABLE `user_reports`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comm_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comm_control_log`
--
ALTER TABLE `comm_control_log`
  MODIFY `log_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plugins`
--
ALTER TABLE `plugins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pms`
--
ALTER TABLE `pms`
  MODIFY `pm_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_control_log`
--
ALTER TABLE `post_control_log`
  MODIFY `log_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `societies`
--
ALTER TABLE `societies`
  MODIFY `soc_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `soc_control_admin_log`
--
ALTER TABLE `soc_control_admin_log`
  MODIFY `log_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `soc_details`
--
ALTER TABLE `soc_details`
  MODIFY `rev_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_control_admin_log`
--
ALTER TABLE `user_control_admin_log`
  MODIFY `log_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_control_mod_log`
--
ALTER TABLE `user_control_mod_log`
  MODIFY `log_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`parent_id`) REFERENCES `comments` (`comm_id`),
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `comm_control_log`
--
ALTER TABLE `comm_control_log`
  ADD CONSTRAINT `comm_control_log_ibfk_1` FOREIGN KEY (`comm_id`) REFERENCES `comments` (`comm_id`),
  ADD CONSTRAINT `comm_control_log_ibfk_2` FOREIGN KEY (`mod_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `comm_reports`
--
ALTER TABLE `comm_reports`
  ADD CONSTRAINT `comm_reports_ibfk_1` FOREIGN KEY (`report_id`) REFERENCES `reports` (`report_id`),
  ADD CONSTRAINT `comm_reports_ibfk_2` FOREIGN KEY (`comm_id`) REFERENCES `comments` (`comm_id`);

--
-- Constraints for table `comm_votes`
--
ALTER TABLE `comm_votes`
  ADD CONSTRAINT `comm_votes_ibfk_1` FOREIGN KEY (`comm_id`) REFERENCES `comments` (`comm_id`),
  ADD CONSTRAINT `comm_votes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `login_log`
--
ALTER TABLE `login_log`
  ADD CONSTRAINT `login_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `pms`
--
ALTER TABLE `pms`
  ADD CONSTRAINT `pms_ibfk_1` FOREIGN KEY (`sender`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `pms_ibfk_2` FOREIGN KEY (`receiver`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`soc_id`) REFERENCES `societies` (`soc_id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `post_control_log`
--
ALTER TABLE `post_control_log`
  ADD CONSTRAINT `post_control_log_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`),
  ADD CONSTRAINT `post_control_log_ibfk_2` FOREIGN KEY (`mod_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `post_reports`
--
ALTER TABLE `post_reports`
  ADD CONSTRAINT `post_reports_ibfk_1` FOREIGN KEY (`report_id`) REFERENCES `reports` (`report_id`),
  ADD CONSTRAINT `post_reports_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `post_subs`
--
ALTER TABLE `post_subs`
  ADD CONSTRAINT `post_subs_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`),
  ADD CONSTRAINT `post_subs_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `post_views`
--
ALTER TABLE `post_views`
  ADD CONSTRAINT `post_views_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`),
  ADD CONSTRAINT `post_views_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `post_votes`
--
ALTER TABLE `post_votes`
  ADD CONSTRAINT `post_votes_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`),
  ADD CONSTRAINT `post_votes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `societies`
--
ALTER TABLE `societies`
  ADD CONSTRAINT `societies_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `societies_ibfk_2` FOREIGN KEY (`rev_id`) REFERENCES `soc_details` (`rev_id`);

--
-- Constraints for table `soc_bans`
--
ALTER TABLE `soc_bans`
  ADD CONSTRAINT `soc_bans_ibfk_1` FOREIGN KEY (`soc_id`) REFERENCES `societies` (`soc_id`),
  ADD CONSTRAINT `soc_bans_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `soc_control_admin_log`
--
ALTER TABLE `soc_control_admin_log`
  ADD CONSTRAINT `soc_control_admin_log_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `soc_control_admin_log_ibfk_2` FOREIGN KEY (`soc_id`) REFERENCES `societies` (`soc_id`);

--
-- Constraints for table `soc_css`
--
ALTER TABLE `soc_css`
  ADD CONSTRAINT `soc_css_ibfk_1` FOREIGN KEY (`soc_id`) REFERENCES `societies` (`soc_id`);

--
-- Constraints for table `soc_details`
--
ALTER TABLE `soc_details`
  ADD CONSTRAINT `soc_details_ibfk_1` FOREIGN KEY (`soc_id`) REFERENCES `societies` (`soc_id`),
  ADD CONSTRAINT `soc_details_ibfk_2` FOREIGN KEY (`revised_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `soc_mods`
--
ALTER TABLE `soc_mods`
  ADD CONSTRAINT `soc_mods_ibfk_1` FOREIGN KEY (`soc_id`) REFERENCES `societies` (`soc_id`),
  ADD CONSTRAINT `soc_mods_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `soc_reports`
--
ALTER TABLE `soc_reports`
  ADD CONSTRAINT `soc_reports_ibfk_1` FOREIGN KEY (`soc_id`) REFERENCES `societies` (`soc_id`),
  ADD CONSTRAINT `soc_reports_ibfk_2` FOREIGN KEY (`report_id`) REFERENCES `reports` (`report_id`);

--
-- Constraints for table `soc_subs`
--
ALTER TABLE `soc_subs`
  ADD CONSTRAINT `soc_subs_ibfk_1` FOREIGN KEY (`soc_id`) REFERENCES `societies` (`soc_id`),
  ADD CONSTRAINT `soc_subs_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `soc_views`
--
ALTER TABLE `soc_views`
  ADD CONSTRAINT `soc_views_ibfk_1` FOREIGN KEY (`soc_id`) REFERENCES `societies` (`soc_id`),
  ADD CONSTRAINT `soc_views_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD CONSTRAINT `user_activity_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `user_control_admin_log`
--
ALTER TABLE `user_control_admin_log`
  ADD CONSTRAINT `user_control_admin_log_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `user_control_admin_log_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `user_control_mod_log`
--
ALTER TABLE `user_control_mod_log`
  ADD CONSTRAINT `user_control_mod_log_ibfk_1` FOREIGN KEY (`mod_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `user_control_mod_log_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `user_control_mod_log_ibfk_3` FOREIGN KEY (`soc_id`) REFERENCES `societies` (`soc_id`);

--
-- Constraints for table `user_reports`
--
ALTER TABLE `user_reports`
  ADD CONSTRAINT `user_reports_ibfk_1` FOREIGN KEY (`report_id`) REFERENCES `reports` (`report_id`),
  ADD CONSTRAINT `user_reports_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
