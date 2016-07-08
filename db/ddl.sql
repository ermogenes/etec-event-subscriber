SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `event_subscriber` ;
CREATE SCHEMA IF NOT EXISTS `event_subscriber` DEFAULT CHARACTER SET latin1 ;
USE `event_subscriber` ;

-- -----------------------------------------------------
-- Table `event_subscriber`.`avaliador`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `event_subscriber`.`avaliador` ;

CREATE TABLE IF NOT EXISTS `event_subscriber`.`avaliador` (
  `tx_login` VARCHAR(25) NOT NULL,
  `nm_avaliador` VARCHAR(75) NOT NULL,
  `bn_senha` BINARY(40) NOT NULL COMMENT 'SHA-1 hashed',
  `st_avaliador` CHAR(1) NOT NULL COMMENT 'A - ativo, I - inativo',
  PRIMARY KEY (`tx_login`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
