/*!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.6.18-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: inventarisku
-- ------------------------------------------------------
-- Server version	10.6.18-MariaDB-0ubuntu0.22.04.1

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
-- Table structure for table `in_d`
--

DROP TABLE IF EXISTS `in_d`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `in_d` (
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `in_h_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  PRIMARY KEY (`in_h_id`,`item_id`),
  KEY `item_id` (`item_id`),
  CONSTRAINT `in_d_ibfk_1` FOREIGN KEY (`in_h_id`) REFERENCES `in_h` (`id`),
  CONSTRAINT `in_d_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`shafy`@`localhost`*/ /*!50003 TRIGGER `trigger_in_add_update_total`
AFTER INSERT
ON `in_d` FOR EACH ROW
BEGIN
  UPDATE `in_h` SET `total` = `total` + NEW.subtotal WHERE `id` = NEW.in_h_id;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `in_h`
--

DROP TABLE IF EXISTS `in_h`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `in_h` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `out_d`
--

DROP TABLE IF EXISTS `out_d`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `out_d` (
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `out_h_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  PRIMARY KEY (`out_h_id`,`item_id`),
  KEY `item_id` (`item_id`),
  CONSTRAINT `out_d_ibfk_1` FOREIGN KEY (`out_h_id`) REFERENCES `out_h` (`id`),
  CONSTRAINT `out_d_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`shafy`@`localhost`*/ /*!50003 TRIGGER `trigger_out_add_update_total`
AFTER INSERT
ON `out_d` FOR EACH ROW
BEGIN
  UPDATE `out_h` SET `total` = `total` + NEW.subtotal WHERE `id` = NEW.out_h_id;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `out_h`
--

DROP TABLE IF EXISTS `out_h`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `out_h` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `view_dashboard`
--

DROP TABLE IF EXISTS `view_dashboard`;
/*!50001 DROP VIEW IF EXISTS `view_dashboard`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view_dashboard` AS SELECT
 1 AS `total_out_h`,
  1 AS `total_in_h`,
  1 AS `total_items`,
  1 AS `total_users` */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `view_report_items`
--

DROP TABLE IF EXISTS `view_report_items`;
/*!50001 DROP VIEW IF EXISTS `view_report_items`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view_report_items` AS SELECT
 1 AS `id`,
  1 AS `name`,
  1 AS `price`,
  1 AS `stock`,
  1 AS `item_id`,
  1 AS `total` */;
SET character_set_client = @saved_cs_client;

