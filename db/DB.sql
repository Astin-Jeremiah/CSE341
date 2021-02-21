--
-- PostgreSQL database dump
--

-- Dumped from database version 12.6 (Ubuntu 12.6-1.pgdg16.04+1)
-- Dumped by pg_dump version 12.1

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

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: account; Type: TABLE; Schema: public; Owner: zpikmqacxiyaht
--

CREATE TABLE "public"."account" (
    "id" integer NOT NULL,
    "password" character varying(255) NOT NULL,
    "email" character varying(254) NOT NULL,
    "user_name" character varying(50) NOT NULL,
    "level" integer DEFAULT 1 NOT NULL
);


ALTER TABLE public.account OWNER TO zpikmqacxiyaht;

--
-- Name: account_id_seq; Type: SEQUENCE; Schema: public; Owner: zpikmqacxiyaht
--

CREATE SEQUENCE "public"."account_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.account_id_seq OWNER TO zpikmqacxiyaht;

--
-- Name: account_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: zpikmqacxiyaht
--

ALTER SEQUENCE "public"."account_id_seq" OWNED BY "public"."account"."id";


--
-- Name: content; Type: TABLE; Schema: public; Owner: zpikmqacxiyaht
--

CREATE TABLE "public"."content" (
    "id" integer NOT NULL,
    "content_name" character varying(100) NOT NULL,
    "description" character varying(254) NOT NULL,
    "picture" character varying(254),
    "service_id" integer NOT NULL
);


ALTER TABLE public.content OWNER TO zpikmqacxiyaht;

--
-- Name: content_id_seq; Type: SEQUENCE; Schema: public; Owner: zpikmqacxiyaht
--

CREATE SEQUENCE "public"."content_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.content_id_seq OWNER TO zpikmqacxiyaht;

--
-- Name: content_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: zpikmqacxiyaht
--

ALTER SEQUENCE "public"."content_id_seq" OWNED BY "public"."content"."id";


--
-- Name: reviews; Type: TABLE; Schema: public; Owner: zpikmqacxiyaht
--

CREATE TABLE "public"."reviews" (
    "id" integer NOT NULL,
    "account_id" integer NOT NULL,
    "content_id" integer NOT NULL,
    "note" "text" NOT NULL
);


ALTER TABLE public.reviews OWNER TO zpikmqacxiyaht;

--
-- Name: reviews_id_seq; Type: SEQUENCE; Schema: public; Owner: zpikmqacxiyaht
--

CREATE SEQUENCE "public"."reviews_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.reviews_id_seq OWNER TO zpikmqacxiyaht;

--
-- Name: reviews_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: zpikmqacxiyaht
--

ALTER SEQUENCE "public"."reviews_id_seq" OWNED BY "public"."reviews"."id";


--
-- Name: scripture; Type: TABLE; Schema: public; Owner: zpikmqacxiyaht
--

CREATE TABLE "public"."scripture" (
    "id" integer NOT NULL,
    "book" character varying(50) NOT NULL,
    "chapter" integer NOT NULL,
    "verse" integer NOT NULL,
    "content" character varying(254) NOT NULL
);


ALTER TABLE public.scripture OWNER TO zpikmqacxiyaht;

--
-- Name: scripture_id_seq; Type: SEQUENCE; Schema: public; Owner: zpikmqacxiyaht
--

CREATE SEQUENCE "public"."scripture_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.scripture_id_seq OWNER TO zpikmqacxiyaht;

--
-- Name: scripture_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: zpikmqacxiyaht
--

ALTER SEQUENCE "public"."scripture_id_seq" OWNED BY "public"."scripture"."id";


--
-- Name: service; Type: TABLE; Schema: public; Owner: zpikmqacxiyaht
--

CREATE TABLE "public"."service" (
    "id" integer NOT NULL,
    "service_name" character varying(50) NOT NULL
);


ALTER TABLE public.service OWNER TO zpikmqacxiyaht;

