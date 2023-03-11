-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2022 at 05:22 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news-web`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `post` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(34, 'Sports', 3),
(31, 'Entertainment', 1),
(32, 'Politics', 4),
(33, 'Health', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comm_id` int(10) NOT NULL,
  `post_id` int(10) NOT NULL,
  `n_user_username` varchar(50) DEFAULT NULL,
  `comment` varchar(100) NOT NULL,
  `date` varchar(50) NOT NULL,
  `n_user_img` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comm_id`, `post_id`, `n_user_username`, `comment`, `date`, `n_user_img`, `status`) VALUES
(9, 48, 'modi', 'This comments by modi', '10 Jan, 2022', '1641324720-manprofile1.png', 0),
(12, 48, 'rasik', 'Congratulations every Indians...... We Have to proud of our player.....', '10 Jan, 2022', '1641813131-rasik.png', 1),
(14, 49, 'modi', 'This commments at 12 jan, 2022', '12 Jan, 2022', '1641324720-manprofile1.png', 1),
(15, 51, 'pramod', 'Surat city is diamond city.', '13 Jan, 2022', '1641989969-pramod.png', 1),
(16, 46, 'rasik', 'This comments by rasik with log in', '13 Jan, 2022', '1641813131-rasik.png', 1),
(18, 49, 'pramod', 'yes education is politics', '19 Jan, 2022', '1641989969-pramod.png', 1),
(19, 44, 'darshan', 'This comments by darshan in politics post 24-01', '24 Jan, 2022', '1643022354-darsh.png', 1),
(20, 45, 'pooja', 'this  comment by pooja on wonderwood at 24-01 day thank you', '24 Jan, 2022', '1641751221-girl-profile-pic-red-2.jpg', 1),
(21, 53, 'pramod', 'hey nice ', '25 Jan, 2022', '1641989969-pramod.png', 1),
(22, 54, 'yogi', 'hey nice post i like it\r\nthank you...!!', '02 Feb, 2022', '1641364389-man-black-profile-2.jpg', 1),
(24, 46, 'pooja', 'this is comment by pooja user', '19 Feb, 2022', '1641751221-girl-profile-pic-red-2.jpg', 0),
(26, 59, 'modi', 'hello', '21 Feb, 2022', '1641324720-manprofile1.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `cid` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `cdate` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cid`, `name`, `email`, `message`, `cdate`) VALUES
(1, 'Mehul Sartanapara', 'mehulsartanpara@gmaiil.com', 'This is testing message by Mehul Sartanpara its work ???', '01 Feb, 2022'),
(2, 'Yahoo Baba', 'yahoobaba@gmail.com', 'This is another message my yahoo baba its work ??', '01 Feb, 2022'),
(3, 'Demo Message', 'demo@gmail.com', 'hey this is demo message by me.....', '01 Feb, 2022'),
(5, 'testing for', 'testinng for date', 'testing for dateokk pleade ', '02 Feb, 2022');

-- --------------------------------------------------------

--
-- Table structure for table `n_user`
--

