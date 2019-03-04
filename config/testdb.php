create table users(
	id int(11) not null PRIMARY KEY,
    username varchar(128) not null,
    password varchar(128) not null,
    token varchar(256) DEFAULT null    
);

INSERT INTO users (id, username, password, token) VALUES('1', 'UserName', '123pwd', 'abc123');