-- Creo il db

-- creo un database se non esiste dal nome mentoring_app
CREATE DATABASE IF NOT EXISTS mentoring_app
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

-- UNA VOLTA CREATO, UTILIZZALO
USE mentoring_app;


-- Tabella Utenti (CLIENTI E ADMIN)

CREATE TABLE IF NOT EXISTS users (

    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('client', 'admin') NOT NULL DEFAULT 'client',   
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

) ENGINE=InnoDB;



--Products

CREATE TABLE IF NOT EXISTS products(

    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    is_active BOOLEAN NOT NULL DEFAULT TRUE,
    category VARCHAR(255) DEFAULT NULL,
    file_path VARCHAR(255) DEFAULT NULL,
    image_path VARCHAR(255) DEFAULT NULL,
    stock_quantity INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

) ENGINE=InnoDB;


--Orders

CREATE TABLE IF NOT EXISTS orders(

    id INT PRIMARY KEY
    user_id INT FK
    total_amount DECIMAL(10,2)
    status ENUM('pending','paid', 'completed','cancelled')
    payment_ref VARCHAR(255)
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

) ENGINE=InnoDB;


-- order items
CREATE TABLE IF NOT EXISTS order item (
    id INT PRIMARY KEY
    order_id INT FK
    product_id INT FK
    quantity INT
    unit_price DECIMAL(10,2)
    subtotal DECIMAL(10,2)

)

-- installations
CREATE TABLE IF NOT EXISTS order installations (

    id INT PRIMARY KEY
    order_id INT FK
    technician_id INT FK
    scheduled_at DATETIME
    address VARCHAR(255)
    status ENUM('confirmed','completed','cancelled')
    notes TEXT
    installation_price DECIMAL(10,2)
    created_at TIMESTAMP
)