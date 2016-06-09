-- create and select the database
DROP DATABASE IF EXISTS decks_flash;
CREATE DATABASE decks_flash;
USE decks_flash;  -- MySQL command

CREATE TABLE user (
  id        INT(11)        NOT NULL   AUTO_INCREMENT,
  name_user       VARCHAR(50)     NOT NULL,
  password      VARCHAR(30)    	NOT NULL,
  date_created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  email VARCHAR(100) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE deck (
 id INT(11) NOT NULL AUTO_INCREMENT,
 id_user INT(11),
 name VARCHAR(30) NOT NULL,
 PRIMARY KEY (id),
 FOREIGN KEY (id_user) REFERENCES user(id)
);

CREATE TABLE flashcard (
 id INT(11) NOT NULL AUTO_INCREMENT,
 id_deck INT(11),
 answer VARCHAR(255),
 question VARCHAR(255),
 PRIMARY KEY (id),
 FOREIGN KEY (id_deck) REFERENCES deck(id)
);

CREATE TABLE score (
 id INT(11) NOT NULL AUTO_INCREMENT,
 id_deck INT(11),
 id_user INT(11),
 score FLOAT,
 date_attempt DATETIME NOT NULL DEFAULT NOW(),
 PRIMARY KEY (id),
 FOREIGN KEY (id_user) REFERENCES user(id),
 FOREIGN KEY (id_deck) REFERENCES deck(id)
);

-- insert data into the database
INSERT INTO deck 
( id, 
name
)
VALUES
( 1, 'Math'),
( 2, 'Spanish'),
( 3, 'History')
;

-- insert data into the database
INSERT INTO flashcard 
( id_deck, 
answer,
question
)
VALUES
( 1, '4', '2 + 2'),
( 1, '10', '5 * 2'),
( 2, 'pollo', 'chicken'),
( 2, 'carne', 'meat'),
( 3, 'Columbus', 'Who sailed the ocean blue?'),
( 3, 'George Washington', 'Who was the first president of the United States?')
;

