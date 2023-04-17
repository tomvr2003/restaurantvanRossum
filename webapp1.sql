-- Create database

CREATE DATABASE webapp1;

-- Create table menu

CREATE TABLE menu (
    id int PRIMARY KEY,
    title text,
    omschrijving text,
    ingredienten text,
    prijs decimal(4,2)
);

-- Create table login

CREATE TABLE login (
    id int PRIMARY KEY,
    username varchar(200),
    email varchar(200),
    password varchar(200)
);

-- Create table contact

CREATE TABLE contact (
    id int PRIMARY KEY,
    naam varchar(255),
    email varchar(255),
    onderwerp varchar(255),
    bericht text
);