--
-- Name: service_id_seq; Type: SEQUENCE; Schema: public; Owner: zpikmqacxiyaht
--

CREATE SEQUENCE "public"."service_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.service_id_seq OWNER TO zpikmqacxiyaht;

--
-- Name: service_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: zpikmqacxiyaht
--

ALTER SEQUENCE "public"."service_id_seq" OWNED BY "public"."service"."id";


--
-- Name: suggested_content; Type: TABLE; Schema: public; Owner: zpikmqacxiyaht
--

CREATE TABLE "public"."suggested_content" (
    "id" integer NOT NULL,
    "suggested_content_name" character varying(100) NOT NULL,
    "suggested_description" character varying(254) NOT NULL,
    "service_id" integer NOT NULL,
    "sinked" character varying(10)
);


ALTER TABLE public.suggested_content OWNER TO zpikmqacxiyaht;

--
-- Name: suggested_content_id_seq; Type: SEQUENCE; Schema: public; Owner: zpikmqacxiyaht
--

CREATE SEQUENCE "public"."suggested_content_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.suggested_content_id_seq OWNER TO zpikmqacxiyaht;

--
-- Name: suggested_content_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: zpikmqacxiyaht
--

ALTER SEQUENCE "public"."suggested_content_id_seq" OWNED BY "public"."suggested_content"."id";


--
-- Name: team_user; Type: TABLE; Schema: public; Owner: zpikmqacxiyaht
--

CREATE TABLE "public"."team_user" (
    "id" integer NOT NULL,
    "user_name" character varying(50) NOT NULL,
    "password" character varying(256) NOT NULL
);


ALTER TABLE public.team_user OWNER TO zpikmqacxiyaht;

--
-- Name: team_user_id_seq; Type: SEQUENCE; Schema: public; Owner: zpikmqacxiyaht
--

CREATE SEQUENCE "public"."team_user_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.team_user_id_seq OWNER TO zpikmqacxiyaht;

--
-- Name: team_user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: zpikmqacxiyaht
--

ALTER SEQUENCE "public"."team_user_id_seq" OWNED BY "public"."team_user"."id";


--
-- Name: userq; Type: TABLE; Schema: public; Owner: zpikmqacxiyaht
--

CREATE TABLE "public"."userq" (
    "id" integer NOT NULL,
    "account_id" integer NOT NULL,
    "content_id" integer NOT NULL,
    "startdate" "date",
    "enddate" "date"
);


ALTER TABLE public.userq OWNER TO zpikmqacxiyaht;

--
-- Name: userq_id_seq; Type: SEQUENCE; Schema: public; Owner: zpikmqacxiyaht
--

CREATE SEQUENCE "public"."userq_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.userq_id_seq OWNER TO zpikmqacxiyaht;

--
-- Name: userq_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: zpikmqacxiyaht
--

ALTER SEQUENCE "public"."userq_id_seq" OWNED BY "public"."userq"."id";


--
-- Name: account id; Type: DEFAULT; Schema: public; Owner: zpikmqacxiyaht
--

ALTER TABLE ONLY "public"."account" ALTER COLUMN "id" SET DEFAULT "nextval"('"public"."account_id_seq"'::"regclass");


--
-- Name: content id; Type: DEFAULT; Schema: public; Owner: zpikmqacxiyaht
--

ALTER TABLE ONLY "public"."content" ALTER COLUMN "id" SET DEFAULT "nextval"('"public"."content_id_seq"'::"regclass");


--
-- Name: reviews id; Type: DEFAULT; Schema: public; Owner: zpikmqacxiyaht
--

ALTER TABLE ONLY "public"."reviews" ALTER COLUMN "id" SET DEFAULT "nextval"('"public"."reviews_id_seq"'::"regclass");


--
-- Name: scripture id; Type: DEFAULT; Schema: public; Owner: zpikmqacxiyaht
--

ALTER TABLE ONLY "public"."scripture" ALTER COLUMN "id" SET DEFAULT "nextval"('"public"."scripture_id_seq"'::"regclass");


