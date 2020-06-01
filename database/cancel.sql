/* sql */

create table cancel(id_cancel int primary key not null,
id_user int ,
Foreign key (id_user) REFERENCES users(id));
/* forieng key*/
ALTER TABLE cancel ADD Foreign key (id_cancel) REFERENCES flights_list(id);