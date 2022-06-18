-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2022 at 01:34 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(6, 'Lifestyle', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration.'),
(7, 'Fashion', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature.'),
(8, 'Nature', 'It is a long-established fact that a reader will be distracted by the readable content.'),
(9, 'Sport', ' Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy'),
(10, 'Food', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.'),
(11, 'Technology', 'you need to be sure there isn\'t anything embarrassing hidden in the middle of text');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(60) NOT NULL,
  `comment` int(11) NOT NULL,
  `tag` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `category_id`, `image`, `author`, `comment`, `tag`, `status`, `date`) VALUES
(1, 'Canon DSLR camera', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 11, 'Canon EOS Rebel T6 Digital SLR Camera.jpg', 'admin', 5, 'tech', 1, '2022-06-14 14:06:08'),
(2, 'Nanna Kacchi Biriyani ', 'The point of using Lorem Ipsum is that it has a more-or-less normal distribution', 10, 'beef-khichori.jpg', 'admin', 5, 'food', 1, '2022-06-14 14:10:01'),
(3, 'Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature', ' Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections', 9, 'shahid-afridi-14v.jpg', 'admin', 5, 'sport', 1, '2022-06-14 14:13:17'),
(4, ' Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary', 'It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.', 8, 'Mountains_comp.jpg', 'admin', 5, 'nature', 1, '2022-06-14 14:14:03'),
(5, ' Lorem Ipsum passage, and going through the cites of the word ', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced updated', 7, 'slider-2.jpg', 'admin', 5, 'fashion ', 1, '2022-06-16 05:18:44'),
(11, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit', 'Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.', 11, 'about-300x236.png', 'admin', 5, 'Technology', 1, '2022-06-18 07:02:07'),
(12, 'Nullam dictum felis eu pede mollis pretium.', 'Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet.', 10, 'chef.jpg', 'admin', 5, 'Food', 1, '2022-06-18 07:03:14'),
(13, ' Nam quam nunc blandit  luctus pulvinar hendrerit id, lorem.', 'Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh.', 9, '61035307.jpg', 'admin', 5, 'Sport', 1, '2022-06-18 07:05:00'),
(14, 'Donec sodales sagittis magna.', 'Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero', 8, 'iceberg-in-penola-strait-antarctica-6060331625.jpg', 'admin', 5, 'Nature', 1, '2022-06-18 07:05:41'),
(15, 'Nullam dictum felis eu pede mollis pretium.', 'Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. ', 7, '491036174.jpg', 'admin', 5, 'Fashion', 1, '2022-06-18 07:06:21');

-- --------------------------------------------------------

--
-- Stand-in structure for view `post_category`
-- (See below for the actual view)
--
CREATE TABLE `post_category` (
`id` int(11)
,`title` varchar(255)
,`description` longtext
,`image` varchar(255)
,`author` varchar(60)
,`comment` int(11)
,`tag` varchar(100)
,`status` tinyint(4)
,`date` timestamp
,`name` varchar(60)
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(1, 'saikot', 'saikot@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Structure for view `post_category`
--
DROP TABLE IF EXISTS `post_category`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `post_category`  AS SELECT `posts`.`id` AS `id`, `posts`.`title` AS `title`, `posts`.`description` AS `description`, `posts`.`image` AS `image`, `posts`.`author` AS `author`, `posts`.`comment` AS `comment`, `posts`.`tag` AS `tag`, `posts`.`status` AS `status`, `posts`.`date` AS `date`, `category`.`name` AS `name` FROM (`posts` join `category` on(`posts`.`category_id` = `category`.`id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
