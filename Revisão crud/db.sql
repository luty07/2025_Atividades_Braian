
CREATE SCHEMA IF NOT EXISTS `banco` DEFAULT CHARACTER SET utf8 ;
USE `banco` ;


CREATE TABLE IF NOT EXISTS `banco`.`Usuario` (
  `id_Usuario` INT NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(45) NOT NULL,
  `Email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_Usuario`))

CREATE TABLE IF NOT EXISTS `banco`.`Tarefas` (
  `id_Tarefas` INT NOT NULL AUTO_INCREMENT,
  `id_Usuario` INT NOT NULL,
  `nome_Setor` VARCHAR(45) NOT NULL,
  `Prioridade` ENUM('baixa', 'media', 'alta') NULL,
  `descriçao` VARCHAR(1500) NULL,
  PRIMARY KEY (`id_Tarefas`),
  INDEX `fk_Tarefas_Usuario_idx` (`id_Usuario` ASC) VISIBLE,
  CONSTRAINT `fk_Tarefas_Usuario`
    FOREIGN KEY (`id_Usuario`)
    REFERENCES `banco`.`Usuario` (`id_Usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
