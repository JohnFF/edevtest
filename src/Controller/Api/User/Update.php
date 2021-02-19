<?php

namespace App\Controller\Api\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class Update extends AbstractController
{
    const SUCCESS_CODE = 200;
    
    public function signin(): Response
    {
        return new Response("Updated", self::SUCCESS_CODE);
    }
}
