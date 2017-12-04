# Purpose of this file is to create and populate a database for Limbo
#Jenna Daly
# Version 1.0

DROP DATABASE IF EXISTS limbo_db;
CREATE DATABASE limbo_db; 
USE limbo_db;

CREATE TABLE IF NOT EXISTS users (
user_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
first_name VARCHAR(20) NULL,
last_name VARCHAR(40) NULL,
email VARCHAR(60) NOT NULL,
pass CHAR(40) NOT NULL,
reg_date DATETIME NULL,
PRIMARY KEY(user_id),
UNIQUE( email ) 
);

INSERT INTO users (first_name , email , pass)
VALUES ('admin', 'admin@me.com', 'gaze11e');

select * from users;

explain users;
CREATE TABLE IF NOT EXISTS stuff
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    location TEXT NULL,
    item TEXT NULL,
    description TEXT NULL,
	datelost TEXT NULL,
	datefound TEXT NULL,
    create_date DATETIME NULL,
    update_date DATETIME NULL,
    owner TEXT,
    finder TEXT,
    contact_info TEXT,
    status set ("found", "lost", "claimed") NULL
);


INSERT INTO stuff (location, item, description, create_date, update_date, owner, finder, contact_info, status)
VALUES
("Hancock", "Iphone 6", "Black phone with red case.", NOW(), NOW(), "John Doe", "n/a", "John.Doe1@marist.edu", "lost");

select *
FROM stuff;


CREATE TABLE IF NOT EXISTS locations
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    create_date DATETIME NOT NULL,
    update_date DATETIME NOT NULL,
    name TEXT NOT NULL
    
);

INSERT INTO locations (id, create_date, update_date, name)
VALUES 
(1, NOW(), NOW(), "Byrne House"),
(2, NOW(), NOW(), "Cannavino Library"),
(3, NOW(), NOW(), "Champagnat Hall"),
(4, NOW(), NOW(), "Chapel"),
(5, NOW(), NOW(), "Cornell Boathouse"),
(6, NOW(), NOW(), "Donnelly Hall"),
(7, NOW(), NOW(), "Dyson Center"),
(8, NOW(), NOW(), "Fern Tor"),
(9, NOW(), NOW(), "Fontaine Hall"),
(10, NOW(), NOW(), "Foy Townhouses"),
(11, NOW(), NOW(), "Fulton Street Townhouses(Lower)"),
(12, NOW(), NOW(), "Fulton Street Townhouses (Upper)"),
(13, NOW(), NOW(), "Greystone Hall"),
(14, NOW(), NOW(), "Hancock Center"),
(15, NOW(), NOW(), "Kieran Gatehouse"),
(16, NOW(), NOW(), "Kirk House"),
(17, NOW(), NOW(), "Leo Hall"),
(18, NOW(), NOW(), "Longview Park"),
(19, NOW(), NOW(), "Lowell Thomas Communications Center"),
(20, NOW(), NOW(), "Lower Townhouses"),
(21, NOW(), NOW(), "Marian Hall"),
(22, NOW(), NOW(), "Marist Boathouse"),
(23, NOW(), NOW(), "McCann Center"),
(24, NOW(), NOW(), "Mid-Rise Hall"),
(25, NOW(), NOW(), "North Campus Housing Complex"),
(26, NOW(), NOW(), "St. Ann's Hermitage"),
(27, NOW(), NOW(), "St. Peter's"),
(28, NOW(), NOW(), "Science and Allied Health Building"),
(29, NOW(), NOW(), "Sheahan Hall"),
(30, NOW(), NOW(), "Steel Plant Studios and Gallery"),
(31, NOW(), NOW(), "Student Center/Music Building"),
(32, NOW(), NOW(), "West Cedar Townhouses(Lower)"),
(33, NOW(), NOW(), "West Cedar Townhouses(Upper)");

INSERT INTO stuff (create_date, update_date)
VALUES
(now(), now());