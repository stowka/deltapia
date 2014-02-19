-- deltapianotrio.com database
--
-- @author
--		Antoine De Gieter
-- @digest
--		This script will drop any database knows as `delta`.
--		Afterwards it will create a new database `delta` and add tables
--		according to the following structure.
--		Eventually, it will insert a few required basis rows.
-- @structure
--
-- @data
--

drop database if exists delta;
create database `delta` character set utf8 collate utf8_general_ci;
use delta;

--
-- Languages
--

create table `language` (
	`id` smallint(2) unsigned auto_increment,
	`name` varchar(16) not null,
	`englishName` varchar(16) not null,
	`code` varchar(2) not null,
	primary key (`id`),
	unique key (`name`),
	unique key (`englishName`),
	unique key (`code`)
) engine=InnoDB auto_increment=1 default charset=`utf8`;

lock tables `language` write;
insert into language (name, englishName, code) 
values ("English", "English", "EN"),
("Nederlands", "Dutch", "NL"),
("Deutsch", "German", "DE");
unlock tables;

--
-- Locale messages
--

create table `site` (
	`language` smallint(2) unsigned,
	`name` varchar(32) not null,
	`members` varchar(32) not null,
	`musicians` varchar(32) not null,
	`biography` varchar(32) not null,
	`repertoire` varchar(32) not null,
	`upcoming` varchar(32) not null,
	`past` varchar(32) not null,
	`download` varchar(32) not null,
	`send` varchar(32) not null,
	`yourName` varchar(32) not null,
	`yourEmail` varchar(32) not null,
	`yourMessage` varchar(32) not null,
	primary key (`language`),
	constraint `fk_site_language`
		foreign key (`language`)
		references language(`id`)
		on update cascade
		on delete cascade
) engine=InnoDB default charset=`utf8`;

lock tables `site` write;
insert into site (language, name, members, musicians,
	biography, repertoire, 
	upcoming, past, download, send, yourName, yourEmail, yourMessage)
values (1, "Delta Piano Trio", "Members", "Musicians", "Biography", "Repertoire",
	"Upcoming", "Past", "Download", "Send", "Your name", "Your e-mail", "Your message"),
(2, "Delta Pianotrio", "Members", "Musicians", "Biografie", "Repertoire",
	"Upcoming", "Past", "Download", "Sturen", "Uw naam", "Uw e-mail", "Uw Bericht"),
(3, "Delta Klaviertrio", "Members", "Muzikanten", "Biografie", "Repertoire",
	"Upcoming", "Past", "Herunterladen", "Senden", "Ihr Name", "Ihre E-Mail", "Ihre Nachricht");
unlock tables;

create table `menu` (
	`language` smallint(2) unsigned,
	`home` varchar(32) not null,
	`about` varchar(32) not null,
	`concerts` varchar(32) not null,
	`repertoire` varchar(32) not null,
	`photos` varchar(32) not null,
	`recordings` varchar(32) not null,
	`contact` varchar(32) not null,
	primary key (`language`),
	constraint `fk_menu_language`
		foreign key (`language`)
		references language(`id`)
		on update cascade
		on delete cascade
) engine=InnoDB default charset=`utf8`;

lock table `menu`write;
insert into menu (language, home, about, concerts, 
	repertoire, photos, recordings, contact)
values (1, "Home", "About", "Concerts", "Repertoire", 
	"Photos", "Recordings", "Contact"),

(2, "Home", "Het Trio", "Concerten","Repertoire", 
	"Foto's", "Opnames", "Contact"),

(3, "Home", "Das Trio", "Konzerte","Repertoire", 
	"Fotos", "Aufnahmen", "Kontakt");
unlock tables;

create table `home` (
	`language` smallint(2) unsigned,
	`text` mediumtext not null,
	primary key (`language`),
	constraint `fk_home_language`
		foreign key (`language`)
		references language(`id`)
		on update cascade
		on delete cascade
) engine=InnoDB default charset=`utf8`;

lock tables `home` write;
insert into home (language, text)
values (1, "Lorem ipsum EN"),
(2, "Lorem ipsum NL"),
(3, "Lorem ipsum DE");
unlock tables;

create table `about` (
	`language` smallint(2) unsigned,
	`biography` longtext not null,
	primary key (`language`),
	constraint `fk_about_language`
		foreign key (`language`)
		references language(`id`)
		on update cascade
		on delete cascade
) engine=InnoDB default charset=`utf8`;

