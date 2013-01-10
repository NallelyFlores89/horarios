SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`laboratorios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`laboratorios` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`laboratorios` (
  `idlaboratorios` INT NOT NULL ,
  `nombrelaboratorios` VARCHAR(20) NOT NULL ,
  PRIMARY KEY (`idlaboratorios`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`divisiones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`divisiones` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`divisiones` (
  `iddivisiones` INT NOT NULL AUTO_INCREMENT ,
  `nombredivision` VARCHAR(10) NOT NULL ,
  PRIMARY KEY (`iddivisiones`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`profesores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`profesores` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`profesores` (
  `idprofesores` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  `numempleado` VARCHAR(45) NOT NULL ,
  `correo` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idprofesores`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`uea`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`uea` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`uea` (
  `iduea` INT NOT NULL AUTO_INCREMENT ,
  `nombreuea` VARCHAR(45) NOT NULL ,
  `siglas` VARCHAR(15) NOT NULL ,
  `clave` VARCHAR(45) NOT NULL ,
  `grupo` VARCHAR(15) NOT NULL ,
  `laboratorios_idlaboratorios` INT NOT NULL ,
  `divisiones_iddivisiones` INT NOT NULL ,
  `profesores_idprofesores` INT NOT NULL ,
  PRIMARY KEY (`iduea`) ,
  INDEX `fk_uea_laboratorios` (`laboratorios_idlaboratorios` ASC) ,
  INDEX `fk_uea_divisiones1` (`divisiones_iddivisiones` ASC) ,
  INDEX `fk_uea_profesores1` (`profesores_idprofesores` ASC) ,
  CONSTRAINT `fk_uea_laboratorios`
    FOREIGN KEY (`laboratorios_idlaboratorios` )
    REFERENCES `mydb`.`laboratorios` (`idlaboratorios` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_uea_divisiones1`
    FOREIGN KEY (`divisiones_iddivisiones` )
    REFERENCES `mydb`.`divisiones` (`iddivisiones` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_uea_profesores1`
    FOREIGN KEY (`profesores_idprofesores` )
    REFERENCES `mydb`.`profesores` (`idprofesores` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`recursos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`recursos` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`recursos` (
  `idrecursos` INT NOT NULL AUTO_INCREMENT ,
  `recurso` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idrecursos`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`usuarioadmin`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`usuarioadmin` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`usuarioadmin` (
  `idusuarioadmin` INT NOT NULL AUTO_INCREMENT ,
  `usuario` VARCHAR(45) NOT NULL ,
  `pass` VARCHAR(45) NOT NULL ,
  `correo` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idusuarioadmin`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`laboratorios_has_recursos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`laboratorios_has_recursos` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`laboratorios_has_recursos` (
  `laboratorios_idlaboratorios` INT NOT NULL ,
  `recursos_idrecursos` INT NOT NULL ,
  PRIMARY KEY (`laboratorios_idlaboratorios`, `recursos_idrecursos`) ,
  INDEX `fk_laboratorios_has_recursos_recursos1` (`recursos_idrecursos` ASC) ,
  INDEX `fk_laboratorios_has_recursos_laboratorios1` (`laboratorios_idlaboratorios` ASC) ,
  CONSTRAINT `fk_laboratorios_has_recursos_laboratorios1`
    FOREIGN KEY (`laboratorios_idlaboratorios` )
    REFERENCES `mydb`.`laboratorios` (`idlaboratorios` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_laboratorios_has_recursos_recursos1`
    FOREIGN KEY (`recursos_idrecursos` )
    REFERENCES `mydb`.`recursos` (`idrecursos` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`dias`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`dias` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`dias` (
  `iddias` INT NOT NULL AUTO_INCREMENT ,
  `nombredia` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`iddias`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`dias_uea`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`dias_uea` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`dias_uea` (
  `dias_iddias` INT NOT NULL ,
  `uea_iduea` INT NOT NULL ,
  PRIMARY KEY (`dias_iddias`, `uea_iduea`) ,
  INDEX `fk_dias_has_uea_uea1` (`uea_iduea` ASC) ,
  INDEX `fk_dias_has_uea_dias1` (`dias_iddias` ASC) ,
  CONSTRAINT `fk_dias_has_uea_dias1`
    FOREIGN KEY (`dias_iddias` )
    REFERENCES `mydb`.`dias` (`iddias` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_dias_has_uea_uea1`
    FOREIGN KEY (`uea_iduea` )
    REFERENCES `mydb`.`uea` (`iduea` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`semanas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`semanas` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`semanas` (
  `idsemanas` INT NOT NULL ,
  `semana` VARCHAR(15) NOT NULL ,
  PRIMARY KEY (`idsemanas`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`semanas_has_dias`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`semanas_has_dias` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`semanas_has_dias` (
  `semanas_idsemanas` INT NOT NULL ,
  `dias_has_uea_dias_iddias` INT NOT NULL ,
  `dias_has_uea_uea_iduea` INT NOT NULL ,
  PRIMARY KEY (`semanas_idsemanas`, `dias_has_uea_dias_iddias`, `dias_has_uea_uea_iduea`) ,
  INDEX `fk_semanas_has_dias_has_uea_dias_has_uea1` (`dias_has_uea_dias_iddias` ASC, `dias_has_uea_uea_iduea` ASC) ,
  INDEX `fk_semanas_has_dias_has_uea_semanas1` (`semanas_idsemanas` ASC) ,
  CONSTRAINT `fk_semanas_has_dias_has_uea_semanas1`
    FOREIGN KEY (`semanas_idsemanas` )
    REFERENCES `mydb`.`semanas` (`idsemanas` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_semanas_has_dias_has_uea_dias_has_uea1`
    FOREIGN KEY (`dias_has_uea_dias_iddias` , `dias_has_uea_uea_iduea` )
    REFERENCES `mydb`.`dias_uea` (`dias_iddias` , `uea_iduea` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`horarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`horarios` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`horarios` (
  `idhorarios` INT NOT NULL ,
  `hora` VARCHAR(5) NOT NULL ,
  PRIMARY KEY (`idhorarios`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`dias_uea_has_horarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`dias_uea_has_horarios` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`dias_uea_has_horarios` (
  `iddias` INT NOT NULL ,
  `idhorarios` INT NOT NULL ,
  `iduea` INT NULL ,
  PRIMARY KEY (`iddias`, `idhorarios`) ,
  INDEX `fk_dias_uea_has_horarios_horarios1` (`idhorarios` ASC) ,
  INDEX `fk_dias_uea_has_horarios_dias_uea1` (`iddias` ASC, `iduea` ASC) ,
  CONSTRAINT `fk_dias_uea_has_horarios_dias_uea1`
    FOREIGN KEY (`iddias` , `iduea` )
    REFERENCES `mydb`.`dias_uea` (`dias_iddias` , `uea_iduea` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_dias_uea_has_horarios_horarios1`
    FOREIGN KEY (`idhorarios` )
    REFERENCES `mydb`.`horarios` (`idhorarios` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `mydb`.`laboratorios`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`laboratorios` (`idlaboratorios`, `nombrelaboratorios`) VALUES (105, 'AT-105');
INSERT INTO `mydb`.`laboratorios` (`idlaboratorios`, `nombrelaboratorios`) VALUES (106, 'AT-106');
INSERT INTO `mydb`.`laboratorios` (`idlaboratorios`, `nombrelaboratorios`) VALUES (219, 'AT-219');
INSERT INTO `mydb`.`laboratorios` (`idlaboratorios`, `nombrelaboratorios`) VALUES (220, 'AT-220');

COMMIT;

-- -----------------------------------------------------
-- Data for table `mydb`.`divisiones`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`divisiones` (`iddivisiones`, `nombredivision`) VALUES (1, 'CBI');
INSERT INTO `mydb`.`divisiones` (`iddivisiones`, `nombredivision`) VALUES (2, 'CBS');
INSERT INTO `mydb`.`divisiones` (`iddivisiones`, `nombredivision`) VALUES (3, 'CSH');

COMMIT;

-- -----------------------------------------------------
-- Data for table `mydb`.`profesores`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`profesores` (`idprofesores`, `nombre`, `numempleado`, `correo`) VALUES (1, 'juanito perez lopez', '2929', 'juanito@xanum.com');
INSERT INTO `mydb`.`profesores` (`idprofesores`, `nombre`, `numempleado`, `correo`) VALUES (2, 'lorenzo cardenas ', '2012', 'lorenzo@xanum.com');
INSERT INTO `mydb`.`profesores` (`idprofesores`, `nombre`, `numempleado`, `correo`) VALUES (3, 'jose cardenas', '2011', 'jose@xanum.com');
INSERT INTO `mydb`.`profesores` (`idprofesores`, `nombre`, `numempleado`, `correo`) VALUES (4, 'marco díaz', '1002', 'marco@xanum.com');

COMMIT;

-- -----------------------------------------------------
-- Data for table `mydb`.`uea`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`uea` (`iduea`, `nombreuea`, `siglas`, `clave`, `grupo`, `laboratorios_idlaboratorios`, `divisiones_iddivisiones`, `profesores_idprofesores`) VALUES (1, 'programación avanzada', 'PA01', '1234', 'grupo1', 105, 1, 1);
INSERT INTO `mydb`.`uea` (`iduea`, `nombreuea`, `siglas`, `clave`, `grupo`, `laboratorios_idlaboratorios`, `divisiones_iddivisiones`, `profesores_idprofesores`) VALUES (2, 'programación aplicada a la química', 'PAQ', '1342', 'grupo2', 106, 2, 2);
INSERT INTO `mydb`.`uea` (`iduea`, `nombreuea`, `siglas`, `clave`, `grupo`, `laboratorios_idlaboratorios`, `divisiones_iddivisiones`, `profesores_idprofesores`) VALUES (3, 'introducción a la programación', 'IP01', '1467', 'grupo3', 220, 1, 3);
INSERT INTO `mydb`.`uea` (`iduea`, `nombreuea`, `siglas`, `clave`, `grupo`, `laboratorios_idlaboratorios`, `divisiones_iddivisiones`, `profesores_idprofesores`) VALUES (4, 'sistemas operativos', 'SO', '1111', 'grupo4', 106, 1, 1);
INSERT INTO `mydb`.`uea` (`iduea`, `nombreuea`, `siglas`, `clave`, `grupo`, `laboratorios_idlaboratorios`, `divisiones_iddivisiones`, `profesores_idprofesores`) VALUES (5, 'programación en administración', 'PAD', '4642', 'grupo5', 219, 3, 4);
INSERT INTO `mydb`.`uea` (`iduea`, `nombreuea`, `siglas`, `clave`, `grupo`, `laboratorios_idlaboratorios`, `divisiones_iddivisiones`, `profesores_idprofesores`) VALUES (6, 'programación avanzada', 'PA02', '1300', 'grupo6', 220, 1, 2);

COMMIT;

-- -----------------------------------------------------
-- Data for table `mydb`.`recursos`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`recursos` (`idrecursos`, `recurso`) VALUES (1, 'Ubuntu 12.04');
INSERT INTO `mydb`.`recursos` (`idrecursos`, `recurso`) VALUES (2, 'Windows 7');
INSERT INTO `mydb`.`recursos` (`idrecursos`, `recurso`) VALUES (3, 'Geogebra');
INSERT INTO `mydb`.`recursos` (`idrecursos`, `recurso`) VALUES (4, 'Eclipse');
INSERT INTO `mydb`.`recursos` (`idrecursos`, `recurso`) VALUES (5, 'Netbeans');

COMMIT;

-- -----------------------------------------------------
-- Data for table `mydb`.`usuarioadmin`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`usuarioadmin` (`idusuarioadmin`, `usuario`, `pass`, `correo`) VALUES (1, 'admin', 'admin', 'admin@correo.com');

COMMIT;

-- -----------------------------------------------------
-- Data for table `mydb`.`laboratorios_has_recursos`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`laboratorios_has_recursos` (`laboratorios_idlaboratorios`, `recursos_idrecursos`) VALUES (105, 1);
INSERT INTO `mydb`.`laboratorios_has_recursos` (`laboratorios_idlaboratorios`, `recursos_idrecursos`) VALUES (106, 1);
INSERT INTO `mydb`.`laboratorios_has_recursos` (`laboratorios_idlaboratorios`, `recursos_idrecursos`) VALUES (219, 1);
INSERT INTO `mydb`.`laboratorios_has_recursos` (`laboratorios_idlaboratorios`, `recursos_idrecursos`) VALUES (220, 2);
INSERT INTO `mydb`.`laboratorios_has_recursos` (`laboratorios_idlaboratorios`, `recursos_idrecursos`) VALUES (105, 2);
INSERT INTO `mydb`.`laboratorios_has_recursos` (`laboratorios_idlaboratorios`, `recursos_idrecursos`) VALUES (105, 3);
INSERT INTO `mydb`.`laboratorios_has_recursos` (`laboratorios_idlaboratorios`, `recursos_idrecursos`) VALUES (106, 2);
INSERT INTO `mydb`.`laboratorios_has_recursos` (`laboratorios_idlaboratorios`, `recursos_idrecursos`) VALUES (106, 3);
INSERT INTO `mydb`.`laboratorios_has_recursos` (`laboratorios_idlaboratorios`, `recursos_idrecursos`) VALUES (219, 3);

COMMIT;

-- -----------------------------------------------------
-- Data for table `mydb`.`dias`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`dias` (`iddias`, `nombredia`) VALUES (1, 'lunes');
INSERT INTO `mydb`.`dias` (`iddias`, `nombredia`) VALUES (2, 'martes');
INSERT INTO `mydb`.`dias` (`iddias`, `nombredia`) VALUES (3, 'miercoles');
INSERT INTO `mydb`.`dias` (`iddias`, `nombredia`) VALUES (4, 'jueves');
INSERT INTO `mydb`.`dias` (`iddias`, `nombredia`) VALUES (5, 'viernes');

COMMIT;

-- -----------------------------------------------------
-- Data for table `mydb`.`dias_uea`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`dias_uea` (`dias_iddias`, `uea_iduea`) VALUES (1, 1);
INSERT INTO `mydb`.`dias_uea` (`dias_iddias`, `uea_iduea`) VALUES (1, 2);
INSERT INTO `mydb`.`dias_uea` (`dias_iddias`, `uea_iduea`) VALUES (1, 3);
INSERT INTO `mydb`.`dias_uea` (`dias_iddias`, `uea_iduea`) VALUES (2, 1);
INSERT INTO `mydb`.`dias_uea` (`dias_iddias`, `uea_iduea`) VALUES (3, 2);
INSERT INTO `mydb`.`dias_uea` (`dias_iddias`, `uea_iduea`) VALUES (4, 1);
INSERT INTO `mydb`.`dias_uea` (`dias_iddias`, `uea_iduea`) VALUES (5, 4);
INSERT INTO `mydb`.`dias_uea` (`dias_iddias`, `uea_iduea`) VALUES (5, 2);

COMMIT;

-- -----------------------------------------------------
-- Data for table `mydb`.`semanas`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`semanas` (`idsemanas`, `semana`) VALUES (1, 'uno');
INSERT INTO `mydb`.`semanas` (`idsemanas`, `semana`) VALUES (2, 'dos');
INSERT INTO `mydb`.`semanas` (`idsemanas`, `semana`) VALUES (3, 'tres');
INSERT INTO `mydb`.`semanas` (`idsemanas`, `semana`) VALUES (4, 'cuatro');
INSERT INTO `mydb`.`semanas` (`idsemanas`, `semana`) VALUES (5, 'cinco');
INSERT INTO `mydb`.`semanas` (`idsemanas`, `semana`) VALUES (6, 'seis');
INSERT INTO `mydb`.`semanas` (`idsemanas`, `semana`) VALUES (7, 'siete');
INSERT INTO `mydb`.`semanas` (`idsemanas`, `semana`) VALUES (8, 'ocho');
INSERT INTO `mydb`.`semanas` (`idsemanas`, `semana`) VALUES (9, 'nueve');
INSERT INTO `mydb`.`semanas` (`idsemanas`, `semana`) VALUES (10, 'diez');
INSERT INTO `mydb`.`semanas` (`idsemanas`, `semana`) VALUES (11, 'once');
INSERT INTO `mydb`.`semanas` (`idsemanas`, `semana`) VALUES (12, 'doce');
INSERT INTO `mydb`.`semanas` (`idsemanas`, `semana`) VALUES (13, 'doce-bis');

COMMIT;

-- -----------------------------------------------------
-- Data for table `mydb`.`semanas_has_dias`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`semanas_has_dias` (`semanas_idsemanas`, `dias_has_uea_dias_iddias`, `dias_has_uea_uea_iduea`) VALUES (1, 1, 1);
INSERT INTO `mydb`.`semanas_has_dias` (`semanas_idsemanas`, `dias_has_uea_dias_iddias`, `dias_has_uea_uea_iduea`) VALUES (1, 1, 2);
INSERT INTO `mydb`.`semanas_has_dias` (`semanas_idsemanas`, `dias_has_uea_dias_iddias`, `dias_has_uea_uea_iduea`) VALUES (1, 1, 3);
INSERT INTO `mydb`.`semanas_has_dias` (`semanas_idsemanas`, `dias_has_uea_dias_iddias`, `dias_has_uea_uea_iduea`) VALUES (1, 2, 1);
INSERT INTO `mydb`.`semanas_has_dias` (`semanas_idsemanas`, `dias_has_uea_dias_iddias`, `dias_has_uea_uea_iduea`) VALUES (2, 2, 1);
INSERT INTO `mydb`.`semanas_has_dias` (`semanas_idsemanas`, `dias_has_uea_dias_iddias`, `dias_has_uea_uea_iduea`) VALUES (2, 3, 2);
INSERT INTO `mydb`.`semanas_has_dias` (`semanas_idsemanas`, `dias_has_uea_dias_iddias`, `dias_has_uea_uea_iduea`) VALUES (3, 1, 1);
INSERT INTO `mydb`.`semanas_has_dias` (`semanas_idsemanas`, `dias_has_uea_dias_iddias`, `dias_has_uea_uea_iduea`) VALUES (3, 2, 1);
INSERT INTO `mydb`.`semanas_has_dias` (`semanas_idsemanas`, `dias_has_uea_dias_iddias`, `dias_has_uea_uea_iduea`) VALUES (4, 2, 1);
INSERT INTO `mydb`.`semanas_has_dias` (`semanas_idsemanas`, `dias_has_uea_dias_iddias`, `dias_has_uea_uea_iduea`) VALUES (4, 4, 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `mydb`.`horarios`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`horarios` (`idhorarios`, `hora`) VALUES (1, '08:00');
INSERT INTO `mydb`.`horarios` (`idhorarios`, `hora`) VALUES (2, '08:30');
INSERT INTO `mydb`.`horarios` (`idhorarios`, `hora`) VALUES (3, '09:00');
INSERT INTO `mydb`.`horarios` (`idhorarios`, `hora`) VALUES (4, '09:30');
INSERT INTO `mydb`.`horarios` (`idhorarios`, `hora`) VALUES (5, '10:00');
INSERT INTO `mydb`.`horarios` (`idhorarios`, `hora`) VALUES (6, '10:30');
INSERT INTO `mydb`.`horarios` (`idhorarios`, `hora`) VALUES (7, '11:00');
INSERT INTO `mydb`.`horarios` (`idhorarios`, `hora`) VALUES (8, '11:30');
INSERT INTO `mydb`.`horarios` (`idhorarios`, `hora`) VALUES (9, '12:00');
INSERT INTO `mydb`.`horarios` (`idhorarios`, `hora`) VALUES (10, '12:30');
INSERT INTO `mydb`.`horarios` (`idhorarios`, `hora`) VALUES (11, '13:00');
INSERT INTO `mydb`.`horarios` (`idhorarios`, `hora`) VALUES (12, '13:30');
INSERT INTO `mydb`.`horarios` (`idhorarios`, `hora`) VALUES (13, '14:00');
INSERT INTO `mydb`.`horarios` (`idhorarios`, `hora`) VALUES (14, '14:30');
INSERT INTO `mydb`.`horarios` (`idhorarios`, `hora`) VALUES (15, '15:00');
INSERT INTO `mydb`.`horarios` (`idhorarios`, `hora`) VALUES (16, '15:30');
INSERT INTO `mydb`.`horarios` (`idhorarios`, `hora`) VALUES (17, '16:00');
INSERT INTO `mydb`.`horarios` (`idhorarios`, `hora`) VALUES (18, '16:30');
INSERT INTO `mydb`.`horarios` (`idhorarios`, `hora`) VALUES (19, '17:00');
INSERT INTO `mydb`.`horarios` (`idhorarios`, `hora`) VALUES (20, '17:30');
INSERT INTO `mydb`.`horarios` (`idhorarios`, `hora`) VALUES (21, '18:00');
INSERT INTO `mydb`.`horarios` (`idhorarios`, `hora`) VALUES (22, '18:30');
INSERT INTO `mydb`.`horarios` (`idhorarios`, `hora`) VALUES (23, '19:00');
INSERT INTO `mydb`.`horarios` (`idhorarios`, `hora`) VALUES (24, '19:30');
INSERT INTO `mydb`.`horarios` (`idhorarios`, `hora`) VALUES (25, '20:00');
INSERT INTO `mydb`.`horarios` (`idhorarios`, `hora`) VALUES (26, '20:30');
INSERT INTO `mydb`.`horarios` (`idhorarios`, `hora`) VALUES (27, '21:00');

COMMIT;

-- -----------------------------------------------------
-- Data for table `mydb`.`dias_uea_has_horarios`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (1, 1, 1);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (1, 2, 1);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (1, 3, 1);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (1, 4, 2);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (1, 5, 2);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (1, 6, 2);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (1, 7, 2);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (1, 8, 1);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (1, 9, 1);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (1, 10, 1);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (1, 11, 3);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (1, 12, 3);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (1, 13, NULL);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (1, 14, NULL);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (1, 15, NULL);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (1, 16, NULL);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (1, 17, 3);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (1, 18, 3);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (1, 19, 3);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (1, 20, NULL);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (1, 21, NULL);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (1, 22, NULL);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (1, 23, NULL);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (1, 24, NULL);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (1, 25, NULL);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (1, 26, NULL);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (1, 27, 1);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (2, 1, 1);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (2, 2, 1);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (2, 3, 1);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (2, 4, NULL);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (2, 5, NULL);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (2, 6, NULL);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (2, 7, NULL);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (2, 8, NULL);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (2, 9, NULL);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (2, 10, NULL);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (2, 11, NULL);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (2, 12, NULL);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (2, 13, NULL);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (2, 14, NULL);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (2, 15, NULL);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (2, 16, NULL);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (2, 17, NULL);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (2, 18, NULL);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (2, 19, NULL);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (2, 20, NULL);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (2, 21, NULL);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (2, 22, NULL);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (2, 23, NULL);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (2, 24, NULL);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (2, 25, NULL);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (2, 26, NULL);
INSERT INTO `mydb`.`dias_uea_has_horarios` (`iddias`, `idhorarios`, `iduea`) VALUES (2, 27, NULL);

COMMIT;
