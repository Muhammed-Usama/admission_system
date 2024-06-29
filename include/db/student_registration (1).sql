-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 11:02 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `currently_registered`
--

CREATE TABLE `currently_registered` (
  `currently_registered_id` int(11) NOT NULL,
  `currently_registered_name` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `currently_registered`
--

INSERT INTO `currently_registered` (`currently_registered_id`, `currently_registered_name`) VALUES
(2, 'لا'),
(1, 'نعم');

-- --------------------------------------------------------

--
-- Table structure for table `decider2_nmu`
--

CREATE TABLE `decider2_nmu` (
  `Decider2_NMU_id` int(11) NOT NULL,
  `Decider2_NMU_name` varchar(255) DEFAULT NULL,
  `ProgramRequirement` int(11) NOT NULL,
  `faculty_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `decider2_nmu`
--

INSERT INTO `decider2_nmu` (`Decider2_NMU_id`, `Decider2_NMU_name`, `ProgramRequirement`, `faculty_id`) VALUES
(1, 'الكليه(الطب)-البرنامج(برنامج الطب و الجراحه)', 1, 1),
(2, 'الكليه (طب الاسنان)-البرنامج( برنامج طب الاسنان)', 1, 2),
(3, 'الكليه(الصيدله)-البرنامج( برنامج فارم دى- برنامج صيدله اكلينيكيه)', 1, 3),
(4, 'الكليه(المعاملات القانونيه الدوليه)-البرنامج(معاملات قانونيه دوليه)', 5, 6),
(5, 'الكليه (العلوم الاساسيه)-البرنامج (برنامج البيولوجيا الجزيئيه)', 4, 6),
(6, 'الكليه (العلوم الاساسيه)-البرنامج (برنامج التكنولوجيا الحيويه)', 4, 6),
(7, 'الكليه(العلوم الاساسيه)-البرنامج (برنامج الكيمياء الصناعيه)', 4, 6),
(8, 'الكليه (العلوم الاساسيه)-البرنامج( برنامج علوم الادله الجنائيه)', 4, 6),
(9, 'الكليه(اعمال)-البرنامج(برنامج الادارة)', 5, 9),
(10, 'الكليه(اعمال)-البرنامج(برنامج التمويل والاستثمار)', 5, 9),
(11, 'الكليه(اعمال)-البرنامج(برنامج اللوجستيات وسلاسل الامداد)', 5, 9),
(12, 'الكليه(اعمال)-البرنامج(برنامج المحاسب ونظم المعلومات)', 5, 9),
(13, 'الكليه(اعمال)-البرنامج(برنامج التسويق)', 5, 9),
(14, 'الكليه(اعمال)-البرنامج(برنامج ريادة الاعمال و الابتكار)', 5, 9),
(15, 'الكليه(اعمال)-البرنامج(برنامج الاقتصاد والعلوم السياسيه)', 5, 9),
(16, 'الكليه(الهندسه) -البرنامج(برنامج هندسة الطاقة)', 2, 4),
(17, 'الكليه (الهندسه) - البرنامج (برنامج هندسة الطيران والفضاء)', 2, 4),
(18, 'الكليه(الهندسه) - البرنامج (برنامج هندسة العمارة البيئية وتكنولوجيا البناء)', 2, 4),
(19, 'الكليه(الهندسة) - البرنامج (برنامج هندسة الميكاترونيات)', 2, 4),
(20, 'الكلية (الهندسة) - البرنامج(برنامج هندسة وتكنولوجيا تنفيذ الاعمال المدنيه)', 2, 4),
(21, 'الكلية (الهندسة) -البرنامج (برنامج هندسة تطوير المنتج)', 2, 4),
(22, 'الكلية (الهندسة) -البرنامج(برنامج هندسه البترول والغاز)', 2, 4),
(23, 'الكلية(الهندسة) البرنامج (برنامج الهندسه الطبيه الحيويه)', 2, 4),
(24, 'الكلية (علوم وهندسة الحاسب)البرنامج (علوم الحاسب) -مسارات (تحليل البيانات الضخمه- الرؤيه بالحاسب- هندسه البرمجيات)', 4, 5),
(25, 'الكلية (علوم و هندسة الحاسب ) - البرنامج (علوم الذكاء الاصطناعى)', 4, 5),
(26, 'الكليه(علوم وهندسة الحاسب)-البرنامج (معلوماتيه طبيه)', 4, 5),
(27, 'الكلية (علوم وهندسة الحاسب)البرنامج (هندسة الحاسب) -مسارات (النظم المدمجه- الحوسبه السحابيه- الحوسبه عاليه الاداء الامن السيبرانى)', 2, 5),
(28, 'الكليه (علوم وهندسة الحاسب) -البرنامج (هندسة الذكاء الاصطناعي)', 2, 5),
(29, 'كليه التمريض', 1, 8),
(30, 'كليه تكنولوجيا العلوم الصحيه التطبيقيه', 4, 10),
(31, 'كليه هندسة المنسوجات', 2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `decider3_nmu`
--

CREATE TABLE `decider3_nmu` (
  `Decider3_NMU_id` int(11) NOT NULL,
  `Decider3_NMU_name` varchar(255) DEFAULT NULL,
  `ProgramRequirement` int(11) DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `decider3_nmu`
--

INSERT INTO `decider3_nmu` (`Decider3_NMU_id`, `Decider3_NMU_name`, `ProgramRequirement`, `faculty_id`) VALUES
(1, 'الكليه(الطب)-البرنامج(برنامج الطب و الجراحه)', 1, 1),
(2, 'الكليه (طب الاسنان)-البرنامج( برنامج طب الاسنان)', 1, 2),
(3, 'الكليه(الصيدله)-البرنامج( برنامج فارم دى- برنامج صيدله اكلينيكيه)', 1, 3),
(4, 'الكليه(المعاملات القانونيه الدوليه)-البرنامج(معاملات قانونيه دوليه)', 5, 6),
(5, 'الكليه (العلوم الاساسيه)-البرنامج (برنامج البيولوجيا الجزيئيه)', 4, 6),
(6, 'الكليه (العلوم الاساسيه)-البرنامج (برنامج التكنولوجيا الحيويه)', 4, 6),
(7, 'الكليه(العلوم الاساسيه)-البرنامج (برنامج الكيمياء الصناعيه)', 4, 6),
(8, 'الكليه (العلوم الاساسيه)-البرنامج( برنامج علوم الادله الجنائيه)', 4, 6),
(9, 'الكليه(اعمال)-البرنامج(برنامج الادارة)', 5, 9),
(10, 'الكليه(اعمال)-البرنامج(برنامج التمويل والاستثمار)', 5, 9),
(11, 'الكليه(اعمال)-البرنامج(برنامج اللوجستيات وسلاسل الامداد)', 5, 9),
(12, 'الكليه(اعمال)-البرنامج(برنامج المحاسب ونظم المعلومات)', 5, 9),
(13, 'الكليه(اعمال)-البرنامج(برنامج التسويق)', 5, 9),
(14, 'الكليه(اعمال)-البرنامج(برنامج ريادة الاعمال و الابتكار)', 5, 9),
(15, 'الكليه(اعمال)-البرنامج(برنامج الاقتصاد والعلوم السياسيه)', 5, 9),
(16, 'الكليه(الهندسه) -البرنامج(برنامج هندسة الطاقة)', 2, 4),
(17, 'الكليه (الهندسه) - البرنامج (برنامج هندسة الطيران والفضاء)', 2, 4),
(18, 'الكليه(الهندسه) - البرنامج (برنامج هندسة العمارة البيئية وتكنولوجيا البناء)', 2, 4),
(19, 'الكليه(الهندسة) - البرنامج (برنامج هندسة الميكاترونيات)', 2, 4),
(20, 'الكلية (الهندسة) - البرنامج(برنامج هندسة وتكنولوجيا تنفيذ الاعمال المدنيه)', 2, 4),
(21, 'الكلية (الهندسة) -البرنامج (برنامج هندسة تطوير المنتج)', 2, 4),
(22, 'الكلية (الهندسة) -البرنامج(برنامج هندسه البترول والغاز)', 2, 4),
(23, 'الكلية(الهندسة) البرنامج (برنامج الهندسه الطبيه الحيويه)', 2, 4),
(24, 'الكلية (علوم وهندسة الحاسب)البرنامج (علوم الحاسب) -مسارات (تحليل البيانات الضخمه- الرؤيه بالحاسب- هندسه البرمجيات)', 4, 5),
(25, 'الكلية (علوم و هندسة الحاسب ) - البرنامج (علوم الذكاء الاصطناعى)', 4, 5),
(26, 'الكليه(علوم وهندسة الحاسب)-البرنامج (معلوماتيه طبيه)', 4, 5),
(27, 'الكلية (علوم وهندسة الحاسب)البرنامج (هندسة الحاسب) -مسارات (النظم المدمجه- الحوسبه السحابيه- الحوسبه عاليه الاداء الامن السيبرانى)', 2, 5),
(28, 'الكليه (علوم وهندسة الحاسب) -البرنامج (هندسة الذكاء الاصطناعي)', 2, 5),
(29, 'كليه التمريض', 1, 8),
(30, 'كليه تكنولوجيا العلوم الصحيه التطبيقيه', 4, 10),
(31, 'كليه هندسة المنسوجات', 2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `decider4_nmu`
--

CREATE TABLE `decider4_nmu` (
  `Decider4_NMU_id` int(11) NOT NULL,
  `Decider4_NMU_name` varchar(255) DEFAULT NULL,
  `ProgramRequirement` int(11) DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `decider4_nmu`
--

INSERT INTO `decider4_nmu` (`Decider4_NMU_id`, `Decider4_NMU_name`, `ProgramRequirement`, `faculty_id`) VALUES
(1, 'الكليه(الطب)-البرنامج(برنامج الطب و الجراحه)', 1, 1),
(2, 'الكليه (طب الاسنان)-البرنامج( برنامج طب الاسنان)', 1, 2),
(3, 'الكليه(الصيدله)-البرنامج( برنامج فارم دى- برنامج صيدله اكلينيكيه)', 1, 3),
(4, 'الكليه(المعاملات القانونيه الدوليه)-البرنامج(معاملات قانونيه دوليه)', 5, 6),
(5, 'الكليه (العلوم الاساسيه)-البرنامج (برنامج البيولوجيا الجزيئيه)', 4, 6),
(6, 'الكليه (العلوم الاساسيه)-البرنامج (برنامج التكنولوجيا الحيويه)', 4, 6),
(7, 'الكليه(العلوم الاساسيه)-البرنامج (برنامج الكيمياء الصناعيه)', 4, 6),
(8, 'الكليه (العلوم الاساسيه)-البرنامج( برنامج علوم الادله الجنائيه)', 4, 6),
(9, 'الكليه(اعمال)-البرنامج(برنامج الادارة)', 5, 9),
(10, 'الكليه(اعمال)-البرنامج(برنامج التمويل والاستثمار)', 5, 9),
(11, 'الكليه(اعمال)-البرنامج(برنامج اللوجستيات وسلاسل الامداد)', 5, 9),
(12, 'الكليه(اعمال)-البرنامج(برنامج المحاسب ونظم المعلومات)', 5, 9),
(13, 'الكليه(اعمال)-البرنامج(برنامج التسويق)', 5, 9),
(14, 'الكليه(اعمال)-البرنامج(برنامج ريادة الاعمال و الابتكار)', 5, 9),
(15, 'الكليه(اعمال)-البرنامج(برنامج الاقتصاد والعلوم السياسيه)', 5, 9),
(16, 'الكليه(الهندسه) -البرنامج(برنامج هندسة الطاقة)', 2, 4),
(17, 'الكليه (الهندسه) - البرنامج (برنامج هندسة الطيران والفضاء)', 2, 4),
(18, 'الكليه(الهندسه) - البرنامج (برنامج هندسة العمارة البيئية وتكنولوجيا البناء)', 2, 4),
(19, 'الكليه(الهندسة) - البرنامج (برنامج هندسة الميكاترونيات)', 2, 4),
(20, 'الكلية (الهندسة) - البرنامج(برنامج هندسة وتكنولوجيا تنفيذ الاعمال المدنيه)', 2, 4),
(21, 'الكلية (الهندسة) -البرنامج (برنامج هندسة تطوير المنتج)', 2, 4),
(22, 'الكلية (الهندسة) -البرنامج(برنامج هندسه البترول والغاز)', 2, 4),
(23, 'الكلية(الهندسة) البرنامج (برنامج الهندسه الطبيه الحيويه)', 2, 4),
(24, 'الكلية (علوم وهندسة الحاسب)البرنامج (علوم الحاسب) -مسارات (تحليل البيانات الضخمه- الرؤيه بالحاسب- هندسه البرمجيات)', 4, 5),
(25, 'الكلية (علوم و هندسة الحاسب ) - البرنامج (علوم الذكاء الاصطناعى)', 4, 5),
(26, 'الكليه(علوم وهندسة الحاسب)-البرنامج (معلوماتيه طبيه)', 4, 5),
(27, 'الكلية (علوم وهندسة الحاسب)البرنامج (هندسة الحاسب) -مسارات (النظم المدمجه- الحوسبه السحابيه- الحوسبه عاليه الاداء الامن السيبرانى)', 2, 5),
(28, 'الكليه (علوم وهندسة الحاسب) -البرنامج (هندسة الذكاء الاصطناعي)', 2, 5),
(29, 'كليه التمريض', 1, 8),
(30, 'كليه تكنولوجيا العلوم الصحيه التطبيقيه', 4, 10),
(31, 'كليه هندسة المنسوجات', 2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `decider5_nmu`
--

CREATE TABLE `decider5_nmu` (
  `Decider5_NMU_id` int(11) NOT NULL,
  `Decider5_NMU_name` varchar(255) DEFAULT NULL,
  `ProgramRequirement` int(11) DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `decider5_nmu`
--

INSERT INTO `decider5_nmu` (`Decider5_NMU_id`, `Decider5_NMU_name`, `ProgramRequirement`, `faculty_id`) VALUES
(1, 'الكليه(الطب)-البرنامج(برنامج الطب و الجراحه)', 1, 1),
(2, 'الكليه (طب الاسنان)-البرنامج( برنامج طب الاسنان)', 1, 2),
(3, 'الكليه(الصيدله)-البرنامج( برنامج فارم دى- برنامج صيدله اكلينيكيه)', 1, 3),
(4, 'الكليه(المعاملات القانونيه الدوليه)-البرنامج(معاملات قانونيه دوليه)', 5, 6),
(5, 'الكليه (العلوم الاساسيه)-البرنامج (برنامج البيولوجيا الجزيئيه)', 4, 6),
(6, 'الكليه (العلوم الاساسيه)-البرنامج (برنامج التكنولوجيا الحيويه)', 4, 6),
(7, 'الكليه(العلوم الاساسيه)-البرنامج (برنامج الكيمياء الصناعيه)', 4, 6),
(8, 'الكليه (العلوم الاساسيه)-البرنامج( برنامج علوم الادله الجنائيه)', 4, 6),
(9, 'الكليه(اعمال)-البرنامج(برنامج الادارة)', 5, 9),
(10, 'الكليه(اعمال)-البرنامج(برنامج التمويل والاستثمار)', 5, 9),
(11, 'الكليه(اعمال)-البرنامج(برنامج اللوجستيات وسلاسل الامداد)', 5, 9),
(12, 'الكليه(اعمال)-البرنامج(برنامج المحاسب ونظم المعلومات)', 5, 9),
(13, 'الكليه(اعمال)-البرنامج(برنامج التسويق)', 5, 9),
(14, 'الكليه(اعمال)-البرنامج(برنامج ريادة الاعمال و الابتكار)', 5, 9),
(15, 'الكليه(اعمال)-البرنامج(برنامج الاقتصاد والعلوم السياسيه)', 5, 9),
(16, 'الكليه(الهندسه) -البرنامج(برنامج هندسة الطاقة)', 2, 4),
(17, 'الكليه (الهندسه) - البرنامج (برنامج هندسة الطيران والفضاء)', 2, 4),
(18, 'الكليه(الهندسه) - البرنامج (برنامج هندسة العمارة البيئية وتكنولوجيا البناء)', 2, 4),
(19, 'الكليه(الهندسة) - البرنامج (برنامج هندسة الميكاترونيات)', 2, 4),
(20, 'الكلية (الهندسة) - البرنامج(برنامج هندسة وتكنولوجيا تنفيذ الاعمال المدنيه)', 2, 4),
(21, 'الكلية (الهندسة) -البرنامج (برنامج هندسة تطوير المنتج)', 2, 4),
(22, 'الكلية (الهندسة) -البرنامج(برنامج هندسه البترول والغاز)', 2, 4),
(23, 'الكلية(الهندسة) البرنامج (برنامج الهندسه الطبيه الحيويه)', 2, 4),
(24, 'الكلية (علوم وهندسة الحاسب)البرنامج (علوم الحاسب) -مسارات (تحليل البيانات الضخمه- الرؤيه بالحاسب- هندسه البرمجيات)', 4, 5),
(25, 'الكلية (علوم و هندسة الحاسب ) - البرنامج (علوم الذكاء الاصطناعى)', 4, 5),
(26, 'الكليه(علوم وهندسة الحاسب)-البرنامج (معلوماتيه طبيه)', 4, 5),
(27, 'الكلية (علوم وهندسة الحاسب)البرنامج (هندسة الحاسب) -مسارات (النظم المدمجه- الحوسبه السحابيه- الحوسبه عاليه الاداء الامن السيبرانى)', 2, 5),
(28, 'الكليه (علوم وهندسة الحاسب) -البرنامج (هندسة الذكاء الاصطناعي)', 2, 5),
(29, 'كليه التمريض', 1, 8),
(30, 'كليه تكنولوجيا العلوم الصحيه التطبيقيه', 4, 10),
(31, 'كليه هندسة المنسوجات', 2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `decider_nmu`
--

CREATE TABLE `decider_nmu` (
  `Decider_NMU_id` int(11) NOT NULL,
  `Decider_NMU_name` varchar(255) DEFAULT NULL,
  `ProgramRequirement` int(11) DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `decider_nmu`
--

INSERT INTO `decider_nmu` (`Decider_NMU_id`, `Decider_NMU_name`, `ProgramRequirement`, `faculty_id`) VALUES
(1, 'الكليه(الطب)-البرنامج(برنامج الطب و الجراحه)', 1, 1),
(2, 'الكليه (طب الاسنان)-البرنامج( برنامج طب الاسنان)', 1, 2),
(3, 'الكليه(الصيدله)-البرنامج( برنامج فارم دى- برنامج صيدله اكلينيكيه)', 1, 3),
(4, 'الكليه(المعاملات القانونيه الدوليه)-البرنامج(معاملات قانونيه دوليه)', 5, 6),
(5, 'الكليه (العلوم الاساسيه)-البرنامج (برنامج البيولوجيا الجزيئيه)', 4, 6),
(6, 'الكليه (العلوم الاساسيه)-البرنامج (برنامج التكنولوجيا الحيويه)', 4, 6),
(7, 'الكليه(العلوم الاساسيه)-البرنامج (برنامج الكيمياء الصناعيه)', 4, 6),
(8, 'الكليه (العلوم الاساسيه)-البرنامج( برنامج علوم الادله الجنائيه)', 4, 6),
(9, 'الكليه(اعمال)-البرنامج(برنامج الادارة)', 5, 9),
(10, 'الكليه(اعمال)-البرنامج(برنامج التمويل والاستثمار)', 5, 9),
(11, 'الكليه(اعمال)-البرنامج(برنامج اللوجستيات وسلاسل الامداد)', 5, 9),
(12, 'الكليه(اعمال)-البرنامج(برنامج المحاسب ونظم المعلومات)', 5, 9),
(13, 'الكليه(اعمال)-البرنامج(برنامج التسويق)', 5, 9),
(14, 'الكليه(اعمال)-البرنامج(برنامج ريادة الاعمال و الابتكار)', 5, 9),
(15, 'الكليه(اعمال)-البرنامج(برنامج الاقتصاد والعلوم السياسيه)', 5, 9),
(16, 'الكليه(الهندسه) -البرنامج(برنامج هندسة الطاقة)', 2, 4),
(17, 'الكليه (الهندسه) - البرنامج (برنامج هندسة الطيران والفضاء)', 2, 4),
(18, 'الكليه(الهندسه) - البرنامج (برنامج هندسة العمارة البيئية وتكنولوجيا البناء)', 2, 4),
(19, 'الكليه(الهندسة) - البرنامج (برنامج هندسة الميكاترونيات)', 2, 4),
(20, 'الكلية (الهندسة) - البرنامج(برنامج هندسة وتكنولوجيا تنفيذ الاعمال المدنيه)', 2, 4),
(21, 'الكلية (الهندسة) -البرنامج (برنامج هندسة تطوير المنتج)', 2, 4),
(22, 'الكلية (الهندسة) -البرنامج(برنامج هندسه البترول والغاز)', 2, 4),
(23, 'الكلية(الهندسة) البرنامج (برنامج الهندسه الطبيه الحيويه)', 2, 4),
(24, 'الكلية (علوم وهندسة الحاسب)البرنامج (علوم الحاسب) -مسارات (تحليل البيانات الضخمه- الرؤيه بالحاسب- هندسه البرمجيات)', 4, 5),
(25, 'الكلية (علوم و هندسة الحاسب ) - البرنامج (علوم الذكاء الاصطناعى)', 4, 5),
(26, 'الكليه(علوم وهندسة الحاسب)-البرنامج (معلوماتيه طبيه)', 4, 5),
(27, 'الكلية (علوم وهندسة الحاسب)البرنامج (هندسة الحاسب) -مسارات (النظم المدمجه- الحوسبه السحابيه- الحوسبه عاليه الاداء الامن السيبرانى)', 2, 5),
(28, 'الكليه (علوم وهندسة الحاسب) -البرنامج (هندسة الذكاء الاصطناعي)', 2, 5),
(29, 'كليه التمريض', 1, 8),
(30, 'كليه تكنولوجيا العلوم الصحيه التطبيقيه', 4, 10),
(31, 'كليه هندسة المنسوجات', 2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `Division_id` int(11) NOT NULL,
  `Division_name` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`Division_id`, `Division_name`) VALUES
(4, 'ادبي'),
(1, 'علمي'),
(3, 'علمي رياضه'),
(2, 'علمي علوم');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `FacultyID` int(11) NOT NULL,
  `FacultyName` varchar(100) NOT NULL,
  `AvailableNO` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`FacultyID`, `FacultyName`, `AvailableNO`) VALUES
(1, 'الطب', 0),
(2, 'طب الأسنان', 0),
(3, 'الصيدلة', 0),
(4, 'الهندسة', 298),
(5, 'علوم وهندسة الحاسب', 0),
(6, 'العلوم الأساسية ', 0),
(7, 'المعاملات القانونية الدولية', 256),
(8, 'التمريض', 0),
(9, 'الأعمال', 29),
(10, 'تكنولوجيا العلوم الصحية التطبيقية', 0),
(11, 'علوم وهندسة المنسوجات', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gander`
--

CREATE TABLE `gander` (
  `gender_id` int(11) NOT NULL,
  `gender_name` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `gander`
--

INSERT INTO `gander` (`gender_id`, `gender_name`) VALUES
(2, 'Female'),
(1, 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `governorate`
--

CREATE TABLE `governorate` (
  `Governorate_id` int(11) NOT NULL,
  `Governorate_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `governorate`
--

INSERT INTO `governorate` (`Governorate_id`, `Governorate_name`) VALUES
(15, 'أسوان'),
(16, 'أسيوط'),
(14, 'الأقصر'),
(2, 'الإسكندرية'),
(22, 'البحر الأحمر'),
(7, 'البحيرة'),
(3, 'الجيزة'),
(4, 'الدقهلية'),
(5, 'الشرقية'),
(9, 'الغربية'),
(11, 'الفيوم'),
(1, 'القاهرة'),
(13, 'القليوبية'),
(6, 'المنوفية'),
(10, 'المنيا'),
(17, 'الوادي الجديد'),
(12, 'بني سويف'),
(24, 'بورسعيد'),
(21, 'جنوب سيناء'),
(25, 'دمياط'),
(18, 'سوهاج'),
(20, 'شمال سيناء'),
(19, 'قنا'),
(8, 'كفر الشيخ'),
(26, 'محافظة حلايب وشلاتين'),
(23, 'مطروح');

-- --------------------------------------------------------

--
-- Table structure for table `high_school`
--

CREATE TABLE `high_school` (
  `high_school_id` int(11) NOT NULL,
  `high_school_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `high_school`
--

INSERT INTO `high_school` (`high_school_id`, `high_school_name`) VALUES
(3, 'STEM'),
(2, 'الثانوية الازهرية'),
(1, 'الثانوية العامة');

-- --------------------------------------------------------

--
-- Table structure for table `programrequirement`
--

CREATE TABLE `programrequirement` (
  `ProgramRequirementID` int(1) NOT NULL,
  `ProgramRequirement` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `programrequirement`
--

INSERT INTO `programrequirement` (`ProgramRequirementID`, `ProgramRequirement`) VALUES
(1, 'علمى علوم'),
(2, 'علمى رياضة'),
(3, 'أدبى'),
(4, 'علمى علوم ورياضة'),
(5, 'الجميع');

-- --------------------------------------------------------

--
-- Table structure for table `student_information`
--

CREATE TABLE `student_information` (
  `student_id` int(100) NOT NULL,
  `arabic_name` varchar(255) NOT NULL,
  `english_name` varchar(255) NOT NULL,
  `student_mail` varchar(255) NOT NULL,
  `parent_mail` varchar(255) NOT NULL,
  `student_phone` varchar(255) NOT NULL,
  `parent_phone` varchar(255) NOT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `nationality` varchar(255) NOT NULL,
  `seat_num` int(11) NOT NULL,
  `Governorate_id` int(11) DEFAULT NULL,
  `date_Bairth` date NOT NULL,
  `national_id` int(11) NOT NULL,
  `publication_date` date NOT NULL,
  `card_issuing` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `high_school_id` int(11) DEFAULT NULL,
  `year_graduated` int(11) NOT NULL,
  `currently_registered_id` int(11) DEFAULT NULL,
  `name_university` varchar(255) NOT NULL,
  `Division_id` int(11) DEFAULT NULL,
  `grades` int(50) NOT NULL,
  `gpa_percentage` int(50) NOT NULL,
  `Decider1_NMU_id` int(11) DEFAULT NULL,
  `Decider2_NMU_id` int(11) DEFAULT NULL,
  `Decider3_NMU_id` int(11) DEFAULT NULL,
  `Decider4_NMU_id` int(11) DEFAULT NULL,
  `Decider5_NMU_id` int(2) DEFAULT NULL,
  `Student_photo` varchar(255) NOT NULL,
  `Img_national_id` varchar(255) NOT NULL,
  `User_id` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `student_information`
--

INSERT INTO `student_information` (`student_id`, `arabic_name`, `english_name`, `student_mail`, `parent_mail`, `student_phone`, `parent_phone`, `gender_id`, `nationality`, `seat_num`, `Governorate_id`, `date_Bairth`, `national_id`, `publication_date`, `card_issuing`, `adress`, `high_school_id`, `year_graduated`, `currently_registered_id`, `name_university`, `Division_id`, `grades`, `gpa_percentage`, `Decider1_NMU_id`, `Decider2_NMU_id`, `Decider3_NMU_id`, `Decider4_NMU_id`, `Decider5_NMU_id`, `Student_photo`, `Img_national_id`, `User_id`) VALUES
(1, 'محمد', 'mohammed', 'mohammed@gmail.com', 'usama@gmail.com', '+201026621966', '+201026621966', 1, 'Egyptian', 1211111111, 1, '2001-12-23', 2147483647, '2007-12-23', 'منوف', '9.egypt', 1, 2024, 2, '', 2, 11, 111, 18, 18, 15, 17, NULL, '316408798_1120630392156299_1883916177748880307_n.jpg', 'WhatsApp Image 2023-05-08 at 22.38.48.jpg', NULL),
(2, 'محمد', 'mohammed', 'mohammed@gmail.com', 'usama@gmail.com', '+201026621966', '+201026621966', 1, 'Egyptian', 1211111111, 1, '2001-12-23', 2147483647, '2007-12-23', 'منوف', '9.egypt', 1, 2024, 2, '', 2, 11, 111, 18, 18, 15, 17, NULL, 'Student_photo/316408798_1120630392156299_1883916177748880307_n.jpg', 'Img_national_id/WhatsApp Image 2023-05-08 at 22.38.48.jpg', NULL),
(3, 'محمد', 'mohammed', 'mohammed@gmail.com', 'usama@gmail.com', '+201026621966', '+201026621966', 1, 'Egyptian', 1211111111, 1, '2001-12-23', 2147483647, '2007-12-23', 'منوف', '9.egypt', 1, 2024, 2, '', 2, 11, 111, 17, 18, 15, 17, NULL, 'Student_photo/IMG_٢٠٢٣٠٥١١_٠٢٠٨٣٤.jpg', 'Img_national_id/White Modern Minimalist Organizational Chart Graph.png', NULL),
(4, 'محمد', 'mohammed', 'mohammed@gmail.com', 'usama@gmail.com', '+201026621966', '+201026621966', 1, 'Egyptian', 1211111111, 13, '2021-12-23', 2147483647, '2023-12-23', 'منوف', '9.egypt', 1, 2024, 1, 'eldelta', 3, 11, 111, 28, 27, 26, 25, NULL, 'Student_photo/WhatsApp Image 2023-05-11 at 01.51.19.jpg', 'Img_national_id/Screenshot 2023-09-28 175608.png', NULL),
(5, 'محمد', 'mohammed', 'mohammed@gmail.com', 'usama@gmail.com', '+201026621966', '+201026621966', 1, 'Egyptian', 1211111111, 3, '2009-12-23', 2147483647, '2013-12-23', 'منوف', '9.egypt', 2, 2024, 2, '', 3, 11, 111, 1, 2, 3, 4, NULL, 'Student_photo/IMG_٢٠٢٣٠٥١١_٠٢٠٨٣٤.jpg', 'Img_national_id/WhatsApp Image 2023-12-21 at 13.17.30_68d30df3.jpg', NULL),
(6, 'محمد', 'mohammed', 'mohammed@gmail.com', 'usama@gmail.com', '+201026621966', '+201026621966', 1, 'Egyptian', 1211111111, 3, '2009-12-23', 2147483647, '2013-12-23', 'منوف', '9.egypt', 2, 2024, 2, '', 3, 11, 111, 1, 2, 3, 4, NULL, 'Student_photo/IMG_٢٠٢٣٠٥١١_٠٢٠٨٣٤.jpg', 'Img_national_id/WhatsApp Image 2023-12-21 at 13.17.30_68d30df3.jpg', NULL),
(7, 'اسامه', 'mohammed', 'mohammed@gmail.com', 'usama@gmail.com', '+201026621966', '+201026621966', 1, 'Egyptian', 1211111111, 15, '2015-12-23', 2147483647, '2029-12-23', 'منوف', '9.egypt', 3, 2023, 2, '', 1, 11, 111, 31, 30, 29, 28, NULL, 'Student_photo/WhatsApp Image 2023-05-11 at 01.51.19.jpg', 'Img_national_id/WhatsApp Image 2023-12-21 at 13.17.30_68d30df3.jpg', NULL),
(8, 'اسامه', 'mohammed', 'mohammed@gmail.com', 'usama@gmail.com', '+201026621966', '+201026621966', 1, 'Egyptian', 1211111111, 13, '2007-12-23', 2147483647, '2007-12-23', 'منوف', '9.egypt', 2, 2024, 2, '', 1, 11, 111, 1, 2, 3, 4, NULL, 'download.png', 'Img_national_id/WhatsApp Image 2023-12-21 at 13.17.30_68d30df3.jpg', NULL),
(9, 'اسامه', 'mohammed', 'mohammed@gmail.com', 'usama@gmail.com', '+201026621966', '+201026621966', 1, '', 1211111111, 15, '2012-03-24', 2147483647, '2006-03-24', 'منوف', '9.egypt', 1, 2024, 2, '', 1, 11, 111, 15, 14, 18, 17, NULL, 'Student_photo/Screenshot 2023-04-14 163243.png', 'Img_national_id/Screenshot 2024-03-04 184606.png', NULL),
(13, 'اسامه', 'mohammed', 'mohammed@gmail.com', 'usama@gmail.com', '+201026621966', '+201026621966', 1, 'Egyptian', 1211111111, 2, '2001-03-24', 2147483647, '2016-03-24', 'منوف', '9.egypt', 1, 2024, 2, '', 1, 11, 111, 1, 2, 3, 4, NULL, 'Student_photo/Screenshot 2023-04-13 003507.png', 'Img_national_id/Screenshot 2023-04-14 163243.png', NULL),
(17, 'اسامه2', 'mohammed', 'mohammed@gmail.com', 'usama@gmail.com', '+201026621966', '+201026621966', 2, 'Egyptian', 1211111111, 14, '2020-03-24', 2147483647, '2027-03-24', 'منوف', '9.egypt', 2, 2024, 2, '', 1, 11, 111, 1, 2, 3, 4, NULL, 'Student_photo/Screenshot 2023-04-11 170330.png', 'Img_national_id/Screenshot 2023-04-11 170330.png', NULL),
(18, 'اسامه3', 'mohammed', 'mohammed@gmail.com', 'usama@gmail.com', '+201026621966', '+201026621966', 2, 'Egyptian', 1211111111, 11, '2014-03-24', 2147483647, '2029-03-24', 'منوف', '9.egypt', 3, 2024, 2, '', 1, 11, 111, 1, 2, 3, 4, NULL, 'Student_photo/Screenshot 2023-04-26 025009.png', 'Img_national_id/Screenshot 2023-04-19 001627.png', NULL),
(19, 'اسامه3', 'mohammed', 'mohammed@gmail.com', 'usama@gmail.com', '+201026621966', '+201026621966', 2, 'Egyptian', 1211111111, 11, '2014-03-24', 2147483647, '2029-03-24', 'منوف', '9.egypt', 3, 2024, 2, '', 1, 11, 111, 1, 2, 3, 4, 10, 'Student_photo/Screenshot 2023-04-26 025009.png', 'Img_national_id/Screenshot 2023-04-19 001627.png', NULL),
(20, 'اسامه3', 'mohammed', 'mohammed@gmail.com', 'usama@gmail.com', '+201026621966', '+201026621966', 2, 'Egyptian', 1211111111, 11, '2014-03-24', 2147483647, '2029-03-24', 'منوف', '9.egypt', 3, 2024, 2, '', 1, 11, 111, 1, 2, 3, 4, NULL, 'Student_photo/Screenshot 2023-04-26 025009.png', 'Img_national_id/Screenshot 2023-04-19 001627.png', NULL),
(28, 'اسامه2', 'Mohammed Tharwat Elhagari', 'mohammed@gmail.com', 'usama@gmail.com', '1026621966', '0', 1, 'Egyptian', 65666, 3, '2029-03-24', 2147483647, '2026-03-24', 'منوف', '9.egypt', 1, 2023, 2, '', 2, 55555, 5454, 1, 2, 3, 4, 5, 'download.png', 'Img_national_id/Screenshot 2023-04-13 003507.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isadmin` int(11) NOT NULL DEFAULT 0,
  `already_registered` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `isadmin`, `already_registered`) VALUES
(1, 'admin', 'admin', '$2y$10$rFZg3xSxoOUuYLXn3SJPrOrMYspVKe7/1MMMQ0L0jpWORAB7rn9UC', 1, 0),
(2, 'mohammed', 'mohammed123', '$2y$10$rFZg3xSxoOUuYLXn3SJPrOrMYspVKe7/1MMMQ0L0jpWORAB7rn9UC', 0, 0),
(3, 'youssef1', 'youssef1', '$2y$10$rFZg3xSxoOUuYLXn3SJPrOrMYspVKe7/1MMMQ0L0jpWORAB7rn9UC', 0, 1),
(10, 'mohammed', 'mohammed11', '$2y$10$9ViciXcs6wGy7/6ZxpO6XeSkWPPVun8YWoxeLMiw.nhoFMeNlSzKS', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `currently_registered`
--
ALTER TABLE `currently_registered`
  ADD PRIMARY KEY (`currently_registered_id`),
  ADD UNIQUE KEY `currently_registered_name` (`currently_registered_name`);

--
-- Indexes for table `decider2_nmu`
--
ALTER TABLE `decider2_nmu`
  ADD PRIMARY KEY (`Decider2_NMU_id`),
  ADD UNIQUE KEY `Decider_NMU_name` (`Decider2_NMU_name`),
  ADD KEY `ProgramRequirement` (`ProgramRequirement`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `decider3_nmu`
--
ALTER TABLE `decider3_nmu`
  ADD PRIMARY KEY (`Decider3_NMU_id`),
  ADD UNIQUE KEY `Decider_NMU_name` (`Decider3_NMU_name`),
  ADD KEY `ProgramRequirement` (`ProgramRequirement`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `decider4_nmu`
--
ALTER TABLE `decider4_nmu`
  ADD PRIMARY KEY (`Decider4_NMU_id`),
  ADD UNIQUE KEY `Decider_NMU_name` (`Decider4_NMU_name`),
  ADD KEY `ProgramRequirement` (`ProgramRequirement`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `decider5_nmu`
--
ALTER TABLE `decider5_nmu`
  ADD PRIMARY KEY (`Decider5_NMU_id`),
  ADD KEY `ProgramRequirement` (`ProgramRequirement`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `decider_nmu`
--
ALTER TABLE `decider_nmu`
  ADD PRIMARY KEY (`Decider_NMU_id`),
  ADD UNIQUE KEY `Decider1_NMU_name` (`Decider_NMU_name`),
  ADD KEY `ProgramRequirement` (`ProgramRequirement`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`Division_id`),
  ADD UNIQUE KEY `Division_name` (`Division_name`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`FacultyID`);

--
-- Indexes for table `gander`
--
ALTER TABLE `gander`
  ADD PRIMARY KEY (`gender_id`),
  ADD UNIQUE KEY `gender_name` (`gender_name`);

--
-- Indexes for table `governorate`
--
ALTER TABLE `governorate`
  ADD PRIMARY KEY (`Governorate_id`),
  ADD UNIQUE KEY `Governorate_name` (`Governorate_name`);

--
-- Indexes for table `high_school`
--
ALTER TABLE `high_school`
  ADD PRIMARY KEY (`high_school_id`),
  ADD UNIQUE KEY `high_school_name` (`high_school_name`);

--
-- Indexes for table `programrequirement`
--
ALTER TABLE `programrequirement`
  ADD PRIMARY KEY (`ProgramRequirementID`);

--
-- Indexes for table `student_information`
--
ALTER TABLE `student_information`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `fk_gender` (`gender_id`),
  ADD KEY `fk_Decider1_NMU` (`Decider1_NMU_id`),
  ADD KEY `fk_governorate` (`Governorate_id`),
  ADD KEY `Division_id` (`Division_id`),
  ADD KEY `fk_high_school` (`high_school_id`),
  ADD KEY `fk_currently_registered` (`currently_registered_id`),
  ADD KEY `fk_Decider2_NMU` (`Decider2_NMU_id`),
  ADD KEY `fk_Decider3_NMU` (`Decider3_NMU_id`),
  ADD KEY `fk_Decider4_NMU` (`Decider4_NMU_id`),
  ADD KEY `User_id` (`User_id`),
  ADD KEY `fk_Decider5_NMU` (`Decider5_NMU_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `decider5_nmu`
--
ALTER TABLE `decider5_nmu`
  MODIFY `Decider5_NMU_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `student_information`
--
ALTER TABLE `student_information`
  MODIFY `student_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `decider2_nmu`
--
ALTER TABLE `decider2_nmu`
  ADD CONSTRAINT `decider2_nmu_ibfk_1` FOREIGN KEY (`ProgramRequirement`) REFERENCES `programrequirement` (`ProgramRequirementID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `decider2_nmu_ibfk_2` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`FacultyID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `decider3_nmu`
--
ALTER TABLE `decider3_nmu`
  ADD CONSTRAINT `decider3_nmu_ibfk_1` FOREIGN KEY (`ProgramRequirement`) REFERENCES `programrequirement` (`ProgramRequirementID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `decider3_nmu_ibfk_2` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`FacultyID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `decider4_nmu`
--
ALTER TABLE `decider4_nmu`
  ADD CONSTRAINT `decider4_nmu_ibfk_1` FOREIGN KEY (`ProgramRequirement`) REFERENCES `programrequirement` (`ProgramRequirementID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `decider4_nmu_ibfk_2` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`FacultyID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `decider5_nmu`
--
ALTER TABLE `decider5_nmu`
  ADD CONSTRAINT `decider5_nmu_ibfk_1` FOREIGN KEY (`ProgramRequirement`) REFERENCES `programrequirement` (`ProgramRequirementID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `decider5_nmu_ibfk_2` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`FacultyID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `decider_nmu`
--
ALTER TABLE `decider_nmu`
  ADD CONSTRAINT `decider_nmu_ibfk_1` FOREIGN KEY (`ProgramRequirement`) REFERENCES `programrequirement` (`ProgramRequirementID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `decider_nmu_ibfk_2` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`FacultyID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_information`
--
ALTER TABLE `student_information`
  ADD CONSTRAINT `fk_Decider1_NMU` FOREIGN KEY (`Decider1_NMU_id`) REFERENCES `decider_nmu` (`Decider_NMU_id`),
  ADD CONSTRAINT `fk_Decider2_NMU` FOREIGN KEY (`Decider2_NMU_id`) REFERENCES `decider2_nmu` (`Decider2_NMU_id`),
  ADD CONSTRAINT `fk_Decider3_NMU` FOREIGN KEY (`Decider3_NMU_id`) REFERENCES `decider3_nmu` (`Decider3_NMU_id`),
  ADD CONSTRAINT `fk_Decider4_NMU` FOREIGN KEY (`Decider4_NMU_id`) REFERENCES `decider4_nmu` (`Decider4_NMU_id`),
  ADD CONSTRAINT `fk_Decider5_NMU` FOREIGN KEY (`Decider5_NMU_id`) REFERENCES `decider5_nmu` (`Decider5_NMU_id`),
  ADD CONSTRAINT `fk_currently_registered` FOREIGN KEY (`currently_registered_id`) REFERENCES `currently_registered` (`currently_registered_id`),
  ADD CONSTRAINT `fk_gender` FOREIGN KEY (`gender_id`) REFERENCES `gander` (`gender_id`),
  ADD CONSTRAINT `fk_governorate` FOREIGN KEY (`Governorate_id`) REFERENCES `governorate` (`Governorate_id`),
  ADD CONSTRAINT `fk_high_school` FOREIGN KEY (`high_school_id`) REFERENCES `high_school` (`high_school_id`),
  ADD CONSTRAINT `student_information_ibfk_1` FOREIGN KEY (`Division_id`) REFERENCES `division` (`Division_id`),
  ADD CONSTRAINT `student_information_ibfk_2` FOREIGN KEY (`User_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
