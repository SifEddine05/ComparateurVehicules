-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: comparateur_vehicules
-- ------------------------------------------------------
-- Server version	8.0.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `avis`
--

DROP TABLE IF EXISTS `avis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `avis` (
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
  KEY `MarqueId` (`MarqueId`),
  CONSTRAINT `avis_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`),
  CONSTRAINT `avis_ibfk_2` FOREIGN KEY (`VehiculeId`) REFERENCES `vehicule` (`VehiculeId`),
  CONSTRAINT `avis_ibfk_3` FOREIGN KEY (`MarqueId`) REFERENCES `marque` (`MarqueId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avis`
--

LOCK TABLES `avis` WRITE;
/*!40000 ALTER TABLE `avis` DISABLE KEYS */;
/*!40000 ALTER TABLE `avis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `caracteristique`
--

DROP TABLE IF EXISTS `caracteristique`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `caracteristique` (
  `CaracteristiqueId` int NOT NULL AUTO_INCREMENT,
  `Energie` varchar(50) DEFAULT NULL,
  `Consommation` decimal(5,2) DEFAULT NULL,
  `Version` varchar(255) DEFAULT NULL,
  `Annees` int DEFAULT NULL,
  `Boite` varchar(50) DEFAULT NULL,
  `NbVitesses` int DEFAULT NULL,
  PRIMARY KEY (`CaracteristiqueId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caracteristique`
--

LOCK TABLES `caracteristique` WRITE;
/*!40000 ALTER TABLE `caracteristique` DISABLE KEYS */;
/*!40000 ALTER TABLE `caracteristique` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comparison`
--

DROP TABLE IF EXISTS `comparison`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comparison` (
  `ComparisonId` int NOT NULL AUTO_INCREMENT,
  `VehiculeId1` int DEFAULT NULL,
  `VehiculeId2` int DEFAULT NULL,
  `NombreDesFoisUtiliser` int DEFAULT NULL,
  PRIMARY KEY (`ComparisonId`),
  KEY `VehiculeId1` (`VehiculeId1`),
  KEY `VehiculeId2` (`VehiculeId2`),
  CONSTRAINT `comparison_ibfk_1` FOREIGN KEY (`VehiculeId1`) REFERENCES `vehicule` (`VehiculeId`),
  CONSTRAINT `comparison_ibfk_2` FOREIGN KEY (`VehiculeId2`) REFERENCES `vehicule` (`VehiculeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comparison`
--

LOCK TABLES `comparison` WRITE;
/*!40000 ALTER TABLE `comparison` DISABLE KEYS */;
/*!40000 ALTER TABLE `comparison` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `logo` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `logo` (`logo`),
  CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`logo`) REFERENCES `image` (`ImageId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `diaporama`
--

DROP TABLE IF EXISTS `diaporama`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `diaporama` (
  `DiaporamaId` int NOT NULL AUTO_INCREMENT,
  `IdNews` int DEFAULT NULL,
  `IdImage` int DEFAULT NULL,
  `UrlPublicite` varchar(255) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`DiaporamaId`),
  KEY `IdNews` (`IdNews`),
  KEY `IdImage` (`IdImage`),
  CONSTRAINT `diaporama_ibfk_1` FOREIGN KEY (`IdNews`) REFERENCES `news` (`NewsId`),
  CONSTRAINT `diaporama_ibfk_2` FOREIGN KEY (`IdImage`) REFERENCES `image` (`ImageId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diaporama`
--

LOCK TABLES `diaporama` WRITE;
/*!40000 ALTER TABLE `diaporama` DISABLE KEYS */;
/*!40000 ALTER TABLE `diaporama` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dimensions`
--

DROP TABLE IF EXISTS `dimensions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dimensions` (
  `DimensionsId` int NOT NULL AUTO_INCREMENT,
  `Largeur` decimal(5,2) DEFAULT NULL,
  `Hauteur` decimal(5,2) DEFAULT NULL,
  `NombrePlaces` int DEFAULT NULL,
  `VolumeCoffre` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`DimensionsId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dimensions`
--

LOCK TABLES `dimensions` WRITE;
/*!40000 ALTER TABLE `dimensions` DISABLE KEYS */;
/*!40000 ALTER TABLE `dimensions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guideachat`
--

DROP TABLE IF EXISTS `guideachat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `guideachat` (
  `GuideAchatId` int NOT NULL AUTO_INCREMENT,
  `Titre` varchar(255) DEFAULT NULL,
  `ImageId` int DEFAULT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `Text` text,
  `VehiculeId` int DEFAULT NULL,
  PRIMARY KEY (`GuideAchatId`),
  KEY `ImageId` (`ImageId`),
  KEY `VehiculeId` (`VehiculeId`),
  CONSTRAINT `guideachat_ibfk_1` FOREIGN KEY (`ImageId`) REFERENCES `image` (`ImageId`),
  CONSTRAINT `guideachat_ibfk_2` FOREIGN KEY (`VehiculeId`) REFERENCES `vehicule` (`VehiculeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guideachat`
--

LOCK TABLES `guideachat` WRITE;
/*!40000 ALTER TABLE `guideachat` DISABLE KEYS */;
/*!40000 ALTER TABLE `guideachat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `image` (
  `ImageId` int NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`ImageId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
/*!40000 ALTER TABLE `image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagenews`
--

DROP TABLE IF EXISTS `imagenews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `imagenews` (
  `ImageNewsId` int NOT NULL AUTO_INCREMENT,
  `ImageId` int DEFAULT NULL,
  `NewsId` int DEFAULT NULL,
  PRIMARY KEY (`ImageNewsId`),
  KEY `ImageId` (`ImageId`),
  KEY `NewsId` (`NewsId`),
  CONSTRAINT `imagenews_ibfk_1` FOREIGN KEY (`ImageId`) REFERENCES `image` (`ImageId`),
  CONSTRAINT `imagenews_ibfk_2` FOREIGN KEY (`NewsId`) REFERENCES `news` (`NewsId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagenews`
--

LOCK TABLES `imagenews` WRITE;
/*!40000 ALTER TABLE `imagenews` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagenews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagevehicule`
--

DROP TABLE IF EXISTS `imagevehicule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `imagevehicule` (
  `ImageVehiculeId` int NOT NULL AUTO_INCREMENT,
  `IdImage` int DEFAULT NULL,
  `IdVehicule` int DEFAULT NULL,
  PRIMARY KEY (`ImageVehiculeId`),
  KEY `IdImage` (`IdImage`),
  KEY `IdVehicule` (`IdVehicule`),
  CONSTRAINT `imagevehicule_ibfk_1` FOREIGN KEY (`IdImage`) REFERENCES `image` (`ImageId`),
  CONSTRAINT `imagevehicule_ibfk_2` FOREIGN KEY (`IdVehicule`) REFERENCES `vehicule` (`VehiculeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagevehicule`
--

LOCK TABLES `imagevehicule` WRITE;
/*!40000 ALTER TABLE `imagevehicule` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagevehicule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marque`
--

DROP TABLE IF EXISTS `marque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `marque` (
  `MarqueId` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `ImageId` int DEFAULT NULL,
  `PaysOrigine` varchar(255) DEFAULT NULL,
  `SiegeSociale` varchar(255) DEFAULT NULL,
  `AnneeCreation` int DEFAULT NULL,
  `Principale` int DEFAULT NULL,
  PRIMARY KEY (`MarqueId`),
  KEY `ImageId` (`ImageId`),
  CONSTRAINT `marque_ibfk_1` FOREIGN KEY (`ImageId`) REFERENCES `image` (`ImageId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marque`
--

LOCK TABLES `marque` WRITE;
/*!40000 ALTER TABLE `marque` DISABLE KEYS */;
/*!40000 ALTER TABLE `marque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modele`
--

DROP TABLE IF EXISTS `modele`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `modele` (
  `ModeleId` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  PRIMARY KEY (`ModeleId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modele`
--

LOCK TABLES `modele` WRITE;
/*!40000 ALTER TABLE `modele` DISABLE KEYS */;
/*!40000 ALTER TABLE `modele` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moteur`
--

DROP TABLE IF EXISTS `moteur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `moteur` (
  `MoteurId` int NOT NULL AUTO_INCREMENT,
  `NombreCylindres` int DEFAULT NULL,
  `NombreSoupapesParCylindre` int DEFAULT NULL,
  `Cylindree` decimal(10,2) DEFAULT NULL,
  `PuissanceDIN` int DEFAULT NULL,
  `CoupleMoteur` decimal(10,2) DEFAULT NULL,
  `PuissanceFiscale` int DEFAULT NULL,
  PRIMARY KEY (`MoteurId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moteur`
--

LOCK TABLES `moteur` WRITE;
/*!40000 ALTER TABLE `moteur` DISABLE KEYS */;
/*!40000 ALTER TABLE `moteur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `news` (
  `NewsId` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `Text` text,
  `date_creation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`NewsId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `performances`
--

DROP TABLE IF EXISTS `performances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `performances` (
  `PerformancesId` int NOT NULL AUTO_INCREMENT,
  `VitesseMaximum` int DEFAULT NULL,
  `Acceleration` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`PerformancesId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `performances`
--

LOCK TABLES `performances` WRITE;
/*!40000 ALTER TABLE `performances` DISABLE KEYS */;
/*!40000 ALTER TABLE `performances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `UserId` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) DEFAULT NULL,
  `Prenom` varchar(50) DEFAULT NULL,
  `Sexe` varchar(10) DEFAULT NULL,
  `DateDeNaissance` date DEFAULT NULL,
  `MotDePasse` varchar(255) DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`UserId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicule`
--

DROP TABLE IF EXISTS `vehicule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehicule` (
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
  KEY `CaracteristiqueId` (`CaracteristiqueId`),
  CONSTRAINT `vehicule_ibfk_1` FOREIGN KEY (`MarqueId`) REFERENCES `marque` (`MarqueId`),
  CONSTRAINT `vehicule_ibfk_2` FOREIGN KEY (`ModeleId`) REFERENCES `modele` (`ModeleId`),
  CONSTRAINT `vehicule_ibfk_3` FOREIGN KEY (`MoteurId`) REFERENCES `moteur` (`MoteurId`),
  CONSTRAINT `vehicule_ibfk_4` FOREIGN KEY (`DimensionId`) REFERENCES `dimensions` (`DimensionsId`),
  CONSTRAINT `vehicule_ibfk_5` FOREIGN KEY (`PerformancesId`) REFERENCES `performances` (`PerformancesId`),
  CONSTRAINT `vehicule_ibfk_6` FOREIGN KEY (`CaracteristiqueId`) REFERENCES `caracteristique` (`CaracteristiqueId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicule`
--

LOCK TABLES `vehicule` WRITE;
/*!40000 ALTER TABLE `vehicule` DISABLE KEYS */;
/*!40000 ALTER TABLE `vehicule` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-09 18:14:52
