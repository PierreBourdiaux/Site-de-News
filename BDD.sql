-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 15 déc. 2021 à 14:44
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `php`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `mdp` varchar(100) NOT NULL,
  `nbNewsPP` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`mdp`, `nbNewsPP`, `user`) VALUES
('$2y$10$R8VcQPINFe5pbhFnzrtKK.sdXsPYtQKp.ZtrukunUblTjwJwDQ.hy', 2, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `flux`
--

DROP TABLE IF EXISTS `flux`;
CREATE TABLE IF NOT EXISTS `flux` (
  `url` varchar(250) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `flux`
--

INSERT INTO `flux` (`url`, `nom`, `id`) VALUES
('https://www.lequipe.fr/', 'L\'Equipe ', 1),
('https://www.lemonde.fr/', 'Le Monde', 2),
('https://www.lamontagne.fr/', 'La Montagne', 3);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `urlart` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `titre` varchar(500) NOT NULL,
  `urlsite` varchar(200) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `urlsite` (`urlsite`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`urlart`, `date`, `titre`, `urlsite`, `id`) VALUES
('https://www.lamontagne.fr/clermont-ferrand-63000/sports/l-ailier-de-l-asm-damian-penaud-en-devoreur-d-espaces-avec-le-xv-de-france_14048282/', '2021-11-22', 'L\'ailier de l\'ASM Damian Penaud, en dévoreur d\'espaces avec le XV de France', 'https://www.lamontagne.fr/', 1),
('https://www.lequipe.fr/Tennis/Actualites/L-atp-reglemente-la-pause-toilettes-et-le-temps-mort-medical/1300455', '2021-11-22', 'L\'ATP réglemente la pause toilettes et le temps mort médical', 'https://www.lequipe.fr/', 2),
('https://www.lequipe.fr/Formule-1/Article/Alonso-hamilton-alphatauri-le-carnet-de-notes-du-grand-prix-du-qatar/1300410', '2021-11-22', 'Alonso, Hamilton, AlphaTauri... Le carnet de notes du Grand Prix du Qatar\r\n', 'https://www.lequipe.fr/', 3),
('https://www.lemonde.fr/cosmos/video/2017/10/04/pourquoi-l-espace-est-devenu-une-poubelle_5196135_1650695.html', '2021-11-22', 'Pourquoi l’espace est devenu une poubelle\r\n', 'https://www.lemonde.fr/', 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
