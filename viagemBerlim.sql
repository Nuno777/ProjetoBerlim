CREATE DATABASE viagemberlim;
USE viagemberlim;

create table adm(
id int primary key auto_increment,
email varchar(30) not null,
nome varchar(50) not null,
pass varchar(150) not null
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

create table hotel(
id_hotel int AUTO_INCREMENT primary key,
nome varchar(30) not null,
localizacao varchar(30) not null,
quartos varchar(30) not null,
foto_hotel varchar(250) DEFAULT NULL
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

create table restaurante(
id_rest int not null AUTO_INCREMENT primary key,
nome varchar(30) not null,
localicacao varchar(30) not null,
horario int not null,
foto_rest varchar(250) DEFAULT NULL
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

create table contatos(
id_cont int not null AUTO_INCREMENT primary key,
nome varchar(30) not null,
email varchar(30) not null,
telefone int,
assunto varchar(50) not null,
mensagem varchar(400) not null
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

create table Cliente (
IDcliente INT AUTO_INCREMENT,
nome_primeiro VARCHAR(25) NOT NULL,
nome_ultimo VARCHAR(25) NOT NULL,
email VARCHAR(150) NOT NULL,
pass VARCHAR(150) NOT NULL,
rua VARCHAR(150) NOT NULL,
localidade VARCHAR(30) NOT NULL,
cpostal CHAR(8) NOT NULL,
nif INT UNSIGNED NOT NULL,
CONSTRAINT pk_Cliente_IDcliente PRIMARY KEY(IDcliente),
CONSTRAINT unique_Cliente_email UNIQUE(email),
CONSTRAINT unique_Cliente_nif UNIQUE(nif)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE Destino(
IDdestino INT UNSIGNED AUTO_INCREMENT,
origem VARCHAR(25) NOT NULL,
destino VARCHAR(25) NOT NULL,
datahora DATETIME NOT NULL,
CONSTRAINT pk_Destino_IDdestino PRIMARY KEY(IDdestino)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE Reserva (
IDreserva INT UNSIGNED AUTO_INCREMENT,
nrlugar DATETIME NOT NULL,
IDcliente INT UNSIGNED NOT NULL,
IDdestino INT UNSIGNED NOT NULL,
CONSTRAINT pk_Reserva_IDreserva PRIMARY KEY(IDreserva),
CONSTRAINT fk_Reserva_IDcliente FOREIGN KEY(IDcliente) REFERENCES Cliente(IDcliente),
CONSTRAINT fk_Reserva_IDdestino FOREIGN KEY(IDdestino) REFERENCES Destino(IDdestino)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE Telemovel(
IDcliente INT UNSIGNED,
telemovel INT NOT NULL,
CONSTRAINT pk_Telemovel_telemovel PRIMARY KEY(telemovel),
CONSTRAINT fk_telemovel_IDcliente FOREIGN KEY(IDcliente) REFERENCES Cliente(IDcliente)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE Evento (
IDevento INT UNSIGNED AUTO_INCREMENT,
nome VARCHAR(50) NOT NULL,
dataevento DATE NOT NULL,
descricao VARCHAR(1000),
CONSTRAINT pk_Evento_IDevento PRIMARY KEY(IDevento)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE Transporte (
ID_transporte INT UNSIGNED AUTO_INCREMENT,
transporte VARCHAR(15),
descricao VARCHAR(1000),
horarios VARCHAR(1000),
CONSTRAINT pk_Transporte_ID_transporte PRIMARY KEY(ID_transporte)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- dados experimentais -- 
INSERT INTO Cliente
(nome_primeiro, nome_ultimo, email, pass, rua, localidade, cpostal, nif)
VALUES
('joÃ£o','Sousa','joao@example.com','123','rua almirante','Tomar','1233-345',123456789),
('Laura','Moreno','laura@example.com','124','rua almirante','Tomar','1233-345',123456780),
('Daniel','Marques','daniel@example.com','125','rua da batalha','Leiria','3245-234',123456712);
INSERT INTO Telemovel (IDcliente, telemovel)VALUES(1,239487465),(1,239487123),(3,239487890);
insert into hotel (nome,localizacao,quartos) values('HotelBit','Berlim','Quarto A');
insert into hotel (nome,localizacao,quartos) values('Hotel Markt','Berlim','Quarto B');
insert into hotel (nome,localizacao,quartos) values('Hampton by Hilton Frankfurt Airport','Frankfurt','Quarto A');
insert into hotel (nome,localizacao,quartos) values('EasyHotel','Berlim','Quarto C');
insert into adm (email,nome,pass) value ("admin@gmail.com","admin","c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec");
select * from adm;
select * from hotel;
