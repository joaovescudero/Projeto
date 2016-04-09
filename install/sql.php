<?php
$sql = <<<END
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `bank_$suffix` (
  `bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_item_id` int(11) NOT NULL,
  `bank_item_slot` int(11) NOT NULL,
  `bank_acc_id` int(11) NOT NULL,
  `bank_equip_set` set('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `bank_equip_fort` int(11) NOT NULL,
  PRIMARY KEY (`bank_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=41 ;

CREATE TABLE IF NOT EXISTS `char_$suffix` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `c_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `c_level` int(11) NOT NULL DEFAULT '1',
  `c_exp` int(11) NOT NULL DEFAULT '0',
  `c_stats` int(11) NOT NULL,
  `c_reborns` int(11) NOT NULL,
  `c_money` decimal(10,0) NOT NULL DEFAULT '0',
  `c_id_acc` int(11) NOT NULL,
  `c_id_guild` int(11) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

CREATE TABLE IF NOT EXISTS `equipment_$suffix` (
  `equip_id` int(11) NOT NULL AUTO_INCREMENT,
  `equip_id_left_hand` int(11) NOT NULL,
  `equip_id_right_hand` int(11) NOT NULL,
  `equip_id_helmet` int(11) NOT NULL,
  `equip_id_chestplate` int(11) NOT NULL,
  `equip_id_legs` int(11) NOT NULL,
  `equip_id_boots` int(11) NOT NULL,
  `equip_char_id` int(11) NOT NULL,
  PRIMARY KEY (`equip_id`),
  UNIQUE KEY `equip_char_id` (`equip_char_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

CREATE TABLE IF NOT EXISTS `item_$suffix` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_class` set('warrior','knight','royal guard','mage','wizard','warlock','acolyte','priest','arch bishop','thief','rogue','shadow chaser') COLLATE utf8_unicode_ci NOT NULL,
  `item_nvlmin` int(11) NOT NULL,
  `item_type` set('regular','legendary','supreme','worldwide') COLLATE utf8_unicode_ci NOT NULL,
  `item_slot` set('weapon','helmet','chestplate','legs','boots') COLLATE utf8_unicode_ci NOT NULL,
  `item_str` int(11) NOT NULL,
  `item_vit` int(11) NOT NULL,
  `item_dex` int(11) NOT NULL,
  `item_agi` int(11) NOT NULL,
  `item_int` int(11) NOT NULL,
  `item_luk` int(11) NOT NULL,
  `item_effect` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=50005 ;

INSERT INTO `item_$suffix` (`item_id`, `item_name`, `item_class`, `item_nvlmin`, `item_type`, `item_slot`, `item_str`, `item_vit`, `item_dex`, `item_agi`, `item_int`, `item_luk`, `item_effect`) VALUES
(10001, 'supreme poisoned dagger', 'shadow chaser', 0, 'worldwide', 'weapon', 20, 10, 40, 40, 0, 30, '7,30;4,60;3,60;'),
(10002, 'double hit dagger', 'shadow chaser', 0, 'worldwide', 'weapon', 5, 10, 50, 60, 0, 15, '8,80;9,80;10,120;'),
(10003, 'holy blessed shield', 'royal guard', 0, 'worldwide', 'weapon', 35, 80, 15, 10, 0, 0, '11,70;12,30;13,80;14,40;'),
(10004, 'holy blessed sword', 'royal guard', 0, 'worldwide', 'weapon', 60, 45, 5, 30, 0, 0, '14,10;15,50;2,60;'),
(10005, 'warlock''s supreme staff', 'warlock', 0, 'worldwide', 'weapon', 0, 50, 10, 0, 80, 0, '8,40;14,40;16,60;17,120;'),
(10006, 'warlock''s supreme book', 'warlock', 0, 'worldwide', 'weapon', 0, 70, 10, 0, 60, 0, '18,40;5,40;2,40;'),
(10007, 'god''s staff', 'arch bishop', 0, 'worldwide', 'weapon', 0, 60, 40, 0, 40, 0, '19,120;20,40;13,80;14,40;'),
(10008, 'god''s shield', 'arch bishop', 0, 'worldwide', 'weapon', 15, 90, 35, 0, 0, 0, '14,20;20,40;2,80;17,45;'),
(20001, 'ultimate evade helmet', 'shadow chaser', 0, 'worldwide', 'helmet', 5, 5, 30, 15, 0, 5, '21,10;4,10;'),
(30001, 'ultimate evade chestplate', 'shadow chaser', 0, 'worldwide', 'chestplate', 7, 7, 35, 15, 0, 6, '21,10;4,10;'),
(40001, 'ultimate evade legs', 'shadow chaser', 0, 'worldwide', 'legs', 5, 5, 30, 15, 0, 5, '21,10;4,10;'),
(50001, 'ultimate evade boots', 'shadow chaser', 0, 'worldwide', 'boots', 5, 5, 30, 15, 0, 5, '21,10;4,10;'),
(20002, 'defense supreme helmet', 'royal guard', 0, 'worldwide', 'helmet', 10, 50, 0, 0, 0, 0, '14,5;18,15;'),
(30002, 'defense supreme chestplate', 'royal guard', 0, 'worldwide', 'chestplate', 15, 55, 0, 0, 0, 0, '14,5;18,15;'),
(40002, 'defense supreme legs', 'royal guard', 0, 'worldwide', 'legs', 10, 50, 0, 0, 0, 0, '14,5;18,15;'),
(50002, 'defense supreme boots', 'royal guard', 0, 'worldwide', 'boots', 10, 50, 0, 0, 0, 0, '14,5;18,15;'),
(20003, 'warlock''s powerful helmet', 'warlock', 0, 'worldwide', 'helmet', 0, 20, 10, 0, 30, 0, '20,10;24,10;'),
(30003, 'warlock''s powerful robe', 'warlock', 0, 'worldwide', 'chestplate', 0, 25, 10, 0, 35, 0, '20,10;24,10;'),
(40003, 'warlock''s powerful legs', 'warlock', 0, 'worldwide', 'legs', 0, 20, 10, 0, 30, 0, '20,10;24,10;'),
(50003, 'warlock''s powerful boots', 'warlock', 0, 'worldwide', 'boots', 0, 20, 10, 0, 30, 0, '20,10;24,10;'),
(20004, 'angelic cap', 'arch bishop', 0, 'worldwide', 'helmet', 0, 40, 20, 0, 0, 0, '22,5;23,10;'),
(30004, 'angelic robe', 'arch bishop', 0, 'worldwide', 'chestplate', 0, 50, 20, 0, 0, 0, '22,5;23,10;'),
(40004, 'angelic pants', 'arch bishop', 0, 'worldwide', 'legs', 0, 40, 20, 0, 0, 0, '22,5;23,10;'),
(50004, 'angelic shoes', 'arch bishop', 0, 'worldwide', 'boots', 0, 40, 20, 0, 0, 0, '22,5;23,10;');

CREATE TABLE IF NOT EXISTS `level_$suffix` (
  `level` int(11) NOT NULL,
  `exp` int(11) NOT NULL,
  UNIQUE KEY `nivel` (`level`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `level_$suffix`
--

INSERT INTO `level_$suffix` (`level`, `exp`) VALUES
(20, 3194),
(19, 2662),
(18, 2218),
(17, 1848),
(16, 1540),
(15, 1283),
(14, 1069),
(13, 891),
(12, 743),
(11, 619),
(10, 515),
(9, 429),
(8, 358),
(7, 298),
(6, 248),
(5, 207),
(4, 172),
(3, 144),
(2, 120),
(50, 977321472),
(49, 488660736),
(48, 244330368),
(26, 17178),
(25, 12270),
(24, 8764),
(23, 6260),
(22, 4471),
(47, 122165184),
(46, 61082592),
(45, 30541296),
(44, 15270648),
(43, 7635324),
(42, 3817662),
(40, 1908831),
(39, 1363451),
(38, 973893),
(37, 695638),
(36, 496884),
(35, 354917),
(34, 253512),
(33, 181080),
(32, 129343),
(31, 92387),
(30, 65991),
(29, 47136),
(28, 33669),
(27, 24049),
(1, 0);

CREATE TABLE IF NOT EXISTS `log_$suffix` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3107 ;

CREATE TABLE IF NOT EXISTS `runesp_$suffix` (
  `runesp_id` int(11) NOT NULL AUTO_INCREMENT,
  `runesp_id_r` int(11) NOT NULL,
  `runesp_quant` int(11) NOT NULL,
  `runesp_id_u` int(11) NOT NULL,
  PRIMARY KEY (`runesp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `runes_$suffix` (
  `runes_id` int(11) NOT NULL AUTO_INCREMENT,
  `runes_atr` int(11) NOT NULL,
  `runes_eff` int(11) NOT NULL,
  PRIMARY KEY (`runes_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `runes_$suffix`
--

INSERT INTO `runes_$suffix` (`runes_id`, `runes_atr`, `runes_eff`) VALUES
(1, 1, 3),
(2, 2, 3);

CREATE TABLE IF NOT EXISTS `stats_$suffix` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_char` int(11) NOT NULL,
  `str` int(11) NOT NULL,
  `vit` int(11) NOT NULL,
  `dex` int(11) NOT NULL,
  `agi` int(11) NOT NULL,
  `int` int(11) NOT NULL,
  `luk` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

CREATE TABLE IF NOT EXISTS `status_$suffix` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

INSERT INTO `status_$suffix` (`status_id`, `status_name`) VALUES
(1, 'strength'),
(2, 'vitality'),
(3, 'dexterity'),
(4, 'agility'),
(5, 'intelligence'),
(6, 'lucky'),
(7, 'poison'),
(8, 'double hit'),
(9, 'critical'),
(10, 'critical damage'),
(11, 'block'),
(12, 'reflect'),
(13, 'demoniac damage reduction'),
(14, 'damage reduction'),
(15, 'hit chance'),
(16, 'magic critical'),
(17, 'magic critical damage'),
(18, 'magic damage reduction'),
(19, 'heal increase'),
(20, 'cooldown reduction'),
(21, 'dodge'),
(22, 'all damage reduction'),
(23, 'HP'),
(24, 'magic damage'),
(25, 'damage');

CREATE TABLE IF NOT EXISTS `user_$suffix` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `u_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `u_pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `u_birth` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `u_qseg` int(11) NOT NULL,
  `u_aseg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;
END;
?>