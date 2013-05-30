use aocheng;

CREATE TABLE t_ac_prod(
	id int primary key auto_increment,
	catid int not null,
	title varchar(32) not null,
	content text not null,
	image_url varchar(256) NULL,
  	description varchar(1024) NULL,
	create_date timestamp not null default now()
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE t_ac_catalog(
	id int primary key auto_increment,
	name varchar(32) not null unique,
	path varchar(256) null
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE t_ac_catalog_rel(
	id int primary key auto_increment,
	pid int not null,
	sid int not null
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE t_ac_prod ADD COLUMN show_image BOOLEAN DEFAULT TRUE;
UPDATE t_ac_prod SET image_url='/images/empty.png' WHERE image_url='http://abc.com/a.jpg';
ALTER TABLE t_ac_prod CHANGE image_url image_url VARCHAR(256) NOT NULL DEFAULT '/images/empty.png';

