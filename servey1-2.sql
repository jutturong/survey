-- phpMyAdmin SQL Dump
-- version 4.4.14.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 13, 2016 at 02:54 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `servey1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_department`
--

CREATE TABLE IF NOT EXISTS `tb_department` (
  `id_department` int(11) NOT NULL,
  `department_detail` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_department`
--

INSERT INTO `tb_department` (`id_department`, `department_detail`) VALUES
(1, 'งานรักษาความปลอดภัย (รปภ.)'),
(2, 'OPD ห้องตรวจอายุรกรรม'),
(3, 'ศูนย์ตรวจสุขภาพ'),
(4, 'กลุ่มงานจิตเวช'),
(5, 'เภสัชกรรม (OPD)'),
(8, 'เวชระเบียน'),
(9, 'สวัสดิการสังคม'),
(10, 'กลุ่มงานทันตกรรม'),
(11, 'กลุ่มงานโสต สอ นาสิก'),
(12, 'กลุ่มงานบริหารทั่วไป'),
(13, 'ประชาสัมพันธ์'),
(14, 'ทรัพยากรบุคคล (การเจ้าหน้าที่)'),
(15, 'การเงิน'),
(16, 'บัญชี'),
(17, 'พัสดุ (จัดซื้อ)'),
(18, 'ศูนย์บริการวัสดุทางการแพทย'),
(19, 'สำนักงานประกันสุขภาพ'),
(20, 'สำนักงานอำนวยการ'),
(21, 'คลังเลือด'),
(22, 'สำนักงานกฏหมาย'),
(23, 'สำนักงานผู้ป่วยนอก'),
(24, 'งานควบคุมและป้องกันการติดเชื้อโรงพยาบาลขอนแก่น (IC)'),
(25, 'งานยานพาหนะ (รถยนต์)'),
(26, 'งานอุบัติเหตุและฉุกเฉิน (ER )'),
(27, 'รังสีวิทยา (X-ray)'),
(28, 'เวรเปล OPD/ER'),
(29, 'ศูนย์ส่งต่อ'),
(30, 'ห้องตรวจพิเศษของหัวใจ(ECHO'),
(31, 'สำนักงานออร์โธปิดิกส์'),
(32, 'กลุ่มงานเทคนิคการแพทย์ (Lab)'),
(33, 'กลุ่มงานพยาธิวิทยากายวิภาค'),
(34, 'หน่วยไตเทียม'),
(35, 'คลังเลือด , ศูนย์คลังเลือดกลาง'),
(36, 'สำนักงานวิสัญญี'),
(37, 'พิเศษสิรินธร'),
(38, 'TM1  (หอผู้ป่วยศัลยกรรมอุบัติเหตุ)'),
(39, 'Burn Unit (ตึกไฟไหม้น้ำร้อนลวก)'),
(40, 'ICU TM  (หอผู้ป่วยหนักศัลยกรรมอุบัติเหตุ)'),
(41, 'ศูนย์ประสานงานผู้สูงอายุ'),
(42, 'คลินิกพลังใจ (ศูนย์พลังใจ)'),
(43, 'กลุ่มงานสร้างเสริมสุขภาพ'),
(44, 'กลุ่มภาระกิจด้านการพยาบาล'),
(45, 'กลุ่มงานพัฒนาคุณภาพบริการและมาตรฐาน'),
(46, 'ศูนย์พัฒนาทรัพยากรมนุษย์'),
(47, 'งานเทคโนโลยีสารสนเทศและการสื่อสาร (ICT)'),
(48, 'สำนักงานองค์กรแพทย์'),
(49, 'กลุ่มภาระกิจด้านการพัฒนาระบบบริการและสนับสนุนบริการสุขภาพ (พรส.)'),
(50, 'สนง.ธุรการกลาง (พรส.กยส.)'),
(51, 'สนง.อุบัติเหตุและวิกฤติบำบัด'),
(52, 'งานเวชนิทัศน์และโสตทัศนศึกษา'),
(53, 'งานควบคุมตรวจสอบภายใน'),
(54, 'หน่วยงานทบทวนการใช้ทรัพยากรสุขภาพ (UR)'),
(55, 'ศูนย์เรียนรู้และวิจัย'),
(56, 'ศูนย์คุ้มครองเด็กและสตร'),
(57, 'ศูนย์รับแจ้งเหตุและสั่งการจังหวัดขอนแก่น (กู้ชีพ)'),
(58, 'กลุ่มงานเวชศาสตร์ฉุกเฉินและนิติเวชศาสตร์'),
(59, 'สำนักงานศูนย์แพทยศาสตร์ศึกษา'),
(60, 'ห้องสมุดวิจัยและตำรา'),
(61, 'กลุ่มงานกายภาพบำบัด'),
(62, 'OPD เวรเปล'),
(63, 'กลุ่มงานเวชกรรมฟื้นฟู'),
(64, 'งานกิจกรรมบำบัด'),
(65, 'งานกายอุปกรณ์'),
(66, 'กลุ่มงานเวชกรรมสังคม'),
(67, 'ศูนย์แพทย์ประชาสโมสร'),
(68, 'ศูนย์แทย์ชาตะผดุง'),
(69, 'ศูนแพทย์มิตรภาพ'),
(70, 'ศูนย์แพทย์วัดหนองแวง'),
(71, 'แพทย์แผนไทย'),
(72, 'ศูนย์ดูแลสุขภาพต่อเนื่อง (CHC)'),
(73, 'กลุ่มงานอาชีวเวชกรรม'),
(74, 'บ่อบำบัดน้ำเสีย'),
(75, 'เรือนพักขยะ'),
(76, 'ห้องคลอด'),
(77, 'สูติกรรม 1'),
(78, 'สูติกรรม 2'),
(79, 'สำนักงานแพทย์สูติ-นรีเวชกรรม'),
(80, 'นรีเวชกรรม'),
(81, 'งานธุรการ-วิสัญญี'),
(82, 'ห้องผ่าตัด'),
(83, 'งานห้องผ่าตัด'),
(84, 'สำนักงานแพทย์ศัลยกรรม'),
(85, 'สำนักงานแพทย์จักษุ'),
(86, 'หอผู้ป่วยหนักศัลยกรรมหัวใจและทรวงอก (ICU CVT)'),
(87, 'หอผู้ป่วยหนักศัลยกรรมทั่วไป (ICU ศัลยกรรมทั่วไป)'),
(88, 'หน่วยศัลยกรรมทรวงอก (CVT)'),
(89, 'เภสัชกรรมผู้ป่วยใน'),
(90, 'เภสัชกรรม (คลังเวชภัณฑ์และธุรการ)'),
(91, 'เภสัชกรรม (ฝ่ายผลิต)'),
(92, 'เภสัชกรรม (ปฐมภูมิ)'),
(93, 'ศัลยกรรมระบบประสาท'),
(94, 'ศัลยกรรมชาย 1 / หอผู้ป่วยหนัก ศช 1'),
(95, 'ศัลยกรรมชาย 2  / หอผู้ป่วยหนัก ศช 2'),
(96, 'ศัลยกรรมหญิง 1 / หอผู้ป่วยหนัก ศญ 1'),
(97, 'ศัลยกรรมกระดูกและข้อชาย 1'),
(98, 'Spine Unit'),
(99, 'ศัลยกรรมกระดูกและข้อชาย 2'),
(100, 'ศัลยกรรมกระดูกและข้อหญิง'),
(101, 'ศัลยกรรมหญิง 2'),
(102, 'CVT'),
(103, 'ศัลยกรรมระบบทางเดินปัสสาวะ'),
(104, 'ศูนย์หัวใจ'),
(105, 'Cath LAB'),
(106, 'สงฆ์ 2'),
(107, 'สงฆ์ 3'),
(108, 'สงฆ์ 4'),
(109, 'หอผู้ป่วยเด็กโต'),
(110, 'หอผู้ป่วยเด็กระยะวิกฤต PICU'),
(111, 'หอผู้ป่วยเด็กเล็ก'),
(112, 'พิเศษ 114/4'),
(113, 'ศูนย์สันติวิธีเจรจาไกล่เกลี่ย'),
(114, 'พิเศษ 114/5'),
(115, 'CCU'),
(116, 'ICU อายุรกรรม'),
(117, 'อายุรกรรมชาย 1'),
(118, 'สำนักงานกลุ่มงานอายุรกรรม'),
(119, 'อายุรกรรมชาย 2'),
(120, 'อายุรกรรมหญิง 1'),
(121, 'Stroke Uni'),
(122, 'อายุรกรรม 3'),
(123, 'อายุรกรรมหญิง 2'),
(124, 'หอผู้ป่วยจักษุ'),
(125, 'NICU1 และ NICU2'),
(126, 'ทารกแรกเกิด'),
(127, 'ศัลยกรรมตกแต่ง'),
(128, 'ENT'),
(129, 'หอผู้ป่วยพิเศษ'),
(130, 'เคมีบำบัดเด็ก'),
(131, 'สำนักงานแพทย์กุมารเวชกรรม'),
(132, 'ศูนย์ทารกแรกเกิด'),
(133, 'กลุ่มงานโภชนาการศาสตร์'),
(134, 'งานสนามและสวน'),
(135, 'หน่วยโยธา หน่วยประปาและสุขภิบาล'),
(136, 'ช่างกลโรงงาน'),
(137, 'หน่วยงานช่างระบบปรับอากาศและทำความเย็น'),
(138, 'ซักฟอก'),
(139, 'ศูนย์บริการวัสดุการแพทย์ (คลังเวชภัณฑ์ไม่ใช่ยา)'),
(140, 'โครงสร้างพื้นฐานและบำรุงรักษา'),
(141, 'ศูนย์บริการอุปกรณ์เครื่องมือแพทย์ (ศูนย์บริการเครื่องช่วยหายใจ)'),
(142, 'ช่างไฟฟ้า'),
(143, 'ช่างอุปกรณ์การแพทย์'),
(144, 'จ่ายกลาง'),
(145, 'งานควบคุมและจำหน่วย (คลังพัสดุ'),
(146, 'คลังวัสดุวิทยาศาสตร์การแพทย์ (เทคนิคการแพทย์)'),
(147, 'งานสำรวจและออกแบบ (โครงสร้างพื้นฐานและบำรุงรักษา)'),
(148, 'งานผู้ป่วยนอก'),
(149, 'หอผู้ป่วยรังสีรักษาและเคมีบำบัด ชั้น 2'),
(150, 'หอผู้ป่วยรังสีรักษาและเคมีบำบัด ชั้น 3'),
(151, 'หอผู้ป่วยพิเศษ ชั้น 4'),
(152, 'หอผู้ป่วยพิเศษ ชั้น 5'),
(153, 'ศูนย์มะเร็ง'),
(154, 'สำนักงานอำนวยการ'),
(155, 'กลุ่มงานการพยาบาลศูนย์รังสีรักษาและเคมีบำบัด');

-- --------------------------------------------------------

--
-- Table structure for table `tb_disease`
--

CREATE TABLE IF NOT EXISTS `tb_disease` (
  `id_disease` int(11) NOT NULL,
  `disease_detail` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_disease`
--

INSERT INTO `tb_disease` (`id_disease`, `disease_detail`) VALUES
(6, 'ภูมิแพ้'),
(9, 'กระเพาะ'),
(10, 'ไทรอยด์'),
(11, 'ความดันโลหิตสูง'),
(12, 'ไมเกรน'),
(13, 'หอบหืด'),
(14, 'เบาหวาน'),
(15, 'ผ่าตัด C/S'),
(16, 'หมอนรองกระดูกสันหลังเคลื่อนกดทับเส้นประสาท'),
(17, 'เข่าเสื่อม'),
(18, 'ไวรัสตับอักเสบ'),
(19, 'ไฮเปอร์ไทรอยด์');

-- --------------------------------------------------------

--
-- Table structure for table `tb_employee`
--

CREATE TABLE IF NOT EXISTS `tb_employee` (
  `id_employee` int(11) NOT NULL,
  `id_title` int(11) DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `surname` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `id_department` int(11) NOT NULL,
  `id_vocation` int(11) NOT NULL,
  `id_sex` int(2) NOT NULL,
  `birdthdate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_employee`
--

INSERT INTO `tb_employee` (`id_employee`, `id_title`, `name`, `surname`, `id_department`, `id_vocation`, `id_sex`, `birdthdate`) VALUES
(20, 2, 'ภาลิณี', 'เบญจศิลป์', 5, 9, 2, '1963-03-06'),
(21, 2, 'พิศมัย', 'จ้ายหนองบัว', 5, 10, 2, '1963-03-06'),
(25, 1, 'ยุทธนา', 'กุดทิง', 123, 29, 1, '1984-03-14'),
(26, 1, 'พิศมัย', 'จ้ายหนองบัว', 123, 5, 2, '1969-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `tb_record1`
--

CREATE TABLE IF NOT EXISTS `tb_record1` (
  `id_record` int(11) NOT NULL,
  `id_employee_main` int(11) DEFAULT NULL,
  `age` int(5) DEFAULT NULL,
  `w` int(10) DEFAULT NULL,
  `H` int(10) DEFAULT NULL,
  `BMI` float DEFAULT NULL,
  `id_diag` int(3) DEFAULT NULL,
  `diag_detail` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `smoke` int(5) DEFAULT NULL,
  `alh` int(5) DEFAULT NULL,
  `exer` int(5) DEFAULT NULL,
  `head` int(5) DEFAULT NULL,
  `belt` int(5) DEFAULT NULL,
  `dmy_insert` date DEFAULT NULL,
  `AR` int(5) DEFAULT NULL,
  `use_sometimes` int(5) DEFAULT NULL,
  `use_always` int(5) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_record1`
--

INSERT INTO `tb_record1` (`id_record`, `id_employee_main`, `age`, `w`, `H`, `BMI`, `id_diag`, `diag_detail`, `smoke`, `alh`, `exer`, `head`, `belt`, `dmy_insert`, `AR`, `use_sometimes`, `use_always`) VALUES
(48, 25, 32, 67, 170, 25.9, 1, '9', 1, 1, 1, 1, 1, '2016-04-10', 33, NULL, NULL),
(49, 21, 53, 44, 178, 27.3, 1, '6\r\n', 1, 1, 1, 1, 1, '2016-04-10', 35, NULL, NULL),
(50, 20, 53, 44, 160, 33, 1, '13', 1, 1, 1, 1, 1, '2016-04-10', 33, NULL, NULL),
(51, 21, 53, 56, 176, 0.002, 1, '', 1, 1, 1, 1, 1, '2016-12-14', 45, 1, 1),
(52, 21, 53, 56, 176, 0.002, 1, '', 1, 1, 1, 1, 1, '2016-12-14', 45, 1, 1),
(53, 25, 32, 56, 176, 0.002, 1, '', 1, 1, 1, 1, 1, '2016-12-14', 45, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sex`
--

CREATE TABLE IF NOT EXISTS `tb_sex` (
  `id_sex` int(11) NOT NULL,
  `sex_detail` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sex`
--

INSERT INTO `tb_sex` (`id_sex`, `sex_detail`) VALUES
(1, 'ชาย'),
(2, 'หญิง');

-- --------------------------------------------------------

--
-- Table structure for table `tb_vocation`
--

CREATE TABLE IF NOT EXISTS `tb_vocation` (
  `id_vocation` int(11) NOT NULL,
  `vocation_detail` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_vocation`
--

INSERT INTO `tb_vocation` (`id_vocation`, `vocation_detail`) VALUES
(1, 'คนงาน'),
(2, 'เจ้าพนักงานการเงินและบัญชี'),
(3, 'เจ้าพนักงานเครื่องคอมพิวเตอร์'),
(4, 'เจ้าพนักงานทันตสาธารณสุข'),
(5, 'เจ้าพนักงานธุรการ'),
(9, 'เจ้าพนักงานพัสด'),
(10, 'เจ้าพนักงานเภสัชกรรม'),
(11, 'เจ้าพนักงานวิทยาศาสตร์การแพทย์'),
(12, 'เจ้าพนักงานเวชกรรมฟื้นฟู'),
(13, 'เจ้าพนักงานเวชสถิติ'),
(14, 'เจ้าพนักงานโสตทัศนศึกษา'),
(15, 'เจ้าหน้าที่การเงินและบัญชี'),
(16, 'เจ้าหน้าที่ธุรการ'),
(17, 'เจ้าหน้าที่บันทึกข้อมูล'),
(18, 'ช่างกายอุปกรณ์'),
(19, 'ช่างตัดเย็บผ้า'),
(20, 'ช่างไฟฟ้าและอิเลคทรอนิคส'),
(21, 'ช่างภาพการแพทย์'),
(22, 'ช่างไม้'),
(23, 'ทันตแพทย์'),
(24, 'นักกายภาพบำบัด'),
(25, 'นักกิจกรรมบำบัด'),
(26, 'นักจัดการงานทั่วไป'),
(27, 'นักจิตวิทยา'),
(28, 'นักทรัพยากรบุคคล'),
(29, 'นักเทคนิคการแพทย์'),
(30, 'นักวิเคราะห์นโยบายและแผน'),
(31, 'นักวิชาการคอมพิวเตอร์'),
(32, 'นักวิชาการเงินและบัญชี'),
(33, 'นักวิชาการเงินและบัญชี'),
(34, 'นักวิชาการสถิต'),
(35, 'นักวิชาการสาธารณสุข'),
(36, 'นักวิชาการโสตทัศนศึกษา'),
(37, 'นายช่างเทคนิค'),
(38, 'นายแพทย์'),
(39, 'ผู้ช่วยทันตแพทย์'),
(40, 'ผู้ช่วยนักกายภาพบำบัด'),
(41, 'ผู้ช่วยพยาบาล'),
(42, 'ผู้ช่วยเภสัชกร'),
(43, 'พนักงานกายภาพบำบัด'),
(44, 'พนักงานการเงินและบัญช'),
(45, 'พนักงานเก็บเงิน'),
(46, 'พนักงานขับรถยนต์'),
(47, 'พนักงานช่วยการพยาบาล'),
(48, 'พนักงานซักฟอก'),
(49, 'พนักงานทั่วไป'),
(50, 'พนักงานทำความสะอาด'),
(51, 'พนักงานบริการเอกสารทั่วไป'),
(52, 'พนักงานบัตรรายงานโรค'),
(53, 'พนักงานประจำตึก'),
(54, 'พนักงานประจำห้องทดลอง'),
(55, 'พนักงานประจำห้องยา'),
(56, 'พนักงานเปล'),
(57, 'พนักงานรักษาความปลอดภัย'),
(58, 'พนักงานห้องผ่าตัด'),
(59, 'พยาบาลเทคนิค'),
(60, 'พยาบาลวิชาชีพ'),
(61, 'เภสัชกร'),
(62, 'ลูกจ้างรายคาบ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_department`
--
ALTER TABLE `tb_department`
  ADD PRIMARY KEY (`id_department`);

--
-- Indexes for table `tb_disease`
--
ALTER TABLE `tb_disease`
  ADD PRIMARY KEY (`id_disease`);

--
-- Indexes for table `tb_employee`
--
ALTER TABLE `tb_employee`
  ADD PRIMARY KEY (`id_employee`);

--
-- Indexes for table `tb_record1`
--
ALTER TABLE `tb_record1`
  ADD PRIMARY KEY (`id_record`);

--
-- Indexes for table `tb_sex`
--
ALTER TABLE `tb_sex`
  ADD PRIMARY KEY (`id_sex`);

--
-- Indexes for table `tb_vocation`
--
ALTER TABLE `tb_vocation`
  ADD PRIMARY KEY (`id_vocation`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_department`
--
ALTER TABLE `tb_department`
  MODIFY `id_department` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=156;
--
-- AUTO_INCREMENT for table `tb_disease`
--
ALTER TABLE `tb_disease`
  MODIFY `id_disease` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tb_employee`
--
ALTER TABLE `tb_employee`
  MODIFY `id_employee` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tb_record1`
--
ALTER TABLE `tb_record1`
  MODIFY `id_record` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `tb_sex`
--
ALTER TABLE `tb_sex`
  MODIFY `id_sex` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_vocation`
--
ALTER TABLE `tb_vocation`
  MODIFY `id_vocation` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
