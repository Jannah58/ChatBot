-- MySQL initialization script for Laravel
-- This script ensures proper character set and collation

-- Create the database if it doesn't exist
CREATE DATABASE IF NOT EXISTS `laravel` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Grant all privileges to the Laravel user
GRANT ALL PRIVILEGES ON `laravel`.* TO 'laravel'@'%';

-- Flush privileges to ensure they take effect
FLUSH PRIVILEGES;