use air;
/*create table users*/
create table users(id int primary key 
AUTO_INCREMENT ,
 UserName varchar(40),
  email varchar(60),
  password varchar(50),
  status varchar(50) not null,
  CHECK (status='Admin' OR status='User'));

  /* Affichage */

  SELECT id FROM users WHERE concat(UserName, email) like '%ayoub%';
/*insert users=> Admin*/
  iNSERT INTO users SET username = 'adam', email ='this@gmail.com', status='admin',password = 'Ayoub@03';
  /**/
  /* create table flights_list */
create table flights_list (id int primary key auto_increment
,flyingFrom varchar(100)
,flyingTo varchar(100)
,departingDate date default CURDATE()
,returningDate date
 ,seats varchar(80),
id_user int not null,
statusflight varchar(50) DEFAULT 'exist',
foreign key(id_user) references users(id)
);
/* insertion */
INSERT INTO `flights_list`( `flyingFrom`, `flyingTo`, `departingDate`, `returningDate`, `seats`) VALUES 
('rabat','tanger',DEFAULT,'2020-5-20',100),
('cassablanca','paris',DEFAULT,'2020-6-20',120)
,('Agadir','dakhla',DEFAULT,'2020-9-5',30),
('safi','dakhla',DEFAULT,'2020-7-5',80),
('tittwan','Rabat',DEFAULT,'2020-10-5',60);
/* Affichage */

select  * from flights_list;
SELECT * FROM flights_list WHERE flyingFrom='cassablanka' AND flyingTo='paris';

/**/
/* create table reservation */
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
/**/
