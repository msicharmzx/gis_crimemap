
-- Use the database
USE gis_login;

-- Create the users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL -- We will store the password as a hash
);

-- Insert a test user
INSERT INTO users (username, password) VALUES ('admin', '$2y$10$eC9KtGVfwnwwxkdmUV1.VuOEcy4d2k2LB5sQHQKXXHSl5HtZ.QQj2');

