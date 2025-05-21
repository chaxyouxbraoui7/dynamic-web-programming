CREATE DATABASE IF NOT EXISTS practical_work_10;
USE practical_work_10;

CREATE TABLE exercice (

  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  autor VARCHAR(255) NOT NULL,
  creation_date DATE NOT NULL

);