--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.1
-- Dumped by pg_dump version 9.6.1

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: chef; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE chef (
    id integer NOT NULL,
    name character varying(50) NOT NULL,
    password character varying(255) NOT NULL
);


ALTER TABLE chef OWNER TO postgres;

--
-- Name: chef_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE chef_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE chef_id_seq OWNER TO postgres;

--
-- Name: chef_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE chef_id_seq OWNED BY chef.id;


--
-- Name: country; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE country (
    id integer NOT NULL,
    type character varying(50) NOT NULL
);


ALTER TABLE country OWNER TO postgres;

--
-- Name: country_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE country_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE country_id_seq OWNER TO postgres;

--
-- Name: country_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE country_id_seq OWNED BY country.id;


--
-- Name: dish; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE dish (
    id integer NOT NULL,
    type character varying(20) NOT NULL
);


ALTER TABLE dish OWNER TO postgres;

--
-- Name: dish_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE dish_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE dish_id_seq OWNER TO postgres;

--
-- Name: dish_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE dish_id_seq OWNED BY dish.id;


--
-- Name: level; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE level (
    id integer NOT NULL,
    type character varying(20) NOT NULL
);


ALTER TABLE level OWNER TO postgres;

--
-- Name: level_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE level_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE level_id_seq OWNER TO postgres;

--
-- Name: level_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE level_id_seq OWNED BY level.id;


--
-- Name: material; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE material (
    id integer NOT NULL,
    type character varying(50) NOT NULL
);


ALTER TABLE material OWNER TO postgres;

--
-- Name: material_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE material_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE material_id_seq OWNER TO postgres;

--
-- Name: material_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE material_id_seq OWNED BY material.id;


--
-- Name: recipe; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE recipe (
    id integer NOT NULL,
    chef_id integer NOT NULL,
    dish_id integer NOT NULL,
    country_id integer NOT NULL,
    material_id integer NOT NULL,
    level_id integer NOT NULL,
    title character varying(100) NOT NULL,
    content text NOT NULL
);


ALTER TABLE recipe OWNER TO postgres;

--
-- Name: recipe_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE recipe_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE recipe_id_seq OWNER TO postgres;

--
-- Name: recipe_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE recipe_id_seq OWNED BY recipe.id;


--
-- Name: chef id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY chef ALTER COLUMN id SET DEFAULT nextval('chef_id_seq'::regclass);


--
-- Name: country id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY country ALTER COLUMN id SET DEFAULT nextval('country_id_seq'::regclass);


--
-- Name: dish id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY dish ALTER COLUMN id SET DEFAULT nextval('dish_id_seq'::regclass);


--
-- Name: level id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY level ALTER COLUMN id SET DEFAULT nextval('level_id_seq'::regclass);


--
-- Name: material id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY material ALTER COLUMN id SET DEFAULT nextval('material_id_seq'::regclass);


--
-- Name: recipe id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY recipe ALTER COLUMN id SET DEFAULT nextval('recipe_id_seq'::regclass);


--
-- Data for Name: chef; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY chef (id, name, password) FROM stdin;
3	Jessie	pass123
4	Jay	pass456
5	connor	$2y$10$gMf7dcasequsKGkMNY025u8aYagwo.ZmBKVoMAsscwkFlUuUVkD5O
6	ojw0618	$2y$10$Y9q1/d6cahlIoW.ge.kMBeOVZAgcy8M8GbIUWjmCMRtPLt56GynOi
\.


--
-- Name: chef_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('chef_id_seq', 6, true);


--
-- Data for Name: country; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY country (id, type) FROM stdin;
1	Korea
2	China
3	Japan
4	Vietnam
5	America
6	Mexico
7	Fusion
8	Other country
\.


--
-- Name: country_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('country_id_seq', 8, true);


--
-- Data for Name: dish; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY dish (id, type) FROM stdin;
1	Main
2	Side dish
3	Desert
4	Appetizer
5	Beverage
6	Other dish
\.


--
-- Name: dish_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('dish_id_seq', 6, true);


--
-- Data for Name: level; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY level (id, type) FROM stdin;
1	Beginner
2	Intermediate
3	Advanced
\.


