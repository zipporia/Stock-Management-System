CREATE DATABASE stocks

CREATE TABLE users (
	user_id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    user_name varchar(255) NOT NULL,
    user_pwd varchar(255) NOT NULL,
    user_email varchar(255) NOT NULL
);

CREATE TABLE brands (
	brand_id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    brand_name varchar(255) NOT NULL,
    brand_active int(11) NOT NULL,
    brand_status int(11) NOT NULL
);

CREATE TABLE categories (
	category_id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    category_name varchar(255) NOT NULL,
    category_active int(11) NOT null,
    category_status int(11) NOT null
);

CREATE TABLE products(
	product_id int(11) PRIMARY KEY AUTO_INCREMENT NOT null,
    product_name varchar(255) NOT null,
    product_code varchar(255) NOT null,
    product_image text not null,
    pbrand_id int(11) NOT null,
    pcategory_id int(11) NOT null,
    product_quantity varchar(255) NOT null,
    product_rate varchar(255) NOT null,
    product_active int(11) NOT null,
    product_status int(11) NOT null
);

CREATE TABLE orders(
	order_id int(11) PRIMARY KEY AUTO_INCREMENT NOT null,
    order_date date NOT null,
    client_name varchar(255) NOT null,
    client_contact varchar(255) NOT null,
    sub_total varchar(255) NOT null,
    vat varchar(255) NOT null,
    total_amount varchar(255) NOT null,
    discount varchar(255) NOT null,
    grand_total varchar(255) NOT null,
    paid varchar(255) NOT null,
    due varchar(255) NOT null,
    payment_type int(11) NOT null,
    payment_status int(11) NOT null,
    order_status int(11) NOT null
);

CREATE TABLE orders_items(
	orders_item_id int(11) PRIMARY KEY AUTO_INCREMENT NOT null,
    order_id int(11) NOT null,
    product_id int(11) NOT null,
    quantity varchar(255) NOT null,
    rate varchar(255) NOT null,
    total varchar(255) NOT null,
    orders_item_status int(11) NOT null
);