#04-01-2019


DROP TABLE deposit;

CREATE TABLE `deposit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fio` text COLLATE utf8_bin NOT NULL,
  `sum` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO deposit VALUES("1","Шарипов Руслан Азатович","100");
INSERT INTO deposit VALUES("2","Вахитов Рафаэь Тимурович","750");
INSERT INTO deposit VALUES("3","Родькин Владимир Викторович","4500");



DROP TABLE incdoc;

CREATE TABLE `incdoc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iddoc` int(11) NOT NULL,
  `idpat` int(11) NOT NULL,
  `sum` int(11) NOT NULL,
  `date` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO incdoc VALUES("1","1","207","100","30/12/2018 20:36");
INSERT INTO incdoc VALUES("2","8","207","100","30/12/2018 20:36");
INSERT INTO incdoc VALUES("5","1","195","100","31/12/2018 10:07");
INSERT INTO incdoc VALUES("6","8","195","300","31/12/2018 10:07");
INSERT INTO incdoc VALUES("7","1","209","100","31/12/2018 10:07");
INSERT INTO incdoc VALUES("8","8","209","100","31/12/2018 10:07");
INSERT INTO incdoc VALUES("9","12","215","100","02/01/2019 8:14");
INSERT INTO incdoc VALUES("10","8","215","100","02/01/2019 8:14");
INSERT INTO incdoc VALUES("11","12","216","100","02/01/2019 8:17");
INSERT INTO incdoc VALUES("12","8","216","100","02/01/2019 8:17");
INSERT INTO incdoc VALUES("13","1","218","100","02/01/2019 12:13");
INSERT INTO incdoc VALUES("14","8","218","100","02/01/2019 12:13");
INSERT INTO incdoc VALUES("15","1","202","490","02/01/2019 12:16");
INSERT INTO incdoc VALUES("16","8","202","400","02/01/2019 12:16");
INSERT INTO incdoc VALUES("17","12","202","200","02/01/2019 12:16");
INSERT INTO incdoc VALUES("18","1","181","1192","02/01/2019 12:21");
INSERT INTO incdoc VALUES("19","8","181","100","02/01/2019 12:21");
INSERT INTO incdoc VALUES("20","1","205","200","02/01/2019 12:22");
INSERT INTO incdoc VALUES("21","8","205","300","02/01/2019 12:22");
INSERT INTO incdoc VALUES("22","12","205","100","02/01/2019 12:22");
INSERT INTO incdoc VALUES("23","1","192","100","02/01/2019 13:09");
INSERT INTO incdoc VALUES("24","8","192","100","02/01/2019 13:09");
INSERT INTO incdoc VALUES("25","5","192","672","02/01/2019 13:09");
INSERT INTO incdoc VALUES("26","12","192","420","02/01/2019 13:09");
INSERT INTO incdoc VALUES("27","1","219","100","02/01/2019 13:13");
INSERT INTO incdoc VALUES("28","8","219","100","02/01/2019 13:13");
INSERT INTO incdoc VALUES("29","8","213","210","02/01/2019 13:22");
INSERT INTO incdoc VALUES("30","5","217","672","02/01/2019 13:22");
INSERT INTO incdoc VALUES("31","12","217","420","02/01/2019 13:22");
INSERT INTO incdoc VALUES("32","18","228","2310","02/01/2019 13:26");
INSERT INTO incdoc VALUES("33","1","221","100","02/01/2019 16:13");
INSERT INTO incdoc VALUES("34","8","221","300","02/01/2019 16:13");
INSERT INTO incdoc VALUES("35","12","214","100","03/01/2019 9:26");
INSERT INTO incdoc VALUES("36","8","214","1000","03/01/2019 9:26");
INSERT INTO incdoc VALUES("37","1","214","100","03/01/2019 9:26");
INSERT INTO incdoc VALUES("38","17","224","1950","03/01/2019 9:27");
INSERT INTO incdoc VALUES("39","8","224","400","03/01/2019 9:27");
INSERT INTO incdoc VALUES("40","8","229","400","03/01/2019 11:42");
INSERT INTO incdoc VALUES("41","8","231","300","03/01/2019 11:43");
INSERT INTO incdoc VALUES("42","5","235","912","03/01/2019 12:13");
INSERT INTO incdoc VALUES("43","1","222","100","03/01/2019 12:27");
INSERT INTO incdoc VALUES("44","8","222","100","03/01/2019 12:27");
INSERT INTO incdoc VALUES("45","1","184","300","03/01/2019 12:30");
INSERT INTO incdoc VALUES("46","8","184","600","03/01/2019 12:30");
INSERT INTO incdoc VALUES("47","12","184","100","03/01/2019 12:30");
INSERT INTO incdoc VALUES("48","1","204","300","03/01/2019 13:06");
INSERT INTO incdoc VALUES("49","8","204","600","03/01/2019 13:06");
INSERT INTO incdoc VALUES("50","12","204","100","03/01/2019 13:06");
INSERT INTO incdoc VALUES("51","1","232","100","03/01/2019 16:56");
INSERT INTO incdoc VALUES("52","8","232","100","03/01/2019 16:56");
INSERT INTO incdoc VALUES("53","8","236","500","03/01/2019 16:56");
INSERT INTO incdoc VALUES("54","8","223","300","04/01/2019 8:03");
INSERT INTO incdoc VALUES("55","1","223","100","04/01/2019 8:03");
INSERT INTO incdoc VALUES("56","8","237","300","04/01/2019 8:29");
INSERT INTO incdoc VALUES("57","8","242","300","04/01/2019 8:29");
INSERT INTO incdoc VALUES("58","8","243","300","04/01/2019 8:29");
INSERT INTO incdoc VALUES("59","8","244","500","04/01/2019 8:30");
INSERT INTO incdoc VALUES("60","5","251","640","04/01/2019 11:22");
INSERT INTO incdoc VALUES("61","5","252","672","04/01/2019 12:37");
INSERT INTO incdoc VALUES("62","1","252","420","04/01/2019 12:37");



DROP TABLE items;

CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8_bin NOT NULL,
  `cost` text COLLATE utf8_bin NOT NULL,
  `dist` text COLLATE utf8_bin NOT NULL,
  `bonus` text COLLATE utf8_bin NOT NULL,
  `bonusN` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO items VALUES("1","озонотерапия в стационаре","1000","","100","100");
INSERT INTO items VALUES("7","Озонотерапия в амбулатории","1000","","100","100");
INSERT INTO items VALUES("8","Плазмоферез в стационаре","3800","","350","150");
INSERT INTO items VALUES("10","Эспераль-гель 1 год","4200","","0.16","0");
INSERT INTO items VALUES("11","Тест эспераль-гель","0","","0.10","0");
INSERT INTO items VALUES("12","Эспераль-гель 6 месяцев","3700","","0.16","0");
INSERT INTO items VALUES("13","Эспераль-гель 2 года","4900","","0.16","0");
INSERT INTO items VALUES("14","Эспераль-гель 3 года","5700","","0.16","0");
INSERT INTO items VALUES("15","Химзащита 3 мес","3100","","0.16","0");
INSERT INTO items VALUES("16","Химзащита 6 мес","3500","","0.16","0");
INSERT INTO items VALUES("17","Химзащита 1 год","3900","","0.16","0");
INSERT INTO items VALUES("18","Химзащита 18 месяцев","4300","","0.16","0");
INSERT INTO items VALUES("19","Детоксикация в амбулатории","2500","","0.10","0");
INSERT INTO items VALUES("20","Детоксикация в амбулатории интенсивная","3000","","0.10","0");
INSERT INTO items VALUES("21","Консультация психиатра-нарколога","1000","","0.40","0");
INSERT INTO items VALUES("22","Гепатопротекторный курс","900","","100","0");
INSERT INTO items VALUES("23","Нейропротекторный курс","850","","100","0");
INSERT INTO items VALUES("24","Неврологический курс","1200","","200","0");
INSERT INTO items VALUES("25","Постановка подключичного катетера","1950","","500","0");
INSERT INTO items VALUES("26","Нейтрализация Эспераль-гель","2100","","0.10","0");
INSERT INTO items VALUES("27","Нейтрализация хим защита","1900","","0.10","0");
INSERT INTO items VALUES("28","УФО крови","1000","","100","100");
INSERT INTO items VALUES("29","инд работа психолога","2000","","1000","100");
INSERT INTO items VALUES("30","инд работа старшего психолога","3000","","1500","100");
INSERT INTO items VALUES("31","Тест химзащита","0","","0.10","0");
INSERT INTO items VALUES("32","Нейтрализация прт","1","","0.10","0");
INSERT INTO items VALUES("33","Эспераль-гель ПРТ","1","","0.16","0");
INSERT INTO items VALUES("34"," Химзащита ПРТ","1","","0.16","0");
INSERT INTO items VALUES("37","Анализы","1","","","0");



DROP TABLE mest;

