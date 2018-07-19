CREATE DATABASE  IF NOT EXISTS `thor` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `thor`;
-- MySQL dump 10.13  Distrib 5.5.43, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: thor
-- ------------------------------------------------------
-- Server version	5.5.39

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `log_requisito`
--

DROP TABLE IF EXISTS `log_requisito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_requisito` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `texto_req_old` varchar(3000) DEFAULT NULL,
  `texto_req_new` varchar(3000) DEFAULT NULL,
  `id_req` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `dt_alteracao` datetime DEFAULT NULL,
  PRIMARY KEY (`id_log`),
  KEY `fk_user_log_re` (`id_user`),
  CONSTRAINT `fk_user_log_re` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_requisito`
--

LOCK TABLES `log_requisito` WRITE;
/*!40000 ALTER TABLE `log_requisito` DISABLE KEYS */;
INSERT INTO `log_requisito` VALUES (55,'dd','REQUISITO DELETADO',12,1,'2015-09-14 08:58:32'),(56,'O sistema deve prover controle de acesso por usuÃ¡rio','O sistema deve prover controle de acesso por usuÃ¡rio, por arquivo.',2,8,'2015-09-18 13:53:55'),(57,'','REQUISITO DELETADO',5,9,'2015-09-18 14:31:55'),(58,'O sistema deverÃ¡ propiciar a visualizaÃ§Ã£o do cadastro do usuÃ¡rio','O sistema deverÃ¡ propiciar a visualizaÃ§Ã£o do cadastro do usuÃ¡rio212121',7,9,'2015-09-18 14:32:24'),(59,'O sistema deve prover criptografia de dados na comunicaÃ§Ã£o entre mÃ¡quinas','O sistema deve prover criptografia de dados na comunicaÃ§Ã£o entre mÃ¡quinas',1,1,'2015-09-21 10:45:02'),(60,'O sistema deverÃ¡ propiciar o cadastro de usuÃ¡rio.','O sistema deverÃ¡ propiciar o cadastro de usuÃ¡rio.',6,1,'2015-09-21 10:45:24'),(61,'The system must provide a registration screen.','The system must provide a registration screen with the fields: name, user name and password.',10,1,'2015-10-25 10:23:03'),(62,'O sistema deverÃ¡ propiciar a visualizaÃ§Ã£o do cadastro do usuÃ¡rio212121','O sistema deverÃ¡ propiciar a visualizaÃ§Ã£o do cadastro do usuÃ¡rio, mostrando: nome, endereÃ§o, telefone.',7,1,'2015-11-02 12:31:55');
/*!40000 ALTER TABLE `log_requisito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `origem`
--

DROP TABLE IF EXISTS `origem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `origem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(200) CHARACTER SET latin1 NOT NULL,
  `descricao` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `nome` varchar(100) CHARACTER SET latin1 NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_origem_usuario1_idx` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `origem`
--

LOCK TABLES `origem` WRITE;
/*!40000 ALTER TABLE `origem` DISABLE KEYS */;
INSERT INTO `origem` VALUES (1,'documento','norma1','ISO 9001',0),(2,'relatorio','relatorio projeto ana','Relatorio Tecnico  - Projeto ANA',0),(8,'documento','Escreva a descriÃ§Ã£o do documento aqui','MPSBR1',0);
/*!40000 ALTER TABLE `origem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisito`
--

DROP TABLE IF EXISTS `requisito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisito` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `texto_req` varchar(3000) CHARACTER SET latin1 NOT NULL,
  `descricao` varchar(300) CHARACTER SET latin1 DEFAULT NULL,
  `data` datetime NOT NULL,
  `categoria` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `tipo` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `estado` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `prioridade` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `origem_id` int(11) NOT NULL,
  `usuario_id_cliente` int(11) NOT NULL,
  `usuario_id_funcionario` int(11) NOT NULL,
  `titulo_req` varchar(80) NOT NULL,
  `id_user_alteracao` int(11) DEFAULT NULL,
  `ultima_alteracao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_requisito_origem1_idx` (`origem_id`),
  KEY `fk_requisito_usuario1_idx` (`usuario_id_cliente`),
  KEY `fk_requisito_usuario2_idx` (`usuario_id_funcionario`),
  KEY `fk_requisito_id_user_alteracao` (`id_user_alteracao`),
  CONSTRAINT `fk_requisito_origem1` FOREIGN KEY (`origem_id`) REFERENCES `origem` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=big5;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisito`
--

