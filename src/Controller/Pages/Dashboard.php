<?php

namespace App\Controller\Pages;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class Dashboard extends AbstractController
{
    /**
     * Main router for the dashboard.
     *
     * @return Response
     */
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
                'feedback' => $_SESSION['user']['feedback'],
                'first_name' => $_SESSION['user']['first_name'],
                'rating' => $_SESSION['user']['rating'],
                'username' => $_SESSION['user']['username'],
            ],
        ]);
    }
}
