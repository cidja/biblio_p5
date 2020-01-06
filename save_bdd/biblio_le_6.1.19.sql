-- Adminer 4.7.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `bd`;
CREATE TABLE `bd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serie` text NOT NULL,
  `titre` text NOT NULL,
  `scenario` text NOT NULL,
  `dessin` text NOT NULL,
  `album_numero` int(11) NOT NULL,
  `genre` text NOT NULL,
  `remarques` text NOT NULL,
  `img_couv` varchar(200) NOT NULL,
  `date_ajout` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `cartoon`;
CREATE TABLE `cartoon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `serie` varchar(150) NOT NULL,
  `scriptwriter` varchar(150) NOT NULL,
  `designer` varchar(150) NOT NULL,
  `isbn` int(13) NOT NULL,
  `kind` varchar(100) NOT NULL,
  `length` int(4) NOT NULL,
  `count_volume` int(3) NOT NULL,
  `volume_number` int(3) NOT NULL,
  `comment` text NOT NULL,
  `rate` int(5) NOT NULL,
  `cover` varchar(200) NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `cartoon_page_count`;
CREATE TABLE `cartoon_page_count` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cartoon_id` int(11) NOT NULL,
  `previous_page_count` int(4) NOT NULL,
  `new_page_count` int(4) NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cartoon_id` (`cartoon_id`),
  CONSTRAINT `cartoon_page_count_ibfk_1` FOREIGN KEY (`cartoon_id`) REFERENCES `cartoon` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `livres_lus`;
CREATE TABLE `livres_lus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `auteur` text NOT NULL,
  `tome` text NOT NULL,
  `nb_pages` int(4) DEFAULT NULL,
  `debut` text,
  `fin` text,
  `remarques` text NOT NULL,
  `img` varchar(200) NOT NULL,
  `date_ajout` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `livres_lus` (`id`, `titre`, `auteur`, `tome`, `nb_pages`, `debut`, `fin`, `remarques`, `img`, `date_ajout`) VALUES
