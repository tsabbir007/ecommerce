INSERT INTO category (name, image_url)
VALUES ('Clothing', 'clothes-cat.jpeg'),
       ('Shoes', 'shoes-cat.jpeg'),
       ('Watches', 'watches-cat.jpeg'),
       ('Electronics', 'electronics-cat.jpeg');

INSERT INTO sub_category (name, category_id)
VALUES ('T-Shirts', 1),
       ('Analog Watches', 2),
       ('Digital Watches', 2),
       ('Jeans', 1),
       ('Sneakers', 2),
       ('Smart Watches', 3),
       ('Laptops', 4),
       ('Headphones', 4),
       ('Cameras', 4);

-- Inserting dummy data into the 'products' table
INSERT INTO products (name, price, quantity, description, image_url, category_id, sub_category_id)
VALUES ('Nike T-Shirt', 20.00, 100, 'The Nike T-Shirt', 'tshirt.jpeg', 1, 1),
       ('Nike Air Max 270', 150.00, 100, 'The Nike Air Max 270', 'shoe1.jpeg', 2, 5),
       ('Adidas Ultra Boost', 180.00, 100, 'The Adidas Ultra Boost', 'shoe2.jpeg', 2, 5),
       ('Nike Air Force 1', 100.00, 100, 'The Nike Air Force 1', 'shoe3.jpeg', 2, 5),
       ('Rolex Daytona', 15000.00, 10, 'The Rolex Daytona', 'analogwatch1.jpeg', 3, 2),
       ('Rolex Submariner', 10000.00, 10, 'The Rolex Submariner', 'analogwatch2.jpeg', 3, 2),
       ('Apple Watch Series 5', 400.00, 50, 'The Apple Watch Series 5', 'smartwatch1.jpeg', 3, 3),
       ('Samsung Galaxy Watch', 300.00, 50, 'The Samsung Galaxy Watch', 'smartwatch2.jpeg', 3, 3),
       ('Nikon D850', 2500.00, 50, 'The Nikon D850', 'camera.jpeg', 4, NULL),
       ('Sony WH-1000XM3', 350.00, 50, 'The Sony WH-1000XM3', 'electronics-cat.jpeg', NULL, NULL);
