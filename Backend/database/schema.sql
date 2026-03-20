-- Create Datbase 
CREATE DATABASE IF NOT EXISTS `hotel_management_system`;
USE hotel_management;

/* -- USERS TABLE -- */
CREATE TABLE IF NOT EXISTS `users` (
    `user_id` INT AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(50) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `email` VARCHAR(100) NOT NULL UNIQUE,
    `role` ENUM('admin', 'staff', 'customer') DEFAULT 'customer',
    `remember_token` VARCHAR(255) NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

/* -- ROOMS TABLE -- */
CREATE TABLE IF NOT EXISTS `rooms` (
    `room_id` INT AUTO_INCREMENT PRIMARY KEY,
    `room_number` VARCHAR(10) NOT NULL UNIQUE,
    `type` ENUM('single', 'double', 'suite') NOT NULL,
    `price` DECIMAL(10, 2) NOT NULL,
    `status` ENUM('available', 'booked', 'maintenance') DEFAULT 'available',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

/* -- BOOKINGS TABLE -- */
CREATE TABLE IF NOT EXISTS `bookings` (
    `booking_id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `room_id` INT NOT NULL,
    `check_in_date` DATE NOT NULL,
    `check_out_date` DATE NOT NULL,
    `status` ENUM('confirmed', 'cancelled', 'completed') DEFAULT 'confirmed',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`) ON DELETE CASCADE,
    FOREIGN KEY (`room_id`) REFERENCES `rooms`(`room_id`) ON DELETE CASCADE
);

/* -- PAYMENTS TABLE -- */
CREATE TABLE IF NOT EXISTS `payments` (
    `payment_id` INT AUTO_INCREMENT PRIMARY KEY,
    `booking_id` INT NOT NULL,
    `amount` DECIMAL(10, 2) NOT NULL,
    `payment_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `payment_method` ENUM('credit_card', 'debit_card', 'cash', 'online') NOT NULL,
    FOREIGN KEY (`booking_id`) REFERENCES `bookings`(`booking_id`) ON DELETE CASCADE
);

/* -- REVIEWS TABLE -- */
CREATE TABLE IF NOT EXISTS `reviews` (
    `review_id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `room_id` INT NOT NULL,
    `rating` INT CHECK (rating >= 1 AND rating <= 5),
    `comment` TEXT,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`) ON DELETE CASCADE,
    FOREIGN KEY (`room_id`) REFERENCES `rooms`(`room_id`) ON DELETE CASCADE
);

/* -- SEED DATA -- */
INSERT INTO `users` (username, password, email, role) VALUES 
('admin', 'admin123', 'admin@example.com', 'admin');
INSERT INTO `rooms` (room_number, type, price) VALUES 
('101', 'single', 100.00),
('102', 'double', 150.00),
('201', 'suite', 300.00);
INSERT INTO `bookings` (user_id, room_id, check_in_date, check_out_date) VALUES 
(1, 1, '2024-07-01', '2024-07-05');
INSERT INTO `payments` (booking_id, amount, payment_method) VALUES 
(1, 400.00, 'credit_card');
INSERT INTO `reviews` (user_id, room_id, rating, comment) VALUES 
(1, 1, 5, 'Great stay! Very comfortable and clean.');