--
-- Name: service id; Type: DEFAULT; Schema: public; Owner: zpikmqacxiyaht
--

ALTER TABLE ONLY "public"."service" ALTER COLUMN "id" SET DEFAULT "nextval"('"public"."service_id_seq"'::"regclass");


--
-- Name: suggested_content id; Type: DEFAULT; Schema: public; Owner: zpikmqacxiyaht
--

ALTER TABLE ONLY "public"."suggested_content" ALTER COLUMN "id" SET DEFAULT "nextval"('"public"."suggested_content_id_seq"'::"regclass");


--
-- Name: team_user id; Type: DEFAULT; Schema: public; Owner: zpikmqacxiyaht
--

ALTER TABLE ONLY "public"."team_user" ALTER COLUMN "id" SET DEFAULT "nextval"('"public"."team_user_id_seq"'::"regclass");


--
-- Name: userq id; Type: DEFAULT; Schema: public; Owner: zpikmqacxiyaht
--

ALTER TABLE ONLY "public"."userq" ALTER COLUMN "id" SET DEFAULT "nextval"('"public"."userq_id_seq"'::"regclass");


--
-- Data for Name: account; Type: TABLE DATA; Schema: public; Owner: zpikmqacxiyaht
--

COPY "public"."account" ("id", "password", "email", "user_name", "level") FROM stdin;
38	$2y$10$jrg/RZTlBr.m9oZ6ERHeDO/4HNUlWLstwwYVXAR2puyWPWMT2s.JG	john@john.com	john	1
39	$2y$10$onQrV8airzso/orJpk7kweDxW4oE3O7T3xu2CAdM6T.fsTZ7sRagK	anv703@gmail.com	Ashley	1
36	$2y$10$XS.Dm8PAJZRMmtWprtEZSeylQxZOD3apansF4J4wVaTaTuBc/nQtO	jeremiahastin@gmail.com	astinj	3
37	$2y$10$gFbK.itLFvhNEcPqgbdSeecpwg7nCjNTrNr0o4qgo19Y4rrmsIjZG	test@test.com	testuser	3
40	$2y$10$JUi8iLovcu9lfSbffjCxU.yKyZgze7yji8qVZDVV0NUbwdlLMZiO6	kyleastin@gmail.com	kyle	1
43	$2y$10$9SpRWAaa8XqegzeohAnxROBX.PxR6tyOetj5fGLaCpjzaHcH.WgzG	james@james.com	james	1
\.


--
-- Data for Name: content; Type: TABLE DATA; Schema: public; Owner: zpikmqacxiyaht
--

