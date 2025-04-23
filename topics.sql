use cs2033;
drop table topics;

create table topics(
    topicID int AUTO_INCREMENT,
    topic varchar(256) NOT NULL,
    primary key(topicID)
)engine=innodb;