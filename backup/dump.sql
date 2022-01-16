-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: 127.0.0.1	Database: healthcare
-- ------------------------------------------------------
-- Server version 	5.7.33
-- Date: Sun, 16 Jan 2022 18:30:10 +0800

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
-- Table structure for table `acl_model_has_permissions`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acl_model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `acl_model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `acl_permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acl_model_has_permissions`
--

LOCK TABLES `acl_model_has_permissions` WRITE;
/*!40000 ALTER TABLE `acl_model_has_permissions` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `acl_model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `acl_model_has_permissions` with 0 row(s)
--

--
-- Table structure for table `acl_model_has_roles`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acl_model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `acl_model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `acl_roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acl_model_has_roles`
--

LOCK TABLES `acl_model_has_roles` WRITE;
/*!40000 ALTER TABLE `acl_model_has_roles` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `acl_model_has_roles` VALUES (1,'App\\Models\\User',1),(2,'App\\Models\\User',2),(3,'App\\Models\\User',3),(3,'App\\Models\\User',5);
/*!40000 ALTER TABLE `acl_model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `acl_model_has_roles` with 4 row(s)
--

--
-- Table structure for table `acl_permissions`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acl_permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `acl_permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acl_permissions`
--

LOCK TABLES `acl_permissions` WRITE;
/*!40000 ALTER TABLE `acl_permissions` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `acl_permissions` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `acl_permissions` with 0 row(s)
--

--
-- Table structure for table `acl_role_has_permissions`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acl_role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `acl_role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `acl_role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `acl_permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `acl_role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `acl_roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acl_role_has_permissions`
--

LOCK TABLES `acl_role_has_permissions` WRITE;
/*!40000 ALTER TABLE `acl_role_has_permissions` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `acl_role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `acl_role_has_permissions` with 0 row(s)
--

--
-- Table structure for table `acl_roles`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acl_roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `acl_roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acl_roles`
--

LOCK TABLES `acl_roles` WRITE;
/*!40000 ALTER TABLE `acl_roles` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `acl_roles` VALUES (1,'admin','web','2021-12-30 07:40:28','2021-12-30 07:40:28'),(2,'worker','web','2021-12-30 07:40:28','2021-12-30 07:40:28'),(3,'medic','web','2021-12-30 07:40:28','2021-12-30 07:40:28');
/*!40000 ALTER TABLE `acl_roles` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `acl_roles` with 3 row(s)
--

--
-- Table structure for table `appointments`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appointments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `medic_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medic_id` bigint(20) unsigned DEFAULT NULL,
  `schedule` timestamp NOT NULL,
  `citizen_id` int(11) NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `appointments_medic_type_medic_id_index` (`medic_type`,`medic_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointments`
--

LOCK TABLES `appointments` WRITE;
/*!40000 ALTER TABLE `appointments` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `appointments` VALUES (1,'nutritional',3,'2021-12-30 07:59:00',1,'Sample only','2021-12-30 08:00:04','2022-01-14 11:49:05'),(2,'child',NULL,'2022-01-02 09:15:00',9,NULL,'2022-01-02 09:15:35','2022-01-02 09:15:35'),(3,'nutritional',1,'2022-01-02 09:15:00',9,'NORMAL','2022-01-02 09:15:49','2022-01-02 09:16:37'),(4,'nutritional',2,'2022-01-03 05:30:00',9,'sdfasdf','2022-01-03 05:30:42','2022-01-03 05:40:56'),(5,'nutritional',4,'2022-01-16 10:17:00',9,'aasfasedf','2022-01-16 10:17:25','2022-01-16 10:17:38');
/*!40000 ALTER TABLE `appointments` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `appointments` with 5 row(s)
--

--
-- Table structure for table `citizens`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `citizens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `household_id` bigint(20) unsigned DEFAULT NULL,
  `name` json NOT NULL,
  `birthdate` date NOT NULL,
  `philhealth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` enum('MALE','FEMALE') COLLATE utf8mb4_unicode_ci NOT NULL,
  `4ps` tinyint(1) NOT NULL DEFAULT '0',
  `ips` tinyint(1) NOT NULL DEFAULT '0',
  `props` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `citizens_household_id_foreign` (`household_id`),
  CONSTRAINT `citizens_household_id_foreign` FOREIGN KEY (`household_id`) REFERENCES `households` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citizens`
--

LOCK TABLES `citizens` WRITE;
/*!40000 ALTER TABLE `citizens` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `citizens` VALUES (1,8,'{\"last\": \"LUETTGEN\", \"first\": \"ANDREW\", \"middle\": \"CRONA\", \"suffix\": \"II\"}','1970-01-08','55379700','MALE',0,1,'{\"needVaccine\": false, \"needVitamins\": false, \"nutritionStatus\": \"normal\"}','2021-12-30 07:59:24','2022-01-14 11:49:05'),(3,8,'{\"last\": \"KUNZE\", \"first\": \"ANABEL\", \"middle\": \"HAHN\", \"suffix\": \"IV\"}','1984-12-15','16350692','MALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(4,2,'{\"last\": \"GISLASON\", \"first\": \"GREGORY\", \"middle\": \"HUEL\", \"suffix\": null}','1998-01-25','87626138','MALE',0,1,'{\"needVaccine\": true, \"needVitamins\": true, \"nutritionStatus\": \"overweight\"}','2021-12-30 07:59:24','2021-12-30 07:59:24'),(6,3,'{\"last\": \"CASSIN\", \"first\": \"GUSSIE\", \"middle\": \"SKILES\", \"suffix\": \"IV\"}','2004-04-08','98575276','MALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(9,7,'{\"last\": \"WALKER\", \"first\": \"WILSON\", \"middle\": \"LUBOWITZ\", \"suffix\": null}','2019-06-27','44787442','MALE',0,0,'{\"needVaccine\": true, \"needVitamins\": false, \"nutritionStatus\": \"normal\"}','2021-12-30 07:59:24','2022-01-16 10:17:38'),(10,2,'{\"last\": \"BATZ\", \"first\": \"JUDSON\", \"middle\": \"ZULAUF\", \"suffix\": null}','2019-08-08','71182345','MALE',0,1,'{\"needVaccine\": true, \"needVitamins\": true, \"nutritionStatus\": \"overweight\"}','2021-12-30 07:59:24','2021-12-30 07:59:24'),(11,10,'{\"last\": \"PREDOVIC\", \"first\": \"VERLIE\", \"middle\": \"STREICH\", \"suffix\": \"III\"}','1996-05-25','73294645','MALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(12,2,'{\"last\": \"BERGE\", \"first\": \"MICHELLE\", \"middle\": \"QUITZON\", \"suffix\": \"IV\"}','2009-11-01','51692939','MALE',0,1,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(13,2,'{\"last\": \"KOVACEK\", \"first\": \"EMMIE\", \"middle\": \"PACOCHA\", \"suffix\": \"IV\"}','1979-11-12','16081181','FEMALE',1,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(14,2,'{\"last\": \"GRADY\", \"first\": \"DELPHIA\", \"middle\": \"SCHAEFER\", \"suffix\": null}','2021-03-25','58881203','MALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(15,2,'{\"last\": \"HOEGER\", \"first\": \"MELYSSA\", \"middle\": \"MILLER\", \"suffix\": null}','2015-10-04','77586914','FEMALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(16,7,'{\"last\": \"RITCHIE\", \"first\": \"GAYLE\", \"middle\": \"HETTINGER\", \"suffix\": null}','2008-10-15','22088796','FEMALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(18,2,'{\"last\": \"HETTINGER\", \"first\": \"PEARLIE\", \"middle\": \"DARE\", \"suffix\": null}','1978-01-09','13000440','MALE',0,1,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(19,6,'{\"last\": \"HUDSON\", \"first\": \"NED\", \"middle\": \"LUBOWITZ\", \"suffix\": null}','2011-01-01','10310477','FEMALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(20,8,'{\"last\": \"NOLAN\", \"first\": \"STEVE\", \"middle\": \"BALISTRERI\", \"suffix\": \"SR\"}','1997-04-15','71752','FEMALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(22,6,'{\"last\": \"HACKETT\", \"first\": \"DAREN\", \"middle\": \"MILLS\", \"suffix\": \"IV\"}','2009-06-08','34214107','MALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(23,2,'{\"last\": \"WYMAN\", \"first\": \"TATUM\", \"middle\": \"DICKI\", \"suffix\": \"IV\"}','2021-10-14','19977013','MALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(24,5,'{\"last\": \"BARROWS\", \"first\": \"AHMED\", \"middle\": \"HOPPE\", \"suffix\": \"IV\"}','1995-02-10','6695515','MALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(26,8,'{\"last\": \"KOCH\", \"first\": \"HARMONY\", \"middle\": \"LEMKE\", \"suffix\": \"III\"}','1978-12-18','98021825','FEMALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(28,8,'{\"last\": \"GRIMES\", \"first\": \"JALON\", \"middle\": \"LARSON\", \"suffix\": \"JR\"}','2002-01-20','77268037','FEMALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(31,6,'{\"last\": \"CUMMINGS\", \"first\": \"MANLEY\", \"middle\": \"STAMM\", \"suffix\": \"III\"}','2002-10-13','43471632','MALE',0,1,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(32,8,'{\"last\": \"CRONA\", \"first\": \"CARLOS\", \"middle\": \"HUDSON\", \"suffix\": null}','2020-12-02','65042479','FEMALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(33,7,'{\"last\": \"HANE\", \"first\": \"DUDLEY\", \"middle\": \"WILLIAMSON\", \"suffix\": \"III\"}','2016-03-10','96111315','MALE',1,1,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(35,8,'{\"last\": \"TURCOTTE\", \"first\": \"GRADY\", \"middle\": \"HOEGER\", \"suffix\": null}','2008-05-24','24068824','FEMALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(36,7,'{\"last\": \"SENGER\", \"first\": \"KYLIE\", \"middle\": \"KLOCKO\", \"suffix\": \"JR\"}','2015-11-20','22420088','FEMALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(38,8,'{\"last\": \"RATKE\", \"first\": \"WILHELM\", \"middle\": \"NIENOW\", \"suffix\": \"II\"}','1978-10-26','22446342','FEMALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(39,6,'{\"last\": \"BALISTRERI\", \"first\": \"HERMINA\", \"middle\": \"YUNDT\", \"suffix\": null}','2014-04-10','39695834','MALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(41,10,'{\"last\": \"HEATHCOTE\", \"first\": \"GASTON\", \"middle\": \"LUETTGEN\", \"suffix\": \"III\"}','1986-08-16','82241807','MALE',1,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(42,2,'{\"last\": \"DIBBERT\", \"first\": \"CLAY\", \"middle\": \"THOMPSON\", \"suffix\": \"IV\"}','1985-10-05','97477900','FEMALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(44,8,'{\"last\": \"SCHIMMEL\", \"first\": \"KIERAN\", \"middle\": \"CHAMPLIN\", \"suffix\": null}','1992-08-17','93413056','FEMALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(45,7,'{\"last\": \"BLOCK\", \"first\": \"GODFREY\", \"middle\": \"GRIMES\", \"suffix\": \"SR\"}','1975-12-12','44378270','MALE',1,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(47,3,'{\"last\": \"BOYER\", \"first\": \"PEYTON\", \"middle\": \"HAND\", \"suffix\": \"IV\"}','2009-03-20','789179','MALE',1,1,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(49,2,'{\"last\": \"STREICH\", \"first\": \"EDMUND\", \"middle\": \"OSINSKI\", \"suffix\": null}','2020-08-17','74641441','FEMALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(50,2,'{\"last\": \"TORP\", \"first\": \"LAURY\", \"middle\": \"SCHMIDT\", \"suffix\": null}','2013-04-28','85610416','MALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(51,7,'{\"last\": \"SANFORD\", \"first\": \"RASHEED\", \"middle\": \"LEGROS\", \"suffix\": \"IV\"}','1986-10-25','38597622','MALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(52,6,'{\"last\": \"ANDERSON\", \"first\": \"CONSTANCE\", \"middle\": \"GRADY\", \"suffix\": \"II\"}','2020-04-05','83262002','MALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(53,8,'{\"last\": \"SPENCER\", \"first\": \"SARINA\", \"middle\": \"SMITHAM\", \"suffix\": null}','1992-11-04','20807494','FEMALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(54,10,'{\"last\": \"BEIER\", \"first\": \"LLOYD\", \"middle\": \"REYNOLDS\", \"suffix\": \"III\"}','2017-11-19','10823460','FEMALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(55,7,'{\"last\": \"BREKKE\", \"first\": \"ELI\", \"middle\": \"BAUMBACH\", \"suffix\": null}','1981-04-23','15538800','FEMALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(56,8,'{\"last\": \"CORWIN\", \"first\": \"TYRA\", \"middle\": \"EICHMANN\", \"suffix\": null}','1975-07-04','6104942','MALE',0,1,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(58,6,'{\"last\": \"JENKINS\", \"first\": \"BONITA\", \"middle\": \"KOEPP\", \"suffix\": \"SR\"}','2014-01-13','62422809','MALE',1,1,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(59,10,'{\"last\": \"LITTLE\", \"first\": \"NATALIA\", \"middle\": \"DAVIS\", \"suffix\": \"III\"}','1978-05-19','35161146','FEMALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(61,2,'{\"last\": \"OKUNEVA\", \"first\": \"BETH\", \"middle\": \"GAYLORD\", \"suffix\": \"JR\"}','1989-07-10','41408438','FEMALE',1,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(62,2,'{\"last\": \"STEHR\", \"first\": \"TRENTON\", \"middle\": \"BUCKRIDGE\", \"suffix\": \"SR\"}','1975-11-02','18479297','FEMALE',1,1,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(63,7,'{\"last\": \"BECHTELAR\", \"first\": \"MARTINE\", \"middle\": \"BOYLE\", \"suffix\": \"JR\"}','1976-02-19','98135598','MALE',1,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(64,7,'{\"last\": \"KUTCH\", \"first\": \"ABIGAIL\", \"middle\": \"D\'AMORE\", \"suffix\": \"II\"}','2003-03-03','85325592','MALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(72,6,'{\"last\": \"REICHERT\", \"first\": \"WILFORD\", \"middle\": \"BAYER\", \"suffix\": \"III\"}','1996-03-24','75813671','FEMALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(73,2,'{\"last\": \"WYMAN\", \"first\": \"GEOVANY\", \"middle\": \"SCHROEDER\", \"suffix\": \"II\"}','1995-05-27','99244983','FEMALE',0,1,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(76,6,'{\"last\": \"CONROY\", \"first\": \"MERL\", \"middle\": \"DOUGLAS\", \"suffix\": \"IV\"}','1970-07-26','69760172','MALE',1,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(77,5,'{\"last\": \"PROSACCO\", \"first\": \"MARCO\", \"middle\": \"STAMM\", \"suffix\": \"SR\"}','1989-11-07','78542481','FEMALE',0,1,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(78,2,'{\"last\": \"GREEN\", \"first\": \"NATALIA\", \"middle\": \"CORWIN\", \"suffix\": \"II\"}','1975-04-20','15597304','FEMALE',1,1,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(81,6,'{\"last\": \"DANIEL\", \"first\": \"THERESE\", \"middle\": \"STARK\", \"suffix\": null}','1986-07-04','91134921','MALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(82,7,'{\"last\": \"HUEL\", \"first\": \"CYRIL\", \"middle\": \"HAGENES\", \"suffix\": \"IV\"}','1987-07-04','54673818','FEMALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(83,8,'{\"last\": \"GLEASON\", \"first\": \"MYRNA\", \"middle\": \"GLEICHNER\", \"suffix\": \"II\"}','1975-06-04','49457067','MALE',1,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(84,2,'{\"last\": \"HERZOG\", \"first\": \"FLETCHER\", \"middle\": \"DUBUQUE\", \"suffix\": null}','1972-05-18','6865730','MALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(86,10,'{\"last\": \"REILLY\", \"first\": \"MAGDALEN\", \"middle\": \"POLLICH\", \"suffix\": \"JR\"}','2018-11-08','71408938','MALE',1,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(87,2,'{\"last\": \"GREENHOLT\", \"first\": \"BAILEE\", \"middle\": \"YUNDT\", \"suffix\": null}','2020-09-04','2338379','FEMALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(88,5,'{\"last\": \"LEHNER\", \"first\": \"BRANDON\", \"middle\": \"COLE\", \"suffix\": \"II\"}','1970-03-16','71665140','FEMALE',0,1,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(89,8,'{\"last\": \"COLLINS\", \"first\": \"JAQUAN\", \"middle\": \"JACOBS\", \"suffix\": null}','2004-07-31','73713203','MALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(90,7,'{\"last\": \"KREIGER\", \"first\": \"JULIE\", \"middle\": \"NIKOLAUS\", \"suffix\": null}','2008-04-15','39735511','FEMALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(91,6,'{\"last\": \"HETTINGER\", \"first\": \"KEN\", \"middle\": \"SANFORD\", \"suffix\": null}','2017-11-23','21292786','MALE',1,1,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(93,2,'{\"last\": \"SCHULTZ\", \"first\": \"JAYCEE\", \"middle\": \"FAHEY\", \"suffix\": null}','1994-08-25','79909281','MALE',0,1,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(94,3,'{\"last\": \"MORAR\", \"first\": \"CAROLANNE\", \"middle\": \"FAHEY\", \"suffix\": null}','1989-12-17','32953244','MALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(95,8,'{\"last\": \"JONES\", \"first\": \"TOMMIE\", \"middle\": \"SCHOEN\", \"suffix\": null}','1983-12-25','49374518','FEMALE',1,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(96,7,'{\"last\": \"KONOPELSKI\", \"first\": \"DAKOTA\", \"middle\": \"POUROS\", \"suffix\": null}','1974-12-02','99117542','FEMALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(97,8,'{\"last\": \"SKILES\", \"first\": \"BOBBY\", \"middle\": \"ULLRICH\", \"suffix\": \"III\"}','1971-12-16','32343782','MALE',0,0,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(98,2,'{\"last\": \"MURAZIK\", \"first\": \"CHRISTOPHE\", \"middle\": \"REILLY\", \"suffix\": \"III\"}','1983-05-28','450542','MALE',0,1,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24'),(100,6,'{\"last\": \"HETTINGER\", \"first\": \"ELMER\", \"middle\": \"SCHULTZ\", \"suffix\": \"II\"}','1988-05-04','81535419','FEMALE',0,1,NULL,'2021-12-30 07:59:24','2021-12-30 07:59:24');
/*!40000 ALTER TABLE `citizens` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `citizens` with 68 row(s)
--

--
-- Table structure for table `failed_jobs`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `failed_jobs` with 0 row(s)
--

--
-- Table structure for table `households`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `households` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `purok_id` bigint(20) unsigned DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coordinates` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `households_purok_id_foreign` (`purok_id`),
  CONSTRAINT `households_purok_id_foreign` FOREIGN KEY (`purok_id`) REFERENCES `puroks` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `households`
--

LOCK TABLES `households` WRITE;
/*!40000 ALTER TABLE `households` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `households` VALUES (2,4,'hh-131','104.392444, 65.750172','2021-12-30 07:40:28','2021-12-30 07:40:28'),(3,4,'hh-013','-98.442436, 20.952136','2021-12-30 07:40:28','2021-12-30 07:40:28'),(5,2,'hh-522','-73.315071, 6.35774','2021-12-30 07:40:28','2021-12-30 07:40:28'),(6,6,'hh-144','-66.408837, 32.827188','2021-12-30 07:40:28','2021-12-30 07:40:28'),(7,3,'hh-536','63.448382, -6.193055','2021-12-30 07:40:28','2021-12-30 07:40:28'),(8,6,'hh-091','28.858581, 80.516055','2021-12-30 07:40:28','2021-12-30 07:40:28'),(10,6,'hh-729','40.539424, 9.62316','2021-12-30 07:40:28','2021-12-30 07:40:28');
/*!40000 ALTER TABLE `households` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `households` with 7 row(s)
--

--
-- Table structure for table `maternals`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maternals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `weight` double DEFAULT NULL,
  `height` double DEFAULT NULL,
  `blood_preasure` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tummy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `baby` int(11) DEFAULT NULL,
  `props` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maternals`
--

LOCK TABLES `maternals` WRITE;
/*!40000 ALTER TABLE `maternals` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `maternals` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `maternals` with 0 row(s)
--

--
-- Table structure for table `migrations`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `migrations` VALUES (1,'2019_08_19_000000_create_failed_jobs_table',1),(2,'2019_12_14_000001_create_personal_access_tokens_table',1),(3,'2021_12_13_015336_create_puroks_table',1),(4,'2021_12_13_042330_create_households_table',1),(5,'2021_12_14_122532_create_citizens_table',1),(6,'2021_12_16_000000_create_users_table',1),(7,'2021_12_19_030418_create_appointments_table',1),(8,'2021_12_25_094945_create_maternals_table',1),(9,'2021_12_25_095019_create_nutritionals_table',1),(10,'2021_12_30_072926_create_permission_tables',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `migrations` with 10 row(s)
--

--
-- Table structure for table `nutritionals`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nutritionals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wfa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hfa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wfh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nutritionals`
--

LOCK TABLES `nutritionals` WRITE;
/*!40000 ALTER TABLE `nutritionals` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `nutritionals` VALUES (1,'10','10','10','10','10','2022-01-02 09:16:37','2022-01-02 09:16:37'),(2,'10','10','10','10','10','2022-01-03 05:40:56','2022-01-03 05:40:56'),(3,'10','10','10','10','10','2022-01-14 11:49:05','2022-01-14 11:49:05'),(4,'12','23904','204','243','2354','2022-01-16 10:17:38','2022-01-16 10:17:38');
/*!40000 ALTER TABLE `nutritionals` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `nutritionals` with 4 row(s)
--

--
-- Table structure for table `personal_access_tokens`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `personal_access_tokens` with 0 row(s)
--

--
-- Table structure for table `puroks`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `puroks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `puroks`
--

LOCK TABLES `puroks` WRITE;
/*!40000 ALTER TABLE `puroks` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `puroks` VALUES (2,'Purok 2','2021-12-30 07:40:28','2021-12-30 07:40:28'),(3,'Purok 3','2021-12-30 07:40:28','2021-12-30 07:40:28'),(4,'Purok 4','2021-12-30 07:40:28','2021-12-30 07:40:28'),(6,'Purok 6','2021-12-30 07:40:28','2021-12-30 07:40:28');
/*!40000 ALTER TABLE `puroks` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `puroks` with 4 row(s)
--

--
-- Table structure for table `users`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` json NOT NULL,
  `birthdate` date NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `users` VALUES (1,'{\"last\": \"BOYLE\", \"first\": \"DESTINI\", \"middle\": \"BLOCK\", \"suffix\": \"JR\"}','2012-01-22','admin','$2y$10$UjM5d5r0TRBILpkFkLG9YObUjLvI6uzRVkdBgME/ViUWgeqgr41VG','vXz9NtI2AO','2021-12-30 07:40:28','2021-12-30 07:40:28'),(2,'{\"last\": \"KESSLER\", \"first\": \"MARYSE\", \"middle\": \"TOY\", \"suffix\": null}','1988-02-21','worker','$2y$10$g5kJZlDX/.2S6JlEUnSw4Ofnm31qbnO2eC91P1j/8DTh0jS8SYRNm','VBP5d2tIEN','2021-12-30 07:40:28','2021-12-30 07:40:28'),(3,'{\"last\": \"PFEFFER\", \"first\": \"ERIK\", \"middle\": \"WINTHEISER\", \"suffix\": null}','2015-03-24','medic','$2y$10$Cfz.MSRooHIJLn4LPT4Aq.etQb0Rbu3SeXwXy.9cjlodE61egr716','yfoLg9XDCu','2021-12-30 07:40:28','2021-12-30 07:40:28'),(4,'{\"last\": \"PARINAS\", \"first\": \"JIMWELL\", \"middle\": \"\", \"suffix\": \"\"}','1998-12-14','xijeixahn','$2y$10$U5FqCe8HNflr97XWPzb9uebLhqkMmBAQPXuZP9j3rkxkBK.aQqLJO',NULL,'2021-12-30 08:55:31','2021-12-30 08:55:31'),(5,'{\"last\": \"DALISAY\", \"first\": \"RICARDO\", \"middle\": \"DE LEON\", \"suffix\": \"\"}','2021-12-31','ricardo','$2y$10$HCcZkLBbMvh8OO8y1ZXpLOvr5o8.3FBd0QtwK5bUUVrMiCkZqzcti',NULL,'2021-12-30 08:57:29','2021-12-30 09:11:41');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `users` with 5 row(s)
--

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on: Sun, 16 Jan 2022 18:30:11 +0800