COPY "public"."content" ("id", "content_name", "description", "picture", "service_id") FROM stdin;
1	The Great British Baking Show	Bakers complete to see who is the best baker in England.	../images/gb.jpg	1
2	WandaVision	Wanda Maximoff and Vision, two super-powered beings, living their ideal suburban lives-begin to suspect that everything is not as it seems.	../images/wanda.jpg	2
3	The Mandalorian	The travels of a lone bounty hunter in the outer reaches of the galaxy, far from the authority of the New Republic.	../images/man.jpg	2
4	Soul	After landing the gig of a lifetime, a New York jazz pianist suddenly finds himself trapped in a strange land between Earth and the afterlife.	../images/soul.jpg	2
5	The Masked Singer	12 celebrity performers wear costumes to conceal identities. One singer is eliminated each week and unmasked. Small hints are given for the viewer guess along.	../images/ms.jpg	3
6	My Spy	A hardened CIA operative finds himself at the mercy of a precocious 9-year-old girl, having been sent undercover to surveil her family.	../images/spy.jpg	4
7	Ready Player One	When the creator of a virtual reality called the OASIS dies, he makes a posthumous challenge to all OASIS users to find his Easter Egg, which will give the finder his fortune and control of his world.	../images/rp1.jpg	5
8	Wolfwalkers	A young apprentice hunter and her father journey to Ireland to help wipe out the last wolf pack. But everything changes when she befriends a free-spirited girl from a mysterious tribe rumored to transform into wolves by night.	../images/ww.jpg	6
9	Young Sheldon	Meet a child genius named Sheldon Cooper and his family. Some unique challenges face Sheldon who seems socially impaired.	../images/ys.jpg	7
10	The Office	A mockumentary on a group of typical office workers, where the workday consists of ego clashes, inappropriate behavior, and tedium.	../images/office.jpg	8
11	Coach	Hayden Fox is the head coach of a university football team, and eats, sleeps and lives football.	../images/coach.jpg	9
12	Fixer Upper	Chip and Joanna Gaines take on clients in the Waco Texas area, turning their fixer uppers into the homes of their dreams.	../images/fix.jpg	10
13	Annie	A foster kid, who lives with her mean foster mom, sees her life change when business tycoon and New York City mayoral candidate Will Stacks makes a thinly-veiled campaign move and takes her in.	../images/annie.jpg	11
20	Cobra Kai	Decades after their 1984 All Valley Karate Tournament bout, a middle-aged Daniel LaRusso and Johnny Lawrence find themselves martial-arts rivals again.	../images/kai.jpg	1
22	Dinosaurs	This show follows the life of a family of dinosaurs, living in a modern world. They have televisions, refrigerators, et cetera. The only humans around are cavemen, who are viewed as pets and wild animals.	../images/din.jpg	2
23	The Hustler	Join Craig Ferguson and a group of five suspects as they journey through a trivia show to find out who the Hustler truly is.	../images/hus.jpg	3
\.


--
-- Data for Name: reviews; Type: TABLE DATA; Schema: public; Owner: zpikmqacxiyaht
--

COPY "public"."reviews" ("id", "account_id", "content_id", "note") FROM stdin;
11	36	3	Best thing to happen to Star Wars since the original trilogy!
15	38	13	You can wait till tomorrow to watch this movie.
16	37	1	This show always makes me hungry!
12	36	2	Starts slow but gets really good after episode 3.
17	36	4	One of Disney and Pixar best films. Makes a really great companion film to Inside Out!
13	36	5	Funny Game Show, Very Creative
\.


--
-- Data for Name: scripture; Type: TABLE DATA; Schema: public; Owner: zpikmqacxiyaht
--

COPY "public"."scripture" ("id", "book", "chapter", "verse", "content") FROM stdin;
1	John	1	5	And the light shineth in darkness; and the darkness comprehended it not.
2	Doctrine and Covenants	88	49	The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.
3	Doctrine and Covenants	93	28	He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.
4	Mosiah	16	9	He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.
\.


--
-- Data for Name: service; Type: TABLE DATA; Schema: public; Owner: zpikmqacxiyaht
--

COPY "public"."service" ("id", "service_name") FROM stdin;
1	Netflix
2	Disney Plus
3	Hulu
4	Amazon Prime
5	HBO Max
6	Apple TV
7	CBS All Access
8	Peacock
9	IMDB TV
10	Discovery +
11	Other
\.


--
-- Data for Name: suggested_content; Type: TABLE DATA; Schema: public; Owner: zpikmqacxiyaht
--

COPY "public"."suggested_content" ("id", "suggested_content_name", "suggested_description", "service_id", "sinked") FROM stdin;
1	Cobra Kai	Decades after their 1984 All Valley Karate Tournament bout, a middle-aged Daniel LaRusso and Johnny Lawrence find themselves martial-arts rivals again.	1	yes
2	Dinosaurs!	This show follows the life of a family of dinosaurs, living in a modern world. They have televisions, refrigerators, et cetera. The only humans around are cavemen, who are viewed as pets and wild animals.	2	yes
4	The Good Place	Four people and their otherworldly frienemy struggle in the afterlife to define what it means to be good.	1	\N
5	junk suggestion	this is junk	11	no
6	The Hustler	Join Craig Ferguson and a group of five suspects as they journey through a trivia show to find out who the Hustler truly is.	3	yes
\.


