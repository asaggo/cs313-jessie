CREATE TABLE passwords
(
	id SERIAL PRIMARY KEY NOT NULL,
	user_name VARCHAR(100) NOT NULL,
	password VARCHAR(255)
);