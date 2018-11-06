#27-10-2018


DROP TABLE items;

CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8_bin NOT NULL,
  `cost` text COLLATE utf8_bin NOT NULL,
  `dist` text COLLATE utf8_bin NOT NULL,
  `bonus` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO items VALUES("1","Укол","200","фыаф","20");
INSERT INTO items VALUES("2","Осмотр","2000","нет","0");



DROP TABLE mest;

CREATE TABLE `mest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO mest VALUES("1","free","500");
INSERT INTO mest VALUES("2","free","800");
INSERT INTO mest VALUES("3","free","900");



DROP TABLE operation;

CREATE TABLE `operation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` text COLLATE utf8_bin NOT NULL,
  `client` text COLLATE utf8_bin NOT NULL,
  `sum` float NOT NULL,
  `type` text COLLATE utf8_bin NOT NULL,
  `typeSum` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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



DROP TABLE param;

CREATE TABLE `param` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(90) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO param VALUES("1","Прием","100");
INSERT INTO param VALUES("2","Последнее изменение","27/10/2018");
INSERT INTO param VALUES("3","Последняя копия","23/10/2018 10:44");



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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO patient VALUES("2","Петренко А.Г.","18/10/2018","8 (976) 565-6565","1-1-1-20/10/2018 11:34,2-2-1-20/10/2018 19:55,1-2-1-20/10/2018 19:55,2-1-1-20/10/2018 19:33,1-2-1-20/10/2018 19:55,2-1-1-20/10/2018 19:33,2-2-1-20/10/2018 20:03","8600","Петров И.И,","10400","Стационар","","18/10/2018 20:39","0","0","10400","20/10/2018 20:06");
INSERT INTO patient VALUES("8","Васильев А.А.","18/10/2015","8 (999) 999-9999","1-1-0-0,2-1-0-0,2-1-0-0","6400","Петров И.И,","2000","Амбулатория","","18/10/2018 20:57","0","1","0","");
INSERT INTO patient VALUES("9","Rjylhfnmtd Sf","20/10/2018","8 (965) 656-5656","2-1-1-20/10/2018 22:38,2-1-1-21/10/2018 10:43,2-1-1-22/10/2018 17:53,2-1-1-1-22/10/2018 17:57,1-1-1-1-23/10/2018 11:21,2-1-1-1-23/10/2018 11:21","10200","Петров И.И,","900","Стационар","","20/10/2018 19:27","1,2,1,1,1,3,3","1","10200","");



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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO usertbl VALUES("1","Петров И.И,","su","Administrator","Creator01","0","0","220","0","11");
INSERT INTO usertbl VALUES("2","фваф","doc","11","11","11","0","1440","0","4");



