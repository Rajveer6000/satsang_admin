-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 23, 2024 at 01:21 PM
-- Server version: 8.0.36-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE `markers` (
  `marker_id` int NOT NULL,
  `longitude` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `latitude` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `place_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`marker_id`, `longitude`, `latitude`, `type`, `place_name`, `email`, `created_at`) VALUES
(1, '92.8354288', '26.7010172', 'vegRestaurant', 'Green Leaf Cafe', 'abc@gmail.com', '2024-02-20 16:52:06'),
(2, '92.8345000', '26.7021000', 'accommodation', 'Eco Retreat', 'abc@gmail.com', '2024-02-20 16:52:06'),
(3, '92.8370000', '26.6998000', 'vegRestaurant', 'Fresh & Green Bistro', 'abc@gmail.com', '2024-02-20 16:52:06'),
(4, '92.8320000', '26.7030000', 'accommodation', 'Nature Inn', 'abc@gmail.com', '2024-02-20 16:52:06'),
(5, '92.8390000', '26.7005000', 'vegRestaurant', 'Herb Haven', 'abc@gmail.com', '2024-02-20 16:52:06'),
(9, '92.8356688', '26.7010188', 'accommodation', 'Sky-Life', 'csb21077@tezu.ac.in', '2024-02-23 17:46:22'),
(10, '92.8356688', '26.7010188', 'accommodation', 'Sky-Life', 'rajveerjdh2021@gmail.com', '2024-02-23 17:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `sno` int NOT NULL,
  `post_id` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_general_ci NOT NULL,
  `post_txt` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `category` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tag_id` int NOT NULL DEFAULT '0',
  `geo_id` int NOT NULL DEFAULT '0',
  `email` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `view` int NOT NULL DEFAULT '0',
  `city` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `state` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `country` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `moderated` int NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `post_img_idx` int DEFAULT NULL,
  `district` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`sno`, `post_id`, `post_title`, `post_txt`, `category`, `tag_id`, `geo_id`, `email`, `view`, `city`, `state`, `country`, `moderated`, `created_at`, `post_img_idx`, `district`) VALUES
