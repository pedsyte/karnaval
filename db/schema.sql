-- Schema definition for categories, products, product_options
DROP TABLE IF EXISTS product_options;
DROP TABLE IF EXISTS products;
DROP TABLE IF EXISTS categories;

CREATE TABLE categories (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL
);

CREATE TABLE products (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    category_id INTEGER NOT NULL,
    name TEXT NOT NULL,
    price REAL NOT NULL,
    description TEXT,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

CREATE TABLE product_options (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    product_id INTEGER NOT NULL,
    option_name TEXT NOT NULL,
    option_value TEXT NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Sample data
INSERT INTO categories (name) VALUES ('Electronics');
INSERT INTO categories (name) VALUES ('Books');

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