LOCK TABLES `requisito` WRITE;
/*!40000 ALTER TABLE `requisito` DISABLE KEYS */;
INSERT INTO `requisito` VALUES (1,'O sistema deve prover criptografia de dados na comunicaÃ§Ã£o entre mÃ¡quinas','','2015-09-18 13:50:03','Desenvolvimento','funcional','incompleto','importante',1,2,8,'Comunicacao segura ',1,'2015-09-21 10:45:02'),(2,'O sistema deve prover controle de acesso por usuÃ¡rio, por arquivo.','','2015-09-18 13:51:23','Interface','nfuncional','completo','essencial',1,2,8,'Controle de acesso',8,'2015-09-18 13:53:55'),(3,'O sistema deve exigir senhas com determinadas regras.','','2015-09-18 13:52:13','Interface','funcional','incompleto','desejavel',1,2,8,'Senha segura',8,'2015-09-18 13:52:13'),(4,'O sistema deve prover garantia de integridade dos dados via hash.','','2015-09-18 13:53:21','Desenvolvimento','funcional','revisao','desejavel',1,2,8,'Integridade dos dados',8,'2015-09-18 13:53:21'),(6,'O sistema deverÃ¡ propiciar o cadastro de usuÃ¡rio.','','2015-09-18 14:28:17','Interface','funcional','completo','essencial',8,9,1,'cadastro de usuario',1,'2015-09-21 10:45:24'),(7,'O sistema deverÃ¡ propiciar a visualizaÃ§Ã£o do cadastro do usuÃ¡rio, mostrando: nome, endereÃ§o, telefone.','','2015-09-18 14:29:50','Interface','funcional','incompleto','desejavel',1,9,1,'Visualizar cadastro',1,'2015-11-02 12:31:55'),(8,'Propiciar o cadastro de requisitos','','2015-09-18 14:30:32','Teste','funcional','completo','desejavel',2,5,8,'Cadastro de requisitos',9,'2015-09-18 14:30:32'),(9,'Propiciar a visualizaÃ§Ã£o do mapeamento entre requisitos','','2015-09-18 14:31:42','Desenvolvimento','dominio','completo','essencial',8,2,3,'Visualizar o mapeamento de requisitos',9,'2015-09-18 14:31:42'),(10,'The system must provide a registration screen with the fields: name, user name and password.','','2015-10-25 10:21:40','Interface','funcional','incompleto','essencial',1,9,1,'Register',1,'2015-10-25 10:23:03');
/*!40000 ALTER TABLE `requisito` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger `log_alt_requisito` AFTER UPDATE ON requisito FOR EACH ROW
begin
	INSERT INTO `thor`.`log_requisito`
(`texto_req_old`,
`texto_req_new`,
`id_req`,
`id_user`,
`dt_alteracao`)
VALUES
(
old.texto_req,
new.texto_req,
old.id,
new.id_user_alteracao,
new.ultima_alteracao);

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger `log_del_requisito` AFTER DELETE ON requisito FOR EACH ROW
begin
	INSERT INTO `thor`.`log_requisito`
(`texto_req_old`,
`texto_req_new`,
`id_req`,
`id_user`,
`dt_alteracao`)
VALUES
(
old.texto_req,
"REQUISITO DELETADO",
old.id,
NULL,
now());

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `requisito_has_requisito`
--

DROP TABLE IF EXISTS `requisito_has_requisito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisito_has_requisito` (
  `requisito_id` int(11) NOT NULL,
  `depende_de` int(11) NOT NULL,
  PRIMARY KEY (`requisito_id`,`depende_de`),
  KEY `fk_requisito_has_requisito_requisito2_idx` (`depende_de`),
  KEY `fk_requisito_has_requisito_requisito1_idx` (`requisito_id`),
  CONSTRAINT `fk_requisito_has_requisito_requisito1` FOREIGN KEY (`requisito_id`) REFERENCES `requisito` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisito_has_requisito`
--

LOCK TABLES `requisito_has_requisito` WRITE;
/*!40000 ALTER TABLE `requisito_has_requisito` DISABLE KEYS */;
INSERT INTO `requisito_has_requisito` VALUES (3,1),(4,2),(7,6),(8,6),(9,6),(6,7),(9,8);
/*!40000 ALTER TABLE `requisito_has_requisito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `cpf` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone_fixo` varchar(45) DEFAULT NULL,
  `telefone_cel` varchar(45) NOT NULL,
  `area` varchar(45) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `login` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Milene','40bd001563085fc35165329ea1ff5c5ecbdbbeef','000999887766','milene@ifsp.edu.br','32245676','988134567','informatica','funcionario','milene'),(2,'Moacir ','35139ef894b28b73bea022755166a23933c7d9cb','998345678','mo@gmail.com','456732','98567432','gestao','cliente','moacir'),(3,'Luciana ','9a3e61b6bcc8abec08f195526c3132d5a4a98cc0','888773345','l@gmail.com','455667789','7654321','Banco de Dados','funcionario','luciana'),(4,'Henrique ','2d354a2fb4066717f86d5a5f633e14f8538018c3','12345678911','h@gmail.com','123887','128813','TI','funcionario','henrique'),(8,'nelson','d915f4e970e53654202c1cf5c62e60a7280a8219','75920301953','nelson@gmail.com','','','informÃ¡tica','funcionario','nelson'),(9,'Eduardo','40bd001563085fc35165329ea1ff5c5ecbdbbeef','1111','a@gmail.com','1111','12222','EducaÃ§Ã£o','cliente','Eduardo');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-12-16 14:50:12
