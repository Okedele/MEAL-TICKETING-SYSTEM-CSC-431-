CREATE DATABASE  IF NOT EXISTS `meal_ticketing` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `meal_ticketing`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: meal_ticketing
-- ------------------------------------------------------
-- Server version	5.5.5-10.0.17-MariaDB

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
-- Temporary view structure for view `assorted`
--

DROP TABLE IF EXISTS `assorted`;
/*!50001 DROP VIEW IF EXISTS `assorted`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `assorted` AS SELECT 
 1 AS `Food`,
 1 AS `Category`,
 1 AS `Price`,
 1 AS `Image`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `completed_order`
--

DROP TABLE IF EXISTS `completed_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `completed_order` (
  `sn` int(11) NOT NULL AUTO_INCREMENT,
  `Customer_Number` varchar(255) NOT NULL,
  `staff_id` varchar(45) NOT NULL,
  `date_of_payment` date DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`sn`,`Customer_Number`,`staff_id`),
  KEY `fk_staff_cutomer_idx` (`staff_id`),
  KEY `fk_customer_name_idx` (`Customer_Number`),
  CONSTRAINT `fk_customer_name` FOREIGN KEY (`Customer_Number`) REFERENCES `order_details` (`Order_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_staff_cutomer` FOREIGN KEY (`staff_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `completed_order`
--

LOCK TABLES `completed_order` WRITE;
/*!40000 ALTER TABLE `completed_order` DISABLE KEYS */;
INSERT INTO `completed_order` VALUES (2,'c41rrb0vb34goo4s','Omo13','2018-05-13',100),(3,'c41rrb0vb34goo4s','Omo13','2018-05-13',100),(4,'c41rrb0vb34goo4s','Omo13','2018-05-13',150),(5,'c41rrb0vb34goo4s','Omo13','2018-05-13',100),(6,'9v1o4z4ki4o48cow','Omo13','2018-05-13',400),(7,'9v1o4z4ki4o48cow','Omo13','2018-05-13',600),(8,'2oa8t302sx0k08cw','Omo13','2018-05-13',50),(9,'2oa8t302sx0k08cw','Omo13','2018-05-13',100),(10,'nh4vpjy7bogk0gww','Omo13','2018-05-16',200),(11,'nh4vpjy7bogk0gww','Omo13','2018-05-16',50),(12,'nh4vpjy7bogk0gww','Omo13','2018-05-16',400),(13,'nh4vpjy7bogk0gww','Omo13','2018-05-16',50),(14,'2zlq48p4f88w844s','Omo13','2018-05-24',50),(15,'qxl3e7pwjv48ggc0','Omo13','2018-05-24',100);
/*!40000 ALTER TABLE `completed_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `continental_food`
--

DROP TABLE IF EXISTS `continental_food`;
/*!50001 DROP VIEW IF EXISTS `continental_food`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `continental_food` AS SELECT 
 1 AS `Food`,
 1 AS `Category`,
 1 AS `Price`,
 1 AS `Image`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `drinks`
--

DROP TABLE IF EXISTS `drinks`;
/*!50001 DROP VIEW IF EXISTS `drinks`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `drinks` AS SELECT 
 1 AS `Product`,
 1 AS `Category`,
 1 AS `Price`,
 1 AS `Image`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `Employee_ID` varchar(10) NOT NULL,
  `Employee_Name` varchar(100) DEFAULT NULL,
  `Role` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Employee_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES ('Ade12','Adeola Bankole','Waiter'),('Adu14','Adukoya Bukola','Waiter'),('Ayo14','Ayobami Adeleke','Waiter'),('Chi15','Chioma Peters','Waiter'),('Joh16','John Michaels','Manager'),('Omo13','Omolola Ajibade','Waiter');
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_details` (
  `Order_ID` varchar(255) NOT NULL,
  `Valid_To_Date` date DEFAULT NULL,
  PRIMARY KEY (`Order_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_details`
--

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
INSERT INTO `order_details` VALUES ('2oa8t302sx0k08cw','2018-05-20'),('2zlq48p4f88w844s','4636-08-07'),('49gc8xfsa9c04wcc','3000-08-03'),('62gui6rct9c0sgs0','2018-02-05'),('6funr4id9l440s0o','3300-08-05'),('6hx6qzmhjwo4kogw','3018-09-05'),('8ntqln5m0ikg0cs8','4636-08-07'),('97qko9mildcsk884','2018-05-24'),('99nrjhepxb0gggss','3333-08-04'),('9v1o4z4ki4o48cow','2018-05-20'),('a8conv6du00kkcw4','7733-08-09'),('brqrfe69l7kkok80','2018-05-27'),('c41rrb0vb34goo4s','2018-05-20'),('c77izm8gus08k0ko','7766-09-07'),('dg3c52ctd7w4k8ko','3018-09-05'),('eflcs08ygy88oocg','2018-08-06'),('enippcgl1t4og88s','7766-09-07'),('ezrxhzmjllskcs0w','2018-06-03'),('fdf178s0lnsos080','2000-08-03'),('io1vntqiccg08gss','3018-09-05'),('lenxihtgadc0c840','2018-02-05'),('n9r3j1ujppckg088','3018-09-05'),('nh4vpjy7bogk0gww','2018-05-26'),('ni6qgk1c1jkcowwg','2018-09-09'),('nzf670fsulck08s8','4900-08-05'),('oak65mfljuow44wk','6000-08-06'),('p0euo1rks0gc4gc4','2018-09-05'),('q7ozd50vhqo80ocw','2018-02-05'),('qcr9acwnclwsskko','2007-08-03'),('qopruo5zqysg80s0','3018-09-05'),('qwgyb5e09nkkg4wg','6669-08-03'),('qxl3e7pwjv48ggc0','2018-05-31');
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `order_lookup`
--

DROP TABLE IF EXISTS `order_lookup`;
/*!50001 DROP VIEW IF EXISTS `order_lookup`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `order_lookup` AS SELECT 
 1 AS `Order_id`,
 1 AS `Product`,
 1 AS `Price`,
 1 AS `Attended_by`,
 1 AS `Date_attended`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `Product` varchar(60) NOT NULL,
  `Description` varchar(150) DEFAULT NULL,
  `Price_Per_Portion` int(11) DEFAULT NULL,
  `Category` varchar(20) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Product`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES ('7Up','One plastic bottle of 7Up (50cl)',100,'Drink','../images/seven-up.png'),('Amala','One wrap of amala with soup of choice',50,'Traditional','../images/amala.jpg'),('Beans','One full serving spoon of beans',50,'Traditional','../images/beans.jpg'),('Beef','One piece of beef',50,'Assorted','../images/beef.jpg'),('Chicken','One piece of chicken',400,'Assorted','../images/chicken.jpg'),('Eba','One wrap of eba with soup of choice',50,'Traditional','../images/eba.jpg'),('Egg','One hard-boiled egg',60,'Traditional','../images/boiled-egg.png'),('Fried Rice','A full serving spoon of rice and vegetables',100,'Continental','../images/fried-rice.jpg'),('Goat Meat','One piece of goat meat',50,'Assorted','../images/goat-meat.jpg'),('Jollof Rice','A full serving spoon of peppered rice',100,'Continental','../images/jollof-rice.jpg'),('Juice (any brand)','One juice (1 litre)',600,'Drink','../images/juice.jpg'),('LaCasera','One large LaCasera (50ml)',100,'Drink','../images/LaCasera.jpg'),('Large Coke','One large coke (50cl)',150,'Drink','../images/big-coke.jpeg'),('Large Fanta (Apple)','One large apple fanta (50cl)',150,'Drink','../images/big-fanta-apple.jpg'),('Large Fanta (Orange)','One large orange fanta (50cl)',150,'Drink','../images/big-fanta-orange.jpeg'),('Large Sprite','One large sprite (50cl)',150,'Drink','../images/big-sprite.jpeg'),('Lucozade Boost','One lucozade boost (50cl)',250,'Drink','../images/lucozade.jpg'),('Miranda','One large miranda (50cl)',100,'Drink','../images/mirinda.jpg'),('Moi Moi','A bowl of bean cake',100,'Traditional','../images/moi-moi.jpg'),('Pepsi','One large pepsi (50cl)',100,'Drink','../images/pepsi.jpeg'),('Plain Rice','A full serving spoon of plain rice with fried stew',50,'Continental','../images/rice.jpg'),('Plantain','Five slices of plantain',50,'Traditional','../images/plantain.jpg'),('Pomo','One piece of pomo',100,'Traditional','../images/pomo.jpg'),('Pounded Yam','One wrap of pounded yam with soup of choice',50,'Traditional','../images/pounded-yam.jpg'),('Ribena','One ribena (50cl)',250,'Drink','../images/ribena.jpg'),('Salad','One bowl of vegetable salad',50,'Continental','../images/salad.jpg'),('Sausage','One sausage',70,'Assorted','../images/sausage.jpg'),('Small Coke','One small coke (35cl)',100,'Drink','../images/small-coke.jpeg'),('Small Fanta (Orange)','One small orange fanta (35cl)',100,'Drink','../images/small-fanta-orange.png'),('Small Sprite','One small sprite (35cl)',100,'Drink','../images/small-sprite.jpeg'),('Spaghetti','A full serving spoon of spaghetti with vegetables',100,'Continental','../images/spaghetti.jpg'),('Turkey','One piece of turkey',400,'Assorted','../images/turkey.jpg'),('Wheat','One wrap of wheat with soup of choice',50,'Traditional','../images/wheat.jpg'),('Yam','One slice of white yam',50,'Traditional','../images/yam.jpg'),('Yam Porridge','One full serving spoon of yam porridge',100,'Traditional','../images/yam-porridge.jpg');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `sales_record`
--

DROP TABLE IF EXISTS `sales_record`;
/*!50001 DROP VIEW IF EXISTS `sales_record`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `sales_record` AS SELECT 
 1 AS `Product`,
 1 AS `Amount`,
 1 AS `Date`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `sold_food`
--

DROP TABLE IF EXISTS `sold_food`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sold_food` (
  `Food` varchar(60) NOT NULL,
  `Price` int(11) NOT NULL,
  `Date` date NOT NULL,
  KEY `fk_sold_food_inventory_idx` (`Food`),
  CONSTRAINT `fk_sold_food_inventory` FOREIGN KEY (`Food`) REFERENCES `products` (`Product`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sold_food`
--

LOCK TABLES `sold_food` WRITE;
/*!40000 ALTER TABLE `sold_food` DISABLE KEYS */;
/*!40000 ALTER TABLE `sold_food` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `sold_food_view`
--

DROP TABLE IF EXISTS `sold_food_view`;
/*!50001 DROP VIEW IF EXISTS `sold_food_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `sold_food_view` AS SELECT 
 1 AS `order_id`,
 1 AS `Product`,
 1 AS `Price`,
 1 AS `payment_Date`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ticket` (
  `Order_ID` varchar(255) NOT NULL,
  `Product` varchar(45) NOT NULL,
  `Total_Price` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Order_ID`,`Product`),
  KEY `fk_product_price_idx` (`Product`),
  CONSTRAINT `fk_order_price` FOREIGN KEY (`Order_ID`) REFERENCES `order_details` (`Order_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_product_price` FOREIGN KEY (`Product`) REFERENCES `products` (`Product`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket`
--

LOCK TABLES `ticket` WRITE;
/*!40000 ALTER TABLE `ticket` DISABLE KEYS */;
INSERT INTO `ticket` VALUES ('2oa8t302sx0k08cw','Goat Meat','50'),('2oa8t302sx0k08cw','Jollof Rice','100'),('2oa8t302sx0k08cw','LaCasera','100'),('2zlq48p4f88w844s','Beans','50'),('49gc8xfsa9c04wcc','Eba','50'),('62gui6rct9c0sgs0','Eba','50'),('6funr4id9l440s0o','Large Sprite','150'),('6hx6qzmhjwo4kogw','Amala','50'),('6hx6qzmhjwo4kogw','Egg','60'),('8ntqln5m0ikg0cs8','Beans','50'),('97qko9mildcsk884','Beans','150'),('99nrjhepxb0gggss','Beans','50'),('9v1o4z4ki4o48cow','Chicken','400'),('9v1o4z4ki4o48cow','Juice (any brand)','600'),('a8conv6du00kkcw4','Beans','50'),('brqrfe69l7kkok80','Beans','50'),('brqrfe69l7kkok80','Eba','50'),('c41rrb0vb34goo4s','Beef','100'),('c41rrb0vb34goo4s','Jollof Rice','100'),('c41rrb0vb34goo4s','Large Coke','150'),('c41rrb0vb34goo4s','Moi Moi','100'),('c77izm8gus08k0ko','Beans','50'),('dg3c52ctd7w4k8ko','Amala','50'),('dg3c52ctd7w4k8ko','Egg','60'),('eflcs08ygy88oocg','Chicken','1200'),('eflcs08ygy88oocg','Jollof Rice','500'),('eflcs08ygy88oocg','Juice (any brand)','1800'),('enippcgl1t4og88s','Beans','50'),('ezrxhzmjllskcs0w','Large Coke','150'),('ezrxhzmjllskcs0w','Spaghetti','100'),('fdf178s0lnsos080','Eba','50'),('io1vntqiccg08gss','Amala','50'),('io1vntqiccg08gss','Egg','60'),('lenxihtgadc0c840','Eba','50'),('n9r3j1ujppckg088','Amala','50'),('n9r3j1ujppckg088','Egg','60'),('nh4vpjy7bogk0gww','Beef','50'),('nh4vpjy7bogk0gww','Chicken','400'),('nh4vpjy7bogk0gww','Goat Meat','50'),('nh4vpjy7bogk0gww','Jollof Rice','200'),('ni6qgk1c1jkcowwg','Beans','50'),('ni6qgk1c1jkcowwg','Pounded Yam','50'),('nzf670fsulck08s8','Eba','50'),('oak65mfljuow44wk','Beans','50'),('p0euo1rks0gc4gc4','Amala','50'),('p0euo1rks0gc4gc4','Beans','50'),('p0euo1rks0gc4gc4','Eba','50'),('p0euo1rks0gc4gc4','Egg','60'),('p0euo1rks0gc4gc4','Plantain','50'),('p0euo1rks0gc4gc4','Pomo','100'),('q7ozd50vhqo80ocw','Eba','50'),('qcr9acwnclwsskko','Beans','50'),('qcr9acwnclwsskko','Egg','60'),('qopruo5zqysg80s0','Amala','50'),('qopruo5zqysg80s0','Egg','60'),('qwgyb5e09nkkg4wg','Amala','50'),('qxl3e7pwjv48ggc0','Beans','100');
/*!40000 ALTER TABLE `ticket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `today_sales`
--

DROP TABLE IF EXISTS `today_sales`;
/*!50001 DROP VIEW IF EXISTS `today_sales`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `today_sales` AS SELECT 
 1 AS `Staff`,
 1 AS `Product`,
 1 AS `Amount`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `total_sales`
--

DROP TABLE IF EXISTS `total_sales`;
/*!50001 DROP VIEW IF EXISTS `total_sales`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `total_sales` AS SELECT 
 1 AS `Product`,
 1 AS `Total_sold`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `traditional_food`
--

DROP TABLE IF EXISTS `traditional_food`;
/*!50001 DROP VIEW IF EXISTS `traditional_food`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `traditional_food` AS SELECT 
 1 AS `Food`,
 1 AS `Category`,
 1 AS `Price`,
 1 AS `Image`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `valid_orders`
--

DROP TABLE IF EXISTS `valid_orders`;
/*!50001 DROP VIEW IF EXISTS `valid_orders`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `valid_orders` AS SELECT 
 1 AS `id`,
 1 AS `item`,
 1 AS `price`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `workrate`
--

DROP TABLE IF EXISTS `workrate`;
/*!50001 DROP VIEW IF EXISTS `workrate`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `workrate` AS SELECT 
 1 AS `Employee_ID`,
 1 AS `Employee_Name`,
 1 AS `Customers_Attendted`,
 1 AS `Total_price`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `assorted`
--

/*!50001 DROP VIEW IF EXISTS `assorted`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `assorted` AS select `products`.`Product` AS `Food`,`products`.`Category` AS `Category`,`products`.`Price_Per_Portion` AS `Price`,`products`.`Image` AS `Image` from `products` where (`products`.`Category` = 'Assorted') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `continental_food`
--

/*!50001 DROP VIEW IF EXISTS `continental_food`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `continental_food` AS select `products`.`Product` AS `Food`,`products`.`Category` AS `Category`,`products`.`Price_Per_Portion` AS `Price`,`products`.`Image` AS `Image` from `products` where (`products`.`Category` = 'Continental') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `drinks`
--

/*!50001 DROP VIEW IF EXISTS `drinks`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `drinks` AS select `products`.`Product` AS `Product`,`products`.`Category` AS `Category`,`products`.`Price_Per_Portion` AS `Price`,`products`.`Image` AS `Image` from `products` where (`products`.`Category` = 'Drink') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `order_lookup`
--

/*!50001 DROP VIEW IF EXISTS `order_lookup`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `order_lookup` AS select `co`.`Customer_Number` AS `Order_id`,`tk`.`Product` AS `Product`,`co`.`price` AS `Price`,`co`.`staff_id` AS `Attended_by`,`co`.`date_of_payment` AS `Date_attended` from (`completed_order` `co` left join `ticket` `tk` on(((`tk`.`Order_ID` = `co`.`Customer_Number`) and (`tk`.`Total_Price` = `co`.`price`)))) group by `tk`.`Product`,`tk`.`Order_ID` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sales_record`
--

/*!50001 DROP VIEW IF EXISTS `sales_record`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sales_record` AS select `ticket`.`Product` AS `Product`,`ticket`.`Total_Price` AS `Amount`,`completed_order`.`date_of_payment` AS `Date` from (`ticket` join `completed_order`) where (`completed_order`.`Customer_Number` = `ticket`.`Order_ID`) group by `ticket`.`Product`,`completed_order`.`date_of_payment` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sold_food_view`
--

/*!50001 DROP VIEW IF EXISTS `sold_food_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sold_food_view` AS select `co`.`Customer_Number` AS `order_id`,`tk`.`Product` AS `Product`,`co`.`price` AS `Price`,`co`.`date_of_payment` AS `payment_Date` from (`completed_order` `co` join `ticket` `tk`) where ((`co`.`Customer_Number` = `tk`.`Order_ID`) and (`co`.`price` = `tk`.`Total_Price`)) group by `tk`.`Product`,`co`.`date_of_payment` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `today_sales`
--

/*!50001 DROP VIEW IF EXISTS `today_sales`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `today_sales` AS select `completed_order`.`staff_id` AS `Staff`,`ticket`.`Product` AS `Product`,`ticket`.`Total_Price` AS `Amount` from (`completed_order` join `ticket`) where ((`completed_order`.`Customer_Number` = `ticket`.`Order_ID`) and (`completed_order`.`date_of_payment` = cast(now() as date))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `total_sales`
--

/*!50001 DROP VIEW IF EXISTS `total_sales`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `total_sales` AS select distinct `sales_record`.`Product` AS `Product`,sum(`sales_record`.`Amount`) AS `Total_sold` from `sales_record` where (`sales_record`.`Date` <= cast(now() as date)) group by `sales_record`.`Product` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `traditional_food`
--

/*!50001 DROP VIEW IF EXISTS `traditional_food`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `traditional_food` AS select `products`.`Product` AS `Food`,`products`.`Category` AS `Category`,`products`.`Price_Per_Portion` AS `Price`,`products`.`Image` AS `Image` from `products` where (`products`.`Category` = 'Traditional') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `valid_orders`
--

/*!50001 DROP VIEW IF EXISTS `valid_orders`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `valid_orders` AS select `od`.`Order_ID` AS `id`,`tk`.`Product` AS `item`,`tk`.`Total_Price` AS `price` from (`order_details` `od` join `ticket` `tk`) where ((`od`.`Order_ID` = `tk`.`Order_ID`) and (`od`.`Valid_To_Date` >= cast(now() as date)) and (not(exists(select 1 from `sold_food_view` `sfv` where ((`sfv`.`order_id` = `od`.`Order_ID`) and (`sfv`.`Product` = `tk`.`Product`)))))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `workrate`
--

/*!50001 DROP VIEW IF EXISTS `workrate`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `workrate` AS select distinct `a`.`staff_id` AS `Employee_ID`,`b`.`Employee_Name` AS `Employee_Name`,count(distinct `a`.`Customer_Number`) AS `Customers_Attendted`,sum(`a`.`price`) AS `Total_price` from (`completed_order` `a` join `employee` `b`) where (`a`.`staff_id` = `b`.`Employee_ID`) group by `a`.`staff_id` */;
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

-- Dump completed on 2018-05-24 16:45:20
