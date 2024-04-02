-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 02, 2024 at 09:15 PM
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
-- Table structure for table `admin_login`
--

DROP TABLE IF EXISTS `admin_login`;
CREATE TABLE IF NOT EXISTS `admin_login` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `email`, `password`) VALUES
(1, 'admin@smarthome.com', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

DROP TABLE IF EXISTS `blog_posts`;
CREATE TABLE IF NOT EXISTS `blog_posts` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `content`, `created_at`) VALUES
(2, 'The Future of Smart Home Technology', ' <p>\r\n            As technology continues to evolve, so too does the landscape of smart home technology. \r\n            The future promises even greater connectivity, automation, and integration, transforming the way we live and interact with our homes.\r\n        </p>\r\n        <h2>Key Trends</h2>\r\n        <p>\r\n            <strong>Artificial Intelligence:</strong> AI-powered smart home systems will become more sophisticated, \r\n            learning from user behavior to anticipate needs and automate tasks seamlessly.\r\n        </p>\r\n        <p>\r\n            <strong>Integration and Interoperability:</strong> Smart home devices and platforms will become more interoperable, \r\n            allowing for seamless integration and communication between different devices and systems.\r\n        </p>\r\n        <p>\r\n            <strong>Energy Efficiency:</strong> The emphasis on sustainability and energy efficiency will drive the development of \r\n            smarter and more efficient home automation solutions, helping reduce energy consumption and carbon footprint.\r\n        </p>\r\n        <h2>Emerging Technologies</h2>\r\n        <p>\r\n            <strong>5G Connectivity:</strong> The rollout of 5G networks will enable faster and more reliable connectivity, \r\n            unlocking new possibilities for real-time communication and control of smart home devices.\r\n        </p>\r\n        <p>\r\n            <strong>Augmented Reality:</strong> AR technology will revolutionize the way we interact with smart home devices, \r\n            providing immersive experiences for setup, maintenance, and troubleshooting.\r\n        </p>\r\n        <h2>Conclusion</h2>\r\n        <p>\r\n            The future of smart home technology holds immense promise, with advancements in AI, connectivity, and sustainability \r\n            shaping the way we live and interact with our homes. Embracing these trends and technologies will empower homeowners \r\n            to create smarter, more efficient, and more comfortable living spaces.\r\n        </p>', '2024-03-07 15:57:35'),
(3, 'Top 5 Smart Home Devices for Beginners', '<p>\r\n            Getting started with smart home technology can be overwhelming, but it doesn\'t have to be. \r\n            Here are five beginner-friendly smart home devices to help you dip your toes into the world of home automation.\r\n        </p>\r\n        <ol>\r\n            <li><strong>Smart Bulbs:</strong> Philips Hue or LIFX smart bulbs allow you to control lighting levels, \r\n            set schedules, and create ambiance using your smartphone or voice commands.</li>\r\n            <li><strong>Smart Plugs:</strong> TP-Link or Wemo smart plugs turn any regular electrical outlet into a \r\n            smart outlet, allowing you to control connected devices remotely and set schedules for automation.</li>\r\n            <li><strong>Smart Thermostats:</strong> Nest Thermostat or ecobee smart thermostats help you optimize \r\n            heating and cooling, saving energy and money while keeping your home comfortable.</li>\r\n            <li><strong>Smart Speakers:</strong> Amazon Echo or Google Nest smart speakers serve as the central hub \r\n            for voice control and smart home automation, allowing you to play music, check the weather, and control \r\n            compatible devices with just your voice.</li>\r\n            <li><strong>Smart Cameras:</strong> Ring or Wyze smart cameras provide peace of mind by allowing you to \r\n            monitor your home\'s security remotely and receive alerts in case of suspicious activity or emergencies.</li>\r\n        </ol>\r\n        <p>\r\n            These five smart home devices are easy to set up, affordable, and offer immediate benefits in terms of \r\n            convenience, energy savings, and security, making them ideal choices for beginners venturing into home automation.\r\n        </p>', '2024-03-07 15:57:35'),
(4, 'The Importance of Home Security in the Digital Age', '<p>\r\n            With the increasing prevalence of smart home technology and the proliferation of connected devices, \r\n            ensuring the security of your home has never been more critical. In the digital age, home security \r\n            encompasses more than just physical measures—it also involves protecting your digital assets and \r\n            safeguarding against cyber threats.\r\n        </p>\r\n        <h2>Physical Security</h2>\r\n        <p>\r\n            Traditional security measures such as locks, alarms, and surveillance cameras remain essential for \r\n            deterring intruders and protecting your home against burglaries and break-ins. However, modern \r\n            advancements in smart home technology have revolutionized the way we approach home security.\r\n        </p>\r\n        <h2>Digital Security</h2>\r\n        <p>\r\n            In addition to physical security measures, it\'s crucial to safeguard your home\'s digital assets \r\n            and data against cyber threats. This includes securing your Wi-Fi network, using strong passwords, \r\n            and regularly updating software and firmware to patch vulnerabilities and protect against malware \r\n            and hacking attempts.\r\n        </p>\r\n        <h2>Integrated Solutions</h2>\r\n        <p>\r\n            The future of home security lies in integrated solutions that combine physical and digital \r\n            security measures to provide comprehensive protection for your home and family. Smart home \r\n            security systems offer features such as remote monitoring, smartphone alerts, and automation \r\n            capabilities, allowing you to stay connected and in control of your home\'s security from anywhere, \r\n            anytime.\r\n        </p>\r\n        <h2>Conclusion</h2>\r\n        <p>\r\n            As technology continues to advance, the importance of home security in the digital age cannot be \r\n            overstated. By implementing a combination of physical and digital security measures and embracing \r\n            smart home technology, you can create a safer and more secure living environment for you and your \r\n            loved ones.\r\n        </p>', '2024-03-07 15:58:37'),
(5, 'Top 5 Smart Home Security Devices for Enhanced Protection', ' <p>\r\n            When it comes to safeguarding your home and family, investing in smart home security devices can provide \r\n            peace of mind and enhanced protection against intruders and emergencies. Here are five must-have smart \r\n            home security devices to bolster your home\'s security posture:\r\n        </p>\r\n        <ol>\r\n            <li><strong>Smart Doorbell:</strong> A smart doorbell with built-in cameras and motion sensors allows \r\n            you to see and speak to visitors remotely, deter porch pirates, and monitor package deliveries in real time.</li>\r\n            <li><strong>Smart Lock:</strong> A smart lock replaces traditional door locks and offers features such as \r\n            keyless entry, remote locking/unlocking, and access control via smartphone apps.</li>\r\n            <li><strong>Security Cameras:</strong> Indoor and outdoor security cameras provide round-the-clock surveillance \r\n            and recording, allowing you to monitor your home\'s surroundings and receive alerts for suspicious activity.</li>\r\n            <li><strong>Smart Sensors:</strong> Motion detectors, door/window sensors, and glass break sensors detect \r\n            unauthorized entry and trigger alarms or notifications to alert you of potential security breaches.</li>\r\n            <li><strong>Smart Alarms:</strong> Smart alarm systems integrate with your home\'s security devices to provide \r\n            comprehensive protection against intrusions, fires, and environmental hazards, with customizable alerts and \r\n            monitoring options.</li>\r\n        </ol>\r\n        <p>\r\n            By incorporating these smart home security devices into your home\'s security infrastructure, you can \r\n            fortify your defenses and deter potential threats, ensuring the safety and security of your home and \r\n            loved ones.\r\n        </p>', '2024-03-07 15:58:37'),
(6, 'The Future of Home Automation: Advancements and Trends', ' <p>\r\n            As technology continues to evolve at a rapid pace, the future of home automation holds exciting \r\n            possibilities for enhancing convenience, comfort, and efficiency in our daily lives. From voice-activated \r\n            assistants to interconnected smart devices, here are some key advancements and trends shaping the future \r\n            of home automation:\r\n        </p>\r\n        <h2>Voice Control</h2>\r\n        <p>\r\n            Voice-activated assistants such as Amazon Alexa and Google Assistant have revolutionized the way we \r\n            interact with our homes. With natural language processing and artificial intelligence capabilities, \r\n            these devices can control smart home devices, answer questions, play music, and perform a wide range \r\n            of tasks using voice commands.\r\n        </p>\r\n        <h2>Interconnected Devices</h2>\r\n        <p>\r\n            The Internet of Things (IoT) has enabled seamless connectivity between various smart devices, allowing \r\n            them to communicate and collaborate to automate tasks and optimize energy usage. From smart thermostats \r\n            and lighting systems to security cameras and appliances, interconnected devices create a unified ecosystem \r\n            that enhances convenience and efficiency.\r\n        </p>\r\n        <h2>Artificial Intelligence</h2>\r\n        <p>\r\n            Artificial intelligence (AI) algorithms play a crucial role in home automation by analyzing data, \r\n            learning user preferences, and adapting device behavior to optimize performance and anticipate \r\n            user needs. AI-powered home automation systems can automate routine tasks, adjust settings based on \r\n            environmental conditions, and provide personalized recommendations for improved comfort and energy \r\n            efficiency.\r\n        </p>\r\n        <h2>Smart Energy Management</h2>\r\n        <p>\r\n            With the increasing focus on sustainability and energy efficiency, smart home automation solutions \r\n            offer advanced energy management capabilities to monitor and control energy usage, optimize heating \r\n            and cooling systems, and integrate renewable energy sources such as solar panels and smart grid \r\n            technologies for reduced environmental impact and lower utility bills.\r\n        </p>\r\n        <p>\r\n            By embracing these advancements and trends in home automation, homeowners can create intelligent, \r\n            interconnected living spaces that enhance convenience, comfort, and sustainability for a better \r\n            quality of life.\r\n        </p>', '2024-03-07 15:59:46'),
(7, 'How Home Automation Devices Enhance Daily Living', '<p>\r\n            Home automation devices offer a myriad of benefits that can significantly enhance daily living by \r\n            improving convenience, comfort, and efficiency. From simplifying routine tasks to optimizing energy \r\n            usage, here are some ways in which home automation devices can transform the way you live:\r\n        </p>\r\n        <h2>Convenient Control</h2>\r\n        <p>\r\n            With home automation devices, you can control various aspects of your home environment with \r\n            unprecedented convenience and flexibility. Whether it\'s adjusting the thermostat, turning on \r\n            lights, or locking doors, smart home systems allow you to manage your home\'s functions remotely \r\n            via smartphone apps or voice commands, saving you time and effort.\r\n        </p>\r\n        <h2>Enhanced Security</h2>\r\n        <p>\r\n            Home automation devices provide advanced security features that help protect your home and \r\n            loved ones from potential threats. From smart locks and security cameras to motion sensors \r\n            and alarm systems, these devices offer real-time monitoring, alerts, and remote access \r\n            capabilities that enhance home security and provide peace of mind, whether you\'re at home \r\n            or away.\r\n        </p>\r\n        <h2>Energy Efficiency</h2>\r\n        <p>\r\n            Smart home automation systems can help reduce energy consumption and lower utility bills \r\n            by optimizing energy usage and managing resources more efficiently. From programmable \r\n            thermostats and smart lighting controls to energy monitoring devices and automated \r\n            appliances, these solutions enable you to create energy-efficient living environments \r\n            that minimize waste and maximize savings.\r\n        </p>\r\n        <h2>Personalized Comfort</h2>\r\n        <p>\r\n            Home automation devices allow for personalized comfort settings that cater to your \r\n            preferences and lifestyle. Whether it\'s adjusting room temperatures, creating custom \r\n            lighting scenes, or scheduling automated routines, smart home systems adapt to your \r\n            needs and provide tailored experiences that enhance comfort and well-being for you \r\n            and your family.\r\n        </p>\r\n        <p>\r\n            By integrating home automation devices into your living space, you can enjoy a \r\n            more convenient, secure, and energy-efficient lifestyle that enhances your overall \r\n            quality of life and makes daily living more enjoyable and rewarding.\r\n        </p>', '2024-03-07 15:59:46');

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
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `user_id`, `quantity`) VALUES
(56, '15', '5', 1),
(55, '2', '5', 1),
(52, '5', '5', 3),
(37, '5', '2', 3),
(33, '8', '2', 2),
(39, '2', '2', 1),
(51, '4', '5', 1),
(57, '8', '5', 1),
(58, '9', '5', 1),
(59, '1', '5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `contact1` varchar(15) NOT NULL,
  `contact2` varchar(15) NOT NULL,
  `address` varchar(500) NOT NULL,
  `state` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `orderdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `orderid` varchar(50) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `orderid` (`orderid`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `fname`, `email`, `user_id`, `contact1`, `contact2`, `address`, `state`, `city`, `orderdate`, `orderid`, `status`) VALUES
(1, 'testingg', 'singh@gmail.com', '2', '0123456789', '', 'Village testingg', 'VAS', 'city', '2024-04-02 20:29:18', 'req-36127-65e89bd724862', 'confirmed'),
(2, 'testingg', 'singh@gmail.com', '2', '0123456789', '', 'Village testingg', 'VAS', 'city', '2024-03-26 17:45:28', 'req-76019-65e89c5935af3', 'pending'),
(3, 'Rohit', 'rohit@gmail.com', '2', '0123456874', '', '123 Main Street', 'Ontario', 'Toronto', '2024-03-06 16:54:58', 'req-34357-65e89fe2dd076', 'confirmed'),
(4, 'Harpreet Singh', 'harpreetsg@gmail.com', '2', '1234567410', '', '123 Main Street', 'Ontario', 'Toronto', '2024-03-26 17:53:37', 'req-73802-65e8a12fb27a0', 'complete'),
(5, 'Harpreet Singh', 'harpreet22@gmail.com', '2', '0124574854', '', '', '', '', '2024-03-06 11:32:53', 'req-72002-65e8a1bda22d6', 'confirmed'),
(14, 'testing', 'testing@gmail.com', '1', '0774414144', '', 'testingtestingtesting testing', 'testing', 'testing', '2024-04-02 13:04:00', 'req-90595-660c4f98e609a', 'confirmed'),
(7, 'testingg', 'ssss@gmail.com', '2', '03213232323', '', 'Village testingg', '', '', '2024-03-06 11:42:17', 'req-62555-65e8a3f187d41', 'confirmed'),
(8, 'testingg', 'ssss@gmail.com', '2', '043434383', '', '', '', '', '2024-03-26 17:49:36', 'req-97863-65e8a4ed64d8b', 'complete'),
(9, 'test', 'fdsfsd@ggg.com', '2', '3423432423', '', '', '', '', '2024-03-06 11:52:11', 'req-52592-65e8a643f3832', 'confirmed'),
(10, 'testingg', 'ghuman@gmail.com', '2', '012321322', '', 'Village testingg', '', '', '2024-03-06 11:59:13', 'req-83893-65e8a7e9342cb', 'confirmed'),
(11, 'sassa', 'ssaas@sss.com', '2', '2222222222', '', '', '', '', '2024-03-06 12:09:46', 'req-41222-65e8aa6239fb3', 'confirmed'),
(12, 'Rohit', 'rohit@smart.com', '2', '1234567841', '', '', '', '', '2024-03-26 17:51:53', 'req-58126-65e8c30b598fe', 'confirmed'),
(13, 'Singh', 'singh@smarthome.com', '5', '12345678911', '44445551261', '1690 Bergnaum Expressway,', 'PA 18140', 'New Carrollshir', '2024-04-02 20:32:44', 'req-48845-65e8c97cd1b94', 'confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(15) NOT NULL,
  `product_id` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `quantity` int NOT NULL,
  `orderid` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `user_id`, `product_id`, `quantity`, `orderid`) VALUES
(1, '2', '6', 3, 'req-36127-65e89bd724862'),
(2, '2', '2', 1, 'req-36127-65e89bd724862'),
(3, '2', '6', 3, 'req-76019-65e89c5935af3'),
(4, '2', '2', 1, 'req-76019-65e89c5935af3'),
(5, '2', '4', 1, 'req-34357-65e89fe2dd076'),
(6, '2', '3', 4, 'req-34357-65e89fe2dd076'),
(7, '2', '4', 5, 'req-73802-65e8a12fb27a0'),
(8, '2', '3', 6, 'req-73802-65e8a12fb27a0'),
(9, '2', '3', 1, 'req-72002-65e8a1bda22d6'),
(10, '2', '1', 1, 'req-72002-65e8a1bda22d6'),
(11, '2', '2', 1, 'req-72002-65e8a1bda22d6'),
(12, '2', '4', 1, 'req-72002-65e8a1bda22d6'),
(13, '2', '1', 1, 'req-61854-65e8a3d27a3b6'),
(14, '2', '3', 1, 'req-62555-65e8a3f187d41'),
(15, '2', '4', 1, 'req-97863-65e8a4ed64d8b'),
(16, '2', '3', 1, 'req-97863-65e8a4ed64d8b'),
(17, '2', '8', 1, 'req-52592-65e8a643f3832'),
(18, '2', '9', 1, 'req-52592-65e8a643f3832'),
(19, '2', '2', 1, 'req-83893-65e8a7e9342cb'),
(20, '2', '2', 1, 'req-41222-65e8aa6239fb3'),
(21, '2', '8', 2, 'req-58126-65e8c30b598fe'),
(22, '2', '15', 2, 'req-58126-65e8c30b598fe'),
(23, '5', '15', 2, 'req-48845-65e8c97cd1b94'),
(24, '1', '22', 3, 'req-90595-660c4f98e609a');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `category` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `keywords` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category`, `title`, `description`, `image`, `date`, `keywords`, `price`) VALUES
(1, 'Automation Device', 'Smart Thermostat Pro 2.0', '<ul class=\"list-group list-group-flush\">\r\n      <li class=\"list-group-item\">Intelligent Climate Control</li>\r\n      <li class=\"list-group-item\">Energy Efficiency</li>\r\n      <li class=\"list-group-item\">Remote Access</li>\r\n      <li class=\"list-group-item\">Compatibility</li>\r\n      <li class=\"list-group-item\">Smart Integrations</li>\r\n    </ul>\r\n\r\n<p class=\"lead my-5\">The Smart Thermostat Pro is an innovative home automation device that revolutionizes climate control. It offers advanced features and seamless integration, providing users with optimal comfort and energy efficiency.</p>', 'img/products/product-image.jpg', '2024-02-16 17:40:19', 'Smart Thermostat,home automation device,  2.0', 211),
(2, 'Alarm System', 'HomeGuard Security System', 'Support 99 Wireless, Wireless sensor and 10 Remote, \r\nSupport Universal Different Types of sensors. \r\n\r\nFeatures of Model ST-99PZ Security Alarm Systems 1. Support 99 Wireless and 2 Wired sensor and 10 Remote. 2. 6 Number Call and Sms. 3. Support Different Types of sensor . 4. Long Wireless Range up to 100 M. 5. Voice Recording. 6. Power full Gsm Antina. 7. Support Many Zone. 8. Password Protect. 9. Control By Mobile And Remote. 10.Zone Name Can Be Revised. 11.Loud Siren. 12. Gsm+ Pstn 13.Alarm Ringing Time Adjust. 14.Keypad Lock Function. 15.Siren On/off Function. 16.Doorbell option available. 17.Backup Battery If Power Failure. 18.Emergency , intelligent, Many Defense, Delay Defense, Repeat Triggered zone Available. 19. Particular Sensor Delete and Add. 20.Wireless system, Need No Wiring. 21.On site Monitoring Function. 22. Command Base System. 23. Easy To Install.', 'img/products/product-image2.jpg', '2024-02-18 17:45:29', 'Home Guard Alert, Wireless Smart Security', 1200),
(3, 'Automation Device', 'IntelliLight Smart Bulb', '<ul class=\"a-unordered-list a-vertical a-spacing-mini\">  <li class=\"a-spacing-mini\"><span class=\"a-list-item\"> RGB 16 Million colors - Now choose from a wide range of colors to suit your mood. Get relaxed with blue light after a long tiring day or turn it to red to enjoy the party evening or switch to yellow to enjoy dinner  </span></li>  <li class=\"a-spacing-mini\"><span class=\"a-list-item\"> Dim & Brighten - Adjust the brightness of your space ranging from 10% to 100% based on your need  </span></li>  <li class=\"a-spacing-mini\"><span class=\"a-list-item\"> Warm to cold light - Tune your light to any shade of White between Warm White (2700K) and Cool Day White (6500K) with Qubo App  </span></li>  <li class=\"a-spacing-mini\"><span class=\"a-list-item\"> 19 pre-set scenes for different moods - Select the scenes based on your mood. Scenes help to recreate the mood with automatic changing of colors. Maximum no. of moods in this segment of products  </span></li>  <li class=\"a-spacing-mini\"><span class=\"a-list-item\"> Scheduler & Timer - Use the app to create customized schedules to automate your daily activities. Like schedule to switch on the porch light to turn on at 6pm every morning and switch off at 6am  </span></li>  <li class=\"a-spacing-mini\"><span class=\"a-list-item\"> Energy efficient - The bulb can be put on a timer to turn off, reducing energy consumption  </span></li>  <li class=\"a-spacing-mini\"><span class=\"a-list-item\"> Voice Control compatibility - It works with Alexa and Google assistant devices. Simply make a voice command to control and adjust lighting without having to physically interact with the lights  </span></li>  </ul>', 'img/products/product-image3.jpg', '2024-02-18 17:45:35', 'Smart,Bulb', 30),
(4, 'Home Automation', '6 Module Touch WiFi Panel', 'Nixon i-Touch - WiFi 6 Switch + Fan Reg + 2 USB Port + International Soc ket ( With Glass Plate ) Supply Voltage 160-240V, 6A Relay Output, Operating Load ( CFL & LED) 100W Max per switch, Radio Frequency 433.92MHz, Variable Capacitance based 5 Step Fan Regulator, USB Output 5V 2.1A DC. Socket 10A International Socket\r\nCan also be operated by Touch, RF Remote Control, iWorld Mobile Application (Download from App Store or Play Store) or through Voice Command via Google Home or Amazon Alexa\r\nDesigned with SMPS for improved reliability over current and over voltage protection, Provided with in-built surge protection upto 1.5KV, Relay based technology with obstruction free WiFi and RF control\r\nEquipped with indicator LED to indicate status of the switches and for convenience in the dark. Facilitates easy scene setting, scheduling and timer setting using iWorld App & Remote\r\nSimple Retrofit Installation, no special wiring needed, Standalone product can be fitted in 6M Junction Box directly', 'img/products/product-image4.jpg', '2024-02-19 18:10:48', 'Home Automation,6Module', 699),
(5, 'Home Automation', 'Wi-Fi Smart Curtain', '<ul class=\"list-group list-group-flush\">\r\n  <li class=\"list-group-item\">Works for electrical blinds: the Wi-Fi curtain switch can work with smart curtains. Closing the curtain via phone or voice control at night and opening it at morning on your warm bed. Enhance your home with this modern, stylish alternative to traditional curtain switches.</li>\r\n  <li class=\"list-group-item\">Safe touch control switch: This touch curtain switch supports maximum power of 600w that can work with most WT curtain motors (4 wire). New design with scratch resistance glass panel, gives the best look to blend with any wall design.</li>\r\n  <li class=\"list-group-item\">App remote control: User can use a smartphone to remotely open/close curtain or electrical door at anytime and anywhere via app as long as the ios/android phone has 3G/4G/Wifi network, enjoy the convenience of intelligent life!</li>\r\n  <li class=\"list-group-item\">Timing schedules: support enable single/repeat/countdown timing schedules. You can also set the time to open / close the curtains and automatically open the curtains in the morning, let the sun awaken you.</li>\r\n  <li class=\"list-group-item\">One year warranty: for more information and user support visit - <a href=\"index.php\" target=\"_blank\">smarthome.com</a></li>\r\n</ul>\r\n', 'img/products/product-image5.jpg', '2024-02-19 18:40:12', 'wifi', 543),
(6, 'Automation Device', 'Home Automation with Raspberry Pi', '<ul>\r\n    <li>Design and build custom home automation devices</li>\r\n    <li>Interface a Google Home device to your Raspberry Pi</li>\r\n    <li>Connect Google Voice Assistant to RasPi</li>\r\n    <li>Incorporate GPIO control using the Amazon Echo</li>\r\n    <li>Navigate home automation operating systems</li>\r\n    <li>Use Z-Wave in your RasPi HA projects</li>\r\n    <li>Apply fuzzy logic techniques to your projects</li>\r\n    <li>Work with sensors and develop home security systems</li>\r\n    <li>Utilize two open-source AI applications, Mycroft and Picroft</li>\r\n    <li>Tie your projects together to create an integrated home automation system</li>\r\n</ul>\r\n', 'img/products/product-image6.jpg', '2024-02-20 18:40:12', '', 1000),
(8, 'Home Automation', 'Flo Smart Water Monitor ', '<ul>\r\n    <li>AUTOMATIC SHUTOFF: Learns your home’s water usage patterns to identify abnormalities like running water or small leaks and will automatically turn off water to prevent damage</li>\r\n    <li>REAL-TIME NOTIFICATIONS: The device monitors your home’s water, sending you app, phone call and email alerts for potential leaks whether you\'re at home or away</li>\r\n    <li>APP-BASED CONTROL: Proactively control your water from anywhere using the Smart Water App for added protection</li>\r\n    <li>OPTIMIZE: FloSense technology enhances the device’s security parameters and optimizes water savings by understanding the home’s water use and tailoring protection accordingly</li>\r\n    <li>INSTALLATION INFORMATION: Everything needed for installation is included in box, and professional installation is recommended</li>\r\n    <li>COMPATIBLE WITH: Moen water leak detectors for home are compatible with Amazon Alexa, Google Assistant, and Control4</li>\r\n    <li>SIZE: Model 900-001 fits 3/4-Inch to 1-1/4 Inch pipe diameter (consult a professional)</li>\r\n</ul>\r\n', 'img/products/product-image7.jpg', '2024-02-20 18:48:52', '', 900),
(9, 'Home Automation', 'Smart Wireless Air Conditioner Controller', '<ul>\r\n    <li>SMART AC CONTROL - Turn your existing air conditioner or your mini split / ductless / heat pump system into a smart AC, reducing your cooling bills by up to 40%! The smartphone app allows you to take any remote controlled AC unit and have it maintain a comfortable home temperature from anywhere. This lightweight unit is only 3.2” X 2.2” X 0.8”, is wall mounted and comes in eco friendly packaging.</li>\r\n    <li>EASY SETUP - Simply plug in your Sensibo Sky, connect to WiFi, launch the app, and enjoy a smarter, connected environment. Sensibo Sky connects with all remote controlled AC units in addition to smart home devices such as Google, Alexa, and Siri for use from your phone or desktop apps. Works with window AC, Mini Split/Ductless ACs or heat pumps and portable ACs. (Doesn\'t support Bluetooth)</li>\r\n    <li>SMART FEATURES - Geofencing activates your air conditioner, or any remote-controlled AC unit before you arrive and turns off when everyone leaves. Climate React scans both temperature and humidity, using a dual setpoint to maintain a comfortable ‘real feel’ temperature, never letting the room get uncomfortable. 7-day full week programming, conditional programming and voice control via Amazon Alexa, Google Assistant, Nest, Siri and others.</li>\r\n    <li>EASY TO USE - Sensibo Mobile (Android & iOS) and Web Apps for PC and Mac make it easy to control your home’s temperature from anywhere. Set unique temperature and humidity preferences for any room remotely or use the 7 days scheduler.</li>\r\n    <li>BUY WITH CONFIDENCE - Sensibo, the smart air conditioner or window ACs controller company is a leader in home comfort. We work hard to ensure that all you need to do is define your comfort zone and our customer support team is always available, making sure you and your home are comfortable all year round.</li>\r\n    <li>TIME Magazine’s TOP BEST INNOVATION for 2023 - Sensibo received special recognition for its pioneering role as the world’s first intelligent AC and Heat Pump controller with indoor air quality monitoring.</li>\r\n</ul>\r\n', 'img/products/product-image8.jpg', '2024-02-20 18:48:52', 'Smart Wireless, Air Conditioner Controller', 980),
(15, 'Office Desk', 'Power Strip Tower with 16 Outlets and 5 USB Ports', '  <ul>\r\n            <li><strong>16 AC Outlets:</strong> Afford 1875W/125V~3600W/240V power.</li>\r\n            <li><strong>3 USB-A Ports:</strong> Deliver 17W/3.4A power for multiple electronics.</li>\r\n            <li><strong>2 USB-C Ports:</strong> Provide additional charging options.</li>\r\n        </ul>\r\n        <p><strong>Ultra-Safe Charging Station:</strong> The built-in 1875 watts circuit breaker and 1500 joules surge protector safeguard your electronics from tripping or lightning.</p>\r\n        <p><strong>High-Quality Design:</strong> 16AWG heavy-duty power cable and top-grade UL94 V-0 heat retardant casing adopted to avoid heat and fire. A stylish blue light indicator sets on top.</p>\r\n        <p><strong>Neat and Tidy Space Saver:</strong> The all-in-one multifunctional charging tower takes up little vertical room to make your home or office neat and tidy.</p>\r\n ', 'img/products/product-image9.jpg', '2024-02-20 18:58:33', '', 200),
(22, 'Alarm System', 'Cellular Security Camera | Built-in Solar Panel ', '<div class=\"container\">\r\n    <div class=\"row\">\r\n        <div class=\"col-md-12\">\r\n            <h2>OUTDOOR SECURITY CAMERA (US Model)</h2>\r\n            <p>Ideal for country house, construction site, monitor anything, anywhere! These Mobile LTE surveillance cameras don’t require Wi-Fi or wired connections to transmit photos on smartphone LTE connectivity. See V200 coverage maps for details. Only photos are sent to the mobile app. Videos are recorded locally on SD card. No live view. Requires LTE connectivity, not compatible with Wi-Fi. Verify cellular reception at the installation site.</p>\r\n            <h4>BUILT-IN SOLAR PANEL</h4>\r\n            <p>Ideal for outdoor use, this IP65 Certified Weather-Resistant and Rugged Design surveillance camera uses 8 AA (not included) batteries and features a solar panel that powers the device outdoors. Internal battery must be charged 48 hours before use.</p>\r\n            <h4>SIM CARD INCLUDED</h4>\r\n            <p>Just set it up and let it get to work. No need to purchase a SIM card from a third-party service provider, all VOSKER cameras come with a preactivated SIM card for easy activation. Enjoy our FREE starter plan, including 100 alerts/mo. Paid plan starts at $10/mo. for 500 alerts, $15/mo. for 1000 alerts, or $20/mo. for unlimited alerts. Save 10% with annual billing. Free 30-day trial at activation.</p>\r\n            <h4>VOSKER SENSE AI IMAGE RECOGNITION</h4>\r\n            <p>Designed with a high-definition camera that captures photography in premium detail, you’ll be able to protect your area with the best A.I. recognition technology of its kind. Includes hybrid TIME-LAPSE + movement detection mode.</p>\r\n            <h4>TWO-YEAR LIMITED WARRANTY</h4>\r\n            <p>We’re proud of the quality of our surveillance camera, which is why it’s backed by a 2-year limited warranty required parts or manufacturer’s defects. Requires 8XAA Batteries or VOSKER Lithium Battery Pack to operate. Contact us with any questions or concerns for quick support.</p>\r\n        </div>\r\n    </div>\r\n</div>\r\n', 'img/products/Cellular Security Camera.jpg', '2024-04-02 18:30:46', '', 199);

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `password`) VALUES
(1, 'Harpreet', 'Singh', 'info@smarthome.com', '09878044183', '$2y$10$Kj62DbEGSRXBEAtl8t0ZTutcpg68VTl/SOxseT1I6T5y7N0osFYXS'),
(2, 'Rohit', 'Kumar', 'rohit@smarthome.com', '+14374999571', '$2y$10$5LdyrDEKL4467KTnYDsZzObt4iC0hgS/c55m3Ohimf8pa/KFdUTuu'),
(4, 'Testing', 'singh', 'test@smarthome.com', '+13456667', '$2y$10$uLh8HkLSRdK7q4n5MK5JQ.1TddyX1qh9O4MHAHPTUEXPCi4mVfojC'),
(5, 'singh', 'preet', 'singh@smarthome.com', '123456789', '$2y$10$t61Ovu64r46jJccGXOaZpu/H02aY4.Kvr3L8EC/mAGm32W0f04Bce');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
