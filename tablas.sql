create table chatpartida(
	id_partida numeric not null,	
	user_name nvarchar(30) not null,
	mensaje nvarchar(400)	
);
create unique index chatpartida__IDX on chatpartida(
	id_partida asc, user_name asc
);
alter table chatpartida add primary key(id_partida, user_name);
alter table chatpartida add foreign key(id_partida) references partida(id_partida) ;
alter table chatpartida add foreign key(user_name) references usuario(user_name);

