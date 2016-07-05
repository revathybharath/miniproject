
CREATE TABLE `User`
(
  `UserId` Int NOT NULL AUTO_INCREMENT,
  `FirstName` Varchar(150) NOT NULL,
  `LastName` Varchar(150) NOT NULL,
  `Email` Varchar(150) NOT NULL,
  `Password` Varchar(100) NOT NULL,
  `IsActive` Bit(1) NOT NULL,
  `CreatedOn` Datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `RoleId` Int NOT NULL,
  PRIMARY KEY (`UserId`)
);

ALTER TABLE `User` ADD UNIQUE `Email` (`Email`);

CREATE TABLE `AuthorisationRole`
(
  `RoleId` Int NOT NULL AUTO_INCREMENT,
  `Name` Varchar(150) NOT NULL,
  `RoleDescription` Varchar(250),
  `CreatedOn` Datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`RoleId`)
);

CREATE TABLE `Category`
(
  `CategoryId` Int NOT NULL AUTO_INCREMENT,
  `Name` Varchar(150) NOT NULL,
  `CategoryDescription` Varchar(150),
  `CreatedOn` Datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`CategoryId`)
);

CREATE TABLE `Article`
(
  `ArticleId` Int NOT NULL AUTO_INCREMENT,
  `CategoryId` Int NOT NULL,
  `UserId` Int NOT NULL,
  `PostTitle` Varchar(500) NOT NULL,
  `Content` Varchar(8000) NOT NULL,
  `CreatedOn` Datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `RoleId` Int NOT NULL,
  PRIMARY KEY (`ArticleId`)
);

ALTER TABLE `Article` ADD CONSTRAINT `Relationship11` FOREIGN KEY (`CategoryId`) REFERENCES `Category` (`CategoryId`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `Article` ADD CONSTRAINT `Relationship12` FOREIGN KEY (`UserId`) REFERENCES `User` (`UserId`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `User` ADD CONSTRAINT `Relationship13` FOREIGN KEY (`RoleId`) REFERENCES `AuthorisationRole` (`RoleId`) ON DELETE RESTRICT ON UPDATE RESTRICT;


INSERT INTO `AuthorisationRole` (`Name`, `RoleDescription`) VALUES ('Admin', 'Users in this role can post blog and administrator website');
INSERT INTO `AuthorisationRole` (`Name`, `RoleDescription`) VALUES ('Author', 'Users in this role will be able to post blogs in website');

INSERT INTO `User` (`FirstName`, `LastName`, `Email`, `Password`, `IsActive`, `RoleId`) VALUES ('Revathy', 'Bharath', 'revathysaisindu@gmail.com', 'password', 1, 1);


