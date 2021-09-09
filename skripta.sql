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

insert into ontologija (ime_redatelja, grad_premijere, uDrzavi, jePremijernoPrikazan, uGodini, zaradioJe)
values ('Baz Lurhmann', 'Los Angeles', 'SAD', 'siječanj', 2015, 7588305);
values ('Carlo Carlei', 'Pariz', 'Francuska', 'ožujak', 2015, 2375492);
