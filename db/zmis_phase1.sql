CREATE TABLE `zakat_fund_received` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `payment_received` VARCHAR(255) NOT NULL,
    `total_expenditure` VARCHAR(255) NOT NULL,
    `check_no` VARCHAR(255) NOT NULL,
    `check_date` DATE NOT NULL,
    `financial_year` VARCHAR(255) NOT NULL,
    `payment_rec_from` VARCHAR(255) NOT NULL,
    `account_head` VARCHAR(255) NOT NULL,
    `remarks` TEXT NULL,
    `received_date` DATE NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE district_staff (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    user_type ENUM('admin', 'user') NOT NULL DEFAULT 'user',
    district_id INT NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (district_id) REFERENCES district_users(id) ON DELETE CASCADE
);