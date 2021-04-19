


CREATE TABLE Tipo_avion(
 id int not null auto_increment,
 MaxAsientos int,
 Compania VARCHAR(50) NOT NULL,
PRIMARY KEY(id)
);

INSERT INTO Tipo_avion (MaxAsientos, Compania) VALUES (100, 'Boeing');
INSERT INTO Tipo_avion (MaxAsientos, Compania) VALUES (60, 'Aviacion');

CREATE TABLE Avion(
 matricula varchar(15) not null primary key,
 idTipoAvion int not null,
 NroTotalAsientos int,
 Autonomia int,
 FOREIGN KEY (idTipoAvion) REFERENCES Tipo_avion(id)
    ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO Avion (matricula, idTipoAvion, NroTotalAsientos, Autonomia) VALUES ('22ff',1,100,8);
INSERT INTO Avion (matricula, idTipoAvion, NroTotalAsientos, Autonomia) VALUES ('22zz',2,60,5);

create table aeropuerto(
   CodAeropuerto int not null auto_increment primary key,
   nombre varchar(40) not null,
   ciudad varchar(30),
   provincia varchar(30)
  );
  
  INSERT INTO aeropuerto (nombre, ciudad, provincia) VALUES ('Santa Rosa', 'Santa Rosa', 'Pampa');
  INSERT INTO aeropuerto (nombre, ciudad, provincia) VALUES ('Viru Viru', 'Santa Cruz', 'Warnes');
  
 create table vuelo(
  id int not null auto_increment primary key,
  NumVuelo int not null,
  DiasSemana varchar(40) not null
 );
 
 INSERT INTO vuelo (NumVuelo, DiasSemana) VALUES (2490, 'Lun Mie Vie');
 INSERT INTO vuelo (NumVuelo, DiasSemana) VALUES (2491, 'Mar Jue');
 
 create table Plan_vuelo(
  NumPlan int not null auto_increment primary key,
  idVuelo int not null,
  CodAeropuertoOrigen int,
  CodAeropuertoDestino int,
  HraSalida time not null,
  HraLlegada time not null,
  foreign key(idVuelo) references vuelo(id),
  foreign key(CodAeropuertoOrigen) references aeropuerto(CodAeropuerto),
  foreign key(CodAeropuertoDestino) references aeropuerto(CodAeropuerto)
 );
 
 INSERT INTO Plan_vuelo (idVuelo, CodAeropuertoOrigen, CodAeropuertoDestino, HraSalida, HraLlegada) VALUES (1,1,2,'10:00','12:00');
 INSERT INTO Plan_vuelo (idVuelo, CodAeropuertoOrigen, CodAeropuertoDestino, HraSalida, HraLlegada) VALUES (2,2,1,'8:00','10:00');
 
 create table Vuelo_concreto(
 NumPlan int,
 matricula varchar(15),
 fecha date not null,
 asientosDisponibles int,
 primary key (NumPlan,matricula),
 foreign key (NumPlan) references Plan_vuelo(NumPlan),
 foreign key (matricula) references Avion(matricula)
 );
 
 INSERT INTO Vuelo_concreto (NumPlan, matricula, fecha, asientosDisponibles) VALUES (1,'22ff', '2020/07/01',60);
 INSERT INTO Vuelo_concreto (NumPlan, matricula, fecha, asientosDisponibles) VALUES (2,'22zz', '2020/05/04',60);
 
 create table Reserva(
 NumAsiento int not null auto_increment primary key,
 NumPlan int,
 fecha date not null,
 nombre varchar(50) not null,
 telefono int,
 foreign key (NumPlan) references Vuelo_concreto(NumPlan)
 );
 
 create table Tarifa(
 CodTarifa int not null auto_increment primary key,
 idVuelo int not null,
 cantidad date not null,
 restricciones varchar(50) not null,
 foreign key (idVuelo) references vuelo(id)
 );