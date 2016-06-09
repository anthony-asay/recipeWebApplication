-- create and select the database
DROP DATABASE IF EXISTS criticfi_recipes;
CREATE DATABASE criticfi_recipes;
USE criticfi_recipes;  -- MySQL command


CREATE TABLE type_
-- create the tables
CREATE TABLE recipe (
  id     INT(11)        NOT NULL   AUTO_INCREMENT,
  id_user INT(11),
  name_recipe    VARCHAR(30),
  PRIMARY KEY (id),
  FOREIGN KEY (id_user),
);



CREATE TABLE type_of_ingredient (
 id INT(11) NOT NULL AUTO_INCREMENT,
 name_type VARCHAR(20),
 
);

CREATE TABLE ingredient (
 id INT(11) NOT NULL AUTO_INCREMENT,
 name_ingredient VARCHAR(50),
 PRIMARY KEY (id)
);

CREATE TABLE genre (
  id_genre       INT(11)        NOT NULL   AUTO_INCREMENT,
  id_medium 	INT(11),
  type_genre    VARCHAR(30),
  PRIMARY KEY (id_genre),
  FOREIGN KEY (id_medium) REFERENCES medium(id_medium)
);

CREATE TABLE user (
  id_user        INT(11)        NOT NULL   AUTO_INCREMENT,
  name_user       VARCHAR(50)     NOT NULL,
  password      VARCHAR(30)    	NOT NULL,
  date_created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  date_birth DATE,
  email VARCHAR(100) NOT NULL,
  id_fb			INT(11),
  id_tw			INT(11),
  slug varchar(128) NOT NULL,
  PRIMARY KEY (id_user),
  KEY slug (slug)
);

CREATE TABLE item (
id_item	INT(11)        NOT NULL   AUTO_INCREMENT,
id_medium INT(11) NOT NULL,
id_author INT(11),
date_released DATE NOT NULL,
name_item VARCHAR(255) NOT NULL,
rating DECIMAL(10,1) NOT NULL,
synopsis VARCHAR(255),
slug varchar(128) NOT NULL,
PRIMARY KEY (id_item),
FOREIGN KEY (id_medium) REFERENCES medium(id_medium),
KEY slug (slug)
);

CREATE TABLE item_genres (
id_item INT(11) NOT NULL,
id_genre INT(11) NOT NULL
);

CREATE TABLE author (
id_author INT(11) NOT NULL  AUTO_INCREMENT,
name_last VARCHAR(100) NOT NULL,
name_first VARCHAR(100) NOT NULL,
slug varchar(128) NOT NULL,
PRIMARY KEY (id_author),
KEY slug (slug)
);


CREATE TABLE review (
id_review	INT(11)        NOT NULL   AUTO_INCREMENT,
id_user INT(11)        NOT NULL,
id_item INT(11)        NOT NULL,
date_created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
rating DECIMAL(10,1) NOT NULL,
review TEXT NOT NULL,
slug varchar(128) NOT NULL,
PRIMARY KEY (id_review),
FOREIGN KEY (id_user) REFERENCES user(id_user),
KEY slug (slug)
);

