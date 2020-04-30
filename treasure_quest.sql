
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
('Toute de fer vêtue', 'Sur 1665 marches, seules 674 sont accessibles au public', 'J\'ai été dévoilée à l\'Exposition Universelle de 1889', 'On me surnomme la dame de fer', 'la Tour Eiffel', '1555326274'),
('Be sure to wear flowers in your hair', 'Je suis reconnaissable par ma couleur "orange international"', 'J\'etais le plus long pont du monde à ma création', 'Je relie San Francisco à Sausalito', 'le Golden Gate Bridge', '1183551354'),
('Lord of the Dings', 'Je partage l\'affiche d\'un film avec Robert Downey Jr', 'J\'ai en parti brulé en 1834', 'It\'s tea time', 'Le Big Ben', '1549489452'),
('G\'day, Bizay', 'Je contiens le plus grand orgue mécanique du monde', 'Certains disent que je suis en forme de voilier, d\'autres de coquillages', 'Je suis la principale attraction touristique en Australie', 'l\'Opéra de Sydney', '1478211199'),
('36 vues ne suffisent pas', 'Mon nom peut signifier "immortel", "sans égal" ou "sans fin"', 'Je suis considéré comme étant encore actif', 'Je suis la plus haute montagne du Japon', 'le Mont Fuji', '1280161113');
