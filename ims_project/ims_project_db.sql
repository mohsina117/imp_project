-- Inventory Management System - Products Table Only
-- Clean SQL for GitHub Submission

CREATE DATABASE IF NOT EXISTS ims_project_db;
USE ims_project_db;

-- Table structure for table `products`
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` INT(11) NOT NULL AUTO_INCREMENT,
  `product_name` VARCHAR(100) NOT NULL,
  `quantity` INT(11) NOT NULL,
  `price` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Sample data for table `products`
INSERT INTO `products` (`product_id`, `product_name`, `quantity`, `price`) VALUES
(1, 'ballpen', 4, 20.00),
(2, 'pencils', 67, 1000.00),
(3, 'notebook', 12, 500.00),
(4, 'mugs', 13, 2890.00),
(5, 'jugs', 20, 60000.00);