-- Base de Datos que almacena los mensajes entre usuarios.

CREATE TABLE `messages`(
    `id` int(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `sender_id` int(10) NOT NULL, -- usuario "cliente"
    `receiver_id` INT(10) NOT NULL, -- profesional
    `message_` TEXT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;