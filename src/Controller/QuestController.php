<?php


namespace App\Controller;


use App\Model\QuestManager;
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

        $questManager = new QuestManager();
        $quests = $questManager->selectAll();

        return $this->twig->render('Quest/index.html.twig', ['quests' => $quests]);
    }

    public function test()
    {
        $request = new AbstractManager();
        $array = $request->webcam("list/webcam=1259146823?show=webcams:url,location,player");

        return $this->twig->render('Quest/index.html.twig', ['array' => $array]);
    }
}
