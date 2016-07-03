/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  Revathy
 * Created: 03-Jul-2016

    Before running the below script please create a new database named 'blog'
*/

CREATE TABLE `blog`.`Author` 
(
	`AuthorId` INT NOT NULL AUTO_INCREMENT , 
	`FirstName` VARCHAR(250) NOT NULL , 
	`LastName` VARCHAR(250) NOT NULL , 
	`Email` VARCHAR(250) NOT NULL , 
	`Password` VARCHAR(100) NOT NULL , 
	`CanCreatePost` BIT(1) NOT NULL , 
	`IsActive` BIT(1) NOT NULL , 
	`CreatedOn` DATE NOT NULL , 
	PRIMARY KEY (`AuthorId`)
) ENGINE = InnoDB;
