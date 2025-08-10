-- Schema definition for categories, products, product_options
DROP TABLE IF EXISTS product_options;
DROP TABLE IF EXISTS products;
DROP TABLE IF EXISTS categories;

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    description TEXT,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

CREATE TABLE product_options (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    option_name VARCHAR(255) NOT NULL,
    option_value VARCHAR(255) NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Sample data
INSERT INTO categories (name) VALUES ('Electronics'), ('Books');

INSERT INTO products (category_id, name, price, description) VALUES
 (1, 'Smartphone', 699.99, 'Latest model smartphone'),
 (1, 'Laptop', 1199.50, 'Powerful laptop for professionals'),
 (2, 'Novel', 19.99, 'Bestselling fiction book');

INSERT INTO product_options (product_id, option_name, option_value) VALUES
 (1, 'Color', 'Black'),
 (1, 'Storage', '128GB'),
 (2, 'RAM', '16GB'),
 (2, 'Storage', '512GB'),
 (3, 'Format', 'Hardcover');
