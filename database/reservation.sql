/* sql */
create table reservation(id_reservation int primary key auto_increment, 
FullName varchar(80),
 numeroTel varchar(50),
 email varchar(60),
numeroPassport varchar(50),
departingDate date default CURDATE(),
returningDate date,
Adult int,
children int,
travel_class varchar(25),
price varchar(80),
id_flight int,
id_users int,
FOREIGN KEY(id_flight) REFERENCES flights_list(id),
FOREIGN KEY(id_users) REFERENCES users(id));

/* AFFICHAGE */
select * from reservation;