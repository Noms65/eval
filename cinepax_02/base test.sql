-- bd cinepax_02
\c postgres
drop database cinepax_02;
create database cinepax_02;
\c cinepax_02;

create table Users(
    idUsers serial primary key,
    nom varchar(20),
    prenom varchar(20),
    password varchar(20)
);
insert into Users(nom,prenom,password)values
('nomena','nom','1234');

create table Types_billet(
    idTypes_billet serial primary key,
    types varchar
);
insert into Types_billet(types)values
('adulte'),('enfant');

create table billet(
    idbillet serial primary key,
    Numero integer,
    idTypes_billet integer references Types_billet(idTypes_billet),
    montant numeric(7,2),
    dispo boolean
);
insert into Billet(numero,idTypes_billet,montant,dispo) values
(100,1,120,'true'),(101,1,120,'true'),(102,1,120,'true'),(103,1,120,'true'),
(104,2,100,'true'),(105,2,100,'true'),(106,2,100,'true'),(107,2,100,'true');

create table categorie_film(
    idcategorie_film serial primary key,
    categorie varchar
);
insert into categorie_film(categorie)values
('action'),('love'),('aventure'),('Futurs');

create table Film(
    idFilm serial primary key,
    nom varchar(20),
    idcategorie_film integer references categorie_film(idcategorie_film)
);
insert into Film(nom,idcategorie_film)values
('Expendable',1),('Expendable',1),('Love addict',2),('love you',2),('Aladin',3),('Forelot',3),
('Alienoid',4),('Zombie',4);


create table Salle(
    idSalle serial primary key,
    Nom varchar(20)
);
insert into Salle(nom)values
('S1'),('S2'),('S3');

create table Salle_place(
    idSalle_place serial primary key,
    idSalle integer references Salle(idSalle),
    rangee integer,
    Nom_place varchar(20),
    dispo boolean default true
);
insert into Salle_place(idsalle,rangee,Nom_place)values
(1,1,'A1'),(1,1,'A2'),(1,1,'A3'),(1,1,'A4'),
(1,2,'B1'),(1,2,'B2'),(1,2,'B3'),(1,2,'B4'),
(1,3,'C1'),(1,3,'C2'),(1,3,'C3'),(1,3,'C4'),

(2,1,'A1'),(2,1,'A2'),(2,1,'A3'),(2,1,'A4'),
(2,2,'B1'),(2,2,'B2'),(2,2,'B3'),(2,2,'B4'),
(2,3,'C1'),(2,3,'C2'),(2,3,'C3'),(2,3,'C4'),

(3,1,'A1'),(3,1,'A2'),(3,1,'A3'),(3,1,'A4'),
(3,2,'B1'),(3,2,'B2'),(3,2,'B3'),(3,2,'B4'),
(3,3,'C1'),(3,3,'C2'),(3,3,'C3'),(3,3,'C4'),

(4,1,'A1'),(3,1,'A2'),(3,1,'A3'),(3,1,'A4'),
(4,2,'B1'),(3,2,'B2'),(3,2,'B3'),(3,2,'B4'),
(4,3,'C1'),(3,3,'C2'),(3,3,'C3'),(3,3,'C4');

create table Seance(
    idSeance serial primary key,
    numseance integer,
    idSalle integer references Salle(idsalle),
    idFilm integer references Film(idFilm),
    HeureDebut timestamp,
    HeureFin timestamp
);
insert INTO Seance(numseance,idSalle,idFilm,HeureDebut,HeureFin)values
(10,1,1,'2024-04-10 08:00:00','2024-04-10 09:45:00'),
(20,1,2,'2024-04-10 10:00:00','2024-04-10 11:45:00'),
(30,1,3,'2024-04-10 12:00:00','2024-04-10 12:30:00'),
(40,1,4,'2024-04-10 14:00:00','2024-04-10 14:45:00'),
(50,1,5,'2024-04-10 15:00:00','2024-04-10 15:45:00'),
(60,1,6,'2024-04-10 16:00:00','2024-04-10 16:45:00'),
(70,1,7,'2024-04-10 17:00:00','2024-04-10 17:45:00');

-- v_getseance
create or replace view v_getseance as
select
seance.idseance,
seance.numseance,
salle.nom as nom_salle,
film.nom as nom_film,
categorie_film.categorie as categorie_film,
seance.HeureDebut,
seance.HeureFin
from seance
join Salle on salle.idsalle=seance.idsalle
join film on film.idfilm=seance.idfilm
join categorie_film ON categorie_film.idcategorie_film = film.idcategorie_film;


create table vente_billet(
    idvente_billet serial primary key,
    idbillet integer references billet(idbillet),
    idseance integer references seance(idseance),
    idSalle_place integer references Salle_place(idSalle_place)
);

