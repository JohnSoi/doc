#09-05-2019


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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO items VALUES("1","wtwert","21312","213213","0");
INSERT INTO items VALUES("2","Укол","1500","Укол - анастезия","0");
INSERT INTO items VALUES("3","Осмотр","2000","Осмотр пациента","10");



DROP TABLE mest;

CREATE TABLE `mest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO mest VALUES("1","busy","0");
INSERT INTO mest VALUES("2","busy","0");
INSERT INTO mest VALUES("3","busy","0");
INSERT INTO mest VALUES("4","busy","0");



DROP TABLE operation;

CREATE TABLE `operation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` text COLLATE utf8_bin NOT NULL,
  `client` text COLLATE utf8_bin NOT NULL,
  `sum` float NOT NULL,
  `type` text COLLATE utf8_bin NOT NULL,
  `typeSum` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
INSERT INTO operation VALUES("38","03/10/2018 19:29","Павлов П.П.","1000","Стационар","nal");
INSERT INTO operation VALUES("39","03/10/2018 19:31","Павлов П.П.","1000","Стационар","nal");
INSERT INTO operation VALUES("40","03/10/2018 19:32","Павлов П.П.","-1000","Стационар","nal");
INSERT INTO operation VALUES("41","03/10/2018 19:41","Павлов П.П.","4000","Стационар","nal");
INSERT INTO operation VALUES("42","03/10/2018 19:41","Павлов П.П.","1000","Стационар","beznal");
INSERT INTO operation VALUES("43","04/10/2018 9:11","Павлов П.П.","-1000","Стационар","nal");
INSERT INTO operation VALUES("44","04/10/2018 9:11","Павлов П.П.","-1000","Амбулатория","nal");
INSERT INTO operation VALUES("45","04/10/2018 9:12","Павлов П.П.","5000","Амбулатория","nal");
INSERT INTO operation VALUES("46","04/10/2018 9:12","Павлов П.П.","-1000","Стационар","nal");
INSERT INTO operation VALUES("47","04/10/2018 9:13","Павлов П.П.","1000","Амбулатория","nal");
INSERT INTO operation VALUES("48","04/10/2018 9:14","Павлов П.П.","5000","Амбулатория","nal");
INSERT INTO operation VALUES("49","04/10/2018 9:41","Горбатов Г.Г","5000","Амбулатория","nal");
INSERT INTO operation VALUES("50","04/10/2018 9:43","Иванов Иван Иванович","5000","Амбулатория","beznal");



DROP TABLE param;

CREATE TABLE `param` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(90) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO param VALUES("1","Прием","3000");
INSERT INTO param VALUES("5","Последнее изменение","09/05/2019");
INSERT INTO param VALUES("7","Последняя копия","24/04/2019 19:43");
INSERT INTO param VALUES("8","Стоимость койко - места","1000");
INSERT INTO param VALUES("9","Реклама","ТВ, Листовки");
INSERT INTO param VALUES("10","Диспетчеры","Иванов, Ретров");
INSERT INTO param VALUES("11","Агенты","007, 008");



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
  `numCard` int(11) NOT NULL,
  `ad` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `agent` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `dispecher` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `comment` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

INSERT INTO patient VALUES("9","Иванов Иван Иванович","29/09/2005","89656580306","1-5-1,3-2-1","0","Евгений Старков","5000","Амбулатория","Был принят доктором:No Data","29/09/2018 9:26","NULL","1","42624","","0","","","","");
INSERT INTO patient VALUES("11","Павлов П.П.","03/10/1998","+7965658963","","0","jdvhdbh","14000","Стационар","Был принят доктором:No Data","03/10/2018 10:28","4","1","5000","","0","","","","");
INSERT INTO patient VALUES("12","Сергеев С.С","04/10/2004","89656580306","","0","jdvhdbh","0","Стационар","Был принят доктором:No Data","04/10/2018 9:29","","1","0","","0","ТВ","","","");
INSERT INTO patient VALUES("15","Иванов Иван Иванович","04/07/2018","89656580306","1-0-0,2-0-0","0","jdvhdbh","5000","Стационар","Был принят доктором:No Data","04/10/2018 9:33","no","1","0","","0","","","","");
INSERT INTO patient VALUES("17","Горбатов Г.Г","04/10/2018","42134123","1-5-1,2-5-1,1-0-0,2-0-0,1-5-1,2-0-0,1-0-0,2-0-0","91248","jdvhdbh","5000","Амбулатория","Был принят доктором:No Data","04/10/2018 9:41","NULL","1","65436","","0","","","","");



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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO usertbl VALUES("1","No Data","doc","Administrator","Creator01","0","0","0","0","0");
INSERT INTO usertbl VALUES("4","Евгений Старков","su","1234","1234","12","0","0","0","0");
INSERT INTO usertbl VALUES("5","jdvhdbh","doc","12","12","12","0","0","0","0");
INSERT INTO usertbl VALUES("6","Павлов А.А.","view","1","1","12","0","0","0","0");
INSERT INTO usertbl VALUES("7","Малой Админ","admin","111","111","11","0","0","0","0");



