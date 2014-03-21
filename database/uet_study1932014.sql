-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2014 at 04:51 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `uet_study`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE IF NOT EXISTS `tbl_comment` (
  `comment_id` int(100) NOT NULL AUTO_INCREMENT,
  `comment_post_id` int(100) DEFAULT NULL,
  `comment_author` int(100) DEFAULT NULL,
  `comment_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `comment_content` text,
  `user_id` int(100) DEFAULT NULL,
  `comment_doc_id` int(100) DEFAULT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `comment_post_id` (`comment_post_id`),
  KEY `comment_author` (`comment_author`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doc`
--

CREATE TABLE IF NOT EXISTS `tbl_doc` (
  `doc_id` int(100) NOT NULL AUTO_INCREMENT,
  `doc_url` varchar(100) DEFAULT NULL,
  `doc_name` varchar(100) DEFAULT NULL,
  `doc_status` int(2) DEFAULT NULL,
  `doc_user_id` int(100) DEFAULT NULL,
  `doc_scribd_id` varchar(100) DEFAULT NULL,
  `doc_subject_id` int(11) DEFAULT NULL,
  `doc_faculty_id` int(11) DEFAULT NULL,
  `doc_description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`doc_id`),
  KEY `doc_user_id` (`doc_user_id`),
  KEY `doc_subject_id` (`doc_subject_id`),
  KEY `doc_faculty_id` (`doc_faculty_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculty`
--

CREATE TABLE IF NOT EXISTS `tbl_faculty` (
  `faculty_id` int(10) NOT NULL AUTO_INCREMENT,
  `faculty_name` varchar(100) DEFAULT NULL,
  `subject_id` int(100) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`faculty_id`),
  KEY `subject_id` (`subject_id`),
  KEY `teacher_id` (`teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE IF NOT EXISTS `tbl_post` (
  `post_id` int(100) NOT NULL AUTO_INCREMENT,
  `post_author` int(100) DEFAULT NULL,
  `post_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `post_content` text,
  `post_status` tinyint(2) DEFAULT NULL,
  `post_title` text,
  `post_modified_date` timestamp NULL DEFAULT NULL,
  `comment_count` int(100) DEFAULT NULL,
  `post_rate` int(10) DEFAULT NULL,
  `post_comment_open` int(10) DEFAULT NULL,
  `post_type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`post_id`),
  KEY `post_author` (`post_author`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_relation_faculty_subject`
--

CREATE TABLE IF NOT EXISTS `tbl_relation_faculty_subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_relation_faculty_teacher`
--

CREATE TABLE IF NOT EXISTS `tbl_relation_faculty_teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_relation_subject_teacher`
--

CREATE TABLE IF NOT EXISTS `tbl_relation_subject_teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE IF NOT EXISTS `tbl_subject` (
  `subject_id` int(10) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(100) DEFAULT NULL,
  `year_id` int(100) DEFAULT NULL,
  `subject_id_university` varchar(100) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`subject_id`),
  KEY `faculty_id` (`year_id`),
  KEY `teacher_id` (`teacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`subject_id`, `subject_name`, `year_id`, `subject_id_university`, `teacher_id`) VALUES
(1, 'Đại số', NULL, NULL, NULL),
(2, 'Giải tích 1', NULL, NULL, NULL),
(3, 'Toán rời rạc', NULL, NULL, NULL),
(4, 'Tin học cơ sở 4', NULL, NULL, NULL),
(5, 'Cơ nhiệt', NULL, NULL, NULL),
(6, 'Lập trình hướng đối tượng', NULL, NULL, NULL),
(7, 'Lập trình nâng cao', NULL, NULL, NULL),
(8, 'Cấu trúc dữ liệu giải thuật', NULL, NULL, NULL),
(9, 'Điện quang', NULL, NULL, NULL),
(10, 'Kiến trúc máy tính', NULL, NULL, NULL),
(11, 'Công nghệ phần mềm', NULL, NULL, NULL),
(12, 'Mạng máy tính', NULL, NULL, NULL),
(13, 'Nguyên lý hệ điều hành', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher`
--

CREATE TABLE IF NOT EXISTS `tbl_teacher` (
  `teacher_id` int(100) NOT NULL AUTO_INCREMENT,
  `teacher_name` varchar(100) DEFAULT NULL,
  `teacher_faculty` int(10) DEFAULT NULL,
  `teacher_subject` varchar(100) DEFAULT NULL,
  `teacher_advise` text,
  `teacher_rate` int(100) DEFAULT NULL,
  `teacher_url` varchar(100) DEFAULT NULL,
  `teacher_comment` text,
  `teacher_profile` text,
  `teacher_character` text,
  `teacher_achive` text,
  PRIMARY KEY (`teacher_id`),
  KEY `teacher_faculty` (`teacher_faculty`),
  KEY `teacher_subject` (`teacher_subject`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) DEFAULT NULL,
  `user_password` varchar(100) DEFAULT NULL,
  `user_status` tinyint(2) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_class` varchar(100) DEFAULT NULL,
  `user_faculty` int(100) DEFAULT NULL,
  `user_about` text,
  `user_type` int(2) DEFAULT NULL,
  `user_avatar` varchar(100) DEFAULT NULL,
  `user_favourite_doc_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_faculty` (`user_faculty`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_password`, `user_status`, `user_email`, `user_class`, `user_faculty`, `user_about`, `user_type`, `user_avatar`, `user_favourite_doc_id`) VALUES
(2, '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'vungocson', '123456', NULL, 'vungocson94@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'khoalevan', '123456', NULL, 'khoalevan1994@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
