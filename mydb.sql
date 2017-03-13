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
-- Name: cooking_type; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE cooking_type (
    ct_id integer NOT NULL,
    ck_type character varying(100) NOT NULL
);


ALTER TABLE cooking_type OWNER TO postgres;

--
-- Name: cooking_type_ct_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cooking_type_ct_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cooking_type_ct_id_seq OWNER TO postgres;

--
-- Name: cooking_type_ct_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE cooking_type_ct_id_seq OWNED BY cooking_type.ct_id;


--
-- Name: level_type; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE level_type (
    lt_id integer NOT NULL,
    lv_type character varying(50) NOT NULL
);


ALTER TABLE level_type OWNER TO postgres;

--
-- Name: level_type_lt_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE level_type_lt_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE level_type_lt_id_seq OWNER TO postgres;

--
-- Name: level_type_lt_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE level_type_lt_id_seq OWNED BY level_type.lt_id;


--
-- Name: material_type; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE material_type (
    mt_id integer NOT NULL,
    mt_type character varying(50)
);


ALTER TABLE material_type OWNER TO postgres;

--
-- Name: material_type_mt_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE material_type_mt_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE material_type_mt_id_seq OWNER TO postgres;

--
-- Name: material_type_mt_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE material_type_mt_id_seq OWNED BY material_type.mt_id;


--
-- Name: national_type; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE national_type (
    nt_id integer NOT NULL,
    nt_type character varying(100) NOT NULL
);


ALTER TABLE national_type OWNER TO postgres;

--
-- Name: national_type_nt_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE national_type_nt_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE national_type_nt_id_seq OWNER TO postgres;

--
-- Name: national_type_nt_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE national_type_nt_id_seq OWNED BY national_type.nt_id;


--
-- Name: recipe; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE recipe (
    recipe_id integer NOT NULL,
    user_id integer NOT NULL,
    ct_id integer NOT NULL,
    lt_id integer NOT NULL,
    mt_id integer NOT NULL,
    nt_id integer NOT NULL,
    content text NOT NULL
);


ALTER TABLE recipe OWNER TO postgres;

--
-- Name: recipe_recipe_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE recipe_recipe_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE recipe_recipe_id_seq OWNER TO postgres;

--
-- Name: recipe_recipe_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE recipe_recipe_id_seq OWNED BY recipe.recipe_id;


--
-- Name: recipe_user; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE recipe_user (
    user_id integer NOT NULL,
    username character varying(50) NOT NULL,
    password character varying(20) NOT NULL
);


ALTER TABLE recipe_user OWNER TO postgres;

--
-- Name: recipe_user_user_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE recipe_user_user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE recipe_user_user_id_seq OWNER TO postgres;

--
-- Name: recipe_user_user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE recipe_user_user_id_seq OWNED BY recipe_user.user_id;


--
-- Name: cooking_type ct_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cooking_type ALTER COLUMN ct_id SET DEFAULT nextval('cooking_type_ct_id_seq'::regclass);


--
-- Name: level_type lt_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY level_type ALTER COLUMN lt_id SET DEFAULT nextval('level_type_lt_id_seq'::regclass);


--
-- Name: material_type mt_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY material_type ALTER COLUMN mt_id SET DEFAULT nextval('material_type_mt_id_seq'::regclass);


--
-- Name: national_type nt_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY national_type ALTER COLUMN nt_id SET DEFAULT nextval('national_type_nt_id_seq'::regclass);


--
-- Name: recipe recipe_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY recipe ALTER COLUMN recipe_id SET DEFAULT nextval('recipe_recipe_id_seq'::regclass);


--
-- Name: recipe_user user_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY recipe_user ALTER COLUMN user_id SET DEFAULT nextval('recipe_user_user_id_seq'::regclass);


--
-- Data for Name: cooking_type; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cooking_type (ct_id, ck_type) FROM stdin;
1	Boiling
2	Stir-frying
3	Boiling
4	Steaming
5	Frying
6	Simmering
7	Raw
8	Blanching
\.


--
-- Name: cooking_type_ct_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cooking_type_ct_id_seq', 8, true);


--
-- Data for Name: level_type; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY level_type (lt_id, lv_type) FROM stdin;
1	Beginner
2	Intermediate
3	Advanced
\.


--
-- Name: level_type_lt_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('level_type_lt_id_seq', 3, true);


--
-- Data for Name: material_type; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY material_type (mt_id, mt_type) FROM stdin;
1	Beef
2	Pork
3	Chicken
4	Other meats
5	Seafood
6	Rice or other grain
7	Fruit or Vegetable
8	Eggs or Dairy
9	Nuts
10	Flour
\.


--
-- Name: material_type_mt_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('material_type_mt_id_seq', 10, true);


--
-- Data for Name: national_type; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY national_type (nt_id, nt_type) FROM stdin;
1	Korean
2	Chinese
3	Japanese
4	Vietnamese
5	Italian
6	Fusion
7	Mexican
8	France
\.


--
-- Name: national_type_nt_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('national_type_nt_id_seq', 8, true);


--
-- Data for Name: recipe; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY recipe (recipe_id, user_id, ct_id, lt_id, mt_id, nt_id, content) FROM stdin;
\.


--
-- Name: recipe_recipe_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('recipe_recipe_id_seq', 1, false);


--
-- Data for Name: recipe_user; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY recipe_user (user_id, username, password) FROM stdin;
\.


--
-- Name: recipe_user_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('recipe_user_user_id_seq', 1, false);


--
-- Name: cooking_type cooking_type_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cooking_type
    ADD CONSTRAINT cooking_type_pkey PRIMARY KEY (ct_id);


--
-- Name: level_type level_type_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY level_type
    ADD CONSTRAINT level_type_pkey PRIMARY KEY (lt_id);


--
-- Name: material_type material_type_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY material_type
    ADD CONSTRAINT material_type_pkey PRIMARY KEY (mt_id);


--
-- Name: national_type national_type_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY national_type
    ADD CONSTRAINT national_type_pkey PRIMARY KEY (nt_id);


--
-- Name: recipe recipe_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY recipe
    ADD CONSTRAINT recipe_pkey PRIMARY KEY (recipe_id);


--
-- Name: recipe_user recipe_user_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY recipe_user
    ADD CONSTRAINT recipe_user_pkey PRIMARY KEY (user_id);


--
-- Name: recipe recipe_ct_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY recipe
    ADD CONSTRAINT recipe_ct_id_fkey FOREIGN KEY (ct_id) REFERENCES cooking_type(ct_id);


--
-- Name: recipe recipe_lt_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY recipe
    ADD CONSTRAINT recipe_lt_id_fkey FOREIGN KEY (lt_id) REFERENCES level_type(lt_id);


--
-- Name: recipe recipe_mt_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY recipe
    ADD CONSTRAINT recipe_mt_id_fkey FOREIGN KEY (mt_id) REFERENCES material_type(mt_id);


--
-- Name: recipe recipe_nt_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY recipe
    ADD CONSTRAINT recipe_nt_id_fkey FOREIGN KEY (nt_id) REFERENCES national_type(nt_id);


--
-- Name: recipe recipe_user_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY recipe
    ADD CONSTRAINT recipe_user_id_fkey FOREIGN KEY (user_id) REFERENCES recipe_user(user_id);


--
-- PostgreSQL database dump complete
--

