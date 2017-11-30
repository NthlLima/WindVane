CREATE DATABASE `db_jftv`;


CREATE TABLE `jf_userstype`(
	`type_id` int NOT NULL AUTO_INCREMENT,
	`type_name` varchar(50) NOT NULL,
	`type_desc` varchar(150) NOT NULL,
	PRIMARY KEY (`type_id`)
);


CREATE TABLE `jf_users`(
	`user_id` int NOT NULL AUTO_INCREMENT,
	`user_email` varchar(100) NOT NULL,
	`user_pass` varchar(100) NOT NULL,
	`user_name` varchar(100) NOT NULL,
	`user_img` varchar(100) NOT NULL DEFAULT 'user_default.png',
	`user_type` int NOT NULL,
	`user_status` tinyint(1) NOT NULL DEFAULT 1,
	PRIMARY KEY (`user_id`),
	FOREIGN KEY (`user_type`) REFERENCES `jf_userstype`(`type_id`)
);

CREATE TABLE `jf_categorys`(
	`categ_id` int NOT NULL AUTO_INCREMENT,
	`categ_name` varchar(50) NOT NULL,
	PRIMARY KEY (`categ_id`)
);


CREATE TABLE `jf_posts`(
	`post_id` int NOT NULL AUTO_INCREMENT,
	`post_title` text DEFAULT '',
	`post_link` text DEFAULT '' UNIQUE,
	`post_author` int NOT NULL,
	`post_date` datetime NOT NULL,
	`post_modified` datetime NOT NULL,
	`post_content` longtext NOT NULL DEFAULT '',
	`post_category` int NOT NULL,
	`post_featured` tinyint(1) NOT NULL DEFAULT 2,
	`post_status` tinyint(1) NOT NULL DEFAULT 1,
	PRIMARY KEY `post_id`,
	FOREIGN KEY (`post_author`) REFERENCES `jf_users` (`user_id`),
	FOREIGN KEY (`post_category`) REFERENCES `jf_categorys` (`categ_id`)
);

CREATE TABLE `jf_timeline`(
	`timeline_id` int NOT NULL AUTO_INCREMENT,
	`timeline_modified` text NOT NULL,
	`timeline_description` text NOT NULL,
	`timeline_date` datetime NOT NULL,
	`timeline_type` ENUM('1','2','3','4'),
	`timeline_user` int NOT NULL,
	PRIMARY KEY (`timeline_id`),
	FOREIGN KEY (`timeline_user`) REFERENCES `jf_users` (`user_id`)
);


INSERT INTO `jf_userstype` (`type_id`, `type_name`, `type_desc`) VALUES
(1, 'Super Admin', 'Acesso à administração da rede do blog, possuindo o controle de toda a rede.'),
(2, 'Administrador', 'Acesso a quase todas as funcionalidades de administração.'),
(3, 'Editor', 'Publica e gerencia posts e páginas, bem como gerenciar posts de outros usuários.'),
(4, 'Autor', 'Publica e gerencia seus próprios posts.'),
(5, 'Colaborador', 'Escreve e gerencia seus posts, mas não pode publicá-los.');


INSERT INTO `jf_users` (`user_id`, `user_email` , `user_pass` , `user_name`, `user_img`, `user_type`, `user_status`) VALUES
(1, 'nathalia.logustech@gmail.com' , '$2y$10$0SQVnsrC9OIj3V0MqHCm9Ox3OiAiSfuSD96aEsKAjSZVRNKouu64O' , 'Nathalia Lima' , 'a72b73f49fa584c4495c3135f2e7ae79.png', 1, 1);

INSERT INTO `jf_categorys` (`categ_id`, `categ_name`) VALUES
(1, 'Teste');



DELIMITER //

CREATE TRIGGER `active_ebook` BEFORE INSERT ON `lt_ebooks`
	FOR EACH ROW
	BEGIN
		UPDATE `lt_ebooks` SET ebook_status = 0;
		UPDATE `lt_ebooks` SET ebook_status = 1 WHERE ebook_id = NEW.ebook_id;
	END//



DELIMITER $$
CREATE PROCEDURE `active_ebook` (IN nome varchar(100), IN link varchar(100), IN img text)
BEGIN
DECLARE e_id int;
	INSERT INTO `lt_ebooks` (ebook_nome, ebook_link, ebook_img) VALUES (nome, link, img);
	SELECT ebook_id INTO e_id FROM `lt_ebooks` WHERE ebook_link = link AND ebook_img = img;

	UPDATE `lt_ebooks` SET ebook_status = 0 WHERE ebook_id <> e_id;
	
	
END $$

DELIMITER ;
CREATE PROCEDURE `download` (IN ebook varchar(100))
BEGIN
DECLARE total int;
DECLARE newtotal int;

	SELECT ebook_total INTO total FROM `lt_ebooks` WHERE ebook_link = ebook;
	newtotal = total + 1;
	UPDATE `lt_ebooks` SET ebook_total = newtotal WHERE ebook_link = ebook;

END ;

