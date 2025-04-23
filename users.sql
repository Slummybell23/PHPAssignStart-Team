use cs2033;
drop table users;

create table users(
    userID int AUTO_INCREMENT,
    username varchar(15) NOT NULL,
    email varchar(120) NOT NULL,
    passwd varchar(30) NOT NULL,
    dateCreated timestamp DEFAULT CURRENT_TIMESTAMP,
    primary key(userID)
)engine=innodb;