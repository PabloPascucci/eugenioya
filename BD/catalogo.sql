-- tabla para los catalogos de los usuarios

CREATE TABLE `catalogo` (
    `id_producto` int(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `id_usuario` int(10) NOT NULL,
    `nombre_producto` varchar(255) NOT NULL,
    `precio` DECIMAL(10,2) NOT NULL,
    `estado_producto` ENUM('activo', 'inactivo') DEFAULT 'activo',
    `imagen_1` VARCHAR(255) NULL,
    `imagen_2` VARCHAR(255) NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;