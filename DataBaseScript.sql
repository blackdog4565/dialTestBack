create database measuring;
use measuring;

drop table droppers_measure;
drop table drainages_measure;
drop table mates_measure;
drop table valves;
drop table departments;

create table valves ( # клапаны
	id_valve int not null,
    primary key (id_valve)
);

create table departments( # отделения
	id_department int not null auto_increment,
    name_department varchar(5) not null,
    primary key (id_department)
);

create table droppers_measure ( # измерения капельницы
	id_dropper_measure int not null auto_increment,
    id_valve int not null,
    id_department int not null,
    volume float not null,
    EC float not null,
    pH float not null,
    measure_time datetime not null,
    primary key (id_dropper_measure),
    foreign key (id_valve) references valves(id_valve),
    foreign key (id_department) references departments(id_department)
);

create table drainages_measure ( # измерения дренажа
	id_drainage_measure int not null auto_increment,
    id_valve int not null,
    id_department int not null,
    volume float not null,
    EC float not null,
    pH float not null,
    measure_time datetime not null,
    primary key (id_drainage_measure),
    foreign key (id_valve) references valves(id_valve),
    foreign key (id_department) references departments(id_department)
);

create table mates_measure ( # измерения мат
	id_mate_measure int not null auto_increment,
    id_valve int not null,
    id_department int not null,
    volume float not null,
    EC float not null,
    pH float not null,
    measure_time datetime not null,
    primary key (id_mate_measure),
    foreign key (id_valve) references valves(id_valve),
    foreign key (id_department) references departments(id_department)
);

insert into valves (id_valve) values (1);
insert into valves (id_valve) values (2);
insert into valves (id_valve) values (3);
insert into valves (id_valve) values (4);
insert into valves (id_valve) values (5);
insert into valves (id_valve) values (6);

insert into departments (name_department) values ('1.1');
insert into departments (name_department) values ('1.2');
insert into departments (name_department) values ('1.3');
insert into departments (name_department) values ('1.4');
insert into departments (name_department) values ('1.5');
