CREATE TABLE `reservations` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(100) NOT NULL,
	`cell` INT(11) UNSIGNED NOT NULL,
	`reservation_number` INT(11) UNSIGNED NOT NULL,
	`date_entry` DATETIME NOT NULL,
	`date_exit` DATETIME NOT NULL,
	`number_days` INT(11) NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=3
;


CREATE TABLE `users` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(100) NULL DEFAULT NULL,
	`email` VARCHAR(200) NOT NULL,
	`password` VARCHAR(100) NOT NULL,
	`remember_token` VARCHAR(100) NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=5
;

CREATE TABLE `accommodations` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`id_type` INT(11) NOT NULL,
	`accommodates` INT(11) NOT NULL,
	`floor` INT(11) NULL DEFAULT NULL,
	`description` TEXT NOT NULL,
	`quantity` INT(11) NOT NULL,
	`number` VARCHAR(50) NOT NULL,
	`id_reservation` INT(11) NULL DEFAULT NULL,
	`status` VARCHAR(50) NULL DEFAULT NULL,
	PRIMARY KEY (`id`),
	INDEX `id_reservation` (`id_reservation`),
	INDEX `id_type` (`id_type`),
	CONSTRAINT `accommodations_ibfk_1` FOREIGN KEY (`id_reservation`) REFERENCES `reservations` (`id`),
	CONSTRAINT `accommodations_ibfk_2` FOREIGN KEY (`id_type`) REFERENCES `types` (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=14
;
-------------------------------------------------------------------------------------------------

CREATE TABLE `status` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;