(87,	'La loi du sang',	'Richard A Knaak',	'3',	345,	'',	'',	'Un très bon livre sur l\'univers DIABLO ',	'https://images-na.ssl-images-amazon.com/images/I/51ZGFDD93AL.jpg',	'2019-03-17 15:53:47'),
(90,	'La chute de reach',	'Eric  Nylund',	'3',	504,	'',	'',	'Au top pour tous les fans de Halo qui reviens sur la jeunesse des Spartans d\'où ils viennent et comment on les sélectionne',	'https://images-na.ssl-images-amazon.com/images/I/81aZJhoH3oL.jpg',	'2019-03-17 15:57:06'),
(5,	'1984',	'Georges Orwell',	'1',	438,	NULL,	NULL,	'',	'https://images-na.ssl-images-amazon.com/images/I/81-Za6Yc%2BbL.jpg',	'0000-00-00 00:00:00'),
(6,	'No pasaran',	'Christian Lehmann',	'1',	203,	NULL,	NULL,	'',	'https://images-na.ssl-images-amazon.com/images/I/410byFIt%2BlL.jpg',	'0000-00-00 00:00:00'),
(7,	'la mort est mon métier',	'robert merle',	'1',	384,	NULL,	NULL,	'',	'https://images-na.ssl-images-amazon.com/images/I/81cW8h7hGcL.jpg',	'0000-00-00 00:00:00'),
(100,	'Les Gardiens de Ji, Tome 1 : La volonté du démon',	'Pierre Grimbert',	'4',	284,	'',	'',	'',	'https://images-na.ssl-images-amazon.com/images/I/61W7VJT6TAL.jpg',	'2019-03-17 16:09:58'),
(12,	'La semaine de 4 heures: Travaillez moins, gagnez plus et vivez mieux !',	'tim ferries',	'1',	320,	'',	'',	'',	'https://images-na.ssl-images-amazon.com/images/I/41089YD%2BCTL.jpg',	'0000-00-00 00:00:00'),
(13,	'total recall',	'arnold schwarznegger',	'1',	722,	NULL,	NULL,	'',	'https://images-na.ssl-images-amazon.com/images/I/61By17dDTZL.jpg',	'0000-00-00 00:00:00'),
(14,	'Les 7 habitudes qui font la différence: Ce qu\'il faut savoir pour réussir sa vie',	'christian dubois',	'1',	47,	NULL,	NULL,	'',	'https://d2t3xdwbh1v8qy.cloudfront.net/content/B0078G72UA/resources/1933055657',	'0000-00-00 00:00:00'),
(15,	'Comment parler à tout le monde : Devenir un as de la communication pour réussir dans la vie et se faire des amis',	'leil lowdes',	'1',	512,	NULL,	NULL,	'',	'https://images-na.ssl-images-amazon.com/images/I/51SVsQin6SL.jpg',	'0000-00-00 00:00:00'),
(16,	'Elon Musk: Tesla, Paypal, SpaceX : l\'entrepreneur qui va changer le monde ',	'Ashlee Vance',	'1',	371,	NULL,	NULL,	'',	'https://images-na.ssl-images-amazon.com/images/I/91DSk2GP01L.jpg',	'0000-00-00 00:00:00'),
(17,	'LE PETIT GUIDE DE LA VIE - Un Enseignement Profond Qui Vous Délivre Les Clés D\'une Vie Riche Et Epanouie',	'Anthony Nevo',	'1',	53,	NULL,	NULL,	'',	'https://images-na.ssl-images-amazon.com/images/I/51HcYUCgmKL.jpg',	'0000-00-00 00:00:00'),
(18,	'De zéro à un',	'Peter Thiel',	'1',	150,	NULL,	NULL,	'',	'https://images-na.ssl-images-amazon.com/images/I/71C5xyCXQaL.jpg',	'0000-00-00 00:00:00'),
(19,	'Ce que l\'argent dit de vous: Interrogez votre relation à l\'argent pour une vie plus sereine',	'christian Junod',	'1',	176,	NULL,	NULL,	'',	'https://images-na.ssl-images-amazon.com/images/I/71-ketUwoHL.jpg',	'0000-00-00 00:00:00'),
(20,	'la quatrième révolution industrielle',	'Klauss shhwab',	'1',	208,	NULL,	NULL,	'',	'https://images-na.ssl-images-amazon.com/images/I/51nCpSI-xTL.jpg',	'0000-00-00 00:00:00'),
(21,	'l’energie sexuelle masculine',	'Mantak chia',	'1',	306,	NULL,	NULL,	'',	'https://images-na.ssl-images-amazon.com/images/I/71cPUcCXhdL.jpg',	'0000-00-00 00:00:00'),
(22,	'Le Marketing pour les Nuls poche business',	'Alexander Hiam',	'1',	384,	NULL,	NULL,	'',	'https://images-na.ssl-images-amazon.com/images/I/61nDN%2BUDBdL.jpg',	'0000-00-00 00:00:00'),
(23,	'big data penser l’homme et le monde autrement',	'Gilles Babinet',	'1',	247,	NULL,	NULL,	'',	'https://images-na.ssl-images-amazon.com/images/I/618b5Hoi9tL.jpg',	'0000-00-00 00:00:00'),
(24,	'Comment se faire des amis',	'dale carnegie',	'1',	320,	NULL,	NULL,	'',	'https://images-na.ssl-images-amazon.com/images/I/811hmkRSCpL.jpg',	'0000-00-00 00:00:00'),
(25,	'Le Langage Corporel En 30 Minutes: Le Pouvoir De Lire Et Comprendre Le Langage Du Corps De Vos Proches Et Vos Clients Dès Demain Matin',	'remy roulier',	'1',	76,	NULL,	NULL,	'',	'https://images-na.ssl-images-amazon.com/images/I/51t5Zv5zdIL.jpg',	'0000-00-00 00:00:00'),
(26,	'Le cycle des robots, Tome 1 : Les robots',	'isaac Asimov',	'6',	284,	NULL,	NULL,	'',	'https://images-na.ssl-images-amazon.com/images/I/51Zm-GcdfEL.jpg',	'0000-00-00 00:00:00'),
(27,	'38 idées pour gagner de l\'argent sans investir un seul euro ',	'Nicolas daudin',	'1',	108,	NULL,	NULL,	'',	'https://d2t3xdwbh1v8qy.cloudfront.net/content/B019LPMZ2K/resources/1758897112',	'0000-00-00 00:00:00'),
(28,	'Peter Pan -Texte intégral',	'James Matthew barrie',	'1',	256,	NULL,	NULL,	'',	'https://images-na.ssl-images-amazon.com/images/I/81TXq3i8H4L.jpg',	'0000-00-00 00:00:00'),
(104,	'L\'Alliance des Trois (Autre-Monde, Tome 1)',	'Maxime Chattam',	'7',	456,	'',	'',	'',	'https://images-na.ssl-images-amazon.com/images/I/71SHNqZIESL.jpg',	'2019-03-17 16:28:55'),
(30,	'Réalisez votre site web avec HTML 5 et CSS 3',	'Mathieu Nebra',	'1',	344,	NULL,	NULL,	'',	'https://images-na.ssl-images-amazon.com/images/I/71EAH0S59NL.jpg',	'0000-00-00 00:00:00'),
(31,	'Concevez votre site web avec PHP et MySQL',	'Mathieu Nebra',	'1',	392,	NULL,	NULL,	'',	'https://images-na.ssl-images-amazon.com/images/I/61Rf5H1wcSL.jpg',	'0000-00-00 00:00:00'),
(32,	'Les 17 lois indispensables au succès financier.: Comment dynamiser votre argent et mettre un turbo dans vos finances personnelles',	'Christian Dubois',	'1',	168,	NULL,	NULL,	'',	'https://images-na.ssl-images-amazon.com/images/I/51tSwkYCGHL.jpg',	'0000-00-00 00:00:00'),
(33,	'Prime time ',	'Jay Martel',	'1',	480,	'2018-04-09',	'2018-04-21',	'',	'https://images-na.ssl-images-amazon.com/images/I/71BuxwNVnIL.jpg',	'0000-00-00 00:00:00'),
(34,	'Le succès par la pensée constructive',	'Napoléon Hill',	'1',	352,	NULL,	NULL,	'',	'https://images-na.ssl-images-amazon.com/images/I/61w6Ex8BnoL.jpg',	'0000-00-00 00:00:00'),
(35,	'Réfléchissez et devenez riche',	'Napoléon Hill',	'1',	288,	NULL,	NULL,	'',	'https://images-na.ssl-images-amazon.com/images/I/51W3fOLksLL.jpg',	'0000-00-00 00:00:00'),
(36,	'l’art de demander ',	'Patrice Ras',	'1',	96,	'',	'',	'',	'https://images-na.ssl-images-amazon.com/images/I/41Bog-JKcIL.jpg',	'0000-00-00 00:00:00'),
(37,	'La vie secrète des arbres',	'Peter Wollhelem',	'1',	260,	NULL,	NULL,	'',	'https://images-na.ssl-images-amazon.com/images/I/91d7-MBTdSL.jpg',	'0000-00-00 00:00:00'),
(38,	'La réponse',	'allan et barbara pease',	'1',	192,	'2018-04-09',	'2018-04-21',	'',	'https://images-na.ssl-images-amazon.com/images/I/61Bu6ZLZCuL.jpg',	'0000-00-00 00:00:00'),
(39,	'Libérez votre cerveau ! ',	'Idriss Aberkane',	'1',	288,	'2018-04-21',	'2018-04-29',	'',	'https://images-na.ssl-images-amazon.com/images/I/61o6EqgWgoL.jpg',	'0000-00-00 00:00:00'),
(41,	'On m\'avait dit que c\'était impossible',	'Jean-Baptiste Rudelle',	'1',	256,	'2018-05-08',	'2018-05-16',	'',	'https://images-na.ssl-images-amazon.com/images/I/71-SbSfdsEL.jpg',	'0000-00-00 00:00:00'),
(42,	'Pouvoir illimité - Changez de vie avec la PNL : le livre référence',	'Anthony Robbins',	'1',	637,	'2018-06-04',	'2018-08-26',	'Attention ne se lit pas comme un roman, doit être lu avec assiduité et suivre les instructions données dans le livre sous peine de passer à côté de ses enseignements (n\'est pas un livre de chevet :))',	'https://images-na.ssl-images-amazon.com/images/I/61jGP5JP27L.jpg',	'0000-00-00 00:00:00'),
(43,	'les hommes ne pensent qu’au sexe',	'allan et barbara pease',	'1',	418,	'2018-06-16',	'2018-06-30',	'Très agréable à lire avec beaucoup d\'humour un have to',	'https://images-na.ssl-images-amazon.com/images/I/41uLTiRUKIL._SX318_BO1,204,203,200_.jpg',	'0000-00-00 00:00:00'),
(44,	'la haute quête de dragonia',	'pierre grimbert',	'1',	260,	'2018-07-30',	'2018-08-03',	'Du très bon pierre Grimbert pour changer qui nous emmène dans un univers fantastique toujours autant réjouissant à lire',	'https://images-na.ssl-images-amazon.com/images/P/2747016757.08.LZZZZZZZ.jpg',	'0000-00-00 00:00:00'),
(45,	'amazon la machine à tout vendre',	'Brad Stone',	'1',	384,	'2018-08-18',	'2018-09-04',	'',	'http://images-chapitre.com/ima2/original/542/60837542_11561502.jpg',	'0000-00-00 00:00:00'),
(46,	'la franc maçonnerie pour les nuls',	'Philippe Benamou',	'1',	420,	'2018-09-05',	'2018-09-11',	'',	'https://images.ecosia.org/4evWzlvoFiX66So9o7v58K2cQDk=/0x390/smart/https%3A%2F%2Fpmcdn.priceminister.com%2Fphoto%2FHodapp-Christopher-La-Franc-Maconnerie-Pour-Les-Nuls-Livre-893542483_L.jpg',	'2019-01-28 20:15:32'),
(47,	'Les 7 habitudes de ceux qui réussissent',	'steven r covey',	'1',	NULL,	'2018-09-12',	'',	'',	'https://static.fnac-static.com/multimedia/FR/Images_Produits/FR/fnac.com/Visual_Principal_340/9/1/8/9782754000819/tsp20120928074705/Les-7-habitudes-de-ceux-qui-reuient-tout-ce-qu-ils-entreprennent.jpg',	'0000-00-00 00:00:00'),
(48,	'Histoire de la Franc-Maçonnerie française, tome 3 : La Maçonnerie : Eglise de la république (1877-1944)',	'Pierre Chevalier',	'1',	479,	'2018-10-08',	'2018-10-11',	'',	'https://static.fnac-static.com/multimedia/FR/Images_Produits/FR/fnac.com/Visual_Principal_340/3/2/6/9782213001623/tsp20121001193704/Histoire-de-la-franc-maconnerie-francaise-.jpg',	'0000-00-00 00:00:00'),
(112,	'Les vertus de  l\'échec',	'Charles Pepin',	'1',	178,	'2019-03-29',	'2019-04-09',	'Excellent livre que je conseil qui nous montrent que l\'échec est une partie intégrante de l\'apprentissage sans lui pas d\'évolution',	'https://static.fnac-static.com/multimedia/Images/FR/NR/3f/d4/96/9884735/1540-1/tsp20180816094149/Les-Vertus-de-l-echec.jpg',	'2019-03-29 11:49:37'),
(50,	'bill gates sa vie',	'Daniel Ichbiah',	'1',	NULL,	'2018-10-12',	'2018-10-26',	'Très bon livre qui montre bien les débuts de la multinational MICROSOFT',	'http://ichbiah.online.fr/images/gatesf.jpg',	'0000-00-00 00:00:00'),
(51,	'hu',	'David dolo',	'1',	NULL,	'2018-10-28',	'',	'Très (trop) étrange à mon goût et trop noir ',	'https://images-eu.ssl-images-amazon.com/images/I/41zmYnrkOwL._SX195_.jpg',	'2019-01-20 13:17:57'),
(52,	'blood sweat and pixel',	'Jason Schreier',	'1',	NULL,	'2018-10-30',	'',	'Montre bien l',	'https://images-na.ssl-images-amazon.com/images/I/51h3SnwJTkL._SX330_BO1,204,203,200_.jpg',	'0000-00-00 00:00:00'),
(53,	'une rencontre peut changer un vie',	'Anthony Nevo',	'1',	NULL,	'2018-11-17',	'2018-11-23',	'Un excellent livre qui nous donne de belles leçons de vie que l',	'https://static.fnac-static.com/multimedia/Images/FR/NR/d9/d0/9c/10277081/1540-1/tsp20180927092132/Ta-vie-t-appartient.jpg',	'2018-11-24 23:00:00'),
(54,	'Le moine et le vénérable ',	'christian jacq',	'1',	NULL,	'2018-11-23',	'2018-11-25',	'',	'https://images.ecosia.org/ZlT1sjk-0ux5mUdQZEjlWA5ii2k=/0x390/smart/https%3A%2F%2Flisez0.cdnstatics.com%2Fusuaris%2Flibros%2Ffotos%2F9782221120%2Fm_libros%2F9782221119518ORI.jpg',	'0000-00-00 00:00:00'),
(55,	'Le moine qui vendi sa ferrari',	'Robin S. Sharman',	'1',	NULL,	'2018-11-26',	'2018-12-03',	'Bon livre ce lit facilement ',	'https://images.ecosia.org/1Bfamlp9jZdC1FQKKFKfCGp7idU=/0x390/smart/http%3A%2F%2Fbilder.buecher.de%2Fprodukte%2F34%2F34686%2F34686422z.jpg',	'0000-00-00 00:00:00'),
(56,	'Où tu vas, tu es',	'Jon Kabat-Zinn',	'1',	0,	'2018-12-04',	'',	'A ne pas recommander aux gens qui pensent que la méditation est juste un ressenti. Ce livre est très dirigiste',	'https://images.ecosia.org/h9JaDJIHUhCL2HCdlF8YzjeqAxo=/0x390/smart/https%3A%2F%2Fmedia.senscritique.com%2Fmedia%2F000009200632%2F150%2FOu_tu_vas_tu_es.png',	'0000-00-00 00:00:00'),
(57,	'Les robots cycle 2',	'isaac Asimov',	'1',	NULL,	'2018-12-20',	'2019-01-01',	'Excellent !!!',	'https://media.senscritique.com/media/000006927608/source_big/Un_defile_de_robots_Le_Cycle_des_robots_tome_2.jpg',	'0000-00-00 00:00:00'),
(58,	'La prophétie des Andes',	'James Redfiled',	'1',	0,	'2019-01-02',	'2019-01-15',	'Bien mais très long sur la partie avec les militaires, a réserver aux personnes ayant déjà lus des titres de dévelloppement personnel ',	'http://media.cultura.com/media/catalog/product/cache/1/image/1000x1000/9df78eab33525d08d6e5fb8d27136e95/l/a/la-prophetie-des-andes-9782290338032_0.jpg?t=1509462438',	'2019-01-18 06:13:03'),
(75,	'Latitude zero ',	'Mike Horn',	'1',	NULL,	'2019-02-09',	'2019-02-18',	'Très bon livre haletant du début à la fin',	'http://www.partir-en-vtt.com/upload/articles/images/2/11/374/mike_horn.gif',	'2019-02-09 20:48:01'),
(81,	'J\'ai tout essayé',	'Isabelle Filiozat',	'1',	260,	'2019-02-25',	'2019-02-27',	'Très intérressant prodigue de bons conseils et explique bien comment un enfant voit le monde contrairement à nous ',	'http://www.loulidesbois.fr/images/Image/jai-tout-essay-Isabelle-Filliozat.jpg',	'2019-02-27 19:31:09'),
(73,	'Abraham Lincoln',	'Liliane Kerjan',	'1',	250,	'2019-01-22',	'2019-02-05',	'Très bon livre je le recommande la lecture est aisée et les propos de l\'\\auteur sont très bien ',	'http://www.gallimard.fr/var/storage/images/product/21f/product_9782070461592_195x320.jpg',	'2019-02-01 14:43:36'),
(83,	'La franc maçonnerie',	'Christian Jacq',	'1',	312,	'2019-03-01',	'2019-03-26',	'',	'https://products-images.di-static.com/image/base/9782290010235-475x500-1.jpg',	'2019-03-01 20:12:13'),
(84,	'Terre natale',	'RA Salvatore',	'3',	160,	'',	'',	'un de mes premiers livres fantastique lus un must j\'ai adoré',	'https://images-na.ssl-images-amazon.com/images/I/81z58u6X-DL.jpg',	'2019-03-17 15:50:27'),
(85,	'Terre d\'exil',	'RA Salvatore',	'3',	160,	'',	'',	'',	'https://images-na.ssl-images-amazon.com/images/I/81Ek8hL85JL.jpg',	'2019-03-17 15:51:15'),
(86,	'Terre promise',	'RA Salvatore',	'3',	332,	'',	'',	'',	'https://images-na.ssl-images-amazon.com/images/I/61R2UjkBpSL.jpg',	'2019-03-17 15:52:10'),
(88,	'Le sentier de la damnation',	'Mel Odom',	'3',	378,	'',	'',	'',	'https://images-na.ssl-images-amazon.com/images/I/519G9F78HKL.jpg',	'2019-03-17 15:54:21'),
(89,	'Le royaume des ombres',	'Richard A Knaak',	'3',	347,	'',	'',	'',	'https://images-na.ssl-images-amazon.com/images/I/51W90DF0TSL.jpg',	'2019-03-17 15:54:59'),
(91,	'Les floods',	'Willam C Dietz',	'3',	480,	'',	'',	'',	'https://images-na.ssl-images-amazon.com/images/I/81Y56M34E7L.jpg',	'2019-03-17 15:57:55'),
(92,	'Opération first strike',	'Eric Nylund',	'3',	544,	'',	'',	'',	'https://images-na.ssl-images-amazon.com/images/I/81Z62zkWweL.jpg',	'2019-03-17 15:58:30'),
(93,	'le secret de ji tome 1',	'Pierre Grimbert',	'2',	605,	'',	'',	'Le top du top de l',	'https://images-na.ssl-images-amazon.com/images/I/71OI4XgWpCL.jpg',	'2019-03-17 16:02:56'),
(95,	'Les enfants de ji, tome 1 : Le testament oublié',	'Pierre Grimbert',	'5',	249,	'',	'',	'Une suite logique du secret de ji de très bonne facture un régal de retrouver nos héros (surtout leurs enfants)',	'https://images-na.ssl-images-amazon.com/images/I/71Amf5hL1mL.jpg',	'2019-03-17 16:05:39'),
(94,	'Le secret de ji,  tome 2',	'Pierre Grimbert',	'2',	669,	'',	'',	'',	'https://images-na.ssl-images-amazon.com/images/I/418ag%2BTe6jL.jpg',	'2019-03-17 16:03:37'),
(96,	'Les Enfants de Ji, Tome 2 : La veuve barbare',	'Pierre Grimbert',	'5',	281,	'',	'',	'',	'https://images-na.ssl-images-amazon.com/images/I/71Cg0UYaWXL.jpg',	'2019-03-17 16:06:19'),
(97,	'Les Enfants de Ji, Tome 3 : La voix des aînés',	'Pierre Grimbert',	'5',	279,	'',	'',	'',	'https://images-na.ssl-images-amazon.com/images/I/51HdNE2VL-L.jpg',	'2019-03-17 16:06:57'),
(98,	'Les Enfants de Ji, Tome 4 : Le patriarche',	'Pierre Grimbert',	'5',	247,	'',	'',	'',	'https://images-na.ssl-images-amazon.com/images/I/41nemQXkHhL.jpg',	'2019-03-17 16:07:37'),
(99,	'Les Enfants de Ji, Tome 5 : Le sang du Jal',	'Pierre Grimbert',	'5',	348,	'',	'',	'',	'https://images-na.ssl-images-amazon.com/images/I/4156XSHqjBL.jpg',	'2019-03-17 16:08:26'),
(101,	'Les Gardiens de Ji, Tome 2 : Le Deuil écarlate',	'Pierre Grimbert',	'4',	282,	'',	'',	'',	'https://images-na.ssl-images-amazon.com/images/I/41FYY6Rlt%2BL.jpg',	'2019-03-17 16:10:34'),
(102,	'Les Gardiens de Ji, Tome 3 : Le souffle des aïeux',	'Pierre Grimbert',	'4',	281,	'',	'',	'',	'https://images-na.ssl-images-amazon.com/images/I/41riVTLHPiL.jpg',	'2019-03-17 16:11:07'),
(103,	'Les Gardiens de Ji, Tome 4 : Les Vénérables',	'Pierre Grimbert',	'4',	317,	'',	'',	'',	'https://images-na.ssl-images-amazon.com/images/I/41XYj4N66TL.jpg',	'2019-03-17 16:11:45'),
(105,	'Malronce (Autre-Monde, Tome 2)',	'Maxime Chattam',	'7',	480,	'',	'',	'',	'https://images-na.ssl-images-amazon.com/images/I/817nYGliBrL.jpg',	'2019-03-17 16:29:34'),
(106,	'Le Coeur de la terre (Autre-Monde, Tome 3)',	'Maxime Chattam',	'7',	504,	'',	'',	'',	'https://images-na.ssl-images-amazon.com/images/I/71H%2BzchERPL.jpg',	'2019-03-17 16:30:09'),
(107,	'Entropia (Autre-Monde, Tome 4)',	'Maxime Chattam',	'7',	432,	'',	'',	'',	'https://images-na.ssl-images-amazon.com/images/I/91HCCjh6KQL.jpg',	'2019-03-17 16:30:44'),
(108,	'Oz (Autre-Monde, Tome 5)',	'Maxime Chattam',	'7',	456,	'',	'',	'',	'https://images-na.ssl-images-amazon.com/images/I/8101NYArjPL.jpg',	'2019-03-17 16:31:33'),
(109,	'Neverland (Autre-Monde, Tome 6)',	'Maxime Chattam',	'7',	736,	'',	'',	'',	'https://images-na.ssl-images-amazon.com/images/I/81BBSOmJgCL.jpg',	'2019-03-17 16:32:13'),
(110,	'Genèse (Autre-Monde, Tome 7)',	'Maxime Chattam',	'7',	736,	'',	'',	'',	'https://images-na.ssl-images-amazon.com/images/I/81cGa0pik9L.jpg',	'2019-03-17 16:32:48'),
(111,	'Développer un site web en Php, Mysql et Javascript, Jquery, CSS3 et HTML5: Incluant Web Apps et Mobile. Codes sources en ligne. Cours et exercices avec Corrigé',	'Robin Nixon',	'1',	790,	'',	'',	'Une bible pour tous codeur j\'ai appris avec ce dernier mes premiers pas en dev web',	'https://images-na.ssl-images-amazon.com/images/I/81bfyXLzKwL.jpg',	'2019-03-17 16:35:04'),
(113,	'La Franc-maçonnerie rendue intelligible à ses adeptes : Tome 1, L\'Apprenti',	'Oswald Wirth',	'1',	175,	'2019-04-10',	'2019-04-14',	'',	'https://pmcdn.priceminister.com/photo/la-franc-maconnerie-rendue-intelligible-a-ses-adeptes-tome-1-l-apprenti-de-oswald-wirth-1127759764_L.jpg',	'2019-04-10 08:43:44'),
(114,	'Virgin mon destin',	'Richard Branson',	'1',	470,	'2019-04-15',	'2019-04-24',	'Un livre exceptionnel qui montre la personne inimaginable que peut être richard Branson ',	'https://static.fnac-static.com/multimedia/Images/FR/NR/03/6f/8c/9203459/1540-1/tsp20180301152859/Virgin-mon-destin.jpg',	'2019-04-23 08:51:02'),
(115,	'King kong théorie',	'Despentes Virgine',	'1',	180,	'2019-04-25',	'2019-04-28',	'Bon livre avec une très bonne réflexion sur la condition féminine du 21ième siécle (qu',	'https://static.lalibrairie.com/cache/img/livres/111/9782253122111.jpg',	'2019-04-26 14:46:03'),
(116,	'Il n\'y a pas de parent parfait',	'Isabelle Filliozat',	'1',	301,	'2019-04-30',	'2019-05-08',	'',	'https://www.ruedesenfants.com/wp-content/uploads/2016/02/Il-ny-a-pas-de-parent-parfait.jpg',	'2019-04-30 12:30:49'),
(118,	'Les entrepreneurs de légende',	'Sylvain Bersinger',	'1',	160,	'2019-05-09',	'2019-05-13',	'',	'https://d2t3xdwbh1v8qy.cloudfront.net/content/B079VHB3C1/resources/1340976657',	'2019-05-10 19:21:32'),
(119,	'Islam, l\'autre visage',	'Eva de vitray-Meyerovith',	'1',	160,	'2019-05-17',	'2019-05-20',	'Excellent livre qui montre que la religion musulmane est placé sous le signe de l\'universalisme, sans dogme pensant pour les musulmans',	'https://www.librairie-sana.com/11086-thickbox_default/islam-l-autre-visage-eva-de-vitray-meyerovitch-albin-michel.jpg',	'2019-05-21 06:56:07'),
(120,	'Conversations avec Dieu',	'Neale Donald Walsch',	'1',	252,	'2019-05-21',	'',	'',	'https://media.senscritique.com/media/000004165684/source_big/Conversations_avec_Dieu.jpg',	'2019-05-21 06:57:17'),
(122,	'Promenades Maçonniques',	'Jérôme Touzalin',	'1',	117,	'2019-05-22',	'2019-05-25',	'Un livre de référence pour donner une idée de ce qu\'est la franc  maçonnerie et amène de nombreuses pistes de réflexion ',	'http://www.editions-harmattan.fr/catalogue/couv/9782343118345r.jpg',	'2019-05-27 16:19:32'),
(123,	'La clé d\'hiram',	'Christopher Knight &amp; Robert Lomas',	'1',	530,	'2019-05-25',	'',	'',	'https://static.fnac-static.com/multimedia/Images/FR/NR/f8/8a/1a/1739512/1507-1/tsp20160202140537/La-cle-d-Hiram.jpg',	'2019-05-27 16:21:45'),
(149,	'Les animaux fantastiques: Vie &amp; habitat',	'J. K. Rowling',	'1',	144,	'2019-07-07',	'2019-07-09',	'Excellent ouvrage pour s\'évader et découvrir de nouveaux animaux sortis tout droit de l\'imagination de l\'auteur',	'https://cdn1.booknode.com/book_cover/929/les-animaux-fantastiques---vie-et-habitat-929170-264-432.jpg',	'2019-11-07 17:26:21'),
(148,	'La morale du termite : Petit traité d\'éveil spirituel et social à l\'usage des hérétiques',	'Alain Subrebost',	'1',	150,	'2019-06-02',	'2019-06-07',	'',	'https://images-na.ssl-images-amazon.com/images/I/81Ygey0NBQL.jpg',	'2019-11-07 17:23:57'),
(150,	'Mort sur le nil ',	'Agatha Christie',	'1',	352,	'2019-07-10',	'2019-07-12',	'Une enquête haletante ',	'https://www.lecture-academy.com/wp-content/uploads/couvertures/logo_265738-500x712.jpg',	'2019-11-07 17:28:25'),
(151,	'Le Noël d\'Hercule Poirot',	'Agatha Christie',	'1',	230,	'2019-07-12',	'2019-07-20',	'Un huit clos excellent avec une fin miraculeuse !!!',	'https://pictures.abebooks.com/isbn/9782744128479-uk-300.jpg',	'2019-11-07 17:30:55'),
(152,	'Le Prophetionnel T. 1: La Théorie du Bouclier',	'Pierre Grimbert',	'2',	272,	'2019-07-21',	'2019-07-25',	'Pierre grimbert nous montre encore qu\'il est le maitre du fantastique en france même dans l\'humour',	'https://www.editionsoctobre.com/system/product_pictures/data/000/000/025/large/17-Prophetionnel1.jpg',	'2019-11-07 17:33:58'),
(153,	'Le Prophetionnel T. 2: Le Trone du Dahu',	'Pierre Grimbert',	'2',	272,	'2019-08-07',	'2019-08-10',	'Toujours aussi bon que le 1',	'https://www.editionsoctobre.com/system/product_pictures/data/000/000/026/large/18-Prophetionnel2.jpg',	'2019-11-07 17:35:26'),
(154,	'La guerre des intelligences',	'Laurent Alexandre',	'1',	384,	'2019-08-11',	'2019-08-17',	'',	'https://images-na.ssl-images-amazon.com/images/I/71Qc9F-MkRL.jpg',	'2019-11-07 17:36:56'),
(155,	'Le paradoxe du poisson rouge : 8 vertus pour réussir',	'Hesna Cailliau',	'1',	192,	'2019-08-18',	'2019-08-21',	'',	'https://images-na.ssl-images-amazon.com/images/I/51H3A3G%2BhIL.jpg',	'2019-11-07 17:38:13'),
(156,	'Glückster le Rouge',	'Pascal Françaix',	'1',	344,	'2019-08-22',	'2019-08-31',	'Bof difficile à lire car écrit en vieux français',	'https://images-na.ssl-images-amazon.com/images/I/51HKP81EF0L.jpg',	'2019-11-07 17:49:48'),
(157,	'Le guerrier pacifique',	'Dan Millman',	'1',	247,	'2019-09-06',	'2019-09-17',	'Bof',	'https://images-na.ssl-images-amazon.com/images/I/61RJgB0fTgL.jpg',	'2019-11-07 17:50:59'),
(158,	'L\'Âge de la connaissance',	'Idriss ABERKANE',	'1',	374,	'2019-09-23',	'2019-10-08',	'Très bel ouvrage avec foison d\'exemple qui nous montre que nous avons tout a apprendre de la nature',	'https://images-na.ssl-images-amazon.com/images/I/71R9hC0Fm3L.jpg',	'2019-11-07 17:52:42'),
(159,	'Nos ancêtres étaient-ils des abrutis (essai)',	'Sergei',	'1',	60,	'2019-10-10',	'2019-10-13',	'Intérressant sans plus',	'',	'2019-11-07 17:54:53'),
(160,	'Comment j\'ai arrêté de CONsommer',	'Frederic Mars',	'1',	288,	'2019-10-30',	'2019-11-06',	'Excellent journal de bord qui nous mets en perspective notre envie de surconsommation chronique',	'https://images-na.ssl-images-amazon.com/images/I/61w5r89kDWL.jpg',	'2019-11-07 17:56:44');

