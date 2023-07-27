CREATE USER www WITH PASSWORD 'tsw2023';

CREATE TABLE question(
	numberQ integer PRIMARY KEY,
	textQ varchar(100) NOT NULL	
);

CREATE TABLE product(
	name varchar(20),
	model varchar(20),
	url varchar(100),
	PRIMARY KEY(name,model)
);

CREATE TABLE tech(
	code varchar(20) PRIMARY KEY,
	role varchar(30),
	name varchar(10),
	surname varchar(10),
	photo varchar(300),
	description varchar(400)
);

CREATE TABLE users(
	email varchar(30) PRIMARY KEY,
	username varchar(20),
	cell_number bigint,
	name varchar(10),
	surname varchar(10),
	password varchar(255),
	address varchar(30),
	civic_number int,
	date_of_birth date,
	question_number int,
	answer varchar(20),
	FOREIGN KEY(question_number) REFERENCES question(numberQ) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE booking(
	code int PRIMARY KEY,
	problem_description varchar(100),
	booking_date date,
	booking_address varchar(40),
	tech_code varchar(20),
	user_email varchar(30),
	product_name varchar(20),
	product_model varchar(20),
	FOREIGN KEY(tech_code) REFERENCES tech(code) ON DELETE RESTRICT ON UPDATE CASCADE,
	FOREIGN KEY(user_email) REFERENCES users(email) ON DELETE RESTRICT ON UPDATE CASCADE,
	FOREIGN KEY(product_name,product_model) REFERENCES product(name,model) ON DELETE RESTRICT ON UPDATE CASCADE
);

GRANT ALL PRIVILEGES ON ALL TABLES IN SCHEMA public TO www;
GRANT ALL PRIVILEGES ON ALL SEQUENCES IN SCHEMA public TO www;

