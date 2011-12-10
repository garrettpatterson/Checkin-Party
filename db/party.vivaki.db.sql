create table user(id INTEGER PRIMARY KEY AUTOINCREMENT,email,first_name,last_name,prereg INTEGER DEFAULT 0,nophone INTEGER DEFAULT 0);
create table checkin(venueid,userid,timestamp DEFAULT CURRENT_TIMESTAMP);
create table venue(id INTEGER PRIMARY KEY AUTOINCREMENT
,name varchar(50)
,description TEXT
,funfact TEXT
,image varchar(255)
);

insert into venue(name,description,funfact,image)
VALUES('Chinook','Conference Room','standups','');

insert into venue(name,description,funfact,image)
VALUES('Coho','Conference Room','lots of chairs','');



insert into venue(name,description,funfact,image)
VALUES('Keg.io','"Technology Laden Kegerator" built by the Nerve Center.  RFID cards control access, and track who is pouring how much.  Keg.io was a way to experiment with some new technologies like Node.js, SQLite, and Audrino','Check out the new pop machine','');

insert into venue(name,description,funfact,image)
VALUES('Kitchen','Come hang out in our kitchen/common area with some cloud-inspired cocktails','We all use the kitchen','');

insert into venue(name,description,funfact,image)
VALUES('PingPong','Woah, a whole ping pong room!','','');

insert into venue(name,description,funfact,image)
VALUES('Zenith','<img src = "http://www.zenithoptimedia.com/files/themes/zenith/images/0images/1furniture/ZenithOptimediaLogo.gif" /><br />Did you know that Razorfish, Vivaki Nerve Center, and Zenith Optimidea are all siblings under the Vivaki name?','Zenith starts with a Z','');


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