--
-- Name: level_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('level_id_seq', 3, true);


--
-- Data for Name: material; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY material (id, type) FROM stdin;
1	Meat
2	Seafood
3	Vegetable
4	Fruit
5	Rice or other grain
6	Eggs or dairy
7	Flour
8	Other material
\.


--
-- Name: material_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('material_id_seq', 8, true);


--
-- Data for Name: recipe; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY recipe (id, chef_id, dish_id, country_id, material_id, level_id, title, content) FROM stdin;
2	3	1	1	1	1	Broiled Pork	1. Boil water \n2. Add half onion, whole peppers, whole garlics, two spoons of soy bean paste, and pork\n3. Boil for 40 minutes\n4. Get rid of all soup and ingredients besides pork\n5. Enjoy!
3	6	1	1	1	1	Pop-Corn	1.Fry\r\n2.Eat!
\.


--
-- Name: recipe_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('recipe_id_seq', 3, true);


--
-- Name: chef chef_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY chef
    ADD CONSTRAINT chef_pkey PRIMARY KEY (id);


--
-- Name: country country_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY country
    ADD CONSTRAINT country_pkey PRIMARY KEY (id);


--
-- Name: dish dish_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY dish
    ADD CONSTRAINT dish_pkey PRIMARY KEY (id);


--
-- Name: level level_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY level
    ADD CONSTRAINT level_pkey PRIMARY KEY (id);


--
-- Name: material material_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY material
    ADD CONSTRAINT material_pkey PRIMARY KEY (id);


--
-- Name: recipe recipe_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY recipe
    ADD CONSTRAINT recipe_pkey PRIMARY KEY (id);


--
-- Name: recipe recipe_chef_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY recipe
    ADD CONSTRAINT recipe_chef_id_fkey FOREIGN KEY (chef_id) REFERENCES chef(id);


--
-- Name: recipe recipe_country_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY recipe
    ADD CONSTRAINT recipe_country_id_fkey FOREIGN KEY (country_id) REFERENCES country(id);


--
-- Name: recipe recipe_dish_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY recipe
    ADD CONSTRAINT recipe_dish_id_fkey FOREIGN KEY (dish_id) REFERENCES dish(id);


--
-- Name: recipe recipe_level_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY recipe
    ADD CONSTRAINT recipe_level_id_fkey FOREIGN KEY (level_id) REFERENCES level(id);


--
-- Name: recipe recipe_material_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY recipe
    ADD CONSTRAINT recipe_material_id_fkey FOREIGN KEY (material_id) REFERENCES material(id);


--
-- Name: chef; Type: ACL; Schema: public; Owner: postgres
--

GRANT SELECT,INSERT,DELETE,UPDATE ON TABLE chef TO asaggo;


--
-- Name: chef_id_seq; Type: ACL; Schema: public; Owner: postgres
--

GRANT SELECT,USAGE ON SEQUENCE chef_id_seq TO asaggo;


--
-- Name: country; Type: ACL; Schema: public; Owner: postgres
--

GRANT SELECT,INSERT,DELETE,UPDATE ON TABLE country TO asaggo;


--
-- Name: dish; Type: ACL; Schema: public; Owner: postgres
--

GRANT SELECT,INSERT,DELETE,UPDATE ON TABLE dish TO asaggo;


--
-- Name: level; Type: ACL; Schema: public; Owner: postgres
--

GRANT SELECT,INSERT,DELETE,UPDATE ON TABLE level TO asaggo;


--
-- Name: material; Type: ACL; Schema: public; Owner: postgres
--

GRANT SELECT,INSERT,DELETE,UPDATE ON TABLE material TO asaggo;


--
-- Name: recipe; Type: ACL; Schema: public; Owner: postgres
--

GRANT SELECT,INSERT,DELETE,UPDATE ON TABLE recipe TO asaggo;


--
-- Name: recipe_id_seq; Type: ACL; Schema: public; Owner: postgres
--

GRANT SELECT,USAGE ON SEQUENCE recipe_id_seq TO asaggo;


--
-- PostgreSQL database dump complete
--

