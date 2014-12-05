create database solar_system;
use solar_system;
create table users (
id bigint unsigned not null,
login varchar (30),
password varchar(30),
email varchar (30),
access_level int,
image_path varchar(40),
Primary key (id)
) Engine InnoDb charset utf8;
create table articles(
id bigint unsigned not null,
title text,
Primary key(id)
)Engine InnoDb charset utf8;
create table comments(
id bigint unsigned not null,
user_id bigint unsigned,
article_id bigint unsigned,
comment text,
date timestamp,
Primary key (id),
Foreign key (user_id) references users(id)
on delete restrict on update cascade,
Foreign key (article_id) references articles(id)
on delete restrict on update cascade
)Engine InnoDb charset utf8;
create table quiz(
id bigint unsigned not null,
user_id bigint unsigned,
variant int,
Primary key(id),
Foreign key (user_id) references users(id)
on delete restrict on update cascade
)Engine InnoDb charset utf8;

