
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- blog_article
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `blog_article`;


CREATE TABLE `blog_article`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER  NOT NULL,
	`status` VARCHAR(255)  NOT NULL,
	`title` VARCHAR(255)  NOT NULL,
	`subcontent` TEXT  NOT NULL,
	`content` TEXT  NOT NULL,
	`published_at` DATETIME,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `blog_article_FI_1` (`user_id`),
	CONSTRAINT `blog_article_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- blog_comment
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `blog_comment`;


CREATE TABLE `blog_comment`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`article_id` INTEGER  NOT NULL,
	`user` VARCHAR(255),
	`website` VARCHAR(255),
	`content` TEXT,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `blog_comment_FI_1` (`article_id`),
	CONSTRAINT `blog_comment_FK_1`
		FOREIGN KEY (`article_id`)
		REFERENCES `blog_article` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- blog_category
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `blog_category`;


CREATE TABLE `blog_category`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- blog_tag
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `blog_tag`;


CREATE TABLE `blog_tag`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- blog_link
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `blog_link`;


CREATE TABLE `blog_link`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255),
	`target` VARCHAR(255),
	`description` TEXT,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- blog_tag_article
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `blog_tag_article`;


CREATE TABLE `blog_tag_article`
(
	`tag_id` INTEGER  NOT NULL,
	`article_id` INTEGER  NOT NULL,
	PRIMARY KEY (`tag_id`,`article_id`),
	CONSTRAINT `blog_tag_article_FK_1`
		FOREIGN KEY (`tag_id`)
		REFERENCES `blog_tag` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	INDEX `blog_tag_article_FI_2` (`article_id`),
	CONSTRAINT `blog_tag_article_FK_2`
		FOREIGN KEY (`article_id`)
		REFERENCES `blog_article` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- blog_category_article
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `blog_category_article`;


CREATE TABLE `blog_category_article`
(
	`category_id` INTEGER  NOT NULL,
	`article_id` INTEGER  NOT NULL,
	PRIMARY KEY (`category_id`,`article_id`),
	CONSTRAINT `blog_category_article_FK_1`
		FOREIGN KEY (`category_id`)
		REFERENCES `blog_category` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	INDEX `blog_category_article_FI_2` (`article_id`),
	CONSTRAINT `blog_category_article_FK_2`
		FOREIGN KEY (`article_id`)
		REFERENCES `blog_article` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
