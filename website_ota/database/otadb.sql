/*
Navicat MySQL Data Transfer

Source Server         : CMEDIA
Source Server Version : 50614
Source Host           : localhost:3306
Source Database       : otadb

Target Server Type    : MYSQL
Target Server Version : 50614
File Encoding         : 65001

Date: 2015-04-27 19:14:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `agent_deposite`
-- ----------------------------
DROP TABLE IF EXISTS `agent_deposite`;
CREATE TABLE `agent_deposite` (
  `deposit_id` int(20) NOT NULL AUTO_INCREMENT,
  `kar_id` int(20) DEFAULT NULL,
  `deposit_nilai` decimal(30,0) DEFAULT NULL,
  `deposit_tgl` datetime DEFAULT NULL,
  `flag_dep` enum('0','1') NOT NULL,
  `alasan` text NOT NULL,
  `insert_log` datetime NOT NULL,
  `user_id_insert` int(11) NOT NULL,
  PRIMARY KEY (`deposit_id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of agent_deposite
-- ----------------------------
INSERT INTO `agent_deposite` VALUES ('23', '9', '1000000', '2015-02-24 11:09:23', '0', '', '0000-00-00 00:00:00', '1');
INSERT INTO `agent_deposite` VALUES ('24', '10', '2000000', '2015-02-24 11:09:35', '0', '', '0000-00-00 00:00:00', '1');
INSERT INTO `agent_deposite` VALUES ('25', '11', '3000000', '2015-02-24 11:09:54', '0', '', '0000-00-00 00:00:00', '1');
INSERT INTO `agent_deposite` VALUES ('26', '12', '4000000', '2015-02-24 11:10:16', '0', '', '0000-00-00 00:00:00', '1');
INSERT INTO `agent_deposite` VALUES ('27', '13', '3000000', '2015-02-24 16:04:03', '0', '', '0000-00-00 00:00:00', '1');
INSERT INTO `agent_deposite` VALUES ('28', '14', '2000000', '2015-02-24 16:07:14', '0', '', '0000-00-00 00:00:00', '1');
INSERT INTO `agent_deposite` VALUES ('29', '15', '4000000', '2015-02-24 16:07:27', '0', '', '0000-00-00 00:00:00', '1');
INSERT INTO `agent_deposite` VALUES ('30', '16', '10000000', '2015-02-24 16:42:49', '0', '', '0000-00-00 00:00:00', '1');
INSERT INTO `agent_deposite` VALUES ('31', '17', '3000000', '2015-02-25 09:49:14', '0', '', '0000-00-00 00:00:00', '1');
INSERT INTO `agent_deposite` VALUES ('32', '10', '7000000', '2015-03-13 14:55:51', '0', '', '0000-00-00 00:00:00', '1');
INSERT INTO `agent_deposite` VALUES ('42', '22', '3000000', '2015-04-09 11:08:03', '0', '', '2015-04-09 11:08:03', '1');
INSERT INTO `agent_deposite` VALUES ('43', '22', '3000000', '2015-04-15 09:39:42', '0', '', '2015-04-15 09:39:42', '1');
INSERT INTO `agent_deposite` VALUES ('47', '22', '10000', '2015-04-15 16:47:45', '1', 'tes2', '2015-04-15 16:47:45', '22');
INSERT INTO `agent_deposite` VALUES ('46', '22', '10000', '2015-04-15 16:41:39', '1', 'tes', '2015-04-15 16:41:39', '22');
INSERT INTO `agent_deposite` VALUES ('48', '22', '10000', '2015-04-15 16:47:58', '0', '', '2015-04-15 16:47:58', '1');
INSERT INTO `agent_deposite` VALUES ('49', '31', '7000000', '2015-04-17 15:48:44', '0', '', '2015-04-17 15:48:44', '1');
INSERT INTO `agent_deposite` VALUES ('50', '31', '1000000', '2015-04-17 15:49:09', '1', 'booking melalui agent travel', '2015-04-17 15:49:09', '31');
INSERT INTO `agent_deposite` VALUES ('51', '9', '3000000', '2015-04-17 18:01:40', '0', '', '2015-04-17 18:01:40', '1');
INSERT INTO `agent_deposite` VALUES ('52', '31', '5000000', '2015-04-18 15:43:01', '0', '', '2015-04-18 15:43:01', '1');

-- ----------------------------
-- Table structure for `authenticated`
-- ----------------------------
DROP TABLE IF EXISTS `authenticated`;
CREATE TABLE `authenticated` (
  `code_id` int(20) NOT NULL AUTO_INCREMENT,
  `code_safety` varchar(50) DEFAULT NULL,
  `kar_id` int(11) NOT NULL,
  `code_encrypt` varchar(50) DEFAULT NULL,
  `code_key` varchar(20) DEFAULT NULL,
  `code_key_encrypt` varchar(50) DEFAULT NULL,
  `code_permission` int(10) NOT NULL,
  `code_priv` int(2) DEFAULT '0',
  `flag_hapus` enum('0','1') NOT NULL,
  PRIMARY KEY (`code_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of authenticated
-- ----------------------------
INSERT INTO `authenticated` VALUES ('1', 'admin', '1', '2198ZHchCPvo2', 'admin', '2bS9fZ4m/VcDY', '0', '1', '0');
INSERT INTO `authenticated` VALUES ('12', 'restuu', '10', 'debsQzmf2g4vQ', '12345', '822sYeYeLXqnQ', '0', '1', '0');
INSERT INTO `authenticated` VALUES ('13', 'sony', '16', '334QQoQ4aVUcE', 'bandung', '93ZyMwy382pkg', '0', '1', '0');
INSERT INTO `authenticated` VALUES ('14', 'iqbal', '12', 'eeCAaBTacAI8w', 'bandungjuara', 'b6Y2Y9yozIGRo', '0', '1', '0');

-- ----------------------------
-- Table structure for `config_domain`
-- ----------------------------
DROP TABLE IF EXISTS `config_domain`;
CREATE TABLE `config_domain` (
  `dom_id` int(10) NOT NULL AUTO_INCREMENT,
  `dom_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`dom_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of config_domain
-- ----------------------------
INSERT INTO `config_domain` VALUES ('1', 'localhost/book-cmedia');

-- ----------------------------
-- Table structure for `db_manager`
-- ----------------------------
DROP TABLE IF EXISTS `db_manager`;
CREATE TABLE `db_manager` (
  `db_id` int(20) NOT NULL AUTO_INCREMENT,
  `db_use` varchar(50) DEFAULT NULL,
  `db_host` varchar(50) DEFAULT NULL,
  `db_name` varchar(50) DEFAULT NULL,
  `db_user` varchar(50) DEFAULT NULL,
  `db_pass` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`db_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of db_manager
-- ----------------------------
INSERT INTO `db_manager` VALUES ('1', 'mysql', 'localhost', 'rmdb', 'root', null);

-- ----------------------------
-- Table structure for `gud_mdepartemen`
-- ----------------------------
DROP TABLE IF EXISTS `gud_mdepartemen`;
CREATE TABLE `gud_mdepartemen` (
  `gud_dep_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `gud_dep_departemenid` varchar(50) DEFAULT NULL,
  `gud_dep_departemennama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`gud_dep_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of gud_mdepartemen
-- ----------------------------
INSERT INTO `gud_mdepartemen` VALUES ('1', 'OP-ADM', 'Administrator');
INSERT INTO `gud_mdepartemen` VALUES ('2', 'AGN-TRAVEL', 'Travel Agent');
INSERT INTO `gud_mdepartemen` VALUES ('6', 'AGN-HOTEL', 'Hotel Agent');

-- ----------------------------
-- Table structure for `guest_book`
-- ----------------------------
DROP TABLE IF EXISTS `guest_book`;
CREATE TABLE `guest_book` (
  `book_id` int(20) NOT NULL AUTO_INCREMENT,
  `book_kode` varchar(50) DEFAULT NULL,
  `book_kode_encrypt` varchar(90) DEFAULT NULL,
  `hotel_id` int(20) DEFAULT NULL,
  `check_in` datetime DEFAULT NULL,
  `check_out` datetime DEFAULT NULL,
  `pax` int(4) DEFAULT NULL,
  `day_total` int(10) DEFAULT NULL,
  `plane_dewasa` int(5) DEFAULT '0',
  `plane_anak` int(5) DEFAULT '0',
  `plane_dari` varchar(225) DEFAULT NULL,
  `plane_ke` varchar(225) DEFAULT NULL,
  `plane_dest` int(2) DEFAULT NULL,
  `rent_jml_penumpang` int(20) DEFAULT NULL,
  `rent_tujuan` varchar(225) DEFAULT NULL,
  `flag_supir` int(2) DEFAULT '0' COMMENT 'flag 1 pake supir, 0 tidak',
  `rent_jam` varchar(20) DEFAULT NULL COMMENT 'jam pengambilan mobil',
  `rent_permintaan` text,
  `obj_dewasa` int(5) DEFAULT '0',
  `obj_anak` int(5) DEFAULT '0',
  `obj_tujuan` varchar(225) DEFAULT NULL,
  `wiskul_tujuan` varchar(225) DEFAULT NULL,
  `flag_hari_libur` int(2) DEFAULT NULL COMMENT 'jika 0 hari kerja, jika 1 hari libur, JOIN dengan m_hotel',
  `meja_nomor` varchar(20) DEFAULT NULL COMMENT 'JOIN dengan table m_wiskul_meja',
  `meja_nomor_pesanan` int(20) DEFAULT NULL COMMENT 'JOIN dengan m_wiskul_meja untuk code pemesanan tamu',
  `guest_book_wisata_detail_kode` int(20) DEFAULT NULL COMMENT 'JOIN dengan tabel guest_book_wisata_detail',
  `kategory_item` int(20) DEFAULT NULL COMMENT 'JOIN dengan kode kategorey di m_hotel',
  `noroom` int(4) DEFAULT NULL,
  `room_id` int(20) DEFAULT NULL,
  `guest_id` int(20) DEFAULT NULL,
  `email` varchar(90) DEFAULT NULL,
  `password` varchar(90) DEFAULT NULL,
  `password_encrypt` varchar(90) DEFAULT NULL,
  `question` varchar(225) DEFAULT NULL,
  `answer` text,
  `name` varchar(90) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `location` text,
  `country` varchar(10) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `brithdate` date DEFAULT '0000-00-00',
  `place_name` text,
  `address` text,
  `pos_code` int(20) DEFAULT NULL,
  `kota_id` int(20) DEFAULT NULL,
  `prov_id` int(20) DEFAULT NULL,
  `totprice` decimal(10,0) DEFAULT NULL,
  `very_code` varchar(50) DEFAULT NULL,
  `flag_confirm` int(2) DEFAULT '0',
  `date_input` datetime DEFAULT NULL,
  `pdf_name` varchar(90) DEFAULT NULL,
  `xcode_voc` varchar(50) DEFAULT NULL,
  `total_stlh_disc` decimal(10,0) DEFAULT NULL,
  `hrg_hari_ini` decimal(10,0) NOT NULL,
  `flag_batal` int(10) DEFAULT '0',
  `flag_news` int(2) DEFAULT '1',
  `rinci_id` int(20) DEFAULT NULL,
  `kar_id` int(20) DEFAULT NULL,
  `tiket_id` int(20) DEFAULT NULL,
  `rinci_detail_qty` int(20) DEFAULT '0',
  `rinci_detail_penawaran` decimal(20,2) DEFAULT '0.00',
  `rinci_detail_disc` int(10) DEFAULT '0',
  `input_date_penawaran` datetime DEFAULT NULL,
  `flag_closing` int(2) DEFAULT '0',
  `flag_baca` enum('0','1') NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of guest_book
-- ----------------------------
INSERT INTO `guest_book` VALUES ('2', null, null, '27', '2015-02-28 00:00:00', '2015-03-01 00:00:00', null, null, '2', '2', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', null, '22', null, null, null, null, null, null, null, null, null, null, null, '0000-00-00', null, null, null, null, null, null, null, '0', null, null, null, null, '0', '0', '1', '9', '9', null, '1', '465000.00', '0', '2015-02-24 11:04:36', '0', '1');
INSERT INTO `guest_book` VALUES ('3', null, null, '25', '2015-02-28 00:00:00', '2015-03-01 00:00:00', null, null, '2', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', null, '19', null, null, null, null, null, null, null, null, null, null, null, '0000-00-00', null, null, null, null, null, null, null, '0', null, null, null, null, '0', '0', '1', '10', '10', null, '1', '308000.00', '0', '2015-02-24 11:15:05', '0', '1');
INSERT INTO `guest_book` VALUES ('4', null, null, '22', '2015-02-28 00:00:00', '2015-03-01 00:00:00', null, null, '1', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', null, '18', null, null, null, null, null, null, null, null, null, null, null, '0000-00-00', null, null, null, null, null, null, null, '0', null, null, null, null, '0', '0', '1', '11', '11', null, '1', '516000.00', '0', '2015-02-24 11:18:38', '0', '1');
INSERT INTO `guest_book` VALUES ('5', null, null, '27', '2015-02-28 00:00:00', '2015-03-01 00:00:00', null, null, '1', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', null, '22', null, null, null, null, null, null, null, null, null, null, null, '0000-00-00', null, null, null, null, null, null, null, '0', null, null, null, null, '0', '0', '1', '12', '12', null, '1', '435000.00', '0', '2015-02-24 11:21:40', '0', '1');
INSERT INTO `guest_book` VALUES ('6', null, null, '27', '2015-02-27 00:00:00', '2015-03-01 00:00:00', null, null, '1', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', null, '21', null, null, null, null, null, null, null, null, null, null, null, '0000-00-00', null, null, null, null, null, null, null, '0', null, null, null, null, '0', '0', '1', '13', '13', null, '1', '750000.00', '0', '2015-02-24 15:15:14', '0', '1');
INSERT INTO `guest_book` VALUES ('7', null, null, '25', '2015-02-27 00:00:00', '2015-03-01 00:00:00', null, null, '2', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', null, '19', null, null, null, null, null, null, null, null, null, null, null, '0000-00-00', null, null, null, null, null, null, null, '0', null, null, null, null, '0', '0', '1', '14', '14', null, '1', '616000.00', '0', '2015-02-24 15:24:13', '0', '1');
INSERT INTO `guest_book` VALUES ('8', null, null, '22', '2015-02-26 00:00:00', '2015-03-01 00:00:00', null, null, '2', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', null, '18', null, null, null, null, null, null, null, null, null, null, null, '0000-00-00', null, null, null, null, null, null, null, '0', null, null, null, null, '0', '0', '1', '15', '15', null, '1', '1548000.00', '0', '2015-02-24 15:27:25', '0', '1');
INSERT INTO `guest_book` VALUES ('9', null, null, '25', '2015-02-26 00:00:00', '2015-02-27 00:00:00', null, null, '1', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', null, '19', null, null, null, null, null, null, null, null, null, null, null, '0000-00-00', null, null, null, null, null, null, null, '0', null, null, null, null, '0', '0', '1', '16', '16', null, '1', '288000.00', '0', '2015-02-25 12:34:20', '0', '1');
INSERT INTO `guest_book` VALUES ('10', null, null, '27', '2015-02-26 00:00:00', '2015-02-27 00:00:00', null, null, '1', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', null, '21', null, null, null, null, null, null, null, null, null, null, null, '0000-00-00', null, null, null, null, null, null, null, '0', null, null, null, null, '0', '0', '1', '17', '16', null, '1', '375000.00', '0', '2015-02-25 14:06:40', '0', '1');
INSERT INTO `guest_book` VALUES ('11', null, null, null, null, null, null, null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, null, null, null, null, 'iqbal@cifo.co.id', '123', '20GlbWrPdSm5w', 'Nama Pertama Binatang Peliharaan', 'moshi', 'Muhamad Iqbal', 'Laki-Laki', 'Jl. Bagus Bingit', '107', '0896029223946', '1990-08-02', 'PT. CMEDIA', 'Jl. Bagus Bingit', '40321', '183', '13', null, null, '0', null, null, null, null, '0', '0', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('12', null, null, null, null, null, null, null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, null, null, null, null, 'iqbal@cifo.co.id', '123', '20GlbWrPdSm5w', 'Nama Pertama Binatang Peliharaan', 'moshi', 'Muhamad Iqbal', 'Laki-Laki', 'Jl. Bagus Bingit', '107', '0896029223946', '1990-08-02', 'PT. CMEDIA', 'Jl. Bagus Bingit', '40321', '183', '13', null, null, '0', null, null, null, null, '0', '0', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('13', null, null, null, null, null, null, null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, null, null, null, null, 'ully@melsa.co.id', 'cantik', '1cCoScHPa8uLE', null, null, 'ully', 'Perempuan', 'paskal hyper square', null, '08122172881', '0000-00-00', null, null, null, null, null, null, null, '0', null, null, null, null, '0', '0', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('14', '20150226RSVCM0000', 'dez9tK2SfYhLw', '25', '2015-02-27 00:00:00', '2015-02-28 00:00:00', '3', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '19', null, 'sdeny@cifo.co.id', 'sasi2008', 'b5mAUrCnLeqPo', null, null, 'sony', 'Laki-Laki', null, '107', '+6281990991974', '0000-00-00', null, null, null, null, null, '328000', '8106', '0', '2015-02-26 17:03:15', null, null, '328000', '0', '1', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('15', null, null, null, null, null, null, null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, null, null, null, null, 'yudi@cifo.co.id', 'eliani08', 'a70jdbq9UAWSA', null, null, 'Yudi Hermayadi Sofyan', 'Laki-Laki', 'St. Aksan', '107', '0226035475', '0000-00-00', 'PT. Citra Jelajah Informatika', 'Jln. Mampang Prapatan 3 No 9, Jaksel', '40132', '163', '12', null, null, '0', null, null, null, null, '0', '0', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('16', '20150227RSVCM0001', 'ebhkDeFhpABL6', '27', '2015-02-27 00:00:00', '2015-02-28 00:00:00', '3', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '21', null, 'yudi@cifo.co.id', 'eliani08', 'a70jdbq9UAWSA', null, null, 'Yudi Hermayadi Sofyan', 'Laki-Laki', 'St. Aksan', '107', '0226035475', '0000-00-00', 'PT. Citra Jelajah Informatika', 'Jln. Mampang Prapatan 3 No 9, Jaksel', '40132', '163', '12', '415000', '4009', '0', '2015-02-27 10:39:50', null, null, '415000', '0', '1', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('17', '20150228RSVCM0002', '1elXQ1oI815kM', '22', '2015-03-01 00:00:00', '2015-03-02 00:00:00', '3', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '19', null, 'piepiet74@cifo.co.id', 'Syabian2004', '38jb2csWAyY.6', null, null, 'evi', 'Perempuan', 'Jl.paledang bdg', '107', '081224001974', '0000-00-00', null, null, null, null, null, '656000', '8408', '1', '2015-02-28 21:10:42', 'Confirmation-ID-20150228RSVCM0002-92CXL.pdf', null, '656000', '0', '0', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('18', '20150228RSVCM0003', 'af56jGVo3uATE', '25', '2015-02-28 00:00:00', '2015-03-02 00:00:00', '3', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '19', null, 'piepiet74@cifo.co.id', 'Syabian2004', '38jb2csWAyY.6', null, null, 'evi', 'Perempuan', 'Jl.paledang bdg', '107', '081224001974', '0000-00-00', null, null, null, null, null, '656000', '6397', '1', '2015-02-28 21:19:33', 'Confirmation-ID-20150228RSVCM0003-79J2V.pdf', null, '656000', '0', '0', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('19', '20150228RSVCM0004', '61FuoMjdvQ6rs', '27', '2015-02-28 00:00:00', '2015-03-02 00:00:00', '3', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '21', null, 'piepiet74@cifo.co.id', 'Syabian2004', '38jb2csWAyY.6', null, null, 'piet', 'Perempuan', 'Paledang', '47', '08180224001974', '0000-00-00', null, null, null, null, null, '830000', '9548', '0', '2015-02-28 21:41:57', null, null, '830000', '0', '1', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('20', '20150228RSVCM0005', '0crXfEIt.HxJE', '27', '2015-02-28 00:00:00', '2015-03-02 00:00:00', '3', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '21', null, 'piepiet74@cifo.co.id', 'Syabian2004', '38jb2csWAyY.6', null, null, 'evi', 'Perempuan', 'Paledang', '107', '081224001974', '0000-00-00', null, null, null, null, null, '830000', '8533', '1', '2015-02-28 21:52:34', 'Confirmation-ID-20150228RSVCM0005-UH5HE.pdf', null, '830000', '0', '0', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('21', '20150302RSVCM0006', '46cqS8PsZam1U', '22', '2015-03-02 00:00:00', '2015-03-03 00:00:00', '3', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '17', null, 'yudi@cifo.co.id', 'eliani08', 'a70jdbq9UAWSA', null, null, 'Yudi Hermayadi Sofyan', 'Laki-Laki', 'St. Aksan', '107', '0226035475', '0000-00-00', null, null, null, null, null, '395000', '3215', '0', '2015-03-02 14:48:57', null, null, '395000', '0', '1', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('22', '20150303RSVCM0007', '4dGHDdiC0kieA', '25', '2015-03-03 00:00:00', '2015-03-04 00:00:00', '3', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '19', null, 'yudi@cifo.net.id', 'eliani08', 'a70jdbq9UAWSA', null, null, 'Venita Juliana', 'Perempuan', 'Cimahi', '107', '081321860280', '1990-06-07', 'PT. Citra Jelajah Informatika', 'Jln. Mampang Prapatan 3 No 9, Jaksel', '12790', '183', '13', '328000', '2353', '1', '2015-03-03 11:15:00', 'Confirmation-ID-20150303RSVCM0007-Q2VMP.pdf', null, '328000', '0', '0', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('23', '20150304RSVCM0008', 'a3tLpEH95Wd3s', '25', '2015-03-04 00:00:00', '2015-03-05 00:00:00', '3', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '19', null, 'yudi@cifo.net.id', 'eliani08', 'a70jdbq9UAWSA', null, null, 'Venita Juliana', 'Perempuan', 'Cimahi', '107', '081321860280', '1990-06-07', 'PT. Citra Jelajah Informatika', 'Jln. Mampang Prapatan 3 No 9, Jaksel', '12790', '183', '13', '328000', '6657', '1', '2015-03-04 09:51:26', 'Confirmation-ID-20150304RSVCM0008-NRQ5Q.pdf', null, '328000', '0', '0', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('24', '20150304RSVCM0009', '39igtz0QZf7Kg', '22', '2015-03-04 00:00:00', '2015-03-05 00:00:00', '3', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '18', null, 'yudi@cifo.net.id', 'eliani08', 'a70jdbq9UAWSA', null, null, 'Venita Juliana', 'Perempuan', 'Cimahi', '107', '081321860280', '1990-06-07', 'PT. Citra Jelajah Informatika', 'Jln. Mampang Prapatan 3 No 9, Jaksel', '12790', '183', '13', '546000', '7312', '0', '2015-03-04 09:52:23', null, null, '546000', '0', '1', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('25', '20150305RSVCM0010', 'e4zxjiLnlDESQ', '27', '2015-03-05 00:00:00', '2015-03-06 00:00:00', '3', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '21', null, 'yudi@cifo.net.id', 'eliani08', 'a70jdbq9UAWSA', null, null, 'Venita Juliana', 'Perempuan', 'Cimahi', '107', '081321860280', '0000-00-00', null, null, null, null, null, '415000', '9130', '1', '2015-03-05 09:26:41', 'Confirmation-ID-20150305RSVCM0010-ZIBVN.pdf', 'dcyt10bII7ZGM', '365000', '0', '0', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('26', '20150305RSVCM0011', 'b1/EN3xc/MsDk', '25', '2015-03-06 00:00:00', '2015-03-07 00:00:00', '3', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '19', null, 'sdeny@cifo.co.id', 'sasi2008', 'b5mAUrCnLeqPo', null, null, 'sony', 'Laki-Laki', 'Jalan Bagus Rangin no. 8', '107', '081990991974', '0000-00-00', null, null, null, null, null, '328000', '4640', '0', '2015-03-05 11:03:49', null, null, '328000', '0', '1', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('27', null, null, '22', '2015-03-06 00:00:00', '2015-03-07 00:00:00', null, null, '1', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', null, '16', null, null, null, null, null, null, null, null, null, null, null, '0000-00-00', null, null, null, null, null, null, null, '0', null, null, null, null, '0', '0', '1', '19', '16', null, '1', '317000.00', '0', '2015-03-05 11:15:29', '0', '1');
INSERT INTO `guest_book` VALUES ('28', null, null, '22', '2015-03-06 00:00:00', '2015-03-07 00:00:00', null, null, '1', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', null, '17', null, null, null, null, null, null, null, null, null, null, null, '0000-00-00', null, null, null, null, null, null, null, '0', null, null, null, null, '0', '0', '1', '20', '16', null, '1', '355000.00', '0', '2015-03-05 15:49:48', '0', '1');
INSERT INTO `guest_book` VALUES ('29', '20150306RSVCM0012', 'b7Ml2jjL06ObI', '22', '2015-03-12 00:00:00', '2015-03-13 00:00:00', '3', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '0', null, 'arbi@cifo.co.id', 'bandung', '93ZyMwy382pkg', null, null, 'Arbi', 'Laki-Laki', 'Bandung', '107', '08814019493', '0000-00-00', null, null, null, null, null, '0', '0047', '0', '2015-03-06 10:26:55', null, null, '0', '0', '1', '1', null, null, null, '0', '0.00', '0', '2015-03-06 00:00:00', '0', '1');
INSERT INTO `guest_book` VALUES ('30', '20150309RSVCM0013', '3ftIduQNZKEDE', '22', '2015-03-09 00:00:00', '2015-03-10 00:00:00', '3', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '16', null, 'yudi@cifo.net.id', 'eliani08', 'a70jdbq9UAWSA', null, null, 'Venita Juliana', 'Perempuan', 'Jakarta', '107', '081321860280', '0000-00-00', null, null, null, null, null, '357000', '1042', '1', '2015-03-09 13:32:07', 'Confirmation-ID-20150309RSVCM0013-HGRRO.pdf', null, '357000', '0', '0', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('31', null, null, '22', '2015-03-09 00:00:00', '2015-03-10 00:00:00', null, null, '2', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', null, '16', null, null, null, null, null, null, null, null, null, null, null, '0000-00-00', null, null, null, null, null, null, null, '0', null, null, null, null, '0', '0', '1', '21', '9', null, '1', '347000.00', '0', '2015-03-09 14:21:10', '0', '1');
INSERT INTO `guest_book` VALUES ('32', null, null, '25', '2015-03-09 00:00:00', '2015-03-10 00:00:00', null, null, '2', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', null, '19', null, null, null, null, null, null, null, null, null, null, null, '0000-00-00', null, null, null, null, null, null, null, '0', null, null, null, null, '328000', '0', '1', '22', '10', null, '1', '308000.00', '0', '2015-03-09 14:24:44', '0', '1');
INSERT INTO `guest_book` VALUES ('34', null, null, '27', '2015-03-09 00:00:00', '2015-03-11 00:00:00', null, null, '2', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', null, '22', null, null, null, null, null, null, null, null, null, null, null, '0000-00-00', null, null, null, null, null, null, null, '0', null, null, null, null, '920000', '0', '1', '23', '11', null, '1', '890000.00', '0', '2015-03-09 14:30:31', '0', '1');
INSERT INTO `guest_book` VALUES ('35', null, null, '22', '2015-03-09 00:00:00', '2015-03-11 00:00:00', null, null, '2', '1', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', null, '18', null, null, null, null, null, null, null, null, null, null, null, '0000-00-00', null, null, null, null, null, null, null, '0', null, null, null, null, '1052000', '0', '1', '24', '12', null, '1', '1012000.00', '0', '2015-03-09 14:33:09', '0', '1');
INSERT INTO `guest_book` VALUES ('36', '20150309RSVCM0014', '86GUvoyN.k5KY', '25', '2015-03-09 00:00:00', '2015-03-10 00:00:00', '3', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '19', null, 'yudi@cifo.co.id', 'eliani08', 'a70jdbq9UAWSA', null, null, 'Yudi Hermayadi Sofyan', 'Laki-Laki', 'St. Aksan', '107', '0226035475', '0000-00-00', null, null, null, null, null, '328000', '8466', '1', '2015-03-09 14:48:38', 'Confirmation-ID-20150309RSVCM0014-2JTLX.pdf', null, '328000', '0', '0', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('37', '20150312RSVCM0015', 'f5jfY9lZa7ZrM', '22', '2015-03-12 00:00:00', '2015-03-13 00:00:00', '3', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '16', null, 'yudi@cifo.co.id', 'eliani08', 'a70jdbq9UAWSA', null, null, 'Yudi Hermayadi Sofyan', 'Laki-Laki', 'St. Aksan', '107', '0226035475', '0000-00-00', null, null, null, null, null, '357000', '6316', '1', '2015-03-12 09:30:20', 'Confirmation-ID-20150312RSVCM0015-NOO69.pdf', null, '357000', '0', '0', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('38', '20150312RSVCM0016', 'b3WRbbtWbXnBM', '22', '2015-03-12 00:00:00', '2015-03-13 00:00:00', '3', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '16', null, 'yudi@cifo.net.id', 'eliani08', 'a70jdbq9UAWSA', null, null, 'Venita Juliana', 'Perempuan', 'Cimahi', '107', '081321860280', '0000-00-00', null, null, null, null, null, '357000', '0824', '1', '2015-03-12 10:01:38', 'Confirmation-ID-20150312RSVCM0016-SSFFR.pdf', null, '357000', '0', '0', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('39', null, null, '22', '2015-03-12 00:00:00', '2015-03-13 00:00:00', null, null, '1', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', null, '16', null, null, null, null, null, null, null, null, null, null, null, '0000-00-00', null, null, null, null, null, null, null, '0', null, null, null, null, '0', '0', '1', '25', '12', null, '1', '317000.00', '0', '2015-03-12 10:37:30', '0', '1');
INSERT INTO `guest_book` VALUES ('40', null, null, '22', '2015-03-12 00:00:00', '2015-03-13 00:00:00', null, null, '6', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', null, '18', null, null, null, null, null, null, null, null, null, null, null, '0000-00-00', null, null, null, null, null, null, null, '0', null, null, null, null, '0', '0', '1', '26', '12', null, '2', '1052000.00', '0', '2015-03-12 14:16:59', '0', '1');
INSERT INTO `guest_book` VALUES ('44', null, null, '25', '2015-03-13 00:00:00', '2015-03-14 00:00:00', null, null, '1', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', null, '19', null, null, null, null, null, null, null, null, null, null, null, '0000-00-00', null, null, null, null, null, null, null, '0', null, null, null, null, '0', '0', '1', '28', '10', null, '10', '3260000.00', '0', '2015-03-13 13:59:57', '0', '1');
INSERT INTO `guest_book` VALUES ('45', '20150318RSVCM0017', '9er..fkagxBfk', '22', '2015-03-18 00:00:00', '2015-03-19 00:00:00', '3', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '17', null, 'yudi@cifo.co.id', 'eliani08', 'a70jdbq9UAWSA', null, null, 'Yudi Hermayadi Sofyan', 'Laki-Laki', 'St. Aksan', '107', '0226035475', '0000-00-00', null, null, null, null, null, '395000', '1821', '0', '2015-03-18 10:37:58', null, null, '395000', '0', '1', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('46', '20150318RSVCM0018', '85Z/1tph98OVs', '22', '2015-03-18 00:00:00', '2015-03-19 00:00:00', '3', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '2', '17', null, 'yudi@cifo.net.id', 'eliani08', 'a70jdbq9UAWSA', null, null, 'Venita Juliana', 'Perempuan', 'Cimahi', '107', '081321860280', '0000-00-00', null, null, null, null, null, '790000', '3734', '1', '2015-03-18 10:38:52', 'Confirmation-ID-20150318RSVCM0018-LX2ZR.pdf', null, '790000', '0', '0', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('47', null, null, '22', '2015-03-19 00:00:00', '2015-03-20 00:00:00', null, null, '1', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', null, '16', null, null, null, null, null, null, null, null, null, null, null, '0000-00-00', null, null, null, null, null, null, null, '0', null, null, null, null, '0', '0', '1', '29', '16', null, '1', '317000.00', '0', '2015-03-19 11:08:57', '0', '1');
INSERT INTO `guest_book` VALUES ('48', '20150320RRTCM0000', '4fXVkcTSj3oiI', '9', '2015-03-20 00:00:00', '2015-03-21 00:00:00', null, '1', '0', '0', null, null, null, '2', 'jakarta', '1', '7:30 AM', '', '0', '0', null, null, null, null, null, null, '25437858', null, null, null, 'rizal_syam2003@yahoo.com', 'mandiri0527', '83MSFG/lR9w1Q', null, null, 'rizal', 'Laki-Laki', 'Buluina no.13', '107', '08114441407', '0000-00-00', null, null, null, null, null, '230000', '3927', '1', '2015-03-20 07:23:16', 'Confirmation-ID-20150320RRTCM0000-SH5VQ.pdf', null, '380000', '0', '0', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('49', '20150320RRTCM0001', '1cPMp2OE2ScHQ', '9', '2015-03-20 00:00:00', '2015-03-21 00:00:00', null, '1', '0', '0', null, null, null, '1', 'jakarta', '0', '9:15 AM', '', '0', '0', null, null, null, null, null, null, '25437858', null, null, null, 'iqbal@cifo.co.id', '123', '20GlbWrPdSm5w', 'Nama Pertama Binatang Peliharaan', 'moshi', 'Muhamad Iqbal', 'Laki-Laki', 'Jl. Bagus Bingit', '107', '0896029223946', '0000-00-00', null, null, null, null, null, '230000', '8412', '1', '2015-03-20 09:08:46', 'Confirmation-ID-20150320RRTCM0001-OS9SA.pdf', null, '230000', '0', '0', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('50', '20150320RSVCM0019', 'bckw.0zr832u6', '22', '2015-03-21 00:00:00', '2015-03-23 00:00:00', '3', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '2', '17', null, 'arbi@cmedia.co.id', 'mardiailman', '74JzpDNNXxYBQ', null, null, 'Arbi', 'Laki-Laki', 'Bandung', '107', '08814019493', '0000-00-00', null, null, null, null, null, '1817000', '5337', '0', '2015-03-20 09:46:36', null, null, '1817000', '0', '1', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('51', '20150320RSVCM0020', '4ap7cwOtWSYBA', '25', '2015-03-21 00:00:00', '2015-03-23 00:00:00', '3', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '19', null, 'arbi@cifo.co.id', 'keepitsimple', '39nqpMCEn0Qak', null, null, 'Arbi A.', 'Laki-Laki', 'Bandung', '107', '08814019493', '0000-00-00', null, null, null, null, null, '754400', '9325', '0', '2015-03-20 09:55:48', null, null, '754400', '0', '1', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('52', '20150320RSVCM0021', '61QG.lBIQQWOg', '27', '2015-03-21 00:00:00', '2015-03-23 00:00:00', '3', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '22', null, 'arbi@cifo.co.id', 'keepitsimple', '39nqpMCEn0Qak', null, null, 'Arbi A.', 'Laki-Laki', 'Bandung', '107', '08814019493', '0000-00-00', null, null, null, null, null, '1092500', '6382', '0', '2015-03-20 10:07:55', null, null, '1092500', '0', '1', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('53', '20150320RRTCM0002', 'd5bA0bTdWXk/I', '13', '2015-03-21 00:00:00', '2015-03-22 00:00:00', null, '1', '0', '0', null, null, null, '1', 'Jakarta', '0', '10:30 AM', '', '0', '0', null, null, null, null, null, null, '25437858', null, null, null, 'arbi@cifo.co.id', 'keepitsimple', '39nqpMCEn0Qak', null, null, 'Arbi A.', 'Laki-Laki', 'Bandung', '107', '08814019493', '0000-00-00', null, null, null, null, null, '450000', '8290', '0', '2015-03-20 10:13:17', null, null, '450000', '0', '1', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('54', '20150320RSVCM0022', 'b0zgwpEdRfyBg', '25', '2015-03-21 00:00:00', '2015-03-25 00:00:00', '3', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '19', null, 'arbi@cifo.co.id', 'keepitsimple', '39nqpMCEn0Qak', null, null, 'Arbi A.', 'Laki-Laki', 'Bandung', '107', '08814019493', '0000-00-00', null, null, null, null, null, '1508800', '6126', '0', '2015-03-20 10:15:57', null, null, '1508800', '0', '1', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('55', '20150320RSVCM0023', '36oLFbsXi.SWI', '27', '2015-03-21 00:00:00', '2015-03-25 00:00:00', '3', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '22', null, 'arbi@cmedia.co.id', 'keepitsimple', '39nqpMCEn0Qak', null, null, 'A. Adiyana', 'Laki-Laki', 'Bandung', '107', '08814019493', '0000-00-00', null, null, null, null, null, '2185000', '3018', '0', '2015-03-20 10:23:27', null, null, '2185000', '0', '1', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('56', '20150324RSVCM0024', 'detm6t6QME1PY', '22', '2015-03-24 00:00:00', '2015-03-25 00:00:00', '3', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '16', null, 'sdeny@cifo.co.id', 'sasi2008', 'b5mAUrCnLeqPo', null, null, 'sony', 'Laki-Laki', 'bandung', '107', '+6281990991974', '0000-00-00', null, null, null, null, null, '410550', '8483', '1', '2015-03-24 20:25:35', 'Confirmation-ID-20150324RSVCM0024-336M3.pdf', null, '410550', '0', '0', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('57', null, null, '25', '2015-03-24 00:00:00', '2015-03-25 00:00:00', null, null, '2', '1', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', null, '19', null, null, null, null, null, null, null, null, null, null, null, '0000-00-00', null, null, null, null, null, null, null, '0', null, null, null, null, '0', '0', '1', '31', '16', null, '1', '288000.00', '0', '2015-03-24 20:39:23', '0', '1');
INSERT INTO `guest_book` VALUES ('58', '20150325RSVCM0025', '74tdAFEybh8WA', '25', '2015-03-25 00:00:00', '2015-03-26 00:00:00', '3', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '19', null, 'sdeny@yahoo.com', 'sasi2008', 'b5mAUrCnLeqPo', null, null, 'sony setiadi', 'Laki-Laki', 'bandung', '107', '081990991974', '0000-00-00', null, null, null, null, null, '377200', '6618', '0', '2015-03-25 14:17:31', null, null, '377200', '0', '1', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('59', '20150325RSVCM0026', '1eswzo.Tk.gOc', '27', '2015-03-25 00:00:00', '2015-03-26 00:00:00', '3', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '22', null, 'sdeny@yahoo.com', 'sasi2008', 'b5mAUrCnLeqPo', null, null, 'sony setiadi', 'Laki-Laki', 'bandung', '107', '081990991974', '0000-00-00', null, null, null, null, null, '546250', '9450', '1', '2015-03-25 14:40:18', 'Confirmation-ID-20150325RSVCM0026-OHISK.pdf', null, '546250', '0', '0', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('60', '20150402RSVCM0027', '4f6B78kRnTFvI', '22', '2015-04-02 00:00:00', '2015-04-03 00:00:00', '3', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '16', null, 'iqbal@cifo.co.id', '123', '20GlbWrPdSm5w', 'Nama Pertama Binatang Peliharaan', 'moshi', 'Muhamad Iqbal', 'Laki-Laki', 'Jl. Bagus Bingit', '107', '0896029223946', '0000-00-00', null, null, null, null, null, '460000', '6539', '1', '2015-04-02 09:36:05', 'Confirmation-ID-20150402RSVCM0027-IKE1W.pdf', null, '460000', '0', '0', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('61', null, null, null, null, null, null, null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, null, null, null, null, 'deny@dencuy.com', 'indonesia', 'cdgMi.cBEydjo', null, null, 'Deny', 'Laki-Laki', 'mampang', null, '081284000119', '0000-00-00', null, null, null, null, null, null, null, '0', null, null, null, null, '0', '0', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('62', '20150402RSVCM0028', '1biKO1Uw/VFXk', '22', '2015-04-02 00:00:00', '2015-04-03 00:00:00', '3', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '17', null, 'yudi@cifo.co.id', 'eliani08', 'a70jdbq9UAWSA', null, null, 'Yudi Hermayadi Sofyan', 'Laki-Laki', 'St. Aksan', '107', '0226035475', '0000-00-00', null, null, null, null, null, '575000', '5785', '0', '2015-04-02 10:06:05', null, null, '575000', '0', '1', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('63', '20150406RSVCM0029', '1fAKM8ZmnVd2U', '22', '2015-04-07 00:00:00', '2015-04-08 00:00:00', '3', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '17', null, 'yudi.hermayadi@gmail.com', 'eliani08', 'a70jdbq9UAWSA', null, null, 'yudi hermayadi', 'Laki-Laki', 'Jl.Bagusrangin no 8', '107', '02292927773', '0000-00-00', null, null, null, null, null, '402500', '0461', '1', '2015-04-06 13:34:10', 'Confirmation-ID-20150406RSVCM0029-FG4TL.pdf', null, '402500', '0', '0', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('64', '20150406RSVCM0030', '9bEX2AbByckkk', '22', '2015-04-06 00:00:00', '2015-04-07 00:00:00', '3', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '16', null, 'iqbal@cifo.co.id', '123', '20GlbWrPdSm5w', 'Nama Pertama Binatang Peliharaan', 'moshi', 'Muhamad Iqbal', 'Laki-Laki', 'Jl. Bagus Bingit', '107', '0896029223946', '0000-00-00', null, null, null, null, null, '402500', '9234', '1', '2015-04-06 14:00:58', 'Confirmation-ID-20150406RSVCM0030-NEKF7.pdf', null, '402500', '0', '0', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('65', '20150406RSVCM0031', '0ecPfAU.VpJ6Y', '22', '2015-04-10 00:00:00', '2015-04-12 00:00:00', '3', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '17', null, 'yudi.hermayadi@gmail.com', 'eliani08', 'a70jdbq9UAWSA', null, null, 'yudi hermayadi', 'Laki-Laki', 'Jl.Bagusrangin no 8', '107', '02292927773', '0000-00-00', null, null, null, null, null, '805000', '9607', '1', '2015-04-06 14:15:33', 'Confirmation-ID-20150406RSVCM0031-SH9YX.pdf', null, '805000', '0', '0', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('66', '20150406RSVCM0032', '79P6ecS0UuMrY', '22', '2015-04-06 00:00:00', '2015-04-07 00:00:00', '3', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '16', null, 'iqbal@cifo.co.id', '123', '20GlbWrPdSm5w', 'Nama Pertama Binatang Peliharaan', 'moshi', 'Muhamad Iqbal', 'Laki-Laki', 'Jl. Bagus Bingit', '107', '0896029223946', '0000-00-00', null, null, null, null, null, '402500', '9230', '1', '2015-04-06 15:11:01', 'Confirmation-ID-20150406RSVCM0032-Z010W.pdf', null, '350000', '0', '0', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('67', null, null, null, null, null, null, null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, null, null, null, null, 'sofyan85@cifo.co.id', 'sofyan12', 'd71XOJRtuSP1Q', null, null, 'sofyan supandi', 'Laki-Laki', 'Pondok Indah Residence', null, '087887847228', '0000-00-00', null, null, null, null, null, null, null, '0', null, null, null, null, '0', '0', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('69', null, null, '22', '2015-04-10 00:00:00', '2015-04-11 00:00:00', null, null, '1', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', null, '16', null, null, null, null, null, null, null, null, null, null, null, '0000-00-00', null, null, null, null, null, null, null, '0', null, null, null, null, '350000', '0', '1', '30', '10', null, '1', '330000.00', '0', '2015-04-10 14:55:04', '0', '1');
INSERT INTO `guest_book` VALUES ('73', null, null, '22', '2015-04-13 00:00:00', '2015-04-14 00:00:00', null, null, '1', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', null, '16', null, null, null, null, null, null, null, null, null, null, null, '0000-00-00', null, null, null, null, null, null, null, '0', null, null, null, null, '350000', '0', '1', '36', '10', null, '1', '330000.00', '0', '2015-04-13 14:57:51', '0', '1');
INSERT INTO `guest_book` VALUES ('83', '20150415RSVCM0033', '7bxpfbUXAAPJ6', '22', '2015-04-15 00:00:00', '2015-04-16 00:00:00', '3', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '17', null, 'yudi.hermayadi@gmail.com', 'eliani08', 'a70jdbq9UAWSA', null, null, 'yudi hermayadi', 'Laki-Laki', 'Jl.Bagusrangin no 8', '107', '02292927773', '0000-00-00', null, null, null, null, null, '350000', '4528', '1', '2015-04-15 11:26:29', 'Confirmation-ID-20150415RSVCM0033-W6C2Q.pdf', null, '350000', '350000', '0', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('84', null, null, null, null, null, null, null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, null, null, null, null, 'nengrestuu@gmail.com', '12345', '822sYeYeLXqnQ', null, null, 'restu', 'Perempuan', 'cililin', null, '3141', '0000-00-00', null, null, null, null, null, null, null, '0', null, null, null, null, '0', '0', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('85', '20150415RSVCM0034', '22deP16Pni2wc', '22', '2015-04-15 00:00:00', '2015-04-16 00:00:00', '2', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '16', null, 'yudi.hermayadi@gmail.com', 'eliani08', 'a70jdbq9UAWSA', null, null, 'yudi hermayadi', 'Laki-Laki', 'Jl.Bagusrangin no 8', '107', '02292927773', '0000-00-00', null, null, null, null, null, '350000', '0085', '1', '2015-04-15 14:24:57', 'Confirmation-ID-20150415RSVCM0034-9JU9S.pdf', '000.000.000', '350000', '350000', '0', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('86', null, null, '25', '2015-04-16 00:00:00', '2015-04-17 00:00:00', null, null, '1', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', null, '19', null, null, null, null, null, null, null, null, null, null, null, '0000-00-00', null, null, null, null, null, null, null, '0', null, null, null, null, '328000', '0', '1', '37', '10', null, '1', '308000.00', '0', '2015-04-16 11:19:17', '0', '1');
INSERT INTO `guest_book` VALUES ('87', '20150417RSVCM0035', 'b7zGHfVEdd8OM', '37', '2015-04-17 00:00:00', '2015-04-18 00:00:00', '2', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '47', null, 'meydzie@yahoo.com', 'eliani08', 'a70jdbq9UAWSA', null, null, 'Veana', 'Perempuan', 'Sarjad', '107', '085759017773', '0000-00-00', null, null, null, null, null, '500000', '7112', '1', '2015-04-17 15:47:03', 'Confirmation-ID-20150417RSVCM0035-LAW9S.pdf', 'c1TjunvdclmBk', '300000', '500000', '0', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('88', '20150417RSVCM0036', '46mzshJVhFEW6', '37', '2015-04-17 00:00:00', '2015-04-18 00:00:00', '2', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '47', null, 'meydzie@yahoo.com', 'eliani08', 'a70jdbq9UAWSA', null, null, 'Veana', 'Perempuan', 'Sarjad', '107', '085759017773', '0000-00-00', null, null, null, null, null, '500000', '9460', '1', '2015-04-17 16:30:37', 'Confirmation-ID-20150417RSVCM0036-YH4EN.pdf', null, '500000', '500000', '0', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('89', null, null, '37', '2015-04-18 00:00:00', '2015-04-19 00:00:00', null, null, '2', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', null, '47', null, null, null, null, null, null, null, null, null, null, null, '0000-00-00', null, null, null, null, null, null, null, '0', null, null, null, null, '500000', '0', '1', '18', '15', null, '1', '470000.00', '0', '2015-04-18 08:28:23', '0', '1');
INSERT INTO `guest_book` VALUES ('90', '20150418RSVCM0037', '1bSitqPM7Nrfc', '22', '2015-04-18 00:00:00', '2015-04-20 00:00:00', '2', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '16', null, 'iqbal@cifo.co.id', '123', '20GlbWrPdSm5w', null, null, 'Muhamad Iqbal', 'Laki-Laki', 'Jl. Bagus Bingit', '107', '0896029223946', '0000-00-00', null, null, null, null, null, '828000', '6443', '0', '2015-04-18 08:57:24', null, null, '828000', '0', '1', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('91', '20150418RSVCM0038', 'beKoxIJ8QY72Q', '22', '2015-04-18 00:00:00', '2015-04-19 00:00:00', '2', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '16', null, 'nengrestu@yahoo.co.id', 'sahabat', '91WvKdqf5WYMM', null, null, 'restu', 'Perempuan', 'cililin', '107', '089615471211', '0000-00-00', null, null, null, null, null, '360000', '2447', '0', '2015-04-18 09:26:13', null, null, '360000', '0', '1', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('92', '20150418RSVCM0039', '46Hu9mlRqI4oo', '22', '2015-04-18 00:00:00', '2015-04-19 00:00:00', '2', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '16', null, 'nengrestuu@gmail.com', 'sahabatku', '47KShLiemfLIY', null, null, 'moca', 'Perempuan', 'cililin', '107', '089615471211', '0000-00-00', null, null, null, null, null, '360000', '9315', '0', '2015-04-18 09:30:46', null, null, '360000', '0', '1', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('93', '20150418RSVCM0040', '01aRWbFK1l7MM', '22', '2015-04-18 00:00:00', '2015-04-19 00:00:00', '2', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '16', null, 'nengrestu@yahoo.co.id', 'sahabat', '91WvKdqf5WYMM', null, null, 'moca', 'Perempuan', 'cililin', '107', '097865', '0000-00-00', null, null, null, null, null, '360000', '8993', '0', '2015-04-18 09:39:49', null, null, '360000', '0', '1', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('94', '20150418RSVCM0041', '916ZX8DaD4WLk', '22', '2015-04-18 00:00:00', '2015-04-19 00:00:00', '2', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '16', null, 'nengrestu@yahoo.co.id', 'sahabat', '91WvKdqf5WYMM', null, null, 'restu', 'Perempuan', 'cililin', '107', '089615471211', '0000-00-00', null, null, null, null, null, '360000', '0283', '0', '2015-04-18 09:46:33', null, null, '360000', '360000', '1', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('95', '20150418RSVCM0042', '9aAeHAR1YlORE', '37', '2015-04-18 00:00:00', '2015-04-19 00:00:00', '2', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '47', null, 'meydzie@yahoo.com', 'eliani08', 'a70jdbq9UAWSA', null, null, 'Veana', 'Perempuan', 'Sarjad', '107', '085759017773', '0000-00-00', null, null, null, null, null, '500000', '6972', '1', '2015-04-18 09:50:26', 'Confirmation-ID-20150418RSVCM0042-K1N6S.pdf', null, '500000', '500000', '0', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('96', '20150418RSVCM0043', 'f9bjevpHaBEPA', '22', '2015-04-18 00:00:00', '2015-04-19 00:00:00', '2', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '16', null, 'nengrestu@yahoo.co.id', 'sahabat', '91WvKdqf5WYMM', null, null, 'restu', 'Perempuan', 'vl', '107', '987654', '0000-00-00', null, null, null, null, null, '360000', '5897', '1', '2015-04-18 10:09:54', 'Confirmation-ID-20150418RSVCM0043-4G9NJ.pdf', null, '360000', '360000', '0', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('99', '20150418RSVCM0046', 'b2lmCSnniJYh2', '37', '2015-04-18 00:00:00', '2015-04-19 00:00:00', '2', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '48', null, 'meydzie@yahoo.com', 'eliani08', 'a70jdbq9UAWSA', null, null, 'Veana', 'Perempuan', 'Sarjad', '107', '085759017773', '0000-00-00', null, null, null, null, null, '600000', '6895', '0', '2015-04-18 10:49:18', null, null, '600000', '600000', '1', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('100', '20150418RSVCM0047', '6f8L8viwDW4Qw', '37', '2015-04-18 00:00:00', '2015-04-19 00:00:00', '2', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '48', null, 'meydzie@yahoo.com', 'eliani08', 'a70jdbq9UAWSA', null, null, 'Veana', 'Perempuan', 'Sarjad', '107', '085759017773', '0000-00-00', null, null, null, null, null, '600000', '0013', '0', '2015-04-18 10:51:00', null, null, '600000', '600000', '1', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('101', null, null, '37', '2015-04-18 00:00:00', '2015-04-19 00:00:00', null, null, '2', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', null, '49', null, null, null, null, null, null, null, null, null, null, null, '0000-00-00', null, null, null, null, null, null, null, '0', null, null, null, null, '950000', '0', '1', '39', '15', null, '1', '920000.00', '0', '2015-04-18 11:05:35', '0', '1');
INSERT INTO `guest_book` VALUES ('110', '20150418RSVCM0049', '60CmcQA.DTxNs', '37', '2015-04-18 00:00:00', '2015-04-19 00:00:00', '2', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '47', null, 'yudi.hermayadi@gmail.com', 'eliani08', 'a70jdbq9UAWSA', null, null, 'yudi hermayadi', 'Laki-Laki', 'Jl.Bagusrangin no 8', '107', '02292927773', '0000-00-00', null, null, null, null, null, '500000', '6560', '0', '2015-04-18 12:12:54', null, null, '500000', '500000', '1', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('111', '20150418RSVCM0050', '9akhk/hG39guI', '22', '2015-04-18 00:00:00', '2015-04-19 00:00:00', '2', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '17', null, 'nengrestu@yahoo.co.id', 'sahabat', '91WvKdqf5WYMM', null, null, 'restu', 'Perempuan', 'cililin', '107', '089615471211', '0000-00-00', null, null, null, null, null, '360000', '9726', '0', '2015-04-18 12:20:51', null, null, '360000', '360000', '1', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('113', '20150418RSVCM0052', 'ceQzoIm8Zjq76', '37', '2015-04-18 00:00:00', '2015-04-19 00:00:00', '2', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '47', null, 'yudi@cmedia.co.id', 'eliani08', 'a70jdbq9UAWSA', null, null, 'Yudi Hermayadi S', 'Laki-Laki', 'Bandung', '107', '085759017773', '0000-00-00', null, null, null, null, null, '500000', '4720', '0', '2015-04-18 12:33:30', null, null, '500000', '500000', '1', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('114', '20150418RSVCM0053', '29DwffD.d7Cng', '37', '2015-04-18 00:00:00', '2015-04-21 00:00:00', '2', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '47', null, 'arbi@cmedia.co.id', 'bandung', '93ZyMwy382pkg', null, null, 'arbi', 'Laki-Laki', 'bandung', '107', '08814019493', '0000-00-00', null, null, null, null, null, '1500000', '8279', '0', '2015-04-18 12:44:34', null, null, '1500000', '500000', '1', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('115', '20150418RSVCM0054', '8fvD4Sze/Ua0o', '22', '2015-04-18 00:00:00', '2015-04-19 00:00:00', '2', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '17', null, 'nengrestu@yahoo.co.id', 'sahabat', '91WvKdqf5WYMM', null, null, 'restu', 'Perempuan', 'cililin', '107', '089615471211', '0000-00-00', null, null, null, null, null, '360000', '7102', '0', '2015-04-18 12:48:39', null, null, '360000', '0', '1', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('121', '20150418RSVCM0060', 'd7V.zXOsrcK8w', '37', '2015-04-18 00:00:00', '2015-04-19 00:00:00', '2', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '47', null, 'yudi.hermayadi@gmail.com', 'eliani08', 'a70jdbq9UAWSA', null, null, 'yudi hermayadi', 'Laki-Laki', 'Jl.Bagusrangin no 8', '107', '02292927773', '0000-00-00', null, null, null, null, null, '500000', '2251', '1', '2015-04-18 13:19:36', 'Confirmation-ID-20150418RSVCM0060-CF3WU.pdf', null, '500000', '500000', '0', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('122', '20150418RSVCM0061', '8cD4SSuZebRCs', '37', '2015-04-18 00:00:00', '2015-04-21 00:00:00', '2', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '48', null, 'abeyx7@gmail.com', 'mardiailman', '74JzpDNNXxYBQ', null, null, 'Arbi', 'Laki-Laki', 'Bandung', '107', '08814019493', '0000-00-00', null, null, null, null, null, '1800000', '6871', '0', '2015-04-18 13:38:52', null, null, '1800000', '600000', '1', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('123', '20150418RSVCM0062', 'f5XrhGwSaIsUo', '37', '2015-04-18 00:00:00', '2015-04-21 00:00:00', '2', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '48', null, 'abeyx7@gmail.com', 'mardiailman', '74JzpDNNXxYBQ', null, null, 'Arbi', 'Laki-Laki', 'Bandung', '107', '08814019493', '0000-00-00', null, null, null, null, null, '1800000', '9419', '0', '2015-04-18 13:42:33', null, null, '1800000', '600000', '1', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('124', '20150418RSVCM0058', 'e1ggFmWNlv7Ps', '37', '2015-04-18 00:00:00', '2015-04-19 00:00:00', '2', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '48', null, 'abeyx7@gmail.com', 'mardiailman', '74JzpDNNXxYBQ', null, null, 'Arbi', 'Laki-Laki', 'Bandung', '107', '08814019493', '0000-00-00', null, null, null, null, null, '600000', '8832', '0', '2015-04-18 13:46:09', null, null, '600000', '600000', '1', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('125', '20150418RSVCM0059', 'afBvzCt.k99kY', '37', '2015-04-18 00:00:00', '2015-04-19 00:00:00', '2', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '47', null, 'yudi.hermayadi@gmail.com', 'eliani08', 'a70jdbq9UAWSA', null, null, 'yudi hermayadi', 'Laki-Laki', 'Jl.Bagusrangin no 8', '107', '02292927773', '0000-00-00', null, null, null, null, null, '500000', '2624', '1', '2015-04-18 13:55:22', 'Confirmation-ID-20150418RSVCM0059-RF1MG.pdf', null, '500000', '500000', '0', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('128', '20150418RSVCM0056', '5dxxYYgkAGu5o', '22', '2015-04-18 00:00:00', '2015-04-19 00:00:00', '2', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '17', null, 'nengrestuu@gmail.com', 'sahabatku', '47KShLiemfLIY', null, null, 'moca', 'Perempuan', 'cililin', '107', '089615471211', '0000-00-00', null, null, null, null, null, '360000', '3655', '1', '2015-04-18 15:58:07', 'Confirmation-ID-20150418RSVCM0056-SODVI.pdf', null, '360000', '360000', '0', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('129', '20150418RSVCM0057', '01.sfTRznpqhQ', '37', '2015-04-20 00:00:00', '2015-04-21 00:00:00', '2', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '48', null, 'yudi.hermayadi@gmail.com', 'eliani08', 'a70jdbq9UAWSA', null, null, 'yudi hermayadi', 'Laki-Laki', 'Jl.Bagusrangin no 8', '107', '02292927773', '0000-00-00', null, null, null, null, null, '600000', '1401', '1', '2015-04-18 19:08:25', 'Confirmation-ID-20150418RSVCM0057-J8V6E.pdf', null, '600000', '600000', '0', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('130', null, null, '37', '2015-04-19 00:00:00', '2015-04-21 00:00:00', null, null, '2', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', null, '47', null, null, null, null, null, null, null, null, null, null, null, '0000-00-00', null, null, null, null, null, null, null, '0', null, null, null, null, '500000', '0', '1', '38', '9', null, '1', '990000.00', '0', '2015-04-18 19:26:36', '0', '1');
INSERT INTO `guest_book` VALUES ('133', '20150420RSVCM0058', 'b3wbOB862Qv0.', '22', '2015-04-20 00:00:00', '2015-04-21 00:00:00', '2', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '2', '16', null, 'iqbal@cifo.co.id', '123', '20GlbWrPdSm5w', null, null, 'Muhamad Iqbal', 'Laki-Laki', 'Jl. Bagus Bingit', '107', '0896029223946', '0000-00-00', null, null, null, null, null, '720000', '6840', '0', '2015-04-20 09:39:52', null, null, '720000', '360000', '1', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('135', null, null, '22', '2015-04-20 00:00:00', '2015-04-21 00:00:00', null, null, '1', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', null, '16', null, null, null, null, null, null, null, null, null, null, null, '0000-00-00', null, null, null, null, null, null, null, '0', null, null, null, null, '360000', '0', '1', '40', '10', null, '1', '340000.00', '0', '2015-04-20 09:57:37', '0', '1');
INSERT INTO `guest_book` VALUES ('136', null, null, '22', '2015-04-20 00:00:00', '2015-04-21 00:00:00', null, null, '1', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', null, '17', null, null, null, null, null, null, null, null, null, null, null, '0000-00-00', null, null, null, null, null, null, null, '0', null, null, null, null, '360000', '0', '1', '41', '16', null, '1', '320000.00', '0', '2015-04-20 11:01:34', '0', '1');
INSERT INTO `guest_book` VALUES ('138', null, null, '22', '2015-04-20 00:00:00', '2015-04-21 00:00:00', null, null, '1', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', null, '16', null, null, null, null, null, null, null, null, null, null, null, '0000-00-00', null, null, null, null, null, null, null, '0', null, null, null, null, '360000', '0', '1', '42', '10', null, '1', '340000.00', '0', '2015-04-20 11:35:32', '0', '1');
INSERT INTO `guest_book` VALUES ('139', null, null, '37', '2015-04-20 00:00:00', '2015-04-21 00:00:00', null, null, '2', '2', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', null, '48', null, null, null, null, null, null, null, null, null, null, null, '0000-00-00', null, null, null, null, null, null, null, '0', null, null, null, null, '600000', '0', '1', '43', '16', null, '1', '560000.00', '0', '2015-04-20 12:00:37', '0', '1');
INSERT INTO `guest_book` VALUES ('140', null, null, '22', '2015-04-20 00:00:00', '2015-04-21 00:00:00', null, null, '1', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', null, '16', null, null, null, null, null, null, null, null, null, null, null, '0000-00-00', null, null, null, null, null, null, null, '0', null, null, null, null, '360000', '0', '1', '44', '10', null, '1', '340000.00', '0', '2015-04-20 16:22:11', '0', '1');
INSERT INTO `guest_book` VALUES ('141', '20150420RSVCM0059', 'bbRFdjYO5Wu8Q', '22', '2015-04-20 00:00:00', '2015-04-21 00:00:00', '2', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '16', null, 'nengrestuu@gmail.com', 'sahabat', '91WvKdqf5WYMM', null, null, 'restu', 'Perempuan', 'cililin', '107', '089615471211', '0000-00-00', null, null, null, null, null, '360000', '1807', '1', '2015-04-20 16:49:06', 'Confirmation-ID-20150420RSVCM0059-859JN.pdf', null, '360000', '360000', '0', '1', null, null, null, '0', '0.00', '0', null, '0', '1');
INSERT INTO `guest_book` VALUES ('142', '20150421RSVCM0060', '0008Gt.lm8OIU', '35', '2015-04-21 00:00:00', '2015-04-23 00:00:00', '2', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '37', null, 'iqbal@cifo.co.id', '123', '20GlbWrPdSm5w', null, null, 'Muhamad Iqbal', 'Laki-Laki', 'Jl. Bagus Bingit', '107', '0896029223946', '0000-00-00', null, null, null, null, null, '1600000', '5541', '0', '2015-04-21 09:04:56', null, null, '1600000', '800000', '1', '1', null, null, null, '0', '0.00', '0', null, '0', '0');
INSERT INTO `guest_book` VALUES ('143', '20150421RSVCM0061', '5dFJTSQ/Lbyus', '35', '2015-04-21 00:00:00', '2015-04-23 00:00:00', '2', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '37', null, 'iqbal@cifo.co.id', '123', '20GlbWrPdSm5w', null, null, 'Muhamad Iqbal', 'Laki-Laki', 'Jl. Bagus Bingit', '107', '0896029223946', '0000-00-00', null, null, null, null, null, '1600000', '6701', '0', '2015-04-21 09:27:00', null, null, '1600000', '800000', '1', '1', null, null, null, '0', '0.00', '0', null, '0', '0');
INSERT INTO `guest_book` VALUES ('144', '20150421RSVCM0062', '0dqauJeIPS17U', '35', '2015-04-21 00:00:00', '2015-04-23 00:00:00', '2', null, '0', '0', null, null, null, null, null, '0', null, null, '0', '0', null, null, null, null, null, null, '25437857', '1', '41', null, 'iqbal@cmedia.co.id', '123', '20GlbWrPdSm5w', null, null, 'Muhamad Iqbal', 'Laki-Laki', 'Jl. Bagus Bingit', '107', '0896029223946', '0000-00-00', null, null, null, null, null, '3900000', '7935', '0', '2015-04-21 09:32:27', null, null, '3900000', '1950000', '1', '1', null, null, null, '0', '0.00', '0', null, '0', '0');

-- ----------------------------
-- Table structure for `guest_book_detail`
-- ----------------------------
DROP TABLE IF EXISTS `guest_book_detail`;
CREATE TABLE `guest_book_detail` (
  `book_detail_id` int(20) NOT NULL AUTO_INCREMENT,
  `book_id` int(20) DEFAULT NULL,
  `bank_tujuan` varchar(50) DEFAULT NULL,
  `asal_bank` varchar(50) DEFAULT NULL,
  `atas_nama` varchar(90) DEFAULT NULL,
  `tgl_transfer` date DEFAULT NULL,
  `jml_transfer` decimal(10,0) DEFAULT NULL,
  `upload` varchar(90) DEFAULT NULL,
  `status_baca` enum('0','1') NOT NULL,
  `date_input` datetime DEFAULT NULL,
  PRIMARY KEY (`book_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of guest_book_detail
-- ----------------------------
INSERT INTO `guest_book_detail` VALUES ('1', '17', 'BCA', 'bca', 'evi', '2015-02-28', '656000', '', '1', '2015-02-28 00:00:00');
INSERT INTO `guest_book_detail` VALUES ('2', '18', 'BCA', 'mandiri', 'evi', '2015-02-28', '656000', '', '1', '2015-02-28 00:00:00');
INSERT INTO `guest_book_detail` VALUES ('3', '20', 'BCA', 'mandiri', 'vi', '2015-02-28', '830000', '', '1', '2015-02-28 00:00:00');
INSERT INTO `guest_book_detail` VALUES ('4', '22', 'BCA', 'BCA', 'Venita J', '2015-03-03', '328000', 'ice shake ori.jpg', '1', '2015-03-03 00:00:00');
INSERT INTO `guest_book_detail` VALUES ('5', '23', 'BCA', 'BCA', 'Venita J', '2015-03-04', '328000', 'tumblr_m8igwhe7n71rpe3c3o1_400.jpg', '1', '2015-03-04 00:00:00');
INSERT INTO `guest_book_detail` VALUES ('6', '25', 'BCA', 'BCA', 'Venita J', '2015-03-05', '365000', 'avatar2815241_1.gif', '1', '2015-03-05 00:00:00');
INSERT INTO `guest_book_detail` VALUES ('7', '30', 'BCA', 'BCA', 'Venita J', '2015-03-09', '357000', 'avatar2815241_1.gif', '1', '2015-03-09 00:00:00');
INSERT INTO `guest_book_detail` VALUES ('8', '36', 'BCA', 'BCA', 'Yudi HS', '2015-03-09', '328000', 'its-monday-dont-forget-to-be-awesome-quote-1.jpg', '1', '2015-03-09 00:00:00');
INSERT INTO `guest_book_detail` VALUES ('9', '37', 'BCA', 'BCA', 'Yudi HS', '2015-03-12', '357000', '', '1', '2015-03-12 00:00:00');
INSERT INTO `guest_book_detail` VALUES ('10', '38', 'BCA', 'BCA', 'Venita J', '2015-03-12', '357000', '', '1', '2015-03-12 00:00:00');
INSERT INTO `guest_book_detail` VALUES ('11', '46', 'BCA', 'BCA', 'Venita J', '2015-03-18', '790000', '', '0', '2015-03-18 00:00:00');
INSERT INTO `guest_book_detail` VALUES ('12', '48', 'MAN', 'mandiri', 'syamsurizal', '2015-03-20', '380000', 'IMG_20150320_073213.jpg', '0', '2015-03-20 00:00:00');
INSERT INTO `guest_book_detail` VALUES ('13', '49', 'BCA', 'mandiri', 'muhamad iqbal', '2015-03-20', '230000', 'banner_right.png', '0', '2015-03-20 00:00:00');
INSERT INTO `guest_book_detail` VALUES ('14', '56', 'MAN', 'mandiri', 'sony setiadi', '2015-03-24', '410550', '', '0', '2015-03-24 00:00:00');
INSERT INTO `guest_book_detail` VALUES ('15', '59', 'BCA', 'bca', 'sony', '2015-03-25', '546250', '', '0', '2015-03-25 00:00:00');
INSERT INTO `guest_book_detail` VALUES ('16', '60', 'BCA', 'Mandiri', 'muhamad iqbal', '2015-04-02', '460000', '', '0', '2015-04-02 00:00:00');
INSERT INTO `guest_book_detail` VALUES ('17', '63', 'BCA', 'BCA', 'Yudi HS', '2015-04-06', '402500', '', '0', '2015-04-06 00:00:00');
INSERT INTO `guest_book_detail` VALUES ('18', '64', 'BCA', 'Mandiri', 'Muhamad Iqbal', '2015-04-06', '402500', 'iqbal.jpg', '0', '2015-04-06 00:00:00');
INSERT INTO `guest_book_detail` VALUES ('19', '65', 'BCA', 'BCA', 'Yudi HS', '2015-04-06', '805000', '', '0', '2015-04-06 00:00:00');
INSERT INTO `guest_book_detail` VALUES ('20', '66', 'BCA', 'Mandiri', 'Muhamad Iqbal', '2015-04-06', '402500', 'Bank_Icon.png', '0', '2015-04-06 00:00:00');
INSERT INTO `guest_book_detail` VALUES ('21', '83', 'BCA', 'BCA', 'Yudi HS', '2015-04-15', '350000', '', '0', '2015-04-15 11:33:17');
INSERT INTO `guest_book_detail` VALUES ('22', '85', 'BCA', 'BCA', 'Yudi HS', '2015-04-15', '350000', '', '0', '2015-04-15 14:29:21');
INSERT INTO `guest_book_detail` VALUES ('23', '87', 'BCA', 'bca', 'veana', '2015-04-17', '300000', '', '0', '2015-04-17 15:52:16');
INSERT INTO `guest_book_detail` VALUES ('24', '88', 'BCA', 'bca', 'veana', '2015-04-17', '500000', '', '0', '2015-04-17 16:33:08');
INSERT INTO `guest_book_detail` VALUES ('25', '95', 'BCA', 'bca', 'veana', '2015-04-18', '500000', '', '0', '2015-04-18 09:57:34');
INSERT INTO `guest_book_detail` VALUES ('29', '121', 'BCA', 'bca', 'yudi', '2015-04-18', '500000', 'power-black-wallpaper2.jpg', '0', '2015-04-18 13:21:42');
INSERT INTO `guest_book_detail` VALUES ('30', '125', 'BCA', 'bca', 'yudi', '2015-04-18', '500000', 'power-black-wallpaper2.jpg', '0', '2015-04-18 13:58:28');
INSERT INTO `guest_book_detail` VALUES ('32', '128', 'BCA', 'mandiri', 'moca', '2015-04-18', '360000', '', '0', '2015-04-18 15:58:56');
INSERT INTO `guest_book_detail` VALUES ('33', '129', 'BCA', 'bca', 'yudi', '2015-04-18', '600000', '', '0', '2015-04-18 19:12:38');
INSERT INTO `guest_book_detail` VALUES ('34', '141', 'BCA', 'mandiri', 'restu', '2015-04-20', '360000', '', '0', '2015-04-20 16:50:44');

-- ----------------------------
-- Table structure for `guest_book_wisata_detail`
-- ----------------------------
DROP TABLE IF EXISTS `guest_book_wisata_detail`;
CREATE TABLE `guest_book_wisata_detail` (
  `guest_book_wisata_detail_id` int(20) NOT NULL AUTO_INCREMENT,
  `guest_book_wisata_detail_kode` int(20) DEFAULT NULL,
  `tiket_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`guest_book_wisata_detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of guest_book_wisata_detail
-- ----------------------------

-- ----------------------------
-- Table structure for `hotel_deposit`
-- ----------------------------
DROP TABLE IF EXISTS `hotel_deposit`;
CREATE TABLE `hotel_deposit` (
  `id_dep_hotel` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_dep_hotel` datetime NOT NULL,
  `room_id` int(11) NOT NULL,
  `jumlah_dep_hotel` int(11) NOT NULL,
  `kar_id` int(11) NOT NULL,
  `flag_dep_hotel` enum('0','1') NOT NULL,
  `insert_log` datetime NOT NULL,
  `user_id_insert` int(11) NOT NULL,
  `edit_log` datetime NOT NULL,
  `user_id_edit` int(11) NOT NULL,
  PRIMARY KEY (`id_dep_hotel`)
) ENGINE=MyISAM AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of hotel_deposit
-- ----------------------------
INSERT INTO `hotel_deposit` VALUES ('15', '2015-04-06 10:01:45', '18', '2', '22', '1', '2015-04-06 09:01:45', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('14', '2015-04-04 13:03:23', '18', '1', '22', '1', '2015-04-04 12:03:23', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('5', '2015-03-31 12:35:41', '18', '3', '22', '0', '2015-03-31 11:35:41', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('13', '2015-04-04 13:03:10', '16', '1', '22', '0', '2015-04-04 12:03:10', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('16', '2015-04-06 10:08:39', '17', '1', '22', '0', '2015-04-06 09:08:39', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('52', '2015-04-10 09:42:56', '16', '2', '22', '0', '2015-04-10 09:42:56', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('18', '2015-04-06 10:40:22', '19', '1', '23', '1', '2015-04-06 09:40:22', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('19', '2015-04-06 10:41:23', '21', '6', '24', '1', '2015-04-06 09:41:23', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('20', '2015-04-06 10:41:29', '22', '1', '24', '1', '2015-04-06 09:41:29', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('21', '2015-04-06 10:42:50', '27', '1', '25', '1', '2015-04-06 09:42:50', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('22', '2015-04-06 10:42:56', '23', '6', '25', '1', '2015-04-06 09:42:56', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('23', '2015-04-06 10:43:03', '24', '6', '25', '1', '2015-04-06 09:43:03', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('24', '2015-04-06 10:43:10', '25', '4', '25', '1', '2015-04-06 09:43:10', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('25', '2015-04-06 10:43:17', '28', '1', '25', '1', '2015-04-06 09:43:17', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('26', '2015-04-06 10:43:22', '26', '2', '25', '1', '2015-04-06 09:43:22', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('27', '2015-04-06 10:43:39', '30', '4', '26', '1', '2015-04-06 09:43:39', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('28', '2015-04-06 10:43:48', '31', '2', '26', '1', '2015-04-06 09:43:48', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('29', '2015-04-06 10:43:53', '29', '6', '26', '1', '2015-04-06 09:43:53', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('30', '2015-04-06 10:44:31', '35', '1', '27', '1', '2015-04-06 09:44:31', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('31', '2015-04-06 10:44:36', '34', '3', '27', '1', '2015-04-06 09:44:36', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('32', '2015-04-06 10:44:49', '32', '6', '27', '1', '2015-04-06 09:44:49', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('33', '2015-04-06 10:44:55', '33', '4', '27', '1', '2015-04-06 09:44:55', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('34', '2015-04-06 10:45:13', '36', '8', '28', '1', '2015-04-06 09:45:13', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('35', '2015-04-06 10:45:27', '38', '4', '29', '1', '2015-04-06 09:45:27', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('36', '2015-04-06 10:45:33', '40', '2', '29', '1', '2015-04-06 09:45:33', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('37', '2015-04-06 10:45:38', '41', '2', '29', '1', '2015-04-06 09:45:38', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('38', '2015-04-06 10:45:44', '39', '4', '29', '1', '2015-04-06 09:45:44', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('39', '2015-04-06 10:45:49', '37', '6', '29', '1', '2015-04-06 09:45:49', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('40', '2015-04-06 10:46:04', '42', '6', '30', '1', '2015-04-06 09:46:04', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('41', '2015-04-06 10:46:10', '44', '3', '30', '1', '2015-04-06 09:46:10', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('42', '2015-04-06 10:46:14', '43', '5', '30', '1', '2015-04-06 09:46:14', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('55', '2015-04-16 18:20:09', '47', '5', '31', '0', '2015-04-16 18:20:09', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('56', '2015-04-16 18:22:36', '48', '5', '31', '0', '2015-04-16 18:22:36', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('57', '2015-04-16 18:32:35', '49', '2', '31', '0', '2015-04-16 18:32:35', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('58', '2015-04-17 09:38:20', '16', '2', '22', '0', '2015-04-17 09:38:20', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('59', '2015-04-17 09:38:36', '17', '2', '22', '0', '2015-04-17 09:38:36', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('60', '2015-04-18 15:43:42', '47', '6', '31', '0', '2015-04-18 15:43:42', '31', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('61', '2015-04-18 15:43:55', '48', '5', '31', '0', '2015-04-18 15:43:55', '31', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('62', '2015-04-18 19:18:48', '16', '4', '22', '0', '2015-04-18 19:18:48', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('63', '2015-04-18 19:18:55', '17', '2', '22', '0', '2015-04-18 19:18:55', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('64', '2015-04-18 19:19:13', '19', '6', '23', '0', '2015-04-18 19:19:13', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('65', '2015-04-18 19:19:26', '21', '4', '24', '0', '2015-04-18 19:19:26', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('66', '2015-04-18 19:19:33', '22', '3', '24', '0', '2015-04-18 19:19:33', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('67', '2015-04-18 19:19:48', '23', '5', '25', '0', '2015-04-18 19:19:48', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('68', '2015-04-18 19:19:58', '24', '4', '25', '0', '2015-04-18 19:19:58', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('69', '2015-04-18 19:20:05', '25', '5', '25', '0', '2015-04-18 19:20:05', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('70', '2015-04-18 19:20:16', '26', '1', '25', '0', '2015-04-18 19:20:16', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('71', '2015-04-18 19:20:22', '27', '2', '25', '0', '2015-04-18 19:20:22', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('72', '2015-04-18 19:20:28', '28', '1', '25', '0', '2015-04-18 19:20:28', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('73', '2015-04-18 19:20:41', '29', '6', '26', '0', '2015-04-18 19:20:41', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('74', '2015-04-18 19:20:48', '30', '1', '26', '0', '2015-04-18 19:20:48', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('75', '2015-04-18 19:20:53', '31', '1', '26', '0', '2015-04-18 19:20:53', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('76', '2015-04-18 19:21:08', '32', '2', '27', '0', '2015-04-18 19:21:08', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('77', '2015-04-18 19:21:14', '33', '3', '27', '0', '2015-04-18 19:21:14', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('78', '2015-04-18 19:21:20', '34', '1', '27', '0', '2015-04-18 19:21:20', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('79', '2015-04-18 19:21:25', '35', '1', '27', '0', '2015-04-18 19:21:25', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('80', '2015-04-18 19:21:39', '36', '7', '28', '0', '2015-04-18 19:21:39', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('81', '2015-04-18 19:21:53', '37', '4', '29', '0', '2015-04-18 19:21:53', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('82', '2015-04-18 19:22:00', '38', '3', '29', '0', '2015-04-18 19:22:00', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('83', '2015-04-18 19:22:08', '39', '3', '29', '0', '2015-04-18 19:22:08', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('84', '2015-04-18 19:22:16', '41', '1', '29', '0', '2015-04-18 19:22:16', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('85', '2015-04-18 19:22:28', '42', '3', '30', '0', '2015-04-18 19:22:28', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('86', '2015-04-18 19:22:33', '43', '1', '30', '0', '2015-04-18 19:22:33', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `hotel_deposit` VALUES ('87', '2015-04-18 19:22:40', '44', '2', '30', '0', '2015-04-18 19:22:40', '1', '0000-00-00 00:00:00', '0');

-- ----------------------------
-- Table structure for `kalender_harga`
-- ----------------------------
DROP TABLE IF EXISTS `kalender_harga`;
CREATE TABLE `kalender_harga` (
  `id_cal` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL,
  `cal_bulan` int(11) NOT NULL,
  `cal_tahun` char(5) NOT NULL,
  `cal_harga` text NOT NULL,
  PRIMARY KEY (`id_cal`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kalender_harga
-- ----------------------------
INSERT INTO `kalender_harga` VALUES ('21', '16', '1', '2015', '200000,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,');
INSERT INTO `kalender_harga` VALUES ('20', '19', '4', '2015', '470000,470000,470000,470000,470000,470000,470000,470000,470000,470000,470000,470000,470000,470000,470000,470000,470000,470000,470000,470000,470000,470000,470000,470000,470000,470000,470000,470000,470000,470000');
INSERT INTO `kalender_harga` VALUES ('19', '18', '4', '2015', '500000,600000,,,,,,,,,,,,,,,,,,,,,,,,,,,,');
INSERT INTO `kalender_harga` VALUES ('18', '17', '4', '2015', '360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000');
INSERT INTO `kalender_harga` VALUES ('15', '16', '4', '2015', '360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000,360000');
INSERT INTO `kalender_harga` VALUES ('14', '16', '3', '2015', '400000,,,,,,,,,,,,,,,,,,,,,,,,,,,,234000,300000,400000');
INSERT INTO `kalender_harga` VALUES ('22', '21', '4', '2015', '460000,460000,460000,460000,460000,460000,460000,460000,460000,460000,460000,460000,460000,460000,460000,460000,460000,460000,460000,460000,460000,460000,460000,460000,460000,460000,460000,460000,460000,460000');
INSERT INTO `kalender_harga` VALUES ('23', '22', '4', '2015', '520000,520000,520000,520000,520000,520000,520000,520000,520000,520000,520000,520000,520000,520000,520000,520000,520000,520000,520000,520000,520000,520000,520000,520000,520000,520000,520000,520000,520000,520000');
INSERT INTO `kalender_harga` VALUES ('24', '23', '4', '2015', '650000,650000,650000,650000,650000,650000,650000,650000,650000,650000,650000,650000,603668,650000,650000,650000,650000,650000,650000,650000,650000,650000,650000,650000,650000,603668,650000,650000,650000,650000');
INSERT INTO `kalender_harga` VALUES ('25', '24', '4', '2015', '700000,700000,700000,700000,700000,700000,700000,700000,700000,700000,700000,700000,700000,700000,700000,700000,700000,700000,700000,700000,700000,700000,700000,700000,700000,700000,700000,700000,700000,700000');
INSERT INTO `kalender_harga` VALUES ('26', '25', '4', '2015', '800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000');
INSERT INTO `kalender_harga` VALUES ('27', '26', '4', '2015', '1200000,1200000,1200000,1200000,1200000,1200000,1200000,1200000,1200000,1200000,1200000,1200000,1200000,1200000,1200000,1200000,1200000,1200000,1200000,1200000,1200000,1200000,1200000,1200000,1200000,1200000,1200000,1200000,1200000,1200000');
INSERT INTO `kalender_harga` VALUES ('28', '27', '4', '2015', '1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000');
INSERT INTO `kalender_harga` VALUES ('29', '28', '4', '2015', '1600000,1600000,1600000,1600000,1600000,1600000,1600000,1600000,1600000,1600000,1600000,1600000,1600000,1600000,1600000,1600000,1600000,1600000,1600000,1600000,1600000,1600000,1600000,1600000,1600000,1600000,1600000,1600000,1600000,1600000');
INSERT INTO `kalender_harga` VALUES ('30', '29', '4', '2015', '800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000');
INSERT INTO `kalender_harga` VALUES ('31', '30', '4', '2015', '2000000,2000000,2000000,2000000,2000000,2000000,2000000,2000000,2000000,2000000,2000000,2000000,2000000,2000000,2000000,2000000,2000000,2000000,2000000,2000000,2000000,2000000,2000000,2000000,2000000,2000000,2000000,2000000,2000000,2000000');
INSERT INTO `kalender_harga` VALUES ('32', '31', '4', '2015', '3000000,3000000,3000000,3000000,3000000,3000000,3000000,3000000,3000000,3000000,3000000,3000000,3000000,3000000,3000000,3000000,3000000,3000000,3000000,3000000,3000000,3000000,3000000,3000000,3000000,3000000,3000000,3000000,3000000,3000000');
INSERT INTO `kalender_harga` VALUES ('33', '32', '4', '2015', '980000,980000,980000,980000,980000,980000,980000,980000,980000,980000,980000,980000,980000,980000,980000,980000,980000,980000,980000,980000,980000,980000,980000,980000,980000,980000,980000,980000,980000,980000');
INSERT INTO `kalender_harga` VALUES ('34', '33', '4', '2015', '1150000,1150000,1150000,1150000,1150000,1150000,1150000,1150000,1150000,1150000,1150000,1150000,1150000,1150000,1150000,1150000,1150000,1150000,1150000,1150000,1150000,1150000,1150000,1150000,1150000,1150000,1150000,1150000,1150000,1150000');
INSERT INTO `kalender_harga` VALUES ('35', '34', '4', '2015', '1900000,1900000,1900000,1900000,1900000,1900000,1900000,1900000,1900000,1900000,1900000,1900000,1900000,1900000,1900000,1900000,1900000,1900000,1900000,1900000,1900000,1900000,1900000,1900000,1900000,1900000,1900000,1900000,1900000,1900000');
INSERT INTO `kalender_harga` VALUES ('36', '35', '4', '2015', '2425000,2425000,2425000,2425000,2425000,2425000,2425000,2425000,2425000,2425000,2425000,2425000,2425000,2425000,2425000,2425000,2425000,2425000,2425000,2425000,2425000,2425000,2425000,2425000,2425000,2425000,2425000,2425000,2425000,2425000');
INSERT INTO `kalender_harga` VALUES ('37', '36', '4', '2015', '788000,788000,788000,788000,788000,788000,788000,788000,788000,788000,788000,788000,788000,788000,788000,788000,788000,788000,788000,788000,788000,788000,788000,788000,788000,788000,788000,788000,788000,788000');
INSERT INTO `kalender_harga` VALUES ('38', '37', '4', '2015', '800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000,800000');
INSERT INTO `kalender_harga` VALUES ('39', '38', '4', '2015', '925000,925000,925000,925000,925000,925000,925000,925000,925000,925000,925000,925000,925000,925000,925000,925000,925000,925000,925000,925000,925000,925000,925000,925000,925000,925000,925000,925000,925000,925000');
INSERT INTO `kalender_harga` VALUES ('40', '39', '4', '2015', '1050000,1050000,1050000,1050000,1050000,1050000,1050000,1050000,1050000,1050000,1050000,1050000,1050000,1050000,1050000,1050000,1050000,1050000,1050000,1050000,1050000,1050000,1050000,1050000,1050000,1050000,1050000,1050000,1050000,1050000');
INSERT INTO `kalender_harga` VALUES ('41', '40', '4', '2015', '1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000,1300000');
INSERT INTO `kalender_harga` VALUES ('42', '41', '4', '2015', '1950000,1950000,1950000,1950000,1950000,1950000,1950000,1950000,1950000,1950000,1950000,1950000,1950000,1950000,1950000,1950000,1950000,1950000,1950000,1950000,1950000,1950000,1950000,1950000,1950000,1950000,1950000,1950000,1950000,1950000');
INSERT INTO `kalender_harga` VALUES ('43', '42', '4', '2015', '1590000,1590000,1590000,1590000,1590000,1590000,1590000,1590000,1590000,1590000,1590000,1590000,1590000,1590000,1590000,1590000,1590000,1590000,1590000,1590000,1590000,1590000,1590000,1590000,1590000,1590000,1590000,1590000,1590000,1590000');
INSERT INTO `kalender_harga` VALUES ('44', '43', '4', '2015', '1890000,1890000,1890000,1890000,1890000,1890000,1890000,1890000,1890000,1890000,1890000,1890000,1890000,1890000,1890000,1890000,1890000,1890000,1890000,1890000,1890000,1890000,1890000,1890000,1890000,1890000,1890000,1890000,1890000,1890000');
INSERT INTO `kalender_harga` VALUES ('45', '44', '4', '2015', '2390000,2390000,2390000,2390000,2390000,2390000,2390000,2390000,2390000,2390000,2390000,2390000,2390000,2390000,2390000,2390000,2390000,2390000,2390000,2390000,2390000,2390000,2390000,2390000,2390000,2390000,2390000,2390000,2390000,2390000');
INSERT INTO `kalender_harga` VALUES ('46', '45', '4', '2015', ',,,,,,,,,,,,,,,220000,,,,,,,,,,,,,,');
INSERT INTO `kalender_harga` VALUES ('47', '46', '4', '2015', ',,,,,,,,,,,,,,,400000,,,,,,,,,,,,,,');
INSERT INTO `kalender_harga` VALUES ('48', '47', '4', '2015', '500000,500000,500000,500000,500000,500000,500000,500000,500000,500000,500000,500000,500000,500000,500000,500000,500000,500000,500000,500000,500000,500000,500000,500000,500000,500000,500000,500000,500000,500000');
INSERT INTO `kalender_harga` VALUES ('49', '48', '4', '2015', '600000,600000,600000,600000,600000,600000,600000,600000,600000,600000,600000,600000,600000,600000,600000,600000,600000,600000,600000,600000,600000,600000,600000,600000,600000,600000,600000,600000,600000,600000');
INSERT INTO `kalender_harga` VALUES ('50', '49', '4', '2015', '950000,950000,950000,950000,950000,950000,950000,950000,950000,950000,950000,950000,950000,950000,950000,950000,950000,950000,950000,950000,950000,950000,950000,950000,950000,950000,950000,950000,950000,950000');

-- ----------------------------
-- Table structure for `kategori_wisata`
-- ----------------------------
DROP TABLE IF EXISTS `kategori_wisata`;
CREATE TABLE `kategori_wisata` (
  `kategori_wisata_id` int(20) NOT NULL AUTO_INCREMENT,
  `kategori_wisata_nama` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`kategori_wisata_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kategori_wisata
-- ----------------------------
INSERT INTO `kategori_wisata` VALUES ('1', 'Kebun Binatang');
INSERT INTO `kategori_wisata` VALUES ('2', 'Pemandian Air Panas');
INSERT INTO `kategori_wisata` VALUES ('3', 'Kolam Renang');
INSERT INTO `kategori_wisata` VALUES ('4', 'Alam Terbuka');
INSERT INTO `kategori_wisata` VALUES ('5', 'Pantai');
INSERT INTO `kategori_wisata` VALUES ('6', 'Musium');

-- ----------------------------
-- Table structure for `log_history`
-- ----------------------------
DROP TABLE IF EXISTS `log_history`;
CREATE TABLE `log_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `login` datetime NOT NULL,
  `logout` datetime NOT NULL,
  `status` enum('Online','Offline') NOT NULL DEFAULT 'Offline',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=488 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of log_history
-- ----------------------------
INSERT INTO `log_history` VALUES ('1', '1', '2014-10-22 10:12:54', '2014-10-22 10:50:41', 'Offline');
INSERT INTO `log_history` VALUES ('2', '1', '2014-10-22 10:20:55', '2014-10-22 10:54:08', 'Offline');
INSERT INTO `log_history` VALUES ('3', '59', '2014-10-22 10:24:57', '2014-10-22 10:34:40', 'Offline');
INSERT INTO `log_history` VALUES ('4', '59', '2014-10-22 10:29:29', '2014-10-22 10:29:37', 'Offline');
INSERT INTO `log_history` VALUES ('5', '42', '2014-10-22 10:30:18', '2014-10-22 10:46:36', 'Offline');
INSERT INTO `log_history` VALUES ('6', '59', '2014-10-22 10:34:51', '2014-10-22 10:56:02', 'Offline');
INSERT INTO `log_history` VALUES ('7', '78', '2014-10-22 10:50:46', '2014-10-22 10:53:08', 'Offline');
INSERT INTO `log_history` VALUES ('8', '1', '2014-10-22 10:53:12', '2014-10-22 10:57:59', 'Offline');
INSERT INTO `log_history` VALUES ('9', '76', '2014-10-22 10:54:16', '2014-10-22 10:54:16', 'Offline');
INSERT INTO `log_history` VALUES ('10', '59', '2014-10-22 10:56:10', '2014-10-22 10:56:10', 'Offline');
INSERT INTO `log_history` VALUES ('11', '78', '2014-10-22 10:58:05', '2014-10-22 11:04:06', 'Offline');
INSERT INTO `log_history` VALUES ('12', '1', '2014-10-22 11:04:20', '2014-10-22 11:05:05', 'Offline');
INSERT INTO `log_history` VALUES ('13', '69', '2014-10-22 11:05:12', '2014-10-22 11:06:56', 'Offline');
INSERT INTO `log_history` VALUES ('14', '1', '2014-10-22 11:07:02', '2014-10-22 11:14:44', 'Offline');
INSERT INTO `log_history` VALUES ('15', '78', '2014-10-22 11:14:53', '2014-10-22 11:21:18', 'Offline');
INSERT INTO `log_history` VALUES ('16', '1', '2014-10-22 11:21:23', '2014-10-22 13:58:35', 'Offline');
INSERT INTO `log_history` VALUES ('17', '1', '2014-10-22 11:33:44', '2014-10-22 11:33:44', 'Offline');
INSERT INTO `log_history` VALUES ('18', '43', '2014-10-22 12:24:37', '2014-10-22 12:24:37', 'Offline');
INSERT INTO `log_history` VALUES ('19', '1', '2014-10-22 13:19:04', '2014-10-22 14:10:22', 'Offline');
INSERT INTO `log_history` VALUES ('20', '78', '2014-10-22 13:58:40', '2014-10-22 13:59:15', 'Offline');
INSERT INTO `log_history` VALUES ('21', '1', '2014-10-22 13:59:21', '2014-10-22 13:59:21', 'Offline');
INSERT INTO `log_history` VALUES ('22', '69', '2014-10-22 14:04:13', '2014-10-22 14:05:01', 'Offline');
INSERT INTO `log_history` VALUES ('23', '1', '2014-10-22 14:05:05', '2014-10-22 14:05:37', 'Offline');
INSERT INTO `log_history` VALUES ('24', '69', '2014-10-22 14:05:46', '2014-10-22 14:07:35', 'Offline');
INSERT INTO `log_history` VALUES ('25', '1', '2014-10-22 14:17:36', '2014-10-22 14:17:36', 'Offline');
INSERT INTO `log_history` VALUES ('26', '1', '2014-10-22 22:58:54', '2014-10-22 23:14:43', 'Offline');
INSERT INTO `log_history` VALUES ('27', '94', '2014-10-22 23:14:49', '2014-10-22 23:14:58', 'Offline');
INSERT INTO `log_history` VALUES ('28', '1', '2014-10-22 23:15:14', '2014-10-22 23:16:51', 'Offline');
INSERT INTO `log_history` VALUES ('29', '94', '2014-10-22 23:16:57', '2014-10-22 23:18:09', 'Offline');
INSERT INTO `log_history` VALUES ('30', '1', '2014-10-22 23:18:18', '2014-10-22 23:20:24', 'Offline');
INSERT INTO `log_history` VALUES ('31', '94', '2014-10-22 23:20:30', '2014-10-22 23:20:30', 'Offline');
INSERT INTO `log_history` VALUES ('32', '1', '2014-10-26 08:55:07', '2014-10-26 08:55:07', 'Offline');
INSERT INTO `log_history` VALUES ('33', '1', '2014-12-01 09:13:38', '2014-12-01 09:13:38', 'Offline');
INSERT INTO `log_history` VALUES ('34', '1', '2014-12-01 09:13:54', '2014-12-01 09:13:54', 'Offline');
INSERT INTO `log_history` VALUES ('35', '1', '2014-12-01 09:30:43', '2014-12-01 12:23:36', 'Offline');
INSERT INTO `log_history` VALUES ('36', '95', '2014-12-01 12:23:43', '2014-12-01 14:21:59', 'Offline');
INSERT INTO `log_history` VALUES ('37', '1', '2014-12-01 14:22:10', '2014-12-01 14:23:39', 'Offline');
INSERT INTO `log_history` VALUES ('38', '95', '2014-12-01 14:24:42', '2014-12-02 14:18:50', 'Offline');
INSERT INTO `log_history` VALUES ('39', '1', '2014-12-02 14:19:02', '2014-12-02 14:19:52', 'Offline');
INSERT INTO `log_history` VALUES ('40', '95', '2014-12-02 14:20:01', '2014-12-02 17:09:41', 'Offline');
INSERT INTO `log_history` VALUES ('41', '1', '2014-12-02 17:09:50', '2014-12-02 17:10:52', 'Offline');
INSERT INTO `log_history` VALUES ('42', '95', '2014-12-02 17:10:59', '2014-12-02 17:10:59', 'Offline');
INSERT INTO `log_history` VALUES ('43', '95', '2014-12-02 17:12:02', '2014-12-03 15:09:10', 'Offline');
INSERT INTO `log_history` VALUES ('44', '1', '2014-12-03 15:09:17', '2014-12-03 15:23:26', 'Offline');
INSERT INTO `log_history` VALUES ('45', '95', '2014-12-03 15:23:32', '2014-12-03 15:23:55', 'Offline');
INSERT INTO `log_history` VALUES ('46', '1', '2014-12-03 15:24:02', '2014-12-03 15:25:06', 'Offline');
INSERT INTO `log_history` VALUES ('47', '95', '2014-12-03 15:25:12', '2014-12-03 15:25:12', 'Offline');
INSERT INTO `log_history` VALUES ('48', '95', '2014-12-04 08:13:27', '2014-12-04 08:13:27', 'Offline');
INSERT INTO `log_history` VALUES ('49', '95', '2014-12-05 08:25:13', '2014-12-05 08:25:13', 'Offline');
INSERT INTO `log_history` VALUES ('50', '95', '2014-12-06 08:41:10', '2014-12-06 10:46:21', 'Offline');
INSERT INTO `log_history` VALUES ('51', '1', '2014-12-06 10:46:32', '2014-12-06 10:47:31', 'Offline');
INSERT INTO `log_history` VALUES ('52', '95', '2014-12-06 10:47:41', '2014-12-06 10:47:41', 'Offline');
INSERT INTO `log_history` VALUES ('53', '95', '2014-12-08 08:16:11', '2014-12-08 09:18:00', 'Offline');
INSERT INTO `log_history` VALUES ('54', '1', '2014-12-08 09:18:10', '2014-12-08 09:18:58', 'Offline');
INSERT INTO `log_history` VALUES ('55', '95', '2014-12-08 09:19:02', '2014-12-08 14:39:10', 'Offline');
INSERT INTO `log_history` VALUES ('56', '95', '2014-12-08 14:39:18', '2014-12-08 14:39:18', 'Offline');
INSERT INTO `log_history` VALUES ('57', '95', '2014-12-08 14:41:05', '2014-12-09 13:33:41', 'Offline');
INSERT INTO `log_history` VALUES ('58', '1', '2014-12-09 13:33:54', '2014-12-09 13:35:49', 'Offline');
INSERT INTO `log_history` VALUES ('59', '95', '2014-12-09 13:36:04', '2014-12-09 13:36:04', 'Offline');
INSERT INTO `log_history` VALUES ('60', '95', '2014-12-10 07:43:54', '2014-12-10 07:43:54', 'Offline');
INSERT INTO `log_history` VALUES ('61', '95', '2014-12-10 08:08:11', '2014-12-10 08:14:46', 'Offline');
INSERT INTO `log_history` VALUES ('62', '1', '2014-12-10 08:15:05', '2014-12-10 08:16:11', 'Offline');
INSERT INTO `log_history` VALUES ('63', '95', '2014-12-10 08:16:18', '2014-12-11 11:00:03', 'Offline');
INSERT INTO `log_history` VALUES ('64', '1', '2014-12-11 11:00:12', '2014-12-11 11:02:59', 'Offline');
INSERT INTO `log_history` VALUES ('65', '95', '2014-12-11 11:03:06', '2014-12-11 11:03:06', 'Offline');
INSERT INTO `log_history` VALUES ('66', '95', '2014-12-11 14:01:58', '2014-12-11 14:01:58', 'Offline');
INSERT INTO `log_history` VALUES ('67', '95', '2014-12-12 08:19:12', '2014-12-12 08:19:12', 'Offline');
INSERT INTO `log_history` VALUES ('68', '1', '2014-12-22 08:26:29', '2014-12-22 08:27:02', 'Offline');
INSERT INTO `log_history` VALUES ('69', '95', '2014-12-22 08:27:09', '2014-12-22 08:27:09', 'Offline');
INSERT INTO `log_history` VALUES ('70', '1', '2015-01-08 14:00:28', '2015-01-08 14:00:50', 'Offline');
INSERT INTO `log_history` VALUES ('71', '95', '2015-01-08 14:00:56', '2015-01-08 14:00:56', 'Offline');
INSERT INTO `log_history` VALUES ('72', '1', '2015-01-19 15:58:46', '2015-01-19 15:59:09', 'Offline');
INSERT INTO `log_history` VALUES ('73', '95', '2015-01-19 15:59:15', '2015-01-19 15:59:15', 'Offline');
INSERT INTO `log_history` VALUES ('74', '1', '2015-01-20 08:25:16', '2015-01-20 08:25:29', 'Offline');
INSERT INTO `log_history` VALUES ('75', '95', '2015-01-20 08:25:35', '2015-01-20 08:25:35', 'Offline');
INSERT INTO `log_history` VALUES ('76', '95', '2015-01-20 11:48:34', '2015-01-20 11:48:34', 'Offline');
INSERT INTO `log_history` VALUES ('77', '1', '2015-01-22 14:04:08', '2015-01-22 14:07:27', 'Offline');
INSERT INTO `log_history` VALUES ('78', '95', '2015-01-22 14:07:33', '2015-01-22 14:11:30', 'Offline');
INSERT INTO `log_history` VALUES ('79', '1', '2015-01-22 14:11:40', '2015-01-22 16:26:51', 'Offline');
INSERT INTO `log_history` VALUES ('80', '95', '2015-01-22 16:27:07', '2015-01-22 16:27:07', 'Offline');
INSERT INTO `log_history` VALUES ('81', '95', '2015-01-23 13:22:14', '2015-01-23 13:22:14', 'Offline');
INSERT INTO `log_history` VALUES ('82', '1', '2015-01-26 13:56:20', '2015-01-26 13:56:20', 'Offline');
INSERT INTO `log_history` VALUES ('83', '1', '2015-01-26 14:30:00', '2015-01-26 14:30:00', 'Offline');
INSERT INTO `log_history` VALUES ('84', '1', '2015-01-26 15:15:35', '2015-01-26 15:15:35', 'Offline');
INSERT INTO `log_history` VALUES ('85', '1', '2015-01-26 15:27:04', '2015-01-26 15:27:04', 'Offline');
INSERT INTO `log_history` VALUES ('86', '1', '2015-01-26 15:34:02', '2015-01-26 15:34:02', 'Offline');
INSERT INTO `log_history` VALUES ('87', '1', '2015-01-26 17:27:08', '2015-01-26 17:27:08', 'Offline');
INSERT INTO `log_history` VALUES ('88', '1', '2015-01-27 08:39:56', '2015-01-27 08:39:56', 'Offline');
INSERT INTO `log_history` VALUES ('89', '1', '2015-01-27 08:55:17', '2015-01-27 08:55:17', 'Offline');
INSERT INTO `log_history` VALUES ('90', '1', '2015-01-27 09:00:21', '2015-01-27 09:00:21', 'Offline');
INSERT INTO `log_history` VALUES ('91', '1', '2015-01-27 10:12:49', '2015-01-27 10:15:27', 'Offline');
INSERT INTO `log_history` VALUES ('92', '1', '2015-01-27 10:15:35', '2015-01-27 10:15:35', 'Offline');
INSERT INTO `log_history` VALUES ('93', '1', '2015-01-27 10:16:29', '2015-01-27 10:16:29', 'Offline');
INSERT INTO `log_history` VALUES ('94', '1', '2015-01-27 10:39:32', '2015-01-27 11:25:17', 'Offline');
INSERT INTO `log_history` VALUES ('95', '1', '2015-01-27 11:25:24', '2015-01-27 11:25:24', 'Offline');
INSERT INTO `log_history` VALUES ('96', '1', '2015-01-27 13:44:22', '2015-01-27 13:55:52', 'Offline');
INSERT INTO `log_history` VALUES ('97', '1', '2015-01-27 13:56:00', '2015-01-27 13:56:00', 'Offline');
INSERT INTO `log_history` VALUES ('98', '1', '2015-01-27 14:28:30', '2015-01-27 14:28:30', 'Offline');
INSERT INTO `log_history` VALUES ('99', '1', '2015-01-27 14:48:59', '2015-01-27 14:48:59', 'Offline');
INSERT INTO `log_history` VALUES ('100', '1', '2015-01-27 16:40:56', '2015-01-27 16:40:56', 'Offline');
INSERT INTO `log_history` VALUES ('101', '1', '2015-01-27 16:44:30', '2015-01-27 16:44:30', 'Offline');
INSERT INTO `log_history` VALUES ('102', '1', '2015-01-27 16:45:03', '2015-01-27 16:45:03', 'Offline');
INSERT INTO `log_history` VALUES ('103', '1', '2015-01-27 16:48:06', '2015-01-27 16:48:06', 'Offline');
INSERT INTO `log_history` VALUES ('104', '1', '2015-01-27 17:58:14', '2015-01-27 17:58:14', 'Offline');
INSERT INTO `log_history` VALUES ('105', '1', '2015-02-05 16:56:30', '2015-02-05 16:56:30', 'Offline');
INSERT INTO `log_history` VALUES ('106', '1', '2015-02-06 08:39:48', '2015-02-06 08:40:23', 'Offline');
INSERT INTO `log_history` VALUES ('107', '95', '2015-02-06 08:40:31', '2015-02-06 08:48:02', 'Offline');
INSERT INTO `log_history` VALUES ('108', '1', '2015-02-06 08:48:17', '2015-02-06 09:45:13', 'Offline');
INSERT INTO `log_history` VALUES ('109', '95', '2015-02-06 09:45:21', '2015-02-06 09:45:21', 'Offline');
INSERT INTO `log_history` VALUES ('110', '1', '2015-02-07 10:06:06', '2015-02-07 10:06:06', 'Offline');
INSERT INTO `log_history` VALUES ('111', '1', '2015-02-08 14:01:10', '2015-02-08 14:02:29', 'Offline');
INSERT INTO `log_history` VALUES ('112', '95', '2015-02-08 14:02:34', '2015-02-08 14:02:34', 'Offline');
INSERT INTO `log_history` VALUES ('113', '95', '2015-02-08 14:20:27', '2015-02-09 09:57:21', 'Offline');
INSERT INTO `log_history` VALUES ('114', '1', '2015-02-09 09:57:31', '2015-02-09 09:57:31', 'Offline');
INSERT INTO `log_history` VALUES ('115', '1', '2015-02-09 11:01:39', '2015-02-09 11:01:39', 'Offline');
INSERT INTO `log_history` VALUES ('116', '95', '2015-02-09 14:06:07', '2015-02-09 14:06:07', 'Offline');
INSERT INTO `log_history` VALUES ('117', '1', '2015-02-09 15:58:54', '2015-02-09 15:59:23', 'Offline');
INSERT INTO `log_history` VALUES ('118', '95', '2015-02-09 15:59:28', '2015-02-09 15:59:28', 'Offline');
INSERT INTO `log_history` VALUES ('119', '1', '2015-02-10 08:38:08', '2015-02-10 08:38:17', 'Offline');
INSERT INTO `log_history` VALUES ('120', '95', '2015-02-10 08:38:22', '2015-02-10 08:38:22', 'Offline');
INSERT INTO `log_history` VALUES ('121', '95', '2015-02-10 11:01:41', '2015-02-10 11:01:41', 'Offline');
INSERT INTO `log_history` VALUES ('122', '95', '2015-02-10 15:02:14', '2015-02-10 15:02:14', 'Offline');
INSERT INTO `log_history` VALUES ('123', '1', '2015-02-10 16:48:53', '2015-02-10 16:49:24', 'Offline');
INSERT INTO `log_history` VALUES ('124', '95', '2015-02-10 16:49:29', '2015-02-10 16:49:29', 'Offline');
INSERT INTO `log_history` VALUES ('125', '95', '2015-02-11 09:06:59', '2015-02-11 09:06:59', 'Offline');
INSERT INTO `log_history` VALUES ('126', '95', '2015-02-11 13:45:11', '2015-02-11 13:45:11', 'Offline');
INSERT INTO `log_history` VALUES ('127', '95', '2015-02-12 09:05:10', '2015-02-12 09:14:16', 'Offline');
INSERT INTO `log_history` VALUES ('128', '1', '2015-02-12 09:14:21', '2015-02-12 09:23:28', 'Offline');
INSERT INTO `log_history` VALUES ('129', '95', '2015-02-12 09:28:08', '2015-02-12 09:28:08', 'Offline');
INSERT INTO `log_history` VALUES ('130', '95', '2015-02-12 09:31:47', '2015-02-12 09:31:47', 'Offline');
INSERT INTO `log_history` VALUES ('131', '95', '2015-02-12 13:56:32', '2015-02-12 13:56:32', 'Offline');
INSERT INTO `log_history` VALUES ('132', '95', '2015-02-13 08:04:35', '2015-02-13 10:49:22', 'Offline');
INSERT INTO `log_history` VALUES ('133', '95', '2015-02-13 08:23:12', '2015-02-13 09:57:17', 'Offline');
INSERT INTO `log_history` VALUES ('134', '1', '2015-02-13 09:57:30', '2015-02-13 10:05:40', 'Offline');
INSERT INTO `log_history` VALUES ('135', '95', '2015-02-13 10:06:03', '2015-02-13 16:10:57', 'Offline');
INSERT INTO `log_history` VALUES ('136', '1', '2015-02-13 10:49:26', '2015-02-13 10:49:26', 'Offline');
INSERT INTO `log_history` VALUES ('137', '1', '2015-02-13 15:46:10', '2015-02-13 15:46:10', 'Offline');
INSERT INTO `log_history` VALUES ('138', '1', '2015-02-13 16:15:12', '2015-02-13 16:15:12', 'Offline');
INSERT INTO `log_history` VALUES ('139', '1', '2015-02-16 08:18:26', '2015-02-16 16:55:18', 'Offline');
INSERT INTO `log_history` VALUES ('140', '1', '2015-02-16 08:19:54', '2015-02-16 08:21:57', 'Offline');
INSERT INTO `log_history` VALUES ('141', '95', '2015-02-16 08:22:04', '2015-02-16 08:22:18', 'Offline');
INSERT INTO `log_history` VALUES ('142', '95', '2015-02-16 08:22:23', '2015-02-16 08:22:31', 'Offline');
INSERT INTO `log_history` VALUES ('143', '1', '2015-02-16 08:22:36', '2015-02-16 08:26:12', 'Offline');
INSERT INTO `log_history` VALUES ('144', '95', '2015-02-16 08:26:17', '2015-02-16 08:31:50', 'Offline');
INSERT INTO `log_history` VALUES ('145', '1', '2015-02-16 08:32:04', '2015-02-16 08:32:04', 'Offline');
INSERT INTO `log_history` VALUES ('146', '1', '2015-02-16 09:46:56', '2015-02-16 16:57:36', 'Offline');
INSERT INTO `log_history` VALUES ('147', '1', '2015-02-16 13:34:37', '2015-02-16 13:34:37', 'Offline');
INSERT INTO `log_history` VALUES ('148', '95', '2015-02-16 15:57:35', '2015-02-16 16:04:55', 'Offline');
INSERT INTO `log_history` VALUES ('149', '1', '2015-02-16 16:05:03', '2015-02-16 16:15:43', 'Offline');
INSERT INTO `log_history` VALUES ('150', '95', '2015-02-16 16:15:48', '2015-02-16 16:24:48', 'Offline');
INSERT INTO `log_history` VALUES ('151', '1', '2015-02-16 16:24:54', '2015-02-16 16:27:00', 'Offline');
INSERT INTO `log_history` VALUES ('152', '95', '2015-02-16 16:27:06', '2015-02-16 16:27:06', 'Offline');
INSERT INTO `log_history` VALUES ('153', '95', '2015-02-16 16:55:30', '2015-02-16 16:56:04', 'Offline');
INSERT INTO `log_history` VALUES ('154', '1', '2015-02-16 16:56:14', '2015-02-16 17:03:58', 'Offline');
INSERT INTO `log_history` VALUES ('155', '95', '2015-02-16 16:57:42', '2015-02-16 16:59:35', 'Offline');
INSERT INTO `log_history` VALUES ('156', '1', '2015-02-16 16:59:41', '2015-02-16 17:06:58', 'Offline');
INSERT INTO `log_history` VALUES ('157', '95', '2015-02-16 17:04:13', '2015-02-16 17:25:10', 'Offline');
INSERT INTO `log_history` VALUES ('158', '95', '2015-02-16 17:07:04', '2015-02-16 17:07:20', 'Offline');
INSERT INTO `log_history` VALUES ('159', '1', '2015-02-16 17:07:25', '2015-02-16 17:07:25', 'Offline');
INSERT INTO `log_history` VALUES ('160', '1', '2015-02-17 08:23:40', '2015-02-17 08:23:40', 'Offline');
INSERT INTO `log_history` VALUES ('161', '1', '2015-02-17 08:58:36', '2015-02-17 08:58:36', 'Offline');
INSERT INTO `log_history` VALUES ('162', '1', '2015-02-17 10:02:11', '2015-02-17 11:11:36', 'Offline');
INSERT INTO `log_history` VALUES ('163', '96', '2015-02-17 11:11:45', '2015-02-17 11:11:45', 'Offline');
INSERT INTO `log_history` VALUES ('164', '95', '2015-02-17 15:17:27', '2015-02-17 15:18:17', 'Offline');
INSERT INTO `log_history` VALUES ('165', '99', '2015-02-17 15:18:40', '2015-02-17 15:34:32', 'Offline');
INSERT INTO `log_history` VALUES ('166', '1', '2015-02-17 15:34:40', '2015-02-17 15:45:05', 'Offline');
INSERT INTO `log_history` VALUES ('167', '95', '2015-02-17 15:45:20', '2015-02-17 15:45:55', 'Offline');
INSERT INTO `log_history` VALUES ('168', '99', '2015-02-17 15:46:25', '2015-02-17 16:32:29', 'Offline');
INSERT INTO `log_history` VALUES ('169', '1', '2015-02-17 16:09:37', '2015-02-17 16:09:37', 'Offline');
INSERT INTO `log_history` VALUES ('170', '1', '2015-02-17 16:32:36', '2015-02-17 16:39:08', 'Offline');
INSERT INTO `log_history` VALUES ('171', '95', '2015-02-17 16:39:15', '2015-02-17 16:39:33', 'Offline');
INSERT INTO `log_history` VALUES ('172', '1', '2015-02-17 16:39:42', '2015-02-17 16:40:09', 'Offline');
INSERT INTO `log_history` VALUES ('173', '95', '2015-02-17 16:40:16', '2015-02-17 16:40:16', 'Offline');
INSERT INTO `log_history` VALUES ('174', '1', '2015-02-18 08:14:55', '2015-02-18 08:23:35', 'Offline');
INSERT INTO `log_history` VALUES ('175', '1', '2015-02-18 08:23:56', '2015-02-18 08:27:19', 'Offline');
INSERT INTO `log_history` VALUES ('176', '97', '2015-02-18 08:27:28', '2015-02-18 08:33:20', 'Offline');
INSERT INTO `log_history` VALUES ('177', '1', '2015-02-18 08:33:26', '2015-02-18 08:45:29', 'Offline');
INSERT INTO `log_history` VALUES ('178', '1', '2015-02-18 08:45:41', '2015-02-18 08:45:53', 'Offline');
INSERT INTO `log_history` VALUES ('179', '97', '2015-02-18 08:46:03', '2015-02-18 08:52:31', 'Offline');
INSERT INTO `log_history` VALUES ('180', '1', '2015-02-18 08:52:38', '2015-02-18 09:15:51', 'Offline');
INSERT INTO `log_history` VALUES ('181', '96', '2015-02-18 09:15:49', '2015-02-18 09:15:49', 'Offline');
INSERT INTO `log_history` VALUES ('182', '1', '2015-02-18 09:20:29', '2015-02-18 09:20:59', 'Offline');
INSERT INTO `log_history` VALUES ('183', '97', '2015-02-18 09:21:07', '2015-02-18 09:21:07', 'Offline');
INSERT INTO `log_history` VALUES ('184', '1', '2015-02-18 10:41:52', '2015-02-18 10:41:52', 'Offline');
INSERT INTO `log_history` VALUES ('185', '99', '2015-02-18 10:58:25', '2015-02-18 10:58:25', 'Offline');
INSERT INTO `log_history` VALUES ('186', '97', '2015-02-18 14:36:21', '2015-02-18 14:44:29', 'Offline');
INSERT INTO `log_history` VALUES ('187', '1', '2015-02-18 14:44:37', '2015-02-18 14:44:37', 'Offline');
INSERT INTO `log_history` VALUES ('188', '1', '2015-02-18 15:47:59', '2015-02-18 15:47:59', 'Offline');
INSERT INTO `log_history` VALUES ('189', '1', '2015-02-18 19:22:58', '2015-02-18 19:22:58', 'Offline');
INSERT INTO `log_history` VALUES ('190', '1', '2015-02-20 09:42:54', '2015-02-20 09:42:54', 'Offline');
INSERT INTO `log_history` VALUES ('191', '1', '2015-02-20 10:10:22', '2015-02-20 10:17:08', 'Offline');
INSERT INTO `log_history` VALUES ('192', '97', '2015-02-20 10:17:19', '2015-02-20 14:00:08', 'Offline');
INSERT INTO `log_history` VALUES ('193', '1', '2015-02-20 14:00:15', '2015-02-20 14:00:15', 'Offline');
INSERT INTO `log_history` VALUES ('194', '1', '2015-02-20 16:55:37', '2015-02-20 16:57:48', 'Offline');
INSERT INTO `log_history` VALUES ('195', '95', '2015-02-20 16:57:53', '2015-02-20 16:58:05', 'Offline');
INSERT INTO `log_history` VALUES ('196', '1', '2015-02-21 09:11:41', '2015-02-21 09:27:11', 'Offline');
INSERT INTO `log_history` VALUES ('197', '96', '2015-02-21 09:27:25', '2015-02-21 09:27:25', 'Offline');
INSERT INTO `log_history` VALUES ('198', '99', '2015-02-23 11:59:03', '2015-02-23 11:59:03', 'Offline');
INSERT INTO `log_history` VALUES ('199', '99', '2015-02-23 15:43:55', '2015-02-23 15:43:55', 'Offline');
INSERT INTO `log_history` VALUES ('200', '99', '2015-02-23 15:46:57', '2015-02-23 15:46:57', 'Offline');
INSERT INTO `log_history` VALUES ('201', '96', '2015-02-23 16:49:08', '2015-02-23 16:49:44', 'Offline');
INSERT INTO `log_history` VALUES ('202', '99', '2015-02-24 08:27:05', '2015-02-24 08:27:48', 'Offline');
INSERT INTO `log_history` VALUES ('203', '1', '2015-02-24 08:27:55', '2015-02-24 08:31:16', 'Offline');
INSERT INTO `log_history` VALUES ('204', '99', '2015-02-24 08:31:39', '2015-02-24 08:31:39', 'Offline');
INSERT INTO `log_history` VALUES ('205', '1', '2015-02-24 08:43:13', '2015-02-24 08:43:13', 'Offline');
INSERT INTO `log_history` VALUES ('206', '1', '2015-02-24 08:43:36', '2015-02-24 09:07:50', 'Offline');
INSERT INTO `log_history` VALUES ('207', '1', '2015-02-24 08:53:56', '2015-02-24 09:07:39', 'Offline');
INSERT INTO `log_history` VALUES ('208', '96', '2015-02-24 09:08:04', '2015-02-24 09:08:53', 'Offline');
INSERT INTO `log_history` VALUES ('209', '96', '2015-02-24 09:09:08', '2015-02-24 09:10:02', 'Offline');
INSERT INTO `log_history` VALUES ('210', '96', '2015-02-24 09:10:13', '2015-02-24 09:10:24', 'Offline');
INSERT INTO `log_history` VALUES ('211', '97', '2015-02-24 09:10:33', '2015-02-24 09:17:10', 'Offline');
INSERT INTO `log_history` VALUES ('212', '1', '2015-02-24 09:17:22', '2015-02-24 09:19:56', 'Offline');
INSERT INTO `log_history` VALUES ('213', '97', '2015-02-24 09:20:06', '2015-02-24 09:24:20', 'Offline');
INSERT INTO `log_history` VALUES ('214', '1', '2015-02-24 09:24:34', '2015-02-24 09:47:50', 'Offline');
INSERT INTO `log_history` VALUES ('215', '1', '2015-02-24 09:29:09', '2015-02-24 14:26:00', 'Offline');
INSERT INTO `log_history` VALUES ('216', '97', '2015-02-24 09:48:09', '2015-02-24 09:50:32', 'Offline');
INSERT INTO `log_history` VALUES ('217', '1', '2015-02-24 09:50:39', '2015-02-24 09:54:46', 'Offline');
INSERT INTO `log_history` VALUES ('218', '99', '2015-02-24 09:55:50', '2015-02-24 09:56:31', 'Offline');
INSERT INTO `log_history` VALUES ('219', '1', '2015-02-24 10:08:57', '2015-02-24 10:10:25', 'Offline');
INSERT INTO `log_history` VALUES ('220', '96', '2015-02-24 10:10:37', '2015-02-24 11:11:45', 'Offline');
INSERT INTO `log_history` VALUES ('221', '97', '2015-02-24 11:11:54', '2015-02-24 11:16:18', 'Offline');
INSERT INTO `log_history` VALUES ('222', '1', '2015-02-24 11:16:25', '2015-02-24 11:16:45', 'Offline');
INSERT INTO `log_history` VALUES ('223', '98', '2015-02-24 11:16:54', '2015-02-24 11:19:59', 'Offline');
INSERT INTO `log_history` VALUES ('224', '99', '2015-02-24 11:20:09', '2015-02-24 11:33:05', 'Offline');
INSERT INTO `log_history` VALUES ('225', '1', '2015-02-24 11:33:14', '2015-02-24 11:33:14', 'Offline');
INSERT INTO `log_history` VALUES ('226', '1', '2015-02-24 12:41:41', '2015-02-24 13:51:47', 'Offline');
INSERT INTO `log_history` VALUES ('227', '1', '2015-02-24 14:05:32', '2015-02-24 15:13:03', 'Offline');
INSERT INTO `log_history` VALUES ('228', '99', '2015-02-24 14:26:18', '2015-02-24 14:26:18', 'Offline');
INSERT INTO `log_history` VALUES ('229', '100', '2015-02-24 15:13:17', '2015-02-24 15:19:51', 'Offline');
INSERT INTO `log_history` VALUES ('230', '102', '2015-02-24 15:20:03', '2015-02-24 15:25:22', 'Offline');
INSERT INTO `log_history` VALUES ('231', '103', '2015-02-24 15:25:31', '2015-02-24 15:29:24', 'Offline');
INSERT INTO `log_history` VALUES ('232', '1', '2015-02-24 15:29:30', '2015-02-24 15:43:53', 'Offline');
INSERT INTO `log_history` VALUES ('233', '104', '2015-02-24 15:44:04', '2015-02-24 15:44:21', 'Offline');
INSERT INTO `log_history` VALUES ('234', '1', '2015-02-24 15:44:30', '2015-02-24 15:44:30', 'Offline');
INSERT INTO `log_history` VALUES ('235', '1', '2015-02-25 08:46:33', '2015-02-25 09:04:22', 'Offline');
INSERT INTO `log_history` VALUES ('236', '104', '2015-02-25 09:04:28', '2015-02-25 09:21:17', 'Offline');
INSERT INTO `log_history` VALUES ('237', '1', '2015-02-25 09:21:24', '2015-02-25 09:21:24', 'Offline');
INSERT INTO `log_history` VALUES ('238', '1', '2015-02-25 10:03:59', '2015-02-25 10:03:59', 'Offline');
INSERT INTO `log_history` VALUES ('239', '1', '2015-02-25 10:09:36', '2015-02-25 10:09:36', 'Offline');
INSERT INTO `log_history` VALUES ('240', '1', '2015-02-25 11:34:39', '2015-02-25 11:36:32', 'Offline');
INSERT INTO `log_history` VALUES ('241', '103', '2015-02-25 11:36:45', '2015-02-25 11:36:45', 'Offline');
INSERT INTO `log_history` VALUES ('242', '1', '2015-02-25 12:18:02', '2015-02-25 12:31:25', 'Offline');
INSERT INTO `log_history` VALUES ('243', '104', '2015-02-25 12:19:00', '2015-02-25 12:31:12', 'Offline');
INSERT INTO `log_history` VALUES ('244', '98', '2015-02-25 12:21:23', '2015-02-25 12:21:23', 'Offline');
INSERT INTO `log_history` VALUES ('245', '104', '2015-02-25 12:31:39', '2015-02-25 12:31:39', 'Offline');
INSERT INTO `log_history` VALUES ('246', '1', '2015-02-26 00:00:51', '2015-02-26 00:00:51', 'Offline');
INSERT INTO `log_history` VALUES ('247', '1', '2015-02-26 08:26:41', '2015-02-26 12:50:25', 'Offline');
INSERT INTO `log_history` VALUES ('248', '1', '2015-02-26 09:40:42', '2015-02-26 10:26:49', 'Offline');
INSERT INTO `log_history` VALUES ('249', '105', '2015-02-26 10:27:03', '2015-02-26 10:29:01', 'Offline');
INSERT INTO `log_history` VALUES ('250', '105', '2015-02-26 10:29:15', '2015-02-26 10:41:43', 'Offline');
INSERT INTO `log_history` VALUES ('251', '1', '2015-02-26 10:41:49', '2015-02-26 13:15:03', 'Offline');
INSERT INTO `log_history` VALUES ('252', '105', '2015-02-26 12:50:37', '2015-02-26 12:51:17', 'Offline');
INSERT INTO `log_history` VALUES ('253', '1', '2015-02-26 12:51:23', '2015-02-26 12:51:23', 'Offline');
INSERT INTO `log_history` VALUES ('254', '105', '2015-02-26 13:15:23', '2015-02-26 13:15:23', 'Offline');
INSERT INTO `log_history` VALUES ('255', '103', '2015-02-27 10:00:21', '2015-02-27 10:47:23', 'Offline');
INSERT INTO `log_history` VALUES ('256', '1', '2015-02-27 10:47:29', '2015-02-27 10:47:29', 'Offline');
INSERT INTO `log_history` VALUES ('257', '1', '2015-03-02 14:29:32', '2015-03-02 14:29:32', 'Offline');
INSERT INTO `log_history` VALUES ('258', '1', '2015-03-02 14:35:31', '2015-03-02 14:35:31', 'Offline');
INSERT INTO `log_history` VALUES ('259', '1', '2015-03-03 11:23:13', '2015-03-03 11:23:13', 'Offline');
INSERT INTO `log_history` VALUES ('260', '104', '2015-03-05 11:12:24', '2015-03-05 11:12:24', 'Offline');
INSERT INTO `log_history` VALUES ('261', '104', '2015-03-05 15:45:27', '2015-03-05 15:45:27', 'Offline');
INSERT INTO `log_history` VALUES ('262', '1', '2015-03-05 16:05:38', '2015-03-05 16:05:38', 'Offline');
INSERT INTO `log_history` VALUES ('263', '1', '2015-03-06 09:34:13', '2015-03-06 09:44:44', 'Offline');
INSERT INTO `log_history` VALUES ('264', '1', '2015-03-06 09:54:55', '2015-03-06 09:54:55', 'Offline');
INSERT INTO `log_history` VALUES ('265', '1', '2015-03-06 13:43:34', '2015-03-06 13:45:48', 'Offline');
INSERT INTO `log_history` VALUES ('266', '106', '2015-03-06 13:45:57', '2015-03-06 14:16:46', 'Offline');
INSERT INTO `log_history` VALUES ('267', '106', '2015-03-06 14:16:57', '2015-03-06 14:19:23', 'Offline');
INSERT INTO `log_history` VALUES ('268', '1', '2015-03-06 14:19:30', '2015-03-06 14:51:41', 'Offline');
INSERT INTO `log_history` VALUES ('269', '106', '2015-03-06 14:51:47', '2015-03-06 15:06:27', 'Offline');
INSERT INTO `log_history` VALUES ('270', '1', '2015-03-06 15:06:34', '2015-03-06 15:09:45', 'Offline');
INSERT INTO `log_history` VALUES ('271', '106', '2015-03-06 15:09:50', '2015-03-06 15:14:48', 'Offline');
INSERT INTO `log_history` VALUES ('272', '106', '2015-03-06 15:50:44', '2015-03-06 15:50:44', 'Offline');
INSERT INTO `log_history` VALUES ('273', '1', '2015-03-09 09:14:10', '2015-03-09 13:41:34', 'Offline');
INSERT INTO `log_history` VALUES ('274', '107', '2015-03-09 09:18:08', '2015-03-09 09:18:08', 'Offline');
INSERT INTO `log_history` VALUES ('275', '1', '2015-03-09 13:39:52', '2015-03-09 14:18:40', 'Offline');
INSERT INTO `log_history` VALUES ('276', '107', '2015-03-09 13:41:47', '2015-03-09 13:41:47', 'Offline');
INSERT INTO `log_history` VALUES ('277', '1', '2015-03-09 14:13:05', '2015-03-09 14:36:06', 'Offline');
INSERT INTO `log_history` VALUES ('278', '96', '2015-03-09 14:19:08', '2015-03-09 14:23:12', 'Offline');
INSERT INTO `log_history` VALUES ('279', '97', '2015-03-09 14:23:25', '2015-03-09 14:24:58', 'Offline');
INSERT INTO `log_history` VALUES ('280', '98', '2015-03-09 14:25:07', '2015-03-09 14:31:00', 'Offline');
INSERT INTO `log_history` VALUES ('281', '99', '2015-03-09 14:31:33', '2015-03-09 14:33:41', 'Offline');
INSERT INTO `log_history` VALUES ('282', '1', '2015-03-09 14:33:47', '2015-03-09 14:34:49', 'Offline');
INSERT INTO `log_history` VALUES ('283', '97', '2015-03-09 14:35:01', '2015-03-09 14:36:05', 'Offline');
INSERT INTO `log_history` VALUES ('284', '106', '2015-03-09 14:36:20', '2015-03-09 14:52:13', 'Offline');
INSERT INTO `log_history` VALUES ('285', '107', '2015-03-09 14:36:32', '2015-03-09 14:36:32', 'Offline');
INSERT INTO `log_history` VALUES ('286', '1', '2015-03-09 14:52:19', '2015-03-09 14:52:19', 'Offline');
INSERT INTO `log_history` VALUES ('287', '1', '2015-03-10 09:03:33', '2015-03-10 09:03:33', 'Offline');
INSERT INTO `log_history` VALUES ('288', '1', '2015-03-10 09:05:34', '2015-03-10 09:38:33', 'Offline');
INSERT INTO `log_history` VALUES ('289', '106', '2015-03-10 09:38:40', '2015-03-10 09:38:57', 'Offline');
INSERT INTO `log_history` VALUES ('290', '1', '2015-03-10 09:39:06', '2015-03-10 09:43:56', 'Offline');
INSERT INTO `log_history` VALUES ('291', '1', '2015-03-10 09:49:41', '2015-03-10 13:31:07', 'Offline');
INSERT INTO `log_history` VALUES ('292', '1', '2015-03-10 13:23:19', '2015-03-10 13:23:19', 'Offline');
INSERT INTO `log_history` VALUES ('293', '107', '2015-03-10 13:24:05', '2015-03-10 13:24:05', 'Offline');
INSERT INTO `log_history` VALUES ('294', '106', '2015-03-10 13:31:14', '2015-03-10 13:50:42', 'Offline');
INSERT INTO `log_history` VALUES ('295', '1', '2015-03-10 13:50:48', '2015-03-10 13:51:25', 'Offline');
INSERT INTO `log_history` VALUES ('296', '106', '2015-03-10 13:51:31', '2015-03-10 13:51:31', 'Offline');
INSERT INTO `log_history` VALUES ('297', '1', '2015-03-10 14:19:57', '2015-03-10 14:22:11', 'Offline');
INSERT INTO `log_history` VALUES ('298', '1', '2015-03-10 14:20:54', '2015-03-10 14:21:36', 'Offline');
INSERT INTO `log_history` VALUES ('299', '107', '2015-03-10 14:21:46', '2015-03-10 14:21:46', 'Offline');
INSERT INTO `log_history` VALUES ('300', '107', '2015-03-10 14:22:42', '2015-03-10 14:33:17', 'Offline');
INSERT INTO `log_history` VALUES ('301', '106', '2015-03-10 14:24:37', '2015-03-10 14:29:29', 'Offline');
INSERT INTO `log_history` VALUES ('302', '1', '2015-03-10 14:29:36', '2015-03-10 14:30:50', 'Offline');
INSERT INTO `log_history` VALUES ('303', '106', '2015-03-10 14:30:55', '2015-03-10 14:30:55', 'Offline');
INSERT INTO `log_history` VALUES ('304', '98', '2015-03-10 14:33:30', '2015-03-10 14:33:30', 'Offline');
INSERT INTO `log_history` VALUES ('305', '1', '2015-03-11 05:42:45', '2015-03-11 05:42:45', 'Offline');
INSERT INTO `log_history` VALUES ('306', '107', '2015-03-11 05:49:40', '2015-03-11 05:49:40', 'Offline');
INSERT INTO `log_history` VALUES ('307', '1', '2015-03-11 05:53:50', '2015-03-11 05:53:50', 'Offline');
INSERT INTO `log_history` VALUES ('308', '106', '2015-03-11 09:26:38', '2015-03-11 09:42:20', 'Offline');
INSERT INTO `log_history` VALUES ('309', '1', '2015-03-11 09:42:25', '2015-03-11 09:46:31', 'Offline');
INSERT INTO `log_history` VALUES ('310', '107', '2015-03-11 09:46:39', '2015-03-11 15:58:22', 'Offline');
INSERT INTO `log_history` VALUES ('311', '1', '2015-03-11 15:59:06', '2015-03-11 15:59:35', 'Offline');
INSERT INTO `log_history` VALUES ('312', '107', '2015-03-11 15:59:46', '2015-03-11 15:59:46', 'Offline');
INSERT INTO `log_history` VALUES ('313', '107', '2015-03-11 16:29:34', '2015-03-11 16:29:34', 'Offline');
INSERT INTO `log_history` VALUES ('314', '107', '2015-03-12 08:32:51', '2015-03-12 08:32:51', 'Offline');
INSERT INTO `log_history` VALUES ('315', '1', '2015-03-12 09:27:08', '2015-03-12 09:27:08', 'Offline');
INSERT INTO `log_history` VALUES ('316', '1', '2015-03-12 09:59:02', '2015-03-12 10:04:23', 'Offline');
INSERT INTO `log_history` VALUES ('317', '97', '2015-03-12 10:04:33', '2015-03-12 15:07:26', 'Offline');
INSERT INTO `log_history` VALUES ('318', '107', '2015-03-12 10:14:48', '2015-03-12 10:14:48', 'Offline');
INSERT INTO `log_history` VALUES ('319', '99', '2015-03-12 10:23:32', '2015-03-12 10:23:32', 'Offline');
INSERT INTO `log_history` VALUES ('320', '107', '2015-03-12 15:07:38', '2015-03-12 15:07:38', 'Offline');
INSERT INTO `log_history` VALUES ('321', '97', '2015-03-13 13:46:08', '2015-03-13 13:55:10', 'Offline');
INSERT INTO `log_history` VALUES ('322', '1', '2015-03-13 13:55:15', '2015-03-13 13:55:57', 'Offline');
INSERT INTO `log_history` VALUES ('323', '1', '2015-03-13 13:56:16', '2015-03-13 14:21:26', 'Offline');
INSERT INTO `log_history` VALUES ('324', '97', '2015-03-13 13:58:47', '2015-03-13 13:58:47', 'Offline');
INSERT INTO `log_history` VALUES ('325', '108', '2015-03-13 14:21:32', '2015-03-13 14:22:08', 'Offline');
INSERT INTO `log_history` VALUES ('326', '1', '2015-03-13 14:22:14', '2015-03-13 14:28:56', 'Offline');
INSERT INTO `log_history` VALUES ('327', '108', '2015-03-13 14:29:16', '2015-03-13 14:29:16', 'Offline');
INSERT INTO `log_history` VALUES ('328', '104', '2015-03-17 09:17:12', '2015-03-17 09:17:12', 'Offline');
INSERT INTO `log_history` VALUES ('329', '1', '2015-03-17 09:19:39', '2015-03-17 09:19:39', 'Offline');
INSERT INTO `log_history` VALUES ('330', '1', '2015-03-17 09:26:01', '2015-03-17 09:38:01', 'Offline');
INSERT INTO `log_history` VALUES ('331', '1', '2015-03-17 09:38:26', '2015-03-17 09:38:54', 'Offline');
INSERT INTO `log_history` VALUES ('332', '104', '2015-03-17 09:39:03', '2015-03-17 09:39:25', 'Offline');
INSERT INTO `log_history` VALUES ('333', '1', '2015-03-17 09:39:31', '2015-03-17 09:40:26', 'Offline');
INSERT INTO `log_history` VALUES ('334', '104', '2015-03-17 09:40:37', '2015-03-17 09:40:37', 'Offline');
INSERT INTO `log_history` VALUES ('335', '107', '2015-03-18 08:58:17', '2015-03-18 08:58:17', 'Offline');
INSERT INTO `log_history` VALUES ('336', '107', '2015-03-18 09:07:44', '2015-03-18 09:07:44', 'Offline');
INSERT INTO `log_history` VALUES ('337', '1', '2015-03-19 09:05:15', '2015-03-19 09:22:29', 'Offline');
INSERT INTO `log_history` VALUES ('338', '1', '2015-03-19 09:22:51', '2015-03-19 09:25:00', 'Offline');
INSERT INTO `log_history` VALUES ('339', '99', '2015-03-19 09:25:07', '2015-03-19 09:25:07', 'Offline');
INSERT INTO `log_history` VALUES ('340', '1', '2015-03-19 11:01:59', '2015-03-19 11:05:33', 'Offline');
INSERT INTO `log_history` VALUES ('341', '104', '2015-03-19 11:05:35', '2015-03-19 11:05:35', 'Offline');
INSERT INTO `log_history` VALUES ('342', '1', '2015-03-19 11:12:06', '2015-03-19 11:12:06', 'Offline');
INSERT INTO `log_history` VALUES ('343', '1', '2015-03-19 11:30:40', '2015-03-19 13:41:20', 'Offline');
INSERT INTO `log_history` VALUES ('344', '1', '2015-03-19 13:29:17', '2015-03-19 13:29:17', 'Offline');
INSERT INTO `log_history` VALUES ('345', '97', '2015-03-19 13:41:47', '2015-03-19 15:33:11', 'Offline');
INSERT INTO `log_history` VALUES ('346', '1', '2015-03-19 15:33:23', '2015-03-19 15:33:23', 'Offline');
INSERT INTO `log_history` VALUES ('347', '1', '2015-03-19 15:40:10', '2015-03-19 15:40:10', 'Offline');
INSERT INTO `log_history` VALUES ('348', '1', '2015-03-19 16:04:32', '2015-03-19 16:04:32', 'Offline');
INSERT INTO `log_history` VALUES ('349', '1', '2015-03-20 09:31:15', '2015-03-20 09:31:15', 'Offline');
INSERT INTO `log_history` VALUES ('350', '1', '2015-03-20 09:40:04', '2015-03-20 09:40:04', 'Offline');
INSERT INTO `log_history` VALUES ('351', '1', '2015-03-20 10:43:09', '2015-03-20 10:43:09', 'Offline');
INSERT INTO `log_history` VALUES ('352', '1', '2015-03-23 09:18:37', '2015-03-23 09:18:37', 'Offline');
INSERT INTO `log_history` VALUES ('353', '1', '2015-03-23 12:22:53', '2015-03-23 13:51:47', 'Offline');
INSERT INTO `log_history` VALUES ('354', '103', '2015-03-23 13:51:59', '2015-03-23 13:56:35', 'Offline');
INSERT INTO `log_history` VALUES ('355', '1', '2015-03-23 13:56:54', '2015-03-23 13:56:54', 'Offline');
INSERT INTO `log_history` VALUES ('356', '1', '2015-03-23 13:57:01', '2015-03-23 13:57:01', 'Offline');
INSERT INTO `log_history` VALUES ('357', '1', '2015-03-24 19:45:48', '2015-03-24 19:45:48', 'Offline');
INSERT INTO `log_history` VALUES ('358', '104', '2015-03-24 20:37:14', '2015-03-24 20:37:14', 'Offline');
INSERT INTO `log_history` VALUES ('359', '1', '2015-03-25 09:17:42', '2015-03-25 09:58:10', 'Offline');
INSERT INTO `log_history` VALUES ('360', '113', '2015-03-25 10:55:18', '2015-03-25 10:55:31', 'Offline');
INSERT INTO `log_history` VALUES ('361', '1', '2015-03-25 10:56:00', '2015-03-25 10:58:10', 'Offline');
INSERT INTO `log_history` VALUES ('362', '113', '2015-03-25 10:58:22', '2015-03-25 10:58:40', 'Offline');
INSERT INTO `log_history` VALUES ('363', '107', '2015-03-25 10:58:55', '2015-03-25 11:12:43', 'Offline');
INSERT INTO `log_history` VALUES ('364', '1', '2015-03-25 11:03:19', '2015-03-25 11:04:07', 'Offline');
INSERT INTO `log_history` VALUES ('365', '107', '2015-03-25 11:04:15', '2015-03-25 11:21:30', 'Offline');
INSERT INTO `log_history` VALUES ('366', '1', '2015-03-25 11:12:49', '2015-03-25 11:12:49', 'Offline');
INSERT INTO `log_history` VALUES ('367', '1', '2015-03-25 11:21:36', '2015-03-25 11:27:47', 'Offline');
INSERT INTO `log_history` VALUES ('368', '107', '2015-03-25 11:27:59', '2015-03-25 11:27:59', 'Offline');
INSERT INTO `log_history` VALUES ('369', '1', '2015-03-25 14:48:37', '2015-03-25 14:48:37', 'Offline');
INSERT INTO `log_history` VALUES ('370', '1', '2015-03-25 15:54:01', '2015-03-25 15:54:01', 'Offline');
INSERT INTO `log_history` VALUES ('371', '1', '2015-03-26 07:53:19', '2015-03-26 07:53:19', 'Offline');
INSERT INTO `log_history` VALUES ('372', '1', '2015-03-30 07:47:59', '2015-03-30 07:47:59', 'Offline');
INSERT INTO `log_history` VALUES ('373', '104', '2015-03-30 15:00:32', '2015-03-30 15:00:32', 'Offline');
INSERT INTO `log_history` VALUES ('374', '1', '2015-03-31 08:46:44', '2015-03-31 08:46:44', 'Offline');
INSERT INTO `log_history` VALUES ('375', '1', '2015-03-31 09:04:05', '2015-03-31 09:04:05', 'Offline');
INSERT INTO `log_history` VALUES ('376', '1', '2015-03-31 09:29:32', '2015-03-31 09:29:32', 'Offline');
INSERT INTO `log_history` VALUES ('377', '1', '2015-03-31 15:42:34', '2015-03-31 15:42:34', 'Offline');
INSERT INTO `log_history` VALUES ('378', '1', '2015-04-01 08:25:41', '2015-04-01 08:25:41', 'Offline');
INSERT INTO `log_history` VALUES ('379', '1', '2015-04-01 13:38:25', '2015-04-01 13:38:25', 'Offline');
INSERT INTO `log_history` VALUES ('380', '1', '2015-04-01 16:12:58', '2015-04-01 16:12:58', 'Offline');
INSERT INTO `log_history` VALUES ('381', '1', '2015-04-02 07:49:03', '2015-04-02 07:49:03', 'Offline');
INSERT INTO `log_history` VALUES ('382', '1', '2015-04-02 09:08:37', '2015-04-02 09:08:37', 'Offline');
INSERT INTO `log_history` VALUES ('383', '107', '2015-04-02 10:07:35', '2015-04-02 10:07:35', 'Offline');
INSERT INTO `log_history` VALUES ('384', '1', '2015-04-04 10:39:50', '2015-04-04 10:39:50', 'Offline');
INSERT INTO `log_history` VALUES ('385', '1', '2015-04-04 14:37:40', '2015-04-04 14:37:40', 'Offline');
INSERT INTO `log_history` VALUES ('386', '1', '2015-04-06 08:31:46', '2015-04-06 14:01:42', 'Offline');
INSERT INTO `log_history` VALUES ('387', '1', '2015-04-06 08:53:30', '2015-04-06 13:34:35', 'Offline');
INSERT INTO `log_history` VALUES ('388', '1', '2015-04-06 09:12:46', '2015-04-06 09:12:46', 'Offline');
INSERT INTO `log_history` VALUES ('389', '104', '2015-04-06 10:52:00', '2015-04-06 10:52:00', 'Offline');
INSERT INTO `log_history` VALUES ('390', '107', '2015-04-06 13:34:47', '2015-04-06 13:34:47', 'Offline');
INSERT INTO `log_history` VALUES ('391', '1', '2015-04-06 14:01:56', '2015-04-06 14:02:10', 'Offline');
INSERT INTO `log_history` VALUES ('392', '97', '2015-04-06 14:02:18', '2015-04-06 14:30:59', 'Offline');
INSERT INTO `log_history` VALUES ('393', '1', '2015-04-06 14:26:54', '2015-04-06 14:26:54', 'Offline');
INSERT INTO `log_history` VALUES ('394', '1', '2015-04-06 14:31:09', '2015-04-06 14:31:37', 'Offline');
INSERT INTO `log_history` VALUES ('395', '107', '2015-04-06 14:31:42', '2015-04-06 14:32:29', 'Offline');
INSERT INTO `log_history` VALUES ('396', '1', '2015-04-06 14:32:36', '2015-04-06 14:41:05', 'Offline');
INSERT INTO `log_history` VALUES ('397', '107', '2015-04-06 14:41:15', '2015-04-06 14:41:15', 'Offline');
INSERT INTO `log_history` VALUES ('398', '1', '2015-04-06 15:44:08', '2015-04-06 15:44:23', 'Offline');
INSERT INTO `log_history` VALUES ('399', '1', '2015-04-06 15:44:36', '2015-04-06 15:44:36', 'Offline');
INSERT INTO `log_history` VALUES ('400', '107', '2015-04-06 15:45:04', '2015-04-06 15:48:07', 'Offline');
INSERT INTO `log_history` VALUES ('401', '1', '2015-04-06 15:48:14', '2015-04-06 15:49:37', 'Offline');
INSERT INTO `log_history` VALUES ('402', '107', '2015-04-06 15:51:48', '2015-04-06 15:51:48', 'Offline');
INSERT INTO `log_history` VALUES ('403', '1', '2015-04-06 16:21:00', '2015-04-06 17:04:20', 'Offline');
INSERT INTO `log_history` VALUES ('404', '104', '2015-04-06 16:42:20', '2015-04-06 16:46:01', 'Offline');
INSERT INTO `log_history` VALUES ('405', '107', '2015-04-06 16:46:16', '2015-04-06 16:46:16', 'Offline');
INSERT INTO `log_history` VALUES ('406', '104', '2015-04-06 17:04:26', '2015-04-06 17:47:39', 'Offline');
INSERT INTO `log_history` VALUES ('407', '107', '2015-04-06 17:21:43', '2015-04-06 17:21:43', 'Offline');
INSERT INTO `log_history` VALUES ('408', '1', '2015-04-06 17:47:43', '2015-04-06 17:48:44', 'Offline');
INSERT INTO `log_history` VALUES ('409', '1', '2015-04-07 08:44:47', '2015-04-07 14:37:47', 'Offline');
INSERT INTO `log_history` VALUES ('410', '1', '2015-04-07 14:38:21', '2015-04-07 14:38:36', 'Offline');
INSERT INTO `log_history` VALUES ('411', '104', '2015-04-07 14:38:40', '2015-04-07 14:47:51', 'Offline');
INSERT INTO `log_history` VALUES ('412', '1', '2015-04-07 14:47:58', '2015-04-07 16:00:47', 'Offline');
INSERT INTO `log_history` VALUES ('413', '104', '2015-04-07 16:00:54', '2015-04-07 16:00:54', 'Offline');
INSERT INTO `log_history` VALUES ('414', '1', '2015-04-09 09:48:57', '2015-04-09 09:48:57', 'Offline');
INSERT INTO `log_history` VALUES ('415', '107', '2015-04-09 09:49:44', '2015-04-09 09:49:44', 'Offline');
INSERT INTO `log_history` VALUES ('416', '1', '2015-04-09 09:54:37', '2015-04-09 09:54:37', 'Offline');
INSERT INTO `log_history` VALUES ('417', '1', '2015-04-10 08:55:01', '2015-04-10 14:28:25', 'Offline');
INSERT INTO `log_history` VALUES ('418', '1', '2015-04-10 09:40:46', '2015-04-10 09:40:46', 'Offline');
INSERT INTO `log_history` VALUES ('419', '97', '2015-04-10 14:28:30', '2015-04-10 14:42:27', 'Offline');
INSERT INTO `log_history` VALUES ('420', '1', '2015-04-10 14:42:34', '2015-04-10 14:53:42', 'Offline');
INSERT INTO `log_history` VALUES ('421', '97', '2015-04-10 14:53:52', '2015-04-10 14:53:52', 'Offline');
INSERT INTO `log_history` VALUES ('422', '1', '2015-04-10 16:17:20', '2015-04-10 16:17:20', 'Offline');
INSERT INTO `log_history` VALUES ('423', '1', '2015-04-13 09:05:26', '2015-04-13 09:06:00', 'Offline');
INSERT INTO `log_history` VALUES ('424', '97', '2015-04-13 09:06:08', '2015-04-13 09:06:08', 'Offline');
INSERT INTO `log_history` VALUES ('425', '1', '2015-04-13 09:10:10', '2015-04-13 14:35:59', 'Offline');
INSERT INTO `log_history` VALUES ('426', '1', '2015-04-13 12:44:48', '2015-04-13 12:44:48', 'Offline');
INSERT INTO `log_history` VALUES ('427', '97', '2015-04-13 14:36:12', '2015-04-13 14:36:12', 'Offline');
INSERT INTO `log_history` VALUES ('428', '1', '2015-04-13 15:51:20', '2015-04-13 15:51:20', 'Offline');
INSERT INTO `log_history` VALUES ('429', '1', '2015-04-14 09:38:25', '2015-04-14 09:40:22', 'Offline');
INSERT INTO `log_history` VALUES ('430', '97', '2015-04-14 09:40:34', '2015-04-14 09:40:34', 'Offline');
INSERT INTO `log_history` VALUES ('431', '1', '2015-04-14 10:13:44', '2015-04-14 10:13:44', 'Offline');
INSERT INTO `log_history` VALUES ('432', '97', '2015-04-14 16:52:48', '2015-04-14 16:52:48', 'Offline');
INSERT INTO `log_history` VALUES ('433', '1', '2015-04-15 09:31:17', '2015-04-15 09:31:17', 'Offline');
INSERT INTO `log_history` VALUES ('434', '107', '2015-04-15 09:56:43', '2015-04-15 09:56:43', 'Offline');
INSERT INTO `log_history` VALUES ('435', '107', '2015-04-15 10:06:37', '2015-04-15 10:21:45', 'Offline');
INSERT INTO `log_history` VALUES ('436', '1', '2015-04-15 10:21:50', '2015-04-15 10:42:30', 'Offline');
INSERT INTO `log_history` VALUES ('437', '107', '2015-04-15 10:42:44', '2015-04-15 15:47:27', 'Offline');
INSERT INTO `log_history` VALUES ('438', '107', '2015-04-15 13:36:04', '2015-04-15 13:36:04', 'Offline');
INSERT INTO `log_history` VALUES ('439', '1', '2015-04-15 15:48:23', '2015-04-15 16:56:04', 'Offline');
INSERT INTO `log_history` VALUES ('440', '1', '2015-04-16 09:25:07', '2015-04-16 11:15:57', 'Offline');
INSERT INTO `log_history` VALUES ('441', '97', '2015-04-16 11:16:04', '2015-04-16 13:56:01', 'Offline');
INSERT INTO `log_history` VALUES ('442', '1', '2015-04-16 13:53:47', '2015-04-16 13:53:47', 'Offline');
INSERT INTO `log_history` VALUES ('443', '1', '2015-04-16 13:56:09', '2015-04-16 13:56:09', 'Offline');
INSERT INTO `log_history` VALUES ('444', '1', '2015-04-16 15:13:51', '2015-04-16 15:13:51', 'Offline');
INSERT INTO `log_history` VALUES ('445', '1', '2015-04-17 09:26:27', '2015-04-17 09:26:27', 'Offline');
INSERT INTO `log_history` VALUES ('446', '1', '2015-04-17 09:42:31', '2015-04-17 09:42:31', 'Offline');
INSERT INTO `log_history` VALUES ('447', '1', '2015-04-17 13:42:20', '2015-04-17 13:42:20', 'Offline');
INSERT INTO `log_history` VALUES ('448', '1', '2015-04-17 14:47:51', '2015-04-17 16:33:19', 'Offline');
INSERT INTO `log_history` VALUES ('449', '1', '2015-04-17 15:44:26', '2015-04-17 15:55:31', 'Offline');
INSERT INTO `log_history` VALUES ('450', '1', '2015-04-17 15:55:55', '2015-04-17 16:19:30', 'Offline');
INSERT INTO `log_history` VALUES ('451', '116', '2015-04-17 16:20:06', '2015-04-17 16:20:06', 'Offline');
INSERT INTO `log_history` VALUES ('452', '1', '2015-04-17 16:26:46', '2015-04-17 16:26:46', 'Offline');
INSERT INTO `log_history` VALUES ('453', '96', '2015-04-17 18:00:56', '2015-04-17 18:01:07', 'Offline');
INSERT INTO `log_history` VALUES ('454', '1', '2015-04-17 18:01:10', '2015-04-17 18:01:47', 'Offline');
INSERT INTO `log_history` VALUES ('455', '96', '2015-04-17 18:01:58', '2015-04-17 18:01:58', 'Offline');
INSERT INTO `log_history` VALUES ('456', '103', '2015-04-18 08:27:18', '2015-04-18 08:27:18', 'Offline');
INSERT INTO `log_history` VALUES ('457', '103', '2015-04-18 08:44:16', '2015-04-18 10:00:09', 'Offline');
INSERT INTO `log_history` VALUES ('458', '116', '2015-04-18 09:53:45', '2015-04-18 10:09:32', 'Offline');
INSERT INTO `log_history` VALUES ('459', '116', '2015-04-18 10:00:30', '2015-04-18 14:00:52', 'Offline');
INSERT INTO `log_history` VALUES ('460', '103', '2015-04-18 10:09:42', '2015-04-18 12:08:14', 'Offline');
INSERT INTO `log_history` VALUES ('461', '1', '2015-04-18 10:27:54', '2015-04-18 10:27:54', 'Offline');
INSERT INTO `log_history` VALUES ('462', '1', '2015-04-18 11:49:05', '2015-04-18 11:49:05', 'Offline');
INSERT INTO `log_history` VALUES ('463', '1', '2015-04-18 13:22:48', '2015-04-18 13:22:48', 'Offline');
INSERT INTO `log_history` VALUES ('464', '116', '2015-04-18 14:01:36', '2015-04-18 14:01:36', 'Offline');
INSERT INTO `log_history` VALUES ('465', '116', '2015-04-18 14:02:32', '2015-04-18 14:02:32', 'Offline');
INSERT INTO `log_history` VALUES ('466', '1', '2015-04-18 15:11:02', '2015-04-18 15:11:02', 'Offline');
INSERT INTO `log_history` VALUES ('467', '1', '2015-04-18 15:38:29', '2015-04-18 15:38:29', 'Offline');
INSERT INTO `log_history` VALUES ('468', '1', '2015-04-18 15:42:20', '2015-04-18 15:42:20', 'Offline');
INSERT INTO `log_history` VALUES ('469', '116', '2015-04-18 19:15:21', '2015-04-18 19:15:21', 'Offline');
INSERT INTO `log_history` VALUES ('470', '1', '2015-04-18 19:18:22', '2015-04-18 19:25:24', 'Offline');
INSERT INTO `log_history` VALUES ('471', '96', '2015-04-18 19:25:41', '2015-04-18 19:25:41', 'Offline');
INSERT INTO `log_history` VALUES ('472', '1', '2015-04-20 09:12:30', '2015-04-20 09:31:35', 'Offline');
INSERT INTO `log_history` VALUES ('473', '97', '2015-04-20 09:31:47', '2015-04-20 09:31:47', 'Offline');
INSERT INTO `log_history` VALUES ('474', '1', '2015-04-20 09:34:57', '2015-04-20 09:34:57', 'Offline');
INSERT INTO `log_history` VALUES ('475', '1', '2015-04-20 10:56:37', '2015-04-20 10:56:41', 'Offline');
INSERT INTO `log_history` VALUES ('476', '104', '2015-04-20 10:57:27', '2015-04-20 11:10:56', 'Offline');
INSERT INTO `log_history` VALUES ('477', '104', '2015-04-20 11:11:06', '2015-04-20 11:39:19', 'Offline');
INSERT INTO `log_history` VALUES ('478', '97', '2015-04-20 11:28:43', '2015-04-20 11:53:13', 'Offline');
INSERT INTO `log_history` VALUES ('479', '1', '2015-04-20 11:39:24', '2015-04-20 11:57:03', 'Offline');
INSERT INTO `log_history` VALUES ('480', '1', '2015-04-20 11:53:19', '2015-04-20 13:42:55', 'Offline');
INSERT INTO `log_history` VALUES ('481', '104', '2015-04-20 11:57:09', '2015-04-20 11:57:09', 'Offline');
INSERT INTO `log_history` VALUES ('482', '116', '2015-04-20 13:24:35', '2015-04-20 13:24:35', 'Offline');
INSERT INTO `log_history` VALUES ('483', '1', '2015-04-20 14:03:36', '2015-04-20 14:04:08', 'Offline');
INSERT INTO `log_history` VALUES ('484', '107', '2015-04-20 14:04:18', '2015-04-20 16:04:24', 'Offline');
INSERT INTO `log_history` VALUES ('485', '97', '2015-04-20 16:04:42', '2015-04-20 16:04:42', 'Offline');
INSERT INTO `log_history` VALUES ('486', '1', '2015-04-20 16:31:43', '2015-04-20 16:31:43', 'Offline');
INSERT INTO `log_history` VALUES ('487', '1', '2015-04-27 10:29:46', '0000-00-00 00:00:00', 'Online');

-- ----------------------------
-- Table structure for `log_story`
-- ----------------------------
DROP TABLE IF EXISTS `log_story`;
CREATE TABLE `log_story` (
  `log_id` int(20) NOT NULL AUTO_INCREMENT,
  `code_encrypt` varchar(50) DEFAULT NULL,
  `log_name` varchar(50) DEFAULT NULL,
  `log_menu` varchar(20) DEFAULT NULL,
  `log_date_in` datetime DEFAULT NULL,
  `log_date_out` datetime DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of log_story
-- ----------------------------
INSERT INTO `log_story` VALUES ('1', null, '1', 'LOGIN', '2014-10-22 04:44:05', null);
INSERT INTO `log_story` VALUES ('2', null, '1', 'LOGIN', '2014-10-22 04:48:59', null);
INSERT INTO `log_story` VALUES ('3', null, '1', 'LOGIN', '2014-10-22 04:54:05', null);
INSERT INTO `log_story` VALUES ('4', null, '1', 'LOGIN', '2014-10-22 04:55:59', null);
INSERT INTO `log_story` VALUES ('5', null, '1', 'LOGIN', '2014-10-22 04:56:17', null);
INSERT INTO `log_story` VALUES ('6', null, '1', 'LOGIN', '2014-10-22 05:27:36', null);
INSERT INTO `log_story` VALUES ('7', null, '1', 'LOGIN', '2014-10-22 05:34:27', null);
INSERT INTO `log_story` VALUES ('8', null, '1', 'LOGIN', '2014-10-22 06:38:33', null);
INSERT INTO `log_story` VALUES ('9', null, '1', 'LOGIN', '2014-10-22 08:00:23', null);
INSERT INTO `log_story` VALUES ('10', null, '1', 'LOGIN', '2014-10-22 08:38:48', null);
INSERT INTO `log_story` VALUES ('11', null, '3', 'LOGIN', '2014-10-22 09:13:41', null);
INSERT INTO `log_story` VALUES ('12', null, '1', 'LOGIN', '2014-10-22 10:08:08', null);
INSERT INTO `log_story` VALUES ('13', null, 'nidyaocqy@yahoo.co.id', 'LOGIN', '2014-10-22 17:16:45', null);
INSERT INTO `log_story` VALUES ('14', null, '1', 'LOGIN', '2014-10-22 17:21:42', null);
INSERT INTO `log_story` VALUES ('15', null, 'iqba.satisfied@gmail.com', 'LOGIN', '2014-10-23 05:10:35', null);
INSERT INTO `log_story` VALUES ('16', null, 'iqbal@cifo.co.id', 'LOGIN', '2014-10-24 08:32:21', null);
INSERT INTO `log_story` VALUES ('17', null, '1', 'LOGIN', '2014-10-24 08:49:43', null);
INSERT INTO `log_story` VALUES ('18', null, 'iqbal@cifo.co.id', 'LOGIN', '2014-10-24 09:43:24', null);
INSERT INTO `log_story` VALUES ('19', null, 'iqbal@cifo.co.id', 'LOGIN', '2014-10-24 09:49:55', null);
INSERT INTO `log_story` VALUES ('20', null, '1', 'LOGIN', '2014-10-24 10:10:55', null);
INSERT INTO `log_story` VALUES ('21', null, '1', 'LOGIN', '2014-10-24 10:27:25', null);
INSERT INTO `log_story` VALUES ('22', null, '0', 'LOGIN', '2014-10-24 10:29:01', null);
INSERT INTO `log_story` VALUES ('23', null, '1', 'LOGIN', '2014-10-24 11:04:35', null);
INSERT INTO `log_story` VALUES ('24', null, '1', 'LOGIN', '2014-10-25 09:00:05', null);
INSERT INTO `log_story` VALUES ('25', null, '0', 'LOGIN', '2014-10-25 09:14:44', null);
INSERT INTO `log_story` VALUES ('26', null, '1', 'LOGIN', '2014-10-25 09:15:18', null);
INSERT INTO `log_story` VALUES ('27', null, '1', 'LOGIN', '2014-10-25 09:38:11', null);
INSERT INTO `log_story` VALUES ('28', null, '1', 'LOGIN', '2014-10-25 10:38:50', null);
INSERT INTO `log_story` VALUES ('29', null, '2', 'LOGIN', '2014-10-25 10:39:26', null);
INSERT INTO `log_story` VALUES ('30', null, 'iqbal@bebas.com', 'LOGIN', '2014-10-26 03:32:11', null);
INSERT INTO `log_story` VALUES ('31', null, '0', 'LOGIN', '2014-10-26 03:35:57', null);
INSERT INTO `log_story` VALUES ('32', null, '1', 'LOGIN', '2014-10-26 03:45:42', null);
INSERT INTO `log_story` VALUES ('33', null, '1', 'LOGIN', '2014-10-26 08:34:24', null);
INSERT INTO `log_story` VALUES ('34', null, '0', 'LOGIN', '2014-10-27 03:14:27', null);
INSERT INTO `log_story` VALUES ('35', null, '0', 'LOGIN', '2014-10-27 03:44:21', null);
INSERT INTO `log_story` VALUES ('36', null, '0', 'LOGIN', '2014-10-27 04:47:05', null);
INSERT INTO `log_story` VALUES ('37', null, '0', 'LOGIN', '2014-10-27 05:50:03', null);
INSERT INTO `log_story` VALUES ('38', null, '0', 'LOGIN', '2014-10-27 07:03:48', null);
INSERT INTO `log_story` VALUES ('39', null, '0', 'LOGIN', '2014-10-29 02:35:02', null);
INSERT INTO `log_story` VALUES ('40', null, '0', 'LOGIN', '2014-10-30 09:58:00', null);
INSERT INTO `log_story` VALUES ('41', null, '0', 'LOGIN', '2014-10-31 04:20:17', null);
INSERT INTO `log_story` VALUES ('42', null, 'iqbal@bebas.com', 'LOGIN', '2014-10-31 04:43:51', null);
INSERT INTO `log_story` VALUES ('43', null, 'iqbal@bebas.com', 'LOGIN', '2014-10-31 04:47:12', null);
INSERT INTO `log_story` VALUES ('44', null, 'iqbal@bebas.com', 'LOGIN', '2014-10-31 07:07:07', null);
INSERT INTO `log_story` VALUES ('45', null, '1', 'LOGIN', '2014-11-01 07:31:36', null);
INSERT INTO `log_story` VALUES ('46', null, '0', 'LOGIN', '2014-11-03 02:39:56', null);
INSERT INTO `log_story` VALUES ('47', null, '0', 'LOGIN', '2014-11-03 03:41:07', null);
INSERT INTO `log_story` VALUES ('48', null, '0', 'LOGIN', '2014-11-03 05:17:59', null);
INSERT INTO `log_story` VALUES ('49', null, 'arbi@cifo.co.id', 'LOGIN', '2014-11-03 05:29:45', null);
INSERT INTO `log_story` VALUES ('50', null, '0', 'LOGIN', '2014-11-04 08:47:41', null);
INSERT INTO `log_story` VALUES ('51', null, 'arbi@cifo.co.id', 'LOGIN', '2014-11-07 02:04:08', null);
INSERT INTO `log_story` VALUES ('52', null, '0', 'LOGIN', '2014-11-21 03:54:18', null);
INSERT INTO `log_story` VALUES ('53', null, '0', 'LOGIN', '2014-11-24 02:26:45', null);
INSERT INTO `log_story` VALUES ('54', null, '0', 'LOGIN', '2014-11-24 03:34:19', null);
INSERT INTO `log_story` VALUES ('55', null, '0', 'LOGIN', '2014-11-24 04:40:48', null);
INSERT INTO `log_story` VALUES ('56', null, '0', 'LOGIN', '2014-11-24 06:51:32', null);
INSERT INTO `log_story` VALUES ('57', null, '0', 'LOGIN', '2014-11-24 09:04:24', null);
INSERT INTO `log_story` VALUES ('58', null, '1', 'LOGIN', '2014-11-24 09:04:57', null);
INSERT INTO `log_story` VALUES ('59', null, '1', 'LOGIN', '2014-11-24 10:08:12', null);
INSERT INTO `log_story` VALUES ('60', null, '0', 'LOGIN', '2014-11-25 02:47:15', null);
INSERT INTO `log_story` VALUES ('61', null, '1', 'LOGIN', '2014-11-25 02:49:12', null);
INSERT INTO `log_story` VALUES ('62', null, '0', 'LOGIN', '2014-11-25 03:36:54', null);
INSERT INTO `log_story` VALUES ('63', null, '1', 'LOGIN', '2014-11-25 04:27:41', null);
INSERT INTO `log_story` VALUES ('64', null, '0', 'LOGIN', '2014-11-25 05:25:03', null);
INSERT INTO `log_story` VALUES ('65', null, '1', 'LOGIN', '2014-11-25 05:28:30', null);
INSERT INTO `log_story` VALUES ('66', null, '0', 'LOGIN', '2014-11-25 05:38:01', null);
INSERT INTO `log_story` VALUES ('67', null, '1', 'LOGIN', '2014-11-25 05:39:52', null);
INSERT INTO `log_story` VALUES ('68', null, '1', 'LOGIN', '2014-11-25 07:08:40', null);
INSERT INTO `log_story` VALUES ('69', null, '1', 'LOGIN', '2014-11-25 08:09:31', null);
INSERT INTO `log_story` VALUES ('70', null, '0', 'LOGIN', '2014-11-25 08:10:38', null);
INSERT INTO `log_story` VALUES ('71', null, '0', 'LOGIN', '2014-11-26 07:31:26', null);
INSERT INTO `log_story` VALUES ('72', null, '0', 'LOGIN', '2014-11-27 03:05:51', null);
INSERT INTO `log_story` VALUES ('73', null, '0', 'LOGIN', '2014-12-01 03:37:44', null);
INSERT INTO `log_story` VALUES ('74', null, '0', 'LOGIN', '2014-11-27 09:03:06', null);
INSERT INTO `log_story` VALUES ('75', null, '0', 'LOGIN', '2014-11-27 09:13:38', null);
INSERT INTO `log_story` VALUES ('76', null, '0', 'LOGIN', '2014-11-28 08:09:52', null);
INSERT INTO `log_story` VALUES ('77', null, '0', 'LOGIN', '2014-11-28 09:02:58', null);
INSERT INTO `log_story` VALUES ('78', null, '0', 'LOGIN', '2014-11-28 09:06:36', null);
INSERT INTO `log_story` VALUES ('79', null, '0', 'LOGIN', '2014-11-28 09:19:11', null);
INSERT INTO `log_story` VALUES ('80', null, '0', 'LOGIN', '2014-11-28 09:35:43', null);
INSERT INTO `log_story` VALUES ('81', null, '0', 'LOGIN', '2014-12-01 02:39:48', null);
INSERT INTO `log_story` VALUES ('82', null, '0', 'LOGIN', '2014-12-12 02:46:02', null);
INSERT INTO `log_story` VALUES ('83', null, '0', 'LOGIN', '2014-12-12 03:46:11', null);
INSERT INTO `log_story` VALUES ('84', null, '0', 'LOGIN', '2014-12-12 04:38:32', null);
INSERT INTO `log_story` VALUES ('85', null, '0', 'LOGIN', '2014-12-12 04:40:56', null);
INSERT INTO `log_story` VALUES ('86', null, '0', 'LOGIN', '2014-12-12 08:12:26', null);
INSERT INTO `log_story` VALUES ('87', null, '0', 'LOGIN', '2014-12-15 02:32:03', null);
INSERT INTO `log_story` VALUES ('88', null, '0', 'LOGIN', '2014-12-15 02:36:54', null);
INSERT INTO `log_story` VALUES ('89', null, '0', 'LOGIN', '2014-12-15 05:31:34', null);
INSERT INTO `log_story` VALUES ('90', null, '0', 'LOGIN', '2014-12-15 09:36:04', null);
INSERT INTO `log_story` VALUES ('91', null, '0', 'LOGIN', '2014-12-19 02:31:00', null);
INSERT INTO `log_story` VALUES ('92', null, 'iqbal@cifo.co.id', 'LOGIN', '2014-12-19 02:40:12', null);
INSERT INTO `log_story` VALUES ('93', null, 'iqbal@cifo.co.id', 'LOGIN', '2014-12-19 03:19:13', null);
INSERT INTO `log_story` VALUES ('94', null, '0', 'LOGIN', '2014-12-19 03:43:54', null);
INSERT INTO `log_story` VALUES ('95', null, 'iqbal@cifo.co.id', 'LOGIN', '2014-12-19 09:29:15', null);
INSERT INTO `log_story` VALUES ('96', null, 'iqbal@cifo.co.id', 'LOGIN', '2014-12-19 09:33:25', null);
INSERT INTO `log_story` VALUES ('97', null, '0', 'LOGIN', '2014-12-19 09:59:53', null);
INSERT INTO `log_story` VALUES ('98', null, 'iqbal@cifo.co.id', 'LOGIN', '2014-12-19 10:01:01', null);
INSERT INTO `log_story` VALUES ('99', null, '0', 'LOGIN', '2014-12-19 10:52:08', null);
INSERT INTO `log_story` VALUES ('100', null, '0', 'LOGIN', '2015-01-07 07:44:23', null);
INSERT INTO `log_story` VALUES ('101', null, '0', 'LOGIN', '2015-01-13 02:40:49', null);
INSERT INTO `log_story` VALUES ('102', null, '0', 'LOGIN', '2015-01-13 04:21:18', null);
INSERT INTO `log_story` VALUES ('103', null, '0', 'LOGIN', '2015-01-13 04:27:56', null);
INSERT INTO `log_story` VALUES ('104', null, '0', 'LOGIN', '2015-01-13 04:47:17', null);
INSERT INTO `log_story` VALUES ('105', null, '0', 'LOGIN', '2015-01-13 07:07:18', null);
INSERT INTO `log_story` VALUES ('106', null, '0', 'LOGIN', '2015-01-13 07:09:57', null);
INSERT INTO `log_story` VALUES ('107', null, '0', 'LOGIN', '2015-01-13 07:33:41', null);

-- ----------------------------
-- Table structure for `mail_manager`
-- ----------------------------
DROP TABLE IF EXISTS `mail_manager`;
CREATE TABLE `mail_manager` (
  `mail_id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) DEFAULT NULL,
  `mail_name` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`mail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mail_manager
-- ----------------------------
INSERT INTO `mail_manager` VALUES ('1', 'muhamad iqbal', 'iqbal@cifo.co.id');
INSERT INTO `mail_manager` VALUES ('2', 'iqbal', 'iqbal@cifo.co.id');
INSERT INTO `mail_manager` VALUES ('3', null, 'arbi@cifo.co.id');
INSERT INTO `mail_manager` VALUES ('4', null, 'yudi@cifo.co.id');
INSERT INTO `mail_manager` VALUES ('5', null, 'sdeny@cmedia.co.id');
INSERT INTO `mail_manager` VALUES ('6', null, 'sdeny@cifo.co.id');
INSERT INTO `mail_manager` VALUES ('7', null, 'piepiet74@cifo.co.id');
INSERT INTO `mail_manager` VALUES ('8', null, 'yudi@cifo.net.id');
INSERT INTO `mail_manager` VALUES ('9', 'rizal', 'rizal_syam2003@yahoo.com');
INSERT INTO `mail_manager` VALUES ('10', null, 'arbi@cmedia.co.id');
INSERT INTO `mail_manager` VALUES ('11', 'Arbi A.', 'arbi@cifo.co.id');
INSERT INTO `mail_manager` VALUES ('12', null, 'sdeny@yahoo.com');
INSERT INTO `mail_manager` VALUES ('13', null, 'yudi.hermayadi@gmail.com');
INSERT INTO `mail_manager` VALUES ('14', null, 'meydzie@yahoo.com');
INSERT INTO `mail_manager` VALUES ('15', null, 'nengrestu@yahoo.co.id');
INSERT INTO `mail_manager` VALUES ('16', null, 'nengrestuu@gmail.com');
INSERT INTO `mail_manager` VALUES ('17', null, 'restu@cifo.co.id');
INSERT INTO `mail_manager` VALUES ('18', null, 'yudi@cmedia.co.id');
INSERT INTO `mail_manager` VALUES ('19', null, 'abeyx7@gmail.com');

-- ----------------------------
-- Table structure for `mail_server`
-- ----------------------------
DROP TABLE IF EXISTS `mail_server`;
CREATE TABLE `mail_server` (
  `mail_id` int(10) NOT NULL AUTO_INCREMENT,
  `mail_outgoing_server` varchar(30) DEFAULT NULL,
  `mail_username` varchar(30) DEFAULT NULL,
  `mail_password` varchar(50) DEFAULT NULL,
  `mail_from` varchar(30) DEFAULT NULL,
  `mail_sender` varchar(50) DEFAULT NULL,
  `mail_group` varchar(30) DEFAULT NULL,
  `mail_to` varchar(30) DEFAULT NULL,
  `mail_cc` varchar(30) DEFAULT NULL,
  `mail_flag_attachment` int(2) DEFAULT NULL COMMENT '1: yes, 2: no',
  `mail_content` longtext,
  PRIMARY KEY (`mail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mail_server
-- ----------------------------
INSERT INTO `mail_server` VALUES ('1', 'mail.walanja.co.id', 'opt@walanja.co.id', 'bandung', 'walanja.co.id', 'System booking walanja', '', '', '', '1', '');

-- ----------------------------
-- Table structure for `markers`
-- ----------------------------
DROP TABLE IF EXISTS `markers`;
CREATE TABLE `markers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of markers
-- ----------------------------
INSERT INTO `markers` VALUES ('1', 'Hotel Garden Permata', '1521 1st Ave, Seattle, WA', '-6.883348', '107.580124', 'hotel');

-- ----------------------------
-- Table structure for `menu_horizon`
-- ----------------------------
DROP TABLE IF EXISTS `menu_horizon`;
CREATE TABLE `menu_horizon` (
  `hoz_menu_id` int(10) NOT NULL AUTO_INCREMENT,
  `hoz_menu_nama` varchar(50) DEFAULT '0',
  `hoz_menu_link` varchar(50) DEFAULT '0',
  `hoz_menu_icon` varchar(15) NOT NULL,
  PRIMARY KEY (`hoz_menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of menu_horizon
-- ----------------------------
INSERT INTO `menu_horizon` VALUES ('1', 'Config Data', 'm_master', 'fa fa-list');
INSERT INTO `menu_horizon` VALUES ('2', 'Data Master', 'm_masterage', 'fa fa-list');
INSERT INTO `menu_horizon` VALUES ('3', 'Agent Data Master', 'm_agent', 'fa fa-book');
INSERT INTO `menu_horizon` VALUES ('4', 'Transaksi', 'trs_penawaran', 'fa fa-money');
INSERT INTO `menu_horizon` VALUES ('5', 'Admin', 'admin', 'fa fa-user');
INSERT INTO `menu_horizon` VALUES ('6', '&nbsp;', 'u_pass', '');
INSERT INTO `menu_horizon` VALUES ('7', 'Operator', 'trs_operator', 'fa fa-book');
INSERT INTO `menu_horizon` VALUES ('8', 'Laporan', 'laporan', 'fa fa-list');

-- ----------------------------
-- Table structure for `menu_vertical`
-- ----------------------------
DROP TABLE IF EXISTS `menu_vertical`;
CREATE TABLE `menu_vertical` (
  `ver_menu_id` int(10) NOT NULL AUTO_INCREMENT,
  `hoz_menu_id` int(10) DEFAULT NULL,
  `ver_menu_nama` varchar(50) DEFAULT '0',
  `ver_menu_link_page` varchar(50) DEFAULT '0',
  PRIMARY KEY (`ver_menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of menu_vertical
-- ----------------------------
INSERT INTO `menu_vertical` VALUES ('1', '1', 'Agent Group', 'agent_group');
INSERT INTO `menu_vertical` VALUES ('2', '1', 'Agent Jenis', 'agent_jenis');
INSERT INTO `menu_vertical` VALUES ('3', '1', 'Master Agent', 'mst_agntrav');
INSERT INTO `menu_vertical` VALUES ('21', '5', 'Pengaturan Hak Akses', 'mst_hakakses');
INSERT INTO `menu_vertical` VALUES ('22', '5', 'Daftar Pengguna', 'mst_pengguna');
INSERT INTO `menu_vertical` VALUES ('41', '2', 'Master Hotel', 'mst_hotel');
INSERT INTO `menu_vertical` VALUES ('42', '2', 'Master Transport', 'mst_transport');
INSERT INTO `menu_vertical` VALUES ('43', '2', 'Tempat Hiburan', 'mst_dest');
INSERT INTO `menu_vertical` VALUES ('44', '4', 'Transaksi Pemesanan', 'det_kebutuhan');
INSERT INTO `menu_vertical` VALUES ('45', '4', 'Penawaran Harga', 'det_penawaran');
INSERT INTO `menu_vertical` VALUES ('46', '4', 'Persetujuan Penawaran', 'acc_penawaran');
INSERT INTO `menu_vertical` VALUES ('47', '2', 'Tempat Kuliner', 'mst_kuliner');
INSERT INTO `menu_vertical` VALUES ('48', '7', 'Persetujuan Pemesanan', 'trs_acc');
INSERT INTO `menu_vertical` VALUES ('49', '5', 'Mail Server', 'mail');
INSERT INTO `menu_vertical` VALUES ('51', '3', 'Deposit', 'deposit');
INSERT INTO `menu_vertical` VALUES ('53', '2', 'Master Fasilitas ', 'mst_fasilitas');
INSERT INTO `menu_vertical` VALUES ('54', '8', 'Lap Penjualan', 'lap_penjualan');
INSERT INTO `menu_vertical` VALUES ('55', '6', 'Password', 'password');
INSERT INTO `menu_vertical` VALUES ('56', '8', 'Lap Pemesanan', 'lap_pemesanan');
INSERT INTO `menu_vertical` VALUES ('57', '8', 'Lap Check-in', 'lap_checkin');

-- ----------------------------
-- Table structure for `mst_galery`
-- ----------------------------
DROP TABLE IF EXISTS `mst_galery`;
CREATE TABLE `mst_galery` (
  `galery_id` int(20) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(20) DEFAULT NULL,
  `galery_name` varchar(225) DEFAULT NULL,
  `galery_image` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`galery_id`)
) ENGINE=MyISAM AUTO_INCREMENT=141 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mst_galery
-- ----------------------------
INSERT INTO `mst_galery` VALUES ('28', '22', '', 'malaka5.jpg');
INSERT INTO `mst_galery` VALUES ('27', '22', '', 'malaka4.jpg');
INSERT INTO `mst_galery` VALUES ('26', '22', '', 'malaka3.jpg');
INSERT INTO `mst_galery` VALUES ('25', '22', '', 'malaka2.jpg');
INSERT INTO `mst_galery` VALUES ('24', '22', '', 'malaka1.jpg');
INSERT INTO `mst_galery` VALUES ('33', '25', '', 'pop3.jpg');
INSERT INTO `mst_galery` VALUES ('32', '25', '', 'pop2.jpg');
INSERT INTO `mst_galery` VALUES ('31', '25', '', 'pop1.jpg');
INSERT INTO `mst_galery` VALUES ('38', '27', '', 'vio3.jpg');
INSERT INTO `mst_galery` VALUES ('37', '27', '', 'vio2.jpg');
INSERT INTO `mst_galery` VALUES ('36', '27', '', 'vio1.jpg');
INSERT INTO `mst_galery` VALUES ('29', '22', '', 'malaka6.jpg');
INSERT INTO `mst_galery` VALUES ('30', '22', '', 'malaka7.jpg');
INSERT INTO `mst_galery` VALUES ('34', '25', '', 'pop4.jpg');
INSERT INTO `mst_galery` VALUES ('35', '25', '', 'pop5.jpg');
INSERT INTO `mst_galery` VALUES ('39', '27', '', 'vio4.jpg');
INSERT INTO `mst_galery` VALUES ('40', '27', '', 'vio5.jpg');
INSERT INTO `mst_galery` VALUES ('41', '30', '', 'batoe1.jpg');
INSERT INTO `mst_galery` VALUES ('42', '30', '', 'batoe2.jpg');
INSERT INTO `mst_galery` VALUES ('43', '30', '', 'batoe3.jpg');
INSERT INTO `mst_galery` VALUES ('44', '30', '', 'batoe4.jpg');
INSERT INTO `mst_galery` VALUES ('45', '30', '', 'batoe5.jpg');
INSERT INTO `mst_galery` VALUES ('46', '30', '', 'batoe6.jpg');
INSERT INTO `mst_galery` VALUES ('47', '30', '', 'batoe7.jpg');
INSERT INTO `mst_galery` VALUES ('48', '30', '', 'batoe8.jpg');
INSERT INTO `mst_galery` VALUES ('49', '30', '', 'batoe9.jpg');
INSERT INTO `mst_galery` VALUES ('50', '30', '', 'batoe10.jpg');
INSERT INTO `mst_galery` VALUES ('51', '32', '', 'park1.jpg');
INSERT INTO `mst_galery` VALUES ('52', '32', '', 'park2.jpg');
INSERT INTO `mst_galery` VALUES ('53', '32', '', 'park3.jpg');
INSERT INTO `mst_galery` VALUES ('54', '32', '', 'park4.jpg');
INSERT INTO `mst_galery` VALUES ('55', '32', '', 'park5.jpg');
INSERT INTO `mst_galery` VALUES ('56', '32', '', 'park6.jpg');
INSERT INTO `mst_galery` VALUES ('57', '32', '', 'park7.jpg');
INSERT INTO `mst_galery` VALUES ('58', '32', '', 'park8.jpg');
INSERT INTO `mst_galery` VALUES ('59', '32', '', 'park9.jpg');
INSERT INTO `mst_galery` VALUES ('60', '32', '', 'park10.jpg');
INSERT INTO `mst_galery` VALUES ('61', '32', '', 'park11.jpg');
INSERT INTO `mst_galery` VALUES ('62', '32', '', 'park12.jpg');
INSERT INTO `mst_galery` VALUES ('63', '32', '', 'park13.jpg');
INSERT INTO `mst_galery` VALUES ('64', '32', '', 'park14.jpg');
INSERT INTO `mst_galery` VALUES ('65', '32', '', 'park15.jpg');
INSERT INTO `mst_galery` VALUES ('66', '33', '', 'travel1.jpg');
INSERT INTO `mst_galery` VALUES ('67', '33', '', 'travel2.jpg');
INSERT INTO `mst_galery` VALUES ('68', '33', '', 'travel3.jpg');
INSERT INTO `mst_galery` VALUES ('69', '33', '', 'travel4.jpg');
INSERT INTO `mst_galery` VALUES ('70', '33', '', 'travel5.jpg');
INSERT INTO `mst_galery` VALUES ('71', '33', '', 'travel6.jpg');
INSERT INTO `mst_galery` VALUES ('72', '33', '', 'travel7.jpg');
INSERT INTO `mst_galery` VALUES ('73', '33', '', 'travel8.jpg');
INSERT INTO `mst_galery` VALUES ('74', '33', '', 'travel9.jpg');
INSERT INTO `mst_galery` VALUES ('75', '33', '', 'travel10.jpg');
INSERT INTO `mst_galery` VALUES ('76', '33', '', 'travel11.jpg');
INSERT INTO `mst_galery` VALUES ('77', '33', '', 'travel12.jpg');
INSERT INTO `mst_galery` VALUES ('78', '33', '', 'travel13.jpg');
INSERT INTO `mst_galery` VALUES ('79', '33', '', 'travel14.jpg');
INSERT INTO `mst_galery` VALUES ('80', '33', '', 'travel15.jpg');
INSERT INTO `mst_galery` VALUES ('81', '33', '', 'travel16.jpg');
INSERT INTO `mst_galery` VALUES ('82', '33', '', 'travel17.jpg');
INSERT INTO `mst_galery` VALUES ('83', '33', '', 'travel18.jpg');
INSERT INTO `mst_galery` VALUES ('84', '33', '', 'travel19.jpg');
INSERT INTO `mst_galery` VALUES ('85', '33', '', 'travel20.jpg');
INSERT INTO `mst_galery` VALUES ('86', '33', '', 'travel21.jpg');
INSERT INTO `mst_galery` VALUES ('87', '33', '', 'travel22.jpg');
INSERT INTO `mst_galery` VALUES ('88', '34', '', 'harris1.jpg');
INSERT INTO `mst_galery` VALUES ('89', '34', '', 'harris2.jpg');
INSERT INTO `mst_galery` VALUES ('90', '34', '', 'harris3.jpg');
INSERT INTO `mst_galery` VALUES ('91', '34', '', 'harris4.jpg');
INSERT INTO `mst_galery` VALUES ('92', '34', '', 'harris5.jpg');
INSERT INTO `mst_galery` VALUES ('93', '34', '', 'harris6.jpg');
INSERT INTO `mst_galery` VALUES ('94', '34', '', 'harris7.jpg');
INSERT INTO `mst_galery` VALUES ('95', '34', '', 'harris8.jpg');
INSERT INTO `mst_galery` VALUES ('96', '34', '', 'harris9.jpg');
INSERT INTO `mst_galery` VALUES ('97', '34', '', 'harris10.jpg');
INSERT INTO `mst_galery` VALUES ('98', '34', '', 'harris11.jpg');
INSERT INTO `mst_galery` VALUES ('99', '34', '', 'harris12.jpg');
INSERT INTO `mst_galery` VALUES ('100', '34', '', 'harris13.jpg');
INSERT INTO `mst_galery` VALUES ('101', '34', '', 'harris14.jpg');
INSERT INTO `mst_galery` VALUES ('102', '34', '', 'harris15.jpg');
INSERT INTO `mst_galery` VALUES ('103', '34', '', 'harris16.jpg');
INSERT INTO `mst_galery` VALUES ('105', '35', '', 'garden16.jpg');
INSERT INTO `mst_galery` VALUES ('106', '35', '', 'garden1.jpg');
INSERT INTO `mst_galery` VALUES ('107', '35', '', 'garden2.jpg');
INSERT INTO `mst_galery` VALUES ('108', '35', '', 'garden3.jpg');
INSERT INTO `mst_galery` VALUES ('109', '35', '', 'garden4.jpg');
INSERT INTO `mst_galery` VALUES ('110', '35', '', 'garden5.jpg');
INSERT INTO `mst_galery` VALUES ('111', '35', '', 'garden6.jpg');
INSERT INTO `mst_galery` VALUES ('112', '35', '', 'garden7.jpg');
INSERT INTO `mst_galery` VALUES ('113', '35', '', 'garden8.jpg');
INSERT INTO `mst_galery` VALUES ('114', '35', '', 'garden9.jpg');
INSERT INTO `mst_galery` VALUES ('115', '35', '', 'garden10.jpg');
INSERT INTO `mst_galery` VALUES ('116', '35', '', 'garden11.jpg');
INSERT INTO `mst_galery` VALUES ('117', '35', '', 'garden12.jpg');
INSERT INTO `mst_galery` VALUES ('118', '35', '', 'garden13.jpg');
INSERT INTO `mst_galery` VALUES ('119', '35', '', 'garden14.jpg');
INSERT INTO `mst_galery` VALUES ('120', '35', '', 'garden15.jpg');
INSERT INTO `mst_galery` VALUES ('121', '35', '', 'garden17.jpg');
INSERT INTO `mst_galery` VALUES ('122', '35', '', 'garden18.jpg');
INSERT INTO `mst_galery` VALUES ('123', '36', '', 'horison2.jpg');
INSERT INTO `mst_galery` VALUES ('124', '36', '', 'horison3.jpg');
INSERT INTO `mst_galery` VALUES ('125', '36', '', 'horison5.jpg');
INSERT INTO `mst_galery` VALUES ('126', '36', '', 'horison6.jpg');
INSERT INTO `mst_galery` VALUES ('127', '36', '', 'horison7.jpg');
INSERT INTO `mst_galery` VALUES ('128', '36', '', 'horison8.jpg');
INSERT INTO `mst_galery` VALUES ('129', '36', '', 'horison9.jpg');
INSERT INTO `mst_galery` VALUES ('130', '36', '', 'horison10.jpg');
INSERT INTO `mst_galery` VALUES ('131', '36', '', 'horison11.jpg');
INSERT INTO `mst_galery` VALUES ('132', '36', '', 'horison12.jpg');
INSERT INTO `mst_galery` VALUES ('133', '36', '', 'horison13.jpg');
INSERT INTO `mst_galery` VALUES ('134', '36', '', 'horison15.jpg');
INSERT INTO `mst_galery` VALUES ('135', '37', '', 'maxone1.jpg');
INSERT INTO `mst_galery` VALUES ('136', '37', '', 'maxone2.jpg');
INSERT INTO `mst_galery` VALUES ('137', '37', '', 'maxone3.jpg');
INSERT INTO `mst_galery` VALUES ('138', '37', '', 'maxone4.jpg');
INSERT INTO `mst_galery` VALUES ('139', '37', '', 'maxone5.jpg');
INSERT INTO `mst_galery` VALUES ('140', '37', '', 'maxone6.jpg');

-- ----------------------------
-- Table structure for `mst_jabatan`
-- ----------------------------
DROP TABLE IF EXISTS `mst_jabatan`;
CREATE TABLE `mst_jabatan` (
  `jabatan_id` int(11) NOT NULL AUTO_INCREMENT,
  `gud_dep_id` int(10) NOT NULL,
  `jabatan_nama` varchar(50) NOT NULL,
  `jabatan_deskripsi` text NOT NULL,
  PRIMARY KEY (`jabatan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mst_jabatan
-- ----------------------------
INSERT INTO `mst_jabatan` VALUES ('1', '1', 'Administrator', 'Administrator');
INSERT INTO `mst_jabatan` VALUES ('13', '2', 'Agent Travel', 'User ini untuk diberikan pada pihak agent untuk dipakai penjualan');
INSERT INTO `mst_jabatan` VALUES ('14', '6', 'Hotel Agent', 'User ini diberikan pada pihak hotel untuk mengupdate ketersediaan kamarnya');
INSERT INTO `mst_jabatan` VALUES ('15', '1', 'Operator', '');

-- ----------------------------
-- Table structure for `mst_karyawan`
-- ----------------------------
DROP TABLE IF EXISTS `mst_karyawan`;
CREATE TABLE `mst_karyawan` (
  `kar_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kar_email` varchar(32) NOT NULL,
  `kar_fax` varchar(15) NOT NULL,
  `kar_kode` char(30) DEFAULT NULL,
  `kar_nama` varchar(50) DEFAULT NULL,
  `kar_identitas` varchar(50) DEFAULT NULL,
  `kar_alamat` varchar(200) DEFAULT NULL,
  `kar_kota` varchar(50) DEFAULT NULL,
  `kar_telepon1` varchar(20) DEFAULT NULL,
  `kar_telepon2` varchar(20) DEFAULT NULL,
  `insert_log` varchar(50) NOT NULL,
  `edit_log` varchar(50) DEFAULT NULL,
  `jabatan_id` int(20) DEFAULT NULL,
  `id_kat_agent` int(11) NOT NULL,
  `komisi` decimal(10,0) NOT NULL,
  `total_deposit` decimal(50,0) DEFAULT NULL,
  PRIMARY KEY (`kar_id`),
  KEY `fk_customer_category` (`kar_identitas`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mst_karyawan
-- ----------------------------
INSERT INTO `mst_karyawan` VALUES ('1', '', '', 'OP-001', 'Administrator', '00000000000000000', 'jl. Bagus Rangin 8, Bandung', null, '', '', '', null, '1', '1', '0', null);
INSERT INTO `mst_karyawan` VALUES ('13', 'ulan@cifo.co.id', '0226035475', 'AGT-05', 'Wiwin', '5555', ' Situ Aksan', null, '0226035475', '085759017773', '', null, '13', '15', '0', '2250000');
INSERT INTO `mst_karyawan` VALUES ('10', 'restu@cmedia.co.id', '02292914003    ', 'AGT-02', 'Restu', '', '  Cililin ', null, '02292914001  ', '02292914002', '', null, '13', '13', '0', '3138000');
INSERT INTO `mst_karyawan` VALUES ('9', 'badriyah@cmedia.co.id', '02292914003', 'AGT-01', 'Badriyah', '001', '    Cimahi', null, '02292914001', '02292914002', '', null, '13', '12', '0', '2198000');
INSERT INTO `mst_karyawan` VALUES ('11', 'arbi@cifo.co.id', '02292914003', 'AGT-03', 'Arbi', '003', ' Pangalengan', null, '02292914001', '02292914002', '', null, '13', '14', '0', '1594000');
INSERT INTO `mst_karyawan` VALUES ('12', 'iqbal@cifo.co.id', '02292914003', 'AGT-04', 'Iqbal', '004', ' Sukabumi', null, '02292914001', '02292914002', '', null, '13', '15', '0', '1184000');
INSERT INTO `mst_karyawan` VALUES ('14', 'tari@cifo.co.id', '0226035475', 'AGT-06', 'Mentari', '6666', ' Ciroyom', null, '0226035475', '085759017773', '', null, '13', '13', '0', '1384000');
INSERT INTO `mst_karyawan` VALUES ('15', 'yudi@cifo.co.id', '0226035475', 'AGT-07', 'Yudi', '7777', ' Sukagalih', null, '0226035475', '085759017773', '', null, '13', '14', '0', '1062000');
INSERT INTO `mst_karyawan` VALUES ('16', 'cf1@cifo.co.id', '02292914001', 'AGT-00', 'Sony Setiadi', '0000', ' Paledang', null, '02292914001', '02292914002', '', null, '13', '15', '0', '7180000');
INSERT INTO `mst_karyawan` VALUES ('22', 'cleopatralovepharaoh@gmail.com', '02292914001  ', 'HTL-001', 'Malaka', '', '     Palasari', null, '02292914001 ', '02292914002', '', null, '14', '0', '0', '974000');
INSERT INTO `mst_karyawan` VALUES ('23', 'yudi@cifo.co.id', '02292914001', 'HTL-002', 'Pop', '0202', ' Peta', null, '02292914001', '02292914002', '', null, '14', '0', '0', '-984000');
INSERT INTO `mst_karyawan` VALUES ('24', 'yudi@cifo.co.id', '02292914001', 'HTL-003', 'Vio', '0303', ' Pasteur', null, '02292914001', '02292914002', '', null, '14', '0', '0', null);
INSERT INTO `mst_karyawan` VALUES ('25', 'yudi@cifo.co.id', '02292914001', 'HTL-004', 'Batoe', '0404', ' Paskal', null, '02292914001 ', '02292914002', '', null, '14', '0', '0', null);
INSERT INTO `mst_karyawan` VALUES ('26', 'yudi@cifo.co.id', '02292914001', 'HTL-005', 'Park', '0505', ' Suci', null, '02292914001', '02292914002', '', null, '14', '0', '0', null);
INSERT INTO `mst_karyawan` VALUES ('27', 'yudi@cifo.co.id', '02292914001', 'HTL-006', 'Travel', '0606', ' Setiabudi', null, '02292914001', '02292914002', '', null, '14', '0', '0', null);
INSERT INTO `mst_karyawan` VALUES ('28', 'yudi@cifo.co.id', '02292914001', 'HTL-007', 'Harris', '0707', ' Peta', null, '02292914001', '02292914002', '', null, '14', '0', '0', null);
INSERT INTO `mst_karyawan` VALUES ('29', 'yudi@cifo.co.id', '02292914001', 'HTL-008', 'Garden', '0808', ' Setrasari', null, '02292914001', '02292914002', '', null, '14', '0', '0', null);
INSERT INTO `mst_karyawan` VALUES ('30', 'yudi@cifo.co.id', '02292914001', 'HTL-009', 'Horison', '0909', ' Bubat', null, '02292914001', '02292914002', '', null, '14', '0', '0', null);
INSERT INTO `mst_karyawan` VALUES ('31', 'cleopatralovepharaoh@gmail.com', '02292914001  ', 'HTL-010', 'Maxone', '', '    Soekarno Hatta', null, '085759017773', '02292914002', '', null, '14', '0', '0', '6580000');

-- ----------------------------
-- Table structure for `mst_kategori_agent`
-- ----------------------------
DROP TABLE IF EXISTS `mst_kategori_agent`;
CREATE TABLE `mst_kategori_agent` (
  `id_kat_agent` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `potongan` double DEFAULT NULL,
  `kar_id` int(11) NOT NULL,
  `kategori_agent` char(10) NOT NULL,
  PRIMARY KEY (`id_kat_agent`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mst_kategori_agent
-- ----------------------------
INSERT INTO `mst_kategori_agent` VALUES ('12', '10000', '0', 'Bronze');
INSERT INTO `mst_kategori_agent` VALUES ('13', '20000', '0', 'Silver');
INSERT INTO `mst_kategori_agent` VALUES ('14', '30000', '0', 'Gold');
INSERT INTO `mst_kategori_agent` VALUES ('15', '40000', '0', 'Diamond');

-- ----------------------------
-- Table structure for `m_amenities`
-- ----------------------------
DROP TABLE IF EXISTS `m_amenities`;
CREATE TABLE `m_amenities` (
  `ame_id` int(20) NOT NULL AUTO_INCREMENT,
  `ame_nama` varchar(50) DEFAULT NULL,
  `ame_desk` text,
  `date_input` datetime DEFAULT NULL,
  PRIMARY KEY (`ame_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_amenities
-- ----------------------------
INSERT INTO `m_amenities` VALUES ('1', 'Resepsionis 24 jam', 'Climate control', '2014-09-26 15:46:20');
INSERT INTO `m_amenities` VALUES ('2', 'Bar', 'Air conditioning', '2014-09-26 15:46:20');
INSERT INTO `m_amenities` VALUES ('3', 'Sarapan berbiaya', 'Direct-dial phone', '2014-09-26 15:46:20');
INSERT INTO `m_amenities` VALUES ('4', 'Surat kabar di lobby', 'Minibar', '2014-09-26 15:46:20');
INSERT INTO `m_amenities` VALUES ('5', 'Fasilitas komputer', 'Wake-up calls', '2014-09-26 15:46:20');
INSERT INTO `m_amenities` VALUES ('6', 'Laundry', 'Daily housekeeping', '2014-09-26 15:46:20');
INSERT INTO `m_amenities` VALUES ('7', 'Lift', 'Private bathroom', '2014-09-26 15:46:20');
INSERT INTO `m_amenities` VALUES ('8', 'WiFi di area umum', 'Hair dryer', '2014-09-26 15:46:20');
INSERT INTO `m_amenities` VALUES ('9', 'Internet LAN', 'Makeup/shaving mirror', '2014-09-26 15:46:20');
INSERT INTO `m_amenities` VALUES ('10', 'Kamar aksesibel bagi penyandang disabilitas', 'Shower/tub combination', '2014-09-26 15:46:20');
INSERT INTO `m_amenities` VALUES ('11', 'Penitipan bagasi', 'Satellite TV service', '2014-09-26 15:46:20');
INSERT INTO `m_amenities` VALUES ('12', 'Staff multibahasa', 'Electronic/magnetic keys', '2014-09-26 15:46:20');
INSERT INTO `m_amenities` VALUES ('13', 'Parkir berbiaya', 'Parkir berbiaya', '2014-11-20 09:33:35');
INSERT INTO `m_amenities` VALUES ('14', 'Restoran', 'Restoran', '2014-11-20 09:33:35');
INSERT INTO `m_amenities` VALUES ('15', 'Layanan kamar', 'Layanan kamar', '2014-11-20 09:33:35');
INSERT INTO `m_amenities` VALUES ('16', 'Layanan kamar 24 jam', 'Layanan kamar 24 jam', '2014-11-20 09:33:35');
INSERT INTO `m_amenities` VALUES ('17', 'Penitipan anak', 'Penitipan anak', '2014-11-20 09:33:35');
INSERT INTO `m_amenities` VALUES ('18', 'Sewa mobil', 'Sewa mobil', '2014-11-20 09:33:35');
INSERT INTO `m_amenities` VALUES ('19', 'Concierge/layanan tamu', 'Concierge/layanan tamu', '2014-11-20 09:33:35');
INSERT INTO `m_amenities` VALUES ('20', 'Valas', 'Valas', '2014-11-20 09:33:35');
INSERT INTO `m_amenities` VALUES ('21', 'Check-in ekspress', 'Check-in ekspress', '2014-11-20 09:33:35');
INSERT INTO `m_amenities` VALUES ('22', 'Fasilitas rapat', 'Fasilitas rapat', '2014-11-20 09:33:35');
INSERT INTO `m_amenities` VALUES ('23', 'Surat kabar', 'Surat kabar', '2014-11-20 09:33:35');
INSERT INTO `m_amenities` VALUES ('24', 'Brankas', 'Brankas', '2014-11-20 09:33:35');
INSERT INTO `m_amenities` VALUES ('25', 'Area merokok', 'Area merokok', '2014-11-20 09:33:35');
INSERT INTO `m_amenities` VALUES ('26', 'Layanan pijat', 'Layanan pijat', '2014-11-20 09:33:35');
INSERT INTO `m_amenities` VALUES ('27', 'Area parkir', 'Area parkir', '2014-11-20 09:33:35');

-- ----------------------------
-- Table structure for `m_country`
-- ----------------------------
DROP TABLE IF EXISTS `m_country`;
CREATE TABLE `m_country` (
  `count_id` int(20) NOT NULL AUTO_INCREMENT,
  `count_kode` varchar(20) DEFAULT NULL,
  `count_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`count_id`)
) ENGINE=InnoDB AUTO_INCREMENT=254 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_country
-- ----------------------------
INSERT INTO `m_country` VALUES ('1', '1', 'Afghanistan');
INSERT INTO `m_country` VALUES ('2', '2', 'Akrotiri');
INSERT INTO `m_country` VALUES ('3', '3', 'Albania');
INSERT INTO `m_country` VALUES ('4', '4', 'Algeria');
INSERT INTO `m_country` VALUES ('5', '5', 'American Samoa');
INSERT INTO `m_country` VALUES ('6', '6', 'Andorra');
INSERT INTO `m_country` VALUES ('7', '7', 'Angola');
INSERT INTO `m_country` VALUES ('8', '8', 'Anguilla');
INSERT INTO `m_country` VALUES ('9', '9', 'Antigua and Barbuda');
INSERT INTO `m_country` VALUES ('10', '10', 'Argentina');
INSERT INTO `m_country` VALUES ('11', '11', 'Armenia');
INSERT INTO `m_country` VALUES ('12', '12', 'Aruba');
INSERT INTO `m_country` VALUES ('13', '13', 'Ashmore and Cartier Islands');
INSERT INTO `m_country` VALUES ('14', '14', 'Australia');
INSERT INTO `m_country` VALUES ('15', '15', 'Austria');
INSERT INTO `m_country` VALUES ('16', '16', 'Azerbaijan');
INSERT INTO `m_country` VALUES ('17', '17', 'Bahamas');
INSERT INTO `m_country` VALUES ('18', '18', 'Bahrain');
INSERT INTO `m_country` VALUES ('19', '19', 'Baker Island');
INSERT INTO `m_country` VALUES ('20', '20', 'Bangladesh');
INSERT INTO `m_country` VALUES ('21', '21', 'Barbados');
INSERT INTO `m_country` VALUES ('22', '22', 'Belarus');
INSERT INTO `m_country` VALUES ('23', '23', 'Belgium');
INSERT INTO `m_country` VALUES ('24', '24', 'Belize');
INSERT INTO `m_country` VALUES ('25', '25', 'Benin');
INSERT INTO `m_country` VALUES ('26', '26', 'Bermuda');
INSERT INTO `m_country` VALUES ('27', '27', 'Bhutan');
INSERT INTO `m_country` VALUES ('28', '28', 'Bolivia');
INSERT INTO `m_country` VALUES ('29', '29', 'Bosnia and Herzegovina');
INSERT INTO `m_country` VALUES ('30', '30', 'Botswana');
INSERT INTO `m_country` VALUES ('31', '31', 'Bouvet Island');
INSERT INTO `m_country` VALUES ('32', '32', 'Brazil');
INSERT INTO `m_country` VALUES ('33', '33', 'British Indian Ocean Territory');
INSERT INTO `m_country` VALUES ('34', '34', 'British Virgin Islands');
INSERT INTO `m_country` VALUES ('35', '35', 'Brunei');
INSERT INTO `m_country` VALUES ('36', '36', 'Bulgaria');
INSERT INTO `m_country` VALUES ('37', '37', 'Burkina Faso');
INSERT INTO `m_country` VALUES ('38', '38', 'Burma');
INSERT INTO `m_country` VALUES ('39', '39', 'Burundi');
INSERT INTO `m_country` VALUES ('40', '40', 'Cambodia');
INSERT INTO `m_country` VALUES ('41', '41', 'Cameroon');
INSERT INTO `m_country` VALUES ('42', '42', 'Canada');
INSERT INTO `m_country` VALUES ('43', '43', 'Cape Verde');
INSERT INTO `m_country` VALUES ('44', '44', 'Cayman Islands');
INSERT INTO `m_country` VALUES ('45', '45', 'Central African Republic');
INSERT INTO `m_country` VALUES ('46', '46', 'Chad');
INSERT INTO `m_country` VALUES ('47', '47', 'Chile');
INSERT INTO `m_country` VALUES ('48', '48', 'China');
INSERT INTO `m_country` VALUES ('49', '49', 'Christmas Island');
INSERT INTO `m_country` VALUES ('50', '50', 'Clipperton Island');
INSERT INTO `m_country` VALUES ('51', '51', 'Cocos (Keeling) Islands');
INSERT INTO `m_country` VALUES ('52', '52', 'Colombia');
INSERT INTO `m_country` VALUES ('53', '53', 'Comoros');
INSERT INTO `m_country` VALUES ('54', '54', 'Congo');
INSERT INTO `m_country` VALUES ('55', '55', 'Cook Islands');
INSERT INTO `m_country` VALUES ('56', '56', 'Coral Sea Islands');
INSERT INTO `m_country` VALUES ('57', '57', 'Costa Rica');
INSERT INTO `m_country` VALUES ('58', '58', 'Cote d Ivoire');
INSERT INTO `m_country` VALUES ('59', '59', 'Croatia');
INSERT INTO `m_country` VALUES ('60', '60', 'Cuba');
INSERT INTO `m_country` VALUES ('61', '61', 'Cyprus');
INSERT INTO `m_country` VALUES ('62', '62', 'Czech Republic');
INSERT INTO `m_country` VALUES ('63', '63', 'Denmark');
INSERT INTO `m_country` VALUES ('64', '64', 'Dhekelia');
INSERT INTO `m_country` VALUES ('65', '65', 'Djibouti');
INSERT INTO `m_country` VALUES ('66', '66', 'Dominica');
INSERT INTO `m_country` VALUES ('67', '67', 'Dominican Republic');
INSERT INTO `m_country` VALUES ('68', '68', 'Ecuador flag');
INSERT INTO `m_country` VALUES ('69', '69', 'Egypt');
INSERT INTO `m_country` VALUES ('70', '70', 'El Salvador');
INSERT INTO `m_country` VALUES ('71', '71', 'Equatorial Guinea');
INSERT INTO `m_country` VALUES ('72', '72', 'Eritrea');
INSERT INTO `m_country` VALUES ('73', '73', 'Estonia');
INSERT INTO `m_country` VALUES ('74', '74', 'Ethiopia');
INSERT INTO `m_country` VALUES ('75', '75', 'European Union');
INSERT INTO `m_country` VALUES ('76', '76', 'Falkland Islands flag');
INSERT INTO `m_country` VALUES ('77', '77', 'Faroe Islands');
INSERT INTO `m_country` VALUES ('78', '78', 'Fiji');
INSERT INTO `m_country` VALUES ('79', '79', 'Finland');
INSERT INTO `m_country` VALUES ('80', '80', 'France');
INSERT INTO `m_country` VALUES ('81', '81', 'French Polynesia');
INSERT INTO `m_country` VALUES ('82', '82', 'French Southern and Antarctic Lands');
INSERT INTO `m_country` VALUES ('83', '83', 'Gabon');
INSERT INTO `m_country` VALUES ('84', '84', 'Gambia');
INSERT INTO `m_country` VALUES ('85', '85', 'Georgia');
INSERT INTO `m_country` VALUES ('86', '86', 'Germany');
INSERT INTO `m_country` VALUES ('87', '87', 'Ghana');
INSERT INTO `m_country` VALUES ('88', '88', 'Gibraltar');
INSERT INTO `m_country` VALUES ('89', '89', 'Greece');
INSERT INTO `m_country` VALUES ('90', '90', 'Greenland');
INSERT INTO `m_country` VALUES ('91', '91', 'Grenada');
INSERT INTO `m_country` VALUES ('92', '92', 'Guam');
INSERT INTO `m_country` VALUES ('93', '93', 'Guatemala');
INSERT INTO `m_country` VALUES ('94', '94', 'Guernsey');
INSERT INTO `m_country` VALUES ('95', '95', 'Guinea Bissau');
INSERT INTO `m_country` VALUES ('96', '96', 'Guinea');
INSERT INTO `m_country` VALUES ('97', '97', 'Guyana');
INSERT INTO `m_country` VALUES ('98', '98', 'Haiti');
INSERT INTO `m_country` VALUES ('99', '99', 'Heard Island and McDonald Islands');
INSERT INTO `m_country` VALUES ('100', '100', 'Holy See');
INSERT INTO `m_country` VALUES ('101', '101', 'Honduras');
INSERT INTO `m_country` VALUES ('102', '102', 'Hong Kong');
INSERT INTO `m_country` VALUES ('103', '103', 'Howland Island');
INSERT INTO `m_country` VALUES ('104', '104', 'Hungary');
INSERT INTO `m_country` VALUES ('105', '105', 'Iceland');
INSERT INTO `m_country` VALUES ('106', '106', 'India');
INSERT INTO `m_country` VALUES ('107', '107', 'Indonesia');
INSERT INTO `m_country` VALUES ('108', '108', 'Iran');
INSERT INTO `m_country` VALUES ('109', '109', 'Iraq');
INSERT INTO `m_country` VALUES ('110', '110', 'Ireland');
INSERT INTO `m_country` VALUES ('111', '111', 'Isle of Man');
INSERT INTO `m_country` VALUES ('112', '112', 'Israel');
INSERT INTO `m_country` VALUES ('113', '113', 'Italy');
INSERT INTO `m_country` VALUES ('114', '114', 'Jamaica flag');
INSERT INTO `m_country` VALUES ('115', '115', 'Jan Mayen');
INSERT INTO `m_country` VALUES ('116', '116', 'Japan');
INSERT INTO `m_country` VALUES ('117', '117', 'Jarvis Island');
INSERT INTO `m_country` VALUES ('118', '118', 'Jersey');
INSERT INTO `m_country` VALUES ('119', '119', 'Johnston Atoll');
INSERT INTO `m_country` VALUES ('120', '120', 'Jordan');
INSERT INTO `m_country` VALUES ('121', '121', 'Kazakhstan');
INSERT INTO `m_country` VALUES ('122', '122', 'Kenya');
INSERT INTO `m_country` VALUES ('123', '123', 'Kingman Reef');
INSERT INTO `m_country` VALUES ('124', '124', 'Kiribati');
INSERT INTO `m_country` VALUES ('125', '125', 'Kuwait');
INSERT INTO `m_country` VALUES ('126', '126', 'Kyrgyzstan');
INSERT INTO `m_country` VALUES ('127', '127', 'Laos');
INSERT INTO `m_country` VALUES ('128', '128', 'Latvia');
INSERT INTO `m_country` VALUES ('129', '129', 'Lebanon');
INSERT INTO `m_country` VALUES ('130', '130', 'Lesotho');
INSERT INTO `m_country` VALUES ('131', '131', 'Liberia');
INSERT INTO `m_country` VALUES ('132', '132', 'Libya');
INSERT INTO `m_country` VALUES ('133', '133', 'Liechtenstein');
INSERT INTO `m_country` VALUES ('134', '134', 'Lithuania');
INSERT INTO `m_country` VALUES ('135', '135', 'Luxembourg');
INSERT INTO `m_country` VALUES ('136', '136', 'Macau');
INSERT INTO `m_country` VALUES ('137', '137', 'Macedonia');
INSERT INTO `m_country` VALUES ('138', '138', 'Madagascar');
INSERT INTO `m_country` VALUES ('139', '139', 'Malawi');
INSERT INTO `m_country` VALUES ('140', '140', 'Malaysia');
INSERT INTO `m_country` VALUES ('141', '141', 'Maldives');
INSERT INTO `m_country` VALUES ('142', '142', 'Mali');
INSERT INTO `m_country` VALUES ('143', '143', 'Malta');
INSERT INTO `m_country` VALUES ('144', '144', 'Marshall Islands');
INSERT INTO `m_country` VALUES ('145', '145', 'Mauritania');
INSERT INTO `m_country` VALUES ('146', '146', 'Mauritius');
INSERT INTO `m_country` VALUES ('147', '147', 'Mayotte');
INSERT INTO `m_country` VALUES ('148', '148', 'Mexico');
INSERT INTO `m_country` VALUES ('149', '149', 'Micronesia');
INSERT INTO `m_country` VALUES ('150', '150', 'Midway Islands');
INSERT INTO `m_country` VALUES ('151', '151', 'Moldova');
INSERT INTO `m_country` VALUES ('152', '152', 'Monaco');
INSERT INTO `m_country` VALUES ('153', '153', 'Mongolia');
INSERT INTO `m_country` VALUES ('154', '154', 'Montenegro');
INSERT INTO `m_country` VALUES ('155', '155', 'Montserrat');
INSERT INTO `m_country` VALUES ('156', '156', 'Morocco');
INSERT INTO `m_country` VALUES ('157', '157', 'Mozambique');
INSERT INTO `m_country` VALUES ('158', '158', 'Namibia');
INSERT INTO `m_country` VALUES ('159', '159', 'Nauru');
INSERT INTO `m_country` VALUES ('160', '160', 'Navassa Island');
INSERT INTO `m_country` VALUES ('161', '161', 'Nepal');
INSERT INTO `m_country` VALUES ('162', '162', 'Netherlands Antilles');
INSERT INTO `m_country` VALUES ('163', '163', 'Netherlands');
INSERT INTO `m_country` VALUES ('164', '164', 'New Caledonia');
INSERT INTO `m_country` VALUES ('165', '165', 'New Zealand');
INSERT INTO `m_country` VALUES ('166', '166', 'Nicaragua');
INSERT INTO `m_country` VALUES ('167', '167', 'Niger');
INSERT INTO `m_country` VALUES ('168', '168', 'Nigeria');
INSERT INTO `m_country` VALUES ('169', '169', 'Niue');
INSERT INTO `m_country` VALUES ('170', '170', 'Norfolk Island');
INSERT INTO `m_country` VALUES ('171', '171', 'North Korea');
INSERT INTO `m_country` VALUES ('172', '172', 'Northern Mariana Islands');
INSERT INTO `m_country` VALUES ('173', '173', 'Norway');
INSERT INTO `m_country` VALUES ('174', '174', 'Oman');
INSERT INTO `m_country` VALUES ('175', '175', 'Pakistan');
INSERT INTO `m_country` VALUES ('176', '176', 'Palau');
INSERT INTO `m_country` VALUES ('177', '177', 'Palmyra Atoll');
INSERT INTO `m_country` VALUES ('178', '178', 'Panama');
INSERT INTO `m_country` VALUES ('179', '179', 'Papua New Guinea');
INSERT INTO `m_country` VALUES ('180', '180', 'Paraguay');
INSERT INTO `m_country` VALUES ('181', '181', 'Peru');
INSERT INTO `m_country` VALUES ('182', '182', 'Philippines');
INSERT INTO `m_country` VALUES ('183', '183', 'Pitcairn Islands');
INSERT INTO `m_country` VALUES ('184', '184', 'Poland');
INSERT INTO `m_country` VALUES ('185', '185', 'Portugal');
INSERT INTO `m_country` VALUES ('186', '186', 'Puerto Rico');
INSERT INTO `m_country` VALUES ('187', '187', 'Qatar');
INSERT INTO `m_country` VALUES ('188', '188', 'Romania');
INSERT INTO `m_country` VALUES ('189', '189', 'Russia');
INSERT INTO `m_country` VALUES ('190', '190', 'Rwanda');
INSERT INTO `m_country` VALUES ('191', '191', 'Saint Barthelemy');
INSERT INTO `m_country` VALUES ('192', '192', 'Saint Helena');
INSERT INTO `m_country` VALUES ('193', '193', 'Saint Kitts and Nevis');
INSERT INTO `m_country` VALUES ('194', '194', 'Saint Lucia');
INSERT INTO `m_country` VALUES ('195', '195', 'Saint Martin');
INSERT INTO `m_country` VALUES ('196', '196', 'Saint Pierre and Miquelon');
INSERT INTO `m_country` VALUES ('197', '197', 'Saint Vincent and the Grenadines');
INSERT INTO `m_country` VALUES ('198', '198', 'Samoa');
INSERT INTO `m_country` VALUES ('199', '199', 'San Marino');
INSERT INTO `m_country` VALUES ('200', '200', 'Sao Tome and Principe');
INSERT INTO `m_country` VALUES ('201', '201', 'Saudi Arabia');
INSERT INTO `m_country` VALUES ('202', '202', 'Senegal');
INSERT INTO `m_country` VALUES ('203', '203', 'Serbia');
INSERT INTO `m_country` VALUES ('204', '204', 'Seychelles');
INSERT INTO `m_country` VALUES ('205', '205', 'Sierra Leone');
INSERT INTO `m_country` VALUES ('206', '206', 'Singapore');
INSERT INTO `m_country` VALUES ('207', '207', 'Slovakia');
INSERT INTO `m_country` VALUES ('208', '208', 'Slovenia');
INSERT INTO `m_country` VALUES ('209', '209', 'Solomon Islands');
INSERT INTO `m_country` VALUES ('210', '210', 'Somalia');
INSERT INTO `m_country` VALUES ('211', '211', 'South Africa');
INSERT INTO `m_country` VALUES ('212', '212', 'South Georgia');
INSERT INTO `m_country` VALUES ('213', '213', 'South Korea');
INSERT INTO `m_country` VALUES ('214', '214', 'Spain');
INSERT INTO `m_country` VALUES ('215', '215', 'Sri Lanka');
INSERT INTO `m_country` VALUES ('216', '216', 'Sudan');
INSERT INTO `m_country` VALUES ('217', '217', 'Suriname');
INSERT INTO `m_country` VALUES ('218', '218', 'Svalbard');
INSERT INTO `m_country` VALUES ('219', '219', 'Swaziland');
INSERT INTO `m_country` VALUES ('220', '220', 'Sweden');
INSERT INTO `m_country` VALUES ('221', '221', 'Switzerland');
INSERT INTO `m_country` VALUES ('222', '222', 'Syria');
INSERT INTO `m_country` VALUES ('223', '223', 'Taiwan');
INSERT INTO `m_country` VALUES ('224', '224', 'Tajikistan');
INSERT INTO `m_country` VALUES ('225', '225', 'Tanzania');
INSERT INTO `m_country` VALUES ('226', '226', 'Thailand');
INSERT INTO `m_country` VALUES ('227', '227', 'Timor Leste');
INSERT INTO `m_country` VALUES ('228', '228', 'Togo');
INSERT INTO `m_country` VALUES ('229', '229', 'Tokelau');
INSERT INTO `m_country` VALUES ('230', '230', 'Tonga');
INSERT INTO `m_country` VALUES ('231', '231', 'Trinidad and Tobago');
INSERT INTO `m_country` VALUES ('232', '232', 'Tunisia');
INSERT INTO `m_country` VALUES ('233', '233', 'Turkey');
INSERT INTO `m_country` VALUES ('234', '234', 'Turkmenistan');
INSERT INTO `m_country` VALUES ('235', '235', 'Turks and Caicos Islands');
INSERT INTO `m_country` VALUES ('236', '236', 'Tuvalu');
INSERT INTO `m_country` VALUES ('237', '237', 'Uganda');
INSERT INTO `m_country` VALUES ('238', '238', 'Ukraine');
INSERT INTO `m_country` VALUES ('239', '239', 'United Arab Emirates');
INSERT INTO `m_country` VALUES ('240', '240', 'United Kingdom');
INSERT INTO `m_country` VALUES ('241', '241', 'United States');
INSERT INTO `m_country` VALUES ('242', '242', 'Uruguay');
INSERT INTO `m_country` VALUES ('243', '243', 'US Pacific Island Wildlife Refuges');
INSERT INTO `m_country` VALUES ('244', '244', 'Uzbekistan');
INSERT INTO `m_country` VALUES ('245', '245', 'Vanuatu');
INSERT INTO `m_country` VALUES ('246', '246', 'Venezuela');
INSERT INTO `m_country` VALUES ('247', '247', 'Vietnam');
INSERT INTO `m_country` VALUES ('248', '248', 'Virgin Islands');
INSERT INTO `m_country` VALUES ('249', '249', 'Wake Island');
INSERT INTO `m_country` VALUES ('250', '250', 'Wallis and Futuna');
INSERT INTO `m_country` VALUES ('251', '251', 'Yemen');
INSERT INTO `m_country` VALUES ('252', '252', 'Zambia');
INSERT INTO `m_country` VALUES ('253', '253', 'Zimbabwe');

-- ----------------------------
-- Table structure for `m_daerah`
-- ----------------------------
DROP TABLE IF EXISTS `m_daerah`;
CREATE TABLE `m_daerah` (
  `kd_wilayah` int(6) NOT NULL AUTO_INCREMENT,
  `nm_wilayah` varchar(160) NOT NULL,
  PRIMARY KEY (`kd_wilayah`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_daerah
-- ----------------------------
INSERT INTO `m_daerah` VALUES ('1', 'bandung barat');
INSERT INTO `m_daerah` VALUES ('4', 'bandung timur');

-- ----------------------------
-- Table structure for `m_facilities`
-- ----------------------------
DROP TABLE IF EXISTS `m_facilities`;
CREATE TABLE `m_facilities` (
  `fac_id` int(20) NOT NULL AUTO_INCREMENT,
  `fac_nama` varchar(50) DEFAULT NULL,
  `fac_icon` varchar(20) DEFAULT NULL,
  `fac_desk` text,
  `date_input` datetime DEFAULT NULL,
  PRIMARY KEY (`fac_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_facilities
-- ----------------------------
INSERT INTO `m_facilities` VALUES ('1', 'High-speed Internet', 'icohp-internet', 'High-speed Internet', '2014-09-26 15:31:43');
INSERT INTO `m_facilities` VALUES ('2', 'Air conditioning', 'icohp-air', 'Air conditioning', '2014-09-26 15:31:43');
INSERT INTO `m_facilities` VALUES ('3', 'Swimming pool', 'icohp-pool', 'Swimming pool', '2014-09-26 15:31:43');
INSERT INTO `m_facilities` VALUES ('4', 'Childcare', 'icohp-childcare', 'Childcare', '2014-09-26 15:31:43');
INSERT INTO `m_facilities` VALUES ('5', 'Fitness equipment', 'icohp-fitness', 'Fitness equipment', '2014-09-26 15:31:43');
INSERT INTO `m_facilities` VALUES ('6', 'Free breakfast', 'icohp-breakfast', 'Free breakfast', '2014-09-26 15:31:43');
INSERT INTO `m_facilities` VALUES ('7', 'Free parking', 'icohp-parking', 'Free parking', '2014-09-26 15:31:43');
INSERT INTO `m_facilities` VALUES ('8', 'Pets allowed', 'icohp-pets', 'Pets allowed', '2014-09-26 15:31:43');
INSERT INTO `m_facilities` VALUES ('9', 'Spa services on site', 'icohp-spa', 'Spa services on site', '2014-09-26 15:31:43');
INSERT INTO `m_facilities` VALUES ('10', 'Hair dryer', 'icohp-hairdryer', 'Hair dryer', '2014-09-26 15:31:43');
INSERT INTO `m_facilities` VALUES ('11', 'Courtyard garden', 'icohp-garden', 'Courtyard garden', '2014-09-26 15:31:43');
INSERT INTO `m_facilities` VALUES ('12', 'Grill / Barbecue', 'icohp-grill', 'Grill / Barbecue', '2014-09-26 15:31:43');
INSERT INTO `m_facilities` VALUES ('13', 'Kitchen', 'icohp-kitchen', 'Kitchen', '2014-09-26 15:31:43');
INSERT INTO `m_facilities` VALUES ('14', 'Bar', 'icohp-bar', 'Bar', '2014-09-26 15:31:43');
INSERT INTO `m_facilities` VALUES ('15', 'Living', 'icohp-living', 'Living', '2014-09-26 15:31:43');
INSERT INTO `m_facilities` VALUES ('16', 'TV', 'icohp-tv', 'TV', '2014-09-26 15:31:43');
INSERT INTO `m_facilities` VALUES ('17', 'Fridge', 'icohp-fridge', 'Fridge', '2014-09-26 15:31:43');
INSERT INTO `m_facilities` VALUES ('18', 'Microwave', 'icohp-microwave', 'Microwave', '2014-09-26 15:31:43');
INSERT INTO `m_facilities` VALUES ('19', 'Washing maschine', 'icohp-washing', 'Washing maschine', '2014-09-26 15:31:43');
INSERT INTO `m_facilities` VALUES ('20', 'Room service', 'icohp-roomservice', 'Room service', '2014-09-26 15:31:43');
INSERT INTO `m_facilities` VALUES ('21', 'Reception Safe', 'icohp-safe', 'Reception Safe', '2014-09-26 15:31:43');
INSERT INTO `m_facilities` VALUES ('22', 'Playground', 'icohp-playground', 'Playground', '2014-09-26 15:31:43');
INSERT INTO `m_facilities` VALUES ('23', 'Conference room', 'icohp-conferenceroom', 'Conference room', '2014-09-26 15:31:43');

-- ----------------------------
-- Table structure for `m_hotel`
-- ----------------------------
DROP TABLE IF EXISTS `m_hotel`;
CREATE TABLE `m_hotel` (
  `hotel_id` int(20) NOT NULL AUTO_INCREMENT,
  `kode_kategory` int(20) DEFAULT NULL COMMENT 'dia ambil dari master kategory',
  `hotel_nama` varchar(80) DEFAULT NULL,
  `hotel_email` varchar(225) DEFAULT NULL,
  `hotel_desk` text,
  `rent_type` varchar(225) DEFAULT NULL COMMENT 'dipergunakan untuk kategori mobil',
  `rent_merk` varchar(225) DEFAULT NULL COMMENT 'di pergunakan untuk kategory mobil',
  `rent_tahun` int(20) DEFAULT NULL COMMENT 'di pergunakan untuk kategory mobil',
  `rent_kondisi` int(2) DEFAULT '0' COMMENT '1:baru;2:baik, dipergunakan untuk kategory mobil',
  `rent_penumpang` int(20) DEFAULT NULL,
  `rent_harga_supir` decimal(10,0) DEFAULT NULL,
  `rent_transmisi` varchar(20) DEFAULT NULL,
  `hotel_lokasi` varchar(225) DEFAULT NULL,
  `hotel_address` text,
  `plane_berangkat` datetime DEFAULT NULL,
  `plane_tiba` datetime DEFAULT NULL,
  `flag_discount` int(2) DEFAULT '0' COMMENT 'jika flag 1 discount',
  `rate_id` int(5) DEFAULT NULL,
  `hotel_lat` varchar(20) DEFAULT NULL,
  `hotel_lang` varchar(20) DEFAULT NULL,
  `hotel_img` varchar(50) DEFAULT NULL,
  `hotel_avg` decimal(10,0) DEFAULT NULL,
  `date_input` datetime DEFAULT NULL,
  `flag_ready` int(2) DEFAULT '0' COMMENT '0 ready, 1 not ready',
  `keyword` text,
  `hotel_hrg_promo` decimal(10,0) DEFAULT NULL,
  `count_id` int(10) DEFAULT NULL,
  `prov_id` int(10) DEFAULT NULL,
  `kota_id` int(10) DEFAULT NULL,
  `hotel_area` varchar(90) DEFAULT NULL,
  `hotel_jml_kamar` int(20) DEFAULT NULL,
  `hotel_jml_lantai` int(20) DEFAULT NULL,
  `wil_id` int(20) DEFAULT NULL,
  `kar_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`hotel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_hotel
-- ----------------------------
INSERT INTO `m_hotel` VALUES ('9', '25437858', 'Avanza', 'yudi@cifo.co.id', null, 'Mini Bus', 'Toyota', '2014', '2', '8', '150000', 'Manual', null, null, null, null, '0', null, null, null, 'toyota_avanza_veloz_2014.png', '550000', '2015-01-06 08:57:38', '0', null, null, null, null, null, null, null, null, null, '2');
INSERT INTO `m_hotel` VALUES ('10', '25437858', 'Xenia', 'yudi@cifo.co.id', null, 'Mini Bus', 'Daihatsu', '2014', '2', '8', '150000', 'Manual', null, null, null, null, '0', null, null, null, 'daihatsu_xenia_2014.png', '550000', '2015-01-06 08:57:38', '0', null, null, null, null, null, null, null, null, null, '2');
INSERT INTO `m_hotel` VALUES ('11', '25437858', 'APV', 'yudi@cifo.co.id', null, 'Mini Bus', 'Suzuki', '2014', '2', '5', '150000', 'Matic', null, null, null, null, '0', null, null, null, 'suzuki_mpv_2014.png', '600000', '2015-01-06 08:57:38', '0', null, null, null, null, null, null, null, null, null, '2');
INSERT INTO `m_hotel` VALUES ('12', '25437858', 'Jazz', 'yudi@cifo.co.id', null, 'Mini Sedan', 'Honda', '2013', '2', '5', '150000', 'Matic', null, null, null, null, '0', null, null, null, 'honda_jazz_2013.jpg', '700000', '2015-01-06 08:57:38', '0', null, null, null, null, null, null, null, null, null, '2');
INSERT INTO `m_hotel` VALUES ('13', '25437858', 'Brio', 'yudi@cifo.co.id', null, 'Mini Sedan', 'Honda', '2014', '1', '5', '150000', 'Manual', null, null, null, null, '0', null, null, null, 'honda_brio_2014.jpg', '450000', '2015-01-06 08:57:38', '0', null, null, null, null, null, null, null, null, null, '2');
INSERT INTO `m_hotel` VALUES ('14', '25437859', 'Kebun Binatang Bandung', 'yudi@cifo.co.id', 'Kebun Binatang Bandung ini pada awalnya dikenal dengan nama Derenten (dalam bahasa sunda, dierentuin) yang artinya kebun binatang. Kebun Binatang Bandung didirikan pada tahun 1930 oleh Bandung Zoological Park (BZP), yang dipelopori oleh Direktur Bank Dennis, Hoogland. Pengesahan pendirian Kebun Binatang ini diwenangi oleh Gubernur Jenderal Hindia Belanda dan pengesahannya dituangkan pada keputusan 12 April 1933 No.32.', null, null, null, '0', null, null, null, null, 'Jl. Taman Sari', null, null, '0', null, null, null, 'kebun_binatang_bandung.jpg', '20000', '2015-01-12 08:20:54', '0', 'kebun binatang, marga satwa, ada di bandung', null, '107', '13', '183', '', null, null, null, '2');
INSERT INTO `m_hotel` VALUES ('15', '25437860', 'The Valley', 'yudi@cifo.co.id', null, null, null, null, '0', null, null, null, null, 'Jl. Lembah Pakar Timur No. 28, Dago Pakar', null, null, '0', null, null, null, 'the_valley_resort.jpg', '20000', '2015-01-14 15:54:16', '0', null, null, '107', '13', '183', null, null, null, null, '2');
INSERT INTO `m_hotel` VALUES ('16', '25437860', 'The Peak', 'yudi@cifo.co.id', null, null, null, null, '0', null, null, null, null, 'JL. Desa Karyawangi Ciwaruga KM 6,8 No. 388 (Parongpong), Lembang', null, null, '0', null, null, null, 'the_peak.jpg', '25000', '2015-01-14 15:54:16', '0', null, null, '107', '13', '183', null, null, null, null, '2');
INSERT INTO `m_hotel` VALUES ('17', '25437860', 'Atmosphere', 'yudi@cifo.co.id', null, null, null, null, '0', null, null, null, null, 'Jalan Lengkong Besar No 97', null, null, '0', null, null, null, 'atmosphere_resto.jpg', '27500', '2015-01-14 15:54:16', '0', null, null, '107', '13', '183', null, null, null, null, '2');
INSERT INTO `m_hotel` VALUES ('18', '25437860', 'Ampera', 'yudi@cifo.co.id', null, null, null, null, '0', null, null, null, null, 'Jl. Soekarno Hatta', null, null, '0', null, null, null, 'ampera.jpg', '20000', '2015-01-14 15:54:16', '0', null, null, '107', '13', '183', null, null, null, null, '2');
INSERT INTO `m_hotel` VALUES ('19', '25437860', 'The Stone Cafe', 'yudi@cifo.co.id', null, null, null, null, '0', null, null, null, null, 'Jl. Dago', null, null, '0', null, null, null, 'stone_cafe.jpg', '25000', '2015-01-14 15:54:16', '0', null, null, '107', '13', '183', null, null, null, null, '2');
INSERT INTO `m_hotel` VALUES ('20', '25437860', 'Cafe Lisung', 'yudi@cifo.co.id', null, null, null, null, '0', null, null, null, null, 'Jl. Bukit Dago', null, null, '0', null, null, null, 'lisung.jpg', '26000', '2015-01-14 15:54:16', '0', null, null, '107', '13', '183', null, null, null, null, '2');
INSERT INTO `m_hotel` VALUES ('21', '25437860', 'Karnivour', 'yudi@cifo.co.id', null, null, null, null, '0', null, null, null, null, 'Jl. R.E Martadinata', null, null, '0', null, null, null, 'karnivor.jpg', '28000', '2015-01-14 15:54:16', '0', null, null, '107', '13', '183', null, null, null, null, '2');
INSERT INTO `m_hotel` VALUES ('22', '25437857', 'Malaka Hotel', 'cleopatralovepharaoh@gmail.com', null, null, null, null, '0', null, null, null, null, 'Jl. Halimun No.36 Palasari , 40171 Bandung, Indonesia', null, null, '0', '3', '-6.926986', '107.623207', 'malaka0.jpg', '352000', null, '0', 'TSB,bandung,buahbatu,palasari,budget hotel,', null, '107', '13', '183', 'TSB', '150', '4', '5', '22');
INSERT INTO `m_hotel` VALUES ('25', '25437857', 'POP! Hotel Bandung', 'yudi@cifo.co.id', null, null, null, null, '0', null, null, null, null, 'Jl. Peta, No 241 Pasir Koja Bandung 40323', null, null, '0', '3', '-6.929777', '107.58687', 'pop0.jpg', '328000', null, '0', 'hotel murah, bandung, festivalcity link', null, '107', '13', '183', 'Festival City Link', '200', '6', '1', '23');
INSERT INTO `m_hotel` VALUES ('27', '25437857', 'Hotel Vio Pasteur', 'yudi@cifo.co.id', null, null, null, null, '0', null, null, null, null, 'Jl. Djundjunan No. 154, Pasteur, Bandung', null, null, '0', '3', '-6.89195', '107.582167', 'vio0.jpg', '375000', null, '0', 'pasteur,gasibu,sukajadi,maranata', null, '107', '13', '183', 'Pasteur', '100', '4', '5', '24');
INSERT INTO `m_hotel` VALUES ('30', '25437857', 'D\'Batoe Boutique Hotel', 'yudi@cifo.co.id', null, null, null, null, '0', null, null, null, null, 'Jl. Pasirkaliki 78 Bandung 40171, West Java, Indonesia', null, null, '0', '3', '-6.910195', '107.598158', 'batoe0.jpg', '603668', null, '0', 'ip,pasteur,paskal,bandara,husein,the batu,the batoe,dbatoe', null, '107', '13', '183', 'Pasir kaliki,Istana Plaza,Pasteur', '59', '7', '5', '25');
INSERT INTO `m_hotel` VALUES ('32', '25437857', 'Park Hotel Bandung', 'yudi@cifo.co.id', null, null, null, null, '0', null, null, null, null, 'Jl. PHH Mustofa No. 47/57, Bandung 40124', null, null, '0', '4', '-6.899004', '107.641736', 'park0.jpg', '650000', null, '0', 'hotel bandung,pasteur,jalan riau', null, '107', '13', '183', 'suci, cicaheum, cartil', '127', '7', '5', '26');
INSERT INTO `m_hotel` VALUES ('33', '25437857', 'The Travel - Apartment', 'yudi@cifo.co.id', null, null, null, null, '0', null, null, null, null, 'Jl. Cipaku Indah II Komplek The Setiabudhi Terrace Blok A 20-21 Bandung 40143 West Java - Indonesia', null, null, '0', '4', '-6.861089', '107.599875', 'travel0.jpg', '780000', null, '0', 'hotel bandung,lembang,cipaku,setiabudi,the travel hotel cipaganti', null, '107', '13', '183', 'Setiabudi, Lembang, Cipaku', '97', '7', '3', '27');
INSERT INTO `m_hotel` VALUES ('34', '25437857', 'HARRIS Hotel Bandung', 'yudi@cifo.co.id', null, null, null, null, '0', null, null, null, null, 'Jl. Peta 241, Pasir Koja, Bandung - Indonesia 40323', null, null, '0', '3', '-6.929814', '107.586604', 'harris0.jpg', '588000', null, '0', 'hotel bandung,pasir koja,citylink', null, '107', '13', '183', 'Pasir koja, Jln Peta', '180', '5', '5', '28');
INSERT INTO `m_hotel` VALUES ('35', '25437857', 'Garden Permata Hotel Bandung', 'yudi@cifo.co.id', null, null, null, null, '0', null, null, null, null, 'Jl. Lemahneundeut No.7 Setrasari Bandung 40164 West Java Indonesia', null, null, '0', '4', '-6.883343', '107.580169', 'garden0.jpg', '600000', null, '0', 'tol pasteur, sarijadi,', null, '107', '13', '183', 'Pasteur', '184', '6', '5', '29');
INSERT INTO `m_hotel` VALUES ('36', '25437857', 'Horison Bandung ', 'yudi@cifo.co.id', null, null, null, null, '0', null, null, null, null, 'Jl.Pelajar Pejuang 45 No.121 Bandung 40264\r\nWest Java, Indonesia', null, null, '0', '4', '-6.935576', '107.625327', 'horison0.jpg', '1390000', null, '0', 'buahbatu, TSB, telkom university', null, '107', '13', '183', 'Buahbatu', '208', '9', '5', '30');
INSERT INTO `m_hotel` VALUES ('37', '25437857', 'Maxone Bandung', 'cleopatralovepharaoh@gmail.com', null, null, null, null, '0', null, null, null, null, 'Jl. Soekarno Hatta 735 Gede Bage, Bandung City Center, Bandung, Indonesia 33411 ', null, null, '0', '3', '-6.937063', '107.697192', 'maxone00.jpg', '500000', null, '0', 'hotel bandung, Soekarno Hatta, ', null, '107', '13', '183', 'Gedebage', '70', '12', '5', '31');

-- ----------------------------
-- Table structure for `m_hotel_desk`
-- ----------------------------
DROP TABLE IF EXISTS `m_hotel_desk`;
CREATE TABLE `m_hotel_desk` (
  `desk_hotel_id` int(20) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(20) DEFAULT NULL,
  `desk_judul` varchar(50) DEFAULT NULL,
  `desk_konten` text,
  PRIMARY KEY (`desk_hotel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_hotel_desk
-- ----------------------------
INSERT INTO `m_hotel_desk` VALUES ('1', '1', 'Lokasi', 'Garden Permata Hotel terletak di Jl. Lemah Neundeut No. 07, Sertrasari Bandung 40164 - West Java - Indonesia. Hotel ini adalah hotel. Dari hotel ini, Bandara Husein Sastranegara dan Stasiun Kereta Api Bandung bisa dicapai dalam waktu 30 menit berkendara.');
INSERT INTO `m_hotel_desk` VALUES ('2', '1', 'Kamar', 'Kamar-kamar di ibis Bandung Trans Studio menampilkan dekorasi bergaya modern dan minimalis dengan warna cerah. Fasilitas kamar mencakup WiFi gratis, TV kabel LCD dan AC. Kamar mandi dalam dilengkapi dengan shower dan perlengkapan mandi gratis.');
INSERT INTO `m_hotel_desk` VALUES ('3', '1', 'Fasilitas Umum', 'Akses WiFi tersedia secara gratis di area umum. Hotel juga menyediakan layanan resepsionis 24 jam. Area parkir tersedia');
INSERT INTO `m_hotel_desk` VALUES ('4', '1', 'Tempat Makan', 'Sarapan disediakan dalam bentuk prasmanan. Selain itu, tersedia juga restoran yang menyediakan masakan internasional dan bar yang menyediakan beraneka jenis teh dan cocktail.');
INSERT INTO `m_hotel_desk` VALUES ('5', '22', 'Malaka Hotel', 'Situated at Jl. Halimun no 36 Bandung, Malaka Hotel is not just easily accessible, but also offers you the convenience of easily reaching many of Bandungâ€™s main roads, major locations, and famous attractions. If strategic location is one of your main concerns when choosing a Hotel to stay in, then you will not be disappointed with our Hotel.');
INSERT INTO `m_hotel_desk` VALUES ('6', '25', 'POP! Hotel Bandung Festival CityLink', 'Located only 5 minutes from the Exit Pasir Koja and 20 minutes from Hussein Sastra Negara Airport. Connected to the Festival Citylink Mall and HARRIS Convention Center, which offer a huge variation of entertainment, shopping, culinary and meeting facilities options. POP! Hotel Festival Citylink Bandung also offers eco-friendly and convenient accommodation both for business and leisure.\r\n\r\nAll POP! Rooms include comfy bed, free Wifi Internet access, LCD TV + Cable TV, free Morning Bites and complimentary bottled water.');
INSERT INTO `m_hotel_desk` VALUES ('7', '27', 'VIO PASTEUR', 'Hotel Vio Pasteur terletak pada Jalan Pasteur yang dikenal sebagai gerbang utama masuk ke kota Bandung. Berlokasi hanya kurang lebih 200 meter dari gerbang tol Pasteur, kami siap menyambut Anda para wisatawan, pebisnis, atau apapun tujuan Anda di kota Bandung dengan pelayanan dan fasilitas yang memuaskan.\r\n\r\nKami tunggu kedatangan Anda di hotel kami.');
INSERT INTO `m_hotel_desk` VALUES ('9', '30', 'dBatoe Boutique Hotel', 'dBatoe is a Fresh new boutique hotel, located in down town of Bandung City. dBatoe Hotel have unique design with cozy atmosphere that is very comfortable and stylish.A three star luxury hotel outfit that blend of ultra modern facilities and stylish interior design, offering a unique new lodging experience in the capital suitable for business traveler, families or groups.');
INSERT INTO `m_hotel_desk` VALUES ('10', '32', 'Park Hotel in Bandung', 'Strategically located in East Bandung business area, only 15 minutes from Pasteur toll gate, access is easy from Husein Sastranegara International Airport, and just 10 minutes escape to shopping area at Jl. Riau. Park Hotel Bandung presents a modern and elegant concept for all your occasions, definitely ideal for both business and leisure travelers. A warm welcome from Park Hotel Bandung provides you with 127 guest rooms equipped with world class premium beddings to ensure you rest comfortably. Completed with 7 meeting rooms and a function room for maximum of 350 guests to accommodate your events. The Rooftop Swimming Pool will refresh you with relaxing atmosphere of Bandung city view.');
INSERT INTO `m_hotel_desk` VALUES ('11', '33', 'The Travel Apartment', 'The Travel - Apartment didesain sebagai hotel berbintang 3 plus elegan untuk para pebisnis yang berlokasi di kawasan perumahan ekslusif di daerah Bandung Utara dan menawarkan keidahan panorama, ketenangan, udara yang sejuk disertai pemandangan langsung ke Gunung Tangkuban Perahu dan Kota Bandung. Suatu pilihan akomodasi yang tepat untuk liburan bersama keluarga ataupun untuk kegiatan perusahaan.');
INSERT INTO `m_hotel_desk` VALUES ('12', '34', 'HARRIS Hotel & Conventions Festival CityLink Bandu', 'Hanya 5 menit dari pintu keluar tol Pasir Koja, 20 menit dari bandara Husein Sastra Negara, 30 menit dari stasiun kereta api Kebon Kawung dan hanya 30 menit ke Pasar Baru. Dengan akses langsung ke Festival Citylink Mall dengan berbagai pilihan hiburan menarik dan toko-toko yang dapat Anda temukan, hotel ini merupakan tempat tujuan unik untuk hari kerja dan akhir pekan, baik untuk perjalanan bisnis atau menikmati waktu luang Anda.');
INSERT INTO `m_hotel_desk` VALUES ('13', '35', 'Overview', 'Introducing our new hotel desideratum â€œnew improvementâ€ â€“ â€œmore fresh â€“ more modernâ€ with an excellent service more than your expectation and commitment as the biggest one of business hotel in Bandung.\r\n\r\nExperience an amazing ambience of Bandung with your family and colleagues with a perfect blend of modern art deco and elegancy at Garden Permata Hotel Bandung.\r\n\r\nLocated on strategic area just 500 meter turn left from Pasteurâ€™s toll Gateway near business district and tourist attraction. Easy accessible only take 15 minutes from â€œBandara Husein Sastranegaraâ€ airport or train station and 10 minutes from downtown of Bandung.\r\n\r\nTo add your convenience during your stay we provide 184 of cozy rooms + personal safe deposit each, in which we have transformed our new deluxe suite rooms and new apartment room in the earliest 2014, 14 meeting rooms, capacities from 20 up to 1000 persons equipped of adequate facilities');
INSERT INTO `m_hotel_desk` VALUES ('14', '36', 'Horison Bandung ', 'Strategically built in the middle of Bandung, \"The Flower City\", Horison Bandung offers you more.Welcome by an elegance main lobby which will lead you into our 208 spacious and luxurious bedrooms in a nine story building, indulging your stay.\r\n\r\nfood As a \"Convention, Business and Family Hotel\", we provide you the biggest convention in town, with our \"Krakatau Convention Hall\" which is able to held up to 3,000 pax, 26 small meeting rooms, and spacious area for exhibitions, parties, gatherings, as well as weddings. For your quality time with your family, you may find our Olympic sized swimming pool where there is also Baby Pool and Wave Pool to give a spirit of adventures. Join us, for an everlasting moments, with the touch of excellent, because we are here commited to satisfaction.');
INSERT INTO `m_hotel_desk` VALUES ('16', '37', 'MaxOneHotels Bandung', 'New hotel with 126 beautiful appointed rooms making its become a perfect choice for leisure and business travelers. The location is strategic located on Jalan Soekarno Hatta - Bandung within 20 minutes drive from shopping zone Cihampelas and City Center. A strategic location that provides convinience and ease access to our guests.');

-- ----------------------------
-- Table structure for `m_hotel_kebijakan`
-- ----------------------------
DROP TABLE IF EXISTS `m_hotel_kebijakan`;
CREATE TABLE `m_hotel_kebijakan` (
  `keb_hotel_id` int(20) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(20) DEFAULT NULL,
  `keb_judul` varchar(50) DEFAULT NULL,
  `keb_konten` text,
  PRIMARY KEY (`keb_hotel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_hotel_kebijakan
-- ----------------------------
INSERT INTO `m_hotel_kebijakan` VALUES ('1', '1', 'Saat tiba di hotel', 'Anda harus menunjukkan kartu identitas berfoto sewaktu check-in. Kartu kredit atau deposit tunai bisa jadi diperlukan pada saat check-in untuk menutup biaya tak terduga. Jenis ranjang dan pilihan kamar smoking/non-smoking tidak dapat dijamin ketersediaannya.');
INSERT INTO `m_hotel_kebijakan` VALUES ('2', '1', 'Umum', 'Waktu check-in: dari jam 14:00, check-out: sampai jam 12:00 Nominal transaksi akan dipotong dari kartu kredit pada saat booking. Kesediaan kamar dijamin sekalipun Anda terlambat check-in. Harga total sudah termasuk pajak, biaya akses dan booking. Biaya tambahan seperti parkir, telepon, layanan kamar ditangani langsung antara Anda dan hotel. Biaya penambahan orang dalam kamar dapat berlaku dan berbeda-beda menurut kebijakan hotel.');
INSERT INTO `m_hotel_kebijakan` VALUES ('3', '1', 'Detail Tambahan', null);
INSERT INTO `m_hotel_kebijakan` VALUES ('4', '1', 'Permintaan Khusus', null);
INSERT INTO `m_hotel_kebijakan` VALUES ('5', '1', 'Anak-anak', 'Anak-anak usia di bawah 12 tahun diizinkan menginap gratis jika tinggal di kamar orang tua atau walinya, dengan menggunakan tempat tidur yang ada.');
INSERT INTO `m_hotel_kebijakan` VALUES ('6', '1', 'Hewan peliharaan', 'Hewan peliharaan, termasuk hewan pemandu tidak diizinkan.');
INSERT INTO `m_hotel_kebijakan` VALUES ('7', '22', 'Check-in', 'Untuk penyerahan bukti pemesanan dilakukan saat reservasi');
INSERT INTO `m_hotel_kebijakan` VALUES ('8', '25', 'Check-in', 'Untuk penyerahan bukti pemesanan dilakukan saat reservasi');
INSERT INTO `m_hotel_kebijakan` VALUES ('9', '27', 'Pembatalan', 'Untuk pembatalan pemesanan hotel melalui walanja.co.id uang tidak dapat dikembalikan');
INSERT INTO `m_hotel_kebijakan` VALUES ('10', '30', 'Peliharaan', 'Tidak diijinkan');
INSERT INTO `m_hotel_kebijakan` VALUES ('11', '30', 'Extra bed', 'Tidak ada');
INSERT INTO `m_hotel_kebijakan` VALUES ('12', '32', 'Pembatalan', 'Untuk pembatalan melalui walanja uang tidak dapat dikembalikan');
INSERT INTO `m_hotel_kebijakan` VALUES ('13', '33', 'Pembatalan', 'Pembatalan pemesanan melalui walanja uang tidak dapat dikembalikan');
INSERT INTO `m_hotel_kebijakan` VALUES ('14', '34', 'Pembatalan', 'Pembatalan melaui walanja uang tidak dapat dikembalikan');
INSERT INTO `m_hotel_kebijakan` VALUES ('16', '35', 'Pembatalan', 'Untuk pembatalan pemesanan melalui walanja uang tidak dapat dikembalikan');
INSERT INTO `m_hotel_kebijakan` VALUES ('17', '36', 'Pembatalan', 'Untuk pembatalan kamar melalui walanja uang tidak dapat dikembalikan');
INSERT INTO `m_hotel_kebijakan` VALUES ('19', '37', 'Pembatalan', 'Untuk pembatalan pemesanan kamar melalui walanja uang tidak dapat dikembalikan');

-- ----------------------------
-- Table structure for `m_kategory`
-- ----------------------------
DROP TABLE IF EXISTS `m_kategory`;
CREATE TABLE `m_kategory` (
  `kategory_id` int(20) NOT NULL AUTO_INCREMENT,
  `kategory_nama` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`kategory_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_kategory
-- ----------------------------
INSERT INTO `m_kategory` VALUES ('1', 'TIKET HOTEL');
INSERT INTO `m_kategory` VALUES ('2', 'TIKET PESAWAT');
INSERT INTO `m_kategory` VALUES ('3', 'RETAL MOBIL');
INSERT INTO `m_kategory` VALUES ('4', 'OBYEK WISATA');

-- ----------------------------
-- Table structure for `m_kendaraan`
-- ----------------------------
DROP TABLE IF EXISTS `m_kendaraan`;
CREATE TABLE `m_kendaraan` (
  `kendaraan_id` int(20) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(20) DEFAULT NULL,
  `kendaraan_nama` varchar(225) DEFAULT NULL,
  `kendaraan_harga` decimal(20,0) DEFAULT NULL,
  `kendaraan_durasi` int(20) DEFAULT NULL,
  `kendaraan_satuan` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`kendaraan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_kendaraan
-- ----------------------------
INSERT INTO `m_kendaraan` VALUES ('1', '14', 'Mobil', '20000', '1', 'Jam');
INSERT INTO `m_kendaraan` VALUES ('2', '14', 'Motor', '15000', '1', 'Jam');

-- ----------------------------
-- Table structure for `m_keterangan`
-- ----------------------------
DROP TABLE IF EXISTS `m_keterangan`;
CREATE TABLE `m_keterangan` (
  `keterangan_id` int(20) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(20) DEFAULT NULL,
  `keterangan_nama` text,
  PRIMARY KEY (`keterangan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_keterangan
-- ----------------------------
INSERT INTO `m_keterangan` VALUES ('1', '14', 'Harga Di atas sudah termasuk PPN');

-- ----------------------------
-- Table structure for `m_kota`
-- ----------------------------
DROP TABLE IF EXISTS `m_kota`;
CREATE TABLE `m_kota` (
  `kota_id` int(20) NOT NULL AUTO_INCREMENT,
  `prov_id` int(20) DEFAULT NULL,
  `kota_nama` varchar(90) DEFAULT NULL,
  PRIMARY KEY (`kota_id`)
) ENGINE=InnoDB AUTO_INCREMENT=184 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_kota
-- ----------------------------
INSERT INTO `m_kota` VALUES ('166', '13', 'Kota Bandung');
INSERT INTO `m_kota` VALUES ('183', '13', 'Bandung');

-- ----------------------------
-- Table structure for `m_menu_masakan`
-- ----------------------------
DROP TABLE IF EXISTS `m_menu_masakan`;
CREATE TABLE `m_menu_masakan` (
  `menu_masakan_id` int(20) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(20) DEFAULT NULL COMMENT 'JOIN dengan tabel m_hotel',
  `menu_masakan_nama` varchar(225) DEFAULT NULL,
  `menu_kategory` int(50) DEFAULT NULL COMMENT '1: Makanan, 2: Minuman',
  `menu_harga` decimal(20,2) DEFAULT NULL,
  `menu_image` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`menu_masakan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_menu_masakan
-- ----------------------------
INSERT INTO `m_menu_masakan` VALUES ('1', '15', 'Kwetiau Siram', '1', '20000.00', 'img00065-20110728-2053.jpg');
INSERT INTO `m_menu_masakan` VALUES ('2', '15', 'Pepes Jantung', '1', '15000.00', 'pepes_jantung.jpg');
INSERT INTO `m_menu_masakan` VALUES ('3', '15', 'Udang Tusuk', '1', '20000.00', 'udang_tusuk.jpg');
INSERT INTO `m_menu_masakan` VALUES ('4', '15', 'Soto Bandung', '1', '14000.00', 'soto_bandung.jpg');
INSERT INTO `m_menu_masakan` VALUES ('5', '15', 'Iga Bakar', '1', '25000.00', 'iga_bakar.jpg');
INSERT INTO `m_menu_masakan` VALUES ('6', '16', 'Gurame Tepung', '1', '30000.00', 'gurame_tepung.jpg');
INSERT INTO `m_menu_masakan` VALUES ('7', '16', 'Semur Jengkol', '1', '15000.00', 'Semur-jengkol.jpg');
INSERT INTO `m_menu_masakan` VALUES ('8', '16', 'Karedok', '1', '15000.00', 'tumblr_inline_mt1pgwGXsl1qz4rgp.jpg');
INSERT INTO `m_menu_masakan` VALUES ('9', '16', 'Nasi Liwet', '1', '20000.00', 'nasi_liwet1.jpg');
INSERT INTO `m_menu_masakan` VALUES ('10', '16', 'Gepuk Suir', '1', '23000.00', 'Empal-Gepuk1.jpg');
INSERT INTO `m_menu_masakan` VALUES ('11', '17', 'Pepes Asin Jambal', '1', '13000.00', 'pepes_asin_jambal.jpg');
INSERT INTO `m_menu_masakan` VALUES ('12', '17', 'Belut Krispy', '1', '13000.00', 'Belut-goreng.jpg');
INSERT INTO `m_menu_masakan` VALUES ('13', '17', 'Tumis Pete Teri', '1', '15000.00', 'sambal-pete-istkulinerindonesia.jpg');
INSERT INTO `m_menu_masakan` VALUES ('14', '17', 'Tumis Kikil', '1', '18000.00', 'Oseng-Oseng-Kikil.jpg');
INSERT INTO `m_menu_masakan` VALUES ('15', '17', 'Tamusu', '1', '25000.00', 'tamusu.jpg');
INSERT INTO `m_menu_masakan` VALUES ('16', '18', 'Kwetiau Siram', '1', '20000.00', 'img00065-20110728-2053.jpg');
INSERT INTO `m_menu_masakan` VALUES ('17', '18', 'Pepes Jantung', '1', '15000.00', 'pepes_jantung.jpg');
INSERT INTO `m_menu_masakan` VALUES ('18', '18', 'Udang Tusuk', '1', '20000.00', 'udang_tusuk.jpg');
INSERT INTO `m_menu_masakan` VALUES ('19', '18', 'Soto Bandung', '1', '14000.00', 'soto_bandung.jpg');
INSERT INTO `m_menu_masakan` VALUES ('20', '18', 'Iga Bakar', '1', '25000.00', 'iga_bakar.jpg');
INSERT INTO `m_menu_masakan` VALUES ('21', '19', 'Gurame Tepung', '1', '30000.00', 'gurame_tepung.jpg');
INSERT INTO `m_menu_masakan` VALUES ('22', '19', 'Semur Jengkol', '1', '15000.00', 'Semur-jengkol.jpg');
INSERT INTO `m_menu_masakan` VALUES ('23', '19', 'Karedok', '1', '15000.00', 'tumblr_inline_mt1pgwGXsl1qz4rgp.jpg');
INSERT INTO `m_menu_masakan` VALUES ('24', '19', 'Nasi Liwet', '1', '20000.00', 'nasi_liwet1.jpg');
INSERT INTO `m_menu_masakan` VALUES ('25', '19', 'Gepuk Suir', '1', '23000.00', 'Empal-Gepuk1.jpg');
INSERT INTO `m_menu_masakan` VALUES ('26', '20', 'Kwetiau Siram', '1', '20000.00', 'img00065-20110728-2053.jpg');
INSERT INTO `m_menu_masakan` VALUES ('27', '20', 'Pepes Jantung', '1', '15000.00', 'pepes_jantung.jpg');
INSERT INTO `m_menu_masakan` VALUES ('28', '20', 'Udang Tusuk', '1', '20000.00', 'udang_tusuk.jpg');
INSERT INTO `m_menu_masakan` VALUES ('29', '20', 'Soto Bandung', '1', '14000.00', 'soto_bandung.jpg');
INSERT INTO `m_menu_masakan` VALUES ('30', '20', 'Iga Bakar', '1', '25000.00', 'iga_bakar.jpg');
INSERT INTO `m_menu_masakan` VALUES ('31', '21', 'Gurame Tepung', '1', '30000.00', 'gurame_tepung.jpg');
INSERT INTO `m_menu_masakan` VALUES ('32', '21', 'Semur Jengkol', '1', '15000.00', 'Semur-jengkol.jpg');
INSERT INTO `m_menu_masakan` VALUES ('33', '21', 'Karedok', '1', '15000.00', 'tumblr_inline_mt1pgwGXsl1qz4rgp.jpg');
INSERT INTO `m_menu_masakan` VALUES ('34', '21', 'Nasi Liwet', '1', '20000.00', 'nasi_liwet1.jpg');
INSERT INTO `m_menu_masakan` VALUES ('35', '21', 'Gepuk Suir', '1', '23000.00', 'Empal-Gepuk1.jpg');

-- ----------------------------
-- Table structure for `m_menu_pesanan`
-- ----------------------------
DROP TABLE IF EXISTS `m_menu_pesanan`;
CREATE TABLE `m_menu_pesanan` (
  `pesanan_id` int(20) NOT NULL AUTO_INCREMENT,
  `menu_masakan_id` int(20) DEFAULT NULL COMMENT 'JOIN dengan tabel m_menu_masakan',
  `hotel_id` int(20) DEFAULT NULL,
  `meja_nomor` varchar(50) DEFAULT NULL,
  `meja_nomor_pesanan` int(20) DEFAULT NULL COMMENT 'untuk nomor pesanan auto number',
  `pesanan_tgl` datetime DEFAULT NULL,
  PRIMARY KEY (`pesanan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_menu_pesanan
-- ----------------------------

-- ----------------------------
-- Table structure for `m_partner`
-- ----------------------------
DROP TABLE IF EXISTS `m_partner`;
CREATE TABLE `m_partner` (
  `partner_id` int(20) NOT NULL AUTO_INCREMENT,
  `partner_image` varchar(225) NOT NULL,
  `partner_desk` text NOT NULL,
  `partner_link` varchar(50) NOT NULL,
  PRIMARY KEY (`partner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_partner
-- ----------------------------
INSERT INTO `m_partner` VALUES ('1', 'pop-logo.png', 'Terletak di jantung kota Bandung, POP! Hotel Bandung Festival CityLink merupakan lokasi ideal untuk menjelajahi Bandung. Dari sini, para tamu dapat menikmati akses mudah ke semua hal yang ditawarkan oleh kota ini.', 'id=25');
INSERT INTO `m_partner` VALUES ('2', 'park-logo.png', 'Park Hotel Bandung terletak strategis di Pusat Kota Bandung, Dengan lokasinya yang hanya 3 Km dari pusat kota dan 10 Km dari bandara, hotel bintang 4 ini menarik perhatian banyak wisatawan setiap tahun.', 'id=32');
INSERT INTO `m_partner` VALUES ('3', 'horison-logo.png', 'Salah satu hotel terbaik di Bandung, cocok untuk wisatawan bisnis ataupun wisatawan yang mencari sedikit kemewahan. Iklim yang sejuk dari kota Bandung menjadikannya sebagai pilihan populer untuk melakukan liburan akhir pekan.', 'id=36');
INSERT INTO `m_partner` VALUES ('4', 'pop-logo.png', 'Terletak di jantung kota Bandung, POP! Hotel Bandung Festival CityLink merupakan lokasi ideal untuk menjelajahi Bandung. Dari sini, para tamu dapat menikmati akses mudah ke semua hal yang ditawarkan oleh kota ini.', 'id=25');
INSERT INTO `m_partner` VALUES ('5', 'park-logo.png', 'Park Hotel Bandung terletak strategis di Pusat Kota Bandung, Dengan lokasinya yang hanya 3 Km dari pusat kota dan 10 Km dari bandara, hotel bintang 4 ini menarik perhatian banyak wisatawan setiap tahun.', 'id=32');
INSERT INTO `m_partner` VALUES ('6', 'horison-logo.png', 'Salah satu hotel terbaik di Bandung, cocok untuk wisatawan bisnis ataupun wisatawan yang mencari sedikit kemewahan. Iklim yang sejuk dari kota Bandung menjadikannya sebagai pilihan populer untuk melakukan liburan akhir pekan.', 'id=36');

-- ----------------------------
-- Table structure for `m_prov`
-- ----------------------------
DROP TABLE IF EXISTS `m_prov`;
CREATE TABLE `m_prov` (
  `prov_id` int(10) NOT NULL AUTO_INCREMENT,
  `count_id` int(20) DEFAULT NULL,
  `prov_nama` varchar(90) DEFAULT NULL,
  PRIMARY KEY (`prov_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_prov
-- ----------------------------
INSERT INTO `m_prov` VALUES ('13', '107', 'Jawa Barat');
INSERT INTO `m_prov` VALUES ('14', '107', 'Jawa Tengah');
INSERT INTO `m_prov` VALUES ('16', '107', 'Jawa Timur');

-- ----------------------------
-- Table structure for `m_rating`
-- ----------------------------
DROP TABLE IF EXISTS `m_rating`;
CREATE TABLE `m_rating` (
  `rate_id` int(20) NOT NULL AUTO_INCREMENT,
  `rate_name` varchar(10) DEFAULT NULL,
  `rate_desk` varchar(10) DEFAULT NULL,
  `rate_icon` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`rate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_rating
-- ----------------------------
INSERT INTO `m_rating` VALUES ('1', 'stars1', '1 Stars', 'filter-rating-1b.png');
INSERT INTO `m_rating` VALUES ('2', 'stars2', '2 Stars', 'filter-rating-2b.png');
INSERT INTO `m_rating` VALUES ('3', 'stars3', '3 Stars', 'filter-rating-3b.png');
INSERT INTO `m_rating` VALUES ('4', 'stars4', '4 Stars', 'filter-rating-4b.png');
INSERT INTO `m_rating` VALUES ('5', 'stars5', '5 Stars', 'filter-rating-5b.png');

-- ----------------------------
-- Table structure for `m_recomend`
-- ----------------------------
DROP TABLE IF EXISTS `m_recomend`;
CREATE TABLE `m_recomend` (
  `rec_id` int(20) NOT NULL AUTO_INCREMENT,
  `rec_name` varchar(60) DEFAULT NULL,
  `rec_desc` text,
  `date_input` datetime DEFAULT NULL,
  PRIMARY KEY (`rec_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_recomend
-- ----------------------------

-- ----------------------------
-- Table structure for `m_room`
-- ----------------------------
DROP TABLE IF EXISTS `m_room`;
CREATE TABLE `m_room` (
  `room_id` int(20) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(20) DEFAULT NULL,
  `room_type` varchar(60) DEFAULT NULL,
  `room_avaibility` varchar(40) DEFAULT NULL,
  `room_price` decimal(40,0) DEFAULT NULL,
  `room_desc` text,
  `date_input` datetime DEFAULT NULL,
  `room_image` varchar(90) DEFAULT NULL,
  `room_image2` varchar(30) NOT NULL,
  `room_image3` varchar(30) NOT NULL,
  `room_jml_org` int(5) DEFAULT NULL,
  `room_disc` int(20) DEFAULT NULL,
  `disc_agent` int(11) NOT NULL,
  `room_tipe_kamar` text,
  `room_info_penting` text,
  `room_biaya_tambah` text,
  `flag_breakfast` int(2) DEFAULT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_room
-- ----------------------------
INSERT INTO `m_room` VALUES ('1', '1', 'Superior Room', '4', '654556', 'Located at 1st to 4th floors in backwing and at 1st and 2nd floor in sidewing building of the Hotel, with the capacious each rooms are 30 m2. Every corner of the rooms are modern art deco designed consisted with Double and Twins Bed Rooms also we provide you with smoking and non smoking rooms area.', '2014-09-26 15:20:00', 'superior1.jpg', '', '', '2', '15', '10', '2 tempat tidur single 18 meter persegi, Hiburan - Gratis akses Internet nirkabel, televisi LCD dengan saluran kabel Makan Minum - Pembuat kopi/teh Kamar Mandi - Kamar mandi pribadi dengan shower, sandal, dan pengering rambut', 'Ketentuan pembatalan Biaya pembatalan: Rp 590.480', 'Nominal transaksi akan dipotong dari kartu kredit pada saat booking. Kesediaan kamar dijamin sekalipun Anda terlambat check-in. Harga total sudah termasuk pajak, biaya akses dan booking. Biaya tambahan seperti parkir, telepon, layanan kamar ditangani langsung antara Anda dan hotel. Biaya penambahan orang dalam kamar dapat berlaku dan berbeda-beda menurut kebijakan hotel.', null);
INSERT INTO `m_room` VALUES ('2', '1', 'Deluxe Suite Room', '3', '775555', 'Located from 3rd until 6th floors in the main building of the Hotel, with the capacious each rooms are 50m2. Every corner of the rooms are modern art deco designed consisted with Double and Twin Bed Rooms also we provide you with smoking and non smoking rooms.', '2014-09-26 15:20:07', 'deluxe1.jpg', '', '', '2', '15', '10', '2 tempat tidur single 18 meter persegi, Hiburan - Gratis akses Internet nirkabel, televisi LCD dengan saluran kabel Makan Minum - Pembuat kopi/teh Kamar Mandi - Kamar mandi pribadi dengan shower, sandal, dan pengering rambut', 'Ketentuan pembatalan Biaya pembatalan: Rp 590.480', 'Nominal transaksi akan dipotong dari kartu kredit pada saat booking. Kesediaan kamar dijamin sekalipun Anda terlambat check-in. Harga total sudah termasuk pajak, biaya akses dan booking. Biaya tambahan seperti parkir, telepon, layanan kamar ditangani langsung antara Anda dan hotel. Biaya penambahan orang dalam kamar dapat berlaku dan berbeda-beda menurut kebijakan hotel.', null);
INSERT INTO `m_room` VALUES ('3', '1', 'Junior Suite Room', '4', '875000', 'Located from 3rd until 5th floors in the main building of the Hotel, with the capacious each rooms are 87,50m2. Every corner of the rooms are modern art deco designed consisted with Double Bed Room only, also we provide you with smoking and non smoking room.', '2014-09-26 15:20:12', 'junior-suite1.jpg', '', '', '4', '15', '10', '2 tempat tidur single 18 meter persegi, Hiburan - Gratis akses Internet nirkabel, televisi LCD dengan saluran kabel Makan Minum - Pembuat kopi/teh Kamar Mandi - Kamar mandi pribadi dengan shower, sandal, dan pengering rambut', 'Ketentuan pembatalan Biaya pembatalan: Rp 590.480', 'Nominal transaksi akan dipotong dari kartu kredit pada saat booking. Kesediaan kamar dijamin sekalipun Anda terlambat check-in. Harga total sudah termasuk pajak, biaya akses dan booking. Biaya tambahan seperti parkir, telepon, layanan kamar ditangani langsung antara Anda dan hotel. Biaya penambahan orang dalam kamar dapat berlaku dan berbeda-beda menurut kebijakan hotel.', null);
INSERT INTO `m_room` VALUES ('4', '1', 'Family Suite Room', '3', '544000', 'Located from 3rd until 5th floors, each floor consist of one unit Family Suite three bedrooms , with the capacious of the rooms are 195m2. Located from 3rd until 5th floors, each floor consist of one unit Family Suite three bedrooms , with the capacious of the rooms are 195m2. ', '2014-09-26 15:20:15', 'family-suite1.jpg', '', '', '6', '15', '10', '2 tempat tidur single 18 meter persegi, Hiburan - Gratis akses Internet nirkabel, televisi LCD dengan saluran kabel Makan Minum - Pembuat kopi/teh Kamar Mandi - Kamar mandi pribadi dengan shower, sandal, dan pengering rambut', 'Ketentuan pembatalan Biaya pembatalan: Rp 590.480', 'Nominal transaksi akan dipotong dari kartu kredit pada saat booking. Kesediaan kamar dijamin sekalipun Anda terlambat check-in. Harga total sudah termasuk pajak, biaya akses dan booking. Biaya tambahan seperti parkir, telepon, layanan kamar ditangani langsung antara Anda dan hotel. Biaya penambahan orang dalam kamar dapat berlaku dan berbeda-beda menurut kebijakan hotel.', null);
INSERT INTO `m_room` VALUES ('5', '1', 'Executive Apartment', '3', '545000', 'Located at 2nd floors in the main building of the Hotel, with the capacious of the rooms are 100m2. Consist of Executive Apartment 2 bedrooms and Executive Apartment 3 bedrooms both are consisted with Double and twin bedrooms.', '2014-09-26 15:20:18', 'executive-apartment.jpg', '', '', '5', '15', '10', '2 tempat tidur single 18 meter persegi, Hiburan - Gratis akses Internet nirkabel, televisi LCD dengan saluran kabel Makan Minum - Pembuat kopi/teh Kamar Mandi - Kamar mandi pribadi dengan shower, sandal, dan pengering rambut', 'Ketentuan pembatalan Biaya pembatalan: Rp 590.480', 'Nominal transaksi akan dipotong dari kartu kredit pada saat booking. Kesediaan kamar dijamin sekalipun Anda terlambat check-in. Harga total sudah termasuk pajak, biaya akses dan booking. Biaya tambahan seperti parkir, telepon, layanan kamar ditangani langsung antara Anda dan hotel. Biaya penambahan orang dalam kamar dapat berlaku dan berbeda-beda menurut kebijakan hotel.', null);
INSERT INTO `m_room` VALUES ('6', '1', 'Permata Apartment', '3', '400657', 'Located at 2nd floors in the main building of the Hotel, with the capacious of the rooms are 195m2, consist of capacious 3 bedrooms.', '2014-09-26 15:20:22', 'permata-apartment.jpg', '', '', '5', '15', '10', '2 tempat tidur single 18 meter persegi, Hiburan - Gratis akses Internet nirkabel, televisi LCD dengan saluran kabel Makan Minum - Pembuat kopi/teh Kamar Mandi - Kamar mandi pribadi dengan shower, sandal, dan pengering rambut', 'Ketentuan pembatalan Biaya pembatalan: Rp 590.480', 'Nominal transaksi akan dipotong dari kartu kredit pada saat booking. Kesediaan kamar dijamin sekalipun Anda terlambat check-in. Harga total sudah termasuk pajak, biaya akses dan booking. Biaya tambahan seperti parkir, telepon, layanan kamar ditangani langsung antara Anda dan hotel. Biaya penambahan orang dalam kamar dapat berlaku dan berbeda-beda menurut kebijakan hotel.', null);
INSERT INTO `m_room` VALUES ('7', '2', 'Business Traveler Room', '5', '650000', 'Located at 3nd floors in the main building of the Hotel, with the capacious of the rooms are 195m2, consist of capacious 3 bedrooms.', '2014-09-29 14:43:11', 'business-traveler.jpg', '', '', null, '15', '10', null, null, null, null);
INSERT INTO `m_room` VALUES ('8', '2', 'Business Executive Room', '6', '2000000', 'Located at 2nd floors in the main building of the Hotel, with the capacious of the rooms are 195m2, consist of capacious 3 bedrooms.', '2014-09-29 14:43:15', 'business-executive.jpg', '', '', null, '15', '10', null, null, null, null);
INSERT INTO `m_room` VALUES ('9', '2', 'Business Suite Room', '4', '3000000', 'Located at 3nd floors in the main building of the Hotel, with the capacious of the rooms are 195m2, consist of capacious 3 bedrooms.', '2014-09-29 14:43:18', 'business-suite.jpg', '', '', null, '15', '10', null, null, null, null);
INSERT INTO `m_room` VALUES ('10', '3', 'Deluxe Room', '7', '780000', 'Located at 2nd floors in the main building of the Hotel, with the capacious of the rooms are 195m2, consist of capacious 3 bedrooms.', '2014-09-29 14:48:36', 'deluxe-room.jpg', '', '', null, '15', '10', null, null, null, null);
INSERT INTO `m_room` VALUES ('11', '3', 'Executive Room', '8', '950000', 'Located at 2nd floors in the main building of the Hotel, with the capacious of the rooms are 195m2, consist of capacious 3 bedrooms.', '2014-09-29 14:48:32', 'executive-room.jpg', '', '', null, '15', '10', null, null, null, null);
INSERT INTO `m_room` VALUES ('12', '3', 'Cipaku Suite', '5', '1700000', 'Located at 2nd floors in the main building of the Hotel, with the capacious of the rooms are 195m2, consist of capacious 3 bedrooms.', '2014-09-29 14:48:54', 'cipaku-suite.jpg', '', '', null, '15', '10', null, null, null, null);
INSERT INTO `m_room` VALUES ('13', '3', 'Cipaganti Suite', '6', '2225000', 'Located at 2nd floors in the main building of the Hotel, with the capacious of the rooms are 195m2, consist of capacious 3 bedrooms.', '2014-09-29 14:48:29', 'cipaganti-suite.jpg', '', '', null, '15', '10', null, null, null, null);
INSERT INTO `m_room` VALUES ('14', '1', 'Ruangan Asoy', '5', '500000', null, '2014-11-24 10:52:45', '5.jpg', '', '', '3', '15', '10', 'TIPE KAMAR', 'INFO PENTING', 'BIAYA TAMBAHAN', null);
INSERT INTO `m_room` VALUES ('15', '1', 'Ruangan Meeting', '3', '5000000', null, '2014-11-25 03:09:08', 'downloadolaf.jpg', '', '', '10', '15', '10', 'dilaengkapi meja meeting', 'dilarang meroko di ruangan', 'kena charge apabila memesan makanan', '1');
INSERT INTO `m_room` VALUES ('16', '22', 'SUPERIOR TWIN', '3', '357000', 'masih belum d tambahkan agar muncul', '0000-00-00 00:00:00', 'twin.jpg', '', '', '2', '15', '10', 'Twin', 'Dilarang membawa hewan peliharaan', 'Extra bed', '1');
INSERT INTO `m_room` VALUES ('17', '22', 'SUPERIOR KING', '5', '395000', 'King', '0000-00-00 00:00:00', 'king.jpg', '', '', '2', '15', '10', 'King', 'Dilarang membawa hewan peliharaan', 'Extra bed', '1');
INSERT INTO `m_room` VALUES ('18', '22', 'SUITE KING', '0', '546000', 'Suite', '0000-00-00 00:00:00', 'suite2.JPG', '', '', '5', '15', '10', 'Suite', 'Dilarang membawa hewan peliharaan', 'Extra bed', '1');
INSERT INTO `m_room` VALUES ('19', '25', 'POP! Deal', '6', '328000', 'POP! Deal', '0000-00-00 00:00:00', 'pop deal.jpg', '3.jpg', '2.jpg', '2', '15', '10', 'POP! Deal', 'Dilarang membawa hewan peliharaan', 'Extra bed', '1');
INSERT INTO `m_room` VALUES ('21', '27', 'SUPERIOR', '4', '415000', 'superior', '0000-00-00 00:00:00', 'viosuperior.jpg', '', '', '2', '15', '10', 'superior', 'dilarang membawa hewan peliharaan', 'tidak ada extra bed', '1');
INSERT INTO `m_room` VALUES ('22', '27', 'DELUXE', '3', '475000', 'deluxe', '0000-00-00 00:00:00', 'viodeluxe.jpg', '', '', '2', '15', '10', 'deluxe', 'dilarang meroko dalam ruangan', 'tidak ada extra bed', '1');
INSERT INTO `m_room` VALUES ('23', '30', 'GOLD KING', '5', '603668', 'GOLD KING', '0000-00-00 00:00:00', 'batoe3.jpg', '', '', '3', '15', '10', 'GOLD KING', 'GOLD KING', 'No extra bed', '1');
INSERT INTO `m_room` VALUES ('24', '30', 'GOLD TWIN', '4', '603668', 'GOLD TWIN', '0000-00-00 00:00:00', 'batoe6.jpg', '', '', '3', '15', '10', 'GOLD TWIN', 'Tidak diijinkan membawa hewan peliharaan', 'No extra bed', '1');
INSERT INTO `m_room` VALUES ('25', '30', 'PLATINUM', '5', '664768', 'PLATINUM', '0000-00-00 00:00:00', 'batoe4.jpg', '', '', '3', '15', '10', 'PLATINUM', 'Tidak diijinkan membawa hewan peliharaan', 'No extra bed', '1');
INSERT INTO `m_room` VALUES ('26', '30', 'SAPHIRE', '1', '1041755', 'SAPHIRE', '0000-00-00 00:00:00', 'batoe2.jpg', '', '', '3', '15', '10', 'SAPHIRE', 'Tidak diijinkan membawa hewan peliharaan', 'No extra bed', '1');
INSERT INTO `m_room` VALUES ('27', '30', 'DIAMOND', '2', '1142570', 'DIAMOND', '0000-00-00 00:00:00', 'batoe1.jpg', '', '', '3', '15', '10', 'DIAMOND', 'Dilarang membawa hewan peliharaan', 'No extra bed', '1');
INSERT INTO `m_room` VALUES ('28', '30', 'ROYAL DIAMOND', '1', '1411410', 'ROYAL DIAMOND', '0000-00-00 00:00:00', 'batoe1.jpg', '', '', '3', '15', '10', 'ROYAL DIAMOND', 'Dilarang membawa hewan peliharaan', 'No extra bed', '1');
INSERT INTO `m_room` VALUES ('29', '32', 'BUSINESS TRAVELER ', '6', '650000', 'BUSINESS TRAVELER ROOM', '0000-00-00 00:00:00', 'park15.jpg', '', '', '3', '15', '10', 'BUSINESS TRAVELER ROOM', 'Dilarang membawa hewan peliharaan', 'No extra bed', '1');
INSERT INTO `m_room` VALUES ('30', '32', 'BUSINESS EXECUTIVE', '1', '2000000', 'BUSINESS EXECUTIVE ROOM', '0000-00-00 00:00:00', 'park4.jpg', '', '', '3', '15', '10', 'BUSINESS EXECUTIVE ROOM', 'Dilarang membawa hewan peliharaan', 'No extra bed', '1');
INSERT INTO `m_room` VALUES ('31', '32', 'BUSINESS SUITE', '1', '3000000', 'BUSINESS SUITE ROOM', '0000-00-00 00:00:00', 'park2.jpg', '', '', '3', '15', '10', 'BUSINESS SUITE ROOM', 'Dilarang membawa hewan peliharaan', 'No extra bed', '1');
INSERT INTO `m_room` VALUES ('32', '33', 'Deluxe', '2', '780000', 'Deluxe', '0000-00-00 00:00:00', 'travel10.jpg', '', '', '2', '15', '10', 'Deluxe', 'Dilarang membawa peliharaan', 'No extra bed', '1');
INSERT INTO `m_room` VALUES ('33', '33', 'Executive', '3', '950000', 'Executive', '0000-00-00 00:00:00', 'travel12.jpg', '', '', '2', '15', '10', 'Executive', 'Dilarang membawa hewan peliharaan', 'No extra bed', '1');
INSERT INTO `m_room` VALUES ('34', '33', 'Cipaku Suite', '1', '1700000', 'Cipaku Suite', '0000-00-00 00:00:00', 'travel8.jpg', '', '', '2', '15', '10', 'Cipaku Suite', 'Dilarang membawa hewan peliharaan', 'No extra bed', '1');
INSERT INTO `m_room` VALUES ('35', '33', 'Cipaganti Suite', '1', '2225000', 'Cipaganti Suite', '0000-00-00 00:00:00', 'travel2.jpg', '', '', '4', '15', '10', 'Cipaganti Suite', 'Dilarang membawa hewan peliharaan', 'No extra bed', '1');
INSERT INTO `m_room` VALUES ('36', '34', 'HARRIS Rooms', '7', '588000', 'HARRIS Rooms', '0000-00-00 00:00:00', 'harris1.jpg', '', '', '2', '15', '10', 'HARRIS Rooms', 'Dilarang membawa hewan peliharaan', 'No extra bed', '1');
INSERT INTO `m_room` VALUES ('37', '35', 'Superior Room', '4', '600000', 'Superior Room', '0000-00-00 00:00:00', 'garden16.jpg', '', '', '2', '15', '10', 'Superior Room', 'Dilarang membawa hewan peliharaan', 'No extra bed', '1');
INSERT INTO `m_room` VALUES ('38', '35', 'Deluxe Suite Room', '3', '725000', 'Deluxe Suite Room', '0000-00-00 00:00:00', 'garden2.jpg', '', '', '2', '15', '10', 'Deluxe Suite Room', 'Dilarang membawa hewan peliharaan', 'No extra bed', '1');
INSERT INTO `m_room` VALUES ('39', '35', 'Junior Suite Room', '3', '850000', 'Junior Suite Room', '0000-00-00 00:00:00', 'garden11.jpg', '', '', '2', '15', '10', 'Junior Suite Room', 'Dilarang membawa hewan peliharaan', 'No extra bed', '1');
INSERT INTO `m_room` VALUES ('40', '35', 'Executive Apartment 2', '0', '0', 'Executive Apartment 2 Bedrooms', '0000-00-00 00:00:00', 'garden4.jpg', '', '', '4', '15', '10', 'Executive Apartment 2 Bedrooms', 'Dilarang membawa hewan peliharaan', 'No extra bed', '1');
INSERT INTO `m_room` VALUES ('41', '35', 'Executive Apartment 3', '1', '0', 'Executive Apartment 3 Bedrooms', '0000-00-00 00:00:00', 'garden5.jpg', '', '', '4', '15', '10', 'Executive Apartment 3 Bedrooms', 'Dilarang membawa hewan peliharaan', 'No extra bed', '1');
INSERT INTO `m_room` VALUES ('42', '36', 'Deluxe Room', '3', '1390000', 'Deluxe Room', '0000-00-00 00:00:00', 'horison6.jpg', '', '', '2', '15', '10', 'Deluxe Room', 'Dilarang membawa hewan peliharaan', 'No extra bed', '1');
INSERT INTO `m_room` VALUES ('43', '36', 'Super Deluxe Room', '1', '1690000', 'Super Deluxe Room', '0000-00-00 00:00:00', 'horison7.jpg', '', '', '2', '15', '10', 'Super Deluxe Room', 'Dilarang membawa hewan peliharaan', 'No extra bed', '1');
INSERT INTO `m_room` VALUES ('44', '36', 'Executive Suite Room', '2', '2190000', 'Executive Suite Room', '0000-00-00 00:00:00', 'horison3.jpg', '', '', '2', '15', '10', 'Executive Suite Room', 'Dilarang membawa hewan peliharaan', 'No extra bed', '1');
INSERT INTO `m_room` VALUES ('47', '37', 'Happiness', '6', '0', 'Happiness', '0000-00-00 00:00:00', 'maxone1.jpg', '', '', '2', '15', '10', 'Happiness', 'Dilarang membawa hewan peliharaan', 'No Extra Beda', '1');
INSERT INTO `m_room` VALUES ('48', '37', 'Warmth', '6', '0', 'Warmth', '0000-00-00 00:00:00', 'maxone2.jpg', '', '', '2', '15', '10', 'Warmth', 'Dilarang membawa hewan peliharaan', 'No extra bed', '1');
INSERT INTO `m_room` VALUES ('49', '37', 'Love', '2', '0', 'Love', '0000-00-00 00:00:00', 'maxone3.jpg', '', '', '4', '15', '10', 'Love', 'Dilarang membawa peliharaan', 'No extra bed', '1');

-- ----------------------------
-- Table structure for `m_room_detail`
-- ----------------------------
DROP TABLE IF EXISTS `m_room_detail`;
CREATE TABLE `m_room_detail` (
  `room_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(20) DEFAULT NULL,
  `fac_id` int(20) DEFAULT NULL,
  `summ_id` int(20) DEFAULT NULL,
  `ame_id` int(20) DEFAULT NULL,
  `room_id` int(20) DEFAULT NULL,
  `room_detail_image` varchar(60) DEFAULT NULL,
  `date_input` date DEFAULT NULL,
  PRIMARY KEY (`room_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_room_detail
-- ----------------------------
INSERT INTO `m_room_detail` VALUES ('2', '1', '2', null, '3', null, null, '2014-11-25');
INSERT INTO `m_room_detail` VALUES ('3', '1', '3', null, '2', null, null, '2014-11-25');
INSERT INTO `m_room_detail` VALUES ('4', '1', '1', null, '4', null, null, '2015-01-23');
INSERT INTO `m_room_detail` VALUES ('6', '22', '2', null, '2', null, null, '2015-02-12');
INSERT INTO `m_room_detail` VALUES ('7', '22', '6', null, '8', null, null, '2015-02-12');
INSERT INTO `m_room_detail` VALUES ('8', '22', '7', null, '16', null, null, '2015-02-12');
INSERT INTO `m_room_detail` VALUES ('9', '25', '1', null, '1', null, null, '2015-02-13');
INSERT INTO `m_room_detail` VALUES ('10', '25', '2', null, '5', null, null, '2015-02-13');
INSERT INTO `m_room_detail` VALUES ('11', '25', '6', null, '7', null, null, '2015-02-13');
INSERT INTO `m_room_detail` VALUES ('12', '25', '16', null, '21', null, null, '2015-02-13');
INSERT INTO `m_room_detail` VALUES ('13', '25', '21', null, '8', null, null, '2015-02-13');
INSERT INTO `m_room_detail` VALUES ('14', '27', '1', null, '1', null, null, '2015-02-16');
INSERT INTO `m_room_detail` VALUES ('15', '27', '2', null, '4', null, null, '2015-02-16');
INSERT INTO `m_room_detail` VALUES ('16', '27', '7', null, '6', null, null, '2015-02-16');
INSERT INTO `m_room_detail` VALUES ('17', '27', '20', null, '14', null, null, '2015-02-16');
INSERT INTO `m_room_detail` VALUES ('21', '22', '1', null, '6', null, null, '2015-02-16');
INSERT INTO `m_room_detail` VALUES ('22', '30', '1', null, '1', null, null, '2015-03-19');
INSERT INTO `m_room_detail` VALUES ('23', '30', '2', null, '6', null, null, '2015-03-19');
INSERT INTO `m_room_detail` VALUES ('24', '30', '6', null, '14', null, null, '2015-03-19');
INSERT INTO `m_room_detail` VALUES ('25', '30', '20', null, '22', null, null, '2015-03-19');
INSERT INTO `m_room_detail` VALUES ('26', '32', '1', null, '1', null, null, '2015-03-20');
INSERT INTO `m_room_detail` VALUES ('27', '32', '2', null, '6', null, null, '2015-03-20');
INSERT INTO `m_room_detail` VALUES ('28', '32', '3', null, '14', null, null, '2015-03-20');
INSERT INTO `m_room_detail` VALUES ('29', '32', '9', null, '22', null, null, '2015-03-20');
INSERT INTO `m_room_detail` VALUES ('30', '33', '1', null, '1', null, null, '2015-03-20');
INSERT INTO `m_room_detail` VALUES ('31', '33', '3', null, '14', null, null, '2015-03-20');
INSERT INTO `m_room_detail` VALUES ('32', '33', '15', null, '6', null, null, '2015-03-20');
INSERT INTO `m_room_detail` VALUES ('33', '33', '5', null, '22', null, null, '2015-03-20');
INSERT INTO `m_room_detail` VALUES ('34', '34', '1', null, '1', null, null, '2015-03-20');
INSERT INTO `m_room_detail` VALUES ('35', '34', '3', null, '2', null, null, '2015-03-20');
INSERT INTO `m_room_detail` VALUES ('36', '34', '4', null, '6', null, null, '2015-03-20');
INSERT INTO `m_room_detail` VALUES ('37', '34', '20', null, '22', null, null, '2015-03-20');
INSERT INTO `m_room_detail` VALUES ('38', '35', '3', null, '14', null, null, '2015-03-23');
INSERT INTO `m_room_detail` VALUES ('39', '35', '14', null, '27', null, null, '2015-03-23');
INSERT INTO `m_room_detail` VALUES ('40', '35', '23', null, '26', null, null, '2015-03-23');
INSERT INTO `m_room_detail` VALUES ('41', '36', '3', null, '14', null, null, '2015-03-23');
INSERT INTO `m_room_detail` VALUES ('42', '36', '23', null, '26', null, null, '2015-03-23');
INSERT INTO `m_room_detail` VALUES ('43', '37', '2', null, '4', null, null, '2015-04-16');
INSERT INTO `m_room_detail` VALUES ('44', '37', '1', null, '0', null, null, '2015-04-16');
INSERT INTO `m_room_detail` VALUES ('45', '37', '20', null, '0', null, null, '2015-04-16');
INSERT INTO `m_room_detail` VALUES ('46', '37', '0', null, '1', null, null, '2015-04-16');
INSERT INTO `m_room_detail` VALUES ('47', '37', '0', null, '16', null, null, '2015-04-16');

-- ----------------------------
-- Table structure for `m_summary`
-- ----------------------------
DROP TABLE IF EXISTS `m_summary`;
CREATE TABLE `m_summary` (
  `summ_id` int(20) NOT NULL AUTO_INCREMENT,
  `summ_name` varchar(40) DEFAULT NULL,
  `summ_desc` text,
  `date_input` datetime DEFAULT NULL,
  PRIMARY KEY (`summ_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_summary
-- ----------------------------
INSERT INTO `m_summary` VALUES ('1', 'malaga', 'Situated near the sea, this hotel is close to Centre de Arte Contemporaneo, Malaga Cathedral, and Malaga Amphitheatre. Also nearby are Alcazaba and Picasso\'s Birthplace.', '2014-09-26 15:39:01');
INSERT INTO `m_summary` VALUES ('2', '2 Restaurant, a bar/lounge', 'Situated near the sea, this hotel is close to Centre de Arte Contemporaneo, Malaga Cathedral, and Malaga Amphitheatre. Also nearby are Alcazaba and Picasso\'s Birthplace.', '2014-09-26 15:39:45');
INSERT INTO `m_summary` VALUES ('3', 'Complimentary Wi-Fi', 'Yes', '2014-09-26 15:40:13');
INSERT INTO `m_summary` VALUES ('4', 'Internet', 'Yes', '2014-09-26 15:40:29');
INSERT INTO `m_summary` VALUES ('5', 'Parking', 'Yes', '2014-09-26 15:40:49');
INSERT INTO `m_summary` VALUES ('6', 'Room Amenities', null, '2014-09-26 15:41:53');

-- ----------------------------
-- Table structure for `m_tiket`
-- ----------------------------
DROP TABLE IF EXISTS `m_tiket`;
CREATE TABLE `m_tiket` (
  `tiket_id` int(20) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(20) DEFAULT NULL,
  `flag_tiket` int(20) DEFAULT '1' COMMENT 'jika 0 tiket masuk, jika 1 harga lainnya',
  `flag_hari_libur` int(20) DEFAULT '0' COMMENT 'jika 0 hari kerja, jika 1 hari libur',
  `tiket_nama` varchar(225) DEFAULT NULL,
  `tiket_harga_dewasa_biasa` decimal(20,2) DEFAULT NULL,
  `tiket_harga_anak_biasa` decimal(20,2) DEFAULT NULL,
  `tiket_harga_dewasa_libur` decimal(20,2) DEFAULT NULL,
  `tiket_harga_anak_libur` decimal(20,2) DEFAULT NULL,
  `tiket_harga_dewasa_holiday` decimal(20,2) DEFAULT NULL,
  `tiket_harga_anak_holiday` decimal(20,2) DEFAULT NULL,
  `tiket_harga_permainan` decimal(20,2) DEFAULT NULL,
  PRIMARY KEY (`tiket_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_tiket
-- ----------------------------
INSERT INTO `m_tiket` VALUES ('1', '14', '0', '0', 'Tiket Masuk', '20000.00', '15000.00', '25000.00', '20000.00', '30000.00', '25000.00', null);
INSERT INTO `m_tiket` VALUES ('2', '14', '1', '0', 'Naik Gajah', null, null, null, null, null, null, '20000.00');
INSERT INTO `m_tiket` VALUES ('3', '14', '1', '0', 'Naik Onta', null, null, null, null, null, null, '20000.00');

-- ----------------------------
-- Table structure for `m_tmpt`
-- ----------------------------
DROP TABLE IF EXISTS `m_tmpt`;
CREATE TABLE `m_tmpt` (
  `tmpt_id` int(20) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(20) DEFAULT NULL,
  `tmpt_nama` varchar(90) DEFAULT NULL,
  `tmpt_jarak` varchar(10) DEFAULT NULL,
  `tmpt_satuan` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`tmpt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_tmpt
-- ----------------------------
INSERT INTO `m_tmpt` VALUES ('1', '1', 'Kolam Renang Cipaku', '0.56', 'KM');
INSERT INTO `m_tmpt` VALUES ('2', '1', 'Batu Nunggal', '12', 'M');
INSERT INTO `m_tmpt` VALUES ('3', '1', 'asdsa', '15', 'KM');
INSERT INTO `m_tmpt` VALUES ('4', '1', 'asdsa', '15', 'KM');
INSERT INTO `m_tmpt` VALUES ('5', '1', 'as', '12', 'M');
INSERT INTO `m_tmpt` VALUES ('6', '1', 'as', '12', 'M');
INSERT INTO `m_tmpt` VALUES ('7', '1', 'asdasd', '0.23', 'M');
INSERT INTO `m_tmpt` VALUES ('8', '1', 'lkjlkj', '11', 'KM');
INSERT INTO `m_tmpt` VALUES ('9', '4', 'l;k;lk;l', '20', 'M');
INSERT INTO `m_tmpt` VALUES ('10', '22', 'Trans Studio Bandung', '2', 'KM');
INSERT INTO `m_tmpt` VALUES ('13', '22', 'TSM', '2', 'KM');
INSERT INTO `m_tmpt` VALUES ('14', '22', 'Pasar Buku Palasari', '50', 'M');
INSERT INTO `m_tmpt` VALUES ('15', '25', 'Festival City Link', '0', 'M');
INSERT INTO `m_tmpt` VALUES ('16', '25', 'Alun alun Bandung', '3', 'KM');
INSERT INTO `m_tmpt` VALUES ('17', '25', 'Museum Sribaduga', '5', 'KM');
INSERT INTO `m_tmpt` VALUES ('18', '27', 'Paris Van Java', '5', 'KM');
INSERT INTO `m_tmpt` VALUES ('19', '27', 'Gedung Sate', '10', 'KM');
INSERT INTO `m_tmpt` VALUES ('20', '27', 'BTC', '200', 'M');
INSERT INTO `m_tmpt` VALUES ('21', '30', 'Istana Plaza', '20', 'M');
INSERT INTO `m_tmpt` VALUES ('22', '30', 'Bandara Husein', '1', 'KM');
INSERT INTO `m_tmpt` VALUES ('23', '30', 'Cihampelas', '4', 'KM');
INSERT INTO `m_tmpt` VALUES ('24', '32', 'Cartil', '3', 'KM');
INSERT INTO `m_tmpt` VALUES ('25', '32', 'Ciwalk', '3', 'KM');
INSERT INTO `m_tmpt` VALUES ('26', '32', 'Jalan Riau', '4', 'KM');
INSERT INTO `m_tmpt` VALUES ('27', '33', 'Kampung Gajah', '3', 'KM');
INSERT INTO `m_tmpt` VALUES ('28', '33', 'Rumah Sosis', '1', 'KM');
INSERT INTO `m_tmpt` VALUES ('29', '33', 'Ciater', '5', 'KM');
INSERT INTO `m_tmpt` VALUES ('30', '34', 'Festifal CityLink', '0', 'M');
INSERT INTO `m_tmpt` VALUES ('31', '34', 'Trans Studio Bandung', '3', 'KM');
INSERT INTO `m_tmpt` VALUES ('32', '35', 'BTC', '2', 'KM');
INSERT INTO `m_tmpt` VALUES ('33', '35', 'PVJ', '5', 'KM');
INSERT INTO `m_tmpt` VALUES ('34', '36', 'Trans Studio Bandung', '1', 'KM');
INSERT INTO `m_tmpt` VALUES ('35', '36', 'Telkom University', '3', 'KM');
INSERT INTO `m_tmpt` VALUES ('38', '37', 'Trans Studio Bandung', '3', 'KM');
INSERT INTO `m_tmpt` VALUES ('39', '37', 'Museum Sri Baduga', '6', 'KM');

-- ----------------------------
-- Table structure for `m_voucher`
-- ----------------------------
DROP TABLE IF EXISTS `m_voucher`;
CREATE TABLE `m_voucher` (
  `voc_id` int(20) NOT NULL AUTO_INCREMENT,
  `voc_code` bigint(225) DEFAULT NULL,
  `voc_code_encrypt` varchar(225) DEFAULT NULL,
  `voc_nilai` decimal(20,2) DEFAULT NULL,
  `voc_exp` date DEFAULT NULL,
  `flag_use` int(2) DEFAULT '0',
  `date_input` date DEFAULT NULL,
  PRIMARY KEY (`voc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_voucher
-- ----------------------------
INSERT INTO `m_voucher` VALUES ('1', '111222333444', '09McPUri7nKO2', '100000.00', '2015-02-28', '1', '2015-02-06');
INSERT INTO `m_voucher` VALUES ('2', '1111', 'b5kxZGyFeUeV6', '100000.00', '2015-03-31', '1', '2015-02-17');
INSERT INTO `m_voucher` VALUES ('3', '7777777', 'dcyt10bII7ZGM', '50000.00', '2015-03-31', '1', '2015-03-05');
INSERT INTO `m_voucher` VALUES ('4', '7774', 'c1TjunvdclmBk', '200000.00', '2015-04-30', '1', '2015-04-17');

-- ----------------------------
-- Table structure for `m_wilayah`
-- ----------------------------
DROP TABLE IF EXISTS `m_wilayah`;
CREATE TABLE `m_wilayah` (
  `wil_id` int(10) NOT NULL AUTO_INCREMENT,
  `wil_nama` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`wil_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_wilayah
-- ----------------------------
INSERT INTO `m_wilayah` VALUES ('1', 'Bandung Tengah');
INSERT INTO `m_wilayah` VALUES ('2', 'Bandung Barat');
INSERT INTO `m_wilayah` VALUES ('3', 'Bandung Utara');
INSERT INTO `m_wilayah` VALUES ('4', 'Bandung Selatan');
INSERT INTO `m_wilayah` VALUES ('5', 'Pusat Kota');

-- ----------------------------
-- Table structure for `m_wiskul_meja`
-- ----------------------------
DROP TABLE IF EXISTS `m_wiskul_meja`;
CREATE TABLE `m_wiskul_meja` (
  `meja_id` int(20) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(20) DEFAULT NULL COMMENT 'JOIN dengan table m_hotel',
  `meja_nomor` varchar(50) DEFAULT NULL,
  `meja_jumlah_kursi` int(20) DEFAULT NULL,
  `meja_nomor_pesanan` int(10) DEFAULT NULL COMMENT 'untuk pemasangan no booking meja',
  `meja_tgl_pesanan` datetime DEFAULT NULL,
  PRIMARY KEY (`meja_id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_wiskul_meja
-- ----------------------------
INSERT INTO `m_wiskul_meja` VALUES ('1', '15', '201', '4', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('2', '15', '202', '4', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('3', '15', '203', '4', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('4', '15', '204', '4', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('5', '15', '205', '4', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('6', '15', '206', '4', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('7', '15', '207', '6', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('8', '15', '208', '6', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('9', '16', '201', '4', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('10', '16', '202', '4', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('11', '16', '203', '4', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('12', '16', '204', '4', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('13', '16', '205', '6', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('14', '16', '206', '6', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('15', '16', '207', '6', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('16', '16', '208', '6', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('17', '17', '201', '4', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('18', '17', '202', '4', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('19', '17', '203', '4', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('20', '17', '204', '4', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('21', '17', '205', '4', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('22', '17', '206', '4', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('23', '17', '207', '6', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('24', '17', '208', '6', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('25', '18', '201', '4', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('26', '18', '202', '4', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('27', '18', '203', '4', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('28', '18', '204', '4', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('29', '18', '205', '6', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('30', '18', '206', '6', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('31', '18', '207', '6', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('32', '18', '208', '6', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('33', '19', '201', '4', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('34', '19', '202', '4', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('35', '19', '203', '4', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('36', '19', '204', '4', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('37', '19', '205', '4', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('38', '19', '206', '4', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('39', '19', '207', '6', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('40', '19', '208', '6', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('41', '20', '201', '4', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('42', '20', '202', '4', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('43', '20', '203', '4', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('44', '20', '204', '4', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('45', '20', '205', '6', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('46', '20', '206', '6', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('47', '20', '207', '6', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('48', '20', '208', '6', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('49', '21', '201', '4', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('50', '21', '202', '4', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('51', '21', '203', '4', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('52', '21', '204', '4', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('53', '21', '205', '4', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('54', '21', '206', '5', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('55', '21', '207', '5', null, null);
INSERT INTO `m_wiskul_meja` VALUES ('56', '21', '208', '5', null, null);

-- ----------------------------
-- Table structure for `plane_fasilitas`
-- ----------------------------
DROP TABLE IF EXISTS `plane_fasilitas`;
CREATE TABLE `plane_fasilitas` (
  `plane_fasilitas_id` int(20) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(20) DEFAULT NULL,
  `plane_fasilitas_nama` varchar(225) DEFAULT NULL,
  `plane_fasilitas_icon` varchar(225) DEFAULT NULL,
  `plane_fasilitas_berat` int(20) DEFAULT NULL,
  PRIMARY KEY (`plane_fasilitas_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of plane_fasilitas
-- ----------------------------
INSERT INTO `plane_fasilitas` VALUES ('1', '6', 'Bagasi', 'bag_travel15.png', '15');
INSERT INTO `plane_fasilitas` VALUES ('2', '7', 'Bagasi', 'bag_travel20.png', '20');
INSERT INTO `plane_fasilitas` VALUES ('3', '6', 'Airport Tax', 'plane.png', null);
INSERT INTO `plane_fasilitas` VALUES ('4', '8', 'Makanan', 'eat.png', null);

-- ----------------------------
-- Table structure for `promotion`
-- ----------------------------
DROP TABLE IF EXISTS `promotion`;
CREATE TABLE `promotion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` int(20) NOT NULL,
  `start` date NOT NULL,
  `end` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of promotion
-- ----------------------------
INSERT INTO `promotion` VALUES ('1', '2000000', '2014-11-05', '2014-11-05');

-- ----------------------------
-- Table structure for `room_ame_detail`
-- ----------------------------
DROP TABLE IF EXISTS `room_ame_detail`;
CREATE TABLE `room_ame_detail` (
  `room_ame_id` int(20) NOT NULL AUTO_INCREMENT,
  `ame_id` int(20) DEFAULT NULL,
  `sum_id` int(20) DEFAULT NULL,
  `hotel_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`room_ame_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of room_ame_detail
-- ----------------------------
INSERT INTO `room_ame_detail` VALUES ('1', '1', '6', '1');
INSERT INTO `room_ame_detail` VALUES ('2', '2', '6', '1');
INSERT INTO `room_ame_detail` VALUES ('3', '3', '6', '1');
INSERT INTO `room_ame_detail` VALUES ('4', '4', '6', '1');
INSERT INTO `room_ame_detail` VALUES ('5', '5', '6', '1');
INSERT INTO `room_ame_detail` VALUES ('6', '6', '6', '1');
INSERT INTO `room_ame_detail` VALUES ('7', '7', '6', '1');
INSERT INTO `room_ame_detail` VALUES ('8', '8', '6', '1');
INSERT INTO `room_ame_detail` VALUES ('9', '9', '6', '1');
INSERT INTO `room_ame_detail` VALUES ('10', '10', '6', '1');
INSERT INTO `room_ame_detail` VALUES ('11', '11', '6', '1');
INSERT INTO `room_ame_detail` VALUES ('12', '12', '6', '1');

-- ----------------------------
-- Table structure for `room_type_detail`
-- ----------------------------
DROP TABLE IF EXISTS `room_type_detail`;
CREATE TABLE `room_type_detail` (
  `room_type_detail_id` int(20) NOT NULL AUTO_INCREMENT,
  `room_id` int(20) DEFAULT NULL,
  `ame_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`room_type_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of room_type_detail
-- ----------------------------
INSERT INTO `room_type_detail` VALUES ('1', '1', '4');
INSERT INTO `room_type_detail` VALUES ('2', '1', '6');
INSERT INTO `room_type_detail` VALUES ('3', '1', '7');
INSERT INTO `room_type_detail` VALUES ('4', '1', '2');
INSERT INTO `room_type_detail` VALUES ('5', '1', '8');
INSERT INTO `room_type_detail` VALUES ('6', '1', '11');
INSERT INTO `room_type_detail` VALUES ('7', '2', '4');
INSERT INTO `room_type_detail` VALUES ('8', '2', '5');
INSERT INTO `room_type_detail` VALUES ('9', '2', '8');
INSERT INTO `room_type_detail` VALUES ('10', '2', '12');
INSERT INTO `room_type_detail` VALUES ('11', '2', '5');
INSERT INTO `room_type_detail` VALUES ('12', '3', '6');
INSERT INTO `room_type_detail` VALUES ('13', '3', '7');
INSERT INTO `room_type_detail` VALUES ('14', '3', '11');
INSERT INTO `room_type_detail` VALUES ('15', '3', '2');
INSERT INTO `room_type_detail` VALUES ('16', '3', '3');
INSERT INTO `room_type_detail` VALUES ('17', '3', '4');
INSERT INTO `room_type_detail` VALUES ('18', '3', '7');
INSERT INTO `room_type_detail` VALUES ('19', '4', '5');
INSERT INTO `room_type_detail` VALUES ('20', '4', '6');
INSERT INTO `room_type_detail` VALUES ('21', '4', '8');
INSERT INTO `room_type_detail` VALUES ('22', '4', '7');
INSERT INTO `room_type_detail` VALUES ('23', '4', '9');
INSERT INTO `room_type_detail` VALUES ('24', '5', '7');
INSERT INTO `room_type_detail` VALUES ('25', '5', '1');
INSERT INTO `room_type_detail` VALUES ('26', '5', '2');
INSERT INTO `room_type_detail` VALUES ('27', '5', '3');
INSERT INTO `room_type_detail` VALUES ('28', '5', '8');
INSERT INTO `room_type_detail` VALUES ('29', '6', '6');
INSERT INTO `room_type_detail` VALUES ('30', '6', '8');
INSERT INTO `room_type_detail` VALUES ('31', '6', '7');
INSERT INTO `room_type_detail` VALUES ('32', '6', '4');
INSERT INTO `room_type_detail` VALUES ('33', '6', '3');
INSERT INTO `room_type_detail` VALUES ('34', '6', '2');
INSERT INTO `room_type_detail` VALUES ('35', '6', '1');

-- ----------------------------
-- Table structure for `spam`
-- ----------------------------
DROP TABLE IF EXISTS `spam`;
CREATE TABLE `spam` (
  `spam_id` int(10) NOT NULL AUTO_INCREMENT,
  `kar_id` int(10) DEFAULT NULL,
  `alert` varchar(90) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`spam_id`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of spam
-- ----------------------------
INSERT INTO `spam` VALUES ('1', '180', 'WARNING!!! intruder to class lap_pengaduan', '2014-10-22 10:45:01');
INSERT INTO `spam` VALUES ('2', '180', 'WARNING!!! intruder to class lap_pengaduan', '2014-10-22 10:45:05');
INSERT INTO `spam` VALUES ('3', '180', 'WARNING!!! intruder to class lap_pengaduan', '2014-10-22 10:45:21');
INSERT INTO `spam` VALUES ('4', '180', 'WARNING!!! intruder to class lap_pengaduan', '2014-10-22 10:47:27');
INSERT INTO `spam` VALUES ('5', '188', 'WARNING!!! intruder to class lap_pengaduan', '2014-10-22 10:50:49');
INSERT INTO `spam` VALUES ('6', '186', 'WARNING!!! intruder to class form_survey', '2014-10-22 10:57:47');
INSERT INTO `spam` VALUES ('7', '188', 'WARNING!!! intruder to class lap_pengaduan', '2014-10-22 10:58:08');
INSERT INTO `spam` VALUES ('8', '180', 'WARNING!!! intruder to class lap_pengaduan', '2014-10-22 10:58:21');
INSERT INTO `spam` VALUES ('9', '180', 'WARNING!!! intruder to class lap_pengaduan', '2014-10-22 11:05:14');
INSERT INTO `spam` VALUES ('10', '180', 'WARNING!!! intruder to class lap_pengaduan', '2014-10-22 11:05:17');
INSERT INTO `spam` VALUES ('11', '1', 'WARNING!!! intruder to class mst_jabatan', '2014-12-01 11:06:25');
INSERT INTO `spam` VALUES ('12', '2', 'WARNING!!! intruder to class 0', '2014-12-01 12:26:06');
INSERT INTO `spam` VALUES ('13', '2', 'WARNING!!! intruder to class det_penawaran?penId=1', '2014-12-06 11:10:43');
INSERT INTO `spam` VALUES ('14', '2', 'WARNING!!! intruder to class mst_jabatan', '2014-12-10 13:42:33');
INSERT INTO `spam` VALUES ('15', '2', 'WARNING!!! intruder to class profil', '2015-02-10 16:56:43');
INSERT INTO `spam` VALUES ('16', '2', 'WARNING!!! intruder to class profil', '2015-02-10 17:00:01');
INSERT INTO `spam` VALUES ('17', '2', 'WARNING!!! intruder to class profil', '2015-02-11 13:50:29');
INSERT INTO `spam` VALUES ('18', '2', 'WARNING!!! intruder to class profil', '2015-02-11 13:50:38');
INSERT INTO `spam` VALUES ('19', '2', 'WARNING!!! intruder to class profil', '2015-02-12 09:05:41');
INSERT INTO `spam` VALUES ('20', '2', 'WARNING!!! intruder to class profil', '2015-02-13 10:47:09');
INSERT INTO `spam` VALUES ('21', '9', 'WARNING!!! intruder to class password', '2015-02-17 12:11:20');
INSERT INTO `spam` VALUES ('22', '9', 'WARNING!!! intruder to class password', '2015-02-17 12:11:24');
INSERT INTO `spam` VALUES ('23', '9', 'WARNING!!! intruder to class profil', '2015-02-17 12:11:26');
INSERT INTO `spam` VALUES ('24', '9', 'WARNING!!! intruder to class profil', '2015-02-17 12:11:34');
INSERT INTO `spam` VALUES ('25', '12', 'WARNING!!! intruder to class profil', '2015-02-17 15:32:06');
INSERT INTO `spam` VALUES ('26', '12', 'WARNING!!! intruder to class profil', '2015-02-17 15:32:16');
INSERT INTO `spam` VALUES ('27', '12', 'WARNING!!! intruder to class profil', '2015-02-17 15:33:38');
INSERT INTO `spam` VALUES ('28', '12', 'WARNING!!! intruder to class password', '2015-02-17 15:33:45');
INSERT INTO `spam` VALUES ('29', '9', 'WARNING!!! intruder to class profil', '2015-02-18 09:15:54');
INSERT INTO `spam` VALUES ('30', '10', 'WARNING!!! intruder to class profil', '2015-02-18 09:21:13');
INSERT INTO `spam` VALUES ('31', '10', 'WARNING!!! intruder to class profil', '2015-02-18 09:21:34');
INSERT INTO `spam` VALUES ('32', '10', 'WARNING!!! intruder to class profil', '2015-02-18 09:21:45');
INSERT INTO `spam` VALUES ('33', '10', 'WARNING!!! intruder to class password', '2015-02-20 10:17:23');
INSERT INTO `spam` VALUES ('34', '10', 'WARNING!!! intruder to class password', '2015-02-20 10:17:28');
INSERT INTO `spam` VALUES ('35', '10', 'WARNING!!! intruder to class profil', '2015-02-20 11:00:51');
INSERT INTO `spam` VALUES ('36', '10', 'WARNING!!! intruder to class profil', '2015-02-20 11:00:55');
INSERT INTO `spam` VALUES ('37', '10', 'WARNING!!! intruder to class profil', '2015-02-20 11:01:07');
INSERT INTO `spam` VALUES ('38', '9', 'WARNING!!! intruder to class password', '2015-02-21 09:27:37');
INSERT INTO `spam` VALUES ('39', '9', 'WARNING!!! intruder to class password', '2015-02-21 09:27:41');
INSERT INTO `spam` VALUES ('40', '9', 'WARNING!!! intruder to class profil', '2015-02-21 09:27:44');
INSERT INTO `spam` VALUES ('41', '12', 'WARNING!!! intruder to class survey', '2015-02-23 15:45:25');
INSERT INTO `spam` VALUES ('42', '9', 'WARNING!!! intruder to class password', '2015-02-23 16:49:18');
INSERT INTO `spam` VALUES ('43', '9', 'WARNING!!! intruder to class password', '2015-02-24 09:08:10');
INSERT INTO `spam` VALUES ('44', '9', 'WARNING!!! intruder to class password', '2015-02-24 09:08:20');
INSERT INTO `spam` VALUES ('45', '9', 'WARNING!!! intruder to class profil', '2015-02-24 09:08:22');
INSERT INTO `spam` VALUES ('46', '9', 'WARNING!!! intruder to class password', '2015-02-24 09:08:46');
INSERT INTO `spam` VALUES ('47', '9', 'WARNING!!! intruder to class password', '2015-02-24 09:09:11');
INSERT INTO `spam` VALUES ('48', '9', 'WARNING!!! intruder to class password', '2015-02-24 09:09:14');
INSERT INTO `spam` VALUES ('49', '9', 'WARNING!!! intruder to class profil', '2015-02-24 09:09:19');
INSERT INTO `spam` VALUES ('50', '9', 'WARNING!!! intruder to class profil', '2015-02-24 11:10:01');
INSERT INTO `spam` VALUES ('51', '16', 'WARNING!!! intruder to class password', '2015-02-24 15:44:09');
INSERT INTO `spam` VALUES ('52', '16', 'WARNING!!! intruder to class password', '2015-02-24 15:44:12');
INSERT INTO `spam` VALUES ('53', '16', 'WARNING!!! intruder to class password', '2015-02-24 15:44:18');
INSERT INTO `spam` VALUES ('54', '18', 'WARNING!!! intruder to class profil', '2015-02-26 10:31:30');
INSERT INTO `spam` VALUES ('55', '22', 'WARNING!!! intruder to class lap_Pemesanan', '2015-03-09 14:43:33');
INSERT INTO `spam` VALUES ('56', '22', 'WARNING!!! intruder to class lap_Check In', '2015-03-11 16:32:47');
INSERT INTO `spam` VALUES ('57', '23', 'WARNING!!! intruder to class lap_checkin', '2015-03-13 14:21:59');
INSERT INTO `spam` VALUES ('58', '22', 'WARNING!!! intruder to class profil', '2015-03-25 10:59:03');
INSERT INTO `spam` VALUES ('59', '22', 'WARNING!!! intruder to class profil', '2015-03-25 10:59:09');
INSERT INTO `spam` VALUES ('60', '22', 'WARNING!!! intruder to class profil', '2015-03-25 10:59:14');
INSERT INTO `spam` VALUES ('61', '22', 'WARNING!!! intruder to class profil', '2015-03-25 11:04:19');
INSERT INTO `spam` VALUES ('62', '22', 'WARNING!!! intruder to class profil', '2015-03-25 11:11:04');
INSERT INTO `spam` VALUES ('63', '22', 'WARNING!!! intruder to class profil', '2015-03-25 11:12:01');
INSERT INTO `spam` VALUES ('64', '22', 'WARNING!!! intruder to class profil', '2015-03-25 11:30:01');
INSERT INTO `spam` VALUES ('65', '22', 'WARNING!!! intruder to class profil', '2015-03-25 11:30:06');
INSERT INTO `spam` VALUES ('66', '22', 'WARNING!!! intruder to class profil', '2015-03-25 11:30:13');
INSERT INTO `spam` VALUES ('67', '22', 'WARNING!!! intruder to class profil', '2015-04-06 13:56:25');
INSERT INTO `spam` VALUES ('68', '22', 'WARNING!!! intruder to class profil', '2015-04-06 13:56:28');
INSERT INTO `spam` VALUES ('69', '22', 'WARNING!!! intruder to class profil', '2015-04-06 13:56:59');
INSERT INTO `spam` VALUES ('70', '22', 'WARNING!!! intruder to class profil', '2015-04-06 13:57:08');
INSERT INTO `spam` VALUES ('71', '22', 'WARNING!!! intruder to class profil', '2015-04-06 13:57:16');
INSERT INTO `spam` VALUES ('72', '22', 'WARNING!!! intruder to class profil', '2015-04-06 13:57:24');
INSERT INTO `spam` VALUES ('73', '22', 'WARNING!!! intruder to class profil', '2015-04-06 13:57:28');
INSERT INTO `spam` VALUES ('74', '10', 'WARNING!!! intruder to class profil', '2015-04-06 14:02:23');
INSERT INTO `spam` VALUES ('75', '10', 'WARNING!!! intruder to class profil', '2015-04-06 14:02:28');
INSERT INTO `spam` VALUES ('76', '10', 'WARNING!!! intruder to class profil', '2015-04-06 14:02:35');
INSERT INTO `spam` VALUES ('77', '10', 'WARNING!!! intruder to class profil', '2015-04-06 14:05:45');
INSERT INTO `spam` VALUES ('78', '10', 'WARNING!!! intruder to class profil', '2015-04-06 14:07:41');
INSERT INTO `spam` VALUES ('79', '10', 'WARNING!!! intruder to class profil', '2015-04-06 14:07:48');
INSERT INTO `spam` VALUES ('80', '10', 'WARNING!!! intruder to class profil', '2015-04-06 14:07:53');
INSERT INTO `spam` VALUES ('81', '22', 'WARNING!!! intruder to class profil', '2015-04-06 14:11:35');
INSERT INTO `spam` VALUES ('82', '22', 'WARNING!!! intruder to class profil', '2015-04-06 14:11:38');
INSERT INTO `spam` VALUES ('83', '10', 'WARNING!!! intruder to class profil', '2015-04-06 14:12:02');
INSERT INTO `spam` VALUES ('84', '22', 'WARNING!!! intruder to class profil', '2015-04-06 14:12:11');
INSERT INTO `spam` VALUES ('85', '10', 'WARNING!!! intruder to class profil', '2015-04-06 14:12:11');
INSERT INTO `spam` VALUES ('86', '10', 'WARNING!!! intruder to class profil', '2015-04-06 14:22:32');
INSERT INTO `spam` VALUES ('87', '22', 'WARNING!!! intruder to class profil', '2015-04-06 15:20:29');
INSERT INTO `spam` VALUES ('88', '22', 'WARNING!!! intruder to class lap_Check In', '2015-04-06 15:45:29');
INSERT INTO `spam` VALUES ('89', '16', 'WARNING!!! intruder to class mst_hotel', '2015-04-06 16:45:55');
INSERT INTO `spam` VALUES ('90', '10', 'WARNING!!! intruder to class mst_hotel', '2015-04-14 10:39:38');
INSERT INTO `spam` VALUES ('91', '22', 'WARNING!!! intruder to class mst_agntrav', '2015-04-15 09:58:17');
INSERT INTO `spam` VALUES ('92', '15', 'WARNING!!! intruder to class password', '2015-04-18 08:27:23');
INSERT INTO `spam` VALUES ('93', '15', 'WARNING!!! intruder to class password', '2015-04-18 08:27:31');
INSERT INTO `spam` VALUES ('94', '15', 'WARNING!!! intruder to class profil', '2015-04-18 08:27:35');
INSERT INTO `spam` VALUES ('95', '15', 'WARNING!!! intruder to class profil', '2015-04-18 08:44:27');
INSERT INTO `spam` VALUES ('96', '15', 'WARNING!!! intruder to class password', '2015-04-18 08:44:30');
INSERT INTO `spam` VALUES ('97', '15', 'WARNING!!! intruder to class password', '2015-04-18 08:44:33');
INSERT INTO `spam` VALUES ('98', '31', 'WARNING!!! intruder to class profil', '2015-04-18 10:26:28');
INSERT INTO `spam` VALUES ('99', '31', 'WARNING!!! intruder to class profil', '2015-04-18 10:27:20');
INSERT INTO `spam` VALUES ('100', '31', 'WARNING!!! intruder to class profil', '2015-04-18 10:27:23');
INSERT INTO `spam` VALUES ('101', '31', 'WARNING!!! intruder to class profil', '2015-04-18 10:53:51');
INSERT INTO `spam` VALUES ('102', '15', 'WARNING!!! intruder to class profil', '2015-04-18 11:04:49');
INSERT INTO `spam` VALUES ('103', '31', 'WARNING!!! intruder to class lap_Check In', '2015-04-18 19:17:00');
INSERT INTO `spam` VALUES ('104', '31', 'WARNING!!! intruder to class lap_Check In', '2015-04-18 19:17:11');
INSERT INTO `spam` VALUES ('105', '16', 'WARNING!!! intruder to class profil', '2015-04-20 11:08:10');
INSERT INTO `spam` VALUES ('106', '16', 'WARNING!!! intruder to class profil', '2015-04-20 11:08:29');
INSERT INTO `spam` VALUES ('107', '16', 'WARNING!!! intruder to class profil', '2015-04-20 11:10:52');
INSERT INTO `spam` VALUES ('108', '16', 'WARNING!!! intruder to class profil', '2015-04-20 11:11:11');
INSERT INTO `spam` VALUES ('109', '16', 'WARNING!!! intruder to class profil', '2015-04-20 11:30:00');
INSERT INTO `spam` VALUES ('110', '10', 'WARNING!!! intruder to class profil', '2015-04-20 11:50:04');
INSERT INTO `spam` VALUES ('111', '16', 'WARNING!!! intruder to class profil', '2015-04-20 12:02:40');
INSERT INTO `spam` VALUES ('112', '31', 'WARNING!!! intruder to class profil', '2015-04-20 13:24:43');
INSERT INTO `spam` VALUES ('113', '31', 'WARNING!!! intruder to class profil', '2015-04-20 13:24:46');
INSERT INTO `spam` VALUES ('114', '31', 'WARNING!!! intruder to class profil', '2015-04-20 13:24:55');
INSERT INTO `spam` VALUES ('115', '10', 'WARNING!!! intruder to class lap_pemesanan', '2015-04-20 16:22:56');

-- ----------------------------
-- Table structure for `tabel_histori`
-- ----------------------------
DROP TABLE IF EXISTS `tabel_histori`;
CREATE TABLE `tabel_histori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status_baca` enum('0','1') NOT NULL DEFAULT '0',
  `jenis_transaksi` enum('tambah','ubah','hapus','ubahst','cetak','reminder') NOT NULL,
  `menu` varchar(50) NOT NULL,
  `waktu` datetime NOT NULL,
  `username` varchar(60) NOT NULL,
  `id_data` int(11) NOT NULL,
  `class` varchar(50) NOT NULL,
  `flag_bunyi` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tabel_histori
-- ----------------------------

-- ----------------------------
-- Table structure for `trs_kebutuhan`
-- ----------------------------
DROP TABLE IF EXISTS `trs_kebutuhan`;
CREATE TABLE `trs_kebutuhan` (
  `rinci_id` int(20) NOT NULL AUTO_INCREMENT,
  `rinci_nomor` varchar(225) DEFAULT NULL,
  `rinci_tanggal` datetime DEFAULT NULL,
  `kar_id` int(20) DEFAULT NULL,
  `rinci_id_pel` varchar(225) DEFAULT NULL,
  `rinci_nama_pel` varchar(225) DEFAULT NULL,
  `rinci_tlp_pel` varchar(50) DEFAULT '0',
  `rinci_email_pel` varchar(225) DEFAULT NULL,
  `rinci_jenkel_pel` varchar(50) DEFAULT NULL,
  `rinci_alamat_pel` text,
  `prov_id` int(10) DEFAULT NULL,
  `kota_id` int(10) DEFAULT NULL,
  `rinci_alamat_tuj` text,
  `status_cetak` int(2) DEFAULT '0',
  `status_send` int(2) DEFAULT '0',
  `voc_code` bigint(225) DEFAULT NULL,
  `voc_date_input` datetime NOT NULL,
  `input_date` datetime DEFAULT NULL,
  `pdf_name_agent` varchar(225) DEFAULT NULL,
  `pdf_name_guest` varchar(225) DEFAULT NULL,
  `zip_name` varchar(225) DEFAULT NULL,
  `total_pesanan` decimal(20,0) DEFAULT '0',
  `status_baca2` enum('0','1') NOT NULL,
  PRIMARY KEY (`rinci_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of trs_kebutuhan
-- ----------------------------
INSERT INTO `trs_kebutuhan` VALUES ('7', '20150224/AGT-01/0001', '2015-02-24 00:00:00', '9', '1111', 'Ai Awaw', '111111', 'ai@waw.com', 'perempuan', 'Garut', '13', '0', 'Lembang', '0', '0', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00', null, null, null, '0', '1');
INSERT INTO `trs_kebutuhan` VALUES ('9', '20150224/AGT-01/0001', '2015-02-24 00:00:00', '9', '1111', 'Ai Awaw', '111111', 'ai@waw.com', 'perempuan', 'Garut', '13', '183', 'Lembang', '1', '1', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Confirmation-AGTAGT-01-789TH.pdf', 'Confirmation-GSTAGT-01-789TH.pdf', null, '465000', '1');
INSERT INTO `trs_kebutuhan` VALUES ('10', '20150224/AGT-02/0000', '2015-02-24 00:00:00', '10', '2222', 'Budi Bolbol', '222222', 'budi@bolbol.com', 'laki-laki', 'Jakarta', '13', '183', 'Lembang', '1', '1', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Confirmation-AGTAGT-02-3KC7H.pdf', 'Confirmation-GSTAGT-02-3KC7H.pdf', null, '308000', '1');
INSERT INTO `trs_kebutuhan` VALUES ('11', '20150224/AGT-03/0000', '2015-02-24 00:00:00', '11', '3333', 'Ceuceu', '333333', 'ceuceu@kitan.com', 'perempuan', 'Tasik', '13', '183', 'Lembang', '1', '1', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Confirmation-AGTAGT-03-JFXU8.pdf', 'Confirmation-GSTAGT-03-JFXU8.pdf', null, '516000', '1');
INSERT INTO `trs_kebutuhan` VALUES ('12', '20150224/AGT-04/0000', '2015-02-24 00:00:00', '12', '4444', 'Dodo Lipret', '444444', 'dodo@lipret.com', 'laki-laki', 'Bogor', '13', '183', 'Lembang', '1', '1', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Confirmation-AGTAGT-04-LQY9I.pdf', 'Confirmation-GSTAGT-04-LQY9I.pdf', null, '435000', '1');
INSERT INTO `trs_kebutuhan` VALUES ('13', '20150224/AGT-05/0000', '2015-02-24 00:00:00', '13', '5555', 'Epul Pulan', '555555', 'epul@pulan.com', 'laki-laki', 'Ngawi', '13', '183', 'Lembang', '1', '1', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Confirmation-AGTAGT-05-2F5OD.pdf', 'Confirmation-GSTAGT-05-2F5OD.pdf', null, '750000', '1');
INSERT INTO `trs_kebutuhan` VALUES ('14', '20150224/AGT-06/0000', '2015-02-24 00:00:00', '14', '6666', 'Farah Pisan', '666666', 'farah@pisan.com', 'perempuan', 'Bali', '13', '183', 'Lembang', '1', '1', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Confirmation-AGTAGT-06-5W1DM.pdf', 'Confirmation-GSTAGT-06-5W1DM.pdf', null, '616000', '1');
INSERT INTO `trs_kebutuhan` VALUES ('15', '20150224/AGT-07/0000', '2015-02-24 00:00:00', '15', '7777', 'Gundala Putra Petir', '777777', 'gundala@guludug.com', 'laki-laki', 'Samarinda', '13', '183', 'Lembang', '1', '1', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Confirmation-AGTAGT-07-4JLRR.pdf', 'Confirmation-GSTAGT-07-4JLRR.pdf', null, '1548000', '1');
INSERT INTO `trs_kebutuhan` VALUES ('16', '20150225/AGT-00/0000', '2015-02-25 00:00:00', '16', '1234567890', 'sony setiadi', '081990991974', 'sdeny@cifo.co.id', 'laki-laki', 'banudng', '13', '183', 'bandung', '1', '1', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Confirmation-AGTAGT-00-W06Z2.pdf', 'Confirmation-GSTAGT-00-W06Z2.pdf', null, '288000', '1');
INSERT INTO `trs_kebutuhan` VALUES ('17', '20150225/AGT-00/0001', '2015-02-26 00:00:00', '16', '', 'buldan', '087823451133', '', 'laki-laki', 'bdg', '13', '183', 'bdg', '1', '1', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Confirmation-AGTAGT-00-FI6SC.pdf', 'Confirmation-GSTAGT-00-FI6SC.pdf', null, '375000', '1');
INSERT INTO `trs_kebutuhan` VALUES ('18', '20150227/AGT-07/0001', '2015-02-27 00:00:00', '15', '123', 'aang', '123321', 'aang@galau.com', 'laki-laki', 'ngawi', '13', '183', 'lembang', '0', '1', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00', null, null, null, '470000', '1');
INSERT INTO `trs_kebutuhan` VALUES ('19', '20150305/AGT-00/0002', '2015-03-06 00:00:00', '16', '1234567890', 'putri', '02212345678', 'putri@cifo.co.id', 'perempuan', 'pwkt', '13', '183', 'bdg', '1', '1', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Confirmation-AGTAGT-00-KMP9M.pdf', 'Confirmation-GSTAGT-00-KMP9M.pdf', null, '317000', '1');
INSERT INTO `trs_kebutuhan` VALUES ('20', '20150305/AGT-00/0003', '2015-03-06 00:00:00', '16', '1234', 'arif', '08180001', 'sdeny@yahoo.com', 'laki-laki', 'Jkt', '13', '183', 'Bdg', '1', '1', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Confirmation-AGTAGT-00-QFB64.pdf', 'Confirmation-GSTAGT-00-QFB64.pdf', null, '355000', '1');
INSERT INTO `trs_kebutuhan` VALUES ('21', '20150309/AGT-01/0002', '2015-03-09 00:00:00', '9', '1111', 'Ai Kamu', '111111', 'meydzie@yahoo.com', 'perempuan', 'Garut', '13', '183', 'Lembang', '1', '1', null, '0000-00-00 00:00:00', '2015-03-09 14:20:34', 'Confirmation-AGTAGT-01-TC2W0.pdf', 'Confirmation-GSTAGT-01-TC2W0.pdf', null, '347000', '1');
INSERT INTO `trs_kebutuhan` VALUES ('22', '20150309/AGT-02/0001', '2015-03-09 00:00:00', '10', '2222', 'Budi Pekerti', '222222', 'meydzie@yahoo.com', 'laki-laki', 'Semarang', '13', '183', 'Lembang', '1', '1', null, '0000-00-00 00:00:00', '2015-03-09 14:24:17', 'Confirmation-AGTAGT-02-U47IQ.pdf', 'Confirmation-GSTAGT-02-U47IQ.pdf', null, '308000', '1');
INSERT INTO `trs_kebutuhan` VALUES ('23', '20150309/AGT-03/0001', '2015-03-09 00:00:00', '11', '3333', 'Cul Col', '333333', 'meydzie@yahoo.com', 'laki-laki', 'Papua', '13', '183', 'Lembang', '1', '1', null, '0000-00-00 00:00:00', '2015-03-09 14:26:23', 'Confirmation-AGTAGT-03-LNFKF.pdf', 'Confirmation-GSTAGT-03-LNFKF.pdf', null, '890000', '1');
INSERT INTO `trs_kebutuhan` VALUES ('24', '20150309/AGT-04/0001', '2015-03-10 00:00:00', '12', '4444', 'Dada Rosida', '444444', 'meydzie@yahoo.com', 'laki-laki', 'Ngamprah', '13', '183', 'Lembang', '1', '1', null, '0000-00-00 00:00:00', '2015-03-09 14:32:33', 'Confirmation-AGTAGT-04-6TDJR.pdf', 'Confirmation-GSTAGT-04-6TDJR.pdf', null, '1012000', '1');
INSERT INTO `trs_kebutuhan` VALUES ('25', '20150312/AGT-04/0002', '2015-03-12 00:00:00', '12', '123', 'asd', '321', 'yudi.hermayadi@gmail.com', 'laki-laki', 'Holland', '13', '183', 'lembang', '1', '1', null, '0000-00-00 00:00:00', '2015-03-12 10:36:56', 'Confirmation-AGTAGT-04-M9L2Y.pdf', 'Confirmation-GSTAGT-04-M9L2Y.pdf', null, '317000', '1');
INSERT INTO `trs_kebutuhan` VALUES ('26', '20150312/AGT-04/0003', '2015-03-12 00:00:00', '12', '456', 'qwe', '456', 'yudi.hermayadi@gmail.com', 'laki-laki', 'asd', '13', '183', 'lembang', '1', '1', null, '0000-00-00 00:00:00', '2015-03-12 14:16:06', 'Confirmation-AGTAGT-04-YKOSP.pdf', 'Confirmation-GSTAGT-04-YKOSP.pdf', null, '1052000', '1');
INSERT INTO `trs_kebutuhan` VALUES ('27', '20150312/AGT-04/0004', '2015-03-12 00:00:00', '12', '789', 'asd', '978', 'yudi.hermayadi@gmail.com', 'laki-laki', 'sad', '13', '183', 'asf', '0', '0', null, '0000-00-00 00:00:00', '2015-03-12 14:21:49', null, null, null, '0', '1');
INSERT INTO `trs_kebutuhan` VALUES ('28', '20150313/AGT-02/0002', '2015-03-13 00:00:00', '10', '12345', 'restu', '12345', 'restu@cifo.co.id', 'perempuan', 'tegallaja', '13', '183', 'tes', '1', '1', null, '0000-00-00 00:00:00', '2015-03-13 13:47:42', 'Confirmation-AGTAGT-02-OLN71.pdf', 'Confirmation-GSTAGT-02-OLN71.pdf', null, '3260000', '1');
INSERT INTO `trs_kebutuhan` VALUES ('29', '20150319/AGT-00/0004', '2015-03-19 00:00:00', '16', '1234567890', 'buldan', '11111', 'sdeny@yahoo.com', 'laki-laki', '11111', '13', '183', '', '1', '1', null, '0000-00-00 00:00:00', '2015-03-19 11:07:13', 'Confirmation-AGTAGT-00-59PVC.pdf', 'Confirmation-GSTAGT-00-59PVC.pdf', null, '317000', '1');
INSERT INTO `trs_kebutuhan` VALUES ('30', '20150319/AGT-02/0003', '2015-03-19 00:00:00', '10', '2134', 'restu', '6748', 'restu@cifo.co.id', 'perempuan', 'cililin', '13', '183', 'paster', '1', '1', null, '0000-00-00 00:00:00', '2015-03-19 13:48:46', 'Confirmation-AGTAGT-02-77YU1.pdf', 'Confirmation-GSTAGT-02-77YU1.pdf', null, '330000', '1');
INSERT INTO `trs_kebutuhan` VALUES ('31', '20150324/AGT-00/0005', '2015-03-24 00:00:00', '16', '771974', 'evi wahyu', '081224001974', 'piepiet74@cifo.co.id', 'perempuan', 'bandung ', '13', '183', 'bandung', '1', '1', null, '0000-00-00 00:00:00', '2015-03-24 20:38:10', 'Confirmation-AGTAGT-00-K1XL0.pdf', 'Confirmation-GSTAGT-00-K1XL0.pdf', null, '288000', '1');
INSERT INTO `trs_kebutuhan` VALUES ('33', '20150406/AGT-00/0006', '2015-04-06 00:00:00', '16', '11111', 'ririn', '1111', '', 'perempuan', 'bdg', '13', '183', 'bdg', '0', '0', null, '0000-00-00 00:00:00', '2015-04-06 17:05:20', null, null, null, '0', '1');
INSERT INTO `trs_kebutuhan` VALUES ('34', '20150410/OP-001/0000', '2015-04-10 00:00:00', '1', '5789', 'restu', '12342', 'neng@gmail.com', 'perempuan', 'das', '13', '183', 'ad', '0', '0', null, '0000-00-00 00:00:00', '2015-04-10 14:48:42', null, null, null, '0', '1');
INSERT INTO `trs_kebutuhan` VALUES ('36', '20150413/AGT-02/0004', '2015-04-13 00:00:00', '10', '21345', 'moca', '3243', 'neng@yahoo.co.id', 'perempuan', 'bol', '13', '183', 'nol', '1', '1', null, '0000-00-00 00:00:00', '2015-04-13 14:39:10', 'Confirmation-AGTAGT-02-JU3BO.pdf', 'Confirmation-GSTAGT-02-JU3BO.pdf', null, '330000', '1');
INSERT INTO `trs_kebutuhan` VALUES ('37', '20150414/AGT-02/0005', '2015-04-14 00:00:00', '10', '33', 'neng restu ', '12312', 'neng@gmail.com', 'perempuan', 'ads', '13', '183', 'wdq', '2', '1', null, '0000-00-00 00:00:00', '2015-04-14 10:11:50', null, null, null, '308000', '1');
INSERT INTO `trs_kebutuhan` VALUES ('38', '20150417/AGT-01/0003', '2015-04-17 00:00:00', '9', '7774', 'Veana', '085759017773', 'meydzie@yahoo.com', 'perempuan', 'Jakarta', '13', '183', 'Lembang', '1', '1', null, '0000-00-00 00:00:00', '2015-04-17 18:03:00', 'Confirmation-AGTAGT-01-HG79Q.pdf', 'Confirmation-GSTAGT-01-HG79Q.pdf', null, '990000', '1');
INSERT INTO `trs_kebutuhan` VALUES ('39', '20150418/AGT-07/0002', '2015-04-18 00:00:00', '15', '7', 'Veana', '085759017773', 'meydzie@yahoo.com', 'perempuan', 'Sarjad', '13', '183', 'Lembang', '1', '1', null, '0000-00-00 00:00:00', '2015-04-18 10:11:37', 'Confirmation-AGTAGT-07-O20BP.pdf', 'Confirmation-GSTAGT-07-O20BP.pdf', null, '920000', '1');
INSERT INTO `trs_kebutuhan` VALUES ('40', '20150420/AGT-02/0006', '2015-04-20 00:00:00', '10', '12345', 'navisa', '0990', 'restu@cifo.co.id', 'perempuan', 'cililin', '13', '183', 'cililin', '1', '1', null, '0000-00-00 00:00:00', '2015-04-20 09:33:43', 'Confirmation-AGTAGT-02-48CAV.pdf', 'Confirmation-GSTAGT-02-48CAV.pdf', null, '340000', '1');
INSERT INTO `trs_kebutuhan` VALUES ('41', '20150420/AGT-00/0007', '2015-04-20 00:00:00', '16', '1234567890', 'Ina', '0221234567', 'sdeny@yahoo.com', 'perempuan', 'bandung', '13', '183', 'buahbatu', '1', '1', null, '0000-00-00 00:00:00', '2015-04-20 10:59:16', 'Confirmation-AGTAGT-00-369V2.pdf', 'Confirmation-GSTAGT-00-369V2.pdf', null, '320000', '1');
INSERT INTO `trs_kebutuhan` VALUES ('42', '20150420/AGT-02/0007', '2015-04-20 00:00:00', '10', '13423', 'neng restu', '098876869', 'restu@cifo.co.id', 'perempuan', 'kp tegallaja', '13', '183', 'buah batu', '1', '1', null, '0000-00-00 00:00:00', '2015-04-20 11:30:03', 'Confirmation-AGTAGT-02-4HXX6.pdf', 'Confirmation-GSTAGT-02-4HXX6.pdf', null, '340000', '1');
INSERT INTO `trs_kebutuhan` VALUES ('43', '20150420/AGT-00/0008', '2015-04-20 00:00:00', '16', '121313', 'dini', '022', 'sdeny@yahoo.com', 'perempuan', 'jkt', '13', '183', 'soekarno hatta', '1', '1', null, '0000-00-00 00:00:00', '2015-04-20 11:58:24', 'Confirmation-AGTAGT-00-V4Z36.pdf', 'Confirmation-GSTAGT-00-V4Z36.pdf', null, '560000', '1');
INSERT INTO `trs_kebutuhan` VALUES ('44', '20150420/AGT-02/0008', '2015-04-20 00:00:00', '10', '2133', 'neng restu', '089615471211', 'nengrestuu@gmail.com', 'perempuan', 'kp tegallaja', '13', '183', 'ci cendo', '1', '1', null, '0000-00-00 00:00:00', '2015-04-20 16:13:09', 'Confirmation-AGTAGT-02-0AOMI.pdf', 'Confirmation-GSTAGT-02-0AOMI.pdf', null, '340000', '1');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) DEFAULT NULL,
  `kar_id` varchar(32) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level_id` int(20) DEFAULT NULL,
  `flag_hapus` enum('0','1') NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', '1', '2bS9fZ4m/VcDY', '1', '0');
INSERT INTO `users` VALUES ('95', 'baraya', '2', 'ef1RSqrMFHBpU', '2', '0');
INSERT INTO `users` VALUES ('96', 'agt01-badriyah', '9', '7eVL22eE66MHU', '3', '0');
INSERT INTO `users` VALUES ('97', 'agt02-restu', '10', '93ZyMwy382pkg', '2', '0');
INSERT INTO `users` VALUES ('98', 'agt03-arbi', '11', '93ZyMwy382pkg', '3', '0');
INSERT INTO `users` VALUES ('99', 'agt04-iqbal', '12', '93ZyMwy382pkg', '3', '0');
INSERT INTO `users` VALUES ('100', 'agt05-wiwin', '13', '93ZyMwy382pkg', '3', '0');
INSERT INTO `users` VALUES ('101', 'agt05-tari', '14', '93ZyMwy382pkg', '3', '1');
INSERT INTO `users` VALUES ('102', 'agt06-tari', '14', '93ZyMwy382pkg', '3', '0');
INSERT INTO `users` VALUES ('103', 'agt07-yudi', '15', '93ZyMwy382pkg', '3', '0');
INSERT INTO `users` VALUES ('104', 'agt00-sdeny', '16', '93ZyMwy382pkg', '3', '0');
INSERT INTO `users` VALUES ('105', 'htl01-vio', '18', '93ZyMwy382pkg', '3', '0');
INSERT INTO `users` VALUES ('106', 'malaka', '22', '93ZyMwy382pkg', '3', '1');
INSERT INTO `users` VALUES ('107', 'htl001-malaka', '22', '93ZyMwy382pkg', '3', '0');
INSERT INTO `users` VALUES ('108', 'htl002-pop', '23', '93ZyMwy382pkg', '3', '0');
INSERT INTO `users` VALUES ('109', 'htl003-vio', '24', '93ZyMwy382pkg', '3', '0');
INSERT INTO `users` VALUES ('110', 'htl004-batoe', '25', '93ZyMwy382pkg', '3', '0');
INSERT INTO `users` VALUES ('111', 'htl005-park', '26', '93ZyMwy382pkg', '3', '0');
INSERT INTO `users` VALUES ('112', 'htl006-travel', '27', '93ZyMwy382pkg', '3', '0');
INSERT INTO `users` VALUES ('113', 'htl007-harris', '28', '93ZyMwy382pkg', '3', '0');
INSERT INTO `users` VALUES ('114', 'htl008-garden', '29', '93ZyMwy382pkg', '3', '0');
INSERT INTO `users` VALUES ('115', 'htl009-horison', '30', '93ZyMwy382pkg', '3', '0');
INSERT INTO `users` VALUES ('116', 'htl010-maxone', '31', '93ZyMwy382pkg', '3', '0');

-- ----------------------------
-- Table structure for `users_group`
-- ----------------------------
DROP TABLE IF EXISTS `users_group`;
CREATE TABLE `users_group` (
  `level_id` int(11) NOT NULL AUTO_INCREMENT,
  `level_nama` varchar(50) NOT NULL,
  `level_deskripsi` text,
  PRIMARY KEY (`level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users_group
-- ----------------------------
INSERT INTO `users_group` VALUES ('1', 'Super Administrator', 'Administrator mempunyai kewenangan tertinggi untuk mengakses aplikasi, Hak Akses untuk Super Administrator ini yaitu dapat menambahkan,mengedit, menghapus, dan melihat isi halaman serta dapat melakukan perubahan pengaturan aplikasi');
INSERT INTO `users_group` VALUES ('2', 'Level High', 'Level ini mempunyai kewenangan di bawah Super Administrator untuk mengakses aplikasi, Hak Akses untuk Level High ini yaitu dapat merubah dan menghapus data di dalam aplikasi ini');
INSERT INTO `users_group` VALUES ('3', 'Level Medium', 'Level ini mempunyai kewenangan hanya dapat menambahkan dan merubah data di dalam aplikasi ini');
INSERT INTO `users_group` VALUES ('4', 'Level Low', 'Level ini mempunyai kewenangan hanya dapat menambahkan data di dalam aplikasi ini');

-- ----------------------------
-- Table structure for `users_level_access`
-- ----------------------------
DROP TABLE IF EXISTS `users_level_access`;
CREATE TABLE `users_level_access` (
  `level` varchar(50) NOT NULL DEFAULT '',
  `file_id` int(10) unsigned NOT NULL DEFAULT '0',
  `access` varchar(5) NOT NULL DEFAULT '0-0-0',
  `ar_inp_tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ar_inp_userid` char(15) NOT NULL,
  `ar_edt_tanggal` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ar_edt_userid` char(15) NOT NULL,
  PRIMARY KEY (`level`,`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users_level_access
-- ----------------------------
INSERT INTO `users_level_access` VALUES ('admin', '1', '1-1-1', '2013-01-22 23:45:21', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('admin', '2', '1-1-1', '2013-01-22 23:45:21', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('admin', '3', '1-1-1', '2013-01-22 23:45:21', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('admin', '4', '1-1-1', '2013-01-22 23:45:21', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('admin', '5', '1-1-1', '2013-01-22 23:45:21', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('admin', '6', '1-1-1', '2013-01-22 23:45:21', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('admin', '7', '1-1-1', '2013-01-22 23:45:21', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('admin', '8', '1-1-1', '2013-01-22 23:45:21', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('admin', '9', '1-1-1', '2013-01-22 23:45:21', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('admin', '10', '1-1-1', '2013-01-22 23:45:21', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('admin', '11', '1-1-1', '2013-01-22 23:45:21', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('admin', '12', '1-1-1', '2013-01-22 23:45:21', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('admin', '13', '1-1-1', '2013-01-22 23:45:21', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('admin', '14', '1-1-1', '2013-01-22 23:45:21', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('admin', '15', '1-1-1', '2013-01-22 23:45:21', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('admin', '16', '1-1-1', '2013-01-22 23:45:21', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('admin', '17', '1-1-1', '2013-01-22 23:45:21', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('admin', '18', '1-1-1', '2013-01-22 23:45:21', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('admin', '19', '1-1-1', '2013-01-22 23:45:21', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('admin', '20', '1-1-1', '2013-01-22 23:45:21', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('admin', '21', '1-1-1', '2013-01-22 23:45:21', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('admin', '22', '1-1-1', '2013-01-22 23:45:21', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('admin', '23', '1-1-1', '2013-01-22 23:45:21', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('admin', '24', '1-1-1', '2013-01-22 23:45:21', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('default', '1', '1-1-1', '2013-01-22 01:27:45', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('default', '2', '1-1-1', '2013-01-22 01:27:45', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('default', '3', '1-1-1', '2013-01-22 01:27:45', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('default', '4', '1-1-1', '2013-01-22 01:27:45', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('default', '5', '1-1-1', '2013-01-22 01:27:45', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('default', '6', '1-1-1', '2013-01-22 01:27:45', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('default', '7', '1-1-1', '2013-01-22 01:27:45', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('default', '8', '1-1-1', '2013-03-16 10:47:59', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('default', '9', '1-1-1', '2013-03-16 10:47:59', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('default', '10', '1-1-1', '2013-03-16 10:47:59', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('default', '11', '1-1-1', '2013-03-16 10:47:59', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('default', '12', '1-1-1', '2013-03-16 10:47:59', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('default', '13', '1-1-1', '2013-03-16 10:47:59', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('default', '14', '1-1-1', '2013-03-16 10:47:59', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('default', '15', '1-1-1', '2013-03-16 10:47:59', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('default', '16', '1-1-1', '2013-03-16 10:47:59', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('default', '17', '1-1-1', '2013-03-16 10:47:59', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('default', '18', '1-1-1', '2013-03-16 10:47:59', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('default', '19', '1-1-1', '2013-03-16 10:47:59', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('default', '20', '1-1-1', '2013-03-16 10:47:59', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('default', '21', '1-1-1', '2013-03-16 10:47:59', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('default', '22', '1-1-1', '2013-03-16 10:47:59', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('default', '23', '1-1-1', '2013-03-16 10:47:59', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('default', '24', '1-1-1', '2013-03-16 10:47:59', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('default', '25', '1-1-1', '2013-12-03 13:57:35', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('default', '26', '1-1-1', '2013-12-03 13:57:35', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('default', '27', '1-1-1', '2013-12-03 13:57:35', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('default', '28', '1-1-1', '2013-12-03 13:57:35', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('default', '29', '1-1-1', '2013-12-03 13:57:35', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('default', '30', '1-1-1', '2013-12-03 13:57:35', '', '0000-00-00 00:00:00', '');
INSERT INTO `users_level_access` VALUES ('default', '31', '1-1-1', '2013-12-03 13:57:35', '', '0000-00-00 00:00:00', '');

-- ----------------------------
-- Table structure for `users_menu`
-- ----------------------------
DROP TABLE IF EXISTS `users_menu`;
CREATE TABLE `users_menu` (
  `user_menu_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  `kar_id` int(10) NOT NULL,
  `hoz_menu_id` int(20) NOT NULL,
  PRIMARY KEY (`user_menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users_menu
-- ----------------------------
INSERT INTO `users_menu` VALUES ('11', '1', '1', '1');
INSERT INTO `users_menu` VALUES ('12', '1', '1', '2');
INSERT INTO `users_menu` VALUES ('14', '1', '1', '4');
INSERT INTO `users_menu` VALUES ('17', '1', '1', '5');
INSERT INTO `users_menu` VALUES ('18', '95', '2', '2');
INSERT INTO `users_menu` VALUES ('19', '95', '2', '6');
INSERT INTO `users_menu` VALUES ('20', '95', '2', '4');
INSERT INTO `users_menu` VALUES ('21', '96', '9', '4');
INSERT INTO `users_menu` VALUES ('22', '96', '9', '6');
INSERT INTO `users_menu` VALUES ('23', '97', '10', '4');
INSERT INTO `users_menu` VALUES ('24', '97', '10', '6');
INSERT INTO `users_menu` VALUES ('25', '98', '11', '4');
INSERT INTO `users_menu` VALUES ('26', '98', '11', '6');
INSERT INTO `users_menu` VALUES ('27', '99', '12', '4');
INSERT INTO `users_menu` VALUES ('28', '99', '12', '6');
INSERT INTO `users_menu` VALUES ('29', '1', '1', '8');
INSERT INTO `users_menu` VALUES ('30', '1', '1', '6');
INSERT INTO `users_menu` VALUES ('31', '103', '15', '4');
INSERT INTO `users_menu` VALUES ('32', '103', '15', '6');
INSERT INTO `users_menu` VALUES ('33', '102', '14', '4');
INSERT INTO `users_menu` VALUES ('34', '102', '14', '6');
INSERT INTO `users_menu` VALUES ('35', '100', '13', '4');
INSERT INTO `users_menu` VALUES ('36', '100', '13', '6');
INSERT INTO `users_menu` VALUES ('37', '104', '16', '4');
INSERT INTO `users_menu` VALUES ('38', '104', '16', '6');
INSERT INTO `users_menu` VALUES ('39', '105', '18', '2');
INSERT INTO `users_menu` VALUES ('40', '106', '22', '2');
INSERT INTO `users_menu` VALUES ('41', '106', '22', '6');
INSERT INTO `users_menu` VALUES ('42', '107', '22', '8');
INSERT INTO `users_menu` VALUES ('43', '108', '23', '2');
INSERT INTO `users_menu` VALUES ('44', '108', '23', '8');
INSERT INTO `users_menu` VALUES ('45', '108', '23', '6');
INSERT INTO `users_menu` VALUES ('46', '104', '16', '8');
INSERT INTO `users_menu` VALUES ('48', '110', '25', '2');
INSERT INTO `users_menu` VALUES ('49', '110', '25', '6');
INSERT INTO `users_menu` VALUES ('50', '110', '25', '8');
INSERT INTO `users_menu` VALUES ('51', '111', '26', '2');
INSERT INTO `users_menu` VALUES ('52', '111', '26', '6');
INSERT INTO `users_menu` VALUES ('53', '111', '26', '8');
INSERT INTO `users_menu` VALUES ('54', '112', '27', '2');
INSERT INTO `users_menu` VALUES ('55', '112', '27', '6');
INSERT INTO `users_menu` VALUES ('56', '112', '27', '8');
INSERT INTO `users_menu` VALUES ('57', '113', '28', '2');
INSERT INTO `users_menu` VALUES ('58', '113', '28', '6');
INSERT INTO `users_menu` VALUES ('59', '113', '28', '8');
INSERT INTO `users_menu` VALUES ('60', '114', '29', '2');
INSERT INTO `users_menu` VALUES ('61', '114', '29', '6');
INSERT INTO `users_menu` VALUES ('62', '114', '29', '8');
INSERT INTO `users_menu` VALUES ('63', '115', '30', '2');
INSERT INTO `users_menu` VALUES ('64', '115', '30', '6');
INSERT INTO `users_menu` VALUES ('65', '115', '30', '8');
INSERT INTO `users_menu` VALUES ('68', '116', '31', '2');
INSERT INTO `users_menu` VALUES ('69', '116', '31', '6');
INSERT INTO `users_menu` VALUES ('70', '116', '31', '8');

-- ----------------------------
-- Table structure for `users_sub_menu`
-- ----------------------------
DROP TABLE IF EXISTS `users_sub_menu`;
CREATE TABLE `users_sub_menu` (
  `user_sub_menu_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  `kar_id` int(10) NOT NULL,
  `ver_menu_id` int(20) NOT NULL,
  `hoz_menu_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`user_sub_menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users_sub_menu
-- ----------------------------
INSERT INTO `users_sub_menu` VALUES ('3', '1', '1', '1', '1');
INSERT INTO `users_sub_menu` VALUES ('4', '1', '1', '2', '1');
INSERT INTO `users_sub_menu` VALUES ('5', '1', '1', '3', '1');
INSERT INTO `users_sub_menu` VALUES ('17', '1', '1', '41', '2');
INSERT INTO `users_sub_menu` VALUES ('18', '1', '1', '42', '2');
INSERT INTO `users_sub_menu` VALUES ('19', '1', '1', '43', '2');
INSERT INTO `users_sub_menu` VALUES ('20', '1', '1', '47', '2');
INSERT INTO `users_sub_menu` VALUES ('25', '1', '1', '44', '4');
INSERT INTO `users_sub_menu` VALUES ('29', '1', '1', '21', '5');
INSERT INTO `users_sub_menu` VALUES ('30', '1', '1', '22', '5');
INSERT INTO `users_sub_menu` VALUES ('31', '1', '1', '49', '5');
INSERT INTO `users_sub_menu` VALUES ('32', '95', '2', '41', '2');
INSERT INTO `users_sub_menu` VALUES ('33', '95', '2', '42', '2');
INSERT INTO `users_sub_menu` VALUES ('34', '95', '2', '43', '2');
INSERT INTO `users_sub_menu` VALUES ('35', '95', '2', '47', '2');
INSERT INTO `users_sub_menu` VALUES ('36', '95', '2', '44', '4');
INSERT INTO `users_sub_menu` VALUES ('37', '96', '9', '44', '4');
INSERT INTO `users_sub_menu` VALUES ('38', '97', '10', '44', '4');
INSERT INTO `users_sub_menu` VALUES ('39', '98', '11', '44', '4');
INSERT INTO `users_sub_menu` VALUES ('40', '99', '12', '44', '4');
INSERT INTO `users_sub_menu` VALUES ('41', '1', '1', '54', '8');
INSERT INTO `users_sub_menu` VALUES ('42', '96', '9', '55', '6');
INSERT INTO `users_sub_menu` VALUES ('43', '97', '10', '55', '6');
INSERT INTO `users_sub_menu` VALUES ('44', '98', '11', '55', '6');
INSERT INTO `users_sub_menu` VALUES ('45', '99', '12', '55', '6');
INSERT INTO `users_sub_menu` VALUES ('46', '103', '15', '44', '4');
INSERT INTO `users_sub_menu` VALUES ('47', '102', '14', '44', '4');
INSERT INTO `users_sub_menu` VALUES ('48', '100', '13', '44', '4');
INSERT INTO `users_sub_menu` VALUES ('49', '104', '16', '44', '4');
INSERT INTO `users_sub_menu` VALUES ('50', '104', '16', '55', '6');
INSERT INTO `users_sub_menu` VALUES ('51', '105', '18', '41', '2');
INSERT INTO `users_sub_menu` VALUES ('52', '106', '22', '41', '2');
INSERT INTO `users_sub_menu` VALUES ('53', '106', '22', '55', '6');
INSERT INTO `users_sub_menu` VALUES ('54', '107', '22', '56', '8');
INSERT INTO `users_sub_menu` VALUES ('55', '107', '22', '57', '8');
INSERT INTO `users_sub_menu` VALUES ('56', '108', '23', '41', '2');
INSERT INTO `users_sub_menu` VALUES ('57', '108', '23', '56', '8');
INSERT INTO `users_sub_menu` VALUES ('58', '108', '23', '57', '8');
INSERT INTO `users_sub_menu` VALUES ('59', '108', '23', '55', '6');
INSERT INTO `users_sub_menu` VALUES ('60', '104', '16', '54', '8');
INSERT INTO `users_sub_menu` VALUES ('64', '110', '25', '41', '2');
INSERT INTO `users_sub_menu` VALUES ('65', '110', '25', '55', '6');
INSERT INTO `users_sub_menu` VALUES ('66', '110', '25', '56', '8');
INSERT INTO `users_sub_menu` VALUES ('67', '110', '25', '57', '8');
INSERT INTO `users_sub_menu` VALUES ('68', '111', '26', '41', '2');
INSERT INTO `users_sub_menu` VALUES ('69', '111', '26', '55', '6');
INSERT INTO `users_sub_menu` VALUES ('70', '111', '26', '56', '8');
INSERT INTO `users_sub_menu` VALUES ('71', '111', '26', '57', '8');
INSERT INTO `users_sub_menu` VALUES ('72', '112', '27', '41', '2');
INSERT INTO `users_sub_menu` VALUES ('73', '112', '27', '55', '6');
INSERT INTO `users_sub_menu` VALUES ('74', '112', '27', '56', '8');
INSERT INTO `users_sub_menu` VALUES ('75', '112', '27', '57', '8');
INSERT INTO `users_sub_menu` VALUES ('76', '113', '28', '41', '2');
INSERT INTO `users_sub_menu` VALUES ('77', '113', '28', '55', '6');
INSERT INTO `users_sub_menu` VALUES ('78', '113', '28', '56', '8');
INSERT INTO `users_sub_menu` VALUES ('79', '113', '28', '57', '8');
INSERT INTO `users_sub_menu` VALUES ('80', '114', '29', '41', '2');
INSERT INTO `users_sub_menu` VALUES ('81', '114', '29', '55', '6');
INSERT INTO `users_sub_menu` VALUES ('82', '114', '29', '56', '8');
INSERT INTO `users_sub_menu` VALUES ('83', '114', '29', '57', '8');
INSERT INTO `users_sub_menu` VALUES ('84', '115', '30', '41', '2');
INSERT INTO `users_sub_menu` VALUES ('85', '115', '30', '55', '6');
INSERT INTO `users_sub_menu` VALUES ('86', '115', '30', '56', '8');
INSERT INTO `users_sub_menu` VALUES ('87', '115', '30', '57', '8');
INSERT INTO `users_sub_menu` VALUES ('89', '116', '31', '41', '2');
INSERT INTO `users_sub_menu` VALUES ('90', '116', '31', '55', '6');
INSERT INTO `users_sub_menu` VALUES ('91', '116', '31', '56', '8');
INSERT INTO `users_sub_menu` VALUES ('92', '116', '31', '57', '8');
