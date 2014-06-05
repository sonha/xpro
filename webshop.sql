/*
Navicat MySQL Data Transfer

Source Server         : Sonha
Source Server Version : 50535
Source Host           : localhost:3306
Source Database       : webshop

Target Server Type    : MYSQL
Target Server Version : 50535
File Encoding         : 65001

Date: 2014-06-05 18:06:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `authentications`
-- ----------------------------
DROP TABLE IF EXISTS `authentications`;
CREATE TABLE `authentications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT 'refer to users.id',
  `provider` varchar(100) NOT NULL,
  `provider_uid` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `display_name` varchar(150) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `profile_url` varchar(300) NOT NULL,
  `website_url` varchar(300) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `provider_uid` (`provider_uid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of authentications
-- ----------------------------
INSERT INTO `authentications` VALUES ('1', '0', 'facebook', '1805441692', 'hason61vn@gmail.com', 'Hà Anh Sơn', 'Hà', 'Sơn', 'https://www.facebook.com/hason61vn', '', '2014-06-02 13:33:22');

-- ----------------------------
-- Table structure for `category`
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `in` int(11) NOT NULL AUTO_INCREMENT,
  `title_cat` varchar(255) DEFAULT NULL,
  `Des_cat` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`in`),
  KEY `id` (`user_id`),
  KEY `parent_id` (`parent_id`),
  CONSTRAINT `category_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `category` (`in`),
  CONSTRAINT `id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------

-- ----------------------------
-- Table structure for `ha_logins`
-- ----------------------------
DROP TABLE IF EXISTS `ha_logins`;
CREATE TABLE `ha_logins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `loginProvider` varchar(50) NOT NULL,
  `loginProviderIdentifier` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `loginProvider_2` (`loginProvider`,`loginProviderIdentifier`),
  KEY `loginProvider` (`loginProvider`),
  KEY `loginProviderIdentifier` (`loginProviderIdentifier`),
  KEY `userId` (`userId`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ha_logins
-- ----------------------------

-- ----------------------------
-- Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catid` int(11) NOT NULL,
  `title` varchar(255) DEFAULT '',
  `content` text,
  `thumb` varchar(255) DEFAULT NULL,
  `pub_time` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `catID` (`catid`),
  KEY `news_ibfk_user` (`user_id`),
  CONSTRAINT `news_ibfk_cat` FOREIGN KEY (`catid`) REFERENCES `category` (`in`),
  CONSTRAINT `news_ibfk_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=202 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------

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
-- Table structure for `type`
-- ----------------------------
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of type
-- ----------------------------
INSERT INTO `type` VALUES ('4', 't');
INSERT INTO `type` VALUES ('5', 'ba');
INSERT INTO `type` VALUES ('14', '1212');
INSERT INTO `type` VALUES ('15', '23');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL DEFAULT '0',
  `username` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `skype` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('0', 'napoleonyb', '', 'sonha@sohagame.vn', null, null, null, null, null, null, null, null, null, null);
INSERT INTO `user` VALUES ('1', 'Luke Harper', '071-019-5588', 'euismod.et@sit.co.uk', 'Duncan Campos', 'Tiger Olson', 'Tiger Olson', '1468 Nunc Rd.', '1', '1', 'euismod ac, fermentum vel, mauris. Integer sem elit, pharetra ut,', 'Bernard', 'Nichole', '2007-12-14 00:00:00');
INSERT INTO `user` VALUES ('2', 'August Clements', '075-821-9353', 'In.ornare.sagittis@Proin.co.uk', 'Yoko Phelps', 'Devin Vargas', 'Devin Vargas', 'P.O. Box 776, 4755 Proin Street', '0', '1', 'semper. Nam tempor diam dictum sapien. Aenean massa. Integer vitae', 'Ashton', 'Melissa', '2004-06-14 00:00:00');
INSERT INTO `user` VALUES ('3', 'Cullen Brewer', '015-220-0793', 'Nullam.feugiat.placerat@Integer.ca', 'Pandora Randolph', 'Alfonso Compton', 'Alfonso Compton', '688-8091 Tempor Rd.', '1', '0', 'tellus. Aenean egestas hendrerit neque. In ornare sagittis felis. Donec', 'Alden', 'Marah', '2016-10-13 00:00:00');
INSERT INTO `user` VALUES ('4', 'Burke Richards', '052-663-2815', 'interdum.Sed@atnisi.com', 'Amir Davidson', 'Karyn Coleman', 'Karyn Coleman', 'Ap #732-2709 Lectus Street', '1', '1', 'Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer vulputate, risus a', 'Adam', 'Willow', '2028-11-14 00:00:00');
INSERT INTO `user` VALUES ('5', 'Galvin Lopez', '079-547-4305', 'erat.vel.pede@nuncQuisque.edu', 'Jesse Pena', 'TaShya Rosales', 'TaShya Rosales', 'Ap #414-4844 Nunc St.', '0', '1', 'arcu. Nunc mauris. Morbi non sapien molestie orci tincidunt adipiscing.', 'Camden', 'Yuri', '2008-05-15 00:00:00');
INSERT INTO `user` VALUES ('6', 'Lionel Cotton', '009-028-0926', 'Sed.molestie.Sed@enimcommodo.com', 'Xenos Harding', 'Camilla Summers', 'Camilla Summers', '256-9239 Ante Rd.', '0', '1', 'magna. Nam ligula elit, pretium et, rutrum non, hendrerit id,', 'Tucker', 'Sydney', '2024-08-14 00:00:00');
INSERT INTO `user` VALUES ('7', 'Garrett England', '013-305-0408', 'urna@luctusfelispurus.edu', 'Chiquita Clarke', 'Ivan Vinson', 'Ivan Vinson', 'P.O. Box 310, 7695 Nulla. St.', '1', '0', 'et, euismod et, commodo at, libero. Morbi accumsan laoreet ipsum.', 'Vincent', 'Yoshi', '2026-09-14 00:00:00');
INSERT INTO `user` VALUES ('8', 'Michael Knapp', '049-270-3916', 'ligula@sedtortor.co.uk', 'Uriah Morris', 'Jonah Dotson', 'Jonah Dotson', '913-1300 Mauris, Ave', '1', '1', 'dapibus rutrum, justo. Praesent luctus. Curabitur egestas nunc sed libero.', 'Malcolm', 'Keelie', '2003-09-14 00:00:00');
INSERT INTO `user` VALUES ('9', 'Cade Park', '080-886-3276', 'quis.diam.luctus@quisdiam.org', 'Guinevere Pratt', 'Lunea Vasquez', 'Lunea Vasquez', '368-2229 Tellus St.', '0', '1', 'enim. Mauris quis turpis vitae purus gravida sagittis. Duis gravida.', 'Bruno', 'Iliana', '2027-02-14 00:00:00');
INSERT INTO `user` VALUES ('10', 'Jesse Hebert', '067-247-3609', 'laoreet.ipsum.Curabitur@odioEtiam.net', 'Elmo Boyer', 'Nomlanga Mcdowell', 'Nomlanga Mcdowell', 'Ap #776-8819 Quis Avenue', '1', '1', 'fermentum fermentum arcu. Vestibulum ante ipsum primis in faucibus orci', 'Dante', 'Elizabeth', '2007-08-13 00:00:00');
INSERT INTO `user` VALUES ('11', 'John Yates', '082-832-4277', 'ridiculus.mus@eutellus.org', 'Abel Thomas', 'Jenette Watson', 'Jenette Watson', '532-8518 Semper Road', '0', '1', 'ipsum. Curabitur consequat, lectus sit amet luctus vulputate, nisi sem', 'Zahir', 'Morgan', '2027-12-13 00:00:00');
INSERT INTO `user` VALUES ('12', 'Bert Holmes', '045-248-8885', 'ante@fringillaDonec.org', 'Rigel Fisher', 'Abdul Mitchell', 'Abdul Mitchell', '273-368 Bibendum. Av.', '1', '0', 'primis in faucibus orci luctus et ultrices posuere cubilia Curae;', 'Lev', 'Azalia', '2020-09-13 00:00:00');
INSERT INTO `user` VALUES ('13', 'Fritz Simon', '050-742-8606', 'purus@placeratCras.org', 'Inga Logan', 'Adrian Brennan', 'Adrian Brennan', 'Ap #787-9299 Metus Rd.', '0', '1', 'erat neque non quam. Pellentesque habitant morbi tristique senectus et', 'Macaulay', 'Celeste', '2003-01-15 00:00:00');
INSERT INTO `user` VALUES ('14', 'Quinn Calderon', '053-167-6305', 'Nam.tempor.diam@disparturientmontes.com', 'Sloane Ellis', 'Dana Le', 'Dana Le', '122-3466 Nibh Street', '0', '0', 'Vivamus nisi. Mauris nulla. Integer urna. Vivamus molestie dapibus ligula.', 'Cody', 'Regina', '2026-09-13 00:00:00');
INSERT INTO `user` VALUES ('15', 'Oren Mcguire', '088-691-2056', 'at.pede@condimentumDonec.org', 'Buffy Barnett', 'Jamal Watts', 'Jamal Watts', '831 Ligula. Road', '0', '1', 'Donec sollicitudin adipiscing ligula. Aenean gravida nunc sed pede. Cum', 'Forrest', 'Jenna', '2018-08-14 00:00:00');
INSERT INTO `user` VALUES ('16', 'Jamal Benton', '008-470-8157', 'egestas.rhoncus.Proin@Morbi.org', 'Leigh Bentley', 'Latifah Hobbs', 'Latifah Hobbs', '746-926 Mi St.', '1', '1', 'mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae,', 'Kevin', 'Holly', '2024-03-14 00:00:00');
INSERT INTO `user` VALUES ('17', 'Cairo Olsen', '079-411-3051', 'mollis@maurisMorbi.net', 'Rowan Oneill', 'Harper Campbell', 'Harper Campbell', '141-1011 Ipsum Rd.', '0', '1', 'Curabitur ut odio vel est tempor bibendum. Donec felis orci,', 'Joshua', 'Stacey', '2028-05-15 00:00:00');
INSERT INTO `user` VALUES ('18', 'Basil Waters', '052-996-3390', 'Integer.id@non.co.uk', 'Carl Marshall', 'Chastity Castaneda', 'Chastity Castaneda', '8873 Mauris, Rd.', '1', '1', 'Morbi quis urna. Nunc quis arcu vel quam dignissim pharetra.', 'Dieter', 'Ila', '2026-09-14 00:00:00');
INSERT INTO `user` VALUES ('19', 'Maxwell Cortez', '023-653-1214', 'dictum.augue.malesuada@tellus.co.uk', 'Aaron Cannon', 'Leslie Blair', 'Leslie Blair', 'P.O. Box 534, 3444 Tempor, St.', '1', '0', 'Nunc laoreet lectus quis massa. Mauris vestibulum, neque sed dictum', 'Patrick', 'Iola', '2011-03-15 00:00:00');
INSERT INTO `user` VALUES ('20', 'Davis Wells', '042-769-2832', 'vel@dui.com', 'Zeus Cardenas', 'Mary Mcfarland', 'Mary Mcfarland', '9524 Nec, Street', '1', '1', 'ligula. Nullam feugiat placerat velit. Quisque varius. Nam porttitor scelerisque', 'Lucian', 'Nichole', '2027-02-14 00:00:00');
INSERT INTO `user` VALUES ('21', 'Warren Erickson', '058-355-2198', 'in.hendrerit.consectetuer@ametnulla.co.uk', 'Holmes Becker', 'Hollee Mckay', 'Hollee Mckay', '3449 Pretium Avenue', '0', '0', 'Proin vel arcu eu odio tristique pharetra. Quisque ac libero', 'Harding', 'Pascale', '2007-09-13 00:00:00');
INSERT INTO `user` VALUES ('22', 'Jesse Hoover', '023-393-9977', 'non@nibhsitamet.co.uk', 'Sophia Wright', 'Tashya Cash', 'Tashya Cash', '499-1033 Arcu. Av.', '0', '0', 'magna. Duis dignissim tempor arcu. Vestibulum ut eros non enim', 'Oscar', 'Rana', '2027-04-15 00:00:00');
INSERT INTO `user` VALUES ('23', 'Ira Roberts', '033-313-0761', 'elit.Curabitur.sed@magnaaneque.co.uk', 'Martina Burris', 'Hamish Wallace', 'Hamish Wallace', 'P.O. Box 645, 3262 Duis Street', '0', '1', 'diam. Sed diam lorem, auctor quis, tristique ac, eleifend vitae,', 'Hamilton', 'Briar', '2029-11-14 00:00:00');
INSERT INTO `user` VALUES ('24', 'Jelani Coffey', '073-083-2520', 'aliquet.Phasellus@ipsumSuspendisse.co.uk', 'Britanney Bullock', 'Cullen Graves', 'Cullen Graves', '904-2907 Lacus. Rd.', '1', '0', 'dui augue eu tellus. Phasellus elit pede, malesuada vel, venenatis', 'Colton', 'Cassandra', '2022-07-13 00:00:00');
INSERT INTO `user` VALUES ('25', 'Derek Owens', '011-642-4444', 'sapien.imperdiet.ornare@Quisque.org', 'Vanna Ross', 'Kyra Compton', 'Kyra Compton', '3565 Erat, St.', '1', '1', 'et magnis dis parturient montes, nascetur ridiculus mus. Proin vel', 'Rafael', 'Chastity', '2008-10-14 00:00:00');
INSERT INTO `user` VALUES ('26', 'Dale Price', '081-860-3559', 'consectetuer.ipsum.nunc@egestasDuisac.ca', 'Bianca Medina', 'Cheryl Foster', 'Cheryl Foster', 'P.O. Box 638, 1784 Habitant St.', '0', '1', 'consequat, lectus sit amet luctus vulputate, nisi sem semper erat,', 'Trevor', 'Grace', '2005-10-13 00:00:00');
INSERT INTO `user` VALUES ('27', 'Nathan Cardenas', '093-684-9327', 'mollis.nec.cursus@nuncnullavulputate.com', 'Buffy Sparks', 'Christine Barnett', 'Christine Barnett', 'P.O. Box 303, 7094 Sed St.', '0', '1', 'sit amet risus. Donec egestas. Aliquam nec enim. Nunc ut', 'Byron', 'Indira', '2028-12-14 00:00:00');
INSERT INTO `user` VALUES ('28', 'Bert Atkinson', '050-334-2498', 'augue@vitaerisus.ca', 'Reagan Le', 'Vera Spence', 'Vera Spence', '5933 Per St.', '1', '0', 'blandit at, nisi. Cum sociis natoque penatibus et magnis dis', 'Quentin', 'Bertha', '2030-05-14 00:00:00');
INSERT INTO `user` VALUES ('29', 'Kennan Hayden', '000-582-1552', 'arcu.Sed.et@egetipsumDonec.com', 'Paki Pope', 'Hollee Sheppard', 'Hollee Sheppard', '1248 Laoreet Rd.', '0', '0', 'ut, nulla. Cras eu tellus eu augue porttitor interdum. Sed', 'Jackson', 'Celeste', '2009-05-14 00:00:00');
INSERT INTO `user` VALUES ('30', 'Vance Buck', '065-826-8408', 'luctus.Curabitur.egestas@vitae.edu', 'Edward Mckenzie', 'Lydia Davis', 'Lydia Davis', 'P.O. Box 297, 747 Mauris Ave', '1', '0', 'erat eget ipsum. Suspendisse sagittis. Nullam vitae diam. Proin dolor.', 'Coby', 'Urielle', '2014-01-15 00:00:00');
INSERT INTO `user` VALUES ('31', 'Abraham Sparks', '092-475-0497', 'bibendum.ullamcorper@acmattisornare.co.uk', 'Dacey Lucas', 'Gage Graves', 'Gage Graves', '789-2515 Est. Street', '1', '0', 'non, feugiat nec, diam. Duis mi enim, condimentum eget, volutpat', 'Orson', 'Dai', '2012-04-15 00:00:00');
INSERT INTO `user` VALUES ('32', 'Zeph Stanley', '018-827-1766', 'Curabitur.vel.lectus@non.ca', 'Jenna Bright', 'Graiden Simon', 'Graiden Simon', '895 Amet St.', '0', '1', 'Vivamus nibh dolor, nonummy ac, feugiat non, lobortis quis, pede.', 'Hop', 'Jasmine', '2013-01-14 00:00:00');
INSERT INTO `user` VALUES ('33', 'Branden Bean', '066-811-6071', 'Mauris.eu@velit.org', 'Dai Contreras', 'Clark Luna', 'Clark Luna', 'Ap #798-9337 Diam Avenue', '0', '1', 'at, nisi. Cum sociis natoque penatibus et magnis dis parturient', 'Carson', 'Heidi', '2003-06-14 00:00:00');
INSERT INTO `user` VALUES ('34', 'Nehru Fitzgerald', '061-799-5561', 'tellus.non@neceuismodin.edu', 'Porter Flowers', 'Vera Middleton', 'Vera Middleton', '575-2105 Sit Road', '1', '0', 'amet lorem semper auctor. Mauris vel turpis. Aliquam adipiscing lobortis', 'Levi', 'Lillith', '2021-04-14 00:00:00');
INSERT INTO `user` VALUES ('35', 'Benedict Morales', '001-237-8204', 'feugiat.Lorem@posuere.ca', 'Jocelyn Anthony', 'Madison Welch', 'Madison Welch', '7991 Ornare. Ave', '1', '1', 'eget magna. Suspendisse tristique neque venenatis lacus. Etiam bibendum fermentum', 'Howard', 'Haviva', '2013-09-14 00:00:00');
INSERT INTO `user` VALUES ('36', 'Wing Sanford', '061-716-7331', 'et@ligulaeuenim.edu', 'Clare Glover', 'Kitra Warren', 'Kitra Warren', 'P.O. Box 205, 7154 Faucibus Road', '0', '0', 'Donec at arcu. Vestibulum ante ipsum primis in faucibus orci', 'Peter', 'Jasmine', '2018-02-15 00:00:00');
INSERT INTO `user` VALUES ('37', 'Felix Hoffman', '099-194-4820', 'at.lacus@lacusCras.co.uk', 'Zeus Mullins', 'April Maxwell', 'April Maxwell', 'P.O. Box 338, 4285 Lobortis Ave', '1', '0', 'Nam interdum enim non nisi. Aenean eget metus. In nec', 'Timon', 'Cathleen', '2003-02-15 00:00:00');
INSERT INTO `user` VALUES ('38', 'Russell Cardenas', '077-988-6274', 'orci@ligula.com', 'Ezra Moreno', 'Mercedes Cox', 'Mercedes Cox', '1284 Sit Rd.', '0', '0', 'erat neque non quam. Pellentesque habitant morbi tristique senectus et', 'Maxwell', 'Chloe', '2020-03-15 00:00:00');
INSERT INTO `user` VALUES ('39', 'Thaddeus Gilmore', '097-115-3461', 'Quisque.fringilla.euismod@bibendum.ca', 'Garrett Ayala', 'Gillian Keller', 'Gillian Keller', '9772 In Road', '0', '0', 'lorem, eget mollis lectus pede et risus. Quisque libero lacus,', 'Tiger', 'Veda', '2025-06-14 00:00:00');
INSERT INTO `user` VALUES ('40', 'Stephen Franklin', '022-349-8105', 'arcu.Nunc.mauris@justoeu.org', 'Haviva Humphrey', 'Justina Ewing', 'Justina Ewing', '7257 Ipsum Street', '1', '0', 'mollis. Duis sit amet diam eu dolor egestas rhoncus. Proin', 'Finn', 'Melissa', '2026-01-15 00:00:00');
INSERT INTO `user` VALUES ('41', 'Julian Hall', '003-770-1015', 'sem@convallis.org', 'Hadassah Jacobs', 'Nasim Buckner', 'Nasim Buckner', '682-8169 Ut Avenue', '1', '0', 'auctor velit. Aliquam nisl. Nulla eu neque pellentesque massa lobortis', 'Giacomo', 'Frances', '2004-06-13 00:00:00');
INSERT INTO `user` VALUES ('42', 'Amos Anderson', '050-468-3750', 'non.massa.non@etultricesposuere.co.uk', 'Bianca Randolph', 'Beverly Sykes', 'Beverly Sykes', '7278 Etiam St.', '0', '1', 'rutrum urna, nec luctus felis purus ac tellus. Suspendisse sed', 'Jackson', 'Whitney', '2002-04-15 00:00:00');
INSERT INTO `user` VALUES ('43', 'Kareem Mcguire', '038-888-6955', 'purus.mauris.a@Nullaeget.com', 'Griffin Jacobs', 'Maggy Lancaster', 'Maggy Lancaster', '643-6697 Enim Road', '1', '0', 'Mauris ut quam vel sapien imperdiet ornare. In faucibus. Morbi', 'Kareem', 'Adena', '2003-07-13 00:00:00');
INSERT INTO `user` VALUES ('44', 'Len Ochoa', '020-769-9658', 'sem.ut.cursus@cubiliaCurae.edu', 'Jael Blackburn', 'Savannah Nelson', 'Savannah Nelson', '728-2333 Quisque Av.', '0', '0', 'primis in faucibus orci luctus et ultrices posuere cubilia Curae;', 'Marsden', 'Christine', '2022-08-14 00:00:00');
INSERT INTO `user` VALUES ('45', 'Daquan Bowen', '044-910-2215', 'lectus@velitAliquamnisl.co.uk', 'Porter Newman', 'Wendy Mendoza', 'Wendy Mendoza', '278 Sodales. Ave', '1', '0', 'imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non,', 'Colt', 'Basia', '2008-07-13 00:00:00');
INSERT INTO `user` VALUES ('46', 'Vaughan Hogan', '082-080-0717', 'facilisis.eget.ipsum@lacusAliquamrutrum.org', 'Britanni Moss', 'Venus Delacruz', 'Venus Delacruz', 'Ap #272-2207 Sed St.', '0', '0', 'neque sed sem egestas blandit. Nam nulla magna, malesuada vel,', 'Zachery', 'Alfreda', '2004-02-14 00:00:00');
INSERT INTO `user` VALUES ('47', 'Jin Herman', '089-736-6099', 'faucibus.Morbi.vehicula@duiSuspendisse.edu', 'Iris Rodgers', 'Marsden Mcgee', 'Marsden Mcgee', '883-4103 Et Rd.', '1', '0', 'elit. Etiam laoreet, libero et tristique pellentesque, tellus sem mollis', 'Merritt', 'Sade', '2030-01-14 00:00:00');
INSERT INTO `user` VALUES ('48', 'Lane Oconnor', '027-744-3188', 'odio@adipiscing.com', 'Brent Leach', 'Patrick Lloyd', 'Patrick Lloyd', '753-6075 Nisi Rd.', '1', '1', 'sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam', 'Xander', 'Imelda', '2021-01-15 00:00:00');
INSERT INTO `user` VALUES ('49', 'Austin Boyle', '027-645-8283', 'magna.Duis@tellus.org', 'Autumn Stewart', 'Ivy Bailey', 'Ivy Bailey', '242-1639 Sed Avenue', '0', '1', 'erat nonummy ultricies ornare, elit elit fermentum risus, at fringilla', 'Macaulay', 'Celeste', '2028-03-14 00:00:00');
INSERT INTO `user` VALUES ('50', 'Xanthus Harmon', '038-449-7913', 'lorem.semper.auctor@lectusconvallis.net', 'Inga Contreras', 'Kerry Boyle', 'Kerry Boyle', 'Ap #285-6597 Lacinia St.', '0', '1', 'Donec elementum, lorem ut aliquam iaculis, lacus pede sagittis augue,', 'Francis', 'Virginia', '2028-10-13 00:00:00');
INSERT INTO `user` VALUES ('51', 'Stephen Christensen', '094-358-9462', 'non@variusultricesmauris.ca', 'Dominique Fuller', 'Hashim Roman', 'Hashim Roman', 'Ap #515-6380 Augue, Road', '1', '1', 'enim nec tempus scelerisque, lorem ipsum sodales purus, in molestie', 'Zahir', 'Irene', '2020-04-14 00:00:00');
INSERT INTO `user` VALUES ('52', 'Isaac Stephens', '079-899-6795', 'taciti@volutpatornarefacilisis.com', 'Kieran Schultz', 'Tara Sanchez', 'Tara Sanchez', '3887 Eu, Road', '0', '1', 'urna. Nunc quis arcu vel quam dignissim pharetra. Nam ac', 'Branden', 'Ima', '2029-01-14 00:00:00');
INSERT INTO `user` VALUES ('53', 'Caleb Whitehead', '047-730-6816', 'eu.arcu@Aenean.org', 'Brock Henry', 'Kasimir Tanner', 'Kasimir Tanner', 'Ap #304-6676 Fermentum Rd.', '1', '0', 'nonummy ut, molestie in, tempus eu, ligula. Aenean euismod mauris', 'Hector', 'Frances', '2018-01-14 00:00:00');
INSERT INTO `user` VALUES ('54', 'Armand Hartman', '019-899-9099', 'pede.Praesent@porttitorscelerisque.net', 'Harper Gibson', 'Peter Holman', 'Peter Holman', '217-310 Sem. St.', '1', '1', 'arcu. Aliquam ultrices iaculis odio. Nam interdum enim non nisi.', 'Chester', 'Uta', '2017-06-14 00:00:00');
INSERT INTO `user` VALUES ('55', 'Price Copeland', '059-985-7181', 'dolor.Nulla.semper@ullamcorper.org', 'Jacqueline Harper', 'Grant Woods', 'Grant Woods', '795-6959 Varius Rd.', '1', '0', 'Curabitur consequat, lectus sit amet luctus vulputate, nisi sem semper', 'Hyatt', 'Jorden', '2024-09-13 00:00:00');
INSERT INTO `user` VALUES ('56', 'Ciaran Padilla', '098-257-1139', 'pretium@aliquet.ca', 'Noel Horton', 'Graham Reilly', 'Graham Reilly', '984 Nam Street', '1', '1', 'scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed', 'Tyler', 'Lael', '2016-02-15 00:00:00');
INSERT INTO `user` VALUES ('57', 'Roth Guzman', '067-723-0176', 'posuere.at@purus.ca', 'Lucius Horn', 'Blaine Waller', 'Blaine Waller', '9965 Molestie Road', '1', '1', 'vel nisl. Quisque fringilla euismod enim. Etiam gravida molestie arcu.', 'Orson', 'Tasha', '2018-09-14 00:00:00');
INSERT INTO `user` VALUES ('58', 'Kevin Young', '020-592-6797', 'faucibus.id.libero@porttitor.com', 'Samuel Welch', 'Lesley Leach', 'Lesley Leach', '742 Facilisi. St.', '1', '1', 'non lorem vitae odio sagittis semper. Nam tempor diam dictum', 'Elmo', 'Madeline', '2020-05-15 00:00:00');
INSERT INTO `user` VALUES ('59', 'Hoyt Bass', '037-708-2748', 'odio@magnaaneque.org', 'Ina Bond', 'Rama Moses', 'Rama Moses', 'P.O. Box 112, 4873 Cras Avenue', '1', '1', 'Suspendisse dui. Fusce diam nunc, ullamcorper eu, euismod ac, fermentum', 'Stephen', 'Imogene', '2007-07-14 00:00:00');
INSERT INTO `user` VALUES ('60', 'Sylvester Edwards', '062-798-2438', 'Sed@semperauctor.org', 'Moana Taylor', 'Briar Poole', 'Briar Poole', 'P.O. Box 869, 4896 Sed, Rd.', '0', '0', 'risus. Nunc ac sem ut dolor dapibus gravida. Aliquam tincidunt,', 'Cade', 'Hermione', '2001-06-14 00:00:00');
INSERT INTO `user` VALUES ('61', 'Jakeem Fry', '052-414-1225', 'ut.nisi@tortorIntegeraliquam.com', 'Lucy Pittman', 'Maggy Bray', 'Maggy Bray', '4397 Et, Ave', '1', '1', 'suscipit nonummy. Fusce fermentum fermentum arcu. Vestibulum ante ipsum primis', 'Luke', 'Marny', '2001-05-14 00:00:00');
INSERT INTO `user` VALUES ('62', 'Travis Mcpherson', '095-798-3263', 'Nunc.lectus@imperdieterat.com', 'Constance Hunter', 'Abra Mercado', 'Abra Mercado', 'Ap #640-6495 Convallis Rd.', '0', '1', 'a, magna. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 'Jarrod', 'Daphne', '2010-09-14 00:00:00');
INSERT INTO `user` VALUES ('63', 'Sawyer Rivera', '080-483-1237', 'facilisi.Sed.neque@Loremipsum.ca', 'Scott Lawson', 'Zeus Rich', 'Zeus Rich', '7931 Erat, Rd.', '1', '1', 'elementum, lorem ut aliquam iaculis, lacus pede sagittis augue, eu', 'Roth', 'Dorothy', '2030-11-13 00:00:00');
INSERT INTO `user` VALUES ('64', 'Hammett Palmer', '074-964-5892', 'eu@euplacerateget.org', 'Alisa House', 'Debra Bird', 'Debra Bird', '616-2002 Nunc Street', '0', '1', 'risus. Nulla eget metus eu erat semper rutrum. Fusce dolor', 'Herman', 'Ria', '2015-05-14 00:00:00');
INSERT INTO `user` VALUES ('65', 'Lionel Reeves', '060-297-0206', 'tellus.id.nunc@necleoMorbi.net', 'Alden Blair', 'Audra Bird', 'Audra Bird', '480-5451 Mauris, Road', '0', '1', 'non, luctus sit amet, faucibus ut, nulla. Cras eu tellus', 'Peter', 'Lois', '2017-03-14 00:00:00');
INSERT INTO `user` VALUES ('66', 'Hiram Wilcox', '075-757-5686', 'Integer.urna@viverraDonectempus.co.uk', 'Bruce Bartlett', 'Jarrod Harris', 'Jarrod Harris', '960-5560 Tincidunt, Street', '1', '0', 'lobortis quis, pede. Suspendisse dui. Fusce diam nunc, ullamcorper eu,', 'Barclay', 'Kessie', '2026-10-13 00:00:00');
INSERT INTO `user` VALUES ('67', 'Colton Workman', '023-000-2876', 'cursus.et.eros@sollicitudin.co.uk', 'Hector Hendricks', 'Hunter Graham', 'Hunter Graham', 'Ap #530-8809 Nunc. Ave', '1', '1', 'convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula', 'Andrew', 'Mari', '2008-03-14 00:00:00');
INSERT INTO `user` VALUES ('68', 'Noah Medina', '098-414-3540', 'orci.adipiscing@parturientmontesnascetur.edu', 'Florence Small', 'Cairo Mosley', 'Cairo Mosley', 'Ap #126-2456 Ligula. Road', '0', '0', 'neque. Nullam ut nisi a odio semper cursus. Integer mollis.', 'Elijah', 'Tatiana', '2026-02-15 00:00:00');
INSERT INTO `user` VALUES ('69', 'Kibo Brock', '049-776-2198', 'nec.enim.Nunc@ipsumnon.co.uk', 'Armando Hawkins', 'Keane Sharpe', 'Keane Sharpe', 'P.O. Box 523, 7929 Consectetuer Ave', '0', '1', 'Nulla aliquet. Proin velit. Sed malesuada augue ut lacus. Nulla', 'Hiram', 'Chanda', '2007-12-14 00:00:00');
INSERT INTO `user` VALUES ('70', 'Jeremy Richardson', '038-995-2724', 'massa.rutrum.magna@nisia.org', 'Thomas Hawkins', 'Tamara Castro', 'Tamara Castro', '199-3005 Nunc Rd.', '0', '1', 'nisl sem, consequat nec, mollis vitae, posuere at, velit. Cras', 'Wallace', 'Lana', '2014-11-14 00:00:00');
INSERT INTO `user` VALUES ('71', 'Hasad Carr', '034-455-4317', 'non@Morbisit.com', 'Cleo Macias', 'Nora Nicholson', 'Nora Nicholson', 'Ap #745-6239 Donec Rd.', '0', '1', 'habitant morbi tristique senectus et netus et malesuada fames ac', 'Wylie', 'Deirdre', '2010-12-13 00:00:00');
INSERT INTO `user` VALUES ('72', 'Oleg Hicks', '069-386-9838', 'justo.eu@adipiscingMaurismolestie.net', 'Thaddeus Terrell', 'Otto Dorsey', 'Otto Dorsey', 'Ap #399-2043 Duis St.', '0', '1', 'elit, a feugiat tellus lorem eu metus. In lorem. Donec', 'Shad', 'Maite', '2001-02-15 00:00:00');
INSERT INTO `user` VALUES ('73', 'Myles Franklin', '016-682-4293', 'eu.ligula.Aenean@Crasvehiculaaliquet.edu', 'Cody Hendrix', 'Damian Herrera', 'Damian Herrera', '5703 A, St.', '0', '0', 'Nam consequat dolor vitae dolor. Donec fringilla. Donec feugiat metus', 'Elvis', 'Serina', '2015-11-14 00:00:00');
INSERT INTO `user` VALUES ('74', 'Preston Rutledge', '025-717-2776', 'libero.et.tristique@ac.ca', 'Teegan Bird', 'Briar Wong', 'Briar Wong', 'Ap #226-6882 Massa Street', '1', '0', 'blandit. Nam nulla magna, malesuada vel, convallis in, cursus et,', 'Emmanuel', 'Celeste', '2004-01-14 00:00:00');
INSERT INTO `user` VALUES ('75', 'Kaseem Le', '086-157-1170', 'vel@nonleo.com', 'Jermaine Stokes', 'Uta Crosby', 'Uta Crosby', '958-7995 In Avenue', '0', '1', 'Mauris magna. Duis dignissim tempor arcu. Vestibulum ut eros non', 'Addison', 'Brittany', '2022-12-14 00:00:00');
INSERT INTO `user` VALUES ('76', 'Bruce Hardin', '023-960-3803', 'mauris@loremvitae.com', 'Robin Terrell', 'Amos Wilder', 'Amos Wilder', 'P.O. Box 214, 9978 Nulla. St.', '0', '1', 'porta elit, a feugiat tellus lorem eu metus. In lorem.', 'Thor', 'Shellie', '2024-03-15 00:00:00');
INSERT INTO `user` VALUES ('77', 'Len Pickett', '071-745-3131', 'blandit.at@ullamcorpereu.net', 'Ezra Collins', 'Lionel Dodson', 'Lionel Dodson', 'Ap #313-999 Donec Rd.', '1', '0', 'risus. Duis a mi fringilla mi lacinia mattis. Integer eu', 'Austin', 'Nyssa', '2021-04-14 00:00:00');
INSERT INTO `user` VALUES ('78', 'Wallace Cleveland', '004-854-0666', 'dignissim@vestibulumneceuismod.org', 'Jakeem Durham', 'Jada Kramer', 'Jada Kramer', 'Ap #104-1838 Sit Ave', '1', '0', 'Phasellus fermentum convallis ligula. Donec luctus aliquet odio. Etiam ligula', 'Robert', 'Phoebe', '2031-03-15 00:00:00');
INSERT INTO `user` VALUES ('79', 'Dieter Stevenson', '018-075-3609', 'Nunc@non.ca', 'Plato Conley', 'Timothy Watson', 'Timothy Watson', '4836 Dignissim St.', '0', '1', 'consectetuer rhoncus. Nullam velit dui, semper et, lacinia vitae, sodales', 'Vernon', 'Sloane', '2011-05-14 00:00:00');
INSERT INTO `user` VALUES ('80', 'Thaddeus Cruz', '024-657-4831', 'sed.est@fermentum.ca', 'Basia Saunders', 'Kamal Washington', 'Kamal Washington', '814 Eu, St.', '1', '1', 'a feugiat tellus lorem eu metus. In lorem. Donec elementum,', 'Kelly', 'Tatyana', '2009-02-15 00:00:00');
INSERT INTO `user` VALUES ('81', 'Kadeem Knowles', '021-777-2825', 'felis.Donec@dolor.ca', 'Alexis Valentine', 'Amir Davidson', 'Amir Davidson', 'Ap #407-9401 Id, Road', '1', '0', 'sem, vitae aliquam eros turpis non enim. Mauris quis turpis', 'Stone', 'Avye', '2026-09-13 00:00:00');
INSERT INTO `user` VALUES ('82', 'Jordan Gardner', '079-190-0701', 'lorem@ullamcorperDuiscursus.net', 'Florence Alston', 'Ashely Blackwell', 'Ashely Blackwell', 'P.O. Box 326, 1007 Iaculis Street', '1', '1', 'dapibus id, blandit at, nisi. Cum sociis natoque penatibus et', 'Ezekiel', 'Linda', '2028-02-14 00:00:00');
INSERT INTO `user` VALUES ('83', 'Berk George', '098-436-4004', 'Vestibulum.ante.ipsum@augueut.co.uk', 'Silas Noel', 'Iris Holden', 'Iris Holden', 'P.O. Box 361, 3767 Purus Av.', '1', '1', 'ultrices, mauris ipsum porta elit, a feugiat tellus lorem eu', 'Keegan', 'Orla', '2013-05-14 00:00:00');
INSERT INTO `user` VALUES ('84', 'Wing Schultz', '061-450-6886', 'vel.convallis@arcuVivamus.ca', 'Chaim Best', 'Theodore Burnett', 'Theodore Burnett', 'P.O. Box 946, 8063 Convallis Road', '0', '0', 'mauris. Morbi non sapien molestie orci tincidunt adipiscing. Mauris molestie', 'Colby', 'Demetria', '2015-08-14 00:00:00');
INSERT INTO `user` VALUES ('85', 'Porter Yates', '099-200-8144', 'dictum@Quisque.org', 'Iliana Chaney', 'Tanya Lane', 'Tanya Lane', 'Ap #225-8111 Nullam Street', '0', '1', 'et magnis dis parturient montes, nascetur ridiculus mus. Proin vel', 'Yardley', 'Sigourney', '2028-10-14 00:00:00');
INSERT INTO `user` VALUES ('86', 'Dominic Cherry', '088-884-7636', 'neque@mifringilla.ca', 'Nelle Patton', 'Flynn Tyson', 'Flynn Tyson', '157-4847 Donec St.', '1', '0', 'erat eget ipsum. Suspendisse sagittis. Nullam vitae diam. Proin dolor.', 'Kelly', 'Carolyn', '2004-08-13 00:00:00');
INSERT INTO `user` VALUES ('87', 'Jack Best', '054-649-1953', 'dapibus.id.blandit@ridiculusmusDonec.org', 'Mary Hoffman', 'Anne Simon', 'Anne Simon', 'Ap #673-5508 Metus. Street', '0', '1', 'vehicula aliquet libero. Integer in magna. Phasellus dolor elit, pellentesque', 'Phillip', 'Madaline', '2024-01-15 00:00:00');
INSERT INTO `user` VALUES ('88', 'Cameron Torres', '004-988-3818', 'torquent@egetodio.ca', 'Hillary Obrien', 'Keely Matthews', 'Keely Matthews', 'P.O. Box 537, 6205 Nunc Av.', '1', '1', 'ipsum ac mi eleifend egestas. Sed pharetra, felis eget varius', 'Rafael', 'Marah', '2015-09-14 00:00:00');
INSERT INTO `user` VALUES ('90', 'Bernard Reyes', '093-782-5551', 'molestie.sodales@Maurismolestie.co.uk', 'Jenna Gordon', 'Prescott Haynes', 'Prescott Haynes', 'P.O. Box 366, 3535 Nec Av.', '1', '0', 'nisi sem semper erat, in consectetuer ipsum nunc id enim.', 'Merritt', 'Michelle', '2016-08-13 00:00:00');
INSERT INTO `user` VALUES ('91', 'Hiram Clay', '087-579-1579', 'mauris@sitametrisus.net', 'Merritt Adams', 'Rebekah Burke', 'Rebekah Burke', '742-4849 Vulputate, Avenue', '1', '1', 'fringilla purus mauris a nunc. In at pede. Cras vulputate', 'Cameron', 'Lillith', '2027-10-14 00:00:00');
INSERT INTO `user` VALUES ('92', 'Griffith Schroeder', '037-157-4988', 'primis.in.faucibus@fringillaestMauris.co.uk', 'David Middleton', 'Meghan Whitley', 'Meghan Whitley', 'P.O. Box 703, 9739 Lorem, St.', '0', '0', 'varius et, euismod et, commodo at, libero. Morbi accumsan laoreet', 'Timon', 'Jaden', '2022-10-14 00:00:00');
INSERT INTO `user` VALUES ('93', 'Aladdin Peck', '012-090-1403', 'et@facilisis.com', 'Aretha Curtis', 'Hiram Riley', 'Hiram Riley', '3556 Vel Avenue', '0', '0', 'et ultrices posuere cubilia Curae; Donec tincidunt. Donec vitae erat', 'Cole', 'Maggy', '2008-09-14 00:00:00');
INSERT INTO `user` VALUES ('94', 'Adrian Stewart', '005-452-5321', 'ultrices.Duis@eu.net', 'Reed Melton', 'Elijah Mcleod', 'Elijah Mcleod', '4428 Facilisis, Rd.', '1', '0', 'dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc', 'Sawyer', 'Fiona', '2024-07-13 00:00:00');
INSERT INTO `user` VALUES ('95', 'Wade Mills', '052-408-1102', 'ac@Phasellusdolorelit.com', 'Remedios Moran', 'Idola Palmer', 'Idola Palmer', '582 Diam St.', '0', '0', 'enim, gravida sit amet, dapibus id, blandit at, nisi. Cum', 'Nolan', 'Janna', '2008-05-15 00:00:00');
INSERT INTO `user` VALUES ('96', 'Keane Palmer', '077-639-2351', 'Nunc@velitjusto.org', 'Colt James', 'Cassady Clements', 'Cassady Clements', '664-7729 Vel Rd.', '0', '0', 'convallis erat, eget tincidunt dui augue eu tellus. Phasellus elit', 'Hedley', 'Kirestin', '2002-03-15 00:00:00');
INSERT INTO `user` VALUES ('97', 'Barry Barber', '055-116-4611', 'cursus.luctus@malesuadaid.co.uk', 'Zahir Vargas', 'Nomlanga Brown', 'Nomlanga Brown', 'Ap #481-1101 Est, St.', '0', '0', 'orci. Donec nibh. Quisque nonummy ipsum non arcu. Vivamus sit', 'Eaton', 'Maia', '2003-03-15 00:00:00');
INSERT INTO `user` VALUES ('98', 'Kibo Dudley', '007-797-1885', 'nisl.Nulla@velturpisAliquam.com', 'Ignacia Hobbs', 'Todd Combs', 'Todd Combs', '2597 Erat, Street', '1', '0', 'elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec', 'Linus', 'Katelyn', '2029-03-14 00:00:00');
INSERT INTO `user` VALUES ('99', 'Silas Byers', '013-787-5309', 'Donec@auctorullamcorpernisl.net', 'Martha Obrien', 'Zachery Gonzales', 'Zachery Gonzales', '318-6464 Nascetur Rd.', '1', '0', 'condimentum. Donec at arcu. Vestibulum ante ipsum primis in faucibus', 'Hayden', 'Maris', '2019-09-13 00:00:00');