CREATE TABLE quick_rating (
id_user INT(11),
id_item INT(11),
rating DECIMAL(10,1) NOT NULL,
date_finished DATE,
date_created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- insert data into the database
INSERT INTO medium 
( id_medium, 
type_medium
)
VALUES
( 1, 'Movies'),
( 2, 'Video Games'),
( 3, 'Music'),
( 4, 'Television'),
( 5, 'Books')
;

INSERT INTO genre 
( id_medium,
type_genre
)
VALUES
( 1, 'Thriller'),
( 1, 'Action'),
( 1, 'Horror'),
( 1, 'Science Fiction'),
( 1, 'Suspense'),
( 1, 'Drama'),
( 1, 'Comedy'),
( 1, 'Romantic Comedy'),
( 1, 'Documentary'),
( 1, 'Fantasy'),
( 1, 'Historical Epic'), 
( 1, 'Romance'),
( 1, 'Crime Drama'),
( 2, 'FPS'),
( 2, 'Third-Person Shooter'),
( 2, 'Action-Adventure'),
( 2, 'Puzzle'),
( 2, 'Platformer'),
( 2, 'RPG'),
( 2, 'JRPG'),
( 2, 'Rhythm'),
( 2, 'Horror'),
( 2, 'Survival-Horror'),
( 3, 'Classic Rock'),
( 3, 'Alternative Rock'),
( 3, 'Classical'),
( 3, 'Jazz'),
( 3, 'Punk Rock'),
( 3, 'Pop'),
( 3, 'R&B'),
( 3, 'Rap'),
( 3, 'Reggae'),
( 3, 'Latin'),
( 4, 'Thriller'),
( 4, 'Action'),
( 4, 'Mystery'),
( 4, 'Science Fiction'),
( 4, 'Reality'),
( 4, 'Drama'),
( 4, 'Comedy'),
( 4, 'Sit-Com'),
( 4, 'Documentary'),
( 4, 'Fantasy'),
( 4, 'Historical Epic'), 
( 4, 'Soap Opera'),
( 4, 'Crime Drama'),
( 5, 'Thriller'),
( 5, 'Action'),
( 5, 'Mystery'),
( 5, 'Science Fiction'),
( 5, 'Suspense'),
( 5, 'Biography'),
( 5, 'Comedy'),
( 5, 'Fantasy'),
( 5, 'Historical Epic'), 
( 5, 'Romance'),
( 5, 'Crime Drama')
;

INSERT INTO item
( id_medium
, date_released
, name_item
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

INSERT INTO review
(id_user
, id_item
, rating
, review)
VALUES
( 1, 1, 9, 'Best Sci-Fi movie.'),
( 1, 5, 9, 'Cool zombie game.')
;

-- create the users and grant priveleges to those users
GRANT SELECT, INSERT, DELETE, UPDATE
ON criticfi_mydatos.*
TO mgs_user@localhost
IDENTIFIED BY 'pa55word';


 

using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.IO;

namespace NewDe
{
    //A list of the types of wood available
    public enum DeskType
    {
        Oak,
        Laminate,
        Pine,
        Plywood,
        Rosewood,
        Birch
    };

    //A structure that contains the type of wood and its price
    struct Wood
    {
        public DeskType woodType;
        public double price;
    };

    public class Desk : IDesk
    {
        public string customerName, surfaceType;
        public double widthDesk, lengthDesk, area, rushDays, numberOfDrawers, price, shipping, priceTotal;

        static double[] getRushedPrices()
        {
            //Get prices from text file
            string filePath = @"rushOrderPrices.txt";
            double[] prices = new double[9];
            StreamReader reader = new StreamReader(filePath);
            int i = 0;
            //Each line from the text file is passed into the prices array
            while (reader.EndOfStream == false)
            {
                string line = reader.ReadLine();
                prices[i] = double.Parse(line);
                i++;
            }
            reader.Close();
            return prices;
        }

        public double CalculateArea(double width, double length)
        {
            this.area = width * length;
            return this.area;
        }

        public double CalculateShipping(int days, double area)
        {
            //Shipping is calculated based on the number of days and the surface area of the desk
            double[] prices = getRushedPrices();
            double shipping = 0;
            if (area > 2000)
            {
                switch (days)
                {
                    case 3:
                        shipping = prices[2];
                        break;
                    case 5:
                        shipping = prices[5];
                        break;
                    case 7:
                        shipping = prices[8];
                        break;
                }
            }
            else if (area > 1000)
            {
                switch (days)
                {
                    case 3:
                        shipping = prices[1];
                        break;
                    case 5:
                        shipping = prices[4];
                        break;
                    case 7:
                        shipping = prices[7];
                        break;
                }
            }
            else
            {
                switch (days)
                {
                    case 3:
                        shipping = prices[0];
                        break;
                    case 5:
                        shipping = prices[3];
                        break;
                    case 7:
                        shipping = prices[6];
                        break;
                }
            }
            return shipping;
        }

        public double CalculatePrice(double area, double drawers, string wood)
        {
            this.price = 0;
            this.price += this.PriceForArea(area);
            this.price += (drawers * 50);
            this.price += WoodPrice(wood);
            return this.price;
        }

        public double PriceForArea(double area)
        {
            double price;
            if (area > 1000)
            {
                price = ((area - 1000) * 5) + 200;
            }
            else
            {
                price = 200;
            }
            return price;
        }

        public double WoodPrice(string woodType)
        {
            double price = 0;
            bool stop = false;
            do
            {
                switch (woodType.ToUpper())
                {
                    case "OAK":
                        price = 500;
                        stop = true;
                        break;
                    case "LAMINATE":
                        price = 400;
                        stop = true;
                        break;
                    case "PINE":
                        price = 300;
                        stop = true;
                        break;
                    case "PLYWOOD":
                        price = 200;
                        stop = true;
                        break;
                    case "ROSEWOOD":
                        price = 100;
                        stop = true;
                        break;
                    case "BIRCH":
                        price = 50;
                        stop = true;
                        break;
                    default:
                        Console.WriteLine("Invalid selection");
                        break;
                }
            } while (!stop);

            return price;
        }

    }
}




using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace NewDe
{
    interface IDesk
    {
        double CalculateArea(double width, double length);
        double CalculateShipping(int days, double area);
        double PriceForArea(double area);
        double CalculatePrice(double area, double drawers, string wood);
        double WoodPrice(string wood);
    }
}