create or replace view v_getsalle_place AS
select
salle_place.idsalle_place,
salle.idsalle,
salle.nom as nom_salle,
salle_place.rangee,
salle_place.nom_place,
salle_place.dispo
from salle_place
join salle on salle.idsalle = salle_place.idsalle;

create or replace view v_getvente_billet as
select
billet.numero as numero_billet,
types_billet.types as type_billet,
billet.montant as montant,
v_getsalle_place.nom_salle as salle,
v_getsalle_place.rangee as rangee,
v_getsalle_place.nom_place as place,
v_getseance.numseance,
v_getseance.nom_film as film,
v_getseance.nom_film as categorie_film,
v_getseance.heuredebut,
v_getseance.heurefin
from vente_billet
join billet ON billet.idbillet = vente_billet.idbillet
join types_billet on types_billet.idtypes_billet = billet.idtypes_billet
join v_getsalle_place on v_getsalle_place.idsalle_place = vente_billet.idsalle_place
join v_getseance on v_getseance.idseance = vente_billet.idseance;

-- Partie 2 Projet


create table Type_produit(
    idType_produit serial primary key,
    Type_produit varchar
);
create table Produit(
    idProduit serial primary key,
    nom varchar(20),
    idType_produit integer references Type_produit(idType_produit),
    prix numeric(7,2)
);
create table vente_produit(
    idvente_produit serial primary key,
    idclient integer references client(idclient),
    idProduit integer references produit(produit)
);

-- cree  view pour avoir les statistique de vente
-- view film le plus vues
select
    film.nom as nom_film,
    count(film.nom) as nombre_vue
from client
join Seance on seance.idseance=idclient.idseance
join film on film.idFilm=seance.idFilm
group by film.nom




-- table multi-lingue

CREATE TABLE langue (
    id SERIAL PRIMARY KEY,
    nom VARCHAR
);
INSERT INTO langue (nom)
VALUES
('Français'),
('Mandarin'),
('Allemand');

CREATE TABLE contenu (
    id SERIAL PRIMARY KEY,
    contenu TEXT,
    id_langue INT REFERENCES langue(id)
);
insert into contenu (contenu,id_langue)values
('Bonjour, comment ça va ?',1),
('感谢您访问我们的网站。',2),
('Hallo, wie geht es dir?',3);



-- table du import csv

drop table data_csv;
create table data_csv(
    id serial primary key,
    NumSeance integer,
    Film varchar(20),
    categorie varchar(20),
    salle varchar(20),
    Date varchar(20),
    Heure varchar(20)
);






create table Users(
    idUsers serial primary key,
    nom varchar(20),
    prenom varchar(20),
    password varchar(20)
);
insert into Users(nom,prenom,password)values
('nomena','nom','1234');
-- admin --

create table Produit(
    idProduit serial primary key,
    nom varchar(20),
    prix numeric(7,2)
);
insert into Produit(nom,prix) values
('popcorn',10000),('boisson',20000),('lunette3D',50000);

create table Film(
    idFilm serial primary key,
    nom varchar(20)
);
insert into Film(nom)values
('Expendable'),('love'),('action'),('ninja'),
('back up'),('king'),('start game'),('stranger'),
('amiricain'),('strategie'),('mechanic');

-- ALTER table film ALTER COLUMN nom TYPE varchar(20);


-- create table Place(
--     idPlace serial primary key,
--     rangee integer,
--     numero integer
-- );
-- insert into Place(rangee,numero)values
-- (1,1),(1,2),(1,3),(1,4),(1,5),(1,6),(1,7),(1,8),(1,9),(1,10),
-- (2,1),(2,2),(2,3),(2,4),(2,5),(2,6),(2,7),(2,8),(2,9),(2,10),
-- (3,1),(3,2),(3,3),(3,4),(3,5),(3,6),(3,7),(3,8),(3,9),(3,10),
-- (4,1),(4,2),(4,3),(4,4),(4,5),(4,6),(4,7),(4,8),(4,9),(4,10),
-- (5,1),(5,2),(5,3),(5,4),(5,5),(5,6),(5,7),(5,8),(5,9),(5,10),
-- (6,1),(6,2),(6,3),(6,4),(6,5),(6,6),(6,7),(6,8),(6,9),(6,10),
-- (7,1),(7,2),(7,3),(7,4),(7,5),(7,6),(7,7),(7,8),(7,9),(7,10),
-- (8,1),(8,2),(8,3),(8,4),(8,5),(8,6),(8,7),(8,8),(8,9),(8,10),
-- (9,1),(9,2),(9,3),(9,4),(9,5),(9,6),(9,7),(9,8),(9,9),(9,10);


create table Salle(
    idSalle serial primary key,
    nom varchar(20)
);
insert into Salle(nom)values
('S1'),('S2'),('S3');