--
-- Data for Name: team_user; Type: TABLE DATA; Schema: public; Owner: zpikmqacxiyaht
--

COPY "public"."team_user" ("id", "user_name", "password") FROM stdin;
4	tom	$2y$10$mKokl/RVRyI29IpwAbnLKutdlqLtT9u7YILbR9jE9jZotIpfP4HbG
5	jim	$2y$10$N0Qk.zF2pBc4cQXoXePDO.TSV4DKmB3FUpcHMuCpFpxUiTKVZx6Ge
\.


--
-- Data for Name: userq; Type: TABLE DATA; Schema: public; Owner: zpikmqacxiyaht
--

COPY "public"."userq" ("id", "account_id", "content_id", "startdate", "enddate") FROM stdin;
8	36	2	2021-02-13	\N
5	36	3	2021-02-13	2021-02-13
6	36	3	2021-02-13	2021-02-13
9	36	11	2021-02-14	\N
7	36	7	2021-02-13	2021-02-14
10	37	5	2021-02-14	\N
11	37	2	2021-02-14	\N
12	37	10	2021-02-14	\N
13	36	12	2021-02-14	\N
14	36	6	2021-02-15	\N
15	36	4	2021-02-15	\N
16	37	4	2021-02-16	\N
17	37	6	2021-02-16	2021-02-16
18	37	6	2021-02-16	2021-02-16
19	36	13	2021-02-20	\N
\.


--
-- Name: account_id_seq; Type: SEQUENCE SET; Schema: public; Owner: zpikmqacxiyaht
--

SELECT pg_catalog.setval('"public"."account_id_seq"', 43, true);


--
-- Name: content_id_seq; Type: SEQUENCE SET; Schema: public; Owner: zpikmqacxiyaht
--

SELECT pg_catalog.setval('"public"."content_id_seq"', 23, true);


--
-- Name: reviews_id_seq; Type: SEQUENCE SET; Schema: public; Owner: zpikmqacxiyaht
--

SELECT pg_catalog.setval('"public"."reviews_id_seq"', 21, true);


--
-- Name: scripture_id_seq; Type: SEQUENCE SET; Schema: public; Owner: zpikmqacxiyaht
--

SELECT pg_catalog.setval('"public"."scripture_id_seq"', 4, true);


--
-- Name: service_id_seq; Type: SEQUENCE SET; Schema: public; Owner: zpikmqacxiyaht
--

SELECT pg_catalog.setval('"public"."service_id_seq"', 11, true);


--
-- Name: suggested_content_id_seq; Type: SEQUENCE SET; Schema: public; Owner: zpikmqacxiyaht
--

SELECT pg_catalog.setval('"public"."suggested_content_id_seq"', 6, true);


--
-- Name: team_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: zpikmqacxiyaht
--

SELECT pg_catalog.setval('"public"."team_user_id_seq"', 5, true);


--
-- Name: userq_id_seq; Type: SEQUENCE SET; Schema: public; Owner: zpikmqacxiyaht
--

SELECT pg_catalog.setval('"public"."userq_id_seq"', 19, true);


--
-- Name: account account_email_key; Type: CONSTRAINT; Schema: public; Owner: zpikmqacxiyaht
--

ALTER TABLE ONLY "public"."account"
    ADD CONSTRAINT "account_email_key" UNIQUE ("email");


--
-- Name: account account_pkey; Type: CONSTRAINT; Schema: public; Owner: zpikmqacxiyaht
--

ALTER TABLE ONLY "public"."account"
    ADD CONSTRAINT "account_pkey" PRIMARY KEY ("id");


--
-- Name: account account_user_name_key; Type: CONSTRAINT; Schema: public; Owner: zpikmqacxiyaht
--

ALTER TABLE ONLY "public"."account"
    ADD CONSTRAINT "account_user_name_key" UNIQUE ("user_name");


