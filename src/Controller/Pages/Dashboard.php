<?php

namespace App\Controller\Pages;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class Dashboard extends AbstractController
{
    public function show(): Response
    {
        return $this->render('pages/dashboard.html.twig');
    }
}
