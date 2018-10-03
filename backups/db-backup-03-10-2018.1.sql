#03-10-2018


DROP TABLE items;

CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8_bin NOT NULL,
  `cost` text COLLATE utf8_bin NOT NULL,
  `dist` text COLLATE utf8_bin NOT NULL,
  `bonus` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO items VALUES("1","wtwert","21312","213213","0");
INSERT INTO items VALUES("2","Укол","1500","Укол - анастезия","0");
INSERT INTO items VALUES("3","Осмотр","2000","Осмотр пациента","10");



DROP TABLE mest;

CREATE TABLE `mest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO mest VALUES("1","busy");
INSERT INTO mest VALUES("2","busy");
INSERT INTO mest VALUES("3","busy");
INSERT INTO mest VALUES("4","busy");



DROP TABLE operation;

CREATE TABLE `operation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` text COLLATE utf8_bin NOT NULL,
  `client` text COLLATE utf8_bin NOT NULL,
  `sum` float NOT NULL,
  `type` text COLLATE utf8_bin NOT NULL,
  `typeSum` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO operation VALUES("13","26/09/2018 19:51","fewfgwef","5000","Амбулатория","beznal");
INSERT INTO operation VALUES("14","26/09/2018 19:51","fewfgwef","5000","Амбулатория","beznal");
INSERT INTO operation VALUES("15","26/09/2018 19:51","fewfgwef","5000","Амбулатория","beznal");
INSERT INTO operation VALUES("16","26/09/2018 19:51","fewfgwef","5000","Амбулатория","beznal");
INSERT INTO operation VALUES("17","26/09/2018 19:51","fewfgwef","5000","Амбулатория","beznal");
INSERT INTO operation VALUES("18","26/09/2018 19:51","fewfgwef","5000","Амбулатория","beznal");
INSERT INTO operation VALUES("19","26/09/2018 19:53","fewfgwef","5000","Амбулатория","beznal");
INSERT INTO operation VALUES("20","26/09/2018 19:54","fewfgwef","5000","Амбулатория","beznal");
INSERT INTO operation VALUES("21","28/09/2018 20:09","Иванов Иван","500","Стационар","beznal");
INSERT INTO operation VALUES("22","29/09/2018 9:06","Павлов П.П.","50000","Амбулатория","beznal");
INSERT INTO operation VALUES("23","03/10/2018 10:28","Павлов П.П.","1000","Стационар","nal");
INSERT INTO operation VALUES("24","03/10/2018 12:57","Павлов П.П.","-1000","Стационар","nal");
INSERT INTO operation VALUES("25","03/10/2018 13:22","Павлов П.П.","-1000","Стационар","nal");
INSERT INTO operation VALUES("26","03/10/2018 13:24","Павлов П.П.","-1000","Стационар","nal");
INSERT INTO operation VALUES("27","03/10/2018 13:26","Павлов П.П.","-1000","Стационар","nal");
INSERT INTO operation VALUES("28","03/10/2018 13:26","Павлов П.П.","-1000","Стационар","nal");
INSERT INTO operation VALUES("29","03/10/2018 13:26","Павлов П.П.","-1000","Стационар","nal");
INSERT INTO operation VALUES("30","03/10/2018 13:30","Павлов П.П.","-1000","Стационар","nal");
INSERT INTO operation VALUES("31","03/10/2018 13:31","Павлов П.П.","-1000","Стационар","nal");
INSERT INTO operation VALUES("32","03/10/2018 13:31","Павлов П.П.","-1000","Стационар","nal");
INSERT INTO operation VALUES("33","03/10/2018 13:32","Павлов П.П.","-1000","Стационар","nal");
INSERT INTO operation VALUES("34","03/10/2018 13:32","Павлов П.П.","-1000","Стационар","nal");
INSERT INTO operation VALUES("35","03/10/2018 13:32","Павлов П.П.","-1000","Стационар","nal");
INSERT INTO operation VALUES("36","03/10/2018 13:33","Павлов П.П.","-1000","Стационар","nal");
INSERT INTO operation VALUES("37","03/10/2018 13:34","Павлов П.П.","-1","Стационар","nal");



DROP TABLE param;

CREATE TABLE `param` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(90) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO param VALUES("1","Прием","3000");
INSERT INTO param VALUES("5","Последнее изменение","03/10/2018");
INSERT INTO param VALUES("7","Последняя копия","03/10/2018 10:26");



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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO patient VALUES("9","Иванов Иван Иванович","29/09/2005","89656580306","1-5-1,3-2-1","0","Евгений Старков","0","Амбулатория","Был принят доктором:No Data","29/09/2018 9:26","NULL","1","42624","");
INSERT INTO patient VALUES("11","Павлов П.П.","03/10/1998","+7965658963","","0","jdvhdbh","0","Стационар","Был принят доктором:No Data","03/10/2018 10:28","4","1","0","");



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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO usertbl VALUES("1","No Data","doc","Administrator","Creator01","0","0","3000","0","0");
INSERT INTO usertbl VALUES("2","asfaf","su","admin","1234","0","0","0","0","0");
INSERT INTO usertbl VALUES("4","Евгений Старков","su","1234","1234","12","0","0","0","0");
INSERT INTO usertbl VALUES("5","jdvhdbh","doc","12","12","12","0","12785","0","5");



