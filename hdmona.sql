-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2018 at 06:52 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hdmona`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) NOT NULL,
  `admin_name` text NOT NULL,
  `admin_password` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_password`) VALUES
(1, 'john', 'adminpassword');

-- --------------------------------------------------------

--
-- Table structure for table `coming_up`
--

CREATE TABLE IF NOT EXISTS `coming_up` (
`coming_id` int(200) NOT NULL,
  `coming_image` text NOT NULL,
  `coming_topic` text NOT NULL,
  `coming_date` date NOT NULL,
  `coming_link` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coming_up`
--

INSERT INTO `coming_up` (`coming_id`, `coming_image`, `coming_topic`, `coming_date`, `coming_link`) VALUES
(1, '4-2.jpg', 'fasd', '0000-00-00', 'fasdfasdfasdfadsf'),
(2, '4-2.jpg', 'fasd', '2018-07-03', 'fasdfasdfasdfadsf'),
(3, '4-2.jpg', 'fasd', '2018-07-03', 'fasdfasdfasdfadsf'),
(4, '4-2.jpg', 'fsdgsfdgsgf', '2018-07-11', 'gsdfgsdfgsdfgsdfgdfg'),
(5, '4-2.jpg', 'fsdgsfdgsgf', '2018-07-11', 'gsdfgsdfgsdfgsdfgdfg'),
(6, '4-2.jpg', 'fsdgsfdgsgf', '2018-07-11', 'gsdfgsdfgsdfgsdfgdfg');

-- --------------------------------------------------------

--
-- Table structure for table `hd_comm`
--

CREATE TABLE IF NOT EXISTS `hd_comm` (
`id` int(111) NOT NULL,
  `comm` text NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hd_comm`
--

INSERT INTO `hd_comm` (`id`, `comm`, `user`) VALUES
(6, 'hi', 3),
(8, 'zzhzbsvdd', 4),
(9, 'fajhsdkfjaksdfhak', 5),
(10, 'fajhsdkfjaksdfhak', 5),
(12, 'say', 6),
(13, 'haksjdfhajdfh', 7),
(15, 'Hello Hdmona srahkum kemey alo', 8),
(17, 'Dasdasdasd', 9),
(19, 'this is the message from john jst checking', 10),
(21, 'on other comment', 10),
(24, 'this is jams calling', 11),
(26, 'if new it will be here', 11),
(27, 'this is selam', 12),
(29, 'check this out', 12),
(30, 'this is good gladi am here', 13),
(31, 'great', 13),
(32, 'dasfasdfa', 14),
(33, 'this is jasmin', 15),
(34, 'second text jasmin', 15),
(35, 'this is good glad i am here', 13),
(36, 'secon time jorden', 13),
(37, 'vcjfkdjghslkdfg', 17),
(38, 'this is from sami', 17),
(39, 'thsi is from james', 18),
(40, 'comment james', 18),
(42, 'danu her coment againf dkjfh akdhf f fh kdjf', 19),
(44, 'again sinit 2d dsfkjahdfk jadlfh alskdfh ', 20),
(45, 'ma bro God loves you all the time YOU DID IT ..', 21),
(46, 'this is good', 22);

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE IF NOT EXISTS `movie` (
`id` int(11) NOT NULL,
  `full_movie` text NOT NULL,
  `name` text NOT NULL,
  `descri` text NOT NULL,
  `date_time` date NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `full_movie`, `name`, `descri`, `date_time`, `image`) VALUES
(1, 'http://youtube.com', 'model', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas imperdiet venenatis sodales. Nunc elementum scelerisque nibh, nec pellentesque lacus hendrerit sit amet. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras luctus euismod augue, vitae pulvinar est feugiat vitae. Nunc ultricies facilisis mi sed commodo. Aliquam erat volutpat. Etiam id libero nunc. Morbi porttitor porta urna at facilisis.', '2018-07-04', 'Gebarn_Mogosn_2.jpg'),
(2, 'http://youtube.com', 'model', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas imperdiet venenatis sodales. Nunc elementum scelerisque nibh, nec pellentesque lacus hendrerit sit amet. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras luctus euismod augue, vitae pulvinar est feugiat vitae. Nunc ultricies facilisis mi sed commodo. Aliquam erat volutpat. Etiam id libero nunc. Morbi porttitor porta urna at facilisis.', '2018-07-04', 'Gebarn_Mogosn_2.jpg'),
(3, 'http://youtube.com', 'model', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas imperdiet venenatis sodales. Nunc elementum scelerisque nibh, nec pellentesque lacus hendrerit sit amet. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras luctus euismod augue, vitae pulvinar est feugiat vitae. Nunc ultricies facilisis mi sed commodo. Aliquam erat volutpat. Etiam id libero nunc. Morbi porttitor porta urna at facilisis.', '2018-07-04', 'Gebarn_Mogosn_2.jpg'),
(4, 'http://youtube.com', 'dsfasdfasdfasdfasdf', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas imperdiet venenatis sodales. Nunc elementum scelerisque nibh, nec pellentesque lacus hendrerit sit amet. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras luctus euismod augue, vitae pulvinar est feugiat vitae. Nunc ultricies facilisis mi sed commodo. Aliquam erat volutpat. Etiam id libero nunc. Morbi porttitor porta urna at facilisis.', '0000-00-00', 'Gebarn_Mogosn_2.jpg'),
(5, 'http://youtube.com', 'dsfasdfasdfasdfasdf', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas imperdiet venenatis sodales. Nunc elementum scelerisque nibh, nec pellentesque lacus hendrerit sit amet. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras luctus euismod augue, vitae pulvinar est feugiat vitae. Nunc ultricies facilisis mi sed commodo. Aliquam erat volutpat. Etiam id libero nunc. Morbi porttitor porta urna at facilisis.', '0000-00-00', 'Gebarn_Mogosn_2.jpg'),
(6, 'http://youtube.com', 'dsfasdfasdfasdfasdf', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas imperdiet venenatis sodales. Nunc elementum scelerisque nibh, nec pellentesque lacus hendrerit sit amet. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras luctus euismod augue, vitae pulvinar est feugiat vitae. Nunc ultricies facilisis mi sed commodo. Aliquam erat volutpat. Etiam id libero nunc. Morbi porttitor porta urna at facilisis.', '0000-00-00', 'Gebarn_Mogosn_2.jpg'),
(7, 'http://youtube.com', 'dsfasdfasdfasdfasdf', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas imperdiet venenatis sodales. Nunc elementum scelerisque nibh, nec pellentesque lacus hendrerit sit amet. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras luctus euismod augue, vitae pulvinar est feugiat vitae. Nunc ultricies facilisis mi sed commodo. Aliquam erat volutpat. Etiam id libero nunc. Morbi porttitor porta urna at facilisis.', '0000-00-00', 'Gebarn_Mogosn_2.jpg'),
(40, 'http://youtube.com', 'movie test one', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas imperdiet venenatis sodales. Nunc elementum scelerisque nibh, nec pellentesque lacus hendrerit sit amet. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras luctus euismod augue, vitae pulvinar est feugiat vitae. Nunc ultricies facilisis mi sed commodo. Aliquam erat volutpat. Etiam id libero nunc. Morbi porttitor porta urna at facilisis', '2018-07-21', 'hdmona544218.png'),
(41, 'fdsfasdf', 'fsdfasdf', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas imperdiet venenatis sodales. Nunc elementum scelerisque nibh, nec pellentesque lacus hendrerit sit amet. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras luctus euismod augue, vitae pulvinar est feugiat vitae. Nunc ultricies facilisis mi sed commodo. Aliquam erat volutpat. Etiam id libero nunc. Morbi porttitor porta urna at facilisis.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas imperdiet venenatis sodales. Nunc elementum scelerisque nibh, nec pellentesque lacus hendrerit sit amet. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras luctus euismod augue, vitae pulvinar est feugiat vitae. Nunc ultricies facilisis mi sed commodo. Aliquam erat volutpat. Etiam id libero nunc. Morbi porttitor porta urna at facilisis.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas imperdiet venenatis sodales. Nunc elementum scelerisque nibh, nec pellentesque lacus hendrerit sit amet. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras luctus euismod augue, vitae pulvinar est feugiat vitae. Nunc ultricies facilisis mi sed commodo. Aliquam erat volutpat. Etiam id libero nunc. Morbi porttitor porta urna at facilisis.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas imperdiet venenatis sodales. Nunc elementum scelerisque nibh, nec pellentesque lacus hendrerit sit amet. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras luctus euismod augue, vitae pulvinar est feugiat vitae. Nunc ultricies facilisis mi sed commodo. Aliquam erat volutpat. Etiam id libero nunc. Morbi porttitor porta urna at facilisis.', '0000-00-00', 'hdmona946221.jpg'),
(45, 'http://youtube.com/asdfasdfasd', 'number one', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas imperdiet venenatis sodales. Nunc elementum scelerisque nibh, nec pellentesque lacus hendrerit sit amet. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras luctus euismod augue, vitae pulvinar est feugiat vitae. Nunc ultricies facilisis mi sed commodo. Aliquam erat volutpat. Etiam id libero nunc. Morbi porttitor porta urna at facilisis.', '2018-08-02', 'hdmona498518.png'),
(46, 'new link.com', 'new name', 'mored description', '2018-08-31', 'hdmona934148.png'),
(47, 'link.com', 'hdmona', 'descrip', '2018-08-09', 'hdmona917198.png'),
(48, 'fasdfasdfasdfasdfasdfasdfa', 'fasdfadsfasdfasdfadsfasdf', 'fasdfasdfasdfadsfasdf', '2018-08-01', 'hdmona87644.png'),
(49, 'afasdfad', 'fsdfa', 'fsdf', '2018-07-31', 'hdmona568151.png'),
(50, 'fasdfadsfa', 'fasdfaf', 'fasdfasdf', '2018-08-09', 'hdmona424160.png'),
(51, 'fasdfadsfa', 'fasdfadsfasdfasdfadsfasdff', 'sdfasdfa', '2018-08-08', 'hdmona32188.png');

-- --------------------------------------------------------

--
-- Table structure for table `movie_com_likes`
--

CREATE TABLE IF NOT EXISTS `movie_com_likes` (
`id` int(11) NOT NULL,
  `movie_com_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie_com_likes`
--

INSERT INTO `movie_com_likes` (`id`, `movie_com_id`, `user_id`) VALUES
(1, 7, 9),
(2, 7, 9);

-- --------------------------------------------------------

--
-- Table structure for table `movie_likes`
--

CREATE TABLE IF NOT EXISTS `movie_likes` (
`id` int(111) NOT NULL,
  `movie_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE IF NOT EXISTS `music` (
`id` int(11) NOT NULL,
  `music_link` text NOT NULL,
  `music_name` text NOT NULL,
  `music_desc` text NOT NULL,
  `music_image` text NOT NULL,
  `music_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`id`, `music_link`, `music_name`, `music_desc`, `music_image`, `music_date`) VALUES
(6, 'http://youtube.com', 'hoho', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas imperdiet venenatis sodales. Nunc elementum scelerisque nibh, nec pellentesque lacus hendrerit sit amet. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras luctus euismod augue, vitae pulvinar est feugiat vitae. Nunc ultricies facilisis mi sed commodo. Aliquam erat volutpat. Etiam id libero nunc. Morbi porttitor porta urna at facilisis.', '4.jpg', '2018-07-17'),
(7, 'http://youtube.com', 'hoho', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas imperdiet venenatis sodales. Nunc elementum scelerisque nibh, nec pellentesque lacus hendrerit sit amet. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras luctus euismod augue, vitae pulvinar est feugiat vitae. Nunc ultricies facilisis mi sed commodo. Aliquam erat volutpat. Etiam id libero nunc. Morbi porttitor porta urna at facilisis.', '4.jpg', '2018-07-17'),
(8, 'http://youtube.com', 'hoho', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas imperdiet venenatis sodales. Nunc elementum scelerisque nibh, nec pellentesque lacus hendrerit sit amet. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras luctus euismod augue, vitae pulvinar est feugiat vitae. Nunc ultricies facilisis mi sed commodo. Aliquam erat volutpat. Etiam id libero nunc. Morbi porttitor porta urna at facilisis.', '4.jpg', '2018-07-17'),
(20, 'http://youtube.com', 'gsdfkjhglksdfhgls', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas imperdiet venenatis sodales. Nunc elementum scelerisque nibh, nec pellentesque lacus hendrerit sit amet. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras luctus euismod augue, vitae pulvinar est feugiat vitae. Nunc ultricies facilisis mi sed commodo. Aliquam erat volutpat. Etiam id libero nunc. Morbi porttitor porta urna at facilisis.', '4.jpg', '2018-11-29'),
(21, 'link to the music', 'music name', 'dercriptoin ', 'hdmona71089.png', '2018-08-31'),
(22, 'link2.com', 'music name 2 ', 'descriofalskdf', 'hdmona26700.png', '2018-08-29');

-- --------------------------------------------------------

--
-- Table structure for table `music_likes`
--

CREATE TABLE IF NOT EXISTS `music_likes` (
`id` int(255) NOT NULL,
  `music_product_id` text NOT NULL,
  `user_id` int(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `music_user_com`
--

CREATE TABLE IF NOT EXISTS `music_user_com` (
`music_com_id` int(111) NOT NULL,
  `music_user_id` int(111) NOT NULL,
  `music_pro_id` int(111) NOT NULL,
  `music_com_date` date NOT NULL,
  `music_comment` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `music_user_com`
--

INSERT INTO `music_user_com` (`music_com_id`, `music_user_id`, `music_pro_id`, `music_com_date`, `music_comment`) VALUES
(1, 7, 6, '2018-08-08', 'dsjfhaksjdhfa'),
(2, 7, 6, '2018-08-08', 'dsjfhaksjdhfa'),
(3, 10, 8, '2018-08-13', 'the music comment'),
(4, 10, 8, '2018-08-13', 'the music comment'),
(5, 11, 20, '2018-08-13', 'this is here also commenting'),
(6, 11, 20, '2018-08-13', 'this is here also commenting'),
(7, 11, 7, '2018-08-13', 'and here also'),
(8, 11, 7, '2018-08-13', 'and here also'),
(9, 12, 8, '2018-08-13', 'fdasdfasdfasdfaf'),
(10, 12, 8, '2018-08-13', 'fdasdfasdfasdfaf'),
(11, 12, 7, '2018-08-13', 'dfasdfadsfa'),
(12, 12, 7, '2018-08-13', 'dfasdfadsfa'),
(13, 12, 20, '2018-08-13', 'fgfdgsdf fd sdfgsfdg sfd'),
(14, 12, 20, '2018-08-13', 'fgfdgsdf fd sdfgsfdg sfd'),
(15, 12, 20, '2018-08-14', 'fjasdfhlaskdjfhaksf'),
(16, 12, 6, '2018-08-14', 'jfhalksdjhflakjsdfa'),
(17, 12, 6, '2018-08-14', 'fjahsdkjfhkasd jhaksdjf haksldfh laksdfh aksdjfh alk'),
(18, 13, 7, '2018-08-16', 'jorden again'),
(19, 18, 8, '2018-08-20', 'this is good james'),
(20, 19, 8, '2018-08-20', 'danu here'),
(21, 19, 21, '2018-08-20', 'new music comment'),
(22, 20, 21, '2018-08-20', 'nice sinit'),
(23, 22, 22, '2018-08-29', 'HI MUSIC PART');

-- --------------------------------------------------------

--
-- Table structure for table `top_5`
--

CREATE TABLE IF NOT EXISTS `top_5` (
`top_id` int(5) NOT NULL,
  `top_link` varchar(111) NOT NULL,
  `top_name` text NOT NULL,
  `top_topic` text NOT NULL,
  `top_image` text NOT NULL,
  `release_hours_from` int(11) NOT NULL,
  `realese_hours_to` int(11) NOT NULL,
  `top_description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `top_5`
--

INSERT INTO `top_5` (`top_id`, `top_link`, `top_name`, `top_topic`, `top_image`, `release_hours_from`, `realese_hours_to`, `top_description`) VALUES
(1, 'http://youtube.com', 'other name', 'fasdfadsfadsf', '4-2.jpg', 8, 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas imperdiet venenatis sodales. Nunc elementum scelerisque nibh, nec pellentesque lacus hendrerit sit amet. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras luctus euismod augue, vitae pulvinar est feugiat vitae. Nunc ultricies facilisis mi sed commodo. Aliquam erat volutpat. Etiam id libero nunc. Morbi porttitor porta urna at facilisis.'),
(2, 'http://youtube.com', 'other name', 'fasdfadsfadsf', '4-2.jpg', 8, 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas imperdiet venenatis sodales. Nunc elementum scelerisque nibh, nec pellentesque lacus hendrerit sit amet. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras luctus euismod augue, vitae pulvinar est feugiat vitae. Nunc ultricies facilisis mi sed commodo. Aliquam erat volutpat. Etiam id libero nunc. Morbi porttitor porta urna at facilisis.');

-- --------------------------------------------------------

--
-- Table structure for table `tv_show`
--

CREATE TABLE IF NOT EXISTS `tv_show` (
`tv_show_id` int(255) NOT NULL,
  `tv_show_name` text NOT NULL,
  `tv_show_link` text NOT NULL,
  `tv_show_descri` text NOT NULL,
  `tv_show_img` text NOT NULL,
  `tv_show_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tv_show`
--

INSERT INTO `tv_show` (`tv_show_id`, `tv_show_name`, `tv_show_link`, `tv_show_descri`, `tv_show_img`, `tv_show_date`) VALUES
(1, 'madsfa', 'http://this.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas imperdiet venenatis sodales. Nunc elementum scelerisque nibh, nec pellentesque lacus hendrerit sit amet. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras luctus euismod augue, vitae pulvinar est feugiat vitae. Nunc ultricies facilisis mi sed commodo. Aliquam erat volutpat. Etiam id libero nunc. Morbi porttitor porta urna at facilisis.\r\n ', 'image-4.jpg', '2018-07-18'),
(2, 'rtyetryetr', 'http://musicshow.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas imperdiet venenatis sodales. Nunc elementum scelerisque nibh, nec pellentesque lacus hendrerit sit amet. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras luctus euismod augue, vitae pulvinar est feugiat vitae. Nunc ultricies facilisis mi sed commodo. Aliquam erat volutpat. Etiam id libero nunc. Morbi porttitor porta urna at facilisis.\r\n ', 'image-4.jpg', '2018-07-18'),
(3, 'jkgjkgjkgjh', 'http://youtube.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas imperdiet venenatis sodales. Nunc elementum scelerisque nibh, nec pellentesque lacus hendrerit sit amet. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras luctus euismod augue, vitae pulvinar est feugiat vitae. Nunc ultricies facilisis mi sed commodo. Aliquam erat volutpat. Etiam id libero nunc. Morbi porttitor porta urna at facilisis.\r\n ', 'image-4.jpg', '2018-07-18'),
(4, 'pooqw', 'http://youtube.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas imperdiet venenatis sodales. Nunc elementum scelerisque nibh, nec pellentesque lacus hendrerit sit amet. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras luctus euismod augue, vitae pulvinar est feugiat vitae. Nunc ultricies facilisis mi sed commodo. Aliquam erat volutpat. Etiam id libero nunc. Morbi porttitor porta urna at facilisis.\r\n ', 'image-4.jpg', '2018-07-18'),
(5, 'fdgfdgfdgsg', 'http://youtube.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas imperdiet venenatis sodales. Nunc elementum scelerisque nibh, nec pellentesque lacus hendrerit sit amet. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras luctus euismod augue, vitae pulvinar est feugiat vitae. Nunc ultricies facilisis mi sed commodo. Aliquam erat volutpat. Etiam id libero nunc. Morbi porttitor porta urna at facilisis.\r\n ', 'image-4.jpg', '2018-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `tv_show_comm`
--

CREATE TABLE IF NOT EXISTS `tv_show_comm` (
`id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tv_show_pro_id` int(111) NOT NULL,
  `tv_show_comment` text NOT NULL,
  `tv_show_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tv_show_comm`
--

INSERT INTO `tv_show_comm` (`id`, `user_id`, `tv_show_pro_id`, `tv_show_comment`, `tv_show_date`) VALUES
(2, 8, 3, 'Nice', '2018-08-08'),
(3, 12, 3, 'fsadfadsf dsfdfasdf sdf ds adsf ad', '2018-08-13'),
(4, 12, 3, 'fsadfadsf dsfdfasdf sdf ds adsf ad', '2018-08-13'),
(5, 12, 2, 'cdfdsf daf ads fasd fasdf asd', '2018-08-13'),
(6, 12, 2, 'cdfdsf daf ads fasd fasdf asd', '2018-08-13'),
(8, 12, 1, 'df asdf ds', '2018-08-13'),
(10, 12, 3, 'dfasdfasd', '2018-08-13'),
(12, 12, 2, 'dafasdfasd', '2018-08-13'),
(14, 12, 5, 'fasd', '2018-08-13'),
(16, 12, 1, 'dSdasd', '2018-08-13'),
(17, 12, 2, 'dfasdf', '2018-08-13'),
(20, 12, 1, 'fasdfasd', '2018-08-13'),
(21, 12, 4, 'fjhsdlkjfh df dskfj a', '2018-08-14'),
(22, 12, 1, 'dsjkfhksdjfhlads', '2018-08-14'),
(23, 12, 3, 'this is', '2018-08-14'),
(24, 12, 5, 'fdkjsfg ldfkjsfdlkg sfkjg kdf gkjfdg kgh', '2018-08-14'),
(25, 12, 5, 's df sdf sf fd sfg', '2018-08-14'),
(26, 14, 3, 'avici', '2018-08-18'),
(27, 20, 1, 'the same here', '2018-08-20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `hdmona_user_activation_code` text NOT NULL,
  `status` text NOT NULL,
  `usr_img` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `hdmona_user_activation_code`, `status`, `usr_img`) VALUES
(2, 'john', 'joieama2017@gmail.com', 'jshdfkjasdfkj', 'f6a0809b7f72d3310dc58ff04b5fadd8', 'not activat', '604461.png'),
(3, 'hueuy', 'www.huruy@yhoo.com', 'user_Account_Deleted', '09d7de7eb33cc3b65f4e19b43f8bc81e', 'not activat', '86973.jpg'),
(4, 'yemane', 'yemane@gmail.com', '123456', '567431a7bb9273da729db5650a995590', 'not activat', '909027.jpg'),
(5, 'samnmi', 'FJASDLKFJ@FKSLDJHFLAKJFD.AD', '1235456', '1a07bcc79f21590b3ed2622d5807bdd0', 'not activat', '109716.png'),
(6, 'huruy yemane', 'www.huruy@yhoo.com', 'huruy', '6b5754d737784b51ec5075c0dc437bf0', 'not activat', '489464.jpg'),
(7, 'lapdesk', 'hdjsdgf@fdf.com', '12345', '47841cc9e552bd5c40164db7073b817b', 'not activat', '401173.jpg'),
(8, 'Tewelde', 'tewe1607@gmail.com', '16071607', '15ea43997c9e00317564201ca5267210', 'not activat', '786530.jpg'),
(9, 'cjdskfhalsdkj', 'jkdsfka@jsdfa.adsfljads', 'johnjohn', '5699ea73cda4c69b17c2255ec26db204', 'not activat', '825950.png'),
(10, 'john ama', 'joieama2017@gmail.com', 'user_Account_Deleted', '2bd2e3373dce441c6c3bfadd1daa953e', 'not activat', '389466.png'),
(11, 'jams', 'skdjalksjdlaksd@jlaskdjflasf.co', '123456', 'a9ddacdd8891788c87fb2a7f31fa1ca0', 'not activat', '432148.png'),
(12, 'selam', 'sela@gmail.com', 'user_Account_Deleted', '967162a0b2dc0483ad3d0f47dfb1e9ac', 'not activated', '225019.png'),
(13, 'jorden123', 'jorden@gmail.com', 'user_Account_Deleted', '7cb01d241f49894a2f41cc3af179209f', 'not activated', '775859.png'),
(14, 'gsfdg', 'afdsfasd@gadfsg.dsf', '12345', '507373ba57e072aa06e7d4299ea6386d', 'not activated', '172215.jpg'),
(15, 'jasmin', 'jasmin@gmail.com', 'user_Account_Deleted', '69e1d2d22776ad3db6736247f14f00e6', 'not activated', '845614.jpg'),
(16, 'jorden', 'jj@gmail.com', 'user_Account_Deleted', 'c6036a69be21cb660499b75718a3ef24', 'not activated', '602723.png'),
(17, 'sami', 'DSADsad@Dsd.sdfadsfasdfa', 'user_Account_Deleted', '236522d75c8164f90a85448456e1d1aa', 'not activated', '884851.png'),
(18, 'james', 'james@gmail.com', 'user_Account_Deleted', '14c7eca07aae3fc68903321ffdbea120', 'not activated', '208129.png'),
(19, 'danu', 'danu@gmail.com', 'user_Account_Deleted', 'd58e2f077670f4de9cd7963c857f2534', 'not activated', '594949.png'),
(20, 'sinit', 'sinit@gmail.com', 'user_Account_Deleted', 'faafda66202d234463057972460c04f5', 'not activated', '601016.png'),
(21, 'yoni', 'yteklebrhan@sadsd.sdf', 'yt316315', '1ef039b8c360653698d917512eb41140', 'not activated', '532511.png'),
(22, 'joiejoie', 'joames@gmail.com', 'user_Account_Deleted', 'd8502c4f5e4b6b2b61d6d833be5a18cf', 'not activated', '208525.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_comm`
--

CREATE TABLE IF NOT EXISTS `user_comm` (
`com_id` int(111) NOT NULL,
  `user_id` int(111) NOT NULL,
  `pro_id` int(111) NOT NULL,
  `com_date` date NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_comm`
--

INSERT INTO `user_comm` (`com_id`, `user_id`, `pro_id`, `com_date`, `comment`) VALUES
(1, 4, 2, '2018-08-08', 'this is good'),
(2, 4, 2, '2018-08-08', 'this is good'),
(3, 2, 3, '2018-08-08', 'this is image'),
(4, 2, 3, '2018-08-08', 'this is image'),
(5, 5, 1, '2018-08-08', 'dksjflaskdflasdf'),
(6, 5, 1, '2018-08-08', 'dksjflaskdflasdf'),
(7, 5, 1, '2018-08-08', 'dksjflaskdflasdf'),
(8, 5, 1, '2018-08-08', 'dksjflaskdflasdf'),
(9, 6, 1, '2018-08-08', 'bksjdhdkej'),
(10, 6, 1, '2018-08-08', 'bksjdhdkej'),
(11, 5, 2, '2018-08-08', 'kjashdfkjadsf'),
(12, 5, 2, '2018-08-08', 'kjashdfkjadsf'),
(13, 5, 3, '2018-08-08', 'fasdhfjkasdfadf'),
(14, 5, 3, '2018-08-08', 'fasdhfjkasdfadf'),
(15, 6, 1, '2018-08-08', 'keep it up'),
(16, 6, 1, '2018-08-08', 'keep it up'),
(17, 8, 2, '2018-08-08', 'Nice movie gn kurub haxiratna'),
(18, 8, 2, '2018-08-08', 'Nice movie gn kurub haxiratna'),
(19, 8, 1, '2018-08-08', 'Nice movie gn kurub haxiratna Hdmona alekumdo'),
(20, 8, 1, '2018-08-08', 'Nice movie gn kurub haxiratna Hdmona alekumdo'),
(21, 7, 1, '2018-08-08', 'this is from here'),
(22, 7, 1, '2018-08-08', 'this is from here'),
(23, 7, 1, '2018-08-08', 's2df19'),
(24, 7, 1, '2018-08-08', 's2df19'),
(25, 7, 1, '2018-08-08', 's2df19'),
(26, 7, 1, '2018-08-08', 's2df19'),
(27, 7, 5, '2018-08-08', 'rqwerwerer r qer ewr'),
(28, 7, 5, '2018-08-08', 'rqwerwerer r qer ewr'),
(29, 5, 1, '2018-08-13', 'djsgevdudvecdusbsceh'),
(30, 5, 1, '2018-08-13', 'djsgevdudvecdusbsceh'),
(31, 5, 1, '2018-08-13', 'this is how'),
(32, 5, 1, '2018-08-13', 'this is how'),
(33, 5, 1, '2018-08-13', 'hshsusgsuzuwcsudbecsuxgsi'),
(34, 5, 1, '2018-08-13', 'hshsusgsuzuwcsudbecsuxgsi'),
(35, 5, 6, '2018-08-13', 'hshsusgsuzuwcsudbecsuxgsi'),
(36, 5, 6, '2018-08-13', 'hshsusgsuzuwcsudbecsuxgsi'),
(37, 5, 4, '2018-08-13', 'joiemamahsu'),
(38, 5, 4, '2018-08-13', 'joiemamahsu'),
(39, 9, 3, '2018-08-13', 'dsf sdfasd fasdf asdfa'),
(40, 9, 3, '2018-08-13', 'dsf sdfasd fasdf asdfa'),
(41, 10, 41, '2018-08-13', 'this is again john'),
(43, 11, 40, '2018-08-13', 'jams here commenting'),
(44, 11, 40, '2018-08-13', 'jams here commenting'),
(45, 12, 1, '2018-08-14', 'fasdfasdfasdf'),
(46, 12, 3, '2018-08-14', 'fjdshf sdfkjhasdlkf ha'),
(47, 12, 2, '2018-08-14', 'fasdjkfhaksjdff'),
(48, 12, 1, '2018-08-14', 'fjhad kjsdfh aksjdfh'),
(49, 12, 3, '2018-08-14', 'mnfasdfn sdkjfh laksdjhf aksdjf alkjd'),
(50, 12, 4, '2018-08-14', 'fhsdlkfhlsdf sdkfj lkjf lsdkjf hlskdj hflkds a'),
(51, 12, 6, '2018-08-14', 'hfjdf kdsj lkdshf ksdjf kdj halkdjs'),
(52, 12, 3, '2018-08-14', 'faskdjfhlaksjdfhlaksdjhfl ksjf'),
(53, 12, 7, '2018-08-14', 'gdfg sdfg sfg sfg sfdg sfd dfgsdfg dfg sfdg sdfgdfg sdfg sdfg'),
(54, 12, 40, '2018-08-14', 'gfdgsdfgsdfgs gf fg sfg'),
(55, 12, 41, '2018-08-14', 'fd sdf sfd df sdfgdfg fdg dfg fdg fg dfgretrtwertwertwr retwert werterttyhe'),
(56, 13, 1, '2018-08-16', 'this is jorden'),
(57, 15, 4, '2018-08-16', 'this is from jasmin'),
(59, 13, 5, '2018-08-16', 'this is jorden'),
(60, 17, 2, '2018-08-18', 'thid is good'),
(61, 14, 41, '2018-08-19', 'askdjfhasdk'),
(62, 14, 41, '2018-08-19', 'fadskfhakdsf dkafhlakdf'),
(63, 18, 2, '2018-08-20', 'this is james'),
(64, 14, 46, '2018-08-20', 'new comment'),
(65, 19, 2, '2018-08-20', 'comment from danu'),
(66, 20, 1, '2018-08-20', 'sinit'),
(67, 22, 1, '2018-08-29', 'hi there this is greate'),
(68, 22, 50, '2018-08-29', 'new comment');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coming_up`
--
ALTER TABLE `coming_up`
 ADD PRIMARY KEY (`coming_id`);

--
-- Indexes for table `hd_comm`
--
ALTER TABLE `hd_comm`
 ADD PRIMARY KEY (`id`), ADD KEY `user` (`user`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie_com_likes`
--
ALTER TABLE `movie_com_likes`
 ADD PRIMARY KEY (`id`), ADD KEY `movie_com_id` (`movie_com_id`,`user_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `movie_likes`
--
ALTER TABLE `movie_likes`
 ADD PRIMARY KEY (`id`), ADD KEY `movie_id` (`movie_id`,`user_id`);

--
-- Indexes for table `music`
--
ALTER TABLE `music`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `music_likes`
--
ALTER TABLE `music_likes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `music_user_com`
--
ALTER TABLE `music_user_com`
 ADD PRIMARY KEY (`music_com_id`), ADD KEY `music_user_id` (`music_user_id`,`music_pro_id`), ADD KEY `music_pro_id` (`music_pro_id`);

--
-- Indexes for table `top_5`
--
ALTER TABLE `top_5`
 ADD PRIMARY KEY (`top_id`);

--
-- Indexes for table `tv_show`
--
ALTER TABLE `tv_show`
 ADD PRIMARY KEY (`tv_show_id`);

--
-- Indexes for table `tv_show_comm`
--
ALTER TABLE `tv_show_comm`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_comm`
--
ALTER TABLE `user_comm`
 ADD PRIMARY KEY (`com_id`), ADD KEY `user_id` (`user_id`,`pro_id`), ADD KEY `pro_id` (`pro_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `coming_up`
--
ALTER TABLE `coming_up`
MODIFY `coming_id` int(200) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `hd_comm`
--
ALTER TABLE `hd_comm`
MODIFY `id` int(111) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `movie_com_likes`
--
ALTER TABLE `movie_com_likes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `movie_likes`
--
ALTER TABLE `movie_likes`
MODIFY `id` int(111) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `music`
--
ALTER TABLE `music`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `music_likes`
--
ALTER TABLE `music_likes`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `music_user_com`
--
ALTER TABLE `music_user_com`
MODIFY `music_com_id` int(111) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `top_5`
--
ALTER TABLE `top_5`
MODIFY `top_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tv_show`
--
ALTER TABLE `tv_show`
MODIFY `tv_show_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tv_show_comm`
--
ALTER TABLE `tv_show_comm`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `user_comm`
--
ALTER TABLE `user_comm`
MODIFY `com_id` int(111) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `hd_comm`
--
ALTER TABLE `hd_comm`
ADD CONSTRAINT `hd_comm_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `movie_com_likes`
--
ALTER TABLE `movie_com_likes`
ADD CONSTRAINT `movie_com_likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
ADD CONSTRAINT `movie_com_likes_ibfk_2` FOREIGN KEY (`movie_com_id`) REFERENCES `user_comm` (`com_id`);

--
-- Constraints for table `music_user_com`
--
ALTER TABLE `music_user_com`
ADD CONSTRAINT `music_user_com_ibfk_1` FOREIGN KEY (`music_pro_id`) REFERENCES `music` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `music_user_com_ibfk_2` FOREIGN KEY (`music_user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tv_show_comm`
--
ALTER TABLE `tv_show_comm`
ADD CONSTRAINT `tv_show_comm_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_comm`
--
ALTER TABLE `user_comm`
ADD CONSTRAINT `user_comm_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `user_comm_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `movie` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
