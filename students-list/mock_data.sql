CREATE DATABASE IF NOT EXISTS `student_list` DEFAULT CHARACTER SET utf8mb4;

USE `student_list`;

CREATE TABLE IF NOT EXISTS school_db (
            id INT PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(100),
            email VARCHAR(100),
            age INT
        );

INSERT INTO school_db (name, email, age) VALUES
('John Doe', 'john@gmail.com', 20),
('Jane Smith', 'jane@gmail.com', 22),
('Alice Johnson', 'al_johnson@email.com', 19),
('Bob Brown', 'brown465@yahoo.com', 26),
('Charlie Black', 'black_cahrlie78@outlook.com', 34),
('Diana Prince', 'dipr@email.com', 29);
