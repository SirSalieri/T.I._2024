-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 14, 2024 at 04:32 PM
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
-- Database: `nordpublica`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `category` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `author`, `created_at`, `updated_at`, `category`, `image_url`) VALUES
(1, 'Title', 'Title content!', '', '2024-03-16 13:23:41', '2024-03-16 13:23:41', 'Tests', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.wfla.com%2Fbloom-tampa-bay%2F10-surprising-benefits-of-having-a-cat-in-your-life%2F&psig=AOvVaw3-MSbvk4TnCGYsd9K5fXEl&ust=1710684213670000&source=images&cd=vfe&opi=89978449&ved=0CBMQjRxqFwoTCMid47j5-IQ'),
(2, 'Title', 'Title content!', '', '2024-03-16 16:37:09', '2024-03-16 16:37:09', 'Tests', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.wfla.com%2Fbloom-tampa-bay%2F10-surprising-benefits-of-having-a-cat-in-your-life%2F&psig=AOvVaw3-MSbvk4TnCGYsd9K5fXEl&ust=1710684213670000&source=images&cd=vfe&opi=89978449&ved=0CBMQjRxqFwoTCMid47j5-IQ'),
(3, 'Title 1MIL', 'TRYING SOME NEW CONTENT', 'THe AUTHOR', '2024-03-16 21:36:57', '2024-03-16 21:36:57', 'FAILS', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `username`, `email`, `password`, `role`) VALUES
(1, 'Mihailo', 'Koprivica', 'SirSalieri0203', 'mihailokoprivica480@gmail.com', '123123', 'user'),
(2, 'FirstAdmin', 'Tester', 'FirstAdmin', 'email@example.com', '$2y$10$JBWoMU3UJlzwgfkmyeI5..VDR.B369JzXFe2H2IMnlsh/p7yaEqee', 'user'),
(3, 'Mike ', '', 'Pro_Tester', 'koprivicadacili@gmail.com', '$2y$10$FuC7fBgyTEnf.twoL/FRWurSn8xJyScJN0cPjYy6oTRd4dJJelVzC', 'user'),
(4, 'Random', '', '', 'random@gmail.com', '$2y$10$d4Ksy5tPiEuOxCgSiOBHfuF8FbE7.kb3RVMi2veEbQKu6jX1tssaW', 'user'),
(6, 'Eden privicaKo', '', '', 'eden@gmail.com', '$2y$10$DjEGmGVgPBxZTwMcyNFKK.61f5zzB2ZSOqverZn2Cf46W10tV3OVK', 'admin'),
(7, 'Main_administrator31', 'Admin', 'Main_administrator31', 'admin@icloud.com', '$2y$10$RnIOnnmjBg9miw5MIwweOuY8p88jE8eaLZaj/1.xWhtVyBupuIL06', 'admin'),
(9, 'Anthony Boi', '', '', 'anthony@gmail.com', '$2y$10$iRkLJ4YTB5es3SgHilmJHeLAxGdg2x1qLucibeeeQPoKnVs6dEF9m', 'user'),
(10, 'Test ', 'USER1', 'Brukernavn1', 'email11@gmail.com', '$2y$10$7aRaoVGFRALmYG203dKBLOWixl0WOZG5Rp0zNUBcfJsW5ntmBwi9W', 'user'),
(11, 'Test', 'USER2', 'Brukernavn22', 'user22@gmail.com', '$2y$10$2TMLp9IAvoF38yCZBD83.eEH3a9buukclbVgEaMAGa3NL..W232dy', 'user'),
(12, 'Test', 'USER3', 'Brukernavn33', 'user33@gmail.com', '$2y$10$A8i37dUlovF6nLMJsoi.Kuvw9yi/bdfdONOg4ypafqj5mZWts.F8G', 'user'),
(13, 'Test', 'USER4', 'Brukernavn44', 'user4@gmail.com', '$2y$10$YMid4keZKfwC4fnmv78Zx.zjkziLjLDxXzNKtTquo4OswNIUYn36m', 'user'),
(14, 'Test', 'USER5', 'Brukernavn55', 'user5@gmail.com', '$2y$10$/wnri02bo/FycAhRbI9Ol.jl/8TCt4kffbfMUkGV806UlJFTnfr8G', 'user'),
(16, 'Admin', 'Bruker111', 'Administrator1111111111111', 'admin222@gmail.com', '$2y$10$GwsMBBkfIIQHlPMCvwi.I.ZtKP5LSPkbzrc2yiTTS7SR1BN.wACHm', 'admin'),
(17, 'Admin', 'Bruker222', 'Administrator2222222222', 'admin333@gmail.com', '$2y$10$sb5iR3A/uUNG4d7EkbtiUuu9an/.snHRwB5Xd.Hzw9itcn714ngQu', 'admin'),
(18, 'Admin', 'Bruker333', 'Administrator33333333', 'admin444@gmail.com', '$2y$10$QSwpXM7DqiDyhWRc6chEhOfbOHFbdZTz3s60LDq0rsMXa2OYF/.IC', 'admin'),
(19, 'Jeg har Registrert', '', '', 'registrert.person@gmail.com', '$2y$10$AGO0BNRwHsFvpffCMF/5tuoU2OQFdShyxJy4G6UhMFFywMyCox89m', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_activity`
--

CREATE TABLE `user_activity` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id_idx` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_activity`
--
ALTER TABLE `user_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
