-- create and select the database
DROP DATABASE IF EXISTS criticfi_recipes;
CREATE DATABASE criticfi_recipes;
USE criticfi_recipes;  -- MySQL command


CREATE TABLE type_recipe (
	id INT(11) NOT NULL AUTO_INCREMENT,
	name VARCHAR(20),
	PRIMARY KEY (id)
);

INSERT INTO type_recipe 
( id, 
name
)
VALUES
( 1, 'Mexican'),
( 2, 'Chinese'),
( 3, 'Italian'),
( 4, 'French'),
( 5, 'Peruvian'),
( 6, 'Japanese'),
( 7, 'Mediterranean'),
( 8, 'Thai'),
( 9, 'Indian'),
( 10, 'American'),
( 11, 'German'),
( 12, 'Other'),
( 13, 'Fijian'),
( 14, 'Desert')
;
-- create the tables
CREATE TABLE recipe (
  id INT(11) NOT NULL   AUTO_INCREMENT,
  id_type INT(11) NOT NULL,
  rating FLOAT(1),
  name VARCHAR(50) NOT NULL,
  steps TEXT NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE type_measurement (
	id INT(11) NOT NULL AUTO_INCREMENT,
	name VARCHAR(20) NOT NULL,
	PRIMARY KEY (id)
);

INSERT INTO type_measurement 
( id,
name)
VALUES
(1, 'imperial'),
(2, 'metric')
;

CREATE TABLE measurements (
	id INT(11) NOT NULL AUTO_INCREMENT,
	id_type INT(11) NOT NULL,
	name VARCHAR(20) NOT NULL,
	abrev VARCHAR(10),
	PRIMARY KEY (id)
);

INSERT INTO measurements 
( id_type, 
name,
abrev
)
VALUES
( 1, 'tablespoon', 'Tbsp.'),
( 1, 'teaspoon', 'tsp.'),
( 1, 'cup', 'c.'),
( 1, 'pound', 'lb.'),
( 1, 'ounce', 'oz.'),
( 1, 'pint', 'pt.'),
( 1, 'quart', 'qt.'),
( 1, 'gallon', 'gal.'),
( 1, 'pinch', ''),
( 1, 'dash', ''),
( 1, 'fluid ounce', 'fl. oz.'),
( 2, 'gram', 'g'),
( 2, 'miligram', 'mg'),
( 2, 'liter', 'l'),
( 2, 'mililiter', 'ml')
;

CREATE TABLE type_ingredient (
 id INT(11) NOT NULL AUTO_INCREMENT,
 name VARCHAR(20),
 PRIMARY KEY (id)
);

INSERT INTO type_ingredient
( id, 
name
)
VALUES
( 1, 'dry'),
( 2, 'liquid'),
( 3, 'extract'),
( 4, 'spice'),
( 5, 'fruit'),
( 6, 'vegetable'),
( 7, 'meat'),
( 8, 'dairy'),
( 9, 'legumes'),
( 10, 'pasta'),
( 11, 'cheese')
;

CREATE TABLE ingredient (
 id INT(11) NOT NULL AUTO_INCREMENT,
 id_type INT(11) NOT NULL,
 name VARCHAR(30),
 PRIMARY KEY (id),
 FOREIGN KEY (id_type) REFERENCES type_ingredient(id)
);

INSERT INTO ingredient
( id_type,
name
)
VALUES
( 1, 'flour'),
( 1, 'wheat flour'),
( 1, 'corn flour'),
( 1, 'barley flour'),
( 1, 'buckwheat flour'),
( 1, 'barley'),
( 1, 'oat'),
( 1, 'rye flour'),
( 1, 'quinoa'),
( 1, 'cornmeal'),
( 1, 'corn starch'),
( 1, 'rice'),
( 1, 'wheat rice'),
( 1, 'potato starch'),
( 1, 'baking soda'),
( 1, 'baking powder'),
( 1, 'powdered sugar'),
( 2, 'white sugar'),
( 2, 'brown sugar'),
( 2, 'vegetable oil'),
( 2, 'olive oil'),
( 2, 'canola oil'),
( 2, 'flaxseed oil'),
( 2, 'sunflower oil'),
( 2, 'corn oil'),
( 2, 'white vinegar'),
( 2, 'red wine vinegar'),
( 2, 'balsamic vinegar'),
( 2, 'rice vinegar'),
( 3, 'vanilla'),
( 3, 'coconut'),
( 3, 'maple'),
( 3, 'almond'),
( 3, 'anise'),
( 3, 'lemon'),
( 3, 'mint'),
( 3, 'rasberry'),
( 3, 'root beer'),
( 3, 'rum flavor'),
( 3, 'strawberry'),
( 3, 'pumpkin spice'),
( 3, 'peppermint'),
( 3, 'cinnamon'),
( 4, 'cayenne pepper'),
( 4, 'chili powder'),
( 4, 'cinnamon'),
( 4, 'cream of tartar'),
( 4, 'cumin'),
( 4, 'curry'),
( 4, 'ginger'),
( 4, 'kosher salt'),
( 4, 'salt'),
( 4, 'nutmeg'),
( 4, 'oregano'),
( 4, 'paprika'),
( 4, 'crushed red pepper'),
( 4, 'rosemary'),
( 4, 'thyme'),
( 4, 'sea salt'),
( 4, 'basil'),
( 4, 'bay leaves'),
( 4, 'garlic powder'),
( 4, 'garlic salt'),
( 4, 'ground cloves'),
( 4, 'chinese five spice'),
( 4, 'cajun seasoning'),
( 4, 'dried onion'),
( 4, 'onion powder'),
( 4, 'onion salt'),
( 5, 'apple'),
( 5, 'orange'),
( 5, 'banana'),
( 5, 'pine apple'),
( 5, 'tangerine'),
( 5, 'grapefruit'),
( 5, 'grapes'),
( 5, 'cherry'),
( 5, 'strawberry'),
( 5, 'melon'),
( 5, 'watermelon'),
( 5, 'blueberry'),
( 5, 'coconut'),
( 5, 'lemon'),
( 5, 'avocado'),
( 5, 'kiwi'),
( 5, 'lime'),
( 5, 'mango'),
( 5, 'pear'),
( 5, 'peach'),
( 5, 'date'),
( 5, 'raisin'),
( 5, 'plume'),
( 5, 'prune'),
( 5, 'mandarine'),
( 5, 'cantaloupe'),
( 5, 'fig'),
( 5, 'cranberry'),
( 5, 'prune'),
( 5, 'prune'),
( 6, 'broccoli'),
( 6, 'coliflower'),
( 6, 'bell pepper'),
( 6, 'onion'),
( 6, 'potato'),
( 6, 'green onion'),
( 6, 'tomato'),
( 6, 'carrot'),
( 6, 'cilantro'),
( 6, 'spinach'),
( 6, 'cabbage'),
( 6, 'asparagus'),
( 6, 'artichoke'),
( 6, 'garlic'),
( 6, 'zucchini'),
( 6, 'pumpkin'),
( 6, 'squash'),
( 6, 'radish'),
( 6, 'celery'),
( 6, 'shallot'),
( 6, 'corn'),
( 6, 'chives'),
( 6, 'mushroom'),
( 6, 'lettuce'),
( 6, 'kale'),
( 6, 'brussels sprouts'),
( 6, 'eggplant'),
( 6, 'arugula'),
( 7, 'beef'),
( 7, 'chicken'),
( 7, 'turkey'),
( 7, 'pork'),
( 7, 'salmon'),
( 7, 'venison'),
( 7, 'bacon'),
( 7, 'salami'),
( 7, 'ham'),
( 8, 'egg'),
( 8, 'milk'),
( 8, 'butter'),
( 8, 'yogurt'),
( 8, 'cream'),
( 9, 'lentils'),
( 9, 'red beans'),
( 9, 'peas'),
( 9, 'black beans'),
( 9, 'peanuts'),
( 9, 'garbanzo beans'),
( 9, 'lima beans'),
( 9, ''),
( 9, 'cream cheese'),
( 9, 'cream cheese'),
( 9, 'cream cheese')
;

CREATE TABLE recipe_and_ingredients (
	id_recipe INT(11) NOT NULL,
	id_ingredient INT(11) NOT NULL,
	id_measurement INT(11),
	quantity FLOAT(3) NOT NULL
);












