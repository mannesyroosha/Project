create database CoffeeShop;
use CoffeeShop;
drop table credentials;
create table credentials(userid int primary key,username varchar (250),password varchar(250));
insert into credentials values(1,"Dinesh","dinesh");
insert into credentials values(2,"Syroosha","syroosha");
insert into credentials values(3,"Karthik","karthik");
insert into credentials values(4,"Shravani","shravani");
insert into credentials values(5,"Kaushik","kaushik");
create table menu(itemid int ,coffeename varchar(250),price int);
insert into menu values(1,"cappuccino",120);
insert into menu values(2,"mocha",80);
insert into menu values(3,"espresso",180);
insert into menu values(4,"latte",100);
insert into menu values(5,"irishcoffee",150);
select  * from menu;











