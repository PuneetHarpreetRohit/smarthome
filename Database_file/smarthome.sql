-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 22, 2024 at 06:12 PM
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
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `user_id`, `quantity`) VALUES
(1, '1', '2', 1),
(2, '2', '2', 1),
(3, '3', '2', 1),
(4, '4', '2', 1),
(5, '6', '2', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category`, `title`, `descripton`, `image`, `date`, `keywords`, `price`) VALUES
(1, 'Automation Device', 'Smart Thermostat Pro', '<ul class=\"list-group list-group-flush\">\r\n      <li class=\"list-group-item\">Intelligent Climate Control</li>\r\n      <li class=\"list-group-item\">Energy Efficiency</li>\r\n      <li class=\"list-group-item\">Remote Access</li>\r\n      <li class=\"list-group-item\">Compatibility</li>\r\n      <li class=\"list-group-item\">Smart Integrations</li>\r\n    </ul>\r\n\r\n<p class=\"lead my-5\">The Smart Thermostat Pro is an innovative home automation device that revolutionizes climate control. It offers advanced features and seamless integration, providing users with optimal comfort and energy efficiency.</p>', 'product-image.jpg', '2024-02-16 17:40:19', 'Smart Thermostat,home automation device', 200),
(2, 'Alarm System', 'HomeGuard Security System', 'Support 99 Wireless, Wireless sensor and 10 Remote, \r\nSupport Universal Different Types of sensors. \r\n\r\nFeatures of Model ST-99PZ Security Alarm Systems 1. Support 99 Wireless and 2 Wired sensor and 10 Remote. 2. 6 Number Call and Sms. 3. Support Different Types of sensor . 4. Long Wireless Range up to 100 M. 5. Voice Recording. 6. Power full Gsm Antina. 7. Support Many Zone. 8. Password Protect. 9. Control By Mobile And Remote. 10.Zone Name Can Be Revised. 11.Loud Siren. 12. Gsm+ Pstn 13.Alarm Ringing Time Adjust. 14.Keypad Lock Function. 15.Siren On/off Function. 16.Doorbell option available. 17.Backup Battery If Power Failure. 18.Emergency , intelligent, Many Defense, Delay Defense, Repeat Triggered zone Available. 19. Particular Sensor Delete and Add. 20.Wireless system, Need No Wiring. 21.On site Monitoring Function. 22. Command Base System. 23. Easy To Install.', 'product-image2.jpg', '2024-02-18 17:45:29', 'Home Guard Alert, Wireless Smart Security', 599),
(3, 'Automation Device', 'IntelliLight Smart Bulb', '<ul class=\"a-unordered-list a-vertical a-spacing-mini\">  <li class=\"a-spacing-mini\"><span class=\"a-list-item\"> RGB 16 Million colors - Now choose from a wide range of colors to suit your mood. Get relaxed with blue light after a long tiring day or turn it to red to enjoy the party evening or switch to yellow to enjoy dinner  </span></li>  <li class=\"a-spacing-mini\"><span class=\"a-list-item\"> Dim &amp; Brighten - Adjust the brightness of your space ranging from 10% to 100% based on your need  </span></li>  <li class=\"a-spacing-mini\"><span class=\"a-list-item\"> Warm to cold light - Tune your light to any shade of White between Warm White (2700K) and Cool Day White (6500K) with Qubo App  </span></li>  <li class=\"a-spacing-mini\"><span class=\"a-list-item\"> 19 pre-set scenes for different moods - Select the scenes based on your mood. Scenes help to recreate the mood with automatic changing of colors. Maximum no. of moods in this segment of products  </span></li>  <li class=\"a-spacing-mini\"><span class=\"a-list-item\"> Scheduler &amp; Timer - Use the app to create customized schedules to automate your daily activities. Like schedule to switch on the porch light to turn on at 6pm every morning and switch off at 6am  </span></li>  <li class=\"a-spacing-mini\"><span class=\"a-list-item\"> Energy efficient - The bulb can be put on a timer to turn off, reducing energy consumption  </span></li>  <li class=\"a-spacing-mini\"><span class=\"a-list-item\"> Voice Control compatibility - It works with Alexa and Google assistant devices. Simply make a voice command to control and adjust lighting without having to physically interact with the lights  </span></li>  </ul>', 'product-image3.jpg', '2024-02-18 17:45:35', '', 30),
(4, 'Home Automation', '6 Module Touch WiFi Panel', 'Nixon i-Touch - WiFi 6 Switch + Fan Reg + 2 USB Port + International Soc ket ( With Glass Plate ) Supply Voltage 160-240V, 6A Relay Output, Operating Load ( CFL & LED) 100W Max per switch, Radio Frequency 433.92MHz, Variable Capacitance based 5 Step Fan Regulator, USB Output 5V 2.1A DC. Socket 10A International Socket\r\nCan also be operated by Touch, RF Remote Control, iWorld Mobile Application (Download from App Store or Play Store) or through Voice Command via Google Home or Amazon Alexa\r\nDesigned with SMPS for improved reliability over current and over voltage protection, Provided with in-built surge protection upto 1.5KV, Relay based technology with obstruction free WiFi and RF control\r\nEquipped with indicator LED to indicate status of the switches and for convenience in the dark. Facilitates easy scene setting, scheduling and timer setting using iWorld App & Remote\r\nSimple Retrofit Installation, no special wiring needed, Standalone product can be fitted in 6M Junction Box directly', 'product-image4.jpg', '2024-02-19 18:10:48', 'Home Automation,6Module', 699),
(5, 'Home Automation', 'Wi-Fi Smart Curtain', '<ul class=\"list-group list-group-flush\">\r\n  <li class=\"list-group-item\">Works for electrical blinds: the Wi-Fi curtain switch can work with smart curtains. Closing the curtain via phone or voice control at night and opening it at morning on your warm bed. Enhance your home with this modern, stylish alternative to traditional curtain switches.</li>\r\n  <li class=\"list-group-item\">Safe touch control switch: This touch curtain switch supports maximum power of 600w that can work with most WT curtain motors (4 wire). New design with scratch resistance glass panel, gives the best look to blend with any wall design.</li>\r\n  <li class=\"list-group-item\">App remote control: User can use a smartphone to remotely open/close curtain or electrical door at anytime and anywhere via app as long as the ios/android phone has 3G/4G/Wifi network, enjoy the convenience of intelligent life!</li>\r\n  <li class=\"list-group-item\">Timing schedules: support enable single/repeat/countdown timing schedules. You can also set the time to open / close the curtains and automatically open the curtains in the morning, let the sun awaken you.</li>\r\n  <li class=\"list-group-item\">One year warranty: for more information and user support visit - <a href=\"index.php\" target=\"_blank\">smarthome.com</a></li>\r\n</ul>\r\n', 'product-image5.jpg', '2024-02-19 18:40:12', '', 543),
(6, 'Automation Device', 'Home Automation with Raspberry Pi', '<ul>\r\n    <li>Design and build custom home automation devices</li>\r\n    <li>Interface a Google Home device to your Raspberry Pi</li>\r\n    <li>Connect Google Voice Assistant to RasPi</li>\r\n    <li>Incorporate GPIO control using the Amazon Echo</li>\r\n    <li>Navigate home automation operating systems</li>\r\n    <li>Use Z-Wave in your RasPi HA projects</li>\r\n    <li>Apply fuzzy logic techniques to your projects</li>\r\n    <li>Work with sensors and develop home security systems</li>\r\n    <li>Utilize two open-source AI applications, Mycroft and Picroft</li>\r\n    <li>Tie your projects together to create an integrated home automation system</li>\r\n</ul>\r\n', 'product-image6.jpg', '2024-02-20 18:40:12', '', 1000),
(8, 'Home Automation', 'Flo Smart Water Monitor ', '<ul>\r\n    <li>AUTOMATIC SHUTOFF: Learns your home’s water usage patterns to identify abnormalities like running water or small leaks and will automatically turn off water to prevent damage</li>\r\n    <li>REAL-TIME NOTIFICATIONS: The device monitors your home’s water, sending you app, phone call and email alerts for potential leaks whether you\'re at home or away</li>\r\n    <li>APP-BASED CONTROL: Proactively control your water from anywhere using the Smart Water App for added protection</li>\r\n    <li>OPTIMIZE: FloSense technology enhances the device’s security parameters and optimizes water savings by understanding the home’s water use and tailoring protection accordingly</li>\r\n    <li>INSTALLATION INFORMATION: Everything needed for installation is included in box, and professional installation is recommended</li>\r\n    <li>COMPATIBLE WITH: Moen water leak detectors for home are compatible with Amazon Alexa, Google Assistant, and Control4</li>\r\n    <li>SIZE: Model 900-001 fits 3/4-Inch to 1-1/4 Inch pipe diameter (consult a professional)</li>\r\n</ul>\r\n', 'product-image7.jpg', '2024-02-20 18:48:52', '', 900),
(9, 'Home Automation', 'Smart Wireless Air Conditioner Controller', '<ul>\r\n    <li>SMART AC CONTROL - Turn your existing air conditioner or your mini split / ductless / heat pump system into a smart AC, reducing your cooling bills by up to 40%! The smartphone app allows you to take any remote controlled AC unit and have it maintain a comfortable home temperature from anywhere. This lightweight unit is only 3.2” X 2.2” X 0.8”, is wall mounted and comes in eco friendly packaging.</li>\r\n    <li>EASY SETUP - Simply plug in your Sensibo Sky, connect to WiFi, launch the app, and enjoy a smarter, connected environment. Sensibo Sky connects with all remote controlled AC units in addition to smart home devices such as Google, Alexa, and Siri for use from your phone or desktop apps. Works with window AC, Mini Split/Ductless ACs or heat pumps and portable ACs. (Doesn\'t support Bluetooth)</li>\r\n    <li>SMART FEATURES - Geofencing activates your air conditioner, or any remote-controlled AC unit before you arrive and turns off when everyone leaves. Climate React scans both temperature and humidity, using a dual setpoint to maintain a comfortable ‘real feel’ temperature, never letting the room get uncomfortable. 7-day full week programming, conditional programming and voice control via Amazon Alexa, Google Assistant, Nest, Siri and others.</li>\r\n    <li>EASY TO USE - Sensibo Mobile (Android & iOS) and Web Apps for PC and Mac make it easy to control your home’s temperature from anywhere. Set unique temperature and humidity preferences for any room remotely or use the 7 days scheduler.</li>\r\n    <li>BUY WITH CONFIDENCE - Sensibo, the smart air conditioner or window ACs controller company is a leader in home comfort. We work hard to ensure that all you need to do is define your comfort zone and our customer support team is always available, making sure you and your home are comfortable all year round.</li>\r\n    <li>TIME Magazine’s TOP BEST INNOVATION for 2023 - Sensibo received special recognition for its pioneering role as the world’s first intelligent AC and Heat Pump controller with indoor air quality monitoring.</li>\r\n</ul>\r\n', 'product-image8.jpg', '2024-02-20 18:48:52', 'Smart Wireless, Air Conditioner Controller', 980),
(15, 'Office Desk', 'Power Strip Tower with 16 Outlets and 5 USB Ports', '  <ul>\r\n            <li><strong>16 AC Outlets:</strong> Afford 1875W/125V~3600W/240V power.</li>\r\n            <li><strong>3 USB-A Ports:</strong> Deliver 17W/3.4A power for multiple electronics.</li>\r\n            <li><strong>2 USB-C Ports:</strong> Provide additional charging options.</li>\r\n        </ul>\r\n        <p><strong>Ultra-Safe Charging Station:</strong> The built-in 1875 watts circuit breaker and 1500 joules surge protector safeguard your electronics from tripping or lightning.</p>\r\n        <p><strong>High-Quality Design:</strong> 16AWG heavy-duty power cable and top-grade UL94 V-0 heat retardant casing adopted to avoid heat and fire. A stylish blue light indicator sets on top.</p>\r\n        <p><strong>Neat and Tidy Space Saver:</strong> The all-in-one multifunctional charging tower takes up little vertical room to make your home or office neat and tidy.</p>\r\n ', 'product-image9.jpg', '2024-02-20 18:58:33', '', 200);

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
