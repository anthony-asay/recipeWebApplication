-- create and select the database
DROP DATABASE IF EXISTS criticfi_mydatos;
CREATE DATABASE criticfi_mydatos;
USE criticfi_mydatos;  -- MySQL command

-- create the tables
CREATE TABLE medium (
  id     INT(11)        NOT NULL   AUTO_INCREMENT,
  type_medium    VARCHAR(30),
  PRIMARY KEY (id)
);

CREATE TABLE genre (
  id       INT(11)        NOT NULL   AUTO_INCREMENT,
  id_medium 	INT(11),
  type_genre    VARCHAR(30),
  PRIMARY KEY (id),
  FOREIGN KEY (id_medium) REFERENCES medium(id)
);

CREATE TABLE user (
  id        INT(11)        NOT NULL   AUTO_INCREMENT,
  name_user       VARCHAR(50)     NOT NULL,
  password      VARCHAR(30)    	NOT NULL,
  date_created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  date_birth DATE,
  email VARCHAR(100) NOT NULL,
  id_fb			INT(11),
  id_tw			INT(11),
  slug varchar(128) NOT NULL,
  PRIMARY KEY (id),
  KEY slug (slug)
);

CREATE TABLE admin (
 id INT(11) NOT NULL AUTO_INCREMENT,
 email VARCHAR(100) NOT NULL,
 password VARCHAR(30) NOT NULL,
 PRIMARY KEY (id)
);

INSERT INTO admin
(email
, password)
VALUES
("anthonyasay@yahoo.com", md5("Cool1234"));

CREATE TABLE author (
id INT(11) NOT NULL  AUTO_INCREMENT,
name_last VARCHAR(100) NOT NULL,
name_first VARCHAR(100) NOT NULL,
slug varchar(128) NOT NULL,
PRIMARY KEY (id),
KEY slug (slug)
);

CREATE TABLE item (
id	INT(11)        NOT NULL   AUTO_INCREMENT,
id_medium INT(11) NOT NULL,
id_author INT(11),
date_released DATE NOT NULL,
name_item VARCHAR(255) NOT NULL,
rating DECIMAL(10,1) NOT NULL,
synopsis VARCHAR(255),
slug varchar(128) NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (id_medium) REFERENCES medium(id),
FOREIGN KEY (id_author) REFERENCES author(id),
KEY slug (slug)
);

CREATE TABLE item_genres (
id_item INT(11) NOT NULL,
id_genre INT(11) NOT NULL,
FOREIGN KEY (id_item) REFERENCES item(id),
FOREIGN KEY (id_genre) REFERENCES genre(id)
);


CREATE TABLE review (
id	INT(11)        NOT NULL   AUTO_INCREMENT,
id_user INT(11)        NOT NULL,
id_item INT(11) ,
date_created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
rating DECIMAL(10,1) NOT NULL,
review TEXT NOT NULL,
slug varchar(128) NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (id_user) REFERENCES user(id),
FOREIGN KEY (id_item) REFERENCES item(id),
KEY slug (slug)
);

CREATE TABLE quick_rating (
id	INT(11)        NOT NULL   AUTO_INCREMENT,
id_user INT(11),
id_item INT(11),
rating DECIMAL(10,1) NOT NULL,
date_finished DATE,
date_created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
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

CREATE OR REPLACE FUNCTION my_function
(pv_food IN VARCHAR2) RETURN VARCHAR2 IS

	lv_food VARCHAR2(30) := 'bread';
BEGIN
	IF pv_food IS NOT NULL THEN
		lv_food := pv_food;
	END IF;
	
	RETURN 'My favorite food is ' ||lv_food||'.';
END;
/


CREATE OR REPLACE FUNCTION bmi
(weightLb NUMBER
, heightIn NUMBER) 
RETURN NUMBER DETERMINISTIC IS
BEGIN
	
	RETURN (weightLb/2.2)/((heightIn/39.37)*(heightIn/39.37));
END bmi;
/

CALL bmi(weightLb => 190, heightIn => 70)
INTO output_variable


CREATE OR REPLACE FUNCTION food_group
( pv_search_food VARCHAR2) RETURN VARCHAR2 IS
	--declare return variable
	lv_result VARCHAR2(50);
	
	CURSOR get_food_groups
	( cv_search_food VARCHAR2) IS
		SELECT f.food_group_name
		FROM food_groups f
		WHERE REGEXP_LIKE(f.food_group_name, cv_search_food, 'i')
		OFFSET 1 ROWS FETCH FIRST 1 ROWS ONLY;
BEGIN
	FOR i IN get_food_groups('^.*'||pv_search_food||'.*$') LOOP
		lv_result := i.food_group_name;
	END LOOP;
END;
/
	

-- create the users and grant priveleges to those users
/*GRANT SELECT, INSERT, DELETE, UPDATE
ON criticfi_mydatos.*
TO mgs_user@localhost
IDENTIFIED BY 'pa55word';*/

/*208-496-9840

olavesonm@byui.edu
 
System.Data.SqlServerCe.SqlCeException was unhandled by user code
  ErrorCode=-2147467259
  HResult (System.Exception)=-2147467259
  HResult=-2147217900
  Message=There was an error parsing the query. [ Token line number = 1,Token line offset = 42,Token in error = % ]
  NativeError=25501
  Source=SQL Server Compact ADO.NET Data Provider
  StackTrace:
       at System.Data.SqlServerCe.SqlCeCommand.ProcessResults(Int32 hr)
       at System.Data.SqlServerCe.SqlCeCommand.CompileQueryPlan()
       at System.Data.SqlServerCe.SqlCeCommand.ExecuteCommand(CommandBehavior behavior, String method, ResultSetOptions options)
       at System.Data.SqlServerCe.SqlCeCommand.ExecuteDbDataReader(CommandBehavior behavior)
       at System.Data.Common.DbCommand.ExecuteReader()
       at WebMatrix.Data.Database.<QueryInternal>d__0.MoveNext()
       at System.Collections.Generic.List`1..ctor(IEnumerable`1 collection)
       at System.Linq.Enumerable.ToList[TSource](IEnumerable`1 source)
       at WebMatrix.Data.Database.Query(String commandText, Object[] parameters)
       at ASP._Page_scriptures_cshtml.Execute() in c:\Users\Anthony\Documents\CIT 301C\MyWeb\scriptures.cshtml:line 42
       at System.Web.WebPages.WebPageBase.ExecutePageHierarchy()
       at System.Web.WebPages.WebPage.ExecutePageHierarchy(IEnumerable`1 executors)
       at System.Web.WebPages.WebPage.ExecutePageHierarchy()
       at System.Web.WebPages.WebPageBase.ExecutePageHierarchy(WebPageContext pageContext, TextWriter writer, WebPageRenderingBase startPage)
       at System.Web.WebPages.WebPageHttpHandler.ProcessRequestInternal(HttpContextBase httpContext)
  InnerException: 

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
*/












