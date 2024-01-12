-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 12 jan. 2024 à 20:54
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `comparateurvehicules`
--

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `AvisVehiculeId` int NOT NULL AUTO_INCREMENT,
  `Note` int DEFAULT NULL,
  `Apprecie` int DEFAULT NULL,
  `UserId` int DEFAULT NULL,
  `Confirmer` tinyint(1) DEFAULT NULL,
  `VehiculeId` int DEFAULT NULL,
  `Commentaire` text,
  `MarqueId` int DEFAULT NULL,
  PRIMARY KEY (`AvisVehiculeId`),
  KEY `UserId` (`UserId`),
  KEY `VehiculeId` (`VehiculeId`),
  KEY `MarqueId` (`MarqueId`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`AvisVehiculeId`, `Note`, `Apprecie`, `UserId`, `Confirmer`, `VehiculeId`, `Commentaire`, `MarqueId`) VALUES
(32, 4, 0, 35, 1, 28, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', NULL),
(35, 5, 0, 35, 1, 28, 'great Vehicule', NULL),
(36, 4, 0, 35, 1, 28, 'Nice Car', NULL),
(37, 5, 0, 35, 1, 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit	', NULL),
(38, 4, 0, 35, 1, 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit	', NULL),
(39, 4, 0, 35, 1, 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit	', NULL),
(40, 3, 0, 35, 1, 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit	', NULL),
(41, 5, 0, 35, 1, NULL, 'Greate brand', 1),
(42, 5, 0, 35, 1, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit	', 1),
(43, 1, 0, 35, 1, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit	', 1),
(44, 3, 0, 35, 1, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit	', 1),
(45, 3, 0, 35, 1, NULL, 'What a brand', 1),
(46, 5, 0, 30, 1, NULL, 'the new brand in algeria', 1),
(47, 1, 0, 30, 1, NULL, 'bad brand ', 1),
(48, 2, 0, 30, 1, NULL, 'bad ', 1),
(49, 5, 0, 30, 1, 8, 'Great Vehicule', NULL),
(50, 3, 0, 30, 1, 8, 'A Nice One', NULL),
(51, 5, 0, 35, 1, 29, 'the best vehicule forever', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `caracteristique`
--

DROP TABLE IF EXISTS `caracteristique`;
CREATE TABLE IF NOT EXISTS `caracteristique` (
  `CaracteristiqueId` int NOT NULL AUTO_INCREMENT,
  `Energie` varchar(50) DEFAULT NULL,
  `Consommation` varchar(50) DEFAULT NULL,
  `Version` varchar(255) DEFAULT NULL,
  `Annees` int DEFAULT NULL,
  `Boite` varchar(50) DEFAULT NULL,
  `NbVitesses` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`CaracteristiqueId`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `caracteristique`
--

INSERT INTO `caracteristique` (`CaracteristiqueId`, `Energie`, `Consommation`, `Version`, `Annees`, `Boite`, `NbVitesses`) VALUES
(3, 'Essence', '7,1 l/100 km', '1,5 T DCT', 2022, 'Automatique', '7'),
(4, 'Essence', '8,1 l/100 km', '2,0 T DCT', 2018, 'Automatique', '6'),
(5, 'Essence', '6.2 l/100 km', '1,5 T CVT', 2020, 'Automatique', 'CVT'),
(6, 'Essence', '5,4 l/100 km', '1,0 TCe', 2017, 'Manuelle', '5'),
(7, 'Essence', '6,3 l/100 km', '1,3 TCe', 2020, 'Manuelle', '6'),
(8, 'Essence', '5,9 l/100 km', '2 TCe', 2016, 'Manuelle', '6'),
(9, 'ss', 'sss', 'dd', 2010, 's', '2'),
(10, 'jj', 'mlml', 'll', 10, 'ml', '5'),
(11, '11', '1', '1', 1, '1', '1'),
(12, '11', '1', '1', 1, '1', '1'),
(13, '2', '2', '2', 2, '2', '22'),
(14, '2', '2', 'j', 2, '22', '2'),
(15, '2', '2', 'j', 2, '22', '2'),
(16, '1', '1', '1', 1, '1', '1'),
(17, '11', '1', '1', 11, '1', '1'),
(18, '4', '1', '4', 4, '1', '1'),
(19, 'Hybride', ' 4.9 l/100km', ' Hybrid LE', 2022, 'CVT', '7'),
(20, 'Essence', '8.6 l/100km', 'Adventure', 2022, 'Automatique', '8'),
(21, 'Hybride', '4.4 l/100km', 'XLE', 2022, 'Automatique', '6'),
(22, 'Essence', '8.3 l/100km', 'Comfortline', 2022, 'Automatique', '8'),
(23, 'Essence', '11.0', 'SEL Premium R-Line', 2022, 'Automatique', '8'),
(24, 'Essence', '9.4 L/100km', 'R-Line', 2022, 'Automatique', '6'),
(25, 'Essence', '15.6 L/100km ', 'GT Fastback', 2022, 'Manuelle', '6'),
(26, 'Essence', '13.1 L/100km', 'Limited', 2022, 'Automatique', '10'),
(27, 'Essence', '8.0 L/100km ', ' SE Hatch', 2022, 'Automatique', '6');

-- --------------------------------------------------------

--
-- Structure de la table `comparison`
--

DROP TABLE IF EXISTS `comparison`;
CREATE TABLE IF NOT EXISTS `comparison` (
  `ComparisonId` int NOT NULL AUTO_INCREMENT,
  `VehiculeId1` int DEFAULT NULL,
  `VehiculeId2` int DEFAULT NULL,
  `NombreDesFoisUtiliser` int DEFAULT NULL,
  PRIMARY KEY (`ComparisonId`),
  KEY `VehiculeId1` (`VehiculeId1`),
  KEY `VehiculeId2` (`VehiculeId2`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `comparison`
--

INSERT INTO `comparison` (`ComparisonId`, `VehiculeId1`, `VehiculeId2`, `NombreDesFoisUtiliser`) VALUES
(19, 7, 8, 2),
(22, 10, 7, 2),
(23, 10, 12, 1),
(24, 7, 12, 1),
(27, 8, 24, 1),
(28, 26, 29, 1);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `logo` int DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `logo` (`logo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `type`, `url`, `logo`, `Name`) VALUES
(1, 'facebook', 'https://www.facebook.com', 1, 'AutoLook'),
(2, 'email', 'mailto:ks_sellami@esi.dz', 2, 'autolook@gmail.com'),
(3, 'instagram', 'https://www.instagram.com', 3, 'AutoLook'),
(4, 'phone', 'tel:+213558684686', 4, '+213558684686');

-- --------------------------------------------------------

--
-- Structure de la table `diaporama`
--

DROP TABLE IF EXISTS `diaporama`;
CREATE TABLE IF NOT EXISTS `diaporama` (
  `DiaporamaId` int NOT NULL AUTO_INCREMENT,
  `IdNews` int DEFAULT NULL,
  `IdImage` int DEFAULT NULL,
  `UrlPublicite` varchar(255) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`DiaporamaId`),
  KEY `IdNews` (`IdNews`),
  KEY `IdImage` (`IdImage`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `diaporama`
--

INSERT INTO `diaporama` (`DiaporamaId`, `IdNews`, `IdImage`, `UrlPublicite`, `Type`) VALUES
(5, NULL, 118, 'https://www.caradisiac.com/publicites-pour-les-voitures-de-nouvelles-regles-en-2022-193873.htm', 'pub'),
(6, NULL, 117, 'https://www.automobile-propre.com/breves/publicite-les-constructeurs-vont-devoir-promouvoir-les-alternatives-a-la-voiture/', 'pub'),
(18, 14, 113, '/ComparateurVehicules/newsdetails?id=14', 'news'),
(20, 22, 115, '/ComparateurVehicules/newsdetails?id=22', 'news'),
(21, 17, 116, '/ComparateurVehicules/newsdetails?id=17', 'news');

-- --------------------------------------------------------

--
-- Structure de la table `dimensions`
--

DROP TABLE IF EXISTS `dimensions`;
CREATE TABLE IF NOT EXISTS `dimensions` (
  `DimensionsId` int NOT NULL AUTO_INCREMENT,
  `Largeur` decimal(5,2) DEFAULT NULL,
  `Hauteur` decimal(5,2) DEFAULT NULL,
  `NombrePlaces` int DEFAULT NULL,
  `VolumeCoffre` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`DimensionsId`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `dimensions`
--

INSERT INTO `dimensions` (`DimensionsId`, `Largeur`, `Hauteur`, `NombrePlaces`, `VolumeCoffre`) VALUES
(1, '1.83', '1.70', 5, '475.00'),
(2, '1.86', '1.72', 7, '892.00'),
(3, '1.76', '1.62', 5, '420.00'),
(4, '1.79', '1.44', 5, '391.00'),
(5, '1.81', '1.44', 5, '384.00'),
(6, '1.77', '1.56', 5, '422.00'),
(7, '1.00', '2.00', 5, '5.00'),
(8, '1.50', '1.20', 1, '2.00'),
(9, '1.00', '11.00', 1, '1.00'),
(10, '1.00', '11.00', 1, '1.00'),
(11, '2.00', '22.00', 2, '2.00'),
(12, '2.00', '999.99', 2, '2.00'),
(13, '2.00', '999.99', 2, '2.00'),
(14, '1.00', '1.00', 1, '1.00'),
(15, '1.00', '1.00', 1, '1.00'),
(16, '444.00', '1.00', 4, '4.00'),
(17, '1.80', '1.40', 5, '428.00'),
(18, '1.86', '1.72', 5, '1.06'),
(19, '1.76', '1.49', 5, '697.00'),
(20, '1.78', '1.45', 5, '381.00'),
(21, '1.84', '1.66', 5, '1.07'),
(22, '1.83', '1.45', 5, '450.00'),
(23, '1.91', '1.38', 4, '382.00'),
(24, '2.08', '1.78', 6, '515.00'),
(25, '1.73', '1.47', 5, '292.00');

-- --------------------------------------------------------

--
-- Structure de la table `favorite`
--

DROP TABLE IF EXISTS `favorite`;
CREATE TABLE IF NOT EXISTS `favorite` (
  `favoriteID` int NOT NULL AUTO_INCREMENT,
  `vehiculeID` int NOT NULL,
  `userID` int NOT NULL,
  PRIMARY KEY (`favoriteID`),
  KEY `vehiculeID` (`vehiculeID`),
  KEY `userID` (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `favorite`
--

INSERT INTO `favorite` (`favoriteID`, `vehiculeID`, `userID`) VALUES
(23, 10, 30),
(30, 23, 30),
(20, 8, 30),
(32, 29, 35),
(28, 11, 33),
(31, 26, 35),
(26, 10, 31);

-- --------------------------------------------------------

--
-- Structure de la table `guideachat`
--

DROP TABLE IF EXISTS `guideachat`;
CREATE TABLE IF NOT EXISTS `guideachat` (
  `GuideAchatId` int NOT NULL AUTO_INCREMENT,
  `Titre` varchar(255) DEFAULT NULL,
  `ImageId` int DEFAULT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `Text` text,
  `VehiculeId` int DEFAULT NULL,
  PRIMARY KEY (`GuideAchatId`),
  KEY `ImageId` (`ImageId`),
  KEY `VehiculeId` (`VehiculeId`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `guideachat`
--

INSERT INTO `guideachat` (`GuideAchatId`, `Titre`, `ImageId`, `Description`, `Text`, `VehiculeId`) VALUES
(6, 'How to Buy or Lease a New Car', 17, 'Select the right vehicle, decide between leasing or buying, and prepare to negotiate with the dealer using this handy guide.', 'Whether it\'s your first car or you\'re replacing your old ride, the process of buying or leasing a new vehicle is often a daunting one. Not only is a large purchase stressful, the car-buying process is ripe with opportunities for consumers to make an error in judgment or be taken advantage of by a pushy salesperson. Not to fear! Car and Driver\'s Buyer\'s Guide team is here to arm you with all the information you need to go into this process with confidence—and to come out of it feeling good about the decisions you\'ve made as you\'re handed the keys to your new car, truck, SUV, or van.', NULL),
(8, 'Quel crossover Kia Niro choisir ?', 100, 'La deuxième génération du crossover Kia Niro est arrivée l’an dernier. Il s’agit d’un modèle doté de motorisations électrifiées : hybride, hybride rechargeable ou 100 % électrique. Proposé avec trois niveaux de finition, ce modèle qui plait méritait un petit guide d’achat afin de découvrir le couple motorisation/finition qui lui convient le mieux.\r\n', 'En 2016, la marque coréenne Kia lançait le Kia Niro, son premier modèle hybride avant de le proposer également en hybride rechargeable puis en 100 % électrique. Depuis, le Kia Niro 1 s’est bien vendu et aujourd’hui Kia propose la deuxième mouture de ce crossover, le Kia Niro 2, qui voit sa taille progresser de 4,36 m à 4,42 m, ce qui le met à cheval entre deux catégories, celle des crossovers citadins et celle des crossovers compacts. Afin de montrer qu’il s’agit bien d’une nouvelle génération, le style de ce modèle évolue. Il affiche désormais des lignes plus affirmées, un peu d’agressivité dans son regard, une calandre réduite, des feux arrière en forme de boomerang et un montant de custode qui peut être coloré (option à 400 €). Tout ceci rend très original ce nouveau modèle.\r\n\r\nSous le capot de ce modèle, on trouve toujours la triple offre de motorisations, avec de l’hybride « simple », de l’hybride rechargeable et du 100 % électrique. Les puissances n’évoluent pas pour les versions hybride et électrique qui développent respectivement 141 ch et 204 ch, tandis que la version PHEV voit sa puissance progresser de 141 à 183 ch. Si le modèle PHEV promet une autonomie de 65 km, la version électrique avance une autonomie moyenne (cycle mixte) de 460 km, ce qui se traduira par 400 km environ dans la réalité et 350 km sur l’autoroute. Pour la recharge, le PHEV avec un chargeur embarqué de 3,3 kW va mettre un peu moins de 3 heures pour passer de 0 à 100 % sur un boîtier mural AC 6,6 kW (32A). L’électrique dont le chargeur embarqué ne va pas au-delà de 11,2 kW mettra 43 minutes pour passer de 10 à 80 % sur un chargeur rapide de 350 kW.\r\n\r\nDans l’habitacle, le nouveau Kia Niro 2 cultive son originalité et sa modernité en reprenant la planche de bord des dernières nouveautés Kia. Elle se compose d’une double dalle numérique avec un combiné d’instrumentation de 10,25 pouces et un écran d’infodivertissement de 10,25 pouces également. Mais cela est valable pour la version d’entrée de gamme électrique (Kia Niro EV), pour les hybrides il faudra se contenter, en entrée de gamme, d’un combiné d’instrumentation avec écran « Supervision » de 4,2 pouces et d’un écran tactile de 8 pouces. Il faudra donc monter en gamme pour disposer de la même dotation numérique que le modèle électrique. Cette dotation « double écran » est complétée par une réglette numérique placée sous les écrans qui commande à la fois la climatisation et la radio. Hormis la dotation numérique pour les hybrides, ce modèle est très bien équipé dès l’entrée de gamme avec un maximum d’aide à la conduite, ainsi que la climatisation auto bizone, des jantes alliage de 16 pouces (17 pouces pour l’électrique), le régulateur de vitesse adaptatif avec reconnaissance des panneaux, l’assistant de conduite dans les embouteillages et une carte de recharge « Kia Charge » pour la version hybride rechargeable. Pour ceux qui en demanderaient plus, il y a un catalogue d’options dans lequel on peut trouver une pompe à chaleur pour la version électrique qui n’en possède pas de série, quelle que soit la finition choisie. À bord, on note que la qualité des matériaux est globalement bonne malgré la présence de plastiques durs. Il y a de nombreux rangements, l’habitabilité est très correcte à l’arrière et la contenance du coffre se montre généreuse. Ceci en particulier pour les versions électrique et hybride qui proposent pour l’une 475 litres (dont 20 litres dans un petit coffre à l’avant) et pour l’autre 451 litres, tandis que la version hybride rechargeable n’affiche que 348 litres.\r\n\r\nLorsque l’on prend la route avec le Kia Niro 2, on se rend compte que, quelle que soit la motorisation utilisée, ce modèle affiche le même comportement. Il est doté d’un bon amortissement qui efface la plupart des défauts de la route, la prise de roulis est bien contrôlée, le freinage est à la hauteur. Attention, ce véhicule n’a rien de sportif et afin de mieux apprécier le confort de roulement et la souplesse de la mécanique, il convient de conduire ce Kia Niro en « bon père de famille ». En ce qui concerne les tarifs de ce modèle, en entrée de gamme la version hybride se positionne à 32 340 €, pour l’hybride rechargeable c\'est 39 240 €, tandis que pour la version électrique le premier prix est de 45 640 € (hors bonus). Bien entendu, comme tous les modèles de chez Kia, la garantie est de 7 ans.\r\n\r\nLe crossover Kia Niro en dix points\r\nType : crossover, cinq portes, cinq places\r\nExiste en hybride, hybride rechargeable et électrique\r\nDimensions (L x l x h en mètres) : 4,42 x 1.83 x 1,56\r\nVolume de coffre mini : 451 litres (HEV), 348 litres (PHEV), 475 litres dont 20 litres à l’avant (EV)\r\nVolume de coffre maxi : 1 445 litres (HEV), 1 342 litres (PHEV), 1 392 litres (EV)\r\nMotorisation hybride : 1.6 GDi & électrique DCT6, puissance cumulée 141 ch\r\nMotorisation hybride plug-in : 1.6 GDi & électrique DCT6, puissance cumulée 183 ch\r\nMotorisation électrique : Moteur électrique synchrone à aimant permanent, 150 kW (204 ch)\r\nTrois finitions : Motion, Active, et Premium\r\nTarifs : à partir de 32 340 € (hybride) ; 39 240 € (hybride plug-in) ; 45 640 € (- 5 000,00 €) électrique', NULL),
(9, 'Quelle Mercedes Classe E choisir ?', 101, 'La nouvelle Mercedes Classe E est d’ores et déjà en vente. Cette grande routière est l’un des modèles emblématiques de la firme à l’étoile. Pour sa sixième génération, elle devient encore plus luxueuse et s’équipe de technologies dernier cri. Disponible à son lancement avec quatre motorisations et trois finitions, il est temps de savoir quel est le meilleur couple motorisation/finition pour cette Mercedes Classe E.\r\n', 'Sans révolutionner son design, Mercedes transforme sa nouvelle Classe E avec des arêtes moins vives, des courbes plus douces. Elle affiche une très grande calandre qui peut en option, voir ses contours s’éclairer, La Mercedes Classe E adopte également des projecteurs dont la signature lumineuse est en trois parties et des feux arrière avec de belles étoiles teintées de rouge. Une très grande étoile trône en plein centre de la calandre sur les deux finitions « d’entrée de gamme » Avantgarde Line et AMG Line, tandis que l’Exclusive Line se pare d’une étoile sur le capot et d’une calandre dotée de trois doubles lamelles. La nouvelle venue conserve son allure tricorps et voit ses cotes extérieures très légèrement progresser.\r\n\r\nC’est à bord que la Mercedes Classe E passe un cap et se modernise comme en témoigne le large écran Superscreen (en option) qui dispose d’un écran multimédia central de belle dimension équipé de la dernière génération du système MBUX et d’un écran spécial pour le passager. La Mercedes Classe E permet alors au passager de visionner un film en roulant et grâce au système de sonorisation 4D-Surround Burmester (en option ou de série avec Exclusive Line) on a l\'impression d\'être comme au cinéma. Qu’on se rassure tout n’est pas en option et avec la finition d’entrée de gamme, la Mercedes Classe E est fort bien pourvue avec de série : volant multifonctions recouvert de cuir Nappa, sièges avant chauffants à réglages électriques, combiné d’instrumentation de 12,3 pouces, écran multimédia de 14 pouces (36 cm), climatisation auto, avertisseur d’angles morts, régulateur de vitesse adaptatif, assistant au changement de voie actif…\r\n\r\nTrois finitions sont au programme de la Mercedes Classe E et elles sont toutes richement dotées avec des équipements permettant à la Mercedes Classe E d\'être une Mercedes Classe S en réduction. Ainsi de série ou en option les possesseurs d’un iPhone n’auront plus besoin de clé pour accéder à leur auto, la fonction « routine » permettra à la voiture d’enregistrer les habitudes de son (ou sa) propriétaire, il y aura la possibilité de faire des visioconférences avec Zoom, le passager pourra regarder un film sur son écran personnel sans que cela ne perturbe le conducteur. Luxe, calme et volupté sont les maîtres-mots de cette auto qui prend également soin des occupants de la banquette arrière. Là, il y a beaucoup d’espace pour deux adultes avec des assises très confortables, seule la place centrale du fait de la dureté de son rembourrage et de la présence d’un imposant tunnel de transmission ne pourra servir que de dépannage. Quant au volume de coffre avec 540 litres il peut transporter tous les bagages d’une famille, la Classe E étant toujours disponible en break on peut même compter sur 615 litres dans ce cas. Mais attention, cela est valable pour les versions thermiques, les Mercedes Classe E Break motorisées par de l’hybride rechargeable ne disposant que de 370 litres pour la berline et de 460 litres pour le break.\r\n\r\nSous le capot de cette Mercedes Classe E on trouve pour le moment une motorisation essence micro-hybridée de 204 ch (E 200), un diesel lui aussi micro-hybridé de 197 ch (E 220d), ainsi que deux motorisations hybrides rechargeables de 313 ch (E 300e) et 381 ch (E 400e). Celles-ci disposent d’une autonomie de 100 km environ en électrique. Plus tard arrivera un six cylindres essence et une motorisation hybride plug-in qui sera diesel cette fois (E 300de). Si la berline a droit à toutes les motorisations, y compris lorsqu’elles sont associées à la transmission intégrale 4Matic (E 220d 4matic, E 300e 4Matic et E 400e 4Matic), la version break se contente de deux roues motrices et de trois motorisations : essence E 200, diesel E 220d et hybride plug-in E 300e. Le système 4Matic ce sera pour la version break Mercedes Classe E All-Terrain qui arrivera au premier trimestre 2024.\r\n\r\nSur la route, grande routière la Mercedes Classe E s’y comporte très bien. Ne manquant pas d’agilité c’est en conduite calme et apaisée que l’on apprécie le mieux son silence de fonctionnement et son confort de roulement. Bardée d’aides à la conduite (en option ou de série), on s’apprête avec elle à franchir le pas vers la conduite autonome de niveau 3. Parmi les aides à la conduite, le dispositif de changement de voie automatique, ou ALC (Automatic Lane Change) est particulièrement bluffant. Ainsi, quand le régulateur de vitesse est enclenché et que la voiture s’approche d’un véhicule, la voiture peut changer de file toute seule pour le dépasser. Il est nécessaire pour cela que les marquages de voie soient détectés et que l\'espace disponible soit suffisant. Pour plus de sécurité, le système Mercedes oblige encore le conducteur à conserver les mains sur le volant pendant la manœuvre. Autre élément technologique de haut niveau, la présence pour la première fois sur cette auto de quatre roues directrices associée à une suspension pneumatique (Pack Dynamique en option) qui améliore l’agilité tout en contrôlant les mouvements de caisse.\r\n\r\nQuelle Mercedes Classe E choisir ?\r\nBien entendu, ce haut degré de sophistication s’accompagne, hélas, d’une augmentation de prix conséquente (plus de 2 000 € en moyenne). La Mercedes Classe E n’est pas donnée et face à la concurrence de la nouvelle BMW Série 5 ou de l’actuelle Audi A6 elle affiche des tarifs plus élevés sans que cela inquiète Mercedes pour autant. La marque compte sur l’aspect technologique et sur le confort de son auto pour renforcer son image haut de gamme.\r\n\r\nLa Mercedes Classe E en dix points\r\n\r\nBerline et break 5 portes, 5 places\r\nDimensions berline (L x l x h en mètres) : 4,95 x 1,88 (2,073 rétros déployés) x 1,47. Break : 4,95 x 1,88 x 1,47.\r\nDiamètre de braquage : 11,6 mètres (entre murs), 12 mètres pour les 4Matic\r\nVolume de coffre mini berline/break : 540/615 litres (370/460 litres pour l’hybride plug-in)\r\nVolume de coffre maxi break : 1 830 litres (1 675 litres hybride plug-in)\r\nMoteur essence : E 200 de 204 ch\r\nMoteurs diesels : E 220d de197 ch, (E 220d 4Matic de 197 ch berline uniquement)\r\nMotorisation hybride rechargeable : E 300e de 313 ch (E 300e 4Matic de 313 ch berline uniquement) et E 400e de 381 ch 4Matic (berline uniquement)\r\nFinitions : Avantgarde Line, AMG Line et Exclusive Line\r\nTarif : à partir de 64 750 €. Diesel : 67 900 €. Hybride rechargeable : 72 950 €. Break : à partir de 67 300 €. Diesel : 70 450 €. Hybride rechargeable : 75 500 €.', NULL),
(10, 'SUV Peugeot 2008 restylé : lequel choisir ?', 102, 'Afin de maintenir les ventes, le constructeur Peugeot s’est décidé à restyler son Peugeot 2008. Un restylage qui se voit puisque le modèle adopte une nouvelle signature lumineuse. Sous son capot pas de changement pour les moteurs thermiques tandis que le modèle électrique (Peugeot e-2008), restylé lui aussi, reçoit l’apport d’un nouvel électromoteur de 156 ch et 406 km d’autonomie. Mais quel est le meilleur couple motorisation/finition pour ce Peugeot 2008 restylé ? C’est ce que nous allons vous', 'Pour Peugeot, le Peugeot 2008 est l’une des stars de la gamme du constructeur français. La nouvelle génération ayant été lancée en 2019 il était temps de la restyler. La marque au lion aurait pu se contenter d’un léger lifting, mais ce n’est pas vraiment le cas pour le Peugeot 2008 qui affiche une nouvelle face avant. On trouve ainsi une nouvelle calandre d’inspiration Peugeot 3008 et Peugeot 408 avec une grille qui déborde sur les côtés, un bouclier entièrement repensé et de nouvelles griffes (feux de jour) au nombre de trois de chaque côté. Elles donnent une belle allure à ce SUV citadin. De plus, le modèle restylé arbore le nouveau logo de la marque en plein centre de la calandre. À l’arrière, on note des modifications plus subtiles avec un nouveau design des feux et la disparition du logo.\r\n\r\nSUV Peugeot 2008 restylé : lequel choisir ?\r\nDans l’habitacle de ce Peugeot 2008 « phase 2 », les modifications concernent surtout le nouvel écran multimédia 10 pouces dont l’interface gagne en fluidité. Les affichages sont également plus modernes et la navigation se fait désormais sur l’ensemble de l’écran. On retrouve le i-Cockpit avec le petit volant et malheureusement une lecture de l’instrumentation en hauteur qui peut être perturbée en fonction de la position de la jante du volant. L’instrumentation numérique de 10 pouces est de série avec la finition milieu de gamme Allure et devient numérique 3D avec la finition GT la plus haute. Il y a de la place à l’arrière pour les occupants de la banquette (rabattable 2/3-1/3 de série) et le coffre affiche un bon volume de chargement de 434 litres.\r\n\r\nSUV Peugeot 2008 restylé : lequel choisir ?\r\nSous le capot on retrouve les habituels blocs essence PureTech de 100 et 130 ch, ce dernier n’étant disponible qu’associé à l’excellente boîte auto EAT8. Une boîte auto que l’on retrouve sur le seul moteur diesel 1.5 BlueHDi de 130 ch qui figure encore au catalogue du Peugeot 2008 restylé. Nouveauté de cette version liftée, l’apparition d’un nouvel électromoteur de 156 ch pour le Peugeot e-2008 qui affiche une autonomie de 406 km, il vient épauler l’électromoteur de 136 ch (autonomie : 340 km) qui est toujours disponible à partir de 40 150 € (le moteur de 156 ch demandant 1 500 € de plus). Plus tard, en 2024, le Peugeot 2008 recevra l’apport d’un nouveau moteur essence, un bloc microhybridé 48V que l’on trouve d’ores et déjà dans le compartiment moteur des Peugeot 3008 et 5008, il développe 136 ch.\r\n\r\nSUV Peugeot 2008 restylé : lequel choisir ?\r\nAu volant de ce modèle, quelle que soit la motorisation utilisée, le comportement routier de ce modèle est digne d’éloges. Il est l’un des SUV citadins les plus agréables à conduire. Doté d’une direction directe et précise, d\'une suspension (ferme, mais confortable) maîtrisant bien les mouvements de caisse, l’agrément de conduite est au rendez-vous. Bien entendu, par rapport aux versions électriques plus lourdes, les versions thermiques du Peugeot 2008 restylé seront les plus dynamiques avec une plus grande facilité de conduite dans les enchaînements de virages. Face à la rude concurrence qui anime cette catégorie des SUV citadins, les tarifs du Peugeot 2008 sont assez élevés surtout pour les versions électriques (qui bénéficient néanmoins du bonus de 5 000 €). Les tarifs débutent à 26 400 €.\r\n\r\nLe SUV Peugeot 2008 restylé en dix points\r\nSUV, cinq portes, cinq places\r\nProduction à Vigo en Espagne\r\nDimensions (L x l x h en mètres) : 4,31 x 1,99 (rétros en place) x 1,55\r\nVolume de coffre : 434 litres\r\nMoteurs essence : 1.2 PureTech 100 ch BVM6 et 1.2 PureTech 130 ch EAT8\r\nMoteur diesel : 1.5 BlueHDi 130 ch EAT8\r\nVersion électrique e-2008 : 136 ch (autonomie : 340 km), 156 ch (autonomie : 406 km)\r\nTrois finitions : Active, Allure et GT\r\nPossibilité d’option Advanced Grip Control (antipatinage intelligent) avec moteurs thermiques en finition Allure et GT\r\nTarifs : à partir de 26 400 € (Diesel : 33 400 €). Électrique : 40 150 €', NULL),
(11, 'SUV Alfa Romeo Tonale : lequel choisir ?', 103, 'Le SUV Alfa Romeo Tonale est le dernier né de la firme de Milan. C\'est un beau SUV qui affiche une allure pleine d’audace et de sensualité. Il est disponible avec deux motorisations essence microhybridées, une motorisation fonctionnant au gazole et une motorisation hybride rechargeable. Pour ce qui concerne les finitions, il y a quatre niveaux de finition : Super, Sprint, Ti et Veloce. Mais quel est le meilleur couple motorisation/finition ?\r\n', 'C’est la base du Jeep Compas qui sert de plateforme technique au SUV Alfa Romeo Tonale, et pourtant il n’y a aucun point commun entre le SUV transalpin et le SUV américain. Il s’agit d’une prouesse de la part de l’équipe de designers qui a réussi à donner une allure totalement différente à l\'Alfa Tonale qui affiche de belles lignes latines avec des éléments tendus et des galbes sensuels. Une calandre en forme de feuille de trèfle et des projecteurs très fins renforcent l\'originalité de ce modèle.\r\n\r\nSUV Alfa Romeo Tonale : lequel choisir ?\r\nIl s’agit d’un modèle compact qui mesure 4,56 m de long et dispose d’une habitabilité dans la moyenne du marché aux places arrière, mais il faudra faire avec le tunnel de servitude imposant pour ce qui concerne le passager qui occupera la place centrale de la banquette. Le coffre quant à lui affiche une belle capacité de 500 litres avec un plancher modulable. À bord, on a droit à un intérieur chic et bien fini avec des matériaux de qualité, comme de l’Alcantara ou du cuir. Face à lui le conducteur a droit à une instrumentation numérique de 12,3 pouces et au centre de la planche de bord un écran tactile de 10,2 pouces sert à certaines commandes et à l\'infodivertissement. On a la possibilité (en fonction de la finition choisie) de bénéficier d’équipements haut de gamme comme la conduite semi-autonome de niveau 2, les projecteurs avant à technologie Matrix, le hayon électrique mains libres, la suspension pilotée, etc.\r\n\r\nSUV Alfa Romeo Tonale : lequel choisir ?\r\nSous le capot de ce modèle à deux roues avant motrices, il y a le choix entre deux motorisations essence microhybridées (MHEV) de 130 et 160 ch, un moteur diesel de 130 ch ou encore une motorisation hybride rechargeable de 280 ch avec dans ce cas une transmission intégrale (e-Q4) puisque le moteur électrique entraîne les roues arrière. Sur route, malgré le châssis provenant de chez Jeep on retrouve la patte Alfa Romeo, avec un véhicule bien équilibré, une direction précise (même si le ressenti paraît artificiel lorsque l’on découvre l’auto), une conduite dynamique avec un amortissement ferme qui réduit le roulis sans trop maltraiter le confort. Sur le plan du comportement, le Tonale est un cran au-dessus du Jeep Compass.\r\n\r\nSUV Alfa Romeo Tonale : lequel choisir ?\r\nNouveau SUV compact, l’Alfa Romeo Tonale doit faire face à une rude concurrence composée des SUV premium allemands (Audi Q3, BMW X1 et Mercedes GLA), mais aussi des SUV des constructeurs généralistes comme le Peugeot 3008, le Renault Austral, le Volkswagen Tiguan… Pour lutter efficacement contre ses rivaux, le SUV Alfa Romeo Tonale peut mettre en avant, son style très élégant, une vraie personnalité, un bon rapport comportement/confort, une présentation intérieure valorisante et un rapport qualité/prix correct.\r\n\r\nLe SUV Alfa Romeo Tonale en dix points\r\nSUV compact, cinq portes, cinq places\r\nProduit à Pomigliano d\'Arco en Italie\r\nBase technique de Jeep Compass\r\nLongueur x largeur x hauteur (en mètres) : 4,53 x 1,84 x 1,60\r\nVolume de coffre : 500 litres sauf PHEV 400 litres\r\nMotorisations essence MHEV : 1.5 hybrid 130 ch TCT7, 1.5 hybrid 160 ch TCT7\r\nMotorisation diesel : 1.6 MultiJet 130 ch VGT TCT6\r\nMotorisation hybride rechargeable : 1.3 PHEV 280 ch AT6\r\nTransmission intégrale e-Q4 avec la motorisation PHEV, sinon traction avant\r\nTarifs : à partir de 37 200 € (Diesel : 37 700 €). PHEV : à partir de 54 300 €', NULL),
(12, 'Guide 2023 - Tous les hybrides et hybrides rechargeables du marché, lequel acheter ?', 104, 'Alors que les voitures électriques continuent à prendre de l’importance, les véhicules hybrides représentent une part non négligeable du marché automobile actuel. Que vous cherchiez un modèle hybride simple ou que vous fassiez partie des adeptes de l’hybride rechargeable, Caradisiac vous dresse la liste de toutes les autos du marché actuel. Mais attention, les prix ont bien monté depuis l\'année dernière...\r\n', 'En 2022, les automobiles hybrides ont couvert pas moins de 30% du total de voitures neuves vendues en France, soit une augmentation de 4% par rapport à 2021. Mais selon la technologie d’hybridation, ces ventes évoluent d’une manière très différente : alors que celles des hybrides simples progressent sensiblement (12,4% du total en 2022 contre 8,5% en 2021), celles des hybrides rechargeables reculent (8,3% du total en 2022 contre 8,4% en 2021). La faute à la fin totale des aides à l’achat des voitures hybrides rechargeables neuves et à l’arrivée de nouveaux modèles hybrides simples à la fois raisonnablement efficients et moins chers.\r\n\r\nAutrefois chasse gardée de Toyota, la catégorie des hybrides non rechargeables a été dominée en 2022 par Renault qui positionne deux de ses modèles en haut du podium : l’Arkana E-Tech s’est vendu à 31 636 exemplaires (soit 10% des ventes totales d’hybrides simples !), devant le Captur E-Tech et ses 29 921 exemplaires (9% du total). Reine des citadines hybrides, la Toyota Yaris ne termine que troisième (28 074 unités) devant le petit SUV Yaris Cross (23 576 exemplaires) et la Renault Clio E-Tech qui ferme le top 5. Au total, il s’est vendu 332 689 véhicules hybrides non rechargeables en France en 2022.\r\n\r\nDu côté des hybrides rechargeables, c’est le Peugeot 3008 qui arrivait en tête l’année dernière avec 10 729 exemplaires écoulés (soit 8,9% du total de véhicules hybrides rechargeables vendus en France en 2022). Stellantis domine ce classement puisque la 308 arrive seconde (6 655 exemplaires soit 5,5% du total) devant le Citroën C5 Aircross et ses 6 636 exemplaires (5,5% du total). Il devance le Hyundai Tucson et ses 4 775 exemplaires ainsi que le DS 7 Crossback écoulé à 4 365 exemplaires. Au total, il s’est vendu 126 551 exemplaires de véhicules hybrides rechargeables en 2022 en France. Nettement moins que les modèles hybrides simples, encore une fois…\r\n\r\nDe plus en plus critiqués, les véhicules hybrides rechargeables imposent naturellement d’être rechargés le plus souvent possible pour rouler au maximum en mode 100% électrique et ainsi justifier la présence de leurs lourdes batteries (qui nuisent à l’efficience une fois vides). Avec les batteries pleines, ils peuvent généralement parcourir une petite cinquantaine de kilomètres en mode 100% électrique (ou beaucoup plus sur les modèles les plus luxueux équipés de batteries plus grosses), ce qui permet de réduire à zéro la facture en carburant lors des déplacements quotidiens. Contrairement aux véhicules 100% électriques, ils permettent aussi de partir dans de longs voyages sans avoir à planifier le trajet pour recharger les batteries, même si la consommation de carburant se situera alors à un niveau au moins similaire à celle d\'un modèle thermique classique. Par rapport à un hybride simple, le surcoût à l’achat se situe généralement autour des 7 000€ pour un hybride rechargeable. Le Kia Niro hybride rechargeable, par exemple, se négocie à 39 140€ contre 31 940€ pour le Niro hybride simple. Le Renault Captur Plug-In, qui vient de quitter le catalogue de Renault, coûtait 6 950€ de plus que le Captur E-Tech hybride.\r\n\r\nLes véhicules hybrides rechargeables conservent aussi un avantage fiscal pour les entreprises : à condition de rester sous les 60 g/km de CO2, ils échappent toujours à la taxe annuelle sur les véhicules de société.\r\n\r\nNous avons réuni dans ce dossier les plus de 200 hybrides et hybrides rechargeables disponibles aujourd\'hui sur le marché français en les divisant par catégorie et précisé pour chacune d\'entre elles les modèles les plus intéressants. Par rapport au même classement l\'année dernière, les prix ont beaucoup augmenté : entre 1 000 et parfois plus de 10 000€ selon les modèles !', NULL),
(13, 'SUV Nissan X-Trail : lequel choisir ?', 105, 'Le Nissan X-Trail a été renouvelé dernièrement. À cette occasion, il adopte des motorisations hybrides et devient plus haut de gamme. Ces changements sont d’importance et dans ce guide d’achat nous allons vous les présenter dans le détail. Tout ceci afin de déterminer quel est le meilleur couple motorisation/finition pour ce Nissan X-Trail.\r\n', 'Dévoilé en 2000 au Mondial de Paris, le Nissan X-Trail est l’un des premiers SUV du marché (à l\'époque on les appelait véhicules de loisirs) avec les Toyota Rav4, Suzuki Vitara… À ses débuts le Nissan X-Trail 1 affiche une taille compacte (4,45 m), mais il va rapidement grandir et aujourd’hui la nouvelle génération de Nissan X-Trail, apparue en 2022, mesure 4,68 m de long. Comme la précédente génération, il est disponible en cinq et sept places, mais a perdu ses motorisations essence et diesels pour n’accueillir qu’une motorisation hybride (e-Power) sous son capot. Un bloc essence qui est associé à un électromoteur pour la version deux roues motrices ou à deux électromoteurs (e-4Orce) pour la version quatre roues motrices. Pour la puissance, on a un choix limité à 204 ch pour le 4x2 et 213 ch pour le 4x4.\r\n\r\nSUV Nissan X-Trail : lequel choisir ?\r\nCe modèle reprend la plateforme CMF-C du Nissan Qashqai apparu en 2021. Il se démarque de son petit frère par un style plus massif avec des arêtes saillantes, une vitre de hayon presque verticale. En revanche, à bord c’est le mobilier du Qashqai qui est repris pratiquement tel quel, seul le traitement de la console centrale diffère avec l’ajout d’un espace de rangement en dessous et d’un grand bac de rangement entre les sièges. La présentation est soignée et la qualité des matériaux haut de gamme avec du plastique moussé un peu partout. Sur les versions les plus huppées on trouve un écran tactile de 12 pouces, une trentaine d’aides à la conduite et même un système Propilot, de conduite autonome (niveau 2).\r\n\r\nSUV Nissan X-Trail : lequel choisir ?\r\nIl y a de l’espace à bord et sur la banquette arrière (coulissante à partir de la finition N-Connecta) deux adultes se trouveront à l’aise, l’accès à bord est simplifié par l’ouverture des portes arrière 85 degrés, mais il faudra avancer la banquette pour arriver à se loger sur la troisième rangée. Ces sixième et septième places restent des places de dépannage qui conviendront plus à des enfants ou à des adolescents. Le coffre est d’un volume correct en cinq places avec 575 litres et avec l’option sept places (et les deux sièges additionnels dans le plancher) il descend à 485 litres. Avec sept personnes à bord, il faudra se contenter de 177 litres, ce qui est peu si l’on veut partir en vacances tous ensemble. Dans ce cas, une remorque n\'est pas de trop et le Nissan X-Trail peut tracter (remorque non freinée) jusqu’à 670 kg en 4x2 et 750 kg en 4x4.\r\n\r\nSUV Nissan X-Trail : lequel choisir ?\r\nSur la route, le Nissan X-Trail à technologie e-Power se comporte comme un véhicule électrique, car seul l\'électromoteur entraîne les roues avant, le moteur thermique, un trois cylindres 1.5 turbo à taux de compression variable sert seulement à produire de l\'électricité et à la transporter via un onduleur pour alimenter la batterie de 1,73 kWh et/ou pour épauler l’électromoteur de 150 kW (330 Nm) ou les électromoteurs de 150 kW (330 Nm) et 100 kW (195 Nm) pour la version à quatre roues motrices e-4Orce. Il s’agit d’un système similaire à celui utilisé par Honda qui présente des avantages, comme un grand confort de conduite renforcé par un impressionnant silence de fonctionnement. Le conducteur peut bénéficier du couple instantané du moteur électrique et la puissance de plus de 200 ch (204 et 213 ch) que développent les deux versions (4x2 et 4x4) est bien présente.\r\n\r\nSUV Nissan X-Trail : lequel choisir ?\r\nAvec la version 4x4 (e-4Orce), il n’y a pas de liaison mécanique entre les trains roulants, le couple est ainsi distribué plus rapidement entre les roues en fonction des conditions d’adhérence rencontrées. Si l’on adopte une conduite souple et que la batterie est suffisamment chargée, on peut jusqu’à 100 km/h rouler sur deux ou trois kilomètres sans réveiller le moteur thermique. Quand celui-ci s’éveille, la différence sonore n’est pas si importante, sauf si l’on titille un peu l’accélérateur. Mais cela n\'a rien à voir avec un hybride à boîte CVT. Les performances sont d’un bon niveau avec un passage de 0 à 100 km/h en 7 secondes pour le X-Trail 4x4 (cinq places. Sept places : 7,2 secondes) et 8 secondes pour le 4x2 disponible uniquement en cinq places. La vitesse maxi (sur circuit) est de 170 km/h pour le 4x2 et 180 km/h pour le 4x4. Quant à la consommation, en conduite apaisée, elle s’établit à un peu moins de 7 litres aux 100 km, ce qui s’avère correct sans plus. On peut améliorer cela avec le mode Eco le freinage régénératif à plusieurs niveaux (Mode B). Et pour ceux qui veulent soulager le travail des plaquettes de frein (le X-Trail est lourd : 1 778 et 1 965 kg sur la balance) ils peuvent utiliser le système « e-Pedal » qui permet de freiner en décélérant et de n’utiliser que la seule pédale d’accélérateur jusqu\'à la vitesse de 5 km/h. Afin de faciliter les manœuvres de parking le système e-Pedal est inopérant en dessous des 5 km/h.\r\n\r\nSi le véhicule est lourd, cela ne se ressent pas trop au volant. Le comportement routier est très sain et sécurisant, avec peu de sous-virage et des prises de roulis limitées. Le grand débattement des suspensions absorbe bien les gros chocs, permettant aux passagers de voyager confortablement et ce modèle se montre assez agile dans la circulation urbaine malgré un gabarit relativement imposant. La version quatre roues motrices est très efficace sur des routes à faible adhérence. La motricité est exemplaire et le SUV conserve des trajectoires sans mauvaise surprise. On peut même avec le X-Trail se promener sur la terre, dans les chemins boueux ou sur une route enneigée sans risquer de se retrouver bloqué. Rival des Peugeot 5008, Kia Sorento, Renault Espace 6, le Nissan X-Trail s’affiche en entrée de gamme à 42 700 € en cinq places et deux roues motrices. Si vous le voulez en sept places, il vous faudra choisir la version 4x4 (entrée de gamme à 45 000 €) et ajouter 900 € au prix affiché pour obtenir l’option troisième rangée.\r\n\r\nLe nouveau Nissan X-Trail en dix points\r\nQuatrième génération du Nissan X-Trail\r\nSUV, cinq portes, cinq et sept places\r\nDisponible en deux et quatre roues motrices\r\nProduction au Japon\r\nDiamètre de braquage (entre trottoirs) : 11,1 m\r\nMotorisations hybrides : e-Power de 204 ch (4x2) et e-4Orce de 213 ch (4x4)\r\nÉmissions de CO2 : de 132 à 152 g/km (malus de 240 à 1 761 €)\r\nQuatre finitions : Acenta, N-Connecta, Tekna et Tekn+\r\nVersion sept places réservées à la motorisation 213 ch (4x4) option sept places + 900 €\r\nTarif : à partir de 42 700 € (e-Power 204 ch 4x2), à partir de 45 000 € (e-4Orce 213 ch 4x4)', NULL),
(14, 'Crossover Peugeot 408 : lequel choisir ?', 106, 'Modèle à part dans la famille Peugeot, le nouveau Peugeot 408 n’est pas tout à fait une berline et pas encore un SUV. Il s’agit d’un mélange des deux, un crossover au style original qui peut séduire les familles par sa bonne habitabilité et son confort de roulement. Disponibles avec trois niveaux de finitions et trois motorisations, nous vous présentons dans le détail ce nouveau modèle et déterminons quels sont les meilleurs couples motorisation/finition afin de profiter au mieux, de ce crossove', 'Crossover familial aux lignes spectaculaires, le Peugeot 408 est à la fois une berline, un SUV, un coupé avec une chute de pavillon façon « fastback », l’originalité de ses lignes peut rebuter, mais il ne passe pas inaperçu dans le paysage automobile. Le Peugeot 408 reprend la base de la Peugeot 308 et s’en démarque par une longueur de 4,69 m contre 4,37 m pour la berline et 4,64 m pour le break 308 SW. L’empattement est aussi plus long de 55 mm (2,79 m) par rapport au break SW et cela se concrétise dans l’habitacle par un bel espace au niveau des jambes à l\'arrière. S’il est à la fois berline et SUV, le Peugeot 408 offre un espace de vie aussi confortable que dans une berline et plus lumineux que dans un SUV. La capacité de chargement du coffre est également généreuse avec 536 litres (471 litres pour les versions hybrides), on aurait aimé cependant qu’une fois les dossiers de banquette rabattus depuis le coffre (via des gâchettes), le plancher soit plat ce qui n’est pas le cas.\r\n\r\nCrossover Peugeot 408 : lequel choisir ?\r\nLe mobilier intérieur de ce crossover est emprunté à la Peugeot 308. Petit volant, compteurs numériques haut perchés (qui peuvent être peu lisibles pour certains conducteurs, car cachés par la jante du volant), écran central de 10 pouces (24,5 cm) aux prestations correctes, un pavé digital permettant de créer ses propres touches i-Toogles, la commande de boîte automatique (EAT ou e-EAT8) minimaliste, des rangements un peu partout et des prises USB-C à l’avant comme à l’arrière. Le comportement routier est typé confort, les suspensions bien calibrées combinent souplesse et maintien. Ce modèle se montre à son aise sur les nationales et l’autoroute grâce à une excellente tenue de cap, sur la route son agilité est correcte, mais l’empattement long le pénalise. L’agrément de conduite est assuré par une direction incisive (bien le petit volant) et une bonne remontée d’informations.\r\n\r\nCrossover Peugeot 408 : lequel choisir ?\r\nSous le capot on a le choix entre une motorisation essence PureTech de 130 ch ou des motorisations hybrides rechargeables de 180 et 225 ch. Malgré une puissance limitée en essence, le Peugeot 408 se comporte bien et se montre un excellent compagnon de voyage. Avec l’hybride et plus de puissance, il ne devient pas sportif pour autant (en raison d’un poids plus important), mais se montre un peu plus dynamique. Quoi qu’il en soit, on appréciera beaucoup mieux le Peugeot 408 avec une conduite souple et apaisée. Véhicule atypique et positionné à un tarif élevé (rien à moins de 37 350 €), ce modèle familial vient marcher sur les platebandes des Volkswagen Tiguan et Toyota Rav4 en ce qui concerne les SUV, mais il est aussi concurrent des berlines traditionnelles comme la BMW Série 3. On appréciera ou pas, son design original, et l\'on mettra en exergue son espace à bord généreux, sa présentation intérieure réussie et sa fabrication sérieuse, son confort de roulement, son grand coffre, moins ses tarifs « élitistes ».\r\n\r\nCrossover Peugeot 408 : lequel choisir ?\r\nLe nouveau crossover Peugeot 408 en dix points\r\nCrossover (mi-berline, mi-SUV) 5 portes, 5 places\r\nProduction en France à Mulhouse (Haut-Rhin)\r\nDimensions en mètres (L x l x h) : 4,69 x 1,85 x 1,48\r\nVolume de coffre mini : 536 litres (471 litres : Hybrid)\r\nVolume de coffre maxi : 1 611 litres\r\nMotorisation essence : 1.2 PureTech de 130 ch (Malus de 330 à 400 €)\r\nPas de motorisation Diesel\r\nMotorisations hybrides : 180 ch, 225 ch (Pas de malus, aucun bonus)\r\nBoîtes de vitesse : EAT8 avec PureTech 130 ch et e-EAT8 avec les hybrides.\r\nTarifs : à partir de 37 350 € en essence et 45 450 € en hybride', NULL),
(15, 'Quelle BMW Série 2 Active Tourer choisir ?', 107, 'Alors que les monospaces disparaissent, BMW y croit encore et a lancé cette année sa nouvelle génération de monospace Série 2 Active Tourer. Un véhicule familial plaisant à conduire qui dispose d’une offre de 5 motorisations, dont deux hybrides rechargeables et de trois finitions. Pour savoir quel est le meilleur couple motorisation/finition, suivez le guide…\r\n', 'a nouvelle génération du monospace BMW Série 2 Active Tourer a été lancée cette année et l’on a noté la disparition de la version longue à sept places Gran Tourer. Restant seul avec Mercedes (Classe B) dans le segment premium à proposer un monospace dans sa gamme, BMW compte avec un seul modèle conserver un bon volume de vente (depuis ses débuts plus de 400 000 exemplaires ont été vendus dans le monde).\r\n\r\nQuelle BMW Série 2 Active Tourer choisir ?\r\nUne ligne plus dynamique\r\nPar rapport à la première génération, ce nouvel opus s’en distingue par une calandre à double haricot plus imposante, des projecteurs plus effilés qu’auparavant et des feux arrière de plus grandes dimensions. Le profil est toujours monovolume et l’ensemble affiche plus de dynamisme, tandis que les dimensions du véhicule sont pratiquement identiques.\r\n\r\nModernité à bord\r\nDans l’habitacle les changements sont plus importants avec l’arrivée d’une double dalle numérique légèrement courbée vers le conducteur. L’instrumentation paramétrable dispose d’un écran de 10,25 pouces et un affichage tête haute est également de la partie (option Pack Innovation à 3 300 €), tandis que l’écran d’infodivertissement de 10,7 pouces est désormais tactile, ce qui a conduit BMW à supprimer la molette i-Drive et de nombreux boutons, les commandes étant actionnées par l’intermédiaire de l’écran. Comme toujours chez BMW, la qualité des matériaux et des assemblages est à mettre en exergue.\r\n\r\nQuelle BMW Série 2 Active Tourer choisir ?\r\nModularité au menu\r\nAux places arrière la garde au toit est généreuse et l’espace pour les jambes aussi, hormis pour la personne qui se posera au milieu de la banquette arrière et qui devra composer avec un tunnel de servitudes encombrant. Monospace oblige, on trouve de nombreux rangements à bord et une modularité excellente grâce à l’option banquette coulissante (sur 14 cm) avec dossiers inclinables. Dommage que les dossiers rabattus ne permettent pas d’obtenir un plancher plat. Le volume mini du coffre est moyen (de 404 à 415 litres) et peut atteindre jusqu’à 1 455 litres au maxi.\r\n\r\nQuelle BMW Série 2 Active Tourer choisir ?\r\nAmortissement ferme\r\nSur la route, la BMW Série 2 Active Tourer se montre à son aise. Conçue sur la plateforme de la BMW Série 1 et malgré une hauteur plus importante, la prise de roulis est bien contrôlée, son tempérament est plus plaisant que la plupart des SUV de la marque. On apprécie également la direction bien calibrée et consistante qui apporte un bel agrément de conduite. En revanche, l’amortissement plus ferme grève un peu le confort, en particulier lorsque l’auto est équipée de roues de 18 pouces. Pour les motorisations on a le choix entre deux moteurs essence de 136 et 170 ch, un diesel de 150 ch et deux motorisations hybrides rechargeables de 245 et 326 ch. Les tarifs débutent à 35 750 €.\r\n\r\nQuelle BMW Série 2 Active Tourer choisir ?\r\nLa BMW Série 2 Active Tourer en dix points\r\nType : monospace compact, cinq portes, cinq places\r\nProduction à Leipzig en Allemagne\r\nDimensions (L x l x h en mètres) : 4,39 x 1,83 (2,10 avec rétros) x 1,57\r\nVolume de coffre mini : de 404 à 415 litres\r\nVolume de coffre maxi : de 1 405 à 1 455 litres\r\nMoteurs essence : (218i) 1.5 de 136 ch, (220i) 1.5 de 170 ch\r\nMoteur Diesel : (218 d) 2.0 de 150 ch\r\nMotorisations hybrides rechargeables : 225e XDrive de 245 ch, 230e XDrive de 326 ch\r\nBoîte automatique de 7 rapports avec toutes les motorisations\r\nTarif : à partir de 35 750 € (Diesel : 37 950 €). Motorisations hybrides rechargeables : 45 300 €', NULL),
(16, 'SUV Renault Austral : lequel choisir ?', 108, 'Le Renault Austral remplace le Renault Kadjar dans la gamme du constructeur français. Son objectif est de faire de meilleures ventes que le modèle précédent et enfin de devenir une vraie alternative au Peugeot 3008 qui est en tête des ventes en France depuis de nombreuses années. Mais quelle est la meilleure motorisation et quelle est la meilleure finition pour ce SUV compact ?\r\n', 'Pour remplacer le Renault Kadjar, Renault a choisi de créer un tout nouveau modèle et pour mieux le différencier du Kadjar, de lui donner un nom inédit : Renault Austral. Le Renault Austral se dote donc d’une plateforme nouvelle (la même que celle du Nissan Qashqai), affiche des lignes plus modernes inspirées de celles de la Renault Mégane E-Tech, de nouvelles motorisations et surtout un intérieur totalement modifié avec une belle qualité perçue.\r\n\r\nSUV Renault Austral : lequel choisir ?\r\nSous le capot de ce nouveau Renault Austral on ne trouve pas de moteur Diesel, le constructeur Renault ayant préféré de privilégier l’hybridation de ses blocs essence. On trouve ainsi en entrée de gamme un nouveau bloc Mild Hybrid Advanced de 130 ch, un moteur de 1,2 litre associé à une mirco-hybridation de 48 volts qui avec quelques modifications pourra passer la nouvelle norme Euro 7 en 2026. Il y a aussi un autre Mild Hybrid de 160 ch associé, celui-ci, avec une boîte CVT qui « simule » 7 rapports. Enfin, en haut de gamme un bloc E-Tech Hybrid de 200 ch qui est associé comme tous les E-Tech hybrides de Renault à une boîte à crabots. Cette offre moteur réduite sera élargie puisque viendra plus tard une motorisation E-Tech Hybrid de 160 ch qui sera une version dégonflée de l’E-Tech de 200 ch. Une version Mild-Hybrid de 140 ch est également prévue et il pourrait y avoir aussi, mais beaucoup plus tard, une motorisation hybride rechargeable.\r\n\r\nSUV Renault Austral : lequel choisir ?\r\nDans l’habitacle du Renault Austral, on retrouve un mobilier similaire à celui de la Renault Mégane E-Tech avec le système OpenR qui se compose d\'un écran multimédia de 12 pouces (seulement 9 pouces en entrée de gamme) avec affichage HD. Ce système développé avec Google est d’une grande facilité d’utilisation et l’interface est très fluide. Les matériaux sont de belle facture et les assemblages très corrects, rien à voir à ce que proposait le Renault Kadjar.\r\n\r\nSUV Renault Austral : lequel choisir ?\r\nGrand modèle, le Renault Austral mesure 4,51 mètres, il affiche donc 4 cm de plus en longueur par rapport au Kadjar, ce qui fait qu’à l’arrière sur la banquette, deux adultes seront confortablement installés, même si l’espace aux jambes est dans la moyenne. Avec certaines finitions, le Renault Austral dispose d’une banquette coulissante sur 16 cm avec dossiers inclinables. Quant au coffre, il offre une bonne capacité de chargement de 500 à 575 litres en fonction de la position de la banquette coulissante, pour la version E-Tech « Full-Hybrid » ce sera seulement de 430 à 555 litres, la batterie sous le plancher du coffre prenant un peu de place.\r\n\r\nSUV Renault Austral : lequel choisir ?\r\nSur la route, le Renault Austral profite de sa nouvelle plateforme qui apporte une belle homogénéité pour le comportement routier de ce modèle. La direction est bien calibrée et assez précise, remontant bien les informations, le confort est également très bon même avec des jantes 20 pouces comme celles qui équipent les finitions Iconic et Iconic Esprit Alpine. Si le SUV Renault Renault est moins dynamique que peut l’être le Peugeot 3008, il a gagné en agilité en particulier lorsqu’il est équipé des quatre roues directrices du système 4Control advanced. Un équipement qui est disponible en option (1 800 €) avec les finitions haut de gamme de la version E-tech.\r\n\r\nLe Renault Austral est disponible en cinq finitions (Equilibre, Techno, Techno Esprit Alpine, Iconic, Iconic Esprit Alpine). Avec l’entrée de gamme, le Renault Austral est bien équipé avec une instrumentation numérique 12,3 pouces, la climatisation automatique bizone, des jantes alliage 17 pouces, des projecteurs Full LED… Mais c’est avec les finitions plus haut de gamme que l’on appréciera le plus ce modèle, même s’il est parfois nécessaire de passer par le catalogue d’options pour obtenir certains équipements technologiques comme l’affichage tête haute, les quatre roues directrices, le chargeur de smartphone par induction… Face à ses concurrents les Peugeot 3008, Citroën C5 Aircross, Volkswagen Tiguan, Opel Grandland, Kia Sportage et Hyundai Tucson, le Renault Austral n’a rien à leur envier, si ce n’est qu’il affiche un peu moins de dynamisme qu’un Peugeot 3008, un tarif plus élevé que les modèles coréens et une offre de motorisation réduite qui ne dispose d’aucun moteur diesel, ce qui peut poser problème aux gros rouleurs.\r\n\r\nLe SUV Renault Austral en dix points\r\nSUV compact, 5 portes, 5 places\r\nProduction à Palencia (Espagne)\r\nDimensions (L x l x h en mètres) : 4,51 x 1,83 x 1,65\r\nDiamètre de braquage : 11,4 mètres\r\nVolume de coffre mini : 500 litres à 575 litres (430 à 555 litres hybride plug-in)\r\nVolume de coffre maxi : 1 525 litres\r\nMoteurs Mild-Hybrid : 48 volts 130 ch et 12 volts 160 ch\r\nMotorisation Full-Hybrid : 200 ch\r\nCinq finitions : Equilibre, Techno, Techno Esprit Alpine, Iconic, Iconic Esprit Alpine\r\nTarif : à partir de 34 000 € (Full Hybrid : 41 500 €)', NULL);
INSERT INTO `guideachat` (`GuideAchatId`, `Titre`, `ImageId`, `Description`, `Text`, `VehiculeId`) VALUES
(17, 'Mercedes Classe C : laquelle choisir ?', 109, 'La cinquième génération de Mercedes Classe C est arrivée en 2021. Cette auto qui existe en berline et en break est un modèle d’un grand confort, affichant de belles performances et un équipement de pointe. Elle est disponible avec une offre de blocs essence et diesels ainsi que deux motorisations hybrides. Cette Mercedes Classe C mérite le détour et nous vous proposons aujourd’hui un guide d’achat de cette grande familiale haut de gamme.\r\n', 'Disponible en berline et en break, la Mercedes Classe C de cinquième génération lutte dans la catégorie des familiales haut de gamme contre les Audi A4 et BMW Série 3. Par rapport à la précédente génération, Mercedes n’a pas bouleversé la ligne de son modèle, les projecteurs s’étirent davantage, la calandre devient hexagonale, tandis que les feux arrière sont plus hauts et débordent sur le hayon. Berline et break affichent des dimensions très proches avec en longueur 4,75 m pour la berline et 4,79 m pour le break.\r\n\r\nMercedes Classe C : laquelle choisir ?\r\nUn intérieur luxueux\r\nDans l’habitacle, on se trouve en présence d’une mini Mercedes Classe S en ce qui concerne le mobilier intérieur. Devant le conducteur on trouve une instrumentation numérique de 12,3 pouces placée sous une casquette et au centre un grand écran multimédia de 11,9 pouces qui est très incliné. Des aérateurs ronds (façon turbine) égayent l’ensemble qui est fait de matériaux d’une excellente facture, tandis que la finition et les ajustages sont haut de gamme.\r\n\r\nMercedes Classe C : laquelle choisir ?\r\nSpacieuse et confortable\r\nIl y a de la place à bord, que ce soit à l’avant avec des sièges enveloppants à réglages électriques et chauffants ou à l’arrière avec une banquette qui se montre confortable. Les passagers ont de l’espace pour les genoux et la garde au toit est excellente. Seule la capacité du coffre n’est pas extraordinaire que ce soit pour la berline (455 litres) ou pour le break (590 litres). On s’en consolera avec une belle offre d’équipements dès l’entrée de gamme (Avantgarde) avec est de série : climatisation automatique bi-zone, démarrage sans clé, rétroviseurs extérieurs électriques, écran multimédia 11,9 pouces, sièges avant électriques chauffants avec soutien lombaire, compatibilité Android Auto et Apple CarPlay, navigation, instrumentation numérique 12,3 pouces, recharge sans fil, sept airbags, reconnaissance des panneaux de circulation, avertisseurs d’angle mort et de franchissement de ligne, régulateur/limiteur de vitesse, modes de conduite, contrôle de la pression des pneus et jantes 17 pouces. En entrée de gamme, la Mercedes Classe C fait déjà payer au prix fort ses prestations et il faut débourser au minimum 52 900 € (+ 1 500 € pour le break) pour en devenir propriétaire.\r\n\r\nMercedes Classe C : laquelle choisir ?\r\nUne offre de moteurs performants\r\nLes finitions sont au nombre de trois pour la berline avec Avantgarde, AMG Line et Business Line pour les entreprises, le break ajoute une quatrième finition avec l’All-Terrain qui transforme ce modèle en version baroudeuse à quatre roues motrices. Un système 4Matic qui est également disponible avec le moteur diesel de 220 ch et l’hybride plug-in C 400 e sur la berline, tandis que le break peut également l’avoir avec le moteur essence de 204 ch. Pour les motorisations on a le choix entre un moteur essence de 204 ch, deux diesels de 163 et 200 ch et deux motorisations hybrides rechargeables de 313 et 381 ch (cette dernière est indisponible avec le break) autorisant une autonomie en électrique de plus de 100 km. Attention avec cette motorisation la capacité du coffre est réduite : 315 litres pour la berline, 355 litres pour le break. Toutes ces motorisations sont associées à une boîte automatique 9G-Tronic.\r\n\r\nÀ son aise partout\r\nSur route la Mercedes Classe C se montre très confortable, grâce à des trains roulants très bien calibrés et une insonorisation parfaite. Si elle n’est pas aussi dynamique qu’une BMW Série 3, la Mercedes Classe C se montre parfaitement à son aise sur tous les types de parcours. On peut même s’essayer à rouler sur la terre avec le break Mercedes All-Terrain. Et pour plus de sportivité on pourra choisir les versions Mercedes AMG, il y a la Mercedes-AMG C 43 4Matic à moteur quatre cylindres turbo de 408 ch (à partir de 77 400 €) et bientôt la Mercedes-AMG C 63 E Performance à moteur quatre cylindres turbo hybride rechargeable de 680 ch.\r\n\r\nMercedes Classe C : laquelle choisir ?\r\nLa Mercedes Classe C en dix points\r\nBerline et break 5 portes, 5 places\r\nDimensions berline (L x l x h en mètres) : 4,75 x 1,82 (2,03 rétros déployés) x 1,44. Break : 4,79 x 1,82 x 1,46. Break All-Terrain : 4,76 x 1,84 x 1,50\r\nDiamètre de braquage : 11,07 mètres (entre murs), 11,50 pour les 4Matic\r\nVolume de coffre mini, berline/break : 455/590 litres (315/360 litres pour l’hybride plug-in)\r\nVolume de coffre maxi, break : 1 510 litres (1 375 litres hybride plug-in)\r\nMoteur essence : C 200 de 204 ch (+ C 200 4Matic All-Terrain)\r\nMoteurs diesels : C 200 d de 163 ch, C 220 d de 200 ch (+ C 220 d 4Matic)\r\nMotorisation hybride rechargeable : C 300 e de 313 ch et C 400 e de 381 ch 4Matic (uniquement berline)\r\nFinitions : Avantgarde, AMG Line et Business Line (Break + All-Terrain)\r\nTarif : à partir de 52 900 €. Essence : 53 700 €. Hybride rechargeable : 62 050 € (supplément carrosserie break : + 1 500 €)', NULL),
(18, 'Prix du carburant : où trouver de l\'essence moins chère ?', 110, 'Les cours du pétrole flambe à nouveau. Pour faire face à cette envolée, les automobilistes organisent la résistance autour d\'un travail collaboratif. L\'objectif ? Trouver de l\'essence pas chère. Caradisiac a déniché quelques astuces pour trouver du carburant moins cher.\r\n', 'Prix du carburant : où trouver de l\'essence moins chère ? \r\nEdit du 20/10/2010 : Vue la situation actuelle, il nous a semblé judicieux de vous rediriger, à partir de cet ancien article, vers notre dispositf du Forum qui vise actuellement à trouver les pompes à essence ouvertes qui distribuent du carburant. Cliquez ici pour tout savoir sur la situation de votre département en terme de pénurie d\'essence\r\n\r\n\r\n\r\nArticle initial :\r\n\r\n\r\n\r\nAvec des cours qui atteignent désormais plus du triple de leur niveau initial, le pétrole devient un produit de grand luxe. Cette flambée va se répercuter d\'ici quelques semaines à la pompe.\r\n\r\nPlusieurs communautés d\'automobilistes se sont organisées pour faire face à ce fléau économique. Pour trouver de l\'essence moins chère, des automobilistes bénévoles font le tour des stations essence environnantes puis relèvent les prix journaliers du gazole, du sans plomb 95 et 98, du Super (dans certains cas) et du GPL. Par la suite ils mettent en ligne ces prix sur des sites dédiés : \"des portails de comparaison des prix du carburant partout en France, mis à jour par les internautes pour les internautes\". Ce partage d\'informations permet à l\'internaute de connaître les prix les plus bas pratiqués dans sa région. Ces sites très précis répertorient le département, la ville, la station, les prix et l\'évolution des tarifs du jour au lendemain. Un indicateur très utile pour s\'approvisionner en essence moins chère.', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `ImageId` int NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`ImageId`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`ImageId`, `url`) VALUES
(1, '/ComparateurVehicules/assets/facebook.png'),
(2, '/ComparateurVehicules/assets/email.png'),
(3, '/ComparateurVehicules/assets/instagram.png'),
(4, '/ComparateurVehicules/assets/telephone.png'),
(5, '/ComparateurVehicules/assets/News1.jpg'),
(6, '/ComparateurVehicules/assets/News2.jpg'),
(7, '/ComparateurVehicules/assets/News3.jpg'),
(8, '/ComparateurVehicules/assets/News4.jpg'),
(9, '/ComparateurVehicules/assets/Chery.png'),
(10, '/ComparateurVehicules/assets/renault.png'),
(11, '/ComparateurVehicules/assets/Tigo7Pro.jpg'),
(12, '/ComparateurVehicules/assets/Tigo8.jpg'),
(13, '/ComparateurVehicules/assets/Tigoo3x.jpg'),
(14, '/ComparateurVehicules/assets/renaultclio.png'),
(15, '/ComparateurVehicules/assets/renaultMegane.jpg'),
(16, '/ComparateurVehicules/assets/renaultCaptur.jpg'),
(17, '/ComparateurVehicules/assets/Guide1.jpg'),
(19, '/ComparateurVehicules/assets/marque7.png'),
(20, '/ComparateurVehicules/assets/marque7.png'),
(21, '/ComparateurVehicules/assets/marque8.png'),
(22, '/ComparateurVehicules/assets/marque8.png'),
(23, '/ComparateurVehicules/assets/vehicule15.png'),
(24, '/ComparateurVehicules/assets/vehicule16.png'),
(25, '/ComparateurVehicules/assets/vehicule17.png'),
(26, '/ComparateurVehicules/assets/vehicule17.png'),
(27, '/ComparateurVehicules/assets/marque8.png'),
(28, '/ComparateurVehicules/assets/vehicule117.png'),
(29, '/ComparateurVehicules/assets/vehicule117.png'),
(30, '/ComparateurVehicules/assets/marque9.png'),
(31, '/ComparateurVehicules/assets/marque9.png'),
(32, '/ComparateurVehicules/assets/marque9.png'),
(33, '/ComparateurVehicules/assets/marque9.png'),
(34, '/ComparateurVehicules/assets/marque9.png'),
(35, '/ComparateurVehicules/assets/vehicule135.png'),
(36, '/ComparateurVehicules/assets/vehicule36.png'),
(37, '/ComparateurVehicules/assets/marque37.png'),
(38, '/ComparateurVehicules/assets/news37.png'),
(39, '/ComparateurVehicules/assets/news38.png'),
(40, '/ComparateurVehicules/assets/news40.png'),
(41, '/ComparateurVehicules/assets/news41.png'),
(42, '/ComparateurVehicules/assets/news42.jpg'),
(43, '/ComparateurVehicules/assets/news43.png'),
(44, '/ComparateurVehicules/assets/news44.png'),
(45, '/ComparateurVehicules/assets/news45.png'),
(46, '/ComparateurVehicules/assets/news46.png'),
(47, '/ComparateurVehicules/assets/news47.png'),
(48, '/ComparateurVehicules/assets/news48.png'),
(49, '/ComparateurVehicules/assets/news49.png'),
(50, '/ComparateurVehicules/assets/news50.png'),
(51, '/ComparateurVehicules/assets/news50.png'),
(52, '/ComparateurVehicules/assets/guide51.png'),
(53, '/ComparateurVehicules/assets/guide52.png'),
(54, '/ComparateurVehicules/assets/guide53.png'),
(55, '/ComparateurVehicules/assets/guide54.png'),
(56, '/ComparateurVehicules/assets/contact55.png'),
(57, '/ComparateurVehicules/assets/contact56.png'),
(58, '/ComparateurVehicules/assets/contact57.png'),
(59, '/ComparateurVehicules/assets/diaporama58.png'),
(60, '/ComparateurVehicules/assets/diaporama59.png'),
(61, '/ComparateurVehicules/assets/diaporama60.png'),
(62, '/ComparateurVehicules/assets/vehicule61.png'),
(63, '/ComparateurVehicules/assets/vehicule62.png'),
(64, '/ComparateurVehicules/assets/vehicule63.png'),
(65, '/ComparateurVehicules/assets/vehicule64.png'),
(66, '/ComparateurVehicules/assets/vehicule65.jpg'),
(67, '/ComparateurVehicules/assets/news66.png'),
(68, '/ComparateurVehicules/assets/diaporama67.jpg'),
(69, '/ComparateurVehicules/assets/diaporama68.png'),
(70, '/ComparateurVehicules/assets/diaporama69.jpg'),
(71, '/ComparateurVehicules/assets/diaporama70.jpg'),
(72, '/ComparateurVehicules/assets/diaporama71.png'),
(73, '/ComparateurVehicules/assets/news72.png'),
(74, '/ComparateurVehicules/assets/diaporama73.png'),
(75, '/ComparateurVehicules/assets/news75.jpg'),
(76, '/ComparateurVehicules/assets/marque75.png'),
(77, '/ComparateurVehicules/assets/marque76.png'),
(78, '/ComparateurVehicules/assets/marque77.png'),
(79, '/ComparateurVehicules/assets/marque79.png'),
(80, '/ComparateurVehicules/assets/marque80.png'),
(81, '/ComparateurVehicules/assets/vehicule80.jpg'),
(82, '/ComparateurVehicules/assets/vehicule81.jpg'),
(83, '/ComparateurVehicules/assets/vehicule82.jpg'),
(84, '/ComparateurVehicules/assets/vehicule83.jpg'),
(85, '/ComparateurVehicules/assets/vehicule84.jpg'),
(86, '/ComparateurVehicules/assets/vehicule85.jpg'),
(87, '/ComparateurVehicules/assets/vehicule86.jpg'),
(88, '/ComparateurVehicules/assets/vehicule87.jpg'),
(89, '/ComparateurVehicules/assets/vehicule88.jpg'),
(90, '/ComparateurVehicules/assets/news89.jpg'),
(91, '/ComparateurVehicules/assets/news90.jpg'),
(92, '/ComparateurVehicules/assets/news91.jpg'),
(93, '/ComparateurVehicules/assets/news92.jpg'),
(94, '/ComparateurVehicules/assets/news93.jpg'),
(95, '/ComparateurVehicules/assets/news94.jpg'),
(96, '/ComparateurVehicules/assets/news95.jpg'),
(97, '/ComparateurVehicules/assets/news96.jpg'),
(98, '/ComparateurVehicules/assets/news97.jpg'),
(99, '/ComparateurVehicules/assets/news98.jpg'),
(100, '/ComparateurVehicules/assets/guide99.jpg'),
(101, '/ComparateurVehicules/assets/guide100.jpg'),
(102, '/ComparateurVehicules/assets/guide101.jpg'),
(103, '/ComparateurVehicules/assets/guide102.jpg'),
(104, '/ComparateurVehicules/assets/guide103.jpg'),
(105, '/ComparateurVehicules/assets/guide104.jpg'),
(106, '/ComparateurVehicules/assets/guide105.jpg'),
(107, '/ComparateurVehicules/assets/guide106.jpg'),
(108, '/ComparateurVehicules/assets/guide107.jpg'),
(109, '/ComparateurVehicules/assets/guide108.jpg'),
(110, '/ComparateurVehicules/assets/guide109.jpg'),
(111, '/ComparateurVehicules/assets/diaporama110.jpg'),
(112, '/ComparateurVehicules/assets/diaporama111.jpg'),
(113, '/ComparateurVehicules/assets/diaporama112.jpg'),
(114, '/ComparateurVehicules/assets/diaporama113.jpg'),
(115, '/ComparateurVehicules/assets/diaporama114.jpg'),
(116, '/ComparateurVehicules/assets/diaporama115.jpg'),
(117, '/ComparateurVehicules/assets/diaporama116.jpg'),
(118, '/ComparateurVehicules/assets/diaporama117.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `imagenews`
--

DROP TABLE IF EXISTS `imagenews`;
CREATE TABLE IF NOT EXISTS `imagenews` (
  `ImageNewsId` int NOT NULL AUTO_INCREMENT,
  `ImageId` int DEFAULT NULL,
  `NewsId` int DEFAULT NULL,
  PRIMARY KEY (`ImageNewsId`),
  KEY `ImageId` (`ImageId`),
  KEY `NewsId` (`NewsId`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `imagenews`
--

INSERT INTO `imagenews` (`ImageNewsId`, `ImageId`, `NewsId`) VALUES
(1, 75, 1),
(2, 6, 2),
(3, 7, 3),
(4, 8, 4),
(10, 90, 14),
(11, 91, 15),
(12, 92, 16),
(13, 93, 17),
(14, 94, 18),
(15, 95, 19),
(16, 96, 20),
(17, 97, 21),
(18, 98, 22),
(19, 99, 23);

-- --------------------------------------------------------

--
-- Structure de la table `imagevehicule`
--

DROP TABLE IF EXISTS `imagevehicule`;
CREATE TABLE IF NOT EXISTS `imagevehicule` (
  `ImageVehiculeId` int NOT NULL AUTO_INCREMENT,
  `IdImage` int DEFAULT NULL,
  `IdVehicule` int DEFAULT NULL,
  PRIMARY KEY (`ImageVehiculeId`),
  KEY `IdImage` (`IdImage`),
  KEY `IdVehicule` (`IdVehicule`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `imagevehicule`
--

INSERT INTO `imagevehicule` (`ImageVehiculeId`, `IdImage`, `IdVehicule`) VALUES
(1, 11, 7),
(2, 12, 8),
(3, 13, 9),
(4, 14, 10),
(5, 15, 11),
(6, 16, 12),
(14, 81, 23),
(15, 82, 24),
(16, 83, 25),
(17, 84, 26),
(18, 85, 27),
(19, 86, 28),
(20, 87, 29),
(21, 88, 30),
(22, 89, 31);

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

DROP TABLE IF EXISTS `marque`;
CREATE TABLE IF NOT EXISTS `marque` (
  `MarqueId` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `ImageId` int DEFAULT NULL,
  `PaysOrigine` varchar(255) DEFAULT NULL,
  `SiegeSociale` varchar(255) DEFAULT NULL,
  `AnneeCreation` int DEFAULT NULL,
  `Principale` int DEFAULT NULL,
  PRIMARY KEY (`MarqueId`),
  KEY `ImageId` (`ImageId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `marque`
--

INSERT INTO `marque` (`MarqueId`, `Nom`, `ImageId`, `PaysOrigine`, `SiegeSociale`, `AnneeCreation`, `Principale`) VALUES
(1, 'Cherry', 9, 'Allemagne', 'Auerbach in der Oberpfalz, Allemagne', 1973, 1),
(2, 'Renault', 10, 'France', ' Boulogne-Billancourt, France', 1899, 1),
(10, 'Toyota', 80, 'Japon', 'Toyota City, Aichi, Japon', 1937, 1),
(11, 'Volkswagen', 79, 'Allemagne', 'Wolfsburg, Basse-Saxe, Allemagne', 1937, 1),
(12, 'Ford', 78, 'États-Unis', 'Dearborn, Michigan, États-Unis', 1903, 1);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `isreaded` tinyint(1) DEFAULT '0',
  `datePublish` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `sender`, `email`, `message`, `isreaded`, `datePublish`) VALUES
(1, 'John Doe', 'john@example.com', 'This is a sample message.', 0, '2024-01-12 16:02:36'),
(10, 'SifEddine', 'ks_sellami@esi.dz', 'hello Could you add a guide achat for each vehicule', 0, '2024-01-12 16:19:19');

-- --------------------------------------------------------

--
-- Structure de la table `modele`
--

DROP TABLE IF EXISTS `modele`;
CREATE TABLE IF NOT EXISTS `modele` (
  `ModeleId` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  PRIMARY KEY (`ModeleId`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `modele`
--

INSERT INTO `modele` (`ModeleId`, `Name`) VALUES
(1, 'Chery Tiggo 7 Pro'),
(2, 'Chery Tiggo 8'),
(3, 'Chery Tiggo 3x Plus'),
(4, 'Renault Clio'),
(5, 'Renault Megane'),
(6, 'Renault Captur'),
(7, '[value-2]'),
(8, 'dd'),
(9, 'dd2'),
(10, 'Ana'),
(11, 'Ana'),
(12, '2'),
(13, 'j'),
(14, 'j'),
(15, '1'),
(16, '01'),
(17, '4'),
(18, 'Camry'),
(19, 'RAV4'),
(20, 'Prius'),
(21, 'Golf'),
(22, 'Tiguan'),
(23, 'Passat'),
(24, 'Mustang'),
(25, 'Explorer'),
(26, 'Fiesta');

-- --------------------------------------------------------

--
-- Structure de la table `moteur`
--

DROP TABLE IF EXISTS `moteur`;
CREATE TABLE IF NOT EXISTS `moteur` (
  `MoteurId` int NOT NULL AUTO_INCREMENT,
  `NombreCylindres` int DEFAULT NULL,
  `NombreSoupapesParCylindre` int DEFAULT NULL,
  `Cylindree` decimal(10,2) DEFAULT NULL,
  `PuissanceDIN` int DEFAULT NULL,
  `CoupleMoteur` decimal(10,2) DEFAULT NULL,
  `PuissanceFiscale` int DEFAULT NULL,
  PRIMARY KEY (`MoteurId`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `moteur`
--

INSERT INTO `moteur` (`MoteurId`, `NombreCylindres`, `NombreSoupapesParCylindre`, `Cylindree`, `PuissanceDIN`, `CoupleMoteur`, `PuissanceFiscale`) VALUES
(1, 4, 16, '1.50', 150, '230.00', 11),
(2, 4, 16, '2.00', 190, '300.00', 13),
(3, 4, 16, '1.50', 116, '145.00', 8),
(4, 3, 12, '1.00', 100, '160.00', 5),
(5, 3, 12, '1.30', 115, '220.00', 6),
(6, 25, 2, '2.00', 2, '2.00', 2),
(7, 1, 2, '1.00', 2, '1.00', 12),
(8, 1, 11, '11.00', 1, '1.00', 11),
(9, 1, 11, '11.00', 1, '1.00', 11),
(10, 2, 2, '2.00', 22, '2.00', 2),
(11, 2, 2, '2.00', 2, '2.00', 2),
(12, 2, 2, '2.00', 2, '2.00', 2),
(13, 1, 1, '1.00', 1, '1.00', 1),
(14, 1, 1, '1.00', 5, '4.00', 3),
(15, 1, 1, '1.00', 1, '1.00', 1),
(16, 4, 4, '2.50', 178, '221.00', 11),
(17, 2, 4, '2.50', 203, '243.00', 11),
(18, 4, 4, '1.80', 96, '120.00', 80),
(19, 4, 4, '1.40', 147, '250.00', 7),
(20, 4, 4, '2.00', 184, '300.00', 10),
(21, 4, 16, '2.00', 174, '280.00', 10),
(22, 8, 32, '5.00', 450, '529.00', 100),
(23, 6, 24, '3.00', 365, '515.00', 100),
(24, 4, 16, '1.60', 120, '112.00', 10);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `NewsId` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `Text` text,
  `date_creation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`NewsId`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`NewsId`, `titre`, `description`, `Text`, `date_creation`) VALUES
(1, 'DESIGN by BELLU : les concept cars de l’année… pas du siècle !', 'Pas de salon, pas de concept car… C’est la sanction infligée à ces créations qui oscillent entre opportunisme marketing et poudre aux yeux. Faisons néanmoins un point au terme d’une année qui ne restera parmi les plus mémorables.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eleifend euismod ullamcorper. Curabitur sed ex sit amet nisi iaculis ornare. In id odio in nisi aliquam lobortis. Fusce tellus enim, pulvinar auctor urna non, vulputate consequat tellus. Pellentesque a nunc quis nisl mattis tristique. Vestibulum iaculis dictum lorem. Proin gravida scelerisque sagittis. Nunc sodales dolor turpis, eu commodo justo pharetra sed. Curabitur in orci quis augue bibendum tincidunt a at eros.\r\n\r\nPraesent in risus et metus rutrum laoreet nec id sem. In gravida cursus ullamcorper. Sed molestie quam orci, a mattis nisl semper eu. Proin feugiat purus est, ut aliquam leo convallis ac. Praesent ultrices est sit amet mi tristique, faucibus pretium diam iaculis. Cras aliquam libero vel nunc suscipit tristique. Aliquam sed ligula maximus tellus facilisis porttitor. Aenean imperdiet libero sit amet lorem blandit vulputate. Mauris tempus tortor et porttitor aliquam. Nulla vitae dui at diam laoreet dictum et eget justo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris ut nisl non justo feugiat mollis sed eu nisi. Nulla facilisi. Duis in gravida mauris. Nam sagittis commodo bibendum.\r\n\r\nInteger tempor dapibus iaculis. Nulla magna erat, mattis a euismod non, porta ut leo. Mauris aliquet orci a purus eleifend semper. Vivamus ac dui lacinia, malesuada eros quis, feugiat augue. Donec accumsan et diam nec sagittis. Aliquam tincidunt mattis vehicula. Vestibulum consequat rutrum ultrices. Praesent feugiat, ante mattis auctor scelerisque, orci lorem hendrerit dolor, vel tempus mi enim at est. Suspendisse ac ex tellus. Pellentesque tempor, elit nec hendrerit venenatis, odio massa mollis nisl, id facilisis tortor leo eget neque. Donec ac efficitur mauris. Donec ut elit in augue aliquam bibendum.', '2023-12-09 18:00:50'),
(2, 'L\'actu de la semaine en photo - Des autos beaucoup trop chères et une alliance qui va faire jaser', 'L\'actu de la semaine en photo - Des autos beaucoup trop chères et une alliance qui va faire jaser', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sagittis leo sit amet purus blandit faucibus. Praesent a sodales metus. Phasellus commodo a erat non rutrum. Donec fermentum rhoncus nulla, vitae consectetur odio scelerisque vel. Vivamus quam risus, accumsan vitae erat sit amet, ultrices iaculis orci. Mauris facilisis, mauris ac egestas hendrerit, orci urna interdum ex, placerat euismod lectus lacus eget felis. Sed tincidunt libero non arcu tempor, a maximus ipsum efficitur. In hac habitasse platea dictumst. Morbi volutpat dolor vel massa luctus condimentum. Quisque blandit augue id ipsum finibus, eu egestas justo lobortis. Duis quis velit convallis, congue est at, egestas nisl. Curabitur vitae urna ligula. Aliquam sodales tristique dolor, vel vestibulum eros mattis vel.\n\nSuspendisse magna dui, faucibus a pharetra non, hendrerit nec nulla. Suspendisse molestie pretium scelerisque. Nam venenatis malesuada ante, non sagittis sem accumsan eget. Nullam ac volutpat nulla. In porta eros vel nunc tempus, sed tincidunt felis dapibus. Nullam semper mi in felis sodales luctus. Donec lorem justo, imperdiet sit amet leo sed, fringilla accumsan libero. Morbi ac ultrices diam, vel volutpat justo. Etiam sit amet sollicitudin massa. Donec ligula enim, accumsan ut quam id, aliquam eleifend dolor. Aliquam sit amet tellus eget enim rhoncus iaculis a lobortis magna. Maecenas scelerisque sollicitudin ligula ut viverra. Duis blandit varius magna non mollis. Nunc bibendum in felis nec hendrerit. Maecenas at porta arcu, tristique aliquet arcu.\n\nSuspendisse nec blandit odio, id rhoncus erat. Nunc purus enim, vestibulum eu neque dictum, fringilla vestibulum neque. Quisque mauris nisl, rhoncus et pulvinar et, pharetra nec sem. Maecenas in ipsum in lacus eleifend tempor eget nec arcu. Morbi condimentum at ante ac faucibus. Quisque mattis dui eros, vitae vulputate ipsum porttitor sed. Phasellus a enim felis. Mauris pulvinar libero et nisl consequat, volutpat elementum neque molestie. Sed id nisl tincidunt, vehicula quam non, sodales arcu. Cras auctor ultrices nisi eu dapibus. Phasellus malesuada posuere velit eget mattis. Morbi mollis efficitur dui quis faucibus. Etiam semper nibh et risus commodo, sed luctus mauris scelerisque. Donec at venenatis dolor.\n\nFusce sed neque interdum, pharetra arcu et, tempus metus. Donec id lacinia lacus, eu tincidunt mi. Nam consectetur, diam sit amet sagittis euismod, quam neque pellentesque massa, vitae ultricies sem neque eget ante. Sed vel neque a nibh tincidunt rhoncus. Duis condimentum luctus facilisis. Fusce eu sodales eros, non imperdiet quam. Vivamus id ipsum tincidunt, sollicitudin turpis nec, porta libero. Curabitur enim leo, euismod at nisi at, faucibus auctor arcu. Proin augue nisi, porta at iaculis vulputate, vehicula vitae diam. Nunc dui mi, dapibus sit amet diam sit amet, sodales fringilla justo. Sed sit amet massa magna. Nullam sit amet odio sollicitudin, convallis nisi in, venenatis nulla. Sed malesuada blandit mauris ut laoreet.', '2023-12-09 18:01:59'),
(3, '50 voitures de cinéma: un livre à fond la caisse!', 'Grand écran et automobile ont toujours fait bon ménage, et cet ouvrage en apporte une excellente illustration', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sagittis leo sit amet purus blandit faucibus. Praesent a sodales metus. Phasellus commodo a erat non rutrum. Donec fermentum rhoncus nulla, vitae consectetur odio scelerisque vel. Vivamus quam risus, accumsan vitae erat sit amet, ultrices iaculis orci. Mauris facilisis, mauris ac egestas hendrerit, orci urna interdum ex, placerat euismod lectus lacus eget felis. Sed tincidunt libero non arcu tempor, a maximus ipsum efficitur. In hac habitasse platea dictumst. Morbi volutpat dolor vel massa luctus condimentum. Quisque blandit augue id ipsum finibus, eu egestas justo lobortis. Duis quis velit convallis, congue est at, egestas nisl. Curabitur vitae urna ligula. Aliquam sodales tristique dolor, vel vestibulum eros mattis vel.\r\n\r\nSuspendisse magna dui, faucibus a pharetra non, hendrerit nec nulla. Suspendisse molestie pretium scelerisque. Nam venenatis malesuada ante, non sagittis sem accumsan eget. Nullam ac volutpat nulla. In porta eros vel nunc tempus, sed tincidunt felis dapibus. Nullam semper mi in felis sodales luctus. Donec lorem justo, imperdiet sit amet leo sed, fringilla accumsan libero. Morbi ac ultrices diam, vel volutpat justo. Etiam sit amet sollicitudin massa. Donec ligula enim, accumsan ut quam id, aliquam eleifend dolor. Aliquam sit amet tellus eget enim rhoncus iaculis a lobortis magna. Maecenas scelerisque sollicitudin ligula ut viverra. Duis blandit varius magna non mollis. Nunc bibendum in felis nec hendrerit. Maecenas at porta arcu, tristique aliquet arcu.\r\n\r\nSuspendisse nec blandit odio, id rhoncus erat. Nunc purus enim, vestibulum eu neque dictum, fringilla vestibulum neque. Quisque mauris nisl, rhoncus et pulvinar et, pharetra nec sem. Maecenas in ipsum in lacus eleifend tempor eget nec arcu. Morbi condimentum at ante ac faucibus. Quisque mattis dui eros, vitae vulputate ipsum porttitor sed. Phasellus a enim felis. Mauris pulvinar libero et nisl consequat, volutpat elementum neque molestie. Sed id nisl tincidunt, vehicula quam non, sodales arcu. Cras auctor ultrices nisi eu dapibus. Phasellus malesuada posuere velit eget mattis. Morbi mollis efficitur dui quis faucibus. Etiam semper nibh et risus commodo, sed luctus mauris scelerisque. Donec at venenatis dolor.\r\n\r\nFusce sed neque interdum, pharetra arcu et, tempus metus. Donec id lacinia lacus, eu tincidunt mi. Nam consectetur, diam sit amet sagittis euismod, quam neque pellentesque massa, vitae ultricies sem neque eget ante. Sed vel neque a nibh tincidunt rhoncus. Duis condimentum luctus facilisis. Fusce eu sodales eros, non imperdiet quam. Vivamus id ipsum tincidunt, sollicitudin turpis nec, porta libero. Curabitur enim leo, euismod at nisi at, faucibus auctor arcu. Proin augue nisi, porta at iaculis vulputate, vehicula vitae diam. Nunc dui mi, dapibus sit amet diam sit amet, sodales fringilla justo. Sed sit amet massa magna. Nullam sit amet odio sollicitudin, convallis nisi in, venenatis nulla. Sed malesuada blandit mauris ut laoreet.', '2023-12-09 18:04:42'),
(4, 'Renault et Volkswagen réfléchissent à s\'associer pour leur future citadine électrique à 20 000€ !', 'Renault et Volkswagen réfléchissent à s\'associer pour leur future citadine électrique à 20 000€ !', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sagittis leo sit amet purus blandit faucibus. Praesent a sodales metus. Phasellus commodo a erat non rutrum. Donec fermentum rhoncus nulla, vitae consectetur odio scelerisque vel. Vivamus quam risus, accumsan vitae erat sit amet, ultrices iaculis orci. Mauris facilisis, mauris ac egestas hendrerit, orci urna interdum ex, placerat euismod lectus lacus eget felis. Sed tincidunt libero non arcu tempor, a maximus ipsum efficitur. In hac habitasse platea dictumst. Morbi volutpat dolor vel massa luctus condimentum. Quisque blandit augue id ipsum finibus, eu egestas justo lobortis. Duis quis velit convallis, congue est at, egestas nisl. Curabitur vitae urna ligula. Aliquam sodales tristique dolor, vel vestibulum eros mattis vel.\n\nSuspendisse magna dui, faucibus a pharetra non, hendrerit nec nulla. Suspendisse molestie pretium scelerisque. Nam venenatis malesuada ante, non sagittis sem accumsan eget. Nullam ac volutpat nulla. In porta eros vel nunc tempus, sed tincidunt felis dapibus. Nullam semper mi in felis sodales luctus. Donec lorem justo, imperdiet sit amet leo sed, fringilla accumsan libero. Morbi ac ultrices diam, vel volutpat justo. Etiam sit amet sollicitudin massa. Donec ligula enim, accumsan ut quam id, aliquam eleifend dolor. Aliquam sit amet tellus eget enim rhoncus iaculis a lobortis magna. Maecenas scelerisque sollicitudin ligula ut viverra. Duis blandit varius magna non mollis. Nunc bibendum in felis nec hendrerit. Maecenas at porta arcu, tristique aliquet arcu.\n\nSuspendisse nec blandit odio, id rhoncus erat. Nunc purus enim, vestibulum eu neque dictum, fringilla vestibulum neque. Quisque mauris nisl, rhoncus et pulvinar et, pharetra nec sem. Maecenas in ipsum in lacus eleifend tempor eget nec arcu. Morbi condimentum at ante ac faucibus. Quisque mattis dui eros, vitae vulputate ipsum porttitor sed. Phasellus a enim felis. Mauris pulvinar libero et nisl consequat, volutpat elementum neque molestie. Sed id nisl tincidunt, vehicula quam non, sodales arcu. Cras auctor ultrices nisi eu dapibus. Phasellus malesuada posuere velit eget mattis. Morbi mollis efficitur dui quis faucibus. Etiam semper nibh et risus commodo, sed luctus mauris scelerisque. Donec at venenatis dolor.\n\nFusce sed neque interdum, pharetra arcu et, tempus metus. Donec id lacinia lacus, eu tincidunt mi. Nam consectetur, diam sit amet sagittis euismod, quam neque pellentesque massa, vitae ultricies sem neque eget ante. Sed vel neque a nibh tincidunt rhoncus. Duis condimentum luctus facilisis. Fusce eu sodales eros, non imperdiet quam. Vivamus id ipsum tincidunt, sollicitudin turpis nec, porta libero. Curabitur enim leo, euismod at nisi at, faucibus auctor arcu. Proin augue nisi, porta at iaculis vulputate, vehicula vitae diam. Nunc dui mi, dapibus sit amet diam sit amet, sodales fringilla justo. Sed sit amet massa magna. Nullam sit amet odio sollicitudin, convallis nisi in, venenatis nulla. Sed malesuada blandit mauris ut laoreet.', '2023-12-09 18:05:29'),
(14, 'Hyundai Ioniq 5 N NPX1 Concept Sports a Big Wing and a Beefy Body Kit', 'Hyundai plans to offer the aggressive aerodynamic parts for the Ioniq 5 N later this year via its N Performance Parts division.\r\n\r\n', 'The Hyundai Ioniq 5 has racked up accolades since debuting for 2022, winning Car and Driver\'s EV of the Year award and appearing twice on the 10Best list. But the retro-futuristic Hyundai isn\'t done grabbing headlines yet, with the sporty N model set to be one of the most exciting EVs of 2024. Now Hyundai is hinting at future upgrades for the Ioniq 5 N with the NPX1 concept, revealed at the Tokyo Auto Salon with an array of performance upgrades.\r\n\r\n2024 hyundai ioniq 5 n npx1 concept\r\nHYUNDAI\r\nThe Ioniq 5 N NPX1 looks truly sinister with its blacked-out appearance and aggressive aerodynamics. The concept is a glimpse into the catalog of accessories that Hyundai plans to offer for the sporty electric crossover from its N Performance Parts division, which started in 2019 and has supplied extras for the company\'s gas-powered N vehicles like the Elantra N.\r\n\r\nThe NPX1 is fitted with an host of upgrades. The entire front bumper is redesigned with unique air intakes and a mean-looking carbon-fiber front splitter with vanes that extend further up the front wheel arches than on the standard car. The side skirts have also been restyled while the grippy Pirelli P Zero tires now wrap around lightweight hybrid carbon wheels. The NPX1 is also said to be fitted with high-performance brake pads and lowering springs for a more assertive stance.', '2024-01-12 19:34:45'),
(15, 'Hertz Wants to Sell 20,000 EVs amid Low Rental Demand, High Repair Prices', 'The brand is currently selling over 500 Tesla Model 3s, some for just over $20,000.\r\n\r\n', 'Just over two years after announcing plans to purchase 100,000 Teslas and another 65,000 electric cars from Polestar for its rental fleets, Hertz is planning to sell off 20,000 of its EVs, according to a federal regulatory filing posted Thursday. The rental company noted the high cost of collision repairs and lower demand from consumers as the primary drivers for the EV divestment. Hertz, in turn, plans to use some of the income from those sales to purchase more new gas-powered vehicles.\r\n\r\nThe electric-car rental demand issue may have less to do with the cars themselves and more to do with the unique traits of EVs. An average renter is looking for a car that will get them around over the course of a trip rather than a compelling experience in that car. For those customers, the complexities of an EV may prove to be more of a frustration than a charm.\r\n\r\nTire, Wheel, Motor vehicle, Automotive mirror, Land vehicle, Automotive design, Vehicle, Automotive tire, Automotive parking light, Car, \r\nUsed EV Bargains Under $10,000\r\nRenting a Tesla Model 3, for instance, comes with all the frustrations of the screen-heavy Tesla user interface without any of the time to get used to those adjustments that a buyer would have. Charging is an even bigger issue: Not only do consumers without EV experience who rent a Polestar 2 or a Tesla Model 3 have to figure out how to charge a car while on the road, they also have to figure out two completely different charging ecosystems depending on which car they get.\r\n\r\nEven though Hertz plans to offload much of its electric fleet, the company says it \"will continue to execute its strategy around EV mobility and offer customers a wide selection of vehicles,\" according to the filing. Hertz says it will grow its charging infrastructure, work closer with electric car manufacturers to lower parts and labor costs, and continue to help educate customers about EVs.\r\n\r\nHertz currently lists 548 Tesla Model 3s and zero Polestar models on its direct sales website. The most affordable Teslas are currently selling for just over $20,000, but screenshots shared by Electrek on Wednesday suggest that other Model 3s have previously been listed for as low as $17,700 before a potential tax credit for used EVs.', '2024-01-12 19:36:00'),
(16, 'Nouveautés 2024 - SUV Citadins', 'Nouveautés 2024 - SUV Citadins : le Citroën C3 Aircross se renouvelle et Alfa Romeo avec le Milano et Lexus avec le LBX se dotent de SUV d’entrée de gamme.\r\n', 'La catégorie des SUV ne manquera pas proposer bon nombre de nouveaux modèles en 2024. Parmi ceux-ci, les crossovers citadins méritent le détour avec le nouveau Citroën C3 Aircross ainsi que son cousin Opel Crossland qui devient Frontera en changeant de génération. Nouveaux venus, l’Alfa Romeo Milano séduira aussi les amoureux des SUV, tandis que le Volvo EX 30 électrique prouve que Volvo peut créer aussi des petits modèles tout comme Lexus qui, avec le Lexus LBX, se dote d’un modèle attractif. Il convient de noter que la plupart des nouveaux SUV citadins électriques seront traités dans la partie \" Electriques \" de ce calendrier 2024.\r\nLe Volvo EX30 est disponible à la commande depuis le 7 juin 2023 mais c’est en début d’année que seront livrés les premiers exemplaires. Ce SUV citadin électrique est produit en Chine, mais en 2025 c’est la Belgique qui deviendra son site de production. Il affiche une longueur de 4,23 m et existe en plusieurs versions grâce à une offre de deux motorisations de 272 ch (4x2, propulsion) et 428 ch (4x4), cette dernière version peut passer de 0 à 100 km/h en 3,6 secondes seulement. Deux batteries de 51 kWh et de 69 kWh permettent à ce petit modèle de disposer d’une autonomie comprise entre 344 et 480 km selon le couple motorisation/batterie choisi. La recharge peut se faire sur une borne rapide et la charge passer de 10 à 80 % en moins de 30 minutes grâce à une puissance de recharge de 155 kW en courant continu.\r\n\r\nPremium SUV citadin de la marque premium Lexus, le Lexus LBX est le cousin technique du Toyota Yaris Cross. Il est disponible en deux et quatre roues motrices avec une nouvelle motorisation hybride de 136 ch qui sera déployée également sur le Yaris Cross. Les versions 4x2 et 4x4 affichent la même puissance et l’entrée de gamme à deux roues motrices s’affiche à 34 300 €.\r\n\r\n', '2024-01-12 19:43:54'),
(17, 'Bonus écologique 2024 : la liste complète des modèles éligibles', 'La liste des voitures qui bénéficieront du bonus écologique 2024 est désormais connue. Si les Peugeot e-208 ou Renault Zoe en profitent toujours, les modèles en provenance de Chine n’y ont plus droit.\r\n', 'Citroën ë-C3, Peugeot e-208, Renault Zoe ou encore Opel Corsa Electric, le gouvernement a dévoilé la liste de tous les modèles électriques qui seront éligibles au bonus écologique dès ce 15 décembre.\r\n\r\nOn remarque rapidement que certains modèles n’y auront plus droit à l’image de la Tesla Model 3, la Dacia Spring ou encore la MG 4. Les voitures, notamment en provenance de Chine, sont écartées. Bruno Le Maire précise que « Jusqu’à présent, l’État ne fixait aucune condition sur les modalités de fabrication des véhicules achetés avec le bonus de l’État. Des centaines de millions d’euros d’argent public allaient donc à des véhicules avec une très mauvaise empreinte carbone. Dorénavant, c’est fini. Pour être éligible au bonus, un véhicule électrique devra avoir un impact environnemental limité, lors des étapes de fabrication et de transport. »\r\n\r\nEn toute logique, les petits modèles font partis de l’offre, mais on y trouve aussi des nouveautés plus familiales comme le prochain Peugeot e-3008 et le nouveau Scénic. À noter également que certains modèles plus haut de gamme y figurent comme l\'Audi Q4 e-tron, la Volkswagen ID.7 ou encore le BMW iX2, des autos dont le prix est supérieur au plafond tarifaire de 47 000 € actuel.\r\n\r\nCette liste est en réalité constituée de modèles pour lesquels les constructeurs ont déposé un dossier, et qui répondent favorablement au score environnemental. Dans le cas du BMW iX2, le prix de base est de 59 150 €, hors remise. Si le concessionnaire décide de pratiquer une ristourne généreuse (prix de vente sous les 47 000 €), il bénéficiera alors du bonus écologique.\r\n\r\nLe coup de pouce de l’État, de l’ordre de 5 000 €, voire 7 000 € selon les revenus pourrait être reconduit, tout comme le plafond tarifaire. Les détails seront connus demain lors de la parution du texte au Journal Officiel.\r\n\r\nListe des voitures éligibles au bonus écologique 2024 :\r\nAbarth : 500\r\nAudi : Q4 45 e-tron*\r\nBMW : Série i4* / iX1 / iX2*\r\nCitroën : ë-C3 / ë-C4 / ë-C4X / ë-Berlingo / ë-SpaceTourer*\r\nCupra : Born\r\nDS : DS 3 E-Tense\r\nFiat : 500e / 600e / e-Doblo\r\nHyundai : Kona Electric\r\nMazda : MX-30\r\nMercedes : EQA / EQB / EQT\r\nMini : Mini Electric\r\nNissan : Leaf / Townstar EV\r\nOpel : Corsa Electric / Mokka Electric / Astra Electric / Combo-e Life / Zafira-e Life*\r\nPeugeot : e-208 / e-2008 / e-308 / e-3008 / e-Rifter / e-Traveller*\r\nRenault : Zoe / Twingo E-Tech / Mégane E-Tech / Scénic* / Kangoo E-Tech\r\nSkoda : Enyaq / Enyaq Coupé*\r\nSmart : Fortwo\r\nTesla : Model Y\r\nToyota : Proace City Verso Electric\r\nVolkswagen : ID.3 / ID.4 / ID.4 GTX* / ID.5* / ID.5 GTX* / ID.7*\r\nVolvo : C40 Recharge* / XC40 Recharge\r\n(*) Ces modèles pourront bénéficier du bonus écologique si leur prix (remisé ou non) ne dépasse le plafond tarifaire fixé par l\'État.', '2024-01-12 19:44:57'),
(18, 'Enquête - Ce qui attend les automobilistes en 2024.', 'La promesse d’Emmanuel Macron de « voiture électrique à 100 € par mois » pour les foyers les plus modestes est enfin une réalité', 'La promesse d’Emmanuel Macron de « voiture électrique à 100 € par mois » pour les foyers les plus modestes est enfin une réalité. Une dizaine de voitures des groupes Stellantis et Renault sont ainsi éligibles à cette offre, qui concerne les foyers dont le revenu fiscal par part est inférieur à 15 400 € et se voit réservé, dans un premier temps du moins, aux salariés habitant à plus de 15 km de leur lieu de travail (ou qui parcourent plus de 8 000 km par an pour des raisons professionnelles).\r\nLes pouvoirs publics estiment qu’environ 20 000 voitures seront immatriculées cette année par le biais de ce système, qui pourrait s’élargir par la suite.\r\n\r\nNotez que les mensualités s’échelonnent en réalité jusqu’à 149 €, ce qui permet d’accéder à des véhicules plus spacieux et adaptés aux petites familles (Peugeot e-2008, Renault Mégane E-Tech, Jeep Avenger…).\r\n\r\nMais ce sont les Renault Twingo E-Tech et Citroën ë-C3, affichées respectivement à 40 et 54 € par mois hors assurance, qui devraient rallier une majorité de suffrages. Et pour tester votre éligibilité à ce système, \r\n\r\nIl faut actuellement débourser 18 500 € pour acquérir une Renault Clio 65 ch, ou 32 395 € pour une VW Golf 110 ch, par exemple. Folie ! La Dacia Sandero Stepway est ainsi considérée comme une excellente affaire alors qu’elle ne s’échange pas à moins de 15 100 €.\r\n\r\n« Le pouvoir d’achat des ménages a progressé de 10% entre 2006 et 2021, quand le prix des voitures augmentait de plus de 60% ! », commente Eric Champarnaud, associé au cabinet C-Ways, interrogé par Caradisiac « Il y a énormément de gens pour qui ces efforts à l’achats ne sont pas supportables, et c’est bien ce qui rend possible la pénétration du marché aux constructeurs chinois, et explique aussi le succès de la location avec option d’achat qui est un des rares leviers permettant de lisser le taux d’effort. »\r\n\r\nLa mauvaise nouvelle est que ces tarifs n’auront pas vocation à baisser dans les mois qui viennent. Tout au plus peut-on espérer les voir stagner, à la faveur de l’apparition de modèles électriques pas trop onéreux, à l’image de la Citroën ë-C3, dont la version de base s’affiche à 23 300 € hors bonus… ou 99 € par mois sur 36 mois et 30 000 km, avec un premier loyer de 9 500 € qui peut être ramené à 0 € en cumulant bonus écologique, 2 000 € d’offre constructeur et 2500 € de prime à la conversion.\r\n\r\nLa très attendue Renault 5, naviguera dans les mêmes eaux tarifaires, de même que la Volkswagen ID.2. Mais inutile d’espérer des miracles, nos chères autos le resteront encore longtemps.', '2024-01-12 19:46:34'),
(19, 'Essai - Renault Arkana E-Tech hybride (2023) : un SUV hybride vendu à prix décent', 'Renault restyle sa dernière succes-story en date : l’Arkana. Le SUV coupé profite de (très) légères retouches esthétiques et d’une nouvelle finition Esprit Alpine, celle que nous testons ici en version hybride E-Tech 145. \r\n', 'Des modifications qui manquent de caractère pour ce véhicule qui a construit son succès sur sa silhouette. Même constat pour cette inédite version « Esprit Alpine » qui débarque au catalogue. Elle remplace les modèles RS Line et E-Tech Engeneered. Une lame de bouclier avant et d’inédites jantes de 19 pouces signent son « pedigree » sportif.\r\n\r\nToutefois, Renault a eu la bonne idée de ne pas faire flamber la facture. Ainsi l’Arkana Hybride est disponible dès 33 000 €, ce qui le rend compétitif face à une concurrence assez rare au final sur ce type de SUV hybride à la silhouette de coupé. Il y a bien sûr les nouveaux Toyota CH-R et Honda HR-V mais ces derniers mesurent 20 cm de moins et coûtent 2 000 € de plus. Sinon, il faut se tourner vers des SUV classiques du même format mais bien plus chers, comme le Hyundai Tucson hybride de 230 ch (39 950 €), le Nissan Qashqaï e-Power (39 600 €) ou encore le Renault Austral (40 000 €). C’est aussi ce positionnement favorable qui a boosté la carrière de l’Arkana E-Tech hybride.\r\n\r\nL’Arkana Esprit Alpine se distingue un peu plus à l’intérieur avec une sellerie similicuir/Alcantara avec surpiqûres bleues et logo Alpine, des ceintures assorties et des inserts plastiques « façon ardoise » de piètre qualité sur la planche de bord. La liste des nouveautés s’arrête ici et c’est bien dommage. On retrouve toujours une planche de bord proche de celle du Captur associant une grande instrumentation numérique (10 pouces dans le cas de cette finition) et un écran multimédia vertical d’environ 9 pouces. On aurait aimé voir débarquer le performant système OpenR de la Mégane malheureusement l’Arkana doit se contenter d’un système souffrant de lenteurs. Ce dernier est toutefois facile à prendre en main puis il bénéficie des compatibilités Android et Carplay sans fil. La présentation est dans l’ensemble correcte avec des matériaux sérieux sur les parties hautes. L’introduction de cette finition « Esprit Alpine », disponible à partir de 35 800€ avec le Tce 160, renforce le sentiment de qualité.\r\n\r\nL’hybridation de 145 ch, n’évolue pas. L’Arkana fait confiance au système E-tech qui associe un 4 cylindres essence atmosphérique 1.6 (d’origine Nissan) et deux moteurs électriques, dont un alterno-démarreur. Les 145 ch sont envoyés aux roues avant via une boîte de vitesses à crabots robotisée, brevetée par Renault, et recalibrée depuis son lancement (il y a deux ans) pour délivrer moins d’à-coups. De ce côté c’est plutôt réussi. Les passages de rapports se font en douceur tant que la pression sur la pédale de droite reste contenue. Dans les fortes montées en régime on a parfois l’impression que la boîte patine dans la semoule comme une CVT.\r\n\r\n', '2024-01-12 19:47:47'),
(20, 'La smart box la plus chic et chère du monde est signée Mercedes', 'Le réveillon approche et vous n\'avez pas acheté tous vos cadeaux. Pas de panique : nous avons ce qu\'il vous faut et surtout ce qu\'il convient à un amateur de belles autos. C\'est un visa pour une grandiose équipée italienne proposé par Mercedes. Seul petit hic : son tarif un tantinet élevé. Mais quand on aime, on ne compte pas.\r\n', 'Vous en avez soupé des smart box qui promettent monts et merveilles ? Des « stages de pilotage » qu’ils contiennent et ressemblent plutôt à des baptêmes qu’à de vrais cours destinés à progresser ? On a ce qu’il vous faut. Pour ce Noël, puisqu’il n’est jamais trop tard pour bien faire, offrez plutôt à un être cher plus qu’un petit souvenir : un moment de légende.\r\n\r\nLa légende, c’est la Mille Miglia, la mythique course italienne. Mais pas question d’offrir un aller-retour à Brescia en Italie pour que l’élu reste au bord de la route entre les 11 et 15 juin prochain. Pas question de se contenter d’observer les autos de collection qui défilent, puisque la course est aujourd’hui réservée aux historiques.\r\n\r\nJoue-la comme Stirling Moss\r\nPas question donc de faire de la figuration : l’idée de Mercedes Classic c’est tout simplement de proposer de participer à la course, au volant d’une 300 SL. En somme, on peut offrir le baquet de Stirling Moss, qui l’avait emporté en 1955. Enfin presque, car la voiture de la smart box de l’étoile n’est pas la SLR du pilote de légende, mais le modèle de (petite) série.\r\n\r\nPour s’inscrire, rien de plus simple : il faut être âgé entre 25 et 80 ans et être titulaire d’un permis B depuis au moins quatre ans. Il convient également de se munir d’une attestation médicale, indispensable pour établir une licence. Autant de conditions que bon nombre d’entre nous sont capables de remplir.\r\n\r\nEn plus, il n’est pas nécessaire d’être de la trempe de Moss pour participer, puisque, pour enquiller les près de 1 600 km du parcours en quatre jours, un pilote professionnel, à la fois conseiller et navigateur, accompagne l’heureux récipiendaire du cadeau. Pour la logistique, aucune inquiétude non plus : l’inscription, le pilote, les hébergements, la restauration, et l’assistance technique aux étapes sont pris en charge.\r\n\r\nOn n’a donc aucune raison valable de ne pas se précipiter pour vivre ou faire vivre l’incroyable. À part une toute petite formalité susceptible de faire hésiter, un très léger détail qu’il convient de prendre en compte au moment de s’enthousiasmer et de signer : le montant de l’inscription à cette belle équipée. Car il atteint 150 000 euros. Mais après tout, c’est un chiffre assez similaire au prix d’une smart box classique de 150 euros. À trois zéros près.', '2024-01-12 19:49:31'),
(21, 'La McLaren Elva d\'Alonso disponible aux enchères', 'La McLaren Elva de Fernando Alonso passera sous le marteau des enchères pas plus tard que demain le 25 novembre. L\'auto n\'affiche que cinq kilomètres au compteur. Une vente à 2,74 millions d\'euros est attendue.', 'Si McLaren fait partie de vos marques favorites et que vous souhaitez en plus signer pour un exemplaire à l\'histoire particulière, sachez que la supercar Elva du double champion du monde de Formule 1 Fernando Alonso sera disponible aux enchères demain à Abu Dabi via le spécialiste Bonhams.\r\n\r\nDétail étonnant, la sportive très appréciée entre autres par Lando Norris sur le circuit de Silverstone n\'a pas roulé. Son compteur affiche en effet cinq kilomètres seulement. Comprenez par là que l\'auto a été livrée et qu\'Alonso a ensuite peu ou pas du tout conduit la voiture. Et cela est bien dommage puisque la McLaren Elva -capable d\'abattre l\'exercice du 0 à 100 km/h en 2,7 secondes grâce à son V8 4,0l biturbo de 815 chevaux- dispose d\'un châssis et d\'une carrosserie en fibre de carbone mais aussi d\'un fond plat à effet de sol pour des performances de premier plan. Cerise sur le gâteau, l\'absence de toit, de pare-brise et de vitres latérales plonge le conducteur dans une ambiance mécanique unique. Seuls 149 exemplaires ont été produits. La sienne affiche le numéro 114.\r\n\r\n5 kilomètres au compteur\r\nDifficile de trouver très gratifiant pour le modèle d\'avoir été si peu conduit. Il dispose néanmoins d\'un historique très spécial et d\'une faible diffusion qui feront sans doute grimper la note. Les pronostics évoquent une vente à un peu moins de 3 millions d\'euros. Rendez-vous demain à Abu Dabi pour le verdict.', '2024-01-12 19:50:50'),
(22, 'Pourquoi Peugeot est obligé de réinventer sa 9X8 de course', 'Après une saison et demie de course difficile, Peugeot doit revoir en profondeur le concept technique de sa 9X8. En cause, une idée de départ dont l\'efficacité a été mise à mal par l\'évolution du réglement du championnat du monde d\'endurance...\r\n', 'Pour l’instant, la Peugeot 9X8 n’a pas spécialement brillé en compétition depuis son arrivée en catégorie Hypercar lors de la seconde moitié de la saison 2022. Alors que la Ferrari 499P a été compétitive d’entrée (remportant même les 24 Heures du Mans 2023 !), les lionnes françaises n’ont jamais réussi à se hisser au niveau de Toyota et Ferrari dans le championnat du monde d’endurance et aux 24 Heures du Mans (malgré quelques instants passés en tête du double tour d’horloge sarthois à la faveur des faits de course).\r\n\r\nL’évolution brutale du règlement de la catégorie Hypercar dans laquelle elle concourt a été évoquée par les dirigeants de l’équipe pour justifier le relatif manque de compétitivité de la Peugeot 9X8 : il se trouve que l’auto a été conçue au moment où la réglementation permettait théoriquement aux voitures de posséder quatre roues motrices à partir de 120 km/h. Peugeot avait fait le choix de garder des pneus de 31 cm de large aux quatre coins en estimant que le fait de pouvoir compter sur la transmission intégrale à relative basse vitesse permettrait de garder une bonne motricité malgré ces pneus fins, la grande finesse aérodynamique de la 9X8 faisait le reste.\r\n\r\nMais le règlement a ensuite évolué, autorisant les concurrents à préférer des pneus de 29 cm à l’avant et 34 cm à l’arrière tout en augmentant la vitesse à laquelle les Hypercar 4x4 ont le droit d’enclencher leur train avant moteur. Toyota s’y est adapté mais pas Peugeot qui aurait dû revoir en profondeur tout le concept aérodynamique de sa voiture, ce qui n’était techniquement plus possible comme l’explique le directeur de Stellantis Motorsport Jean-Marc Finot dans l’Equipe : « Nous nous sommes engagés pour une LMH à la fin de l\'année 2019, a-t-il rappelé. Nous avons commencé à concevoir la voiture alors que le règlement prévoyait à ce moment-là que les pneus devaient être des 31/31 (quatre pneus identiques de 31 cm) pour une LMH à quatre roues motrices comme la nôtre. Sachant que le potentiel d\'une monte 29/34 était meilleur, nous avons demandé à la FIA fin 2020 s\'il était possible de les chausser. Le règlement a alors été modifié, interdisant les 29/34 pour les LMH hybrides à quatre roues motrices. Nous sommes donc restés fixés sur notre projet 31/31 en l\'optimisant au mieux avec un équilibre parfait 50/50 entre l\'avant et l\'arrière.\r\n\r\nMais, fin 2021, à la demande d\'autres constructeurs, le règlement technique a encore été modifié, et les LMH pouvaient alors choisir l\'option 29/34. Mais pour nous c\'était trop tard, la voiture était dessinée, et elle a commencé à rouler en décembre 2021. On nous a répondu que la BoP [balance de performance] permettrait de compenser le désavantage des 31/31. Mais nous constatons qu\'elle ne répond pas totalement à nos attentes. Nous avons donc décidé de redessiner la voiture. C\'est dommage parce que cela a un coût. Nous allons présenter en 2024 une grosse évolution qui va nous permettre de tirer parti de la monte 29/34 », détaille-t-il.\r\n\r\nUne nouvelle 9X8 en 2024\r\nAprès cette campagne de course mitigée, Peugeot Sport va donc concevoir une 9X8 profondément évoluée afin de s’adapter enfin au règlement modifié après le développement initial de la voiture. La nouvelle 9X8 « phase 2 » pourrait être tellement différente qu’il n’est pas exclu qu’elle s’équipe d’un aileron arrière, l’absence de gros appendice aérodynamique sur la poupe de l’auto étant l’une de ses particularités. De quoi rappeler (un peu) l’histoire de la Peugeot 905 d’une certaine façon : la toute première version était très différente de celle qui a remporté les 24 Heures du Mans 1992 et 1993. Mais à l’époque, la marque au lion n’avait pas été piégée par une évolution réglementaire.', '2024-01-12 19:52:14'),
(23, 'Alfa 164 Procar, une F1 en habits de berline', 'Motorisée par un V10 destiné à la Formule 1, l’Alfa Romeo 164 Procar devait avoir une suite tout à fait alléchante, dans une nouvelle catégorie de compétition. Mais il n’en a rien été…\r\n', 'Au creux des années 80, Alfa Romeo boit la tasse en Formule 1. Ou plutôt ses moteurs, qui animent les monoplaces Osella. Champion du monde dans les années 50, le Biscione est revenu en course dans les années 70 en motorisant les Brabham, propriétés d’un certain Bernie Ecclestone. Celui-ci dirige également la FOCA, pour Formula One Constructors Association, et a une idée fort intéressante pour attirer les constructeurs généralistes dans la catégorie-reine du sport automobile.\r\n\r\nUne série ouverte qui courrait en ouverture des grand-prix, un peu comme le Championnat BMW M1 Procar en 1979 et 1980. Sauf que là, les bolides seraient variés et surtout techniquement très radicaux. En effet, l’idée de ce Procar nouvelle mouture consiste pratiquement à poser des carrosseries de berlines de M. Toulemonde sur des châssis de Formule 1, avec le moteur qui va bien.\r\n\r\nProche d’Alfa Romeo via Brabham, Ecclestone en parle notamment au blason milanais qui se montre vite enthousiaste. Pourquoi ? Parce qu’en plus de ne guère briller en F1, donc de ne pouvoir profiter des retombées de son investissement dans cette catégorie, il présente fin 1987 une nouvelle auto, la 164, ce qui ne lui arrive vraiment pas souvent ! Aussi est-il crucial de bien la lancer, et le futur Procar tombe à point', '2024-01-12 19:54:03');

-- --------------------------------------------------------

--
-- Structure de la table `performances`
--

DROP TABLE IF EXISTS `performances`;
CREATE TABLE IF NOT EXISTS `performances` (
  `PerformancesId` int NOT NULL AUTO_INCREMENT,
  `VitesseMaximum` int DEFAULT NULL,
  `Acceleration` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`PerformancesId`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `performances`
--

INSERT INTO `performances` (`PerformancesId`, `VitesseMaximum`, `Acceleration`) VALUES
(1, 195, '9.70'),
(2, 190, '8.80'),
(3, 180, '10.50'),
(4, 180, '9.00'),
(5, 205, '8.00'),
(6, 190, '9.50'),
(7, 100, '100.00'),
(8, 4, '1.20'),
(9, 11, '11.00'),
(10, 11, '11.00'),
(11, 2, '2.00'),
(12, 2, '2.00'),
(13, 2, '2.00'),
(14, 1, '1.00'),
(15, 11, '1.00'),
(16, 1, '1.00'),
(17, 220, '7.60'),
(18, 200, '8.00'),
(19, 200, '10.50'),
(20, 210, '8.40'),
(21, 200, '9.20'),
(22, 200, '7.60'),
(23, 250, '4.20'),
(24, 250, '6.80'),
(25, 200, '8.50');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `UserId` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) DEFAULT NULL,
  `Prenom` varchar(50) DEFAULT NULL,
  `Sexe` varchar(10) DEFAULT NULL,
  `DateDeNaissance` date DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `MotDePasse` varchar(255) DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`UserId`),
  UNIQUE KEY `uc_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`UserId`, `Nom`, `Prenom`, `Sexe`, `DateDeNaissance`, `email`, `MotDePasse`, `Status`, `isAdmin`) VALUES
(30, 'Sellami', 'SifEddine', 'homme', '2023-12-20', 'ks@esi.dz', '81dc9bdb52d04dc20036dbd8313ed055', 'accepted', 0),
(31, 'admin', 'admin', 'homme', '2024-01-03', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'accepted', 1),
(34, 'Ahmed', 'Ahmed', 'homme', '2015-06-12', 'ahmed@esi.dz', '81dc9bdb52d04dc20036dbd8313ed055', 'accepted', 0),
(35, 'khaled', 'khaled', 'homme', '2000-02-14', 'khaled@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'accepted', 0);

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

DROP TABLE IF EXISTS `vehicule`;
CREATE TABLE IF NOT EXISTS `vehicule` (
  `VehiculeId` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) DEFAULT NULL,
  `MarqueId` int DEFAULT NULL,
  `ModeleId` int DEFAULT NULL,
  `MoteurId` int DEFAULT NULL,
  `DimensionId` int DEFAULT NULL,
  `PerformancesId` int DEFAULT NULL,
  `CaracteristiqueId` int DEFAULT NULL,
  `Prix` decimal(10,2) DEFAULT NULL,
  `NbrVisite` int DEFAULT NULL,
  PRIMARY KEY (`VehiculeId`),
  KEY `MarqueId` (`MarqueId`),
  KEY `ModeleId` (`ModeleId`),
  KEY `MoteurId` (`MoteurId`),
  KEY `DimensionId` (`DimensionId`),
  KEY `PerformancesId` (`PerformancesId`),
  KEY `CaracteristiqueId` (`CaracteristiqueId`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`VehiculeId`, `Nom`, `MarqueId`, `ModeleId`, `MoteurId`, `DimensionId`, `PerformancesId`, `CaracteristiqueId`, `Prix`, `NbrVisite`) VALUES
(7, 'Chery Tiggo 7 Pro', 1, 1, 1, 1, 1, 3, '19990.00', 8),
(8, 'Chery Tiggo 8', 1, 2, 2, 2, 2, 4, '25990.00', 20),
(9, 'Chery Tiggo 3x Plus', 1, 3, 3, 3, 3, 5, '14990.00', 1),
(10, 'Renault Clio', 2, 4, 4, 4, 4, 6, '14990.00', 2),
(11, 'Renault Megane', 2, 5, 5, 5, 5, 7, '23990.00', 2),
(12, 'Renault Captur', 2, 6, 5, 6, 6, 8, '18990.00', 1),
(23, 'Toyota Camry', 10, 18, 16, 17, 17, 19, '27.27', 2),
(24, 'Toyota RAV4', 10, 19, 17, 18, 18, 20, '27.43', 1),
(25, 'Toyota Prius', 10, 20, 18, 19, 19, 21, '27.61', 1),
(26, 'Volkswagen Golf', 11, 21, 19, 20, 20, 22, '23.20', 1),
(27, 'Volkswagen', 11, 22, 20, 21, 21, 23, '26.40', 0),
(28, 'Volkswagen Passat', 11, 23, 21, 22, 22, 24, '29.00', 10),
(29, 'Ford Mustang', 12, 24, 22, 23, 23, 25, '36.12', 3),
(30, 'Ford Explorer', 12, 25, 23, 24, 24, 26, '48.21', 0),
(31, 'Ford Fiesta', 12, 26, 24, 25, 25, 27, '17.62', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `avis_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`),
  ADD CONSTRAINT `avis_ibfk_2` FOREIGN KEY (`VehiculeId`) REFERENCES `vehicule` (`VehiculeId`),
  ADD CONSTRAINT `avis_ibfk_3` FOREIGN KEY (`MarqueId`) REFERENCES `marque` (`MarqueId`);

--
-- Contraintes pour la table `comparison`
--
ALTER TABLE `comparison`
  ADD CONSTRAINT `comparison_ibfk_1` FOREIGN KEY (`VehiculeId1`) REFERENCES `vehicule` (`VehiculeId`),
  ADD CONSTRAINT `comparison_ibfk_2` FOREIGN KEY (`VehiculeId2`) REFERENCES `vehicule` (`VehiculeId`);

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`logo`) REFERENCES `image` (`ImageId`);

--
-- Contraintes pour la table `diaporama`
--
ALTER TABLE `diaporama`
  ADD CONSTRAINT `diaporama_ibfk_1` FOREIGN KEY (`IdNews`) REFERENCES `news` (`NewsId`),
  ADD CONSTRAINT `diaporama_ibfk_2` FOREIGN KEY (`IdImage`) REFERENCES `image` (`ImageId`);

--
-- Contraintes pour la table `guideachat`
--
ALTER TABLE `guideachat`
  ADD CONSTRAINT `guideachat_ibfk_1` FOREIGN KEY (`ImageId`) REFERENCES `image` (`ImageId`),
  ADD CONSTRAINT `guideachat_ibfk_2` FOREIGN KEY (`VehiculeId`) REFERENCES `vehicule` (`VehiculeId`);

--
-- Contraintes pour la table `imagenews`
--
ALTER TABLE `imagenews`
  ADD CONSTRAINT `imagenews_ibfk_1` FOREIGN KEY (`ImageId`) REFERENCES `image` (`ImageId`),
  ADD CONSTRAINT `imagenews_ibfk_2` FOREIGN KEY (`NewsId`) REFERENCES `news` (`NewsId`);

--
-- Contraintes pour la table `imagevehicule`
--
ALTER TABLE `imagevehicule`
  ADD CONSTRAINT `imagevehicule_ibfk_1` FOREIGN KEY (`IdImage`) REFERENCES `image` (`ImageId`),
  ADD CONSTRAINT `imagevehicule_ibfk_2` FOREIGN KEY (`IdVehicule`) REFERENCES `vehicule` (`VehiculeId`);

--
-- Contraintes pour la table `marque`
--
ALTER TABLE `marque`
  ADD CONSTRAINT `marque_ibfk_1` FOREIGN KEY (`ImageId`) REFERENCES `image` (`ImageId`);

--
-- Contraintes pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD CONSTRAINT `vehicule_ibfk_1` FOREIGN KEY (`MarqueId`) REFERENCES `marque` (`MarqueId`),
  ADD CONSTRAINT `vehicule_ibfk_2` FOREIGN KEY (`ModeleId`) REFERENCES `modele` (`ModeleId`),
  ADD CONSTRAINT `vehicule_ibfk_3` FOREIGN KEY (`MoteurId`) REFERENCES `moteur` (`MoteurId`),
  ADD CONSTRAINT `vehicule_ibfk_4` FOREIGN KEY (`DimensionId`) REFERENCES `dimensions` (`DimensionsId`),
  ADD CONSTRAINT `vehicule_ibfk_5` FOREIGN KEY (`PerformancesId`) REFERENCES `performances` (`PerformancesId`),
  ADD CONSTRAINT `vehicule_ibfk_6` FOREIGN KEY (`CaracteristiqueId`) REFERENCES `caracteristique` (`CaracteristiqueId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
