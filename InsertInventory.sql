
--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `desc`, `price`, `rrp`, `quantity`, `img`, `date_added`) VALUES
(1, 'Five Point Someone', 'What not to do in IIT', '39.00', '0.00', 49, '2.png', '2020-10-21 17:55:22'),
(2, 'Nazrul Giti', 'Songs of Kaji Nazrul Islam', '50.00', '10.00', 30, '4.png', '2019-03-13 18:52:49'),
(3, 'Wings of Fire', 'Autobiography of APJ Abdul Kalam', '40.00', '0.00', 17, '3.png', '2020-10-21 00:00:00'),
(4, 'Golpoguccho', 'Short Stories by Rabindranath Tagore', '70.00', '0.00', 20, '1.png', '2019-03-13 17:42:04'),
(5, 'Holy Bible', 'The Holy Bible is defined as a book believed by Christians to contain the revelations of God and is the guiding holy text of the Christian religion.', '45.00', '5.00', 100, '5.png', '2020-03-20 00:00:00');


--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `address`, `payment`, `pid`) VALUES
(1, 'Abhishek', 'Chakladar', 'HaladharBoseRoad,Panihati', 'Debit Card', 1);


--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `firstname`, `lastname`, `product_id`, `total_price`) VALUES
(1, 'Abc', 'def', 3, '1'),
(2, 'ABC', 'DEF', 4, '1'),
(6, 'Harmanpreet', 'Kaur', 1, '2'),
(7, 'Abhishek', 'Chakladar', 2, '1');

