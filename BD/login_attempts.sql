-- Base de datos de Banners

CREATE TABLE `login_attempts`(
    `id` INT(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `correo` VARCHAR(255) NOT NULL,
    `attempt_time` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;