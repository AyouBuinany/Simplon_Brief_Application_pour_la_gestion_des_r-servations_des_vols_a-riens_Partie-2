/*sql*/
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