CREATE DATABASE attendance_db;
USE attendance_db;

CREATE TABLE students(
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(100),
 roll_no VARCHAR(20),
 class_name VARCHAR(50),
 image VARCHAR(255)
);