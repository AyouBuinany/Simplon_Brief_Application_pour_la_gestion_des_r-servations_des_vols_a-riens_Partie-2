
create database air;
use air;
/* table users*/
create table users(id int primary key 
AUTO_INCREMENT , UserName varchar(40), email varchar(60),password varchar(50),status varchar(50) not null,CHECK (status='Admin' OR status='User'));
/*table  flights_list*/
create table flights_list (id int primary key auto_increment
,flyingFrom varchar(100)
,flyingTo varchar(100)
,departingDate date default CURDATE()
,returningDate date
 ,seats varchar(80),
id_user int,
foreign key(id_user) references users(id)
);
/*create table reservation*/
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
/*create table cancel*/
create table cancel(id_cancel int primary key not null,id_user int ,Foreign key (id_user) REFERENCES users(id));
/* forieng key*/
ALTER TABLE cancel ADD Foreign key (id_cancel) REFERENCES flights_list(id);

/* */
create user 'user1' identified by 'youcode';
grant all on *.* to 'user1';

/*select * from client where CONCAT(id,nom,prenom) LIKE '%k%';
*/
select DISTINCT(flyingTo) from flights_list;
select DISTINCT flyingFrom from flights_list;
drop table reservation ;
drop table flights_list ;

/*insertion des tables*/
INSERT INTO `flights_list`( `flyingFrom`, `flyingTo`, `departingDate`, `returningDate`, `seats`) VALUES 
('rabat','tanger',DEFAULT,'2020-5-20',100),
('cassablanca','paris',DEFAULT,'2020-6-20',120)
,('Agadir','dakhla',DEFAULT,'2020-9-5',30),
('safi','dakhla',DEFAULT,'2020-7-5',80),
('tittwan','Rabat',DEFAULT,'2020-10-5',60);
/*inset 2*/
INSERT INTO `flights_list`( `flyingFrom`, `flyingTo`, `departingDate`, `returningDate`, `seats`) VALUES 
('tanger','rabat',DEFAULT,'2020-8-20',100),
('paris','cassablanca',DEFAULT,'2020-6-25',120)
,('dakhla','Agadir',DEFAULT,'2020-9-15',30),
('dakhla','safi',DEFAULT,'2020-7-5',80),
('Rabat','tittwan',DEFAULT,'2020-10-5',60);
select  * from flights_list;
select  * from reservation;
SELECT * FROM flights_list WHERE flyingFrom='cassablanka' AND flyingTo='paris';
select * , (Adult+children) as 'seats' from reservation,flights_list where flights_list.id=reservation.id_flight  order by id_reservation DESC LIMIT 1;
INSERT INTO `reservation`( `FullName`, `numeroTel`, `email`, `numeroPassport`, `departingDate`, `returningDate`, `Adult`, `children`, `travel_class`, `price`, `id_flight`) VALUES
     ('ayoub','080889','ayyoub@gmail.com','1120MMM','2020-6-15','2020-3-9',3,4,'bess','333000',1);
UPDATE flights_list f,reservation r SET f.seats=f.seats+3 where f.id=2;
INSERT INTO reservation VALUES
     (2,'kamal chokran','06121898998','ayoub.elbouinany99@gmail.fr','2020-05-29','2020-05-31',1,1,'Bussness Class','1100 DH',2);


/*delete tables*/
drop table users;
drop table users;
drop table reservation ;
drop table flights_list;
drop table cancel;
/*request*/
select * from reservation;
SELECT id FROM users WHERE concat(UserName, email) like '%ayoub%';
iNSERT INTO users SET username = 'adam', email ='this@gmail.com', status='admin',password = pass;
SELECT * FROM users WHERE (UserName ='ayoub' OR email = 'ayoub') AND status ='user' AND password='99@Gmail';
SELECT flyingFrom,flyingTo ,id,r.id_flight,SUM(r.Adult) 'adult',SUM(r.children) 'Nombre seats reservais', seats  FROM `flights_list`,`reservation` as r  WHERE id=r.id_flight AND id=1 group by id ;
SELECT * FROM flights_list WHERE flyingFrom='rabat' AND flyingTo='tanger' AND seats>0 AND id Not in (1);
SELECT * FROM flights_list WHERE flyingFrom='rabat' AND flyingTo='tanger' AND seats>0 AND id !=1;


