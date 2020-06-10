-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour monblog
CREATE DATABASE IF NOT EXISTS `monblog` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `monblog`;

-- Listage de la structure de la table monblog. admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Listage des données de la table monblog.admin : ~1 rows (environ)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `pseudo`, `password`, `email`) VALUES
	(5, 'admin', '$2y$10$U9rwCRnPlLiSM30Ztq.xTOqcu8xjn.YIt5EZGHgvqqi6042HuNAX2', 'dev-steph@gmail.com');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Listage de la structure de la table monblog. article
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ref_page` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(1000) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `creation_date` date NOT NULL,
  `update_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;

-- Listage des données de la table monblog.article : ~11 rows (environ)
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` (`id`, `ref_page`, `title`, `image`, `content`, `creation_date`, `update_date`) VALUES
	(9, 'Australie', 'Le départ et l\'arrivée', 'australie1.jpg', 'On a beau savoir où on va, comment on n\'y va et combien de temps ça prendra, on n\'est jamais vraiment préparé !\r\nD\'un on a TOUS tendance à prendre trop ! Le \'au cas ou\' qui prend 14kilos dans votre valise ! Genre, c\'est bien connu, des pharmacies y en a qu\'en France !\r\nOn se prend le gros gel douche, le gros shampoo pour ne pas manquer alors qu\'il est tellement plus logique d\'en racheter direct là-bas car oui y a aussi des super-marchés ! Le truc de dingue !\r\n\r\nPour aller en Australie, à Perth, si on veut être précis, on a un peu de route !\r\nDéjà 3h30 de train pour aller à Paris, puis 2h d\'avion pour aller à Londres et après 4h d\'escale à baver devant un cookie à 4euros et on décolle enfin pour ...17h de vol. Le vol de plus long et sans escale.\r\n\r\nOui, c\'est très long et à la limite du supportable surtout quand on n\'arrive pas à dormir assis. Impossible de s\'allonger ni de tendre ses jambes.... Pas conseillé d\'être en surpoids sauf si vous avez les moyens de vous payer une classe supérieure !\r\nOn a beau avoir pris un livre, une console de jeux portable, son MP4, on n\'a envie de rien d\'autre que de courir et sauter pour se dégourdir les jambes et la tête !\r\nAlors quand on voit les côtes Australiennes.... ahhh que du bonheur !\r\n\r\nOn sort enfin de l\'aéroport, il est 11h à Perth, et je n\'ai pas dormi depuis plus de 22h ! ET pourtant pas fatiguée, tellement heureuse d\'être là !', '2020-04-07', '2020-04-07'),
	(10, 'Australie', 'Rottness Island', 'australie2.JPG', 'Rottnest Island, île située à 1h de bateau de Perth à l\'ouest de l\'Australie.\r\n\r\nLe temps ? Pas terrible, genre 17dégrés avec beaucoup de vent, donc un peu déçu, moi qui voulais du soleil, je me retrouve à mettre un pull et un manteau dès le deuxième jours.\r\n\r\nAu final ,le temps s\'est éclaircit et le soleil a tapé, tapé et tapé très fort !\r\nCe n\'est vraiment pas le même soleil qu\'en France ! Car on final, on a pas eu si chaud sachant qu\'on a fait le tour de l\'île à vélo et que je n\'ai pas enlevé mon pull à cause du vent.\r\n\r\nC\'est une fois revenu à l’hôtel qu\'on a réalisé que nos mains étaient brûlées et avaient doublés de volume ! En bref, la crème solaire sera ta meilleure amie ! \r\nPetit passage en pharmacie où une préparatrice adorable ( qui a bien rigolé en voyant nos mains) nous a expliqué combien elle aimait la France en nous vendant un produit miracle! ^^\r\n\r\nEt l\'île dans tout ça ?\r\n\r\nSuperbe et à faire absolument !\r\nCette journée a été la meilleure de tout le voyage !\r\nOn s\'arrête toutes les 2 minutes pour admirer cette eau bleue à perte de vue et sa faune exceptionnelle.\r\nEt puis, bon il faut être honnête, mon chéri m\'a demandé en mariage sur une de ces plages...donc ^^\r\n\r\n', '2020-04-07', '2020-04-07'),
	(11, 'Australie', 'Les animaux', 'australie3.JPG', 'Ahhhh C\'est trop choupinounet !!!\r\n\r\nRottnest Island, l\'île est remplie de lézards énormes et de serpents mais surtout de Quokkas ! Petit bêtes cousines des kangourous avec un éternel sourire aux lèvres !\r\n\r\nHabitués aux humains respectueux, ils ne fuient pas quand on les approche ! On ne les nourrit pas et on n\'essaye pas de les toucher non plus! \r\nPas besoin, il suffit de s\'allonger par terre ( ! aux serpents ! ) pour qu\'ils vous grimpent dessus !\r\n\r\nEt les vrais kangourous alors ? \r\nPas d\'inquiétude ! Si vous vous baladez un peu en \'campagne\' vous en verrez plein entre deux bottes de foins !\r\n\r\nEt si vous avez le sentiments de ne pas avoir vu assez d\'animaux typiques, faites des zoo locaux ! C\'est d’ailleurs vivement conseillé !', '2020-04-07', '2020-04-07'),
	(12, 'Australie', 'Les randonnées', 'australie6.JPG', 'Une bonne paire de chaussure et une bonne paire de chaussette ( les fournis ne sont pas très sympathique !) et hop, c\'est parti pour une belle balade ! \r\n\r\nEloignez-vous un peu des sentiers hyper touristes et là... oui là c\'est que du bonheur ! Vous êtes seul ou presque !\r\n\r\nmais comment savoir où aller ?\r\n\r\nSi vous êtes passé par une agence de voyages ( une qui a des conseillés vivant sur place c\'est encore mieux ! ), demandez lui de vous faire un petit \'routard\' des choses à voir et à faire.\r\n\r\nAllez sur des forums et demandez directement à des australiens qui vous parlerons des lieux à voir !\r\n\r\nOu sinon, des Offices de tourisme ! C\'est comme ça qu\'on s\'est offert un virée pour voir des baleines !\r\n\r\nInvestissez dans un bon appareil photo ( sans aller jusqu\'à 1000 euros hein !). Quand je vois des gens qui prennent des photos avec les tablettes.... T.T\r\n\r\n', '2020-04-07', '2020-04-07'),
	(13, 'Nouvelle-zelande', 'Moitié du voyage', 'n.z1.jpg', 'Quand on a pris l\'avion, un petit coucou, pour aller direction la Nouvelle-Zélande, on a versé notre petit larme.\r\nQuitter l\'Australie avec la sensation de ne rien avoir vu était un crève cœur et pourtant on n\'a pas eu un instant de farniente ! \r\nJ\'ai adoré l\'Australie mais en arrivant en Nouvelle-Zélande, je suis tombée à genoux ! \r\nAtterrir entre deux chaînes de montagne enneigées... magique.\r\nArrivée avec 22 degrés et un soleil de dingue ! J\'ai retrouvé le sourire !\r\n\r\nPetit soucis au moment de récupérer notre voiture de location. Notre voiture est parti avec un autre client...ah bon ? bah surclassé alors ! ;D\r\n\r\nToute l\'île du sud de la Nouvelle-Zélande est quasi occupée que des prairies pour les moutons ! Y\'en a partout sur une surface verdoyante impressionnante !\r\n\r\nOn ne s\'est jamais lassé un seul instant du paysage ! Et nous avons eu plein de surprises ! Surtout avec la météo !\r\n\r\n\r\n\r\n', '2020-04-07', '2020-04-07'),
	(14, 'Nouvelle-zelande', 'Aéroport', 'n.z04.jpg', 'Fan de seigneurs des anneaux ?\r\n\r\nAlors la Nouvelle-Zélande est faite pour vous !\r\n\r\nDans certains aéroport, vous serez accueillis par des aigles géants chevauchés par Gandalf ou bien la tête du dragon Smaug.\r\n\r\nSi vous êtes vraiment intéressé, pensez a bien vous renseigner et vous équiper car grimper la montagne du destin est un vrai challenge !\r\n\r\nÉvitez les trucs trop touristique, encore une fois, vous allez être aussi déçu que nous. Le film a déjà quelques années et certains lieux sont vieux et ont perdu tout intérêt et vous allez payer cher !\r\n\r\nMon barbu avait des petites étoiles dans les yeux...en sortant du studio Weta où a été tourné les films, c\'était des larmes ! \r\n5 pièces remplis d\'objets de décor, certains n\'ont aucun rapport avec les films, style la voiture le Halo... Ou encore des épées qui n\'ont jamais été utilisées dans les films. A oui et aucune visite ne français donc si vous n’êtes pas à l\'aise avec l\'anglais vous ne comprendrez rien ! Ils parlent super vite !\r\n\r\nLe magasin : petit et hyper cher et la moitié des articles en rupture de stock !\r\n\r\nVous voulez vraiment voir du seigneurs des anneaux ? Faites Hobbits-town !', '2020-04-07', '2020-04-07'),
	(16, 'Trucs_et_astuces', 'Permis', 'trucs02.jpg', 'Deux trois choses à savoir !\r\n1/ Ils conduisent à gauche.\r\n2/ Leurs signalétiques différent du notre ( pas tout heureusement !)\r\n3/ Quasi toutes les voitures que vous louerez sont automatiques !\r\n4/ c\'est pas du d\'avoir un permis provisoire !\r\n\r\nRenseignez-vous, regardez une ou deux vidéos sur le code de conduite et pourquoi ne pas aller chez un concessionnaire pour tester une voiture auto pour se rassurer ?', '2020-04-07', '2020-04-07'),
	(75, 'Trucs_et_astuces', 'Vos valises', 'trucs.jpg', 'En gros, ne voyez pas trop gros! Vous ne partez pas dans un pays primitif ! Eux aussi ont du dentifrice ou du gel douche !\r\nSincèrement, remplissez juste à moitié votre valise car on est vite envahi de souvenirs a ramener pour la sœur et les 30 petits neveux et nièces !\r\n\r\nAu pire, mettez un petit valise dans une grand valise, une truc qui peut s’écraser facilement !', '2020-05-28', '2020-05-28'),
	(76, 'Australie', 'Le zoo de Sidney', 'slide2.1.jpg', 'Deux mot : à faire !\r\nUn peu cher, oui c\'est vrai... mais rien que pour y aller c\'est déjà une aventure ! Prendre le ferry puis une navette jusqu\'en haut ! \r\nSuper zoo avec une vue dingue sur Sidney !', '2020-05-28', '2020-05-28'),
	(77, 'Australie', 'Les routes', 'AUS_115_IMG_9797-compressor(1).jpg', 'La grande majorité de la population se trouve sur les côtes. Alors le reste du pays est assez désertique comme son paysage !M^me si chercher des kangourous et des koalas c\'est amusant, cela fini par lasser une peu ^^', '2020-05-28', '2020-05-28'),
	(78, 'Australie', 'Sydney', 'australie16-compressor(1).jpg', 'Déééçuuueeeee !!!! Autant, le séjour dans le quartier gay était très marrant autant la météo et l\'opéra décevant! \r\nd\'un il faut encore payer et de deux bah en fois devant...bah bof quoi', '2020-05-28', '2020-05-28');
/*!40000 ALTER TABLE `article` ENABLE KEYS */;

-- Listage de la structure de la table monblog. commentaire
CREATE TABLE IF NOT EXISTS `commentaire` (
  `commentaire_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_pseudo` varchar(255) NOT NULL,
  `article_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `creation_date` date NOT NULL,
  `update_date` date NOT NULL,
  PRIMARY KEY (`commentaire_id`),
  KEY `FK_commentaire_article` (`article_id`),
  CONSTRAINT `FK_commentaire_article` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Listage des données de la table monblog.commentaire : ~3 rows (environ)
/*!40000 ALTER TABLE `commentaire` DISABLE KEYS */;
INSERT INTO `commentaire` (`commentaire_id`, `user_pseudo`, `article_id`, `message`, `creation_date`, `update_date`) VALUES
	(3, 'Poupi', 9, 'Bonjour', '2020-05-19', '2020-05-19'),
	(6, 'Poupi Le Retour', 16, 'Whouuuaaa !', '2020-06-08', '2020-06-08');
/*!40000 ALTER TABLE `commentaire` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
