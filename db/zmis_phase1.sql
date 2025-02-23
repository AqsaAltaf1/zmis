CREATE TABLE `zakat_fund_received` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `payment_received` VARCHAR(255) NOT NULL,
    `check_no` VARCHAR(255) NOT NULL,
    `check_date` DATE NOT NULL,
    `financial_year` VARCHAR(255) NOT NULL,
    `payment_rec_from` VARCHAR(255) NOT NULL,
    `account_head` VARCHAR(255) NOT NULL,
    `remarks` TEXT NULL,
    `received_date` DATE NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