lock tables `about` write;
insert into about (language, biography)
values (1, "The Delta Piano Trio was formed in Salzburg (Austria) by three young Dutch performers: violinist Gerard Spronk, cellist Irene Enzlin and pianist Vera Kooper.\r\nIn a world of globalized uniformity, the trio is noticeable for its personal sound, dedication and natural youthful vigor. Their playing is honest, un-affected and passionate, merging three personalities into one musical entity. They approach chamber music as a form of communication, an exchange of ideas, and a shared road of reflection, discovery and evolution.\r\n\r\nAiming to shape their own path, the Delta Piano Trio has an eclectic and personal choice of repertoire, encompassing the entire range of the piano trio repertoire. They have the privilege to work under the guidance of members of the Vienna Piano Trio and the Hagen Quartet, as well as world-renowned pianist Stephen Kovacevich and violinist Vera Beths."),
(2, "Het Delta/Aurora Piano Trio werd in Salzburg (Oostenrijk) opgericht door drie jonge Nederlandse musici: violist Gerard Spronk, celliste Irene Enzlin en pianiste Vera Kooper.\r\nHet trio valt op door haar persoonlijke klankwereld, toewijding en natuurlijk enthousiasme.\r\nHun spel is eerlijk, un-affected en gepassioneerd, het samenvoegen van drie persoonlijkheden tot een muzikale eenheid.\r\nZe benaderen kamermuziek als een vorm van communicatie, een uitwisseling van ideeen en een gedeelde weg van reflective, ontdekking en evolutie.\r\nMet als doel hun eigen pad te vormen, heeft het Delta trio een eclectische en persoonlijke repertoire keuze, die het hele bereik van piano trio literatuur omvat.\r\nZe hebben het voorrecht te werken met leden van het &quot;Wiener Klaviertrio&quot;, het &quot;Hagen Kwartet&quot;, gerenommeerde pianist Stephen Kovacevich en violiste Vera Beths."),
(3, "Das Delta Klaviertrio wurde in Salzburg (Österreich) von drei jungen Niederländischen Musikern gegründet: Geiger Gerard Spronk, Cellistin Irene Enzlin und Pianistin Vera Kooper.\r\nIn einer Welt der globalisierten Uniformität überzeugt das Trio mit einem persönlichen Klang, Engagement und natürlicher jugendlicher Frische. Ihr Spiel ist ehrlich, selbstlos und leidenschaftlich. Es ist eine Zusammenlegung von drei Persönlichkeiten zu einer musikalischen Einheit. Sie nähern sich der Kammermusik als eine Form der Kommunikation, des Austausches von Ideen und einem gemeinsamen Weg der Reflexion, der Entdeckung und Entwicklung.\r\nMit dem Ziel, ihren eigenen Weg zu gestalten, hat das Delta Klaviertrio eine vielseitige und persönliche Auswahl des Repertoires, die das gesamte Spektrum des Klaviertrio Literatur umfasst. Sie haben das Privileg zu arbeiten unter der Leitung von Mitgliedern des Wiener Klaviertrios und des Hagen Quartetts, sowie dem weltbekannten Pianisten Stephen Kovacevich und Geigerin Vera Beths.");
unlock tables;

--
-- Location
--

create table `country` (
	`id` smallint(2) unsigned auto_increment,
	`name` varchar(40) not null,
	`shortName` varchar(4) not null,
	`latitude` decimal(10, 8) not null comment 'Between -90 and 90 degrees',
	`longitude` decimal(11, 8) not null comment 'Between -180 and 180 degrees',
	primary key (`id`),
	unique key (`name`),
	unique key (`shortName`)
) engine=InnoDB auto_increment=1 default charset=`utf8`;

lock tables `country` write;
insert into country (name, shortName, latitude, longitude) 
values ("No country", "None", 0.00000000, 0.00000000),
("Austria", "AT", 47.20000000, 13.20000000),
("The Netherlands", "NL", 52.30000000, 5.45000000),
("Germany", "DE", 51.00000000, 9.00000000),
("United Kingdom", "UK", 54.00000000, -2.00000000),
("Swiss Confederation", "CH", 47.00000000, 8.00000000);
unlock tables;

