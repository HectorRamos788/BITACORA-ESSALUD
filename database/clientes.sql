-- En DB: parainfo de MySQL, ejecutar este script:
DROP TABLE IF EXISTS bitacora;

-- tabla clientes
CREATE TABLE bitacora(
    idbitacora	int(11) NOT NULL AUTO_INCREMENT,
    Fecha_ocurrencia DATE NOT NULL,
    Hora_ocurrencia TIME NOT NULL,
    fecha_registro DATE NOT NULL,
    hora_registro TIME NOT NULL,
    CAS	varchar(100) NOT NULL,
    essi_explota varchar(10) NOT NULL,
    modulo varchar(50) NOT NULL,
    detalle varchar(250) NOT NULL,
    responsable varchar(50) NOT NULL,
    usuario_reporte varchar(50) NOT NULL,
    fecha_essi_soporte DATE NOT NULL,
    fecha_mesa_soporte DATE NOT NULL,
    num_caso_mesa_ayuda VARCHAR(50) NOT NULL,
    fecha_reporte_telefono DATE NOT NULL,
    destino_reporte_telefono varchar(40) NOT NULL,
    fecha_reporte_email DATE NOT NULL,
    destino_reporte_email varchar(40) NOT NULL,
    fecha_reporte_whatsapp DATE NOT NULL,
    destino_reporte_whatsapp varchar(40) NOT NULL,
    fecha_reporte_formal DATE NOT NULL,
    destino_reporte_formal varchar(40) NOT NULL,    
    PRIMARY KEY	(idbitacora)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- insertando filas
INSERT INTO bitacora(Fecha, Hora,CAS,essi_explota,modulo,detalle,responsable,usuario_reporte,fecha_essi_soporte,fecha_mesa_soporte,num_caso_mesa_ayuda,fecha_reporte_telefono,
destino_reporte_telefono,fecha_reporte_email,destino_reporte_email,fecha_reporte_whatsapp,destino_reporte_whatsapp,fecha_reporte_formal,destino_reporte_formal) 
VALUES('2023-01-05','04:01','escomel','essi','emergencia','vamos beastcoast', 'polar mendoza','hector ramos','2023-01-05', '2023-01-05','159789', '2023-01-05','camana', '2023-01-05','camana', '2023-01-05','camana' , '2023-01-05','camana');
INSERT INTO `bitacora` (`idbitacora`, `Fecha`, `Hora`, `CAS`, `essi_explota`, `modulo`, `detalle`, `responsable`, `usuario_reporte`, `fecha_essi_soporte`, `fecha_mesa_soporte`, `num_caso_mesa_ayuda`, `fecha_reporte_telefono`, `destino_reporte_telefono`, `fecha_reporte_email`, `destino_reporte_email`, `fecha_reporte_whatsapp`, `destino_reporte_whatsapp`, `fecha_reporte_formal`, `destino_reporte_formal`) VALUES
(1, '2023-04-27', '12:01:00', 'Hospital Nacional Carlos Alberto Seguin Escobedo', 'Explota', 'Consulta Externa', 'no permite grabar dm', 'Wilber Lucio Ramos Zevallos', 'Digitador de Admisión', '2023-04-27', '2023-04-27', '2563', '2023-04-27', 'ulises', '2023-04-27', 'elard', '2023-04-27', 'pablo', '0000-00-00', 'martin');