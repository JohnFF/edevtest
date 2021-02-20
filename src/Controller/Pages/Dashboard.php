<?php

namespace App\Controller\Pages;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class Dashboard extends AbstractController
{
    public function show(): Response
    {
        session_start();

        if (!array_key_exists('user', $_SESSION)) {
            return $this->render('pages/dashboard_error.html.twig', [
                'error_message' => 'You must log in before you can view the dashboard',
            ]);
        }

        return $this->render('pages/dashboard.html.twig', [
            'user' => [
                'first_name' => $_SESSION['user']['first_name'],
                'username' => $_SESSION['user']['username'],
            ],
        ]);
    }
}