create table `countryName` (
	`country` smallint(2) unsigned default 1,
	`language` smallint(2) unsigned,
	`name` varchar(40) not null,
	primary key (`country`, `language`),
	constraint `fk_countryName_country`
		foreign key (`country`)
		references country(`id`)
		on update cascade
		on delete cascade,
	constraint `fk_countryName_language`
		foreign key (`language`)
		references language(`id`)
		on update cascade
		on delete cascade
) engine=InnoDB default charset=`utf8`;

lock tables `countryName` write;
insert into countryName (country, language, name)
values (2, 1, "Austria"),
(2, 2, "Oostenrijk"),
(2, 3, "Österreich"),

(3, 1, "The Netherlands"),
(3, 2, "Nederland"),
(3, 3, "Niederlande"),

(4, 1, "Germany"),
(4, 2, "Duitsland"),
(4, 3, "Deutschland"),

(5, 1, "United Kingdom"),
(5, 2, "Verenigd Koninkrijk"),
(5, 3, "Vereinigtes Königreich"),

(6, 1, "Swiss Confederation"),
(6, 2, "Zwitserse Confederatie"),
(6, 3, "Schweizerische Eidgenossenschaft");
unlock tables;

create table `city` (
	`id` bigint(10) unsigned auto_increment,
	`name` varchar(32) not null,
	`country` smallint(2) unsigned not null,
	`latitude` decimal(10, 8) not null comment 'Between -90 and 90 degrees',
	`longitude` decimal(11, 8) not null comment 'Between -180 and 180 degrees',
	primary key (`id`),
	constraint `fk_city_country`
		foreign key (`country`)
		references country(`id`)
		on delete cascade
		on update cascade
) engine=InnoDB auto_increment=1 default charset=`utf8`;

lock tables `city` write;
insert into city (name, country, latitude, longitude)
values ("No city", 1, 0.00000000, 0.00000000),
("Salzburg", 2, 47.80949000, 13.05501000),
("Vienna", 2, 48.20817430, 16.37381890),
("Basel", 6, 47.557421, 7.59257269),
("London", 5, 51.51121389, -0.11982440),
("Munich", 4, 48.13743000, 11.57549000),
("Amsterdam", 3, 52.37021570, 4.89516790);
unlock tables;

create table `cityName` (
	`city` bigint(10) unsigned,
	`language` smallint(2) unsigned,
	`name` varchar(40) not null,
	primary key (`city`, `language`),
	constraint `fk_cityName_city`
		foreign key (`city`)
		references city(`id`)
		on update cascade
		on delete cascade,
	constraint `fk_cityName_language`
		foreign key (`language`)
		references language(`id`)
		on update cascade
		on delete cascade
) engine=InnoDB default charset=`utf8`;

lock tables `cityName` write;
insert into cityName (city, language, name)
values (2, 1, "Salzburg"),
(2, 2, "Salzburg"),
(2, 3, "Salzburg"),

(3, 1, "Vienna"),
(3, 2, "Wenen"),
(3, 3, "Wien"),

(4, 1, "Basel"),
(4, 2, "Bazel"),
(4, 3, "Basel"),

(5, 1, "London"),
(5, 2, "Londen"),
(5, 3, "London"),

(6, 1, "Munich"),
(6, 2, "München"),
(6, 3, "München"),

(7, 1, "Amsterdam"),
(7, 2, "Amsterdam"),
(7, 3, "Amsterdam");
unlock tables;

create table `venue` (
	`id` bigint(10) unsigned auto_increment,
	`name` varchar(32) not null,
	`address` varchar(128) not null comment "street and number",
	`city` bigint(10) unsigned,
	primary key (`id`),
	constraint `fk_venue_city`
		foreign key (`city`)
		references city(`id`)
		on update cascade
		on delete cascade
) engine=InnoDB auto_increment=1 charset=`utf8`;

lock tables `venue` write;
insert into venue (name, address, city)
values ("Schloss Mirabell", "Mirabellplatz 4", 2);
unlock tables;

--
-- Instruments
--

create table `instrument` (
	`id` smallint(2) unsigned auto_increment,
	`name`varchar(16) not null,
	primary key (`id`)
) engine=InnoDB auto_increment=1 default charset=`utf8`;

lock tables `instrument` write;
insert into instrument (name)
values ("Violin"), ("Cello"), ("Piano");
unlock tables;

create table `instrumentName` (
	`instrument` smallint(2) unsigned,
	`language` smallint(2) unsigned,
	`name` varchar(16) not null,
	primary key (`instrument`, `language`),
	constraint `fk_instrumentName_instrument`
		foreign key (`instrument`)
		references instrument(`id`)
		on update cascade
		on delete cascade,
	constraint `fk_instrumentName_language`
		foreign key (`language`)
		references language(`id`)
		on update cascade
		on delete cascade
) engine=InnoDB default charset=`utf8`;

