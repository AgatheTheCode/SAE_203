-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 03 mai 2022 à 11:28
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `meganerd_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id_admin` bigint(20) UNSIGNED NOT NULL,
  `pseudo_admin` varchar(255) NOT NULL,
  `mdp_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id_admin`, `pseudo_admin`, `mdp_admin`) VALUES
(1, 'Agathe', 'Agathe'),
(2, 'Moulin', 'Moulin'),
(3, 'Thomas', 'Thomas'),
(4, 'Etane', 'Etane'),
(5, 'Lou', 'Couzinet'),
(6, 'Moulin', 'Moulin'),
(7, 'Cazier', 'Cazier'),
(8, 'Ferry', 'Ferry');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` bigint(20) UNSIGNED NOT NULL,
  `nom_categorie` varchar(255) NOT NULL,
  `description_categorie` varchar(255) NOT NULL,
  `image_categorie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`, `description_categorie`, `image_categorie`) VALUES
(10, 'T-shirt', 'Les T-Shirt que nous proposons ', '/image/categorie/tshirt.jpg'),
(11, 'Pins', 'Découvrez notre collection de Pins', '/image/categorie/pins.jpg'),
(12, 'Tasses', 'Découvrez nos tasse céramique 370ml', '/image/categorie/tasse.jpg'),
(13, 'Stickers', 'Découvrez nos Stickers', '/image/categorie/stickers.jpg'),
(14, 'Sweat', 'Découvrez nos Sweat et Pull', '/image/categorie/sweat.jpg'),
(15, 'Lunettes', 'Découvrez nos lunettes anti lumière bleue', '/image/categorie/glasses.jpg'),
(16, 'Console_Rétro', 'Découvrez nos console rétro', '/image/categorie/retro.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` bigint(20) UNSIGNED NOT NULL,
  `nom_client` varchar(255) NOT NULL,
  `prenom_client` varchar(255) NOT NULL,
  `ville_client` varchar(255) NOT NULL,
  `cp_client` varchar(255) NOT NULL,
  `numvoie_client` varchar(255) NOT NULL,
  `rue_client` varchar(255) NOT NULL,
  `email_client` varchar(255) NOT NULL,
  `mdp_client` varchar(255) NOT NULL,
  `pseudo_client` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom_client`, `prenom_client`, `ville_client`, `cp_client`, `numvoie_client`, `rue_client`, `email_client`, `mdp_client`, `pseudo_client`) VALUES
(12, '', '', '', '', '', '', '', '$2y$10$5DdNOY4RTiEE9NCLaxv3COF2IOmwOER6POiXoY0LmNVxcF/JNwTzW', 'LILI');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` bigint(20) UNSIGNED NOT NULL,
  `id_produit` bigint(20) UNSIGNED NOT NULL,
  `id_client` bigint(20) UNSIGNED NOT NULL,
  `qte_produit` int(255) NOT NULL,
  `date_commande` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `id_genre` bigint(20) UNSIGNED NOT NULL,
  `nom_genre` varchar(255) NOT NULL,
  `description_genre` varchar(255) NOT NULL,
  `image_genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`id_genre`, `nom_genre`, `description_genre`, `image_genre`) VALUES
(3, 'Cyberpunk', 'Cyberpunk', '/cyberpunk.jpg'),
(4, 'retro', 'Rétro', '/rétro.jpg'),
(5, 'Steampunk', 'Steampunk', 'steampunk.jpg'),
(6, 'FPS', 'First-Person-Shooter', '/fps.jpg'),
(7, 'Simulation', 'Simulation', '/simulation.jpg'),
(8, 'MMO', 'MMORPG (MEUPORG)', '/meuporg.jpg'),
(9, 'Sony', 'Sony', '/sony.jpg'),
(10, 'Sega', 'C\'est plus fort que toi !', '/sega.jpg'),
(11, 'Metroidvania', 'Métroidevania', '/métrova.jpg'),
(12, 'RTS', 'Rts', 'rts.jpg'),
(13, 'space_shooter', 'Space shooter', 'spasho.jpg'),
(25, 'Aucun', '/', '/'),
(26, 'Aucun', '/', '/');

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

CREATE TABLE `ligne_commande` (
  `code_commande` bigint(20) UNSIGNED NOT NULL,
  `code_produit` bigint(20) UNSIGNED NOT NULL,
  `qte_commande` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_produit` bigint(20) UNSIGNED NOT NULL,
  `nom_produit` varchar(255) NOT NULL,
  `image_produit` varchar(255) NOT NULL,
  `id_categorie` bigint(20) UNSIGNED NOT NULL,
  `id_genre` bigint(20) UNSIGNED NOT NULL,
  `prix_produit` float(4,2) NOT NULL,
  `note_produit` int(1) NOT NULL,
  `desc_produit` varchar(255) NOT NULL,
  `qte_produit` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `nom_produit`, `image_produit`, `id_categorie`, `id_genre`, `prix_produit`, `note_produit`, `desc_produit`, `qte_produit`) VALUES
(3, 'Console Rétro', '/image.jpg', 16, 9, 99.00, 5, '', 23),
(4, 'Console rétro', 'image.jpg', 16, 10, 99.00, 5, 'console rétro', 12),
(5, 'T-shrit 1', 'T-shirt 1', 10, 4, 12.00, 4, '/', 78),
(6, 'Sweat', 'Sweat.jpg', 14, 3, 39.00, 3, 'sweat', 12),
(7, 'Tasse', 'Tasse', 12, 13, 12.00, 5, 'tasse', 43),
(8, 'pins', 'pins', 11, 12, 2.00, 0, '/', 99),
(9, 'Stickers', '/', 13, 11, 1.00, 5, '/', 99),
(10, 'pins', 'pins', 11, 12, 2.00, 0, '/', 99),
(11, 'Stickers', '/', 13, 11, 1.00, 5, '/', 99),
(13, 'Lunettes', '/', 15, 25, 39.00, 5, '/', 2),
(14, 'Lunettes', '/', 15, 25, 39.00, 5, '/', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `id_admin` (`id_admin`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`),
  ADD UNIQUE KEY `id_categorie` (`id_categorie`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`),
  ADD UNIQUE KEY `id_client` (`id_client`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD UNIQUE KEY `id_commande` (`id_commande`),
  ADD KEY `fk_Commande_Client` (`id_client`),
  ADD KEY `fk_Commande_Produit` (`id_produit`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Index pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD PRIMARY KEY (`code_commande`,`code_produit`),
  ADD KEY `fk_Lignes_commandes_Produit` (`code_produit`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`),
  ADD UNIQUE KEY `id_produit` (`id_produit`),
  ADD KEY `fk_produit_categorie` (`id_categorie`),
  ADD KEY `fk_produit_genre` (`id_genre`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id_admin` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_Commande_Client` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `fk_Commande_Produit` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`);

--
-- Contraintes pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD CONSTRAINT `fk_Lignes_commandes_Commandes` FOREIGN KEY (`code_commande`) REFERENCES `commande` (`id_commande`),
  ADD CONSTRAINT `fk_Lignes_commandes_Produit` FOREIGN KEY (`code_produit`) REFERENCES `produit` (`id_produit`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `fk_produit_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_produit_genre` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
