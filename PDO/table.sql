CREATE TABLE `northwind`.`cuentasbancarias` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `cantidad` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC) VISIBLE);

INSERT INTO northwind.cuentasbancarias values (1,"Diana", 500);
INSERT INTO northwind.cuentasbancarias values (2,"Alejandro", 250);