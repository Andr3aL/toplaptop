-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 04 avr. 2025 à 10:05
-- Version du serveur : 8.0.30
-- Version de PHP : 8.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `toplaptop`
--
CREATE DATABASE IF NOT EXISTS `toplaptop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `toplaptop`;

-- --------------------------------------------------------

--
-- Structure de la table `brand`
--

CREATE TABLE `brand` (
  `id_brand` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id_image` int NOT NULL,
  `product_id` int NOT NULL,
  `src` text COLLATE utf8mb4_general_ci NOT NULL,
  `position` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id_order` int NOT NULL,
  `user_id` int NOT NULL,
  `order_number` bigint NOT NULL,
  `status` enum('En attente','En cours','Expédiée','Livrée','Annulée') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` date NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id_product` int NOT NULL,
  `brand_id` int DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `infos` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `category` enum('Gamer','Ultrabooks','Hybrides','Entrées de gamme') COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id_product`, `brand_id`, `name`, `price`, `infos`, `description`, `category`) VALUES
(1, NULL, 'MSI', 1399, 'Le MSI Katana', 'Performance de jeu et finesse avec un écran 144 Hz Le MSI Katana 17 B13VFK-1043FR est un PC portable Gaming équipé d&#039;un processeur Intel Core de 13e génération', 'Gamer'),
(2, NULL, 'MSI', 1399, 'Le MSI Katana', 'Performance de jeu et finesse avec un écran 144 Hz Le MSI Katana 17 B13VFK-1043FR est un PC portable Gaming équipé d&#039;un processeur Intel Core de 13e génération', 'Gamer'),
(3, NULL, 'MSI', 1399, 'Le MSI Katana', 'Performance de jeu et finesse avec un écran 144 Hz Le MSI Katana 17 B13VFK-1043FR est un PC portable Gaming équipé d&#039;un processeur Intel Core de 13e génération', 'Gamer'),
(4, NULL, 'MSI', 1399, 'Le MSI Katana', 'Performance de jeu et finesse avec un écran 144 Hz Le MSI Katana 17 B13VFK-1043FR est un PC portable Gaming équipé d&#039;un processeur Intel Core de 13e génération', 'Gamer'),
(5, NULL, 'ASUS', 1499, 'Le ASUS Zenbook', 'Le asus zenbook est génial', 'Ultrabooks');

-- --------------------------------------------------------

--
-- Structure de la table `purchase`
--

CREATE TABLE `purchase` (
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  `quantity` int NOT NULL,
  `product_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `lastName` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `firstName` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `mdp` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `civility` enum('f','h') COLLATE utf8mb4_general_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `zip` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` enum('ROLE_USER','ROLE_ADMIN') COLLATE utf8mb4_general_ci DEFAULT 'ROLE_USER',
  `payment` enum('Carte bleue','Paypal','Paiement en 3 fois') COLLATE utf8mb4_general_ci DEFAULT 'Carte bleue'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `lastName`, `firstName`, `email`, `mdp`, `civility`, `birthday`, `phone`, `address`, `zip`, `city`, `country`, `role`, `payment`) VALUES
(1, 'leo', 'andrea', 'andrea.leo@colombbus.org', '$2y$10$b44pP33qqzIPQ8NNnzLEt.BdKdX03K67wOm.1G0tdorHNKXtQhyj6', 'h', NULL, NULL, NULL, NULL, NULL, NULL, 'ROLE_USER', 'Carte bleue');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id_brand`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Index pour la table `purchase`
--
ALTER TABLE `purchase`
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `brand`
--
ALTER TABLE `brand`
  MODIFY `id_brand` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id_image` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id_product`),
  ADD CONSTRAINT `image_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id_product`),
  ADD CONSTRAINT `image_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`id_product`),
  ADD CONSTRAINT `image_ibfk_4` FOREIGN KEY (`product_id`) REFERENCES `products` (`id_product`),
  ADD CONSTRAINT `image_ibfk_5` FOREIGN KEY (`product_id`) REFERENCES `products` (`id_product`),
  ADD CONSTRAINT `image_ibfk_6` FOREIGN KEY (`product_id`) REFERENCES `products` (`id_product`);

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `orders_ibfk_11` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `orders_ibfk_5` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `orders_ibfk_7` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `orders_ibfk_9` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id_brand`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id_brand`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id_brand`),
  ADD CONSTRAINT `products_ibfk_4` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id_brand`),
  ADD CONSTRAINT `products_ibfk_5` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id_brand`);

--
-- Contraintes pour la table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_10` FOREIGN KEY (`product_id`) REFERENCES `products` (`id_product`),
  ADD CONSTRAINT `purchase_ibfk_12` FOREIGN KEY (`product_id`) REFERENCES `products` (`id_product`),
  ADD CONSTRAINT `purchase_ibfk_13` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `purchase_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id_product`),
  ADD CONSTRAINT `purchase_ibfk_4` FOREIGN KEY (`product_id`) REFERENCES `products` (`id_product`),
  ADD CONSTRAINT `purchase_ibfk_6` FOREIGN KEY (`product_id`) REFERENCES `products` (`id_product`),
  ADD CONSTRAINT `purchase_ibfk_8` FOREIGN KEY (`product_id`) REFERENCES `products` (`id_product`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
