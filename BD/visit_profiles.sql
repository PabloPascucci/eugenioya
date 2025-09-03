-- Tabla que almacena los datos de "Accion" extraidos de las campañas de folleteria, URLs o QRs

CREATE TABLE `profile_view` (
    `id` INT(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `contador` INT(10) NOT NULL,
    `id_user` INT(10) NOT NULL,
    `date` DATE NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ============================
-- id -> Es la clave primaria de la tabla, por ende es autoincrementable.
-- ----------------
-- contador -> Este registro será para contar cuantas veces se visito el perfil del usuario.
-- ----------------
-- id_user -> id del usuario dueño del perfil visitado.
-- ----------------
-- date -> última vez que entraron a tu perfil.