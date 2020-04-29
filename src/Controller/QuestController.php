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
        } else {
            return $session['score'];
        }
    }

    public function start()
    {
        $return = $this->connected($_SESSION);
        $questManager = new QuestManager();
        $quests = $questManager->selectAll();

        if (!empty($_POST['response'])) {
            $response = trim($_POST['response']);
            $id = $_POST['id'];
            $check = $this->checkResponse($response, $id);
            $newScore = $return;
            if ($check) {
                $newScore = $_SESSION['score'] += 100;
            }
            return $this->twig->render('Quest/index.html.twig', ['quests' => $quests,
                'userScore' => $newScore, 'check' => $check]);
        }

        if (!empty($_POST['search'])) {
            $search = trim($_POST['search']);
            $coord = $this->getPosition($search);
            if ($coord) {
                $webcams = $this->search($coord);
                return $this->twig->render('Quest/index.html.twig', ['quests' => $quests,
                    'webcams' => $webcams, 'userScore' => $return]);
            } else {
                $error = "Sa existe pas abruti";
                return $this->twig->render('Quest/index.html.twig', ['quests' => $quests,
                    'error' => $error, 'userScore' => $return]);
            }
        }
        return $this->twig->render('Quest/index.html.twig', ['quests' => $quests, 'userScore' => $return]);
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

    public function checkResponse(string $response, int $id)
    {
        $questManager = new QuestManager();
        $quests = $questManager->selectOneById($id);
        if ($response == $quests['quest_validation']) {
            return true;
        }
        return false;
    }
}
