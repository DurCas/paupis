create table districte(
    id int(2) not null primary key,
    nom varchar(50) not null
);

create table barri(
    id int(2) not null primary key,    
    nom varchar(50) not null,
    id_districte int(2),
    CONSTRAINT FK_id_districte FOREIGN KEY (id_districte)
    REFERENCES districte(id)
);

create table orientacio (
	id int(2) not null primary key,
	nom varchar(9) not null
);

create table via (
	id int(2) not null primary key,
	nom varchar(12) not null
);

INSERT INTO districte VALUES (1, "Ciutat Vella");
INSERT INTO districte VALUES (2, "L'eixample");
INSERT INTO districte VALUES (3, "Sants - Montjuic");
INSERT INTO districte VALUES (4, "Les Corts");
INSERT INTO districte VALUES (5, "Sarrià - Sant Gervasi");
INSERT INTO districte VALUES (6, "Gràcia");
INSERT INTO districte VALUES (7, "Horta");
INSERT INTO districte VALUES (8, "Nou Barris");
INSERT INTO districte VALUES (9, "Sant Andreu");
INSERT INTO districte VALUES (10, "Sant Martí");

INSERT INTO barri VALUES (1, "El Raval", 1);
INSERT INTO barri VALUES (2, "El Gòtic", 1);
INSERT INTO barri VALUES (3, "La Barceloneta", 1);
INSERT INTO barri VALUES (4, "Sant Pere, Santa Caterina i la Ribera", 1);
INSERT INTO barri VALUES (5, "El Fort Pienc", 2);
INSERT INTO barri VALUES (6, "La Sagrada Familia", 2);
INSERT INTO barri VALUES (7, "La Dreta de l'Eixample", 2);
INSERT INTO barri VALUES (8, "Antiga Esquerra de l'Eixample", 2);
INSERT INTO barri VALUES (9, "Nova Esquerra de l'Eixample", 2);
INSERT INTO barri VALUES (10, "Sant Antoni", 2);
INSERT INTO barri VALUES (11, "El Poble Sec", 3);
INSERT INTO barri VALUES (12, "La Marina del Prat Vermell", 3);
INSERT INTO barri VALUES (13, "La Marina de Port", 3);
INSERT INTO barri VALUES (14, "La Font de la Guatlla", 3);
INSERT INTO barri VALUES (15, "Hostafrancs", 3);
INSERT INTO barri VALUES (16, "La Bordeta", 3);
INSERT INTO barri VALUES (17, "Sants-Badal", 3);
INSERT INTO barri VALUES (18, "Sants", 3);
INSERT INTO barri VALUES (19, "Parc de Montjuic", 3);
INSERT INTO barri VALUES (20, "Zona Franca-Port", 3);
INSERT INTO barri VALUES (21, "Les Corts", 4);
INSERT INTO barri VALUES (22, "La Maternitat i Sant Ramon", 4);
INSERT INTO barri VALUES (23, "Pedralbes", 4);
INSERT INTO barri VALUES (24, "Vallvidrera, Tibidabo i les Planes", 5);
INSERT INTO barri VALUES (25, "Sarrià", 5);
INSERT INTO barri VALUES (26, "Les Tres Torres", 5);
INSERT INTO barri VALUES (27, "Sant Gervasi - Bonanova", 5);
INSERT INTO barri VALUES (28, "Sant Gervasi - Galvany", 5);
INSERT INTO barri VALUES (29, "El Putger i Farró", 5);
INSERT INTO barri VALUES (30, "Vallcarca i els Penitents", 6);
INSERT INTO barri VALUES (31, "El Coll", 6);
INSERT INTO barri VALUES (32, "La Salut", 6);
INSERT INTO barri VALUES (33, "Vila de Gràcia", 6);
INSERT INTO barri VALUES (34, "El Camp d'en Grassot i Gràcia Nova", 6);
INSERT INTO barri VALUES (35, "Baix Guinardó", 7);
INSERT INTO barri VALUES (36, "Can Baró", 7);
INSERT INTO barri VALUES (37, "El Guinardó", 7);
INSERT INTO barri VALUES (38, "La Font d'en Fargues", 7);
INSERT INTO barri VALUES (39, "El Carmel", 7);
INSERT INTO barri VALUES (40, "La Teixonera", 7);
INSERT INTO barri VALUES (41, "Sant Genis dels Agudells", 7);
INSERT INTO barri VALUES (42, "Montbau", 7);
INSERT INTO barri VALUES (43, "La Vall d'Hebron", 7);
INSERT INTO barri VALUES (44, "La Clota", 7);
INSERT INTO barri VALUES (45, "Horta", 7);
INSERT INTO barri VALUES (46, "Vilapicina-Torre Llobeta", 8);
INSERT INTO barri VALUES (47, "Porta", 8);
INSERT INTO barri VALUES (48, "El Turó de la Peira", 8);
INSERT INTO barri VALUES (49, "Can Peguera", 8);
INSERT INTO barri VALUES (50, "La Guineueta", 8);
INSERT INTO barri VALUES (51, "Canyelles", 8);
INSERT INTO barri VALUES (52, "Les Roquetes", 8);
INSERT INTO barri VALUES (53, "Verdun", 8);
INSERT INTO barri VALUES (54, "La Prosperitat", 8);
INSERT INTO barri VALUES (55, "La Trinitat Nova", 8);
INSERT INTO barri VALUES (56, "Torre Baró", 8);
INSERT INTO barri VALUES (57, "Ciutat Meridiana", 8);
INSERT INTO barri VALUES (58, "Vallbona", 8);
INSERT INTO barri VALUES (59, "La Trinitat Vella", 9);
INSERT INTO barri VALUES (60, "Baró de Viver", 9);
INSERT INTO barri VALUES (61, "El Bon Pastor", 9);
INSERT INTO barri VALUES (62, "Sant Andreu", 9);
INSERT INTO barri VALUES (63, "La Sagrera", 9);
INSERT INTO barri VALUES (64, "El Congrés i els Indians", 9);
INSERT INTO barri VALUES (65, "Navas", 9);
INSERT INTO barri VALUES (67, "El Camp de l'Arpa del Clot", 10);
INSERT INTO barri VALUES (68, "El Clot", 10);
INSERT INTO barri VALUES (69, "El Parc i la Llacuna del Poblenou", 10);
INSERT INTO barri VALUES (70, "La Vila Olímpica del Poblenou", 10);
INSERT INTO barri VALUES (71, "El Poblenou", 10);
INSERT INTO barri VALUES (72, "Diagonal Mar i el Front Marítim del Poblenou", 10);
INSERT INTO barri VALUES (73, "El Besòs i el Maresme", 10);
INSERT INTO barri VALUES (74, "Provençals del Poblenou", 10);
INSERT INTO barri VALUES (75, "Sant Martí de Provençals", 10);
INSERT INTO barri VALUES (76, "La Verneda i la Pau", 10);

INSERT INTO orientacio VALUES (1, "Nord");
INSERT INTO orientacio VALUES (2, "Nord-est");
INSERT INTO orientacio VALUES (3, "Est");
INSERT INTO orientacio VALUES (4, "Sud-est");
INSERT INTO orientacio VALUES (5, "Sud");
INSERT INTO orientacio VALUES (6, "Sud-oest");
INSERT INTO orientacio VALUES (7, "Oest");
INSERT INTO orientacio VALUES (8, "Nord-oest");

INSERT INTO via VALUES (1, "Avinguda");
INSERT INTO via VALUES (2, "Carrer");
INSERT INTO via VALUES (3, "Carreró");
INSERT INTO via VALUES (4, "Camí");
INSERT INTO via VALUES (5, "Carretera");
INSERT INTO via VALUES (6, "Passatge");
INSERT INTO via VALUES (7, "Passeig");
INSERT INTO via VALUES (8, "Plaça");
INSERT INTO via VALUES (9, "Ronda");
INSERT INTO via VALUES (10, "Urbanització");