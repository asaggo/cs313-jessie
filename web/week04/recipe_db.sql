CREATE DATABASE recipes;

\c recipes;

CREATE TABLE chef (
id SERIAL PRIMARY KEY NOT NULL,
name VARCHAR(50) NOT NULL
);

CREATE TABLE dish (
id SERIAL PRIMARY KEY NOT NULL,
type VARCHAR(20) NOT NULL


CREATE TABLE material (
id SERIAL PRIMARY KEY NOT NULL,
type VARCHAR(50) NOT NULL
);

CREATE TABLE country (
id SERIAL PRIMARY KEY NOT NULL,
type VARCHAR(50) NOT NULL
);

CREATE TABLE level (
id SERIAL PRIMARY KEY NOT NULL,
type VARCHAR(20) NOT NULL
);

CREATE TABLE recipe (
id SERIAL PRIMARY KEY NOT NULL,
chef_id INT REFERENCES chef(id) NOT NULL,
dish_id INT REFERENCES dish(id) NOT NULL,
country_id INT REFERENCES country(id) NOT NULL,
material_id INT REFERENCES material(id) NOT NULL,
level_id INT REFERENCES level(id) NOT NULL,
title VARCHAR(100) NOT NULL,
content TEXT NOT NULL
);


INSERT INTO chef(name,password) VALUES ('Jessie','pass123'),('Jay','pass456');
INSERT INTO level(type) VALUES ('Beginner'),('Intermediate'),('Advanced');
INSERT INTO country(type) VALUES ('Korea'),('China'),('Japan'),('Vietnam'),('America'),('Mexico'),('Fusion'),('Other country');
INSERT INTO dish(type) VALUES ('Main'),('Side dish'),('Desert'),('Appetizer'),('Beverage'),('Other dish');
INSERT INTO material(type) VALUES ('Meat'),('Seafood'),('Vegetable'),('Fruit'),('Rice or other grain'),('Eggs or dairy'),('Flour'),('Other material');


ALTER TABLE chef ADD COLUMN password VARCHAR(10) NOT NULL;


INSERT INTO recipe(chef_id,dish_id,country_id,material_id,level_id,title,content) 
VALUES (3,1,1,1,1,'Broiled Pork',
	'1. Boil water 
	2. Add half onion, whole peppers, whole garlics, two spoons of soy bean paste, and pork
	3. Boil for 40 minutes
	4. Get rid of all soup and ingredients besides pork
	5. Enjoy!');


