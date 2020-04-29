<?php

namespace App\Controller;

use App\Model\UserManager;

class UserController extends AbstractController
{
    public function show()
    {
        $userManager = new UserManager();
        $users = $userManager->selectHighScores();

        return $this->twig->render('Home/highScores.html.twig', ['users' => $users]);
    }
}