--
-- Name: content content_pkey; Type: CONSTRAINT; Schema: public; Owner: zpikmqacxiyaht
--

ALTER TABLE ONLY "public"."content"
    ADD CONSTRAINT "content_pkey" PRIMARY KEY ("id");


--
-- Name: reviews reviews_pkey; Type: CONSTRAINT; Schema: public; Owner: zpikmqacxiyaht
--

ALTER TABLE ONLY "public"."reviews"
    ADD CONSTRAINT "reviews_pkey" PRIMARY KEY ("id");


--
-- Name: scripture scripture_pkey; Type: CONSTRAINT; Schema: public; Owner: zpikmqacxiyaht
--

ALTER TABLE ONLY "public"."scripture"
    ADD CONSTRAINT "scripture_pkey" PRIMARY KEY ("id");


--
-- Name: service service_pkey; Type: CONSTRAINT; Schema: public; Owner: zpikmqacxiyaht
--

ALTER TABLE ONLY "public"."service"
    ADD CONSTRAINT "service_pkey" PRIMARY KEY ("id");


--
-- Name: suggested_content suggested_content_pkey; Type: CONSTRAINT; Schema: public; Owner: zpikmqacxiyaht
--

ALTER TABLE ONLY "public"."suggested_content"
    ADD CONSTRAINT "suggested_content_pkey" PRIMARY KEY ("id");


--
-- Name: team_user team_user_pkey; Type: CONSTRAINT; Schema: public; Owner: zpikmqacxiyaht
--

ALTER TABLE ONLY "public"."team_user"
    ADD CONSTRAINT "team_user_pkey" PRIMARY KEY ("id");


--
-- Name: team_user team_user_user_name_key; Type: CONSTRAINT; Schema: public; Owner: zpikmqacxiyaht
--

ALTER TABLE ONLY "public"."team_user"
    ADD CONSTRAINT "team_user_user_name_key" UNIQUE ("user_name");


--
-- Name: userq userq_pkey; Type: CONSTRAINT; Schema: public; Owner: zpikmqacxiyaht
--

ALTER TABLE ONLY "public"."userq"
    ADD CONSTRAINT "userq_pkey" PRIMARY KEY ("id");


--
-- Name: content content_service_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: zpikmqacxiyaht
--

ALTER TABLE ONLY "public"."content"
    ADD CONSTRAINT "content_service_id_fkey" FOREIGN KEY ("service_id") REFERENCES "public"."service"("id");


--
-- Name: reviews reviews_account_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: zpikmqacxiyaht
--

ALTER TABLE ONLY "public"."reviews"
    ADD CONSTRAINT "reviews_account_id_fkey" FOREIGN KEY ("account_id") REFERENCES "public"."account"("id");


--
-- Name: reviews reviews_content_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: zpikmqacxiyaht
--

ALTER TABLE ONLY "public"."reviews"
    ADD CONSTRAINT "reviews_content_id_fkey" FOREIGN KEY ("content_id") REFERENCES "public"."content"("id");


--
-- Name: suggested_content suggested_content_service_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: zpikmqacxiyaht
--

ALTER TABLE ONLY "public"."suggested_content"
    ADD CONSTRAINT "suggested_content_service_id_fkey" FOREIGN KEY ("service_id") REFERENCES "public"."service"("id");


--
-- Name: userq userq_account_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: zpikmqacxiyaht
--

ALTER TABLE ONLY "public"."userq"
    ADD CONSTRAINT "userq_account_id_fkey" FOREIGN KEY ("account_id") REFERENCES "public"."account"("id");


--
-- Name: userq userq_content_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: zpikmqacxiyaht
--

ALTER TABLE ONLY "public"."userq"
    ADD CONSTRAINT "userq_content_id_fkey" FOREIGN KEY ("content_id") REFERENCES "public"."content"("id");


--
-- PostgreSQL database dump complete
--

