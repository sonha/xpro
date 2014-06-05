/*
Navicat MySQL Data Transfer

Source Server         : Sonha
Source Server Version : 50535
Source Host           : localhost:3306
Source Database       : webshop

Target Server Type    : MYSQL
Target Server Version : 50535
File Encoding         : 65001

Date: 2014-05-31 07:35:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `shop_address`
-- ----------------------------
DROP TABLE IF EXISTS `shop_address`;
CREATE TABLE `shop_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shop_address
-- ----------------------------
INSERT INTO `shop_address` VALUES ('1', 'Ph?m v?n ', '??nh', 'Phù L?u', 'Ki?n An', 'H?i Phòng', 'Vi?t Nam');
INSERT INTO `shop_address` VALUES ('2', 'Ph?m v?n ', '??nh', 'Phù L?u', 'Ki?n An', 'H?i Phòng', 'Vi?t Nam');
INSERT INTO `shop_address` VALUES ('3', '1', '??nh', 'Phù L?u', 'Ki?n An', 'H?i Phòng', 'Vi?t Nam');

-- ----------------------------
-- Table structure for `shop_category`
-- ----------------------------
DROP TABLE IF EXISTS `shop_category`;
CREATE TABLE `shop_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(45) NOT NULL,
  `description` text,
  `language` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_category
-- ----------------------------
INSERT INTO `shop_category` VALUES ('1', '0', 'Primary Articles', null, null);
INSERT INTO `shop_category` VALUES ('2', '0', 'Secondary Articles', null, null);
INSERT INTO `shop_category` VALUES ('3', '1', 'Red Primary Articles', null, null);
INSERT INTO `shop_category` VALUES ('4', '1', 'Green Primary Articles', null, null);
INSERT INTO `shop_category` VALUES ('5', '2', 'Red Secondary Articles', null, null);

-- ----------------------------
-- Table structure for `shop_customer`
-- ----------------------------
DROP TABLE IF EXISTS `shop_customer`;
CREATE TABLE `shop_customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `address_id` int(11) NOT NULL,
  `delivery_address_id` int(11) NOT NULL,
  `billing_address_id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_customer
-- ----------------------------

-- ----------------------------
-- Table structure for `shop_image`
-- ----------------------------
DROP TABLE IF EXISTS `shop_image`;
CREATE TABLE `shop_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `filename` varchar(45) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Image_Products` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_image
-- ----------------------------
INSERT INTO `shop_image` VALUES ('1', 'Bàn học sinh cấp 2', 'ban-hoc-sinh-cap1-BHS201.jpg', '4');
INSERT INTO `shop_image` VALUES ('2', 'Bàn học sinh cấp 2', 'ban-hoc-sinh-cap1-BHS201.jpg', '4');
INSERT INTO `shop_image` VALUES ('3', 'Bàn học sinh viên', 'ban-hoc-sinh-vien-BHSV032.gif', '3');

-- ----------------------------
-- Table structure for `shop_order`
-- ----------------------------
DROP TABLE IF EXISTS `shop_order`;
CREATE TABLE `shop_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `delivery_address_id` int(11) NOT NULL,
  `billing_address_id` int(11) NOT NULL,
  `ordering_date` int(11) NOT NULL,
  `ordering_done` tinyint(1) DEFAULT NULL,
  `ordering_confirmed` tinyint(1) DEFAULT NULL,
  `payment_method` int(11) NOT NULL,
  `shipping_method` int(11) NOT NULL,
  `comment` text,
  PRIMARY KEY (`order_id`),
  KEY `fk_order_customer` (`customer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_order
-- ----------------------------

-- ----------------------------
-- Table structure for `shop_order_position`
-- ----------------------------
DROP TABLE IF EXISTS `shop_order_position`;
CREATE TABLE `shop_order_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `specifications` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shop_order_position
-- ----------------------------

-- ----------------------------
-- Table structure for `shop_payment_method`
-- ----------------------------
DROP TABLE IF EXISTS `shop_payment_method`;
CREATE TABLE `shop_payment_method` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `tax_id` int(11) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shop_payment_method
-- ----------------------------
INSERT INTO `shop_payment_method` VALUES ('1', 'cash', 'You pay cash', '1', '0');
INSERT INTO `shop_payment_method` VALUES ('2', 'advance Payment', 'You pay in advance, we deliver', '1', '0');
INSERT INTO `shop_payment_method` VALUES ('3', 'cash on delivery', 'You pay when we deliver', '1', '0');
INSERT INTO `shop_payment_method` VALUES ('4', 'invoice', 'We deliver and send a invoice', '1', '0');
INSERT INTO `shop_payment_method` VALUES ('5', 'paypal', 'You pay by paypal', '1', '0');

-- ----------------------------
-- Table structure for `shop_products`
-- ----------------------------
DROP TABLE IF EXISTS `shop_products`;
CREATE TABLE `shop_products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `tax_id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `description` text,
  `price` varchar(45) DEFAULT NULL,
  `language` varchar(45) DEFAULT NULL,
  `specifications` text,
  PRIMARY KEY (`product_id`),
  KEY `fk_products_category` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_products
-- ----------------------------
INSERT INTO `shop_products` VALUES ('1', '1', '1', 'Demonstration of Article with variations', 'Hello, World!', '19.99', null, null);
INSERT INTO `shop_products` VALUES ('2', '1', '2', 'Another Demo Article with less Tax', '!!', '29.99', null, null);
INSERT INTO `shop_products` VALUES ('3', '2', '1', 'Bàn học sinh viên', 'Loại bàn cao cấp, chât liệu hoàn toàn được làm bằng gỗ công nghiệp MDF, đã qua xử lý chống cong vênh mối mọt. Bề mặt được phủ một lớp sơn dày đẹp sáng bóng.', '3.200.000 VNĐ', null, '{\"Size\":\"Free size\",\"Color\":\"V\\u00e0ng n\\u00e2u.\",\"Some random attribute\":\"\\u0110ang c\\u1eadp nh\\u1eadt...\",\"Material\":\"G\\u1ed7 c\\u00f4ng nghi\\u1ec7p\",\"Specific number\":\"2\"}');
INSERT INTO `shop_products` VALUES ('4', '4', '1', 'Bàn học sinh cấp 2', '', '7, 55', null, '{\"Size\":\"38\",\"Color\":\"\\u0110en\",\"Some random attribute\":\"\\u0110ang c\\u1eadp nh\\u1eadt...\",\"Material\":\"\\u0110ang c\\u1eadp nh\\u1eadt...\",\"Specific number\":\"1\"}');

-- ----------------------------
-- Table structure for `shop_product_specification`
-- ----------------------------
DROP TABLE IF EXISTS `shop_product_specification`;
CREATE TABLE `shop_product_specification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `is_user_input` tinyint(1) DEFAULT NULL,
  `required` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shop_product_specification
-- ----------------------------
INSERT INTO `shop_product_specification` VALUES ('1', 'Size', '0', '1');
INSERT INTO `shop_product_specification` VALUES ('2', 'Color', '0', '0');
INSERT INTO `shop_product_specification` VALUES ('3', 'Some random attribute', '0', '0');
INSERT INTO `shop_product_specification` VALUES ('4', 'Material', '0', '1');
INSERT INTO `shop_product_specification` VALUES ('5', 'Specific number', '1', '1');

-- ----------------------------
-- Table structure for `shop_product_variation`
-- ----------------------------
DROP TABLE IF EXISTS `shop_product_variation`;
CREATE TABLE `shop_product_variation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `specification_id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price_adjustion` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shop_product_variation
-- ----------------------------
INSERT INTO `shop_product_variation` VALUES ('1', '1', '1', '2', 'variation1', '3');
INSERT INTO `shop_product_variation` VALUES ('2', '1', '1', '3', 'variation2', '6');
INSERT INTO `shop_product_variation` VALUES ('3', '1', '2', '4', 'variation3', '9');
INSERT INTO `shop_product_variation` VALUES ('4', '1', '5', '1', 'please enter a number here', '0');
INSERT INTO `shop_product_variation` VALUES ('5', '4', '1', '0', 'please enter a number here', '0');
INSERT INTO `shop_product_variation` VALUES ('6', '3', '1', '0', 'please enter a number here', '0');

-- ----------------------------
-- Table structure for `shop_shipping_method`
-- ----------------------------
DROP TABLE IF EXISTS `shop_shipping_method`;
CREATE TABLE `shop_shipping_method` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `tax_id` int(11) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shop_shipping_method
-- ----------------------------
INSERT INTO `shop_shipping_method` VALUES ('1', 'Delivery by postal Service', 'We deliver by Postal Service. 2.99 units of money are charged for that', '1', '2.99');

-- ----------------------------
-- Table structure for `shop_tax`
-- ----------------------------
DROP TABLE IF EXISTS `shop_tax`;
CREATE TABLE `shop_tax` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `percent` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shop_tax
-- ----------------------------
INSERT INTO `shop_tax` VALUES ('1', '19%', '19');
INSERT INTO `shop_tax` VALUES ('2', '7%', '7');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `skype` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('0', 'Hà Anh Sơn ', '0121212', 'hason61vn@gmail.com', null, null, null, null, null, null);
