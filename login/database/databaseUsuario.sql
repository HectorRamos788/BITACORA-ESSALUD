DROP TABLE IF EXISTS usuario;
CREATE TABLE usuario (
    id int(11) NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    codigo VARCHAR(8) NOT NULL,
    email VARCHAR(80) NOT NULL,
    telefono VARCHAR(9) NOT NULL,
    contrasena VARCHAR(50) NOT NULL,

    PRIMARY KEY (id)
)