-- MariaDB dump 10.19  Distrib 10.11.3-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: FASTBUNNY
-- ------------------------------------------------------
-- Server version	10.11.3-MariaDB-1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Admin`
--

DROP TABLE IF EXISTS `Admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(150) NOT NULL,
  `admin_senha` varchar(16) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Admin`
--

LOCK TABLES `Admin` WRITE;
/*!40000 ALTER TABLE `Admin` DISABLE KEYS */;
INSERT INTO `Admin` VALUES
(1,'admin@fastbunny.com','123@admin');
/*!40000 ALTER TABLE `Admin` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER trigger_admin_insert
AFTER INSERT ON Admin
FOR EACH ROW
BEGIN
    INSERT INTO WebLogin (login_email, login_tipo)
    VALUES (NEW.admin_email, 'A');
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `Agenda`
--

DROP TABLE IF EXISTS `Agenda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Agenda` (
  `agenda_id` int(11) NOT NULL AUTO_INCREMENT,
  `medico_id_fk` int(11) NOT NULL,
  `agenda_titulo` varchar(150) NOT NULL,
  `agenda_data` date NOT NULL,
  `agenda_hora` time NOT NULL,
  PRIMARY KEY (`agenda_id`),
  KEY `medico_id_fk` (`medico_id_fk`),
  CONSTRAINT `Agenda_ibfk_1` FOREIGN KEY (`medico_id_fk`) REFERENCES `Medico` (`medico_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Agenda`
--

LOCK TABLES `Agenda` WRITE;
/*!40000 ALTER TABLE `Agenda` DISABLE KEYS */;
INSERT INTO `Agenda` VALUES
(1,1,'Agenda Teste','2023-12-25','14:00:00');
/*!40000 ALTER TABLE `Agenda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Consulta`
--

DROP TABLE IF EXISTS `Consulta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Consulta` (
  `consulta_id` int(11) NOT NULL AUTO_INCREMENT,
  `paciente_id_fk` int(11) NOT NULL,
  `agenda_id_fk` int(11) NOT NULL,
  `consulta_data` date NOT NULL,
  PRIMARY KEY (`consulta_id`),
  KEY `paciente_id_fk` (`paciente_id_fk`),
  KEY `agenda_id_fk` (`agenda_id_fk`),
  CONSTRAINT `Consulta_ibfk_1` FOREIGN KEY (`paciente_id_fk`) REFERENCES `Paciente` (`paciente_id`),
  CONSTRAINT `Consulta_ibfk_2` FOREIGN KEY (`agenda_id_fk`) REFERENCES `Agenda` (`agenda_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Consulta`
--

LOCK TABLES `Consulta` WRITE;
/*!40000 ALTER TABLE `Consulta` DISABLE KEYS */;
INSERT INTO `Consulta` VALUES
(1,1,1,'2023-12-25');
/*!40000 ALTER TABLE `Consulta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Especialidade`
--

DROP TABLE IF EXISTS `Especialidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Especialidade` (
  `especialidade_id` int(11) NOT NULL AUTO_INCREMENT,
  `especialidade_nome` varchar(150) NOT NULL,
  PRIMARY KEY (`especialidade_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Especialidade`
--

LOCK TABLES `Especialidade` WRITE;
/*!40000 ALTER TABLE `Especialidade` DISABLE KEYS */;
INSERT INTO `Especialidade` VALUES
(1,'Endocrinologista');
/*!40000 ALTER TABLE `Especialidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Medico`
--

DROP TABLE IF EXISTS `Medico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Medico` (
  `medico_id` int(11) NOT NULL AUTO_INCREMENT,
  `medico_email` varchar(150) NOT NULL,
  `medico_senha` varchar(16) NOT NULL,
  `medico_nome` varchar(150) NOT NULL,
  `medico_tel` varchar(15) NOT NULL,
  `medico_especialidade_fk` int(11) NOT NULL,
  PRIMARY KEY (`medico_id`),
  KEY `medico_especialidade_fk` (`medico_especialidade_fk`),
  CONSTRAINT `Medico_ibfk_1` FOREIGN KEY (`medico_especialidade_fk`) REFERENCES `Especialidade` (`especialidade_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Medico`
--

LOCK TABLES `Medico` WRITE;
/*!40000 ALTER TABLE `Medico` DISABLE KEYS */;
INSERT INTO `Medico` VALUES
(1,'medico@fastbunny.com','123@medico','Medico 1','12345678901',1);
/*!40000 ALTER TABLE `Medico` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER trigger_medico_insert
AFTER INSERT ON Medico
FOR EACH ROW
BEGIN
    INSERT INTO WebLogin (login_email, login_tipo)
    VALUES (NEW.medico_email, 'M');
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `Paciente`
--

DROP TABLE IF EXISTS `Paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Paciente` (
  `paciente_id` int(11) NOT NULL AUTO_INCREMENT,
  `paciente_email` varchar(150) NOT NULL,
  `paciente_senha` varchar(16) NOT NULL,
  `paciente_nome` varchar(150) NOT NULL,
  `paciente_endereco` varchar(150) NOT NULL,
  `paciente_tel` varchar(15) NOT NULL,
  PRIMARY KEY (`paciente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Paciente`
--

LOCK TABLES `Paciente` WRITE;
/*!40000 ALTER TABLE `Paciente` DISABLE KEYS */;
INSERT INTO `Paciente` VALUES
(1,'paciente@fastbunny.com','123@paciente','Paciente 1','Rua do Paciente, 1 - Centro','10987654321');
/*!40000 ALTER TABLE `Paciente` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER trigger_paciente_insert
AFTER INSERT ON Paciente
FOR EACH ROW
BEGIN
    INSERT INTO WebLogin (login_email, login_tipo)
    VALUES (NEW.paciente_email, 'P');
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `WebLogin`
--

DROP TABLE IF EXISTS `WebLogin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `WebLogin` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_email` varchar(150) NOT NULL,
  `login_tipo` char(1) NOT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `WebLogin`
--

LOCK TABLES `WebLogin` WRITE;
/*!40000 ALTER TABLE `WebLogin` DISABLE KEYS */;
INSERT INTO `WebLogin` VALUES
(1,'admin@fastbunny.com','A'),
(2,'medico@fastbunny.com','M'),
(3,'paciente@fastbunny.com','P');
/*!40000 ALTER TABLE `WebLogin` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-15  0:10:39
