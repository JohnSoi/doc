#24-06-2019


DROP TABLE deposit;

CREATE TABLE `deposit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fio` varchar(60) COLLATE utf8_bin NOT NULL,
  `sum` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;




DROP TABLE items;

CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8_bin NOT NULL,
  `cost` text COLLATE utf8_bin NOT NULL,
  `dist` text COLLATE utf8_bin NOT NULL,
  `bonus` text COLLATE utf8_bin NOT NULL,
  `bonusN` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO items VALUES("1","Укол","200","","12","12");
INSERT INTO items VALUES("2","Гидролиз","1500","","2","2");
INSERT INTO items VALUES("3","озон","500","","","");



DROP TABLE mest;

CREATE TABLE `mest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE operation;

CREATE TABLE `operation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` text COLLATE utf8_bin NOT NULL,
  `client` text COLLATE utf8_bin NOT NULL,
  `sum` float NOT NULL,
  `type` text COLLATE utf8_bin NOT NULL,
  `typeSum` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;




DROP TABLE param;

CREATE TABLE `param` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

INSERT INTO param VALUES("28","Прием","100");
INSERT INTO param VALUES("29","Реклама","Листовки, приглащение");
INSERT INTO param VALUES("30","Диспетчеры","Иванов, Петров");
INSERT INTO param VALUES("31","Агенты","Петр, Ваня");
INSERT INTO param VALUES("32","Последнее изменение","24/06/2019");
INSERT INTO param VALUES("33","Последняя копия","23/06/2019 16:08");



DROP TABLE patient;

CREATE TABLE `patient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fio` varchar(80) COLLATE utf8_bin NOT NULL,
  `datebirthday` text COLLATE utf8_bin NOT NULL,
  `tel` text COLLATE utf8_bin NOT NULL,
  `sp_uslug` text COLLATE utf8_bin NOT NULL,
  `all_sum` int(11) NOT NULL,
  `doctor` text COLLATE utf8_bin NOT NULL,
  `sum` int(11) NOT NULL,
  `type` text COLLATE utf8_bin NOT NULL,
  `dist` text COLLATE utf8_bin NOT NULL,
  `dateIn` text COLLATE utf8_bin NOT NULL,
  `mest` text COLLATE utf8_bin NOT NULL,
  `status` int(11) NOT NULL,
  `sumNow` int(11) NOT NULL,
  `dateOut` text COLLATE utf8_bin NOT NULL,
  `ad` text COLLATE utf8_bin NOT NULL,
  `agent` text COLLATE utf8_bin NOT NULL,
  `credits` int(11) NOT NULL,
  `numCard` int(11) NOT NULL,
  `dispecher` text COLLATE utf8_bin NOT NULL,
  `comment` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO patient VALUES("1","Иванов","03/09/1995","8 (965) 658-0205","1-1-0-0-0-24/06/2019,2-1-0-0-0-24/06/2019","1700","No Data","0","Стационар","","23/06/2019 16:10","0","1","0","","","","0","1","","");



DROP TABLE usertbl;

CREATE TABLE `usertbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fio` varchar(90) COLLATE utf8_bin NOT NULL,
  `dol` text COLLATE utf8_bin NOT NULL,
  `username` text COLLATE utf8_bin NOT NULL,
  `password` text COLLATE utf8_bin NOT NULL,
  `value` int(11) NOT NULL,
  `money_prevMonth` int(11) NOT NULL,
  `money` int(11) NOT NULL,
  `uslugi_prevMonth` int(11) NOT NULL,
  `uslugi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO usertbl VALUES("1","No Data","su","Administrator","Creator01","0","0","100","0","0");