create table Salle_place(
    idSalle_place serial primary key,
    idSalle integer references Salle(idSalle),
    rangee integer,
    numero integer,
    dispo boolean default true
);

--  get place avec rang
select
    *
from Salle_place
    join place on place.idPlace=salle_place.idPlace

-- ALTER TABLE salle ADD dispo boolean default true;

insert into Salle_place(idSalle,rangee,numero) values

(1,1,1),(1,1,2),(1,1,3),(1,1,4),(1,1,5),(1,1,6),(1,1,7),(1,1,8),(1,1,9),(1,1,10),
(1,2,1),(1,2,2),(1,2,3),(1,2,4),(1,2,5),(1,2,6),(1,2,7),(1,2,8),(1,2,9),(1,2,10),
(1,3,1),(1,3,2),(1,3,3),(1,3,4),(1,3,5),(1,3,6),(1,3,7),(1,3,8),(1,3,9),(1,3,10),
(1,4,1),(1,4,2),(1,4,3),(1,4,4),(1,4,5),(1,4,6),(1,4,7),(1,4,8),(1,4,9),(1,4,10),
(1,5,1),(1,5,2),(1,5,3),(1,5,4),(1,5,5),(1,5,6),(1,5,7),(1,5,8),(1,5,9),(1,5,10),
(1,6,1),(1,6,2),(1,6,3),(1,6,4),(1,6,5),(1,6,6),(1,6,7),(1,6,8),(1,6,9),(1,6,10),
(1,7,1),(1,7,2),(1,7,3),(1,7,4),(1,7,5),(1,7,6),(1,7,7),(1,7,8),(1,7,9),(1,7,10),
(1,8,1),(1,8,2),(1,8,3),(1,8,4),(1,8,5),(1,8,6),(1,8,7),(1,8,8),(1,8,9),(1,8,10),
(1,9,1),(1,9,2),(1,9,3),(1,9,4),(1,9,5),(1,9,6),(1,9,7),(1,9,8),(1,9,9),(1,9,10),

(2,1,1),(2,1,2),(2,1,3),(2,1,4),(2,1,5),(2,1,6),(2,1,7),(2,1,8),(2,1,9),(2,1,10),
(2,2,1),(2,2,2),(2,2,3),(2,2,4),(2,2,5),(2,2,6),(2,2,7),(2,2,8),(2,2,9),(2,2,10),
(2,3,1),(2,3,2),(2,3,3),(2,3,4),(2,3,5),(2,3,6),(2,3,7),(2,3,8),(2,3,9),(2,3,10),
(2,4,1),(2,4,2),(2,4,3),(2,4,4),(2,4,5),(2,4,6),(2,4,7),(2,4,8),(2,4,9),(2,4,10),
(2,5,1),(2,5,2),(2,5,3),(2,5,4),(2,5,5),(2,5,6),(2,5,7),(2,5,8),(2,5,9),(2,5,10),
(2,6,1),(2,6,2),(2,6,3),(2,6,4),(2,6,5),(2,6,6),(2,6,7),(2,6,8),(2,6,9),(2,6,10),
(2,7,1),(2,7,2),(2,7,3),(2,7,4),(2,7,5),(2,7,6),(2,7,7),(2,7,8),(2,7,9),(2,7,10),
(2,8,1),(2,8,2),(2,8,3),(2,8,4),(2,8,5),(2,8,6),(2,8,7),(2,8,8),(2,8,9),(2,8,10),
(2,9,1),(2,9,2),(2,9,3),(2,9,4),(2,9,5),(2,9,6),(2,9,7),(2,9,8),(2,9,9),(2,9,10),

(3,1,1),(3,1,2),(3,1,3),(3,1,4),(3,1,5),(3,1,6),(3,1,7),(3,1,8),(3,1,9),(3,1,10),
(3,2,1),(3,2,2),(3,2,3),(3,2,4),(3,2,5),(3,2,6),(3,2,7),(3,2,8),(3,2,9),(3,2,10),
(3,3,1),(3,3,2),(3,3,3),(3,3,4),(3,3,5),(3,3,6),(3,3,7),(3,3,8),(3,3,9),(3,3,10),
(3,4,1),(3,4,2),(3,4,3),(3,4,4),(3,4,5),(3,4,6),(3,4,7),(3,4,8),(3,4,9),(3,4,10),
(3,5,1),(3,5,2),(3,5,3),(3,5,4),(3,5,5),(3,5,6),(3,5,7),(3,5,8),(3,5,9),(3,5,10),
(3,6,1),(3,6,2),(3,6,3),(3,6,4),(3,6,5),(3,6,6),(3,6,7),(3,6,8),(3,6,9),(3,6,10),
(3,7,1),(3,7,2),(3,7,3),(3,7,4),(3,7,5),(3,7,6),(3,7,7),(3,7,8),(3,7,9),(3,7,10),
(3,8,1),(3,8,2),(3,8,3),(3,8,4),(3,8,5),(3,8,6),(3,8,7),(3,8,8),(3,8,9),(3,8,10),
(3,9,1),(3,9,2),(3,9,3),(3,9,4),(3,9,5),(3,9,6),(3,9,7),(3,9,8),(3,9,9),(3,9,10);



