-- Base de Datos.

CREATE TABLE `usuario`(
    -- Datos recibidos del formulario de registro
    `id_usuario` int(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `nombre` varchar(255) NOT NULL,
    `correo` varchar(255) NOT NULL,
    `acceso` varchar(255) NOT NULL,
    `categoria` varchar(255) NULL,
    `profesion` varchar(255) NULL,
    `telefono` VARCHAR(11) NULL DEFAULT 0,
    `matricula` VARCHAR (100) NULL,
    -- Lo de abajo se modifica en el perfil.
    `sobre_mi` varchar(255) NULL,
    `barrio` varchar(255) NULL,
    `foto_perfil` varchar(255) NULL,
    `horas` boolean NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;