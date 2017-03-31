INSERT INTO cooking_type(ck_type) VALUES ('Boiling');
INSERT INTO cooking_type(ck_type) VALUES ('Stir-frying');
INSERT INTO cooking_type(ck_type) VALUES ('Boiling');
INSERT INTO cooking_type(ck_type) VALUES ('Steaming');
INSERT INTO cooking_type(ck_type) VALUES ('Frying');
INSERT INTO cooking_type(ck_type) VALUES ('Simmering');
INSERT INTO cooking_type(ck_type) VALUES ('Raw');
INSERT INTO cooking_type(ck_type) VALUES ('Blanching');


INSERT INTO level_type(lv_type) VALUES ('Beginner');
INSERT INTO level_type(lv_type) VALUES ('Intermediate');
INSERT INTO level_type(lv_type) VALUES ('Advanced');


CREATE TABLE material_type(
	mt_id SERIAL PRIMARY KEY NOT NULL,
	mt_type VARCHAR(50)
);

INSERT INTO material_type(mt_type) VALUES ('Beef');
INSERT INTO material_type(mt_type) VALUES ('Pork');
INSERT INTO material_type(mt_type) VALUES ('Chicken');
INSERT INTO material_type(mt_type) VALUES ('Other meats');
INSERT INTO material_type(mt_type) VALUES ('Seafood');
INSERT INTO material_type(mt_type) VALUES ('Rice or other grain');
INSERT INTO material_type(mt_type) VALUES ('Fruit or Vegetable');
INSERT INTO material_type(mt_type) VALUES ('Eggs or Dairy');
INSERT INTO material_type(mt_type) VALUES ('Nuts');
INSERT INTO material_type(mt_type) VALUES ('Flour');


INSERT INTO national_type(nt_type) VALUES ('Korean');
INSERT INTO national_type(nt_type) VALUES ('Chinese');
INSERT INTO national_type(nt_type) VALUES ('Japanese');
INSERT INTO national_type(nt_type) VALUES ('Vietnamese');
INSERT INTO national_type(nt_type) VALUES ('Italian');
INSERT INTO national_type(nt_type) VALUES ('Fusion');
INSERT INTO national_type(nt_type) VALUES ('Mexican');
INSERT INTO national_type(nt_type) VALUES ('France');

CREATE TABLE recipe_user(
	user_id SERIAL PRIMARY KEY NOT NULL,
	username VARCHAR(50) NOT NULL,
	password VARCHAR(20) NOT NULL
);

CREATE TABLE recipe(
	recipe_id SERIAL PRIMARY KEY NOT NULL,
	user_id INT REFERENCES recipe_user(user_id) NOT NULL,
	ct_id INT REFERENCES cooking_type(ct_id) NOT NULL,
	lt_id INT REFERENCES level_type(lt_id) NOT NULL,
	mt_id INT REFERENCES material_type(mt_id) NOT NULL,
	nt_id INT REFERENCES national_type(nt_id) NOT NULL,
	content TEXT NOT NULL
);

#inserted two users
INSERT INTO recipe_user(username,password) VALUES ('jay','0920dnjs');

#accidently put Boiling twice on the cooking_type table, so Changed it to Mixing.
UPDATE cooking_type SET ck_type = 'Mixing' WHERE ck_type = 'Boiling' AND ct_id = 1;
SELECT * FROM cooking_type ORDER BY ct_id;


#insert content in the recipe
INSERT INTO recipe(user_id,ct_id,lt_id,mt_id,nt_id,content) 
VALUES (1,1,1,2,1,
	'1.Slice pork into eatable size. 2.Boil water with anchovy and get rid of anchovy after 5 minutes.
	 3.Put 2 spoons of soy bean paste. 4.Add 1 spoons of minced garlic. ');





