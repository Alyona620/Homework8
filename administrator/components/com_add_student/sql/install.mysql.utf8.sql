CREATE TABLE IF NOT EXISTS `#__add_student_form` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`asset_id` INT(10) UNSIGNED NOT NULL DEFAULT '0',

`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
`created_by` INT(11)  NOT NULL ,
`pib` VARCHAR(255)  NOT NULL ,
`general` VARCHAR(255)  NOT NULL ,
`birthday` DATE NOT NULL ,
`gender` VARCHAR(255)  NOT NULL ,
`group` VARCHAR(255)  NOT NULL ,
`average` VARCHAR(255)  NOT NULL ,
`book` VARCHAR(50)  NOT NULL ,
`photo` VARCHAR(255)  NOT NULL ,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT COLLATE=utf8_general_ci;

