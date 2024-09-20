-- Active: 1714057803737@@127.0.0.1@3306
-- Create the database
CREATE DATABASE php_db;

-- Use the database
USE php_db;

-- Create the 'users' table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample records into 'users' table
INSERT INTO users (username, email, password) 
VALUES 
('john_doe', 'john@example.com', 'password123'),
('jane_doe', 'jane@example.com', 'pass456'),
('admin_user', 'admin@example.com', 'adminpass');

-- Create the 'posts' table
CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Insert sample records into 'posts' table
INSERT INTO posts (user_id, title, content) 
VALUES 
(1, 'My First Post', 'This is the content of my first post.'),
(2, 'Hello World', 'This is Jane\'s first post.'),
(1, 'Another Post', 'John has written another post.');

-- Create the 'contact' table
CREATE TABLE contact (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample records into 'contact' table
INSERT INTO contact (name, email, message) 
VALUES 
('Alice', 'alice@example.com', 'Hello, I need help with my account.'),
('Bob', 'bob@example.com', 'I have a question about your services.'),
('Charlie', 'charlie@example.com', 'Great website! Keep it up.');


select * from posts order by id desc;
SELECT * FROM posts JOIN users on posts.user_id = users.id ORDER BY posts.id desc;