CREATE TABLE `n_user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `n_user_img` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `n_user`
--

INSERT INTO `n_user` (`user_id`, `first_name`, `last_name`, `username`, `email`, `phone`, `password`, `n_user_img`) VALUES
(5, 'Modi', 'Narendra', 'modi', 'modi@gmail.com', '9909693091', '58660725f6fe377e99dfef88b5783e44', '1641324720-manprofile1.png'),
(6, 'Yogi', 'Aditya', 'yogi', 'yogi@gmail.com', '8141045509', '787c54b79b7629996a41ef741fe4345f', '1641364389-man-black-profile-2.jpg'),
(16, 'Pramod', 'Nandanwar', 'pramod', 'pramod@gmail.com', '6794287319', 'bb16fa6160fa1d8a73eba6217844a08b', '1641989969-pramod.png'),
(20, 'Darshan', 'Kaklotar', 'darshan', 'darshankaklotar@gmail.com', '7203078026', '406f84c0877f9574a5295bb8f4d0ee6f', '1643179790-darsh.png');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `post_img` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(51, 'Surat will be the worlds fastest growing city from 2010 to 2020', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '32', '12 Jan, 2022', 43, '1642010288-surat.jpg'),
(55, 'demo Post', '                                                                                                                        <p>this is demo <b>post </b>pop model decription</p>                                                                                                ', '34', '31 Jan, 2022', 42, '1643645166-karsten-winegeart-0Wra5YYVQJE-unsplash.jpg'),
(44, 'White House says it is \'grateful\' Trump got, promoted COVID-19 booster shot Th', 'WASHINGTON (Reuters) - The White House is grateful that former U.S. President Donald Trump received and promoted getting the COVID-19 vaccine booster shot, press secretary Jen Psaki said on Thursday.\r\n\r\nThe Republican former president recently said in an interview that he received a booster shot, and called the COVID-19 vaccines “one of the greatest achievements of mankind.”\r\n\r\n“The ones that get very sick and go to the hospital are the ones that don’t take the vaccine,” Trump said in an interview with conservative commentator Candace Owens. “If you take the vaccine, you’re protected.”', '32', '24 Dec, 2021', 45, '1640343721-arnaud-jaegers-IBWJsMObnnU-unsplash.jpg'),
(45, 'Shruti Chakraborty A Celebration of Womanhood ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida cursus tempor. Mauris eget magna vestibulum nisi semper interdum. Suspendisse semper, libero sit amet ullamcorper eleifend, turpis sapien volutpat tortor, at vulputate risus sem eget urna. Quisque quam tellus, dictum fringilla neque a, pellentesque mattis eros. Mauris nulla nisi, porta id libero at, auctor tincidunt nisl. Suspendisse ut dui tellus. Suspendisse quis erat sed nibh posuere feugiat. Vivamus dignissim pharetra metus id volutpat.', '31', '24 Dec, 2021', 44, '1640344027-vidar-nordli-mathisen-Xb__KZBPzHQ-unsplash.jpg'),
(46, 'Health is important', '                                        <b>Curabitur quis feugiat dui.</b> Quisque in scelerisque mauris, ut laoreet risus. Nulla facilisi. Donec a mi dolor. Vestibulum sed rutrum urna. Cras at mauris scelerisque, porttitor eros quis, cursus ipsum. Mauris aliquet nunc eros. Morbi accumsan est nec ultrices mollis. In venenatis justo nisi, a vestibulum risus viverra a. Sed dapibus est in nulla gravida auctor. Etiam hendrerit laoreet sem, at fermentum dolor rhoncus non. Sed et sem non magna facilisis vestibulum in quis dui. Morbi eget egestas mauris. Duis vitae turpis et turpis ultrices <a href=\"http://www.youtube.com\" target=\"_blank\">dapibus</a>.\r\n\r\n                                                                                                                                ', '33', '24 Dec, 2021', 41, '1640344095-jenny-hill-Io2Zgb3_kdk-unsplash.jpg'),
(54, 'Finally India get gold in this year..', '                                                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over <b>2000 years old</b>. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.<u><b><span style=\"font-family: Impact;\"> Lorem Ipsum</span></b></u> comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. <u>Sections</u> 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by <a href=\"http://w3spaces.itsblog.com\" target=\"_blank\">H. Rackham</a>.</p>                                                ', '34', '28 Jan, 2022', 42, '1643348567-vince-fleming-aZVpxRydiJk-unsplash.jpg'),
(49, 'Now days Education is Politics By Mehul-Admin', '                                                            <b> Crass Et iaculis tortor. Duis vitae nulla sit amet est ultrices lacinia. Ut ut accumsan sem, lobortis rutrum lacus. Ut ac eros blandit, tincidunt massa vel, facilisis quam. Vestibulum porttitor velit volutpat nulla tristique,</b> sollicitudin dapibus orci aliquet. In ultrices dapibus risus in mattis. Pellentesque pharetra justo enim, sit amet posuere mauris faucibus et. Nam non libero in sapien finibus luctus vel eu purus. In vel sodales erat. Proin vulputate velit eros, eu vulputate tortor ultricies pharetra. Fusce nec urna scelerisque, feugiat urna nec, finibus elit. Aliquam fringilla orci id rhoncus pulvinar. Etiam id arcu velit.                                                                                                                                                                                                                                                ', '32', '24 Dec, 2021', 42, '1640344368-marco-oriolesi-wqLGlhjr6Og-unsplash.jpg'),
(57, 'this post by jagu-admin', '                    <p>This is just a testing post by <b style=\"background-color: rgb(255, 255, 0);\">admin</b>.........</p>                ', '34', '18 Feb, 2022', 41, '1645184929-alexander-redl-d3bYmnZ0ank-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `websitename` varchar(60) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `footerdesc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `websitename`, `logo`, `footerdesc`) VALUES
(1, 'News Blog', 'news.jpg', '© Copyright 2022 News | Powered by <a href=\"https://itsblog.w3spaces.com/\" target=\"_blank\">News Blog</a>');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` int(11) NOT NULL,
  `user_img` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `email`, `password`, `role`, `user_img`) VALUES
(43, 'Amrat', 'Patel', 'amrat', 'amrat@gmail.com', '56b51276acc70c22b86b03bb8d63889e', 0, '1643017994-Images-6.jpg'),
(42, 'Mehul', 'Sartanpara', 'mehul', 'mehulsartanpara091@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1, '1645423942-mehul.jpg'),
(41, 'Jagruti', 'Jogi', 'Jagu', 'jagruti@gmail.com', 'd4f6169fc5fe71d0a1a76cbe6a274c6e', 1, '1640341215-girl-profile-pic-red-2.jpg'),
(44, 'Vishal', 'Patel', 'vishal', 'vishal@gmail.com', '8b64d2451b7a8f3fd17390f88ea35917', 0, '1643017953-toy.png'),
(45, 'Ankit ', 'Kaklotarr', 'ankitt', 'ankit@gmail.com', '447d2c8dc25efbc493788a322f1a00e7', 0, '1645423840-ankit.png'),
(50, 'Keval', 'Sartanpara', 'keval', 'keval@gmail.com', '1dec7b4fbf4eafe03f2734d08849dd1f', 0, '1645423773-darsh.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comm_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `n_user`
--
ALTER TABLE `n_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comm_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `n_user`
--
ALTER TABLE `n_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
