-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Usuario` (
  `idusuario` INT NOT NULL,
  `login` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `tipo` CHAR(1) NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idusuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Aluno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Aluno` (
  `Usuario_idusuario` INT NOT NULL,
  `matricula` VARCHAR(45) NOT NULL,
  `Turma` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Usuario_idusuario`),
  INDEX `fk_Aluno_Usuario_idx` (`Usuario_idusuario` ASC) VISIBLE,
  CONSTRAINT `fk_Aluno_Usuario`
    FOREIGN KEY (`Usuario_idusuario`)
    REFERENCES `mydb`.`Usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Professor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Professor` (
  `Usuario_idusuario` INT NOT NULL,
  `coordenador` CHAR NOT NULL,
  PRIMARY KEY (`Usuario_idusuario`),
  INDEX `fk_Professor_Usuario1_idx` (`Usuario_idusuario` ASC) VISIBLE,
  CONSTRAINT `fk_Professor_Usuario1`
    FOREIGN KEY (`Usuario_idusuario`)
    REFERENCES `mydb`.`Usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Curso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Curso` (
  `idCurso` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCurso`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Disciplina`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Disciplina` (
  `idDisciplina` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idDisciplina`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Documento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Documento` (
  `idDocumento` INT NOT NULL,
  `prazo` DATETIME NOT NULL,
  `Aluno_Usuario_idusuario` INT NOT NULL,
  PRIMARY KEY (`idDocumento`, `Aluno_Usuario_idusuario`),
  INDEX `fk_Documento_Aluno1_idx` (`Aluno_Usuario_idusuario` ASC) VISIBLE,
  CONSTRAINT `fk_Documento_Aluno1`
    FOREIGN KEY (`Aluno_Usuario_idusuario`)
    REFERENCES `mydb`.`Aluno` (`Usuario_idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Disciplina_has_Curso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Disciplina_has_Curso` (
  `Disciplina_idDisciplina` INT NOT NULL,
  `Curso_idCurso` INT NOT NULL,
  `Professor_Usuario_idusuario` INT NOT NULL,
  `Documento_idDocumento` INT NOT NULL,
  PRIMARY KEY (`Disciplina_idDisciplina`, `Curso_idCurso`, `Professor_Usuario_idusuario`, `Documento_idDocumento`),
  INDEX `fk_Disciplina_has_Curso_Curso1_idx` (`Curso_idCurso` ASC) VISIBLE,
  INDEX `fk_Disciplina_has_Curso_Disciplina1_idx` (`Disciplina_idDisciplina` ASC) VISIBLE,
  INDEX `fk_Disciplina_has_Curso_Professor1_idx` (`Professor_Usuario_idusuario` ASC) VISIBLE,
  INDEX `fk_Disciplina_has_Curso_Documento1_idx` (`Documento_idDocumento` ASC) VISIBLE,
  CONSTRAINT `fk_Disciplina_has_Curso_Disciplina1`
    FOREIGN KEY (`Disciplina_idDisciplina`)
    REFERENCES `mydb`.`Disciplina` (`idDisciplina`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Disciplina_has_Curso_Curso1`
    FOREIGN KEY (`Curso_idCurso`)
    REFERENCES `mydb`.`Curso` (`idCurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Disciplina_has_Curso_Professor1`
    FOREIGN KEY (`Professor_Usuario_idusuario`)
    REFERENCES `mydb`.`Professor` (`Usuario_idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Disciplina_has_Curso_Documento1`
    FOREIGN KEY (`Documento_idDocumento`)
    REFERENCES `mydb`.`Documento` (`idDocumento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Avisos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Avisos` (
  `Professor_Usuario_idusuario` INT NOT NULL,
  `Usuario_idusuario` INT NOT NULL,
  PRIMARY KEY (`Professor_Usuario_idusuario`, `Usuario_idusuario`),
  INDEX `fk_Mensagem_Usuario1_idx` (`Usuario_idusuario` ASC) VISIBLE,
  CONSTRAINT `fk_Mensagem_Professor1`
    FOREIGN KEY (`Professor_Usuario_idusuario`)
    REFERENCES `mydb`.`Professor` (`Usuario_idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Mensagem_Usuario1`
    FOREIGN KEY (`Usuario_idusuario`)
    REFERENCES `mydb`.`Usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Pergunta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Pergunta` (
  `idPergunta` INT NOT NULL,
  `descricao` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idPergunta`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Resposta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Resposta` (
  `idResposta` INT NOT NULL,
  `valor` VARCHAR(45) NOT NULL,
  `motivo` VARCHAR(45) NOT NULL,
  `Documento_idDocumento` INT NOT NULL,
  `Pergunta_idPergunta` INT NOT NULL,
  PRIMARY KEY (`idResposta`, `Documento_idDocumento`, `Pergunta_idPergunta`),
  INDEX `fk_Resposta_Documento1_idx` (`Documento_idDocumento` ASC) VISIBLE,
  INDEX `fk_Resposta_Pergunta1_idx` (`Pergunta_idPergunta` ASC) VISIBLE,
  CONSTRAINT `fk_Resposta_Documento1`
    FOREIGN KEY (`Documento_idDocumento`)
    REFERENCES `mydb`.`Documento` (`idDocumento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Resposta_Pergunta1`
    FOREIGN KEY (`Pergunta_idPergunta`)
    REFERENCES `mydb`.`Pergunta` (`idPergunta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
