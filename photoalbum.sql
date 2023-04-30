-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2023 at 10:03 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `photoalbum`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `title`, `description`, `url`) VALUES
(28, 'Dog With Sunglasses', 'Dog with funny looking sunglasses', 'uploads/e4566d006ffe648963eea9315c969390011.jpg'),
(29, 'Dog and Cat', 'A dog and a cat lying on the grass', 'uploads/7948491cc9dd07d26d3ec03f8b3718a5004.jpg'),
(30, '2 Dogs Running', 'Two dogs running on the beach.', 'uploads/4fb72d35c1db03ab3b7222d207bb34d9015.jpg'),
(31, 'Golden Retriever', 'Golder Retriever on a lead.', 'uploads/c1c98d0d80dfd8a2bffe9c31f492aa34005.jpg'),
(32, '2 Dogs Running Together', 'Two more dogs running on the beach.', 'uploads/618e8d2d184284fc16f8cfcbb739a9d4003.jpg'),
(33, 'Puppy yawning', 'Puppy yawning.', 'uploads/fb44cb00843a8bd316ad579c3f114e0eefd6789f878d282976262dc47c3c930adaniel-lincoln-IE2Z11zKsso-unsplash.jpg'),
(34, 'ANGRY PUG', 'Pug making a very angry face...', 'uploads/01982958126b37a426efc371211cef376012bac97c1734385f61cf5171628cedkara-kupfer-GzA2R5uvFKM-unsplash.jpg'),
(35, 'Labrador', 'Cute labrador.', 'uploads/e6aa2c99aa0c9132d555b0a53950b05662c3054d140ce04c859403ff7171d788ben-owen-FFwNGYZK-2o-unsplash.jpg'),
(36, 'Beady eyes', 'Beady-eyed dog staring into the distance.', 'uploads/fdcbf9cbf7ec2b3a97290b86594ebb73004.jpg'),
(37, 'Pug', 'Pug sitting on a sofa.', 'uploads/793f651e61bde0496964a9aa437a2514013.jpg'),
(38, 'Golden Retriever', 'A golder retriever in a field.', 'uploads/4e0af084daca9bf10d703d518fe2322e001.jpg'),
(39, 'Handsome.', 'A very handsome looking boy..', 'uploads/6304865e381d60d10259e7594c4d6a68014.jpg'),
(40, 'Amazing.', 'Happy dog.', 'uploads/c0b42de4ca70dea628e44d7efc4126d9005.jpg'),
(41, 'Good boy!', 'What a good boy.', 'uploads/51c7204ffc06bfa58195c535d32032ff001.jpg'),
(42, 'Hello there!', 'Hiiiiiii...', 'uploads/dc8f685df37037c3a804cceb194a770a012.jpg'),
(43, 'Glorious Tree', 'Beautiful looking trees in a forest.', 'uploads/d0afa0de3b392abb46f1b1e583711dcb003.jpg'),
(44, 'Bench', 'A bench by the lake.', 'uploads/34ab54a2ded1e9747412208bc82d6d56001.jpg'),
(45, 'Pebbles', 'Pebbles and gravel on a beach.', 'uploads/1a1187c7acff21542a52d279ad9f3f82004.jpg'),
(46, 'Fjords', 'Stunning.', 'uploads/5d7bbfc858217b7d26e2f9f820133813002.jpg'),
(47, 'Orange Cat', 'Orange cat loafing.', 'uploads/60df7c65823876ca67f6ec0d4ad4bab2michael-sum-LEpfefQf4rU-unsplash.jpg'),
(48, 'Yawn!', 'Cat yawning', 'uploads/4d7fa0b5a43f83c4d3872cc33606b5a9steffi-pereira-HlI03bNHhBI-unsplash.jpg'),
(49, 'Curious cat', 'Curious and playful cat.', 'uploads/81be2cd0be26d91e962bc5758308a5fealvan-nee-ZCHj_2lJP00-unsplash.jpg'),
(50, 'Goofy cat.', 'LOL', 'uploads/6fd081a6bf750fdf68bbc6e684a65452daria-shatova-46TvM-BVrRI-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(1, 'Dogs'),
(3, 'Scenery'),
(5, 'Cats'),
(6, 'Marathon');

-- --------------------------------------------------------

--
-- Table structure for table `tags_images`
--

CREATE TABLE `tags_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `image_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tags_images`
--

INSERT INTO `tags_images` (`id`, `tag_id`, `image_id`) VALUES
(22, 1, 28),
(23, 1, 29),
(24, 1, 30),
(25, 1, 31),
(26, 1, 32),
(27, 1, 33),
(28, 1, 35),
(29, 1, 34),
(30, 1, 36),
(31, 1, 37),
(32, 1, 38),
(33, 1, 39),
(34, 1, 40),
(35, 1, 41),
(36, 1, 42),
(38, 5, 29),
(39, 3, 43),
(40, 3, 44),
(41, 3, 45),
(42, 3, 46),
(43, 5, 47),
(44, 5, 48),
(45, 5, 49),
(46, 5, 50);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@admin.com', '53336a676c64c1396553b2b7c92f38126768827c93b64d9142069c10eda7a721');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags_images`
--
ALTER TABLE `tags_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_id` (`image_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tags_images`
--
ALTER TABLE `tags_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tags_images`
--
ALTER TABLE `tags_images`
  ADD CONSTRAINT `tags_images_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tags_images_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
