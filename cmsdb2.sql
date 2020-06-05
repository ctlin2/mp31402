USE db4070e999;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL UNIQUE,
  `email` varchar(45) NOT NULL UNIQUE,
  `password` char(60) NOT NULL,
  `gender` char(7) NOT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `habits` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE categories (
 id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE products (
 id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(255) NOT NULL,
 category_id BIGINT UNSIGNED NOT NULL,
 model_year SMALLINT NOT NULL,
 list_price DECIMAL(10, 2) NOT NULL,
 picture VARCHAR(50) NULL,
 created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
 updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 FOREIGN KEY (category_id) 
        REFERENCES categories (id) 
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE staffs (
 id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR (45) NOT NULL,
 email VARCHAR (255) NOT NULL UNIQUE,
 phone VARCHAR (25),
 active tinyint NOT NULL,
 manager_id BIGINT UNSIGNED NULL,
 FOREIGN KEY (manager_id) 
        REFERENCES staffs (id) 
        ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE TABLE orders (
 order_id BIGINT AUTO_INCREMENT PRIMARY KEY,
 customer_id BIGINT UNSIGNED NOT NULL,
 order_status tinyint NOT NULL,
 -- Order status: 1 = Pending; 2 = Processing; 3 = Rejected; 4 = Completed
 order_date DATE NOT NULL,
 required_date DATE NOT NULL,
 shipped_date DATE NULL,
 staff_id BIGINT UNSIGNED NULL,
 FOREIGN KEY (customer_id) 
        REFERENCES users (id) 
        ON DELETE CASCADE ON UPDATE CASCADE,
 FOREIGN KEY (staff_id) 
        REFERENCES staffs (id) 
        ON DELETE NO ACTION ON UPDATE NO ACTION
);

INSERT INTO categories VALUES (1,'電腦'), (2,'手機'), (3,'週邊設備');

INSERT INTO products VALUES
(1, '7.9吋 ASUS Zenpad Z8s 平板電腦 (3G/16G)', 1, 2019, 3670, null, NOW(), NOW()),
(2, '美光 DDR4 2666 16GB 桌上型電腦記憶體', 3, 2018, 1999, null, NOW(), NOW()),
(3, 'OPPO AX5s 4G/64G 黑', 2, 2019, 4990, null, NOW(), NOW()),
(4, 'Nokia 7.2 智慧型手機 (翡翠綠)', 2, 2020, 8890, null, NOW(), NOW()),
(5, 'LPC-1669 micro HDMI TO VGA 免電源轉換線(10公分) D-TYPE', 3, 2018, 382, null, NOW(), NOW()),
(6, '華碩九代i9八核W10P迷你桌上型電腦', 1, 2020, 83900, null, NOW(), NOW()),
(7, 'WD 黑標 SN750 1TB NVMe PCIe SSD固態硬碟', 3, 2019, 5660, null, NOW(), NOW()),
(8, 'ASUS ROG Phone ZS600KL (8G/512G) 6吋八核電競手機', 2, 2019, 13990, null, NOW(), NOW());