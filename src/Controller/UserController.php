<?php

namespace App\Controller;

use App\Model\UserManager;

class UserController extends AbstractController
{
    public function show()
    {
        $userManager = new UserManager();
        $users = $userManager->selectHighScores();
        $allscore = $userManager->selectAll();

        return $this->twig->render('Home/highScores.html.twig', ['users' => $users, 'allscore' => $allscore]);
    }

    public function insertScore(array $session)
    {
        $username = $session['username'];
        $score = $session['score'];

        $userManager = new UserManager();
        $lastId = $userManager->insertScore($username, $score);
        return $lastId;
    }

    public function showScoreEnd($lastid)
    {
        $userManager = new UserManager();
        $users = $userManager->selectHighScores();
        //header("Location: /User/showScoreEnd");

        return $this->twig->render('Home/highScores.html.twig', ['users' => $users, 'lastid' => $lastid]);
    }
}
