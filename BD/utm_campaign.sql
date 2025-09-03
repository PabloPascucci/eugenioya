-- Tabla que almacenerá los datos extraidos de las campañas de folleteria y/o QRs

CREATE TABLE `utm_cmp`(
    `id` int(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `contador` INT(10) NOT NULL,
    `origen` varchar(255) NOT NULL,
    `medio_acceso` varchar(255) NOT NULL,
    `campania` varchar(255) NOT NULL,
    `indice_cat` INT(10) NOT NULL,
    `form_registro` INT(10) NOT NULL,
    `visit_profile` INT(10) NOT NULL,
    `ultimo_clic` DATE NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ========================
-- id -> Es la clave primaria de la tabla, por ende es autoincrementable, y será la que indique cuantas campañas existen.
-- ----------------
-- contador -> Este registro será para contar cuantos usuarios mandaron datos a esta tabla.
-- ----------------
-- origen -> Lugar de donde entro el usuario a la landing page (utm_source).
-- ----------------
-- medio_acceso -> Medio por el cual el usuario accedo a la landing page (utm_medium).
-- ----------------
-- campania -> Campaña especifica para rastreo global (utm_campaign).
-- ----------------
-- indice_cat -> Cuantas veces se apreto el botón que redirige al visitante al indice de categorias.
-- ----------------
-- form_registro -> Cuantas veces se apreto el botón que redirige al visitante al formulario de registro.
-- ----------------
-- visit_profile -> Cuantas veces se presiono el botón que redirige al perfil de un profesional promocionado.
-- ----------------
-- ultimo_clic -> Fecha del último clic que se hizo sobre un botón, sirve para medir actividad de la campaña.