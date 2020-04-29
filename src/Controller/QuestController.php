<?php


namespace App\Controller;


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
        return $this->twig->render('Quest/index.html.twig');
    }

}