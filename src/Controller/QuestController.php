<?php


namespace App\Controller;

use App\Model\QuestManager;
use App\Model\UserManager;
use App\Service\API\AbstractManager;
use App\Service\API\OpencageManager;
use App\Service\API\WindyManager;

class QuestController extends AbstractController
{
    public function connected($session)
    {
        if (empty($session['username'])) {
            return "end";
        } else {
            return $session['score'];
        }
    }

    public function start()
    {
        $return = $this->connected($_SESSION);
        if ($return === "end") {
            header("Location: /");
            return $this->twig->render('Home/index.html.twig');
        }
        $questManager = new QuestManager();
        $questId = $_SESSION['id'];
        $quests = $questManager->selectOneById($questId);
        $indice = $_SESSION['indice'];
        $location = $questManager->clueLocation($questId);


        if (!empty($_POST['indice'])) {
            $help = $_POST['indice'];
            $nowIndice = $_SESSION['indice'];
            if ($help == "help" && $nowIndice < 3) {
                $newIndice = $_SESSION['indice'] += 1;
                $newScore = $_SESSION['score'] -= 300;
                return $this->twig->render('Quest/index.html.twig', ['quests' => $quests,
                    'userScore' => $newScore, 'indice' => $newIndice]);
            }
        }

        if (!empty($_POST['response'])) {
            $response = trim($_POST['response']);
            $id = $_POST['id'];
            $check = $this->checkResponse($response, $id);
            $newScore = $return;
            $newIndice = $_SESSION['indice'];
            if ($check) {
                $newScore = $_SESSION['score'] += 1000;
                $newQuestId = $_SESSION['id'] += 1;
                $newIndice = $_SESSION['indice'] = 1;
                $quests = $questManager->selectOneById($newQuestId);
            }
            if (isset($newQuestId) == 6) {
                $userManager = new UserController();
                $userManager->insertScore($_SESSION);
                session_destroy();
                header("Location: /user/show");
            }
            return $this->twig->render('Quest/index.html.twig', ['quests' => $quests,
                'userScore' => $newScore, 'check' => $check, 'indice' => $newIndice]);
        }

        if (!empty($_POST['search'])) {
            $search = trim($_POST['search']);
            $coord = $this->getPosition($search);
            if ($coord) {
                $webcams = $this->search($coord);
                return $this->twig->render('Quest/index.html.twig', ['quests' => $quests,
                    'webcams' => $webcams, 'userScore' => $return, 'indice' => $indice, 'location' => $location]);
            } else {
                $error = "Sa existe pas abruti";
                return $this->twig->render('Quest/index.html.twig', ['quests' => $quests,
                    'error' => $error, 'userScore' => $return, 'indice' => $indice, 'location' => $location]);
            }
        }
        return $this->twig->render('Quest/index.html.twig', ['quests' => $quests,
            'userScore' => $return, 'indice' => $indice]);
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
