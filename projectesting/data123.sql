/*
SQLyog Ultimate v12.5.0 (64 bit)
MySQL - 10.4.19-MariaDB : Database - central_db1
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`central_db1` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `central_db1`;

/*Table structure for table `com_beneficiary` */

DROP TABLE IF EXISTS `com_beneficiary`;

CREATE TABLE `com_beneficiary` (
  `beneficiary_id` int(11) NOT NULL AUTO_INCREMENT,
  `beneficiary_type_id` int(11) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `eligible_for_zakat` enum('Yes','No') DEFAULT NULL,
  `why_eligible_for_zakat` longtext DEFAULT NULL,
  `country_district_id` int(11) NOT NULL,
  `country_identification_number` varchar(100) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `complete_address` longtext DEFAULT NULL,
  `contact_number` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `district_location_id` int(11) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `status_comment` longtext DEFAULT NULL,
  `added_on` date DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`beneficiary_id`),
  KEY `comBeneficiaryType_comBeneficiary` (`beneficiary_type_id`),
  KEY `comCityOrVillage_comBeneficiary` (`district_location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `com_beneficiary` */

insert  into `com_beneficiary`(`beneficiary_id`,`beneficiary_type_id`,`first_name`,`middle_name`,`last_name`,`gender`,`eligible_for_zakat`,`why_eligible_for_zakat`,`country_district_id`,`country_identification_number`,`date_of_birth`,`complete_address`,`contact_number`,`email`,`district_location_id`,`photo`,`is_active`,`status_comment`,`added_on`,`added_by`) values 
(1,1,'Ali',NULL,'Memon','Male','Yes',NULL,1,'4330457288851','2022-01-18','HYD','03312693865',NULL,1,'',1,NULL,'2022-01-29',4),
(2,1,'Kahn','asd','Hello','Male','Yes',NULL,1,'4330457288851','1232-12-03','HYD','03312693865',NULL,1,'nick-de-partee-inODTTydIk4-unsplash.jpg',1,NULL,'2022-01-29',4),
(3,1,'asd',NULL,'sada','Male','Yes',NULL,1,'123213','2122-02-13','Jamshroor','123213',NULL,1,'1024.png',1,NULL,'2022-01-29',4);

/*Table structure for table `com_beneficiary_type` */

DROP TABLE IF EXISTS `com_beneficiary_type`;

CREATE TABLE `com_beneficiary_type` (
  `beneficiary_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `beneficiary_type` varchar(100) NOT NULL,
  PRIMARY KEY (`beneficiary_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `com_beneficiary_type` */

insert  into `com_beneficiary_type`(`beneficiary_type_id`,`beneficiary_type`) values 
(1,'Widow'),
(2,'Guardian'),
(3,'Orphan');

/*Table structure for table `com_country` */

DROP TABLE IF EXISTS `com_country`;

CREATE TABLE `com_country` (
  `cont_id` int(11) NOT NULL AUTO_INCREMENT,
  `cont_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cont_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `com_country` */

insert  into `com_country`(`cont_id`,`cont_name`) values 
(1,'Pakistan'),
(2,'India'),
(3,'Bangladesh'),
(4,'Sri Lanka'),
(5,'Indonesia'),
(6,'West Africa'),
(7,'USA'),
(8,'Canada'),
(9,'Tehran');

/*Table structure for table `com_country_district` */

DROP TABLE IF EXISTS `com_country_district`;

CREATE TABLE `com_country_district` (
  `country_district_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `district_full_name` varchar(100) DEFAULT NULL,
  `district_short_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`country_district_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `com_country_district` */

insert  into `com_country_district`(`country_district_id`,`country_id`,`district_full_name`,`district_short_name`) values 
(1,1,'Jamshoro-Hyderabad District Operations','JHDO'),
(2,1,'Shikarpur-Jacobabad District Operations','SJDO'),
(3,1,'Sukkur-Khairpur District Operations','SKDO'),
(4,1,'Rahimyar Khan District Operations','RDO'),
(5,1,'Abbottabad-Mansehra District Operations','AMDO'),
(6,1,'Lahore District Operations','LDO'),
(7,1,'Karachi-Thatta District Operations','KTDO'),
(8,1,'Qambar-Shahdadkot District Operations','QSDO'),
(9,4,'Kandy','KDO'),
(10,4,'Colombo','CDO'),
(11,2,'Nagpur','NDO');

/*Table structure for table `com_district_location` */

DROP TABLE IF EXISTS `com_district_location`;

CREATE TABLE `com_district_location` (
  `district_location_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_or_village` varchar(100) NOT NULL,
  `country_district_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`district_location_id`),
  KEY `comOperation_comCityOrVillage` (`country_district_id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

/*Data for the table `com_district_location` */

insert  into `com_district_location`(`district_location_id`,`city_or_village`,`country_district_id`,`is_active`) values 
(1,'Jamshoro',1,1),
(2,'Hyderabad',1,1),
(3,'Kotri',1,1),
(4,'New Sukkur',3,1),
(5,'Old Sukkur',3,1),
(6,'Sukkur City',3,1),
(7,'Rohri',3,1),
(8,'Pano Akil',3,1),
(9,'Khairpur',3,1),
(10,'Shikarpur',2,1),
(11,'Khanpur',2,1),
(12,'Lakhi Ghulam Shah',2,1),
(13,'Ghari Yasin',2,1),
(14,'Rahim Yar Khan',4,1),
(15,'Sadiq Abad + Jamal Din Wali',4,1),
(16,'Khan Pur + Zahir Peer',4,1),
(17,'Liaqat Pur + Taranda M. Panah',4,1),
(18,'Drib Muhallah Shahdadkot',8,1),
(19,'Qalandrani Muhallah Shahdadkot',8,1),
(20,'Police Line Shahdadkot',8,1),
(21,'Kaliy Makan Shahdadkot',8,1),
(22,'97 Katchipul',8,1),
(23,'Latifabad Katchipul',8,1),
(24,'Garibabad Katchipul',8,1),
(25,'Syed Muhallah Quboo Saeed Khan',8,1),
(26,'Khadim Muhallah Quboo Saeed Khan',8,1),
(27,'Other Villages - Qambar Shahdadkot ',8,1),
(28,'Abbottabad City, Kunj, Kehal, Malikpura, Policeline',5,1),
(29,'Narrian, Muree Road, Supply, Sheikul Bandi, Banda Jaat, Jhangi, Mandian',5,1),
(30,'Damtour, Harnoo (Khurd+Kalan), Bagnoter, Nathia Gali, Bagh',5,1),
(31,'Kakul Road Garga Colony, Nawaher, Kakul Village, Mirpur',5,1),
(32,'Qalanderabad, Mangal, Tarnawae, Islamkot, Sajikot, Morkalan, Zafar Market, Mian De Sari, Kalapul',5,1),
(33,'Banda Amlook, Shimla Hill, Soan Gali, Kothyala, Sherwan, Paswal, Pind Kargu Khan PKK',5,1),
(34,'Salhad Tehsil Havelian, SultanPur, Langra',5,1),
(35,'Rawlakot, Gali Banyan, Kalapani, Chatri, Kuthwal, Thandyani',5,1),
(51,'Kampte',11,1),
(52,'Peeli Nadi',11,1),
(53,'Sadar',11,1),
(54,'Kandy',9,1),
(55,'Mutur',9,1),
(56,'Kegall',9,1),
(57,'Mansehra',5,1),
(58,'Mansehra City: Data, Ghazikot, Township, Main City, Battdarian, Bi-Pass, Larri Adda',5,1),
(59,'Right Side of Silk Route: Balakot Road, Kotkey, Atter Sheesha, Rehrhan, Gandhian, Paghla',5,1),
(60,'Left Side of Silk Route: Pano, Timber Khola, Bairkund, Khuajgan,  Baffa, Shinkiary',5,1),
(61,'Behali to Punjab Chowk: Shalia, Lassan Thakral, Oghra, Chiriali, Baidrhan, Debgharan',5,1),
(62,'Tanwal Valley: Ghojra, Parhina,  Phulrha, Lassan Nawab, Ghali Badral',5,1),
(63,'Agror Tanawal Valley: Oghi, Shair Gharh, Darband',5,1),
(64,'Siran Valley & Both Sides of Silk Route: Dadar, Jabori, Achrian, Battal, Chattar Plan',5,1),
(65,'Balakot City & Kaghan, Naran: Beesian, Batrasi, Ghari Habibullah, Paras, Babusar Top',5,1);

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2014_10_12_200000_add_two_factor_columns_to_users_table',1),
(4,'2019_08_19_000000_create_failed_jobs_table',1),
(5,'2019_12_14_000001_create_personal_access_tokens_table',1),
(6,'2022_01_14_052635_create_sessions_table',1);

/*Table structure for table `nowe_family_member` */

DROP TABLE IF EXISTS `nowe_family_member`;

CREATE TABLE `nowe_family_member` (
  `family_member_id` int(11) NOT NULL AUTO_INCREMENT,
  `beneficiary_id` int(11) NOT NULL,
  `family_id` int(11) NOT NULL,
  `added_on` date NOT NULL,
  `added_by` int(11) NOT NULL,
  PRIMARY KEY (`family_member_id`),
  KEY `comBeneficiary_noweFamilyMember` (`beneficiary_id`),
  KEY `noweFamily_noweFamilyMember` (`family_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `nowe_family_member` */

/*Table structure for table `nowe_general_settings` */

DROP TABLE IF EXISTS `nowe_general_settings`;

CREATE TABLE `nowe_general_settings` (
  `general_settings_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `country_district_id` int(11) NOT NULL,
  `partial_support_amount` int(11) NOT NULL,
  `per_widow_amount` int(11) NOT NULL,
  `per_orphan_amount` int(11) NOT NULL,
  `total_family_orphans` int(11) NOT NULL,
  PRIMARY KEY (`general_settings_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `nowe_general_settings` */

insert  into `nowe_general_settings`(`general_settings_id`,`country_id`,`country_district_id`,`partial_support_amount`,`per_widow_amount`,`per_orphan_amount`,`total_family_orphans`) values 
(1,1,1,4500,5000,3000,4);

/*Table structure for table `nowe_user_role_assign` */

DROP TABLE IF EXISTS `nowe_user_role_assign`;

CREATE TABLE `nowe_user_role_assign` (
  `user_role_assign_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `partner_organization_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `country_district_id` int(11) DEFAULT NULL,
  `is_role_active` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`user_role_assign_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `nowe_user_role_assign` */

insert  into `nowe_user_role_assign`(`user_role_assign_id`,`user_id`,`user_type_id`,`partner_organization_id`,`country_id`,`country_district_id`,`is_role_active`) values 
(1,2,1,NULL,NULL,NULL,1),
(2,2,2,2,4,NULL,1),
(4,4,3,1,1,1,1),
(5,2,2,2,6,NULL,1),
(6,1,2,1,1,NULL,1),
(7,2,3,2,2,11,1),
(8,2,2,3,4,NULL,1),
(9,2,3,1,4,9,1),
(10,2,2,2,3,NULL,1);

/*Table structure for table `nowe_user_type` */

DROP TABLE IF EXISTS `nowe_user_type`;

CREATE TABLE `nowe_user_type` (
  `user_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(100) NOT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `nowe_user_type` */

insert  into `nowe_user_type`(`user_type_id`,`user_type`) values 
(1,'US Manager'),
(2,'Partner Manager'),
(3,'District Manager');

/*Table structure for table `nowe_users` */

DROP TABLE IF EXISTS `nowe_users`;

CREATE TABLE `nowe_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_picture` longtext DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `user_is_active` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `nowe_users` */

insert  into `nowe_users`(`user_id`,`user_full_name`,`email`,`user_picture`,`password`,`user_is_active`) values 
(1,'Hammadullah Baloch','hbaloch@hidayatrust.org',NULL,'$2y$10$4lMt1RF9eS1SAmYAUHxAcO9wRI/cQ.BVeTidJnELjFOxVi6oHZ88W',1),
(2,'Mohammad Shafik Shamsuddin','shafik@hidaya.org',NULL,'$2y$10$4lMt1RF9eS1SAmYAUHxAcO9wRI/cQ.BVeTidJnELjFOxVi6oHZ88W',1),
(3,'John Ramey','john@gmail.com',NULL,'$2y$10$4lMt1RF9eS1SAmYAUHxAcO9wRI/cQ.BVeTidJnELjFOxVi6oHZ88W',1),
(4,'Asif Ali Mahar','aamahar@hidayatrust.org',NULL,'$2y$10$4lMt1RF9eS1SAmYAUHxAcO9wRI/cQ.BVeTidJnELjFOxVi6oHZ88W',1);

/*Table structure for table `partner_organization` */

DROP TABLE IF EXISTS `partner_organization`;

CREATE TABLE `partner_organization` (
  `partner_organization_id` int(11) NOT NULL AUTO_INCREMENT,
  `partner_organization_name` varchar(100) NOT NULL,
  PRIMARY KEY (`partner_organization_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `partner_organization` */

insert  into `partner_organization`(`partner_organization_id`,`partner_organization_name`) values 
(1,'Hidaya Trust'),
(2,'ABC Trust'),
(3,'DEF Trust');

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `sessions` */

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sessions` */

insert  into `sessions`(`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) values 
('D0H7FulQxeIT0rkUu6tgBWIoNGRKSWXcKUmXaApK',2,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:97.0) Gecko/20100101 Firefox/97.0','YTo3OntzOjY6Il90b2tlbiI7czo0MDoiTWtrbXRwUDJjTFhPOU5OY0RLMDlsTHVBcUlCc1ZmNTdNQzZMMzRmaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czo5OiJ1c2VyX2RhdGEiO086MjA6IkFwcFxNb2RlbHNcTm93ZV91c2VyIjozMTp7czo4OiIAKgB0YWJsZSI7czoxMDoibm93ZV91c2VycyI7czoxMzoiACoAcHJpbWFyeUtleSI7czo3OiJ1c2VyX2lkIjtzOjExOiIAKgBmaWxsYWJsZSI7YTo1OntpOjA7czoxNDoidXNlcl9mdWxsX25hbWUiO2k6MTtzOjU6ImVtYWlsIjtpOjI7czoxMjoidXNlcl9waWN0dXJlIjtpOjM7czo4OiJwYXNzd29yZCI7aTo0O3M6MTQ6InVzZXJfaXNfYWN0aXZlIjt9czoxMzoiACoAY29ubmVjdGlvbiI7czo1OiJteXNxbCI7czoxMDoiACoAa2V5VHlwZSI7czozOiJpbnQiO3M6MTI6ImluY3JlbWVudGluZyI7YjoxO3M6NzoiACoAd2l0aCI7YTowOnt9czoxMjoiACoAd2l0aENvdW50IjthOjA6e31zOjE5OiJwcmV2ZW50c0xhenlMb2FkaW5nIjtiOjA7czoxMDoiACoAcGVyUGFnZSI7aToxNTtzOjY6ImV4aXN0cyI7YjoxO3M6MTg6Indhc1JlY2VudGx5Q3JlYXRlZCI7YjowO3M6Mjg6IgAqAGVzY2FwZVdoZW5DYXN0aW5nVG9TdHJpbmciO2I6MDtzOjEzOiIAKgBhdHRyaWJ1dGVzIjthOjY6e3M6NzoidXNlcl9pZCI7aToyO3M6MTQ6InVzZXJfZnVsbF9uYW1lIjtzOjI2OiJNb2hhbW1hZCBTaGFmaWsgU2hhbXN1ZGRpbiI7czo1OiJlbWFpbCI7czoxNzoic2hhZmlrQGhpZGF5YS5vcmciO3M6MTI6InVzZXJfcGljdHVyZSI7TjtzOjg6InBhc3N3b3JkIjtzOjYwOiIkMnkkMTAkNGxNdDFSRjllUzFTQW1ZQVVIeEFjTzl3UkkvY1EuQlZlVGlkSm5FTGpGT3hWaTZvSFo4OFciO3M6MTQ6InVzZXJfaXNfYWN0aXZlIjtpOjE7fXM6MTE6IgAqAG9yaWdpbmFsIjthOjY6e3M6NzoidXNlcl9pZCI7aToyO3M6MTQ6InVzZXJfZnVsbF9uYW1lIjtzOjI2OiJNb2hhbW1hZCBTaGFmaWsgU2hhbXN1ZGRpbiI7czo1OiJlbWFpbCI7czoxNzoic2hhZmlrQGhpZGF5YS5vcmciO3M6MTI6InVzZXJfcGljdHVyZSI7TjtzOjg6InBhc3N3b3JkIjtzOjYwOiIkMnkkMTAkNGxNdDFSRjllUzFTQW1ZQVVIeEFjTzl3UkkvY1EuQlZlVGlkSm5FTGpGT3hWaTZvSFo4OFciO3M6MTQ6InVzZXJfaXNfYWN0aXZlIjtpOjE7fXM6MTA6IgAqAGNoYW5nZXMiO2E6MDp7fXM6ODoiACoAY2FzdHMiO2E6MDp7fXM6MTc6IgAqAGNsYXNzQ2FzdENhY2hlIjthOjA6e31zOjIxOiIAKgBhdHRyaWJ1dGVDYXN0Q2FjaGUiO2E6MDp7fXM6ODoiACoAZGF0ZXMiO2E6MDp7fXM6MTM6IgAqAGRhdGVGb3JtYXQiO047czoxMDoiACoAYXBwZW5kcyI7YTowOnt9czoxOToiACoAZGlzcGF0Y2hlc0V2ZW50cyI7YTowOnt9czoxNDoiACoAb2JzZXJ2YWJsZXMiO2E6MDp7fXM6MTI6IgAqAHJlbGF0aW9ucyI7YTowOnt9czoxMDoiACoAdG91Y2hlcyI7YTowOnt9czoxMDoidGltZXN0YW1wcyI7YjoxO3M6OToiACoAaGlkZGVuIjthOjA6e31zOjEwOiIAKgB2aXNpYmxlIjthOjA6e31zOjEwOiIAKgBndWFyZGVkIjthOjE6e2k6MDtzOjE6IioiO31zOjIwOiIAKgByZW1lbWJlclRva2VuTmFtZSI7czoxNDoicmVtZW1iZXJfdG9rZW4iO31zOjk6InVzZXJfcm9sZSI7YTo4OntzOjE5OiJ1c2VyX3JvbGVfYXNzaWduX2lkIjtpOjE7czo3OiJ1c2VyX2lkIjtpOjI7czoxMjoidXNlcl90eXBlX2lkIjtpOjE7czoyMzoicGFydG5lcl9vcmdhbml6YXRpb25faWQiO047czoxMDoiY291bnRyeV9pZCI7TjtzOjE5OiJjb3VudHJ5X2Rpc3RyaWN0X2lkIjtOO3M6MTQ6ImlzX3JvbGVfYWN0aXZlIjtpOjE7czo5OiJ1c2VyX3R5cGUiO3M6MTA6IlVTIE1hbmFnZXIiO31zOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJDRsTXQxUkY5ZVMxU0FtWUFVSHhBY085d1JJL2NRLkJWZVRpZEpuRUxqRk94Vmk2b0haODhXIjt9',1645178643);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
