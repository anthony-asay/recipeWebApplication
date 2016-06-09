-- create and select the database
DROP DATABASE IF EXISTS criticfi_mynewdata;
CREATE DATABASE criticfi_mynewdata;
USE criticfi_mynewdata;  -- MySQL command

-- create the tables
CREATE TABLE medium (
  id     INT(11)        NOT NULL   AUTO_INCREMENT,
  type_medium    VARCHAR(30),
  PRIMARY KEY (id)
);

CREATE TABLE user (
  id        INT(11)        NOT NULL   AUTO_INCREMENT,
  name_user       VARCHAR(50)     NOT NULL,
  password      VARCHAR(30)    	NOT NULL,
  date_birth DATE,
  email VARCHAR(100) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE item (
id	INT(11)        NOT NULL   AUTO_INCREMENT,
id_medium INT(11) NOT NULL,
author INT(11),
date_released DATE NOT NULL,
title VARCHAR(255) NOT NULL,
rating DECIMAL(2,1) NOT NULL,
synopsis VARCHAR(255),
PRIMARY KEY (id),
FOREIGN KEY (id_medium) REFERENCES medium(id)
);

CREATE TABLE media_log (
id	INT(11)        NOT NULL   AUTO_INCREMENT,
id_user INT(11),
id_item INT(11),
rating DECIMAL(2,1),
time_spent DECIMAL(4,1),
date_finished DATETIME,
PRIMARY KEY (id)
);

-- insert data into the database
INSERT INTO medium 
( id, 
type_medium
)
VALUES
( 1, 'Movies'),
( 2, 'Video Games'),
( 3, 'Music'),
( 4, 'Television'),
( 5, 'Books')
;

INSERT INTO item
( id_medium
, date_released
, title
, rating
, synopsis)
VALUES
(1, CURRENT_DATE, 'Terminator 2: Judgement Day', 0, 'A robot from the future tries to kill people'),
(1, CURRENT_DATE, 'Star Wars', 0, 'Pew Pew'),
(1, CURRENT_DATE, 'The Dark Knight', 0, 'Im Batman'),
(1, CURRENT_DATE, 'Raiders of the Lost Ark', 0, 'Get off my plane.'),
(2, CURRENT_DATE, 'The Last of US', 0, 'Zombies'),
(2, CURRENT_DATE, 'Call of Duty', 0, 'Pew Pew'),
(3, CURRENT_DATE, 'Dark Side of the Moon', 0, 'Money'),
(3, CURRENT_DATE, 'Led Zeppelin', 0, 'Dazed and Confused'),
(4, CURRENT_DATE, 'The Flash', 0, 'Runs fast.'),
(4, CURRENT_DATE, 'Firefly', 0, 'Pew Pew'),
(5, CURRENT_DATE, 'Harry Potter and the Chamber of Secrets', 0, 'Wizard school'),
(5, CURRENT_DATE, 'Lord of the Rings', 0, 'Wizards and orcs.')
;

INSERT INTO user
(name_user
, password
, date_birth
, email
)
VALUES
( 'berry', md5('Cool1234'), CURRENT_DATE, 'jerry@yahoo.com'),
( 'jonny', md5('Cool1234'), CURRENT_DATE, 'jonny@yahoo.com'),
( 'jill', md5('Cool1234'), CURRENT_DATE, 'jill@yahoo.com')
;

-- create the users and grant priveleges to those users
GRANT SELECT, INSERT, DELETE, UPDATE
ON criticfi_mynewdata.*
TO mgs_user@localhost
IDENTIFIED BY 'pa55word';