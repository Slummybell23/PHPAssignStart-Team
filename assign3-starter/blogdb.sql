drop database if exists blogdb;
create database blogdb;
use blogdb;

create table users(
   userID int AUTO_INCREMENT,
   username varchar(30) not null, index(username),
   lastname varchar(50),
   firstname varchar(30),
   password varchar(30),
   email varchar(255),
   role varchar(30),
   lastModified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   primary key(userID)
)engine=innodb;

create table topics(
   topID int AUTO_INCREMENT,
   name varchar(50),
   description varchar(255),
   lastModified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   primary key(topID)
)engine=innodb;

create table articles(
   artID int AUTO_INCREMENT,
   authorID int NOT NULL, index(authorID),
   topID int NOT NULL, index(topID),
   title varchar(255),
   image varchar(255),
   content text,
   lastModified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   primary key(artID)
)engine=innodb;

create table comments(
   comID int AUTO_INCREMENT,
   authorID int NOT NULL, index(authorID),
   artID int NOT NULL, index(artID),
   content varchar(255),
   lastModified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   primary key(comID)
)engine=innodb;

drop table if exists contacts;

create table contacts(
   contactID int AUTO_INCREMENT,
   username varchar(15),
   email varchar(120),
   passwd varchar(30),
   primary key(contactID)
)engine=innodb;

insert into contacts(username,email,passwd) values('jsmith','jim.smith@gmail.com','pass1');
insert into contacts(username,email,passwd) values('mjones','mjones@gmail.com','pass2');
insert into contacts(username,email,passwd) values('kjohnson','kjohnson@gmail.com','password');

insert into users(username, lastname, firstname, password, email, role)  values ('jsmith', 'Smith', 'Jim', 'J1m$ecure', 'jim.smith@example.com', 'author');
insert into users(username, lastname, firstname, password, email, role)  values ('mjones', 'Jones', 'Mary', 'M@ryAdmin22', 'mary.jones@example.com', 'admin');
insert into users(username, lastname, firstname, password, email, role)  values ('kjohnson', 'Johnson', 'Kate', 'KatePass123', 'kate.johnson@example.com', 'author');

insert into topics(name, description) values ('Chicken', 'Just chicken stuff. Don’t ask.');
insert into topics(name, description) values ('Bags', 'Plastic, paper, emotional');
insert into topics(name, description) values ('Jokes', 'Hahaha Funny');

insert into articles(authorID, topID, title, image, content) values (1, 1, 'Why the Chicken Screamed', 'images/chicken.jpg', 'Loud bird. Big feelings. Not sure why.');
insert into articles(authorID, topID, title, image, content) values (2, 2, 'Top 7 Bags I Yelled At', 'images/bags.jpg', 'Bag #3 really had it coming.');
insert into articles(authorID, topID, title, image, content) values (4, 4, 'Very Funny Jokes', 'images/laugh.jpg', 'ow to make eggroll.... push it');

insert into comments(authorID, artID, content) values (2, 1, 'Chimken'), (3, 2, 'Emotional Damage'), (5, 4, 'I laughed very much');


DROP USER IF EXISTS'bloguser'@'localhost';
create user 'bloguser'@'localhost' identified by 'blogAssign3';
grant all privileges on blogdb.* to 'bloguser'@'localhost';