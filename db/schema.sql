-- Schema definition for categories, products, product_components
DROP TABLE IF EXISTS product_components;
DROP TABLE IF EXISTS products;
DROP TABLE IF EXISTS categories;

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    image_path VARCHAR(255) NOT NULL
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    description TEXT,
    image_path VARCHAR(255) NOT NULL,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

CREATE TABLE product_components (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    component_name VARCHAR(255) NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Sample data
INSERT INTO categories (name, image_path) VALUES
 ('Пицца', 'img/pizza.webp'),
 ('Гарниры', 'img/garniry.webp'),
 ('Горячие блюда', 'img/hot-dishes.webp'),
 ('Закуски', 'img/zakuski.webp'),
 ('Салаты', 'img/salaty.webp'),
 ('Фрукты', 'img/frukty.webp'),
 ('Десерты', 'img/deserty.webp'),
 ('Напитки', 'img/napitki.webp');

INSERT INTO products (category_id, name, price, description, image_path) VALUES
 (1, 'Маргарита', 150.00, 'Классическая пицца с сыром и томатами', 'photo/pizza1.jpg'),
 (1, 'Пепперони', 170.00, 'Пицца с пепперони и сыром', 'photo/pizza2.jpg');

INSERT INTO product_components (product_id, component_name) VALUES
 (1, 'Сыр'),
 (1, 'Томаты'),
 (1, 'Орегано'),
 (2, 'Сыр'),
 (2, 'Пепперони'),
 (2, 'Томаты');
