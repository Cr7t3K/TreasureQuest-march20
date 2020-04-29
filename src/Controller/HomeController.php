<?php
/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

class HomeController extends AbstractController
{

    /**
     * Display home page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
        if (!empty($_POST['username'])) {
            $userName = $_POST['username'];
            $_SESSION['username'] = $userName;
            $_SESSION['score'] = 0;
            header("Location: /quest/start");
        } elseif (isset($_SESSION['username'])) {
            header("Location: /quest/start");
        }
        return $this->twig->render('Home/index.html.twig');
    }

    public function showHighScores()
    {
        return $this->twig->render('Home/highScores.html.twig');
    }
}
