create database msimenic_20_20 default character set utf8mb4;
use msimenic_20_20;
create table ontologija(
    sifra int not null primary key auto_increment,
    ime_redatelja varchar(255) not null,
    grad_premijere varchar(255) not null,
    uDrzavi varchar(255) not null,
    jePremijernoPrikazan varchar(255) not null,
    uGodini int(255) not null,
    zaradioJe int(255) not null
);
