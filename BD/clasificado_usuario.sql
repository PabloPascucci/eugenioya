-- Base de Datos para clasificados de los usuarios

CREATE TABLE `clasificados_usuarios`(
    -- Datos recibidos del formulario de registro
    `id_clasificado` int(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `id_usuario` int(10) NOT NULL,
    `telefono_usuario` varchar(11) NOT NULL,
    `titulo` varchar(255) NOT NULL,
    `descripcion` TEXT NOT NULL,
    `presupuesto` DECIMAL(10,2) NOT NULL,
    `fecha_publicacion` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `fecha_limite` DATE,
    `estado` ENUM('activo', 'completado', 'cancelado') DEFAULT 'activo',
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;