SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `event_subscriber`.`avaliador`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `event_subscriber`.`avaliador` ;

CREATE TABLE IF NOT EXISTS `event_subscriber`.`avaliador` (
  `tx_login` VARCHAR(25) NOT NULL,
  `nm_avaliador` VARCHAR(75) NOT NULL,
  `bn_senha` BINARY(40) NOT NULL COMMENT ' /* comment truncated */ /*SHA-1 hashed*/',
  `st_avaliador` CHAR(1) NOT NULL COMMENT ' /* comment truncated */ /*A - ativo, I - inativo*/',
  PRIMARY KEY (`tx_login`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `event_subscriber`.`inscrito`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `event_subscriber`.`inscrito` ;

CREATE TABLE IF NOT EXISTS `event_subscriber`.`inscrito` (
  `id_inscrito` INT NOT NULL AUTO_INCREMENT,
  `nr_ra` SMALLINT NULL,
  `nr_rg` VARCHAR(20) NOT NULL,
  `nm_inscrito` VARCHAR(100) NOT NULL,
  `tx_turma` VARCHAR(5) NULL,
  `dt_nasc` DATE NOT NULL,
  `tx_email` VARCHAR(100) NOT NULL,
  `tx_fone` DECIMAL(11,0) NOT NULL,
  PRIMARY KEY (`id_inscrito`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `event_subscriber`.`evento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `event_subscriber`.`evento` ;

CREATE TABLE IF NOT EXISTS `event_subscriber`.`evento` (
  `id_evento` INT NOT NULL AUTO_INCREMENT,
  `nm_evento` VARCHAR(50) NOT NULL,
  `dc_evento` VARCHAR(2000) NOT NULL,
  `dt_inicio` DATETIME NOT NULL,
  `dt_fim` DATETIME NOT NULL,
  `nr_vagas` SMALLINT NOT NULL,
  `tx_condicoes` VARCHAR(200) NULL,
  `st_avaliacao` CHAR(1) NOT NULL,
  `tx_login_avaliador` VARCHAR(25) NULL,
  `in_permite_menor` CHAR(1) NOT NULL,
  `in_solicita_autorizacao` CHAR(1) NOT NULL,
  PRIMARY KEY (`id_evento`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `event_subscriber`.`inscricao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `event_subscriber`.`inscricao` ;

CREATE TABLE IF NOT EXISTS `event_subscriber`.`inscricao` (
  `id_evento` INT NOT NULL,
  `id_inscrito` INT NOT NULL,
  `dt_inscricao` DATETIME NOT NULL,
  `tx_login_avaliador` VARCHAR(25) NULL,
  `st_avaliacao` CHAR(1) NULL,
  `dt_avaliacao` DATETIME NULL,
  `tx_observacao_avaliacao` VARCHAR(255) NULL,
  `tx_verificacao_liberacao` CHAR(10) NULL,
  PRIMARY KEY (`id_evento`, `id_inscrito`),
  CONSTRAINT `fk_inscricao_avaliador`
    FOREIGN KEY (`tx_login_avaliador`)
    REFERENCES `event_subscriber`.`avaliador` (`tx_login`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inscricao_evento1`
    FOREIGN KEY (`id_evento`)
    REFERENCES `event_subscriber`.`evento` (`id_evento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inscricao_inscrito1`
    FOREIGN KEY (`id_inscrito`)
    REFERENCES `event_subscriber`.`inscrito` (`id_inscrito`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_inscricao_avaliador_idx` ON `event_subscriber`.`inscricao` (`tx_login_avaliador` ASC);

CREATE INDEX `fk_inscricao_inscrito1_idx` ON `event_subscriber`.`inscricao` (`id_inscrito` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
