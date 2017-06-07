-- MySQL Script generated by MySQL Workbench
-- 05/30/17 19:10:46
-- Model: New Model    Version: 1.0
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema sisnet
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `sisnet` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
-- -----------------------------------------------------
-- Schema ejemplosisventa
-- -----------------------------------------------------
USE `sisnet` ;

-- -----------------------------------------------------
-- Table `sisnet`.`sucursal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisnet`.`sucursal` (
  `idSucursal` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `razonSocial` VARCHAR(45) NULL,
  `rfc` VARCHAR(45) NULL,
  `direccion` VARCHAR(45) NULL,
  `ciudad` VARCHAR(45) NULL,
  `telefono` VARCHAR(45) NULL,
  `codigoPost` VARCHAR(45) NULL,
  PRIMARY KEY (`idSucursal`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sisnet`.`almacen`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisnet`.`almacen` (
  `idAlmacen` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `direccion` VARCHAR(45) NULL,
  `idfSucursal` INT NOT NULL,
  PRIMARY KEY (`idAlmacen`),
  INDEX `idSucursal_idx` (`idfSucursal` ASC),
  CONSTRAINT `idfSucursal`
    FOREIGN KEY (`idfSucursal`)
    REFERENCES `sisnet`.`sucursal` (`idSucursal`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sisnet`.`producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisnet`.`producto` (
  `idProducto` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `descripcion` VARCHAR(45) NULL,
  `image` VARCHAR(45) NULL,
  `precio` DOUBLE NULL,
  PRIMARY KEY (`idProducto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sisnet`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisnet`.`categoria` (
  `idCategoria` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`idCategoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sisnet`.`dtalmacen`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisnet`.`dtalmacen` (
  `iddtAlmacen` INT NOT NULL AUTO_INCREMENT,
  `idProducto` INT NOT NULL,
  `idAlmacen` INT NOT NULL,
  `stock` INT NOT NULL,
  INDEX `idProducto_idx` (`idProducto` ASC),
  INDEX `idAlmacen_idx` (`idAlmacen` ASC),
  PRIMARY KEY (`iddtAlmacen`),
  CONSTRAINT `idProducto`
    FOREIGN KEY (`idProducto`)
    REFERENCES `sisnet`.`producto` (`idProducto`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `idAlmacen`
    FOREIGN KEY (`idAlmacen`)
    REFERENCES `sisnet`.`almacen` (`idAlmacen`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sisnet`.`equipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisnet`.`equipo` (
  `idEquipo` INT NOT NULL,
  `marca` VARCHAR(45) NULL,
  `modelo` VARCHAR(45) NULL,
  `serie` VARCHAR(45) NULL,
  PRIMARY KEY (`idEquipo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sisnet`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisnet`.`users` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `idSucursal` INT NOT NULL,
  `name` VARCHAR(255) CHARACTER SET 'utf8mb4' NOT NULL,
  `email` VARCHAR(255) CHARACTER SET 'utf8mb4' NOT NULL,
  `password` VARCHAR(255) CHARACTER SET 'utf8mb4' NOT NULL,
  `remember_token` VARCHAR(100) CHARACTER SET 'utf8mb4' NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `rol` VARCHAR(45) NULL,
  `celular` VARCHAR(45) NULL,
  `turno` VARCHAR(45) NULL,
  INDEX `idSucursal_idx` (`idSucursal` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `idSucursal`
    FOREIGN KEY (`idSucursal`)
    REFERENCES `sisnet`.`sucursal` (`idSucursal`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `sisnet`.`servicio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisnet`.`servicio` (
  `idServicio` INT NOT NULL,
  `idUsuario` INT(10) NOT NULL,
  `nombreCliente` VARCHAR(45) NULL,
  `telefono` VARCHAR(45) NULL,
  `informacionAdd` VARCHAR(45) NULL,
  `condicionEntrada` VARCHAR(45) NULL,
  `descripcion` VARCHAR(45) NULL,
  `problema` VARCHAR(45) NULL,
  `solucion` VARCHAR(45) NULL,
  `precio` VARCHAR(45) NULL,
  `tiposervicio` VARCHAR(45) NULL,
  PRIMARY KEY (`idServicio`),
  INDEX `idUsuario_idx` (`idUsuario` ASC),
  CONSTRAINT `idUsuario`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `sisnet`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sisnet`.`dtservicio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisnet`.`dtservicio` (
  `iddtservicio` INT NOT NULL,
  `idServicio` INT NOT NULL,
  `idEquipo` INT NOT NULL,
  `status` VARCHAR(45) NULL,
  `costoPieza` VARCHAR(45) NULL,
  `totalservicio` VARCHAR(45) NULL,
  `fecha` DATE NULL,
  `hora` TIME NULL,
  `adelanto` INT NULL,
  `pendiente` INT NULL,
  PRIMARY KEY (`iddtservicio`),
  INDEX `idServicio_idx` (`idServicio` ASC),
  INDEX `idEquipo_idx` (`idEquipo` ASC),
  CONSTRAINT `idServicio`
    FOREIGN KEY (`idServicio`)
    REFERENCES `sisnet`.`servicio` (`idServicio`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `idEquipo`
    FOREIGN KEY (`idEquipo`)
    REFERENCES `sisnet`.`equipo` (`idEquipo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sisnet`.`venta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisnet`.`venta` (
  `idVenta` INT NOT NULL,
  `idfUsuario` INT(10) NULL,
  `fecha` DATE NULL,
  `hora` TIME NULL,
  `totalventa` DOUBLE NULL,
  PRIMARY KEY (`idVenta`),
  INDEX `idfUsuario_idx` (`idfUsuario` ASC),
  CONSTRAINT `idfUsuario`
    FOREIGN KEY (`idfUsuario`)
    REFERENCES `sisnet`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sisnet`.`dtventa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisnet`.`dtventa` (
  `iddtVenta` INT NOT NULL,
  `idVenta` INT NOT NULL,
  `idfProducto` INT NOT NULL,
  `cantidad` VARCHAR(45) NOT NULL,
  `subtotal` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`iddtVenta`),
  INDEX `idProducto_idx` (`idfProducto` ASC),
  INDEX `idVenta_idx` (`idVenta` ASC),
  CONSTRAINT `idVenta`
    FOREIGN KEY (`idVenta`)
    REFERENCES `sisnet`.`venta` (`idVenta`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `idfProducto`
    FOREIGN KEY (`idfProducto`)
    REFERENCES `sisnet`.`producto` (`idProducto`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
