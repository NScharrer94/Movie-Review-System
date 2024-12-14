-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 04, 2024 at 06:21 PM
-- Server version: 8.0.39
-- PHP Version: 8.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bcs350fa24`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movie_id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `genre` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `release_year` year NOT NULL,
  `director` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `title`, `genre`, `release_year`, `director`, `created_at`) VALUES
(1, 'The Mummy', 'Adventure', '1999', 'Stephen Sommers', '2024-12-03 19:58:27'),
(2, 'The Nice Guys', 'Comedy', '2016', 'Shane Black', '2024-12-03 19:58:27'),
(3, 'Aliens', 'Action', '1986', 'James Cameron', '2024-12-03 20:05:13'),
(4, 'Scream', 'Horror', '1996', 'Wes Craven', '2024-12-03 20:05:13'),
(5, 'Terminator 2: Judgement Day', 'Sci-Fi', '1991', 'James Cameron', '2024-12-03 20:06:13'),
(6, 'Alien', 'Horror', '1979', 'Ridley Scott', '2024-12-03 20:06:13'),
(7, 'Kingsman: The Secret Service', 'Action', '2014', 'Matthew Vaughn', '2024-12-03 20:07:25'),
(8, 'Mad Max: Fury Road', 'Action', '2015', 'George Miller', '2024-12-03 20:07:25'),
(9, 'Baby Driver', 'Action', '2017', 'Edgar Wright', '2024-12-03 20:08:16'),
(10, 'The Goonies', 'Adventure', '1985', 'Richard Donner', '2024-12-03 20:08:16'),
(11, 'Knives Out', 'Mystery', '2019', 'Rian Johnson', '2024-12-03 20:09:17'),
(12, 'The Princess Bride', 'Adventure', '1987', 'Rob Reiner', '2024-12-03 20:09:17'),
(13, 'Cloverfield', 'Horror', '2008', 'Matt Reeves', '2024-12-03 20:10:03'),
(14, 'The Thing', 'Horror', '1982', 'John Carpenter', '2024-12-03 20:10:03'),
(15, 'Batman Begins', 'Superhero', '2005', 'Christopher Nolan', '2024-12-03 20:11:05'),
(16, 'John Wick: Chapter 4', 'Action', '2023', 'Chad Stahelski', '2024-12-03 20:11:05'),
(17, 'The Departed', 'Drama', '2006', 'Martin Scorsese', '2024-12-03 20:13:16'),
(18, 'The Dark Knight', 'Superhero', '2008', 'Christopher Nolan', '2024-12-03 20:13:16'),
(19, 'John Wick', 'Action', '2014', 'Chad Stahelski', '2024-12-03 20:13:16'),
(20, 'Blade Runner: 2049', 'Sci-Fi', '2017', 'Denis Villeneuve', '2024-12-03 20:13:16'),
(21, 'Dune: Part Two', 'Sci-Fi', '2024', 'Denis Villeneuve', '2024-12-03 20:15:58'),
(22, 'Django Unchained', 'Action', '2012', 'Quentin Tarantino', '2024-12-03 20:15:58'),
(23, 'The Terminator', 'Sci-Fi', '1984', 'James Cameron', '2024-12-03 20:15:58'),
(24, 'Jurassic Park', 'Adventure', '1993', 'Steven Spielberg', '2024-12-03 20:15:58'),
(25, 'Logan', 'Superhero', '2017', 'James Mangold', '2024-12-03 20:15:58'),
(26, 'The Lego Batman Movie', 'Family', '2017', 'Chris McKay', '2024-12-03 20:15:58'),
(27, 'The Truman Show', 'Drama', '1998', 'Peter Weir', '2024-12-03 20:19:06'),
(28, 'Inglorious Basterds', 'Action', '2009', 'Quentin Tarantino', '2024-12-03 20:19:06'),
(29, 'Gladiator', 'Drama', '2000', 'Ridley Scott', '2024-12-03 20:19:06'),
(30, 'The Crow', 'Action', '1994', 'Alex Proyas', '2024-12-03 20:19:06'),
(31, 'Boogie Nights', 'Drama', '1997', 'Paul Thomas Anderson', '2024-12-03 20:19:06'),
(32, 'Godzilla Minus One', 'Drama', '2023', 'Takashi Yamazaki', '2024-12-03 20:19:06'),
(33, 'Jaws', 'Horror', '1975', 'Steven Spielberg', '2024-12-03 20:22:18'),
(34, 'Bullet Train', 'Action', '2022', 'David Leitch', '2024-12-03 20:22:18'),
(35, 'Dune', 'Sci-Fi', '2021', 'Denis Villenueve', '2024-12-03 20:22:18'),
(36, 'Beetlejuice', 'Comedy', '1998', 'Tim Burton', '2024-12-03 20:22:18'),
(37, 'John Wick: Chapter 2', 'Action', '2017', 'Chad Stahelski', '2024-12-03 20:22:18'),
(38, 'School of Rock', 'Family', '2003', 'Richard Linklater', '2024-12-03 20:22:18'),
(39, 'Predator', 'Sci-Fi', '1987', 'John McTiernan', '2024-12-03 20:22:18'),
(40, 'Die Hard', 'Action', '1988', 'John McTiernan', '2024-12-03 20:22:18'),
(41, 'War for the Planet of the Apes', 'Action', '2017', 'Matt Reeves', '2024-12-03 20:26:59'),
(42, 'Dawn of the Planet of the Apes', 'Action', '2014', 'Matt Reeves', '2024-12-03 20:26:59'),
(43, 'John Wick: Chapter 3', 'Action', '2019', 'Chad Stahelski', '2024-12-03 20:26:59'),
(44, 'Mortal Kombat', 'Action', '1995', 'Paul W.S. Anderson', '2024-12-03 20:26:59'),
(45, 'Heat', 'Drama', '1995', 'Michael Mann', '2024-12-03 20:26:59'),
(46, 'There Will Be Blood', 'Drama', '2007', 'Paul Thomas Anderson', '2024-12-03 20:26:59'),
(47, 'The Raid', 'Action', '2011', 'Gareth Evans', '2024-12-03 20:26:59'),
(48, 'The Fall Guy', 'Comedy', '2024', 'David Leitch', '2024-12-03 20:26:59'),
(49, 'The Abyss', 'Adventure', '1989', 'James Cameron', '2024-12-03 20:26:59'),
(50, 'The Exorcist', 'Horror', '1973', 'William Friedkin', '2024-12-03 20:26:59');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int NOT NULL,
  `movie_id` int NOT NULL,
  `user_id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `review_text` text COLLATE utf8mb4_general_ci NOT NULL,
  `rating` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `movie_id`, `user_id`, `review_text`, `rating`, `created_at`) VALUES
