-- Inserting dummy data into the category table
INSERT INTO category (name)
VALUES ('Clothes'),
       ('Shoes'),
       ('Watches'),
       ('Electronics'),
       ('Others');

-- Inserting dummy data into the sub_category table
INSERT INTO sub_category (name, category_id)
VALUES ('T-Shirts', (SELECT id FROM category WHERE name = 'Clothes')),
       ('Sweater', (SELECT id FROM category WHERE name = 'Clothes')),
       ('Nike', (SELECT id FROM category WHERE name = 'Shoes')),
       ('Adidas', (SELECT id FROM category WHERE name = 'Shoes')),
       ('Smart-watch', (SELECT id FROM category WHERE name = 'Watches')),
       ('Analog-watch', (SELECT id FROM category WHERE name = 'Watches')),
       ('Camera', (SELECT id FROM category WHERE name = 'Electronics')),
       ('Lens', (SELECT id FROM category WHERE name = 'Electronics'));

-- Inserting dummy data into the products table
INSERT INTO products (name, price, description, image_url, category_id, sub_category_id)
VALUES ('Plain T-Shirt', 15.99, 'Comfortable cotton t-shirt', 'tshirt.jpg',
        (SELECT id FROM category WHERE name = 'Clothes'), (SELECT id FROM sub_category WHERE name = 'T-Shirts')),
       ('Warm Sweater', 29.99, 'Soft and cozy sweater for winter', 'sweater.jpg',
        (SELECT id FROM category WHERE name = 'Clothes'), (SELECT id FROM sub_category WHERE name = 'Sweater')),
       ('Nike Air Max', 99.99, 'Stylish Nike sneakers', 'nike.jpg',
        (SELECT id FROM category WHERE name = 'Shoes'), (SELECT id FROM sub_category WHERE name = 'Nike')),
       ('Adidas Superstar', 79.99, 'Classic Adidas sneakers', 'adidas.jpg',
        (SELECT id FROM category WHERE name = 'Shoes'), (SELECT id FROM sub_category WHERE name = 'Adidas')),
       ('Smartwatch 2000', 149.99, 'Advanced smartwatch with health tracking features',
        'smartwatch.jpg', (SELECT id FROM category WHERE name = 'Watches'),
        (SELECT id FROM sub_category WHERE name = 'Smart-watch')),
       ('Classic Analog Watch', 79.99, 'Elegant analog watch with leather strap',
        'analog_watch.jpg', (SELECT id FROM category WHERE name = 'Watches'),
        (SELECT id FROM sub_category WHERE name = 'Analog-watch')),
       ('DSLR Camera', 499.99, 'Professional-grade DSLR camera', 'camera.jpg',
        (SELECT id FROM category WHERE name = 'Electronics'), (SELECT id FROM sub_category WHERE name = 'Camera')),
       ('Telephoto Lens', 199.99, 'High-quality telephoto lens for DSLR cameras', 'lens.jpg',
        (SELECT id FROM category WHERE name = 'Electronics'), (SELECT id FROM sub_category WHERE name = 'Lens'));