DROP TABLE IF EXISTS `novel`;
CREATE TABLE `novel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `author` varchar(150) NOT NULL,
  `isbn` int(13) NOT NULL,
  `genre` varchar(80) NOT NULL,
  `page_count` int(4) NOT NULL,
  `count_volume` int(2) unsigned zerofill NOT NULL,
  `active` int(1) unsigned zerofill NOT NULL,
  `finish` int(1) unsigned zerofill NOT NULL,
  `comment` text NOT NULL,
  `rate` int(5) NOT NULL,
  `cover` varchar(250) NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `novel` (`id`, `title`, `author`, `isbn`, `genre`, `page_count`, `count_volume`, `active`, `finish`, `comment`, `rate`, `cover`, `creation_date`) VALUES
(1,	'La guerre des intelligences',	'Laurent Alexandre',	0,	'traité',	384,	00,	0,	1,	'bof',	3,	'https://images-na.ssl-images-amazon.com/images/I/71Qc9F-MkRL.jpg',	'2020-01-06 08:42:23'),
(2,	'amazon la machine à tout vendre',	'Brad Stone',	0,	'biographie',	384,	00,	0,	0,	'Très bon livre que je recommanderais pour connaitre et comprendre comment amazon est devenu Amazon',	5,	'http://images-chapitre.com/ima2/original/542/60837542_11561502.jpg',	'2020-01-06 15:59:11');

DROP TABLE IF EXISTS `novel_page_count`;
CREATE TABLE `novel_page_count` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `novel_id` int(11) NOT NULL,
  `previous_page_count` int(4) NOT NULL,
  `new_page_count` int(4) NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `novel_id` (`novel_id`),
  CONSTRAINT `novel_page_count_ibfk_3` FOREIGN KEY (`novel_id`) REFERENCES `novel` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2020-01-06 19:18:15
