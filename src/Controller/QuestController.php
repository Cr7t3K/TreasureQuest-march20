<?php


namespace App\Controller;

use App\Model\QuestManager;

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
}
