-- MySQL Script generated by MySQL Workbench
-- Mon Jul  3 09:39:35 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema crudTeste
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema crudTeste
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `crudTeste` DEFAULT CHARACTER SET utf8 ;
USE `crudTeste` ;

-- -----------------------------------------------------
-- Table `crudTeste`.`profissao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `crudTeste`.`profissao` (
  `idProfissao` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idProfissao`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crudTeste`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `crudTeste`.`usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `idProfissao` INT NOT NULL,
  `nome` VARCHAR(255) NOT NULL,
  `dataNascimento` DATE NOT NULL,
  PRIMARY KEY (`idUsuario`),
  INDEX `fk_usuario_profissao_idx` (`idProfissao` ASC),
  CONSTRAINT `fk_usuario_profissao`
    FOREIGN KEY (`idProfissao`)
    REFERENCES `crudTeste`.`profissao` (`idProfissao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
