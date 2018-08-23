-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               8.0.11 - MySQL Community Server - GPL
-- Операционная система:         Win64
-- HeidiSQL Версия:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных test_rubric
CREATE DATABASE IF NOT EXISTS `test_rubric` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */;
USE `test_rubric`;

-- Дамп структуры для таблица test_rubric.attribute_product
CREATE TABLE IF NOT EXISTS `attribute_product` (
  `name` char(50) DEFAULT NULL,
  `attribute` varchar(500) DEFAULT NULL,
  KEY `name` (`name`),
  CONSTRAINT `FK_attribute_product_goods` FOREIGN KEY (`name`) REFERENCES `goods` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы test_rubric.attribute_product: ~18 rows (приблизительно)
/*!40000 ALTER TABLE `attribute_product` DISABLE KEYS */;
INSERT INTO `attribute_product` (`name`, `attribute`) VALUES
	('Fairy', 'лучшее средство против жира'),
	('Frosch лимонный', 'лучшее средство для мытья посуды на натуральной основе'),
	('AOS антибактериальный', 'самое эффективное моющее средство для посуды'),
	('CillitBang', 'универсальное средство от налета и ржавчины'),
	('Баги Акрилан', 'лучшее средство для чистки акриловых ванн и душевых кабин'),
	('CifUltraWhite', 'популярный чистящий крем для отбеливания ванн'),
	('Вибростол ЭВ-340-1', '3 режима вибрации.Усиленный вариант опор.'),
	('Аист Санокс гель', 'Гелеобразное средство для очистки сантехники не содержит хлор;'),
	('Моющее средство AOS', 'средство для мытья посуды'),
	('Поршни', 'Кованные'),
	('Кольца поршневые', 'Износостойкие'),
	('Свечи автомобильные', 'элемент системы зажигания'),
	('Стальной диск', 'Стальной диск для МКП,особый сплав металлов'),
	('Фрикционный диск', 'Износостойкий'),
	('Подшипник', 'Выполнен из сплава титана и никеля'),
	('Щебень', 'средней зернистости.одноцветная'),
	('Песок', 'Песок морской с желтым оттенком'),
	('Глина', 'Глина обыкновенная');
/*!40000 ALTER TABLE `attribute_product` ENABLE KEYS */;

-- Дамп структуры для таблица test_rubric.goods
CREATE TABLE IF NOT EXISTS `goods` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` int(11) unsigned DEFAULT NULL,
  `name` char(50) DEFAULT NULL,
  `price_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `code` (`code`),
  KEY `FK_goods_price` (`price_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы test_rubric.goods: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `goods` DISABLE KEYS */;
INSERT INTO `goods` (`id`, `code`, `name`, `price_id`) VALUES
	(1, 150, 'AOS антибактериальный', 1),
	(2, 201, 'Поршни', 9),
	(3, 202, 'Кольца поршневые', 6),
	(4, 100, 'Аист Санокс гель', 2),
	(5, 300, 'Щебень', 11),
	(6, 151, 'Моющее средство AOS', 15),
	(7, 301, 'Песок', 3),
	(8, 302, 'Глина', 4),
	(9, 203, 'Свечи автомобильные', 18),
	(10, 152, 'Frosch лимонный', 5),
	(12, 153, 'Fairy', 7),
	(14, 101, 'CillitBang', 13),
	(16, 102, 'Баги Акрилан', 14),
	(17, 103, 'CifUltraWhite', 16),
	(19, 251, 'Стальной диск', 17),
	(20, 252, 'Фрикционный диск', 12),
	(21, 253, 'Подшипник', 8),
	(23, 400, 'Вибростол ЭВ-340-1', 10);
/*!40000 ALTER TABLE `goods` ENABLE KEYS */;

-- Дамп структуры для таблица test_rubric.price
CREATE TABLE IF NOT EXISTS `price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price_id` int(11) DEFAULT NULL,
  `type_price` char(11) DEFAULT NULL,
  `price` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `price_id` (`price_id`),
  CONSTRAINT `FK_price_goods` FOREIGN KEY (`price_id`) REFERENCES `goods` (`price_id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы test_rubric.price: ~9 rows (приблизительно)
/*!40000 ALTER TABLE `price` DISABLE KEYS */;
INSERT INTO `price` (`id`, `price_id`, `type_price`, `price`) VALUES
	(1, 1, 'акционная', '50'),
	(2, 2, 'оптовая', '30'),
	(3, 2, 'рыночная', '50'),
	(4, 1, 'оптовая', '40'),
	(5, 1, 'рыночная', '60'),
	(6, 2, 'акционная', '35'),
	(7, 3, 'акционная', '230'),
	(8, 3, 'рыночная', '300'),
	(9, 4, 'рыночная', '500'),
	(10, 3, 'оптовая', '200'),
	(11, 4, 'акционная', '450'),
	(12, 4, 'оптовая', '300'),
	(13, 5, 'оптовая', '90'),
	(14, 5, 'акционная', '70'),
	(15, 5, 'рыночная', '120'),
	(16, 6, 'оптовая', '200'),
	(17, 6, 'акционная', '230'),
	(18, 6, 'рыночная', '500'),
	(19, 7, 'оптовая', '60'),
	(20, 7, 'акционная', '76'),
	(21, 7, 'рыночная', '100'),
	(22, 8, 'оптовая', '500'),
	(23, 8, 'акционная', '600'),
	(24, 8, 'рыночная', '800'),
	(25, 9, 'оптовая', '1000'),
	(26, 9, 'акционная', '1100'),
	(27, 9, 'рыночная', '1200'),
	(28, 10, 'рыночная', '35000'),
	(29, 10, 'акционная', '30000'),
	(30, 10, 'оптовая', '25000'),
	(31, 11, 'оптовая', '700'),
	(32, 11, 'акционная', '750'),
	(33, 11, 'рыночная', '900'),
	(34, 12, 'оптовая', '200'),
	(35, 12, 'акционная', '250'),
	(36, 12, 'рыночная', '280'),
	(37, 13, 'оптовая', '70'),
	(38, 13, 'акционная', '75'),
	(39, 13, 'рыночная', '90'),
	(40, 14, 'оптовая', '100'),
	(41, 14, 'акционная', '110'),
	(42, 14, 'рыночная', '120'),
	(43, 15, 'оптовая', '30'),
	(44, 15, 'акционная', '40'),
	(45, 15, 'рыночная', '70'),
	(46, 16, 'оптовая', '55'),
	(47, 16, 'акционная', '60'),
	(48, 16, 'рыночная', '70'),
	(49, 17, 'оптовая', '400'),
	(50, 17, 'акционная', '500'),
	(51, 17, 'рыночная', '650'),
	(52, 18, 'оптовая', '1230'),
	(53, 18, 'акционная', '1290'),
	(54, 18, 'рыночная', '1500');
/*!40000 ALTER TABLE `price` ENABLE KEYS */;

-- Дамп структуры для таблица test_rubric.rubrics
CREATE TABLE IF NOT EXISTS `rubrics` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` int(11) unsigned DEFAULT NULL,
  `name` char(50) DEFAULT NULL,
  `pid` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы test_rubric.rubrics: ~14 rows (приблизительно)
/*!40000 ALTER TABLE `rubrics` DISABLE KEYS */;
INSERT INTO `rubrics` (`id`, `code`, `name`, `pid`) VALUES
	(1, 0, 'хим вещества', 0),
	(2, 0, 'автозапчасти', 0),
	(3, 0, 'стройматериалы', 0),
	(4, 0, 'специальное оборудование', 0),
	(5, 200, 'запчасти для двигателя', 2),
	(6, 300, 'сыпучие стройматериалы', 3),
	(7, 0, 'моющие вещества', 1),
	(8, 250, 'запчасти для КП', 2),
	(9, 0, 'для кухни', 7),
	(10, 100, 'для ванной', 7),
	(11, 0, 'моющие средства', 9),
	(12, 150, 'для мытья посуды', 11),
	(13, 0, 'Виброоборудование', 4),
	(14, 400, 'Вибростолы', 13);
/*!40000 ALTER TABLE `rubrics` ENABLE KEYS */;

-- Дамп структуры для таблица test_rubric.rubrics_goods
CREATE TABLE IF NOT EXISTS `rubrics_goods` (
  `rubr_code` int(11) unsigned NOT NULL,
  `good_code` int(11) unsigned NOT NULL,
  KEY `FK_rubrics_goods_rubrics` (`rubr_code`),
  KEY `FK_rubrics_goods_goods` (`good_code`),
  CONSTRAINT `FK_rubrics_goods_goods` FOREIGN KEY (`good_code`) REFERENCES `goods` (`code`),
  CONSTRAINT `FK_rubrics_goods_rubrics` FOREIGN KEY (`rubr_code`) REFERENCES `rubrics` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы test_rubric.rubrics_goods: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `rubrics_goods` DISABLE KEYS */;
INSERT INTO `rubrics_goods` (`rubr_code`, `good_code`) VALUES
	(100, 101),
	(100, 103),
	(100, 102),
	(150, 150),
	(150, 151),
	(150, 152),
	(150, 153),
	(200, 201),
	(200, 202),
	(250, 251),
	(200, 203),
	(250, 253),
	(250, 252),
	(300, 300),
	(300, 301),
	(300, 302),
	(400, 400),
	(100, 100);
/*!40000 ALTER TABLE `rubrics_goods` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
