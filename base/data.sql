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

CREATE TABLE produit(
    id_produit serial primary KEY,
    product_name VARCHAR(50),
    price DECIMAL(10,2)
);

CREATE TABLE user_produit(
    id_user_produit serial primary KEY,
    user_id INT NOT NULL,
    id_produit INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES utilisateur(user_id),
    FOREIGN KEY (id_produit) REFERENCES produit(id_produit)
);

INSERT INTO utilisateur (username, email) VALUES 
('john_doe', 'john@example.com'),
('jane_smith', 'jane@example.com');

INSERT INTO utilisateur (username, email, password) VALUES 
    ('Koto', 'koto@gmail.com', 'koto');

INSERT INTO role (role_name) VALUES 
('Admin'),
('User');

INSERT INTO user_roles (user_id, role_id) VALUES 
(1, 1), -- John Doe as Admin
(2, 2); -- Jane Smith as User

INSERT INTO produit (product_name, price) VALUES
    ('P1', 10000),
    ('P2', 5000),
    ('P3', 15000);

INSERT INTO user_produit (user_id, id_produit) VALUES
    (1, 1), (1, 3),
    (2, 2), (2, 1), (2, 3);