--
-- Dumping routines for database 'inventarisku'
--
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'IGNORE_SPACE,STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
/*!50003 DROP PROCEDURE IF EXISTS `proc_in_add` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
DELIMITER ;;
CREATE DEFINER=`shafy`@`localhost` PROCEDURE `proc_in_add`(IN i_date TIMESTAMP, IN i_item_ids JSON, IN i_quantities JSON, OUT o_in_h_id INT)
BEGIN
  DECLARE v_items_length INT;
  DECLARE v_i INT;
  DECLARE v_item_id INT;
  DECLARE v_qty INT;
  DECLARE v_price INT;
  DECLARE v_subtotal INT;
  INSERT INTO `in_h` (`date`, `total`) VALUES (i_date, 0);
  SET o_in_h_id = (SELECT LAST_INSERT_ID());
  SET v_items_length = JSON_LENGTH(i_item_ids);
  SET v_i = 0;
  WHILE v_i < v_items_length DO
    SET v_item_id = JSON_EXTRACT(i_item_ids, CONCAT('$[', v_i, ']'));
    SET v_qty = JSON_EXTRACT(i_quantities, CONCAT('$[', v_i, ']'));
    SELECT `price` INTO v_price FROM `items` WHERE id = v_item_id;
    SET v_subtotal = v_price * v_qty;
    INSERT INTO `in_d` (`qty`, `subtotal`, `in_h_id`, `item_id`) VALUES (v_qty, v_subtotal, o_in_h_id, v_item_id);
    SET v_i = v_i + 1;
  END WHILE;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
/*!50003 DROP PROCEDURE IF EXISTS `proc_in_delete` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
DELIMITER ;;
CREATE DEFINER=`shafy`@`localhost` PROCEDURE `proc_in_delete`(IN i_id INT)
BEGIN
  DELETE FROM `in_d` WHERE `in_h_id` = i_id;
  DELETE FROM `in_h` WHERE `id` = i_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
/*!50003 DROP PROCEDURE IF EXISTS `proc_out_add` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
DELIMITER ;;
CREATE DEFINER=`shafy`@`localhost` PROCEDURE `proc_out_add`(IN i_date TIMESTAMP, IN i_item_ids JSON, IN i_quantities JSON, OUT o_out_h_id INT)
BEGIN
  DECLARE v_items_length INT;
  DECLARE v_i INT;
  DECLARE v_item_id INT;
  DECLARE v_qty INT;
  DECLARE v_price INT;
  DECLARE v_subtotal INT;
  INSERT INTO `out_h` (`date`, `total`) VALUES (i_date, 0);
  SET o_out_h_id = (SELECT LAST_INSERT_ID());
  SET v_items_length = JSON_LENGTH(i_item_ids);
  SET v_i = 0;
  WHILE v_i < v_items_length DO
    SET v_item_id = JSON_EXTRACT(i_item_ids, CONCAT('$[', v_i, ']'));
    SET v_qty = JSON_EXTRACT(i_quantities, CONCAT('$[', v_i, ']'));
    SELECT `price` INTO v_price FROM `items` WHERE id = v_item_id;
    SET v_subtotal = v_price * v_qty;
    INSERT INTO `out_d` (`qty`, `subtotal`, `out_h_id`, `item_id`) VALUES (v_qty, v_subtotal, o_out_h_id, v_item_id);
    SET v_i = v_i + 1;
  END WHILE;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'IGNORE_SPACE,STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
/*!50003 DROP PROCEDURE IF EXISTS `proc_out_delete` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
DELIMITER ;;
CREATE DEFINER=`shafy`@`localhost` PROCEDURE `proc_out_delete`(IN i_id INT)
BEGIN
  DELETE FROM `out_d` WHERE `out_h_id` = i_id;
  DELETE FROM `out_h` WHERE `id` = i_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'IGNORE_SPACE,STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
/*!50003 DROP PROCEDURE IF EXISTS `proc_stock_recalculation` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
DELIMITER ;;
CREATE DEFINER=`shafy`@`localhost` PROCEDURE `proc_stock_recalculation`()
BEGIN
  DECLARE v_done INT DEFAULT 0;
  DECLARE v_item_id INT;
  DECLARE v_stock INT;
  -- Declare the cursor
  DECLARE c_cursor CURSOR FOR 
  -- SELECT id, name, value FROM example_table;
  (SELECT a.item_id, masuk - keluar AS stock FROM
    (SELECT item_id, SUM(qty) AS masuk FROM in_d GROUP BY item_id) AS a,
    (SELECT item_id, SUM(qty) AS keluar FROM out_d GROUP BY item_id) AS b
    WHERE a.item_id = b.item_id);
  -- Declare CONTINUE HANDLER to handle cursor end
  DECLARE CONTINUE HANDLER FOR NOT FOUND SET v_done = 1;
  -- Open the cursor
  OPEN c_cursor;
  read_loop: LOOP
      -- Fetch the cursor
      FETCH c_cursor INTO v_item_id, v_stock;
      -- Exit loop if no more rows to fetch
      IF v_done THEN
          LEAVE read_loop;
      END IF;
      -- Process each row here
      -- For example, just select data to demonstrate
      -- SELECT v_item_id, v_stock;
      UPDATE items SET stock = v_stock WHERE id = v_item_id;
      -- You can also perform other operations like updating another table
  END LOOP;
  -- Close the cursor
  CLOSE c_cursor;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `view_dashboard`
--

/*!50001 DROP VIEW IF EXISTS `view_dashboard`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`shafy`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_dashboard` AS select (select count(0) from `out_h`) AS `total_out_h`,(select count(0) from `in_h`) AS `total_in_h`,(select count(0) from `items`) AS `total_items`,(select count(0) from `users`) AS `total_users` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_report_items`
--

/*!50001 DROP VIEW IF EXISTS `view_report_items`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`shafy`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_report_items` AS select `items`.`id` AS `id`,`items`.`name` AS `name`,`items`.`price` AS `price`,`items`.`stock` AS `stock`,`od`.`item_id` AS `item_id`,`od`.`total` AS `total` from (`items` left join (select `out_d`.`item_id` AS `item_id`,sum(`out_d`.`qty`) AS `total` from `out_d` group by `out_d`.`item_id`) `od` on(`items`.`id` = `od`.`item_id`)) order by `od`.`total` desc */;
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

-- Dump completed on 2024-06-24 18:09:33