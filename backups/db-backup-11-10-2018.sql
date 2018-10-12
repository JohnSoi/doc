#11-10-2018


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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO mest VALUES("1","free","2000");
INSERT INTO mest VALUES("2","free","200");
INSERT INTO mest VALUES("3","busy","4000");
INSERT INTO mest VALUES("4","busy","5000");
INSERT INTO mest VALUES("5","busy","800");
INSERT INTO mest VALUES("6","busy","900");
INSERT INTO mest VALUES("7","free","500");



DROP TABLE operation;

CREATE TABLE `operation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` text COLLATE utf8_bin NOT NULL,
  `client` text COLLATE utf8_bin NOT NULL,
  `sum` float NOT NULL,
  `type` text COLLATE utf8_bin NOT NULL,
  `typeSum` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO operation VALUES("1","07/10/2018 21:10","Белов А.П.","200","Стационар","nal");
INSERT INTO operation VALUES("2","07/10/2018 21:20","Муратин","20312","Стационар","nal");
INSERT INTO operation VALUES("3","07/10/2018 21:20","Курамов П.В.","500","Стационар","nal");



DROP TABLE param;

CREATE TABLE `param` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(90) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO param VALUES("1","Прием","3000");
INSERT INTO param VALUES("5","Последнее изменение","11/10/2018");
INSERT INTO param VALUES("7","Последняя копия","07/10/2018 17:54");



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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

INSERT INTO patient VALUES("1","Иванов","07/10/2018","+79656580203","2-0-0,3-5-1","3500","jdvhdbh","5000","Амбулатория","","07/10/2018 19:00","NULL","1","2000","");
INSERT INTO patient VALUES("2","Зайцев П.А.","04/10/2018","+79656580205","","0","No Data","0","Амбулатория","","07/10/2018 19:03","NULL","1","0","");
INSERT INTO patient VALUES("3","Муратин","07/10/2018","+79656580203","1-5-1,2-0-0,3-0-0","24812","jdvhdbh","23312","Стационар","Был принят доктором:No Data","07/10/2018 19:11","1","0","21312","");
INSERT INTO patient VALUES("4","Васильков П.В.","07/10/2018","+79656580206","","0","no","0","Амбулатория","","07/10/2018 19:13","NULL","1","0","");
INSERT INTO patient VALUES("9","Курамов П.В.","07/10/2018","+79656580206","","0","No Data","500","Стационар","","07/10/2018 19:30","7","0","0","");
INSERT INTO patient VALUES("10","Белов А.П.","07/10/2018","+79656580205","","0","jdvhdbh","200","Стационар","Был принят доктором:No Data","07/10/2018 19:31","2","0","0","");
INSERT INTO patient VALUES("13","Сайгов А.П.","07/10/2018","+79656658580","","0","no","0","Амбулатория","","07/10/2018 19:55","NULL","1","0","");



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

INSERT INTO usertbl VALUES("1","No Data","doc","Administrator","Creator01","0","0","5000","0","0");
INSERT INTO usertbl VALUES("4","Евгений Старков","su","1234","1234","12","0","0","0","0");
INSERT INTO usertbl VALUES("5","jdvhdbh","doc","12","12","12","0","-1000","0","11");
INSERT INTO usertbl VALUES("6","Павлов А.А.","view","1","1","12","0","2000","0","0");
INSERT INTO usertbl VALUES("7","Малой Админ","admin","111","111","11","0","0","0","0");



