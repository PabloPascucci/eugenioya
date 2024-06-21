-- Base de Datos que almacena las puntuación.

CREATE TABLE `average`(
    -- Datos recibidos del formulario de registro
    `id` int(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `professional_id` INT(10) NOT NULL,
    `average_rating` FLOAT DEFAULT 0,
    `rating_count` INT DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;