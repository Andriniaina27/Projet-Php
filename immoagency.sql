-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 11 avr. 2025 à 11:47
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `immoagency`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE `annonces` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `prix` int(11) NOT NULL,
  `type` enum('vente','location') NOT NULL,
  `statut` enum('disponible','indisponible') DEFAULT 'disponible',
  `utilisateur_id` int(11) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT current_timestamp(),
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`id`, `titre`, `description`, `prix`, `type`, `statut`, `utilisateur_id`, `date_creation`, `img`) VALUES
(16, 'Appartement à vendre', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo sapiente commodi quia molestiae. Quaerat nihil officiis neque repellendus, officia ad fugiat eligendi cum ut quidem non vel. Non, repellendus ad!', 90000000, 'vente', 'disponible', 2, '2025-01-16 11:25:18', '5f35231c-4cc3-4311-b309-2e08583c01e3.JFIF'),
(17, 'Appartement', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo sapiente commodi quia molestiae. Quaerat nihil officiis neque repellendus, officia ad fugiat eligendi cum ut quidem non vel. Non, repellendus ad!', 160000000, 'vente', 'indisponible', 2, '2025-02-17 14:39:14', 'Dream.jfif'),
(18, 'Maison à vendre', ' Lorem ipsum,  consectetur adipisicing elit. Explicabo sapiente commodi quia molestiae. Quaerat nihil officiis neque repellendus, officia ad fugiat eligendi cum ut quidem non vel. Non, repellendus ad!', 100000000, 'vente', 'disponible', 2, '2025-02-12 14:40:53', 'afa9942e-962c-410c-937f-014f3269542a.jfif'),
(20, 'Maison à louer', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus libero itaque, commodi molestiae quas ex placeat obcaecati eligendi atque cumque a, veritatis rem aspernatur consequuntur quod necessitatibus culpa dolorem nesciunt?', 890000, 'location', 'disponible', 2, '2025-03-19 09:30:59', 'Nature.jfif\r\n'),
(21, 'Maison à louer', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus libero itaque, commodi molestiae quas ex placeat obcaecati eligendi atque cumque a, veritatis rem aspernatur consequuntur quod necessitatibus culpa dolorem nesciunt?', 780000, 'location', 'indisponible', 2, '2025-04-04 23:00:00', '250257a7-83de-4e85-acc2-33d6eff8da90.jfif'),
(23, 'Appartement à louer', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt accusamus, officia facere expedita tempore ex atque iusto aliquam? Culpa aperiam expedita amet magni esse reiciendis iste iure sequi fugiat animi.', 980000, 'location', 'disponible', 2, '2025-04-09 23:00:00', 'HFD.jpg'),
(24, 'Maison à louer', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt accusamus, officia facere expedita tempore ex atque iusto aliquam? Culpa aperiam expedita amet magni esse reiciendis iste iure sequi fugiat animi.', 1200000, 'location', 'indisponible', 2, '2025-04-09 23:00:00', 'ALP.jpg'),
(25, 'Maison à vendre', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt accusamus, officia facere expedita tempore ex atque iusto aliquam? Culpa aperiam expedita amet magni esse reiciendis iste iure sequi fugiat animi.', 120000000, 'vente', 'indisponible', 2, '2025-04-09 23:00:00', 'HFD.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `contrats_location`
--

CREATE TABLE `contrats_location` (
  `id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `annonce_id` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `duree_mois` int(11) NOT NULL,
  `renouvelable` tinyint(1) DEFAULT 0,
  `statut` enum('actif','expiré','renouvelé') DEFAULT 'actif',
  `date_creation` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `contrats_location`
--

INSERT INTO `contrats_location` (`id`, `utilisateur_id`, `annonce_id`, `date_debut`, `duree_mois`, `renouvelable`, `statut`, `date_creation`) VALUES
(5, 3, 17, '2025-04-07', 12, 0, 'actif', '2025-04-07 10:09:14'),
(6, 5, 21, '2025-04-07', 12, 0, 'actif', '2025-04-07 10:29:53'),
(7, 6, 24, '2025-04-11', 12, 0, 'actif', '2025-04-11 08:38:54');

-- --------------------------------------------------------

--
-- Structure de la table `demandes`
--

CREATE TABLE `demandes` (
  `id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `annonce_id` int(11) NOT NULL,
  `type_demande` enum('achat','location') NOT NULL,
  `statut` enum('en attente','validée','refusée') DEFAULT 'en attente',
  `contrat_id` int(11) DEFAULT NULL,
  `date_demande` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `demandes`
--

INSERT INTO `demandes` (`id`, `utilisateur_id`, `annonce_id`, `type_demande`, `statut`, `contrat_id`, `date_demande`) VALUES
(7, 3, 16, '', 'refusée', NULL, '2025-04-06 12:02:50'),
(8, 3, 17, 'location', 'validée', 5, '2025-04-07 10:08:56'),
(9, 5, 21, 'location', 'validée', 6, '2025-04-07 10:29:40'),
(10, 5, 18, '', 'refusée', NULL, '2025-04-07 12:04:02'),
(11, 3, 25, '', 'validée', NULL, '2025-04-11 07:25:21'),
(12, 6, 24, 'location', 'validée', NULL, '2025-04-11 08:37:43'),
(13, 6, 16, '', 'refusée', NULL, '2025-04-11 09:42:17');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `expediteur_id` int(11) NOT NULL,
  `destinataire_id` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `date_envoi` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `expediteur_id`, `destinataire_id`, `contenu`, `date_envoi`) VALUES
(1, 2, 3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis molestiae iure itaque incidunt dolorum veritatis nobis eum neque praesentium tempora ducimus, repellat unde officiis inventore ea nam hic mollitia nostrum!', '2025-04-04 09:22:05'),
(2, 2, 4, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita est similique blanditiis eveniet vel iste excepturi assumenda rem nam ipsum eaque cum, dignissimos consequuntur dicta odio tenetur voluptatibus! Blanditiis, excepturi?', '2025-04-06 13:27:02'),
(3, 2, 5, 'Votre demande est validé!!', '2025-04-07 10:30:16'),
(4, 2, 6, 'Demande refusée!! Désolé Monsieur', '2025-04-11 09:44:03');

-- --------------------------------------------------------

--
-- Structure de la table `retours_clients`
--

CREATE TABLE `retours_clients` (
  `id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `note` int(11) DEFAULT NULL CHECK (`note` between 1 and 5),
  `date_creation` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `retours_clients`
--

INSERT INTO `retours_clients` (`id`, `utilisateur_id`, `commentaire`, `note`, `date_creation`) VALUES
(1, 3, 'Das ist toll!!', 5, '2025-04-05 19:04:01'),
(2, 4, 'Service satisfaisant.', 4, '2025-04-05 19:45:25'),
(3, 5, 'Merci pour votre service!!', 5, '2025-04-07 10:32:57'),
(5, 6, 'Merci beaucoup!', 5, '2025-04-11 08:53:12');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `role` enum('client','admin') NOT NULL,
  `date_inscription` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `email`, `mot_de_passe`, `role`, `date_inscription`) VALUES
(2, 'Luca Andriniaina', 'ranaivoluca3@gmail.com', '$2y$10$1Qe74m.ThxRA2r7.KYmC6u7CtTqMxZt1LQPIejXtmXFqLOK/fi1CC', 'admin', '2025-04-04 09:01:42'),
(3, 'Jorginho Harena', 'jorginho@gmail.com', '$2y$10$IKuY48VfDq5mnobo4/SrnuwSV33X7ygIwsqAzZ41XHvr39VRMW8Rq', 'client', '2025-04-04 09:09:02'),
(4, 'Amada', 'ranaivoluca@gmail.com', '$2y$10$rwNKpYT0ULkHbiqtwopyV.1bLudHNE1W7/S8Sn23Y1fHHK8KDyI2K', 'client', '2025-04-04 17:16:02'),
(5, 'Antsa Fitiavana', 'antsa@gmail.com', '$2y$10$WzXFyIuZpNjXztz4ATMV9esXAuAQBx2GxjfJH.fizUouuF9By3j9i', 'client', '2025-04-07 10:29:19'),
(6, 'Tolotra Niaina', 'tolotraniaina@gmail.com', '$2y$10$bsY1HfNCAjpNBzTaIAyFEOUEGGtYg.9l9D/Lzk8ByJpyWliO8xHWe', 'client', '2025-04-11 08:36:26');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Index pour la table `contrats_location`
--
ALTER TABLE `contrats_location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`),
  ADD KEY `annonce_id` (`annonce_id`);

--
-- Index pour la table `demandes`
--
ALTER TABLE `demandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`),
  ADD KEY `annonce_id` (`annonce_id`),
  ADD KEY `contrat_id` (`contrat_id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expediteur_id` (`expediteur_id`),
  ADD KEY `destinataire_id` (`destinataire_id`);

--
-- Index pour la table `retours_clients`
--
ALTER TABLE `retours_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `contrats_location`
--
ALTER TABLE `contrats_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `demandes`
--
ALTER TABLE `demandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `retours_clients`
--
ALTER TABLE `retours_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD CONSTRAINT `annonces_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `contrats_location`
--
ALTER TABLE `contrats_location`
  ADD CONSTRAINT `contrats_location_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contrats_location_ibfk_2` FOREIGN KEY (`annonce_id`) REFERENCES `annonces` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `demandes`
--
ALTER TABLE `demandes`
  ADD CONSTRAINT `demandes_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `demandes_ibfk_2` FOREIGN KEY (`annonce_id`) REFERENCES `annonces` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `demandes_ibfk_3` FOREIGN KEY (`contrat_id`) REFERENCES `contrats_location` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`expediteur_id`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`destinataire_id`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `retours_clients`
--
ALTER TABLE `retours_clients`
  ADD CONSTRAINT `retours_clients_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