CREATE TABLE `mest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO mest VALUES("1","Стандарт","5000");
INSERT INTO mest VALUES("2","Эконом","3500");
INSERT INTO mest VALUES("3","Стандарт одноместная","6000");
INSERT INTO mest VALUES("4","Эконом одно","3000");
INSERT INTO mest VALUES("5","ВИП","9000");
INSERT INTO mest VALUES("6","ВИП стандарт","7000");
INSERT INTO mest VALUES("7","ВИП эконом","6000");
INSERT INTO mest VALUES("8","Нестандарт","4000");
INSERT INTO mest VALUES("9","Без подселения","6500");
INSERT INTO mest VALUES("10","Двухместная","4500");



DROP TABLE operation;

CREATE TABLE `operation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` text COLLATE utf8_bin NOT NULL,
  `client` text COLLATE utf8_bin NOT NULL,
  `sum` float NOT NULL,
  `type` text COLLATE utf8_bin NOT NULL,
  `typeSum` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=304 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO operation VALUES("1","05/12/2018 16:12","Петров Николай Александрович","4200","Амбулатория","nal");
INSERT INTO operation VALUES("2","05/12/2018 16:14","Петров Николай Александрович","10","Амбулатория","nal");
INSERT INTO operation VALUES("3","05/12/2018 16:15","Петров Николай Александрович","-10","Амбулатория","nal");
INSERT INTO operation VALUES("4","05/12/2018 17:06","Кутлуев Рифкат Хамадханович","27400","Стационар","nal");
INSERT INTO operation VALUES("5","06/12/2018 16:16","Дмитриев Александр Юрьевич","4200","Амбулатория","nal");
INSERT INTO operation VALUES("6","07/12/2018 14:22","Нугуманов Загит Раилевич","4200","Амбулатория","nal");
INSERT INTO operation VALUES("7","07/12/2018 14:24","Нуриахметов Альберт Ильгизович","4200","Амбулатория","nal");
INSERT INTO operation VALUES("8","07/12/2018 14:25","Нургалиев Ренат Рашидович","4200","Амбулатория","nal");
INSERT INTO operation VALUES("9","07/12/2018 14:33","Маричев Олег Вячеславович","4200","Амбулатория","beznal");
INSERT INTO operation VALUES("10","07/12/2018 14:39","Черепанов Игорь Константинович","4200","Амбулатория","beznal");
INSERT INTO operation VALUES("11","07/12/2018 14:42","Япаров Тагир Сагидзянович","4200","Амбулатория","nal");
INSERT INTO operation VALUES("12","07/12/2018 16:05","Агзамов Эрнест Юлаевич","4200","Амбулатория","beznal");
INSERT INTO operation VALUES("13","10/12/2018 13:56","Галиев Тимур Ринатович","26200","Стационар","nal");
INSERT INTO operation VALUES("14","13/12/2018 10:32","Каримов Венер Камилович","4200","Амбулатория","nal");
INSERT INTO operation VALUES("15","13/12/2018 10:38","Федоров Алексей Николаевич","4900","Амбулатория","nal");
INSERT INTO operation VALUES("16","14/12/2018 8:52","Павлов Александр Иванович","1500","Амбулатория","nal");
INSERT INTO operation VALUES("17","14/12/2018 11:40","Наушербанов Артур Салихович","19000","Стационар","nal");
INSERT INTO operation VALUES("18","16/12/2018 13:48","Салимгареев Виталий Салаевич","25700","Стационар","nal");
INSERT INTO operation VALUES("21","16/12/2018 16:25","Байжева Елена Владимировна","60150","Стационар","beznal");
INSERT INTO operation VALUES("22","16/12/2018 17:38","Мухтаров Айрат Назирович","3900","Амбулатория","nal");
INSERT INTO operation VALUES("24","16/12/2018 17:45","Мардакин Евгений Александрович","4200","Амбулатория","nal");
INSERT INTO operation VALUES("25","16/12/2018 17:49","Ширяев Антон Владимирович","1000","Амбулатория","nal");
INSERT INTO operation VALUES("26","16/12/2018 17:51","Манукян Антон Олегович","4200","Амбулатория","nal");
INSERT INTO operation VALUES("27","16/12/2018 18:53","Шутов Игорь Анатольевич","10000","Стационар","nal");
INSERT INTO operation VALUES("28","16/12/2018 19:06","Чернов Алексей Васильевич","50750","Стационар","beznal");
INSERT INTO operation VALUES("29","16/12/2018 19:24","Смирнов Дмитрий Борисович","17500","Стационар","nal");
INSERT INTO operation VALUES("30","17/12/2018 7:41","Васильев Василий Васильевич","27700","Стационар","nal");
INSERT INTO operation VALUES("31","17/12/2018 8:49","Юлдашбаев Загир Алимович","15000","Стационар","nal");
INSERT INTO operation VALUES("33","17/12/2018 15:15","Рахимов Рустам Радикович","3900","Амбулатория","nal");
INSERT INTO operation VALUES("34","17/12/2018 15:17","Ибрагимов Марат Рифкатович","4200","Амбулатория","beznal");
INSERT INTO operation VALUES("35","17/12/2018 15:20","Григорьев Сергей Ильич","3900","Амбулатория","nal");
INSERT INTO operation VALUES("36","17/12/2018 15:24","Степанов Владимир Геннадьевич","4200","Амбулатория","nal");
INSERT INTO operation VALUES("37","18/12/2018 11:36","Костин Сергей Викторович","60600","Стационар","nal");
INSERT INTO operation VALUES("38","18/12/2018 14:10","Салихкулов Ришат Уралович","4200","Амбулатория","beznal");
INSERT INTO operation VALUES("39","18/12/2018 14:17","Шарипов Руслан Азатович","23500","Стационар","beznal");
INSERT INTO operation VALUES("42","18/12/2018 14:19","Шарипов Руслан Азатович","-100","Стационар","dep");
INSERT INTO operation VALUES("43","18/12/2018 14:42","Вершинин Сергей Вадимович","4000","Амбулатория","beznal");
INSERT INTO operation VALUES("45","18/12/2018 16:32","Аврамчук Руслан Ананьевич","37700","Стационар","beznal");
INSERT INTO operation VALUES("46","18/12/2018 16:44","Давлетгареев Радик Лябибович","3500","Стационар","nal");
INSERT INTO operation VALUES("47","19/12/2018 8:27","Халимов Ильмир Хасанович","4200","Амбулатория","nal");
INSERT INTO operation VALUES("48","19/12/2018 8:28","Мулюков Рустем Ирекович","4200","Амбулатория","nal");
INSERT INTO operation VALUES("49","19/12/2018 8:28","Мельникова Лиля Салаватовна","200","Амбулатория","beznal");
INSERT INTO operation VALUES("50","19/12/2018 8:29","Мельникова Лиля Салаватовна","4000","Амбулатория","nal");
INSERT INTO operation VALUES("51","19/12/2018 8:30","Барабанов Юрий Николаевич","4200","Амбулатория","nal");
INSERT INTO operation VALUES("52","19/12/2018 8:31","Хаматгареев Динар Фанисович","3900","Амбулатория","nal");
INSERT INTO operation VALUES("53","19/12/2018 8:32","Сафин Мударис Фавилович","4200","Амбулатория","nal");
INSERT INTO operation VALUES("54","19/12/2018 8:33","Казакбаев Ильгам Рафаелевич","3900","Амбулатория","beznal");
INSERT INTO operation VALUES("55","19/12/2018 8:34","Саймулов Михаил Васильевич","3900","Амбулатория","beznal");
INSERT INTO operation VALUES("56","19/12/2018 8:35","Картяева Анастасия Викторовна","2100","Амбулатория","nal");
INSERT INTO operation VALUES("57","19/12/2018 8:36","Александров Александр Андреевич","4200","Амбулатория","nal");
INSERT INTO operation VALUES("59","19/12/2018 8:38","Дударев Валерий Иванович","3900","Амбулатория","nal");
INSERT INTO operation VALUES("60","19/12/2018 8:40","Шарипов Марат Магданурович","4200","Амбулатория","nal");
INSERT INTO operation VALUES("61","19/12/2018 8:41","Исмагилов Юнир Равкатович","3900","Амбулатория","nal");
INSERT INTO operation VALUES("63","19/12/2018 8:51","Абдуллина Резида Ядкаровна","4200","Амбулатория","nal");
INSERT INTO operation VALUES("64","19/12/2018 8:52","Шаяхметов Аскар Гарабшанович","3900","Амбулатория","nal");
INSERT INTO operation VALUES("65","19/12/2018 8:54","Фадеева Лиля Александровна","3900","Амбулатория","beznal");
INSERT INTO operation VALUES("66","19/12/2018 8:55","Колесников Андрей Сергеевич","4200","Амбулатория","nal");
INSERT INTO operation VALUES("67","19/12/2018 9:15","Кабиров Венер Салихьянович","3900","Амбулатория","nal");
INSERT INTO operation VALUES("68","19/12/2018 9:16","Лукманов Азат Ибрагимович","4200","Амбулатория","nal");
INSERT INTO operation VALUES("69","19/12/2018 9:18","Набиев Альфред Фаритович","4200","Амбулатория","nal");
INSERT INTO operation VALUES("70","19/12/2018 9:19","Ульябаев Ильмир Нуруллович","3900","Амбулатория","nal");
INSERT INTO operation VALUES("71","19/12/2018 9:20","Нифантов Олег Михайлович","4200","Амбулатория","nal");
INSERT INTO operation VALUES("72","19/12/2018 9:21","Хамаев Рустем Фанилевич","3900","Амбулатория","beznal");
INSERT INTO operation VALUES("73","19/12/2018 9:22","Акбашев Венер Фанилевич","6700","Амбулатория","beznal");
INSERT INTO operation VALUES("74","19/12/2018 9:31","Ситдиков Раис Адхамович","4900","Амбулатория","nal");
INSERT INTO operation VALUES("75","19/12/2018 9:32","Галяфутдинов Ильдар Гумерович","4000","Амбулатория","nal");
INSERT INTO operation VALUES("76","19/12/2018 9:34","Якушев Валерий Владимирович","3700","Амбулатория","nal");
INSERT INTO operation VALUES("77","19/12/2018 10:32","Магиярова Алина Анисовна","9000","Стационар","nal");
INSERT INTO operation VALUES("78","19/12/2018 10:33","Сулейманов Айрат Тамасович","3100","Стационар","nal");
INSERT INTO operation VALUES("79","19/12/2018 10:34","Мирошникова Юлия Владимировна","10500","Стационар","beznal");
INSERT INTO operation VALUES("80","19/12/2018 10:35","Шарафисламов Рафаэль Радикович","11800","Стационар","nal");
INSERT INTO operation VALUES("81","19/12/2018 10:59","Юлаев Ришат Нареевич","3500","Стационар","nal");
INSERT INTO operation VALUES("82","19/12/2018 11:01","Нуриев Ринат Маратович","15000","Стационар","nal");
INSERT INTO operation VALUES("84","19/12/2018 11:01","Иванов Вадим Анатольевич","5000","Стационар","nal");
INSERT INTO operation VALUES("85","19/12/2018 11:02","Ахмадеев Ильдар Тагирович","24500","Стационар","nal");
INSERT INTO operation VALUES("86","19/12/2018 12:37","Сулейманов Айрат Тамасович","30350","Стационар","nal");
INSERT INTO operation VALUES("87","19/12/2018 13:02","Иванов Вадим Анатольевич","3000","Стационар","nal");
INSERT INTO operation VALUES("88","19/12/2018 13:03","Сафиханов Ильфат Хамитович","4500","Стационар","nal");
INSERT INTO operation VALUES("89","19/12/2018 13:03","Иштуганов Руслан Тагирович","10000","Стационар","nal");
INSERT INTO operation VALUES("90","19/12/2018 13:04","Талашманов Денис Викторович","4200","Амбулатория","nal");
INSERT INTO operation VALUES("91","19/12/2018 13:04","Пирогов С.Н.","2500","Амбулатория","nal");
INSERT INTO operation VALUES("94","19/12/2018 14:08","Габрилян","5800","Амбулатория","nal");
INSERT INTO operation VALUES("95","19/12/2018 14:28","Гайсин Ильгиз Фаилович","3800","Амбулатория","nal");
INSERT INTO operation VALUES("96","19/12/2018 14:32","Ковалёв Виктор Юрьевич","4900","Амбулатория","nal");
INSERT INTO operation VALUES("98","19/12/2018 14:47","Фролов Станислав Викторович","3900","Амбулатория","nal");
INSERT INTO operation VALUES("99","19/12/2018 14:54","Юзлекбаева Фануза Ахатовна","3900","Амбулатория","nal");
INSERT INTO operation VALUES("100","19/12/2018 14:56","Сахибгареева Инна Асляховна","1000","Амбулатория","nal");
INSERT INTO operation VALUES("101","19/12/2018 16:37","Смойлин А.В.","3400","Амбулатория","nal");
INSERT INTO operation VALUES("102","20/12/2018 9:48","Дисперов П.А.","2500","Амбулатория","nal");
INSERT INTO operation VALUES("103","20/12/2018 12:02","Кильдияров Алмаз Рифович","12000","Стационар","nal");
INSERT INTO operation VALUES("104","20/12/2018 12:02","Ахметов А.В.","2500","Амбулатория","nal");
INSERT INTO operation VALUES("106","20/12/2018 13:25","Магиярова Алина Анисовна","18700","Стационар","nal");
INSERT INTO operation VALUES("108","20/12/2018 14:36","Исламов Рамиз Замирович","4200","Амбулатория","nal");
INSERT INTO operation VALUES("109","20/12/2018 14:36","Гизатуллин Аскат Рахметович","4200","Амбулатория","nal");
INSERT INTO operation VALUES("110","20/12/2018 15:40","Калимуллин Альберт Викторович","4200","Амбулатория","nal");
INSERT INTO operation VALUES("111","20/12/2018 15:42","Хамматов Рушат Анварович","15500","Стационар","nal");
INSERT INTO operation VALUES("112","20/12/2018 16:05","Юлаев Ришат Нареевич","12000","Стационар","nal");
INSERT INTO operation VALUES("113","20/12/2018 17:09","Каленьтьев Леонид Викторович","11000","Стационар","nal");
INSERT INTO operation VALUES("114","21/12/2018 10:03","Нуриев Ринат Маратович","9700","Стационар","nal");
INSERT INTO operation VALUES("115","21/12/2018 10:03","Вахитов Рафаэь Тимурович","9000","Стационар","nal");
INSERT INTO operation VALUES("116","21/12/2018 10:03","Ефремов Алексей Николаевич","6500","Стационар","nal");
INSERT INTO operation VALUES("117","21/12/2018 10:04","Максютов И.З.","3350","Амбулатория","nal");
INSERT INTO operation VALUES("120","21/12/2018 12:36","Гайсин Ильгиз Фаилович","3800","Амбулатория","nal");
INSERT INTO operation VALUES("121","21/12/2018 12:59","Абрамов Олег Олегович","3900","Амбулатория","nal");
INSERT INTO operation VALUES("122","21/12/2018 13:25","Ахтамьянов Артур Салаватович","4200","Амбулатория","nal");
INSERT INTO operation VALUES("123","21/12/2018 14:56","Сидоров Николай Николаевич","4200","Амбулатория","nal");
INSERT INTO operation VALUES("124","21/12/2018 14:56","Змазнев Максим Владимирович","4200","Амбулатория","nal");
INSERT INTO operation VALUES("125","21/12/2018 16:23","Гагарин Виктор Павлович","11500","Стационар","nal");
INSERT INTO operation VALUES("126","21/12/2018 17:01","Волков Олег Геннадьевич","5000","Стационар","nal");
INSERT INTO operation VALUES("127","22/12/2018 10:27","Лысенков Олег Юрьевич","5500","Стационар","beznal");
INSERT INTO operation VALUES("128","22/12/2018 10:28","Низамов Ильгиз Венерович","4900","Амбулатория","nal");
INSERT INTO operation VALUES("129","22/12/2018 10:30","Давлетов Венер Мунавирович","3500","Стационар","nal");
INSERT INTO operation VALUES("130","22/12/2018 11:08","Сафиханов Ильфат Хамитович","7000","Стационар","nal");
INSERT INTO operation VALUES("131","22/12/2018 11:54","Александров Владимир Викторович","4200","Амбулатория","nal");
INSERT INTO operation VALUES("132","22/12/2018 13:18","Волков Олег Геннадьевич","10000","Стационар","nal");
INSERT INTO operation VALUES("133","22/12/2018 13:27","Халитов Раид Рашитович","4200","Амбулатория","nal");
INSERT INTO operation VALUES("134","22/12/2018 13:27","Сулейманов Радик Тагирович","3900","Амбулатория","nal");
INSERT INTO operation VALUES("136","22/12/2018 13:42","Чупраков Анатолий Павлович","5500","Стационар","nal");
INSERT INTO operation VALUES("137","22/12/2018 14:25","Нуриев Ринат Маратович","4500","Стационар","nal");
INSERT INTO operation VALUES("138","22/12/2018 14:51","Усманов Иван Иванович","1000","Амбулатория","nal");
INSERT INTO operation VALUES("139","23/12/2018 9:17","Шаров Олег Борисович","5500","Стационар","beznal");
INSERT INTO operation VALUES("140","23/12/2018 9:18","Исламов Радик Какзиевич","8300","Стационар","nal");
INSERT INTO operation VALUES("141","23/12/2018 10:44","Вахитов Рафаэь Тимурович","-750","Стационар","dep");
INSERT INTO operation VALUES("143","23/12/2018 10:49","Спиридонов Алексей Юрьевич","8500","Стационар","nal");
INSERT INTO operation VALUES("144","23/12/2018 10:51","Давлетов Венер Мунавирович","2000","Стационар","nal");
INSERT INTO operation VALUES("145","24/12/2018 10:32","Епифанов Константин Викторович","4200","Амбулатория","nal");
INSERT INTO operation VALUES("146","24/12/2018 10:32","Сорокин Николай Владимирович","4200","Амбулатория","nal");
INSERT INTO operation VALUES("147","24/12/2018 10:32","Байтимиров Тимур Рамилевич","5700","Амбулатория","nal");
INSERT INTO operation VALUES("148","24/12/2018 10:34","Шибанов Максим Николаевич","3900","Амбулатория","nal");
INSERT INTO operation VALUES("149","24/12/2018 11:44","Волков Олег Геннадьевич","4750","Стационар","nal");
INSERT INTO operation VALUES("150","24/12/2018 12:52","Гагарин Виктор Павлович","7000","Стационар","nal");
INSERT INTO operation VALUES("151","24/12/2018 13:53","Нигматуллин Алик Ахатович","3900","Амбулатория","nal");
INSERT INTO operation VALUES("152","24/12/2018 13:53","Скорняков Юрий Владимирович","4200","Амбулатория","nal");
INSERT INTO operation VALUES("153","24/12/2018 13:54","Дудина Наталья Ильинична","4200","Амбулатория","nal");
INSERT INTO operation VALUES("154","24/12/2018 13:54","Шахов Алексей Иванович","8250","Стационар","nal");
INSERT INTO operation VALUES("155","25/12/2018 10:26","Волошина Татьяна Александровна","6200","Амбулатория","nal");
INSERT INTO operation VALUES("156","25/12/2018 11:20","Каленьтьев Леонид Викторович","4000","Стационар","nal");
INSERT INTO operation VALUES("157","25/12/2018 11:23","Опойков Александр Геннадьевич","7500","Стационар","nal");
INSERT INTO operation VALUES("158","25/12/2018 11:27","Архипов Александр Сергеевич","5000","Стационар","nal");
INSERT INTO operation VALUES("159","25/12/2018 11:30","Мухаметгалиев Илдар Мунирович","10000","Стационар","nal");
INSERT INTO operation VALUES("160","25/12/2018 11:36","Саркеев Игорь Байрамолович","10000","Стационар","nal");
INSERT INTO operation VALUES("161","25/12/2018 11:42","Исмагилов Рустам Хабибьянович","10000","Стационар","nal");
INSERT INTO operation VALUES("162","25/12/2018 11:54","Демидова Юлия Григорьевна","10000","Стационар","nal");
INSERT INTO operation VALUES("163","25/12/2018 12:00","Хаертдинов Ильгиз Равилович","5000","Стационар","nal");
INSERT INTO operation VALUES("164","25/12/2018 12:00","Хаертдинов Ильгиз Равилович","500","Стационар","beznal");
INSERT INTO operation VALUES("165","25/12/2018 12:05","Мельчаков Андрей Васильевич","4000","Стационар","nal");
INSERT INTO operation VALUES("166","25/12/2018 12:05","Галеева Светлана Галимьяновна","5500","Стационар","nal");
INSERT INTO operation VALUES("167","25/12/2018 13:29","Мельчаков Андрей Васильевич","8500","Стационар","nal");
INSERT INTO operation VALUES("169","25/12/2018 13:58","Демидова Юлия Григорьевна","4500","Стационар","nal");
INSERT INTO operation VALUES("170","25/12/2018 14:23","Салихов Ильгиз Минигалеевич","3900","Амбулатория","nal");
INSERT INTO operation VALUES("171","25/12/2018 14:24","Джабраилова Альбина Рамилевна","4200","Амбулатория","nal");
INSERT INTO operation VALUES("173","25/12/2018 14:29","Саркеев Игорь Байрамолович","2400","Стационар","nal");
INSERT INTO operation VALUES("174","25/12/2018 14:35","Вакулова Анна Александровна","4000","Амбулатория","nal");
INSERT INTO operation VALUES("175","25/12/2018 16:29","Гадельшин Азамат Зуфарович","4200","Амбулатория","nal");
INSERT INTO operation VALUES("176","26/12/2018 11:16","Кусяпкулов Наиль Хайдарович","14500","Стационар","nal");
INSERT INTO operation VALUES("177","26/12/2018 11:16","Еникеева Фаузия Ибрагимовна","5000","Стационар","nal");
INSERT INTO operation VALUES("178","26/12/2018 11:17","Набиева Айгуль Савиевна","5500","Стационар","nal");
INSERT INTO operation VALUES("179","26/12/2018 11:17","Вернер Александр Владимирович","10000","Стационар","nal");
INSERT INTO operation VALUES("180","26/12/2018 11:18","Ахмадиев Эдуард Раузирович","1000","Стационар","nal");
INSERT INTO operation VALUES("181","26/12/2018 11:18","Бикбулатов  Рустем Альфритович","1000","Стационар","nal");
INSERT INTO operation VALUES("182","26/12/2018 11:19","Запольских Андрей Владимирович","5500","Стационар","nal");
INSERT INTO operation VALUES("183","26/12/2018 11:19","Фролова Наталья Леонтьевна","9500","Стационар","nal");
INSERT INTO operation VALUES("184","26/12/2018 12:17","Еникеева Фаузия Ибрагимовна","9500","Стационар","nal");
INSERT INTO operation VALUES("186","26/12/2018 12:35","Пелипенко Олег Васильевич","14500","Стационар","nal");
INSERT INTO operation VALUES("187","26/12/2018 14:48","Ахметов Руслан Георгиевич","4200","Амбулатория","nal");
INSERT INTO operation VALUES("188","26/12/2018 14:48","Черноусько Валентина Петровна","3900","Амбулатория","nal");
INSERT INTO operation VALUES("189","26/12/2018 14:48","Белая Маргарита Халимовна","3100","Амбулатория","nal");
INSERT INTO operation VALUES("190","26/12/2018 15:56","Караваев Валерий Валерьевич","3900","Амбулатория","nal");
INSERT INTO operation VALUES("191","26/12/2018 16:22","Исмагилов Рустам Хабибьянович","11750","Стационар","nal");
INSERT INTO operation VALUES("192","26/12/2018 16:24","Яппарова Гульнара Саляховна","4900","Амбулатория","nal");
INSERT INTO operation VALUES("193","26/12/2018 16:25","Гагарин Виктор Павлович","4200","Стационар","nal");
INSERT INTO operation VALUES("195","26/12/2018 16:35","Даушев Айдар Закиевич","6400","Стационар","nal");
INSERT INTO operation VALUES("196","26/12/2018 16:55","Ахмадиев Эдуард Раузирович","2500","Стационар","beznal");
INSERT INTO operation VALUES("197","26/12/2018 17:38","Бикбулатов  Рустем Альфритович","4500","Стационар","nal");
INSERT INTO operation VALUES("198","27/12/2018 10:14","Фатхутдинов Наиль Камилович","10000","Стационар","nal");
INSERT INTO operation VALUES("199","27/12/2018 10:20","Мухаметгалиев Илдар Мунирович","5000","Стационар","nal");
INSERT INTO operation VALUES("200","27/12/2018 14:26","Раков Александр Владимирович","5700","Амбулатория","nal");
INSERT INTO operation VALUES("201","27/12/2018 14:26","Салахов Ринат Ахкамович","12000","Стационар","nal");
INSERT INTO operation VALUES("202","27/12/2018 14:48","Шабрин Дмитрий Геннадиевич","3900","Амбулатория","nal");
INSERT INTO operation VALUES("203","27/12/2018 15:03","Набиева Айгуль Савиевна","4500","Стационар","nal");
INSERT INTO operation VALUES("204","27/12/2018 16:06","Рафиков Эмиль Венерович","4200","Амбулатория","nal");
INSERT INTO operation VALUES("205","28/12/2018 10:29","Дергунов Денис Николаевич","7000","Стационар","nal");
INSERT INTO operation VALUES("206","28/12/2018 10:29","Магасумов Алтберт Агзамович","10000","Стационар","nal");
INSERT INTO operation VALUES("207","28/12/2018 10:29","Тельков А.Н.","2500","Амбулатория","nal");
INSERT INTO operation VALUES("208","28/12/2018 13:07","Габдуллин Юлай Наилевич","4000","Стационар","nal");
INSERT INTO operation VALUES("209","28/12/2018 13:41","Галин И.П.","2500","Амбулатория","nal");
INSERT INTO operation VALUES("210","28/12/2018 14:20","Ахмадуллина Зиля Галеевна","5700","Амбулатория","nal");
INSERT INTO operation VALUES("211","28/12/2018 14:21","Шабрин Олег Владимирович","5700","Амбулатория","nal");
INSERT INTO operation VALUES("212","28/12/2018 14:52","Валиахметов Динар Дамирович","3900","Амбулатория","nal");
INSERT INTO operation VALUES("213","28/12/2018 14:59","Усманов Вадим Иванович","1900","Амбулатория","nal");
INSERT INTO operation VALUES("214","28/12/2018 14:59","Гавриков Иван Иванович","1900","Амбулатория","nal");
INSERT INTO operation VALUES("215","28/12/2018 14:59","Хабибов Айрат Рашитович","4500","Стационар","nal");
INSERT INTO operation VALUES("216","28/12/2018 15:05","Гладских Алла Юрьевна","44400","Стационар","nal");
INSERT INTO operation VALUES("217","28/12/2018 16:51","Гатауллин Тимерьян Емирьянович","11500","Стационар","nal");
INSERT INTO operation VALUES("218","28/12/2018 19:55","Фролова Наталья Леонтьевна","5000","Стационар","nal");
INSERT INTO operation VALUES("219","29/12/2018 10:40","Архипов Александр Сергеевич","13500","Стационар","nal");
INSERT INTO operation VALUES("220","29/12/2018 10:41","Цагалов Сергей Арсенович","5000","Стационар","nal");
INSERT INTO operation VALUES("221","29/12/2018 10:41","Сарварова Инна Федоровна","4000","Стационар","nal");
INSERT INTO operation VALUES("222","29/12/2018 10:42","Назарова Г.А.","2500","Амбулатория","nal");
INSERT INTO operation VALUES("224","29/12/2018 11:01","Габдуллин Юлай Наилевич","19500","Стационар","nal");
INSERT INTO operation VALUES("225","29/12/2018 11:24","Зиганшин Марат Дамирович","4200","Амбулатория","nal");
INSERT INTO operation VALUES("226","29/12/2018 11:35","Салахов Ринат Ахкамович","2400","Стационар","nal");
INSERT INTO operation VALUES("227","29/12/2018 14:38","Нургалиев Ирек Рифкатович","3900","Амбулатория","nal");
INSERT INTO operation VALUES("228","29/12/2018 14:40","Айдунов Альберт Назарович","4200","Амбулатория","nal");
INSERT INTO operation VALUES("229","29/12/2018 14:43","Овчаров Иван Иванович","2100","Амбулатория","nal");
INSERT INTO operation VALUES("230","29/12/2018 15:57","Таранов Александр Александрович","3900","Амбулатория","nal");
INSERT INTO operation VALUES("231","30/12/2018 12:37","Шавохин Николай Сергеевич","13800","Стационар","nal");
INSERT INTO operation VALUES("232","30/12/2018 13:33","Файзрахманов Марат Фаритович","23000","Стационар","nal");
INSERT INTO operation VALUES("233","30/12/2018 13:59","Насибуллин Динар Ильхамович","14500","Стационар","nal");
INSERT INTO operation VALUES("234","30/12/2018 14:02","Токарев Михаил Анатольевич","5500","Стационар","nal");
INSERT INTO operation VALUES("235","30/12/2018 14:05","Пенкин Артем Леонидович","5500","Стационар","nal");
INSERT INTO operation VALUES("236","30/12/2018 14:12","Халиков Ильдар Халитович","2000","Стационар","nal");
INSERT INTO operation VALUES("237","30/12/2018 14:14","Магасумов Алтберт Агзамович","900","Стационар","nal");
INSERT INTO operation VALUES("238","30/12/2018 14:16","Ровнейко Александр Николаевич","5500","Стационар","nal");
INSERT INTO operation VALUES("239","30/12/2018 14:17","Тювелев Сергей Геннадьевич","10000","Стационар","nal");
INSERT INTO operation VALUES("240","30/12/2018 14:17","Сарварова Инна Федоровна","1500","Стационар","nal");
INSERT INTO operation VALUES("241","30/12/2018 14:22","Шарафуллина Зубарият Мирзанурович","3900","Амбулатория","nal");
INSERT INTO operation VALUES("242","30/12/2018 14:22","Баязитов Радим Рамилевич","3900","Амбулатория","nal");
INSERT INTO operation VALUES("243","30/12/2018 14:23","Романов Андрей Сергеевич","4200","Амбулатория","nal");
INSERT INTO operation VALUES("244","30/12/2018 15:42","Мунасипов","2100","Амбулатория","nal");
INSERT INTO operation VALUES("245","30/12/2018 20:13","Назмиев Ринат Магнавиевич","19750","Стационар","nal");
INSERT INTO operation VALUES("246","30/12/2018 20:16","Усманов Рустем Валерьевич","3500","Стационар","nal");
INSERT INTO operation VALUES("247","31/12/2018 9:23","Халиков Ильдар Халитович","3500","Стационар","nal");
INSERT INTO operation VALUES("248","31/12/2018 9:42","Цагалов Сергей Арсенович","5000","Стационар","nal");
INSERT INTO operation VALUES("249","31/12/2018 12:21","Шаталин Сергей Александрович","4200","Амбулатория","nal");
INSERT INTO operation VALUES("250","31/12/2018 12:21","Гатауллин Тимерьян Емирьянович","4200","Стационар","nal");
INSERT INTO operation VALUES("251","01/01/2019 9:24","Ахмадеев Ришат Ришатович","5500","Стационар","nal");
INSERT INTO operation VALUES("252","01/01/2019 9:24","Ахметова Гузель Сайфутдиновна","5500","Стационар","nal");
INSERT INTO operation VALUES("253","01/01/2019 9:24","Демях Владимир Александрович","10500","Стационар","nal");
INSERT INTO operation VALUES("254","01/01/2019 9:25","Сибаев Рузалим Мансурович","10000","Стационар","nal");
INSERT INTO operation VALUES("255","01/01/2019 9:25","Усманов Рустем Валерьевич","1000","Стационар","nal");
INSERT INTO operation VALUES("256","01/01/2019 9:25","Родькин Владимир Викторович","10000","Стационар","nal");
INSERT INTO operation VALUES("258","02/01/2019 8:16","Уразгулов Ильшат Асхатович","8000","Стационар","nal");
INSERT INTO operation VALUES("259","02/01/2019 12:17","Пенкин Артем Леонидович","14500","Стационар","nal");
INSERT INTO operation VALUES("260","02/01/2019 12:21","Дергунов Денис Николаевич","15700","Стационар","nal");
INSERT INTO operation VALUES("261","02/01/2019 12:30","Гусманов Ильдар Рафикович","5000","Стационар","nal");
INSERT INTO operation VALUES("262","02/01/2019 13:04","Голованова Светлана Сергеевна","11000","Стационар","nal");
INSERT INTO operation VALUES("263","02/01/2019 13:04","Ишмаев Марат Кафилович","5000","Стационар","nal");
INSERT INTO operation VALUES("264","02/01/2019 13:17","Харасов Марат Фаритович","13500","Стационар","beznal");
INSERT INTO operation VALUES("265","02/01/2019 13:20","Харасов Салават Фаритович","13500","Стационар","nal");
INSERT INTO operation VALUES("266","02/01/2019 13:25","Пермякова","2100","Амбулатория","nal");
INSERT INTO operation VALUES("267","02/01/2019 13:29","Ахметов Ринат Ильясович","3900","Амбулатория","nal");
INSERT INTO operation VALUES("269","02/01/2019 14:14","Хабиров Ринат Рашитович","16000","Стационар","nal");
INSERT INTO operation VALUES("270","02/01/2019 15:23","Гайнутдинов Р.Ф.","3000","Амбулатория","nal");
INSERT INTO operation VALUES("271","02/01/2019 16:46","Фатхлисламов Сабит Сабирович","4500","Стационар","beznal");
INSERT INTO operation VALUES("272","03/01/2019 9:19","Катренич Альберт Сергеевич","4000","Стационар","beznal");
INSERT INTO operation VALUES("273","03/01/2019 9:19","Катренич Альберт Сергеевич","2000","Стационар","nal");
INSERT INTO operation VALUES("274","03/01/2019 9:21","Холманов Анатолий Викторович","6000","Стационар","beznal");
INSERT INTO operation VALUES("275","03/01/2019 9:26","Гусманов Ильдар Рафикович","6000","Стационар","nal");
INSERT INTO operation VALUES("276","03/01/2019 9:27","Ишмаев Марат Кафилович","4500","Стационар","nal");
INSERT INTO operation VALUES("277","03/01/2019 11:22","Сопов Валентин Валерьевич","5700","Амбулатория","nal");
INSERT INTO operation VALUES("278","03/01/2019 12:25","Родькин Владимир Викторович","-4500","Стационар","dep");
INSERT INTO operation VALUES("281","03/01/2019 13:06","Файзрахманов Марат Фаритович","500","Стационар","nal");
INSERT INTO operation VALUES("282","03/01/2019 14:34","Годунов Б.Н.","4750","Амбулатория","beznal");
INSERT INTO operation VALUES("283","03/01/2019 16:57","Максимова Валентина Алексеевна","10000","Стационар","nal");
INSERT INTO operation VALUES("285","03/01/2019 18:42","Хисматуллин Р.Н.","3000","Амбулатория","beznal");
INSERT INTO operation VALUES("286","03/01/2019 19:06","Суфиянов А.Р.","3000","Амбулатория","nal");
INSERT INTO operation VALUES("288","03/01/2019 19:10","Диденко С.Н.","4750","Амбулатория","nal");
INSERT INTO operation VALUES("289","03/01/2019 19:11","Нагимов Рустем Ульфатович","6000","Стационар","nal");
INSERT INTO operation VALUES("290","03/01/2019 19:11","Башаров Азат Фазитович","6000","Стационар","nal");
INSERT INTO operation VALUES("291","03/01/2019 19:12","Даутов Ильдар Алмасович","16000","Стационар","nal");
INSERT INTO operation VALUES("293","03/01/2019 19:15","Атланов Денис Сергеевич","4500","Стационар","beznal");
INSERT INTO operation VALUES("294","03/01/2019 19:19","Мухтаров Дамир Гатиевич","7000","Стационар","beznal");
INSERT INTO operation VALUES("295","03/01/2019 19:23","Сайфуллина Татьяна Геннадьевна","4000","Стационар","nal");
INSERT INTO operation VALUES("296","03/01/2019 19:23","Сайфуллина Татьяна Геннадьевна","500","Стационар","beznal");
INSERT INTO operation VALUES("297","03/01/2019 19:26","Шангареев Эльдар Рауфович","6000","Стационар","beznal");
INSERT INTO operation VALUES("298","03/01/2019 19:50","Фаррахов Р.Р.","3000","Амбулатория","nal");
INSERT INTO operation VALUES("299","04/01/2019 7:44","Ахметов Ринат Илюсович","6000","Стационар","nal");
INSERT INTO operation VALUES("300","04/01/2019 7:47","Букин Александр Игоревич","7500","Стационар","nal");
INSERT INTO operation VALUES("301","04/01/2019 9:57","Черезов А.А.","4000","Амбулатория","nal");
INSERT INTO operation VALUES("303","04/01/2019 11:28","Аюпов Рамиль Ривкатович","4200","Амбулатория","beznal");



DROP TABLE param;

CREATE TABLE `param` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(90) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO param VALUES("1","Прием","100");
INSERT INTO param VALUES("2","Последнее изменение","04/01/2019");
INSERT INTO param VALUES("3","Последняя копия","04/01/2019 7:41");
INSERT INTO param VALUES("6","Диспетчеры","Анастасия, Яна, Ришат, Евгения, Людмила, самообращение");
INSERT INTO param VALUES("7","Реклама","ТВ,Агенты,Газета,Наружняя реклама,Вывеска, интернет, знакомый, самообращение, повтор");
INSERT INTO param VALUES("8","Агенты","Скорая помощь, 21 больница, Справочник, НАС, Кавказская, Баязов, Олимп, Екат, Казань, Тимур Мусин, Васильев, РЦ, Кидяев");



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
  `currnet_mest` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=257 DEFAULT CHARSET=latin1;

INSERT INTO patient VALUES("2","Петров Николай Александрович","30/12/1968","8 (917) 759-8821","10-5-5-1-05/12/2018 16:08-01/12/2018,11-5-1-1-05/12/2018 17:27-01/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","04/12/2018 16:03","0","0","4200","04/12/2018 17:50","ТВ","","0","0"," Евгения","","0");
INSERT INTO patient VALUES("3","Павлов Александр Иванович","05/08/1981","","32-5-5-1-14/12/2018 8:50-01/12/2018-1500","1500","Арсланов Азат Шамилевич","1500","Амбулатория","","01/12/2018 16:20","0","0","1","01/12/2018 8:52"," самообращение","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("4","Дмитриев Александр Юрьевич","01/08/1976","8 (963) 902-0407","10-5-5-1-05/12/2018 16:31-02/12/2018,11-5-12-1-06/12/2018 16:18-02/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","02/12/2018 16:29","0","0","4200","02/12/2018 10:07","ТВ","","0","0"," Евгения","","0");
INSERT INTO patient VALUES("5","Нугуманов Загит Раилевич","01/01/1974","8 (917) 496-6754","10-5-5-1-05/12/2018 16:34-02/12/2018,11-5-12-1-07/12/2018 12:44-02/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","02/12/2018 16:34","0","0","4200","02/12/2018 11:23","ТВ","","0","0"," Евгения","","0");
INSERT INTO patient VALUES("6","Нуриахметов Альберт Ильгизович","01/01/1978","8 (917) 743-0213","10-5-5-1-05/12/2018 16:38-02/12/2018,11-5-12-1-07/12/2018 12:44-02/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","02/12/2018 16:37","0","0","4200","02/12/2018 11:24","ТВ","","0","0"," Евгения","","0");
INSERT INTO patient VALUES("7","Нургалиев Ренат Рашидович","01/01/1985","8 (987) 033-7712","10-5-5-1-05/12/2018 16:41-02/12/2018,11-5-12-1-07/12/2018 14:26-02/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","02/12/2018 16:40","0","0","4200","02/12/2018 14:26"," интернет","","0","0"," Евгения","","0");
INSERT INTO patient VALUES("8","Маричев Олег Вячеславович","01/01/1976","8 (906) 861-6915","10-5-5-1-05/12/2018 16:44-03/12/2018,11-5-1-1-05/12/2018 17:29-03/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","03/12/2018 16:43","0","0","4200","03/12/2018 14:37","Агенты"," НАС","0","0"," Евгения","","0");
INSERT INTO patient VALUES("9","Черепанов Игорь Константинович","16/08/1969","8 (917) 493-3239","10-5-5-1-05/12/2018 16:47-03/12/2018,11-5-1-1-05/12/2018 17:31-03/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","03/12/2018 16:46","0","0","4200","03/12/2018 14:39","ТВ","","0","0","Анастасия","","0");
INSERT INTO patient VALUES("10","Япаров Тагир Сагидзянович","21/09/1983","8 (927) 230-5171","10-5-5-1-05/12/2018 16:49-04/12/2018,11-5-1-1-05/12/2018 17:31-04/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","04/12/2018 16:49","0","0","4200","04/12/2018 14:44","ТВ","","0","0","Анастасия","","0");
INSERT INTO patient VALUES("11","Агзамов Эрнест Юлаевич","24/09/1965","8 (987) 250-6137","10-5-5-1-05/12/2018 16:52-04/12/2018,11-5-1-1-07/12/2018 16:06-04/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","04/12/2018 16:51","0","0","4200","04/12/2018 16:07","ТВ","","0","0","Анастасия","","0");
INSERT INTO patient VALUES("12","Кутлуев Рифкат Хамадханович","06/08/1965","8 (927) 931-6393","1-8-1-1-05/12/2018 17:04-27/11/2018,1-8-1-1-05/12/2018 17:04-28/11/2018,1-8-1-1-05/12/2018 17:04-29/11/2018,1-8-1-1-05/12/2018 17:04-30/11/2018,1-8-1-1-05/12/2018 17:04-01/12/2018,17-8-5-1-07/12/2018 11:20-01/12/2018,31-8-1-1-05/12/2018 17:04-01/12/2018


","8900","Мухаметханов Рустем Ильясович","27400","Стационар","","26/11/2018 16:53","1-1,2-4","0","12800","01/12/2018 17:09","ТВ","","0","400"," Евгения","","0");
INSERT INTO patient VALUES("13","Каримов Венер Камилович","24/02/1962","8 (927) 346-3110","10-5-5-1-05/12/2018 16:54-04/12/2018,11-5-1-1-09/12/2018 18:09-04/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","04/12/2018 16:53","0","0","4200","04/12/2018 10:32"," знакомый","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("14","Федоров Алексей Николаевич","07/11/1975","8 (905) 181-9695","11-5-1-1-16/12/2018 14:28-04/12/2018,13-5-5-1-16/12/2018 14:28-04/12/2018","4900","Арсланов Азат Шамилевич","4900","Амбулатория","","04/12/2018 16:55","0","0","9800","04/12/2018 10:39","ТВ","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("15","Мухтаров Айрат Назирович","14/03/1969","8 (917) 464-3460","11-5-5-1-05/12/2018 16:58-05/12/2018,17-5-1-1-09/12/2018 18:11-05/12/2018","3900","Арсланов Азат Шамилевич","7800","Амбулатория","","05/12/2018 16:58","0","0","3900","05/12/2018 17:38","ТВ","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("17","Мардакин Евгений Александрович","03/08/1988","8 (952) 504-3681","10-5-5-1-05/12/2018 17:03-05/12/2018,11-5-1-1-09/12/2018 18:12-05/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","05/12/2018 17:02","0","0","4200","05/12/2018 17:44","ТВ","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("18","Ширяев Антон Владимирович","01/01/1980","","21-5-5-1-05/12/2018 17:07-05/12/2018","1000","Арсланов Азат Шамилевич","1000","Амбулатория","","05/12/2018 17:07","0","0","1000","05/12/2018 17:50","ТВ","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("19","Манукян Антон Олегович","24/07/1991","8 (917) 803-2808","10-5-5-1-05/12/2018 18:31-05/12/2018,11-5-1-1-09/12/2018 18:15-05/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","05/12/2018 18:30","0","0","4200","05/12/2018 17:52","ТВ","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("20","Рахимов Рустам Радикович","26/08/1985","8 (937) 833-1358","11-5-1-1-17/12/2018 15:13-06/12/2018,17-5-5-1-17/12/2018 15:14-06/12/2018","3900","Арсланов Азат Шамилевич","3900","Амбулатория","","06/12/2018 13:09","0","0","11700","06/12/2018 15:12","ТВ","","0","0","Анастасия","","0");
INSERT INTO patient VALUES("21","Ибрагимов Марат Рифкатович","25/05/1979","8 (927) 088-9193","10-5-5-1-07/12/2018 13:20-07/12/2018,11-5-1-1-09/12/2018 18:14-07/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","07/12/2018 13:19","0","0","4200","07/12/2018 15:16"," знакомый","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("23","Григорьев Сергей Ильич","31/10/1965","8 (917) 379-5757","11-5-1-1-17/12/2018 15:21-07/12/2018,17-5-5-1-17/12/2018 15:21-07/12/2018","3900","Арсланов Азат Шамилевич","3900","Амбулатория","","07/12/2018 14:07","0","0","7800","07/12/2018 15:21","ТВ","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("24","Степанов Владимир Геннадьевич","14/08/1959","8 (927) 351-7514","10-5-5-1-07/12/2018 14:44-07/12/2018,11-5-1-1-09/12/2018 18:14-07/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","07/12/2018 14:43","0","0","4200","07/12/2018 15:23","ТВ","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("25","Вершинин Сергей Вадимович","13/11/1970","8 (927) 239-3215","11-5-1-1-18/12/2018 14:40-07/12/2018,33-5-5-1-18/12/2018 14:40-07/12/2018-4000","4000","Арсланов Азат Шамилевич","4000","Амбулатория","","07/12/2018 17:16","0","0","1","07/12/2018 14:42"," самообращение","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("26","Салихкулов Ришат Уралович","31/08/1979","8 (927) 348-9304","10-5-5-1-08/12/2018 13:03-08/12/2018,11-5-12-1-18/12/2018 14:12-08/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","08/12/2018 13:02","0","0","4200","08/12/2018 14:12"," знакомый","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("29","Халимов Ильмир Хасанович","30/06/1988","8 (937) 150-9497","10-5-5-1-10/12/2018 14:22-08/12/2018,11-5-12-1-19/12/2018 8:20-08/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","08/12/2018 14:21","0","0","4200","08/12/2018 8:27","ТВ","","0","0","Анастасия","","0");
INSERT INTO patient VALUES("30","Мулюков Рустем Ирекович","10/10/1972","8 (917) 790-5031","10-5-5-1-10/12/2018 14:25-08/12/2018,11-5-12-1-19/12/2018 8:20-08/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","08/12/2018 14:24","0","0","4200","08/12/2018 8:28","ТВ","","0","0","Анастасия","","0");
INSERT INTO patient VALUES("31","Мельникова Лиля Салаватовна","28/02/1996","8 (987) 615-6754","10-5-5-1-10/12/2018 14:28-08/12/2018,11-5-12-1-19/12/2018 8:20-08/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","08/12/2018 14:27","0","0","4200","08/12/2018 8:29","ТВ","","0","0"," Яна","","0");
INSERT INTO patient VALUES("32","Нифантов Олег Михайлович","27/06/1970","8 (987) 141-8673","10-5-5-1-10/12/2018 14:30-09/12/2018,11-5-1-1-19/12/2018 9:29-09/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","09/12/2018 14:30","0","0","4200","09/12/2018 9:30","ТВ","","0","0","Анастасия","","0");
INSERT INTO patient VALUES("33","Барабанов Юрий Николаевич","27/07/1955","8 (917) 444-6652","10-5-5-1-10/12/2018 14:33-09/12/2018,11-5-1-1-19/12/2018 8:23-09/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","09/12/2018 14:32","0","0","4200","09/12/2018 8:31","ТВ","","0","0","Анастасия","","0");
INSERT INTO patient VALUES("34","Хаматгареев Динар Фанисович","09/12/2018","8 (917) 457-8278","11-5-1-1-19/12/2018 8:23-09/12/2018,17-5-5-1-10/12/2018 16:40-09/12/2018","3900","Арсланов Азат Шамилевич","3900","Амбулатория","","09/12/2018 16:39","0","0","3900","09/12/2018 8:31","ТВ","","0","0","Анастасия","","0");
INSERT INTO patient VALUES("35","Сафин Мударис Фавилович","10/03/1968","8 (901) 811-0075","10-5-5-1-10/12/2018 16:42-10/12/2018,11-5-1-1-19/12/2018 8:23-10/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","10/12/2018 16:41","0","0","4200","10/12/2018 8:32","ТВ","","0","0","Анастасия","","0");
INSERT INTO patient VALUES("36","Казакбаев Ильгам Рафаелевич","10/12/2018","8 (927) 931-0145","11-5-12-1-19/12/2018 8:21-10/12/2018,17-5-5-1-10/12/2018 16:44-10/12/2018","3900","Арсланов Азат Шамилевич","3900","Амбулатория","","10/12/2018 16:44","0","0","3900","10/12/2018 8:33","ТВ","","0","0"," Евгения","","0");
INSERT INTO patient VALUES("37","Саймулов Михаил Васильевич","10/02/1960","8 (919) 617-7610","11-5-12-1-19/12/2018 8:21-10/12/2018,17-5-5-1-10/12/2018 16:47-10/12/2018","3900","Арсланов Азат Шамилевич","3900","Амбулатория","","10/12/2018 16:46","0","0","3900","10/12/2018 8:34","ТВ","","0","0"," Яна","","0");
INSERT INTO patient VALUES("38","Картяева Анастасия Викторовна","10/10/1974","8 (888) 888-8888","26-5-5-1-10/12/2018 16:49-10/12/2018","2100","Арсланов Азат Шамилевич","2100","Амбулатория","","10/12/2018 16:48","0","0","2100","10/12/2018 8:35","ТВ"," Екат","0","0"," Яна","","0");
INSERT INTO patient VALUES("40","Галиев Тимур Ринатович","10/09/1982","8 (989) 956-4890","1-8-12-1-14/12/2018 8:34-29/11/2018,1-8-1-1-14/12/2018 8:33-30/11/2018,1-8-1-1-14/12/2018 8:33-01/12/2018,1-8-12-1-14/12/2018 8:34-02/12/2018,1-8-1-1-14/12/2018 8:33-28/11/2018,22-8-8-1-14/12/2018 8:46-28/11/2018,22-8-8-1-14/12/2018 8:46-29/11/2018,22-8-8-1-14/12/2018 8:46-30/11/2018","7700","Мухаметханов Рустем Ильясович","0","Стационар","","27/11/2018 8:25","1-1,2-4","0","7700","02/12/2018 8:47","ТВ","","0","403"," самообращение","","0");
INSERT INTO patient VALUES("42","Наушербанов Артур Салихович","08/09/1986","8 (917) 481-3748","1-5-12-1-14/12/2018 11:39-29/11/2018,1-5-1-1-14/12/2018 11:39-30/11/2018,1-5-1-1-14/12/2018 11:39-01/12/2018","3000","Арсланов Азат Шамилевич","19000","Стационар","","28/11/2018 11:32","4-2,3-1","0","3000","01/12/2018 11:40","ТВ","","0","404"," самообращение","","0");
INSERT INTO patient VALUES("43","Байжева Елена Владимировна","07/01/1967","8 (987) 259-4199","1-8-12-1-15/12/2018 5:25-29/11/2018,22-8-8-1-15/12/2018 4:56-29/11/2018,23-8-8-1-15/12/2018 4:56-29/11/2018,28-8-12-1-16/12/2018 16:20-29/11/2018,1-8-1-1-16/12/2018 16:18-30/11/2018,22-8-8-1-15/12/2018 4:57-30/11/2018,23-8-8-1-15/12/2018 5:08-30/11/2018,28-8-1-1-16/12/2018 16:18-30/11/2018,1-8-1-1-16/12/2018 16:18-01/12/2018,22-8-8-1-15/12/2018 4:58-01/12/2018,23-8-8-1-15/12/2018 4:59-01/12/2018,28-8-1-1-16/12/2018 16:18-01/12/2018,29-8-14-1-16/12/2018 16:09-01/12/2018,29-8-14-1-16/12/2018 16:21-02/12/2018,29-8-14-1-16/12/2018 16:21-03/12/2018,1-8-12-1-16/12/2018 16:20-02/12/2018,22-8-8-1-16/12/2018 16:16-02/12/2018,23-8-8-1-16/12/2018 16:16-02/12/2018,28-8-12-1-16/12/2018 16:20-02/12/2018,1-8-1-1-16/12/2018 16:18-03/12/2018,22-8-8-1-16/12/2018 16:17-03/12/2018,23-8-8-1-16/12/2018 16:16-03/12/2018,28-8-1-1-16/12/2018 16:19-03/12/2018,1-8-1-1-16/12/2018 16:19-04/12/2018,23-8-8-1-16/12/2018 16:22-04/12/2018,28-8-1-1-16/12/2018 16:19-04/12/2018,1-8-1-1-16/12/2018 16:19-05/12/2018,10-8-5-1-16/12/2018 16:21-05/12/2018,11-8-1-1-16/12/2018 16:19-05/12/2018,23-8-8-1-16/12/2018 16:17-05/12/2018,28-8-1-1-16/12/2018 16:19-05/12/2018","42150","Мухаметханов Рустем Ильясович","60150","Стационар","","28/11/2018 19:48","1-1,2-6","0","36400","05/12/2018 16:25","ТВ","","0","412"," самообращение","","0");
INSERT INTO patient VALUES("44","Салимгареев Виталий Салаевич","14/04/1970","8 (917) 756-7994","1-8-12-1-15/12/2018 5:26-29/11/2018,22-8-8-1-15/12/2018 5:20-29/11/2018,28-8-12-1-15/12/2018 5:26-29/11/2018,1-8-1-1-15/12/2018 5:27-30/11/2018,22-8-8-1-15/12/2018 5:21-30/11/2018,28-8-1-1-15/12/2018 5:27-30/11/2018,1-8-1-1-15/12/2018 5:27-01/12/2018,22-8-8-1-15/12/2018 5:22-01/12/2018,28-8-1-1-15/12/2018 5:27-01/12/2018,1-8-12-1-15/12/2018 5:26-02/12/2018,28-8-12-1-15/12/2018 5:26-02/12/2018","10700","Мухаметханов Рустем Ильясович","25900","Стационар","","28/11/2018 5:17","1-1,2-3","0","10700","02/12/2018 18:08","ТВ","","0","413"," самообращение","","0");
INSERT INTO patient VALUES("50","Чернов Алексей Васильевич","05/08/1980","8 (917) 450-5736","1-8-12-1-16/12/2018 19:00-29/11/2018,22-8-8-1-16/12/2018 18:58-29/11/2018,23-8-8-1-16/12/2018 18:58-29/11/2018,28-8-12-1-16/12/2018 19:00-29/11/2018,1-8-1-1-16/12/2018 19:00-30/11/2018,22-8-8-1-16/12/2018 18:58-30/11/2018,23-8-8-1-16/12/2018 18:58-30/11/2018,28-8-1-1-16/12/2018 19:00-30/11/2018,1-8-1-1-16/12/2018 19:00-01/12/2018,22-8-8-1-16/12/2018 18:58-01/12/2018,23-8-8-1-16/12/2018 18:58-01/12/2018,28-8-1-1-16/12/2018 19:01-01/12/2018,1-8-12-1-16/12/2018 19:00-02/12/2018,22-8-8-1-16/12/2018 18:58-02/12/2018,23-8-8-1-16/12/2018 18:58-02/12/2018,28-8-12-1-16/12/2018 19:00-02/12/2018,30-8-15-1-16/12/2018 18:59-02/12/2018,1-8-1-1-16/12/2018 19:01-03/12/2018,22-8-8-1-16/12/2018 18:58-03/12/2018,23-8-8-1-16/12/2018 18:58-03/12/2018,28-8-1-1-16/12/2018 19:01-03/12/2018,30-8-15-1-16/12/2018 19:05-03/12/2018","33500","Мухаметханов Рустем Ильясович","50750","Стационар","","28/11/2018 18:32","5-1,1-4","0","26750","03/12/2018 19:06","ТВ","","0","415"," самообращение","","0");
INSERT INTO patient VALUES("51","Шутов Игорь Анатольевич","24/07/1973","8 (917) 048-7307","1-8-1-1-16/12/2018 18:54-30/11/2018,1-8-1-1-16/12/2018 18:54-01/12/2018","2000","Мухаметханов Рустем Ильясович","10000","Стационар","","29/11/2018 18:50","1-1,2-1","0","2000","01/12/2018 18:54","ТВ","","0","416"," самообращение","","0");
INSERT INTO patient VALUES("52","Смирнов Дмитрий Борисович","09/04/1976","8 (917) 768-3505","1-8-1-1-16/12/2018 19:22-30/11/2018,1-8-1-1-16/12/2018 19:22-01/12/2018,1-8-12-1-16/12/2018 19:22-02/12/2018,30-8-15-1-16/12/2018 19:23-02/12/2018","6000","Мухаметханов Рустем Ильясович","17500","Стационар","","29/11/2018 19:19","1-1,2-2","0","6000","02/12/2018 19:25","ТВ","","0","417"," самообращение","","0");
INSERT INTO patient VALUES("53","Васильев Василий Васильевич","28/12/1979","","1-8-1-1-17/12/2018 7:40-30/11/2018,1-8-1-1-17/12/2018 7:40-01/12/2018,1-8-12-1-17/12/2018 7:39-02/12/2018,1-8-1-1-17/12/2018 7:40-03/12/2018,1-8-1-1-17/12/2018 7:40-04/12/2018,10-8-5-1-17/12/2018 7:40-04/12/2018,11-8-1-1-17/12/2018 7:40-04/12/2018","9200","Мухаметханов Рустем Ильясович","27700","Стационар","","29/11/2018 7:35","1-1,2-4","0","9200","04/12/2018 7:42","ТВ","","0","418"," самообращение","","0");
INSERT INTO patient VALUES("54","Юлдашбаев Загир Алимович","26/12/1977","8 (937) 310-3140","1-8-1-1-17/12/2018 8:51-01/12/2018,28-8-1-1-17/12/2018 8:51-01/12/2018,1-8-12-1-17/12/2018 8:51-02/12/2018,28-8-12-1-17/12/2018 8:51-02/12/2018,30-8-15-1-17/12/2018 8:51-02/12/2018","9000","Мухаметханов Рустем Ильясович","15000","Стационар","","30/11/2018 8:46","1-1,2-1","0","7000","02/12/2018 8:52","ТВ","","0","419"," самообращение","","0");
INSERT INTO patient VALUES("55","Хабиров Ринат Рашитович","25/07/1973","8 (987) 106-1994","1-8-1-1-17/12/2018 9:43-01/12/2018,1-8-1-1-17/12/2018 9:43-03/12/2018,1-8-12-1-17/12/2018 9:44-02/12/2018","3000","Мухаметханов Рустем Ильясович","46500","Стационар","","30/11/2018 9:38","1-1,2-2","0","3000","03/12/2018 9:44","ТВ"," Казань","0","420"," самообращение","","0");
INSERT INTO patient VALUES("56","Костин Сергей Викторович","19/03/1973","8 (917) 374-7239","1-8-1-1-18/12/2018 11:32-01/12/2018,28-8-1-1-18/12/2018 11:32-01/12/2018,1-8-12-1-18/12/2018 11:33-02/12/2018,28-8-12-1-18/12/2018 11:33-02/12/2018,1-8-1-1-18/12/2018 11:32-03/12/2018,8-8-1-1-18/12/2018 11:32-03/12/2018,28-8-1-1-18/12/2018 11:32-03/12/2018,1-8-1-1-18/12/2018 11:32-04/12/2018,28-8-1-1-18/12/2018 11:32-04/12/2018,1-8-1-1-18/12/2018 11:32-05/12/2018,8-8-1-1-18/12/2018 11:32-05/12/2018,28-8-1-1-18/12/2018 11:32-05/12/2018,30-8-15-1-18/12/2018 11:33-05/12/2018,1-8-1-1-18/12/2018 11:32-06/12/2018,24-8-16-1-18/12/2018 11:34-06/12/2018,28-8-1-1-18/12/2018 11:32-06/12/2018,1-8-1-1-18/12/2018 11:32-07/12/2018,17-8-5-1-18/12/2018 11:34-07/12/2018,24-8-16-1-18/12/2018 11:34-07/12/2018,28-8-1-1-18/12/2018 11:32-07/12/2018,30-8-15-1-18/12/2018 11:33-07/12/2018,31-8-1-1-18/12/2018 11:32-07/12/2018,24-8-16-1-18/12/2018 11:34-05/12/2018","35100","Мухаметханов Рустем Ильясович","60600","Стационар","","30/11/2018 9:39","1-1,2-6","0","35100","07/12/2018 11:37","ТВ","","0","421"," самообращение","","0");
INSERT INTO patient VALUES("58","Александров Александр Андреевич","04/11/1982","8 (965) 920-3043","10-5-5-1-18/12/2018 13:30-12/12/2018,11-5-1-1-19/12/2018 8:25-12/12/2018","4200","Арсланов Азат Шамилевич","8400","Амбулатория","","12/12/2018 13:25","0","0","4200","12/12/2018 8:37","ТВ","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("59","Хамаев Рустем Фанилевич","16/07/1987","8 (965) 663-6888","17-5-5-1-18/12/2018 13:32-12/12/2018,31-5-1-1-19/12/2018 9:29-12/12/2018","3900","Арсланов Азат Шамилевич","3900","Амбулатория","","12/12/2018 13:31","0","0","3900","12/12/2018 9:30","ТВ","","0","0","Анастасия","","0");
INSERT INTO patient VALUES("60","Акбашев Венер Фанилевич","02/01/1977","8 (917) 449-6334","10-5-5-1-18/12/2018 13:34-12/12/2018,11-5-1-1-19/12/2018 9:29-12/12/2018,20-5-5-1-18/12/2018 13:35-12/12/2018","6700","Арсланов Азат Шамилевич","6700","Амбулатория","","12/12/2018 13:33","0","0","6700","12/12/2018 9:31","ТВ","","0","0","Анастасия","","0");
INSERT INTO patient VALUES("61","Дударев Валерий Иванович","11/08/1956","8 (905) 357-3934","17-5-5-1-18/12/2018 13:36-13/12/2018,31-5-1-1-19/12/2018 8:25-13/12/2018","3900","Арсланов Азат Шамилевич","3900","Амбулатория","","13/12/2018 13:36","0","0","3900","12/12/2018 8:38","ТВ","","0","0"," Евгения","","0");
INSERT INTO patient VALUES("62","Шарипов Марат Магданурович","10/05/1955","8 (917) 445-6374","10-5-5-1-18/12/2018 13:38-13/12/2018,11-5-1-1-19/12/2018 8:25-13/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","13/12/2018 13:37","0","0","4200","13/12/2018 8:40","ТВ","","0","0","Анастасия","","0");
INSERT INTO patient VALUES("63","Исмагилов Юнир Равкатович","18/11/1987","8 (961) 050-8765","17-5-5-1-18/12/2018 13:40-13/12/2018,31-5-1-1-19/12/2018 8:25-13/12/2018","3900","Арсланов Азат Шамилевич","7800","Амбулатория","","13/12/2018 13:39","0","0","3900","13/12/2018 8:42","ТВ","","0","0","Анастасия","","0");
INSERT INTO patient VALUES("64","Ситдиков Раис Адхамович","04/02/1964","8 (927) 966-3273","11-5-1-1-19/12/2018 9:29-14/12/2018,33-5-5-1-19/12/2018 9:25-14/12/2018-4900","4900","Арсланов Азат Шамилевич","4900","Амбулатория","","14/12/2018 13:41","0","0","1","14/12/2018 9:32","Агенты"," Екат","0","0","Анастасия","","0");
INSERT INTO patient VALUES("65","Галяфутдинов Ильдар Гумерович","01/01/1985","8 (919) 151-3157","33-5-5-1-19/12/2018 9:29-14/12/2018-4000","4000","Арсланов Азат Шамилевич","4000","Амбулатория","","14/12/2018 13:43","0","0","2501","14/12/2018 9:33","ТВ","","0","0","Анастасия","","0");
INSERT INTO patient VALUES("66","Абдуллина Резида Ядкаровна","07/01/1966","8 (903) 352-0898","10-5-5-1-18/12/2018 13:45-14/12/2018,11-5-1-1-19/12/2018 8:25-14/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","14/12/2018 13:44","0","0","4200","14/12/2018 8:52","ТВ","","0","0","Анастасия","","0");
INSERT INTO patient VALUES("67","Шаяхметов Аскар Гарабшанович","27/05/1961","8 (937) 470-7335","17-5-5-1-18/12/2018 13:47-14/12/2018,31-5-1-1-19/12/2018 8:25-14/12/2018","3900","Арсланов Азат Шамилевич","3900","Амбулатория","","14/12/2018 13:46","0","0","3900","14/12/2018 8:53","ТВ","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("68","Фадеева Лиля Александровна","06/07/1979","8 (917) 771-9156","17-5-5-1-18/12/2018 13:49-15/12/2018,31-5-1-1-19/12/2018 8:25-15/12/2018","3900","Арсланов Азат Шамилевич","3900","Амбулатория","","15/12/2018 13:48","0","0","3900","15/12/2018 8:54","ТВ","","0","0"," Евгения","","0");
INSERT INTO patient VALUES("69","Якушев Валерий Владимирович","21/10/1974","8 (987) 488-2504","31-5-1-1-19/12/2018 9:29-17/12/2018,34-5-5-1-19/12/2018 9:29-17/12/2018-3700","3700","Арсланов Азат Шамилевич","3700","Амбулатория","","17/12/2018 13:50","0","0","1","17/12/2018 9:34"," знакомый","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("70","Колесников Андрей Сергеевич","08/09/1979","8 (987) 055-4174","10-5-5-1-18/12/2018 13:51-16/12/2018,11-5-1-1-19/12/2018 8:25-16/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","16/12/2018 13:51","0","0","4200","16/12/2018 8:55","ТВ","","0","0"," Ришат","","0");
INSERT INTO patient VALUES("71","Кабиров Венер Салихьянович","25/09/1973","8 (937) 337-3263","17-5-5-1-18/12/2018 13:53-16/12/2018,31-5-1-1-19/12/2018 8:25-16/12/2018","3900","Арсланов Азат Шамилевич","3900","Амбулатория","","16/12/2018 13:52","0","0","3900","16/12/2018 9:16","ТВ","","0","0","Анастасия","","0");
INSERT INTO patient VALUES("72","Лукманов Азат Ибрагимович","29/10/1968","8 (929) 257-5192","10-5-5-1-18/12/2018 13:54-17/12/2018,11-5-1-1-19/12/2018 8:26-17/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","17/12/2018 13:54","0","0","4200","17/12/2018 9:17","ТВ","","0","0","Анастасия","","0");
INSERT INTO patient VALUES("73","Набиев Альфред Фаритович","25/06/1974","8 (917) 415-1974","10-5-5-1-18/12/2018 13:56-17/12/2018,11-5-1-1-19/12/2018 8:26-17/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","17/12/2018 13:55","0","0","4200","17/12/2018 9:18"," интернет","","0","0"," Евгения","","0");
INSERT INTO patient VALUES("74","Шарипов Руслан Азатович","05/04/1977","","17-8-5-1-18/12/2018 14:15-06/12/2018,1-8-12-1-18/12/2018 14:15-02/12/2018,1-8-1-1-18/12/2018 14:16-03/12/2018","7900","Мухаметханов Рустем Ильясович","23400","Стационар","","01/12/2018 13:56","2-5","0","5900","06/12/2018 14:18","ТВ","","0","423"," самообращение","","0");
INSERT INTO patient VALUES("75","Ульябаев Ильмир Нуруллович","19/05/1983","8 (987) 105-7187","17-5-5-1-18/12/2018 13:57-17/12/2018,31-5-1-1-19/12/2018 8:26-17/12/2018","3900","Арсланов Азат Шамилевич","3900","Амбулатория","","17/12/2018 13:57","0","0","3900","17/12/2018 9:19"," интернет","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("77","Аврамчук Руслан Ананьевич","03/05/1971","","1-8-12-1-18/12/2018 16:34-02/12/2018,22-8-8-1-18/12/2018 16:32-02/12/2018,28-8-12-1-18/12/2018 16:34-02/12/2018,1-8-1-1-18/12/2018 16:33-03/12/2018,22-8-8-1-18/12/2018 16:32-03/12/2018,28-8-1-1-18/12/2018 16:33-03/12/2018,1-8-1-1-18/12/2018 16:33-04/12/2018,22-8-8-1-18/12/2018 16:32-04/12/2018,23-8-8-1-18/12/2018 16:32-04/12/2018,24-8-16-1-18/12/2018 16:34-04/12/2018,28-8-1-1-18/12/2018 16:33-04/12/2018,1-8-1-1-18/12/2018 16:33-05/12/2018,22-8-8-1-18/12/2018 16:32-05/12/2018,23-8-8-1-18/12/2018 16:32-05/12/2018,24-8-16-1-18/12/2018 16:34-05/12/2018,28-8-1-1-18/12/2018 16:33-05/12/2018","15700","Мухаметханов Рустем Ильясович","75400","Стационар","","01/12/2018 16:05","3-2,4-2","0","15700","05/12/2018 16:35","Агенты","Скорая помощь","0","424"," самообращение","","0");
INSERT INTO patient VALUES("78","Давлетгареев Радик Лябибович","31/12/1984","","","0","Мухаметханов Рустем Ильясович","3500","Стационар","","01/12/2018 16:39","2-1","0","0","02/12/2018 16:44","Агенты"," Тимур Мусин","0","425"," самообращение","","0");
INSERT INTO patient VALUES("80","Магиярова Алина Анисовна","09/09/1962","8 (917) 048-2134","1-8-1-1-19/12/2018 10:44-16/12/2018,1-8-1-1-19/12/2018 10:44-17/12/2018,1-8-1-1-19/12/2018 10:44-18/12/2018,1-8-1-1-19/12/2018 14:04-19/12/2018,1-8-1-1-20/12/2018 12:47-20/12/2018,10-8-5-1-20/12/2018 13:45-20/12/2018,11-8-1-1-20/12/2018 12:47-20/12/2018","9200","Мухаметханов Рустем Ильясович","27700","Стационар","","15/12/2018 9:36","1-1,2-4","0","9200","20/12/2018 13:53","ТВ","","0","491"," самообращение","","7");
INSERT INTO patient VALUES("81","Сулейманов Айрат Тамасович","21/03/1970","","22-1-1-1-19/12/2018 10:45-17/12/2018,23-1-1-1-19/12/2018 10:45-17/12/2018,28-1-1-1-19/12/2018 10:45-17/12/2018,8-1-1-1-19/12/2018 10:45-18/12/2018,1-8-1-1-19/12/2018 10:45-17/12/2018,1-8-1-1-19/12/2018 10:45-18/12/2018,22-8-8-1-19/12/2018 9:46-18/12/2018,23-8-8-1-19/12/2018 9:47-18/12/2018,28-8-1-1-19/12/2018 10:45-18/12/2018,1-8-1-1-19/12/2018 14:04-19/12/2018,22-8-8-1-19/12/2018 10:46-19/12/2018,23-8-8-1-19/12/2018 10:46-19/12/2018,28-8-1-1-19/12/2018 14:04-19/12/2018,24-16-16-1-19/12/2018 12:03-18/12/2018,24-16-16-1-19/12/2018 12:03-19/12/2018","17450","Мухаметханов Рустем Ильясович","33450","Стационар","","16/12/2018 9:38","3-1,4-2","0","17450","19/12/2018 15:01"," самообращение","","0","498"," самообращение","","0");
INSERT INTO patient VALUES("82","Мирошникова Юлия Владимировна","18/04/1978","8 (937) 353-9673","","0","Мухаметханов Рустем Ильясович","10500","Стационар","","17/12/2018 9:48","2-3","0","0","20/12/2018 16:33","ТВ","","0","499"," самообращение","","13");
INSERT INTO patient VALUES("83","Шарафисламов Рафаэль Радикович","03/04/1977","8 (917) 366-0110","22-17-17-1-19/12/2018 10:02-18/12/2018,1-8-1-1-19/12/2018 10:47-18/12/2018,1-8-1-1-19/12/2018 14:05-19/12/2018,22-8-8-1-19/12/2018 10:03-19/12/2018","3800","Мухаметханов Рустем Ильясович","11800","Стационар","","17/12/2018 9:51","1-1,2-1","0","3800","19/12/2018 16:08"," интернет","","0","503"," самообращение","","0");
INSERT INTO patient VALUES("84","Юлаев Ришат Нареевич","12/01/1964","8 (917) 363-5558","1-8-1-1-19/12/2018 10:47-18/12/2018,28-8-1-1-19/12/2018 10:47-18/12/2018,1-8-1-1-19/12/2018 14:05-19/12/2018,1-8-1-1-20/12/2018 12:47-20/12/2018","4000","Мухаметханов Рустем Ильясович","15500","Стационар","","17/12/2018 9:52","1-1,2-1,2-1","0","4000","20/12/2018 16:31","ТВ","","0","504"," Евгения","","8");
INSERT INTO patient VALUES("85","Нуриев Ринат Маратович","27/10/1993","8 (917) 413-0448","22-17-17-1-19/12/2018 9:55-18/12/2018,1-8-1-1-19/12/2018 14:05-19/12/2018,22-8-8-1-19/12/2018 10:12-19/12/2018,28-8-1-1-19/12/2018 14:05-19/12/2018,1-8-1-1-19/12/2018 10:47-18/12/2018,28-17-1-1-19/12/2018 10:47-18/12/2018,1-8-1-1-20/12/2018 12:47-20/12/2018,28-8-1-1-20/12/2018 12:47-20/12/2018,1-8-1-1-21/12/2018 12:35-21/12/2018,22-8-8-1-21/12/2018 9:59-21/12/2018,1-8-1-1-22/12/2018 14:31-22/12/2018","13600","Мухаметханов Рустем Ильясович","29200","Стационар","","17/12/2018 9:52","1-1,2-2,2-1,2-1","0","11700","22/12/2018 14:33"," самообращение","","0","505"," Евгения","","4");
INSERT INTO patient VALUES("86","Демидова Юлия Григорьевна","19/02/1972","","23-17-17-1-19/12/2018 9:54-18/12/2018,1-8-1-1-19/12/2018 10:48-18/12/2018","1850","Мухаметханов Рустем Ильясович","39350","Стационар","","18/12/2018 9:53","3-1","0","1850","19/12/2018 12:07"," повтор","","0","506"," самообращение","","6");
INSERT INTO patient VALUES("87","Иванов Вадим Анатольевич","31/03/1983","8 (905) 307-1881","1-8-1-1-19/12/2018 14:05-19/12/2018","1000","Мухаметханов Рустем Ильясович","8000","Стационар","","18/12/2018 10:00","2-2","0","1000","20/12/2018 18:12","ТВ","","0","509"," самообращение","","15");
INSERT INTO patient VALUES("88","Ахмадеев Ильдар Тагирович","03/11/1976","8 (917) 768-8053","1-8-1-1-19/12/2018 14:05-19/12/2018,28-8-1-1-19/12/2018 14:05-19/12/2018,1-8-1-1-20/12/2018 12:47-20/12/2018,1-8-1-1-21/12/2018 12:35-21/12/2018,1-8-1-1-22/12/2018 11:47-22/12/2018,1-8-12-1-23/12/2018 11:39-23/12/2018","6000","Мухаметханов Рустем Ильясович","24500","Стационар","","18/12/2018 10:01","1-1,2-4","0","6000","23/12/2018 11:38","ТВ","","0","510"," самообращение","","5");
INSERT INTO patient VALUES("91","Сафиханов Ильфат Хамитович","01/01/1972","8 (927) 947-1060","1-8-1-1-20/12/2018 12:48-20/12/2018","1000","Мухаметханов Рустем Ильясович","11500","Стационар","","19/12/2018 11:54","2-3","0","1000","22/12/2018 14:07","Агенты"," Кавказская","0","511","Анастасия","","15");
INSERT INTO patient VALUES("92","Талашманов Денис Викторович","01/06/1990","8 (937) 830-9456","10-5-5-1-19/12/2018 12:39-19/12/2018,11-5-1-1-19/12/2018 14:03-19/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","19/12/2018 12:38","0","0","4200","19/12/2018 15:02","ТВ","","0","0","Анастасия","","0");
INSERT INTO patient VALUES("93","Иштуганов Руслан Тагирович","19/03/1986","8 (917) 490-0001","1-8-1-1-20/12/2018 12:48-20/12/2018,1-8-1-1-21/12/2018 12:35-21/12/2018,","4000","Мухаметханов Рустем Ильясович","11000","Стационар","","19/12/2018 12:48","1-1,2-1","0","2000","21/12/2018 14:12","ТВ","","0","512"," самообращение","","3");
INSERT INTO patient VALUES("94","Пирогов С.Н.","27/02/1958","","20-8-8-1-19/12/2018 15:06-19/12/2018","2500","Мухаметханов Рустем Ильясович","2500","Амбулатория","","19/12/2018 12:56","0","0","2500","19/12/2018 15:06"," повтор","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("95","Ковалёв Виктор Юрьевич","04/12/1975","8 (951) 528-7282","11-5-1-1-19/12/2018 14:03-19/12/2018,13-5-5-1-19/12/2018 13:15-19/12/2018","4900","Арсланов Азат Шамилевич","4900","Амбулатория","","19/12/2018 13:14","0","0","4900","19/12/2018 15:03","ТВ","","0","0","Анастасия","","0");
INSERT INTO patient VALUES("96","Габрилян","02/02/1975","","1-8-1-1-19/12/2018 14:04-19/12/2018,8-8-1-1-19/12/2018 14:04-19/12/2018,28-8-1-1-19/12/2018 14:04-19/12/2018","5800","Мухаметханов Рустем Ильясович","5800","Амбулатория","","19/12/2018 13:33","0","0","5800","19/12/2018 14:28"," повтор","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("102","Гайсин Ильгиз Фаилович","05/10/1986","8 (987) 255-7835","8-1-1-1-19/12/2018 14:43-19/12/2018,8-1-1-1-21/12/2018 12:34-21/12/2018","11400","Урманов Тимур Радикович","19000","Амбулатория","","19/12/2018 14:02","0","0","15200","19/12/2018 12:52"," интернет","","0","1","Анастасия","","0");
INSERT INTO patient VALUES("104","Фролов Станислав Викторович","06/03/1982","8 (917) 737-5495","17-5-5-1-19/12/2018 14:47-19/12/2018,31-5-1-1-19/12/2018 15:02-19/12/2018","3900","Арсланов Азат Шамилевич","3900","Амбулатория","","19/12/2018 14:45","0","0","3900","19/12/2018 15:03"," повтор","","0","0","Анастасия","","0");
INSERT INTO patient VALUES("105","Юзлекбаева Фануза Ахатовна","23/05/1966","8 (917) 455-4580","17-5-5-1-19/12/2018 14:53-19/12/2018,31-5-1-1-19/12/2018 15:02-19/12/2018","3900","Арсланов Азат Шамилевич","3900","Амбулатория","","19/12/2018 14:53","0","0","3900","19/12/2018 15:03"," повтор","","0","0"," Яна","","0");
INSERT INTO patient VALUES("106","Сахибгареева Инна Асляховна","01/01/1995","","21-5-5-1-19/12/2018 14:57-19/12/2018","1000","Арсланов Азат Шамилевич","1000","Амбулатория","","19/12/2018 14:56","0","0","1000","19/12/2018 14:57"," интернет","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("107","Смойлин А.В.","17/08/1976","8 (927) 345-6789","20-1-1-1-19/12/2018 16:36-19/12/2018,22-1-1-1-19/12/2018 16:36-19/12/2018","3400","Урманов Тимур Радикович","3400","Амбулатория","","19/12/2018 16:34","0","0","3400","19/12/2018 16:40"," повтор","","0","0"," Яна","","0");
INSERT INTO patient VALUES("108","Дисперов П.А.","21/02/1980","","20-8-8-1-20/12/2018 9:37-20/12/2018","2500","Мухаметханов Рустем Ильясович","2500","Амбулатория","","20/12/2018 9:37","0","0","2500","20/12/2018 11:10"," повтор","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("109","Ахметов А.В.","08/04/1949","","20-8-8-1-20/12/2018 12:06-20/12/2018","2500","Мухаметханов Рустем Ильясович","2500","Амбулатория","","20/12/2018 11:57","0","0","2500","20/12/2018 15:46","ТВ","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("110","Кильдияров Алмаз Рифович","21/07/1975","8 (917) 771-7701","1-8-1-1-21/12/2018 12:35-21/12/2018,1-8-1-1-22/12/2018 11:48-22/12/2018,29-8-14-1-22/12/2018 14:32-22/12/2018","4000","Мухаметханов Рустем Ильясович","12000","Стационар","","20/12/2018 12:00","1-1,2-1","0","4000","22/12/2018 14:33","ТВ","","0","513"," Евгения","","8");
INSERT INTO patient VALUES("111","Демидова Юлия Григорьевна","19/02/1972","8 (919) 156-6688","1-8-1-1-21/12/2018 12:35-21/12/2018,28-8-1-1-21/12/2018 12:35-21/12/2018,1-8-1-1-22/12/2018 11:48-22/12/2018,28-8-1-1-22/12/2018 11:48-22/12/2018","4000","Мухаметханов Рустем Ильясович","39350","Стационар","","20/12/2018 12:42","6-1,7-1","0","4000","22/12/2018 14:33"," повтор","","0","514"," Евгения","","6");
INSERT INTO patient VALUES("112","Хамматов Рушат Анварович","04/03/1972","8 (964) 956-6464","1-8-1-1-21/12/2018 12:36-21/12/2018,22-8-8-1-21/12/2018 10:01-21/12/2018,23-8-8-1-21/12/2018 10:01-21/12/2018,28-8-1-1-21/12/2018 12:35-21/12/2018,1-8-1-1-22/12/2018 11:48-22/12/2018,22-8-8-1-22/12/2018 14:34-22/12/2018,23-8-8-1-22/12/2018 14:34-22/12/2018,28-8-1-1-22/12/2018 11:48-22/12/2018","7500","Мухаметханов Рустем Ильясович","15500","Стационар","","20/12/2018 13:35","1-1,2-1","0","8500","22/12/2018 14:35","ТВ","","0","515"," Яна","","1");
INSERT INTO patient VALUES("113","Исламов Рамиз Замирович","26/01/1982","8 (917) 388-5264","10-5-5-1-20/12/2018 13:47-20/12/2018,11-5-1-1-20/12/2018 13:54-20/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","20/12/2018 13:46","0","0","4200","20/12/2018 15:46","ТВ","","0","0"," Евгения","","0");
INSERT INTO patient VALUES("114","Гизатуллин Аскат Рахметович","01/03/1956","8 (937) 368-6088","10-5-5-1-20/12/2018 13:49-20/12/2018,11-5-1-1-20/12/2018 13:54-20/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","20/12/2018 13:48","0","0","4200","20/12/2018 15:46"," повтор","","0","0"," Евгения","","0");
INSERT INTO patient VALUES("115","Калимуллин Альберт Викторович","23/09/1961","8 (987) 037-2414","10-5-5-1-20/12/2018 14:43-20/12/2018,11-5-1-1-20/12/2018 14:43-20/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","20/12/2018 14:42","0","0","4200","20/12/2018 15:46"," повтор","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("116","Каленьтьев Леонид Викторович","16/02/1960","","1-8-1-1-22/12/2018 11:48-21/12/2018","1000","Мухаметханов Рустем Ильясович","15000","Стационар","","20/12/2018 16:31","2-3,2-1","0","1000","24/12/2018 11:21","ТВ","","0","516"," самообращение","","15");
INSERT INTO patient VALUES("117","Вахитов Рафаэь Тимурович","21/12/1985","8 (987) 131-0913","1-8-1-1-21/12/2018 12:37-21/12/2018,22-8-8-1-21/12/2018 10:01-21/12/2018,23-8-8-1-21/12/2018 10:01-21/12/2018,28-8-1-1-21/12/2018 12:37-21/12/2018,","7500","Мухаметханов Рустем Ильясович","8250","Стационар","","20/12/2018 22:12","1-1","0","3750","21/12/2018 10:44","Агенты"," Баязов","0","517"," самообращение","","7");
INSERT INTO patient VALUES("118","Ефремов Алексей Николаевич","13/09/1976","8 (927) 928-8884","1-8-1-1-21/12/2018 12:41-21/12/2018,28-8-1-1-21/12/2018 12:41-21/12/2018","2000","Мухаметханов Рустем Ильясович","6500","Стационар","","20/12/2018 23:24","1-1","0","2000","21/12/2018 14:34","Агенты"," Баязов","0","518"," самообращение","","7");
INSERT INTO patient VALUES("119","Максютов И.З.","12/09/1979","","20-8-8-1-21/12/2018 10:01-21/12/2018,23-8-8-1-21/12/2018 10:01-21/12/2018","3350","Мухаметханов Рустем Ильясович","3350","Амбулатория","","21/12/2018 7:45","0","0","3350","21/12/2018 10:42","ТВ","","0","0","Анастасия","","0");
INSERT INTO patient VALUES("120","Чупраков Анатолий Павлович","07/03/1976","8 (917) 349-1251","1-8-1-1-21/12/2018 12:41-21/12/2018","1000","Мухаметханов Рустем Ильясович","5500","Стационар","","21/12/2018 7:55","1-1","0","1000","22/12/2018 13:43"," повтор","","0","519"," самообращение","","3");
INSERT INTO patient VALUES("121","Спиридонов Алексей Юрьевич","16/01/1988","8 (917) 403-4050","1-8-1-1-21/12/2018 12:41-21/12/2018,28-8-1-1-21/12/2018 12:41-21/12/2018,1-8-1-1-22/12/2018 11:49-22/12/2018,28-8-1-1-22/12/2018 11:49-22/12/2018,","6000","Мухаметханов Рустем Ильясович","30500","Стационар","","21/12/2018 10:43","1-1","0","4000","22/12/2018 10:46"," повтор","","0","520"," Евгения","","5");
INSERT INTO patient VALUES("122","Абрамов Олег Олегович","25/07/1992","8 (917) 047-7026","17-5-5-1-21/12/2018 12:45-21/12/2018,31-5-1-1-21/12/2018 12:53-21/12/2018","3900","Арсланов Азат Шамилевич","3900","Амбулатория","","21/12/2018 12:44","0","0","3900","21/12/2018 13:00","ТВ","","0","0"," Евгения","","0");
INSERT INTO patient VALUES("123","Ахтамьянов Артур Салаватович","18/06/1983","8 (965) 653-5399","10-5-5-1-21/12/2018 13:23-21/12/2018,11-5-1-1-21/12/2018 13:40-21/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","21/12/2018 13:22","0","0","4200","21/12/2018 13:44","ТВ","","0","0"," Яна","","0");
INSERT INTO patient VALUES("124","Сидоров Николай Николаевич","25/05/1966","8 (937) 355-9542","10-5-5-1-21/12/2018 14:20-21/12/2018,11-5-1-1-21/12/2018 14:23-21/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","21/12/2018 14:19","0","0","4200","21/12/2018 15:18","ТВ","","0","0"," Яна","","0");
INSERT INTO patient VALUES("125","Змазнев Максим Владимирович","01/03/1991","8 (927) 934-8751","10-5-5-1-21/12/2018 14:52-21/12/2018,11-5-1-1-21/12/2018 14:53-21/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","21/12/2018 14:51","0","0","4200","21/12/2018 15:17"," знакомый","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("126","Гагарин Виктор Павлович","18/08/1955","8 (917) 739-2286","1-8-1-1-22/12/2018 11:49-22/12/2018,10-8-5-1-26/12/2018 16:03-26/12/2018,11-8-1-1-26/12/2018 15:27-26/12/2018","5200","Мухаметханов Рустем Ильясович","22700","Стационар","","21/12/2018 15:18","2-3,2-2","0","5200","26/12/2018 16:36"," повтор","","0","521"," Евгения","","13");
INSERT INTO patient VALUES("127","Волков Олег Геннадьевич","08/04/1978","8 (917) 436-3716","1-8-1-1-22/12/2018 11:49-22/12/2018,22-8-8-1-23/12/2018 12:14-22/12/2018,23-8-8-1-23/12/2018 12:14-22/12/2018,1-8-12-1-23/12/2018 13:19-23/12/2018,22-8-8-1-23/12/2018 12:14-23/12/2018,23-8-8-1-23/12/2018 12:14-23/12/2018,1-8-1-1-24/12/2018 10:02-24/12/2018,22-8-8-1-25/12/2018 11:21-24/12/2018,23-8-8-1-25/12/2018 11:21-24/12/2018","8250","Мухаметханов Рустем Ильясович","19750","Стационар","","21/12/2018 16:51","1-1,2-2","0","8250","24/12/2018 11:22","ТВ","","0","522"," самообращение","","3");
INSERT INTO patient VALUES("128","Александров Владимир Викторович","02/12/1981","8 (965) 932-1222","10-5-5-1-21/12/2018 18:29-21/12/2018,11-5-1-1-22/12/2018 13:46-21/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","21/12/2018 18:27","0","0","4200","21/12/2018 14:17"," самообращение","","0","0"," Евгения","","0");
INSERT INTO patient VALUES("129","Лысенков Олег Юрьевич","31/07/1970","","1-8-1-1-22/12/2018 13:46-22/12/2018","1000","Мухаметханов Рустем Ильясович","5500","Стационар","","22/12/2018 1:17","1-1","0","1000","23/12/2018 10:50","Агенты"," Васильев","0","523"," самообращение","","1");
INSERT INTO patient VALUES("130","Опойков Александр Геннадьевич","18/09/1986","8 (937) 355-9686","1-8-1-1-22/12/2018 13:45-22/12/2018,1-8-12-1-23/12/2018 13:19-23/12/2018,1-8-1-1-24/12/2018 10:02-24/12/2018","3000","Мухаметханов Рустем Ильясович","14500","Стационар","","22/12/2018 1:25","1-1","0","3000","23/12/2018 11:22","ТВ","","0","524"," самообращение","","3");
INSERT INTO patient VALUES("131","Давлетов Венер Мунавирович","04/08/1964","","1-8-1-1-22/12/2018 13:45-22/12/2018","1000","Мухаметханов Рустем Ильясович","5500","Стационар","","22/12/2018 2:54","1-1","0","1000","23/12/2018 10:50","ТВ","","0","525"," самообращение","","7");
INSERT INTO patient VALUES("132","Низамов Ильгиз Венерович","17/10/1980","8 (987) 621-4000","33-5-5-1-22/12/2018 10:28-22/12/2018-4900,11-5-1-1-22/12/2018 11:50-22/12/2018","4900","Арсланов Азат Шамилевич","4900","Амбулатория","","22/12/2018 10:26","0","0","1","22/12/2018 14:18","ТВ","","0","0"," Евгения","","0");
INSERT INTO patient VALUES("133","Халитов Раид Рашитович","05/11/1979","8 (905) 001-1400","10-5-5-1-22/12/2018 12:40-22/12/2018,11-5-1-1-22/12/2018 12:48-22/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","22/12/2018 12:38","0","0","4200","22/12/2018 14:18","ТВ","","0","0"," Евгения","","0");
INSERT INTO patient VALUES("134","Сулейманов Радик Тагирович","24/08/1979","8 (917) 761-0214","17-5-5-1-22/12/2018 12:42-22/12/2018,31-5-1-1-22/12/2018 12:48-22/12/2018","3900","Арсланов Азат Шамилевич","3900","Амбулатория","","22/12/2018 12:41","0","0","3900","22/12/2018 14:18","ТВ","","0","0"," Евгения","","0");
INSERT INTO patient VALUES("135","Усманов Иван Иванович","01/01/1979","","21-5-5-1-22/12/2018 14:32-22/12/2018","1000","Арсланов Азат Шамилевич","1000","Амбулатория","","22/12/2018 14:31","0","0","1000","22/12/2018 14:51"," повтор","","0","0"," Евгения","","0");
INSERT INTO patient VALUES("136","Шаров Олег Борисович","10/08/1969","","1-8-12-1-23/12/2018 13:19-23/12/2018","1000","Мухаметханов Рустем Ильясович","5500","Стационар","","22/12/2018 9:14","1-1","0","1000","23/12/2018 11:24"," повтор","","0","526"," самообращение","","0");
INSERT INTO patient VALUES("137","Исламов Радик Какзиевич","09/08/1962","8 (891) 745-3215","1-8-12-1-23/12/2018 13:19-23/12/2018,22-8-8-1-23/12/2018 10:42-23/12/2018,28-8-12-1-23/12/2018 13:19-23/12/2018,22-8-8-1-25/12/2018 11:26-23/12/2018","3800","Мухаметханов Рустем Ильясович","8300","Стационар","","22/12/2018 9:15","1-1","0","3800","23/12/2018 11:26","ТВ","","0","527"," Ришат","","3");
INSERT INTO patient VALUES("138","Епифанов Константин Викторович","28/09/1971","8 (961) 368-3690","10-5-5-1-23/12/2018 15:00-23/12/2018,11-5-1-1-26/12/2018 10:52-23/12/2018","4200","Арсланов Азат Шамилевич","8400","Амбулатория","","23/12/2018 14:58","0","0","4200","23/12/2018 10:53","ТВ","","0","0"," Евгения","","0");
INSERT INTO patient VALUES("139","Сорокин Николай Владимирович","12/09/1968","8 (917) 422-9717","10-5-5-1-23/12/2018 15:01-23/12/2018,11-5-1-1-26/12/2018 10:52-23/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","23/12/2018 15:00","0","0","4200","23/12/2018 10:53","ТВ","","0","0","Анастасия","","0");
INSERT INTO patient VALUES("140","Байтимиров Тимур Рамилевич","29/12/1972","8 (919) 151-8395","11-5-1-1-26/12/2018 10:52-23/12/2018,14-5-5-1-23/12/2018 15:03-23/12/2018","5700","Арсланов Азат Шамилевич","5700","Амбулатория","","23/12/2018 15:02","0","0","5700","23/12/2018 10:53"," интернет","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("141","Шибанов Максим Николаевич","04/02/1979","8 (987) 595-5768","17-5-5-1-23/12/2018 15:05-23/12/2018,31-5-1-1-26/12/2018 10:53-23/12/2018","3900","Арсланов Азат Шамилевич","3900","Амбулатория","","23/12/2018 15:04","0","0","3900","23/12/2018 10:54","ТВ","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("142","Гладских Алла Юрьевна","21/05/1995","8 (917) 040-7403","1-5-1-1-24/12/2018 12:33-24/12/2018,1-5-1-1-25/12/2018 14:34-25/12/2018,1-5-1-1-26/12/2018 13:38-26/12/2018,1-5-1-1-27/12/2018 12:11-27/12/2018,1-5-1-1-28/12/2018 13:29-28/12/2018,29-8-19-1-28/12/2018 15:04-28/12/2018,30-8-15-1-28/12/2018 15:03-28/12/2018,37-8-8-1-28/12/2018 14:58-28/12/2018-11500,29-8-19-1-28/12/2018 15:04-27/12/2018,24-8-16-1-28/12/2018 15:06-27/12/2018,24-8-16-1-28/12/2018 15:06-28/12/2018","25900","Арсланов Азат Шамилевич","44400","Стационар","","23/12/2018 15:35","1-1,2-1,2-1,2-1,2-1","0","14401","28/12/2018 15:06","ТВ","","0","528"," самообращение","","2");
INSERT INTO patient VALUES("143","Архипов Александр Сергеевич","30/10/1989","8 (917) 340-4158","1-1-1-1-25/12/2018 10:20-25/12/2018","1000","Мухаметханов Рустем Ильясович","18500","Стационар","","24/12/2018 12:15","2-5","0","1000","29/12/2018 10:40"," повтор","","0","529"," самообращение","","13");
INSERT INTO patient VALUES("144","Мухаметгалиев Илдар Мунирович","27/02/1984","8 (917) 437-8529","1-1-1-1-24/12/2018 12:21-24/12/2018,1-8-1-1-25/12/2018 12:09-25/12/2018,1-8-1-1-26/12/2018 13:38-26/12/2018,-----","7550","Мухаметханов Рустем Ильясович","15000","Стационар","","23/12/2018 12:20","1-1,2-1,8-1","0","4700","26/12/2018 10:20","ТВ","","0","530","Анастасия","","4");
INSERT INTO patient VALUES("145","Саркеев Игорь Байрамолович","13/08/1966","8 (961) 343-6350","1-1-1-1-24/12/2018 12:22-24/12/2018,1-8-1-1-25/12/2018 12:08-25/12/2018,24-8-16-1-26/12/2018 10:49-25/12/2018,24-8-16-1-26/12/2018 10:49-24/12/2018","4400","Мухаметханов Рустем Ильясович","12400","Стационар","","23/12/2018 12:22","1-1,2-1","0","4400","25/12/2018 10:49","ТВ","","0","531"," Евгения","","8");
INSERT INTO patient VALUES("146","Исмагилов Рустам Хабибьянович","19/07/1983","8 (987) 147-0200","1-1-1-1-24/12/2018 12:24-24/12/2018,1-8-1-1-25/12/2018 12:08-25/12/2018,22-8-8-1-25/12/2018 11:42-25/12/2018,23-8-8-1-25/12/2018 11:42-25/12/2018,1-8-1-1-26/12/2018 13:38-26/12/2018,22-8-8-1-26/12/2018 15:52-26/12/2018,23-8-8-1-26/12/2018 15:52-26/12/2018,29-8-14-1-26/12/2018 15:53-26/12/2018,,22-8-8-1-26/12/2018 15:56-24/12/2018,23-8-8-1-26/12/2018 15:56-24/12/2018","15750","Мухаметханов Рустем Ильясович","21750","Стационар","","23/12/2018 12:23","1-1,2-2","0","10250","26/12/2018 17:36","ТВ","","0","532","Анастасия","","4");
INSERT INTO patient VALUES("147","Демидова Юлия Григорьевна","19/02/1972","","1-1-1-1-24/12/2018 12:25-24/12/2018,1-8-1-1-25/12/2018 12:08-25/12/2018,1-8-1-1-26/12/2018 13:38-26/12/2018","3000","Мухаметханов Рустем Ильясович","39350","Стационар","","23/12/2018 12:25","1-1,2-1,2-1","0","3000","26/12/2018 10:21"," повтор","","0","533"," самообращение","","1");
INSERT INTO patient VALUES("148","Нигматуллин Алик Ахатович","26/09/1969","8 (917) 764-7009","17-5-5-1-24/12/2018 13:47-24/12/2018,31-5-1-1-24/12/2018 13:51-24/12/2018","3900","Арсланов Азат Шамилевич","3900","Амбулатория","","24/12/2018 13:46","0","0","3900","24/12/2018 13:56"," знакомый","","0","0","Анастасия","","0");
INSERT INTO patient VALUES("149","Скорняков Юрий Владимирович","17/06/1966","8 (917) 099-1278","10-5-5-1-24/12/2018 13:50-24/12/2018,11-5-1-1-24/12/2018 13:51-24/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","24/12/2018 13:48","0","0","4200","24/12/2018 13:56"," знакомый","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("150","Шахов Алексей Иванович","07/11/1954","8 (917) 409-4746","1-1-1-1-25/12/2018 12:08-25/12/2018,22-1-1-1-25/12/2018 12:08-25/12/2018,23-1-1-1-25/12/2018 12:08-25/12/2018,28-1-1-1-25/12/2018 12:08-25/12/2018,","5750","Мухаметханов Рустем Ильясович","8250","Стационар","","24/12/2018 13:50","1-1","0","3750","25/12/2018 10:46","ТВ","","0","534"," Евгения","","0");
INSERT INTO patient VALUES("151","Дудина Наталья Ильинична","02/03/1958","8 (917) 746-9656","10-5-5-1-24/12/2018 13:52-24/12/2018,11-5-1-1-24/12/2018 13:53-24/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","24/12/2018 13:51","0","0","4200","24/12/2018 13:56"," интернет","","0","0"," Евгения","","0");
INSERT INTO patient VALUES("152","Хаертдинов Ильгиз Равилович","07/08/1979","","1-8-1-1-25/12/2018 12:08-25/12/2018","1000","Мухаметханов Рустем Ильясович","5500","Стационар","","24/12/2018 19:21","1-1","0","1000","25/12/2018 12:12"," повтор","","0","535"," самообращение","","3");
INSERT INTO patient VALUES("153","Фатхутдинов Наиль Камилович","23/02/1961","","1-8-1-1-25/12/2018 12:08-25/12/2018,1-8-1-1-26/12/2018 13:39-26/12/2018","2000","Мухаметханов Рустем Ильясович","10000","Стационар","","24/12/2018 23:18","1-1,2-1","0","2000","26/12/2018 10:14"," повтор","","0","536"," самообращение","","5");
INSERT INTO patient VALUES("154","Мельчаков Андрей Васильевич","27/01/1985","","1-8-1-1-25/12/2018 12:08-25/12/2018","3000","Мухаметханов Рустем Ильясович","12500","Стационар","","24/12/2018 23:19","1-1,2-2","0","1000","27/12/2018 10:20","ТВ","","0","537"," самообращение","","5");
INSERT INTO patient VALUES("155","Галеева Светлана Галимьяновна","24/05/1979","","1-8-1-1-25/12/2018 12:07-25/12/2018","1000","Мухаметханов Рустем Ильясович","5500","Стационар","","24/12/2018 23:20","1-1","0","1000","25/12/2018 10:51"," знакомый","","0","538"," самообращение","","12");
INSERT INTO patient VALUES("156","Волошина Татьяна Александровна","20/04/1976","8 (891) 740-3284","10-1-5-1-25/12/2018 10:24-25/12/2018,11-1-1-1-25/12/2018 10:23-25/12/2018,19-1-1-1-25/12/2018 10:24-25/12/2018","6200","Урманов Тимур Радикович","6200","Амбулатория","","25/12/2018 10:21","0","0","6200","25/12/2018 10:26"," повтор","","0","0"," Евгения","","0");
INSERT INTO patient VALUES("157","Даушев Айдар Закиевич","09/07/1984","8 (917) 345-0741","1-8-1-1-26/12/2018 13:39-26/12/2018,22-8-1-1-26/12/2018 13:39-26/12/2018,","5700","Мухаметханов Рустем Ильясович","21400","Стационар","","25/12/2018 12:11","1-1","0","1900","26/12/2018 16:36"," повтор","","0","539"," Евгения","","3");
INSERT INTO patient VALUES("158","Салихов Ильгиз Минигалеевич","17/07/1968","8 (987) 607-1173","17-5-5-1-25/12/2018 14:15-25/12/2018,31-5-1-1-25/12/2018 14:35-25/12/2018","3900","Арсланов Азат Шамилевич","3900","Амбулатория","","25/12/2018 14:14","0","0","3900","25/12/2018 16:29","ТВ","","0","0"," Евгения","","0");
INSERT INTO patient VALUES("159","Джабраилова Альбина Рамилевна","29/10/1963","8 (917) 806-4532","10-5-5-1-25/12/2018 14:17-25/12/2018,11-5-1-1-25/12/2018 14:35-25/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","25/12/2018 14:16","0","0","4200","25/12/2018 16:29"," повтор","","0","0"," Евгения","","0");
INSERT INTO patient VALUES("160","Гадельшин Азамат Зуфарович","28/06/1975","","10-5-5-1-25/12/2018 14:19-25/12/2018,11-5-1-1-25/12/2018 14:35-25/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","25/12/2018 14:18","0","0","4200","25/12/2018 16:29"," повтор","","0","0"," Яна","","0");
INSERT INTO patient VALUES("161","Вакулова Анна Александровна","15/06/1976","8 (937) 336-0569","11-5-1-1-25/12/2018 14:35-25/12/2018,33-5-5-1-25/12/2018 14:32-25/12/2018-4000","4000","Арсланов Азат Шамилевич","4000","Амбулатория","","25/12/2018 14:30","0","0","1","25/12/2018 16:28","ТВ","","0","0"," Яна","","0");
INSERT INTO patient VALUES("162","Кусяпкулов Наиль Хайдарович","07/03/1976","","1-8-1-1-26/12/2018 13:39-26/12/2018,1-8-1-1-27/12/2018 12:12-27/12/2018,1-8-8-1-28/12/2018 10:08-28/12/2018","3000","Мухаметханов Рустем Ильясович","14500","Стационар","","25/12/2018 8:01","1-1,2-2","0","3000","28/12/2018 10:08","ТВ","","0","542"," Ришат","","7");
INSERT INTO patient VALUES("163","Еникеева Фаузия Ибрагимовна","15/09/1950","8 (905) 355-5777","1-8-1-1-26/12/2018 13:40-26/12/2018,1-8-1-1-27/12/2018 12:12-27/12/2018,1-8-8-1-28/12/2018 10:22-28/12/2018","3000","Мухаметханов Рустем Ильясович","14500","Стационар","","25/12/2018 8:03","1-1,2-2","0","3000","28/12/2018 10:22","Агенты"," РЦ","0","543"," Ришат","","12");
INSERT INTO patient VALUES("164","Набиева Айгуль Савиевна","12/11/1977","8 (927) 967-6276","1-8-1-1-26/12/2018 13:40-26/12/2018,1-8-1-1-27/12/2018 12:12-27/12/2018","2000","Мухаметханов Рустем Ильясович","10000","Стационар","","25/12/2018 8:06","1-1,2-1","0","2000","27/12/2018 10:21"," знакомый","","0","544"," самообращение","","1");
INSERT INTO patient VALUES("165","Вернер Александр Владимирович","10/06/1957","8 (917) 342-2558","1-8-1-1-26/12/2018 13:40-26/12/2018,1-8-1-1-27/12/2018 12:12-27/12/2018,","3000","Мухаметханов Рустем Ильясович","10000","Стационар","Бл нужен","26/12/2018 8:09","1-1,2-1","0","2000","28/12/2018 10:19","Агенты"," Кавказская","0","545"," Ришат","","7");
INSERT INTO patient VALUES("166","Ахмадиев Эдуард Раузирович","19/01/1973","8 (963) 137-7779","","1000","Мухаметханов Рустем Ильясович","6300","Стационар","","25/12/2018 8:12","2-1","0","1000","26/12/2018 16:56","Агенты"," Кидяев","0","546"," самообращение","","8");
INSERT INTO patient VALUES("167","Бикбулатов  Рустем Альфритович","25/02/1982","8 (937) 312-0613","1-8-1-1-26/12/2018 13:40-26/12/2018","1000","Мухаметханов Рустем Ильясович","5500","Стационар","","25/12/2018 8:15","1-1","0","1000","26/12/2018 17:38","ТВ","","0","547"," самообращение","","4");
INSERT INTO patient VALUES("168","Запольских Андрей Владимирович","24/02/1979","8 (961) 357-8396","1-8-1-1-26/12/2018 13:40-26/12/2018","1000","Мухаметханов Рустем Ильясович","5500","Стационар","","26/12/2018 8:18","1-1","0","1000","27/12/2018 10:23"," повтор","","0","548"," самообращение","","8");
INSERT INTO patient VALUES("169","Фролова Наталья Леонтьевна","27/12/1976","","1-8-1-1-26/12/2018 14:27-26/12/2018,1-8-1-1-27/12/2018 12:12-27/12/2018,1-8-1-1-28/12/2018 13:27-28/12/2018","3000","Мухаметханов Рустем Ильясович","14500","Стационар","","25/12/2018 8:19","1-1,2-2","0","3000","28/12/2018 19:56","ТВ","","0","549"," самообращение","","12");
INSERT INTO patient VALUES("170","Пелипенко Олег Васильевич","13/03/1963","","1-8-1-1-26/12/2018 15:27-26/12/2018,1-8-1-1-27/12/2018 12:12-27/12/2018,1-8-1-1-28/12/2018 13:27-28/12/2018","3000","Мухаметханов Рустем Ильясович","14500","Стационар","","26/12/2018 10:55","1-1,2-2","0","3000","29/12/2018 10:40"," повтор","","0","550"," самообращение","","3");
INSERT INTO patient VALUES("171","Ахметов Ринат Ильясович","25/05/1971","","20-8-8-1-26/12/2018 11:21-26/12/2018,22-8-8-1-26/12/2018 11:21-26/12/2018","3400","Мухаметханов Рустем Ильясович","7300","Амбулатория","","26/12/2018 11:20","0","0","3400","26/12/2018 10:15"," повтор","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("172","Ахметов Руслан Георгиевич","05/03/1982","8 (987) 253-7339","10-5-5-1-26/12/2018 13:47-26/12/2018,11-5-1-1-26/12/2018 14:27-26/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","26/12/2018 13:45","0","0","4200","26/12/2018 15:09"," интернет"," Екат","0","0"," Евгения","","0");
INSERT INTO patient VALUES("173","Черноусько Валентина Петровна","07/11/1965","8 (914) 534-0758","17-5-5-1-26/12/2018 13:50-26/12/2018,31-5-1-1-26/12/2018 14:27-26/12/2018","3900","Арсланов Азат Шамилевич","3900","Амбулатория","","26/12/2018 13:48","0","0","3900","26/12/2018 15:09","ТВ","","0","0"," Яна","","0");
INSERT INTO patient VALUES("174","Белая Маргарита Халимовна","15/10/1986","8 (965) 665-2200","15-5-5-1-26/12/2018 14:21-26/12/2018,31-5-1-1-26/12/2018 14:27-26/12/2018","3100","Арсланов Азат Шамилевич","3100","Амбулатория","","26/12/2018 14:19","0","0","3100","26/12/2018 15:09","Вывеска","","0","0"," Яна","","0");
INSERT INTO patient VALUES("175","Караваев Валерий Валерьевич","29/11/1985","8 (917) 775-5824","17-5-5-1-26/12/2018 15:09-26/12/2018,31-5-1-1-26/12/2018 15:10-26/12/2018","3900","Арсланов Азат Шамилевич","3900","Амбулатория","","26/12/2018 15:08","0","0","3900","26/12/2018 16:03","ТВ","","0","0"," Ришат","","0");
INSERT INTO patient VALUES("176","Яппарова Гульнара Саляховна","05/01/1969","","11-5-1-1-27/12/2018 10:23-26/12/2018,13-5-5-1-26/12/2018 16:05-26/12/2018","4900","Арсланов Азат Шамилевич","4900","Амбулатория","","26/12/2018 16:04","0","0","4900","26/12/2018 10:15"," повтор","","0","0"," Яна","","0");
INSERT INTO patient VALUES("177","Салахов Ринат Ахкамович","17/12/1947","8 (927) 336-4923","1-8-1-1-28/12/2018 13:27-28/12/2018,28-8-1-1-28/12/2018 13:27-28/12/2018,1-8-1-1-29/12/2018 14:46-29/12/2018,28-8-1-1-29/12/2018 14:46-29/12/2018,24-8-16-1-30/12/2018 14:13-28/12/2018,24-8-16-1-30/12/2018 14:13-29/12/2018","6400","Мухаметханов Рустем Ильясович","14400","Стационар","","27/12/2018 14:07","1-1,2-1","0","6400","29/12/2018 14:13","Агенты"," Справочник","0","551"," Евгения","","4");
INSERT INTO patient VALUES("178","Раков Александр Владимирович","26/05/1980","8 (917) 379-8181","11-5-1-1-27/12/2018 15:45-27/12/2018,14-5-5-1-27/12/2018 14:26-27/12/2018","5700","Арсланов Азат Шамилевич","5700","Амбулатория","","27/12/2018 14:25","0","0","5700","27/12/2018 15:56"," повтор","","0","0"," Евгения","","0");
INSERT INTO patient VALUES("179","Шабрин Дмитрий Геннадиевич","05/11/1984","8 (937) 500-0886","17-5-5-1-27/12/2018 14:30-27/12/2018,31-5-1-1-27/12/2018 15:45-27/12/2018","3900","Арсланов Азат Шамилевич","3900","Амбулатория","","27/12/2018 14:27","0","0","3900","27/12/2018 15:57"," знакомый","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("180","Рафиков Эмиль Венерович","18/12/1974","8 (969) 613-5000","10-5-5-1-27/12/2018 15:32-27/12/2018,11-5-1-1-27/12/2018 15:45-27/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","27/12/2018 15:31","0","0","4200","27/12/2018 15:57"," знакомый","","0","0"," Яна","","0");
INSERT INTO patient VALUES("181","Дергунов Денис Николаевич","12/04/1985","","1-8-1-1-28/12/2018 13:27-28/12/2018,10-8-1-1-02/01/2019 12:19-01/01/2019,11-8-1-1-02/01/2019 12:19-01/01/2019","5200","Мухаметханов Рустем Ильясович","22700","Стационар","","27/12/2018 23:11","2-5","0","5200","01/01/2019 12:21","ТВ","","0","552"," самообращение","","15");
INSERT INTO patient VALUES("182","Магасумов Алтберт Агзамович","06/05/1960","","1-8-1-1-28/12/2018 13:27-28/12/2018,1-8-1-1-29/12/2018 14:46-29/12/2018,22-8-8-1-30/12/2018 14:14-29/12/2018","2900","Мухаметханов Рустем Ильясович","10900","Стационар","","27/12/2018 2:49","1-1,2-1","0","2900","29/12/2018 14:15"," повтор","","0","553"," самообращение","","5");
INSERT INTO patient VALUES("183","Тельков А.Н.","13/12/1970","","20-8-8-1-28/12/2018 10:15-28/12/2018","2500","Мухаметханов Рустем Ильясович","2500","Амбулатория","","28/12/2018 10:13","0","0","2500","28/12/2018 16:46","Агенты","Скорая помощь","0","0"," самообращение","","0");
INSERT INTO patient VALUES("184","Габдуллин Юлай Наилевич","08/07/1981","8 (927) 339-9084","1-8-1-1-29/12/2018 14:46-29/12/2018,1-8-1-1-30/12/2018 11:50-30/12/2018,1-8-12-1-02/01/2019 12:14-31/12/2018,1-8-1-1-02/01/2019 12:20-01/01/2019,1-8-8-1-03/01/2019 12:29-02/01/2019","7000","Мухаметханов Рустем Ильясович","23500","Стационар","","28/12/2018 11:07","1-1,2-4","0","5000","02/01/2019 13:09"," повтор","","0","554"," самообращение","","5");
INSERT INTO patient VALUES("185","Галин И.П.","17/02/1985","8 (927) 456-7589","20-1-1-1-28/12/2018 13:27-28/12/2018","2500","Урманов Тимур Радикович","2500","Амбулатория","","28/12/2018 13:26","0","0","2500","28/12/2018 14:25","ТВ","","0","0"," Евгения","","0");
INSERT INTO patient VALUES("186","Ахмадуллина Зиля Галеевна","06/04/1976","8 (917) 347-7883","11-5-1-1-28/12/2018 14:26-28/12/2018,14-5-5-1-28/12/2018 14:19-28/12/2018","5700","Арсланов Азат Шамилевич","5700","Амбулатория","","28/12/2018 14:16","0","0","5700","28/12/2018 14:58","ТВ","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("187","Шабрин Олег Владимирович","30/08/1980","8 (989) 952-8699","11-5-1-1-28/12/2018 14:26-28/12/2018,14-5-5-1-28/12/2018 14:20-28/12/2018","5700","Арсланов Азат Шамилевич","5700","Амбулатория","","28/12/2018 14:19","0","0","5700","28/12/2018 14:58","ТВ","","0","0"," Яна","","0");
INSERT INTO patient VALUES("188","Валиахметов Динар Дамирович","25/04/1984","8 (917) 408-3294","17-5-5-1-28/12/2018 14:23-28/12/2018,31-5-1-1-28/12/2018 14:26-28/12/2018","3900","Арсланов Азат Шамилевич","3900","Амбулатория","","28/12/2018 14:22","0","0","3900","28/12/2018 14:59"," интернет","","0","0"," Яна","","0");
INSERT INTO patient VALUES("189","Хабибов Айрат Рашитович","06/12/1974","","1-8-1-1-29/12/2018 14:47-29/12/2018","1000","Мухаметханов Рустем Ильясович","4500","Стационар","","28/12/2018 14:45","2-1","0","1000","29/12/2018 14:15"," повтор","","0","555"," самообращение","","15");
INSERT INTO patient VALUES("190","Усманов Вадим Иванович","01/01/1980","","27-5-5-1-28/12/2018 14:55-28/12/2018","1900","Арсланов Азат Шамилевич","1900","Амбулатория","","28/12/2018 14:53","0","0","1900","28/12/2018 15:59"," повтор","","0","0"," Евгения","","0");
INSERT INTO patient VALUES("191","Гавриков Иван Иванович","01/01/1979","","27-5-5-1-28/12/2018 14:58-28/12/2018","1900","Арсланов Азат Шамилевич","1900","Амбулатория","","28/12/2018 14:56","0","0","1900","28/12/2018 16:00"," интернет","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("192","Гатауллин Тимерьян Емирьянович","15/05/1960","8 (896) 103-9648","1-8-1-1-29/12/2018 14:47-29/12/2018,10-8-5-1-02/01/2019 13:08-31/12/2018,11-8-12-1-02/01/2019 12:14-31/12/2018","5200","Мухаметханов Рустем Ильясович","15700","Стационар","","28/12/2018 16:49","2-3","0","5200","31/12/2018 13:08"," повтор","","0","556"," Ришат","","13");
INSERT INTO patient VALUES("193","Ровнейко Александр Николаевич","24/02/1987","","1-8-1-1-29/12/2018 14:47-29/12/2018","1000","Мухаметханов Рустем Ильясович","5500","Стационар","","28/12/2018 10:22","1-1","0","1000","29/12/2018 14:16"," повтор","","0","557"," самообращение","","7");
INSERT INTO patient VALUES("194","Тювелев Сергей Геннадьевич","01/06/1960","","1-8-1-1-29/12/2018 14:47-29/12/2018,1-8-1-1-30/12/2018 11:51-30/12/2018","2000","Мухаметханов Рустем Ильясович","10000","Стационар","","28/12/2018 10:31","1-1,2-1","0","2000","30/12/2018 14:17"," повтор","","0","558"," Ришат","","1");
INSERT INTO patient VALUES("195","Цагалов Сергей Арсенович","06/04/1975","8 (898) 713-5270","1-8-1-1-30/12/2018 11:51-30/12/2018,1-8-8-1-31/12/2018 10:06-31/12/2018","2000","Мухаметханов Рустем Ильясович","10000","Стационар","","29/12/2018 10:34","1-1,2-1","0","2000","31/12/2018 10:07"," интернет","","0","560"," Ришат","","1");
INSERT INTO patient VALUES("196","Сарварова Инна Федоровна","11/04/1970","8 (960) 381-3373","1-8-1-1-30/12/2018 11:51-30/12/2018","2000","Мухаметханов Рустем Ильясович","5500","Стационар","","29/12/2018 10:37","1-1","0","1000","30/12/2018 14:17","Агенты"," Кавказская","0","561"," Ришат","","2");
INSERT INTO patient VALUES("197","Назарова Г.А.","03/04/1981","","20-8-8-1-30/12/2018 14:19-29/12/2018","2500","Мухаметханов Рустем Ильясович","5000","Амбулатория","","29/12/2018 10:41","0","0","2500","29/12/2018 14:19"," повтор","","0","0"," Ришат","","0");
INSERT INTO patient VALUES("198","Зиганшин Марат Дамирович","08/03/1973","8 (987) 621-4759","10-5-5-1-29/12/2018 11:04-29/12/2018,11-5-1-1-29/12/2018 14:49-29/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","29/12/2018 11:03","0","0","4200","29/12/2018 14:55","ТВ","","0","0"," Евгения","","0");
INSERT INTO patient VALUES("199","Нургалиев Ирек Рифкатович","20/12/1987","8 (937) 475-3220","17-5-5-1-29/12/2018 14:38-29/12/2018,31-5-1-1-29/12/2018 14:49-29/12/2018","3900","Арсланов Азат Шамилевич","3900","Амбулатория","","29/12/2018 14:36","0","0","3900","29/12/2018 14:56"," повтор","","0","0"," Евгения","","0");
INSERT INTO patient VALUES("200","Айдунов Альберт Назарович","11/07/1965","8 (986) 968-4536","10-5-5-1-29/12/2018 14:41-29/12/2018,11-5-1-1-29/12/2018 14:49-29/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","29/12/2018 14:39","0","0","4200","29/12/2018 14:56"," знакомый","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("201","Овчаров Иван Иванович","01/01/1979","","26-5-5-1-29/12/2018 14:44-29/12/2018","2100","Арсланов Азат Шамилевич","2100","Амбулатория","","29/12/2018 14:43","0","0","2100","29/12/2018 14:56"," повтор","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("202","Шавохин Николай Сергеевич","04/11/1967","8 (917) 472-9940","22-1-1-1-30/12/2018 11:51-30/12/2018,28-1-1-1-30/12/2018 11:51-30/12/2018,1-8-1-1-30/12/2018 12:42-30/12/2018,1-8-12-1-31/12/2018 11:31-31/12/2018,22-8-8-1-02/01/2019 8:10-31/12/2018,28-8-12-1-02/01/2019 12:14-31/12/2018","5800","Мухаметханов Рустем Ильясович","13800","Стационар","","29/12/2018 15:05","1-1,2-1","0","5800","31/12/2018 12:15","Агенты"," РЦ","0","562"," Евгения","","1");
INSERT INTO patient VALUES("203","Таранов Александр Александрович","02/10/1983","8 (927) 637-2089","17-5-5-1-29/12/2018 15:55-29/12/2018,31-5-1-1-29/12/2018 15:56-29/12/2018","3900","Арсланов Азат Шамилевич","3900","Амбулатория","","29/12/2018 15:54","0","0","3900","29/12/2018 16:01"," повтор","","0","0"," Ришат","","0");
INSERT INTO patient VALUES("204","Файзрахманов Марат Фаритович","21/01/1977","8 (937) 359-4295","1-8-1-1-30/12/2018 12:41-30/12/2018,1-8-12-1-02/01/2019 12:14-31/12/2018,1-8-1-1-02/01/2019 12:20-01/01/2019,1-8-8-1-02/01/2019 12:21-02/01/2019,1-8-1-1-03/01/2019 12:35-03/01/2019","5000","Мухаметханов Рустем Ильясович","23500","Стационар","","29/12/2018 12:17","1-1,2-4","0","5000","03/01/2019 13:06","ТВ","","0","563"," самообращение","","3");
INSERT INTO patient VALUES("205","Насибуллин Динар Ильхамович","19/02/1984","8 (917) 740-1279","1-8-1-1-30/12/2018 14:18-30/12/2018,1-8-12-1-31/12/2018 11:31-31/12/2018,1-8-1-1-02/01/2019 12:20-01/01/2019","3000","Мухаметханов Рустем Ильясович","14500","Стационар","","29/12/2018 12:18","1-1,2-2","0","3000","01/01/2019 12:22","Агенты"," НАС","0","564"," самообращение","","4");
INSERT INTO patient VALUES("207","Токарев Михаил Анатольевич","26/01/1967","8 (960) 801-8812","1-8-1-1-30/12/2018 14:18-30/12/2018","1000","Мухаметханов Рустем Ильясович","5500","Стационар","","29/12/2018 12:20","1-1","0","1000","30/12/2018 20:16","Агенты"," Справочник","0","565","Анастасия","","8");
INSERT INTO patient VALUES("208","Пенкин Артем Леонидович","17/05/1985","8 (927) 945-0008","1-8-1-1-30/12/2018 14:18-30/12/2018,1-8-12-1-02/01/2019 13:12-31/12/2018,1-8-1-1-02/01/2019 12:20-01/01/2019,1-8-8-1-02/01/2019 12:18-02/01/2019,1-8-1-1-03/01/2019 12:35-03/01/2019,1-8-1-1-04/01/2019 12:13-04/01/2019","6000","Мухаметханов Рустем Ильясович","20000","Стационар","","29/12/2018 12:21","1-1,2-4,2-1","1","6000","","Агенты"," Баязов","0","566"," самообращение","","7");
INSERT INTO patient VALUES("209","Халиков Ильдар Халитович","09/04/1963","8 (919) 618-3150","1-8-1-1-30/12/2018 14:19-30/12/2018","1000","Мухаметханов Рустем Ильясович","5500","Стационар","","30/12/2018 12:22","1-1","0","1000","31/12/2018 10:07"," повтор","","0","567"," самообращение","","4");
INSERT INTO patient VALUES("210","Шарафуллина Зубарият Мирзанурович","21/11/1961","8 (922) 072-7150","17-5-5-1-30/12/2018 12:35-30/12/2018,31-5-1-1-30/12/2018 12:41-30/12/2018","3900","Арсланов Азат Шамилевич","3900","Амбулатория","","30/12/2018 12:34","0","0","3900","30/12/2018 14:22","ТВ","","0","0"," Евгения","","0");
INSERT INTO patient VALUES("211","Баязитов Радим Рамилевич","16/06/1989","8 (937) 478-5946","17-5-5-1-30/12/2018 12:37-30/12/2018,31-5-1-1-30/12/2018 12:41-30/12/2018","3900","Арсланов Азат Шамилевич","3900","Амбулатория","","30/12/2018 12:36","0","0","3900","30/12/2018 14:23","ТВ","","0","0","Анастасия","","0");
INSERT INTO patient VALUES("212","Романов Андрей Сергеевич","03/08/1984","8 (987) 090-7485","10-5-5-1-30/12/2018 12:40-30/12/2018,11-5-1-1-30/12/2018 12:41-30/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","30/12/2018 12:39","0","0","4200","30/12/2018 14:23","ТВ","","0","0"," Евгения","","0");
INSERT INTO patient VALUES("213","Мунасипов","03/05/1973","","26-8-8-1-02/01/2019 13:21-30/12/2018","2100","Мухаметханов Рустем Ильясович","2100","Амбулатория","","30/12/2018 15:41","0","0","2100","30/12/2018 13:21"," повтор","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("214","Назмиев Ринат Магнавиевич","25/06/1964","8 (917) 431-9272","1-8-12-1-31/12/2018 11:32-31/12/2018,22-8-8-1-02/01/2019 8:12-31/12/2018,23-8-8-1-02/01/2019 8:12-31/12/2018,1-8-1-1-02/01/2019 12:20-01/01/2019,22-8-8-1-02/01/2019 8:12-01/01/2019,23-8-8-1-02/01/2019 8:12-01/01/2019,1-8-8-1-02/01/2019 12:18-02/01/2019,22-8-8-1-02/01/2019 12:18-02/01/2019,23-8-8-1-02/01/2019 12:18-02/01/2019","8250","Мухаметханов Рустем Ильясович","19750","Стационар","","30/12/2018 19:54","1-1,2-2","0","8250","02/01/2019 9:26","Агенты"," РЦ","0","568"," Ришат","","8");
INSERT INTO patient VALUES("215","Усманов Рустем Валерьевич","18/12/1974","8 (987) 490-0799","1-8-12-1-31/12/2018 11:32-31/12/2018","1000","Мухаметханов Рустем Ильясович","4500","Стационар","","30/12/2018 20:15","2-1","0","1000","31/12/2018 8:13"," знакомый","","0","569"," самообращение","","0");
INSERT INTO patient VALUES("216","Уразгулов Ильшат Асхатович","01/08/1968","8 (917) 745-8233","1-8-12-1-31/12/2018 11:32-31/12/2018","1000","Мухаметханов Рустем Ильясович","12500","Стационар","","31/12/2018 4:25","2-2","0","1000","02/01/2019 8:14"," повтор","","0","570"," Ришат","","15");
INSERT INTO patient VALUES("217","Шаталин Сергей Александрович","23/04/1988","8 (927) 955-8199","10-5-5-1-31/12/2018 11:35-31/12/2018,11-5-12-1-31/12/2018 11:36-31/12/2018","4200","Арсланов Азат Шамилевич","4200","Амбулатория","","31/12/2018 11:34","0","0","4200","31/12/2018 12:09"," знакомый","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("218","Ахмадеев Ришат Ришатович","09/08/1965","","1-8-1-1-02/01/2019 12:12-01/01/2019","1000","Мухаметханов Рустем Ильясович","5500","Стационар","","31/12/2018 19:36","1-1","0","1000","01/01/2019 12:12","ТВ","","0","571"," самообращение","","5");
INSERT INTO patient VALUES("219","Ахметова Гузель Сайфутдиновна","06/03/1962","","1-8-1-1-02/01/2019 13:11-01/01/2019","1000","Мухаметханов Рустем Ильясович","5500","Стационар","","31/12/2018 19:38","1-1","0","1000","01/01/2019 13:13"," повтор","","0","572"," самообращение","","2");
INSERT INTO patient VALUES("220","Демях Владимир Александрович","01/11/1974","","","0","Мухаметханов Рустем Ильясович","10500","Стационар","","31/12/2018 19:38","2-3","0","0","03/01/2019 19:16","ТВ","","0","573"," самообращение","","1");
INSERT INTO patient VALUES("221","Сибаев Рузалим Мансурович","16/07/1948","","1-8-1-1-02/01/2019 13:12-01/01/2019,1-8-8-1-02/01/2019 12:25-02/01/2019","2000","Мухаметханов Рустем Ильясович","10000","Стационар","","31/12/2018 19:39","1-1,2-1","0","2000","02/01/2019 16:12","ТВ","","0","574"," самообращение","","1");
INSERT INTO patient VALUES("222","Родькин Владимир Викторович","25/12/1959","","1-8-1-1-02/01/2019 13:12-01/01/2019","1000","Мухаметханов Рустем Ильясович","5500","Стационар","","31/12/2018 19:40","1-1","0","1000","01/01/2019 13:13"," повтор","","0","575"," Яна","","7");
INSERT INTO patient VALUES("223","Гусманов Ильдар Рафикович","23/10/1970","8 (987) 495-1690","1-8-8-1-02/01/2019 12:30-02/01/2019,1-8-1-1-03/01/2019 12:35-03/01/2019,","3000","Мухаметханов Рустем Ильясович","11000","Стационар","","01/01/2019 8:04","10-2","0","2000","03/01/2019 7:50"," повтор","","0","1"," самообращение","","4");
INSERT INTO patient VALUES("224","Ишмаев Марат Кафилович","20/10/1964","8 (927) 635-5073","22-17-17-1-02/01/2019 13:06-01/01/2019,23-17-17-1-02/01/2019 13:06-01/01/2019,1-8-8-1-02/01/2019 13:07-02/01/2019,22-8-8-1-02/01/2019 13:07-02/01/2019,23-8-8-1-02/01/2019 13:07-02/01/2019","4500","Мухаметханов Рустем Ильясович","9500","Стационар","","01/01/2019 8:06","4-1","0","4500","02/01/2019 9:27","ТВ","","0","2"," самообращение","","7");
INSERT INTO patient VALUES("225","Голованова Светлана Сергеевна","28/05/1974","8 (996) 404-5225","1-8-8-1-02/01/2019 13:03-02/01/2019,1-8-1-1-03/01/2019 12:35-03/01/2019,1-8-1-1-04/01/2019 12:13-04/01/2019","3000","Мухаметханов Рустем Ильясович","11000","Стационар","","01/01/2019 8:07","1-2,4-1","1","3000","","ТВ","","0","3"," Ришат","","2");
INSERT INTO patient VALUES("226","Харасов Марат Фаритович","28/08/1973","8 (965) 937-0159","1-8-1-1-03/01/2019 12:35-03/01/2019,1-8-1-1-04/01/2019 12:13-04/01/2019,1-8-0-0-0-05/01/2019","3000","Мухаметханов Рустем Ильясович","13500","Стационар","","02/01/2019 13:15","2-3","1","2000","","ТВ","","0","4"," самообращение","","15");
INSERT INTO patient VALUES("227","Харасов Салават Фаритович","20/02/1976","8 (962) 544-2373","1-8-1-1-03/01/2019 12:35-03/01/2019,1-8-1-1-04/01/2019 12:13-04/01/2019,1-8-0-0-0-05/01/2019","3000","Мухаметханов Рустем Ильясович","13500","Стационар","","02/01/2019 13:18","2-3","1","2000","","ТВ","","0","5"," самообращение","","15");
INSERT INTO patient VALUES("228","Пермякова","05/07/1970","","26-18-18-1-02/01/2019 13:24-31/12/2018","2100","","2100","Амбулатория","","31/12/2018 13:23","0","0","2100","31/12/2018 13:25"," повтор","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("229","Ахметов Ринат Ильясович","25/05/1971","","20-8-8-1-02/01/2019 13:28-02/01/2019,22-8-8-1-02/01/2019 13:28-02/01/2019","3900","Мухаметханов Рустем Ильясович","7300","Амбулатория","","02/01/2019 13:27","0","0","3900","02/01/2019 13:29"," повтор","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("230","Хабиров Ринат Рашитович","25/07/1973","8 (917) 458-3795","1-8-1-1-03/01/2019 12:35-03/01/2019,1-8-1-1-04/01/2019 12:13-04/01/2019,1-8-0-0-0-05/01/2019","3000","Мухаметханов Рустем Ильясович","46500","Стационар","","02/01/2019 14:11","1-2,4-1","1","2000",""," повтор","","0","6"," Яна","","5");
INSERT INTO patient VALUES("231","Гайнутдинов Р.Ф.","29/09/1977","","20-8-8-1-02/01/2019 15:23-02/01/2019","3000","Мухаметханов Рустем Ильясович","3000","Амбулатория","","02/01/2019 15:22","0","0","3000","02/01/2019 16:13"," знакомый","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("232","Фатхлисламов Сабит Сабирович","10/03/1961","","1-8-1-1-03/01/2019 12:36-03/01/2019","1000","Мухаметханов Рустем Ильясович","4500","Стационар","","02/01/2019 16:44","2-1","0","1000","03/01/2019 16:56"," повтор","","0","7"," самообращение","","15");
INSERT INTO patient VALUES("233","Катренич Альберт Сергеевич","14/02/1996","8 (987) 044-5730","1-8-1-1-03/01/2019 12:36-03/01/2019,1-8-1-1-04/01/2019 12:17-04/01/2019","2000","Мухаметханов Рустем Ильясович","6000","Стационар","","02/01/2019 8:59","1-1,8-1","1","2000","","ТВ","","0","8"," Яна","","5");
INSERT INTO patient VALUES("234","Холманов Анатолий Викторович","13/08/1969","8 (906) 372-2532","1-8-1-1-03/01/2019 12:36-03/01/2019,1-8-1-1-04/01/2019 12:17-04/01/2019","2000","Мухаметханов Рустем Ильясович","6000","Стационар","","02/01/2019 9:01","1-1,8-1","1","2000",""," повтор","","0","9"," Яна","","4");
INSERT INTO patient VALUES("235","Сопов Валентин Валерьевич","20/10/1974","8 (965) 645-4507","14-5-5-1-03/01/2019 11:21-03/01/2019","5700","Арсланов Азат Шамилевич","5700","Амбулатория","","03/01/2019 11:20","0","0","5700","03/01/2019 11:44"," повтор","","0","0"," Яна","","0");
INSERT INTO patient VALUES("236","Годунов Б.Н.","04/08/1958","","20-8-8-1-03/01/2019 14:18-03/01/2019,22-8-8-1-03/01/2019 14:18-03/01/2019,23-8-8-1-03/01/2019 14:18-03/01/2019","4750","Мухаметханов Рустем Ильясович","4750","Амбулатория","","03/01/2019 14:17","0","0","4750","03/01/2019 16:36","ТВ","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("237","Хисматуллин Р.Н.","17/08/1976","","20-8-8-1-03/01/2019 16:38-03/01/2019","3000","Мухаметханов Рустем Ильясович","3000","Амбулатория","","03/01/2019 16:37","0","0","3000","03/01/2019 18:42","ТВ","","0","0","Анастасия","","0");
INSERT INTO patient VALUES("238","Нагимов Рустем Ульфатович","11/02/1974","8 (937) 490-5722","1-8-1-1-04/01/2019 12:17-04/01/2019","1000","Мухаметханов Рустем Ильясович","6000","Стационар","","03/01/2019 16:39","1-1","1","1000","","ТВ","","0","10","Анастасия","","3");
INSERT INTO patient VALUES("239","Максимова Валентина Алексеевна","08/03/1973","8 (927) 331-5622","1-8-1-1-04/01/2019 12:17-04/01/2019","1000","Мухаметханов Рустем Ильясович","20000","Стационар","","03/01/2019 16:44","5-1","1","1000","","Агенты"," Баязов","0","11"," самообращение","","6");
INSERT INTO patient VALUES("240","Башаров Азат Фазитович","09/09/1969","8 (927) 239-7931","1-8-1-1-04/01/2019 12:17-04/01/2019","1000","Мухаметханов Рустем Ильясович","6000","Стационар","","03/01/2019 16:48","1-1","1","1000","","Агенты"," Баязов","0","12"," самообращение","","3");
INSERT INTO patient VALUES("241","Даутов Ильдар Алмасович","15/10/1961","8 (918) 168-9864","1-8-1-1-04/01/2019 12:17-04/01/2019,1-8-0-0-0-05/01/2019,1-8-0-0-0-06/01/2019","3000","Мухаметханов Рустем Ильясович","16000","Стационар","","03/01/2019 16:51","1-1,8-2","1","1000",""," повтор","","0","13","Анастасия","","8");
INSERT INTO patient VALUES("242","Суфиянов А.Р.","05/06/1986","","20-8-8-1-03/01/2019 19:06-03/01/2019","3000","Мухаметханов Рустем Ильясович","3000","Амбулатория","","03/01/2019 19:05","0","0","3000","03/01/2019 20:06","ТВ","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("243","Фаррахов Р.Р.","24/12/1983","","20-8-8-1-03/01/2019 19:08-03/01/2019","3000","Мухаметханов Рустем Ильясович","6000","Амбулатория","","03/01/2019 19:07","0","0","3000","03/01/2019 20:06","ТВ","","0","0"," самообращение","","0");
INSERT INTO patient VALUES("244","Диденко С.Н.","04/12/1972","","20-8-8-1-03/01/2019 19:10-03/01/2019,22-8-8-1-03/01/2019 19:10-03/01/2019,23-8-8-1-03/01/2019 19:10-03/01/2019","4750","Мухаметханов Рустем Ильясович","4750","Амбулатория","","03/01/2019 19:09","0","0","4750","03/01/2019 8:29"," повтор","","0","0","Анастасия","","0");
INSERT INTO patient VALUES("245","Атланов Денис Сергеевич","26/03/1981","8 (989) 957-0051","1-8-1-1-04/01/2019 12:17-04/01/2019","1000","Мухаметханов Рустем Ильясович","9000","Стационар","","03/01/2019 19:13","2-1","1","1000",""," повтор","","0","14","Анастасия","","15");
INSERT INTO patient VALUES("246","Мухтаров Дамир Гатиевич","14/09/1980","8 (962) 531-3651","1-8-1-1-04/01/2019 12:18-04/01/2019,28-8-1-1-04/01/2019 12:18-04/01/2019","2000","Мухаметханов Рустем Ильясович","7000","Стационар","","03/01/2019 19:17","1-1","1","2000",""," повтор","","0","15"," самообращение","","7");
INSERT INTO patient VALUES("247","Сайфуллина Татьяна Геннадьевна","13/06/1964","8 (965) 937-6746","1-8-1-1-04/01/2019 12:18-04/01/2019","1000","Мухаметханов Рустем Ильясович","4500","Стационар","","03/01/2019 19:20","2-1","1","1000","","Агенты"," Справочник","0","16","Анастасия","","13");
INSERT INTO patient VALUES("248","Шангареев Эльдар Рауфович","10/10/1976","8 (987) 474-1464","1-8-1-1-04/01/2019 12:18-04/01/2019","1000","Мухаметханов Рустем Ильясович","6000","Стационар","","03/01/2019 19:24","1-1","1","1000",""," повтор","","0","17"," самообращение","","12");
INSERT INTO patient VALUES("249","Ахметов Ринат Илюсович","25/05/1971","","1-8-1-1-04/01/2019 12:18-04/01/2019","1000","Мухаметханов Рустем Ильясович","6000","Стационар","","03/01/2019 7:42","1-1","1","1000",""," повтор","","0","18","Анастасия","","4");
INSERT INTO patient VALUES("250","Букин Александр Игоревич","09/05/1975","","1-8-0-0-0-04/01/2019","1000","Мухаметханов Рустем Ильясович","7500","Стационар","","04/01/2019 7:45","9-1","1","0","","ТВ","","0","19","Анастасия","","10");
INSERT INTO patient VALUES("251","Черезов А.А.","25/04/1977","8 (917) 360-3187","33-5-5-1-04/01/2019 10:00-04/01/2019-4000","4000","Арсланов Азат Шамилевич","4000","Амбулатория","","04/01/2019 9:57","0","0","1","04/01/2019 11:22"," повтор","","0","0"," Ришат","","0");
INSERT INTO patient VALUES("252","Аюпов Рамиль Ривкатович","22/09/1987","8 (937) 344-0533","10-5-5-1-04/01/2019 11:22-04/01/2019,11-5-1-1-04/01/2019 12:18-04/01/2019","4200","Арсланов Азат Шамилевич","8400","Амбулатория","","04/01/2019 11:21","0","0","4200","04/01/2019 12:37","ТВ","","0","0","Анастасия","","0");
INSERT INTO patient VALUES("253","Федорова Флюза Фаритовна","14/06/1973","8 (917) 7683618___-____","1-8-0-0-0-05/01/2019,1-8-0-0-0-06/01/2019,1-8-0-0-0-07/01/2019","3000","Мухаметханов Рустем Ильясович","0","Стационар","","04/01/2019 11:31","10-2,8-1","1","0",""," повтор","","0","20"," Яна","","2");
INSERT INTO patient VALUES("254","Спицын Станислав Владимирович","31/07/1970","8 (917) 756-9796","1-8-0-0-0-05/01/2019,1-8-0-0-0-06/01/2019,1-8-0-0-0-07/01/2019,8-8-0-0-0-07/01/2019","6800","Мухаметханов Рустем Ильясович","0","Стационар","","04/01/2019 11:36","10-2,8-1","1","0",""," повтор","","0","21"," самообращение","","1");
INSERT INTO patient VALUES("255","Мауэр Анатолий Владимирович","12/10/1948","8 (905) 005-8578","1-8-0-0-0-05/01/2019,23-8-0-0-0-05/01/2019","1850","Мухаметханов Рустем Ильясович","0","Стационар","","04/01/2019 12:38","1-1","1","0","","ТВ","","0","22"," Яна","","8");
INSERT INTO patient VALUES("256","Матвеев Юрий Валентинович","04/01/1959","8 (927) 081-9092","1-8-0-0-0-05/01/2019,1-8-0-0-0-06/01/2019,1-8-0-0-0-07/01/2019","3000","Мухаметханов Рустем Ильясович","0","Стационар","","04/01/2019 12:43","10-2,8-1","1","0","","ТВ","","0","23"," Яна","","8");



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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

INSERT INTO usertbl VALUES("1","Урманов Тимур Радикович","doc","УТР","лондон","10","57394","3702","284","39");
INSERT INTO usertbl VALUES("5","Арсланов Азат Шамилевич","doc","ААШ","майор","0","65346","3768","81","4");
INSERT INTO usertbl VALUES("8","Мухаметханов Рустем Ильясович","su","МРИ","рим","0","87620","21790","79","30");
INSERT INTO usertbl VALUES("9","Мухаметов Тимур Эфирович","view","МТЭ","2","10","0","0","0","0");
INSERT INTO usertbl VALUES("10","Мухаметов Рустем Эфирович","view","МРЭ","1","0","0","0","0","0");
INSERT INTO usertbl VALUES("11","Иванова Евгения Павловна","admin","ИЕП","кипр","0","0","0","0","0");
INSERT INTO usertbl VALUES("12","Мугалимов Динар Дарвинович","doc","МДД","мадрид","10","6460","1640","44","5");
INSERT INTO usertbl VALUES("14","Резида Маратовна","psi","РМ","вена","0","5000","0","5","0");
INSERT INTO usertbl VALUES("15","Тимербулатова Гульнара Фаатовна","stpsi","ТГФ","милан","0","10500","0","8","0");
INSERT INTO usertbl VALUES("16","Валеев Рустем Раилевич","doc","ВРР","невролог","1","7400","0","13","0");
INSERT INTO usertbl VALUES("17","Кинзябаев Юнир Хабирович","ddoc","КЮХ","сеул","10","4050","2250","3","2");
INSERT INTO usertbl VALUES("18","Мустафин Руслан Румильевич","ddoc","МРР","анатомия","10","1400","210","0","1");
INSERT INTO usertbl VALUES("19","Вероника","psi","Вероника","вера","0","2000","0","2","0");



