
CREATE DATABASE IF NOT EXISTS treasure_quest;
USE treasure_quest;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `treasure_quest`
--

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
    `user_id` int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_name` varchar(50) NOT NULL,
    `user_score` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Structure de la table `quest`
--

DROP TABLE IF EXISTS `quest`;
CREATE TABLE `quest` (
    `quest_id` int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `quest_title` varchar(50) NOT NULL,
    `quest_validation` text NOT NULL,
    `quest_tip01` text NOT NULL,
    `quest_tip02` text NOT NULL,
    `quest_tip03` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;