(1, 1, 'admin', 'Timeless Adventure Classic', 5, '2024-12-03 21:03:54'),
(2, 2, 'admin', 'Great leads in the buddy cop comedy', 5, '2024-12-03 21:03:54'),
(3, 3, 'admin', 'Sci-Fi Action Classic', 5, '2024-12-03 21:04:38'),
(4, 4, 'admin', 'Meta Horror Masterpiece', 5, '2024-12-03 21:04:38'),
(5, 5, 'admin', 'Sci-Fi Action Masterpiece', 5, '2024-12-03 21:05:26'),
(6, 6, 'admin', 'Space Horror Masterpiece', 5, '2024-12-03 21:05:26'),
(7, 7, 'admin', 'Non-stop fun action', 5, '2024-12-03 21:06:06'),
(8, 8, 'admin', 'Wasteland Action Thrillride', 5, '2024-12-03 21:06:06'),
(9, 9, 'admin', 'Fun Action Thrills', 5, '2024-12-03 21:08:02'),
(10, 10, 'admin', 'Perfect Family Adventure', 5, '2024-12-03 21:08:02'),
(11, 11, 'admin', 'Fun Mystery Ride', 4, '2024-12-03 21:08:43'),
(12, 12, 'admin', 'Fairy Tale Parody Fun', 4, '2024-12-03 21:08:43'),
(13, 13, 'admin', 'First Person Monster Horror', 5, '2024-12-03 21:09:22'),
(14, 14, 'admin', 'Tense Horror Masterpiece', 5, '2024-12-03 21:09:22'),
(15, 15, 'admin', 'Superhero Origin Thrillride', 4, '2024-12-03 21:10:00'),
(16, 16, 'admin', 'High Stakes Action', 4, '2024-12-03 21:10:00'),
(17, 17, 'admin', 'Heart Stopping Drama', 5, '2024-12-03 21:10:59'),
(18, 18, 'admin', 'Perfect Superhero Story', 5, '2024-12-03 21:10:59'),
(19, 19, 'admin', 'Action fun', 5, '2024-12-03 21:11:46'),
(20, 20, 'admin', 'Sci-Fi Masterpiece', 5, '2024-12-03 21:11:46'),
(21, 21, 'admin', 'Second Half of Sci-Fi Masterpiece', 5, '2024-12-03 21:12:34'),
(22, 22, 'admin', 'Over the top interpretation of slavery', 5, '2024-12-03 21:12:34'),
(23, 23, 'admin', 'Sci-Fi Horror Classic', 5, '2024-12-03 21:13:09'),
(24, 24, 'admin', 'Perfect Adventure Film', 5, '2024-12-03 21:13:09'),
(25, 25, 'admin', 'Best Superhero Movie', 5, '2024-12-03 21:14:18'),
(26, 26, 'admin', 'Fun Family Comedy', 4, '2024-12-03 21:14:18'),
(27, 27, 'admin', 'Interesting idea about perceptions', 5, '2024-12-03 21:15:40'),
(28, 28, 'admin', 'Over the top interpretation of WW2', 5, '2024-12-03 21:15:40'),
(29, 29, 'admin', 'Roman Drama Masterpiece', 5, '2024-12-03 21:16:17'),
(30, 30, 'admin', 'Gothic Superhero Thrillride', 4, '2024-12-03 21:16:17'),
(31, 31, 'admin', 'Interesting period piece', 4, '2024-12-03 21:17:18'),
(32, 32, 'admin', 'Allegory for the atomic bomb', 4, '2024-12-03 21:17:18'),
(33, 33, 'admin', 'Original Summer Blockbuster', 5, '2024-12-03 21:17:54'),
(34, 34, 'admin', 'Fun Action-Comedy', 4, '2024-12-03 21:17:54'),
(35, 35, 'admin', 'First half of sci-fi masterpiece', 5, '2024-12-03 21:18:39'),
(36, 36, 'admin', 'Horror Comedy Classic', 4, '2024-12-03 21:18:39'),
(37, 37, 'admin', 'High Stakes Action', 4, '2024-12-03 21:19:08'),
(38, 38, 'admin', 'Family Comedy Fun', 4, '2024-12-03 21:19:08'),
(39, 39, 'admin', 'Sci-Fi Action Fun', 5, '2024-12-03 21:20:14'),
(40, 40, 'admin', 'Action classic', 4, '2024-12-03 21:20:14'),
(41, 41, 'admin', 'Conclusion to excellent trilogy', 5, '2024-12-03 21:20:50'),
(42, 42, 'admin', 'Climax of trilogy', 4, '2024-12-03 21:20:50'),
(43, 43, 'admin', 'Action fun', 4, '2024-12-03 21:21:18'),
(44, 44, 'admin', 'Cheesy 90\'s Fun', 3, '2024-12-03 21:21:18'),
(45, 45, 'admin', 'High stakes drama', 5, '2024-12-03 21:21:48'),
(46, 46, 'admin', 'Riveting period piece', 5, '2024-12-03 21:21:48'),
(47, 47, 'admin', 'Non-stop action', 4, '2024-12-03 21:22:23'),
(48, 48, 'admin', 'Hilarious action-comedy', 5, '2024-12-03 21:22:23'),
(49, 49, 'admin', 'Undervalued classic adventure', 5, '2024-12-03 21:22:55'),
(50, 50, 'admin', 'The original supernatural horror', 5, '2024-12-03 21:22:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `password`, `created_at`) VALUES
('admin', 'admin@movie.com', 'movie', '2024-12-03 20:31:56'),
('userfa24', '', 'pwdfa24', '2024-12-04 10:58:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `fk_movie_id` (`movie_id`),
  ADD KEY `fk_user_id_username` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_movie_id` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_id_username` FOREIGN KEY (`user_id`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
