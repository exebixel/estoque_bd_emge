-- MariaDB dump 10.19  Distrib 10.8.3-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: estoques_final
-- ------------------------------------------------------
-- Server version	10.8.3-MariaDB

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
-- Table structure for table `entradas`
--

DROP TABLE IF EXISTS `entradas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entradas` (
  `entrada_id` int(11) NOT NULL AUTO_INCREMENT,
  `nota_fiscal_id` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `produto_id` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL DEFAULT 0,
  `valor_unitario` float NOT NULL DEFAULT 0,
  `data_compra` date NOT NULL DEFAULT curdate(),
  `data_validade` date DEFAULT NULL,
  `data_cadastro` date NOT NULL DEFAULT curdate(),
  `lote` bigint(20) NOT NULL,
  PRIMARY KEY (`entrada_id`),
  KEY `produto_id_entrada` (`produto_id`),
  CONSTRAINT `produto_id_entrada` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`produto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entradas`
--

LOCK TABLES `entradas` WRITE;
/*!40000 ALTER TABLE `entradas` DISABLE KEYS */;
INSERT INTO `entradas` VALUES
(1,'00000001',1,24,2,'2022-06-16',NULL,'2022-06-16',1655348400),
(2,'00000001',2,30,5,'2022-06-16',NULL,'2022-06-16',1655348400),
(3,'00000002',2,30,10,'2022-06-19',NULL,'2022-06-19',1655607600);
/*!40000 ALTER TABLE `entradas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produto` (
  `produto_id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fabricante` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1,
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `data_atualizacao` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`produto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES
(1,'Coca cola 500ml','Coca Cola',1,'2022-06-16 12:01:36','2022-06-16 12:01:36'),
(2,'Doritos 250g','Elma Chips',1,'2022-06-16 12:01:36','2022-06-16 16:23:57'),
(3,'Gulão','GUlozitos',1,'2022-06-16 16:00:20','2022-06-20 13:47:28'),
(4,'Açai 1L','Sorveteria Almeida',1,'2022-06-16 16:24:32','2022-06-16 16:26:15');
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `saidas`
--

DROP TABLE IF EXISTS `saidas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `saidas` (
  `saida_id` int(11) NOT NULL AUTO_INCREMENT,
  `produto_id` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL DEFAULT 0,
  `data_saida` date NOT NULL DEFAULT curdate(),
  `data_cadastro` date NOT NULL DEFAULT curdate(),
  `lote` bigint(20) NOT NULL,
  PRIMARY KEY (`saida_id`),
  KEY `produto_id_saida` (`produto_id`),
  CONSTRAINT `produto_id_saida` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`produto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `saidas`
--

LOCK TABLES `saidas` WRITE;
/*!40000 ALTER TABLE `saidas` DISABLE KEYS */;
INSERT INTO `saidas` VALUES
(1,1,4,'2022-06-16','2022-06-16',1655348400),
(2,1,2,'2022-06-19','2022-06-19',1655348400);
/*!40000 ALTER TABLE `saidas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `vw_estoque`
--

DROP TABLE IF EXISTS `vw_estoque`;
/*!50001 DROP VIEW IF EXISTS `vw_estoque`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vw_estoque` (
  `produto_id` tinyint NOT NULL,
  `quantidade` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `vw_lote_detalhe`
--

DROP TABLE IF EXISTS `vw_lote_detalhe`;
/*!50001 DROP VIEW IF EXISTS `vw_lote_detalhe`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vw_lote_detalhe` (
  `lote` tinyint NOT NULL,
  `produto_id` tinyint NOT NULL,
  `descricao` tinyint NOT NULL,
  `data_validade` tinyint NOT NULL,
  `qtd_entrada` tinyint NOT NULL,
  `qtd_saida` tinyint NOT NULL,
  `qtd_final` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `vw_lote_total`
--

DROP TABLE IF EXISTS `vw_lote_total`;
/*!50001 DROP VIEW IF EXISTS `vw_lote_total`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vw_lote_total` (
  `lote` tinyint NOT NULL,
  `data_compra` tinyint NOT NULL,
  `qtd_entrada` tinyint NOT NULL,
  `qtd_saida` tinyint NOT NULL,
  `qtd_final` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `vw_estoque`
--

/*!50001 DROP TABLE IF EXISTS `vw_estoque`*/;
/*!50001 DROP VIEW IF EXISTS `vw_estoque`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_estoque` AS select `p`.`produto_id` AS `produto_id`,sum(ifnull(`e`.`quantidade`,0)) - sum(ifnull(`s`.`quantidade`,0)) AS `quantidade` from ((`produto` `p` left join `entradas` `e` on(`e`.`produto_id` = `p`.`produto_id`)) left join `saidas` `s` on(`s`.`produto_id` = `p`.`produto_id`)) group by `p`.`produto_id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_lote_detalhe`
--

/*!50001 DROP TABLE IF EXISTS `vw_lote_detalhe`*/;
/*!50001 DROP VIEW IF EXISTS `vw_lote_detalhe`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_lote_detalhe` AS select `t`.`lote` AS `lote`,`t`.`produto_id` AS `produto_id`,`t`.`descricao` AS `descricao`,`t`.`data_validade` AS `data_validade`,`t`.`qtd_entrada` AS `qtd_entrada`,`t`.`qtd_saida` AS `qtd_saida`,`t`.`qtd_entrada` - `t`.`qtd_saida` AS `qtd_final` from (select `e`.`lote` AS `lote`,`e`.`produto_id` AS `produto_id`,`p`.`descricao` AS `descricao`,`e`.`data_validade` AS `data_validade`,sum(`e`.`quantidade`) AS `qtd_entrada`,ifnull((select sum(`s`.`quantidade`) from `saidas` `s` where `s`.`lote` = `e`.`lote` and `s`.`produto_id` = `p`.`produto_id`),0) AS `qtd_saida` from (`entradas` `e` join `produto` `p` on(`p`.`produto_id` = `e`.`produto_id`)) group by `e`.`lote`,`e`.`produto_id`) `t` order by `t`.`lote`,`t`.`produto_id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_lote_total`
--

/*!50001 DROP TABLE IF EXISTS `vw_lote_total`*/;
/*!50001 DROP VIEW IF EXISTS `vw_lote_total`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_lote_total` AS select `tmp`.`lote` AS `lote`,`tmp`.`data_compra` AS `data_compra`,`tmp`.`qtd_entrada` AS `qtd_entrada`,`tmp`.`qtd_saida` AS `qtd_saida`,`tmp`.`qtd_entrada` - `tmp`.`qtd_saida` AS `qtd_final` from (select `e`.`lote` AS `lote`,`e`.`data_compra` AS `data_compra`,sum(`e`.`quantidade`) AS `qtd_entrada`,ifnull((select sum(`s`.`quantidade`) from `saidas` `s` where `s`.`lote` = `e`.`lote`),0) AS `qtd_saida` from `entradas` `e` group by `e`.`lote`,`e`.`data_compra`) `tmp` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-20 14:59:12
