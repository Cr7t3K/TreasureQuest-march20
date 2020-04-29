<?php


namespace App\Controller;

use App\Model\QuestManager;
use App\Service\API\AbstractManager;
use App\Service\API\OpencageManager;
use App\Service\API\WindyManager;

class QuestController extends AbstractController
{
    public function connected($session)
    {
        if (empty($session['username'])) {
            header("Location: /");
        }
    }

    public function start()
    {
        $this->connected($_SESSION);
        $questManager = new QuestManager();
        $quests = $questManager->selectAll();
      
        if (!empty($_SESSION['score']) || ($_SESSION['score'] == 0)) {
            $score = "SCORE : " . $_SESSION['score'];
        } else {
            $score = '';
        }

        if (!empty($_POST['search'])) {
            $search = trim($_POST['search']);
            $coord = $this->getPosition($search);
            if ($coord) {
                $webcams = $this->search($coord);
                return $this->twig->render('Quest/index.html.twig', ['quests' => $quests, 'webcams' => $webcams, 'userScore' => $score]);
            } else {
                $error = "Sa existe pas abruti";
                return $this->twig->render('Quest/index.html.twig', ['quests' => $quests, 'error' => $error, 'userScore' => $score]);
            }
        }
        return $this->twig->render('Quest/index.html.twig', ['quests' => $quests, 'userScore' => $score]);
    }

    public function search(array $coordinate)
    {
        $request = new WindyManager();
        $webcams = $request->webcam($coordinate);

        return $webcams;
    }

    public function getPosition(string $location)
    {
        $request = new OpencageManager();
        $coordinate = $request->location($location);

        return $coordinate;
    }
}
