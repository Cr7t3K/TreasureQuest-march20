<?php


namespace App\Controller;

use App\Service\API\AbstractManager;

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
        if (!empty($_SESSION['score']) || ($_SESSION['score'] == 0)) {
            $score = "SCORE : " . $_SESSION['score'];
        } else {
            $score = '';
        }
        return $this->twig->render('Quest/index.html.twig', ['userScore' => $score]);
    }

    public function test()
    {
        $request = new AbstractManager();
        $array = $request->webcam("list/webcam=1259146823?show=webcams:url,location,player");

        return $this->twig->render('Quest/index.html.twig', ['array' => $array]);
    }
}
