-- MySQL Script generated by MySQL Workbench
-- 05/01/15 19:29:13
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema amun12
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema amun12
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `amun12` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `amun12` ;

-- -----------------------------------------------------
-- Table `amun12`.`lista_paises`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `amun12`.`lista_paises` (
  `id` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `nome_UNIQUE` (`nome` ASC),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `amun12`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `amun12`.`usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(100) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `nome` VARCHAR(80) NOT NULL,
  `sobrenome` VARCHAR(200) NOT NULL,
  `nome_cracha` VARCHAR(45) NOT NULL,
  `celular` VARCHAR(45) NOT NULL,
  `cep` VARCHAR(20) NOT NULL,
  `cidade` VARCHAR(45) NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  `bairro` VARCHAR(45) NOT NULL,
  `identification` VARCHAR(20) NOT NULL,
  `tipo` INT NOT NULL,
  `status` INT NOT NULL,
  `situacao_pagamento` INT NULL,
  `lista_paises_id` INT NOT NULL,
  PRIMARY KEY (`idusuario`),
  INDEX `fk_usuario_lista_paises1_idx` (`lista_paises_id` ASC),
  CONSTRAINT `fk_usuario_lista_paises1`
    FOREIGN KEY (`lista_paises_id`)
    REFERENCES `amun12`.`lista_paises` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `amun12`.`delegacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `amun12`.`delegacao` (
  `iddelegacao` INT NOT NULL AUTO_INCREMENT,
  `universidade` VARCHAR(200) NOT NULL,
  `curso` VARCHAR(45) NOT NULL,
  `qtd_integrantes` INT NOT NULL,
  `usuario_idusuario` INT NOT NULL,
  `qtd_gratuidade` INT NOT NULL,
  `qtd_pacotes` VARCHAR(45) NULL,
  PRIMARY KEY (`iddelegacao`),
  INDEX `fk_delegacao_usuario1_idx` (`usuario_idusuario` ASC),
  CONSTRAINT `fk_delegacao_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `amun12`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `amun12`.`paises`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `amun12`.`paises` (
  `idpaises` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `qtd_participantes` INT NOT NULL,
  `delegacao_iddelegacao` INT NULL,
  PRIMARY KEY (`idpaises`),
  INDEX `fk_paises_delegacao1_idx` (`delegacao_iddelegacao` ASC),
  CONSTRAINT `fk_paises_delegacao1`
    FOREIGN KEY (`delegacao_iddelegacao`)
    REFERENCES `amun12`.`delegacao` (`iddelegacao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `amun12`.`Comite`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `amun12`.`Comite` (
  `idComite` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NULL,
  PRIMARY KEY (`idComite`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `amun12`.`usuario_has_delegacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `amun12`.`usuario_has_delegacao` (
  `usuario_idusuario` INT NOT NULL,
  `comite_iddelegacao` INT NOT NULL,
  PRIMARY KEY (`usuario_idusuario`, `comite_iddelegacao`),
  INDEX `fk_usuario_has_comite_comite1_idx` (`comite_iddelegacao` ASC),
  INDEX `fk_usuario_has_comite_usuario_idx` (`usuario_idusuario` ASC),
  CONSTRAINT `fk_usuario_has_comite_usuario`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `amun12`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_has_comite_comite1`
    FOREIGN KEY (`comite_iddelegacao`)
    REFERENCES `amun12`.`delegacao` (`iddelegacao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `amun12`.`paises_has_delegacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `amun12`.`paises_has_delegacao` (
  `paises_idpaises` INT NOT NULL,
  `delegacao_iddelegacao` INT NOT NULL,
  `status_aprovacao` INT NOT NULL,
  `numero_combinacao` INT NOT NULL,
  INDEX `fk_paises_has_delegacao_paises1_idx` (`paises_idpaises` ASC),
  INDEX `fk_paises_has_delegacao_delegacao1_idx` (`delegacao_iddelegacao` ASC),
  CONSTRAINT `fk_paises_has_delegacao_paises1`
    FOREIGN KEY (`paises_idpaises`)
    REFERENCES `amun12`.`paises` (`idpaises`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_paises_has_delegacao_delegacao1`
    FOREIGN KEY (`delegacao_iddelegacao`)
    REFERENCES `amun12`.`delegacao` (`iddelegacao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `amun12`.`delegado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `amun12`.`delegado` (
  `iddelegado` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `nome_cracha` VARCHAR(45) NOT NULL,
  `email` VARCHAR(200) NOT NULL,
  `celular` VARCHAR(45) NOT NULL,
  `identification` VARCHAR(45) NOT NULL,
  `universidade` VARCHAR(45) NOT NULL,
  `curso` VARCHAR(45) NOT NULL,
  `delegacao_iddelegacao` INT NOT NULL,
  PRIMARY KEY (`iddelegado`, `delegacao_iddelegacao`),
  INDEX `fk_delegado_delegacao1_idx` (`delegacao_iddelegacao` ASC),
  CONSTRAINT `fk_delegado_delegacao1`
    FOREIGN KEY (`delegacao_iddelegacao`)
    REFERENCES `amun12`.`delegacao` (`iddelegacao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `amun12`.`Comite_has_paises`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `amun12`.`Comite_has_paises` (
  `qtd_vagas` INT NOT NULL,
  `paises_idpaises` INT NOT NULL,
  `Comite_idComite` INT NOT NULL,
  `Comite_vagas_ocupadas` INT NOT NULL,
  INDEX `fk_Comite_has_paises_paises1_idx` (`paises_idpaises` ASC),
  INDEX `fk_Comite_has_paises_Comite1_idx` (`Comite_idComite` ASC),
  CONSTRAINT `fk_Comite_has_paises_paises1`
    FOREIGN KEY (`paises_idpaises`)
    REFERENCES `amun12`.`paises` (`idpaises`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comite_has_paises_Comite1`
    FOREIGN KEY (`Comite_idComite`)
    REFERENCES `amun12`.`Comite` (`idComite`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `amun12`.`individual_pa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `amun12`.`individual_pa` (
  `idindividual_pa` INT NOT NULL AUTO_INCREMENT,
  `universidade` VARCHAR(100) NOT NULL,
  `curso` VARCHAR(100) NOT NULL,
  `experiencia` VARCHAR(45) NOT NULL,
  `pergunta` VARCHAR(5126) NOT NULL,
  `delegation_interest` INT NOT NULL,
  `social_events` INT NOT NULL,
  `usuario_idusuario` INT NOT NULL,
  PRIMARY KEY (`idindividual_pa`),
  INDEX `fk_individual_pa_usuario1_idx` (`usuario_idusuario` ASC),
  CONSTRAINT `fk_individual_pa_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `amun12`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `amun12`.`individual_icty`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `amun12`.`individual_icty` (
  `idindividual_icty` INT NOT NULL AUTO_INCREMENT,
  `universidade` VARCHAR(100) NOT NULL,
  `curso` VARCHAR(100) NOT NULL,
  `preferencies` VARCHAR(45) NOT NULL,
  `delegation_interest` INT NOT NULL,
  `social_events` INT NOT NULL,
  `usuario_idusuario` INT NOT NULL,
  PRIMARY KEY (`idindividual_icty`),
  INDEX `fk_individual_icty_usuario1_idx` (`usuario_idusuario` ASC),
  CONSTRAINT `fk_individual_icty_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `amun12`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `amun12`.`qtd_vagas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `amun12`.`qtd_vagas` (
  `id` INT NOT NULL,
  `qtd_vagas_delegacao` INT NOT NULL,
  `qtd_vagas_icty` INT NOT NULL,
  `qtd_vagas_pa` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `amun12`.`pagamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `amun12`.`pagamento` (
  `idpagamento` INT NOT NULL AUTO_INCREMENT,
  `numero` VARCHAR(45) NOT NULL,
  `foto` VARCHAR(45) NOT NULL,
  `usuario_idusuario` INT NOT NULL,
  `valor` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idpagamento`),
  INDEX `fk_pagamento_usuario1_idx` (`usuario_idusuario` ASC),
  CONSTRAINT `fk_pagamento_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `amun12`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
