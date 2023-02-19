-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : dim. 19 fév. 2023 à 16:18
-- Version du serveur : 5.7.33
-- Version de PHP : 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `quaiantique`
--

-- --------------------------------------------------------

--
-- Structure de la table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` datetime NOT NULL,
  `number_of_people` int(11) NOT NULL,
  `infos` longtext COLLATE utf8mb4_unicode_ci,
  `step` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hour` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `moment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_booking` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `photo`) VALUES
(1, 'Viande du barbare', 'e447a84d260ea0220592357f7c06679f376cc8d7.jpg'),
(2, 'Pavé du pêcheur', '285ec23cd90b66f9a0f41b128ad3388318e214c5.jpg'),
(3, 'Surprise du voleur', 'e142b6a726ebf17d318c17e72c65e409508b70ac.jpg'),
(4, 'La grevette du pêcheur', 'b26d03c4bbde3f8a7b8b35d417754e9ef59afe0e.jpg'),
(5, 'Couronne du paysan', '65ce32ea0cb7f78f1f36b85adb620ee39ef72ac8.jpg'),
(6, 'On sait pas top !', 'af7070cad8d9ebc15b965c3ecad82c6c110bbc42.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id`, `name`, `price`) VALUES
(1, 'Menu Paysan', '20'),
(2, 'Menu Roi', '30');

-- --------------------------------------------------------

--
-- Structure de la table `menu_product`
--

CREATE TABLE `menu_product` (
  `menu_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `menu_product`
--

INSERT INTO `menu_product` (`menu_id`, `product_id`) VALUES
(1, 1),
(1, 4),
(1, 6),
(1, 10),
(2, 2),
(2, 5),
(2, 7),
(2, 9),
(2, 11);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `messenger_messages`
--

INSERT INTO `messenger_messages` (`id`, `body`, `headers`, `queue_name`, `created_at`, `available_at`, `delivered_at`) VALUES
(1, 'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:51:\\\"Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\\":2:{s:60:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0message\\\";O:39:\\\"Symfony\\\\Bridge\\\\Twig\\\\Mime\\\\TemplatedEmail\\\":4:{i:0;s:41:\\\"registration/confirmation_email.html.twig\\\";i:1;N;i:2;a:3:{s:9:\\\"signedUrl\\\";s:176:\\\"https://127.0.0.1:8000/verification/email?expires=1673023835&signature=mJ45nQ3VAErP2kDHunNHtH7%2BioEpGq78waE9VtOessY%3D&token=b6uSNxmh92FIADPeFFUozPG%2BNTE%2FOqoaBkYKC8nbh2Q%3D\\\";s:19:\\\"expiresAtMessageKey\\\";s:26:\\\"%count% hour|%count% hours\\\";s:20:\\\"expiresAtMessageData\\\";a:1:{s:7:\\\"%count%\\\";i:1;}}i:3;a:6:{i:0;N;i:1;N;i:2;N;i:3;N;i:4;a:0:{}i:5;a:2:{i:0;O:37:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\\":2:{s:46:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0headers\\\";a:3:{s:4:\\\"from\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:4:\\\"From\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:23:\\\"noreply@quai-antique.fr\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:12:\\\"Quai Antique\\\";}}}}s:2:\\\"to\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:2:\\\"To\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:21:\\\"league4geek@gmail.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:7:\\\"subject\\\";a:1:{i:0;O:48:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:7:\\\"Subject\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:55:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\0value\\\";s:25:\\\"Please Confirm your Email\\\";}}}s:49:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0lineLength\\\";i:76;}i:1;N;}}}s:61:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0envelope\\\";N;}}', '[]', 'default', '2023-01-06 15:50:35', '2023-01-06 15:50:35', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `parameter`
--

CREATE TABLE `parameter` (
  `id` int(11) NOT NULL,
  `open_mon` tinyint(1) NOT NULL,
  `open_thu` tinyint(1) NOT NULL,
  `open_wed` tinyint(1) NOT NULL,
  `open_thur` tinyint(1) NOT NULL,
  `open_fri` tinyint(1) NOT NULL,
  `open_sat` tinyint(1) NOT NULL,
  `open_sun` tinyint(1) NOT NULL,
  `number_of_places_lunch` int(11) NOT NULL,
  `number_of_places_dinner` int(11) NOT NULL,
  `schedule_cms` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `parameter`
--

INSERT INTO `parameter` (`id`, `open_mon`, `open_thu`, `open_wed`, `open_thur`, `open_fri`, `open_sat`, `open_sun`, `number_of_places_lunch`, `number_of_places_dinner`, `schedule_cms`) VALUES
(1, 1, 1, 1, 1, 1, 1, 0, 30, 50, '<p class=\"lead\"><b>Lundi</b> 10h à 12h et 18h à 23h </p>\r\n<p class=\"lead\"><b>Mardi</b> 10h à 12h et 18h à 23h </p>\r\n<p class=\"lead\"><b>Mercredi</b> 10h à 12h et 18h à 23h </p>\r\n<p class=\"lead\"><b>Jeudi</b> 10h à 12h et 18h à 23h </p>\r\n<p class=\"lead\"><b>Vendredi</b> 10h à 12h et 18h à 23h </p>\r\n<p class=\"lead\"><b>Samedi</b> 10h à 12h et 18h à 23h </p>\r\n<p class=\"lead\"><b>Dimanche</b> 10h à 12h et 18h à 23h </p>');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `category`) VALUES
(1, 'Tourte de champignon', 'Une tourte à base de champignons sautés, d\'oignons et de fines herbes, enveloppée dans une pâte à tarte.', '10', 'Entrée'),
(2, 'Soupe d\'oignon à la française', 'Une soupe épaisse faite d\'oignons cuits dans du bouillon de viande avec du pain grillé et du fromage fondu.', '9', 'Entrée'),
(3, 'Poulet rôti à la sauge', 'Un poulet entier assaisonné de sauge et rôti au four jusqu\'à ce qu\'il soit doré et croustillant.', '15', 'Plats principaux'),
(4, 'Pottage de légumes', 'Un ragoût de légumes mijoté avec du bouillon de viande, de la viande hachée et des herbes.', '19', 'Plats principaux'),
(5, 'Ragoût de bœuf à la bière', 'Un ragoût de bœuf mijoté dans de la bière avec des légumes, des herbes et des épices.', '19', 'Plats principaux'),
(6, 'Pain d\'épices', 'Un pain sucré et épicé à base de miel, de cannelle, de gingembre et de clous de girofle.', '7', 'Accompagnements'),
(7, 'Carottes glacées au miel', 'Des carottes cuites dans du miel et du beurre jusqu\'à ce qu\'elles soient tendres et caramélisées.', '10', 'Accompagnements'),
(8, 'Tarte aux pommes', 'Une tarte sucrée à base de pommes, de sucre et d\'épices, enveloppée dans une pâte à tarte.', '10', 'Desserts'),
(9, 'Pouding de riz', 'Un pudding crémeux à base de riz, de lait, de sucre et d\'épices, cuit au four jusqu\'à ce qu\'il soit doré et croustillant.', '10', 'Accompagnements'),
(10, 'Bière', 'Une douce bière appréciée par nos amis les teutons.', '5', 'Nectar'),
(11, 'Hydromiel', 'C\'est un peu comme de l\'hydromel mais avec beaucoup plus de miel. Boisson servie à l\'état solide.', '12', 'Nectar'),
(12, 'Pouding de riz', 'Un pudding crémeux à base de riz, de lait, de sucre et d\'épices, cuit au four jusqu\'à ce qu\'il soit doré et croustillant.', '8', 'Desserts');

-- --------------------------------------------------------

--
-- Structure de la table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `hour` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_of_the_day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `boolean` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `schedule`
--

INSERT INTO `schedule` (`id`, `hour`, `time_of_the_day`, `boolean`) VALUES
(1, '10h', 'midi', 1),
(2, '11h', 'midi', 1),
(3, '12h', 'midi', 1),
(4, '13h', 'midi', 1),
(5, '14h', 'midi', 1),
(6, '18h', 'dinner', 1),
(7, '19h', 'dinner', 1),
(8, '20h', 'dinner', 1),
(9, '21h', 'dinner', 1),
(10, '22h', 'dinner', 1),
(11, '23h', 'dinner', 1),
(12, '24h', 'dinner', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `allergy` longtext COLLATE utf8mb4_unicode_ci,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `common_number_of_reservation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `allergy`, `name`, `phone`, `common_number_of_reservation`) VALUES
(1, 'contact@quai-antique.fr', '[\"ROLE_ADMIN\"]', '$2y$13$JMcbBdI8e/IdnPVXHTu2QOwyhwB.cMOtxn74RICKay5EsiTqUXe5e', 'Aucune', 'Jean', '0466213729', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E00CEDDEA76ED395` (`user_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `menu_product`
--
ALTER TABLE `menu_product`
  ADD PRIMARY KEY (`menu_id`,`product_id`),
  ADD KEY `IDX_5B911913CCD7E912` (`menu_id`),
  ADD KEY `IDX_5B9119134584665A` (`product_id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `parameter`
--
ALTER TABLE `parameter`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT pour la table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `parameter`
--
ALTER TABLE `parameter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `FK_E00CEDDEA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `menu_product`
--
ALTER TABLE `menu_product`
  ADD CONSTRAINT `FK_5B9119134584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_5B911913CCD7E912` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
