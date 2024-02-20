-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 20, 2024 at 06:26 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smarthome`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `category` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `descripton` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `keywords` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=518 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category`, `title`, `descripton`, `image`, `date`, `keywords`, `price`) VALUES
(514, 'Automation Device', 'Smart Thermostat Pro', '<ul class=\"list-group list-group-flush\">\r\n      <li class=\"list-group-item\">Intelligent Climate Control</li>\r\n      <li class=\"list-group-item\">Energy Efficiency</li>\r\n      <li class=\"list-group-item\">Remote Access</li>\r\n      <li class=\"list-group-item\">Compatibility</li>\r\n      <li class=\"list-group-item\">Smart Integrations</li>\r\n    </ul>\r\n\r\n<p class=\"lead my-5\">The Smart Thermostat Pro is an innovative home automation device that revolutionizes climate control. It offers advanced features and seamless integration, providing users with optimal comfort and energy efficiency.</p>', 'product-image.jpg', '2024-02-16 17:40:19', 'Smart Thermostat,home automation device', 200),
(515, 'Alarm System', 'HomeGuard Security System', 'Support 99 Wireless, Wireless sensor and 10 Remote, \r\nSupport Universal Different Types of sensors. \r\n\r\nFeatures of Model ST-99PZ Security Alarm Systems 1. Support 99 Wireless and 2 Wired sensor and 10 Remote. 2. 6 Number Call and Sms. 3. Support Different Types of sensor . 4. Long Wireless Range up to 100 M. 5. Voice Recording. 6. Power full Gsm Antina. 7. Support Many Zone. 8. Password Protect. 9. Control By Mobile And Remote. 10.Zone Name Can Be Revised. 11.Loud Siren. 12. Gsm+ Pstn 13.Alarm Ringing Time Adjust. 14.Keypad Lock Function. 15.Siren On/off Function. 16.Doorbell option available. 17.Backup Battery If Power Failure. 18.Emergency , intelligent, Many Defense, Delay Defense, Repeat Triggered zone Available. 19. Particular Sensor Delete and Add. 20.Wireless system, Need No Wiring. 21.On site Monitoring Function. 22. Command Base System. 23. Easy To Install.', 'product-image2.jpg', '2024-02-18 17:45:29', 'Home Guard Alert, Wireless Smart Security', 599),
(516, 'Automation Device', 'IntelliLight Smart Bulb', '<ul class=\"a-unordered-list a-vertical a-spacing-mini\">  <li class=\"a-spacing-mini\"><span class=\"a-list-item\"> RGB 16 Million colors - Now choose from a wide range of colors to suit your mood. Get relaxed with blue light after a long tiring day or turn it to red to enjoy the party evening or switch to yellow to enjoy dinner  </span></li>  <li class=\"a-spacing-mini\"><span class=\"a-list-item\"> Dim &amp; Brighten - Adjust the brightness of your space ranging from 10% to 100% based on your need  </span></li>  <li class=\"a-spacing-mini\"><span class=\"a-list-item\"> Warm to cold light - Tune your light to any shade of White between Warm White (2700K) and Cool Day White (6500K) with Qubo App  </span></li>  <li class=\"a-spacing-mini\"><span class=\"a-list-item\"> 19 pre-set scenes for different moods - Select the scenes based on your mood. Scenes help to recreate the mood with automatic changing of colors. Maximum no. of moods in this segment of products  </span></li>  <li class=\"a-spacing-mini\"><span class=\"a-list-item\"> Scheduler &amp; Timer - Use the app to create customized schedules to automate your daily activities. Like schedule to switch on the porch light to turn on at 6pm every morning and switch off at 6am  </span></li>  <li class=\"a-spacing-mini\"><span class=\"a-list-item\"> Energy efficient - The bulb can be put on a timer to turn off, reducing energy consumption  </span></li>  <li class=\"a-spacing-mini\"><span class=\"a-list-item\"> Voice Control compatibility - It works with Alexa and Google assistant devices. Simply make a voice command to control and adjust lighting without having to physically interact with the lights  </span></li>  </ul>', 'product-image3.jpg', '2024-02-18 17:45:35', '', 30),
(517, 'Home Automation', '6 Module Touch WiFi Panel', 'Nixon i-Touch - WiFi 6 Switch + Fan Reg + 2 USB Port + International Soc ket ( With Glass Plate ) Supply Voltage 160-240V, 6A Relay Output, Operating Load ( CFL & LED) 100W Max per switch, Radio Frequency 433.92MHz, Variable Capacitance based 5 Step Fan Regulator, USB Output 5V 2.1A DC. Socket 10A International Socket\r\nCan also be operated by Touch, RF Remote Control, iWorld Mobile Application (Download from App Store or Play Store) or through Voice Command via Google Home or Amazon Alexa\r\nDesigned with SMPS for improved reliability over current and over voltage protection, Provided with in-built surge protection upto 1.5KV, Relay based technology with obstruction free WiFi and RF control\r\nEquipped with indicator LED to indicate status of the switches and for convenience in the dark. Facilitates easy scene setting, scheduling and timer setting using iWorld App & Remote\r\nSimple Retrofit Installation, no special wiring needed, Standalone product can be fitted in 6M Junction Box directly', 'product-image4.jpg', '2024-02-19 18:10:48', 'Home Automation,6Module', 699);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `phone_number` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address` text COLLATE utf8mb4_general_ci NOT NULL,
  `state` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `password`, `address`, `state`, `city`) VALUES
(1, 'Harpreet', 'Singh', 'info@smarthome.com', '09878044183', '$2y$10$Kj62DbEGSRXBEAtl8t0ZTutcpg68VTl/SOxseT1I6T5y7N0osFYXS', 'Unit 530, 910 7 Ave.', 'SW', 'Calgary'),
(2, 'Rohit', 'Kumar', 'rohit@smarthome.com', '+14374999571', '$2y$10$5LdyrDEKL4467KTnYDsZzObt4iC0hgS/c55m3Ohimf8pa/KFdUTuu', 'Unit 530, 910 7 Ave. SW, Calgary', 'SW', 'Calgary'),
(4, 'Testing', 'singh', 'test@smarthome.com', '+13456667', '$2y$10$uLh8HkLSRdK7q4n5MK5JQ.1TddyX1qh9O4MHAHPTUEXPCi4mVfojC', 'Tesing test', 'ca', 'testing cat');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
