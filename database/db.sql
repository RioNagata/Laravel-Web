drop table if exists vehicle;
/* createing tables for three tables*/
create table if not exists vehicle (
  vehicle_id integer primary key autoincrement,
  rego varchar(6), 
  model varchar(10),
  year int,
  odometer int, 
  transmission varchar(20)
);

create table if not exists client (
  client_id integer primary key autoincrement,
  name varchar(40), 
  age int(3),
  dlnum int(9),
  license varchar(20), 
  dob date
);

create table if not exists booking (
  booking_id integer primary key autoincrement,
  vehicle_id integer,
  client_id integer,
  startdate varchar(20),
  starttime varchar(20),  
  enddate varchar(20), 
  endtime varchar(20),
  /*setting up foreign keys for two primary keys */
  foreign key(vehicle_id) references vehicle(vehicle_id),
  foreign key(client_id) references client(client_id)
);

/* inserting data to the tables*/
insert into vehicle values(null, "sf2jr4", "Ford Mustang", "2004", "312679", "Automatic");
insert into vehicle values(null, "i7dnjh", "Hondas Jazz", "2017", "072995", "Automatic");
insert into vehicle values(null, "jsd83h", "Land Rover Discovery", "2017", "086589", "Automatic");
insert into vehicle values(null, "2ks854", "Mercedes-Benz C-Class C250", "2016", "114000", "Automatic");
insert into vehicle values(null, "dleo9s", "Mazda CX-30 G20", "2021", "004589", "Automatic");
insert into vehicle values(null, "s03lkd", "Nissan Navara ST-X D23", "2021", "086589", "Automatic");

insert into client values(null, 'Chris Dover', '23', '285637542', "L", '1998-02-12');
insert into client values(null, 'Sam Thompson', '18', '123456789', "P", '2003-01-18');
insert into client values(null, 'David Strumbgoat', '32', '735428497', "P1", '1989-09-28');
insert into client values(null, 'Frederick Stringen', '45', '826873927', "P2", '1976-03-19');
insert into client values(null, 'Sam Chrostopher', '36', '625928463', "O", '1985-04-01');
insert into client values(null, 'Matt Spurce', '28', '928341749', "P2", '1993-12-25');
insert into client values(null, 'Cory Strimber', '31', '109462983', "L", '1990-10-12');
insert into client values(null, 'Adam Bruce', '37', '291028374', "P", '1984-02-12');
insert into client values(null, 'Lee Falmus', '41', '019287332', "P1", '1980-11-31');
insert into client values(null, 'Ronald Mcdonald', '20', '928304928', "L", '2001-02-12');
insert into client values(null, 'Rimuru Tempest', '33', '289283902', "P", '1988-06-23');

insert into booking values(null, 1, 1, '2021-02-20', '12:12 PM', '2021-02-25', '1:49 PM');
insert into booking values(null, 2, 2, '2021-05-10', '9:12 PM', '2021-05-25', '2:50 PM');
insert into booking values(null, 3, 3, '2021-12-09', '3:12 PM', '2021-12-31', '10:49 AM');
insert into booking values(null, 4, 4, '2021-12-09', '3:12 PM', '2021-12-31', '10:49 AM');
insert into booking values(null, 5, 5, '2021-12-09', '3:12 PM', '2021-12-31', '10:49 AM');
insert into booking values(null, 6, 6, '2021-12-09', '3:12 PM', '2021-12-31', '10:49 AM');
