CREATE TABLE IF NOT EXISTS users
(
    id       INT(11) AUTO_INCREMENT PRIMARY KEY,
    name     VARCHAR(255),
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS orders
(
    id             INT(11) AUTO_INCREMENT PRIMARY KEY,
    user_id        INT(11),
    name           VARCHAR(255)   NOT NULL,
    email          VARCHAR(255)   NOT NULL,
    phone          VARCHAR(255)   NOT NULL,
    address        VARCHAR(255)   NOT NULL,
    post_code      VARCHAR(255)   NOT NULL,
    country        VARCHAR(255)   NOT NULL,
    payment_method VARCHAR(255)   NOT NULL,
    total          DECIMAL(10, 2) NOT NULL,
    created_at     TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users (id)
);

CREATE TABLE IF NOT EXISTS order_items
(
    id         INT(11) AUTO_INCREMENT PRIMARY KEY,
    order_id   INT(11),
    product_id INT(11),
    quantity   INT(11)        NOT NULL,
    price      DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders (id),
    FOREIGN KEY (product_id) REFERENCES products (id)
);

CREATE TABLE IF NOT EXISTS category
(
    id        INT(11) AUTO_INCREMENT PRIMARY KEY,
    name      VARCHAR(255) NOT NULL,
    image_url VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS sub_category
(
    id          INT(11) AUTO_INCREMENT PRIMARY KEY,
    name        VARCHAR(255) NOT NULL,
    category_id INT(11),
    FOREIGN KEY (category_id) REFERENCES category (id)
);

CREATE TABLE IF NOT EXISTS products
(
    id              INT(11) AUTO_INCREMENT PRIMARY KEY,
    name            VARCHAR(255)   NOT NULL,
    price           DECIMAL(10, 2) NOT NULL,
    quantity        INT(11)        NOT NULL,
    description     TEXT,
    image_url       VARCHAR(255),
    category_id     INT(11),
    sub_category_id INT(11),
    FOREIGN KEY (category_id) REFERENCES category (id),
    FOREIGN KEY (sub_category_id) REFERENCES sub_category (id)
);
