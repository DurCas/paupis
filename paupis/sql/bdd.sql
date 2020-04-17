/*create database practica_immobiliaria_M7UF3;*/

create table usuari(
    id varchar(20) not null primary key,
    contrasenya varchar(100) not null,
    nom varchar(20) not null,
    cognom varchar(20),
    email varchar(20) not null,
    telefon int(9),
    data_registre datetime
);

create table immoble(
    id int not null auto_increment primary key, 
	anunci int(1) not null,
    via varchar(20),
    carrer varchar(50) not null,
    numero varchar(5) not null,
    pis varchar(20),
    porta varchar(20),
    escala varchar(3),
    cp varchar(5),
    barri varchar(30),
    districte varchar(30),
    superficie int not null,    
    n_habitacions int not null,
    n_lavabos int,
    orientacio varchar(9),
    preu float (10,2) not null,
    foto1 varchar(100),
    foto2 varchar(100),
    foto3 varchar(100),
    caracteristiques varchar(500),
    visites int(3),
    data_registre datetime,
    id_usu varchar(20),
    CONSTRAINT FK_id_usu FOREIGN KEY (id_usu)
    REFERENCES usuari(id)
);