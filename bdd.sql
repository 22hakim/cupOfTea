-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 21, 2021 at 08:25 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `CupOfTea`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `content`, `picture`) VALUES
(1, 'Thé noir', 'Le thé noir, que les chinois appellent thé rouge en référence à la couleur cuivrée de son infusion, est un thé complètement oxydé. La fabrication du thé noir, se fait en cinq étapes : le fleurissage, le roulage, l\'oxydation, la torréfaction et le triage. Cette dernière opération permet de différencier les différents grades.', '1.jpg'),
(2, 'Thé vert', 'Réputé pour ses nombreuses vertus grâce à sa richesse en antioxydants, le thé vert désaltère, tonifie, apaise, fortifie et procure une incontestable sensation de bien-être. Délicat et peu amer, il est apprécié à tout moment de la journée et propose une palette d\'arômes très variés : végétal, minéral, floral, fruité.', '2.jpg'),
(3, 'Oolong', 'Les Oolong, que les chinois appellent thé bleu-vert en référence à la couleur de leurs feuilles infusées, sont des thés semi-oxydés : leur oxydation n\'a pas été menée à son terme. Spécialités de Chine et de Taïwan, il en existe une grande variété, en fonction de la région de culture, de l\'espèce du théier ou encore du processus de fabrication.', '3.jpg'),
(4, 'Thé blanc', 'Le thé blanc est une spécialité de la province du Fujian. De toutes les familles de thé, c\'est celle dont la feuille est la moins transformée par rapport à son état naturel. Non oxydé, le thé blanc ne subit que deux opérations : un flétrissage et une dessication. Il existe deux grands types de thés blancs : les Aiguilles d\'Argent et les Bai Mu Dan.', '4.jpg'),
(5, 'Rooibos', 'Le Rooibos (appelé thé rouge bien qu\'il ne s\'agisse pas de thé) est une plante poussant uniquement en Afrique du Sud et qui ne contient pas du tout de théine. Son infusion donne une boisson très agréable, ronde et légèrement sucrée. Riche en antioxydants, faible en tanins et dénué de théine, le Rooibos peut être dégusté en journée comme en soirée.', '5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orderDetails`
--

CREATE TABLE `orderDetails` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity_ordered` int(11) NOT NULL,
  `price` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderDetails`
--

INSERT INTO `orderDetails` (`id`, `order_id`, `product_id`, `quantity_ordered`, `price`) VALUES
(3, 9, 16, 2, '18.00'),
(4, 9, 26, 1, '10.00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `date_order` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` decimal(6,2) DEFAULT NULL,
  `paid` enum('yes','no') NOT NULL DEFAULT 'no',
  `statut` enum('ordered','shipped','received') NOT NULL DEFAULT 'ordered',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `date_order`, `amount`, `paid`, `statut`, `user_id`) VALUES
(1, '2021-04-19 09:45:15', NULL, 'no', 'ordered', 5),
(2, '2021-04-19 10:11:34', NULL, 'no', 'ordered', 5),
(3, '2021-04-19 10:14:30', NULL, 'no', 'ordered', 5),
(4, '2021-04-19 10:18:54', NULL, 'no', 'ordered', 5),
(5, '2021-04-19 10:21:07', NULL, 'no', 'ordered', 5),
(6, '2021-04-20 10:27:12', NULL, 'no', 'ordered', 5),
(7, '2021-04-20 13:20:52', NULL, 'no', 'ordered', 5),
(8, '2021-04-20 14:36:15', NULL, 'no', 'ordered', 5),
(9, '2021-04-20 14:36:47', NULL, 'no', 'ordered', 5);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `quantity` int(3) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `content`, `quantity`, `price`, `picture`, `category_id`, `date_creation`) VALUES
(16, 'Blue of London', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque, explicabo nemo. Maiores odit molestiae, amet saepe, quo mollitia enim delectus vitae tempora ut totam minus fugit officiis aspernatur eum velit?', 20, '9.00', 'product1_big.jpg', 1, '2021-02-11 09:43:50'),
(17, 'Thé des Lords', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque, explicabo nemo. Maiores odit molestiae, amet saepe, quo mollitia enim delectus vitae tempora ut totam minus fugit officiis aspernatur eum velit?', 20, '8.00', 'product2_big.jpg', 1, '2021-02-11 09:43:50'),
(18, 'Thé des vahinés', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque, explicabo nemo. Maiores odit molestiae, amet saepe, quo mollitia enim delectus vitae tempora ut totam minus fugit officiis aspernatur eum velit?', 20, '9.00', 'product3_big.jpg', 1, '2021-02-11 09:43:50'),
(19, 'Thé du hammam', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque, explicabo nemo. Maiores odit molestiae, amet saepe, quo mollitia enim delectus vitae tempora ut totam minus fugit officiis aspernatur eum velit?', 20, '8.00', 'product4_big.jpg', 2, '2021-02-11 09:43:50'),
(20, 'Vive le thé !', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque, explicabo nemo. Maiores odit molestiae, amet saepe, quo mollitia enim delectus vitae tempora ut totam minus fugit officiis aspernatur eum velit?', 20, '7.00', 'product5_big.jpg', 2, '2021-02-11 09:43:50'),
(21, 'Thé des alizés', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque, explicabo nemo. Maiores odit molestiae, amet saepe, quo mollitia enim delectus vitae tempora ut totam minus fugit officiis aspernatur eum velit?', 20, '9.00', 'product6_big.jpg', 2, '2021-02-11 09:43:50'),
(22, 'Vive les fêtes', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque, explicabo nemo. Maiores odit molestiae, amet saepe, quo mollitia enim delectus vitae tempora ut totam minus fugit officiis aspernatur eum velit?', 20, '11.00', 'product7_big.jpg', 3, '2021-02-11 09:43:50'),
(23, 'Fleur d\'orangér Oolong', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque, explicabo nemo. Maiores odit molestiae, amet saepe, quo mollitia enim delectus vitae tempora ut totam minus fugit officiis aspernatur eum velit?', 20, '11.00', 'product8_big.jpg', 3, '2021-02-11 09:43:50'),
(24, 'Oolong 7 agrumes', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque, explicabo nemo. Maiores odit molestiae, amet saepe, quo mollitia enim delectus vitae tempora ut totam minus fugit officiis aspernatur eum velit?', 20, '13.00', 'product9_big.jpg', 3, '2021-02-11 09:43:50'),
(25, 'Thé des songes blancs', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque, explicabo nemo. Maiores odit molestiae, amet saepe, quo mollitia enim delectus vitae tempora ut totam minus fugit officiis aspernatur eum velit?', 20, '12.00', 'product10_big.jpg', 4, '2021-02-11 09:43:50'),
(26, 'Bai mu dan', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque, explicabo nemo. Maiores odit molestiae, amet saepe, quo mollitia enim delectus vitae tempora ut totam minus fugit officiis aspernatur eum velit?', 20, '10.00', 'product11_big.jpg', 4, '2021-02-11 09:43:50'),
(27, 'Aiguilles d\'Argent', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque, explicabo nemo. Maiores odit molestiae, amet saepe, quo mollitia enim delectus vitae tempora ut totam minus fugit officiis aspernatur eum velit?', 20, '7.00', 'product12_big.jpg', 4, '2021-02-11 09:43:50'),
(28, 'Rooibos à la verveine', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque, explicabo nemo. Maiores odit molestiae, amet saepe, quo mollitia enim delectus vitae tempora ut totam minus fugit officiis aspernatur eum velit?', 20, '7.00', 'product13_big.jpg', 5, '2021-02-11 09:43:50'),
(29, 'Spicy Passion', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque, explicabo nemo. Maiores odit molestiae, amet saepe, quo mollitia enim delectus vitae tempora ut totam minus fugit officiis aspernatur eum velit?', 20, '9.00', 'product14_big.jpg', 5, '2021-02-11 09:43:50'),
(30, 'Rooibos des amants', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque, explicabo nemo. Maiores odit molestiae, amet saepe, quo mollitia enim delectus vitae tempora ut totam minus fugit officiis aspernatur eum velit?', 20, '8.00', 'product15_big.jpg', 5, '2021-02-11 09:43:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `role` enum('Admin','User') NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `address`, `firstName`, `lastName`, `role`) VALUES
(5, 'test@test.fr', '$2y$10$zVvmNPHWuxu2NfedU92SGehyJ6mtxoq84vBtF9VH/NHIorATn2k8q', 'yoyo', 'test', 'test', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderDetails`
--
ALTER TABLE `orderDetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orderDetails`
--
ALTER TABLE `orderDetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
