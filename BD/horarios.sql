SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `mydb` ;
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET latin1 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`laboratorios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`laboratorios` (
  `idlaboratorios` INT NOT NULL ,
  `nombrelaboratorios` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idlaboratorios`) )
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `mydb`.`recursos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`recursos` (
  `idrecursos` INT NOT NULL ,
  `recurso` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idrecursos`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`divisiones`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`divisiones` (
  `iddivisiones` INT NOT NULL ,
  `nombredivision` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`iddivisiones`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`uea`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`uea` (
  `iduea` INT NOT NULL ,
  `nombreuea` VARCHAR(45) NOT NULL ,
  `horarioi` TIME NOT NULL ,
  `horariof` TIME NOT NULL ,
  `divisiones_iddivisiones` INT NOT NULL ,
  PRIMARY KEY (`iduea`) ,
  INDEX `fk_uea_divisiones1` (`divisiones_iddivisiones` ASC) ,
  CONSTRAINT `fk_uea_divisiones1`
    FOREIGN KEY (`divisiones_iddivisiones` )
    REFERENCES `mydb`.`divisiones` (`iddivisiones` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`usuarioAdmin`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`usuarioAdmin` (
  `idusuario` INT NOT NULL ,
  `nombreusuario` VARCHAR(45) NOT NULL ,
  `contrasennia usuario` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idusuario`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`laboratorios_has_recursos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`laboratorios_has_recursos` (
  `laboratorios_idlaboratorios` INT NOT NULL ,
  `recursos_idrecursos` INT NOT NULL ,
  PRIMARY KEY (`laboratorios_idlaboratorios`, `recursos_idrecursos`) ,
  INDEX `fk_laboratorios_has_recursos_recursos1` (`recursos_idrecursos` ASC) ,
  INDEX `fk_laboratorios_has_recursos_laboratorios` (`laboratorios_idlaboratorios` ASC) )
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `mydb`.`laboratorios_has_uea`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`laboratorios_has_uea` (
  `laboratorios_idlaboratorios` INT NOT NULL ,
  `uea_iduea` INT NOT NULL ,
  PRIMARY KEY (`laboratorios_idlaboratorios`, `uea_iduea`) ,
  INDEX `fk_laboratorios_has_uea_uea1` (`uea_iduea` ASC) ,
  INDEX `fk_laboratorios_has_uea_laboratorios1` (`laboratorios_idlaboratorios` ASC) )
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `mydb`.`profesores`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`profesores` (
  `idprofesores` INT NOT NULL ,
  `nombre` VARCHAR(45) NOT NULL ,
  `apellido` VARCHAR(45) NOT NULL ,
  `numempleado` INT NOT NULL ,
  `correo` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idprofesores`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`grupo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`grupo` (
  `idgrupo` INT NOT NULL ,
  `nombregrupo` VARCHAR(45) NOT NULL ,
  `profesores_idprofesores` INT NOT NULL ,
  `uea_iduea` INT NOT NULL ,
  PRIMARY KEY (`idgrupo`) ,
  INDEX `fk_grupo_profesores1` (`profesores_idprofesores` ASC) ,
  INDEX `fk_grupo_uea1` (`uea_iduea` ASC) ,
  CONSTRAINT `fk_grupo_profesores1`
    FOREIGN KEY (`profesores_idprofesores` )
    REFERENCES `mydb`.`profesores` (`idprofesores` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_grupo_uea1`
    FOREIGN KEY (`uea_iduea` )
    REFERENCES `mydb`.`uea` (`iduea` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
