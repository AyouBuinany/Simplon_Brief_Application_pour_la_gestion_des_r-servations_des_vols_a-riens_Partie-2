
create database air;
use air;
/* */
create user 'user1' identified by 'youcode';
grant all on *.* to 'user1';

/*select * from client where CONCAT(id,nom,prenom) LIKE '%k%';
*/



/*insertion des tables*/
INSERT INTO `flights_list`( `flyingFrom`, `flyingTo`, `departingDate`, `returningDate`, `seats`) VALUES 
('rabat','tanger',DEFAULT,'2020-5-20',100),
('cassablanca','paris',DEFAULT,'2020-6-20',120)
,('Agadir','dakhla',DEFAULT,'2020-9-5',30),
('safi','dakhla',DEFAULT,'2020-7-5',80),
('tittwan','Rabat',DEFAULT,'2020-10-5',60);

 /*affichage */

 select DISTINCT(flyingTo) from flights_list;
select DISTINCT flyingFrom from flights_list;
/**/
select  * from flights_list;
select  * from reservation;
SELECT * FROM flights_list WHERE flyingFrom='cassablanka' AND flyingTo='paris';

select * , (Adult+children) as 'seats' from reservation,flights_list where flights_list.id=reservation.id_flight  order by id_reservation DESC LIMIT 1;



/*delete tables*/
drop table users;
drop table users;
drop table reservation ;
drop table flights_list;
drop table cancel;
/*request*/
SELECT * FROM users WHERE (UserName ='ayoub' OR email = 'ayoub') AND status ='user' AND password='99@Gmail';
SELECT flyingFrom,flyingTo ,id,r.id_flight,SUM(r.Adult) 'adult',SUM(r.children) 'Nombre seats reservais', seats  FROM `flights_list`,`reservation` as r  WHERE id=r.id_flight AND id=1 group by id ;
SELECT * FROM flights_list WHERE flyingFrom='rabat' AND flyingTo='tanger' AND seats>0 AND id Not in (1);
SELECT * FROM flights_list WHERE flyingFrom='rabat' AND flyingTo='tanger' AND seats>0 AND id !=1;


