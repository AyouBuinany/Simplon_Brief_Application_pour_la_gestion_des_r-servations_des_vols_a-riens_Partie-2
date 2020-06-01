/* sql */
create table flights_list (id int primary key auto_increment
,flyingFrom varchar(100)
,flyingTo varchar(100)
,departingDate date default CURDATE()
,returningDate date
 ,seats varchar(80),
id_user int,
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