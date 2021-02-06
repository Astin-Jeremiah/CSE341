--Create The Table Structure

CREATE TABLE account
(
	id SERIAL NOT NULL PRIMARY KEY,
	first_name VARCHAR(50) NOT NULL,
	last_name VARCHAR(50) NOT NULL,
	password VARCHAR(100) NOT NULL,
	email VARCHAR(254) NOT NULL UNIQUE
);

CREATE TABLE public.service
(
	id SERIAL NOT NULL PRIMARY KEY,
	service_name VARCHAR(50) NOT NULL
);



CREATE TABLE public.content
(
	id SERIAL NOT NULL PRIMARY KEY,
	content_name VARCHAR(100) NOT NULL,
	description VARCHAR(254) NOT NULL,ALTER TABLE public.service RENAME COLUMN name TO servicename;
	picture VARCHAR(254),
	service_id INT NOT NULL REFERENCES public.service(id)
);

CREATE TABLE userq
(
	id SERIAL NOT NULL PRIMARY KEY,
	account_id INT NOT NULL REFERENCES account(id),
	content_id INT NOT NULL REFERENCES content(id),
	startdate DATE,
	enddate DATE
);

--Insert Starter Data Into The Tables

INSERT INTO public.service (name) VALUES ('Netflix');
INSERT INTO public.service (name) VALUES ('Disney Plus');
INSERT INTO public.service (name) VALUES ('Hulu');
INSERT INTO public.service (name) VALUES ('Amazon Prime');
INSERT INTO public.service (name) VALUES ('HBO Max');
INSERT INTO public.service (name) VALUES ('Apple TV');
INSERT INTO public.service (name) VALUES ('CBS All Access');
INSERT INTO public.service (name) VALUES ('Peacock');
INSERT INTO public.service (name) VALUES ('IMDB TV');
INSERT INTO public.service (name) VALUES ('Discovery +');
INSERT INTO public.service (name) VALUES ('Other');

INSERT INTO account (first_name, last_name, password, email) VALUES ('Jeremiah', 'Astin', 'Emma1985!', 'jeremiahastin@gmail.com');
INSERT INTO account (first_name, last_name, password, email) VALUES ('Sample', 'User', 'Test1234', 'user@user.com');

INSERT INTO public.content (name, description, service_id) VALUES ('The Great British Baking Show', 'Bakers complete to see who is the best baker in England.', '1');
INSERT INTO public.content (name, description, service_id) VALUES ('WandaVision', 'Wanda Maximoff and Vision, two super-powered beings, living their ideal suburban lives-begin to suspect that everything is not as it seems.', '2');
INSERT INTO public.content (name, description, service_id) VALUES ('The Mandalorian', 'The travels of a lone bounty hunter in the outer reaches of the galaxy, far from the authority of the New Republic.', '2');

INSERT INTO userq (account_id, content_id, startdate) VALUES ('1', '2', '1/30/2021');
INSERT INTO userq (account_id, content_id, startdate) VALUES ('1', '3', '1/30/2021');
INSERT INTO userq (account_id, content_id, startdate, enddate) VALUES ('2', '1', '1/30/2021', '2/1/2021');
INSERT INTO userq (account_id, content_id, startdate) VALUES ('2', '3', '1/30/2021');

UPDATE public.userq SET enddate = '2/1/2021' WHERE user_id = 2 and content_id = 1;

--Pull Data From The Tables To Display Info For User Q

SELECT public.content.content_name, public.content.description, public.service.service_name FROM public.content INNER JOIN public.userq ON public.content.id = public.userq.content_id INNER JOIN public.service ON public.service.id = public.content.service_id WHERE public.userq.user_id = 1;


SELECT * FROM public.userq WHERE user_id = 2 and enddate IS null;

INSERT INTO content (content_name, description, picture, service_id) VALUES ('The Masked Singer', '12 celebrity performers wear costumes to conceal identities. One singer is eliminated each week and unmasked. Small hints are given for the viewer guess along.', '../images/ms.jpg', '4');

CREATE TABLE reviews
(
	id SERIAL NOT NULL PRIMARY KEY,
	account_id INT NOT NULL REFERENCES account(id),
	content_id INT NOT NULL REFERENCES content(id),
	note_text TEXT NOT NULL
);

ALTER TABLE reviews
RENAME COLUMN note_text TO note;

INSERT INTO reviews (account_id, content_id, note) VALUES ('1', '5', 'Really Funny Game Show');
INSERT INTO reviews (account_id, content_id, note) VALUES ('1', '2', 'Marvel Does It Again!  All the fun of the MCU in a 30 minute episode.');
INSERT INTO reviews (account_id, content_id, note) VALUES ('1', '3', 'Best thing to happen to Star Wars since the original trilogy!');

INSERT INTO reviews (account_id, content_id, note) VALUES ('2', '3', 'The first season was kind of slow, but the second season rocked!');

CREATE TABLE account AS TABLE public.user;

ALTER TABLE reviews DROP CONSTRAINT user_id_fk;
 ALTER TABLE



