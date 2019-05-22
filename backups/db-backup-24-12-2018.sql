#24-12-2018


DROP TABLE deposit;

CREATE TABLE `deposit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fio` text COLLATE utf8_bin NOT NULL,
  `sum` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO deposit VALUES("1","gfdsghdfh","2900");



DROP TABLE items;

CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8_bin NOT NULL,
  `cost` text COLLATE utf8_bin NOT NULL,
  `dist` text COLLATE utf8_bin NOT NULL,
  `bonus` text COLLATE utf8_bin NOT NULL,
  `bonusN` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO items VALUES("1","озонотерапия в стационаре","1000","","100","0");
INSERT INTO items VALUES("7","Озонотерапия в амбулатории","1000","","100","0");
INSERT INTO items VALUES("8","Плазмоферез в стационаре","3600","","","0");
INSERT INTO items VALUES("9","Плазмоферез в амбулатории","3600","","","0");
INSERT INTO items VALUES("10","Эспераль-гель 1 год","4200","","16","0");
INSERT INTO items VALUES("11","Тест эспераль-гель","0","","0","0");
INSERT INTO items VALUES("12","Эспераль-гель 6 месяцев","3700","","16","0");
INSERT INTO items VALUES("13","Эспераль-гель 2 года","4900","","16","0");
INSERT INTO items VALUES("14","Эспераль-гель 3 года","5700","","16","0");
INSERT INTO items VALUES("15","Химзащита 3 мес","3100","","16","0");
INSERT INTO items VALUES("16","Химзащита 6 мес","3500","","16","0");
INSERT INTO items VALUES("17","Химзащита 1 год","3900","","16","0");
INSERT INTO items VALUES("18","Химзащита 18 месяцев","4300","","16","0");
INSERT INTO items VALUES("19","Детоксикация в амбулатории","2000","","10","0");
INSERT INTO items VALUES("20","Детоксикация в амбулатории интенсивная","2500","","10","0");
INSERT INTO items VALUES("21","Консультация психиатра-нарколога","1000","","40","0");
INSERT INTO items VALUES("22","Гепатопротекторный курс","900","","100","0");
INSERT INTO items VALUES("23","Нейропротекторный курс","850","","100","0");
INSERT INTO items VALUES("24","Неврологический курс","1200","","200","0");
INSERT INTO items VALUES("25","Постановка подключичного катетера","1950","","500","0");
INSERT INTO items VALUES("26","Нейтрализация Эспераль-гель","2100","","10","0");
INSERT INTO items VALUES("27","Нейтрализация хим защита","1900","","10","0");
INSERT INTO items VALUES("28","УФО крови","1000","","100","100");
INSERT INTO items VALUES("29","Тест химзащита","0","","","0");



DROP TABLE mest;

