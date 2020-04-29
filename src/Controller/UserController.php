<?php

namespace App\Controller;

use App\Model\UserManager;

class UserController extends AbstractController
{
    public function show()
    {
        $userManager = new UserManager();
        $users = $userManager->selectAll();

        return $this->twig->render('Home/highScores.html.twig', ['users' => $users]);
    }
}
