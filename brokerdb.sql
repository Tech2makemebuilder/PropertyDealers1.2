--
-- PostgreSQL database dump
--

-- Dumped from database version 13.2
-- Dumped by pg_dump version 13.2

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: adminpack; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS adminpack WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION adminpack; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION adminpack IS 'administrative functions for PostgreSQL';


--
-- Name: companyInfo; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public."companyInfo" AS (
	"Position" character varying(10),
	"CompanyName" character varying(30),
	"ReferenceName" character varying(30),
	"ReferenceNumber" character varying(10)
);


ALTER TYPE public."companyInfo" OWNER TO postgres;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: register; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.register (
    fname character varying(30) NOT NULL,
    lname character varying(30) NOT NULL,
    number text NOT NULL,
    address1 character varying(20) NOT NULL,
    address2 character varying(20) NOT NULL,
    city character varying(20) NOT NULL,
    state character varying(20) NOT NULL,
    pincode character varying(6) NOT NULL,
    experience integer NOT NULL,
    idproof character varying(60) NOT NULL,
    profpic character varying(60) NOT NULL,
    email character varying(40) NOT NULL,
    username character varying(20) NOT NULL,
    password character varying(20) NOT NULL,
    turnover character varying DEFAULT 0,
    rera character varying(10),
    education character varying(1),
    language character varying(10)[],
    workexp public."companyInfo"[]
);


ALTER TABLE public.register OWNER TO postgres;

--
-- Name: register register_Number_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.register
    ADD CONSTRAINT "register_Number_key" UNIQUE (number);


--
-- Name: register register_RERA_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.register
    ADD CONSTRAINT "register_RERA_key" UNIQUE (rera);


--
-- Name: register register_UserName_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.register
    ADD CONSTRAINT "register_UserName_key" UNIQUE (username);


--
-- Name: register register_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.register
    ADD CONSTRAINT register_pkey PRIMARY KEY (email);


--
-- PostgreSQL database dump complete
--

