-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2024 at 03:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `adds`
--

CREATE TABLE `adds` (
  `order_id` int(3) NOT NULL,
  `customer_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adds`
--

INSERT INTO `adds` (`order_id`, `customer_id`, `product_id`, `quantity`) VALUES
(0, 00037, 0, 0),
(108, 00056, 40025, 0),
(108, 00056, 40026, 0),
(147, 00056, 40013, 1),
(147, 00056, 40014, 1),
(147, 00056, 40015, 1),
(147, 00056, 40016, 1),
(147, 00056, 40017, 1),
(152, 00056, 40014, 1),
(152, 00056, 40015, 1),
(152, 00056, 40016, 1),
(152, 00056, 40047, 1),
(152, 00056, 40048, 1),
(166, 00056, 40014, 0),
(166, 00056, 40015, 0),
(166, 00056, 40016, 0),
(224, 00056, 40013, 0),
(264, 00056, 40013, 1),
(264, 00056, 40014, 1),
(264, 00056, 40015, 1),
(264, 00056, 40016, 1),
(264, 00056, 40017, 1),
(294, 00056, 40024, 0),
(333, 00056, 40014, 0),
(335, 00056, 40013, 0),
(335, 00056, 40014, 0),
(338, 00056, 40013, 1),
(338, 00056, 40014, 1),
(338, 00056, 40015, 1),
(535, 00056, 40014, 0),
(535, 00056, 40040, 0),
(535, 00056, 40041, 0),
(535, 00056, 40042, 0),
(535, 00056, 40062, 0),
(535, 00056, 40063, 0),
(535, 00056, 40132, 0),
(686, 00056, 40011, 0),
(686, 00056, 40012, 0),
(686, 00056, 40013, 1),
(686, 00056, 40014, 1),
(686, 00056, 40015, 1),
(686, 00056, 40016, 1),
(686, 00056, 40017, 1),
(686, 00056, 40018, 0),
(686, 00056, 40019, 0),
(686, 00056, 40040, 0),
(686, 00056, 40041, 0),
(686, 00056, 40042, 0),
(686, 00056, 40044, 0),
(686, 00056, 40045, 0),
(686, 00056, 40046, 0),
(686, 00056, 40047, 0),
(686, 00056, 40048, 0),
(731, 00056, 40014, 1),
(743, 00056, 40004, 0),
(777, 00056, 40014, 1),
(834, 00056, 40014, 1),
(834, 00056, 40015, 1),
(834, 00056, 40016, 1),
(834, 00056, 40017, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `Cname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `Cname`, `password`, `phone`, `email`, `address`) VALUES
(00006, 'Mahadi Hasan', '$2y$04$l61Kd/ZRhB4zaJz7Koe2a.MP3KDiZx1ZNvHhYV5RGbe/hH/xrYZ02', 184841231, 'mahadi.karim@gmail.com', 'hatirjheel'),
(00007, 'Hasan Ahmed', '$2y$04$a21OxNr4hFbu3/wKWtJH1uVXpRm5p9PZy/uKvNOFK6u2ysMLxnoHK', 123456789, 'hasan.ahmed@gmail.com', 'Mohammadpur, Dhaka'),
(00008, 'Nusrat Khan', '$2y$04$NDow5CA.3kvzfuyoq2psIOeslKbMWdyl48fq5oaQebfOZ8EzVUJHa', 987654321, 'nusrat.khan@gmail.com', 'Uttara, Dhaka'),
(00009, 'Farhana Akhtar', '$2y$04$a37q1/AP5KAlh0MBmtXZpeO2XR9lkAg0.McDezU2b6g.9WIOz.n8a', 456123789, 'farhana.akhtar@outlook.com', 'Dhanmondi, Dhaka'),
(00010, 'Kamrul Hasan', '$2y$04$NGwqBZssAQwU8DzvRO4K2.HFZ9y705ROgoNupm/OTxRSFB1NAf9Iy', 789654123, 'kamrul.hasan@outlook.com', 'Mirpur, Dhaka'),
(00011, 'Sadia Islam', '$2y$04$r5SPSX2Jod5OQ3997yHUQueoLxKta62eFJVM5WIBmbartQb7TzcuC', 321654987, 'sadia.islam@gmail.com', 'Gulshan, Dhaka'),
(00012, 'Fahim Rahman', '$2y$04$.LWlsordrD5zX5/HZb/3XenlrDJ/HOvmX.GKC4SjFY479X00FTWoW', 456789123, 'fahim.rahman@outlook.com', 'Banani, Dhaka'),
(00013, 'Rabia Ahmed', '$2y$04$fhTgvLHFvKYGtKG3CoFd5O46OFETIjFYj2LtwpFumTmpnFRWLZaKy', 987321654, 'rabia.ahmed@gmail.com', 'Mohakhali, Dhaka'),
(00014, 'Aminul Islam', '$2y$04$Pw7ya9UrRQ9EueOq/9rtIuclLftgShJrdR9AAymEgpcdUG1nDBRdG', 654789321, 'aminul.islam@outlook.com', 'Banani, Dhaka'),
(00015, 'Saima Khan', '$2y$04$a21OxNr4hFbu3/wKWtJH1uVXpRm5p9PZy/uKvNOFK6u2ysMLxnoHK', 321987654, 'saima.khan@gmail.com', 'Dhanmondi, Dhaka'),
(00016, 'Rezaul Karim', '$2y$04$r5SPSX2Jod5OQ3997yHUQueoLxKta62eFJVM5WIBmbartQb7TzcuC', 789123456, 'rezaul.karim@outlook.com', 'Uttara, Dhaka'),
(00017, 'Tasnim Akhtar', '$2y$04$.LWlsordrD5zX5/HZb/3XenlrDJ/HOvmX.GKC4SjFY479X00FTWoW', 987456321, 'tasnim.akhtar@gmail.com', 'Mohammadpur, Dhaka'),
(00018, 'Jannatul Ferdous', '$2y$04$fhTgvLHFvKYGtKG3CoFd5O46OFETIjFYj2LtwpFumTmpnFRWLZaKy', 654321987, 'jannatul.ferdous@outlook.com', 'Mirpur, Dhaka'),
(00019, 'Farid Ahmed', '$2y$04$a37q1/AP5KAlh0MBmtXZpeO2XR9lkAg0.McDezU2b6g.9WIOz.n8a', 123789456, 'farid.ahmed@gmail.com', 'Gulshan, Dhaka'),
(00020, 'Mahima Islam', '$2y$04$NDow5CA.3kvzfuyoq2psIOeslKbMWdyl48fq5oaQebfOZ8EzVUJHa', 321456987, 'mahima.islam@outlook.com', 'Uttara, Dhaka'),
(00021, 'Rashed Khan', '$2y$04$a21OxNr4hFbu3/wKWtJH1uVXpRm5p9PZy/uKvNOFK6u2ysMLxnoHK', 789456123, 'rashed.khan@gmail.com', 'Banani, Dhaka'),
(00022, 'Sabrina Akhtar', '$2y$04$.LWlsordrD5zX5/HZb/3XenlrDJ/HOvmX.GKC4SjFY479X00FTWoW', 654123789, 'sabrina.akhtar@outlook.com', 'Dhanmondi, Dhaka'),
(00023, 'Imtiaz Hasan', '$2y$04$NGwqBZssAQwU8DzvRO4K2.HFZ9y705ROgoNupm/OTxRSFB1NAf9Iy', 456987321, 'imtiaz.hasan@gmail.com', 'Mohammadpur, Dhaka'),
(00024, 'Sadaf Rahman', '$2y$04$Pw7ya9UrRQ9EueOq/9rtIuclLftgShJrdR9AAymEgpcdUG1nDBRdG', 789654123, 'sadaf.rahman@outlook.com', 'Mirpur, Dhaka'),
(00025, 'Munira Islam', '$2y$04$r5SPSX2Jod5OQ3997yHUQueoLxKta62eFJVM5WIBmbartQb7TzcuC', 123987456, 'munira.islam@gmail.com', 'Gulshan, Dhaka'),
(00026, 'Mohammad Ahmed', '$2y$04$a21OxNr4hFbu3/wKWtJH1uVXpRm5p9PZy/uKvNOFK6u2ysMLxnoHK', 456321789, 'mohammad.ahmed@gmail.com', 'Uttara, Dhaka'),
(00027, 'Tanvir Khan', '$2y$04$NDow5CA.3kvzfuyoq2psIOeslKbMWdyl48fq5oaQebfOZ8EzVUJHa', 789654321, 'tanvir.khan@outlook.com', 'Banani, Dhaka'),
(00028, 'Anika Akhtar', '$2y$04$a37q1/AP5KAlh0MBmtXZpeO2XR9lkAg0.McDezU2b6g.9WIOz.n8a', 123654789, 'anika.akhtar@gmail.com', 'Mohammadpur, Dhaka'),
(00029, 'Arif Hasan', '$2y$04$NGwqBZssAQwU8DzvRO4K2.HFZ9y705ROgoNupm/OTxRSFB1NAf9Iy', 987123654, 'arif.hasan@outlook.com', 'Dhanmondi, Dhaka'),
(00030, 'Sanjida Islam', '$2y$04$r5SPSX2Jod5OQ3997yHUQueoLxKta62eFJVM5WIBmbartQb7TzcuC', 321789456, 'sanjida.islam@gmail.com', 'Mirpur, Dhaka'),
(00031, 'Safa Rahman', '$2y$04$a21OxNr4hFbu3/wKWtJH1uVXpRm5p9PZy/uKvNOFK6u2ysMLxnoHK', 654987123, 'safa.rahman@outlook.com', 'Gulshan, Dhaka'),
(00032, 'Faisal Ahmed', '$2y$04$.LWlsordrD5zX5/HZb/3XenlrDJ/HOvmX.GKC4SjFY479X00FTWoW', 456123987, 'faisal.ahmed@gmail.com', 'Uttara, Dhaka'),
(00033, 'Sumaiya Khan', '$2y$04$fhTgvLHFvKYGtKG3CoFd5O46OFETIjFYj2LtwpFumTmpnFRWLZaKy', 789321654, 'sumaiya.khan@outlook.com', 'Banani, Dhaka'),
(00034, 'Arifa Akhtar', '$2y$04$Pw7ya9UrRQ9EueOq/9rtIuclLftgShJrdR9AAymEgpcdUG1nDBRdG', 987654321, 'arifa.akhtar@gmail.com', 'Mohammadpur, Dhaka'),
(00035, 'Imran Hasan', '$2y$04$a21OxNr4hFbu3/wKWtJH1uVXpRm5p9PZy/uKvNOFK6u2ysMLxnoHK', 123456987, 'imran.hasan@outlook.com', 'Dhanmondi, Dhaka'),
(00036, 'Parvez Islam', '$2y$04$NDow5CA.3kvzfuyoq2psIOeslKbMWdyl48fq5oaQebfOZ8EzVUJHa', 654321789, 'parvez.islam@gmail.com', 'Mirpur, Dhaka'),
(00038, 'Fahmida Akhtar', '$2y$04$r5SPSX2Jod5OQ3997yHUQueoLxKta62eFJVM5WIBmbartQb7TzcuC', 321789456, 'fahmida.akhtar@gmail.com', 'Uttara, Dhaka'),
(00039, 'Rasel Khan', '$2y$04$a21OxNr4hFbu3/wKWtJH1uVXpRm5p9PZy/uKvNOFK6u2ysMLxnoHK', 654987321, 'rasel.khan@outlook.com', 'Banani, Dhaka'),
(00040, 'Sufia Islam', '$2y$04$.LWlsordrD5zX5/HZb/3XenlrDJ/HOvmX.GKC4SjFY479X00FTWoW', 789456123, 'sufia.islam@gmail.com', 'Mohammadpur, Dhaka'),
(00041, 'Sarwar Ahmed', '$2y$04$a37q1/AP5KAlh0MBmtXZpeO2XR9lkAg0.McDezU2b6g.9WIOz.n8a', 456123789, 'sarwar.ahmed@outlook.com', 'Dhanmondi, Dhaka'),
(00042, 'Maruf Hasan', '$2y$04$NGwqBZssAQwU8DzvRO4K2.HFZ9y705ROgoNupm/OTxRSFB1NAf9Iy', 789321654, 'maruf.hasan@gmail.com', 'Mirpur, Dhaka'),
(00044, 'Naima Akhtar', '$2y$04$a21OxNr4hFbu3/wKWtJH1uVXpRm5p9PZy/uKvNOFK6u2ysMLxnoHK', 456789123, 'naima.akhtar@gmail.com', 'Uttara, Dhaka'),
(00046, 'Ahnaf Islam', '$2y$04$Pw7ya9UrRQ9EueOq/9rtIuclLftgShJrdR9AAymEgpcdUG1nDBRdG', 654321987, 'ahnaf.islam@gmail.com', 'Mohammadpur, Dhaka'),
(00047, 'Farhana Rahman', '$2y$04$a21OxNr4hFbu3/wKWtJH1uVXpRm5p9PZy/uKvNOFK6u2ysMLxnoHK', 321654987, 'farhana.rahman@outlook.com', 'Dhanmondi, Dhaka'),
(00048, 'Shafiq Ahmed', '$2y$04$.LWlsordrD5zX5/HZb/3XenlrDJ/HOvmX.GKC4SjFY479X00FTWoW', 654987321, 'shafiq.ahmed@gmail.com', 'Mirpur, Dhaka'),
(00049, 'Nazifa Khan', '$2y$04$NGwqBZssAQwU8DzvRO4K2.HFZ9y705ROgoNupm/OTxRSFB1NAf9Iy', 987321654, 'nazifa.khan@outlook.com', 'Gulshan, Dhaka'),
(00050, 'Saif Islam', '$2y$04$NDow5CA.3kvzfuyoq2psIOeslKbMWdyl48fq5oaQebfOZ8EzVUJHa', 321654987, 'saif.islam@gmail.com', 'Uttara, Dhaka'),
(00054, 'mahadi hasan', '$2y$04$vhEw3hGM8GCMT/rOEN2jseJsSlzXHvyMH5VzlvPl42h.XInekc0y6', 789632, 'qwe@gmail.com', 'circuit house road'),
(00055, 'nadifa', '$2y$04$8eQ0neyLAXV1RufUPj9YO.6800RYs9VCgUD4o2g0VyBucTAR0MNPu', 867431321, 'nad@gmail.com', 'sdqdqsqs'),
(00056, 'Naveed Mahmood', '$2y$04$l61Kd/ZRhB4zaJz7Koe2a.MP3KDiZx1ZNvHhYV5RGbe/hH/xrYZ02', 4545, '2@gmail.com', 'hatirjheel'),
(00058, 'lopota', '$2y$04$l61Kd/ZRhB4zaJz7Koe2a.MP3KDiZx1ZNvHhYV5RGbe/hH/xrYZ02', 456312, 'ss@gmail.com', 'hahattata'),
(00059, 'fahims', '$2y$04$l61Kd/ZRhB4zaJz7Koe2a.MP3KDiZx1ZNvHhYV5RGbe/hH/xrYZ02', 789789, 'aws@gmail.com', 'olelele'),
(00060, 'popo', '$2y$04$l61Kd/ZRhB4zaJz7Koe2a.MP3KDiZx1ZNvHhYV5RGbe/hH/xrYZ02', 4164313, 'ppo@gmail.com', 'sqdq'),
(00061, 'popi', '$2y$04$l61Kd/ZRhB4zaJz7Koe2a.MP3KDiZx1ZNvHhYV5RGbe/hH/xrYZ02', 4164313, 'ppso@gmail.com', 'sqdq'),
(00062, 'popias', '$2y$04$l61Kd/ZRhB4zaJz7Koe2a.MP3KDiZx1ZNvHhYV5RGbe/hH/xrYZ02', 4164313, 'ppsddo@gmail.com', 'sqdq'),
(00063, 'Abrar', '$2y$04$vhctnfE/tKThnBIrfDDVvOHYmaUPn9qBgz5xaTu3aZfNcB7ms0rU2', 4563987, 'sqr@gmail.com', 'hatrijheel'),
(00064, 'Naveed', '$2y$04$cKs5m6XGTPCPlFL0MW067ek4MBatZfw8FGa.M1/LUAgBeSeclyRK6', 8731431, 'nav@gmail.com', 'ramna');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `product_id` int(255) NOT NULL,
  `percentage` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`product_id`, `percentage`) VALUES
(40000, 23),
(40001, 21),
(40002, 31),
(40003, 28),
(40004, 25),
(40005, 30),
(40006, 26),
(40007, 29),
(40008, 28),
(40009, 24),
(40010, 26),
(40011, 26),
(40012, 6),
(40013, 25),
(40014, 26),
(40015, 24),
(40016, 21),
(40090, 23),
(40091, 23),
(40092, 22),
(40093, 27),
(40094, 24),
(40095, 2),
(40096, 22),
(40097, 24),
(40098, 28),
(40099, 0),
(40100, 26),
(40101, 26),
(40102, 11),
(40103, 21),
(40104, 0),
(40105, 29),
(40106, 0),
(40107, 20),
(40108, 24),
(40109, 21),
(40110, 23),
(40111, 4),
(40112, 23),
(40113, 0),
(40114, 25),
(40115, 13),
(40116, 27),
(40117, 29),
(40118, 25),
(40119, 0),
(40120, 25),
(40121, 23),
(40122, 20),
(40123, 30),
(40124, 1),
(40125, 13);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `Ename` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `Ename`, `password`, `phone`, `email`, `address`, `type`) VALUES
(000002, 'Nazia', '$2y$04$wyIjGL7FDn.qZu9A.NISP.6X8UdR3f5DJjzQ8V2kCNOOIpQc6paVS', 345678901, 'nazia.islam@gmail.com', '789 Oak St, Dhaka', 'manager'),
(000003, 'Aminul', '$2y$04$Thy2dPO9/Kd8fF.RILk4pOibNU90O7nbIxPaFnM.TnHB5fGQSfl/S', 456789012, 'aminul.khan@outlook.com', '567 Pine St, Dhaka', 'manager'),
(000004, 'Farid', '$2y$04$TlMnVSIq6T5STY.QJvkzT.waU01fYeZvwCuN9gKwbcFKYV1ZwOZFS', 567890123, 'farid.ahmed@gmail.com', '890 Cedar St, Dhaka', 'delivery man'),
(000005, 'Syed Naveed Mahmood', '$2y$04$vhctnfE/tKThnBIrfDDVvOHYmaUPn9qBgz5xaTu3aZfNcB7ms0rU2', 678901234, 'sabina.chowdhury@outlook.com', 'hatirjheel', 'manager'),
(000006, 'Tanvir', '$2y$04$Q9K/iy9dcNH24bl/YkMrauJewakugI7kCLwX.ixUPg8IulJBOOA52', 789012345, 'tanvir.islam@gmail.com', '123 Birch St, Dhaka', 'delivery man'),
(000007, 'Nusrat', '$2y$04$7zOtzshZ8lOJcDDaey5/6eHXAKIdf7E2L2.oZf87jk.uDon8rYxmm', 890123456, 'nusrat.khan@outlook.com', '456 Elm St, Dhaka', 'manager'),
(000009, 'Sumaiya', '$2y$04$/cMwM9iOWvaHCeS7Hii3t.OQvjBHYVxVE7G3WvxoDciFtDD7z1TWe', 123456789, 'sumaiya.akhtar@outlook.com', '567 Pine St, Dhaka', 'manager'),
(000018, 'Naveed Mahmood', '$2y$04$l61Kd/ZRhB4zaJz7Koe2a.MP3KDiZx1ZNvHhYV5RGbe/hH/xrYZ02', 11115555, 'nav@gmail.com', 'hatirjheel', 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `total_price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `total_price`) VALUES
(108, 5998),
(147, 18995),
(152, 16995),
(166, 7958),
(224, 3689),
(264, 18995),
(294, 7999),
(333, 4069),
(335, 7978),
(338, 11997),
(535, 20964),
(686, 63583),
(731, 5499),
(743, 5249),
(777, 5499),
(834, 14496);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(255) NOT NULL,
  `Pname` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text NOT NULL,
  `warehouse_id` int(2) UNSIGNED ZEROFILL NOT NULL,
  `stock` int(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `Pname`, `price`, `category`, `rating`, `review`, `warehouse_id`, `stock`, `image`) VALUES
(40000, 'Smartwatch', 9999, 'Electronics', 5, 'The Smartwatch is a cutting-edge wearable device that combines style with functionality. It features a vibrant touchscreen display, fitness tracking, heart rate monitoring, and smartphone notifications. Stay connected and organized on the go with this sleek accessory.', 01, 54, 'https://thumbs4.imagebam.com/3c/86/4e/MESSRY1_t.jpeg'),
(40001, 'Wireless Earbuds', 7999, 'Electronics', 3, 'Experience unparalleled freedom and convenience with our Wireless Earbuds. These compact earbuds deliver crystal-clear sound quality and feature noise-cancelling technology for immersive audio. With a long-lasting battery life and ergonomic design, they are perfect for workouts, commuting, and daily use.', 02, 54, 'https://thumbs4.imagebam.com/33/8d/56/MESSRY5_t.jpeg'),
(40002, 'Portable Charger', 2999, 'Electronics', 4, 'Never run out of battery power again with our Portable Charger. This compact and lightweight charger provides fast and efficient charging for your devices on the move. With multiple charging ports and a high-capacity battery, it\'s an essential accessory for travelers and busy professionals.', 03, 0, 'https://thumbs4.imagebam.com/f6/1b/33/MESSRXX_t.jpeg'),
(40003, 'Bluetooth Speaker', 3999, 'Electronics', 4, 'Elevate your audio experience with our Bluetooth Speaker. Featuring high-fidelity sound and a sleek design, this speaker pairs effortlessly with your smartphone, tablet, or laptop for wireless music streaming. With built-in controls and a long-lasting battery, it\'s perfect for parties, outdoor gatherings, and everyday use.', 04, 55, 'https://thumbs4.imagebam.com/81/fa/3e/MESSRXW_t.jpeg'),
(40004, 'Gaming Mouse', 6999, 'Electronics', 4, 'Dominate the competition with our Gaming Mouse. Engineered for precision and performance, this mouse offers customizable DPI settings, programmable buttons, and ergonomic design for extended gaming sessions. Whether you\'re a casual gamer or a pro, this mouse will enhance your gameplay and give you the edge you need to win.', 05, 100, 'https://thumbs4.imagebam.com/9e/84/0a/MESSRXS_t.jpeg'),
(40005, 'Laptop Backpack', 3499, 'Electronics', 4, 'Protect and organize your tech gear with our Laptop Backpack. This durable backpack features padded compartments for laptops and tablets, along with multiple pockets for accessories and essentials. With a comfortable carrying design and water-resistant material, it\'s the ideal choice for students, professionals, and travelers.', 06, 0, 'https://thumbs4.imagebam.com/ef/3e/67/MESSRXU_t.jpeg'),
(40006, 'USB Flash Drive', 1499, 'Electronics', 3, 'Store, share, and transfer files with ease using our USB Flash Drive. This compact and portable drive offers high-speed data transfer rates and ample storage capacity for documents, photos, videos, and more. With a durable metal casing and plug-and-play functionality, it\'s the perfect solution for your data storage needs.', 07, 0, 'https://thumbs4.imagebam.com/05/e2/58/MESSRY2_t.jpeg'),
(40007, 'Smartphone Case', 999, 'Electronics', 5, 'Keep your smartphone safe and stylish with our Smartphone Case. Made from high-quality materials, this case provides reliable protection against drops, scratches, and daily wear and tear. With precise cutouts for buttons and ports, it allows easy access to all functions without removing the case. Choose from a variety of colors and designs to suit your personal style.', 08, 53, 'https://thumbs4.imagebam.com/47/3f/51/MESSRY0_t.jpeg'),
(40008, 'HDMI Cable', 599, 'Electronics', 4, 'Connect your devices with our HDMI Cable. This high-speed cable delivers crisp and clear audio/video signals, supporting 4K resolution and high dynamic range (HDR) content. With gold-plated connectors and durable shielding, it ensures optimal signal transfer and long-lasting performance. Ideal for connecting TVs, monitors, projectors, and gaming consoles.', 09, 0, 'https://thumbs4.imagebam.com/f7/03/b0/MESSRXT_t.jpeg'),
(40009, 'Power Strip', 2499, 'Electronics', 5, 'Expand your power options with our Power Strip. Featuring multiple outlets and surge protection, this power strip allows you to plug in and charge multiple devices simultaneously. With a compact design and built-in circuit breaker, it offers peace of mind and convenience for home, office, and travel use.', 10, 70, 'https://thumbs4.imagebam.com/36/d6/a1/MESSRXZ_t.jpeg'),
(40010, 'Leather Wallet', 2499, 'Accessories', 5, 'Organize your essentials in style with our Leather Wallet. Crafted from premium genuine leather, this wallet features multiple card slots, a clear ID window, and a spacious bill compartment. With its timeless design and durable construction, it\'s a perfect blend of fashion and function for everyday use.', 11, 51, 'https://thumbs4.imagebam.com/81/9a/69/MESSSFY_t.jpeg'),
(40011, 'Sunglasses', 5999, 'Accessories', 5, 'Step out in style with our Sunglasses. Designed with UV protection lenses and fashionable frames, these sunglasses not only shield your eyes from harmful rays but also add a chic touch to any outfit. Perfect for sunny days, outdoor activities, and everyday wear.', 12, 0, 'https://thumbs4.imagebam.com/11/f7/7f/MESSSG4_t.png'),
(40012, 'Scarf', 3499, 'Accessories', 4, 'Stay warm and stylish with our Scarf. Made from soft and cozy materials, this scarf offers comfort and versatility. Whether you\'re dressing up for a night out or layering up for colder weather, it\'s a timeless accessory that complements any wardrobe.', 13, 0, 'https://thumbs4.imagebam.com/1a/38/74/MESSSG1_t.jpeg'),
(40013, 'Backpack', 4499, 'Accessories', 4, 'Carry your belongings with ease using our Backpack. Featuring a spacious main compartment, padded laptop sleeve, and multiple pockets, this backpack provides ample storage and organization for your essentials. With adjustable straps and durable construction, it\'s perfect for school, work, and travel.', 14, 0, 'https://thumbs4.imagebam.com/14/be/09/MESSSFM_t.jpeg'),
(40014, 'Watch', 5499, 'Accessories', 4, 'Keep track of time in style with our Watch. Available in a variety of designs and colors, these watches combine functionality with elegance. With precision quartz movement and durable materials, they are the perfect accessory for any occasion.', 15, 50, 'https://thumbs4.imagebam.com/62/55/fd/MESSSGD_t.jpeg'),
(40015, 'Belt', 1999, 'Accessories', 5, 'Complete your look with our Belt. Made from high-quality leather or fabric, these belts offer durability and style. With adjustable sizing and classic buckle designs, they are a versatile accessory that adds the perfect finishing touch to any outfit.', 16, 0, 'https://thumbs4.imagebam.com/b2/66/b0/MESSSFN_t.jpeg'),
(40016, 'Gloves', 2999, 'Accessories', 4, 'Protect your hands from the elements with our Gloves. Made from premium materials, these gloves offer warmth and comfort without compromising dexterity. Whether you\'re out for a walk or hitting the slopes, they provide the perfect combination of functionality and style.', 17, 0, 'https://thumbs4.imagebam.com/a0/2a/a0/MESSSFQ_t.jpeg'),
(40017, 'Headphones Case', 3999, 'Accessories', 5, 'Safeguard your headphones with our Headphones Case. Designed to protect against scratches, dust, and damage, this case features a durable exterior and soft interior lining. With a compact and portable design, it\'s an essential accessory for storing and transporting your headphones safely.', 18, 54, 'https://thumbs4.imagebam.com/b0/ab/7b/MESSSFV_t.jpeg'),
(40018, 'Keychain', 4999, 'Accessories', 4, 'Keep your keys organized with our Keychain. Made from durable materials and available in various designs, these keychains offer both functionality and style. With secure attachments and easy-to-use clasps, they are a practical accessory for everyday use.', 19, 0, 'https://thumbs4.imagebam.com/51/49/09/MESSSFX_t.jpeg'),
(40019, 'Umbrella', 1299, 'Accessories', 4, 'Stay dry on rainy days with our Umbrella. Featuring a sturdy construction and water-resistant canopy, this umbrella provides reliable protection from the elements. With a compact and lightweight design, it\'s easy to carry and store, making it a must-have accessory for unpredictable weather.', 20, 57, 'https://thumbs4.imagebam.com/f0/89/e0/MESSSG9_t.jpeg'),
(40020, 'Men\'s T-Shirt', 1999, 'Clothes', 5, 'Update your wardrobe with our Men\'s T-Shirt. Made from soft and breathable fabrics, these t-shirts offer comfort and style. With a variety of colors and designs to choose from, they are versatile basics that can be dressed up or down for any occasion.', 19, 55, 'https://thumbs4.imagebam.com/b5/3c/a6/MESSSHG_t.jpeg'),
(40021, 'Women\'s Dress', 3499, 'Clothes', 5, 'Embrace elegance with our Women\'s Dress. Crafted from high-quality fabrics and designed with attention to detail, these dresses offer style and comfort. Whether you\'re dressing up for a special occasion or a casual outing, they are the perfect choice for any fashion-forward woman.', 09, 0, 'https://thumbs4.imagebam.com/6f/35/b0/MESSSHT_t.jpeg'),
(40022, 'Kid\'s Jeans', 899, 'Clothes', 4, 'Dress your little ones in style with our Kid\'s Jeans. Made from durable denim and featuring adjustable waistbands, these jeans offer comfort and flexibility for active kids. With a range of sizes and designs, they are perfect for everyday wear and play.', 06, 60, 'https://thumbs4.imagebam.com/63/27/bc/MESSSHB_t.jpeg'),
(40023, 'Hoodie', 2999, 'Clothes', 5, 'Stay cozy and comfortable with our Hoodie. Made from soft and warm materials, this hoodie features a relaxed fit and a kangaroo pocket for added convenience. Whether you\'re lounging at home or running errands, it\'s a versatile layering piece for any wardrobe.', 01, 71, 'https://thumbs4.imagebam.com/10/a7/2b/MESSSH9_t.jpeg'),
(40024, 'Sneakers', 7999, 'Clothes', 4, 'Step out in style with our Sneakers. Designed for comfort and performance, these sneakers feature cushioned insoles, supportive midsoles, and durable outsoles for all-day wear. With a variety of colors and styles, they are the perfect footwear choice for active individuals.', 10, 41, 'https://thumbs4.imagebam.com/91/1b/65/MESSSHM_t.jpeg'),
(40025, 'Leggings', 4499, 'Clothes', 4, 'Elevate your workout or casual look with our Leggings. Made from stretchy and breathable fabrics, these leggings offer a comfortable fit and freedom of movement. Whether you\'re hitting the gym or running errands, they are a versatile addition to your wardrobe.', 04, 60, 'https://thumbs4.imagebam.com/79/1f/47/MESSSHC_t.jpeg'),
(40026, 'Polo Shirt', 1499, 'Clothes', 4, 'Update your casual look with our Polo Shirt. Made from soft and breathable fabrics, these shirts offer a classic fit and timeless style. With a variety of colors and patterns, they are a versatile option for both casual and semi-formal occasions.', 12, 0, 'https://thumbs4.imagebam.com/fe/01/f9/MESSSHH_t.jpeg'),
(40027, 'Skirt', 5999, 'Clothes', 5, 'Add a feminine touch to your wardrobe with our Skirt. Made from lightweight and flowy materials, these skirts offer comfort and style. Whether you\'re dressing up for a date night or a day at the office, they are a versatile piece that complements any outfit.', 06, 58, 'https://thumbs4.imagebam.com/03/b0/0d/MESSSHK_t.jpeg'),
(40028, 'Sweater', 2499, 'Clothes', 5, 'Stay warm and stylish with our Sweater. Made from cozy and soft materials, these sweaters offer comfort and warmth without compromising on style. With a range of colors and designs, they are perfect for layering during colder months or cool evenings.', 15, 0, 'https://thumbs4.imagebam.com/a3/45/06/MESSSHP_t.jpeg'),
(40029, 'Socks Set', 999, 'Clothes', 4, 'Keep your feet cozy and comfortable with our Socks Set. Made from soft and durable materials, these socks offer a snug fit and all-day comfort. With a variety of colors and patterns, they are a practical and stylish addition to your sock drawer.', 15, 53, 'https://thumbs4.imagebam.com/e2/df/32/MESSSHN_t.jpeg'),
(40030, 'Wireless Mouse', 2999, 'Electronics', 4, 'Enhance your computing experience with our Wireless Mouse. Featuring ergonomic design, precise tracking, and wireless connectivity, this mouse offers convenience and efficiency. With customizable buttons and long battery life, it\'s the perfect accessory for work or play.', 09, 0, 'https://thumbs4.imagebam.com/2b/22/67/MESSRY8_t.jpeg\" '),
(40031, 'Power Bank', 1499, 'Electronics', 5, 'Stay charged on the go with our Power Bank. Featuring a high-capacity battery and fast charging technology, this power bank ensures your devices stay powered up when you need them most. Compact and portable, it\'s the perfect travel companion for smartphones, tablets, and other USB-powered devices.', 20, 70, 'https://thumbs4.imagebam.com/7e/28/f4/MESSRXY_t.jpeg'),
(40032, 'USB-C Cable', 799, 'Electronics', 4, 'Connect and charge your devices with our USB-C Cable. Designed for high-speed data transfer and fast charging, this cable is compatible with a wide range of devices, including smartphones, laptops, and tablets. With durable construction and reliable performance, it\'s an essential accessory for your tech arsenal.', 14, 0, 'https://thumbs4.imagebam.com/f6/a2/4b/MESSRY4_t.jpeg'),
(40033, 'Wireless Keyboard', 1999, 'Electronics', 5, 'Enjoy wireless freedom with our Wireless Keyboard. Featuring a compact design and responsive keys, this keyboard offers a comfortable typing experience without the clutter of wires. With easy connectivity and long battery life, it\'s the perfect companion for your computer, tablet, or smartphone.', 07, 0, 'https://thumbs4.imagebam.com/8f/ed/5d/MESSRY7_t.jpeg'),
(40034, 'Action Camera', 4999, 'Electronics', 5, 'Capture your adventures in stunning detail with our Action Camera. Designed for durability and performance, this camera features high-resolution recording, waterproof housing, and multiple mounting options for versatile use. Whether you\'re hiking, biking, or snorkeling, it\'s the perfect camera for capturing life\'s thrilling moments.', 12, 0, 'https://thumbs4.imagebam.com/b3/4f/59/MESSRXP_t.jpeg'),
(40035, 'Fitness Tracker', 499, 'Electronics', 4, 'Track your fitness goals with our Fitness Tracker. Featuring activity tracking, heart rate monitoring, and sleep tracking, this wearable device helps you stay motivated and informed about your health and fitness progress. With a sleek design and long battery life, it\'s the perfect companion for an active lifestyle.', 01, 56, 'https://thumbs4.imagebam.com/98/13/89/MESSRXR_t.jpeg'),
(40036, 'USB Wall Charger', 399, 'Electronics', 4, 'Charge your devices quickly and efficiently with our USB Wall Charger. Featuring multiple ports and fast charging technology, this charger delivers rapid power to your smartphones, tablets, and other USB devices. Compact and portable, it\'s an essential accessory for home, office, and travel use.', 06, 51, 'https://thumbs4.imagebam.com/e3/51/10/MESSRY3_t.jpeg\" '),
(40037, 'Wireless Headset', 999, 'Electronics', 5, 'Experience crystal-clear audio with our Wireless Headset. Featuring noise-cancelling technology and long battery life, this headset offers immersive sound for calls, music, and multimedia. With comfortable ear cushions and easy-to-use controls, it\'s the perfect accessory for work, gaming, or leisure.', 09, 58, 'https://thumbs4.imagebam.com/b9/bf/8a/MESSRY6_t.jpeg'),
(40038, 'Portable Bluetooth Speaker', 2499, 'Electronics', 4, 'Enjoy your favorite music on the go with our Portable Bluetooth Speaker. Featuring high-quality sound, waterproof design, and long battery life, this speaker delivers impressive audio performance wherever you are. With easy connectivity and a compact size, it\'s the ideal companion for outdoor adventures, parties, and everyday use.', 06, 59, 'https://thumbs4.imagebam.com/e3/b5/0f/MESSS5K_t.jpeg'),
(40039, 'Laptop Stand', 799, 'Electronics', 4, 'Elevate your workspace with our Laptop Stand. Designed to improve ergonomics and airflow, this stand raises your laptop to a comfortable viewing angle, reducing neck and eye strain. With a sturdy construction and foldable design, it\'s a practical accessory for home, office, or travel use.', 03, 60, 'https://thumbs4.imagebam.com/26/22/1d/MESSRXV_t.jpeg'),
(40040, 'Wallet with RFID Blocking', 2799, 'Accessories', 5, 'Protect your personal information with our Wallet with RFID Blocking. Made from premium materials, this wallet features RFID-blocking technology to safeguard your credit cards and ID from unauthorized scanning. With multiple card slots and a slim design, it combines security and convenience in one stylish package.', 18, 73, 'https://thumbs4.imagebam.com/cb/56/3e/MESSSGA_t.jpeg'),
(40041, 'Watch Box', 3999, 'Accessories', 5, 'Organize and display your watch collection with our Watch Box. Featuring multiple compartments and a transparent lid, this box protects your watches from dust and scratches while showcasing them elegantly. With a sleek design and secure closure, it\'s the perfect storage solution for watch enthusiasts.', 18, 76, 'https://thumbs4.imagebam.com/a7/33/7b/MESSSGB_t.jpeg'),
(40042, 'Hair Accessories Set', 1999, 'Accessories', 4, 'Elevate your hairstyle with our Hair Accessories Set. This set includes a variety of stylish hair clips, bands, and pins, perfect for creating versatile looks for any occasion. With durable materials and chic designs, these accessories add the finishing touch to your hairstyle.', 16, 56, 'https://thumbs4.imagebam.com/85/e6/5c/MESSSFS_t.jpeg'),
(40043, 'Travel Adapter', 3499, 'Accessories', 5, 'Stay connected wherever you go with our Travel Adapter. Compatible with outlets worldwide, this adapter allows you to charge your devices in over 150 countries. Compact and portable, it\'s an essential travel accessory for international travelers and globetrotters.', 05, 50, 'https://thumbs4.imagebam.com/e1/4f/7c/MESSSG5_t.jpeg'),
(40044, 'Handbag', 5999, 'Accessories', 4, 'Carry your essentials in style with our Handbag. Made from high-quality materials and featuring spacious compartments, this handbag offers both fashion and function. With a versatile design and elegant details, it\'s the perfect accessory for everyday use or special occasions.', 16, 78, 'https://thumbs4.imagebam.com/9a/b9/aa/MESSSFT_t.jpeg'),
(40045, 'Ear Warmers', 4499, 'Accessories', 4, 'Keep your ears warm and cozy with our Ear Warmers. Made from soft and insulating materials, these ear warmers provide comfort and protection against chilly weather. With a lightweight and adjustable design, they are perfect for outdoor activities and winter adventures.', 07, 0, 'https://thumbs4.imagebam.com/6c/16/1d/MESSSFP_t.jpeg'),
(40046, 'Sunglasses Case', 2999, 'Accessories', 4, 'Protect your sunglasses in style with our Sunglasses Case. Featuring a durable exterior and soft interior lining, this case offers reliable protection against scratches, dust, and damage. With a compact design and secure closure, it\'s the perfect accessory for storing and transporting your sunglasses safely.', 04, 57, 'https://thumbs4.imagebam.com/6b/40/c2/MESSSG3_t.jpeg'),
(40047, 'Travel Pillow', 4999, 'Accessories', 5, 'Rest comfortably on your travels with our Travel Pillow. Designed to provide neck and head support, this pillow offers comfort and relaxation during long journeys. With a compact and portable design, it\'s easy to carry and store, making it a must-have accessory for travelers.', 19, 0, 'https://thumbs4.imagebam.com/4c/74/5c/MESSSG7_t.jpeg'),
(40048, 'Jewelry Box', 1499, 'Accessories', 3, 'Safely store and organize your jewelry with our Jewelry Box. Featuring multiple compartments and a soft velvet lining, this box protects your precious pieces from scratches and tangles. With a stylish design and secure closure, it\'s the perfect storage solution for rings, necklaces, earrings, and more.', 03, 0, 'https://thumbs4.imagebam.com/12/61/bb/MESSSFW_t.jpeg'),
(40049, 'Scarf Hanger', 999, 'Accessories', 5, 'Keep your scarves organized with our Scarf Hanger. Featuring multiple loops and a space-saving design, this hanger allows you to neatly hang and display your scarves for easy access. With a durable construction and slim profile, it\'s a practical and stylish accessory for your closet.', 19, 0, 'https://thumbs4.imagebam.com/53/fe/1e/MESSSG0_t.jpeg'),
(40050, 'Women\'s Blouse', 1499, 'Clothes', 4, 'Update your wardrobe with our Women\'s Blouse. Made from lightweight and breathable fabrics, this blouse offers comfort and style for any occasion. With a variety of colors and designs to choose from, it\'s a versatile piece that can be dressed up or down to suit your personal style.', 03, 60, 'https://thumbs4.imagebam.com/bf/1e/60/MESSSHR_t.jpeg'),
(40051, 'Men\'s Dress Shirt', 499, 'Clothes', 5, 'Look sharp and sophisticated with our Men\'s Dress Shirt. Made from high-quality cotton or polyester blends, these shirts offer a tailored fit and classic style. Whether you\'re dressing for a business meeting or a formal event, they are the perfect choice for a polished look.', 18, 57, 'https://thumbs4.imagebam.com/23/da/fe/MESSSHE_t.jpeg'),
(40052, 'Yoga Pants', 299, 'Clothes', 4, 'Find your zen in comfort with our Yoga Pants. Made from stretchy and breathable fabrics, these pants offer freedom of movement and comfort during yoga, pilates, or any workout. With a flattering fit and stylish designs, they are a versatile addition to your activewear collection.', 01, 55, 'https://thumbs4.imagebam.com/98/79/6b/MESSSHU_t.jpeg'),
(40053, 'Raincoat', 1999, 'Clothes', 5, 'Stay dry and stylish on rainy days with our Raincoat. Made from waterproof and breathable materials, this raincoat offers protection against the elements without sacrificing comfort. With a lightweight and packable design, it\'s the perfect outerwear for unpredictable weather.', 10, 56, 'https://thumbs4.imagebam.com/18/c0/10/MESSSHJ_t.jpeg'),
(40054, 'Winter Jacket', 999, 'Clothes', 5, 'Brave the cold in style with our Winter Jacket. Designed for warmth and insulation, this jacket features a cozy lining, adjustable hood, and durable outer shell to keep you comfortable in cold weather. With a variety of styles and colors, it\'s the perfect outer layer for winter adventures.', 08, 0, 'https://thumbs4.imagebam.com/e0/e4/e8/MESSSHQ_t.jpeg'),
(40056, 'Formal Trousers', 799, 'Clothes', 5, 'Elevate your formal look with our Formal Trousers. Made from premium fabrics and featuring a tailored fit, these trousers offer comfort and sophistication for any formal occasion. With classic colors and timeless designs, they are a versatile staple for your wardrobe.', 09, 57, 'https://thumbs4.imagebam.com/72/32/fc/MESSSH8_t.jpeg'),
(40057, 'Denim Jacket', 399, 'Clothes', 4, 'Add a timeless classic to your wardrobe with our Denim Jacket. Made from durable denim and featuring a versatile design, this jacket pairs effortlessly with any outfit. With adjustable cuffs and multiple pockets, it\'s a practical and stylish layer for any season.', 01, 0, 'https://thumbs4.imagebam.com/8b/88/c8/MESSSH6_t.jpeg'),
(40058, 'Lounge Shorts', 1999, 'Clothes', 4, 'Relax in style with our Lounge Shorts. Made from soft and comfortable fabrics, these shorts offer a relaxed fit and breathable comfort for lounging at home or running errands. With an elastic waistband and drawstring closure, they provide a customizable fit for ultimate comfort.', 17, 62, 'https://thumbs4.imagebam.com/55/4c/ff/MESSSHD_t.jpeg'),
(40060, 'Fountain Pen', 3499, 'Stationery', 5, 'Write in style with our Fountain Pen. Featuring a classic design and smooth writing nib, this pen offers an elegant writing experience. With a durable construction and refillable ink cartridges, it\'s a timeless accessory for professionals, writers, and pen enthusiasts alike.', 20, 0, 'https://thumbs4.imagebam.com/c9/c6/4a/MESSYG7_t.jpeg'),
(40061, 'Whiteboard Markers', 999, 'Stationery', 4, 'Organize your ideas and presentations with our Whiteboard Markers. Featuring vibrant colors and easy-to-erase ink, these markers are perfect for whiteboards, glass boards, and other non-porous surfaces. With a chisel tip for precision writing, they make your messages clear and visible.', 12, 54, 'https://thumbs4.imagebam.com/27/a5/ce/MESSSK4_t.png'),
(40062, 'Sticky Memo Pads', 5999, 'Stationery', 5, 'Stay organized and jot down reminders with our Sticky Memo Pads. Featuring adhesive backing and colorful designs, these memo pads are perfect for quick notes, lists, and reminders. With a variety of sizes and shapes, they are a practical and fun addition to your workspace.', 16, 51, 'https://thumbs4.imagebam.com/39/a7/e4/MESSSK1_t.jpeg'),
(40063, 'Calligraphy Set', 299, 'Stationery', 5, 'Explore the art of calligraphy with our Calligraphy Set. Featuring a variety of nibs, ink cartridges, and an instructional guide, this set provides everything you need to create beautiful calligraphic designs. Whether you\'re a beginner or an experienced calligrapher, it\'s a perfect set for honing your skills.', 03, 62, 'https://thumbs4.imagebam.com/4c/ad/58/MESSSJV_t.jpeg'),
(40064, 'Planner', 2499, 'Stationery', 4, 'Stay organized and on track with our Planner. Featuring monthly and weekly layouts, goal-setting pages, and space for notes, this planner helps you plan your days, weeks, and months effectively. With a durable cover and portable size, it\'s the perfect companion for staying organized on the go.', 08, 0, 'https://thumbs4.imagebam.com/a4/93/f6/MESSSJZ_t.jpeg'),
(40065, 'Drawing Sketchbook', 499, 'Stationery', 4, 'Unleash your creativity with our Drawing Sketchbook. Featuring high-quality paper and a durable cover, this sketchbook is perfect for drawing, sketching, and doodling. With blank pages that provide a blank canvas for your imagination, it\'s an essential tool for artists of all levels.', 12, 0, 'https://thumbs4.imagebam.com/b5/17/91/MESSSK0_t.jpg'),
(40066, 'Calculator', 799, 'Stationery', 5, 'Make calculations quick and easy with our Calculator. Featuring a large display, ergonomic design, and advanced functions, this calculator is perfect for home, office, or school use. With solar and battery power options, it\'s reliable and convenient for everyday calculations.', 15, 0, 'https://thumbs4.imagebam.com/d6/b3/3d/MESSSJU_t.png'),
(40067, 'Highlighter Set', 1999, 'Stationery', 5, 'Highlight important information with our Highlighter Set. Featuring bright and fluorescent colors, these highlighters make it easy to emphasize key points in notes, textbooks, and documents. With a chisel tip for both broad and fine lines, they offer versatile highlighting options for various tasks.', 18, 0, 'https://thumbs4.imagebam.com/5c/5a/63/MESSSJX_t.jpeg'),
(40068, 'Desk Organizer', 1499, 'Stationery', 5, 'Declutter your workspace with our Desk Organizer. Featuring multiple compartments and a stylish design, this organizer keeps your pens, pencils, paper clips, and other office supplies neatly organized and within reach. With a compact footprint, it maximizes space and enhances productivity.', 06, 52, 'https://thumbs4.imagebam.com/70/67/59/MESSSJW_t.jpg'),
(40069, 'Washi Tape Set', 1299, 'Stationery', 4, 'Add a decorative touch to your projects with our Washi Tape Set. Featuring a variety of colors and patterns, this tape is perfect for scrapbooking, journaling, gift wrapping, and more. With easy tear and repositionable adhesive, it\'s a versatile and fun crafting accessory.', 16, 59, 'https://thumbs4.imagebam.com/d7/86/92/MESSSK3_t.jpeg'),
(40070, 'Bathrobe', 1499, 'Self Care', 5, 'Relax in comfort with our Bathrobe. Made from plush and absorbent materials, this bathrobe offers luxurious warmth and softness after showers or baths. With a cozy hood, adjustable belt, and pockets, it\'s the perfect loungewear for lazy mornings and cozy evenings at home.', 02, 53, 'https://thumbs4.imagebam.com/30/40/e7/MESSSK8_t.jpeg'),
(40071, 'Facial Cleanser', 2999, 'Self Care', 4, 'Refresh and revitalize your skin with our Facial Cleanser. Formulated with gentle ingredients, this cleanser removes dirt, oil, and impurities without stripping your skin\'s natural moisture. With daily use, it helps maintain a clear and radiant complexion. Perfect for all skin types.', 20, 52, 'https://thumbs4.imagebam.com/67/d2/02/MESSSKA_t.jpg'),
(40072, 'Foot Massager', 4999, 'Self Care', 5, 'Relax and relieve tired feet with our Foot Massager. Featuring various massage modes and intensity levels, this massager targets pressure points to soothe aches and pains. With a compact design, it\'s perfect for use at home or office for instant relaxation.', 15, 0, 'https://thumbs4.imagebam.com/fe/a7/3b/MESSSKC_t.jpeg'),
(40073, 'Bath Sponge', 1999, 'Self Care', 4, 'Enhance your shower experience with our Bath Sponge. Made from soft and exfoliating materials, this sponge gently cleanses and exfoliates your skin, leaving it feeling refreshed and revitalized. With a convenient loop for hanging, it\'s a practical addition to your bath routine.', 14, 50, 'https://thumbs4.imagebam.com/03/c9/41/MESSSK7_t.jpeg'),
(40074, 'Aromatherapy Diffuser', 1299, 'Self Care', 5, 'Create a relaxing ambiance with our Aromatherapy Diffuser. Featuring a sleek design and soothing LED lights, this diffuser disperses your favorite essential oils to enhance your mood and promote relaxation. With adjustable mist settings, it\'s perfect for creating a calming atmosphere in any room.', 05, 55, 'https://thumbs4.imagebam.com/5c/0b/24/MESSSK6_t.jpeg'),
(40075, 'Hand Cream', 799, 'Self Care', 4, 'Keep your hands soft and moisturized with our Hand Cream. Enriched with nourishing ingredients, this cream hydrates and protects your skin from dryness and environmental stressors. With a lightweight and non-greasy formula, it absorbs quickly, leaving your hands feeling silky-smooth.', 02, 73, 'https://thumbs4.imagebam.com/92/3a/83/MESSSKE_t.jpeg'),
(40076, 'Lip Balm Set', 499, 'Self Care', 5, 'Hydrate and nourish your lips with our Lip Balm Set. Featuring a variety of flavors and formulations, these lip balms soothe dry and chapped lips, leaving them soft and moisturized. With portable and pocket-friendly packaging, they are perfect for on-the-go hydration.', 16, 54, 'https://thumbs4.imagebam.com/b8/80/9d/MESSSKF_t.jpeg'),
(40077, 'Hair Treatment Mask', 399, 'Self Care', 4, 'Revitalize your hair with our Hair Treatment Mask. Formulated with nourishing ingredients, this mask deeply conditions, repairs, and strengthens your hair, leaving it soft, shiny, and manageable. With regular use, it helps restore health and vitality to damaged hair.', 13, 56, 'https://thumbs4.imagebam.com/a7/8a/f4/MESSSKD_t.jpeg'),
(40078, 'Scented Candles Set', 899, 'Self Care', 5, 'Set the mood with our Scented Candles Set. Featuring a variety of calming and aromatic scents, these candles create a warm and inviting atmosphere in any room. With long-lasting burn times and clean-burning wax, they are perfect for relaxation, meditation, or adding ambiance to special occasions.', 15, 55, 'https://thumbs4.imagebam.com/32/5d/a6/MESSSKG_t.jpeg'),
(40079, 'Body Scrub', 599, 'Self Care', 5, 'Exfoliate and rejuvenate your skin with our Body Scrub. Formulated with natural exfoliants and nourishing oils, this scrub removes dead skin cells, leaving your skin feeling soft, smooth, and radiant. With aromatic scents, it offers a luxurious spa-like experience at home.', 14, 0, 'https://thumbs4.imagebam.com/f7/68/80/MESSSK9_t.jpeg'),
(40080, 'Digital Thermometer', 3999, 'Health Care', 5, 'Monitor your health with our Digital Thermometer. Featuring fast and accurate readings, this thermometer provides reliable temperature measurements for oral, rectal, or underarm use. With a clear display and easy-to-use design, it\'s an essential tool for monitoring fever and maintaining wellness.', 07, 55, 'https://thumbs4.imagebam.com/4b/89/ce/MESSSJL_t.jpeg'),
(40081, 'First Aid Kit', 1999, 'Health Care', 5, 'Be prepared for emergencies with our First Aid Kit. This comprehensive kit includes essential medical supplies and tools for treating minor injuries and emergencies at home, in the car, or while traveling. Compact and portable, it\'s a must-have for any household.', 12, 52, 'https://thumbs4.imagebam.com/2a/2f/48/MESSSJM_t.jpeg'),
(40082, 'Blood Pressure Monitor', 2499, 'Health Care', 5, 'Monitor your blood pressure with accuracy and ease using our Blood Pressure Monitor. Featuring a user-friendly design and reliable readings, this monitor helps you keep track of your cardiovascular health. With memory storage and adjustable cuffs, it\'s perfect for home monitoring.', 17, 0, 'https://thumbs4.imagebam.com/c3/33/45/MESSSJK_t.jpeg'),
(40083, 'Heating Pad', 14999, 'Health Care', 4, 'Relieve muscle aches and tension with our Heating Pad. Designed to provide targeted heat therapy, this pad soothes sore muscles and promotes relaxation. With adjustable temperature settings and a soft, washable cover, it offers customizable comfort for optimal relief.', 11, 0, 'https://thumbs4.imagebam.com/81/ef/4c/MESSSJO_t.jpeg'),
(40084, 'Hot Water Bottle', 6999, 'Health Care', 4, 'Stay warm and cozy with our Hot Water Bottle. Made from durable materials and featuring a secure stopper, this bottle holds hot water for soothing warmth on chilly days or relief from menstrual cramps. With a soft cover for added comfort, it\'s a comforting companion for relaxation and comfort.', 02, 53, 'https://thumbs4.imagebam.com/29/28/8b/MESSSJQ_t.jpeg'),
(40085, 'Pill Organizer', 2999, 'Health Care', 5, 'Organize and manage your medications with our Pill Organizer. Featuring multiple compartments and a portable design, this organizer helps you keep track of daily doses and medication schedules. With clear lids and easy-to-open compartments, it\'s perfect for daily use at home or on the go.', 18, 56, 'https://thumbs4.imagebam.com/0a/55/42/MESSSJR_t.jpeg'),
(40086, 'Hand Sanitizer', 1499, 'Health Care', 5, 'Keep your hands clean and germ-free with our Hand Sanitizer. Formulated with 70% alcohol and moisturizing ingredients, this sanitizer effectively kills germs without drying out your skin. With a convenient travel-size bottle, it\'s perfect for on-the-go hygiene.', 04, 55, 'https://thumbs4.imagebam.com/30/e0/48/MESSSJN_t.jpeg'),
(40087, 'Band-Aids', 2499, 'Health Care', 4, 'Treat minor cuts, scrapes, and wounds with our Band-Aids. Featuring adhesive bandages in various sizes and shapes, this pack provides protection and comfort for minor injuries. With durable and breathable materials, they adhere securely and allow skin to breathe for optimal healing.', 06, 67, 'https://thumbs4.imagebam.com/95/37/e0/MESSSJJ_t.jpeg'),
(40088, 'Vitamin C Supplements', 3499, 'Health Care', 5, 'Boost your immune system and overall health with our Vitamin C Supplements. Formulated with high-quality vitamin C, these supplements support immune function, collagen production, and antioxidant protection. With easy-to-take capsules, they are a convenient way to maintain your wellness routine.', 17, 0, 'https://thumbs4.imagebam.com/44/7d/2e/MESSSJT_t.jpeg'),
(40089, 'Sleep Mask', 1999, 'Health Care', 4, 'Enjoy restful sleep anytime, anywhere with our Sleep Mask. Made from soft and breathable materials, this mask blocks out light and distractions to promote deeper sleep. With an adjustable strap for a customized fit, it\'s perfect for travel, daytime napping, or creating a calming sleep environment.', 06, 0, 'https://thumbs4.imagebam.com/57/bb/6e/MESSSJS_t.jpeg'),
(40090, 'Kitchen Knife Set', 2999, 'Household', 5, 'Elevate your culinary skills with our Kitchen Knife Set. Featuring a variety of high-quality knives crafted from durable stainless steel, this set equips you with the essential tools for slicing, dicing, chopping, and more. With ergonomic handles and a stylish storage block, it\'s a versatile and stylish addition to any kitchen.', 18, 0, 'https://thumbs4.imagebam.com/03/55/f6/MESSSKK_t.jpeg'),
(40091, 'Laundry Basket', 4999, 'Household', 4, 'Organize your laundry with our Laundry Basket. Made from durable materials, this basket features a spacious design to hold your dirty clothes. With sturdy handles for easy carrying and a ventilated design to prevent odors, it\'s a practical addition to any laundry room.', 14, 55, 'https://thumbs4.imagebam.com/d9/b9/87/MESSSKL_t.jpeg'),
(40092, 'Dish Rack', 2499, 'Household', 5, 'Dry and organize your dishes with our Dish Rack. Featuring a compact design and multiple compartments, this rack accommodates plates, bowls, glasses, and utensils for efficient drying. With a sleek and modern look, it complements any kitchen decor.', 12, 50, 'https://thumbs4.imagebam.com/38/2b/72/MESSSKJ_t.jpeg'),
(40093, 'Vacuum Cleaner', 19999, 'Household', 5, 'Keep your home clean and dust-free with our Vacuum Cleaner. Featuring powerful suction and versatile attachments, this vacuum effectively removes dirt, debris, and pet hair from carpets, hardwood floors, and upholstery. With a lightweight design and easy maneuverability, it simplifies your cleaning routine.', 19, 0, 'https://thumbs4.imagebam.com/b8/67/49/MESSSKR_t.jpeg'),
(40094, 'Bedsheets Set', 1299, 'Household', 5, 'Upgrade your bedding with our Bedsheets Set. Made from soft and breathable fabrics, this set includes a flat sheet, fitted sheet, and pillowcases for a cozy and comfortable sleep experience. With a variety of sizes and colors, it complements any bedroom decor.', 01, 54, 'https://thumbs4.imagebam.com/6e/bf/f4/MESSSKH_t.jpeg'),
(40095, 'Trash Can', 1499, 'Household', 4, 'Dispose of waste easily with our Trash Can. Featuring a durable construction and hands-free operation, this can is perfect for kitchens, bathrooms, or offices. With a sleek and compact design, it fits seamlessly in any space while keeping odors at bay.', 04, 58, 'https://thumbs4.imagebam.com/16/41/f1/MESSSKQ_t.jpeg'),
(40096, 'Plant Pot', 699, 'Household', 4, 'Add a touch of greenery to your space with our Plant Pot. Made from sturdy materials and featuring drainage holes, this pot is perfect for housing indoor plants and herbs. With a classic design and neutral finish, it complements any decor style.', 17, 55, 'https://thumbs4.imagebam.com/87/64/d9/MESSSKO_t.jpeg'),
(40097, 'Picture Frames Set', 4999, 'Household', 5, 'Showcase your memories with our Picture Frames Set. Featuring multiple frames in various sizes and styles, this set allows you to create a personalized gallery wall or tabletop display. With durable construction and easy-to-use design, it\'s perfect for preserving and displaying your favorite photos.', 15, 0, 'https://thumbs4.imagebam.com/87/d0/19/MESSSKN_t.jpeg'),
(40098, 'Towel Set', 1999, 'Household', 5, 'Refresh your bathroom with our Towel Set. Made from plush and absorbent materials, this set includes bath towels, hand towels, and washcloths for a luxurious drying experience. With a variety of colors and patterns, it adds a stylish touch to your bathroom decor.', 01, 0, 'https://thumbs4.imagebam.com/ac/b4/fc/MESSSKP_t.jpeg'),
(40099, 'Desk Lamp', 4499, 'Household', 4, 'Illuminate your workspace with our Desk Lamp. Featuring adjustable brightness and color temperature settings, this lamp provides customizable lighting for reading, studying, or working. With a sleek and modern design, it complements any desk or office decor.', 01, 69, 'https://thumbs4.imagebam.com/88/c7/d9/MESSSKI_t.jpeg'),
(40100, 'Portable Charger', 599, 'Electronics', 4, 'Stay powered up on the go with our Portable Charger. Featuring fast charging technology and multiple USB ports, this charger provides reliable power for smartphones, tablets, and other USB devices. With a compact and lightweight design, it\'s perfect for travel, commuting, or emergencies.', 02, 0, 'https://thumbs4.imagebam.com/f6/1b/33/MESSRXX_t.jpeg'),
(40103, 'Sticky Notes', 14999, 'Stationery', 3, 'Stay organized and jot down reminders with our Sticky Notes. Featuring vibrant colors and adhesive backing, these notes are perfect for quick messages, to-do lists, and bookmarking pages. With a variety of sizes and shapes, they are a handy tool for home, office, or school.', 17, 58, 'https://thumbs4.imagebam.com/4b/4e/b2/MESSSK2_t.jpeg'),
(40104, 'Facial Mask Set', 1299, 'Self Care', 4, 'Pamper your skin with our Facial Mask Set. Featuring a variety of masks for different skincare needs, this set provides deep hydration, exfoliation, and nourishment for radiant and healthy-looking skin. With natural ingredients, it offers a spa-like experience at home.', 11, 53, 'https://thumbs4.imagebam.com/67/e9/09/MESSSKB_t.jpeg'),
(40105, 'Digital Thermometer', 1499, 'Health Care', 5, 'Monitor your health with our Digital Thermometer. Featuring fast and accurate readings, this thermometer provides reliable temperature measurements for oral, rectal, or underarm use. With a clear display and easy-to-use design, it\'s an essential tool for monitoring fever and maintaining wellness.', 06, 0, 'https://thumbs4.imagebam.com/4b/89/ce/MESSSJL_t.jpeg'),
(40106, 'Laundry Detergent', 699, 'Household', 5, 'Clean your clothes effectively with our Laundry Detergent. Formulated with powerful stain-fighting enzymes, this detergent removes dirt, grime, and odors to keep your garments fresh and clean. With a gentle formula, it\'s suitable for all washing machines and fabric types.', 13, 0, 'https://thumbs4.imagebam.com/ad/5c/f8/MESSSKM_t.jpeg'),
(40107, 'Bluetooth Speaker', 4999, 'Electronics', 5, 'Enjoy your favorite tunes on the go with our Bluetooth Speaker. Featuring wireless connectivity, high-quality sound, and a compact design, this speaker delivers impressive audio performance wherever you are. With long battery life, it\'s perfect for outdoor adventures, parties, or relaxing at home.', 07, 65, 'https://thumbs4.imagebam.com/d6/42/d4/MESSRXQ_t.jpeg'),
(40108, 'Scarf', 1999, 'Accessories', 5, 'Stay warm and stylish with our Scarf. Made from soft and cozy materials, this scarf offers comfort and versatility. With a variety of colors and designs to choose from, it\'s the perfect accessory to complement any outfit during the colder months.', 15, 56, 'https://thumbs4.imagebam.com/1a/38/74/MESSSG1_t.jpeg'),
(40110, 'Notebook Set', 599, 'Stationery', 4, 'Organize your thoughts and ideas with our Notebook Set. Featuring high-quality paper and durable covers, this set includes multiple notebooks for journaling, note-taking, or sketching. With compact sizes and stylish designs, they are perfect for students, professionals, or creative minds.', 12, 56, 'https://thumbs4.imagebam.com/78/45/ad/MESSSJY_t.jpg'),
(40111, 'Aromatherapy Diffuser', 2499, 'Self Care', 5, 'Create a soothing ambiance with our Aromatherapy Diffuser. Featuring a stylish design and calming LED lights, this diffuser disperses your favorite essential oils to enhance your mood and promote relaxation. With adjustable mist settings, it\'s perfect for creating a calming atmosphere in any room.', 16, 68, 'https://thumbs4.imagebam.com/5c/0b/24/MESSSK6_t.jpeg'),
(40112, 'Blood Pressure Monitor', 4999, 'Health Care', 5, 'Monitor your blood pressure with accuracy and ease using our Blood Pressure Monitor. Featuring a user-friendly design and reliable readings, this monitor helps you keep track of your cardiovascular health. With memory storage and adjustable cuffs, it\'s perfect for home monitoring.', 05, 60, 'https://thumbs4.imagebam.com/c3/33/45/MESSSJK_t.jpeg'),
(40113, 'Vacuum Cleaner', 14999, 'Household', 5, 'Keep your home clean and dust-free with our Vacuum Cleaner. Featuring powerful suction and versatile attachments, this vacuum effectively removes dirt, debris, and pet hair from carpets, hardwood floors, and upholstery. With a lightweight design and easy maneuverability, it simplifies your cleaning routine.', 15, 0, 'https://thumbs4.imagebam.com/b8/67/49/MESSSKR_t.jpeg'),
(40114, 'Broiler Chicken Skin On 1 kg ± 50 gm', 349, 'Food', 4, 'Enjoy tender and flavorful chicken with our Broiler Chicken. This chicken comes with skin on, perfect for grilling, roasting, or frying. With a weight of approximately 1 kg, it\'s a versatile ingredient for various recipes.', 19, 59, 'https://thumbs4.imagebam.com/bd/b3/9d/MEST50O_t.jpeg'),
(40115, 'Mango 1kg', 289, 'Food', 5, 'Indulge in the sweet and juicy flavor of our fresh Mangoes. Packed with vitamins and antioxidants, these mangoes are perfect for snacking, desserts, or smoothies. With a weight of 1 kg, they are a delicious and healthy treat.', 11, 0, 'https://thumbs4.imagebam.com/19/35/27/MEST50P_t.png'),
(40116, 'Fresh Refined Sugar 1kg', 146, 'Food', 4, 'Sweeten your favorite recipes with our Fresh Refined Sugar. Made from high-quality sugar cane, this sugar adds sweetness and flavor to desserts, beverages, and baked goods. With a weight of 1 kg, it\'s a pantry essential for every kitchen.', 18, 52, 'https://thumbs4.imagebam.com/f0/80/28/MEST50M_t.jpeg'),
(40117, 'Pran Tomato Sauce 340 gm', 115, 'Food', 4, 'Enhance your dishes with the rich and tangy flavor of Pran Tomato Sauce. Made from ripe tomatoes and spices, this sauce is perfect for pasta, pizza, and other savory dishes. With a convenient 340 gm bottle, it\'s a versatile condiment for your pantry.', 14, 59, 'https://thumbs4.imagebam.com/03/c5/f4/MEST50L_t.jpeg'),
(40118, 'Purnava Omega-3 Enriched Eggs 12 pcs', 265, 'Food', 5, 'Boost your daily nutrition with Purnava Omega-3 Enriched Eggs. These eggs are rich in omega-3 fatty acids, vitamins, and minerals for a healthy diet. With a pack of 12 eggs, they are a nutritious choice for breakfast, baking, or cooking.', 17, 0, 'https://thumbs4.imagebam.com/a0/61/e2/MEST50K_t.jpeg'),
(40119, 'White Bread 500 gm', 110, 'Food', 4, 'Enjoy soft and fluffy sandwiches with our White Bread. Made from premium ingredients, this bread offers a classic taste and texture that\'s perfect for toast, sandwiches, or French toast. With a 500 gm loaf, it\'s a staple for any kitchen.', 03, 57, 'https://thumbs4.imagebam.com/c8/80/a0/MEST50J_t.jpeg'),
(40120, 'Snickers Chocolate 50 gm', 130, 'Food', 5, 'Satisfy your sweet cravings with Snickers Chocolate. Featuring a combination of peanuts, caramel, nougat, and milk chocolate, this chocolate bar offers a delightful taste and satisfying crunch. With a 50 gm size, it\'s a perfect on-the-go treat.', 05, 61, 'https://thumbs4.imagebam.com/d1/36/43/MEST50H_t.jpeg'),
(40121, 'Mr. Noodles Cup Noodles Magic Masala 40 gm', 1047, 'Food', 3, 'Enjoy a quick and tasty meal with Mr. Noodles Cup Noodles. Featuring Magic Masala flavor, these noodles are easy to prepare and perfect for a quick lunch or snack. With a 40 gm cup, they are convenient for on-the-go meals.', 14, 52, 'https://thumbs4.imagebam.com/e7/fb/38/MEST50G_t.jpeg'),
(40122, 'RC Jeera Pani 250 ml', 884, 'Food', 4, 'Quench your thirst with the refreshing taste of RC Jeera Pani. This beverage features a blend of cumin, spices, and herbs for a flavorful and revitalizing drink. With a 250 ml bottle, it\'s perfect for enjoying chilled or as a mixer for cocktails.', 13, 52, 'https://thumbs4.imagebam.com/cc/47/b9/MEST50F_t.jpeg'),
(40123, 'Fresh White Flour (Maida) 2 kg', 145, 'Food', 4, 'Bake delicious treats with our Fresh White Flour (Maida). Made from finely milled wheat, this flour is ideal for making cakes, pastries, and other baked goods. With a 2 kg bag, it\'s a versatile ingredient for your baking needs.', 02, 50, 'https://thumbs4.imagebam.com/c7/9b/3f/MEST50E_t.jpeg'),
(40124, 'Jhatpot Chicken Nuggets 20 pcs 300 gm', 220, 'Food', 5, 'Enjoy crispy and flavorful Jhatpot Chicken Nuggets. Made from tender chicken meat and seasoned with spices, these nuggets are perfect for snacking or as a side dish. With a pack of 20 pieces weighing 300 gm, they are a convenient and tasty option.', 13, 59, 'https://thumbs4.imagebam.com/23/46/78/MEST50C_t.jpeg'),
(40125, 'Zero Cal Box 75 sachets 1 box', 200, 'Food', 4, 'Sweeten your beverages without the calories with Zero Cal Sweetener. Featuring 75 sachets in one box, this sweetener is perfect for coffee, tea, or other drinks. With zero calories and a natural taste, it\'s a guilt-free way to sweeten your day.', 16, 0, 'https://thumbs4.imagebam.com/3d/23/52/MEST50B_t.jpeg'),
(40127, 'Bluetooth Headset', 782, 'Electronics', 3, 'Enjoy wireless convenience with our Bluetooth Headset. Featuring noise-cancelling technology and comfortable ear cups, this headset delivers clear audio and hands-free calling. With long battery life, it\'s perfect for work, travel, or workouts.', 13, 0, 'https://thumbs4.imagebam.com/57/cb/01/MESYVHE_t.jpeg'),
(40128, 'Wireless Webcam', 758, 'Electronics', 4, 'Stay connected with our Wireless Webcam. Featuring high-definition video and easy setup, this webcam is perfect for video conferencing, streaming, or remote learning. With built-in microphone and adjustable mount, it offers versatile functionality.', 15, 50, 'https://thumbs4.imagebam.com/79/4e/ad/MESYVI6_t.png'),
(40129, 'USB-C Docking Station', 944, 'Electronics', 5, 'Expand your connectivity options with our USB-C Docking Station. Featuring multiple ports, this docking station allows you to connect external monitors, peripherals, and accessories with ease. With plug-and-play setup, it simplifies your workstation setup.', 15, 51, 'https://thumbs4.imagebam.com/48/66/33/MESYVII_t.jpg'),
(40131, 'Electric Toothbrush', 1946, 'Electronics', 3, 'Upgrade your oral care routine with our Electric Toothbrush. Featuring rotating and pulsating action, this toothbrush removes plaque and promotes gum health for a brighter smile. With rechargeable battery and multiple brushing modes, it\'s perfect for daily use.', 12, 52, 'https://thumbs4.imagebam.com/2d/a1/43/MESYVI1_t.jpeg'),
(40132, 'Wi-Fi Smart Plug', 1800, 'Electronics', 4, 'Automate your home with our Wi-Fi Smart Plug. Featuring remote control and scheduling capabilities, this smart plug allows you to turn devices on/off from anywhere using your smartphone. With voice control integration, it\'s a versatile smart home accessory.', 14, 59, 'https://thumbs4.imagebam.com/1d/cb/f1/MESYVI3_t.jpg');
INSERT INTO `product` (`product_id`, `Pname`, `price`, `category`, `rating`, `review`, `warehouse_id`, `stock`, `image`) VALUES
(40133, 'Portable SSD', 1896, 'Electronics', 4, 'Transfer files quickly and securely with our Portable SSD. Featuring high-speed data transfer and durable design, this SSD offers reliable storage for your photos, videos, and documents. With compact size, it\'s perfect for on-the-go use.', 12, 0, 'https://thumbs4.imagebam.com/b2/d4/a7/MESYVIM_t.jpeg'),
(40134, 'Bluetooth Keyboard', 1643, 'Electronics', 5, 'Enhance your typing experience with our Bluetooth Keyboard. Featuring ergonomic design and wireless connectivity, this keyboard offers comfortable typing and versatile compatibility with various devices. With compact layout, it\'s perfect for desktop or mobile use.', 19, 61, 'https://thumbs4.imagebam.com/a4/12/17/MESYVHQ_t.jpeg'),
(40135, 'Gaming Console', 524, 'Electronics', 3, 'Immerse yourself in gaming with our Gaming Console. Featuring high-definition graphics and a vast game library, this console offers hours of entertainment for gamers of all ages. With online multiplayer and streaming capabilities, it\'s a must-have for gaming enthusiasts.', 19, 53, 'https://thumbs4.imagebam.com/a3/c7/55/MESYVI9_t.jpg'),
(40136, 'Smart Scale', 1697, 'Electronics', 3, 'Track your fitness goals with our Smart Scale. Featuring body composition analysis and sync capabilities with fitness apps, this scale provides insights into weight, BMI, and more. With sleek design and easy-to-read display, it\'s a versatile fitness tool.', 15, 63, 'https://thumbs4.imagebam.com/25/80/d5/MESYVHR_t.jpeg'),
(40137, 'Compact Digital Camera', 1908, 'Electronics', 3, 'Capture precious moments with our Compact Digital Camera. Featuring high-resolution images and easy-to-use controls, this camera offers superior image quality and portability. With built-in Wi-Fi and NFC, it\'s perfect for sharing photos on the go.', 19, 0, 'https://thumbs4.imagebam.com/54/1a/09/MESYVHL_t.png'),
(40138, 'USB-C to HDMI Adapter', 200, 'Electronics', 3, 'Connect your devices with our USB-C to HDMI Adapter. Featuring plug-and-play functionality, this adapter allows you to mirror or extend your display to a larger screen. With 4K support, it delivers crisp and clear visuals for presentations, gaming, or streaming.', 18, 53, 'https://thumbs4.imagebam.com/62/28/8e/MESYVIU_t.jpg'),
(40139, 'Smart LED Bulb', 949, 'Electronics', 3, 'Illuminate your space with our Smart LED Bulb. Featuring customizable colors and remote control via smartphone app, this bulb allows you to create the perfect ambiance for any occasion. With energy-efficient design, it\'s a smart and eco-friendly lighting solution.', 12, 0, 'https://thumbs4.imagebam.com/4f/95/67/MESYVIP_t.jpeg'),
(40140, 'Wireless Printer', 1524, 'Electronics', 4, 'Print documents and photos wirelessly with our Wireless Printer. Featuring fast printing speeds and high-quality output, this printer offers convenience and versatility for home or office use. With mobile printing capabilities, it\'s perfect for on-the-go printing.', 15, 51, 'https://thumbs4.imagebam.com/09/b7/be/MESYVI2_t.jpg'),
(40142, 'Smart Ceiling Fan', 1269, 'Electronics', 5, 'Stay cool and comfortable with our Smart Ceiling Fan. Featuring remote control and smart integration, this fan allows you to adjust speed and direction using your smartphone or voice commands. With energy-saving features, it\'s a stylish and efficient cooling solution.', 20, 0, 'https://thumbs4.imagebam.com/26/9f/12/MESYVH9_t.jpg'),
(40143, 'Noise-Cancelling Earbuds', 1275, 'Electronics', 5, 'Enjoy immersive audio with our Noise-Cancelling Earbuds. Featuring active noise cancellation and high-quality sound, these earbuds block out distractions for a superior listening experience. With comfortable fit and wireless connectivity, they\'re perfect for music lovers on the go.', 14, 55, 'https://thumbs4.imagebam.com/55/7b/d8/MESYVIJ_t.jpg'),
(40144, 'Wireless Charging Stand', 567, 'Electronics', 4, 'Charge your devices effortlessly with our Wireless Charging Stand. Featuring fast charging capabilities and universal compatibility, this stand offers convenient charging for smartphones, tablets, and more. With sleek design, it\'s a stylish addition to any desk or nightstand.', 11, 0, 'https://thumbs4.imagebam.com/61/f2/7c/MESYVHT_t.jpeg'),
(40145, 'Mobile Hotspot', 1513, 'Electronics', 5, 'Stay connected on the go with our Mobile Hotspot. Featuring high-speed LTE connectivity and compact design, this hotspot provides Wi-Fi access for multiple devices wherever you are. With long battery life, it\'s perfect for travel, remote work, or emergencies.', 11, 80, 'https://thumbs4.imagebam.com/f8/43/2e/MESYVIA_t.jpg'),
(40146, 'Bluetooth Mouse', 500, 'Electronics', 4, 'Navigate with precision using our Bluetooth Mouse. Featuring ergonomic design and wireless connectivity, this mouse offers comfortable and responsive control for daily tasks. With long battery life and plug-and-play setup, it\'s perfect for desktop or laptop use.', 14, 56, 'https://thumbs4.imagebam.com/39/bf/aa/MESYVHU_t.jpeg'),
(40147, 'Home Security Camera', 861, 'Electronics', 4, 'Monitor your home with our Home Security Camera. Featuring high-definition video and motion detection, this camera provides peace of mind with 24/7 surveillance. With remote viewing and cloud storage, it offers reliable home security day and night.', 14, 53, 'https://thumbs4.imagebam.com/5a/79/91/MESYVHA_t.jpg'),
(40149, 'External Blu-ray Drive', 769, 'Electronics', 4, 'Enjoy high-definition entertainment with our External Blu-ray Drive. Featuring fast data transfer and compatibility with Blu-ray discs, DVDs, and CDs, this drive allows you to watch movies, install software, or backup files with ease. With USB connectivity, it\'s perfect for laptops and desktops.', 20, 78, 'https://thumbs4.imagebam.com/e8/0d/ea/MESYVHV_t.jpeg'),
(40150, 'Portable Photo Printer', 763, 'Electronics', 4, 'Print photos on the go with our Portable Photo Printer. Featuring compact design and wireless connectivity, this printer produces vibrant and durable prints from your smartphone or camera. With easy-to-use features, it\'s perfect for creating memories anytime, anywhere.', 18, 60, 'https://thumbs4.imagebam.com/4a/46/3f/MESYVHD_t.jpg'),
(40151, 'USB Microscope', 1008, 'Electronics', 3, 'Explore the micro world with our USB Microscope. Featuring high-resolution imaging and adjustable magnification, this microscope allows you to capture detailed images and videos of specimens. With USB connectivity, it\'s perfect for educational and professional use.', 16, 75, 'https://thumbs4.imagebam.com/d0/23/05/MESYVHX_t.jpeg'),
(40152, 'Multifunction Printer', 750, 'Electronics', 4, 'Streamline your workflow with our Multifunction Printer. Featuring printing, scanning, and copying capabilities, this printer offers versatile functionality for home or office use. With high-speed performance and wireless connectivity, it\'s a reliable and efficient solution.', 19, 0, 'https://thumbs4.imagebam.com/3a/af/2d/MESYVHI_t.jpeg'),
(40153, 'Bluetooth Car Kit', 1726, 'Electronics', 4, 'Stay connected while driving with our Bluetooth Car Kit. Featuring hands-free calling and music streaming, this kit provides convenience and safety on the road. With easy installation and voice control, it\'s a must-have accessory for modern vehicles.', 14, 53, 'https://thumbs4.imagebam.com/b8/c6/89/MESYVHZ_t.jpeg'),
(40154, 'Wireless Earbuds with ANC', 1377, 'Electronics', 5, 'Enjoy superior sound quality with our Wireless Earbuds with ANC (Active Noise Cancellation). Featuring immersive audio and noise-cancelling technology, these earbuds deliver clear and balanced sound in any environment. With comfortable fit and long battery life, they\'re perfect for music lovers and commuters.', 13, 57, 'https://thumbs4.imagebam.com/55/7b/d8/MESYVIJ_t.jpg'),
(40155, 'Portable DVD Player', 1210, 'Electronics', 5, 'Watch movies on the go with our Portable DVD Player. Featuring high-resolution screen and built-in speakers, this player offers immersive entertainment during travel or downtime. With long battery life and multiple playback options, it\'s perfect for road trips and vacations.', 15, 74, 'https://thumbs4.imagebam.com/e3/45/7c/MESYVI0_t.jpeg'),
(40156, 'Smart Light Switch', 1417, 'Electronics', 4, 'Control your lights with our Smart Light Switch. Featuring remote control and scheduling capabilities, this switch allows you to customize your lighting based on your preferences. With smart integration, it\'s a convenient and energy-efficient lighting solution.', 12, 59, 'https://thumbs4.imagebam.com/78/b0/b4/MESYVIQ_t.jpeg'),
(40157, '3D Printer', 1454, 'Electronics', 5, 'Bring your ideas to life with our 3D Printer. Featuring high-precision printing and user-friendly software, this printer allows you to create prototypes, models, and custom designs with ease. With versatile filament compatibility, it\'s perfect for hobbyists, designers, and engineers.', 17, 52, 'https://thumbs4.imagebam.com/9a/5a/19/MESYVH6_t.jpg'),
(40159, 'Portable Air Purifier', 1020, 'Electronics', 5, 'Breathe cleaner air with our Portable Air Purifier. Featuring HEPA filtration and compact design, this purifier removes airborne pollutants and allergens for healthier indoor environments. With quiet operation and energy-saving mode, it\'s perfect for home or office use.', 16, 66, 'https://thumbs4.imagebam.com/8a/3b/de/MESYVIF_t.jpg'),
(40160, 'USB-C to USB Adapter', 200, 'Electronics', 5, 'Connect your devices with our USB-C to USB Adapter. Featuring plug-and-play functionality, this adapter allows you to connect USB-A accessories to USB-C devices. With compact design, it\'s perfect for laptops, tablets, and smartphones.', 11, 64, 'https://thumbs4.imagebam.com/9e/19/8b/MESYVIS_t.jpeg'),
(40161, 'Home Assistant Device', 1739, 'Electronics', 3, 'Simplify your smart home with our Home Assistant Device. Featuring voice control and smart integration, this device allows you to control lights, thermostats, and more with ease. With touchscreen display and built-in speaker, it\'s a versatile smart home hub.', 16, 73, 'https://thumbs4.imagebam.com/6e/a6/e1/MESYVHO_t.jpeg'),
(40162, 'Gaming Racing Wheel', 631, 'Electronics', 3, 'Experience realistic racing with our Gaming Racing Wheel. Featuring responsive controls and immersive force feedback, this wheel delivers authentic driving simulation for racing games. With adjustable settings and compatibility with popular gaming platforms, it\'s a must-have for racing enthusiasts.', 17, 60, 'https://thumbs4.imagebam.com/9d/2a/6d/MESYVIN_t.jpg'),
(40163, 'Compact Photo Printer', 1942, 'Electronics', 5, 'Print photos anytime, anywhere with our Compact Photo Printer. Featuring high-quality prints and wireless connectivity, this printer allows you to create memories on the go. With portable design and easy-to-use features, it\'s perfect for events, parties, and travel.', 17, 61, 'https://thumbs4.imagebam.com/4a/46/3f/MESYVHD_t.jpg'),
(40164, 'USB Desk Fan', 800, 'Electronics', 5, 'Stay cool at your desk with our USB Desk Fan. Featuring adjustable speed settings and quiet operation, this fan provides personalized comfort during work or study. With compact size and USB connectivity, it\'s perfect for home or office use.', 14, 78, 'https://thumbs4.imagebam.com/7a/3e/62/MESYVHK_t.jpg'),
(40165, 'Smart Alarm Clock', 1316, 'Electronics', 4, 'Wake up refreshed with our Smart Alarm Clock. Featuring customizable alarms, ambient lighting, and smart integration, this clock helps you start your day on the right note. With built-in speaker and wireless charging, it\'s a versatile bedside companion.', 18, 66, 'https://thumbs4.imagebam.com/2f/5f/ca/MESYVIH_t.jpeg'),
(40166, 'Bluetooth FM Transmitter', 1754, 'Electronics', 5, 'Enjoy music in your car with our Bluetooth FM Transmitter. Featuring wireless connectivity and hands-free calling, this transmitter allows you to stream music and take calls through your car\'s audio system. With easy setup and universal compatibility, it\'s perfect for road trips and commutes.', 19, 0, 'https://thumbs4.imagebam.com/40/90/02/MESYVHN_t.jpeg'),
(40167, 'Bluetooth Audio Receiver', 1319, 'Electronics', 5, 'Upgrade your audio system with our Bluetooth Audio Receiver. Featuring wireless connectivity and high-fidelity sound, this receiver allows you to stream music from your smartphone, tablet, or computer to your existing speakers or headphones. With easy setup, it\'s a versatile audio solution.', 19, 0, 'https://thumbs4.imagebam.com/74/22/eb/MESYVHB_t.jpg'),
(40169, 'Gaming Capture Card', 836, 'Electronics', 3, 'Record and stream gameplay with our Gaming Capture Card. Featuring high-definition capture and low-latency performance, this card allows you to showcase your gaming skills on platforms like Twitch or YouTube. With easy setup and compatibility with popular consoles, it\'s a must-have for streamers.', 20, 66, 'https://thumbs4.imagebam.com/22/89/1b/MESYVHF_t.jpg'),
(40170, 'Portable Scanner', 1225, 'Electronics', 3, 'Digitize documents on the go with our Portable Scanner. Featuring high-resolution scanning and wireless connectivity, this scanner allows you to scan, store, and share files effortlessly. With compact design and rechargeable battery, it\'s perfect for professionals, students, and travelers.', 19, 67, 'https://thumbs4.imagebam.com/d7/72/34/MESYVIB_t.jpg'),
(40171, 'Wireless Trackball Mouse', 1616, 'Electronics', 4, 'Navigate with precision using our Wireless Trackball Mouse. Featuring ergonomic design and wireless connectivity, this mouse offers comfortable and responsive control for daily tasks. With long battery life and plug-and-play setup, it\'s perfect for desktop or laptop use.', 17, 56, 'https://thumbs4.imagebam.com/f8/c7/3e/MESYVIO_t.jpeg'),
(40172, 'Mini Projector', 904, 'Electronics', 5, 'Enjoy big-screen entertainment with our Mini Projector. Featuring high-resolution projection and compact design, this projector delivers vibrant images and videos for movies, presentations, or gaming. With HDMI and USB connectivity, it\'s perfect for indoor and outdoor use.', 17, 62, 'https://thumbs4.imagebam.com/57/63/ee/MESYVIE_t.jpg'),
(40173, 'Wireless HDMI Transmitter', 674, 'Electronics', 5, 'Stream media wirelessly with our Wireless HDMI Transmitter. Featuring low-latency transmission and easy setup, this transmitter allows you to mirror or extend your display to a larger screen without cables. With compact design, it\'s perfect for presentations, gaming, or home theater setups.', 15, 60, 'https://thumbs4.imagebam.com/3a/42/13/MESYVH8_t.jpg'),
(40174, 'Smart LED Strip', 1657, 'Electronics', 3, 'Illuminate your space with our Smart LED Strip. Featuring customizable colors and remote control via smartphone app, this strip allows you to create dynamic lighting effects for any occasion. With easy installation and smart integration, it\'s a versatile lighting solution.', 12, 64, 'https://thumbs4.imagebam.com/71/71/b5/MESYVI5_t.jpeg'),
(40175, 'Portable Blu-ray Player', 1263, 'Electronics', 3, 'Enjoy high-definition entertainment on the go with our Portable Blu-ray Player. Featuring built-in screen and speakers, this player allows you to watch movies and shows in stunning detail. With long battery life and multiple playback options, it\'s perfect for travel and downtime.', 13, 0, 'https://thumbs4.imagebam.com/e3/45/7c/MESYVI0_t.jpeg'),
(40176, 'USB-C to Ethernet Adapter', 845, 'Electronics', 3, 'Connect to wired networks with our USB-C to Ethernet Adapter. Featuring plug-and-play functionality, this adapter allows you to add Ethernet connectivity to laptops, tablets, and smartphones with USB-C ports. With compact design, it\'s perfect for reliable internet connections in various settings.', 18, 54, 'https://thumbs4.imagebam.com/62/28/8e/MESYVIU_t.jpg'),
(40177, 'Bluetooth Speakerphone', 1435, 'Electronics', 3, 'Conduct conference calls with ease using our Bluetooth Speakerphone. Featuring 360-degree audio and noise-cancelling technology, this speakerphone delivers clear and natural sound for meetings and calls. With wireless connectivity and long battery life, it\'s a versatile communication tool.', 11, 75, 'https://thumbs4.imagebam.com/2e/c4/30/MESYVIK_t.jpg'),
(40180, 'External Sound Card', 1141, 'Electronics', 3, 'Enhance your audio experience with our External Sound Card. Featuring high-quality audio output and multiple connectivity options, this sound card provides superior sound for music, movies, and games. With compact design, it\'s perfect for laptops, desktops, and gaming consoles.', 12, 71, 'https://thumbs4.imagebam.com/48/66/33/MESYVII_t.jpg'),
(40181, 'Leather Key Holder', 300, 'Accessories', 3, 'Organize your keys with our Leather Key Holder. Featuring durable construction and stylish design, this holder keeps your keys secure and easily accessible. With compact size, it\'s perfect for everyday carry.', 17, 79, 'https://thumbs4.imagebam.com/6c/e6/6a/MESYW1X_t.jpg'),
(40182, 'Reading Glasses', 800, 'Accessories', 3, 'Improve your vision with our Reading Glasses. Featuring lightweight frames and clear lenses, these glasses provide comfortable and clear reading experience. With stylish design, they\'re a practical and fashionable accessory.', 17, 72, 'https://thumbs4.imagebam.com/87/42/e4/MESYW2W_t.jpg'),
(40183, 'Tie Clip', 600, 'Accessories', 4, 'Elevate your style with our Tie Clip. Featuring sleek design and secure clasp, this clip adds a touch of sophistication to your outfit. With durable construction, it\'s a stylish accessory for formal occasions.', 13, 75, 'https://thumbs4.imagebam.com/86/36/1f/MESYW33_t.jpg'),
(40184, 'Compact Mirror', 500, 'Accessories', 3, 'Stay looking fresh on the go with our Compact Mirror. Featuring dual-sided mirrors and sleek design, this mirror is perfect for quick touch-ups. With compact size, it\'s a convenient addition to your purse or bag.', 13, 75, 'https://thumbs4.imagebam.com/d8/ae/a3/MESYW28_t.jpg'),
(40185, 'Beanie', 700, 'Accessories', 5, 'Stay warm and stylish with our Beanie. Featuring soft knit fabric and snug fit, this beanie provides comfort and warmth during colder months. With versatile design, it\'s a must-have accessory for any wardrobe.', 16, 0, 'https://thumbs4.imagebam.com/19/c3/44/MESYW1W_t.jpg'),
(40186, 'Cufflinks Set', 1000, 'Accessories', 5, 'Add a finishing touch to your formal attire with our Cufflinks Set. Featuring elegant design and secure fastening, these cufflinks complement your dress shirts perfectly. With durable construction, they\'re a timeless accessory for special occasions.', 11, 50, 'https://thumbs4.imagebam.com/ba/79/c2/MESYW2E_t.jpg'),
(40187, 'Handkerchief Set', 400, 'Accessories', 3, 'Keep it classy with our Handkerchief Set. Featuring soft and absorbent fabric, these handkerchiefs are perfect for wiping away sweat or tears. With stylish design, they\'re a practical and elegant accessory for daily use.', 17, 0, 'https://thumbs4.imagebam.com/c2/98/3e/MESYW2H_t.jpg'),
(40188, 'Bow Tie', 900, 'Accessories', 5, 'Make a statement with our Bow Tie. Featuring adjustable strap and elegant design, this bow tie adds a touch of sophistication to your formal attire. With versatile styling options, it\'s perfect for weddings, parties, or events.', 11, 0, 'https://thumbs4.imagebam.com/22/4d/ec/MESYW24_t.jpg'),
(40189, 'Shoe Polish Kit', 500, 'Accessories', 3, 'Keep your shoes looking new with our Shoe Polish Kit. Featuring high-quality polish and brushes, this kit restores shine and protects your footwear. With compact case, it\'s perfect for travel or home use.', 13, 58, 'https://thumbs4.imagebam.com/ad/18/7d/MESYW2Z_t.jpg'),
(40190, 'Watch Strap', 500, 'Accessories', 5, 'Refresh your watch with our Watch Strap. Featuring durable material and stylish design, this strap updates your watch\'s look and feel. With easy installation, it\'s a versatile accessory for any watch lover.', 13, 76, 'https://thumbs4.imagebam.com/6c/a2/66/MESYW3C_t.jpg'),
(40191, 'Tote Bag', 450, 'Accessories', 4, 'Carry your essentials in style with our Tote Bag. Featuring spacious interior and durable handles, this bag is perfect for daily use or shopping trips. With versatile design, it\'s a practical and fashionable accessory.', 17, 64, 'https://thumbs4.imagebam.com/3c/ba/4b/MESYW35_t.jpg'),
(40192, 'Bracelet', 800, 'Accessories', 3, 'Accentuate your wrist with our Bracelet. Featuring elegant design and durable construction, this bracelet adds a touch of sophistication to your look. With adjustable fit, it\'s a versatile accessory for any occasion.', 13, 0, 'https://thumbs4.imagebam.com/3e/4c/f3/MESYW25_t.jpg'),
(40193, 'Necktie', 520, 'Accessories', 3, 'Complete your formal look with our Necktie. Featuring sleek design and luxurious feel, this tie adds elegance to your attire. With versatile styling options, it\'s perfect for business meetings, weddings, or special events.', 13, 60, 'https://thumbs4.imagebam.com/0d/af/46/MESYW2N_t.jpg'),
(40194, 'Hat', 900, 'Accessories', 3, 'Shield yourself from the sun in style with our Hat. Featuring breathable material and adjustable fit, this hat provides comfort and protection during outdoor activities. With classic design, it\'s a versatile accessory for any wardrobe.', 16, 62, 'https://thumbs4.imagebam.com/46/af/a0/MESYW2J_t.jpg'),
(40195, 'Socks Set', 600, 'Accessories', 5, 'Keep your feet comfortable with our Socks Set. Featuring soft and breathable fabric, these socks provide cushioning and support throughout the day. With stylish patterns, they\'re a fun and functional accessory for your feet.', 12, 0, 'https://thumbs4.imagebam.com/e5/43/74/MESYW31_t.jpg'),
(40196, 'Passport Holder', 450, 'Accessories', 3, 'Travel with peace of mind with our Passport Holder. Featuring RFID-blocking technology and secure compartments, this holder protects your passport and essential cards. With compact design, it\'s perfect for travel or daily use.', 11, 0, 'https://thumbs4.imagebam.com/c7/2d/38/MESYW2P_t.jpg'),
(40197, 'Cosmetic Bag', 800, 'Accessories', 5, 'Organize your cosmetics with our Cosmetic Bag. Featuring multiple compartments and durable material, this bag keeps your beauty essentials neatly stored. With stylish design, it\'s a practical and fashionable accessory for travel or home use.', 17, 65, 'https://thumbs4.imagebam.com/7c/81/cb/MESYW2D_t.jpg'),
(40198, 'Hair Clips Set', 400, 'Accessories', 4, 'Style your hair effortlessly with our Hair Clips Set. Featuring assorted designs and secure grip, these clips hold your hair in place with ease. With versatile styling options, they\'re perfect for daily wear or special occasions.', 12, 0, 'https://thumbs4.imagebam.com/3c/1a/a6/MESYW2G_t.jpg'),
(40199, 'Scarf Ring', 700, 'Accessories', 5, 'Elevate your scarf game with our Scarf Ring. Featuring elegant design and secure hold, this ring adds a touch of sophistication to your scarf. With versatile styling options, it\'s a stylish accessory for any outfit.', 11, 67, 'https://thumbs4.imagebam.com/40/19/75/MESYW2Y_t.jpg'),
(40200, 'Money Clip', 500, 'Accessories', 3, 'Keep your cash organized with our Money Clip. Featuring sleek design and secure grip, this clip holds your bills and cards in place with style. With compact size, it\'s a practical and fashionable accessory for daily use.', 15, 60, 'https://thumbs4.imagebam.com/0d/af/46/MESYW2N_t.jpg'),
(40201, 'Luggage Tag', 400, 'Accessories', 4, 'Personalize your luggage with our Luggage Tag. Featuring durable material and clear window, this tag securely attaches to your bags for easy identification. With stylish design, it\'s a practical and stylish travel accessory.', 13, 0, 'https://thumbs4.imagebam.com/14/68/48/MESYW2L_t.jpg'),
(40202, 'Bandana', 300, 'Accessories', 5, 'Add a trendy twist to your look with our Bandana. Featuring soft and breathable fabric, this bandana can be worn in various ways for versatile styling options. With classic paisley pattern, it\'s a timeless accessory for any wardrobe.', 11, 80, 'https://thumbs4.imagebam.com/73/94/3d/MESYW1T_t.jpg'),
(40203, 'Pocket Square', 500, 'Accessories', 3, 'Elevate your suit game with our Pocket Square. Featuring elegant design and luxurious feel, this square adds a touch of sophistication to your jacket pocket. With versatile styling options, it\'s perfect for formal occasions or daily wear.', 13, 0, 'https://thumbs4.imagebam.com/3f/3e/d6/MESYW2Q_t.jpg'),
(40204, 'Brooch', 900, 'Accessories', 4, 'Add a glamorous touch to your outfit with our Brooch. Featuring sparkling crystals and secure clasp, this brooch complements your dress or jacket perfectly. With versatile styling options, it\'s a stylish accessory for special events.', 14, 78, 'https://thumbs4.imagebam.com/88/46/96/MESYW26_t.jpg'),
(40205, 'Shoelaces Set', 400, 'Accessories', 3, 'Refresh your footwear with our Shoelaces Set. Featuring durable material and stylish design, these laces update your shoes\' look and feel. With versatile color options, they\'re a practical accessory for any pair of shoes.', 20, 70, 'https://thumbs4.imagebam.com/c2/9f/ba/MESYW30_t.jpg'),
(40206, 'Sunglasses Chain', 600, 'Accessories', 3, 'Keep your sunglasses secure with our Sunglasses Chain. Featuring durable material and stylish design, this chain holds your glasses in place with ease. With adjustable fit, it\'s a practical and fashionable accessory for sunny days.', 16, 66, 'https://thumbs4.imagebam.com/86/d2/05/MESYW32_t.jpg'),
(40207, 'Waist Bag', 600, 'Accessories', 4, 'Carry your essentials hands-free with our Waist Bag. Featuring multiple compartments and adjustable strap, this bag provides convenience and security during outdoor activities. With stylish design, it\'s a versatile accessory for travel or daily use.', 18, 70, 'https://thumbs4.imagebam.com/94/17/9a/MESYW3A_t.jpg'),
(40208, 'Umbrella Stand', 240, 'Accessories', 5, 'Keep your umbrella organized with our Umbrella Stand. Featuring sturdy construction and compact design, this stand holds your umbrellas neatly in place. With stylish design, it\'s a practical and elegant addition to your entryway.', 15, 72, 'https://thumbs4.imagebam.com/82/ea/8b/MESYW39_t.jpg'),
(40209, 'Belt Buckle', 700, 'Accessories', 3, 'Customize your belt with our Belt Buckle. Featuring stylish design and durable construction, this buckle adds a personal touch to your belt. With versatile styling options, it\'s a fashionable accessory for any outfit.', 20, 69, 'https://thumbs4.imagebam.com/6c/e6/6a/MESYW1X_t.jpg'),
(40210, 'Travel Wallet', 500, 'Accessories', 4, 'Organize your travel essentials with our Travel Wallet. Featuring multiple compartments and RFID-blocking technology, this wallet keeps your documents and cards secure. With compact design, it\'s perfect for travel or daily use.', 12, 80, 'https://thumbs4.imagebam.com/b9/ea/90/MESYW38_t.jpg'),
(40211, 'Ring Box', 800, 'Accessories', 5, 'Keep your rings safe and organized with our Ring Box. Featuring soft interior and secure closure, this box protects your precious rings. With elegant design, it\'s a stylish storage solution for your jewelry collection.', 11, 0, 'https://thumbs4.imagebam.com/9c/e2/05/MESYW2X_t.jpg'),
(40212, 'Makeup Brush Holder', 700, 'Accessories', 4, 'Keep your makeup brushes organized with our Makeup Brush Holder. Featuring multiple compartments and durable material, this holder stores your brushes neatly. With compact design, it\'s perfect for travel or home use.', 20, 0, 'https://thumbs4.imagebam.com/ab/fe/ae/MESYW2M_t.jpg'),
(40213, 'Beaded Necklace', 1500, 'Accessories', 4, 'Accentuate your neckline with our Beaded Necklace. Featuring vibrant beads and adjustable length, this necklace adds a pop of color to your outfit. With elegant design, it\'s a versatile accessory for any occasion.', 14, 56, 'https://thumbs4.imagebam.com/51/52/d7/MESYW1U_t.jpg'),
(40214, 'Anklet', 600, 'Accessories', 4, 'Add a playful touch to your ankle with our Anklet. Featuring delicate design and adjustable length, this anklet complements your footwear perfectly. With stylish charm, it\'s a fashionable accessory for summer vibes.', 11, 56, 'https://thumbs4.imagebam.com/d6/d9/f4/MESYW1S_t.jpg'),
(40215, 'Purse Organizer', 800, 'Accessories', 4, 'Keep your purse organized with our Purse Organizer. Featuring multiple compartments and durable material, this organizer keeps your essentials neatly stored. With compact design, it\'s perfect for switching bags effortlessly.', 14, 0, 'https://thumbs4.imagebam.com/ad/72/be/MESYW2R_t.jpg'),
(40216, 'Hat Box', 450, 'Accessories', 5, 'Protect your hats with our Hat Box. Featuring sturdy construction and spacious interior, this box keeps your hats in pristine condition. With handle and latch closure, it\'s perfect for travel or storage.', 14, 60, 'https://thumbs4.imagebam.com/5f/83/f7/MESYW2I_t.jpg'),
(40217, 'Tie Rack', 1200, 'Accessories', 5, 'Organize your ties with our Tie Rack. Featuring rotating design and durable construction, this rack holds your ties neatly displayed. With compact size, it\'s a practical storage solution for your wardrobe.', 20, 0, 'https://thumbs4.imagebam.com/83/48/ee/MESYW34_t.jpg'),
(40218, 'Gloves Set', 600, 'Accessories', 4, 'Keep your hands warm with our Gloves Set. Featuring soft and insulating material, these gloves provide comfort during colder months. With stylish design, they\'re a practical and fashionable accessory for winter.', 17, 66, 'https://thumbs4.imagebam.com/20/f8/fd/MESYW2F_t.jpg'),
(40219, 'Wallet Chain', 500, 'Accessories', 5, 'Secure your wallet with our Wallet Chain. Featuring durable material and stylish design, this chain attaches to your wallet for added security. With adjustable length, it\'s a practical accessory for daily use.', 15, 55, 'https://thumbs4.imagebam.com/66/33/89/MESYW3B_t.jpg'),
(40220, 'Collar Clips', 700, 'Accessories', 5, 'Add a unique touch to your collar with our Collar Clips. Featuring elegant design and secure grip, these clips hold your collar in place with style. With versatile styling options, they\'re perfect for formal occasions or daily wear.', 12, 58, 'https://thumbs4.imagebam.com/ab/2c/db/MESYW27_t.jpg'),
(40221, 'Men\'s Chinos', 901, 'Clothes', 4, 'Elevate your casual look with our Men\'s Chinos. Featuring comfortable fabric and versatile design, these chinos offer a stylish option for everyday wear. With classic fit, they\'re a wardrobe essential for any man.', 16, 73, 'https://thumbs4.imagebam.com/a7/7f/c1/MESYZRA_t.jpg'),
(40222, 'Women\'s Cardigan', 583, 'Clothes', 5, 'Layer up in style with our Women\'s Cardigan. Featuring soft knit fabric and cozy fit, this cardigan adds warmth and elegance to your outfit. With versatile design, it\'s a perfect layering piece for any season.', 12, 0, 'https://thumbs4.imagebam.com/fd/a5/9d/MESYZS8_t.jpg'),
(40223, 'Kid\'s Sweatshirt', 200, 'Clothes', 4, 'Keep your little one cozy with our Kid\'s Sweatshirt. Featuring soft fabric and playful design, this sweatshirt provides comfort and style for everyday adventures. With durable construction, it\'s a practical choice for active kids.', 20, 0, 'https://thumbs4.imagebam.com/e7/ed/55/MESYZR2_t.jpeg'),
(40224, 'Tank Top', 800, 'Clothes', 5, 'Stay cool and comfortable with our Tank Top. Featuring breathable fabric and relaxed fit, this tank top is perfect for workouts or casual wear. With versatile styling options, it\'s a must-have for any wardrobe.', 17, 77, 'https://thumbs4.imagebam.com/b5/b0/f2/MESYZRX_t.jpg'),
(40225, 'Ballet Flats', 450, 'Clothes', 4, 'Step out in style with our Ballet Flats. Featuring comfortable fit and elegant design, these flats add a touch of sophistication to your look. With versatile color options, they\'re a perfect choice for everyday elegance.', 12, 62, 'https://thumbs4.imagebam.com/ee/57/89/MESYZQ8_t.jpg'),
(40226, 'Capri Pants', 1211, 'Clothes', 3, 'Embrace warm weather with our Capri Pants. Featuring lightweight fabric and cropped length, these pants offer comfort and style for sunny days. With versatile design, they\'re a practical addition to your summer wardrobe.', 20, 0, 'https://thumbs4.imagebam.com/48/5c/66/MESYZQJ_t.jpg'),
(40227, 'Jumpsuit', 805, 'Clothes', 3, 'Make a fashion statement with our Jumpsuit. Featuring flattering fit and chic design, this jumpsuit is perfect for day-to-night transitions. With versatile styling options, it\'s a stylish choice for any occasion.', 12, 73, 'https://thumbs4.imagebam.com/32/d4/4f/MESYZR1_t.jpg'),
(40228, 'Bomber Jacket', 1396, 'Clothes', 4, 'Stay on trend with our Bomber Jacket. Featuring durable material and classic design, this jacket adds a cool edge to your outfit. With versatile styling options, it\'s a timeless addition to your outerwear collection.', 20, 69, 'https://thumbs4.imagebam.com/ea/99/b4/MESYZQF_t.jpg'),
(40229, 'Athletic Shorts', 500, 'Clothes', 3, 'Stay active in style with our Athletic Shorts. Featuring moisture-wicking fabric and comfortable fit, these shorts are perfect for workouts or sports. With versatile design, they\'re a practical choice for any athlete.', 13, 75, 'https://thumbs4.imagebam.com/fa/02/be/MESYZQ7_t.jpg'),
(40230, 'Sundress', 1060, 'Clothes', 3, 'Embrace sunny days with our Sundress. Featuring lightweight fabric and vibrant print, this dress offers breezy style for warm weather. With versatile design, it\'s a perfect choice for beach days or picnics.', 13, 55, 'https://thumbs4.imagebam.com/b5/b0/f2/MESYZRX_t.jpg'),
(40231, 'Track Pants', 800, 'Clothes', 4, 'Relax in comfort with our Track Pants. Featuring soft fabric and adjustable fit, these pants provide cozy warmth for lounging or workouts. With sporty design, they\'re a practical addition to your casual wear collection.', 16, 66, 'https://thumbs4.imagebam.com/48/f9/c7/MESYZRY_t.jpg'),
(40232, 'Button-up Shirt', 616, 'Clothes', 4, 'Elevate your look with our Button-up Shirt. Featuring crisp fabric and classic design, this shirt adds polish to your outfit. With versatile styling options, it\'s a wardrobe essential for any occasion.', 12, 0, 'https://thumbs4.imagebam.com/56/f0/8c/MESYZQG_t.jpg'),
(40233, 'Leg Warmers', 800, 'Clothes', 4, 'Stay cozy in style with our Leg Warmers. Featuring soft knit fabric and stretchy fit, these leg warmers add warmth and flair to your outfit. With versatile design, they\'re a fun accessory for cooler days.', 12, 70, 'https://thumbs4.imagebam.com/23/86/9f/MESYZR5_t.jpg'),
(40234, 'Romper', 899, 'Clothes', 5, 'Make a playful statement with our Romper. Featuring flattering fit and fun design, this romper is perfect for summer adventures. With versatile styling options, it\'s a stylish choice for day or night.', 15, 0, 'https://thumbs4.imagebam.com/3a/e5/ac/MESYZRN_t.jpg'),
(40235, 'Cargo Pants', 648, 'Clothes', 4, 'Embrace utility style with our Cargo Pants. Featuring durable fabric and multiple pockets, these pants offer practical storage and rugged style. With relaxed fit, they\'re perfect for outdoor activities or casual wear.', 15, 0, 'https://thumbs4.imagebam.com/57/67/39/MESYZQL_t.jpg'),
(40236, 'Maxi Skirt', 1544, 'Clothes', 3, 'Embrace boho chic with our Maxi Skirt. Featuring flowing fabric and elegant design, this skirt adds effortless style to your look. With versatile styling options, it\'s a perfect choice for beach days or festivals.', 11, 0, 'https://thumbs4.imagebam.com/8d/af/60/MESYZR9_t.jpg'),
(40237, 'Espadrilles', 1500, 'Clothes', 3, 'Step into summer with our Espadrilles. Featuring breathable fabric and classic design, these shoes offer comfort and style for warm weather. With versatile color options, they\'re a perfect choice for sunny days.', 20, 0, 'https://thumbs4.imagebam.com/56/7d/43/MESYZQW_t.jpg'),
(40238, 'Culottes', 772, 'Clothes', 5, 'Make a fashion-forward statement with our Culottes. Featuring wide-leg design and comfortable fit, these culottes offer breezy style for any occasion. With versatile styling options, they\'re a chic addition to your wardrobe.', 14, 73, 'https://thumbs4.imagebam.com/8f/86/3b/MESYZQV_t.jpg'),
(40239, 'Windbreaker', 1732, 'Clothes', 4, 'Stay prepared for unpredictable weather with our Windbreaker. Featuring water-resistant fabric and lightweight design, this jacket offers protection from the elements. With versatile styling options, it\'s a practical outerwear choice.', 13, 0, 'https://thumbs4.imagebam.com/f7/41/ae/MESYZRH_t.jpg'),
(40240, 'Blazer', 1342, 'Clothes', 3, 'Polish your look with our Blazer. Featuring tailored fit and classic design, this blazer adds sophistication to your outfit. With versatile styling options, it\'s a perfect choice for work or special events.', 20, 52, 'https://thumbs4.imagebam.com/1e/cc/14/MESYZQC_t.jpg'),
(40241, 'Crop Pants', 1013, 'Clothes', 4, 'Embrace modern style with our Crop Pants. Featuring cropped length and flattering fit, these pants offer contemporary flair for any outfit. With versatile styling options, they\'re a trendy addition to your wardrobe.', 12, 75, 'https://thumbs4.imagebam.com/cd/96/7c/MESYZQU_t.jpg'),
(40242, 'Peplum Top', 538, 'Clothes', 4, 'Add feminine charm to your look with our Peplum Top. Featuring flared hem and elegant design, this top adds a flattering silhouette to your outfit. With versatile styling options, it\'s a chic choice for any occasion.', 11, 75, 'https://thumbs4.imagebam.com/ef/ca/fd/MESYZRK_t.jpg'),
(40243, 'High Heels', 656, 'Clothes', 5, 'Elevate your style with our High Heels. Featuring sleek design and stiletto heel, these heels add height and elegance to your look. With versatile color options, they\'re a perfect choice for special occasions.', 18, 72, 'https://thumbs4.imagebam.com/e5/00/30/MESYZR0_t.jpg'),
(40244, 'Pajama Set', 2000, 'Clothes', 4, 'Relax in comfort with our Pajama Set. Featuring soft fabric and relaxed fit, this set provides cozy warmth for bedtime. With fun prints, it\'s a playful addition to your sleepwear collection.', 14, 0, 'https://thumbs4.imagebam.com/01/7b/10/MESYZRI_t.jpg'),
(40245, 'Trench Coat', 1165, 'Clothes', 5, 'Stay stylish in any weather with our Trench Coat. Featuring water-resistant fabric and classic design, this coat offers timeless elegance and protection from the elements. With versatile styling options, it\'s a wardrobe essential.', 16, 59, 'https://thumbs4.imagebam.com/50/64/df/MESYZRZ_t.jpg'),
(40246, 'V-neck Sweater', 1855, 'Clothes', 3, 'Keep warm in style with our V-neck Sweater. Featuring soft knit fabric and classic design, this sweater adds cozy comfort to your look. With versatile styling options, it\'s a perfect layering piece for any outfit.', 20, 56, 'https://thumbs4.imagebam.com/1c/bc/68/MESYZS6_t.jpg'),
(40247, 'A-line Dress', 778, 'Clothes', 4, 'Embrace classic elegance with our A-line Dress. Featuring flattering fit and timeless design, this dress offers effortless style for any occasion. With versatile styling options, it\'s a chic choice for day or night.', 18, 54, 'https://thumbs4.imagebam.com/37/b3/e6/MESYZQ4_t.jpg'),
(40248, 'Camisole', 828, 'Clothes', 5, 'Layer with ease with our Camisole. Featuring silky fabric and adjustable straps, this camisole provides a smooth base for any outfit. With versatile design, it\'s a perfect layering piece for any wardrobe.', 12, 52, 'https://thumbs4.imagebam.com/32/63/bc/MESYZQH_t.jpg'),
(40249, 'Pleated Skirt', 1304, 'Clothes', 5, 'Add movement to your look with our Pleated Skirt. Featuring flowing fabric and elegant design, this skirt adds graceful flair to your outfit. With versatile styling options, it\'s a chic choice for any occasion.', 16, 0, 'https://thumbs4.imagebam.com/fd/52/ec/MESYZRL_t.jpg'),
(40250, 'Slip-on Shoes', 538, 'Clothes', 5, 'Step into comfort with our Slip-on Shoes. Featuring easy-wear design and cushioned insole, these shoes offer effortless style and comfort. With versatile color options, they\'re a perfect choice for everyday wear.', 13, 67, 'https://thumbs4.imagebam.com/c3/7b/78/MESYZRS_t.jpg'),
(40251, 'Bermuda Shorts', 1277, 'Clothes', 4, 'Embrace casual style with our Bermuda Shorts. Featuring comfortable fit and classic design, these shorts offer relaxed comfort for sunny days. With versatile styling options, they\'re a practical choice for any wardrobe.', 16, 50, 'https://thumbs4.imagebam.com/c0/7a/dc/MESYZQA_t.jpg'),
(40252, 'Turtleneck', 1272, 'Clothes', 5, 'Stay warm and stylish with our Turtleneck. Featuring cozy fabric and snug fit, this turtleneck adds a chic touch to your winter outfits. With versatile styling options, it\'s a perfect layering piece for cold days.', 11, 60, 'https://thumbs4.imagebam.com/32/1e/24/MESYZS4_t.jpg'),
(40253, 'Shift Dress', 530, 'Clothes', 4, 'Simplify your style with our Shift Dress. Featuring relaxed fit and minimalist design, this dress offers effortless elegance for any occasion. With versatile styling options, it\'s a timeless addition to your wardrobe.', 15, 71, 'https://thumbs4.imagebam.com/fe/7f/bf/MESYZRP_t.jpg'),
(40254, 'Oxford Shoes', 1334, 'Clothes', 5, 'Step out in classic style with our Oxford Shoes. Featuring leather upper and timeless design, these shoes add sophistication to your look. With versatile color options, they\'re a perfect choice for formal or casual wear.', 12, 0, 'https://thumbs4.imagebam.com/f7/41/ae/MESYZRH_t.jpg'),
(40255, 'Overalls', 1579, 'Clothes', 5, 'Embrace retro charm with our Overalls. Featuring durable fabric and relaxed fit, these overalls offer a playful and practical choice for casual days. With versatile styling options, they\'re a trendy addition to your wardrobe.', 15, 78, 'https://thumbs4.imagebam.com/fd/c9/90/MESYZRG_t.jpg'),
(40256, 'Henley Shirt', 1893, 'Clothes', 5, 'Stay casual and cool with our Henley Shirt. Featuring soft fabric and button-up neckline, this shirt offers relaxed comfort for everyday wear. With versatile styling options, it\'s a wardrobe essential for any man.', 19, 64, 'https://thumbs4.imagebam.com/1a/e6/3e/MESYZQZ_t.jpg'),
(40257, 'Midi Dress', 1226, 'Clothes', 5, 'Add elegance to your look with our Midi Dress. Featuring flattering length and chic design, this dress offers sophisticated style for any occasion. With versatile styling options, it\'s a perfect choice for day or night.', 19, 64, 'https://thumbs4.imagebam.com/a9/a7/74/MESYZRB_t.jpg'),
(40258, 'Loafers', 1451, 'Clothes', 5, 'Step into classic comfort with our Loafers. Featuring leather upper and slip-on design, these shoes offer timeless style and ease of wear. With versatile color options, they\'re a perfect choice for everyday elegance.', 19, 51, 'https://thumbs4.imagebam.com/f7/41/ae/MESYZRH_t.jpg'),
(40259, 'Palazzo Pants', 1578, 'Clothes', 5, 'Embrace flowing style with our Palazzo Pants. Featuring wide-leg design and lightweight fabric, these pants offer breezy comfort and chic flair. With versatile styling options, they\'re a fashionable choice for any occasion.', 16, 72, 'https://thumbs4.imagebam.com/77/bc/ef/MESYZRJ_t.jpg'),
(40260, 'Kimono', 1537, 'Clothes', 5, 'Add boho flair to your look with our Kimono. Featuring flowing fabric and vibrant print, this kimono adds a stylish layer to your outfit. With versatile styling options, it\'s a perfect choice for festivals or beach days.', 12, 67, 'https://thumbs4.imagebam.com/4b/13/61/MESYZR3_t.jpg'),
(40261, 'Tuxedo', 948, 'Clothes', 3, 'Dress to impress with our Tuxedo. Featuring tailored fit and classic design, this tuxedo offers sophisticated style for formal events. With versatile styling options, it\'s a timeless choice for black-tie affairs.', 12, 68, 'https://thumbs4.imagebam.com/5d/d9/d5/MESYZS3_t.jpeg'),
(40262, 'Mules', 1132, 'Clothes', 5, 'Step into sleek style with our Mules. Featuring open-back design and chic silhouette, these shoes offer effortless elegance for any occasion. With versatile color options, they\'re a perfect choice for day or night.', 14, 57, 'https://thumbs4.imagebam.com/22/b1/6d/MESYZRD_t.jpg'),
(40263, 'Fishnet Tights', 815, 'Clothes', 4, 'Add edgy flair to your look with our Fishnet Tights. Featuring stretchy fabric and bold design, these tights offer a daring and stylish accent to your outfit. With versatile styling options, they\'re a trendy choice for fashion-forward looks.', 14, 0, 'https://thumbs4.imagebam.com/9f/60/f1/MESYZQX_t.jpg'),
(40264, 'Poncho', 1682, 'Clothes', 5, 'Stay cozy in style with our Poncho. Featuring soft fabric and draped design, this poncho offers warmth and elegance for cooler days. With versatile styling options, it\'s a chic layering piece for any outfit.', 17, 76, 'https://thumbs4.imagebam.com/0f/70/14/MESYZRM_t.jpg'),
(40265, 'Slingback Pumps', 962, 'Clothes', 3, 'Elevate your look with our Slingback Pumps. Featuring sleek design and adjustable strap, these pumps add sophistication to your outfit. With versatile color options, they\'re a perfect choice for special occasions.', 11, 0, 'https://thumbs4.imagebam.com/27/cc/b9/MESYZRQ_t.jpg'),
(40266, 'Cargo Shorts', 764, 'Clothes', 3, 'Embrace casual utility with our Cargo Shorts. Featuring durable fabric and multiple pockets, these shorts offer practical storage and rugged style. With relaxed fit, they\'re perfect for outdoor adventures or casual wear.', 16, 50, 'https://thumbs4.imagebam.com/7c/1a/56/MESYZQN_t.jpg'),
(40267, 'T-shirt Dress', 1935, 'Clothes', 3, 'Keep it casual with our T-shirt Dress. Featuring relaxed fit and soft fabric, this dress offers comfort and ease for everyday wear. With versatile styling options, it\'s a perfect choice for relaxed style.', 15, 76, 'https://thumbs4.imagebam.com/f8/2a/cf/MESYZS1_t.jpg'),
(40268, 'Gladiator Sandals', 882, 'Clothes', 4, 'Step into bold style with our Gladiator Sandals. Featuring strappy design and knee-high silhouette, these sandals offer a statement-making look for summer. With versatile styling options, they\'re a trendy choice for warm weather.', 15, 59, 'https://thumbs4.imagebam.com/02/78/94/MESYZQY_t.jpg'),
(40269, 'Linen Shirt', 1105, 'Clothes', 5, 'Stay cool and stylish with our Linen Shirt. Featuring breathable fabric and classic design, this shirt offers comfort and elegance for warm weather. With versatile styling options, it\'s a perfect choice for relaxed sophistication.', 11, 80, 'https://thumbs4.imagebam.com/1d/32/7e/MESYZR6_t.jpg'),
(40270, 'Wrap Skirt', 878, 'Clothes', 3, 'Add feminine flair to your look with our Wrap Skirt. Featuring flattering fit and tie-waist design, this skirt offers graceful style for any occasion. With versatile styling options, it\'s a chic choice for day or night.', 17, 0, 'https://thumbs4.imagebam.com/ea/d3/5f/MESYZS9_t.jpg'),
(40271, 'Chelsea Boots', 575, 'Clothes', 5, 'Step out in classic style with our Chelsea Boots. Featuring leather upper and elastic side panels, these boots offer timeless elegance and ease of wear. With versatile color options, they\'re a perfect choice for any outfit.', 14, 78, 'https://thumbs4.imagebam.com/2f/55/d6/MESYZQO_t.jpg'),
(40272, 'Tulle Skirt', 1245, 'Clothes', 4, 'Embrace romantic style with our Tulle Skirt. Featuring layered tulle and elastic waistband, this skirt offers whimsical elegance for special occasions. With versatile styling options, it\'s a chic choice for formal events.', 18, 72, 'https://thumbs4.imagebam.com/b3/aa/6a/MESYZS2_t.jpg'),
(40273, 'Cowl Neck Top', 999, 'Clothes', 3, 'Add cozy elegance to your look with our Cowl Neck Top. Featuring draped neckline and soft fabric, this top offers warmth and style for cooler days. With versatile styling options, it\'s a perfect choice for relaxed sophistication.', 19, 76, 'https://thumbs4.imagebam.com/b7/80/99/MESYZQT_t.jpg'),
(40274, 'Slip Dress', 758, 'Clothes', 3, 'Simplify your style with our Slip Dress. Featuring silky fabric and minimalist design, this dress offers effortless elegance for any occasion. With versatile styling options, it\'s a timeless addition to your wardrobe.', 11, 0, 'https://thumbs4.imagebam.com/f7/2b/9f/MESYZRR_t.jpg'),
(40275, 'Combat Boots', 1797, 'Clothes', 4, 'Embrace rugged style with our Combat Boots. Featuring durable leather and lace-up design, these boots offer tough-luxe appeal for any outfit. With versatile styling options, they\'re a perfect choice for edgy looks.', 18, 0, 'https://thumbs4.imagebam.com/a3/20/e2/MESYZQR_t.jpg'),
(40276, 'Trench Skirt', 1707, 'Clothes', 5, 'Add modern flair to your look with our Trench Skirt. Featuring belted waist and classic trench details, this skirt offers stylish sophistication for any occasion. With versatile styling options, it\'s a chic choice for day or night.', 14, 67, 'https://thumbs4.imagebam.com/8e/24/ac/MESYZS0_t.jpg'),
(40277, 'Tunic', 1142, 'Clothes', 5, 'Stay comfortable and stylish with our Tunic. Featuring relaxed fit and versatile design, this tunic offers easy elegance for any occasion. With versatile styling options, it\'s a perfect choice for relaxed style.', 16, 67, 'https://thumbs4.imagebam.com/5d/d9/d5/MESYZS3_t.jpeg'),
(40278, 'Ankle Boots', 1592, 'Clothes', 4, 'Step out in style with our Ankle Boots. Featuring leather upper and block heel, these boots offer timeless elegance and comfort. With versatile color options, they\'re a perfect choice for any outfit.', 16, 0, 'https://thumbs4.imagebam.com/54/5d/1b/MESYZQ5_t.jpg'),
(40279, 'Mock Neck Top', 1034, 'Clothes', 3, 'Add chic elegance to your look with our Mock Neck Top. Featuring fitted silhouette and soft fabric, this top offers sophisticated style for any occasion. With versatile styling options, it\'s a perfect choice for day or night.', 13, 79, 'https://thumbs4.imagebam.com/e2/61/d6/MESYZRC_t.jpg'),
(40280, 'Lace Dress', 1396, 'Clothes', 4, 'Embrace feminine charm with our Lace Dress. Featuring delicate lace and flattering fit, this dress offers romantic elegance for special occasions. With versatile styling options, it\'s a chic choice for formal events.', 16, 59, 'https://thumbs4.imagebam.com/0e/c6/3a/MESYZR4_t.jpg'),
(40281, 'Chelsea Sneakers', 1876, 'Clothes', 5, 'Step into sleek style with our Chelsea Sneakers. Featuring slip-on design and elastic side panels, these sneakers offer modern flair and comfort. With versatile color options, they\'re a perfect choice for everyday wear.', 13, 73, 'https://thumbs4.imagebam.com/e8/b0/37/MESYZQQ_t.jpg');
INSERT INTO `product` (`product_id`, `Pname`, `price`, `category`, `rating`, `review`, `warehouse_id`, `stock`, `image`) VALUES
(40282, 'Cap Sleeve Top', 1689, 'Clothes', 3, 'Keep it casual and cool with our Cap Sleeve Top. Featuring soft fabric and flattering fit, this top offers comfort and style for everyday wear. With versatile styling options, it\'s a perfect choice for relaxed elegance.', 14, 76, 'https://thumbs4.imagebam.com/0e/d5/06/MESYZQI_t.jpg'),
(40283, 'Suede Jacket', 819, 'Clothes', 5, 'Elevate your outerwear with our Suede Jacket. Featuring luxurious suede and classic design, this jacket adds sophistication to your look. With versatile styling options, it\'s a perfect choice for stylish layering.', 20, 0, 'https://thumbs4.imagebam.com/92/4b/28/MESYZRV_t.jpg'),
(40284, 'Bodysuit', 1532, 'Clothes', 4, 'Streamline your look with our Bodysuit. Featuring fitted silhouette and soft fabric, this bodysuit offers sleek style and comfort. With versatile styling options, it\'s a perfect choice for effortless elegance.', 19, 57, 'https://thumbs4.imagebam.com/a7/2b/77/MESYZQD_t.jpg'),
(40285, 'Chelsea Pumps', 1698, 'Clothes', 5, 'Elevate your look with our Chelsea Pumps. Featuring sleek design and block heel, these pumps add sophistication to your outfit. With versatile color options, they\'re a perfect choice for special occasions.', 16, 61, 'https://thumbs4.imagebam.com/ef/e9/ec/MESYZQP_t.jpg'),
(40286, 'Off-the-shoulder Top', 1894, 'Clothes', 3, 'Embrace summer style with our Off-the-shoulder Top. Featuring elastic neckline and flowing fabric, this top offers breezy elegance for warm weather. With versatile styling options, it\'s a chic choice for beach days or picnics.', 19, 54, 'https://thumbs4.imagebam.com/60/e7/d0/MESYZRF_t.jpg'),
(40287, 'Anorak', 874, 'Clothes', 5, 'Stay prepared for outdoor adventures with our Anorak. Featuring water-resistant fabric and practical pockets, this jacket offers protection and utility. With versatile styling options, it\'s a perfect choice for exploring nature.', 19, 68, 'https://thumbs4.imagebam.com/68/0b/fc/MESYZQ6_t.jpg'),
(40288, 'Strappy Sandals', 1193, 'Clothes', 3, 'Step into summer with our Strappy Sandals. Featuring multiple straps and flat sole, these sandals offer casual style and comfort. With versatile color options, they\'re a perfect choice for sunny days.', 18, 65, 'https://thumbs4.imagebam.com/89/4d/b4/MESYZRT_t.jpg'),
(40291, 'Gel Pens Set', 1343, 'Stationery', 5, 'Experience smooth writing with our Gel Pens Set. Featuring vibrant colors and comfortable grip, these pens are perfect for everyday writing and creative projects.', 20, 74, 'https://thumbs4.imagebam.com/79/63/0e/MESYYYE_t.jpg'),
(40292, 'Correction Tape', 500, 'Stationery', 5, 'Make corrections with ease using our Correction Tape. Featuring precise application and quick-drying formula, this tape offers clean and efficient corrections.', 16, 0, 'https://thumbs4.imagebam.com/92/b4/47/MESYYY0_t.jpg'),
(40293, 'Pencil Case', 800, 'Stationery', 3, 'Keep your writing tools organized with our Pencil Case. Featuring durable material and spacious design, this case offers storage and protection for your pens and pencils.', 12, 69, 'https://thumbs4.imagebam.com/03/a7/71/MESYYYZ_t.jpg'),
(40294, 'Fine Liner Pens', 1133, 'Stationery', 5, 'Create precise lines with our Fine Liner Pens. Featuring fine tips and smooth ink flow, these pens are perfect for detailed drawing and writing.', 19, 0, 'https://thumbs4.imagebam.com/1b/83/89/MESYYYB_t.jpg'),
(40295, 'Sticky Flags', 400, 'Stationery', 4, 'Stay organized with our Sticky Flags. Featuring bright colors and removable adhesive, these flags are perfect for marking pages and important documents.', 20, 0, 'https://thumbs4.imagebam.com/5f/bd/1a/MESYYZ7_t.jpg'),
(40296, 'Watercolor Paint Set', 1137, 'Stationery', 3, 'Unleash your creativity with our Watercolor Paint Set. Featuring vibrant colors and high-quality pigments, this set offers smooth blending and rich hues for your artwork.', 20, 57, 'https://thumbs4.imagebam.com/82/a7/31/MESYYZS_t.jpg'),
(40297, 'Stapler', 800, 'Stationery', 4, 'Secure your documents with our Stapler. Featuring durable construction and easy-to-use design, this stapler offers reliable performance for your office needs.', 11, 72, 'https://thumbs4.imagebam.com/cd/da/f4/MESYYZP_t.jpg'),
(40298, 'Erasers Pack', 300, 'Stationery', 4, 'Correct mistakes with our Erasers Pack. Featuring soft texture and smudge-free erasing, these erasers offer clean and effective erasing for your artwork and writing.', 16, 80, 'https://thumbs4.imagebam.com/43/df/cd/MESYYZM_t.jpg'),
(40299, 'Paper Clips Set', 400, 'Stationery', 3, 'Organize your documents with our Paper Clips Set. Featuring sturdy construction and assorted sizes, these paper clips offer secure binding for your papers.', 16, 70, 'https://thumbs4.imagebam.com/4f/7e/56/MESYYYT_t.jpg'),
(40300, 'Fountain Pen Ink', 1788, 'Stationery', 5, 'Refill your fountain pen with our Fountain Pen Ink. Featuring rich color and smooth flow, this ink offers vibrant writing and effortless refilling.', 12, 61, 'https://thumbs4.imagebam.com/43/fa/0d/MESYYYC_t.jpg'),
(40302, 'Drawing Charcoal Set', 526, 'Stationery', 5, 'Explore charcoal drawing with our Drawing Charcoal Set. Featuring varied grades and smooth application, this set offers depth and texture for your artwork.', 20, 76, 'https://thumbs4.imagebam.com/f1/c4/f4/MESYYZV_t.jpg'),
(40303, 'Binder Clips', 500, 'Stationery', 4, 'Secure your documents with our Binder Clips. Featuring strong grip and durable construction, these clips offer reliable binding for your papers and files.', 13, 0, 'https://thumbs4.imagebam.com/9a/dd/d7/MESYYXT_t.jpg'),
(40304, 'Mechanical Pencils Set', 1268, 'Stationery', 3, 'Write with precision using our Mechanical Pencils Set. Featuring comfortable grip and lead advancement, these pencils offer smooth and consistent writing.', 13, 67, 'https://thumbs4.imagebam.com/62/80/9d/MESYYYM_t.jpg'),
(40305, 'Chalkboard', 1260, 'Stationery', 4, 'Express yourself with our Chalkboard. Featuring smooth surface and durable construction, this chalkboard offers a versatile canvas for your creativity.', 19, 0, 'https://thumbs4.imagebam.com/b5/16/5b/MESYYZI_t.jpg'),
(40306, 'Index Cards', 300, 'Stationery', 3, 'Stay organized with our Index Cards. Featuring sturdy material and ruled lines, these cards are perfect for notes, flashcards, and organization.', 15, 0, 'https://thumbs4.imagebam.com/5a/5c/db/MESYYZN_t.jpg'),
(40307, 'Charcoal Pencils', 1998, 'Stationery', 3, 'Explore sketching with our Charcoal Pencils. Featuring smooth application and varied grades, these pencils offer depth and contrast for your drawings.', 17, 50, 'https://thumbs4.imagebam.com/f8/d4/9b/MESYYXY_t.jpg'),
(40308, 'Scissors Set', 800, 'Stationery', 5, 'Cut with precision using our Scissors Set. Featuring sharp blades and comfortable handles, this set offers reliable cutting for your projects.', 18, 0, 'https://thumbs4.imagebam.com/3b/b6/b6/MESYYZU_t.jpg'),
(40309, 'Calligraphy Ink', 1207, 'Stationery', 4, 'Enhance your calligraphy with our Calligraphy Ink. Featuring rich color and smooth flow, this ink offers vibrant writing and elegant strokes for your calligraphy.', 18, 75, 'https://thumbs4.imagebam.com/c4/3a/88/MESYYXV_t.jpg'),
(40310, 'Letter Opener', 600, 'Stationery', 5, 'Open your mail with ease using our Letter Opener. Featuring sharp blade and elegant design, this opener offers clean and efficient opening for your envelopes.', 18, 72, 'https://thumbs4.imagebam.com/66/9e/6b/MESYYZT_t.jpg'),
(40311, 'Washable Markers', 1044, 'Stationery', 3, 'Create colorful artwork with our Washable Markers. Featuring bright colors and washable ink, these markers offer vibrant drawing and easy cleanup.', 14, 0, 'https://thumbs4.imagebam.com/2a/eb/ec/MESYYZB_t.jpg'),
(40313, 'Postcard Set', 500, 'Stationery', 5, 'Share your thoughts with our Postcard Set. Featuring assorted designs and durable material, these postcards offer a creative way to connect with loved ones.', 16, 75, 'https://thumbs4.imagebam.com/c6/18/b8/MESYYZO_t.jpg'),
(40314, 'Colored Pencils Set', 1097, 'Stationery', 4, 'Color with creativity using our Colored Pencils Set. Featuring vibrant colors and smooth application, this set offers rich hues and blendability for your artwork.', 15, 0, 'https://thumbs4.imagebam.com/24/83/19/MESYYXZ_t.jpg'),
(40315, 'Envelope Seals', 400, 'Stationery', 4, 'Add a personal touch with our Envelope Seals. Featuring elegant designs and secure adhesive, these seals offer a decorative and practical closure for your envelopes.', 20, 53, 'https://thumbs4.imagebam.com/db/ec/d7/MESYYZL_t.jpg'),
(40316, 'Ruler Set', 600, 'Stationery', 3, 'Measure with precision using our Ruler Set. Featuring clear markings and durable material, this set offers accurate measuring for your projects.', 12, 79, 'https://thumbs4.imagebam.com/46/d9/42/MESYYZ5_t.jpg'),
(40317, 'Paper Trimmer', 1856, 'Stationery', 4, 'Cut with accuracy using our Paper Trimmer. Featuring sharp blade and precise guide, this trimmer offers clean and straight cutting for your papers and photos.', 20, 63, 'https://thumbs4.imagebam.com/00/93/d8/MESYYYX_t.jpg'),
(40318, 'Origami Paper Set', 800, 'Stationery', 4, 'Fold with creativity using our Origami Paper Set. Featuring vibrant colors and crisp folds, this set offers a versatile canvas for your origami creations.', 12, 0, 'https://thumbs4.imagebam.com/3f/a0/d2/MESYYYS_t.jpg'),
(40319, 'Highlighter Pen', 500, 'Stationery', 4, 'Highlight with clarity using our Highlighter Pen. Featuring bright ink and chisel tip, this pen offers clear and precise highlighting for your documents.', 13, 68, 'https://thumbs4.imagebam.com/32/fd/f5/MESYYYH_t.jpg'),
(40320, 'Craft Scissors', 700, 'Stationery', 3, 'Cut with creativity using our Craft Scissors. Featuring decorative blades and comfortable handles, these scissors offer stylish cutting for your craft projects.', 16, 0, 'https://thumbs4.imagebam.com/79/f0/79/MESYYXG_t.jpg'),
(40321, 'Push Pins Set', 400, 'Stationery', 3, 'Secure your documents with our Push Pins Set. Featuring colorful designs and sharp tips, these pins offer secure attachment for your papers and memos.', 11, 0, 'https://thumbs4.imagebam.com/ba/21/f1/MESYYZ1_t.jpg'),
(40322, 'Stamp Set', 900, 'Stationery', 3, 'Personalize your belongings with our Stamp Set. Featuring assorted designs and durable construction, this set offers a creative way to mark and decorate.', 16, 55, 'https://thumbs4.imagebam.com/ed/e9/70/MESYYZ6_t.jpg'),
(40323, 'Embroidery Kit', 984, 'Stationery', 3, 'Stitch with creativity using our Embroidery Kit. Featuring vibrant threads and easy-to-follow patterns, this kit offers a relaxing and artistic hobby.', 18, 76, 'https://thumbs4.imagebam.com/f9/56/70/MESYYYA_t.jpg'),
(40324, 'Notebook Cover', 1853, 'Stationery', 5, 'Protect your notes with our Notebook Cover. Featuring durable material and stylish design, this cover offers protection and organization for your notebooks.', 12, 75, 'https://thumbs4.imagebam.com/c4/83/03/MESYYYO_t.jpg'),
(40325, 'Mechanical Eraser', 400, 'Stationery', 3, 'Correct with precision using our Mechanical Eraser. Featuring precise erasing and comfortable grip, this eraser offers clean and efficient corrections.', 14, 65, 'https://thumbs4.imagebam.com/e9/62/6e/MESYYYL_t.jpg'),
(40326, 'Craft Knife Set', 900, 'Stationery', 5, 'Cut with precision using our Craft Knife Set. Featuring sharp blades and comfortable handles, this set offers detailed cutting for your craft projects.', 14, 53, 'https://thumbs4.imagebam.com/51/82/3a/MESYYY1_t.jpg'),
(40327, 'Magnifying Glass', 600, 'Stationery', 5, 'Explore details with our Magnifying Glass. Featuring clear lens and comfortable handle, this glass offers enhanced visibility for reading and inspection.', 18, 80, 'https://thumbs4.imagebam.com/b4/e7/04/MESYYYK_t.jpg'),
(40328, 'Drawing Board', 1314, 'Stationery', 4, 'Create with stability using our Drawing Board. Featuring sturdy surface and adjustable angle, this board offers a versatile workspace for your artwork.', 16, 0, 'https://thumbs4.imagebam.com/92/65/3d/MESYYY7_t.jpg'),
(40329, 'File Folders Set', 800, 'Stationery', 4, 'Organize your documents with our File Folders Set. Featuring sturdy construction and assorted colors, these folders offer secure storage and easy access.', 15, 0, 'https://thumbs4.imagebam.com/6a/c5/c4/MESYYXK_t.jpg'),
(40330, 'Ink Cartridges', 511, 'Stationery', 4, 'Refill your pens with our Ink Cartridges. Featuring rich color and smooth flow, these cartridges offer vibrant writing and effortless refilling.', 17, 59, 'https://thumbs4.imagebam.com/8e/02/6f/MESYYYI_t.jpg'),
(40331, 'Pencil Grips', 300, 'Stationery', 4, 'Write comfortably with our Pencil Grips. Featuring ergonomic design and soft material, these grips offer improved grip and reduced hand fatigue.', 12, 55, 'https://thumbs4.imagebam.com/c3/f3/15/MESYYXO_t.jpg'),
(40332, 'Notebook Refill', 600, 'Stationery', 3, 'Continue writing with our Notebook Refill. Featuring ruled pages and durable binding, this refill offers extended use for your favorite notebook.', 16, 51, 'https://thumbs4.imagebam.com/a7/80/ed/MESYYYP_t.jpg'),
(40333, 'Glue Stick', 300, 'Stationery', 5, 'Adhere with ease using our Glue Stick. Featuring strong adhesive and mess-free application, this stick offers reliable bonding for your projects.', 14, 68, 'https://thumbs4.imagebam.com/6e/da/d5/MESYYYF_t.jpg'),
(40334, 'Memo Board', 700, 'Stationery', 5, 'Stay organized with our Memo Board. Featuring magnetic surface and stylish design, this board offers a convenient way to display notes and reminders.', 13, 76, 'https://thumbs4.imagebam.com/47/c0/28/MESYYYN_t.jpg'),
(40335, 'Desk Mat', 800, 'Stationery', 5, 'Protect your desk with our Desk Mat. Featuring smooth surface and durable material, this mat offers a comfortable and organized workspace.', 20, 66, 'https://thumbs4.imagebam.com/56/ee/04/MESYYY5_t.jpg'),
(40336, 'Writing Desk', 1116, 'Stationery', 4, 'Write with style using our Writing Desk. Featuring elegant design and spacious surface, this desk offers a comfortable and organized workspace for your writing.', 13, 0, 'https://thumbs4.imagebam.com/96/5b/fd/MESYYZF_t.jpg'),
(40337, 'Paper Weight', 600, 'Stationery', 4, 'Keep your papers in place with our Paper Weight. Featuring sturdy construction and elegant design, this weight offers secure organization for your documents.', 12, 0, 'https://thumbs4.imagebam.com/bc/b8/a7/MESYYYY_t.jpg'),
(40338, 'Desk Lamp', 544, 'Stationery', 5, 'Illuminate your workspace with our Desk Lamp. Featuring adjustable brightness and sleek design, this lamp offers focused lighting for your tasks.', 13, 77, 'https://thumbs4.imagebam.com/6e/0a/83/MESYYZJ_t.jpg'),
(40339, 'Stencil Set', 700, 'Stationery', 5, 'Create with precision using our Stencil Set. Featuring assorted designs and durable material, this set offers versatile stenciling for your projects.', 19, 56, 'https://thumbs4.imagebam.com/59/ed/7c/MESYYXQ_t.jpg'),
(40340, 'Craft Punches', 800, 'Stationery', 4, 'Punch with creativity using our Craft Punches. Featuring decorative designs and easy operation, these punches offer stylish shaping for your crafts.', 16, 63, 'https://thumbs4.imagebam.com/91/3a/d1/MESYYXF_t.jpg'),
(40341, 'Quill Pen Set', 1873, 'Stationery', 3, 'Write with elegance using our Quill Pen Set. Featuring classic design and smooth flow, this set offers a sophisticated writing experience.', 20, 64, 'https://thumbs4.imagebam.com/0e/96/33/MESYYZ4_t.jpg'),
(40342, 'Card Holder', 500, 'Stationery', 4, 'Organize your cards with our Card Holder. Featuring stylish design and durable material, this holder offers secure storage for your business cards and IDs.', 12, 54, 'https://thumbs4.imagebam.com/38/ac/38/MESYYXW_t.jpg'),
(40343, 'Fountain Pen Nib', 1232, 'Stationery', 3, 'Customize your fountain pen with our Fountain Pen Nib. Featuring fine tip and smooth flow, this nib offers precise writing and elegant strokes.', 20, 58, 'https://thumbs4.imagebam.com/fa/48/65/MESYYXL_t.jpg'),
(40344, 'Sketching Pencils', 1542, 'Stationery', 4, 'Sketch with depth using our Sketching Pencils. Featuring varied grades and smooth application, these pencils offer versatility and control for your drawings.', 14, 79, 'https://thumbs4.imagebam.com/25/78/44/MESYYXP_t.jpg'),
(40345, 'Calligraphy Brushes', 511, 'Stationery', 4, 'Enhance your calligraphy with our Calligraphy Brushes. Featuring soft bristles and ergonomic design, these brushes offer graceful strokes and precise control.', 11, 76, 'https://thumbs4.imagebam.com/95/18/da/MESYYXD_t.jpg'),
(40346, 'Bookends', 800, 'Stationery', 5, 'Organize your books with our Bookends. Featuring sturdy construction and stylish design, these bookends offer secure support and elegant display for your books.', 20, 66, 'https://thumbs4.imagebam.com/cd/77/f2/MESYYXU_t.jpg'),
(40347, 'Drawing Mannequin', 1934, 'Stationery', 5, 'Explore anatomy with our Drawing Mannequin. Featuring adjustable joints and realistic proportions, this mannequin offers a versatile reference for your drawings.', 18, 51, 'https://thumbs4.imagebam.com/dd/74/7e/MESYYY8_t.jpg'),
(40348, 'Inkwell', 700, 'Stationery', 5, 'Refill your ink with our Inkwell. Featuring elegant design and secure lid, this well offers convenient and stylish storage for your ink.', 17, 0, 'https://thumbs4.imagebam.com/00/8e/e1/MESYYXM_t.jpg'),
(40349, 'Clipboard', 500, 'Stationery', 3, 'Write on the go with our Clipboard. Featuring sturdy clip and durable surface, this board offers a portable and organized writing platform.', 13, 57, 'https://thumbs4.imagebam.com/a5/cd/2a/MESYYXE_t.jpg'),
(40350, 'Address Book', 600, 'Stationery', 4, 'Keep your contacts organized with our Address Book. Featuring alphabetical tabs and durable cover, this book offers a convenient and secure way to store addresses.', 12, 55, 'https://thumbs4.imagebam.com/41/7c/e2/MESYYXA_t.png'),
(40351, 'Paper Shredder', 1635, 'Stationery', 4, 'Dispose of documents securely with our Paper Shredder. Featuring cross-cut blades and safety features, this shredder offers reliable and safe shredding for your papers.', 12, 0, 'https://thumbs4.imagebam.com/d7/5a/36/MESYYYV_t.jpg'),
(40352, 'Sticky Note Dispenser', 400, 'Stationery', 3, 'Dispense notes with ease using our Sticky Note Dispenser. Featuring convenient design and weighted base, this dispenser offers easy access and organization for your notes.', 12, 64, 'https://thumbs4.imagebam.com/30/68/9c/MESYYZR_t.jpg'),
(40353, 'Weekly Planner Pad', 800, 'Stationery', 4, 'Plan your week with our Weekly Planner Pad. Featuring dated pages and spacious layout, this pad offers organized and efficient planning for your week.', 15, 73, 'https://thumbs4.imagebam.com/f0/8c/32/MESYYZE_t.png'),
(40354, 'Bookmarks Set', 400, 'Stationery', 3, 'Mark your pages with our Bookmarks Set. Featuring assorted designs and durable material, these bookmarks offer a decorative and practical way to save your place.', 20, 61, 'https://thumbs4.imagebam.com/51/71/22/MESYYXB_t.jpg'),
(40355, 'Sticker Book', 700, 'Stationery', 5, 'Decorate with fun using our Sticker Book. Featuring assorted designs and vibrant colors, this book offers endless creative possibilities for your projects.', 13, 69, 'https://thumbs4.imagebam.com/df/0d/f1/MESYYXS_t.jpg'),
(40356, 'Desk Calendar', 900, 'Stationery', 3, 'Stay organized with our Desk Calendar. Featuring monthly pages and stylish design, this calendar offers a convenient and elegant way to track your schedule.', 14, 80, 'https://thumbs4.imagebam.com/74/de/4c/MESYYXH_t.jpg'),
(40357, 'Ink Pad', 500, 'Stationery', 5, 'Stamp with ease using our Ink Pad. Featuring quick-drying ink and vibrant colors, this pad offers smooth and clear stamping for your projects.', 19, 0, 'https://thumbs4.imagebam.com/f7/a7/96/MESYYYJ_t.jpg'),
(40358, 'Sticky Note Holder', 400, 'Stationery', 3, 'Organize your notes with our Sticky Note Holder. Featuring convenient design and stylish look, this holder offers easy access and display for your sticky notes.', 13, 65, 'https://thumbs4.imagebam.com/0d/9d/6c/MESYYZ9_t.jpg'),
(40359, 'Notebook Stand', 800, 'Stationery', 4, 'Write comfortably with our Notebook Stand. Featuring adjustable angle and sturdy construction, this stand offers ergonomic positioning for your notebook.', 16, 58, 'https://thumbs4.imagebam.com/b8/c0/41/MESYYYR_t.jpg'),
(40360, 'Task Organizer', 1871, 'Stationery', 5, 'Manage your tasks with our Task Organizer. Featuring multiple compartments and clear labeling, this organizer offers efficient and organized storage for your tasks.', 12, 0, 'https://thumbs4.imagebam.com/67/67/0c/MESYYZA_t.png'),
(40361, 'Writing Slope', 950, 'Stationery', 3, 'Write with comfort using our Writing Slope. Featuring angled surface and durable material, this slope offers ergonomic positioning for your writing tasks.', 20, 0, 'https://thumbs4.imagebam.com/70/c1/f5/MESYYZG_t.jpg'),
(40362, 'Craft Paper Roll', 700, 'Stationery', 5, 'Create with versatility using our Craft Paper Roll. Featuring durable material and generous length, this roll offers a versatile canvas for your crafts and projects.', 13, 0, 'https://thumbs4.imagebam.com/bf/19/14/MESYYY2_t.jpg'),
(40363, 'Gel Pen Refills', 600, 'Stationery', 5, 'Extend the life of your gel pens with our Gel Pen Refills. Featuring smooth ink and easy installation, these refills offer continued writing enjoyment for your pens.', 17, 66, 'https://thumbs4.imagebam.com/4b/5d/ef/MESYYYD_t.jpg'),
(40364, 'Chalk Markers', 1640, 'Stationery', 5, 'Write with vibrancy using our Chalk Markers. Featuring bright colors and easy application, these markers offer bold and creative drawing on chalkboards and more.', 12, 0, 'https://thumbs4.imagebam.com/bb/6a/0c/MESYYZH_t.jpg'),
(40365, 'Desk Clock', 900, 'Stationery', 5, 'Keep track of time with our Desk Clock. Featuring accurate movement and stylish design, this clock offers reliable timekeeping for your workspace.', 12, 0, 'https://thumbs4.imagebam.com/5f/49/76/MESYYY4_t.jpg'),
(40366, 'Quill Pen Holder', 600, 'Stationery', 4, 'Display your quill pen with our Quill Pen Holder. Featuring elegant design and secure base, this holder offers a stylish and organized showcase for your quill pen.', 14, 69, 'https://thumbs4.imagebam.com/7f/e4/e2/MESYYZ3_t.jpg'),
(40367, 'Eraser Shield', 300, 'Stationery', 4, 'Erase with precision using our Eraser Shield. Featuring varied cutouts and durable material, this shield offers controlled erasing for your detailed work.', 11, 50, 'https://thumbs4.imagebam.com/8e/eb/bb/MESYYXI_t.jpg'),
(40368, 'Page Flags', 400, 'Stationery', 4, 'Mark your pages with our Page Flags. Featuring vibrant colors and adhesive back, these flags offer a decorative and practical way to highlight your pages.', 12, 0, 'https://thumbs4.imagebam.com/7c/15/c1/MESYYXN_t.jpg'),
(40369, 'Desk Tidy', 700, 'Stationery', 5, 'Organize your desk with our Desk Tidy. Featuring multiple compartments and durable material, this tidy offers efficient storage and easy access for your supplies.', 16, 79, 'https://thumbs4.imagebam.com/75/27/c6/MESYYY6_t.jpg'),
(40370, 'Weekly Planner Book', 1850, 'Stationery', 5, 'Plan your week with our Weekly Planner Book. Featuring dated pages and spacious layout, this book offers organized and efficient planning for your week.', 13, 55, 'https://thumbs4.imagebam.com/49/18/c0/MESYYZC_t.jpg'),
(40371, 'Bath Salt Set', 825, 'Self Care', 5, 'Indulge in a relaxing bath with our Bath Salt Set. Featuring aromatic blends and skin-nourishing minerals, this set offers a rejuvenating experience for your senses and skin.', 18, 50, 'https://thumbs4.imagebam.com/69/6f/c2/MESYZ97_t.jpg'),
(40372, 'Eye Mask', 300, 'Self Care', 5, 'Enjoy restful sleep with our Eye Mask. Featuring soft material and adjustable strap, this mask offers comfortable blackout for your eyes.', 19, 66, 'https://thumbs4.imagebam.com/36/75/35/MESYZ9K_t.jpg'),
(40373, 'Body Lotion', 1080, 'Self Care', 5, 'Hydrate your skin with our Body Lotion. Featuring nourishing ingredients and lightweight formula, this lotion offers moisturized and smooth skin.', 11, 68, 'https://thumbs4.imagebam.com/09/d0/7e/MESYZ9C_t.jpg'),
(40374, 'Essential Oils Set', 925, 'Self Care', 3, 'Create a calming ambiance with our Essential Oils Set. Featuring pure oils and versatile scents, this set offers aromatic bliss for your home and well-being.', 16, 63, 'https://thumbs4.imagebam.com/c5/a4/89/MESYZ81_t.jpg'),
(40375, 'Pedicure Kit', 885, 'Self Care', 5, 'Treat your feet with our Pedicure Kit. Featuring essential tools and soothing treatments, this kit offers pampering care for your feet.', 17, 61, 'https://thumbs4.imagebam.com/72/3b/6f/MESYZ9Y_t.jpg'),
(40376, 'Sleep Mask', 350, 'Self Care', 4, 'Enhance your sleep with our Sleep Mask. Featuring soft padding and contoured design, this mask offers comfortable darkness for restful sleep.', 18, 0, 'https://thumbs4.imagebam.com/e6/11/c2/MESYZA1_t.jpg'),
(40377, 'Massage Oil', 1149, 'Self Care', 5, 'Relax your muscles with our Massage Oil. Featuring soothing blends and smooth glide, this oil offers therapeutic relief for your body.', 18, 61, 'https://thumbs4.imagebam.com/c7/e5/d4/MESYZ8H_t.jpg'),
(40378, 'Exfoliating Gloves', 400, 'Self Care', 5, 'Renew your skin with our Exfoliating Gloves. Featuring textured surface and gentle exfoliation, these gloves offer smooth and radiant skin.', 17, 0, 'https://thumbs4.imagebam.com/f4/96/22/MESYZAC_t.jpg'),
(40379, 'Shampoo Bar', 800, 'Self Care', 3, 'Cleanse your hair naturally with our Shampoo Bar. Featuring nourishing ingredients and eco-friendly design, this bar offers gentle and effective cleansing for your hair.', 20, 0, 'https://thumbs4.imagebam.com/c6/e3/8f/MESYZAR_t.jpg'),
(40380, 'Facial Scrub', 1090, 'Self Care', 4, 'Revitalize your skin with our Facial Scrub. Featuring gentle exfoliants and moisturizing agents, this scrub offers smooth and radiant complexion.', 16, 56, 'https://thumbs4.imagebam.com/48/ff/ef/MESYZAU_t.jpg'),
(40381, 'Bath Bomb Set', 1503, 'Self Care', 4, 'Enjoy a luxurious bath with our Bath Bomb Set. Featuring aromatic fizz and skin-loving ingredients, this set offers a soothing and indulgent bath experience.', 13, 61, 'https://thumbs4.imagebam.com/9d/9e/68/MESYZ7B_t.jpg'),
(40382, 'Aloe Vera Gel', 700, 'Self Care', 3, 'Soothe your skin with our Aloe Vera Gel. Featuring pure aloe extract and cooling sensation, this gel offers relief for sunburns and irritated skin.', 13, 58, 'https://thumbs4.imagebam.com/c5/f8/05/MESYZA7_t.jpg'),
(40383, 'Massage Roller', 900, 'Self Care', 4, 'Ease muscle tension with our Massage Roller. Featuring ergonomic design and smooth glide, this roller offers targeted relief for sore muscles.', 19, 58, 'https://thumbs4.imagebam.com/31/a4/01/MESYZ9X_t.jpg'),
(40384, 'Cuticle Oil', 500, 'Self Care', 5, 'Nourish your nails with our Cuticle Oil. Featuring hydrating oils and vitamins, this oil offers healthy and strong nails.', 12, 67, 'https://thumbs4.imagebam.com/ef/55/cd/MESYZAM_t.jpg'),
(40385, 'Scented Body Wash', 742, 'Self Care', 3, 'Refresh your senses with our Scented Body Wash. Featuring aromatic blends and nourishing formula, this wash offers a luxurious cleansing experience.', 16, 80, 'https://thumbs4.imagebam.com/09/9d/f7/MESYZAO_t.jpg'),
(40386, 'Hair Serum', 1707, 'Self Care', 5, 'Tame frizz and add shine with our Hair Serum. Featuring lightweight formula and nourishing oils, this serum offers silky and smooth hair.', 11, 57, 'https://thumbs4.imagebam.com/9d/50/4b/MESYZ8C_t.jpg'),
(40387, 'Relaxation Tea Set', 800, 'Self Care', 5, 'Unwind with our Relaxation Tea Set. Featuring calming blends and aromatic infusions, this set offers a soothing beverage for relaxation.', 16, 57, 'https://thumbs4.imagebam.com/4a/78/18/MESYZA0_t.jpg'),
(40388, 'Shower Gel', 1304, 'Self Care', 4, 'Cleanse and refresh with our Shower Gel. Featuring gentle formula and invigorating scents, this gel offers a revitalizing shower experience.', 16, 0, 'https://thumbs4.imagebam.com/09/2c/7b/MESYZA5_t.jpg'),
(40389, 'Body Butter', 899, 'Self Care', 3, 'Nourish your skin with our Body Butter. Featuring creamy texture and hydrating ingredients, this butter offers deep moisturization and soft skin.', 14, 75, 'https://thumbs4.imagebam.com/af/21/7b/MESYZ9A_t.jpg'),
(40390, 'Foot Soak', 900, 'Self Care', 4, 'Revive tired feet with our Foot Soak. Featuring relaxing salts and aromatic blends, this soak offers soothing relief for your feet.', 19, 0, 'https://thumbs4.imagebam.com/50/65/fd/MESYZ9P_t.jpg'),
(40391, 'Beard Oil', 800, 'Self Care', 3, 'Maintain a healthy beard with our Beard Oil. Featuring nourishing oils and subtle fragrance, this oil offers soft and conditioned beard.', 13, 0, 'https://thumbs4.imagebam.com/fb/b7/a9/MESYZ7O_t.jpg'),
(40392, 'Massage Candle', 1586, 'Self Care', 5, 'Set the mood with our Massage Candle. Featuring aromatic wax and skin-nourishing oils, this candle offers soothing ambiance and massage oil in one.', 18, 79, 'https://thumbs4.imagebam.com/ef/55/cd/MESYZAM_t.jpg'),
(40393, 'Body Oil', 1733, 'Self Care', 4, 'Hydrate and nourish with our Body Oil. Featuring lightweight formula and aromatic blends, this oil offers silky and smooth skin.', 12, 52, 'https://thumbs4.imagebam.com/33/cb/c3/MESYZ9E_t.jpg'),
(40394, 'Scented Sachets', 600, 'Self Care', 3, 'Freshen your spaces with our Scented Sachets. Featuring aromatic blends and decorative designs, these sachets offer long-lasting fragrance for your home.', 14, 67, 'https://thumbs4.imagebam.com/2d/96/fb/MESYZ8X_t.jpg'),
(40395, 'Foot Scrub', 1906, 'Self Care', 3, 'Renew your feet with our Foot Scrub. Featuring exfoliating agents and soothing ingredients, this scrub offers soft and revitalized feet.', 16, 67, 'https://thumbs4.imagebam.com/a0/71/9f/MESYZAG_t.jpg'),
(40396, 'Beard Balm', 850, 'Self Care', 5, 'Style and nourish your beard with our Beard Balm. Featuring conditioning agents and subtle hold, this balm offers well-groomed and healthy beard.', 15, 0, 'https://thumbs4.imagebam.com/ef/49/4e/MESYZ99_t.jpg'),
(40397, 'Hand Sanitizer Set', 400, 'Self Care', 4, 'Stay germ-free with our Hand Sanitizer Set. Featuring effective formula and portable design, this set offers convenient hand hygiene on-the-go.', 15, 0, 'https://thumbs4.imagebam.com/31/48/cd/MESYZAJ_t.jpg'),
(40398, 'Body Mist', 900, 'Self Care', 4, 'Refresh your senses with our Body Mist. Featuring light fragrance and hydrating agents, this mist offers a quick and delightful scent boost.', 12, 62, 'https://thumbs4.imagebam.com/f3/9b/b8/MESYZ7U_t.jpg'),
(40399, 'Hair Brush Set', 828, 'Self Care', 3, 'Style your hair with our Hair Brush Set. Featuring ergonomic designs and gentle bristles, this set offers effective and comfortable hair grooming.', 15, 0, 'https://thumbs4.imagebam.com/9a/9a/d0/MESYZ9Q_t.jpg'),
(40400, 'Hair Detangler', 700, 'Self Care', 3, 'Ease out tangles with our Hair Detangler. Featuring conditioning agents and easy glide, this detangler offers smooth and knot-free hair.', 16, 69, 'https://thumbs4.imagebam.com/78/fa/46/MESYZ9S_t.jpg'),
(40401, 'Nail Care Kit', 926, 'Self Care', 4, 'Maintain healthy nails with our Nail Care Kit. Featuring essential tools and treatments, this kit offers grooming and care for your nails.', 15, 68, 'https://thumbs4.imagebam.com/94/75/f1/MESYZ8N_t.jpg'),
(40402, 'Aromatherapy Roller', 1644, 'Self Care', 5, 'Find balance with our Aromatherapy Roller. Featuring calming blends and convenient application, this roller offers therapeutic relief anytime, anywhere.', 15, 51, 'https://thumbs4.imagebam.com/29/ce/70/MESYZ96_t.jpg'),
(40403, 'Bubble Bath', 1942, 'Self Care', 5, 'Indulge in a bubbly bath with our Bubble Bath. Featuring luxurious bubbles and soothing scents, this bath offers a relaxing and fun experience.', 12, 0, 'https://thumbs4.imagebam.com/3f/48/13/MESYZAA_t.jpg'),
(40404, 'Scalp Massager', 500, 'Self Care', 5, 'Revitalize your scalp with our Scalp Massager. Featuring gentle bristles and ergonomic design, this massager offers soothing and stimulating scalp massage.', 13, 68, 'https://thumbs4.imagebam.com/00/4c/68/MESYZ8Q_t.jpg'),
(40405, 'Moisturizing Gloves', 600, 'Self Care', 5, 'Hydrate your hands with our Moisturizing Gloves. Featuring nourishing materials and comfortable fit, these gloves offer soft and moisturized hands.', 17, 61, 'https://thumbs4.imagebam.com/8e/e0/08/MESYZ8J_t.jpg'),
(40406, 'Foot Cream', 800, 'Self Care', 5, 'Soften and soothe your feet with our Foot Cream. Featuring moisturizing agents and refreshing scents, this cream offers smooth and revived feet.', 17, 80, 'https://thumbs4.imagebam.com/21/3c/cb/MESYZ9M_t.jpg'),
(40407, 'Body Wash Infusion', 1275, 'Self Care', 3, 'Elevate your shower with our Body Wash Infusion. Featuring aromatic blends and nourishing formula, this wash offers a luxurious and refreshing cleanse.', 14, 0, 'https://thumbs4.imagebam.com/46/c1/15/MESYZ7Y_t.jpg'),
(40408, 'Bath Tea Bags', 1550, 'Self Care', 3, 'Enjoy a therapeutic bath with our Bath Tea Bags. Featuring aromatic herbs and soothing salts, these tea bags offer a relaxing and rejuvenating bath experience.', 17, 80, 'https://thumbs4.imagebam.com/ce/1f/f6/MESYZ7K_t.jpg'),
(40409, 'Muscle Soak', 1926, 'Self Care', 5, 'Relieve muscle tension with our Muscle Soak. Featuring therapeutic salts and soothing oils, this soak offers relief and relaxation for tired muscles.', 11, 69, 'https://thumbs4.imagebam.com/9e/6c/a0/MESYZ8L_t.jpg'),
(40410, 'Hair Mask', 1478, 'Self Care', 5, 'Nourish and repair your hair with our Hair Mask. Featuring deep conditioning agents and revitalizing ingredients, this mask offers strong and healthy hair.', 16, 53, 'https://thumbs4.imagebam.com/d8/c9/9c/MESYZ8A_t.jpg'),
(40411, 'Hair Tonic', 1111, 'Self Care', 5, 'Stimulate hair growth with our Hair Tonic. Featuring nourishing extracts and revitalizing agents, this tonic offers fuller and healthier hair.', 17, 0, 'https://thumbs4.imagebam.com/a1/f9/d2/MESYZ8D_t.jpg'),
(40412, 'Cuticle Cream', 500, 'Self Care', 4, 'Nourish your cuticles with our Cuticle Cream. Featuring moisturizing agents and vitamins, this cream offers healthy and strong nails.', 14, 57, 'https://thumbs4.imagebam.com/53/8b/44/MESYZA3_t.jpg'),
(40413, 'Body Powder', 700, 'Self Care', 4, 'Stay fresh and dry with our Body Powder. Featuring absorbent formula and subtle fragrance, this powder offers comfort and freshness all day long.', 20, 0, 'https://thumbs4.imagebam.com/54/e1/18/MESYZ7W_t.jpg'),
(40414, 'Facial Toner', 621, 'Self Care', 3, 'Balance and refresh your skin with our Facial Toner. Featuring hydrating agents and natural extracts, this toner offers toned and revitalized complexion.', 16, 0, 'https://thumbs4.imagebam.com/9f/a6/3b/MESYZ85_t.jpg'),
(40415, 'Scented Drawer Liners', 600, 'Self Care', 2, 'Infuse your drawers with our Scented Drawer Liners. Featuring aromatic blends and decorative designs, these liners offer fragrant and organized storage.', 19, 56, 'https://thumbs4.imagebam.com/bb/b8/9d/MESYZ8T_t.jpg'),
(40416, 'Face Roller', 775, 'Self Care', 5, 'Boost your skincare routine with our Face Roller. Featuring cooling sensation and gentle massage, this roller offers relaxed and radiant complexion.', 17, 69, 'https://thumbs4.imagebam.com/7f/75/8a/MESYZ86_t.jpg'),
(40417, 'Shower Steamers', 800, 'Self Care', 4, 'Elevate your shower with our Shower Steamers. Featuring aromatic blends and effervescent action, these steamers offer a spa-like experience in your shower.', 17, 68, 'https://thumbs4.imagebam.com/e4/64/29/MESYZ94_t.jpg'),
(40418, 'Hair Revitalizer', 1514, 'Self Care', 3, 'Revive dull hair with our Hair Revitalizer. Featuring nourishing agents and shine boosters, this revitalizer offers lustrous and healthy hair.', 13, 0, 'https://thumbs4.imagebam.com/23/13/2a/MESYZ8B_t.jpg'),
(40419, 'Lip Scrub', 600, 'Self Care', 5, 'Exfoliate and soften your lips with our Lip Scrub. Featuring gentle exfoliants and moisturizing agents, this scrub offers smooth and kissable lips.', 16, 68, 'https://thumbs4.imagebam.com/23/10/4b/MESYZ9V_t.jpg'),
(40420, 'Foot Spray', 400, 'Self Care', 3, 'Refresh tired feet with our Foot Spray. Featuring cooling sensation and aromatic scents, this spray offers instant relief and freshness for your feet.', 11, 70, 'https://thumbs4.imagebam.com/98/34/09/MESYZ88_t.jpg'),
(40421, 'Body Serum', 1743, 'Self Care', 3, 'Nourish and glow with our Body Serum. Featuring lightweight formula and hydrating agents, this serum offers radiant and moisturized skin.', 14, 69, 'https://thumbs4.imagebam.com/0f/b0/22/MESYZ9H_t.jpg'),
(40422, 'Bath Oil', 670, 'Self Care', 3, 'Hydrate and relax with our Bath Oil. Featuring aromatic blends and nourishing oils, this oil offers a luxurious and soothing bath experience.', 19, 53, 'https://thumbs4.imagebam.com/a6/7d/9e/MESYZ7G_t.jpg'),
(40423, 'Shower Scrub', 625, 'Self Care', 3, 'Cleanse and exfoliate with our Shower Scrub. Featuring gentle exfoliants and moisturizing formula, this scrub offers smooth and revitalized skin.', 20, 0, 'https://thumbs4.imagebam.com/9b/bb/1d/MESYZ92_t.jpg'),
(40424, 'Face Mist', 900, 'Self Care', 4, 'Refresh and hydrate your skin with our Face Mist. Featuring revitalizing agents and soothing scents, this mist offers instant hydration and glow.', 13, 53, 'https://thumbs4.imagebam.com/c3/b7/d9/MESYZ76_t.jpg'),
(40425, 'Nail Polish Remover Pads', 400, 'Self Care', 3, 'Easily remove nail polish with our Nail Polish Remover Pads. Featuring effective formula and convenient pads, these removers offer quick and mess-free nail care.', 16, 64, 'https://thumbs4.imagebam.com/45/d1/b2/MESYZ8P_t.jpg'),
(40426, 'Bath Pillow', 800, 'Self Care', 4, 'Relax comfortably in the bath with our Bath Pillow. Featuring cushioned support and waterproof design, this pillow offers luxurious and relaxing baths.', 20, 50, 'https://thumbs4.imagebam.com/40/13/0c/MESYZ7J_t.jpg'),
(40427, 'Scented Linen Spray', 700, 'Self Care', 4, 'Freshen your linens with our Scented Linen Spray. Featuring aromatic blends and long-lasting fragrance, this spray offers fragrant and cozy home ambiance.', 13, 0, 'https://thumbs4.imagebam.com/d9/50/dc/MESYZ8W_t.jpg'),
(40428, 'Foot Mask', 900, 'Self Care', 3, 'Rejuvenate your feet with our Foot Mask. Featuring nourishing agents and soothing treatment, this mask offers soft and pampered feet.', 15, 0, 'https://thumbs4.imagebam.com/2f/a1/9a/MESYZ87_t.jpg'),
(40429, 'Shaving Cream', 600, 'Self Care', 5, 'Achieve a smooth shave with our Shaving Cream. Featuring rich lather and soothing agents, this cream offers comfortable and close shave.', 14, 0, 'https://thumbs4.imagebam.com/3a/0b/67/MESYZ8Z_t.jpg'),
(40430, 'Body Cleanser', 614, 'Self Care', 3, 'Cleanse and refresh with our Body Cleanser. Featuring gentle formula and invigorating scents, this cleanser offers a revitalizing shower experience.', 14, 55, 'https://thumbs4.imagebam.com/10/18/de/MESYZ7R_t.jpg'),
(40431, 'Beard Wash', 800, 'Self Care', 5, 'Cleanse and condition your beard with our Beard Wash. Featuring nourishing agents and refreshing scents, this wash offers soft and healthy beard.', 20, 0, 'https://thumbs4.imagebam.com/d8/ac/b4/MESYZ7Q_t.jpg'),
(40432, 'Hair Perfume', 696, 'Self Care', 3, 'Refresh and scent your hair with our Hair Perfume. Featuring long-lasting fragrance and lightweight formula, this perfume offers fragrant and shiny hair.', 15, 58, 'https://thumbs4.imagebam.com/fb/64/fa/MESYZ78_t.jpg'),
(40433, 'Scented Hand Wash', 500, 'Self Care', 4, 'Cleanse and indulge with our Scented Hand Wash. Featuring aromatic blends and moisturizing formula, this wash offers luxurious and clean hands.', 14, 54, 'https://thumbs4.imagebam.com/d3/ae/4f/MESYZ8U_t.jpg'),
(40434, 'Bath Milk', 1139, 'Self Care', 3, 'Soothe and moisturize your skin with our Bath Milk. Featuring nourishing ingredients and creamy formula, this milk offers a relaxing and hydrating bath.', 17, 75, 'https://thumbs4.imagebam.com/28/85/24/MESYZ7F_t.jpg'),
(40435, 'Facial Serum', 1607, 'Self Care', 5, 'Revitalize your skin with our Facial Serum. Featuring potent ingredients and lightweight formula, this serum offers radiant and youthful complexion.', 11, 73, 'https://thumbs4.imagebam.com/f6/80/70/MESYZ84_t.jpg'),
(40436, 'Hand Scrub', 700, 'Self Care', 5, 'Exfoliate and soften your hands with our Hand Scrub. Featuring gentle exfoliants and moisturizing agents, this scrub offers smooth and pampered hands.', 14, 59, 'https://thumbs4.imagebam.com/9f/6d/7d/MESYZ8E_t.jpg'),
(40437, 'Cuticle Remover', 400, 'Self Care', 3, 'Clean and shape your nails with our Cuticle Remover. Featuring effective formula and easy application, this remover offers neat and tidy nails.', 16, 56, 'https://thumbs4.imagebam.com/46/c1/15/MESYZ7Y_t.jpg'),
(40438, 'Body Gel', 900, 'Self Care', 5, 'Hydrate and refresh with our Body Gel. Featuring lightweight formula and soothing agents, this gel offers cool and moisturized skin.', 17, 53, 'https://thumbs4.imagebam.com/ba/1e/3c/MESYZ7T_t.jpg'),
(40439, 'Bath Melt', 1117, 'Self Care', 3, 'Indulge in a luxurious bath with our Bath Melt. Featuring nourishing oils and aromatic scents, this melt offers a soothing and moisturizing bath experience.', 19, 79, 'https://thumbs4.imagebam.com/43/a0/aa/MESYZ7D_t.jpg'),
(40440, 'Hand Wash Refill', 400, 'Self Care', 5, 'Refill and save with our Hand Wash Refill. Featuring economical pack and gentle formula, this refill offers convenient and clean hands.', 12, 63, 'https://thumbs4.imagebam.com/4b/0f/3e/MESYZ8F_t.jpg'),
(40441, 'Foot Gel', 600, 'Self Care', 3, 'Revive tired feet with our Foot Gel. Featuring cooling sensation and hydrating agents, this gel offers instant relief and freshness for your feet.', 12, 58, 'https://thumbs4.imagebam.com/7f/75/8a/MESYZ86_t.jpg'),
(40442, 'Hair Gloss', 1764, 'Self Care', 5, 'Enhance shine and manageability with our Hair Gloss. Featuring light-reflecting agents and nourishing oils, this gloss offers glossy and healthy-looking hair.', 15, 54, 'https://thumbs4.imagebam.com/8b/21/d3/MESYZ89_t.jpg'),
(40443, 'Lip Treatment', 700, 'Self Care', 3, 'Nourish and protect your lips with our Lip Treatment. Featuring hydrating agents and UV protection, this treatment offers soft and healthy lips.', 19, 75, 'https://thumbs4.imagebam.com/0b/58/f4/MESYZ8G_t.jpg'),
(40444, 'Body Polish', 1968, 'Self Care', 5, 'Exfoliate and renew your skin with our Body Polish. Featuring gentle exfoliants and moisturizing agents, this polish offers smooth and radiant skin.', 11, 73, 'https://thumbs4.imagebam.com/65/4d/eb/MESYZ7V_t.jpg'),
(40445, 'Shaving Gel', 500, 'Self Care', 3, 'Achieve a smooth shave with our Shaving Gel. Featuring rich lather and soothing agents, this gel offers comfortable and close shave.', 14, 59, 'https://thumbs4.imagebam.com/d1/42/51/MESYZ90_t.jpg'),
(40446, 'Face Oil', 1045, 'Self Care', 3, 'Nourish and rejuvenate your skin with our Face Oil. Featuring potent antioxidants and hydrating agents, this oil offers radiant and youthful complexion.', 17, 59, 'https://thumbs4.imagebam.com/61/0b/90/MESYZ82_t.jpg'),
(40447, 'After Shave Lotion', 700, 'Self Care', 4, 'Soothe and refresh your skin post-shave with our After Shave Lotion. Featuring calming agents and hydrating formula, this lotion offers smooth and revitalized skin.', 14, 67, 'https://thumbs4.imagebam.com/5a/7d/73/MESYZ79_t.jpg'),
(40448, 'Body Soufflé', 1825, 'Self Care', 4, 'Hydrate and nourish with our Body Soufflé. Featuring whipped texture and moisturizing agents, this soufflé offers silky and soft skin.', 17, 78, 'https://thumbs4.imagebam.com/a4/f3/89/MESYZ7X_t.jpg'),
(40449, 'Bath Salts Infusion', 985, 'Self Care', 4, 'Rejuvenate in a therapeutic bath with our Bath Salts Infusion. Featuring aromatic salts and soothing herbs, this infusion offers a relaxing and detoxifying bath experience.', 15, 0, 'https://thumbs4.imagebam.com/ce/1f/f6/MESYZ7K_t.jpg'),
(40450, 'Scented Body Oil', 1956, 'Self Care', 4, 'Hydrate and scent your skin with our Scented Body Oil. Featuring nourishing oils and captivating scents, this oil offers radiant and fragrant skin.', 11, 0, 'https://thumbs4.imagebam.com/20/4d/a6/MESYZ8S_t.jpg'),
(40451, 'Pulse Oximeter', 1821, 'Health Care', 5, 'Monitor your oxygen levels with our Pulse Oximeter. Featuring accurate readings and easy-to-read display, this device offers peace of mind for your health.', 18, 0, 'https://thumbs4.imagebam.com/e1/2e/f7/MESYZLG_t.jpg'),
(40452, 'Medical Gloves', 400, 'Health Care', 3, 'Protect your hands with our Medical Gloves. Featuring latex-free material and comfortable fit, these gloves offer safe and hygienic use.', 19, 64, 'https://thumbs4.imagebam.com/17/69/72/MESYZM4_t.jpg'),
(40453, 'Cold Pack', 600, 'Health Care', 5, 'Relieve pain and swelling with our Cold Pack. Featuring flexible design and long-lasting cold therapy, this pack offers soothing relief.', 12, 52, 'https://thumbs4.imagebam.com/73/fc/ab/MESYZMI_t.jpg'),
(40454, 'Nasal Spray', 550, 'Health Care', 3, 'Clear congestion with our Nasal Spray. Featuring fast-acting formula and gentle mist, this spray offers quick and effective relief.', 20, 0, 'https://thumbs4.imagebam.com/14/3e/46/MESYZMG_t.jpg'),
(40455, 'Cough Drops', 250, 'Health Care', 3, 'Soothe your throat with our Cough Drops. Featuring menthol and honey, these drops offer comforting relief from cough and sore throat.', 14, 69, 'https://thumbs4.imagebam.com/88/e5/33/MESYZLU_t.jpg'),
(40456, 'Antiseptic Wipes', 300, 'Health Care', 3, 'Cleanse and disinfect with our Antiseptic Wipes. Featuring antibacterial formula and convenient packaging, these wipes offer on-the-go protection.', 19, 56, 'https://thumbs4.imagebam.com/c8/ee/22/MESYZKD_t.jpg'),
(40457, 'Eye Drops', 350, 'Health Care', 5, 'Refresh and soothe your eyes with our Eye Drops. Featuring lubricating agents and gentle formula, these drops offer relief from dry and irritated eyes.', 11, 0, 'https://thumbs4.imagebam.com/a3/c1/c8/MESYZMC_t.jpg'),
(40458, 'Antibacterial Soap', 200, 'Health Care', 5, 'Cleanse and protect with our Antibacterial Soap. Featuring germ-fighting ingredients and moisturizing formula, this soap offers clean and soft hands.', 11, 0, 'https://thumbs4.imagebam.com/00/e2/ed/MESYZLT_t.jpg'),
(40459, 'Ear Plugs', 150, 'Health Care', 5, 'Block out noise with our Ear Plugs. Featuring comfortable fit and noise reduction, these plugs offer peaceful and undisturbed rest.', 18, 0, 'https://thumbs4.imagebam.com/95/65/09/MESYZKU_t.jpg'),
(40460, 'Antacid Tablets', 350, 'Health Care', 4, 'Relieve heartburn with our Antacid Tablets. Featuring fast-acting formula and soothing relief, these tablets offer comfort after meals.', 18, 74, 'https://thumbs4.imagebam.com/76/ef/21/MESYZLS_t.jpg'),
(40461, 'Lip Balm with SPF', 180, 'Health Care', 4, 'Protect and moisturize your lips with our Lip Balm with SPF. Featuring sun protection and nourishing agents, this balm offers soft and shielded lips.', 17, 51, 'https://thumbs4.imagebam.com/d7/8f/e6/MESYZM2_t.jpg'),
(40462, 'Electrolyte Powder', 500, 'Health Care', 3, 'Rehydrate and replenish with our Electrolyte Powder. Featuring essential minerals and refreshing flavors, this powder offers quick recovery after workouts.', 20, 75, 'https://thumbs4.imagebam.com/06/cc/07/MESYZLX_t.jpg'),
(40463, 'Allergy Relief Tablets', 400, 'Health Care', 3, 'Alleviate allergy symptoms with our Allergy Relief Tablets. Featuring antihistamine formula and non-drowsy relief, these tablets offer comfort from allergies.', 19, 79, 'https://thumbs4.imagebam.com/96/04/7b/MESYZM9_t.jpg'),
(40464, 'Motion Sickness Bands', 350, 'Health Care', 4, 'Prevent motion sickness with our Motion Sickness Bands. Featuring acupressure points and comfortable design, these bands offer nausea-free travels.', 15, 62, 'https://thumbs4.imagebam.com/07/58/77/MESYZME_t.jpg'),
(40465, 'Calamine Lotion', 300, 'Health Care', 5, 'Soothe skin irritations with our Calamine Lotion. Featuring cooling relief and gentle formula, this lotion offers comfort from itching and rashes.', 16, 51, 'https://thumbs4.imagebam.com/dc/d2/72/MESYZMA_t.jpg'),
(40466, 'Anti-Itch Cream', 250, 'Health Care', 5, 'Relieve itching with our Anti-Itch Cream. Featuring soothing agents and fast-acting formula, this cream offers relief from insect bites and skin irritations.', 15, 0, 'https://thumbs4.imagebam.com/fe/c8/7a/MESYZKB_t.jpg'),
(40467, 'Insect Repellent Spray', 400, 'Health Care', 5, 'Repel insects with our Insect Repellent Spray. Featuring DEET-free formula and long-lasting protection, this spray offers bug-free outdoor experiences.', 16, 0, 'https://thumbs4.imagebam.com/59/09/0c/MESYZM0_t.jpg'),
(40468, 'Hand Cream with SPF', 300, 'Health Care', 4, 'Moisturize and protect your hands with our Hand Cream with SPF. Featuring sun protection and nourishing agents, this cream offers soft and shielded hands.', 17, 64, 'https://thumbs4.imagebam.com/3d/a0/4e/MESYZLZ_t.jpg'),
(40469, 'Dental Floss Picks', 200, 'Health Care', 4, 'Clean between teeth with our Dental Floss Picks. Featuring easy-glide design and minty freshness, these picks offer effective plaque removal.', 14, 58, 'https://thumbs4.imagebam.com/22/3f/ac/MESYZMB_t.jpg'),
(40470, 'Zinc Supplements', 450, 'Health Care', 3, 'Boost your immune system with our Zinc Supplements. Featuring essential mineral and easy-to-swallow capsules, these supplements offer immune support.', 20, 77, 'https://thumbs4.imagebam.com/f2/81/36/MESYZM8_t.jpg'),
(40471, 'Multivitamin Tablets', 500, 'Health Care', 4, 'Support your overall health with our Multivitamin Tablets. Featuring essential vitamins and minerals, these tablets offer daily wellness support.', 19, 72, 'https://thumbs4.imagebam.com/62/76/d7/MESYZMF_t.jpg'),
(40472, 'Fiber Supplements', 350, 'Health Care', 3, 'Improve digestion with our Fiber Supplements. Featuring natural fiber and easy-to-take capsules, these supplements offer digestive health support.', 13, 78, 'https://thumbs4.imagebam.com/0e/cb/50/MESYZKZ_t.jpg'),
(40473, 'Omega-3 Fish Oil', 600, 'Health Care', 5, 'Support heart health with our Omega-3 Fish Oil. Featuring essential fatty acids and purity-tested formula, this oil offers cardiovascular support.', 16, 63, 'https://thumbs4.imagebam.com/12/5e/9e/MESYZMH_t.jpg');
INSERT INTO `product` (`product_id`, `Pname`, `price`, `category`, `rating`, `review`, `warehouse_id`, `stock`, `image`) VALUES
(40474, 'Calcium Supplements', 400, 'Health Care', 3, 'Strengthen bones with our Calcium Supplements. Featuring bone-supporting minerals and easy absorption, these supplements offer bone health support.', 20, 64, 'https://thumbs4.imagebam.com/11/ae/98/MESYZKO_t.jpg'),
(40475, 'Iron Supplements', 350, 'Health Care', 5, 'Boost energy levels with our Iron Supplements. Featuring iron-rich formula and gentle absorption, these supplements offer energy and vitality.', 14, 0, 'https://thumbs4.imagebam.com/74/cc/ae/MESYZM1_t.jpg'),
(40476, 'Probiotic Capsules', 550, 'Health Care', 5, 'Balance gut health with our Probiotic Capsules. Featuring beneficial bacteria and shelf-stable formula, these capsules offer digestive balance.', 17, 67, 'https://thumbs4.imagebam.com/f7/8b/68/MESYZLF_t.jpg'),
(40477, 'Digestive Enzymes', 450, 'Health Care', 3, 'Aid digestion with our Digestive Enzymes. Featuring enzyme-rich formula and easy digestion, these enzymes offer support for healthy digestion.', 11, 74, 'https://thumbs4.imagebam.com/c2/dd/cb/MESYZKT_t.jpg'),
(40478, 'Magnesium Supplements', 400, 'Health Care', 4, 'Relax muscles with our Magnesium Supplements. Featuring muscle-supporting mineral and easy absorption, these supplements offer muscle relaxation.', 17, 60, 'https://thumbs4.imagebam.com/d5/48/14/MESYZM3_t.jpg'),
(40479, 'Melatonin Tablets', 300, 'Health Care', 4, 'Improve sleep quality with our Melatonin Tablets. Featuring sleep-supporting hormone and fast-acting formula, these tablets offer restful sleep.', 11, 58, 'https://thumbs4.imagebam.com/06/c4/bb/MESYZM5_t.jpg'),
(40480, 'Vitamin D Supplements', 350, 'Health Care', 5, 'Boost bone health with our Vitamin D Supplements. Featuring bone-supporting vitamin and easy absorption, these supplements offer bone strength.', 12, 0, 'https://thumbs4.imagebam.com/4c/a5/eb/MESYZLR_t.jpg'),
(40481, 'Glucosamine Tablets', 450, 'Health Care', 5, 'Support joint health with our Glucosamine Tablets. Featuring joint-supporting compound and easy-to-take tablets, these supplements offer joint comfort.', 16, 52, 'https://thumbs4.imagebam.com/11/4a/01/MESYZMD_t.jpg'),
(40482, 'Elderberry Syrup', 600, 'Health Care', 4, 'Boost immune system with our Elderberry Syrup. Featuring immune-boosting berries and tasty formula, this syrup offers immune support.', 15, 59, 'https://thumbs4.imagebam.com/b0/2e/96/MESYZLW_t.jpg'),
(40483, 'Cough Syrup', 350, 'Health Care', 3, 'Relieve cough symptoms with our Cough Syrup. Featuring soothing agents and effective formula, this syrup offers comforting relief.', 17, 57, 'https://thumbs4.imagebam.com/1e/49/22/MESYZLV_t.jpg'),
(40484, 'Echinacea Supplements', 450, 'Health Care', 3, 'Strengthen immune system with our Echinacea Supplements. Featuring immune-boosting herb and easy-to-swallow capsules, these supplements offer immune support.', 20, 58, 'https://thumbs4.imagebam.com/4c/2f/09/MESYZKV_t.jpg'),
(40485, 'Turmeric Capsules', 500, 'Health Care', 3, 'Support joint health with our Turmeric Capsules. Featuring anti-inflammatory compound and easy absorption, these capsules offer joint comfort.', 17, 72, 'https://thumbs4.imagebam.com/61/dc/7a/MESYZM7_t.jpg'),
(40486, 'Green Tea Extract', 400, 'Health Care', 3, 'Boost metabolism with our Green Tea Extract. Featuring antioxidant-rich formula and easy-to-take capsules, this extract offers metabolic support.', 17, 73, 'https://thumbs4.imagebam.com/b5/e6/44/MESYZL3_t.jpg'),
(40487, 'Ginseng Supplements', 550, 'Health Care', 4, 'Boost energy levels with our Ginseng Supplements. Featuring energy-boosting herb and easy-to-swallow capsules, these supplements offer vitality and stamina.', 11, 70, 'https://thumbs4.imagebam.com/4f/bd/df/MESYZL2_t.jpg'),
(40488, 'Lavender Oil', 600, 'Health Care', 3, 'Relax and unwind with our Lavender Oil. Featuring calming aroma and pure extraction, this oil offers relaxation and stress relief.', 14, 80, 'https://thumbs4.imagebam.com/de/e8/05/MESYZL6_t.jpg'),
(40489, 'Peppermint Oil', 500, 'Health Care', 4, 'Refresh and invigorate with our Peppermint Oil. Featuring cooling sensation and pure extraction, this oil offers revitalizing experience.', 18, 78, 'https://thumbs4.imagebam.com/fb/83/35/MESYZLE_t.jpg'),
(40490, 'Chamomile Tea', 300, 'Health Care', 5, 'Relax and soothe with our Chamomile Tea. Featuring calming herb and aromatic flavor, this tea offers relaxation and comfort.', 18, 72, 'https://thumbs4.imagebam.com/34/fd/de/MESYZKP_t.jpg'),
(40491, 'Eucalyptus Oil', 550, 'Health Care', 5, 'Clear congestion with our Eucalyptus Oil. Featuring refreshing scent and pure extraction, this oil offers respiratory relief.', 16, 0, 'https://thumbs4.imagebam.com/ce/9b/ae/MESYZKW_t.jpg'),
(40492, 'Rosehip Oil', 650, 'Health Care', 5, 'Nourish and rejuvenate with our Rosehip Oil. Featuring skin-loving nutrients and pure extraction, this oil offers radiant and youthful skin.', 16, 50, 'https://thumbs4.imagebam.com/d9/61/3c/MESYZLJ_t.jpg'),
(40493, 'Tea Tree Oil', 550, 'Health Care', 3, 'Cleanse and purify with our Tea Tree Oil. Featuring antiseptic properties and pure extraction, this oil offers clean and clear skin.', 20, 0, 'https://thumbs4.imagebam.com/88/f2/da/MESYZM6_t.jpg'),
(40494, 'Aloe Vera Gel Capsules', 400, 'Health Care', 3, 'Soothe and heal with our Aloe Vera Gel Capsules. Featuring skin-soothing gel and easy-to-swallow capsules, these capsules offer skin relief and healing.', 12, 0, 'https://thumbs4.imagebam.com/ea/28/46/MESYZL0_t.jpg'),
(40495, 'St. John\'s Wort Capsules', 450, 'Health Care', 4, 'Elevate mood with our St. John\'s Wort Capsules. Featuring mood-enhancing herb and easy absorption, these capsules offer mood support.', 17, 0, 'https://thumbs4.imagebam.com/70/53/04/MESYZLP_t.jpg'),
(40496, 'Arnica Gel', 500, 'Health Care', 4, 'Relieve pain and inflammation with our Arnica Gel. Featuring natural healing agents and fast absorption, this gel offers pain relief.', 12, 63, 'https://thumbs4.imagebam.com/38/cc/ee/MESYZKF_t.jpg'),
(40497, 'Lavender Salve', 600, 'Health Care', 3, 'Nourish and soothe with our Lavender Salve. Featuring calming aroma and skin-loving ingredients, this salve offers skin comfort and hydration.', 15, 0, 'https://thumbs4.imagebam.com/17/78/42/MESYZL7_t.jpg'),
(40498, 'Immune Support Supplements', 550, 'Health Care', 4, 'Boost immune system with our Immune Support Supplements. Featuring immune-boosting nutrients and easy absorption, these supplements offer immune support.', 12, 0, 'https://thumbs4.imagebam.com/d6/18/45/MESYZL5_t.jpg'),
(40499, 'L-Lysine Supplements', 450, 'Health Care', 4, 'Support immune health with our L-Lysine Supplements. Featuring immune-boosting amino acid and easy-to-take capsules, these supplements offer immune support.', 12, 0, 'https://thumbs4.imagebam.com/ae/e6/ab/MESYZL8_t.jpg'),
(40500, 'Ginkgo Biloba Capsules', 500, 'Health Care', 5, 'Improve cognitive function with our Ginkgo Biloba Capsules. Featuring memory-enhancing herb and easy absorption, these capsules offer cognitive support.', 12, 65, 'https://thumbs4.imagebam.com/0b/e8/68/MESYZKY_t.jpg'),
(40501, 'Milk Thistle Capsules', 450, 'Health Care', 4, 'Support liver health with our Milk Thistle Capsules. Featuring liver-cleansing herb and easy absorption, these capsules offer liver support.', 17, 0, 'https://thumbs4.imagebam.com/f4/50/72/MESYZLA_t.jpg'),
(40502, 'Chlorella Tablets', 400, 'Health Care', 4, 'Detoxify and cleanse with our Chlorella Tablets. Featuring detoxifying algae and easy-to-swallow tablets, these tablets offer body cleanse.', 18, 61, 'https://thumbs4.imagebam.com/97/22/a9/MESYZKQ_t.jpg'),
(40503, 'Spirulina Powder', 550, 'Health Care', 4, 'Boost energy and vitality with our Spirulina Powder. Featuring nutrient-rich algae and easy mixing, this powder offers energy and wellness.', 16, 0, 'https://thumbs4.imagebam.com/02/26/75/MESYZLM_t.jpg'),
(40504, 'Ashwagandha Capsules', 500, 'Health Care', 5, 'Reduce stress and anxiety with our Ashwagandha Capsules. Featuring adaptogenic herb and easy absorption, these capsules offer stress relief.', 17, 57, 'https://thumbs4.imagebam.com/4d/d5/b4/MESYZKH_t.jpg'),
(40505, 'Rhodiola Rosea Supplements', 550, 'Health Care', 4, 'Boost energy and endurance with our Rhodiola Rosea Supplements. Featuring energy-boosting herb and easy-to-take capsules, these supplements offer vitality.', 16, 74, 'https://thumbs4.imagebam.com/7d/d2/02/MESYZLI_t.jpg'),
(40506, 'Maca Root Powder', 500, 'Health Care', 5, 'Enhance stamina and libido with our Maca Root Powder. Featuring energizing root and easy mixing, this powder offers vitality and wellness.', 19, 57, 'https://thumbs4.imagebam.com/dd/2d/f0/MESYZL9_t.jpg'),
(40507, 'Valerian Root Capsules', 450, 'Health Care', 3, 'Improve sleep quality with our Valerian Root Capsules. Featuring sleep-promoting herb and easy absorption, these capsules offer restful sleep.', 15, 75, 'https://thumbs4.imagebam.com/47/a6/a8/MESYZLQ_t.jpg'),
(40508, 'Moringa Powder', 550, 'Health Care', 3, 'Boost nutrition with our Moringa Powder. Featuring nutrient-rich leaves and easy mixing, this powder offers superfood nutrition.', 17, 62, 'https://thumbs4.imagebam.com/2e/75/cb/MESYZLC_t.jpg'),
(40509, 'Fenugreek Capsules', 450, 'Health Care', 4, 'Support digestive health with our Fenugreek Capsules. Featuring digestive-aiding herb and easy-to-swallow capsules, these capsules offer digestive support.', 19, 0, 'https://thumbs4.imagebam.com/c7/b0/93/MESYZLY_t.jpg'),
(40510, 'Saw Palmetto Capsules', 500, 'Health Care', 5, 'Support prostate health with our Saw Palmetto Capsules. Featuring prostate-supporting herb and easy absorption, these capsules offer prostate health.', 13, 0, 'https://thumbs4.imagebam.com/08/bb/ab/MESYZLK_t.jpg'),
(40511, 'Black Cohosh Supplements', 550, 'Health Care', 4, 'Relieve menopause symptoms with our Black Cohosh Supplements. Featuring menopause-easing herb and easy-to-take capsules, these supplements offer menopause relief.', 19, 0, 'https://thumbs4.imagebam.com/59/71/1d/MESYZKM_t.jpg'),
(40512, 'Evening Primrose Oil', 600, 'Health Care', 4, 'Balance hormones with our Evening Primrose Oil. Featuring hormone-regulating oil and pure extraction, this oil offers hormonal balance.', 17, 0, 'https://thumbs4.imagebam.com/52/e6/88/MESYZKX_t.jpg'),
(40521, 'Kitchen Utensil Set', 1200, 'Household', 5, 'Equip your kitchen with our Kitchen Utensil Set. Featuring essential tools and durable construction, this set offers convenience and efficiency.', 17, 72, 'https://thumbs4.imagebam.com/b2/99/e9/MESYZJV_t.jpg'),
(40522, 'Ironing Board', 1500, 'Household', 5, 'Make ironing easy with our Ironing Board. Featuring sturdy design and adjustable height, this board offers comfort and convenience.', 14, 0, 'https://thumbs4.imagebam.com/12/70/85/MESYZKG_t.jpg'),
(40523, 'Coffee Maker', 2500, 'Household', 5, 'Brew your favorite coffee with our Coffee Maker. Featuring programmable settings and sleek design, this maker offers delicious coffee every time.', 20, 78, 'https://thumbs4.imagebam.com/b8/19/5a/MESYZKE_t.jpg'),
(40524, 'Oven Mitts Set', 800, 'Household', 3, 'Protect your hands with our Oven Mitts Set. Featuring heat-resistant material and comfortable fit, these mitts offer safety and convenience.', 15, 0, 'https://thumbs4.imagebam.com/61/65/e8/MESYZJY_t.jpg'),
(40525, 'Food Storage Containers', 1800, 'Household', 4, 'Organize your kitchen with our Food Storage Containers. Featuring airtight seals and stackable design, these containers offer freshness and space-saving.', 15, 56, 'https://thumbs4.imagebam.com/30/ad/27/MESYZJR_t.jpg'),
(40526, 'Blender', 3000, 'Household', 4, 'Blend ingredients effortlessly with our Blender. Featuring powerful motor and multiple speed settings, this blender offers smooth results.', 18, 0, 'https://thumbs4.imagebam.com/b6/fb/58/MESYZIB_t.jpg'),
(40527, 'Cutlery Set', 3500, 'Household', 3, 'Dine in style with our Cutlery Set. Featuring high-quality stainless steel and elegant design, this set offers dining elegance.', 16, 65, 'https://thumbs4.imagebam.com/e6/49/2c/MESYZJO_t.jpg'),
(40528, 'Electric Kettle', 2000, 'Household', 4, 'Boil water quickly with our Electric Kettle. Featuring rapid boil technology and safety features, this kettle offers convenience and efficiency.', 14, 57, 'https://thumbs4.imagebam.com/2b/24/62/MESYZKN_t.jpg'),
(40529, 'Bread Bin', 1200, 'Household', 4, 'Keep your bread fresh with our Bread Bin. Featuring airtight lid and spacious interior, this bin offers freshness and organization.', 14, 72, 'https://thumbs4.imagebam.com/1e/e2/99/MESYZJL_t.jpg'),
(40530, 'Salad Spinner', 1500, 'Household', 3, 'Prepare salads effortlessly with our Salad Spinner. Featuring easy-to-use design and efficient drying, this spinner offers salad preparation ease.', 15, 78, 'https://thumbs4.imagebam.com/56/b4/f3/MESYZK3_t.jpg'),
(40531, 'Juicer', 3500, 'Household', 4, 'Enjoy fresh juices with our Juicer. Featuring powerful extraction and easy cleaning, this juicer offers healthy beverages in minutes.', 15, 0, 'https://thumbs4.imagebam.com/da/5f/67/MESYZJ0_t.jpg'),
(40532, 'Toaster', 2500, 'Household', 3, 'Toast bread to perfection with our Toaster. Featuring multiple settings and stylish design, this toaster offers delicious toast every time.', 18, 0, 'https://thumbs4.imagebam.com/11/09/5e/MESYZKK_t.jpg'),
(40533, 'Spice Rack', 1000, 'Household', 5, 'Organize spices neatly with our Spice Rack. Featuring compact design and easy access, this rack offers spice organization and convenience.', 13, 78, 'https://thumbs4.imagebam.com/22/a5/30/MESYZK6_t.jpg'),
(40534, 'Dish Towel Set', 800, 'Household', 3, 'Dry dishes efficiently with our Dish Towel Set. Featuring absorbent material and stylish design, these towels offer drying ease and kitchen style.', 12, 70, 'https://thumbs4.imagebam.com/c0/62/18/MESYZKL_t.jpg'),
(40535, 'Mixer', 4000, 'Household', 4, 'Mix ingredients effortlessly with our Mixer. Featuring powerful motor and multiple attachments, this mixer offers versatile mixing options.', 11, 64, 'https://thumbs4.imagebam.com/7d/25/c7/MESYZKI_t.jpg'),
(40536, 'Kitchen Scale', 1800, 'Household', 5, 'Measure ingredients accurately with our Kitchen Scale. Featuring precise measurements and compact design, this scale offers accuracy and convenience.', 19, 0, 'https://thumbs4.imagebam.com/9a/30/ec/MESYZJU_t.jpg'),
(40537, 'Slow Cooker', 4000, 'Household', 3, 'Cook delicious meals slowly with our Slow Cooker. Featuring programmable settings and large capacity, this cooker offers flavorful meals with ease.', 11, 69, 'https://thumbs4.imagebam.com/a1/fe/7d/MESYZK5_t.jpg'),
(40538, 'Wine Opener Set', 1500, 'Household', 3, 'Open wine bottles effortlessly with our Wine Opener Set. Featuring ergonomic design and multiple accessories, this set offers wine opening ease.', 19, 78, 'https://thumbs4.imagebam.com/87/d8/02/MESYZKJ_t.jpg'),
(40539, 'Tea Infuser', 600, 'Household', 3, 'Brew tea easily with our Tea Infuser. Featuring fine mesh and durable construction, this infuser offers flavorful tea every time.', 11, 72, 'https://thumbs4.imagebam.com/36/11/2c/MESYZK7_t.jpg'),
(40540, 'Microwave Oven', 8000, 'Household', 5, 'Heat and cook food quickly with our Microwave Oven. Featuring multiple settings and spacious interior, this oven offers cooking convenience.', 18, 74, 'https://thumbs4.imagebam.com/e9/58/e3/MESYZJX_t.jpg'),
(40541, 'Waffle Maker', 3500, 'Household', 3, 'Make delicious waffles with our Waffle Maker. Featuring non-stick plates and indicator lights, this maker offers perfect waffles every time.', 17, 76, 'https://thumbs4.imagebam.com/81/d8/9c/MESYZK8_t.jpg'),
(40542, 'Pressure Cooker', 5000, 'Household', 5, 'Cook meals faster with our Pressure Cooker. Featuring safety features and durable construction, this cooker offers efficient cooking.', 19, 0, 'https://thumbs4.imagebam.com/f5/96/6f/MESYZK0_t.jpg'),
(40543, 'Canister Set', 2000, 'Household', 5, 'Store kitchen essentials with our Canister Set. Featuring airtight lids and stylish design, these canisters offer storage convenience.', 15, 77, 'https://thumbs4.imagebam.com/6a/b0/af/MESYZJM_t.jpg'),
(40544, 'Coffee Grinder', 2500, 'Household', 4, 'Grind coffee beans effortlessly with our Coffee Grinder. Featuring adjustable settings and durable blades, this grinder offers fresh coffee grounds.', 16, 74, 'https://thumbs4.imagebam.com/a1/7c/7b/MESYZJN_t.jpg'),
(40545, 'Casserole Dish', 3000, 'Household', 5, 'Bake and serve delicious meals with our Casserole Dish. Featuring oven-safe design and elegant look, this dish offers versatile cooking and serving.', 13, 58, 'https://thumbs4.imagebam.com/8d/7e/6c/MESYZKC_t.jpg'),
(40546, 'Electric Griddle', 4000, 'Household', 5, 'Cook pancakes and more with our Electric Griddle. Featuring non-stick surface and adjustable temperature, this griddle offers versatile cooking.', 18, 80, 'https://thumbs4.imagebam.com/12/70/85/MESYZKG_t.jpg'),
(40547, 'Food Processor', 6000, 'Household', 4, 'Process ingredients quickly with our Food Processor. Featuring powerful motor and multiple attachments, this processor offers efficient food preparation.', 19, 0, 'https://thumbs4.imagebam.com/b7/58/5b/MESYZJQ_t.jpg'),
(40548, 'Air Fryer', 5500, 'Household', 5, 'Fry foods with less oil using our Air Fryer. Featuring rapid air circulation and preset functions, this fryer offers healthier frying options.', 13, 66, 'https://thumbs4.imagebam.com/53/de/11/MESYZJK_t.jpg'),
(40549, 'Grilling Tools Set', 3500, 'Household', 5, 'Grill like a pro with our Grilling Tools Set. Featuring high-quality tools and storage case, this set offers grilling convenience.', 15, 62, 'https://thumbs4.imagebam.com/3d/f6/ae/MESYZJS_t.jpg'),
(40550, 'Rice Cooker', 4500, 'Household', 4, 'Cook perfect rice with our Rice Cooker. Featuring one-touch operation and keep-warm function, this cooker offers fluffy rice every time.', 17, 60, 'https://thumbs4.imagebam.com/03/6a/e9/MESYZK1_t.jpg'),
(40551, 'Roasting Pan', 4000, 'Household', 5, 'Roast meats and vegetables with our Roasting Pan. Featuring non-stick surface and durable construction, this pan offers even cooking.', 20, 0, 'https://thumbs4.imagebam.com/ab/94/db/MESYZK2_t.jpg'),
(40552, 'Espresso Machine', 8000, 'Household', 4, 'Brew espresso at home with our Espresso Machine. Featuring steam wand and compact design, this machine offers cafe-quality espresso.', 20, 71, 'https://thumbs4.imagebam.com/99/8c/cd/MESYZIT_t.jpg'),
(40553, 'Ice Cream Maker', 6500, 'Household', 4, 'Make delicious ice cream at home with our Ice Cream Maker. Featuring automatic mixing and freezer bowl, this maker offers homemade ice cream.', 17, 75, 'https://thumbs4.imagebam.com/48/bc/cf/MESYZJT_t.jpg'),
(40554, 'Food Steamer', 3500, 'Household', 3, 'Steam vegetables and more with our Food Steamer. Featuring multi-tiered design and timer settings, this steamer offers healthy cooking.', 17, 50, 'https://thumbs4.imagebam.com/b4/15/dc/MESYZIV_t.jpg'),
(40555, 'Sauté Pan', 3000, 'Household', 3, 'Sauté ingredients with our Sauté Pan. Featuring non-stick surface and ergonomic handle, this pan offers easy and efficient sautéing.', 13, 68, 'https://thumbs4.imagebam.com/af/25/5b/MESYZJF_t.jpg'),
(40556, 'Dutch Oven', 6000, 'Household', 3, 'Cook stews and more with our Dutch Oven. Featuring cast iron construction and lid, this oven offers slow and even cooking.', 15, 50, 'https://thumbs4.imagebam.com/4f/35/49/MESYZIP_t.jpg'),
(40557, 'Baking Sheet Set', 2500, 'Household', 4, 'Bake delicious treats with our Baking Sheet Set. Featuring non-stick coating and durable design, this set offers baking convenience.', 13, 57, 'https://thumbs4.imagebam.com/b8/7f/b4/MESYZIA_t.jpg'),
(40558, 'Pasta Maker', 4500, 'Household', 4, 'Make homemade pasta with our Pasta Maker. Featuring adjustable settings and durable construction, this maker offers fresh pasta making.', 12, 0, 'https://thumbs4.imagebam.com/74/28/ad/MESYZJZ_t.jpg'),
(40559, 'Vacuum Sealer', 5500, 'Household', 4, 'Preserve food freshness with our Vacuum Sealer. Featuring compact design and easy operation, this sealer offers food preservation ease.', 17, 61, 'https://thumbs4.imagebam.com/a5/5e/a3/MESYZJJ_t.jpg'),
(40560, 'Sous Vide Cooker', 7000, 'Household', 3, 'Cook sous vide style with our Sous Vide Cooker. Featuring precise temperature control and compact design, this cooker offers gourmet cooking at home.', 12, 53, 'https://thumbs4.imagebam.com/c8/5d/23/MESYZJG_t.jpg'),
(40561, 'Yogurt Maker', 4000, 'Household', 3, 'Make homemade yogurt with our Yogurt Maker. Featuring multiple jars and digital timer, this maker offers yogurt making convenience.', 18, 64, 'https://thumbs4.imagebam.com/71/56/9c/MESYZKA_t.jpg'),
(40562, 'Slicer/Shredder Attachment', 1800, 'Household', 5, 'Slice and shred with ease using our Slicer/Shredder Attachment. Featuring sharp blades and easy attachment, this tool offers slicing and shredding convenience.', 14, 0, 'https://thumbs4.imagebam.com/33/e1/5a/MESYZK4_t.jpg'),
(40563, 'Muffin Pan', 2000, 'Household', 4, 'Bake muffins and cupcakes with our Muffin Pan. Featuring non-stick surface and durable design, this pan offers baking perfection.', 14, 69, 'https://thumbs4.imagebam.com/1b/63/d3/MESYZJ8_t.jpg'),
(40564, 'Pie Dish', 2500, 'Household', 4, 'Bake pies and tarts with our Pie Dish. Featuring deep design and oven-safe material, this dish offers perfect pie baking.', 17, 55, 'https://thumbs4.imagebam.com/d7/68/44/MESYZJC_t.jpg'),
(40565, 'Cookie Cutters Set', 1000, 'Household', 5, 'Make fun cookies with our Cookie Cutters Set. Featuring various shapes and durable construction, this set offers cookie making creativity.', 11, 50, 'https://thumbs4.imagebam.com/25/d8/22/MESYZIM_t.jpg'),
(40566, 'Measuring Cups and Spoons', 800, 'Household', 4, 'Measure ingredients accurately with our Measuring Cups and Spoons. Featuring clear markings and durable construction, this set offers precise measuring.', 17, 0, 'https://thumbs4.imagebam.com/e9/52/cf/MESYZJW_t.jpg'),
(40567, 'Cake Decorating Kit', 2000, 'Household', 4, 'Decorate cakes beautifully with our Cake Decorating Kit. Featuring various tips and piping bags, this kit offers cake decorating creativity.', 20, 74, 'https://thumbs4.imagebam.com/69/d5/09/MESYZIF_t.jpg'),
(40568, 'Pizza Stone', 3500, 'Household', 4, 'Bake perfect pizzas with our Pizza Stone. Featuring heat-retaining material and flat surface, this stone offers crispy pizza crust.', 16, 0, 'https://thumbs4.imagebam.com/de/30/bc/MESYZJD_t.jpg'),
(40569, 'Grill Pan', 3000, 'Household', 3, 'Grill indoors with our Grill Pan. Featuring ridged surface and durable construction, this pan offers indoor grilling convenience.', 13, 75, 'https://thumbs4.imagebam.com/b7/0e/62/MESYZIY_t.jpg'),
(40570, 'Electric Skillet', 4500, 'Household', 3, 'Cook versatile meals with our Electric Skillet. Featuring non-stick surface and adjustable temperature, this skillet offers cooking flexibility.', 17, 60, 'https://thumbs4.imagebam.com/78/6b/69/MESYZIR_t.jpg'),
(40571, 'Food Dehydrator', 5000, 'Household', 3, 'Make dried snacks with our Food Dehydrator. Featuring multiple trays and adjustable temperature, this dehydrator offers healthy snacking options.', 16, 56, 'https://thumbs4.imagebam.com/ff/f2/83/MESYZIU_t.jpg'),
(40572, 'Bread Maker', 6000, 'Household', 3, 'Bake homemade bread with our Bread Maker. Featuring multiple settings and delay timer, this maker offers fresh bread baking.', 16, 0, 'https://thumbs4.imagebam.com/63/b8/bc/MESYZIE_t.jpg'),
(40573, 'Egg Cooker', 2000, 'Household', 4, 'Cook perfect eggs with our Egg Cooker. Featuring multiple cooking options and easy cleaning, this cooker offers egg cooking convenience.', 20, 70, 'https://thumbs4.imagebam.com/fe/30/fc/MESYZIQ_t.jpg'),
(40574, 'Paring Knife Set', 1500, 'Household', 3, 'Slice and dice with our Paring Knife Set. Featuring sharp blades and comfortable handles, this set offers precise cutting.', 15, 0, 'https://thumbs4.imagebam.com/04/cc/f6/MESYZJ9_t.jpg'),
(40575, 'Steak Knife Set', 2000, 'Household', 4, 'Enjoy steak dinners with our Steak Knife Set. Featuring serrated edges and stylish design, this set offers steak cutting ease.', 14, 66, 'https://thumbs4.imagebam.com/f6/01/e4/MESYZJH_t.jpg'),
(40576, 'Chef\'s Knife', 2500, 'Household', 3, 'Prepare meals with our Chef\'s Knife. Featuring sharp blade and ergonomic handle, this knife offers versatile cutting.', 16, 61, 'https://thumbs4.imagebam.com/e8/8c/be/MESYZIK_t.jpg'),
(40577, 'Utility Knife', 2000, 'Household', 5, 'Handle various tasks with our Utility Knife. Featuring versatile blade and durable construction, this knife offers utility cutting.', 16, 57, 'https://thumbs4.imagebam.com/07/ee/43/MESYZJI_t.jpg'),
(40578, 'Santoku Knife', 3000, 'Household', 5, 'Slice and dice with our Santoku Knife. Featuring granton edge and balanced design, this knife offers precision cutting.', 11, 0, 'https://thumbs4.imagebam.com/38/07/cb/MESYZJE_t.jpg'),
(40579, 'Bread Knife', 2500, 'Household', 5, 'Slice bread effortlessly with our Bread Knife. Featuring serrated edge and ergonomic handle, this knife offers bread slicing ease.', 17, 72, 'https://thumbs4.imagebam.com/ef/7e/57/MESYZIC_t.jpg'),
(40580, 'Carving Knife', 3000, 'Household', 4, 'Carve meats with our Carving Knife. Featuring long blade and sharp edge, this knife offers carving precision.', 12, 62, 'https://thumbs4.imagebam.com/8b/ea/10/MESYZII_t.jpg'),
(40581, 'Knife Sharpener', 1500, 'Household', 3, 'Keep knives sharp with our Knife Sharpener. Featuring multiple sharpening options and non-slip base, this sharpener offers knife maintenance.', 19, 0, 'https://thumbs4.imagebam.com/0d/61/d5/MESYZJ4_t.jpg'),
(40582, 'Kitchen Shears', 1000, 'Household', 3, 'Cut herbs and more with our Kitchen Shears. Featuring sharp blades and comfortable grip, these shears offer kitchen cutting convenience.', 19, 51, 'https://thumbs4.imagebam.com/d5/2b/13/MESYZJ1_t.jpg'),
(40583, 'Cutting Board Set', 2000, 'Household', 3, 'Prep ingredients with our Cutting Board Set. Featuring durable material and various sizes, this set offers cutting versatility.', 19, 68, 'https://thumbs4.imagebam.com/b8/25/ac/MESYZIO_t.jpg'),
(40584, 'Garlic Press', 800, 'Household', 3, 'Press garlic easily with our Garlic Press. Featuring efficient design and easy cleaning, this press offers garlic preparation ease.', 15, 78, 'https://thumbs4.imagebam.com/10/79/a6/MESYZIX_t.jpg'),
(40585, 'Can Opener', 700, 'Household', 4, 'Open cans effortlessly with our Can Opener. Featuring easy-turn handle and durable construction, this opener offers can opening convenience.', 18, 73, 'https://thumbs4.imagebam.com/db/15/3f/MESYZIH_t.jpg'),
(40586, 'Corkscrew', 800, 'Household', 5, 'Open wine bottles with our Corkscrew. Featuring ergonomic design and durable construction, this corkscrew offers wine opening ease.', 15, 53, 'https://thumbs4.imagebam.com/5c/81/02/MESYZIN_t.jpg'),
(40587, 'Meat Thermometer', 1200, 'Household', 3, 'Monitor meat temperature with our Meat Thermometer. Featuring accurate readings and easy-to-read display, this thermometer offers meat cooking precision.', 18, 0, 'https://thumbs4.imagebam.com/07/a4/97/MESYZJ7_t.jpg'),
(40588, 'Peeler Set', 600, 'Household', 4, 'Peel fruits and vegetables with our Peeler Set. Featuring sharp blades and comfortable grip, this set offers peeling convenience.', 17, 0, 'https://thumbs4.imagebam.com/3e/f6/59/MESYZJB_t.jpg'),
(40589, 'Lemon Squeezer', 800, 'Household', 5, 'Juice lemons easily with our Lemon Squeezer. Featuring efficient design and sturdy construction, this squeezer offers lemon juicing ease.', 20, 57, 'https://thumbs4.imagebam.com/9d/d8/6c/MESYZJ6_t.jpg'),
(40590, 'Kitchen Timer', 500, 'Household', 5, 'Keep track of cooking time with our Kitchen Timer. Featuring loud alarm and easy setting, this timer offers cooking time management.', 19, 77, 'https://thumbs4.imagebam.com/be/7b/2a/MESYZJ3_t.jpg'),
(40591, 'Basmati Rice 5kg', 1500, 'Food', 4, 'Premium quality Basmati rice perfect for various dishes.', 15, 73, 'https://thumbs4.imagebam.com/32/61/af/MESYYSH_t.jpeg'),
(40592, 'Fresh Whole Chicken 1.5kg', 700, 'Food', 4, 'Tender and juicy whole chicken ideal for roasting or grilling.', 18, 52, 'https://thumbs4.imagebam.com/a0/17/f7/MESYYSX_t.jpeg'),
(40593, 'Green Apples 1kg', 300, 'Food', 4, 'Crisp and refreshing green apples packed with nutrients.', 15, 52, 'https://thumbs4.imagebam.com/e9/c7/3f/MESYYT3_t.jpeg'),
(40594, 'Whole Wheat Flour 2kg', 400, 'Food', 5, 'High-fiber whole wheat flour for baking healthy bread and pastries.', 19, 55, 'https://thumbs4.imagebam.com/08/94/80/MESYYTY_t.jpeg'),
(40595, 'Instant Coffee 200g', 600, 'Food', 4, 'Convenient instant coffee for quick and easy brewing.', 12, 0, 'https://thumbs4.imagebam.com/f2/e3/77/MESYYTA_t.jpeg'),
(40596, 'Fresh Milk 1L', 1239, 'Food', 4, 'Fresh and creamy milk perfect for drinking or cooking.', 20, 50, 'https://thumbs4.imagebam.com/77/6b/0a/MESYYSU_t.jpeg'),
(40597, 'Orange Juice 1L', 250, 'Food', 4, 'Freshly squeezed orange juice rich in vitamin C.', 15, 0, 'https://thumbs4.imagebam.com/05/66/b3/MESYYTF_t.jpg'),
(40598, 'Spaghetti Pasta 500g', 100, 'Food', 4, 'Classic spaghetti pasta ideal for various pasta dishes.', 12, 65, 'https://thumbs4.imagebam.com/7a/73/c4/MESYYTS_t.jpeg'),
(40599, 'Extra Virgin Olive Oil 500ml', 800, 'Food', 4, 'Premium extra virgin olive oil for cooking and dressing.', 18, 0, 'https://thumbs4.imagebam.com/39/64/12/MESYYST_t.jpeg'),
(40600, 'Canned Tuna 200g', 350, 'Food', 3, 'High-quality canned tuna packed in oil.', 11, 71, 'https://thumbs4.imagebam.com/26/f8/aa/MESYYSN_t.jpeg'),
(40601, 'Almonds 500g', 1200, 'Food', 4, 'Nutritious almonds perfect for snacking or baking.', 20, 0, 'https://thumbs4.imagebam.com/68/36/39/MESYYSF_t.jpeg'),
(40602, 'Potato Chips 150g', 150, 'Food', 3, 'Crispy and savory potato chips for snacking.', 17, 0, 'https://thumbs4.imagebam.com/0e/05/4f/MESYYTH_t.jpg'),
(40603, 'Greek Yogurt 1kg', 450, 'Food', 3, 'Creamy Greek yogurt packed with protein.', 13, 79, 'https://thumbs4.imagebam.com/57/de/d7/MESYYT2_t.jpeg'),
(40604, 'Dark Chocolate 100g', 200, 'Food', 3, 'Rich and indulgent dark chocolate.', 16, 74, 'https://thumbs4.imagebam.com/47/49/d7/MESYYSS_t.jpeg'),
(40605, 'Honey 500g', 350, 'Food', 4, 'Pure and natural honey perfect for sweetening.', 11, 53, 'https://thumbs4.imagebam.com/13/28/04/MESYYT6_t.jpeg'),
(40606, 'Granola Bars 6-pack', 300, 'Food', 4, 'Nutritious granola bars for a quick and healthy snack.', 13, 0, 'https://thumbs4.imagebam.com/ff/77/99/MESYYT1_t.jpeg'),
(40607, 'Instant Noodles 70g', 1730, 'Food', 3, 'Quick and easy instant noodles.', 15, 64, 'https://thumbs4.imagebam.com/06/24/7f/MESYYTB_t.jpeg'),
(40608, 'Cheddar Cheese 200g', 300, 'Food', 5, 'Sharp and flavorful cheddar cheese.', 15, 77, 'https://thumbs4.imagebam.com/f3/bb/2f/MESYYSO_t.jpeg'),
(40609, 'Bread Crumbs 500g', 150, 'Food', 4, 'Fine breadcrumbs for coating and baking.', 20, 50, 'https://thumbs4.imagebam.com/b5/e1/44/MESYYSJ_t.png'),
(40610, 'Peanut Butter 500g', 400, 'Food', 5, 'Creamy peanut butter made from roasted peanuts.', 15, 0, 'https://thumbs4.imagebam.com/d7/7a/84/MESYYTG_t.jpeg'),
(40611, 'Green Tea 100g', 200, 'Food', 4, 'Refreshing and aromatic green tea leaves.', 16, 60, 'https://thumbs4.imagebam.com/5d/fd/b9/MESYYT4_t.jpg'),
(40612, 'Frozen Vegetables Mix 1kg', 250, 'Food', 3, 'Convenient mix of assorted frozen vegetables.', 11, 58, 'https://thumbs4.imagebam.com/28/36/f8/MESYYT0_t.jpeg'),
(40613, 'Canned Beans 400g', 1432, 'Food', 3, 'Ready-to-use canned beans for soups, salads, and more.', 18, 61, 'https://thumbs4.imagebam.com/35/cb/ac/MESYYSK_t.jpeg'),
(40614, 'Oatmeal 1kg', 200, 'Food', 4, 'Nutritious oatmeal perfect for breakfast.', 15, 79, 'https://thumbs4.imagebam.com/af/3d/59/MESYYTD_t.jpeg'),
(40615, 'Protein Powder 500g', 1200, 'Food', 5, 'High-quality protein powder for shakes and smoothies.', 20, 73, 'https://thumbs4.imagebam.com/3d/1a/b2/MESYYTI_t.jpg'),
(40616, 'Whole Grain Bread 500g', 100, 'Food', 5, 'Healthy whole grain bread loaf.', 15, 0, 'https://thumbs4.imagebam.com/16/32/13/MESYYTW_t.jpeg'),
(40617, 'Fresh Tomatoes 1kg', 120, 'Food', 5, 'Juicy and ripe tomatoes for cooking and salads.', 16, 0, 'https://thumbs4.imagebam.com/7c/d1/56/MESYYSW_t.jpeg'),
(40618, 'Canned Soup 400g', 150, 'Food', 4, 'Ready-to-eat canned soup for a quick meal.', 13, 0, 'https://thumbs4.imagebam.com/ff/59/5a/MESYYSM_t.jpeg'),
(40619, 'Ground Coffee 250g', 500, 'Food', 3, 'Freshly ground coffee beans for brewing.', 18, 59, 'https://thumbs4.imagebam.com/5d/fd/b9/MESYYT4_t.jpg'),
(40620, 'Ice Cream 1L', 400, 'Food', 3, 'Creamy and delicious ice cream in various flavors.', 11, 0, 'https://thumbs4.imagebam.com/2a/fb/26/MESYYT9_t.jpeg'),
(40621, 'Frozen Pizza 400g', 300, 'Food', 5, 'Convenient frozen pizza for a quick and easy meal.', 18, 50, 'https://thumbs4.imagebam.com/5b/ca/e9/MESYYSZ_t.png'),
(40622, 'Fresh Pineapple 1pc', 150, 'Food', 4, 'Sweet and juicy fresh pineapple.', 18, 72, 'https://thumbs4.imagebam.com/17/8e/d7/MESYYSV_t.jpeg'),
(40623, 'Chicken Broth 1L', 100, 'Food', 5, 'Flavorful chicken broth for soups and stews.', 14, 67, 'https://thumbs4.imagebam.com/69/63/ba/MESYYSP_t.jpg'),
(40624, 'Tortilla Chips 200g', 100, 'Food', 4, 'Crunchy tortilla chips perfect for dipping.', 17, 71, 'https://thumbs4.imagebam.com/53/d5/5f/MESYYTU_t.jpeg'),
(40625, 'Sliced Ham 200g', 250, 'Food', 4, 'Deli-style sliced ham for sandwiches and salads.', 11, 75, 'https://thumbs4.imagebam.com/b0/02/cd/MESYYTQ_t.jpeg'),
(40626, 'Quinoa 500g', 600, 'Food', 4, 'Nutritious quinoa grains perfect for salads and sides.', 14, 80, 'https://thumbs4.imagebam.com/a5/bd/a4/MESYYTJ_t.jpg'),
(40627, 'Coconut Milk 400ml', 1470, 'Food', 5, 'Creamy coconut milk for cooking and baking.', 15, 0, 'https://thumbs4.imagebam.com/11/e1/bf/MESYYSQ_t.jpeg'),
(40628, 'Pancake Mix 500g', 200, 'Food', 3, 'Convenient pancake mix for easy breakfasts.', 16, 60, 'https://thumbs4.imagebam.com/3d/1a/b2/MESYYTI_t.jpg'),
(40629, 'Raisins 500g', 350, 'Food', 4, 'Sweet and chewy raisins perfect for snacking and baking.', 12, 61, 'https://thumbs4.imagebam.com/6e/81/f1/MESYYTK_t.jpg'),
(40630, 'White Rice 2kg', 400, 'Food', 5, 'Classic white rice grains for various dishes.', 12, 76, 'https://thumbs4.imagebam.com/57/4a/79/MESYYTV_t.jpeg'),
(40631, 'Canned Corn 400g', 1055, 'Food', 4, 'Sweet and tender canned corn kernels.', 14, 51, 'https://thumbs4.imagebam.com/fc/1e/fe/MESYYSL_t.jpeg'),
(40632, 'Hummus 200g', 150, 'Food', 4, 'Creamy and flavorful hummus dip.', 11, 0, 'https://thumbs4.imagebam.com/db/54/f8/MESYYT8_t.jpeg'),
(40633, 'Popcorn Kernels 500g', 100, 'Food', 5, 'High-quality popcorn kernels for popping.', 16, 71, 'https://thumbs4.imagebam.com/05/66/b3/MESYYTF_t.jpg'),
(40634, 'Beef Jerky 100g', 600, 'Food', 5, 'Savory beef jerky strips for snacking.', 14, 56, 'https://thumbs4.imagebam.com/d4/22/c8/MESYYSI_t.jpeg'),
(40635, 'Canned Sardines 200g', 120, 'Food', 4, 'Tasty canned sardines packed in oil or water.', 11, 78, 'https://thumbs4.imagebam.com/b1/d2/ed/MESYYTO_t.jpeg'),
(40636, 'Instant Oatmeal Packets 10-pack', 250, 'Food', 3, 'Convenient instant oatmeal packets for quick breakfasts.', 15, 80, 'https://thumbs4.imagebam.com/40/1e/d3/MESYYTE_t.jpg'),
(40637, 'Canned Pineapple Slices 400g', 120, 'Food', 4, 'Sweet and tangy canned pineapple slices.', 20, 56, 'https://thumbs4.imagebam.com/13/28/04/MESYYT6_t.jpeg'),
(40638, 'Rice Crackers 150g', 100, 'Food', 3, 'Crispy and flavorful rice crackers.', 16, 52, 'https://thumbs4.imagebam.com/fb/b5/f2/MESYYTL_t.jpeg'),
(40639, 'Sunflower Seeds 500g', 250, 'Food', 5, 'Nutritious sunflower seeds perfect for snacking or baking.', 11, 75, 'https://thumbs4.imagebam.com/d1/8f/bf/MESYYTT_t.jpg'),
(40640, 'Sliced Cheese 200g', 300, 'Food', 5, 'Creamy and mild sliced cheese for sandwiches and snacks.', 13, 0, 'https://thumbs4.imagebam.com/85/cf/25/MESYYTP_t.jpeg'),
(40641, 'Instant Soup Mix 50g', 1867, 'Food', 3, 'Quick and easy instant soup mix.', 12, 64, 'https://thumbs4.imagebam.com/88/1e/f5/MESYYT5_t.jpg'),
(40642, 'Hot Sauce 250ml', 150, 'Food', 3, 'Spicy and flavorful hot sauce.', 19, 0, 'https://thumbs4.imagebam.com/06/79/42/MESYYT7_t.jpg'),
(40643, 'Dried Apricots 500g', 400, 'Food', 5, 'Sweet and chewy dried apricots.', 12, 59, 'https://thumbs4.imagebam.com/02/2e/9c/MESYYSG_t.jpeg'),
(40644, 'Fresh Lettuce 1pc', 1166, 'Food', 5, 'Crisp and refreshing lettuce head.', 19, 0, 'https://thumbs4.imagebam.com/76/66/0a/MESYYTC_t.jpg'),
(40645, 'Dried Cranberries 250g', 300, 'Food', 4, 'Sweet and tart dried cranberries perfect for snacking and baking.', 11, 70, 'https://thumbs4.imagebam.com/6c/46/ef/MESYYSR_t.jpeg'),
(40646, 'Frozen Berries Mix 500g', 350, 'Food', 3, 'Assorted frozen berries perfect for smoothies and desserts.', 15, 55, 'https://thumbs4.imagebam.com/97/e6/23/MESYYSY_t.jpeg'),
(40647, 'Canned Salmon 200g', 400, 'Food', 4, 'High-quality canned salmon packed in oil or water.', 12, 78, 'https://thumbs4.imagebam.com/e0/ff/7f/MESYYTN_t.jpeg'),
(40648, 'Chocolate Chip Cookies 200g', 250, 'Food', 3, 'Delicious chocolate chip cookies.', 15, 53, 'https://thumbs4.imagebam.com/a1/0c/9c/MESYYTM_t.jpg'),
(40649, 'Whole Grain Cereal 500g', 200, 'Food', 5, 'Nutritious whole grain cereal flakes.', 20, 72, 'https://thumbs4.imagebam.com/be/ef/64/MESYYTX_t.jpeg'),
(40650, 'Almond Milk 1L', 300, 'Food', 4, 'Creamy almond milk alternative.', 15, 61, 'https://thumbs4.imagebam.com/68/36/39/MESYYSF_t.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `refund`
--

CREATE TABLE `refund` (
  `order_id` int(3) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `reason` longtext NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `refund`
--

INSERT INTO `refund` (`order_id`, `product_id`, `customer_id`, `reason`, `img`, `status`) VALUES
(147, 40014, 00056, 'Issues ', 'dummy_refund_receipt.jpg', 'Refunded');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `product_id` int(255) NOT NULL,
  `customer_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `user_review` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`product_id`, `customer_id`, `user_review`) VALUES
(40000, 00015, 'Accurate workout tracking, long battery life - worth it!'),
(40000, 00024, 'Seamless sync, great value for money!'),
(40000, 00037, 'Sleek design, handy notifications - highly recommended!'),
(40000, 00042, 'Impressive build, responsive touch screen!'),
(40001, 00010, 'Fantastic sound, stays snug during workouts!'),
(40001, 00019, 'Great sound quality, easy pairing!'),
(40001, 00031, 'Amazing noise cancellation, perfect for focus!'),
(40001, 00050, 'Impressive battery life, convenient charging case!'),
(40002, 00012, 'Perfect for traveling, durable build!'),
(40002, 00023, 'Compact design, useful indicator lights!'),
(40002, 00035, 'Dual USB ports, handy carrying pouch!'),
(40002, 00045, 'Lifesaver during trips, fast charging!'),
(40003, 00018, 'Compact size, surprisingly powerful sound!'),
(40003, 00027, 'Impressive sound quality, great for parties!'),
(40003, 00033, 'Sleek design, easy Bluetooth pairing!'),
(40003, 00047, 'Long-lasting battery, perfect for outdoor use!'),
(40004, 00020, 'Precise tracking, comfortable grip!'),
(40004, 00039, 'Smooth performance, customizable buttons!'),
(40004, 00049, 'Ergonomic design, enhances gaming experience!'),
(40004, 00052, 'Fast response time, durable build quality!'),
(40005, 00014, 'Comfortable straps, protects laptop well!'),
(40005, 00029, 'Spacious compartments, comfortable to wear!'),
(40005, 00038, 'Durable material, stylish design!'),
(40005, 00046, 'Great for organization, convenient charging port!'),
(40006, 00021, 'Sleek design, ample storage capacity!'),
(40006, 00025, 'High-speed transfer, compact size!'),
(40006, 00041, 'Reliable storage, compatible with various devices!'),
(40006, 00048, 'Durable construction, easy to carry around!'),
(40007, 00016, 'Shock-absorbent material, precise cutouts!'),
(40007, 00026, 'Grip-friendly design, easy to install!'),
(40007, 00040, 'Slim profile, excellent protection!'),
(40007, 00051, 'Clear back, showcases phone\'s design!'),
(40008, 00022, 'Flexible design, easy to route!'),
(40008, 00032, 'High-quality connection, reliable performance!'),
(40008, 00036, 'Affordable price, no signal loss!'),
(40008, 00043, 'Durable construction, supports high resolutions!'),
(40009, 00017, 'Multiple outlets, surge protection!'),
(40009, 00030, 'Sturdy build, handles multiple devices!'),
(40009, 00044, 'Compact size, long power cord!'),
(40009, 00053, 'Convenient switch, LED indicators!'),
(40010, 00011, 'Secure closure, elegant look!'),
(40010, 00028, 'Sleek design, ample card slots!'),
(40010, 00034, 'Genuine leather, durable stitching!'),
(40010, 00054, 'Slim profile, fits in pocket perfectly!'),
(40011, 00020, 'Great UV protection, durable frame!'),
(40011, 00038, 'High-quality lenses, fashionable look!'),
(40011, 00049, 'Sleek design, excellent value for money!'),
(40011, 00052, 'Stylish and comfortable, perfect for sunny days!'),
(40012, 00018, 'Beautiful design, keeps me warm in cold weather!'),
(40012, 00027, 'Soft and cozy, adds flair to any outfit!'),
(40012, 00036, 'Elegant and lightweight, perfect gift choice!'),
(40012, 00042, 'Versatile accessory, great for all seasons!'),
(40013, 00015, 'Spacious compartments, comfortable to carry!'),
(40013, 00019, 'Stylish and functional, perfect for school or work!'),
(40013, 00031, 'Durable material, ideal for daily use!'),
(40013, 00047, 'Sleek design, ample storage options!'),
(40013, 00056, 'Great Product '),
(40013, 00056, 'onk pocha'),
(40013, 00056, 'onk valo'),
(40013, 00056, 'valooooo'),
(40014, 00010, 'Classy timepiece, keeps accurate time!'),
(40014, 00023, 'Durable construction, elegant design!'),
(40014, 00039, 'Great value for money, versatile style!'),
(40014, 00048, 'Sophisticated look, comfortable to wear!'),
(40014, 00056, 'posa product bhai'),
(40015, 00026, 'Sturdy construction, fits perfectly!'),
(40015, 00030, 'Classic design, goes well with any outfit!'),
(40015, 00041, 'Genuine leather, stylish buckle!'),
(40015, 00053, 'Durable and adjustable, excellent quality!'),
(40015, 00056, 'Valo product'),
(40016, 00017, 'Warm and comfortable, great for cold weather!'),
(40016, 00021, 'Stylish and functional, keeps hands warm!'),
(40016, 00032, 'Perfect fit, touchscreen compatible!'),
(40016, 00050, 'Excellent grip, durable material!'),
(40017, 00022, 'Fits various headphones, secure zipper closure!'),
(40017, 00025, 'Protects headphones well, compact size!'),
(40017, 00037, 'Stylish design, keeps headphones safe!'),
(40017, 00040, 'Durable material, convenient for travel!'),
(40018, 00028, 'Durable and lightweight, holds keys securely!'),
(40018, 00033, 'Great gift idea, stylish accessory!'),
(40018, 00043, 'Sleek design, adds a personal touch to keys!'),
(40018, 00044, 'Convenient size, easy to find in bag!'),
(40019, 00034, 'Sturdy construction, provides good coverage!'),
(40019, 00046, 'Wind-resistant, durable build!'),
(40019, 00051, 'Easy to open and close, lightweight to carry!'),
(40019, 00054, 'Compact when folded, keeps me dry in the rain!'),
(40020, 00011, 'Stylish design, excellent value for money!'),
(40020, 00016, 'Comfortable fabric, great fit!'),
(40020, 00035, 'Soft and breathable, perfect for casual wear!'),
(40020, 00045, 'Durable stitching, retains shape after wash!'),
(40021, 00020, 'Flattering fit, comfortable fabric!'),
(40021, 00038, 'Versatile style, great value for money!'),
(40021, 00049, 'Beautiful color, excellent quality!'),
(40021, 00052, 'Elegant design, perfect for special occasions!'),
(40022, 00018, 'Easy to wash, holds up well after multiple wears!'),
(40022, 00027, 'Durable material, adjustable waist!'),
(40022, 00036, 'Great for active kids, allows freedom of movement!'),
(40022, 00042, 'Comfortable fit, stylish design!'),
(40023, 00015, 'Cozy and warm, perfect for chilly days!'),
(40023, 00019, 'Great for casual wear, true to size!'),
(40023, 00031, 'Soft fabric, durable stitching!'),
(40023, 00047, 'Stylish design, versatile for layering!'),
(40024, 00010, 'Comfortable and supportive, ideal for daily wear!'),
(40024, 00023, 'Durable sole, stylish design!'),
(40024, 00039, 'Great traction, fits well!'),
(40024, 00048, 'Lightweight and breathable, perfect for workouts!'),
(40024, 00056, 'Great Product'),
(40025, 00026, 'Stretchy and comfortable, great for workouts!'),
(40025, 00030, 'Flattering fit, versatile for casual or active wear!'),
(40025, 00041, 'Non-see through, stays in place during exercise!'),
(40025, 00053, 'Soft fabric, retains shape after wash!'),
(40026, 00017, 'Classic style, breathable fabric!'),
(40026, 00021, 'Great fit, comfortable for all-day wear!'),
(40026, 00032, 'Durable material, perfect for everyday wear!'),
(40026, 00050, 'Sharp look, easy to care for!'),
(40026, 00056, 'Great shirt'),
(40027, 00022, 'Comfortable waistband, lightweight fabric!'),
(40027, 00025, 'Versatile design, easy to dress up or down!'),
(40027, 00037, 'Cute and trendy, great for summer outings!'),
(40027, 00040, 'Flattering silhouette, stylish addition to any wardrobe!'),
(40028, 00028, 'Warm and cozy, perfect for layering!'),
(40028, 00033, 'Great fit, excellent quality!'),
(40028, 00043, 'Soft fabric, stylish design!'),
(40028, 00044, 'Classic look, durable construction!'),
(40029, 00034, 'Soft and comfortable, variety of colors!'),
(40029, 00046, 'Good fit, doesn\'t slide down!'),
(40029, 00051, 'Fun designs, great value for money!'),
(40029, 00054, 'Durable material, perfect for everyday wear!'),
(40030, 00011, 'Compact size, convenient for travel!'),
(40030, 00016, 'Responsive and accurate, easy to set up!'),
(40030, 00035, 'Comfortable grip, works well on various surfaces!'),
(40030, 00045, 'Long battery life, reliable connectivity!'),
(40031, 00020, 'Slim design, holds multiple charges!'),
(40031, 00038, 'High capacity, convenient for long trips!'),
(40031, 00049, 'Durable construction, essential for travel!'),
(40031, 00052, 'Fast charging, reliable backup power!'),
(40032, 00018, 'Compatible with various devices, great value!'),
(40032, 00027, 'Fast data transfer, sturdy connectors!'),
(40032, 00036, 'Durable material, reliable charging!'),
(40032, 00042, 'Long length, tangle-free design!'),
(40033, 00015, 'Responsive keys, easy to set up!'),
(40033, 00019, 'Great for work or gaming, reliable connection!'),
(40033, 00031, 'Compact size, comfortable typing experience!'),
(40033, 00047, 'Long battery life, sleek design!'),
(40034, 00010, 'High-quality video, compact size!'),
(40034, 00023, 'Waterproof and durable, captures great footage!'),
(40034, 00039, 'Easy to use, perfect for outdoor adventures!'),
(40034, 00048, 'Wide-angle lens, captures every moment!'),
(40035, 00026, 'Accurate tracking, motivates me to stay active!'),
(40035, 00030, 'Long battery life, syncs well with my phone!'),
(40035, 00041, 'Sleek design, monitors various health metrics!'),
(40035, 00053, 'Comfortable to wear, helps me reach my fitness goals!'),
(40036, 00017, 'Multiple ports, fast charging for all devices!'),
(40036, 00021, 'Sturdy build, reliable power delivery!'),
(40036, 00032, 'Compact design, perfect for travel!'),
(40036, 00050, 'Foldable prongs, convenient for storage!'),
(40037, 00022, 'Adjustable headband, noise-canceling feature works great!'),
(40037, 00025, 'Clear sound quality, comfortable to wear!'),
(40037, 00037, 'Lightweight design, perfect for long calls!'),
(40037, 00040, 'Long battery life, easy Bluetooth pairing!'),
(40038, 00028, 'Rich sound, compact size for on-the-go!'),
(40038, 00033, 'Long battery life, great for outdoor use!'),
(40038, 00043, 'Water-resistant, easy Bluetooth connectivity!'),
(40038, 00044, 'Durable construction, impressive volume!'),
(40039, 00034, 'Adjustable height, ergonomic design!'),
(40039, 00046, 'Lightweight and portable, perfect for working on the go!'),
(40039, 00051, 'Folds flat for storage, enhances typing comfort!'),
(40039, 00054, 'Sturdy construction, keeps laptop cool!'),
(40040, 00011, 'Durable material, blocks RFID signals effectively!'),
(40040, 00016, 'Secure protection, sleek design!'),
(40040, 00035, 'Plenty of card slots, fits in pocket easily!'),
(40040, 00045, 'Compact size, keeps my cards safe!'),
(40041, 00020, 'High-quality material, perfect for watch enthusiasts!'),
(40041, 00038, 'Sleek and stylish, great addition to my dresser!'),
(40041, 00049, 'Spacious compartments, protects watches well!'),
(40041, 00052, 'Elegant design, keeps watches organized!'),
(40042, 00018, 'Beautiful designs, durable construction!'),
(40042, 00027, 'Variety of accessories, great value for money!'),
(40042, 00036, 'Convenient set, ideal for daily use!'),
(40042, 00042, 'Quality materials, perfect for different hairstyles!'),
(40043, 00015, 'Compact size, works in multiple countries!'),
(40043, 00019, 'Sturdy build, charges devices quickly!'),
(40043, 00031, 'Universal compatibility, essential for travelers!'),
(40043, 00047, 'Reliable performance, easy to use!'),
(40044, 00010, 'Stylish design, spacious compartments!'),
(40044, 00023, 'Durable material, perfect for everyday use!'),
(40044, 00039, 'Versatile style, fits all my essentials!'),
(40044, 00048, 'Great value for money, comfortable to carry!'),
(40045, 00026, 'Keeps ears warm, comfortable fit!'),
(40045, 00030, 'Stylish design, adjustable size!'),
(40045, 00041, 'Soft and cozy, perfect for cold weather!'),
(40045, 00053, 'Great for outdoor activities, blocks wind effectively!'),
(40046, 00017, 'Protective and compact, fits in any bag!'),
(40046, 00021, 'Soft interior, prevents scratches on lenses!'),
(40046, 00032, 'Durable construction, keeps sunglasses safe!'),
(40046, 00050, 'Convenient size, easy to carry around!'),
(40047, 00022, 'Adjustable strap, provides excellent neck support!'),
(40047, 00025, 'Comfortable neck support, perfect for long flights!'),
(40047, 00037, 'Compact size, inflates and deflates quickly!'),
(40047, 00040, 'Soft and plush, easy to pack in luggage!'),
(40048, 00028, 'Elegant design, keeps jewelry organized!'),
(40048, 00033, 'High-quality material, perfect gift for jewelry lovers!'),
(40048, 00043, 'Spacious compartments, prevents tangling of jewelry!'),
(40048, 00044, 'Durable construction, stylish addition to dresser!'),
(40049, 00034, 'Space-saving design, organizes scarves neatly!'),
(40049, 00046, 'Great organization solution, saves closet space!'),
(40049, 00051, 'Easy to hang, keeps scarves wrinkle-free!'),
(40049, 00054, 'Sturdy build, holds multiple scarves without slipping!'),
(40061, 00020, 'Long-lasting ink, erases cleanly!'),
(40061, 00038, 'Great value for money, essential for presentations!'),
(40061, 00049, 'Fine tip, perfect for detailed writing!'),
(40061, 00052, 'Vibrant colors, writes smoothly on whiteboards!'),
(40062, 00018, 'Generous quantity, ideal for office use!'),
(40062, 00027, 'Adhesive sticks well, handy for quick notes!'),
(40062, 00036, 'Compact size, fits in any pocket!'),
(40062, 00042, 'Bright colors, perfect for color-coding tasks!'),
(40063, 00015, 'Variety of nib sizes, great for beginners!'),
(40063, 00019, 'High-quality materials, elegant packaging!'),
(40063, 00031, 'Smooth ink flow, creates beautiful strokes!'),
(40063, 00047, 'Includes instructional booklet, perfect for learning!'),
(40064, 00010, 'Well-organized layout, helps me stay on track!'),
(40064, 00023, 'Durable cover, plenty of space for notes!'),
(40064, 00039, 'Hourly schedule, keeps me organized throughout the day!'),
(40064, 00048, 'Stylish design, motivates me to plan ahead!'),
(40065, 00026, 'High-quality paper, perfect for various mediums!'),
(40065, 00030, 'Thick pages, prevents ink bleed-through!'),
(40065, 00041, 'Spiral binding, lays flat for easy drawing!'),
(40065, 00053, 'Portable size, great for sketching on the go!'),
(40066, 00017, 'Large display, easy to read!'),
(40066, 00021, 'Compact size, fits in any bag!'),
(40066, 00032, 'Responsive buttons, performs calculations quickly!'),
(40066, 00050, 'Durable construction, perfect for everyday use!'),
(40067, 00022, 'Long-lasting ink, essential for studying!'),
(40067, 00025, 'Bright colors, doesn\'t smudge ink!'),
(40067, 00037, 'Non-toxic, safe for all users!'),
(40067, 00040, 'Chisel tip, great for underlining and highlighting!'),
(40068, 00028, 'Multiple compartments, keeps desk clutter-free!'),
(40068, 00033, 'Sleek design, adds a professional touch to my workspace!'),
(40068, 00043, 'Sturdy construction, holds various stationery items!'),
(40068, 00044, 'Compact size, fits in any desk!'),
(40069, 00034, 'Variety of patterns, adds flair to journals and crafts!'),
(40069, 00046, 'Beautiful designs, enhances creativity!'),
(40069, 00051, 'Generous length, great value for money!'),
(40069, 00054, 'Good adhesive, easy to reposition!'),
(40070, 00011, 'Cozy and warm, ideal for chilly mornings!'),
(40070, 00016, 'Plush and soft, feels luxurious!'),
(40070, 00035, 'Absorbent fabric, perfect for after shower!'),
(40070, 00045, 'Great fit, feels like wrapping in a cloud!'),
(40071, 00020, 'Effective at removing makeup and impurities!'),
(40071, 00038, 'Foams well, great for daily cleansing routine!'),
(40071, 00049, 'Refreshing scent, doesn\'t dry out skin!'),
(40071, 00052, 'Gentle on skin, leaves face feeling refreshed!'),
(40072, 00018, 'Compact design, easy to use and store!'),
(40072, 00027, 'Soothing massage, relieves tired feet!'),
(40072, 00036, 'Improves circulation, perfect for relaxation!'),
(40072, 00042, 'Multiple settings, customizable for different needs!'),
(40073, 00015, 'Soft and gentle, creates luxurious lather!'),
(40073, 00019, 'Quick-drying, prevents bacteria buildup!'),
(40073, 00031, 'Durable material, exfoliates without being abrasive!'),
(40073, 00047, 'Ergonomic design, easy to hold and use!'),
(40074, 00010, 'Calming ambiance, enhances relaxation!'),
(40074, 00023, 'Sleek design, adds a touch of elegance to any room!'),
(40074, 00039, 'Easy to use, emits a pleasant fragrance!'),
(40074, 00048, 'Adjustable mist settings, suits different preferences!'),
(40075, 00026, 'Nourishing formula, keeps hands soft and smooth!'),
(40075, 00030, 'Hydrating, perfect for dry winter skin!'),
(40075, 00041, 'Absorbs quickly, doesn\'t leave greasy residue!'),
(40075, 00053, 'Delicate scent, feels luxurious!'),
(40076, 00017, 'Moisturizing, keeps lips hydrated!'),
(40076, 00021, 'Compact size, fits in any purse or pocket!'),
(40076, 00032, 'Variety of flavors, fun to use!'),
(40076, 00050, 'Smooth application, prevents chapped lips!'),
(40077, 00022, 'Silky texture, leaves hair feeling luxurious!'),
(40077, 00025, 'Restores shine, revitalizes hair!'),
(40077, 00037, 'Nourishing formula, perfect for dry or frizzy hair!'),
(40077, 00040, 'Deep conditioning, repairs damaged strands!'),
(40078, 00028, 'Pleasant fragrances, creates a cozy atmosphere!'),
(40078, 00033, 'Beautiful packaging, makes a great gift!'),
(40078, 00043, 'Long-lasting burn, fills the room with delightful scents!'),
(40078, 00044, 'Variety of scents, suitable for different moods!'),
(40079, 00034, 'Exfoliates gently, leaves skin smooth and radiant!'),
(40079, 00046, 'Natural ingredients, gentle on sensitive skin!'),
(40079, 00051, 'Moisturizing, prevents dryness!'),
(40079, 00054, 'Invigorating scent, perfect for spa-like experience at home!'),
(40080, 00011, 'Clear display, reliable for fever detection!'),
(40080, 00016, 'Accurate readings, quick response time!'),
(40080, 00035, 'Easy to use, perfect for home health monitoring!'),
(40080, 00045, 'Compact size, convenient for travel or home use!'),
(40081, 00020, 'Compact and portable, fits in any backpack!'),
(40081, 00038, 'Durable case, perfect for home or travel!'),
(40081, 00049, 'Clear instructions, easy to find items!'),
(40081, 00052, 'Comprehensive supplies, essential for emergencies!'),
(40082, 00018, 'Stores multiple readings, tracks progress over time!'),
(40082, 00027, 'Accurate readings, easy to use!'),
(40082, 00036, 'Comfortable cuff, doesn\'t pinch or squeeze!'),
(40082, 00042, 'Large display, ideal for seniors!'),
(40083, 00015, 'Fast heating, provides soothing relief!'),
(40083, 00019, 'Automatic shut-off, safe to use overnight!'),
(40083, 00031, 'Soft fabric, feels comfortable against skin!'),
(40083, 00047, 'Multiple heat settings, customizable for different needs!'),
(40084, 00010, 'Retains heat well, perfect for cold nights!'),
(40084, 00023, 'Durable construction, leak-proof design!'),
(40084, 00039, 'Generous capacity, keeps me warm for hours!'),
(40084, 00048, 'Soft cover, prevents burns from direct contact!'),
(40085, 00026, 'Multiple compartments, helps me stay organized with medications!'),
(40085, 00030, 'Easy to open, suitable for elderly users!'),
(40085, 00041, 'Portable size, perfect for travel!'),
(40085, 00053, 'Clear lids, allows for quick identification of pills!'),
(40086, 00017, 'Kills germs effectively, dries quickly!'),
(40086, 00021, 'Refreshing scent, pleasant to use!'),
(40086, 00032, 'Convenient size, fits in purse or pocket!'),
(40086, 00050, 'Gentle on skin, doesn\'t dry out hands!'),
(40087, 00022, 'Breathable material, promotes faster healing!'),
(40087, 00025, 'Variety of sizes, perfect for minor cuts and scrapes!'),
(40087, 00037, 'Hypoallergenic, suitable for sensitive skin!'),
(40087, 00040, 'Strong adhesive, stays in place even during activity!'),
(40088, 00028, 'Boosts immune system, supports overall health!'),
(40088, 00033, 'High potency, provides daily vitamin C needs!'),
(40088, 00043, 'Easy-to-swallow capsules, convenient for daily use!'),
(40088, 00044, 'No artificial flavors or colors, all-natural ingredients!'),
(40089, 00034, 'Blocks out light effectively, promotes restful sleep!'),
(40089, 00046, 'Contours to face, doesn\'t put pressure on eyes!'),
(40089, 00051, 'Soft and plush, feels gentle on skin!'),
(40089, 00054, 'Adjustable strap, comfortable to wear!'),
(40090, 00011, 'Includes variety of knives, suitable for different cooking tasks!'),
(40090, 00016, 'Sharp blades, cuts through food with ease!'),
(40090, 00035, 'Durable handles, provides a comfortable grip!'),
(40090, 00045, 'Stylish design, adds elegance to my kitchen!'),
(40091, 00020, 'Collapsible design, easy to store when not in use!'),
(40091, 00038, 'Comfortable handles, makes carrying laundry a breeze!'),
(40091, 00049, 'Ventilated sides, prevents odors and mildew!'),
(40091, 00052, 'Sturdy construction, holds plenty of clothes!'),
(40092, 00018, 'Drainage system, keeps dishes dry and prevents water buildup!'),
(40092, 00027, 'Compact size, fits perfectly on kitchen countertop!'),
(40092, 00036, 'Adjustable compartments, accommodates various dish sizes!'),
(40092, 00042, 'Durable material, resists rust and corrosion!'),
(40093, 00015, 'Powerful suction, cleans efficiently!'),
(40093, 00019, 'Long cord, allows for greater reach!'),
(40093, 00031, 'Versatile attachments, tackles different surfaces with ease!'),
(40093, 00047, 'Bagless design, easy to empty and clean!'),
(40094, 00010, 'Soft and comfortable, provides a cozy sleep!'),
(40094, 00023, 'Wrinkle-resistant, looks neat and tidy on the bed!'),
(40094, 00039, 'Deep pockets, fits securely on mattress!'),
(40094, 00048, 'Beautiful patterns, adds a touch of elegance to the bedroom!'),
(40095, 00026, 'Durable construction, withstands heavy use!'),
(40095, 00030, 'Removable liner, makes emptying and cleaning easy!'),
(40095, 00041, 'Foot pedal, allows for hands-free operation!'),
(40095, 00053, 'Sleek design, fits seamlessly in any room!'),
(40096, 00017, 'Drainage hole, prevents overwatering!'),
(40096, 00021, 'Lightweight, easy to move around!'),
(40096, 00032, 'Stylish design, complements any indoor plant!'),
(40096, 00050, 'Durable material, suitable for both indoor and outdoor use!'),
(40097, 00022, 'Easy to hang, includes mounting hardware!'),
(40097, 00025, 'Versatile sizes, perfect for displaying various photos!'),
(40097, 00037, 'Sturdy construction, frames photos securely!'),
(40097, 00040, 'Elegant design, enhances the aesthetic of any room!'),
(40098, 00028, 'Plush and absorbent, dries quickly!'),
(40098, 00033, 'Durable stitching, withstands frequent washing!'),
(40098, 00043, 'Generous size, wraps comfortably around the body!'),
(40098, 00044, 'Variety of colors, adds a pop of color to the bathroom!'),
(40099, 00034, 'Adjustable brightness, suits different lighting needs!'),
(40099, 00046, 'Sturdy base, prevents tipping over!'),
(40099, 00051, 'Energy-efficient LED, saves on electricity bills!'),
(40099, 00054, 'Sleek and modern design, enhances workspace aesthetics!'),
(40100, 00016, 'Fast'),
(40101, 00020, 'High-quality leather, ages beautifully over time!'),
(40101, 00038, 'Slim profile, fits comfortably in pockets!'),
(40101, 00049, 'Spacious compartments, keeps everything organized!'),
(40101, 00052, 'Sleek design, holds cards and cash securely!'),
(40103, 00018, 'Generous pack size, lasts a long time!'),
(40103, 00027, 'Bright colors, perfect for reminders and notes!'),
(40103, 00036, 'Easy to peel, convenient for quick notes!'),
(40103, 00042, 'Adhesive sticks well, doesn\'t leave residue!'),
(40103, 00056, 'valona'),
(40104, 00015, 'Variety of masks, caters to different skincare needs!'),
(40104, 00019, 'Individually packaged, perfect for travel or on-the-go pampering!'),
(40104, 00031, 'Hydrating formulas, leaves skin feeling refreshed!'),
(40104, 00047, 'Gentle on skin, suitable for sensitive skin types!'),
(40105, 00010, 'Quick and accurate readings, essential for home health monitoring!'),
(40105, 00023, 'Large display, easy to read!'),
(40105, 00039, 'Memory function, tracks temperature history!'),
(40105, 00048, 'Waterproof design, easy to clean!'),
(40106, 00026, 'Powerful stain removal, leaves clothes fresh and clean!'),
(40106, 00030, 'Eco-friendly formula, safe for the environment!'),
(40106, 00041, 'Gentle on fabrics, suitable for all types of washing machines!'),
(40106, 00053, 'Fresh scent, adds a pleasant aroma to laundry!'),
(40107, 00017, 'Rich sound quality, perfect for music lovers!'),
(40107, 00021, 'Easy Bluetooth pairing, connects seamlessly with devices!'),
(40107, 00032, 'Portable design, great for outdoor gatherings!'),
(40107, 00050, 'Long battery life, lasts for hours on a single charge!'),
(40108, 00022, 'Versatile, can be worn in different styles!'),
(40108, 00025, 'Soft and cozy, keeps me warm in chilly weather!'),
(40108, 00037, 'Durable material, withstands frequent wear!'),
(40108, 00040, 'Stylish accessory, adds flair to any outfit!'),
(40110, 00028, 'High-quality paper, suitable for writing and sketching!'),
(40110, 00033, 'Sturdy cover, protects'),
(40110, 00043, 'Compact size, fits easily in bags or pockets!'),
(40113, 00019, 'Long cord, allows for greater reach!'),
(40114, 00010, 'Fresh and tender, perfect for grilling or roasting!'),
(40115, 00023, 'Juicy and flavorful, a delicious tropical treat!'),
(40116, 00039, 'Fine texture, dissolves easily in drinks and recipes!'),
(40116, 00048, 'High-quality sugar, perfect for baking and sweetening beverages!'),
(40117, 00026, 'Rich and flavorful, enhances the taste of pasta and pizzas!'),
(40117, 00030, 'Authentic taste, reminiscent of homemade tomato sauce!'),
(40117, 00041, 'Versatile sauce, adds a delicious twist to various dishes!'),
(40117, 00053, 'Convenient packaging, ideal for quick meals!'),
(40118, 00017, 'Nutrient-rich eggs, great source of omega-3 fatty acids!'),
(40118, 00021, 'Health-conscious choice, promotes heart health and wellbeing!'),
(40118, 00032, 'Farm-fresh quality, ensures premium taste and nutrition!'),
(40118, 00050, 'Sustainably sourced, supports ethical farming practices!'),
(40119, 00022, 'Freshly baked, retains its quality for longer!'),
(40119, 00025, 'Soft and fluffy texture, perfect for sandwiches and toasts!'),
(40119, 00037, 'Kid-friendly choice, loved by all ages!'),
(40119, 00040, 'Classic taste, a staple for breakfast and snacks!'),
(40120, 00028, 'Satisfyingly delicious, packed with peanuts and caramel!'),
(40120, 00033, 'Iconic flavor, a timeless favorite among chocolate lovers!'),
(40120, 00043, 'Perfect indulgence, offers a satisfying crunch with every bite!'),
(40120, 00044, 'Convenient size, great for on-the-go snacking!'),
(40121, 00034, 'Bold and spicy flavor, a comforting snack option!'),
(40121, 00046, 'Budget-friendly choice, offers a delicious meal without breaking the bank!'),
(40121, 00051, 'Portable meal solution, ideal for office lunches or travel!'),
(40121, 00054, 'Quick and easy preparation, satisfies hunger in minutes!'),
(40122, 00011, 'Authentic taste, reminiscent of traditional Indian street drinks!'),
(40122, 00016, 'Refreshing drink, perfect blend of tangy and spicy flavors!'),
(40122, 00035, 'Quenches thirst instantly, great for hot summer days!'),
(40122, 00045, 'Convenient packaging, ready to drink anytime, anywhere!'),
(40123, 00045, 'High-quality flour, perfect for baking cakes, bread, and pastries!'),
(40124, 00045, 'Crispy and flavorful, a hit among both kids and adults!'),
(40125, 00045, 'Convenient sugar substitute, perfect for those watching their calorie intake!'),
(40125, 00045, 'Tastes just like sugar, without the guilt!'),
(40125, 00045, 'Versatile sweetener, suitable for beverages, baking, and cooking!'),
(40180, 00056, 'Great Product'),
(40218, 00056, 'vala');

-- --------------------------------------------------------

--
-- Table structure for table `supplied_by`
--

CREATE TABLE `supplied_by` (
  `warehouse_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplied_by`
--

INSERT INTO `supplied_by` (`warehouse_id`, `supplier_id`) VALUES
(1, 50001),
(2, 50002),
(3, 50003),
(4, 50004),
(5, 50005),
(6, 50006),
(7, 50007),
(8, 50008),
(9, 50009),
(10, 50010),
(11, 50011),
(12, 50012),
(13, 50013),
(14, 50014);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(5) NOT NULL,
  `employee_id` int(6) UNSIGNED ZEROFILL DEFAULT NULL,
  `brand_name` varchar(50) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `employee_id`, `brand_name`, `phone_number`, `email_address`, `address`) VALUES
(50000, 000002, 'aarong', '8801712345678', 'aarong@gmail.com', '123, Green Road, Dhaka, Bangladesh'),
(50001, 000003, 'rang', '8801812345678', 'rang@gmailcom', '456, Gulshan Avenue, Dhaka, Bangladesh'),
(50002, 000005, 'kay_kraft', '8801912345678', 'kaykraft@gmail.com', '789, Uttara Sector 10, Dhaka, Bangladesh'),
(50003, 000002, 'anjans', '8801512345678', 'anjans@gmail.com', '101, Chittagong Road, Chattogram, Bangladesh'),
(50004, 000003, 'bibiana', '8801612345678', 'bibiana@gmail.com', '234, Dhanmondi Road, Dhaka, Bangladesh'),
(50005, 000005, 'yellow', '8801912345678', 'yellow@gmail.com', '567, Banani Avenue, Dhaka, Bangladesh'),
(50006, 000007, 'le_reve', '8801712345678', 'lereve@gmail.com', '789, Mirpur Road, Dhaka, Bangladesh'),
(50007, 000009, 'sailor', '8801812345678', 'sailor@gmail.com', '101, Gulshan Avenue, Dhaka, Bangladesh'),
(50008, 000002, 'infinity', '8801512345678', 'infinity@gmail.com', '345, Uttara Sector 7, Dhaka, Bangladesh'),
(50009, 000003, 'ecstasy', '8801612345678', 'ecstasy@gmail.com', '678, Baridhara Diplomatic Zone, Dhaka, Bangladesh'),
(50010, 000002, 'zara_fashion', '8801712345678', 'zara.fashion@google.com', '123, Green Road, Dhaka, Bangladesh'),
(50011, 000003, 'nike_sports', '8801812345678', 'nike.sports@googlecom', '456, Gulshan Avenue, Dhaka, Bangladesh'),
(50012, 000005, 'adidas_style', '8801912345678', 'adidas.style@google.com', '789, Uttara Sector 10, Dhaka, Bangladesh'),
(50013, 000002, 'gucci_trends', '8801512345678', 'gucci.trends@google.com', '101, Chittagong Road, Chattogram, Bangladesh'),
(50014, 000003, 'calvin_klein_boutique', '8801612345678', 'calvin.klein@google.com', '234, Dhanmondi Road, Dhaka, Bangladesh'),
(50015, 000005, 'puma_lifestyle', '8801912345678', 'puma.lifestyle@google.com', '567, Banani Avenue, Dhaka, Bangladesh'),
(50016, 000007, 'louis_vuitton_luxe', '8801712345678', 'louis.vuitton@google.com', '789, Mirpur Road, Dhaka, Bangladesh'),
(50017, 000009, 'gap_urbanwear', '8801812345678', 'gap.urbanwear@google.com', '101, Gulshan Avenue, Dhaka, Bangladesh'),
(50018, 000002, 'h&m_fashion', '8801512345678', 'hm.fashion@google.com', '345, Uttara Sector 7, Dhaka, Bangladesh'),
(50019, 000003, 'zegna_tailors', '8801612345678', 'zegna.tailors@google.com', '678, Baridhara Diplomatic Zone, Dhaka'),
(50020, 000002, 'versace_glamour', '8801912345678', 'versace.glamour@google.com', '890, Chittagong Road, Chattogram, Bangladesh'),
(50021, 000003, 'chanel_elegance', '8801712345678', 'chanel.elegance@google.com', '123, Sylhet Avenue, Sylhet, Bangladesh'),
(50022, 000005, 'tommy_hilfiger', '8801812345678', 'tommy.hilfiger@google.com', '456, Rajshahi Street, Rajshahi, Bangladesh'),
(50023, 000007, 'prada_chic', '8801512345678', 'prada.chic@google.com', '789, Khulna Boulevard, Khulna, Bangladesh'),
(50031, 000003, 'arara', '74534531', 'adadard@gmail.com', 'hatijree'),
(50032, 000005, 'popolos', '013215631', 'momo@gmail.com', 'kokilia'),
(50033, 000005, 'piolo', '015861312', 'popo@gmail.com', 'dqsdq'),
(50034, 000005, 'sdqqsd', '6454313', 'adzdq@gmail.com', 'sqdqsdsq');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `warehouse_id` int(2) UNSIGNED ZEROFILL NOT NULL,
  `address` varchar(512) DEFAULT NULL,
  `postcode` int(11) DEFAULT NULL,
  `qty` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`warehouse_id`, `address`, `postcode`, `qty`) VALUES
(01, 'Gulshan', 1212, 417),
(02, 'Banani', 1213, 469),
(03, 'Baridhara', 1212, 139),
(04, 'Dhanmondi', 1209, 252),
(05, 'Uttara', 1230, 145),
(06, 'Mirpur', 1216, 168),
(07, 'Mohammadpur', 1207, 307),
(08, 'Mohakhali', 1212, 329),
(09, 'Motijheel', 1000, 325),
(10, 'Farmgate', 1215, 235),
(11, 'Malibagh', 1217, 103),
(12, 'Rampura', 1219, 470),
(13, 'Badda', 1212, 251),
(14, 'Bashundhara', 1229, 219),
(15, 'Khilgaon', 1219, 243),
(16, 'Tejgaon', 1215, 158),
(17, 'Shyamoli', 1207, 263),
(18, 'Pallabi', 1216, 137),
(19, 'Jatrabari', 1204, 400),
(20, 'Nikunja', 1229, 286),
(21, 'Baily Road', 1000, 200),
(22, 'Arambag', 1000, 200);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `customer_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `product_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`customer_id`, `product_id`) VALUES
(00006, 40012),
(00006, 40013),
(00006, 40014),
(00006, 40015),
(00006, 40045),
(00006, 40048),
(00056, 40002),
(00056, 40003),
(00056, 40004),
(00056, 40013),
(00056, 40014);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adds`
--
ALTER TABLE `adds`
  ADD PRIMARY KEY (`order_id`,`customer_id`,`product_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`product_id`,`percentage`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `warehouse_id_fk` (`warehouse_id`),
  ADD KEY `employee_id_fk` (`stock`);

--
-- Indexes for table `refund`
--
ALTER TABLE `refund`
  ADD PRIMARY KEY (`order_id`,`product_id`,`customer_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`product_id`,`customer_id`,`user_review`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`warehouse_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`customer_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=996;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40651;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50035;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `warehouse_id` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