lock tables `instrumentName` write;
insert into instrumentName (instrument, language, name)
values (1, 1, "Violin"),
(1, 2, "Viool"),
(1, 3, "Violine"),

(2, 1, "Cello"),
(2, 2, "Cello"),
(2, 3, "Cello"),

(3, 1, "Piano"),
(3, 2, "Piano"),
(3, 3, "Klavier");
unlock tables;

--
-- Members
--

create table `member` (
	`id` tinyint(1) unsigned auto_increment,
	`firstName` varchar(16) not null,
	`lastName` varchar(16) not null,
	`instrument` smallint(2) not null,
	`dateOfBirth`date not null,
	primary key (`id`)
) engine=InnoDB auto_increment=1 default charset=`utf8`;

lock tables `member` write;
insert into member (firstName, lastName, instrument, dateOfBirth)
values ("Gerard", "Spronk", 1, "0000-00-00"),
("Irene", "Enzlin", 2, "1993-01-13"),
("Vera", "Kooper", 3, "1988-09-05");
unlock tables;

create table `cv` (
	`member` tinyint(1) unsigned,
	`language` smallint(2) unsigned,
	`text` longtext not null,
	primary key (`member`, `language`),
	constraint `fk_cv_member`
		foreign key (`member`)
		references member(`id`)
		on update cascade
		on delete cascade,
	constraint `fk_cv_language`
		foreign key (`language`)
		references language(`id`)
		on update cascade
		on delete cascade
) engine=InnoDB default charset=`utf8`;

lock tables `cv` write;
insert into cv (member, language, text)
values (1, 1, "Gerard's CV - EN"),(1, 2, "Gerard's CV - NL"),(1, 3, "Gerard's CV - DE"),
(2, 1, "Irene's CV - EN"),(2, 2, "Irene's CV - NL"),(2, 3, "Irene's CV - DE"),
(3, 1, "Vera's CV - EN"),(3, 2, "Vera's CV - NL"),(3, 3, "Vera's CV - DE");
unlock tables;

--
-- Concerts
--

create table `concert` (
	`id` bigint(10) unsigned auto_increment,
	`title` varchar(128) not null,
	`datetime` datetime not null,
	`venue` bigint(10) unsigned,
	primary key (`id`),
	constraint `fk_concert_venue`
		foreign key (`venue`)
		references venue(`id`)
		on update cascade
		on delete cascade
) engine=InnoDB auto_increment=1 default charset=`utf8`;

lock tables `concert` write;
insert into concert (title, datetime, venue)
values ("Concert Schlosskirche Mirabell", "2014-01-26 17:00:00", 1),
("Concert Schlosskirche Mirabell", "2014-01-21 17:00:00", 1);
unlock tables;

create table `concertDescription` (
	`concert` bigint(10) unsigned,
	`language` smallint(2) unsigned,
	`text` longtext not null,
	primary key (`concert`, `language`),
	constraint `fk_concertDescription_concert`
		foreign key (`concert`)
		references concert(`id`)
		on update cascade
		on delete cascade,
	constraint `fk_concertDescription_language`
		foreign key (`language`)
		references language(`id`)
		on update cascade
		on delete cascade
) engine=InnoDB charset=`utf8`;

lock tables `concertDescription` write;
insert into concertDescription (concert, language, text)
values (1, 1, "- J. Haydn: Klaviertrio Op. 39 in g dur (Gypsy)\r\n- J. Brahms: Klaviertrio Nr. 3, c-moll, Op. 101 \r\n\r\n----- Intermission -----\r\n\r\n- W.A. Mozart: Klavier Sonate Nr. 17 in b dur KV 570\r\n- D. Shostakovich: Klaviertrio Nr. 2 in e moll, Op.67"),
(2, 1, "- W.A. Mozart: Klavier Sonate Nr. 17 in b dur KV 570\r\n- L. van Beethoven: Sonate für violine und Klavier Nr. 9 (Kreutzer)\r\n\r\n---- Intermission -----\r\n\r\n- J. Haydn: Klaviertrio Op. 39 in g dur (Gypsy)\r\n- D. Shostakovich: Klaviertrio Nr. 2 in e moll, Op.67"),

