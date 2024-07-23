CREATE DATABASE laravel_api;
\c laravel_api;

CREATE TABLE utilisateur (
    user_id SERIAL PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE role (
    role_id SERIAL PRIMARY KEY,
    role_name VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE user_roles (
    user_role_id SERIAL PRIMARY KEY,
    user_id INT NOT NULL,
    role_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES utilisateur(user_id),
    FOREIGN KEY (role_id) REFERENCES role(role_id)
);

INSERT INTO utilisateur (username, email) VALUES 
('john_doe', 'john@example.com'),
('jane_smith', 'jane@example.com');

INSERT INTO role (role_name) VALUES 
('Admin'),
('User');

INSERT INTO user_roles (user_id, role_id) VALUES 
(1, 1), -- John Doe as Admin
(2, 2); -- Jane Smith as User


