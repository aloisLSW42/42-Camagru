create database if not exists db_camagru;

use db_camagru;

drop table user;
drop table comments;
drop table picture;

create table if not exists user
(
	id int(12) primary key not null auto_increment,
	login varchar(50) not null,
	email varchar(200) not null,
	password varchar(200) not null,
	token varchar(64) not null
);

create table if not exists comments
(
	id int(12) primary key not null auto_increment,
	id_user int(12) not null,
	id_pic int(12) not null,
	content varchar(256)
);

create table if not exists picture
(
	id int(12) primary key not null auto_increment,
	likes int(12),
	datepic datetime
);

insert into user values(NULL, "aleclet", "aleclet@student.42.fr", "f9bb681a092bef0afd1537619815c28c1a9dc2d04518f0389ccebcd819c55523f758bb3165d4d19e3ac007e59cc997c4cf573604d96651384dabac68505d5247", 1);