(1, 2, "- J. Haydn: Klaviertrio Op. 39 in g dur (Gypsy)\r\n- J. Brahms: Klaviertrio Nr. 3, c-moll, Op. 101 \r\n\r\n----- Pauze -----\r\n\r\n- W.A. Mozart: Klavier Sonate Nr. 17 in b dur KV 570\r\n- D. Shostakovich: Klaviertrio Nr. 2 in e moll, Op.67"),
(2, 2, "- W.A. Mozart: Klavier Sonate Nr. 17 in b dur KV 570\r\n- L. van Beethoven: Sonate für violine und Klavier Nr. 9 (Kreutzer)\r\n\r\n----- Pauze -----\r\n\r\n- J. Haydn: Klaviertrio Op. 39 in g dur (Gypsy)\r\n- D. Shostakovich: Klaviertrio Nr. 2 in e moll, Op.67"),

(1, 3, "- J. Haydn: Klaviertrio Op. 39 in g dur (Gypsy)\r\n- J. Brahms: Klaviertrio Nr. 3, c-moll, Op. 101 \r\n\r\n----- Pause -----\r\n\r\n- W.A. Mozart: Klavier Sonate Nr. 17 in b dur KV 570\r\n- D. Shostakovich: Klaviertrio Nr. 2 in e moll, Op.67"),
(2, 3, "- W.A. Mozart: Klavier Sonate Nr. 17 in b dur KV 570\r\n- L. van Beethoven: Sonate für violine und Klavier Nr. 9 (Kreutzer)\r\n\r\n----- Pause -----\r\n\r\n- J. Haydn: Klaviertrio Op. 39 in g dur (Gypsy)\r\n- D. Shostakovich: Klaviertrio Nr. 2 in e moll, Op.67");
unlock tables;

--
-- Repertoire
--

create table `repertoire` (
	`language` smallint(2) unsigned,
	`repertoire` longtext not null,
	primary key (`language`),
	constraint `fk_repertoire_language`
		foreign key (`language`)
		references language(`id`)
		on update cascade
		on delete cascade
) engine=InnoDB default charset=`utf8`;

lock tables `repertoire` write;
insert into repertoire (language, repertoire)
values (1, "Repertoire EN"),
(2, "Repertoire NL"),
(3, "Repertoire DE");
unlock tables;

--
-- Pictures
--

create table `photographer` (
	`id` smallint(2) unsigned auto_increment,
	`name` varchar(64) not null,
	`website` varchar(256) not null,
	primary key (`id`)
) engine=InnoDB auto_increment=1 default charset=`utf8`;

lock tables `photographer` write;
insert into photographer (name, website)
values ("Sarah Wijzenbeek", "http://www.sarahwijzenbeek.com");
unlock tables;

create table `album` (
	`id` smallint(2) unsigned auto_increment,
	`datetime` datetime not null,
	`photographer` smallint(2) unsigned,
	primary key (`id`),
	constraint `fk_album_photographer`
		foreign key (`photographer`)
		references photographer(`id`)
		on update cascade
		on delete cascade
) engine=InnoDB auto_increment=1 default charset=`utf8`;

lock tables `album` write;
insert into album (datetime, photographer)
values (current_timestamp, 1);
unlock tables;

create table `extension` (
	`id` tinyint(1) unsigned auto_increment,
	`extension` varchar(4) not null,
	primary key (`id`)
) engine=InnoDB auto_increment=1 default charset=`utf8`;

lock tables `extension` write;
insert into extension (extension)
values ("jpg"), ("png"), ("jpeg");
unlock tables;

create table `picture` (
	`id` bigint(10) unsigned auto_increment,
	`extension` tinyint(1) unsigned,
	`album` smallint(2) unsigned,
	primary key (`id`),
	constraint `fk_picture_extension`
		foreign key (`extension`)
		references extension(`id`)
		on update cascade
		on delete cascade,
	constraint `fk_picture_album`
		foreign key (`album`)
		references album(`id`)
		on update cascade
		on delete cascade
) engine=InnoDB auto_increment=1 default charset=`utf8`;

lock tables `picture` write;
insert into picture (extension, album)
values (1, 1),(1, 1),(1, 1),(1, 1),(1, 1),
(1, 1),(1, 1),(1, 1),(1, 1),(1, 1),(1, 1),
(1, 1),(1, 1),(1, 1),(1, 1),(1, 1),(1, 1),
(1, 1),(1, 1);
unlock tables;