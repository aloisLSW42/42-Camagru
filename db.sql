create database if not exists db_camagru;

use db_camagru;

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
