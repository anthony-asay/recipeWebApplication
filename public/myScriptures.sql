-- create and select the database
DROP DATABASE IF EXISTS my_scriptures;
CREATE DATABASE my_scriptures;
USE my_scriptures;  -- MySQL command

CREATE TABLE scripture (
 id INT(11) NOT NULL AUTO_INCREMENT,
 book VARCHAR(30),
 chapter INT(11),
 verse INT(11),
 notes VARCHAR2(255),
 dateSubmitted DATETIME NOT NULL DEFAULT NOW(),
 PRIMARY KEY (id)
);



INSERT INTO scripture
           ( book
           , chapter
           , verse
           , notes)
     VALUES
           ( "Alma"
           , 32
           , 21
           , "Faith and knowledge.");