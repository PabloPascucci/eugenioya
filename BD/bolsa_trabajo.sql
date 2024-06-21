-- Base de datos para la bolsa de trabajo

CREATE TABLE `bolsa`(
    `id` INT(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `empresa` VARCHAR(255) NULL,
    `texto` VARCHAR(255) NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;