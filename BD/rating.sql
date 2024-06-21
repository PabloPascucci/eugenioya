-- Base de Datos que almacena las puntuación.

CREATE TABLE `ratings`(
    -- Datos recibidos del formulario de registro
    `id_rating` int(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `user_id` int(10) NOT NULL,
    `professional_id` INT(10) NOT NULL,
    `rating` INT CHECK (rating >= 1 AND rating <= 5),
    `comment` TEXT,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;