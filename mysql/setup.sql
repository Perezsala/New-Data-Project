-- Drop the database if it exists
DROP DATABASE IF EXISTS student_passwords;

-- Create the database
CREATE DATABASE student_passwords DEFAULT CHARACTER SET utf8mb4;

-- Use the database
USE student_passwords;


--Drop user if exist
DROP USER IF EXISTS 'passwords_user'@'localhost';

--Create User
CREATE USER 'passwords_user'@'localhost'IDENTIFIED BY 'Cs365@pQroy1!';

--Grant Privileges to user
GRANT ALL PRIVILEGES ON student_passwords.* TO 'passwords_user'@'localhost';


-- Create the website_info table
CREATE TABLE IF NOT EXISTS websites_info (
    website_id INT AUTO_INCREMENT PRIMARY KEY,
    website_name VARCHAR(50) NOT NULL,
    website_url VARCHAR(100) NOT NULL
);

-- Create the user_info table
CREATE TABLE IF NOT EXISTS users_info (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    username VARCHAR(50) NOT NULL,
    email_address VARCHAR(100) NOT NULL,
    comment TEXT,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES websites_info(website_id) ON DELETE CASCADE
);

-- Create the password_info table
CREATE TABLE IF NOT EXISTS password_info (
    password_id INT AUTO_INCREMENT PRIMARY KEY,
    password VARBINARY(255) NOT NULL,
    FOREIGN KEY (password_id) REFERENCES users_info(user_id) ON DELETE CASCADE

);

-- Insert sample data into website_info
INSERT INTO websites_info (website_name, website_url)
VALUES
    ('Nike', 'https://nike.com'),
    ('Snapchat', 'https://snapchat.com'),
    ('GitHub', 'https://github.com');

-- Insert sample data into user_info
INSERT INTO users_info (first_name, last_name, username, email_address, comment, timestamp)
VALUES
    ('John', 'Doe', 'johndoe', 'john@aol.com', 'Example Comment', '2023-10-25 10:15:00'),
    ('Liam', 'Harris', 'liamh', 'liam@aol.com','Messaging', '2023-10-25 16:10:00'),
    ('Sophia', 'Roberts', 'sophiar', 'sophia@aol.com', 'Code', '2023-10-26 13:20:00');


-- Insert sample data into password_info
INSERT INTO password_info (password) VALUES
 ('DoeJohn123'),
 ('LiamSnap2023'),
 ('CodeMaster789');

