-- Base de datos de Banners

CREATE TABLE `banner`(
    `id` INT(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `url_banner` VARCHAR(255) NULL,
    `tipo_banner` VARCHAR(255) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;