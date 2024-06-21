-- Base de Datos.

CREATE TABLE `publicacion`(
    -- Datos recibidos del formulario de registro
    `id_publicacion` int(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `id_usuario` int(10) NOT NULL,
    `nombre_proyecto` varchar(255) NOT NULL,
    `foto_proyecto` varchar(255) NULL,
    `descripcion_proyecto` varchar(255) NOT NULL,
    `fecha_subida` DATE NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;