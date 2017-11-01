-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE TABLE "ttn" --------------------------------------
-- CREATE TABLE "ttn" ------------------------------------------
CREATE TABLE `ttn` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`ttn_number` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`date_created` DateTime NOT NULL,
	`payer_type` VarChar( 100 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`city_sender` VarChar( 100 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`city_recipient` VarChar( 100 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`warehouse_recipient` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`recipient_number` Int( 11 ) NOT NULL,
	`date_add` Date NOT NULL,
	`scheduled_delivery_date` DateTime NOT NULL,
	`payment_method` VarChar( 100 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`status` VarChar( 100 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`status_code` Int( 11 ) NOT NULL,
	`user_id` Int( 11 ) NULL,
	`date_up` DateTime NOT NULL,
	PRIMARY KEY ( `id` ),
	CONSTRAINT `UNIQ_4DE0E93386C94A6D` UNIQUE( `ttn_number` ) )
CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 5;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "user" -------------------------------------
-- CREATE TABLE "user" -----------------------------------------
CREATE TABLE `user` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`username` VarChar( 25 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`password` VarChar( 64 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`email` VarChar( 60 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`is_active` TinyInt( 1 ) NOT NULL,
	`roles` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`date_up` DateTime NULL,
	PRIMARY KEY ( `id` ),
	CONSTRAINT `UNIQ_8D93D649E7927C74` UNIQUE( `email` ),
	CONSTRAINT `UNIQ_8D93D649F85E0677` UNIQUE( `username` ) )
CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 4;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- Dump data of "ttn" --------------------------------------
INSERT INTO `ttn`(`id`,`ttn_number`,`date_created`,`payer_type`,`city_sender`,`city_recipient`,`warehouse_recipient`,`recipient_number`,`date_add`,`scheduled_delivery_date`,`payment_method`,`status`,`status_code`,`user_id`,`date_up`) VALUES ( '1', '20400048799114', '2017-05-03 15:19:15', 'Sender', 'Горішні Плавні', 'Павлоград', 'Відділення №12 (до 30 кг): вул. Гагаріна,12 (маг."АТБ")', '12', '2017-10-28', '2017-05-04 00:00:00', 'Cash', 'Відправлення отримано', '9', '1', '2017-10-31 10:43:49' );
INSERT INTO `ttn`(`id`,`ttn_number`,`date_created`,`payer_type`,`city_sender`,`city_recipient`,`warehouse_recipient`,`recipient_number`,`date_add`,`scheduled_delivery_date`,`payment_method`,`status`,`status_code`,`user_id`,`date_up`) VALUES ( '2', '20400048799111', '2017-10-31 01:35:41', 'Recipient', 'Горішні Плавні', 'Петропавлівка', 'Відділення №1: вул. Героїв України, 44', '1', '2017-10-31', '2017-05-05 00:00:00', 'Cash', 'Відправлення отримано. Грошовий переказ видано одержувачу.', '11', '1', '2017-10-31 00:00:00' );
INSERT INTO `ttn`(`id`,`ttn_number`,`date_created`,`payer_type`,`city_sender`,`city_recipient`,`warehouse_recipient`,`recipient_number`,`date_add`,`scheduled_delivery_date`,`payment_method`,`status`,`status_code`,`user_id`,`date_up`) VALUES ( '3', '20400048799000', '2017-05-04 20:08:20', 'Sender', 'Стоянка', 'Лисичанськ', 'Відділення №3 (до 30 кг на одне місце): вул. Макаренка, 208', '3', '2017-10-31', '2017-05-08 00:00:00', 'NonCash', 'Відправлення отримано', '106', '1', '2017-10-31 10:43:53' );
INSERT INTO `ttn`(`id`,`ttn_number`,`date_created`,`payer_type`,`city_sender`,`city_recipient`,`warehouse_recipient`,`recipient_number`,`date_add`,`scheduled_delivery_date`,`payment_method`,`status`,`status_code`,`user_id`,`date_up`) VALUES ( '4', '20400048799001', '2017-05-03 19:53:23', 'Recipient', 'Дніпро', 'Київ', 'Відділення №203 (до 30 кг): просп. Відрадний, 6/1', '203', '2017-10-31', '2017-05-04 00:00:00', 'Cash', 'Відправлення отримано. Грошовий переказ видано одержувачу.', '11', '1', '2017-10-31 10:45:12' );
-- ---------------------------------------------------------


-- Dump data of "user" -------------------------------------
INSERT INTO `user`(`id`,`username`,`password`,`email`,`is_active`,`roles`,`date_up`) VALUES ( '1', 'Alex', '$2y$13$a.cOHrJiG/t1ZOHznEWwOOk1Rcpf5u2VKz/kXEtkHs/rTAKQSlaSW', 'san@gmail.com', '1', 'a:1:{i:0;s:9:"ROLE_USER";}', '2017-10-27 23:20:39' );
INSERT INTO `user`(`id`,`username`,`password`,`email`,`is_active`,`roles`,`date_up`) VALUES ( '2', 'Sanya', '$2y$13$w/py6arlsbh5TbP/WZr9Eutf6OhNt387K2cTUl2eWn5pH6LsaAx6S', 'sanya@gmail.com', '1', 'a:1:{i:0;s:9:"ROLE_USER";}', '2017-10-28 00:12:38' );
INSERT INTO `user`(`id`,`username`,`password`,`email`,`is_active`,`roles`,`date_up`) VALUES ( '3', 'Vasa', '$2y$13$oYgaX2kJnluC6sfB.oanvemmC.3EpQVlOa0e3VzNFPNmI5wQFNn.u', 'Vasa@gmail.net', '1', 'a:1:{i:0;s:9:"ROLE_USER";}', '2017-10-30 11:19:20' );
-- ---------------------------------------------------------


-- CREATE INDEX "IDX_4DE0E933A76ED395" ---------------------
-- CREATE INDEX "IDX_4DE0E933A76ED395" -------------------------
CREATE INDEX `IDX_4DE0E933A76ED395` USING BTREE ON `ttn`( `user_id` );
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE LINK "FK_4DE0E933A76ED395" -----------------------
-- CREATE LINK "FK_4DE0E933A76ED395" ---------------------------
ALTER TABLE `ttn`
	ADD CONSTRAINT `FK_4DE0E933A76ED395` FOREIGN KEY ( `user_id` )
	REFERENCES `user`( `id` )
	ON DELETE Restrict
	ON UPDATE Restrict;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