(1, 'PO-01', 'Embracing the Essence of Satsang: A Journey of Spiritual Connection', 'In the tranquil embrace of nature, amidst the whispering leaves and the gentle caress of the breeze, lies a sanctuary for the soul - Satsang. It\'s not merely a gathering; it\'s an oasis of spiritual connection, where hearts converge and minds dissolve into the essence of oneness. Picture yourself in the midst of a circle, surrounded by seekers of truth, each breath resonating with the ancient hymns of wisdom. As the sun dips below the horizon, casting hues of crimson and gold, the air becomes saturated with a sense of divine presence. Here, amidst the shared silence and collective yearning, we embark on a journey beyond the mundane, transcending the barriers of ego and identity. In the company of kindred spirits, we traverse the inner landscapes of our being, exploring the depths of our consciousness and unraveling the mysteries of existence. Satsang is not confined to the walls of a temple or the pages of scripture; it\'s a state of being, a communion with the divine that transcends time and space. It\'s a reminder that amidst the chaos of life, there exists a sanctuary within, where the soul finds solace and the spirit finds sustenance. So, let us embrace the essence of Satsang - not as a mere ritual, but as a sacred journey of self-discovery and spiritual awakening.', 'vegetarian restaurant', 0, 0, 'abc@gmail.com', 0, 'CITY', 'STATE', 'COUNTRY', 1, '2024-02-03 13:23:41', 1, NULL),
(2, 'PO-02', 'The Path to Enlightenment: Finding Inner Peace', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi.', 'vegetarian restaurant', 0, 0, 'abc@gmail.com', 0, 'CITY', 'STATE', 'COUNTRY', 1, '2024-02-03 14:49:28', 2, NULL),
(5, 'PO-12', 'Finding Serenity in the Chaos: A Journey of Transformation', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi.', 'satsang', 0, 0, 'abc@gmail.com', 0, 'CITY', 'STATE', 'COUNTRY', 1, '2024-02-03 15:10:26', 3, NULL),
(6, 'PO-13', 'Discovering the Power Within: Unlocking Spiritual Wisdom', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi.', 'satsang', 0, 0, 'abc@gmail.com', 0, 'CITY', 'STATE', 'COUNTRY', 1, '2024-02-03 15:12:48', 2, NULL),
(7, 'PO-14', 'Embracing Change: The Journey to Self-Discovery', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi.', 'satsang', 0, 0, 'abc@gmail.com', 0, 'CITY', 'STATE', 'COUNTRY', 0, '2024-02-03 15:14:12', 3, NULL),
(12, 'PO-11', 'Community Bonding: The Essence of Satsang', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi.', 'vegetarian restaurant', 0, 0, 'abc@gmail.com', 0, 'CITY', 'STATE', 'COUNTRY', 0, '2024-02-03 15:28:57', 6, NULL),
(28, 'PO-28', 'The Art of Mindfulness: Cultivating Inner Peace', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi.', 'satsang assam', 0, 0, 'abc@gmail.com', 0, 'CITY', 'STATE', 'COUNTRY', 0, '2024-02-03 15:44:40', 4, NULL),
(29, 'PO-29', 'Building Connections: Strengthening the Community Through Satsang', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi.', 'satsang assam', 0, 0, 'abc@gmail.com', 0, 'CITY', 'STATE', 'COUNTRY', 1, '2024-02-03 15:44:57', 5, NULL),
(32, 'PO-32', 'The Power of Presence: Nurturing Spiritual Growth', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi.', 'satsang assam', 0, 0, 'abc@gmail.com', 0, 'CITY', 'STATE', 'COUNTRY', 1, '2024-02-03 23:48:33', 6, NULL),
(33, 'PO-33', 'Seeking Enlightenment: The Quest for Meaningful Existence', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi.', 'param pujyapada sri sri acharya dev', 0, 0, 'abc@gmail.com', 0, 'CITY', 'STATE', 'COUNTRY', 1, '2024-02-04 00:45:20', 1, NULL),
(35, 'PO-35', 'The Journey Within: Discovering Your True Self', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi.', 'param pujyapada sri sri acharya dev', 0, 0, 'abc@gmail.com', 0, 'CITY', 'STATE', 'COUNTRY', 1, '2024-02-04 01:04:13', 4, NULL),
(142, 'PO-142', 'Offline posting ', '🚆 🚆', 'vegetarian restaurant', 0, 0, 'csb21077@tezu.ac.in', 0, 'Tezpur', 'Assam', 'India', 0, '2024-02-22 01:33:31', 6, 'Sonitpur District'),
(144, 'PO-143', 'Rich text editor testing ', 'HeadingNormal TextBold TextItalicized TextUnderline Textbullet list -1bullet list -2number list -1number list -2YouTube.com', 'vegetarian restaurant', 0, 0, 'csb21077@tezu.ac.in', 0, 'Tezpur', 'Assam', 'India', 0, '2024-02-23 07:49:12', 5, 'Sonitpur District'),
(145, 'PO-145', 'Title ', 'bold textitalicized textlist', 'vegetarian restaurant', 0, 0, 'csb21077@tezu.ac.in', 0, 'Tezpur', 'Assam', 'India', 0, '2024-02-23 08:13:30', 3, 'Sonitpur District'),
(146, 'PO-146', 'Preety text ', '<h1>hwlche</h1><div><b>gsueb</b></div><div><span style=\"font-size: 1em;\">gzue.</span><br></div>', 'vegetarian restaurant', 0, 0, 'csb21077@tezu.ac.in', 0, 'Tezpur', 'Assam', 'India', 0, '2024-02-23 18:40:49', 1, 'Sonitpur District');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `dob` date NOT NULL,
  `family_code` int NOT NULL,
  `initiation_status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `name`, `dob`, `family_code`, `initiation_status`, `created_at`, `image_url`) VALUES
('abc@gmail.com', 'ABC', '2024-02-03', 12, '12ABC', '2024-02-03 01:00:53', NULL),
('csb21077@tezu.ac.in', 'HIMANSHU SHARMA', '2000-01-01', 12, '12ABC', '2024-02-14 19:05:43', 'https://lh3.googleusercontent.com/a/ACg8ocJ3wqbjeYBXNJo-mKjTenQSOMw8Uk8sPAcnxvJwDLvBvw=s96-c'),
('rajveerjdh2021@gmail.com', 'rajveer choudhary', '2000-01-01', 12, '12ABC', '2024-02-20 20:43:18', 'https://lh3.googleusercontent.com/a/ACg8ocKIuwu-lVatLAh3Hd1rob58vSwcLXaHGPMfw6AwIsBsYqA=s96-c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`marker_id`),
  ADD KEY `fk_email` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `post_id` (`post_id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `marker_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `sno` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `markers`
--
ALTER TABLE `markers`
  ADD CONSTRAINT `fk_email` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
