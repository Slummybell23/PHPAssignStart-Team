use cs2033;
drop table articles;

create table articles(
    articleID int AUTO_INCREMENT,
    title varchar(256) NOT NULL,
    topicID int default NULL,
    datePosted timestamp,
    username varchar(15) default NULL,
    primary key(articleID)
);