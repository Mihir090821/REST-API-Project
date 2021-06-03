create database api;
use api;
create table student(

Sid int not null auto_increment,
Sname varchar(30) not null,
Age int not null,

primary key(Sid)
);