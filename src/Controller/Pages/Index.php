<?php

namespace App\Controller\Pages;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class Index extends AbstractController
{
    public function show(): Response
    {
        return $this->render('pages/index.html.twig');
    }
}
