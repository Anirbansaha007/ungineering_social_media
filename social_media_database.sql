CREATE DATABASE social_media;
USE social_media;
CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    college VARCHAR(255),
    phone_number VARCHAR(13),
    PRIMARY KEY (id) 
);
CREATE TABLE statuses (
    id INT NOT NULL AUTO_INCREMENT,
    user_id INT,
    status VARCHAR(1000),
    date VARCHAR(255),
    time VARCHAR(255),
    PRIMARY KEY (id), 
    FOREIGN KEY (user_id) REFERENCES users(id)
);
ALTER TABLE users CHANGE time datetime datetime;
ALTER TABLE users MODIFY email VARCHAR(255) NOT NULL UNIQUE;

