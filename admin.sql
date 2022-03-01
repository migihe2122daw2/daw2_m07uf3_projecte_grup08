use mysql;
create user 'adminAutos'@'localhost' identified by "Fjeclot22@";
create database autos;
use autos;
grant all privileges on autos.* to 'adminAutos'@'localhost';