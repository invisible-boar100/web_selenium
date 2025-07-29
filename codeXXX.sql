Drop schema if exists codeX;
create schema codeX;

use codeX;

--
-- Table structure for user
--

CREATE TABLE `users`(
  user_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  user_fname varchar(100) NOT NULL,
  user_lname varchar(100) NOT NULL,
  user_email varchar(50) NOT NULL,
  user_pass varchar(150) NOT NULL,
  user_contact varchar(15) NOT NULL,
  user_role int(11) DEFAULT '2');

--
-- Table structure for brands
--

  CREATE TABLE `brands` (
  brand_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  brand_name varchar(100) NOT NULL
);

--
-- Table structure for order
--
CREATE TABLE `orders` (
  order_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  user_id int(11) NOT NULL ,
  invoice_no int(11) NOT NULL,
  order_date datetime NOT NULL,
  order_status varchar(100) NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(user_id)

);
--
-- Table structure for products
--

CREATE TABLE `products` (
  product_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  product_cat int(11) NOT NULL,
  product_brand int(11) NOT NULL,
  product_title varchar(255) NOT NULL,
  product_price double NOT NULL,
  product_desc varchar(500) NOT NULL,
  product_image varchar(100) NOT NULL,
  product_keywords varchar(150) NOT NULL,
  stock int(11) NOT NULL
);
--
-- Table structure for order details
--

CREATE TABLE `orderdetails` (
  order_id int(11) NOT NULL,
  product_id int(11) NOT NULL,
  quantity int(11) NOT NULL,
  FOREIGN KEY (order_id) REFERENCES orders (order_id),
  FOREIGN KEY (product_id) REFERENCES products (product_id)
);

--
-- Table structure for payment
--
CREATE TABLE `payment` (
  payment_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  amount double NOT NULL,
  user_id int(11) NOT NULL,
  order_id int(11) NOT NULL,
  currency text NOT NULL,
  payment_date datetime NOT NULL,
  FOREIGN KEY (order_id) REFERENCES orders(order_id),
  FOREIGN KEY (user_id) REFERENCES users(user_id)
);



--
-- Table structure for product_review
--
CREATE TABLE `product_review` (
  review_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  user_id int(11) NOT NULL,
  product_id int(11) NOT NULL,
  review varchar(250) NOT NULL,
  p_date date DEFAULT NULL,
  FOREIGN KEY (user_id) REFERENCES users(user_id)
);

--
-- Table structure for categories
--

CREATE TABLE `categories` (
  cat_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  cat_name varchar(100) NOT NULL
);

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  p_id int(11) NOT NULL,
  ip_add varchar(50) NOT NULL,
  c_id int(11) DEFAULT NULL,
  quantity int(11) NOT NULL
);

--
-- Table structure for table `wishlist`
--
CREATE TABLE `wishlist` (
  p_id int(11) NOT NULL,
  ip_add varchar(50) NOT NULL,
  c_id int(11) DEFAULT NULL,
  quantity int(11) NOT NULL
);