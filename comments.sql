use cs2033;
drop table comments;

create table comments(
    commentID int AUTO_INCREMENT,
    username varchar(15),
    comment NOT NULL varchar(256),
    datePosted timestamp,
    primary key(commentID)
) engine=innodb;