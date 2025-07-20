# crud-app-php
This is simple Create, Read, Update and Delete Application in php language, built in August 2024. It may contain some technicall issues at the time of upload it is totally functional.

**Instructions:**
Install Xampp and open "phpmyadmin"

Creat a database with the name of "crud" (use lowercase letters).
Now run this query in sql query section to create a Table for collecting the data.
Query: 
CREATE TABLE `crud`.`php_crud` (`sno` INT NOT NULL AUTO_INCREMENT , `name` TEXT NOT NULL , `email` VARCHAR(30) NOT NULL , `password` VARCHAR(30) NOT NULL , `gender` INT NOT NULL , `hobbies` TEXT NOT NULL , `dob` DATE NOT NULL , `number` INT(25) NOT NULL , `address` VARCHAR(200) NOT NULL , PRIMARY KEY (`sno`), UNIQUE (`email`)) ENGINE = InnoDB; 

Congrations it is ready to use.
