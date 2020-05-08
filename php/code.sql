
CREATE DATABASE crud_project;
USE crud_project;
CREATE TABLE accountdetails(s_num INT(11) AUTO_INCREMENT PRIMARY KEY, username VARCHAR(30) NOT NULL, email_address VARCHAR(40) NOT NULL UNIQUE KEY,phone_number INT(14)NULL UNIQUE KEY,address VARCHAR(150) NULL,city VARCHAR(30) NULL, pin_code INT(6) NULL, s_password VARCHAR(50) NOT NULL UNIQUE KEY);
SELECT * FROM accountdetails
INSERT INTO accountdetails (username,email_address,s_password) VALUE('admin','admin@gmail.com','admin');
#SELECT * FROM accountdetails WHERE email_address ='admin@gmail.com' AND s_password ='admin';

---------------------------------------------

CREATE TABLE profiledetails(id INT AUTO_INCREMENT PRIMARY KEY, profile_img VARCHAR(50), description VARCHAR(200));

