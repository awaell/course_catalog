-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 22, 2024 at 12:43 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course_catalog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `parent` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent`, `created_at`, `updated_at`) VALUES
('0c1d2e3f-4a5b-6c7d-8e9f-0a1b2c3d4e5f', 'Destinations', '9b0c1d2e-3f4a-5b6c-7d8e-9f0a1b2c3d4e', '2024-04-21 23:37:48', '2024-04-21 23:37:48'),
('0e1f2a3b-4c5d-6e7f-8a9b-0c1d2e3f4a5b', 'Arts & Entertainment', NULL, '2024-04-21 23:37:48', '2024-04-21 23:37:48'),
('1c2a3b4d-5e6f-7a8b-9c0d-1e2f3a4b5c6d', 'Technology', NULL, '2024-04-21 23:37:48', '2024-04-21 23:37:48'),
('1d2e3f4a-5b6c-7d8e-9f0a-1b2c3d4e5f6a', 'Travel Tips', '9b0c1d2e-3f4a-5b6c-7d8e-9f0a1b2c3d4e', '2024-04-21 23:37:48', '2024-04-21 23:37:48'),
('1f2a3b4c-5d6e-7f8a-9b0c-1d2e3f4a5b6c', 'Visual Arts', '0e1f2a3b-4c5d-6e7f-8a9b-0c1d2e3f4a5b', '2024-04-21 23:37:48', '2024-04-21 23:37:48'),
('2a3b4c5d-6e7f-8a9b-0c1d-2e3f4a5b6c7d', 'Performing Arts', '0e1f2a3b-4c5d-6e7f-8a9b-0c1d2e3f4a5b', '2024-04-21 23:37:48', '2024-04-21 23:37:48'),
('2c3d4e5f-6a7b-8c9d-0e1f-2a3b4c5d6e7f', 'Software Development', '1c2a3b4d-5e6f-7a8b-9c0d-1e2f3a4b5c6d', '2024-04-21 23:37:48', '2024-04-21 23:37:48'),
('3b4c5d6e-7f8a-9b0c-1d2e-3f4a5b6c7d8e', 'Science & Nature', NULL, '2024-04-21 23:37:48', '2024-04-21 23:37:48'),
('3d4e5f6a-7b8c-9d0e-1f2a-3b4c5d6e7f82', 'Hardware Engineering 3', '3d4e5f6a-7b8c-9d0e-1f2a-3b4c5d6e7f8a', '2024-04-21 23:37:48', '2024-04-21 23:37:48'),
('3d4e5f6a-7b8c-9d0e-1f2a-3b4c5d6e7f8a', 'Hardware Engineering 2', '2c3d4e5f-6a7b-8c9d-0e1f-2a3b4c5d6e7f', '2024-04-21 23:37:48', '2024-04-21 23:37:48'),
('4c5d6e7f-8a9b-0c1d-2e3f-4a5b6c7d8e9f', 'Biology', '3b4c5d6e-7f8a-9b0c-1d2e-3f4a5b6c7d8e', '2024-04-21 23:37:48', '2024-04-21 23:37:48'),
('4e5f6a7b-8c9d-0e1f-2a3b-4c5d6e7f8a9b', 'Education', NULL, '2024-04-21 23:37:48', '2024-04-21 23:37:48'),
('5d6e7f8a-9b0c-1d2e-3f4a-5b6c7d8e9f0a', 'Physics', '3b4c5d6e-7f8a-9b0c-1d2e-3f4a5b6c7d8e', '2024-04-21 23:37:48', '2024-04-21 23:37:48'),
('5f6a7b8c-9d0e-1f2a-3b4c-5d6e7f8a9b0c', 'Higher Education', '4e5f6a7b-8c9d-0e1f-2a3b-4c5d6e7f8a9b', '2024-04-21 23:37:48', '2024-04-21 23:37:48'),
('6a7b8c9d-0e1f-2a3b-4c5d-6e7f8a9b0c1d', 'K-12 Education', '4e5f6a7b-8c9d-0e1f-2a3b-4c5d6e7f8a9b', '2024-04-21 23:37:48', '2024-04-21 23:37:48'),
('6e7f8a9b-0c1d-2e3f-4a5b-6c7d8e9f0a1b', 'Food & Cooking', NULL, '2024-04-21 23:37:48', '2024-04-21 23:37:48'),
('7b8c9d0e-1f2a-3b4c-5d6e-7f8a9b0c1d2e', 'Health & Wellness', NULL, '2024-04-21 23:37:48', '2024-04-21 23:37:48'),
('7f8a9b0c-1d2e-3f4a-5b6c-7d8e9f0a1b2c', 'Recipes', '6e7f8a9b-0c1d-2e3f-4a5b-6c7d8e9f0a1b', '2024-04-21 23:37:48', '2024-04-21 23:37:48'),
('8a9b0c1d-2e3f-4a5b-6c7d-8e9f0a1b2c3d', 'Culinary Techniques', '6e7f8a9b-0c1d-2e3f-4a5b-6c7d8e9f0a1b', '2024-04-21 23:37:48', '2024-04-21 23:37:48'),
('8c9d0e1f-2a3b-4c5d-6e7f-8a9b0c1d2e3f', 'Fitness & Nutrition', '7b8c9d0e-1f2a-3b4c-5d6e-7f8a9b0c1d2e', '2024-04-21 23:37:48', '2024-04-21 23:37:48'),
('9b0c1d2e-3f4a-5b6c-7d8e-9f0a1b2c3d4e', 'Travel & Tourism', NULL, '2024-04-21 23:37:48', '2024-04-21 23:37:48'),
('9d0e1f2a-3b4c-5d6e-7f8a-9b0c1d2e3f4a', 'Mental Health', '7b8c9d0e-1f2a-3b4c-5d6e-7f8a9b0c1d2e', '2024-04-21 23:37:48', '2024-04-21 23:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `image_preview` varchar(100) NOT NULL,
  `category_id` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `title`, `description`, `image_preview`, `category_id`, `created_at`, `updated_at`) VALUES
('L373312762', 'Finance and Accounting Basics for Nonfinancial Exe', 'Financial knowledge is vital to an executive’s role in a business, but the systems within a business', 'https://cdn0.knowledgecity.com/opencontent/courses/previews/L373312762/800--v112243.jpg', '4e5f6a7b-8c9d-0e1f-2a3b-4c5d6e7f8a9b', '2024-04-21 13:20:44', '2024-04-21 13:20:44'),
('L373319845', 'Financial Statements and Reporting for Nonfinancia', 'Financial statements are a critical part of attracting investors. Financial reports like income stat', 'https://cdn0.knowledgecity.com/opencontent/courses/previews/L373319845/800--v112244.jpg', '5f6a7b8c-9d0e-1f2a-3b4c-5d6e7f8a9b0c', '2024-04-21 13:20:44', '2024-04-21 13:20:44'),
('L373324687', 'Applying Yourself to Diverse and Inclusive Leaders', 'Improving diversity in the workplace requires strategic planning and mindful consideration from ever', 'https://cdn0.knowledgecity.com/opencontent/courses/previews/L373324687/800--v112241.jpg', '3d4e5f6a-7b8c-9d0e-1f2a-3b4c5d6e7f82', '2024-04-21 13:20:44', '2024-04-21 13:20:44'),
('L373327593', 'Financial Planning and Analysis for Nonfinancial E', 'With constant market fluctuation and an unpredictable supply chain, sometimes it can be difficult to', 'https://cdn0.knowledgecity.com/opencontent/courses/previews/L373327593/800--v112246.jpg', '7b8c9d0e-1f2a-3b4c-5d6e-7f8a9b0c1d2e', '2024-04-21 13:20:44', '2024-04-21 13:20:44'),
('L373337574', 'Defining Cross-Cultural Leadership', 'The modern business landscape is noticeably globalized. People from many countries and cultures work', 'https://cdn0.knowledgecity.com/opencontent/courses/previews/L373337574/800--v112262.jpg', '8a9b0c1d-2e3f-4a5b-6c7d-8e9f0a1b2c3d', '2024-04-21 13:20:44', '2024-04-21 13:20:44'),
('L373349028', 'Diversity and Inclusion for a Better Business', 'Diversity can seem like a difficult concept to incorporate into the culture of a business. Leaders o', 'https://cdn0.knowledgecity.com/opencontent/courses/previews/L373349028/800--v112240.jpg', '3d4e5f6a-7b8c-9d0e-1f2a-3b4c5d6e7f8a', '2024-04-21 13:20:44', '2024-04-21 13:20:44'),
('L373371072', 'Leadership for Identity Diversity', 'As a leader, people of many different backgrounds will look to you for guidance and security in the ', 'https://cdn0.knowledgecity.com/opencontent/courses/previews/L373371072/800--v112239.jpg', '3d4e5f6a-7b8c-9d0e-1f2a-3b4c5d6e7f8a', '2024-04-21 13:20:44', '2024-04-21 13:20:44'),
('L373395597', 'Valuation for Nonfinancial Executives', 'Investments always involve a bit of risk, but you can lower that risk by analyzing your company’s cu', 'https://cdn0.knowledgecity.com/opencontent/courses/previews/L373395597/800--v112241.jpg', '1f2a3b4c-5d6e-7f8a-9b0c-1d2e3f4a5b6c', '2024-04-21 13:20:44', '2024-04-21 13:20:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
