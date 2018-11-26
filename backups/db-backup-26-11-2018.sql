#26-11-2018


DROP TABLE deposit;

CREATE TABLE `deposit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fio` text COLLATE utf8_bin NOT NULL,
  `sum` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO deposit VALUES("2","Иванов И.И.","0");
INSERT INTO deposit VALUES("3","Петров П.П.","5000");



DROP TABLE items;

CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8_bin NOT NULL,
  `cost` text COLLATE utf8_bin NOT NULL,
  `dist` text COLLATE utf8_bin NOT NULL,
  `bonus` text COLLATE utf8_bin NOT NULL,
  `bonusN` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO items VALUES("1","Укол","200","фыаф","20","0");
INSERT INTO items VALUES("2","Осмотр","2000","нет","0","0");
INSERT INTO items VALUES("3","Тест","0","фывфы","0","0");
INSERT INTO items VALUES("4","гель","1","опавоа","0","0");
INSERT INTO items VALUES("5","хим защита","1","","0","0");



DROP TABLE mest;

CREATE TABLE `mest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO mest VALUES("1","Одноместная палата","5000");
INSERT INTO mest VALUES("2","Двухместная палата","800");
INSERT INTO mest VALUES("3","Эконом","900");
INSERT INTO mest VALUES("6","VIP","4500");



DROP TABLE operation;

CREATE TABLE `operation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` text COLLATE utf8_bin NOT NULL,
  `client` text COLLATE utf8_bin NOT NULL,
  `sum` float NOT NULL,
  `type` text COLLATE utf8_bin NOT NULL,
  `typeSum` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO operation VALUES("1","19/10/2018 21:25","Васильев А.А.","9000","Амбулатория","nal");
INSERT INTO operation VALUES("2","19/10/2018 21:30","Васильев А.А.","100","Амбулатория","beznal");
INSERT INTO operation VALUES("3","19/10/2018 21:37","Васильев А.А.","800","Амбулатория","nal");
INSERT INTO operation VALUES("4","19/10/2018 21:43","Васильев А.А.","700","Амбулатория","nal");
INSERT INTO operation VALUES("5","19/10/2018 21:53","Васильев А.А.","200","Амбулатория","nal");
INSERT INTO operation VALUES("6","19/10/2018 21:54","Петренко А.Г.","200","Стационар","nal");
INSERT INTO operation VALUES("7","19/10/2018 21:55","Васильев А.А.","900","Амбулатория","nal");
INSERT INTO operation VALUES("8","19/10/2018 21:55","Петренко А.Г.","800","Стационар","nal");
INSERT INTO operation VALUES("9","19/10/2018 21:58","Васильев А.А.","900","Амбулатория","nal");
INSERT INTO operation VALUES("10","20/10/2018 8:57","Петренко А.Г.","9200","Стационар","nal");
INSERT INTO operation VALUES("11","20/10/2018 19:36","Петренко А.Г.","4000","Стационар","nal");
INSERT INTO operation VALUES("12","20/10/2018 19:40","Петренко А.Г.","-8000","Стационар","nal");
INSERT INTO operation VALUES("13","20/10/2018 19:40","Петренко А.Г.","400","Стационар","nal");
INSERT INTO operation VALUES("14","20/10/2018 19:43","Петренко А.Г.","-2400","Стационар","nal");
INSERT INTO operation VALUES("15","20/10/2018 19:45","Васильев А.А.","-10600","Амбулатория","nal");
INSERT INTO operation VALUES("16","20/10/2018 19:55","Петренко А.Г.","6400","Стационар","nal");
INSERT INTO operation VALUES("17","20/10/2018 19:56","Петренко А.Г.","-200","Стационар","nal");
INSERT INTO operation VALUES("18","21/10/2018 19:56","Rjylhfnmtd Sf","900","Стационар","nal");
INSERT INTO operation VALUES("19","01/11/2018 22:14","Кириленко А.Д.","27000","Стационар","beznal");
INSERT INTO operation VALUES("20","01/11/2018 22:15","Кириленко А.Д.","2000","Стационар","nal");
INSERT INTO operation VALUES("21","01/11/2018 22:15","Кириленко А.Д.","-2000","Стационар","nal");
INSERT INTO operation VALUES("22","06/11/2018 11:05","Кириленко А.Д.","22000","Стационар","nal");
INSERT INTO operation VALUES("23","06/11/2018 17:35","Кириленко А.Д.","2200","Стационар","beznal");
INSERT INTO operation VALUES("24","06/11/2018 18:05","Кириленко А.Д.","6500","Стационар","nal");
INSERT INTO operation VALUES("25","06/11/2018 18:42","Васильев А.А.","10700","Амбулатория","nal");
INSERT INTO operation VALUES("26","06/11/2018 18:42","Васильев А.А.","-10500","Амбулатория","nal");
INSERT INTO operation VALUES("27","06/11/2018 19:20","Rjylhfnmtd Sf","80000","Стационар","nal");
INSERT INTO operation VALUES("28","06/11/2018 19:21","Rjylhfnmtd Sf","3600","Стационар","nal");
INSERT INTO operation VALUES("29","06/11/2018 19:34","Кириленко А.Д.","-12700","Стационар","nal");
INSERT INTO operation VALUES("30","06/11/2018 19:34","Кириленко А.Д.","2000","Стационар","nal");
INSERT INTO operation VALUES("31","22/11/2018 9:50","Иванов И.И.","10000","Стационар","nal");
INSERT INTO operation VALUES("32","24/11/2018 10:08","Иванов И.И.","-2500","Стационар","nal");
INSERT INTO operation VALUES("33","24/11/2018 10:22","Иванов И.И.","3000","Стационар","nal");
INSERT INTO operation VALUES("34","24/11/2018 10:23","afasfas","500","Амбулатория","nal");
INSERT INTO operation VALUES("35","24/11/2018 10:30","afasfas","1500","Амбулатория","nal");
INSERT INTO operation VALUES("36","24/11/2018 10:30","afasfas","5000","Амбулатория","nal");
INSERT INTO operation VALUES("41","25/11/2018 20:45","Иванов И.И.","-300","Стационар","dep");
INSERT INTO operation VALUES("49","25/11/2018 20:58","Иванов И.И.","-4400","Стационар","dep");
INSERT INTO operation VALUES("50","25/11/2018 20:58","Иванов И.И.","-4400","Стационар","dep");
INSERT INTO operation VALUES("51","25/11/2018 20:58","Иванов И.И.","-4400","Стационар","dep");
INSERT INTO operation VALUES("52","25/11/2018 20:58","Иванов И.И.","-4400","Стационар","dep");
INSERT INTO operation VALUES("53","25/11/2018 20:58","Иванов И.И.","-4400","Стационар","dep");
INSERT INTO operation VALUES("54","25/11/2018 20:58","Иванов И.И.","-4400","Стационар","dep");
INSERT INTO operation VALUES("55","25/11/2018 20:58","Иванов И.И.","-4400","Стационар","dep");
INSERT INTO operation VALUES("56","25/11/2018 20:58","Иванов И.И.","-4400","Стационар","dep");
INSERT INTO operation VALUES("57","25/11/2018 20:58","Иванов И.И.","-4400","Стационар","dep");
INSERT INTO operation VALUES("58","25/11/2018 20:58","Иванов И.И.","99000","Стационар","nal");
INSERT INTO operation VALUES("59","25/11/2018 20:59","Иванов И.И.","-59600","Стационар","dep");
INSERT INTO operation VALUES("60","25/11/2018 21:00","Иванов И.И.","-59600","Стационар","dep");
INSERT INTO operation VALUES("61","26/11/2018 10:02","Иванов И.И.","64000","Стационар","dep");
INSERT INTO operation VALUES("62","26/11/2018 10:04","Иванов И.И.","40000","Стационар","nal");
INSERT INTO operation VALUES("63","26/11/2018 10:04","Иванов И.И.","55000","Стационар","nal");
INSERT INTO operation VALUES("64","26/11/2018 10:04","Иванов И.И.","700","Стационар","nal");
INSERT INTO operation VALUES("65","26/11/2018 10:05","Иванов И.И.","-100","Стационар","dep");
INSERT INTO operation VALUES("66","26/11/2018 10:05","Иванов И.И.","100","Стационар","dep");
INSERT INTO operation VALUES("67","26/11/2018 10:09","Петров П.П.","5000","Стационар","nal");
INSERT INTO operation VALUES("68","26/11/2018 10:10","Петров П.П.","-5000","Стационар","dep");



DROP TABLE param;

CREATE TABLE `param` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(90) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO param VALUES("1","Прием","100");
INSERT INTO param VALUES("2","Последнее изменение","26/11/2018");
INSERT INTO param VALUES("3","Последняя копия","24/11/2018 8:34");
INSERT INTO param VALUES("4","ИД Гель","4");
INSERT INTO param VALUES("5","ИД Тест","3");
INSERT INTO param VALUES("6","Диспетчеры","");
INSERT INTO param VALUES("7","Реклама","");
INSERT INTO param VALUES("8","Агенты","");



DROP TABLE patient;

CREATE TABLE `patient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fio` varchar(80) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `datebirthday` text NOT NULL,
  `tel` text NOT NULL,
  `sp_uslug` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `all_sum` int(11) NOT NULL,
  `doctor` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `sum` int(11) NOT NULL,
  `type` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `dist` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `dateIn` text NOT NULL,
  `mest` text NOT NULL,
  `status` int(11) NOT NULL,
  `sumNow` int(11) NOT NULL,
  `dateOut` text NOT NULL,
  `ad` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `agent` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `credits` int(11) NOT NULL,
  `numCard` int(11) NOT NULL,
  `dispecher` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `comment` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

INSERT INTO patient VALUES("16","Петров П.П.","24/11/2018","","","0","Петров И.И,","0","Стационар","","24/11/2018 9:21","0","1","0","","","","0","6","","");



DROP TABLE usertbl;

CREATE TABLE `usertbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fio` varchar(90) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `dol` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `value` int(11) NOT NULL,
  `money_prevMonth` int(11) NOT NULL,
  `money` int(11) NOT NULL,
  `uslugi_prevMonth` int(11) NOT NULL,
  `uslugi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO usertbl VALUES("1","Петров И.И,","su","Administrator","Creator01","2","220","91340","18","26");
INSERT INTO usertbl VALUES("2","фваф","doc","11","11","11","1440","260","4","3");
INSERT INTO usertbl VALUES("3","1","view","1","1","0","0","0","0","0");
INSERT INTO usertbl VALUES("4","efe","admin","2","2","0","0","0","0","0");



