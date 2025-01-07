-- Base de Datos para cumpleaños

CREATE TABLE `birthday` (
    `id_detalle` INT AUTO_INCREMENT PRIMARY KEY,
    `correo_usuario` varchar(255) NOT NULL,
    `fecha_nacimiento` DATE NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
