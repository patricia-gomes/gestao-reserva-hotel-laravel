# Execute nessa ordem

-- Cria o banco de dados --
CREATE DATABASE IF NOT EXISTS `gestao_reserva_hotel`;

CREATE TABLE users (
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

INSERT users (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$10$2PlC3/qaIsmB/NI4CKd3fezzhoFQ53Fvt29BMHh0nGMiTlY0Fao86');


CREATE TABLE types (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`type` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=5
;

INSERT types (`id`, `type`) VALUES
(1, 'Quarto casal'),
(2, 'Duplo solteiro');


CREATE TABLE reservations (
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

CREATE TABLE accommodations (
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

CREATE TABLE guests (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(100) NOT NULL,
	`cpf` VARCHAR(14) NOT NULL,
	`cell` INT(11) NOT NULL,
	`number_companions` INT(11) NOT NULL,
	`id_reservation` INT(11) NOT NULL,
	`start` DATETIME NOT NULL,
	`end` DATETIME NOT NULL,
	`title` VARCHAR(50) NOT NULL,
	`number_days` INT(11) NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `id_reservation` (`id_reservation`),
	CONSTRAINT `guests_ibfk_1` FOREIGN KEY (`id_reservation`) REFERENCES `accommodations` (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=7
;
