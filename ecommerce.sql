--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'HP'),
(2, 'DELL'),
(3, 'LG'),
(4, 'Samsung'),
(5, 'Sony'),
(6, 'Toshiba');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `P_id` int(10) NOT NULL,
  `Ip_add` varchar(255) NOT NULL,
  `Qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`P_id`, `Ip_add`, `Qty`) VALUES
(3, '::1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `categoris`
--

CREATE TABLE `categoris` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categoris`
--

INSERT INTO `categoris` (`cat_id`, `cat_title`) VALUES
(1, 'Laptops'),
(2, 'Cameras'),
(3, 'Mobiles'),
(4, 'Computers'),
(5, 'iPads'),
(6, 'iPhones');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `Customer_id` int(10) NOT NULL,
  `Customer_ip` varchar(255) NOT NULL,
  `Customer_name` text NOT NULL,
  `Customer_email` varchar(100) NOT NULL,
  `Customer_pass` varchar(100) NOT NULL,
  `Customer_country` text NOT NULL,
  `Customer_city` text NOT NULL,
  `Customer_contact` varchar(255) NOT NULL,
  `Customer_adress` text NOT NULL,
  `Customer_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Product_id` int(100) NOT NULL,
  `Product_cat` int(100) NOT NULL,
  `Product_brand` int(100) NOT NULL,
  `Product_title` varchar(255) NOT NULL,
  `Product_price` varchar(100) NOT NULL,
  `Product_desc` text NOT NULL,
  `Product_image` text NOT NULL,
  `Product_keywords` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_id`, `Product_cat`, `Product_brand`, `Product_title`, `Product_price`, `Product_desc`, `Product_image`, `Product_keywords`) VALUES
(2, 1, 1, 'HP Laptop', '500', '<p>i3 procesor</p>\r\n<p>4GB rama</p>\r\n<p>inegrisana graficka</p>\r\n<p>250GB HDD</p>', 'c05059975.png', 0x48502532436c6170746f7025324369332532433447422532433235304742),
(3, 3, 4, 'Samsung Galaxy J7', '350', '<p><span class="irc_iis"><a class="_Epb irc_tas i3598" tabindex="0" href="http://gadgets.ndtv.com/samsung-galaxy-j7-2016-3399" target="_blank" rel="noopener noreferrer" data-noload="" data-ved="0ahUKEwiK3JD2ofLQAhVFnBoKHfBlD9YQjhwIBQ"><span class="irc_pt" dir="ltr" style="text-align: left;">Samsung Galaxy J7</span></a></span></p>\r\n<p><span class="irc_iis">1,5GB rama</span></p>\r\n<p><span class="irc_iis">20Mpx zadnja kamera</span></p>', '3292016114244AM_635_samsung_galaxy_j7_2016.jpeg', 0x53616d73756e672532434a3725324332304d7078);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`P_id`);

--
-- Indexes for table `categoris`
--
ALTER TABLE `categoris`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `categoris`
--
ALTER TABLE `categoris`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `Customer_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
