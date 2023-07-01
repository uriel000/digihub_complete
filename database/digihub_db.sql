-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2023 at 02:40 PM
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
-- Database: `digihub_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `seller_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `name`, `price`, `quantity`, `image`, `product_id`, `seller_id`) VALUES
(8, 4, 'The fault in our stars Audiobook by John Green', 500, 6, 'angel.png', 10, 3),
(47, 2, 'The fault in our stars Audiobook by John Green', 500, 6, 'angel.png', 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(2, 2, 'Jesriel Ledesma', 'jesriel@gmail.com', '0983746803', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Itaque alias at eveniet molestiae iusto quae nihil perspiciatis ea veritatis aperiam quidem, repudiandae nemo earum architecto pariatur voluptates doloremque sint ipsa fugit impedit numquam odio mollitia optio? Quae saepe, nobis voluptatibus omnis autem id cumque exercitationem sunt modi? Nulla, iusto recusandae.'),
(4, 2, 'Ferdie Suyu', 'jesriel@gmail.com', '0983746803', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Itaque alias at eveniet molestiae iusto quae nihil perspiciatis ea veritatis aperiam quidem, repudiandae nemo earum architecto pariatur voluptates doloremque sint ipsa fugit impedit numquam odio mollitia optio? Quae saepe, nobis voluptatibus omnis autem id cumque exercitationem sunt modi? Nulla, iusto recusandae.'),
(5, 2, 'Gabriel Rocero', 'jesriel@gmail.com', '0983746803', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Itaque alias at eveniet molestiae iusto quae nihil perspiciatis ea veritatis aperiam quidem, repudiandae nemo earum architecto pariatur voluptates doloremque sint ipsa fugit impedit numquam odio mollitia optio? Quae saepe, nobis voluptatibus omnis autem id cumque exercitationem sunt modi? Nulla, iusto recusandae.'),
(6, 2, 'Jesriel cutieee', 'jesriel@gmail.com', '09898765553', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem incidunt qui voluptas quibusdam autem illum eaque dolore voluptatum eveniet. Iste reprehenderit commodi quis perspiciatis nam deleniti in distinctio voluptas neque dignissimos cupiditate, voluptate repudiandae necessitatibus ad illum? Voluptatem odio vero in nostrum quod excepturi id. Impedit deleniti esse numquam. Fugiat.'),
(7, 2, 'Jesriel Diogoro Ledesma', 'jesriel@gmail.com', '09783546788', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem incidunt qui voluptas quibusdam autem illum eaque dolore voluptatum eveniet. Iste reprehenderit commodi quis perspiciatis nam deleniti in distinctio voluptas neque dignissimos cupiditate, voluptate repudiandae necessitatibus ad illum? Voluptatem odio vero in nostrum quod excepturi id. Impedit deleniti esse numquam. Fugiat.'),
(8, 2, 'Jesriel Diogoro Ledesma', 'jesriel@gmail.com', '09783546788', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem incidunt qui voluptas quibusdam autem illum eaque dolore voluptatum eveniet. Iste reprehenderit commodi quis perspiciatis nam deleniti in distinctio voluptas neque dignissimos cupiditate, voluptate repudiandae necessitatibus ad illum? Voluptatem odio vero in nostrum quod excepturi id. Impedit deleniti esse numquam. Fugiat.'),
(9, 2, 'Met me', 'jesriel@gmail.com', '09738463729', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis corrupti nihil minus obcaecati autem sequi deserunt laudantium debitis ea placeat, corporis at vel ipsam perspiciatis veniam, dolores, iusto dolor maxime iure quam? Id similique quo sit corporis quis, assumenda sint laborum qui temporibus quod cum voluptatum dignissimos cumque nostrum sunt!'),
(10, 2, 'Jesriel Diogoro Ledesma', 'jesriel@gmail.com', '09813756027', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis officia necessitatibus numquam vero sapiente libero. Debitis dolores sed veniam. Soluta perspiciatis praesentium modi ratione ad ducimus optio consequatur natus nulla eos recusandae adipisci ipsum temporibus, delectus dolore assumenda quidem voluptas nostrum tenetur quae nisi id cupiditate ullam? Porro, officia possimus.'),
(11, 2, 'Jesriel Diogoro Ledesma', 'jesriel@gmail.com', '09813756027', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis officia necessitatibus numquam vero sapiente libero. Debitis dolores sed veniam. Soluta perspiciatis praesentium modi ratione ad ducimus optio consequatur natus nulla eos recusandae adipisci ipsum temporibus, delectus dolore assumenda quidem voluptas nostrum tenetur quae nisi id cupiditate ullam? Porro, officia possimus. Hehe'),
(12, 2, 'Jesriel Ledesma', 'jesriel@gmail.com', '09813756027', 'Hala nagana na siya ng maayos HAHAHAHA ansaya ko huhuhu');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `total_products` int(100) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending',
  `seller_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `product_name`, `total_products`, `total_price`, `placed_on`, `payment_status`, `seller_id`) VALUES
(16, 2, 'Jesriel Ledesma', '09111111111', 'jesriel@gmail.com', 'paypal', '111 Uno, Barangay One, Antipolo City, Philippines, 1870', 'Harry Potter and the Philosopher\'s Stone Ebook', 1, 600, '01-Jul-2023', 'completed', 3),
(17, 2, 'Jesriel Ledesma', '09111111111', 'jesriel@gmail.com', 'paypal', '111 Uno, Barangay One, Antipolo City, Philippines, 1870', 'Honeymoon Avenue Music by Ariana Grande', 3, 750, '01-Jul-2023', 'completed', 5),
(18, 2, 'Jesriel Ledesma', '09111111111', 'jesriel@gmail.com', 'gcash', '111 uno, Barangay one, Antipolo City, Philippines, 1870', 'The fault in our stars Audiobook by John Green', 3, 1500, '01-Jul-2023', 'pending', 3),
(19, 2, 'Jesriel Ledesma', '09111111111', 'jesriel@gmail.com', 'gcash', '111 uno, Barangay one, Antipolo City, Philippines, 1870', 'Mountain Mayon Photography', 7, 10500, '01-Jul-2023', 'pending', 3),
(20, 2, 'Jesriel Ledesma', '09111111111', 'jesriel@gmail.com', 'gcash', '111 uno, Barangay one, Antipolo City, Philippines, 1870', 'Fake Smile ', 5, 1250, '01-Jul-2023', 'pending', 5);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `file_link` varchar(500) NOT NULL,
  `seller_id` int(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `file_link`, `seller_id`, `category`, `description`) VALUES
(9, 'Harry Potter and the Philosopher\'s Stone Ebook', 600, 'ackerman.jpg', 'https://en.wikipedia.org/wiki/Harry_Potter_and_the_Philosopher\'s_Stone', 3, 'ebook', 'Harry Potter and the Philosopher\'s Stone is a fantasy novel written by British author J. K. Rowling. The first novel in the Harry Potter series and Rowling\'s debut novel, it follows Harry Potter, a young wizard who discovers his magical heritage on his eleventh birthday, when he receives a letter of acceptance to Hogwarts School of Witchcraft and Wizardry. Harry makes close friends and a few enemies during his first year at the school and with the help of his friends, Ron Weasley and Hermione Gr'),
(10, 'The fault in our stars Audiobook by John Green', 500, 'angel.png', 'https://en.wikipedia.org/wiki/The_Fault_in_Our_Stars_(film)', 3, 'audiobook', 'This is a story about Hazel Grace Lancaster (Shailene Woodley), a 16-year-old cancer patient, meets and falls in love with Gus Waters (Ansel Elgort), a similarly afflicted teen from her cancer support group. Hazel feels that Gus really understands her. They both share the same acerbic wit and a love of books, especially Grace\'s touchstone, '),
(12, 'Mountain Mayon Photography', 1500, 'pussyy.png', 'https://en.wikipedia.org/wiki/File:Mayon_Volcano_as_of_March_2020.jpg', 3, 'photography', 'Photo of Mount Mayon in the Philippines taken June 10, 2023. Photo of Mount Mayon in the Philippines taken June 10, 2023. Photo of Mount Mayon in the Philippines taken June 10, 2023. Photo of Mount Mayon in the Philippines taken June 10, 2023. Photo of Mount Mayon in the Philippines taken June 10, 2023.'),
(13, 'Ferdie\'s perfect Resume Template', 350, 'FQxHLfeVcAI5Zuq.jpg', 'https://en.wikipedia.org/wiki/Paper_Towns_(film)', 3, 'template', 'Ferdie\'s perfect Resume Template. If you are looking for a neat, clean, and correct template for your resume, you can purchase this!'),
(14, 'Honeymoon Avenue Music by Ariana Grande', 250, 'e1e85327ea9d4b4de44d32b2ccf2cfd6.jpg', 'https://www.youtube.com/watch?v=_tJM74eZy04', 5, 'music', 'Honeymoon Avenue Music by Ariana Grande from her debut album called Yours Truly.'),
(17, 'Fake Smile ', 250, 'FO_lqvvUYAQPIDL.jpg', 'https://en.wikipedia.org/wiki/Paper_Towns_(film)', 5, 'music', 'Fake Smile by Ariana Grande from her album Thank you, Next'),
(18, 'Paper Rings', 125, 'PAG-ASA.jpg', 'https://www.bing.com/ck/a?!&&p=c1441a0fe415761fJmltdHM9MTY4ODE2OTYwMCZpZ3VpZD0zYzUwYTY4NS0xODg0LTZhN2ItMzhkYS1hOTE4MTliYzZiZDcmaW5zaWQ9NTE0OQ&ptn=3&hsh=3&fclid=3c50a685-1884-6a7b-38da-a91819bc6bd7&u=a1L3ZpZGVvcy9zZWFyY2g_cT1wYXBlcityaW5ncytseXJpY3MmcXB2dD1wYXBlcityaW5ncytseXJpY3MmRk9STT1WRFJF&ntb=1', 5, 'music', 'Paper rings music by Taylor swift'),
(19, '7 Rings', 250, '1097491.jpg', 'https://www.youtube.com/watch?v=gl1aHhXnN1k', 5, 'music', '& rings by Ariana Grande from her album Thank you, Next');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'admin', 'admin@gmail.com', '09954c15998d7e270769893321fcd82e', 'admin'),
(2, 'Jesriel Ledesma', 'jesriel@gmail.com', '09954c15998d7e270769893321fcd82e', 'user'),
(3, 'Ferdie Suyu', 'ferdie@gmail.com', 'bb7a427373df876102bd1904b37fea9a', 'seller'),
(4, 'Gabriel Joshua Rocero', 'gabriel@gmail.com', '647431b5ca55b04fdf3c2fce31ef1915', 'user'),
(5, 'Angel Mae Ochi', 'angel@gmail.com', 'f4f068e71e0d87bf0ad51e6214ab84e9', 'seller');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
