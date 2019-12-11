DROP DATABASE IF EXISTS ServicioSocial;
CREATE DATABASE ServicioSocial;
USE ServicioSocial;

CREATE TABLE Usuarios(
	ID INT(11) PRIMARY KEY AUTO_INCREMENT,
    NOMBRE VARCHAR(45) NOT NULL DEFAULT '',
    APELLIDOS VARCHAR(45) NOT NULL DEFAULT '',
    NOMBREUSUARIO VARCHAR(45) NOT NULL DEFAULT '',
    CONTRASENIA VARCHAR(45) NOT NULL DEFAULT '',
    TIPO ENUM('A','J','E') NOT NULL DEFAULT 'A' COMMENT 'A=Administrador, J=JDGTYV, E=Estudiante'
);

CREATE TABLE Alumnos(
	ID INT(11) PRIMARY KEY AUTO_INCREMENT,
    NOCONTROL VARCHAR(10) UNIQUE NOT NULL DEFAULT '',
    CARRERA VARCHAR(50) NOT NULL DEFAULT '',
    SEMESTRE INT(11) NOT NULL DEFAULT 1,
    IDUSUARIO INT(11) NOT NULL,
    CONSTRAINT FOREIGN KEY (IDUSUARIO) REFERENCES Usuarios(ID)
);

CREATE TABLE InformacionServicio(
	ID INT(11) PRIMARY KEY AUTO_INCREMENT,
    PROGRAMA VARCHAR(50) NOT NULL DEFAULT '',
    DEPENDENCIA VARCHAR(50) NOT NULL DEFAULT '',
    FECHAINICIO DATE NOT NULL DEFAULT '2018-01-01',
    FECHAFINAL DATE NOT NULL DEFAULT '2018-01-01',
    IDALUMNO INT(11) NOT NULL,
    CONSTRAINT FOREIGN KEY (IDALUMNO) REFERENCES Alumnos(ID)
);

CREATE TABLE Formatos(
	ID INT(11) PRIMARY KEY AUTO_INCREMENT,
	TITULO VARCHAR(50) NOT NULL DEFAULT '',
    DESCRIPCION VARCHAR(70) NOT NULL DEFAULT '',
    UBICACIONARCHIVO VARCHAR(100) NOT NULL DEFAULT ''
);

CREATE TABLE Archivos(
	ID INT(11) PRIMARY KEY AUTO_INCREMENT,
	TITULO VARCHAR(50) NOT NULL DEFAULT '',
    IDFORMATO INT(11) NOT NULL,
    UBICACIONARCHIVO VARCHAR(100) NOT NULL DEFAULT '',
    CONSTRAINT FOREIGN KEY (IDFORMATO) REFERENCES Formatos(ID)
);

CREATE TABLE RevisionSolicitudes(
	ID INT(11) PRIMARY KEY AUTO_INCREMENT,
    IDALUMNO INT(11) NOT NULL,
    IDARCHIVO INT(11) NOT NULL,
	FECHAHORA DATETIME NOT NULL DEFAULT '2019-01-01 00:00:00',
	NOREVISION INT(11) NOT NULL DEFAULT 0,
    NOTAS VARCHAR(100) NOT NULL DEFAULT '',
	ESTADO ENUM('P', 'E', 'C') NOT NULL DEFAULT 'P' COMMENT 'P=Pendiente de Revisar, E=Revisado con Error, C=Revisado Correcto',
    CONSTRAINT FOREIGN KEY (IDALUMNO) REFERENCES Alumnos(ID),
    CONSTRAINT FOREIGN KEY (IDARCHIVO) REFERENCES Archivos(ID)
);

CREATE TABLE RevisionRespuestas(
	ID INT(11) PRIMARY KEY AUTO_INCREMENT,
    IDSOLICITUD INT(11) NOT NULL, 
    IDARCHIVO INT(11) NOT NULL,
	FECHAHORA DATETIME NOT NULL DEFAULT '2019-01-01 00:00:00',
    COMENTARIOS VARCHAR(100) NOT NULL DEFAULT '',
	ESTADO ENUM('P', 'E', 'C') NOT NULL DEFAULT 'P' COMMENT 'P=Pendiente de Revisar, E=Revisado con Error, C=Revisado Correcto',
    CONSTRAINT FOREIGN KEY (IDSOLICITUD) REFERENCES RevisionSolicitudes(ID),
    CONSTRAINT FOREIGN KEY (IDARCHIVO) REFERENCES Archivos(ID)
);

##################
# Registros base #
##################
INSERT INTO Usuarios(NOMBRE, APELLIDOS, NOMBREUSUARIO, CONTRASENIA, TIPO) VALUES ('Admin','Istrador','Admin','123','A');

INSERT INTO Usuarios(NOMBRE, APELLIDOS, NOMBREUSUARIO, CONTRASENIA, TIPO) VALUES ('Pablo','Alumno','alumno','123','E');
INSERT INTO Alumnos (NOCONTROL, CARRERA, SEMESTRE, IDUSUARIO)VALUES('D15010345','ISC',9,2);

INSERT INTO Formatos(TITULO, DESCRIPCION, UBICACIONARCHIVO) VALUES ('Solicitud de S.S.', 'Versión 1.0', 'archivos/formatos/solictud.docx');
INSERT INTO Archivos(TITULO, IDFORMATO, UBICACIONARCHIVO) VALUES('D15010345Solcictud.docx', 1, 'revisionSolicitudes/solicitud.docx');

INSERT INTO RevisionSolicitudes (IDALUMNO, IDARCHIVO, FECHAHORA, NOREVISION, NOTAS, ESTADO) 
	VALUES (1,1,'2019-12-10 12:00:00', 1, '¿Está bien el archivo?', 'P');
