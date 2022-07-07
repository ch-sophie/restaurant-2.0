CREATE TABLE `demo`.`employees` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(100) NOT NULL , `address` VARCHAR(255) NOT NULL , `salary` INT(10) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
ALTER TABLE `employees` CHANGE `address` `email` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
ALTER TABLE `employees` CHANGE `salary` `message` VARCHAR(256) NOT NULL;