CREATE TABLE `mest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO mest VALUES("1","frgd","500");



DROP TABLE operation;

CREATE TABLE `operation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` text COLLATE utf8_bin NOT NULL,
  `client` text COLLATE utf8_bin NOT NULL,
  `sum` float NOT NULL,
  `type` text COLLATE utf8_bin NOT NULL,
  `typeSum` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO operation VALUES("1","07/12/2018 15:50","gfdsghdfh","9000","Стационар","nal");
INSERT INTO operation VALUES("2","07/12/2018 15:52","gfdsghdfh","-2900","Стационар","dep");
INSERT INTO operation VALUES("3","07/12/2018 15:52","gfdsghdfh","2900","Стационар","dep");
INSERT INTO operation VALUES("4","07/12/2018 15:53","gfdsghdfh","-2900","Стационар","dep");
INSERT INTO operation VALUES("5","07/12/2018 16:39","лцловпрлоывр","3700","Амбулатория","nal");
INSERT INTO operation VALUES("6","09/12/2018 21:19","рпорпоаё","14200","Стационар","nal");
INSERT INTO operation VALUES("7","09/12/2018 23:19","wdgfdsg","8200","Стационар","nal");



DROP TABLE param;

CREATE TABLE `param` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(90) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO param VALUES("1","Прием","100");
INSERT INTO param VALUES("2","Последнее изменение","24/12/2018");
INSERT INTO param VALUES("3","Последняя копия","24/11/2018 21:50");
INSERT INTO param VALUES("6","Диспетчеры","Иванов,Фролова,Кто-то Там");
INSERT INTO param VALUES("7","Реклама","ТВ,Агенты,Газета,Наружняя реклама,Вывеска");
INSERT INTO param VALUES("8","Агенты","Скорая помощь, 21 больница, Справочник");



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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO patient VALUES("1","лцловпрлоывр","07/12/2018","8 (965) 655-5556","11-8-4-1-07/12/2018 16:39-07/12/2018,12-8-1-1-07/12/2018 16:39-07/12/2018","3700","Мухаметханов Рустем Ильясович","3700","Амбулатория","9879876546546 жена","07/12/2018 15:07","0","1","13300","07/12/2018 16:40","ТВ","","0","0","Иванов","kjkjk");
INSERT INTO patient VALUES("3","gfdsghdfh","26/12/2018","","9-8-8-1-07/12/2018 15:45-06/12/2018,11-8-0-0-0-06/12/2018,13-8-0-0-0-06/12/2018,15-8-0-0-0-06/12/2018,9-8-0-0-0-21/12/2018,14-8-0-0-0-21/12/2018,17-8-0-0-0-21/12/2018,18-8-0-0-0-21/12/2018,19-8-0-0-0-21/12/2018,20-8-0-0-0-21/12/2018,9-8-0-0-0-21/12/2018,14-8-0-0-0-21/12/2018,17-8-0-0-0-21/12/2018,18-8-0-0-0-21/12/2018,19-8-0-0-0-21/12/2018,20-8-0-0-0-21/12/2018","55600","Мухаметханов Рустем Ильясович","6100","Стационар","","02/12/2018 15:41","1-5","1","3600","07/12/2018 15:51","ТВ","","0","1","Иванов","");
INSERT INTO patient VALUES("4","рпорпоаё","09/12/2018","","9-8-5-1-09/12/2018 21:18-09/12/2018,10-8-1-1-09/12/2018 21:18-09/12/2018,11-8-5-1-09/12/2018 21:18-09/12/2018,17-8-1-1-09/12/2018 21:18-09/12/2018","11700","Мухаметханов Рустем Ильясович","14200","Стационар","","04/12/2018 21:09","1-5","1","11700","09/12/2018 21:19","ТВ","","0","2","Иванов","");
INSERT INTO patient VALUES("5","wdgfdsg","09/12/2018","","1-8-1-1-09/12/2018 23:18-09/12/2018,12-8-5-1-09/12/2018 23:18-09/12/2018,16-8-1-1-09/12/2018 23:18-09/12/2018,29-8-5-1-09/12/2018 23:18-09/12/2018","8200","Мухаметханов Рустем Ильясович","8200","Стационар","","09/12/2018 23:15","0","1","8200","09/12/2018 23:25","ТВ","","0","3","Иванов","");



DROP TABLE usertbl;

CREATE TABLE `usertbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fio` varchar(90) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `dol` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `username` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `value` int(11) NOT NULL,
  `money_prevMonth` int(11) NOT NULL,
  `money` int(11) NOT NULL,
  `uslugi_prevMonth` int(11) NOT NULL,
  `uslugi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO usertbl VALUES("1","Урманов Тимур Радикович","doc","УТР","лондон","10","0","148","0","5");
INSERT INTO usertbl VALUES("5","Арсланов Азат Шамилевич","doc","ААШ","майор","16","0","1824","0","4");
INSERT INTO usertbl VALUES("8","Мухаметханов Рустем Ильясович","su","МРИ","рим","8","0","1792","2","6");
INSERT INTO usertbl VALUES("9","Мухаметов Тимур Эфирович","view","МТР","2","10","0","0","0","0");
INSERT INTO usertbl VALUES("10","Мухаметов Рустем Эфирович","view","МРЭ","1","0","0","0","0","0");
INSERT INTO usertbl VALUES("11","Иванова Евгения Павловна","admin","ИЕП","кипр","0","0","0","0","0");



