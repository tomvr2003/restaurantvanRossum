-- Create database

CREATE DATABASE webapp1;

-- Create table menu

CREATE TABLE menu (
    id int PRIMARY KEY AUTO_INCREMENT,
    title text,
    omschrijving text,
    ingredienten text,
    prijs decimal(4,2)
);

-- Dummy gerecht

INSERT INTO menu (title, omschrijving, ingredienten, prijs)
VALUES ('Pizza Salami', 'Een overheerlijke pizza uit de oven', 'Deeg | Tomatensaus | Salami', '9.95');

-- Create table login

CREATE TABLE login (
    id int PRIMARY KEY AUTO_INCREMENT,
    username varchar(200),
    email varchar(200),
    password varchar(200)
);

-- Login account

INSERT INTO login (username, email, password)
VALUES ('tom', 'tom@gmail.com', '123');

-- Create table contact

CREATE TABLE contact (
    id int PRIMARY KEY AUTO_INCREMENT,
    naam varchar(255),
    email varchar(255),
    onderwerp varchar(255),
    bericht text
);

-- Dummy contact bericht

INSERT INTO contact (naam, email, onderwerp, bericht)
VALUES ('tom', 'tom@gmail.com', 'reserveren', 'ik wil reserveren');





