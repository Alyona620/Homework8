CREATE TABLE IF NOT EXISTS `#__students_table` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`asset_id` INT(10) UNSIGNED NOT NULL DEFAULT '0',

`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
`created_by` INT(11)  NOT NULL ,
`pib` VARCHAR(100)  NOT NULL ,
`general_info` TEXT NOT NULL ,
`birth_date` DATE NOT NULL ,
`gender` VARCHAR(255)  NOT NULL ,
`group` VARCHAR(255)  NOT NULL ,
`average_score` VARCHAR(100)  NOT NULL ,
`number_student_book` VARCHAR(100)  NOT NULL ,
`image` VARCHAR(255)  NOT NULL ,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT COLLATE=utf8_general_ci;