create table Billet(
    idBillet serial primary key,
    dateBillet date,
    numero integer,
    prix numeric(7,2),
    dispo boolean default true
);
insert into Billet(numero,prix,dispo) values
(100,10000,'true'),(101,10000,'true'),(102,10000,'true'),(103,10000,'true'),(104,10000,'true'),(105,10000,'true'),
(106,10000,'true'),(107,10000,'true'),(108,10000,'true'),(109,10000,'true'),(110,10000,'true'),(111,10000,'true'),
(112,10000,'true'),(113,10000,'true'),(114,10000,'true'),(115,10000,'true'),(116,10000,'true'),(117,10000,'true'),
(118,10000,'true'),(119,10000,'true'),(120,10000,'true'),(121,10000,'true'),(122,10000,'true'),(123,10000,'true'),
(124,10000,'true'),(125,10000,'true'),(126,10000,'true'),(127,10000,'true'),(128,10000,'true'),(129,10000,'true');

create table Diffusion(
    idDiffusion serial primary key,
    idFilm integer references Film(idFilm),
    idSalle integer references Salle(idSalle),
    HeureDebut timestamp,
    HeureFin timestamp
);
insert into Diffusion(idFilm,idSalle,HeureDebut,HeureFin)values
(1,1,'2024-04-10 08:00:00','2024-04-10 09:45:00'),
(2,1,'2024-04-10 10:00:00','2024-04-10 12:00:00'),
(3,1,'2024-04-10 13:00:00','2024-04-10 15:00:00'),
(4,1,'2024-04-10 15:15:00','2024-04-10 17:00:00'),
(5,1,'2024-04-10 17:30:00','2024-04-10 19:00:00'),

(6,2,'2024-04-10 08:00:00','2024-04-10 09:45:00'),
(7,2,'2024-04-10 10:00:00','2024-04-10 12:00:00'),
(8,2,'2024-04-10 13:00:00','2024-04-10 15:00:00'),
(9,2,'2024-04-10 15:15:00','2024-04-10 17:00:00'),
(10,2,'2024-04-10 17:30:00','2024-04-10 19:00:00');



create or replace view getAll_Place_Dispo as
select
    salle.idsalle,
    salle.nom as nom_salle,
    salle_place.rangee,
    salle_place.numero as numero_place,
    salle_place.dispo
from salle_place
    join salle on salle.idsalle=salle_place.idsalle

where salle_place.dispo=true and salle.idsalle=1;


create or replace view All_Diffusion as
select
    Diffusion.idDiffusion,
    Salle.idSalle as idSalle,
    Salle.nom as nom_salle,
    Film.nom as nom_film,
    Diffusion.HeureDebut as Debut,
    Diffusion.HeureFin as Fin
from Diffusion join
    Salle on Diffusion.idSalle=Salle.idSalle join
    Film on Diffusion.idFilm=Film.idFilm



create table Client(
    idClient serial primary key,
    nom varchar(20),
    prenom varchar(20),
    dtn date
);

create table Client_Diffusion(
    idClient_Diffusion serial primary key,
    idBillet integer references Billet(idBillet),
    idDiffusion integer references Diffusion(idDiffusion),
    idClient integer references Client(idClient),
    idSalle_place integer references Salle_place(idSalle_place)
);

create or replace view Info_diffusion as
select
    Client.idClient as idclient,
    Client.nom as nom_client,
    Client.prenom as prenom_client,
    Billet.numero as numero_billet,
    Film.nom as nom_film,
    Salle.nom as nom_salle,
    Salle_place.rangee,
    Salle_place.numero as numero_place,
    Diffusion.HeureDebut as debut,
    Diffusion.HeureFin as fin
from Client_Diffusion
    join Billet on Billet.idBillet=Client_Diffusion.idClient
    join Diffusion on Diffusion.idDiffusion=Client_Diffusion.idDiffusion
    join Film on Film.idFilm=Diffusion.idFilm
    join Salle on Salle.idSalle=Diffusion.idSalle
    join Salle_place on Salle_place.idSalle_place=Client_Diffusion.idClient_Diffusion
    join Client on Client.idClient=Client_Diffusion.idClient


create table Client_Produit(
    idClient_Produit serial primary key,
    idClient_Diffusion integer references Client_Diffusion(idClient_Diffusion),
    idProduit integer references Produit(idProduit)
);
