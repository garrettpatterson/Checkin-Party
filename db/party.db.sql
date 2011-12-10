create table user(id INTEGER PRIMARY KEY AUTOINCREMENT,email,first_name,last_name,prereg INTEGER DEFAULT 0,nophone INTEGER DEFAULT 0);
create table checkin(venueid,userid,timestamp DEFAULT CURRENT_TIMESTAMP);
create table venue(id INTEGER PRIMARY KEY AUTOINCREMENT
,name varchar(50)
,description TEXT
,funfact TEXT
,image varchar(255)
);


create table prizetype(id INTEGER,type);
insert into prizetype(id,type)
VALUES(1,'start');
insert into prizetype(id,type)
VALUES(2,'random');

insert into prizetype(id,type)
VALUES(3,'finish');

insert into prizetype(id,type)
VALUES(4,'grand');

create table prizelog(userid,venueid,prizetypeid,timestamp DEFAULT CURRENT_TIMESTAMP);

