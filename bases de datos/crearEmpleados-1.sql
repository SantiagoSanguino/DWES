drop database empleados1n;
create database empleados1n;
use empleados1n;

create table empleado (dni varchar(9), nombre_e varchar(40), fecha_nac date, nombre_d varchar(40)) ENGINE=InnoDB;
create table departamento (nombre_d varchar(40)) ENGINE=InnoDB;

alter table empleado add constraint pk_dni primary key (dni);
alter table departamento add constraint pk_nombre_d primary key (nombre_d);
alter table empleado add constraint fk_nombre_d foreign key (nombre_d) references departamento(nombre_d);

insert into departamento (nombre_d) values ('contabilidad');
insert into empleado (dni,nombre_e,fecha_nac,nombre_d) values ('23456789P','Santiago Sanguino','2021/01/01','contabilidad');


drop database empleadosnn;
create database empleadosnn;
use empleadosnn;

create table empleado (dni varchar(9), nombre_e varchar(40), fecha_nac date) ENGINE=InnoDB;
create table departamento (nombre_d varchar(40)) ENGINE=InnoDB;
create table emple_depart (dni varchar(9), nombre_d varchar(40), fecha_ini date, fecha_fin date) ENGINE=InnoDB;

alter table empleado add constraint pk_dni primary key (dni);
alter table departamento add constraint pk_nombre_d primary key (nombre_d);
alter table emple_depart add constraint pk_dni_nombre_fecha primary key (dni,nombre_d,fecha_ini);

alter table emple_depart add constraint fk_dni foreign key (dni) references empleado(dni);
alter table emple_depart add constraint fk_nombre_d foreign key (nombre_d) references departamento(nombre_d);

insert into departamento (nombre_d) values ('contabilidad');
insert into empleado (dni,nombre_e,fecha_nac) values ('23456789P','Santiago Sanguino','2021/01/01');
insert into emple_depart (dni,nombre_d,fecha_ini) values ('23456789P','contabilidad','2019/01/01');
