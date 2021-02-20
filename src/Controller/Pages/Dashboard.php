<?php

namespace App\Controller\Pages;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class Dashboard extends AbstractController
{
    public function show(): Response
    {
        session_start();

        return $this->render('pages/dashboard.html.twig', [
            'user' => [
                'first_name' => $_SESSION['user']['first_name'],
                'username' => $_SESSION['user']['username'],
            ]
        ]);
    }
}
