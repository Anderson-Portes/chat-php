CREATE SCHEMA IF NOT EXISTS bd_chat DEFAULT CHARACTER SET utf8 ;
USE bd_chat ;

CREATE TABLE IF NOT EXISTS messages (
  MSG_ID INT(11) NOT NULL AUTO_INCREMENT,
  INCOMING_MSG_ID INT(255) NOT NULL,
  OUTGOING_MSG_ID INT(255) NOT NULL,
  MSG VARCHAR(1000) NOT NULL,
  PRIMARY KEY (MSG_ID));

CREATE TABLE IF NOT EXISTS users (
  USER_ID INT(11) NOT NULL AUTO_INCREMENT,
  UNIQUE_ID INT(200) NOT NULL,
  FNAME VARCHAR(255) NOT NULL,
  LNAME VARCHAR(255) NOT NULL,
  EMAIL VARCHAR(255) NOT NULL,
  PASSWORD VARCHAR(255) NOT NULL,
  IMG VARCHAR(400) NOT NULL,
  STATUS VARCHAR(255) NOT NULL,
  PRIMARY KEY (USER_ID));