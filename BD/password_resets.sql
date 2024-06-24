-- Base de datos para los tokens de recuperación

CREATE TABLE `pasword_resets`(
    `id` INT(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `token` VARCHAR(255) NOT NULL,
    `expires_at` DATETIME NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;