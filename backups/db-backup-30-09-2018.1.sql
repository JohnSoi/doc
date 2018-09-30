#30-09-2018


DROP TABLE items;

CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8_bin NOT NULL,
  `cost` text COLLATE utf8_bin NOT NULL,
  `dist` text COLLATE utf8_bin NOT NULL,
  `bonus` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO items VALUES("1","wtwert","21312","213213","10");



DROP TABLE mest;

CREATE TABLE `mest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO mest VALUES("1","busy");
INSERT INTO mest VALUES("2","busy");
INSERT INTO mest VALUES("3","busy");
INSERT INTO mest VALUES("4","free");



DROP TABLE operation;

CREATE TABLE `operation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` text COLLATE utf8_bin NOT NULL,
  `client` text COLLATE utf8_bin NOT NULL,
  `sum` float NOT NULL,
  `type` text COLLATE utf8_bin NOT NULL,
  `typeSum` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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



DROP TABLE param;

CREATE TABLE `param` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(90) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO param VALUES("1","Прием","3000");
INSERT INTO param VALUES("5","Последнее изменение","30/09/2018");
INSERT INTO param VALUES("7","Последняя копия","30/09/2018 12:52");



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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO patient VALUES("6","Иванов Иван Иванович","29/09/2005","89656580306","","0","","0","Амбулатория","Был принят доктором:No Data","29/09/2018 9:23","NULL","1","0","");
INSERT INTO patient VALUES("7","Иванов Иван Иванович","29/09/2005","89656580306","","0","","0","Амбулатория","Был принят доктором:No Data","29/09/2018 9:24","NULL","1","0","");
INSERT INTO patient VALUES("8","Иванов Иван Иванович","29/09/2005","89656580306","","0","","0","Амбулатория","Был принят доктором:No Data","29/09/2018 9:26","NULL","1","0","");
INSERT INTO patient VALUES("9","Иванов Иван Иванович","29/09/2005","89656580306","","0","","0","Амбулатория","Был принят доктором:No Data","29/09/2018 9:26","NULL","1","0","");
INSERT INTO patient VALUES("10","Иванов Иван Иванович","29/09/2005","89656580306","","0","","0","Амбулатория","Был принят доктором:No Data","29/09/2018 9:26","NULL","0","0","");



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

INSERT INTO usertbl VALUES("1","No Data","doc","Administrator","Creator01","0","0","0","0","0");
INSERT INTO usertbl VALUES("2","asfaf","su","admin","1234","0","0","0","0","0");
INSERT INTO usertbl VALUES("4","Евгений Старков","su","1234","1234","12","0","0","0","0");
INSERT INTO usertbl VALUES("5","jdvhdbh","doc","12","12","12","0","0","0","0");



