
DROP TABLE IF EXISTS `categories_db`;

CREATE TABLE `categories_db` (
  `id_category` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `categories_db` WRITE;

INSERT INTO `categories_db` (`id_category`, `category_name`)
VALUES
	(1,'Каталог'),
    (2,'Одежда'),
	(3,'Продукты'),
	(4,'Верхняя одежда'),
	(5,'Молочные продуткы');
	
UNLOCK TABLES;




DROP TABLE IF EXISTS `category_links`;

CREATE TABLE `category_links` (
  `parent_id` int(11) unsigned NOT NULL,
  `child_id` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `category_links` WRITE;

INSERT INTO `category_links` (`parent_id`, `child_id`, `level`)
VALUES
	(1,1,0),
	(1,2,1),
	(1,3,1),
	(1,4,2),
	(1,5,2),
	(2,2,1),
	(2,4,2),
	(3,3,1),
	(3,5,2);

UNLOCK TABLES;


CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ;

INSERT INTO `categories` (`id`, `parent_id`, `name`) VALUES
(1, 0, 'Категория 1'),
(2, 0, 'Категория 2'),
(3, 0, 'Категория 3'),
(4, 1, 'Категория 1.1'),
(5, 1, 'Категория 1.2'),
(6, 4, 'Категория 1.1.1'),
(7, 2, 'Категория 2.1'),
(8, 2, 'Категория 2.2');
