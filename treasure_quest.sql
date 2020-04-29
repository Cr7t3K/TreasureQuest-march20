
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
-- Structure of the table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
    `user_id` int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_name` varchar(50) NOT NULL,
    `user_score` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Structure of the table `quest`
--

DROP TABLE IF EXISTS `quest`;
CREATE TABLE `quest` (
    `quest_id` int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `quest_title` varchar(50) NOT NULL,
    `quest_clue01` text NOT NULL,
    `quest_clue02` text NOT NULL,
    `quest_clue03` text NOT NULL,
    `quest_answer` varchar(100) NOT NULL,
    `quest_validation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Content of the table `item`
--

INSERT INTO `quest` (`quest_title`, `quest_clue01`, `quest_clue02`, `quest_clue03`, `quest_answer`, `quest_validation`) VALUES
('Toute de fer vêtue', 'Sur 1665 marches, seules 674 sont accessibles au public', 'J\'ai été dévoilée à l\'Exposition Universelle de 1889', 'On me surnomme la dame de fer', 'la Tour Eiffel', 'https://www.windy.com/fr/-Webcams/France/R%C3%A9gion-parisienne/Paris/Hyatt-Regency-%C3%89toile/webcams/1549489174?48.760,2.306,11'),
('Be sure to wear flowers in your hair', 'Je suis reconnaissable par ma couleur "orange international"', 'J\'etais le plus long pont du monde à ma création', 'Je relie San Francisco à Sausalito', 'le Golden Gate Bridge', 'https://www.windy.com/fr/-Webcams/%C3%89tats-Unis-d\'Am%C3%A9rique/Californie/San-Francisco/Golden-Gate-Bridge/webcams/1183551354?36.272,3.060,8'),
('Privé de carnaval', 'Mon piédestal fait 8m de haut', 'Je fais parti des plus grandes statues du monde', 'Je surplombe Rio de Janeiro', 'la statue du Christ Redempteur', 'https://www.windy.com/fr/-Webcams/Br%C3%A9sil/Rio-de-Janeiro/Zona-Central-do-Rio-de-Janeiro/Christ-the-Redeemer/webcams/1453631972?satellite,-22.921,-43.200,14'),
('G\'day, Bizay', 'Je contiens le plus grand orgue mécanique du monde', 'Certains disent que je suis en forme de voilier, d\'autres de coquillages', 'Je suis la principale attraction touristique en Australie', 'l\'Opéra de Sydney', 'https://www.windy.com/fr/-Webcams/Australie/Nouvelle-Galles-du-Sud/Sydney/Skyline/webcams/1399069290?55.331,-2.356,9'),
('36 vues ne suffisent pas', 'Mon nom peut signifier "immortel", "sans égal" ou "sans fin"', 'Je suis considéré comme étant encore actif', 'Je suis la plus haute montagne du Japon', 'le Mont Fuji', 'https://www.windy.com/fr/-Webcams/Japon/Shizuoka-Prefecture/Fujinomiya/%E5%AF%8C%E5%A3%AB%E5%B1%B1-%E6%97%A5%E6%9C%AC/webcams/1486344490?26.552,78.365,8');
